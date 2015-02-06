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
        $var_izquierda='../imagenes/izquierda.jpg';
	$var_centro='../imagenes/centro.jpg';
	$var_derecha='../imagenes/derecha.jpg';
	
        $this->SetFont("Arial","B",12);
     	$this->Image($var_izquierda,25,12,80,15);
	$this->Image($var_centro,160,12,45,15);
	$this->Image($var_derecha,245,12,20,13);
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

function detalle($gerencia,$nomina,$antiguedad1,$antiguedad2){

	
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
	
	
	
	$conexion=conexion();
	if($gerencia!='Todos' && $nomina=='Todos'){
		$consulta="select * from nompersonal where codnivel4<>'' $cadenaselect  ORDER BY  codnivel4,tipnom,apenom ";
	}else{
		
		$consulta="select * from nompersonal where codnivel4<>'' $cadenaselect  ORDER BY tipnom, codnivel4,apenom ";
		
	}
	$query=query($consulta,$conexion);
	
	
	$cantidad_registros=23;
	$cod_gerencia='';
	$TOTALTRABAJADOR=0;
	$cod_nomina='';
	$cod_trabajador='';
	$paso=0;
	while($fila=fetch_array($query)){
		$codg=$fila['codnivel4'];
		$codnom=$fila['tipnom'];
		$anti=antiguedad($fila['fecing'],date("Y-m-d"),"A");
		$anti+=$fila['antiguedadap'];
		if($anti>=$antiguedad1 && $anti<=$antiguedad2){
// 		$this->Cell(188,5,$cantidad_registros,0,1);
		$ano1=date("Y",strtotime($fila['fecha_salida']));
		$ano2=date("Y",strtotime($fila['fecha_retorno']));
		
			
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
					$cantidad_registros=23;
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
					$cantidad_registros=23;
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
			$consul="select * from nomnivel4 where codorg='$codg'";
			$q=query($consul,$conexion);
			$resul=fetch_array($q);
			$nomgerencia=$resul['descrip'];
			if($cantidad_registros<=3){
					$this->Ln(300);
					$cantidad_registros=23;
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
//  				$this->Cell(188,5,$cantidad_registros,0,1);
				if($cantidad_registros<=2){
					$this->Ln(300);
					$cantidad_registros=23;
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
					$cantidad_registros-=1;
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

				if($fila['fecharetiro']!='0000-00-00'){
					$anos=antiguedad($fila['fecnac'],date("Y-m-d"),"A");
					$this->Row(array($fila['ficha'],utf8_decode($fila['apenom']),number_format($fila['cedula'],0,'.','.'),utf8_decode($fetchcargo['des_car']),date("d/m/Y",strtotime($fila['fecing'])),$anos,date("d/m/Y",strtotime($fila['fecharetiro'])),$anti));$cantidad_registros-=1;
				}else{
					$anos=antiguedad($fila['fecnac'],date("Y-m-d"),"A");
					$this->Row(array($fila['ficha'],utf8_decode($fila['apenom']),number_format($fila['cedula'],0,'.','.'),utf8_decode($fetchcargo['des_car']),date("d/m/Y",strtotime($fila['fecing'])),$anos,'-',$anti));$cantidad_registros-=1;
				
				}

				//
				$this->SetWidths(array(50,30,30,75,75));
				$this->SetAligns(array('C','C','C','C','C','C'));
				$this->Setceldas(array(1,1,1,1,1,1));
				$this->Setancho(array(5,5,5,5,5,5));
				$this->Ln(1);
				$this->SetFont("Arial","I",11);

				////////////////////cargos desempeñados en la empresa////////////////

				$consulta1="select * from nomexpediente where cedula=$fila[cedula] and tipo_registro='Movimiento de Personal' and tipo_tiporegistro='Traslado de cargo'";
				$query1=query($consulta1,$conexion);
				if(num_rows($query1)!=0){
					if($cantidad_registros<=3 ){
							$this->Ln(300);
							$cantidad_registros=23;
							$this->SetFont("Arial","B",11);
							$this->Cell(260,5,utf8_decode('CARGOS DESEMPEÑADOS'),0,1,'C');
							$this->SetFont("Arial","I",11);
							$this->Row(array('Tipo',utf8_decode('Fecha Salida'),utf8_decode('Fecha Retorno'),utf8_decode('Cargo'),utf8_decode('Cargo Nuevo')));
							
					}else{
						$this->SetFont("Arial","B",11);
						$this->Cell(260,5,utf8_decode('CARGOS DESEMPEÑADOS'),0,1,'C');
						$this->SetFont("Arial","i",11);
						$this->Row(array('Tipo',utf8_decode('Fecha Salida'),utf8_decode('Fecha Retorno'),utf8_decode('Cargo'),utf8_decode('Cargo Nuevo')));
					}
					$cantidad_registros-=2;
					
				}
				$this->SetFont("Arial","I",8);
				
				while($fila1=fetch_array($query1)){
					$this->SetFont("Arial","I",8);
					//cargo actual
					$consultacargo1="select * from nomcargos where cod_car='$fila1[cod_cargo]'";
					$querycargo1=query($consultacargo1,$conexion);
					$fetchcargo1=fetch_array($querycargo1);
					//cargo nuevo
					$consultacargo2="select * from nomcargos where cod_car='$fila1[cod_cargo_nuevo]'";
					$querycargo2=query($consultacargo2,$conexion);
					$fetchcargo2=fetch_array($querycargo2);
					if(strlen($fetchcargo1['des_car'])>45){
						$var1=1;
					}else{
						$var1=0;
					}
	// 				$this->Cell(188,5,strlen($fetchcargo2['des_car']),0,1);
	// 				$this->Cell(188,5,strlen($fetchcargo1['des_car']),0,1);
					if(strlen($fetchcargo2['des_car'])>45 && $var1==0){
						$this->Setancho(array(10,10,10,10,5));
					}
					if(strlen($fetchcargo2['des_car'])>45 && $var1==1){
						$this->Setancho(array(10,10,10,5,5));
					}
					if(strlen($fetchcargo2['des_car'])<45 && $var1==0){
						$this->Setancho(array(5,5,5,5,5));
					}
					if(strlen($fetchcargo2['des_car'])<45 && $var1==1){
						$this->Setancho(array(10,10,10,5,10));
					}
					$this->Row(array($fila['tipo_tiporegistro'],date("d/m/Y",strtotime($fila['fecha_salida'])),date("d/m/Y",strtotime($fila['fecha_retorno'])),utf8_decode($fetchcargo1['des_car']),utf8_decode($fetchcargo2['des_car'])));
					$cantidad_registros-=1;
					if($cantidad_registros<=0){
						$this->Ln(300);
						$cantidad_registros=23;
						$this->SetFont("Arial","B",11);
						$this->Cell(260,5,utf8_decode('CARGOS DESEMPEÑADOS'),0,1,'C');
						$this->SetFont("Arial","I",11);
						$this->Row(array('Tipo',utf8_decode('Fecha Salida'),utf8_decode('Fecha Retorno'),utf8_decode('Cargo'),utf8_decode('Cargo Nuevo')));
						$cantidad_registros-=2;
						$this->SetFont("Arial","I",8);
					}
				}
				
				/////////////////////////////////////////////////////////////////////
				
				//////////////////////////estudios extraacademicos////////////////////
				
				$consulta2="select * from nomexpediente where cedula=$fila[cedula] and tipo_registro='Estudios Extra Academicos' ";
				$query2=query($consulta2,$conexion);
				$this->SetWidths(array(50,60,75,75));
				$this->SetFont("Arial","I",11);
				if(num_rows($query2)!=0){
					$this->Ln(1);
					if($cantidad_registros<=3){
							$this->Ln(300);
							$cantidad_registros=23;
							$this->SetFont("Arial","B",11);
							$this->Cell(260,5,'ESTUDIOS EXTRA ACADEMICOS',0,1,'C');
							$this->SetFont("Arial","I",11);
							$this->Row(array('Tipo','Especialidad',utf8_decode('Descripción'),utf8_decode('Institución')));
							
					}else{
						$this->SetFont("Arial","B",11);
						$this->Cell(260,5,'ESTUDIOS EXTRA ACADEMICOS',0,1,'C');
						$this->SetFont("Arial","I",11);
						$this->Row(array('Tipo','Especialidad',utf8_decode('Descripción'),utf8_decode('Institución')));
					}
					$cantidad_registros-=2;
					
				}
				$this->SetFont("Arial","I",8);
				
				while($fila2=fetch_array($query2)){
					$this->SetFont("Arial","I",8);
					if(strlen($fila2['descripcion'])>40){
						$this->Setancho(array(10,10,5,10));
 					}
					$this->Row(array($fila2['tipo_tiporegistro'],$fila2['nombre_especialista'],$fila2['descripcion'],$fila2['institucion']));
					$cantidad_registros-=1;
					if($cantidad_registros<=0){
						$this->Ln(300);
						$cantidad_registros=23;
						$this->SetFont("Arial","B",11);
						$this->Cell(260,5,'ESTUDIOS EXTRA ACADEMICOS',0,1,'C');	
						$this->SetFont("Arial","I",11);
						$this->Row(array('Tipo','Especialidad',utf8_decode('Descripción'),utf8_decode('Institución')));
						$cantidad_registros-=2;
						$this->SetFont("Arial","I",8);
					}
				}

				/////////////////////////////////////////////////////////////////////

				//////////////////////////logros condecoraciones////////////////////
				
				$consulta3="select * from nomexpediente where cedula=$fila[cedula] and tipo_registro='Logros' and tipo_tiporegistro=3";
				$query3=query($consulta3,$conexion);
				$this->SetWidths(array(50,210));
				$this->SetAligns(array('C','C'));
				$this->Setceldas(array(1,1));
				$this->Setancho(array(5,5));

				$this->SetFont("Arial","I",11);
				if(num_rows($query3)!=0){
					$this->Ln(1);
					if($cantidad_registros<=3){
							$this->Ln(300);
							$cantidad_registros=23;
							$this->SetFont("Arial","B",11);
							$this->Cell(260,5,'LOGROS CONDECORACIONES',0,1,'C');
							$this->SetFont("Arial","I",11);
							$this->Row(array(utf8_decode('Fecha'),utf8_decode('Descripción')));
							
					}else{
						$this->SetFont("Arial","B",11);
						$this->Cell(260,5,'LOGROS CONDECORACIONES',0,1,'C');
						$this->SetFont("Arial","I",11);
						$this->Row(array(utf8_decode('Fecha'),utf8_decode('Descripción')));
					}
					$cantidad_registros-=2;
				}
				
				
				$this->SetFont("Arial","I",8);
				while($fila3=fetch_array($query3)){
					$this->SetFont("Arial","I",8);
					
					$this->Row(array(date("d/m/Y",strtotime($fila3['fecha_salida'])),$fila3['descripcion']));
					$cantidad_registros-=1;
					if($cantidad_registros<=0){
						$this->Ln(300);
						$cantidad_registros=23;
						$this->SetFont("Arial","B",11);
						$this->Cell(260,5,'LOGROS CONDECORACIONES',0,1,'C');
						$this->SetFont("Arial","I",11);
						$this->Row(array(utf8_decode('Fecha'),utf8_decode('Descripción')));
						$cantidad_registros-=2;
						$this->SetFont("Arial","I",8);
					}
				}

				/////////////////////////////////////////////////////////////////////
				//////////////////////////Instituciones trabajadas////////////////////
				
				$consulta4="select * from nomexpediente where cedula=$fila[cedula] and tipo_registro='Experiencia'";
				$query4=query($consulta4,$conexion);
				$this->SetWidths(array(50,150,30,30));
				$this->SetAligns(array('C','C','C','C'));
				$this->Setceldas(array(1,1,1,1));
				$this->Setancho(array(5,5,5,5));

				$this->SetFont("Arial","I",11);
				if(num_rows($query4)!=0){
					$this->Ln(1);
					if($cantidad_registros<=3){
							$this->Ln(300);
							$cantidad_registros=23;
							$this->SetFont("Arial","B",11);
							$this->Cell(260,5,'EXPERIENCIA',0,1,'C');
							$this->SetFont("Arial","I",11);
							$this->Row(array(utf8_decode('Tipo'),utf8_decode('Institución'),'Fecha Ingreso','Fecha Egreso'));
							
					}else{
						$this->SetFont("Arial","B",11);
						$this->Cell(260,5,'EXPERIENCIA',0,1,'C');
						$this->SetFont("Arial","I",11);
						$this->Row(array(utf8_decode('Tipo'),utf8_decode('Institución'),'Fecha Ingreso','Fecha Egreso'));
					}
					$cantidad_registros-=2;
				}
				
				
				$this->SetFont("Arial","I",8);
				while($fila4=fetch_array($query4)){
					$this->SetFont("Arial","I",8);
					
					$this->Row(array($fila4['tipo_tiporegistro'],$fila4['institucion'],date("d/m/Y",strtotime($fila4['fecha_retorno'])),date("d/m/Y",strtotime($fila3['fecha_salida']))));
					$cantidad_registros-=1;
					if($cantidad_registros<=0){
						$this->Ln(300);
						$cantidad_registros=23;
						$this->SetFont("Arial","B",11);
						$this->Cell(260,5,'EXPERIENCIA',0,1,'C');
						$this->SetFont("Arial","I",11);
						$this->Row(array(utf8_decode('Tipo'),utf8_decode('Institución'),'Fecha Ingreso','Fecha Egreso'));
						$cantidad_registros-=2;
						$this->SetFont("Arial","I",8);
					}
				}

				/////////////////////////////////////////////////////////////////////
				$this->Ln(1);
				if($cantidad_registros<=0){
					$this->Ln(300);
					$cantidad_registros=23;
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
		
		
		
		
		
		
	
		
	}
	$this->Ln();
	$this->SetFont('Arial','B',12);
	$this->Cell(270,5,'Total de Trabajadores => '.$TOTALTRABAJADOR,0,1,'R');
	
	
}
}
//Creación del objeto de la clase heredada
$pdf=new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$gerencia=$_POST['gerencia'];
$nomina=$_POST['nomina'];
$antiguedad1=$_POST['antiguedad1'];
$antiguedad2=$_POST['antiguedad2'];
$pdf->detalle($gerencia,$nomina,$antiguedad1,$antiguedad2);

$pdf->Output();
?>
