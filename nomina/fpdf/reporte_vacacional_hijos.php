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
	$this->Cell(188,5,'PLAN VACACIONAL',0,1,'C');
	

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

	// S(0) M(1) L(2) XL(3) XLL(4)
	$tallacamisaf=array(0,1,2,3,4);
	// 28(0) 30(1) 32(2) 34(3) 36(4) 38(5) 40(6) 42(7) 44(8) 46(9) 48(10)
	$tallamonof=array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15);

	// S(0) M(1) L(2) XL(3) XLL(4)
	$tallacamisam=array(0,1,2,3,4);
	// 28(0) 30(1) 32(2) 34(3) 36(4) 38(5) 40(6) 42(7) 44(8) 46(9) 48(10)
	$tallamonom=array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15);

	for($i=0;$i<=15;$i++){
		$tallacamisaf[$i]=0;
		$tallacamisam[$i]=0;
		$tallamonof[$i]=0;
		$tallamonom[$i]=0;
		
	}

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

	$consulta="select * from nompersonal as np INNER JOIN nomfamiliares as nf ON np.ficha=nf.ficha and nf.cedula=np.cedula and np.estado='Activo'  $cadenaselect ORDER BY np.tipnom,np.codnivel4,np.apenom";
	
	$query=query($consulta,$conexion);
	
	
	$cantidad_registros=30;
	$cod_gerencia='';
	$cod_persona='';
	$cod_nomina='';
	$TOTALTRABAJADOR=0;
	$TOTALCARGAFAMILIAR=0;
	$totalfemenino=0;
	$totalmasculino=0;
	while($fila=fetch_array($query)){
		$codg=$fila['codnivel4'];
		$codper=$fila['ficha'];
		$codnom=$fila['tipnom'];
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
				$ca='('.$fila['ficha'].')'.utf8_decode($fila['apenom']).utf8_decode(' - Cédula: ').number_format($fila['cedula'],0,'.','.').' -  Cargo: '.$rc['des_car'];
				$TOTALTRABAJADOR+=1;

				if(strlen($ca)>140){
					$cantidad_registros-=1;
				}
				$this->MultiCell(188,5,$ca,0,'L');
				
				
				$cantidad_registros-=2;
				$cod_persona=$codper;
				$this->SetFont("Arial","I",10);
				$this->SetWidths(array(75,18,35,30,30));
				$this->SetAligns(array('C','C','C','C','C'));
				$this->Setceldas(array(1,1,1,1,1));
				$this->Setancho(array(5,5,5,5,5));
				$this->Row(array('Nombre y Apellido','Edad','Sexo','Franela','Mono'));
			}
		}
		
		if($anos>=$edad1 && $anos<=$edad2){
			$this->SetFont('Arial','I',8);
			$this->SetWidths(array(75,18,35,30,30));
			$this->SetAligns(array('L','C','C','C','C'));
			$this->Setceldas(array(1,1,1,1,1));
			$this->Setancho(array(5,5,5,5,5));
			$cade=$fila['apellido'].', '.$fila['nombre'];
			//$this->Cell(188,5,strlen($cade),0,1);
			if(strlen($cade)>=43){
				$this->Setancho(array(5,10,10,10,10));
				$cantidad_registros-=1;
			}
			$TOTALCARGAFAMILIAR+=1;
			
			$this->Row(array($fila['apellido'].', '.$fila['nombre'],$anos,$fila['sexo'],$fila['tallafranela'],$fila['tallamono']));
			if(trim($fila['sexo'])=='Femenino'){
				switch($fila['tallafranela']){
					case 'S': $tallacamisaf[0]=$tallacamisaf[0]+1;break;
					case 'M' : $tallacamisaf[1]=$tallacamisaf[1]+1;break;
					case 'L' : $tallacamisaf[2]=$tallacamisaf[2]+1;break;
					case 'XL': $tallacamisaf[3]=$tallacamisaf[3]+1;break;
					case 'XXL' : $tallacamisaf[4]+=$tallacamisaf[4]+1;break;
		
				}
				switch($fila['tallamono']){
					case '28': $tallamonof[0]+=1;break;
					case '30': $tallamonof[1]+=1;break;
					case '32': $tallamonof[2]+=1;break;
					case '34': $tallamonof[3]+=1;break;
					case '36': $tallamonof[4]+=1;break;
					case '38': $tallamonof[5]+=1;break;
					case '40': $tallamonof[6]+=1;break;
					case '42': $tallamonof[7]+=1;break;
					case '44': $tallamonof[8]+=1;break;
					case '46': $tallamonof[9]+=1;break;
					case '48': $tallamonof[10]+=1;break;
				}
				$totalfemenino+=1;
			}
			if(trim($fila['sexo'])=='Masculino'){
				switch($fila['tallafranela']){
					case 'S': $tallacamisam[0]=$tallacamisam[0]+1;break;
					case 'M' : $tallacamisam[1]=$tallacamisam[1]+1;break;
					case 'L' : $tallacamisam[2]=$tallacamisam[2]+1;break;
					case 'XL': $tallacamisam[3]=$tallacamisam[3]+1;break;
					case 'XXL' : $tallacamisam[4]+=$tallacamisam[4]+1;break;
		
				}
				switch($fila['tallamono']){
					case '28': $tallamonom[0]+=1;break;
					case '30': $tallamonom[1]+=1;break;
					case '32': $tallamonom[2]+=1;break;
					case '34': $tallamonom[3]+=1;break;
					case '36': $tallamonom[4]+=1;break;
					case '38': $tallamonom[5]+=1;break;
					case '40': $tallamonom[6]+=1;break;
					case '42': $tallamonom[7]+=1;break;
					case '44': $tallamonom[8]+=1;break;
					case '46': $tallamonom[9]+=1;break;
					case '48': $tallamonom[10]+=1;break;
				}
				$totalmasculino+=1;

			}
			


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
	$this->Ln();
	$this->SetFont('Arial','B',12);
	$this->Cell(188,5,'Total de Trabajadores => '.$TOTALTRABAJADOR,0,1,'R');
	$this->Cell(188,5,'Total de Carga Familiar => '.$TOTALCARGAFAMILIAR,0,1,'R');
	$this->Ln(300);
	$this->SetFont("Arial","B",11);
	$this->Cell(188,5,utf8_decode('Total de Niñas => ').$totalfemenino,0,1,'R');
	$this->Ln(10);
	$this->Cell(188,5,utf8_decode('TOTALES TALLAS FRANELA NIÑAS'),0,1,'C');
	$this->SetWidths(array(37,37,37,37,37));
	$this->SetAligns(array('C','C','C','C','C'));
	$this->Setceldas(array(1,1,1,1,1));
	$this->Setancho(array(5,5,5,5,5));
	$this->Row(array('S','M','L','XL','XXL'));
	$this->SetFont("Arial","I",11);
	$this->Row(array($tallacamisaf[0],$tallacamisaf[1],$tallacamisaf[2],$tallacamisaf[3],$tallacamisaf[4]));

	$this->Ln(10);
	$this->SetFont("Arial","B",11);
	$this->Cell(188,5,utf8_decode('TOTALES TALLAS MONOS NIÑAS'),0,1,'C');
	$this->Setceldas(array(1,1,1,1,1));
	$this->Row(array('28','30','32','34','36'));
	$this->SetFont("Arial","I",11);
	$this->Row(array($tallamonof[0],$tallamonof[1],$tallamonof[2],$tallamonof[3],$tallamonof[4]));
	$this->Ln(10);
	$this->SetFont("Arial","B",11);
	$this->Cell(188,5,utf8_decode('Total de Niños => ').$totalmasculino,0,1,'R');
	$this->Ln(10);
	$this->Cell(188,5,utf8_decode('TOTALES TALLAS FRANELA NIÑOS'),0,1,'C');
	$this->SetWidths(array(37,37,37,37,37));
	$this->SetAligns(array('C','C','C','C','C'));
	$this->Setceldas(array(1,1,1,1,1));
	$this->Setancho(array(5,5,5,5,5));
	$this->Row(array('S','M','L','XL','XXL'));
	$this->SetFont("Arial","I",11);
	$this->Row(array($tallacamisam[0],$tallacamisam[1],$tallacamisam[2],$tallacamisam[3],$tallacamisam[4]));

	$this->Ln(10);
	$this->SetFont("Arial","B",11);
	$this->Cell(188,5,utf8_decode('TOTALES TALLAS MONOS NIÑOS'),0,1,'C');
	$this->Setceldas(array(1,1,1,1,1));
	$this->Row(array('28','30','32','34','36'));
	$this->SetFont("Arial","I",11);
	$this->Row(array($tallamonom[0],$tallamonom[1],$tallamonom[2],$tallamonom[3],$tallamonom[4]));
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