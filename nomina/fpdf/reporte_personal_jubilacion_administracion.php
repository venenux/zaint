<?php 
if (!isset($_SESSION)) {
  session_start();
}
require('fpdf.php');
require_once '../lib/config.php';
require_once '../lib/common.php';

include('numerosALetras.class.php');
include ("../paginas/funciones_nomina.php");
class PDF extends FPDF
{

//Cabecera de página
function Header()
{
   /*     $var_izquierda='../imagenes/izquierda.jpg';
	$var_centro='../imagenes/centro.jpg';
	$var_derecha='../imagenes/derecha.jpg';
	
        $this->SetFont("Arial","B",12);
     	$this->Image($var_izquierda,25,12,80,15);
	$this->Image($var_centro,160,12,45,15);
	$this->Image($var_derecha,245,12,20,13);*/
	$this->SetFont('Arial','B',12);
     	$this->Ln(25);
	

}

function Footer(){
	$this->SetY(-15);
	$this->SetFont('Arial','I',8);
	$this->Cell(0,5,utf8_decode('Página ').$this->PageNo().'/{nb}',0,1,'C');
	$this->Cell(188,10,'Elaborado Por: '.$_SESSION['nombre'],0,0,'L');

}


//Hacer que sea multilinea sin que haga un salto de linea
var $widths;
var $aligns;
var $celdas;
var $ancho;

function SetWidths($w)
{
    //Set the array of column widths
    $this->widths=$w;
} 
function SetAligns($a)
{
    //Set the array of column alignments
    $this->aligns=$a;
} 
// Marco de la celda
function Setceldas($cc)
{
   
    $this->celdas=$cc;
} 
// Ancho de la celda
function Setancho($aa)
{
    $this->ancho=$aa;
}
function CheckPageBreak($h)
{
    //If the height h would cause an overflow, add a new page immediately
    if($this->GetY()+$h>$this->PageBreakTrigger)
        $this->AddPage($this->CurOrientation);
} 
function NbLines($w,$txt)
{
    //Computes the number of lines a MultiCell of width w will take
    $cw=&$this->CurrentFont['cw'];
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
    $s=str_replace("\r",'',$txt);
    $nb=strlen($s);
    if($nb>0 and $s[$nb-1]=="\n")
        $nb--;
    $sep=-1;
    $i=0;
    $j=0;
    $l=0;
    $nl=1;
    while($i<$nb)
    {
        $c=$s[$i];
        if($c=="\n")
        {
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
            continue;
        }
        if($c==' ')
            $sep=$i;
        $l+=$cw[$c];
        if($l>$wmax)
        {
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
            }
            else
                $i=$sep+1;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
        }
        else
            $i++;
    }
    return $nl;
} 

function Row($data)
{
    //Calculate the height of the row
    $nb=0;
    for($i=0;$i<count($data);$i++)
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
    $h=5*$nb;
    //Issue a page break first if needed
    $this->CheckPageBreak($h);
    //Draw the cells of the row
    for($i=0;$i<count($data);$i++)
    {
        $w=$this->widths[$i];
        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
        //Save the current position
        $x=$this->GetX();
        $y=$this->GetY();
        //Draw the border
        //$this->Rect($x,$y,$w,$h);
        //Print the text
        $this->MultiCell($w,$this->ancho[$i],$data[$i],$this->celdas[$i],$a);
        //Put the position to the right of the cell
        $this->SetXY($x+$w,$y);
    }
    //Go to the next line
    $this->Ln($h);
}
//fin

