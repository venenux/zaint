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
  /*      $var_izquierda='../imagenes/izquierda.jpg';
	$var_centro='../imagenes/centro.jpg';
	$var_derecha='../imagenes/derecha.jpg';
	
        $this->SetFont("Arial","B",12);
     	$this->Image($var_izquierda,25,12,80,15);
	$this->Image($var_centro,110,12,45,15);
	$this->Image($var_derecha,155,12,20,13);*/
	$this->SetFont('Arial','B',12);
     	$this->Ln(25);
	$this->Cell(188,5,'LISTADO DE TRABAJADORES CON JAMONES',0,0,'C');
	$this->Ln(10);

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

function detalle($gerencia,$nomina){

	$cadenaselect='';
	
	if($gerencia!='Todos'){
		$cadenaselect=$cadenaselect.' and codnivel4='.$gerencia;
	}
	if($nomina!='Todos'){
		$cadenaselect=$cadenaselect.' and tipnom='.$nomina;
	}
	
	$conexion=conexion();
	$consulta="select * from nompersonal AS np INNER JOIN nomcampos_adic_personal as nc ON np.ficha=nc.ficha and nc.id=50 and nc.valor='SI'  $cadenaselect  ORDER BY  tipnom,codnivel4,apenom ";
	
	$query=query($consulta,$conexion);
	
	
	$cantidad_registros=30;
	$cod_gerencia='';
	$TOTALTRABAJADOR=0;
	$cod_nomina='';
	$paso=0;
	$totalgerencia=0;
	while($fila=fetch_array($query)){
		$codg=$fila['codnivel4'];
		$codnom=$fila['tipnom'];
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
					
				}

				$this->SetFont("Arial","B",10);
				$this->Cell(188,7,utf8_decode($codnom.".- ".$nomnomina),0,1,'L');
				$cantidad_registros-=1;
				$cod_nomina=$codnom;
				$paso=0;
	
	
			}
		
		if($codg!=$cod_gerencia){
			if($totalgerencia!=0){
				$this->Ln();
				$this->SetFont('Arial','B',12);
				$this->Cell(188,5,'Total de Trabajadores => '.$totalgerencia,0,1,'R');
				$totalgerencia=0;
				$cantidad_registros-=1;
			}
			$this->Ln();
			$conexion=conexion();
			$this->SetFont("Arial","B",12);
			$consul="select * from nomnivel4 where codorg='$codg'";
			$q=query($consul,$conexion);
			$resul=fetch_array($q);
			$nomgerencia=$resul['descrip'];
			if($cantidad_registros<=3){
					$this->Ln(300);
					$cantidad_registros=30;
			}
			$this->Cell(188,5,utf8_decode($codg.".- ".$nomgerencia),0,1,'L');
			$cantidad_registros-=2;
			$cod_gerencia=$codg;
			
			$this->SetFont("Arial","I",11);
			$this->SetWidths(array(15,75,18,48,21,13));
			$this->SetAligns(array('C','C','C','C','C','C'));
			$this->Setceldas(array(1,1,1,1,1,1));
			$this->Setancho(array(5,5,5,5,5,5));
			$this->Row(array(utf8_decode('Código'),'Nombre y Apellido',utf8_decode('Cédula'),'Cargo','Fecha Ing.','Edad'));
			$paso=0;

		}
		

			if($paso==1){
				$this->SetFont("Arial","I",11);
				$this->SetWidths(array(15,75,18,48,21,13));
				$this->SetAligns(array('C','C','C','C','C','C'));
				$this->Setceldas(array(1,1,1,1,1,1));
				$this->Setancho(array(5,5,5,5,5,5));
				$this->Row(array(utf8_decode('Código'),'Nombre y Apellido',utf8_decode('Cédula'),'Cargo','Fecha Ing.','Edad'));
				$this->SetFont("Arial","I",8);
				$paso=0;
			}



			$conexion=conexion();
			$consultacargo="select * from nomcargos where cod_car='$fila[codcargo]'";
			$querycargo=query($consultacargo,$conexion);
			$fetchcargo=fetch_array($querycargo);
			
			$this->SetFont('Arial','I',8);
			$this->SetWidths(array(15,75,18,48,21,13));
			$this->SetAligns(array('C','L','L','L','C','C'));
			$this->Setceldas(array(1,1,1,1,1,1));
// 			$this->Cell(188,5,strlen($fetchcargo['des_car']),0,1);
			if(strlen(trim($fetchcargo['des_car']))>=29){
				$var=1;
			}else{
				$var=0;
			}
			//$this->Cell(188,5,strlen($ca),0,1);
			if ((strlen($fila['apenom'])>=43)&& $var==1){
				$this->Setancho(array(10,5,10,5,10,10));
				$cantidad_registros-=1;
			}
			if ((strlen($fila['apenom'])>=43)&& $var==0){
				$this->Setancho(array(10,5,10,10,10,10));
				$cantidad_registros-=1;
			}
			if ((strlen($fila['apenom'])<43)&& $var==1){
				$this->Setancho(array(10,10,10,5,10,10));
				$cantidad_registros-=1;
			}
			if ((strlen($fila['apenom'])<43)&& $var==0){
				$this->Setancho(array(5,5,5,5,5,5));
				
			}
			
			
// 			$this->Cell(188,5,$cantidad_registros,0,1);
			$anos=antiguedad($fila['fecnac'],date("Y-m-d"),"A");
			$this->Row(array($fila['ficha'],utf8_decode($fila['apenom']),number_format($fila['cedula'],0,'.','.'),utf8_decode($fetchcargo['des_car']),date("d/m/Y",strtotime($fila['fecing'])),$anos));
			$cantidad_registros-=1;
			$totalgerencia+=1;
			$TOTALTRABAJADOR+=1;
			
		
		if($cantidad_registros==0){
			
			$this->Ln(300);
			$cantidad_registros=30;
			$paso=1;
		}
		
		
		
		
		
		
	}
		
	if($totalgerencia!=0){
		$this->Ln();
		$this->SetFont('Arial','B',12);
		$this->Cell(188,5,'Total de Trabajadores => '.$totalgerencia,0,1,'R');
		$totalgerencia=0;
		$cantidad_registros-=1;
	}
// 	$this->Ln();
// 	$this->SetFont('Arial','B',12);
// 	$this->Cell(188,5,'Total de Trabajadores => '.num_rows($query),0,1,'R');
	
	
}
}
//Creación del objeto de la clase heredada
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$gerencia=$_POST['gerencia'];
$nomina=$_POST['nomina'];

$pdf->detalle($gerencia,$nomina);

$pdf->Output();
?>
