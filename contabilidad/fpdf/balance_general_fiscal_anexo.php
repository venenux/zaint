<?php
if (!isset($_SESSION)) {
  session_start();
}
require('fpdf.php');
require_once '../frame_archivos/lib/config.php';
require_once '../frame_archivos/lib/pdfcommon.php';
require_once '../frame_archivos/lib/common.php';
//include ("../selectra/header.php");




$conexion=conexion();



class PDF extends FPDF
{

//Cabecera de página
function Header()
{
        $Conn=conexion();
	$var_sql="select * from cwconemp";
	$rs = query($var_sql,$Conn);
	$row_rs = fetch_array($rs);
	$var_encabezado1=$row_rs['Nomemp'];
	cerrar_conexion($Conn);
	$Conn=conexion_conf();
	$var_sql="select imagen_izq,imagen_der from parametros";
	$rs = query($var_sql,$Conn);
	$row_rs = fetch_array($rs);
	$var_imagen_izq=$row_rs['imagen_izq'];
	$var_imagen_der=$row_rs['imagen_der'];
	$cadena1= substr($var_imagen_izq,3);
	
	cerrar_conexion($Conn);

        $this->SetFont("Arial","B",12);
     	$this->Image('../../selectra/'.$cadena1,8,6,25);
	$this->Cell(195,5,$var_encabezado1,0,1,'C');
     	$this->Ln();
     	
     	

}

//Pie de página
function Footer()
{
    $this->SetY(-31);
    $this->Cell(65);
    //$this->Cell(65,5,'Lic. Carlos E. Isturiz C.','T',1,'C');
    //$this->Cell(195,5,'Jefe Division de Contabilidad Fiscal',0,1,'C');
    $this->SetFont('Arial','I',8);
    $this->Ln();
    //$_SESSION['nombre']
    $this->Cell(100,5,'Elaborado Por: '.$raf['usuario'],0,0,'L');
    $this->Cell(40,5,utf8_decode('Página ').$this->PageNo().'/{nb}',0,1,'C');

    //Número de página
   // $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
//Hacer que sea multilinea sin que haga un salto de linea
var $widths;
var $aligns;
var $celdas;
var $ancho;
var $nro_ocs;
var $negrita;
function SetNegrita($n)
{
    //Set the array of column widths
    $this->negrita=$n;
} 
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
	
	if($this->negrita[$i]==0){
		$this->SetTextColor(80);
	
	}else{	$this->SetTextColor(1);
	
	}
	
        $this->MultiCell($w,$this->ancho[$i],$data[$i],$this->celdas[$i],$a);
        //Put the position to the right of the cell
        $this->SetXY($x+$w,$y);
    }
    //Go to the next line
    $this->Ln($h);
}
//fin
function encabezado($mes,$ano,$cuenta){
		switch($mes){
		case 1: 
			$des_mes='ENERO';
			$dia=31;
		break;
		case 2: 
			$des_mes='FEBRERO';
			$dia=28;
		break;
		case 3: 
			$des_mes='MARZO';
			$dia=31;
		break;
		case 4: 
			$des_mes='ABRIL';
			$dia=30;
		break;
		case 5: 
			$des_mes='MAYO';
			$dia=31;
		break;
		case 6: 
			$des_mes='JUNIO';
			$dia=30;
		break;
		case 7: 
			$des_mes='JULIO';
			$dia=31;
		break;
		case 8: 
			$des_mes='AGOSTO';
			$dia=31;
		break;
		case 9: 
			$des_mes='SEPTIEMBRE';
			$dia=30;
		break;
		case 10: 
			$des_mes='OCTUBRE';
			$dia=31;
		break;
		case 11: 
			$des_mes='NOVIEMBRE';
			$dia=30;
		break;
		case 12: 
			$des_mes='DICIEMBRE';
			$dia=31;
		break;
	}

	$conexion=conexion();
	$consulta="select * from cwconcue where Cuenta='$cuenta'";
	$query=query($consulta,$conexion);
	$fila=fetch_array($query);
	$this->Cell(195,5,$fila['Cuenta'].' '.$fila['Descrip'],0,1,'C');
	$this->Cell(195,5,'SALDOS AL  '.$dia.' DE '.$des_mes.' DE '.$ano,0,1,'C');
	$this->Cell(195,5,utf8_decode('( Expresado en bolìvares )'),0,1,'C');
	return $des_mes;
}
function buscar_cuenta($mes,$ano,$cuenta){
	$conexion=conexion();
	$maximo="select max(Nivel) from cwconcue where Cuenta LIKE '$cuenta%'";
	$query_max=query($maximo,$conexion);
	$fila=fetch_array($query_max);
	$nivel=$fila[0];

	$consulta="select * from cwconhis INNER JOIN cwconcue ON cwconhis.Cuenta=cwconcue.Cuenta and cwconhis.Desmes='$mes' and cwconhis.Anio=$ano and cwconcue.Tipo='P' and cwconcue.Cuenta LIKE '$cuenta%' order by cwconhis.Cuenta";
	$query=query($consulta,$conexion);
	return $query;
}	

