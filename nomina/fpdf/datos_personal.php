<?php
if (!isset($_SESSION)) {
  session_start();
}
require('fpdf.php');

require_once '../lib/config.php';
require_once '../lib/pdfcommon.php';
require_once '../lib/common.php';

include ("../paginas/funciones_nomina.php");


$cantidad_registros=13;

$conexion=conexion();

function fecha($value) { // fecha de YYYY/MM/DD a DD/MM/YYYY
 if ( ! empty($value) ) return substr($value,8,2) ."/". substr($value,5,2) ."/". substr($value,0,4);
}

class PDF extends FPDF
{
//Cabecera de página
function header(){

	


	$conexion=conexion();
	$var_sql="select * from nomempresa";
	$rs = query($var_sql,$conexion);
	$row_rs = fetch_array($rs);
	$var_encabezado=$row_rs['nom_emp'];
	$var_imagen_izq=$row_rs['imagen_izq'];
	
	$this->SetFont('Arial','',10);
	$date1=date("d/m/Y");
	$date2=date("h:m:s");
	if($var_imagen_izq!=''){
		$this->Image("../imagenes/".$var_imagen_izq,8,6,25);
	}
	$this->Cell(30);
	$this->Cell(120,5,utf8_decode($var_encabezado),0,0,'L');
	$this->Cell(38,5,'Fecha:  '.$date1,0,1,'R');
	$this->Cell(30);
	$this->Cell(120,5,'GERENCIA DE RECURSOS HUMANOS',0,0,'L');
	$this->Cell(38,5,'Hora: '.$date2,0,1,'R');
	$this->Ln(10);
	
	
}

//Pie de página
function Footer()
{
    //Posición: a 1,5 cm del final
    $this->SetY(-15);
   
     $this->SetFont('Arial','I',8);
    $this->Cell(0,5,utf8_decode('Página ').$this->PageNo().'/{nb}',0,1,'C');
    $this->Cell(0,5,'Elaborado Por: '.$_SESSION['nombre'],0,0,'L');

    //Número de página
   // $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
//Hacer que sea multilinea sin que haga un salto de linea
var $widths;
var $aligns;
var $celdas;
var $ancho;
var $nro_ocs;
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

function datos($ficha,$cedula){
	$conexion=conexion();
	$tipo=$_SESSION['codigo_nomina'];
	$consulta="select * from nompersonal where ficha=$ficha and cedula=$cedula and tipnom=$tipo";
	$resultado=query($consulta,$conexion);
	$rc=fetch_array($resultado);
	
	$this->SetFont('Arial','B',12);
	$this->Cell(188,5,utf8_decode('DATOS PERSONALES '),0,1,'C');
	$this->Ln(10);

	if($rc['foto']!='fotos/'){
		if(file_exists("../paginas/".$rc['foto'])){
			$this->Image("../paginas/".$rc['foto'],160,25,33);
		}else{
			$this->Image("../paginas/fotos/silueta.gif",160,30,43);
			//$this->Image("../paginas/fotos/girl2.jpg",160,30,43);
		}
	}else{
			$this->Image("../paginas/fotos/silueta.gif",160,30,43);
			//$this->Image("../paginas/fotos/girl2.jpg",160,30,43);
		}
	$this->Ln(5);
	$this->SetFont('Arial','B',12);
	$this->Cell(134,5,'FECHA DE INGRESO ',1,1,'C');
	$this->SetFont('Arial','I',10);
	$this->Cell(134,5,fecha($rc['fecing']),0,1,'C');

	$this->Cell(97,5,'APELLIDO Y NOMBRES ',1,0,'C');
	$this->Cell(37,5,utf8_decode('Nº C.I. '),1,0,'C');
	$this->Ln();
	$this->SetFont('Arial','I',10);
	// llamado para hacer multilinea sin que haga salto de linea
        $this->SetWidths(array(97,37));
	$this->SetAligns(array('L','C'));
	$this->Setceldas(array(0,0));
        
	$this->Setancho(array(5,5));
        $this->Row(array(utf8_decode($rc['apenom']),number_format($rc['cedula'],0,'.','.')));
	$query="select * from nomcargos where cod_car = '".$rc['codcargo']."'";
	$resultado1 = query($query,$conexion);
	$cargo1 = fetch_array($resultado1);
	$cargo=$cargo1['des_car'];

	$this->Ln();
	$this->SetFont('Arial','B',12);
	$this->Setceldas(array(1,1));
	$this->SetAligns(array('C','C'));
	$this->Row(array(utf8_decode('CARGO'),'FICHA'));	
	$this->SetFont('Arial','I',10);
	$this->SetAligns(array('L','C'));
	$this->Setceldas(array(0,0));
	$this->Row(array(utf8_decode($cargo),$rc['ficha']));
	
	$this->Ln();
	$this->SetWidths(array(64,64,64));
	$this->SetAligns(array('C','C','C'));
        $this->Setancho(array(5,5,5));
	$this->SetFont('Arial','B',12);
	$this->Setceldas(array(1,1,1));
	$this->Row(array(utf8_decode('NACIONALIDAD'),'SEXO','ESTADO CIVIL'));	
	$this->SetFont('Arial','I',10);
	$this->Setceldas(array(0,0,0));
	if($rc[nacionalidad]==0){
		$nacio='Venezolano';
	}Else{
		$nacio='Extranjero';
	}
	$this->Row(array(utf8_decode($nacio),$rc['sexo'],$rc['estado_civil']));
	
	$this->Ln();
	$this->SetWidths(array(64,64,64));
	$this->SetAligns(array('C','C','C'));
        $this->Setancho(array(5,5,5));
	$this->SetFont('Arial','B',12);
	$this->Setceldas(array(1,1,1));
	$this->Row(array(utf8_decode('FECHA DE NACIMIENTO'),'EDAD','LUGAR DE NACIMIENTO'));	
	$this->SetFont('Arial','I',10);
	$this->Setceldas(array(0,0,0));
	$edad=antiguedad($rc['fecnac'],date('Y-m-d'),"A");
	$this->Row(array(fecha($rc['fecnac']),$edad,$rc['lugarnac']));

	$this->Ln();
	$this->SetWidths(array(64,64,64));
	$this->SetAligns(array('C','C','C'));
        $this->Setancho(array(5,5,5));
	$this->SetFont('Arial','B',12);
	$this->Setceldas(array(1,1,1));
	$this->Row(array(utf8_decode('SERVICIO INSTITUCION'),utf8_decode('SERVICIO ADM. PUBLICA'),utf8_decode('TOTAL AÑOS SERVICIOS')));	
	$this->SetFont('Arial','I',10);
	$this->Setceldas(array(0,0,0));
	$edad=antiguedad($rc['fecnac'],date('Y-m-d'),"A");
	$this->Row(array(antiguedad($rc['fecing'],date("Y-m-d"),"A").utf8_decode(" Años"),$rc['antiguedadap'].utf8_decode(" Años"),($rc['antiguedadap']+antiguedad($rc['fecing'],date("Y-m-d"),"A")).utf8_decode(" Años")));


	$this->Ln();
	$this->SetWidths(array(64,64,64));
	$this->SetAligns(array('C','C','C'));
        $this->Setancho(array(5,5,5));
	$this->SetFont('Arial','B',12);
	$this->Setceldas(array(1,1,1));
	$this->Row(array(utf8_decode('PROFESIÓN '),utf8_decode('TELÉFONO'),'EMAIL'));	
	$this->SetFont('Arial','I',10);
	$this->Setceldas(array(0,0,0));
	$cod_prof=$rc['codpro'];
	$query="select codorg,descrip from nomprofesiones where codorg=$cod_prof";
	$result=query($query,$conexion);
	$rp=fetch_array($result);
	$this->Row(array(utf8_decode($rp['descrip']),utf8_decode($rc['telefonos']),utf8_decode($rc['email'])));
	
	$this->Ln();
	$this->SetFont('Arial','B',12);
	$this->Cell(192,5,utf8_decode('DIRECCIÓN'),1,1,'C');
	$this->SetFont('Arial','I',10);
	$this->MultiCell(192,5,utf8_decode($rc['direccion']),0,'L');

}

function logros($cedula){
	$conexion=conexion();
	$this->Ln(300);
	$query="select * from nomexpediente where cedula='$cedula' and tipo_registro='Logros' ORDER BY tipo_tiporegistro,fecha_salida ";
	$resex=query($query,$conexion);
	$this->Ln(5);
	$this->SetFont('Arial','B',12);
	$this->Cell(188,5,'LOGROS',0,1,'C');
	$this->SetFont('Arial','I',12);
	$this->Ln(10);
	$cantidad_registros=28;
	$totalwhile=num_rows($resex);
	$contar=1;
	$conta=1;
	$anterior=0;
	while($totalwhile>=$contar)
	{
		
		$fila=fetch_array($resex);
		if($anterior!=$fila['tipo_tiporegistro']){
			$anterior=$fila['tipo_tiporegistro'];
			$ti="select * from nomaumentos where codlogro=$anterior";
			$re=query($ti,$conexion);
			$rre=fetch_array($re);
			$this->SetFont('Arial','B',12);
			$this->Ln(5);
			$this->Cell(188,5,$rre['descrip'],0,1,'L');
			$this->Ln(5);
			$this->SetFont('Arial','I',12);
			$cantidad_registros-=1;
			$conta=1;
		}
		
		$this->SetFont('Arial','',12);
		$this->MultiCell(188,5,$conta.'.- ( '.fecha($fila['fecha_salida']).' ) '.utf8_decode($fila['descripcion']),0,'J');
		if($conta==$cantidad_registros){
			$this->Ln(300);
			
			$this->SetFont('Arial','',12);
			$this->Cell(188,5,'LOGROS',0,1,'C');
			
			
		}
		$conta++;
		$contar++;

		
	}

}

function observacion($cedula){
	$conexion=conexion();
	$this->Ln(300);
	$query="select * from nomexpediente where cedula='$cedula' and tipo_registro='Observacion' ORDER BY fecha_salida ";
	$resex=query($query,$conexion);
	$this->Ln(5);
	$this->SetFont('Arial','B',12);
	$this->Cell(188,5,'OBSERVACIONES',0,1,'C');
	$this->SetFont('Arial','I',12);
	$this->Ln(10);
	$cantidad_registros=28;
	$totalwhile=num_rows($resex);
	$contar=1;
	$conta=1;
	$anterior=0;
	while($totalwhile>=$contar)
	{
		
		$fila=fetch_array($resex);
	
		
		$this->SetFont('Arial','',12);
		$this->MultiCell(188,5,$conta.'.- ( '.fecha($fila['fecha_salida']).' ) '.utf8_decode($fila['descripcion']),0,'J');
		if($conta==$cantidad_registros){
			$this->Ln(300);
			
			$this->SetFont('Arial','',12);
			$this->Cell(188,5,'OBSERVACIONES',0,1,'C');
			
			
		}
		$conta++;
		$contar++;

		
	}

}


}


//Creación del objeto de la clase heredada
$pdf=new PDF('P','mm','Letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$ficha=$_GET['ficha'];
$cedula=$_GET['cedula'];
$conexion=conexion();
$pdf->datos($ficha,$cedula);
$pdf->logros($cedula);
$pdf->observacion($cedula);

$pdf->Output();
?>