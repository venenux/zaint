<?php 
if (!isset($_SESSION)) {
  session_start();
}
require('fpdf.php');
require_once '../lib/config.php';
require_once '../lib/common.php';

include('numerosALetras.class.php');

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
	$this->Image($var_centro,110,12,45,15);
	$this->Image($var_derecha,155,12,20,13);
	$this->SetFont('Arial','B',12);
     	$this->Ln(25);
	$this->Cell(188,5,'LISTADO DE TRABAJADORES CON UNIFORMES',0,0,'C');
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

function detalle($edad1,$edad2,$sexo,$especialidad){

	$cadenaselect='';
	if($sexo!='Todos'){
		$cadenaselect=$cadenaselect." and np.sexo='".$sexo."'";
	}
	
	if($especialidad!='Todos'){
		$cadenaselect=$cadenaselect." and np.codcargo='".$especialidad."'";
	}

	$conexion=conexion();
	
	 $consulta="select * from nompersonal as np where np.estado='Activo' and np.tipnom=$_SESSION[codigo_nomina] $cadenaselect group by np.codcargo ORDER BY np.codnivel4,np.apenom ";
	
	
	$query=query($consulta,$conexion);
	
	
	$cantidad_registros=30;
	$cod_gerencia='';
	$cod_especialidad='';
	// S(0) M(1) L(2) XL(3) XLL(4)
	$tallacamisa=array(0,1,2,3,4);
	// S(0) M(1) L(2) XL(3) XLL(4)
	$tallachaqueta=array(0,1,2,3,4);
	// S(0) M(1) L(2) XL(3) XLL(4)
	$tallabata=array(0,1,2,3,4);
	// 28(0) 30(1) 32(2) 34(3) 36(4) 38(5) 40(6) 42(7) 44(8) 46(9) 48(10)
	$tallapantalon=array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15);
	// 28(0) 30(1) 32(2) 34(3) 36(4) 38(5) 40(6) 42(7) 44(8) 46(9) 48(10)
	$tallamono=array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15);
	// 30(0) 31(1) 32(2) 33(3) 34(4) 35(5) 36(6) 37(7) 38(8) 39(9) 40(10) 41(11) 42(12) 43(13) 44(14) 45(15) 46(16) 47(17) 48(18)
	$tallazapato=array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18);

	for($i=0;$i<=18;$i++){
		$tallacamisa[$i]=0;
		$tallabata[$i]=0;
		$tallachaqueta[$i]=0;
		$tallamono[$i]=0;
		$tallapantalon[$i]=0;
		$tallazapato[$i]=0;
	}


	while($fila=fetch_array($query)){
		$codg=$fila['codnivel4'];
		$code=$fila['codcargo'];
		$conexion=conexion();
		$conadic="select * from nomcampos_adic_personal where ficha='$fila[ficha]' and np.estado='Activo' and (id=19 or id=20 or id=47 or id=21 or id=48 or id=49) and tiponom=$_SESSION[codigo_nomina] ";
		$que=query($conadic,$conexion);

		if($codg!=$cod_gerencia){
			$this->Ln(5);
			$conexion=conexion();
			$this->SetFont("Arial","B",12);
			$consul="select * from nomnivel4 where codorg=$codg";
			$q=query($consul,$conexion);
			$resul=fetch_array($q);
			$nomgerencia=$resul['descrip'];
			if($cantidad_registros<=3){
					$this->Ln(300);
					$cantidad_registros=30;
			}
			$this->Cell(188,5,utf8_decode($codg.".- ".$nomgerencia),0,1,'L');
			$cantidad_registros-=1;
			$cod_gerencia=$codg;


		}
		if($code!=$cod_especialidad){
			$conexion=conexion();
			$this->Ln(5);
			$this->SetFont("Arial","B",12);
			$consul="select * from nomcargos where cod_car='$code'";
			$qe=query($consul,$conexion);
			$resule=fetch_array($qe);
			$nomcargos=$resule['des_car'];
			if($cantidad_registros<=3){
					$this->Ln(300);
					$cantidad_registros=30;
			}
			$this->Cell(188,5,"          ".utf8_decode($nomcargos),0,1,'L');
			
			$cod_especialidad=$code;
			$this->SetFont("Arial","I",12);
			$cantidad_registros-=2;
			
			$this->SetFont("Arial","I",11);
			$this->SetWidths(array(15,73,18,18,18,19,12,12));
			$this->SetAligns(array('C','C','C','C','C','C','C','C'));
			$this->Setceldas(array(1,1,1,1,1,1,1,1));
			$this->Setancho(array(5,5,5,5,5,5,5,5));
			if(num_rows($que)!=0){
				$this->Row(array(utf8_decode('Código'),'Nombre y Apellido','Camisa','Patalon','Calzado','Chaqueta','Bata','Mono'));
			}
		}

		

		
			$this->SetFont('Arial','I',8);
			$this->SetWidths(array(15,73,18,18,18,19,12,12));
			$this->SetAligns(array('C','C','C','C','C','C','C','C'));
			$this->Setceldas(array(1,1,1,1,1,1,1,1));
			$this->Setancho(array(5,5,5,5,5,5,5,5));
			if(num_rows($que)!=0){
			while($adicional=fetch_array($que)){
				switch($adicional['id']){
					case 19: $camisa=$adicional['valor']; 
						
						switch($camisa){
							case 'S': $tallacamisa[0]=$tallacamisa[0]+1;break;
							case 'M' : $tallacamisa[1]=$tallacamisa[1]+1;break;
							case 'L' : $tallacamisa[2]=$tallacamisa[2]+1;break;
							case 'XL': $tallacamisa[3]=$tallacamisa[3]+1;break;
							case 'XXL' : $tallacamisa[4]+=$tallacamisa[4]+1;break;
	
						}
					break;
					case 20: $pantalon=$adicional['valor']; 
						switch($pantalon){
							case '28': $tallapantalon[0]+=1;break;
							case '30': $tallapantalon[1]+=1;break;
							case '32': $tallapantalon[2]+=1;break;
							case '34': $tallapantalon[3]+=1;break;
							case '36': $tallapantalon[4]+=1;break;
							case '38': $tallapantalon[5]+=1;break;
							case '40': $tallapantalon[6]+=1;break;
							case '42': $tallapantalon[7]+=1;break;
							case '44': $tallapantalon[8]+=1;break;
							case '46': $tallapantalon[9]+=1;break;
							case '48': $tallapantalon[10]+=1;break;
	
						}
					break;
					case 47: $chaqueta=$adicional['valor']; 
						switch($chaqueta){
							case 'S' : $tallachaqueta[0]+=1;break;
							case 'M' : $tallachaqueta[1]+=1;break;
							case 'L' : $tallachaqueta[2]+=1;break;
							case 'XL' : $tallachaqueta[3]+=1;break;
							case 'XXL' : $tallachaqueta[4]+=1;break;
	
						}
					break;
					case 21: $calzado=$adicional['valor']; 
						switch($calzado){
							case '30': $tallazapato[0]+=1;break;
							case '31': $tallazapato[1]+=1;break;
							case '32': $tallazapato[2]+=1;break;
							case '33': $tallazapato[3]+=1;break;
							case '34': $tallazapato[4]+=1;break;
							case '35': $tallazapato[5]+=1;break;
							case '36': $tallazapato[6]+=1;break;
							case '37': $tallazapato[7]+=1;break;
							case '38': $tallazapato[8]+=1;break;
							case '39': $tallazapato[9]+=1;break;
							case '40': $tallazapato[10]+=1;break;
							case '41': $tallazapato[11]+=1;break;
							case '42': $tallazapato[12]+=1;break;
							case '43': $tallazapato[13]+=1;break;
							case '44': $tallazapato[14]+=1;break;
							case '45': $tallazapato[15]+=1;break;
							case '46': $tallazapato[16]+=1;break;
							case '47': $tallazapato[17]+=1;break;
							case '48': $tallazapato[18]+=1;break;
							
	
						}
					break;
					case 48: $bata=$adicional['valor'];
						switch($bata){
							case 'S' : $tallabata[0]+=1;break;
							case 'M' : $tallabata[1]+=1;break;
							case 'L' : $tallabata[2]+=1;break;
							case 'XL' : $tallabata[3]+=1;break;
							case 'XXL' : $tallabata[4]+=1;break;
	
						}
					break;
					case 49: $mono=$adicional['valor']; 
						switch($mono){
							case '28': $tallamono[0]+=1;break;
							case '30': $tallamono[1]+=1;break;
							case '32': $tallamono[2]+=1;break;
							case '34': $tallamono[3]+=1;break;
							case '36': $tallamono[4]+=1;break;
							case '38': $tallamono[5]+=1;break;
							case '40': $tallamono[6]+=1;break;
							case '42': $tallamono[7]+=1;break;
							case '44': $tallamono[8]+=1;break;
							case '46': $tallamono[9]+=1;break;
							case '48': $tallamono[10]+=1;break;
	
						}
					break;
				}
			}
			}
			if(num_rows($que)!=0){
				$this->Row(array($fila['ficha'],$fila['apenom'],$camisa,$pantalon,$calzado,$chaqueta,$bata,$mono));
				$cantidad_registros-=1;
			}
			
			
		
		if($cantidad_registros==0){
			$this->Ln(300);
			$cantidad_registros=30;
		}
		
		
		
		
		
		
	}
	$this->Ln(300);
	$this->SetFont("Arial","B",11);
	$this->Cell(188,5,'TOTALES TALLAS CAMISA',0,1,'C');
	$this->SetWidths(array(37,37,37,37,37));
	$this->SetAligns(array('C','C','C','C','C'));
	$this->Setceldas(array(1,1,1,1,1));
	$this->Setancho(array(5,5,5,5,5));
	$this->Row(array('S','M','L','XL','XXL'));
	$this->SetFont("Arial","I",11);
	$this->Row(array($tallacamisa[0],$tallacamisa[1],$tallacamisa[2],$tallacamisa[3],$tallacamisa[4]));
	$this->Ln(10);
	$this->SetFont("Arial","B",11);
	$this->Cell(188,5,'TOTALES TALLAS CHAQUETA',0,1,'C');
	$this->Row(array('S','M','L','XL','XXL'));
	$this->SetFont("Arial","I",11);
	$this->Row(array($tallachaqueta[0],$tallachaqueta[1],$tallachaqueta[2],$tallachaqueta[3],$tallachaqueta[4]));
	$this->Ln(10);
	$this->SetFont("Arial","B",11);
	$this->Cell(188,5,'TOTALES TALLAS BATAS',0,1,'C');
	$this->Row(array('S','M','L','XL','XXL'));
	$this->SetFont("Arial","I",11);
	$this->Row(array($tallabata[0],$tallabata[1],$tallabata[2],$tallabata[3],$tallabata[4]));

	$this->Ln(10);
	$this->SetFont("Arial","B",11);
	$this->Cell(188,5,'TOTALES TALLAS PANTALON',0,1,'C');
	$this->Row(array('28','30','32','34','36'));
	$this->SetFont("Arial","I",11);
	$this->Row(array($tallapantalon[0],$tallapantalon[1],$tallapantalon[2],$tallapantalon[3],$tallapantalon[4]));$this->Ln();
	$this->SetFont("Arial","B",11);
	$this->Row(array('38','40','42','44','46'));
	$this->SetFont("Arial","I",11);
	$this->Row(array($tallapantalon[5],$tallapantalon[6],$tallapantalon[7],$tallapantalon[8],$tallapantalon[9]));$this->Ln();
	$this->Setceldas(array(1));
	$this->SetFont("Arial","B",11);
	$this->Row(array('38'));
	$this->SetFont("Arial","I",11);
	$this->Row(array($tallapantalon[10]));

	$this->Ln(10);
	$this->SetFont("Arial","B",11);
	$this->Cell(188,5,'TOTALES TALLAS MONOS',0,1,'C');
	$this->Setceldas(array(1,1,1,1,1));
	$this->Row(array('28','30','32','34','36'));
	$this->SetFont("Arial","I",11);
	$this->Row(array($tallamono[0],$tallamono[1],$tallamono[2],$tallamono[3],$tallamono[4]));
	$this->Ln();
	$this->SetFont("Arial","B",11);
	$this->Row(array('38','40','42','44','46'));
	$this->SetFont("Arial","I",11);
	$this->Row(array($tallamono[5],$tallamono[6],$tallamono[7],$tallamono[8],$tallamono[9]));
	$this->Ln();
	$this->Setceldas(array(1));
	$this->SetFont("Arial","B",11);
	$this->Row(array('38'));
	$this->SetFont("Arial","I",11);
	$this->Row(array($tallamono[10]));
	$this->Ln(300);
	$this->SetFont("Arial","B",11);
	$this->Cell(188,5,'TOTALES TALLAS CALZADOS',0,1,'C');
	$this->Setceldas(array(1,1,1,1,1));
	$this->Row(array('30','31','32','33','34'));
	$this->SetFont("Arial","I",11);
	$this->Row(array($tallazapato[0],$tallazapato[1],$tallazapato[2],$tallazapato[3],$tallazapato[4]));
	$this->Ln();
	$this->SetFont("Arial","B",11);
	$this->Row(array('35','36','37','38','39'));
	$this->SetFont("Arial","I",11);
	$this->Row(array($tallazapato[5],$tallazapato[6],$tallazapato[7],$tallazapato[8],$tallazapato[9]));
	$this->Ln();
	$this->SetFont("Arial","B",11);
	$this->Row(array('40','41','42','43','44'));
	$this->SetFont("Arial","I",11);
	$this->Row(array($tallazapato[10],$tallazapato[11],$tallazapato[12],$tallazapato[13],$tallazapato[14]));
	$this->Ln();
	$this->Setceldas(array(1,1,1,1));
	$this->SetFont("Arial","B",11);
	$this->Row(array('45','46','47','48'));
	$this->SetFont("Arial","I",11);
	$this->Row(array($tallazapato[15],$tallazapato[16],$tallazapato[17],$tallazapato[18],$tallazapato[19]));
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
$especialidad=$_POST['especialidad'];

$pdf->detalle($edad1,$edad2,$sexo,$especialidad);

$pdf->Output();
?>