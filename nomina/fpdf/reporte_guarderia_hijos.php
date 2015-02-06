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
var $edad1;
var $edad2;
//Cabecera de página
function Header()
{
    $var_izquierda='../imagenes/SiSalud.jpg';
	$var_centro='../imagenes/dot.JPG';
	$var_derecha='../imagenes/dot.JPG';
	
    $this->SetFont("Arial","B",12);
    $this->Image($var_izquierda,25,12,30,15);
	$this->Image($var_centro,110,12,45,15);
	$this->Image($var_derecha,155,12,20,13);
	$this->SetFont('Arial','B',12);
     	$this->Ln(30);
	

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

function detalle($edad1,$edad2,$sexo,$parentesco,$nomina){
	$this->SetFont("Arial","B",12);
	if($edad1!=$edad2){
		$this->Cell(188,5,'LISTADO DE TRABAJADORES CON HIJOS ENTRE '.$edad1.' Y '.$edad2.utf8_decode(' AÑOS'),0,1,'C');
	}else{
		$this->Cell(188,5,'LISTADO DE TRABAJADORES CON HIJOS DE '.$edad1.utf8_decode(' AÑOS'),0,1,'C');
	}


	$conexion=conexion();
	$cadenaselect='';
	if($sexo!='Todos'){
		$cadenaselect=$cadenaselect." and nf.sexo='".$sexo."'";
	}
	if($parentesco!='Todos'){
		$cadenaselect=$cadenaselect.' and codpar='.$parentesco;
	}
	if($nomina!='Todos'){
		$cadenaselect=$cadenaselect.' and np.tipnom='.$nomina;
	}
	$consulta="select * from nompersonal as np INNER JOIN nomfamiliares as nf ON np.ficha=nf.ficha and nf.cedula=np.cedula and np.estado='Activo' and nf.codgua<>0 $cadenaselect   ORDER BY np.tipnom,np.codnivel4,nf.codgua,np.apenom";
	
	$query=query($consulta,$conexion);
	
	
	$cantidad_registros=30;
	$cod_gerencia='';
	$cod_persona='';
	$cod_nomina='';
	$cod_guarderia='';
	$TOTALTRABAJADOR=0;
	$TOTALCARGAFAMILIAR=0;
	while($fila=fetch_array($query)){
		$codg=$fila['codnivel4'];
		$codper=$fila['ficha'];
		$codnom=$fila['tipnom'];
		$codgu=$fila['codgua'];
		$anos=antiguedad($fila['fecha_nac'],date('Y-m-d'),'A');
		
		if($anos>=$edad1 && $anos<=$edad2){
			if($codnom!=$cod_nomina){
				$conexion=conexion();
				
				$consul="select * from nomtipos_nomina where codtip=$codnom";
				$q=query($consul,$conexion);
				$resuln=fetch_array($q);
				$nomnomina=$resuln['descrip'];
				$this->SetFont("Arial","B",12);
				if($cantidad_registros<=4){
					$this->Ln(300);
					$cantidad_registros=30;
					if($edad1!=$edad2){
						$this->Cell(188,5,'LISTADO DE TRABAJADORES CON HIJOS ENTRE '.$edad1.' Y '.$edad2.utf8_decode(' AÑOS'),0,1,'C');
					}else{
						$this->Cell(188,5,'LISTADO DE TRABAJADORES CON HIJOS DE '.$edad1.utf8_decode(' AÑOS'),0,1,'C');
					}
				}

				$this->SetFont("Arial","B",10);
				$this->Cell(188,7,utf8_decode($codnom.".- ".$nomnomina),0,1,'L');
				$cantidad_registros-=1;
				$cod_nomina=$codnom;
				
	
	
			}
		}
		
		if($anos>=$edad1 && $anos<=$edad2){
			if($codg!=$cod_gerencia){
				$conexion=conexion();
				
				$consul="select * from nomnivel4 where codorg=$codg";
				$q=query($consul,$conexion);
				$resul=fetch_array($q);
				$nomgerencia=$resul['descrip'];
				$this->SetFont("Arial","B",12);
				if($cantidad_registros<=5){
					$this->Ln(300);
					$cantidad_registros=30;
					if($edad1!=$edad2){
						$this->Cell(188,5,'LISTADO DE TRABAJADORES CON HIJOS ENTRE '.$edad1.' Y '.$edad2.utf8_decode(' AÑOS'),0,1,'C');
					}else{
						$this->Cell(188,5,'LISTADO DE TRABAJADORES CON HIJOS DE '.$edad1.utf8_decode(' AÑOS'),0,1,'C');
					}
				}
				//$this->Cell(188,4,$cantidad_registros);
				$this->SetFont("Arial","B",10);
				$this->Cell(188,7,utf8_decode($codg.".- ".$nomgerencia),0,1,'L');
				$cantidad_registros-=1;
				$cod_gerencia=$codg;
				
	
	
			}
		}
		
		if($codper!=$cod_persona){
			$conexion=conexion();
			
			$anos=antiguedad($fila['fecha_nac'],date('Y-m-d'),'A');
			$this->SetFont("Arial","B",12);
			if($cantidad_registros<=3){
					$this->Ln(300);
					$cantidad_registros=30;
				if($edad1!=$edad2){
						$this->Cell(188,5,'LISTADO DE TRABAJADORES CON HIJOS ENTRE '.$edad1.' Y '.$edad2.utf8_decode(' AÑOS'),0,1,'C');
					}else{
						$this->Cell(188,5,'LISTADO DE TRABAJADORES CON HIJOS DE '.$edad1.utf8_decode(' AÑOS'),0,1,'C');
					}
				}
			$this->SetFont("Arial","I",10);
			if($anos>=$edad1 && $anos<=$edad2){
				$car="select * from nomcargos where cod_car='".$fila['codcargo']."'";
				$querycarg=query($car,$conexion);
				$rc=fetch_array($querycarg);
				$ca='('.$fila['ficha'].')'.utf8_encode($fila['apenom']).' -  Cargo: '.$rc['des_car'];
				$TOTALTRABAJADOR+=1;
				if(strlen($ca)>140){
					$cantidad_registros-=1;
				}
				$this->MultiCell(188,5,$ca,0,'L');
				$this->SetFont("Arial","I",10);
				$this->SetWidths(array(90,20,20,60));
				$this->SetAligns(array('C','C','C','C'));
				$this->Setceldas(array(1,1,1,1));
				$this->Setancho(array(5,5,5,5));
				$this->Row(array('Nombre y Apellido','Edad','Sexo','Institucion'));
				


				$cantidad_registros-=2;
				$cod_persona=$codper;
				
			}
		}
		
		if($anos>=$edad1 && $anos<=$edad2){
			$cade=$fila['apellido'].', '.$fila['nombre'];
			$TOTALCARGAFAMILIAR+=1;
			//$this->Cell(188,5,strlen($cade).'-'.strlen($fila['institucion']),0,1);
			if(strlen($fila['institucion'])>=30 && (strlen($cade)>=47)){
				$this->Setancho(array(5,10,10,5));
				$cantidad_registros-=1;
			}else{
				if(strlen($fila['institucion'])>=30 && (strlen($cade)<47)){
					$this->Setancho(array(10,10,10,5));
					$cantidad_registros-=1;
				} else{
		
					
					if(strlen($fila['institucion'])<30 && (strlen($cade)>=47)){
						$this->Setancho(array(5,10,10,10));
						$this->Cell(188,5,strlen($cade).'-'.strlen($fila['institucion']),0,1);
						$cantidad_registros-=1;
					}else{ 
						$this->Setancho(array(5,5,5,5));
					}
				}
			}

			$this->SetFont('Arial','I',8);
			$this->SetWidths(array(90,20,20,60));
			$this->SetAligns(array('J','C','C','J'));
			$this->Setceldas(array(1,1,1,1));
			$consul="select * from nomguarderias where codorg=$codgu";
			$q=query($consul,$conexion);
			$resulgu=fetch_array($q);
			//$this->Setancho(array(5,5,5,5));
			$this->Row(array($fila['apellido'].', '.$fila['nombre'],$anos,$fila['sexo'],$resulgu['descrip']));
			$cantidad_registros-=1;
		}
		
		
		if($cantidad_registros==0){
			$this->Ln(300);
			$cantidad_registros=30;
		
			$this->SetFont('Arial','B',12);
			if($edad1!=$edad2){
						$this->Cell(188,5,'LISTADO DE TRABAJADORES CON HIJOS ENTRE '.$edad1.' Y '.$edad2.utf8_decode(' AÑOS'),0,1,'C');
					}else{
						$this->Cell(188,5,'LISTADO DE TRABAJADORES CON HIJOS DE '.$edad1.utf8_decode(' AÑOS'),0,1,'C');
					}
		}
		
		
		
		
		
	}
	$this->Cell(188,5,'Total de Trabajadores => '.$TOTALTRABAJADOR,0,1,'R');
	$this->Cell(188,5,'Total de Carga Familiar => '.$TOTALCARGAFAMILIAR,0,1,'R');
	
}
}
//Creación del objeto de la clase heredada
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$edad1=$_POST['edad1'];
$edad2=$_POST['edad2'];
$sexo=$_POST['sexo'];
$parentesco=$_POST['parentesco'];
$nomina=$_POST['nomina'];

$pdf->detalle($edad1,$edad2,$sexo,$parentesco,$nomina);

$pdf->Output();
?>