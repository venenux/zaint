<?php 
session_start();
ob_start();
$termino=$_SESSION['termino'];




require('fpdf.php');
include("../lib/common.php");


function fecha($value) { // fecha de YYYY/MM/DD a DD/MM/YYYY
 if ( ! empty($value) ) return substr($value,8,2) ."/". substr($value,5,2) ."/". substr($value,0,4);
}

class PDF extends FPDF
{
var $nominapdf;
function header(){
	$conexion=conexion();
	$var_sql="select * from nomempresa";
	$rs = query($var_sql,$conexion);
	$row_rs = fetch_array($rs);
	$var_encabezado=$row_rs['nom_emp'];
	
	
	$this->SetFont('Arial','',12);
	$date1=date('d/m/Y');
	$date2=date('h:i a');	

	$this->Cell(150,5,utf8_decode($var_encabezado),0,0,'L');
	$this->Cell(38,5,'Fecha:  '.$date1,0,1,'R');
	$this->Cell(150,5,'GERENCIA DE RECURSOS HUMANOS',0,0,'L');
	$this->Cell(38,5,'Hora: '.$date2,0,1,'R');
	$this->Cell(150,5,'PLAN DE PREVISION',0,1,'L');

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


function Cuentas($codcon){
	
	$conexion=conexion();
	$consulta="select * from nompersonal where tipnom='".$_SESSION['codigo_nomina']."' order by apenom";
	$resultado=query($consulta,$conexion);
	cerrar_conexion($conexion);
	// llamado para hacer multilinea sin que haga salto de linea
	
	$this->SetFont('Arial','',12);
        $this->SetWidths(array(30,100,33,25));
	$this->SetAligns(array('C','C','C','C'));
        $this->Setceldas(array('TB','TB','TB','TB'));
	$this->Setancho(array(5,5,5,5));
        $this->Row(array(utf8_decode('CÉDULA'),'APELLIDOS Y NOMBRES',utf8_decode('Nº CUENTA'),'MONTO'));
	
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

		$consulta="SELECT SUM(monto) as monto from nom_movimientos_nomina where mes=".$_GET['mes']." and anio=".$_GET['anio']." and ficha='".$fila['ficha']."' and tipnom='".$_SESSION['codigo_nomina']."' and codcon='$codcon'";
		$resultado_mov=query($consulta,$conexion);
		$fila_mov=fetch_array($resultado_mov);
		
		
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
			$this->SetAligns(array('C','L','C','R'));
        		$this->Setceldas(array(0,0,0,0));
			$this->Row(array(utf8_decode($cedula),utf8_decode($fila['apenom']),'00000000-X',number_format($fila_mov['monto'],2,',','.')));
			$total_mov+=$fila_mov['monto'];
		}
		if($conta==$cantidad_registros){
			$this->Ln(300);
			
			
			$this->SetFont('Arial','',12);
			 $this->SetWidths(array(30,100,33,25));
			$this->SetAligns(array('C','C','C','C'));
			$this->Setceldas(array('TB','TB','TB','TB'));
			$this->Setancho(array(5,5,5,5));
			$this->Row(array(utf8_decode('CÉDULA'),'APELLIDOS Y NOMBRES',utf8_decode('Nº CUENTA'),'MONTO'));
	
			$conta=0;
			// fin
			
		}
		$conta++;
		$contar++;

		
	}
	$this->Ln(2);
	
	$this->SetFont('Arial','',10);
	$this->Cell(94,5,'CANTIDAD DE PERSONAS: '.$totalwhile,0,0,'C');
	$this->Cell(94,5,'TOTAL MONTO: '.number_format($total_mov,2,',','.'),0,1,'C');
}
function Footer(){
	$this->SetY(-15);
	$this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}


}


//Creación del objeto de la clase heredada
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','Letter');
$pdf->AddFont('Sanserif','','sanserif.php');
$pdf->SetFont('Sanserif','',12);



if($_SESSION['codigo_nomina']=='1')
{
	$codcon=2065;
	//$codcon_pat=3542;
}
elseif($_SESSION['codigo_nomina']=='2')
{
	$codcon=2005;
	//$codcon_pat=3503;
}
elseif($_SESSION['codigo_nomina']=='3')
{
	$codcon=2025;
	//$codcon_pat=3522;
}
elseif($_SESSION['codigo_nomina']=='5')
{
	$codcon=2202;
	//$codcon_pat=3552;
}
elseif($_SESSION['codigo_nomina']=='6')
{
	$codcon=2302;
	//$codcon_pat=3552;
}

$pdf->nominapdf=$nomina;

$pdf->Cuentas($codcon);

$pdf->Output();
?>