<?php

if (!isset($_SESSION)) {
  session_start();
}

require('fpdf.php');
require_once '../frame_archivos/lib/config.php';
require_once '../frame_archivos/lib/pdfcommon.php';
require_once '../frame_archivos/lib/common.php';
//include ("../selectra/header.php");

list($dia1, $mes1,$anio1) = explode("/",$_POST["fecha_ini"]);
list($dia2, $mes2,$anio2) = explode("/",$_POST["fecha_fin"]);

$fecha_ini = $anio1."-".$mes1."-".$dia1;
$fecha_fin = $anio2."-".$mes2."-".$dia2;

$conexion=conexion();

class PDF extends FPDF
{
private $fecha_ini;
private $fecha_fin;
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
	$this->Cell(260,5,$var_encabezado1,0,1,'C');
     	$this->Ln();
     	
     	

}

//Pie de página
function Footer()
{
    $this->SetY(-20);
    
	$this->SetWidths(array(70,55,10,60,65));
	$this->SetAligns(array('L','C','C','L','C'));
	$this->Setceldas(array(0,0,0,0,0));
	$this->Setancho(array(5,5,5,5,5));

	$this->SetFont('Arial','B',8);
	//$this->Row(array('DIRECCION DE SERVICIOS ADMINISTRATIVOS:','________________________________','','DIRECCION DE CONTABILIDAD:','__________________________________'));
    	//$this->Row(array('','LIC. SANTA MAYA','','','LIC. CARLOS E. ISTURIZ C.'));

    $this->SetFont('Arial','I',8);
    //$_SESSION['nombre']
    //$this->Cell(100,5,'Elaborado Por: '.$raf['usuario'],0,0,'L');
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
function encabezado($mes,$ano){
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
	$this->Cell(260,5,'BALANCE GENERAL DEL '.$dia.' DE '.$des_mes.' DE '.$ano,0,1,'C');
//	$this->Cell(260,5,'BALANCE GENERAL DEL '.$_POST["fecha_ini"].' AL '.$_POST["fecha_fin"],0,1,'C');
	$this->Cell(260,5,utf8_decode('( Expresado en bolìvares )'),0,1,'C');
	return $des_mes;
}
function buscar_cuenta($mes,$ano,$cuenta){
	$conexion=conexion();
echo $consulta="select * from cwconhis INNER JOIN cwconcue ON cwconhis.Cuenta=cwconcue.Cuenta and cwconhis.Cuenta='$cuenta' and cwconhis.Desmes='$mes' and cwconhis.Anio=$ano";

/*
$consulta = "
SELECT 
(
SELECT cuenta
FROM `cwconcue`
 where cuenta = '".$cuenta."'
) AS Cuenta,

(
SELECT Descrip
FROM `cwconcue`
 where cuenta = '".$cuenta."'
) AS Descrip,

ifnull(sum(cwcondco.Debito) , 0.00 ) as debito, 
ifnull(sum(cwcondco.Credito) , 0.00) as  credito,

ifnull(sum(cwcondco.Debito) - sum(cwcondco.Credito) , 0.00 ) as Salactu


 FROM `cwcondco` inner join cwconhco on
 cwconhco.Numcom = cwcondco.Numcom
 where cwconhco.estado = 2
and cwcondco.cuenta like '".$cuenta."%' and cwcondco.fechaD between '".$this->fecha_ini."' and '".$this->fecha_fin."'";
*/


	$query=query($consulta,$conexion);
	return fetch_array($query);
}	

function imprimir_datos($mes,$ano){
	$mes_des=$this->encabezado($mes,$ano);
	$this->Ln(5);
	$this->SetFont('Arial','B',12);
	$this->Cell(260,5,'CUENTAS DEL TESORO',0,1,'C');
	
	$this->SetWidths(array(85,40,10,85,40));
	$this->SetAligns(array('C','C','C','C','C'));
	$this->Setceldas(array(0,0,0,0,0));
	$this->Setancho(array(5,5,5,5,5));

	$this->SetFont('Arial','B',10);
	$this->Row(array('ACTIVO','','','PASIVO',''));

	//cuentas Activo y Pasivo
	$this->SetFont('Arial','I',10);
	$this->SetAligns(array('L','R','C','L','R'));
	$sub_activo=0;
	$sub_pasivo=0;
	$descrip1=$this->buscar_cuenta($mes_des,$ano,'101.');
	$descrip2=$this->buscar_cuenta($mes_des,$ano,'102.');
	$this->Row(array($descrip2['Cuenta'].' '.$descrip2['Descrip'],number_format($descrip2['Salactu'],2,',','.'),'',$descrip1['Cuenta'].' '.$descrip1['Descrip'],number_format($descrip1['Salactu'],2,',','.')));
	$sub_pasivo+=$descrip1['Salactu'];
	$sub_activo+=$descrip2['Salactu'];
	
	$descrip1=$this->buscar_cuenta($mes_des,$ano,'103.');
	$descrip2=$this->buscar_cuenta($mes_des,$ano,'110.');
	$this->Row(array($descrip2['Cuenta'].' '.$descrip2['Descrip'],number_format($descrip2['Salactu'],2,',','.'),'',$descrip1['Cuenta'].' '.$descrip1['Descrip'],number_format($descrip1['Salactu'],2,',','.')));
	$sub_pasivo+=$descrip1['Salactu'];
	$sub_activo+=$descrip2['Salactu'];

        $descrip1=$this->buscar_cuenta($mes_des,$ano,'109.');
	$descrip2=$this->buscar_cuenta($mes_des,$ano,'120.');
	$this->Row(array($descrip2['Cuenta'].' '.$descrip2['Descrip'],number_format($descrip2['Salactu'],2,',','.'),'',$descrip1['Cuenta'].' '.$descrip1['Descrip'],number_format($descrip1['Salactu'],2,',','.')));
	$sub_pasivo+=$descrip1['Salactu'];
	$sub_activo+=$descrip2['Salactu'];

	$descrip1=$this->buscar_cuenta($mes_des,$ano,'131.');
	$descrip2=$this->buscar_cuenta($mes_des,$ano,'122.');
	$this->Row(array($descrip2['Cuenta'].' '.$descrip2['Descrip'],number_format($descrip2['Salactu'],2,',','.'),'',$descrip1['Cuenta'].' '.$descrip1['Descrip'],number_format($descrip1['Salactu'],2,',','.')));
	$sub_pasivo+=$descrip1['Salactu'];
	$sub_activo+=$descrip2['Salactu'];

	$descrip1=$this->buscar_cuenta($mes_des,$ano,'133.');
	$descrip2=$this->buscar_cuenta($mes_des,$ano,'126.');
	$this->Row(array($descrip2['Cuenta'].' '.$descrip2['Descrip'],number_format($descrip2['Salactu'],2,',','.'),'',$descrip1['Cuenta'].' '.$descrip1['Descrip'],number_format($descrip1['Salactu'],2,',','.')));
	$sub_pasivo+=$descrip1['Salactu'];
	$sub_activo+=$descrip2['Salactu'];

	$descrip1=$this->buscar_cuenta($mes_des,$ano,'141.');
	
	$this->Row(array("","",'',$descrip1['Cuenta'].' '.$descrip1['Descrip'],number_format($descrip1['Salactu'],2,',','.')));
	$sub_pasivo+=$descrip1['Salactu'];


	//subtotal pasivo
	$this->Setceldas(array(0,0,0,0,'B'));
	$descrip2=$this->buscar_cuenta($mes_des,$ano,'128.');
	$this->Row(array($descrip2['Cuenta'].' '.$descrip2['Descrip'],number_format($descrip2['Salactu'],2,',','.'),'','SUB-TOTAL',number_format($sub_pasivo ,2,',','.')));
	$sub_activo+=$descrip2['Salactu'];
	//

	$this->Setceldas(array(0,0,0,0,0));
	
	$descrip2=$this->buscar_cuenta($mes_des,$ano,'130.');
	$this->Row(array($descrip2['Cuenta'].' '.$descrip2['Descrip'],$descrip2['Salactu'],'','',''));
	$sub_activo+=$descrip2['Salactu'];

	$descrip1=$this->buscar_cuenta($mes_des,$ano,'199.');
	$descrip2=$this->buscar_cuenta($mes_des,$ano,'132.');
	$sub_activo+=$descrip2['Salactu'];

	$this->Row(array($descrip2['Cuenta'].' '.$descrip2['Descrip'],number_format($descrip2['Salactu'],2,',','.'),'',$descrip1['Cuenta'].' '.$descrip1['Descrip'],number_format($descrip1['Salactu'],2,',','.')));
	//$situacion_fin_delteso = $sub_activo-$sub_pasivo;
	$sub_pasivo+=$descrip1['Salactu'];
	
	//TOTALES CUENTAS DEL TESORO
	$this->SetFont('Arial','B',10);
	$this->Setceldas(array(0,'T',0,0,'T'));
	$this->Row(array('',number_format($sub_activo,2,',','.'),'','',number_format($sub_pasivo,2,',','.')));

	//CUENTAS HACIENDA
	$this->Setceldas(array(0,0,0,0,0));
	$this->Ln();
	$this->SetFont('Arial','B',12);
	$this->Cell(260,5,'CUENTAS DE LA HACIENDA',0,1,'C');
	
	$this->SetFont('Arial','I',10);
	$this->SetAligns(array('C','C','C','C','C'));
	$this->Row(array('ACTIVO','','','PASIVO',''));
	$this->SetAligns(array('L','R','C','L','R'));
	$sub_activo_H=0;
	$sub_pasivo_H=0;
	
	$descrip1=$this->buscar_cuenta($mes_des,$ano,'203.');
	$descrip2=$this->buscar_cuenta($mes_des,$ano,'200.');
	$this->Row(array($descrip2['Cuenta'].' '.$descrip2['Descrip'],number_format($descrip2['Salactu'],2,',','.'),'',$descrip1['Cuenta'].' '.$descrip1['Descrip'],number_format($descrip1['Salactu'],2,',','.')));
	$sub_pasivo_H+=$descrip1['Salactu'];
	$sub_activo_H+=$descrip2['Salactu'];

	
	$descrip2=$this->buscar_cuenta($mes_des,$ano,'210.');
	$this->Row(array($descrip2['Cuenta'].' '.$descrip2['Descrip'],number_format($descrip2['Salactu'],2,',','.'),'','',''));
	$sub_activo_H+=$descrip2['Salactu'];

	$descrip2=$this->buscar_cuenta($mes_des,$ano,'212.');
	$this->Row(array($descrip2['Cuenta'].' '.$descrip2['Descrip'],number_format($descrip2['Salactu'],2,',','.'),'','',''));
	$sub_activo_H+=$descrip2['Salactu'];

	$descrip1=$this->buscar_cuenta($mes_des,$ano,'221.');
	$descrip2=$this->buscar_cuenta($mes_des,$ano,'214.');
	$this->Row(array($descrip2['Cuenta'].' '.$descrip2['Descrip'],number_format($descrip2['Salactu'],2,',','.'),'',$descrip1['Cuenta'].' '.$descrip1['Descrip'],number_format($descrip1['Salactu'],2,',','.')));
	$sub_pasivo_H+=$descrip1['Salactu'];
	$sub_activo_H+=$descrip2['Salactu'];


	$descrip2=$this->buscar_cuenta($mes_des,$ano,'216.');
	$this->Row(array($descrip2['Cuenta'].' '.$descrip2['Descrip'],number_format($descrip2['Salactu'],2,',','.'),'','',''));
	$sub_activo_H+=$descrip2['Salactu'];

	$descrip2=$this->buscar_cuenta($mes_des,$ano,'220.');
	$this->Row(array($descrip2['Cuenta'].' '.$descrip2['Descrip'],number_format($descrip2['Salactu'],2,',','.'),'','',''));
	$sub_activo_H+=$descrip2['Salactu'];

	$descrip1=$this->buscar_cuenta($mes_des,$ano,'299.');
	$descrip2=$this->buscar_cuenta($mes_des,$ano,'222.');
	$this->Row(array($descrip2['Cuenta'].' '.$descrip2['Descrip'],number_format($descrip2['Salactu'],2,',','.'),'',$descrip1['Cuenta'].' '.$descrip1['Descrip'],number_format($descrip1['Salactu'],2,',','.')));
	$sub_pasivo_H+=$descrip1['Salactu'];
	$sub_activo_H+=$descrip2['Salactu'];

	$descrip2=$this->buscar_cuenta($mes_des,$ano,'240.');
	$this->Row(array($descrip2['Cuenta'].' '.$descrip2['Descrip'],number_format($descrip2['Salactu'],2,',','.'),'','',''));
	$sub_activo_H+=$descrip2['Salactu'];

	//TOTALES CUENTAS DE HACIENDA
	//$this->SetFont('Arial','B',10);
	//$this->Setceldas(array(0,'T',0,0,'T'));
	//$this->Row(array('',number_format($sub_activo_H,2,',','.'),'','',number_format($sub_pasivo_H,2,',','.')));

	//CUENTAS PRESUPUESTO
	$this->Setceldas(array(0,0,0,0,0));
	$this->Ln();
	$this->SetFont('Arial','B',12);
	$this->Cell(260,5,'CUENTAS DEL PRESUPUESTO',0,1,'C');

	$this->SetFont('Arial','I',10);
	$this->SetAligns(array('C','C','C','C','C'));
	$this->Row(array('ACTIVO','','','PASIVO',''));
	$this->SetAligns(array('L','R','C','L','R'));
	$sub_activo_P=0;
	$sub_pasivo_P=0;
	
	$descrip1=$this->buscar_cuenta($mes_des,$ano,'301.');
	$descrip2=$this->buscar_cuenta($mes_des,$ano,'300.');
	$this->Row(array($descrip2['Cuenta'].' '.$descrip2['Descrip'],number_format($descrip2['Salactu'],2,',','.'),'',$descrip1['Cuenta'].' '.$descrip1['Descrip'],number_format($descrip1['Salactu'],2,',','.')));
	$sub_pasivo_P+=$descrip1['Salactu'];
	$sub_activo_P+=$descrip2['Salactu'];
	
	
	$descrip1=$this->buscar_cuenta($mes_des,$ano,'303.');
	$this->Row(array('','','',$descrip1['Cuenta'].' '.$descrip1['Descrip'],number_format($descrip1['Salactu'],2,',','.')));
	$sub_pasivo_P+=$descrip1['Salactu'];
/*
	$descrip1=$this->buscar_cuenta($mes_des,$ano,'305.');
	$this->Row(array('','','',$descrip1['Cuenta'].' '.$descrip1['Descrip'],number_format($descrip1['Salactu'],2,',','.')));
	$sub_pasivo_P+=$descrip1['Salactu'];
	
	$descrip1=$this->buscar_cuenta($mes_des,$ano,'311.');
	$this->Row(array('','','',$descrip1['Cuenta'].' '.$descrip1['Descrip'],number_format($descrip1['Salactu'],2,',','.')));
	$sub_pasivo_P+=$descrip1['Salactu'];
*/

	//TOTALES CUENTAS PRESUPUESTO
        $this->SetFont('Arial','B',10);
	$this->Setceldas(array(0,'T',0,0,'T')); 
	

	$this->Row(array('',number_format($sub_activo_P,2,',','.'),'','',number_format($sub_pasivo_P,2,',','.'))); 


	//TOTALES BALANCE
        $this->Ln();
	$this->SetFont('Arial','B',10);
	$this->Setceldas(array(0,'TB',0,0,'TB'));
	$this->Row(array('TOTAL ACTIVO',number_format($sub_activo_H+$sub_activo_P+$sub_activo,2,',','.'),'','TOTAL PASIVO',number_format($sub_pasivo_H+$sub_pasivo_P+$sub_pasivo,2,',','.')));

}
	
	function setParametrosFechas($fecha1, $fecha2){
		$this->fecha_ini = $fecha1;
		$this->fecha_fin = $fecha2;
	}



}


//Creación del objeto de la clase heredada
$pdf=new PDF('L','mm','Letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$conexion=conexion();
$mes = $mes2;
$ano = $anio2;
$mes = @$_POST['mes_ini'];
$ano = @$_POST['mes_fin'];

	
$pdf->setParametrosFechas($fecha_ini,$fecha_fin);

$pdf->imprimir_datos($mes,$ano);

//$pdf->imprimir_tabla($pdf,$fila1);

$pdf->Output();
?>
