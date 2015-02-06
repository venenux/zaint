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

function detalle($gerencia,$nomina,$tipo,$desde,$hasta){

	$conexion=conexion();
	$consulta="select * from nomsuspenciones where codigo='$tipo'";
	$qs=query($consulta,$conexion);	
	$fs=fetch_array($qs);
	$nombrepermiso=$fs['descrip'];
	if($tipo=='Todos'){
		$nombrepermiso=$tipo;
	}



	$this->Cell(270,5,'LISTADO DE TRABAJADORES CON PERMISOS DE '.utf8_decode($nombrepermiso).utf8_decode(' DESDE ').$desde.' HASTA '.$hasta,0,0,'C');
	
	$this->Ln(10);

	$cadenaselect='';
	
	if($gerencia!='Todos'){
		$cadenaselect=$cadenaselect.' and np.codnivel4='.$gerencia;
	}
	if($nomina!='Todos'){
		$cadenaselect=$cadenaselect.' and np.tipnom='.$nomina;
	}
	if($tipo!='Todos'){
		$cadenaselect=$cadenaselect.' and ne.tipo_tiporegistro='.$tipo;
	}
	
	$desdea=date("Y-m-d",strtotime($desde));
	$hastaa=fecha_sql($hasta);

	$conexion=conexion();
	if($gerencia!='Todos' && $nomina=='Todos'){
		$consulta="select * from nompersonal as np INNER JOIN nomexpediente as ne ON np.cedula=ne.cedula and ne.tipo_registro='Permisos o Ausencias' and fecha_salida between '$desdea' and '$hastaa'   $cadenaselect  ORDER BY  np.codnivel4,np.tipnom,np.apenom";

	}else{
		$consulta="select * from nompersonal as np INNER JOIN nomexpediente as ne ON np.cedula=ne.cedula and ne.tipo_registro='Permisos o Ausencias' and fecha_salida between '$desdea' and '$hastaa'   $cadenaselect  ORDER BY np.tipnom, np.codnivel4,np.apenom";

		
	}
	$query=query($consulta,$conexion);
	
	
	$cantidad_registros=24;
	$cod_gerencia='';
	$TOTALTRABAJADOR=0;
	$cod_nomina='';
	$cod_trabajador='';
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
						$this->Cell(270,5,'LISTADO DE TRABAJADORES CON PERMISOS DE '.utf8_decode($nombrepermiso).utf8_decode(' DESDE ').$desde.' HASTA '.$hasta,0,0,'C');
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
					$this->Cell(270,5,'LISTADO DE TRABAJADORES CON PERMISOS DE '.utf8_decode($nombrepermiso).utf8_decode(' DESDE ').$desde.' HASTA '.$hasta,0,0,'C');
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
					$this->Cell(270,5,'LISTADO DE TRABAJADORES CON PERMISOS DE '.utf8_decode($nombrepermiso).utf8_decode(' DESDE ').$desde.' HASTA '.$hasta,0,0,'C');
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
					$this->Cell(270,5,'LISTADO DE TRABAJADORES CON PERMISOS DE '.utf8_decode($nombrepermiso).utf8_decode(' DESDE ').$desde.' HASTA '.$hasta,0,0,'C');
					$this->Ln(10);
			}
			$this->Cell(188,5,utf8_decode($codg.".- ".$nomgerencia),0,1,'L');
			$cantidad_registros-=1;
			$cod_gerencia=$codg;
			
			

		}
		}


			if($cod_trabajador!=$fila['ficha']){

				$conexion=conexion();
				$consultacargo="select * from nomcargos where cod_car='$fila[codcargo]'";
				$querycargo=query($consultacargo,$conexion);
				$fetchcargo=fetch_array($querycargo);
				if($cantidad_registros<=2){
					$this->Ln(300);
					$cantidad_registros=24;
					$this->SetFont("Arial","B",12);
					$this->Cell(270,5,'LISTADO DE TRABAJADORES CON PERMISOS DE '.utf8_decode($nombrepermiso).utf8_decode(' DESDE ').$desde.' HASTA '.$hasta,0,0,'C');
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
				$anos=antiguedad($fila['fecnac'],date("Y-m-d"),"A");
				if($fila['fecharetiro']!='0000-00-00'){
					$this->Row(array($fila['ficha'],utf8_decode($fila['apenom']),number_format($fila['cedula'],0,'.','.'),utf8_decode($fetchcargo['des_car']),date("d/m/Y",strtotime($fila['fecing'])),$anos,date("d/m/Y",strtotime($fila['fecharetiro'])),$anti));
				}else{
					$this->Row(array($fila['ficha'],utf8_decode($fila['apenom']),number_format($fila['cedula'],0,'.','.'),utf8_decode($fetchcargo['des_car']),date("d/m/Y",strtotime($fila['fecing'])),$anos,'-',$anti));
				}
				$cantidad_registros-=2;

				//permisos
				$this->SetWidths(array(50,30,30,30,120));
				$this->SetAligns(array('C','C','C','C','C'));
				$this->Setceldas(array(1,1,1,1,1));
				$this->Setancho(array(5,5,5,5,5));
				$this->Ln(1);
				$cantidad_registros-=1;
				$this->SetFont("Arial","I",11);
				$this->Row(array('Tipo',utf8_decode('Días'),utf8_decode('Fecha Salida'),utf8_decode('Fecha Culminación'),utf8_decode('Descripción')));
				$this->SetFont("Arial","I",8);
				$cod_trabajador=$fila['ficha'];
				$TOTALTRABAJADOR+=1;

			}
				$conexion=conexion();
				$consulta1="select * from nomsuspenciones where codigo=$fila[tipo_tiporegistro]";
				$qs=query($consulta1,$conexion);	
				$fs=fetch_array($qs);
				$nombrepermisoper=$fs['descrip'];
				//$this->Cell(188,5,strlen($nombrepermisoper));
				if(strlen($nombrepermisoper)>40){
					$this->Setancho(array(5,10,10,10,10));
				}
				if($fila['fecha_retorno']!='0000-00-00'){
					$this->Row(array($nombrepermisoper,$fila['dias'],date("d/m/Y",strtotime($fila['fecha_salida'])),date("d/m/Y",strtotime($fila['fecha_retorno'])),utf8_decode($fila['descripcion'])));
				}else{
					$this->Row(array($nombrepermisoper,$fila['dias'],date("d/m/Y",strtotime($fila['fecha_salida'])),'-',utf8_decode($fila['descripcion'])));
				}
				$this->Setancho(array(5,5,5,5,5));
				$cantidad_registros-=1;
				if($cantidad_registros<=0){
					$this->Ln(300);
					$cantidad_registros=24;
					$this->SetFont("Arial","B",12);
					$this->Cell(270,5,'LISTADO DE TRABAJADORES CON PERMISOS DE '.utf8_decode($nombrepermiso).utf8_decode(' DESDE ').$desde.' HASTA '.$hasta,0,0,'C');
					$this->Ln(10);
					$this->SetFont("Arial","I",8);
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
$tipo=$_POST['tipos'];
$desde=$_POST['fechadesde2'];
$hasta=$_POST['fechahasta2'];
$pdf->detalle($gerencia,$nomina,$tipo,$desde,$hasta);

$pdf->Output();
?>