function imprimir_datos($mes,$ano,$cuenta,$pdf){
	$mes_des=$this->encabezado($mes,$ano,$cuenta);
	$this->Ln(5);
	$this->SetFont('Arial','B',12);
	
	
	$this->SetWidths(array(47,95,48));
	$this->SetAligns(array('C','C','C'));
	$this->Setceldas(array(1,1,1));
	$this->Setancho(array(5,5,5));

	$this->Row(array('Codigo Contable','Cuenta','Monto Bs.'));
	
	$this->SetAligns(array('L','L','R'));
	$this->Setceldas(array(0,0,0));
	
	$fila=$this->buscar_cuenta($mes_des,$ano,$cuenta);
	$total=num_rows($fila);
	//Datos
	$cont=1;
	$contar=1;
	$pagina=1;
	$cantidad_registros=35;
	$total_anexo=0;
	while ($total>=$contar)
	{
		$this->SetFont('Arial','I',8);
		$row_rs = fetch_array($fila);
	 	// llamado para hacer multilinea sin que haga salto de linea
        	$this->Row(array($row_rs['Cuenta'],utf8_decode($row_rs['Descrip']),number_format($row_rs['Salactu'],2,',','.')));
		$total_anexo+=$row_rs['Salactu'];
		//maximizar lineas
		if (strlen($row_rs['descripcion'])>55){
			$cantidad_registros-=1;
			if($cont>$cantidad_registros){
				$cantidad_registros=$cont;
			}
			
		}
	
		if($cont==$cantidad_registros)
		{	
			if ($pagina!=$num_paginas){
				$this->Ln(300);
				$pagina++;
				$mes_des=$this->encabezado($mes,$ano,$cuenta);
				$this->SetAligns(array('C','C','C'));
				$this->Setceldas(array(1,1,1));
				$this->Setancho(array(5,5,5));
				$this->SetFont('Arial','B',12);
				$this->Row(array('Codigo Contable','Cuenta','Monto Bs.'));
				
				$this->SetAligns(array('L','L','R'));
				$this->Setceldas(array(0,0,0));
				$cont=1;
			}
		}else{$cont++;}
		//echo $contar;
		$contar++;
		
	}
	$this->Cell(142,5,'TOTAL','T',0,'R');
	$this->Cell(48,5,number_format($total_anexo,2,',','.'),'T',1,'R');
	


	
}




}


//Creación del objeto de la clase heredada
$pdf=new PDF('P','mm','Letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$conexion=conexion();
$mes = @$_POST['mes_ini'];
$ano = @$_POST['mes_fin'];
$cuenta = @$_POST['cuenta_sele'];	

$pdf->imprimir_datos($mes,$ano,$cuenta,$pdf);

//$pdf->imprimir_tabla($pdf,$fila1);

$pdf->Output();
?>