function detalle($gerencia,$nomina,$antiguedad1,$antiguedad2,$tipo){
	if($antiguedad1!=$antiguedad2){
		$this->Cell(270,5,'LISTADO DE TRABAJADORES CON ANTIGUEDAD DE '.$antiguedad1.' HASTA '.$antiguedad2,0,0,'C');
	}else{
		$this->Cell(270,5,'LISTADO DE TRABAJADORES CON ANTIGUEDAD DE '.$antiguedad1.'',0,0,'C');
	}
	$this->Ln(10);

	$cadenaselect='';
	
	if($gerencia!='Todos'){
		$cadenaselect=$cadenaselect.' and codnivel4='.$gerencia;
	}
	if($nomina!='Todos'){
		$cadenaselect=$cadenaselect.' and tipnom='.$nomina;
	}
	
		if($antiguedad1!=$antiguedad2){
			$cadenaselect=$cadenaselect.' and antiguedadap between '.$antiguedad1.' and '.$antiguedad2;
		}else{
			$cadenaselect=$cadenaselect.' and antiguedadap='.$antiguedad1;
		}
	
	
	

	$conexion=conexion();
	if($gerencia!='Todos' && $nomina=='Todos'){
		$consulta="select * from nompersonal where codnivel4<>'' $cadenaselect  ORDER BY  codnivel4,tipnom,apenom ";
	}else{
		
		$consulta="select * from nompersonal where codnivel4<>'' $cadenaselect  ORDER BY tipnom, codnivel4,apenom ";
		
	}
	$query=query($consulta,$conexion);
	
	
	$cantidad_registros=24;
	$cod_gerencia='';
	$TOTALTRABAJADOR=0;
	$cod_nomina='';
	$paso=0;
	while($fila=fetch_array($query)){
		$codg=$fila['codnivel4'];
		$codnom=$fila['tipnom'];
// 		$this->Cell(188,5,$cantidad_registros,0,1);
		if($gerencia!='Todos' && $nomina=='Todos'){
			if($codg!=$cod_gerencia){
				$conexion=conexion();
				$this->SetFont("Arial","B",12);
				$consul="select * from nomnivel4 where codorg='$codg'";
				$q=query($consul,$conexion);
				$resul=fetch_array($q);
				$nomgerencia=$resul['descrip'];
				if($cantidad_registros<=4){
						$this->Ln(300);
						$cantidad_registros=22;
						if($antiguedad1!=$antiguedad2){
							$this->Cell(270,5,'LISTADO DE TRABAJADORES CON ANTIGUEDAD DE '.$antiguedad1.' HASTA '.$antiguedad2,0,0,'C');
						}else{
							$this->Cell(270,5,'LISTADO DE TRABAJADORES CON ANTIGUEDAD DE '.$antiguedad1.'',0,0,'C');
						}
						$this->Ln(10);
				}
				$this->Cell(188,5,utf8_decode($codg.".- ".$nomgerencia),0,1,'L');
				$cantidad_registros-=1;
				$cod_gerencia=$codg;
				
				
				$paso=0;
	
			}
			if($codnom!=$cod_nomina){
				$conexion=conexion();
				
				$consul="select * from nomtipos_nomina where codtip=$codnom";
				$q=query($consul,$conexion);
				$resuln=fetch_array($q);
				$nomnomina=$resuln['descrip'];
				$this->SetFont("Arial","B",12);
				if($cantidad_registros<=3){
					$this->Ln(300);
					$cantidad_registros=24;
					if($antiguedad1!=$antiguedad2){
							$this->Cell(270,5,'LISTADO DE TRABAJADORES CON ANTIGUEDAD DE '.$antiguedad1.' HASTA '.$antiguedad2,0,0,'C');
						}else{
							$this->Cell(270,5,'LISTADO DE TRABAJADORES CON ANTIGUEDAD DE '.$antiguedad1.'',0,0,'C');
						}
					$this->Ln(10);
					
				}

				$this->SetFont("Arial","B",10);
				$this->Cell(188,7,utf8_decode($codnom.".- ".$nomnomina),0,1,'L');
				$cantidad_registros-=2;
				$cod_nomina=$codnom;
				$this->SetFont("Arial","I",11);
				$this->SetWidths(array(15,75,18,48,21,13));
				$this->SetAligns(array('C','C','C','C','C','C'));
				$this->Setceldas(array(1,1,1,1,1,1));
				$this->Setancho(array(5,5,5,5,5,5));
				$this->Row(array(utf8_decode('Código'),'Nombre y Apellido',utf8_decode('Cédula'),'Cargo','Fecha Ing.','Edad'));
				$paso=0;
	
	
			}
		
			
		}else{
			if($codnom!=$cod_nomina){
				$conexion=conexion();
				
				$consul="select * from nomtipos_nomina where codtip=$codnom";
				$q=query($consul,$conexion);
				$resuln=fetch_array($q);
				$nomnomina=$resuln['descrip'];
				$this->SetFont("Arial","B",12);
				if($cantidad_registros<=4){
					$this->Ln(300);
					$cantidad_registros=24;
					if($antiguedad1!=$antiguedad2){
							$this->Cell(270,5,'LISTADO DE TRABAJADORES CON ANTIGUEDAD DE '.$antiguedad1.' HASTA '.$antiguedad2,0,0,'C');
						}else{
							$this->Cell(270,5,'LISTADO DE TRABAJADORES CON ANTIGUEDAD DE '.$antiguedad1.'',0,0,'C');
						}
					$this->Ln(10);
					
				}

				$this->SetFont("Arial","B",10);
				$this->Cell(188,7,utf8_decode($codnom.".- ".$nomnomina),0,1,'L');
				$cantidad_registros-=1;
				$cod_nomina=$codnom;
				$paso=0;
	
	
			}
		
		if($codg!=$cod_gerencia){
// 			$this->Ln();
			$conexion=conexion();
			$this->SetFont("Arial","B",12);
			$consul="select * from nomnivel4 where codorg=$codg";
			$q=query($consul,$conexion);
			$resul=fetch_array($q);
			$nomgerencia=$resul['descrip'];
			if($cantidad_registros<=3){
					$this->Ln(300);
					$cantidad_registros=24;
					if($antiguedad1!=$antiguedad2){
							$this->Cell(270,5,'LISTADO DE TRABAJADORES CON ANTIGUEDAD DE '.$antiguedad1.' HASTA '.$antiguedad2,0,0,'C');
						}else{
							$this->Cell(270,5,'LISTADO DE TRABAJADORES CON ANTIGUEDAD DE '.$antiguedad1.'',0,0,'C');
						}
					$this->Ln(10);
			}
			$this->Cell(188,5,utf8_decode($codg.".- ".$nomgerencia),0,1,'L');
			$cantidad_registros-=1;
			$cod_gerencia=$codg;
			
			

		}
		}


			

			$conexion=conexion();
			$consultacargo="select * from nomcargos where cod_car='$fila[codcargo]'";
			$querycargo=query($consultacargo,$conexion);
			$fetchcargo=fetch_array($querycargo);
			
			

			
			$consul_expe="select * from nomexpediente where cedula='$fila[cedula]' and tipo_registro='Experiencia' and tipo_tiporegistro='Trabajo realizado' and institucion_publica=1";
			$query_expe=query($consul_expe,$conexion);
// 			$this->Cell(188,5,$cantidad_registros,0,1);
			if($cantidad_registros<=2){
					$this->Ln(300);
					$cantidad_registros=24;
					$this->SetFont("Arial","B",12);
					if($antiguedad1!=$antiguedad2){
							$this->Cell(270,5,'LISTADO DE TRABAJADORES CON ANTIGUEDAD DE '.$antiguedad1.' HASTA '.$antiguedad2,0,0,'C');
						}else{
							$this->Cell(270,5,'LISTADO DE TRABAJADORES CON ANTIGUEDAD DE '.$antiguedad1.'',0,0,'C');
						}
					$this->Ln(10);
					$this->SetFont("Arial","I",8);
			}
			
				$this->SetFont("Arial","I",11);
				$this->SetWidths(array(15,75,18,49,30,13,30,30));
				$this->SetAligns(array('C','C','C','C','C','C','C','C'));
				$this->Setceldas(array(1,1,1,1,1,1,1,1));
				$this->Setancho(array(5,5,5,5,5,5,5,5));
				$this->Row(array(utf8_decode('Código'),'Nombre y Apellido',utf8_decode('Cédula'),'Cargo','Fecha Ingreso','Edad','Fecha  Egreso',utf8_decode('Adm. Pública')));
				$this->SetFont('Arial','I',8);
				$this->SetWidths(array(15,75,18,49,30,13,30,30));
				$this->SetAligns(array('C','L','L','L','C','C','C','C'));
				$this->Setceldas(array(1,1,1,1,1,1,1,1));
				if(strlen(trim($fetchcargo['des_car']))>=29){
					$var=1;
					
				}else{
					$var=0;
				}
				
				if ((strlen($fila['apenom'])>=43)&& $var==1){
					$this->Setancho(array(10,5,10,5,10,10,10,10));
					$cantidad_registros-=1;
				}
				if ((strlen($fila['apenom'])>=43)&& $var==0){
					$this->Setancho(array(10,5,10,10,10,10,10,10));
					$cantidad_registros-=1;
				}
				if ((strlen($fila['apenom'])<43)&& $var==1){
					$this->Setancho(array(10,10,10,5,10,10,10,10));
					$cantidad_registros-=1;
				}
				if ((strlen($fila['apenom'])<43)&& $var==0){
					$this->Setancho(array(5,5,5,5,5,5,5,5));
					
				}
				$anti=antiguedad($fila['fecing'],date("Y-m-d"),"A");
					$anti+=$fila['antiguedadap'];
				if($fila['fecharetiro']!='0000-00-00'){
					$anos=antiguedad($fila['fecnac'],date("Y-m-d"),"A");
					$this->Row(array($fila['ficha'],utf8_decode($fila['apenom']),number_format($fila['cedula'],0,'.','.'),utf8_decode($fetchcargo['des_car']),date("d/m/Y",strtotime($fila['fecing'])),$anos,date("d/m/Y",strtotime($fila['fecharetiro'])),$anti));$cantidad_registros-=2;
				}else{
					$anos=antiguedad($fila['fecnac'],date("Y-m-d"),"A");
					$this->Row(array($fila['ficha'],utf8_decode($fila['apenom']),number_format($fila['cedula'],0,'.','.'),utf8_decode($fetchcargo['des_car']),date("d/m/Y",strtotime($fila['fecing'])),$anos,'-',$anti));$cantidad_registros-=2;
				}
				//instituciones 
				$this->SetWidths(array(90,40,90,40));
				$this->SetAligns(array('C','C','C','C'));
				$this->Setceldas(array(1,1,1,1));
				$this->Setancho(array(5,5,5,5));
				$dataa=1;
				
				while($expe=fetch_array($query_expe)){
					if($dataa==1){
						$this->Ln(1);
						$cantidad_registros-=1;
						$this->SetFont("Arial","I",11);
						$this->Row(array(utf8_decode('Institución'),utf8_decode('Años Serv.'),utf8_decode('Institución'),utf8_decode('Años Serv.')));
						$this->SetFont("Arial","I",8);
						$dataa=0;
						$cantidad_registros-=1;
					}
					$ins1=$expe['institucion'];
					$an1=antiguedad($expe['fecha_salida'],$expe['fecha_retorno'],"A");
					$ins2='';
					$an2='';
					if($dos=fetch_array($query_expe)){
						$ins2=$dos['institucion'];
						$an2=antiguedad($dos['fecha_salida'],$dos['fecha_retorno'],"A");
					}
					$this->Row(array($ins1,$an1,$ins2,$an2));
					$cantidad_registros-=1;
					if($cantidad_registros<=0){
			
						$this->Ln(300);
						$cantidad_registros=24;
						$dataa=1;
						$this->SetFont("Arial","B",12);
						if($antiguedad1!=$antiguedad2){
								$this->Cell(270,5,'LISTADO DE TRABAJADORES CON ANTIGUEDAD DE '.$antiguedad1.' HASTA '.$antiguedad2,0,0,'C');
							}else{
								$this->Cell(270,5,'LISTADO DE TRABAJADORES CON ANTIGUEDAD DE '.$antiguedad1.'',0,0,'C');
							}
						$this->Ln(10);
						$this->SetFont("Arial","I",8);
					}
				}
		if ($dataa==0 ){
		       $this->Ln();
		}else{
		       $this->Ln(2);
		}
		
// 		       $this->Cell(188,5,$cantidad_registros,0,1);

			
			
			$TOTALTRABAJADOR+=1;
			
		
		if($cantidad_registros<=0){
			
			$this->Ln(300);
			$cantidad_registros=24;
			$paso=1;
			$this->SetFont("Arial","B",12);
			if($antiguedad1!=$antiguedad2){
				$this->Cell(270,5,'LISTADO DE TRABAJADORES CON ANTIGUEDAD DE '.$antiguedad1.' HASTA '.$antiguedad2,0,0,'C');
			}else{
				$this->Cell(270,5,'LISTADO DE TRABAJADORES CON ANTIGUEDAD DE '.$antiguedad1.'',0,0,'C');
			}
			$this->SetFont("Arial","I",8);
			$this->Ln(10);
		}
		
		
		
		
		
		
	}
		
	
	$this->Ln();
	$this->SetFont('Arial','B',12);
	$this->Cell(270,5,'Total de Trabajadores => '.num_rows($query),0,1,'R');
	
	
}
}
//Creación del objeto de la clase heredada
$pdf=new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$gerencia=$_POST['gerencia'];
$nomina=$_POST['nomina'];
$antiguedad1=$_POST['antiguedad3'];
$antiguedad2=$_POST['antiguedad4'];
$tipo=$_GET['tipo'];
$pdf->detalle($gerencia,$nomina,$antiguedad1,$antiguedad2,$tipo);

$pdf->Output();
?>
