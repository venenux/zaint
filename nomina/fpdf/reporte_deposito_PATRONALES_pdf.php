<?php 
session_start();
ob_start();
$termino=$_SESSION['termino'];




require('fpdf.php');
include("../lib/common.php");
include("../lib/pdf.php");


function fecha($value) { // fecha de YYYY/MM/DD a DD/MM/YYYY
 if ( ! empty($value) ) return substr($value,8,2) ."/". substr($value,5,2) ."/". substr($value,0,4);
}

class PDF extends FPDF
{
var $nominapdf;
var $fpdf;
function header(){
	$conexion=conexion();
	$var_sql="select * from nomempresa";
	$rs = query($var_sql,$conexion);
	$row_rs = fetch_array($rs);
	$var_encabezado=$row_rs['nom_emp'];
	
	$consulta="select * from nomconceptos WHERE codcon=$_GET[conceptod]";
	$resultado33=query($consulta,$conexion);
	$fetch33 = fetch_array($resultado33);
	
	$this->SetFont('Arial','',12);
	$date1=date('d/m/Y');
	$date2=date('h:i a');	

	$this->Cell(150,5,utf8_decode($var_encabezado),0,0,'L');
	$this->Cell(38,5,'Fecha:  '.$date1,0,1,'R');
	$this->Cell(150,5,'RECURSOS HUMANOS',0,0,'L');
	$this->Cell(38,5,'Hora: '.$date2,0,1,'R');
	$this->Cell(150,5,$fetch33['descrip'],0,1,'L');

	if(strlen($_GET['mes'])==1)
	$MES.="0".$_GET['mes'];
else
	$MES=$_GET['mes'];
$ANIO=$_GET['anio'];
	
		
	$this->Cell(188,8,'RELACION DE APORTES DEL '.$MES."/".$ANIO,0,1,'C');
	
	
	if($this->nomina==3){
		$this->Cell(188,8,'NOMINA DE '.$_SESSION['nomina'].' SEMANAL',0,1,'C');
	}else{
     		$this->Cell(188,8,'NOMINA DE '.$_SESSION['nomina'].' ',0,1,'C');
	}
	$this->Ln(5);
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


function Cuentas($codcon,$codcon_pat,$pdf){
	$this->fpdf=$pdf;
	if($codcon==2001)
	{
		$codconvac=2016;
		$codconreivac=2025;
		$codconvacpat=3581;
		$codconreivacpat=3585;
	}
	elseif($codcon==2002)
	{
		$codconvac=2017;
		$codconreivac=2026;
		$codconvacpat=3582;
		$codconreivacpat=3586;
	}
	elseif($codcon==2003)
	{
		$codconvac=2018;
		$codconreivac=2027;
		$codconvacpat=3583;
		$codconreivacpat=3587;
	}
	elseif($codcon==2005)
	{
		$codconvac=2022;
		$codconreivac=2028;
		$codconvacpat=3584;
		$codconreivacpat=3589;
		$conpretamo=2007;
	}
	
	$conexion=conexion();
	$consulta="select * from nompersonal where tipnom='".$_SESSION['codigo_nomina']."' and estado<>'Egresado' order by ficha";
	$resultado=query($consulta,$conexion);
	cerrar_conexion($conexion);
	// llamado para hacer multilinea sin que haga salto de linea
	
	$this->SetFont('Arial','',12);
        $this->SetWidths(array(90,25,25,20,20,20));
	$this->SetAligns(array('C','C','C','C','C','C'));
        $this->Setceldas(array('TB','TB','TB','TB','TB','TB'));
	$this->Setancho(array(5,5,5,5,5,5));
        $this->Row(array('APELLIDOS Y NOMBRES',utf8_decode('CÉDULA'),'INGRESO','TRAB.','INST.','TOTAL'));
	
	// fin

	$cantidad_registros=33;
	$totalwhile=num_rows($resultado);
	$contar=1;
	$conta=1;
	$total_mov=$total_mov_pat=0;
	while($totalwhile>=$contar)
	{
		$this->SetFont('Arial','',10);
		$conexion=conexion();
		$fila=fetch_array($resultado);
		
		if($codcon==2005)
		{
			$consulta="SELECT SUM(monto) as monto from nom_movimientos_nomina where mes=".$_GET['mes']." and anio=".$_GET['anio']." and ficha='".$fila['ficha']."' and tipnom='".$_SESSION['codigo_nomina']."' and (codcon='$codcon' or codcon='$codconvac' or codcon='$codconreivac' or codcon='$conpretamo')";
			$resultado_mov=query($consulta,$conexion);
			$fila_mov=fetch_array($resultado_mov);
		}
		else
		{
			$consulta="SELECT SUM(monto) as monto from nom_movimientos_nomina where mes=".$_GET['mes']." and anio=".$_GET['anio']." and ficha='".$fila['ficha']."' and tipnom='".$_SESSION['codigo_nomina']."' and (codcon='$codcon' or codcon='$codconvac' or codcon='$codconreivac')";
			$resultado_mov=query($consulta,$conexion);
			$fila_mov=fetch_array($resultado_mov);
		}
		
		$consulta="SELECT SUM(monto) as monto from nom_movimientos_nomina where mes=".$_GET['mes']." and anio=".$_GET['anio']." and ficha='".$fila['ficha']."' and tipnom='".$_SESSION['codigo_nomina']."' and (codcon='$codcon_pat' or codcon='$codconvacpat' or codcon='$codconreivacpat')";
		$resultado_mov_pat=query($consulta,$conexion);
		$fila_mov_pat=fetch_array($resultado_mov_pat);	
		if($fila_mov['monto']!=0)
		{
			$cedula="";
			if($fila['nacionalidad']==0)
				$cedula.="V-";
			else
				$cedula.="E-";
			
			if(strlen($fila['cedula'])==6)
			{
				$cedula.="00";
			}
			elseif(strlen($fila['cedula'])==7)
			{
				$cedula.="0";
			}
			
			$cedula.=$fila['cedula'];
			$this->SetAligns(array('L','C','C','C','C','R'));
        		$this->Setceldas(array(0,0,0,0,0,0));
			$this->Row(array($fila['apenom'],$cedula,fecha($fila['fecing']),number_format($fila_mov['monto'],2,',','.'),number_format($fila_mov_pat['monto'],2,',','.'),number_format($fila_mov['monto']+$fila_mov_pat['monto'],2,',','.')));
			$total_mov+=$fila_mov['monto'];
			$total_mov_pat+=$fila_mov_pat['monto'];
		}
		if($conta==$cantidad_registros){
			$this->Ln(300);
			
			$this->SetFont('Arial','',12);
			$this->SetWidths(array(90,25,25,15,20,20));
			$this->SetAligns(array('C','C','C','C','C','C'));
			$this->Setceldas(array('TB','TB','TB','TB','TB','TB'));
			$this->Setancho(array(5,5,5,5,5,5));
			$this->Row(array('APELLIDOS Y NOMBRES',utf8_decode('CÉDULA'),'INGRESO','TRAB.','INST.','TOTAL'));
			$conta=0;
			// fin
			
		}
		$conta++;
		$contar++;

		
	}
	$this->Ln(2);
	
	$this->SetFont('Arial','',10);
	$this->Cell(62,5,'CANTIDAD DE PERSONAS: '.$totalwhile,0,1,'C');
	$this->Cell(62,5,'TOTAL TRABAJADOR: '.number_format($total_mov,2,',','.'),0,0,'C');
	$this->Cell(62,5,'TOTAL EMPRESA: '.number_format($total_mov_pat,2,',','.'),0,0,'C');
	$this->Cell(63,5,'TOTAL MONTO: '.number_format($total_mov+$total_mov_pat,2,',','.'),0,1,'C');
	
}

function Footer()
{

	

    	$this->SetFont('Arial','I',8);
    	$this->Cell(0,5,'Elaborado Por: '.$_SESSION['nombre'],0,1,'L');
	$this->Cell(0,5,utf8_decode('Página ').$this->PageNo().'/{nb}',0,1,'C');
	
}
function finalizar(){

	$bool=validar_firma("PATRONALES");
	if ($bool==true){
		//firma_dinamica("ODP".$this->tipo,$this->pdff,6,10);
	}else{
		patronales($this->fpdf);
	}
}

}


//Creación del objeto de la clase heredada
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','Letter');
$pdf->AddFont('Sanserif','','sanserif.php');
$pdf->SetFont('Sanserif','',12);

$codcon=$_GET['conceptod'];
$codcon_pat=$_GET['conceptop'];

$pdf->nominapdf=$nomina;

$pdf->Cuentas($codcon,$codcon_pat,$pdf);
$pdf->finalizar();
$pdf->Output();
?>