<?php 
session_start();
ob_start();
$termino=$_SESSION['termino'];
$nomina=$_GET['nomina'];



require('fpdf.php');
include("../lib/common.php");
include("../lib/monto_escrito.php");
include("pdf.php");
include("../paginas/funciones_nomina.php");


function fecha($value) { // fecha de YYYY/MM/DD a DD/MM/YYYY
 if ( ! empty($value) ) return substr($value,8,2) ."/". substr($value,5,2) ."/". substr($value,0,4);
}

class PDF extends FPDF
{
var $nominapdf;
var $fpdf;
function header(){

	$Conn=conexion_conf();
	$var_sql="select encabezado1,encabezado2,encabezado3,encabezado4,imagen_izq,imagen_der from parametros";
	$rs = query($var_sql,$Conn);
	$row_rs = fetch_array($rs);
	$var_encabezado1=$row_rs['encabezado1'];
	$var_encabezado2=$row_rs['encabezado2'];
	$var_encabezado3=$row_rs['encabezado3'];
	$var_encabezado4=$row_rs['encabezado4'];
	$var_imagen_izq=$row_rs['imagen_izq'];
	$var_imagen_der=$row_rs['imagen_der'];	
	$var_sql="select codigo,nomemp,departamento,presidente,periodo,cargo,nivel,desislr,ctaisrl,desiva,ctaiva,por_isv,compra,servicio,rif,nit,direccion,telefono,por_im,por_bomberos,lugar,sobregirop,autorizacionodp,claveodp,contrato,gas_dir from parametros";
	$rsu = query($var_sql,$Conn);
	$row_rsu = fetch_array($rsu);
	$var_nomemp=$row_rsu['nomemp'];

	cerrar_conexion($Conn);

        $this->SetFont("Arial","B",12);
     	$this->Image($var_imagen_izq,10,8,33);
     	$this->Ln(15);
     	$this->Cell(45);
        
     	$this->Cell(100,8,utf8_decode("PAGO DE IDEMNIZACIÓN POR CONCEPTO "),0,0,"C");
     	$this->Image($var_imagen_der,170,15,33);
     	$this->Ln(10);
     	$this->Cell(35);
     	$this->Cell(120,8,utf8_decode("DE LIQUIDACIÓN"),0,0,"C");
     	$this->Ln(10);/*
     	$this->Cell(10);
     	$this->Cell(170,8,$var_encabezado3,0,0,"C");
     	$this->Ln(10);*/

	/*
	$conexion=conexion();
	$var_sql="select * from nomempresa";
	$rs = query($var_sql,$conexion);
	$row_rs = fetch_array($rs);
	$var_encabezado=$row_rs['nom_emp'];
	$var_imagen_izq=$row_rs['imagen_izq'];
	
	$this->SetFont('Arial','',10);
	$date1=date("d/m/Y");
	$date2=date("h:m:s");
	
	//$this->Image($var_imagen_izq,8,6,25);
	$this->Cell(150,5,utf8_decode($var_encabezado),0,0,'L');
	$this->Cell(38,5,'Fecha:  '.$date1,0,1,'R');
	$this->Cell(150,5,'GERENCIA DE RECURSOS HUMANOS',0,0,'L');
	$this->Cell(38,5,'Hora: '.$date2,0,1,'R');
	$this->Cell(150,5,'GERENCIA CAPTACION Y PAGOS AL PERSONAL',0,1,'L');
	$this->Cell(150,5,'DEPARTAMENTO DE MOVIMIENTOS',0,1,'L');

	$this->Cell(188,5,utf8_decode('LIQUIDACIÓN DE PRESTACIONES SOCIALES'),0,1,'C');
	
	$registro_id=$_GET['registro_id']. " ";
	$codnomn=$_GET['codt'];
	$consulta="select * from nompersonal where ficha='".trim($registro_id)."' AND tipnom = '".$codnomn."'";
	$rsr = query($consulta,$conexion);
	$row_rsr = fetch_array($rsr);
	$this->Cell(188,5,utf8_decode('MOTIVO DE EGRESO: ').$row_rsr['motivo_liq'],0,1,'C');
	*/
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

function datos_empleado($ficha,$cod_nomina,$codnom){
	$conexion=conexion();
	$consulta="select * from nompersonal where ficha='".trim($ficha)."' AND tipnom = '".$cod_nomina."'";
	$query=query($consulta,$conexion);
	$rc=fetch_array($query);
	
	$cod_cargo=$rc['codcargo'];
	$consuta2="select * from nomcargos where cod_car='$cod_cargo'";
	$query2=query($consuta2,$conexion);
	$rcc=fetch_array($query2);

	$this->SetFont('Arial','B',8);
	$this->Cell(28,5,utf8_decode('LUGAR'),'LTR',0);
	$this->Cell(105,5,'APELLIDO Y NOMBRES ','LTR',0);
	$this->Cell(65,5,utf8_decode('CÉDULA DE IDENTIDAD'),'LTR',0);
	//$this->Cell(69,5,utf8_decode('CARGO '),'LTR',0);
	
	$this->Ln();
	$this->SetFont('Arial','I',8);
	// llamado para hacer multilinea sin que haga salto de linea
        $this->SetWidths(array(28,105,65));
	$this->SetAligns(array('C','C','C'));
        $this->Setceldas(array('LRB','LRB','LRB'));
	$this->Setancho(array(5,5,5));
	//,utf8_decode($rcc['des_car']
        $this->Row(array("VALENCIA",utf8_decode($rc['apenom']),number_format($rc['cedula'],0,'.','.')));
	//fin

	$this->SetFont('Arial','B',8);
	$this->Cell(133,5,utf8_decode('DENOMINACIÓN DEL CARGO'),'LTR',0,'C');
	$this->Cell(32,5,'FECHA DE INGRESO',0);
	$this->Cell(33,5,utf8_decode('FECHA DE EGRESO'),'LTR',0);
	$this->Ln();
	$this->SetFont('Arial','I',8);
	// llamado para hacer multilinea sin que haga salto de linea
        $this->SetWidths(array(133,32,33));
	$this->SetAligns(array('C','C','C'));
        $this->Setceldas(array('LRB','LRB','LRB'));
	$this->Setancho(array(5,5,5));
        $this->Row(array(utf8_decode($rcc['des_car']),fecha($rc['fecing']),fecha($rc['fecharetiro'])));
// 	$this->Ln();

	$this->SetFont('Arial','B',8);
	$this->Cell(133,5,utf8_decode('MOTIVO DEL EGRESO'),'LTR',0,'C');
	$this->Cell(32,5,'PROGRAMA',0);
	$this->Cell(33,5,$rc['codnivel4'],'LTR',0);
	$this->Ln();
	$this->SetFont('Arial','I',8);

	$this->SetWidths(array(133,32,33));
	$this->SetAligns(array('C','C','C'));
        $this->Setceldas(array('LTB','TB','TBR'));
	$this->Setancho(array(5,5,5));
        $this->Row(array(utf8_decode($rc['motivo_liq']),'',''));

	$consulta3="select sum(monto) as monto from nom_movimientos_nomina where codnom='$codnom' and tipnom='$cod_nomina' and tipcon='A' and impdet='S'";
	$query3=query($consulta3,$conexion);
	$fetch=fetch_array($query3);

	$consulta3="select sum(monto) as monto from nom_movimientos_nomina where codnom='$codnom' and tipnom='$cod_nomina' and tipcon='D' and impdet='S'";
	$query4=query($consulta3,$conexion);
	$fetch3=fetch_array($query4);
	
	$monto=$fetch[monto]-$fetch3[monto];

	
	
	$this->Ln(2);
	$this->SetFont('Arial','B',10);
	$this->Cell(198,5,'POR BS. '.number_format($monto,2,',','.'),0,1,'C');
	$this->SetFont('Arial','B',10);

	$this->SetWidths(array(198));
	$this->SetAligns(array('L'));
        $this->Setceldas(array(0));
	$this->Setancho(array(5));
	$this->Row(array(utf8_decode('He recibido de la Fundación Para el Avance Social la cantidad de: '.convertir_a_letras($monto).' ('.number_format($monto,2,',','.').')')));
	$this->Row(array(utf8_decode("Por concepto de Perstaciones Sociales y Otras Idemnizaciones que determina la Ley del trabajo según el artículo 108 de la misma, de acuerdo a la siguiente denominación:")));
	$this->Ln(1);
/*
	$consulta3="select * from nomcampos_adic_personal where ficha=$ficha and id =16 and tiponom=$cod_nomina";
	$query3=query($consulta3,$conexion);
	$rca=fetch_array($query3);

	$this->SetFont('Arial','B',8);
	$this->Cell(29,5,'FECHA INGRESO ','LTR',0);
	$this->Cell(29,5,utf8_decode('FECHA EGRESO'),'LTR',0);
	$this->Cell(40,5,utf8_decode('TIEMPO DE SERVICIO'),'LTR',0);
	$this->Cell(50,5,utf8_decode('NOMINA'),'LTR',0);
	$this->Cell(50,5,utf8_decode('CATEGORIA'),'LTR',0);
	$this->Ln();
	$this->SetFont('Arial','I',8);
	// llamado para hacer multilinea sin que haga salto de linea
        $this->SetWidths(array(29,29,40,50,50));
	$this->SetAligns(array('C','C','C','C','C'));
        $this->Setceldas(array(1,1,1,1,1));
	$this->Setancho(array(5,5,5,5,5));
	$anios=antiguedad($rc['fecing'],$rc['fecharetiro'],"A");
	$meses=antiguedad($rc['fecing'],$rc['fecharetiro'],"M");
        $this->Row(array(fecha($rc['fecing']),fecha($rc['fecharetiro']),utf8_decode($anios." AÑOS Y ".$meses." MESES"),$_SESSION['nomina'],$rca['valor']));
	*/
	//fin



}
function otros_pagos_query($ficha,$cod_nomina,$tipo_nomina,$num){
	$conexion=conexion();
	if($num==1){
		$consulta="select * from nom_movimientos_nomina where codnom=$cod_nomina and ((codcon>=4002 and codcon<=4006) or codcon=4009 or codcon=4010) and ficha=$ficha and tipnom=$tipo_nomina";
	}
	if($num==2){
		$consulta="select * from nom_movimientos_nomina where codnom=$cod_nomina and (codcon>=4019 and codcon<=4027)  and ficha=$ficha and tipnom=$tipo_nomina";
	}
	$query=query($consulta,$conexion);
	return $query;
}
function imprimir_otros_pagos($ficha,$cod_nomina,$tipo_nomina,$pdf){
	$ro=$pdf->otros_pagos_query($ficha,$cod_nomina,$tipo_nomina,1);
	$total=num_rows($ro);
	$cont=0;

	
	$this->SetFont('Arial','B',8);
	$this->Cell(198,5,'OTROS PAGOS (A) ',1,1,'C');
	
	while($total!=$cont){
		$resul=fetch_array($ro);
		$des1=$resul['descrip'];
		$mon1=$resul['monto'];
		$cont+=1;
		if(($resul=fetch_array($ro))!=null){
			
			$des2=$resul['descrip'];
			$mon2=number_format($resul['monto'],2,',','.');
			$cont+=1;
		}
		else{
			$des2='';
			$mon2=' ';
		}	
		$this->SetFont('Arial','I',8);
		// llamado para hacer multilinea sin que haga salto de linea
		$this->SetWidths(array(70,30,70,28));
		$this->SetAligns(array('L','R','L','R'));
		$this->Setceldas(array(0,0,0,0));
		$this->Setancho(array(5,5,5,5));
		$this->Row(array(utf8_decode($des1),number_format($mon1,2,',','.'),utf8_decode($des2),$mon2));
		//fin
		
	}
	
}
function deducciones($total,$pdf){
	$this->SetFont('Arial','B',8);
	$this->Cell(198,5,'OTROS DEDUCCIONES ',1,1,'C');
	$this->SetFont('Arial','I',8);
	// llamado para hacer multilinea sin que haga salto de linea
        $this->SetWidths(array(108,30,30,30));
	$this->SetAligns(array('L','C','R','R'));
        $this->Setceldas(array(0,0,0,0));
	$this->Setancho(array(5,5,5,5));
	$resul=$pdf->buscar(2501);
	//Preaviso
	if($resul!=null){
		$this->Row(array(utf8_decode($resul['descrip']),number_format($resul['valor'],0,'.','.').utf8_decode(" Días X "),number_format(($total/30),2,',','.').'  Bs. = ',number_format($resul['monto'],2,',','.')));
		$totalD+=$resul['monto'];
	}	

	//Tarjeta Alimentaria
	
	$resul=$pdf->buscar(2503);
	$total=0;
	if($resul!=null){
        	$this->Row(array(utf8_decode($resul['descrip']),number_format($resul['valor'],0,'.','.').utf8_decode(" Días  "),'Bs. = ',number_format($resul['monto'],2,',','.')));
		$totalD+=$resul['monto'];
	}

	//Sueldo y Prepagado mas
	$resul2=$pdf->buscar(4001);
	$mon=$resul2['monto'];
	$resul2=$pdf->buscar(4002);
	$mon+=$resul2['monto'];
	$resul=$pdf->buscar(2504);
	if($resul!=null){
        	$this->Row(array(utf8_decode($resul['descrip']),number_format($resul['valor'],0,'.','.').utf8_decode(" Días X "),number_format(($mon/30),2,',','.').'  Bs. = ',number_format($resul['monto'],2,',','.')));
		$totalD+=$resul['monto'];
	}	

	//prima profesional pagado de mas
	$resul2=$pdf->buscar(4004);
	$resul=$pdf->buscar(2505);
	if($resul!=null){
        	$this->Row(array(utf8_decode($resul['descrip']),number_format($resul['valor'],0,'.','.').utf8_decode(" Días X "),number_format(($resul2['monto']/30),2,',','.').'  Bs. = ',number_format($resul['monto'],2,',','.')));
		$totalD+=$resul['monto'];
	}


	//otras primas
	$resul2=$pdf->buscar(4002);
	$resul=$pdf->buscar(2506);
	if($resul!=null){
        	$this->Row(array(utf8_decode($resul['descrip']),number_format($resul['valor'],0,'.','.').utf8_decode(" Días  "),'Bs. = ',number_format($resul['monto'],2,',','.')));
		$totalD+=$resul['monto'];
	}
	
	//total
	$this->SetFont('Arial','B',8);
	$this->Setceldas(array(0,0,0,'T'));
	$this->Row(array(utf8_decode("SUB-TOTAL DEDUCCIONES"),' ','',number_format($totalD,2,',','.')));
	return $total;

	
}

function asignaciones($total,$pdf){
	$this->SetFont('Arial','B',8);
	$this->Cell(198,5,'OTRAS ASIGNACIONES ',1,1,'C');
	$this->SetFont('Arial','I',8);
	// llamado para hacer multilinea sin que haga salto de linea
        $this->SetWidths(array(108,30,30,30));
	$this->SetAligns(array('L','C','R','R'));
        $this->Setceldas(array(0,0,0,0));
	$this->Setancho(array(5,5,5,5));
	$total=0;
	//sueldo
	$resul2=$pdf->buscar(4001);
	$resul=$pdf->buscar(4019);
	$total=0;
	if($resul!=null){
        	$this->Row(array(utf8_decode($resul['descrip']),number_format($resul['valor'],0,'.','.').utf8_decode(" Días X "),number_format(($resul2['monto']/30),2,',','.').'  Bs. = ',number_format($DEDUCCIONESresul['monto'],2,',','.')));
		$total+=$resul['monto'];
	}
	//aporte
	$resul2=$pdf->buscar(4008);
	$resul=$pdf->buscar(4020);
	if($resul!=null){
        	$this->Row(array(utf8_decode($resul['descrip']),number_format($resul['valor'],0,'.','.').utf8_decode(" Días X "),number_format(($resul2['monto']/30),2,',','.').'  Bs. = ',number_format($resul['monto'],2,',','.')));
		$total+=$resul['monto'];
	}	
	//compensacion
	$resul2=$pdf->buscar(4003);
	$resul=$pdf->buscar(4021);
	if($resul!=null){
        	$this->Row(array(utf8_decode($resul['descrip']),number_format($resul['valor'],0,'.','.').utf8_decode(" Días X "),number_format(($resul2['monto']/30),2,',','.').'  Bs. = ',number_format($resul['monto'],2,',','.')));
		$total+=$resul['monto'];
	}
	//prima servicio
	$resul2=$pdf->buscar(4002);
	$resul=$pdf->buscar(4028);
	if($resul!=null){
        	$this->Row(array(utf8_decode($resul['descrip']),number_format($resul['valor'],0,'.','.').utf8_decode(" Días X "),number_format(($resul2['monto']/30),2,',','.').'  Bs. = ',number_format($resul['monto'],2,',','.')));
		$total+=$resul['monto'];
	}
	//prima profecional
	$resul2=$pdf->buscar(4004);
	$resul=$pdf->buscar(4022);
	if($resul!=null){
        	$this->Row(array(utf8_decode($resul['descrip']),number_format($resul['valor'],0,'.','.').utf8_decode(" Días X "),number_format(($resul2['monto']/30),2,',','.').'  Bs. = ',number_format($resul['monto'],2,',','.')));
		$total+=$resul['monto'];
	}
	//prima jerarquia
	$resul2=$pdf->buscar(4005);
	$resul=$pdf->buscar(4023);
	if($resul!=null){
        	$this->Row(array(utf8_decode($resul['descrip']),number_format($resul['valor'],0,'.','.').utf8_decode(" Días X "),number_format(($resul2['monto']/30),2,',','.').'  Bs. = ',number_format($resul['monto'],2,',','.')));
		$total+=$resul['monto'];
	}
	//prima transporte
	$resul2=$pdf->buscar(4006);
	$resul=$pdf->buscar(4024);
	if($resul!=null){
        	$this->Row(array(utf8_decode($resul['descrip']),number_format($resul['valor'],0,'.','.').utf8_decode(" Días X "),number_format(($resul2['monto']/30),2,',','.').'  Bs. = ',number_format($resul['monto'],2,',','.')));
		$total+=$resul['monto'];
	}
	//prima especial
	$resul2=$pdf->buscar(4007);
	$resul=$pdf->buscar(4025);
	if($resul!=null){
        	$this->Row(array(utf8_decode($resul['descrip']),number_format($resul['valor'],0,'.','.').utf8_decode(" Días X "),number_format(($resul2['monto']/30),2,',','.').'  Bs. = ',number_format($resul['monto'],2,',','.')));
		$total+=$resul['monto'];
	}
	//otros pagos
	$resul=$pdf->buscar(4026);
	if($resul!=null){
        	$this->Row(array(utf8_decode($resul['descrip']),'','',number_format($resul['monto'],2,',','.')));
		$total+=$resul['monto'];
	}
	//clausula
	$resul=$pdf->buscar(4027);
	if($resul!=null){
        	$this->Row(array(utf8_decode($resul['descrip']),'','',number_format($resul['monto'],2,',','.')));
		$total+=$resul['monto'];
	}

	//total
	$this->SetFont('Arial','B',8);
	$this->Setceldas(array(0,0,0,'T'));
	$this->Row(array(utf8_decode("SUB-TOTAL ASIGNACIONES"),' ','',number_format($total,2,',','.')));
	
	return $total;
	

	
}
function conceptos_integrales($ficha,$cod_nomina,$tipo_nomina,$pdf){
	$conexion=conexion();
	$consulta="select * from nom_movimientos_nomina where codnom=$cod_nomina and codcon=4001 and ficha=$ficha and tipnom=$tipo_nomina";
	$query=query($consulta,$conexion);
	if(($sueldo=num_rows($query))!=0){
		$r=fetch_array($query);
		$sueldo=$r['monto'];
	}else{
		$sueldo=0;
	}
	

	$consulta="select * from nom_movimientos_nomina where codnom=$cod_nomina and codcon=4003 and ficha=$ficha and tipnom=$tipo_nomina";
	$query=query($consulta,$conexion);
	if(($aporte=num_rows($query))!=0){
		$r=fetch_array($query);
		$aporte=$r['monto'];
	}else{
		$aporte=0;
	}

	$consulta="select * from nom_movimientos_nomina where codnom=$cod_nomina and codcon=4006 and ficha=$ficha and tipnom=$tipo_nomina";
	$query=query($consulta,$conexion);
	if(($grep=num_rows($query))!=0){
		$r=fetch_array($query);
		$grep=$r['monto'];
	}else{
		$grep=0;
	}

	$consulta="select SUM(monto) as monto from nom_movimientos_nomina where codnom=$cod_nomina and (codcon=4004 or codcon=4005 or codcon=4007) and ficha=$ficha and tipnom=$tipo_nomina";
	$query=query($consulta,$conexion);
	if(($primas=num_rows($query))!=0){
		$r=fetch_array($query);
		$primas=$r['monto'];
	}else{
		$primas=0;
	}

	$consulta="select SUM(monto) as monto from nom_movimientos_nomina where codnom=$cod_nomina and (codcon=4009 or codcon=4010) and ficha=$ficha and tipnom=$tipo_nomina";
	$query=query($consulta,$conexion);
	if(($primas=num_rows($query))!=0){
		$r=fetch_array($query);
		$doz=$r['monto'];
	}else{
		$doz=0;
	}
	//$this->Ln();
	$consulta="select * from nompersonal where ficha='".trim($ficha)."' AND tipnom = '".$tipo_nomina."'";
	$query=query($consulta,$conexion);
	$rc=fetch_array($query);	
	$anios=antiguedad($rc['fecing'],$rc['fecharetiro'],"A");
	$meses=antiguedad($rc['fecing'],$rc['fecharetiro'],"M");
	$dias=antiguedad((substr($rc['fecharetiro'],0,7)."-01"),$rc['fecharetiro'],"D");

		
	
	$this->SetFont('Arial','B',8);
	$this->Cell(36,5,utf8_decode('TIEMPO DE SERVICIO'),'LTR',0,'C');
	$this->Cell(162,5,utf8_decode('SUELDO'),'LTR',1,'C');
	$this->Cell(11,5,utf8_decode('AÑOS'),'LTR',0,'C');
	$this->Cell(13,5,utf8_decode('MESES'),'LTR',0,'C');
	$this->Cell(12,5,utf8_decode('DÍAS'),'LTR',0,'C');
	$this->Cell(22,5,'SUELDO AL: ','LTR',0,'C');
	$this->Cell(28,5,utf8_decode('SUELDO BÁSICO'),'LTR',0,'C');
	$this->Cell(27,5,utf8_decode('COMPENSACIÓN'),'LTR',0,'C');
	$this->Cell(35,5,utf8_decode('GASTOS DE REP. Bs.'),'LTR',0,'C');
	$this->Cell(18,5,utf8_decode('PRIMAS'),'LTR',0,'C');
	$this->Cell(32,5,utf8_decode('SUELDO INTEGRAL'),'LTR',1,'C');
	
	$this->SetFont('Arial','I',8);
	// llamado para hacer multilinea sin que haga salto de linea
        $this->SetWidths(array(11,13,12,22,28,27,35,18,32));
	$this->SetAligns(array('C','C','C','C','C','C','C','C','C'));
        $this->Setceldas(array(1,1,1,1,1,1,1,1,1));
	$this->Setancho(array(5,5,5,5,5,5,5,5,5));
        $this->Row(array($anios,$meses,$dias,"01/01/2009",number_format($sueldo,2,',','.'),number_format($aporte,2,',','.'),number_format($grep,2,',','.'),number_format($otro,2,',','.'),number_format($sueldo+$aporte+$otro+$doz,2,',','.')));
	
	//fin
	return $sueldo+$aporte+$otro;
	

}
function buscar($codcon){
	$conexion=conexion();
	$registro_id=$_GET['registro_id']. " ";
	$tipo_nomina=$_GET['codt'];
	$codigo_nomina=$_GET['codigo_nomina'];
	$consulta="select * from nom_movimientos_nomina where codnom=$codigo_nomina and codcon=$codcon and ficha=$registro_id and tipnom=$tipo_nomina";
	$query=query($consulta,$conexion);
	cerrar_conexion($conexion);
	return fetch_array($query);
}
function prestaciones($total,$pdf){
	$this->Ln(2);
	$this->SetFont('Arial','B',10);
	$this->Cell(198,5,utf8_decode('LIQUIDACIÓN'),0,1,'C');

	$this->SetFont('Arial','B',9);
	// llamado para hacer multilinea sin que haga salto de linea
        $this->SetWidths(array(10,158,30));
	$this->SetAligns(array('L','C','R'));
        $this->Setceldas(array(1,1,1));
	$this->Setancho(array(5,5,5));

	$this->Row(array(utf8_decode('DÍAS'),'CONCEPTO','Bs.'));

	$this->SetFont('Arial','I',8);
	// llamado para hacer multilinea sin que haga salto de linea
        $this->SetWidths(array(10,158,30));
	$this->SetAligns(array('C','L','R'));
        $this->Setceldas(array(1,1,1));
	$this->Setancho(array(5,5,5));

	
	//preaviso
	$total=0;
	$conexion=conexion();
	$registro_id=$_GET['registro_id']. " ";
	$tipo_nomina=$_GET['codt'];
	$codigo_nomina=$_GET['codigo_nomina'];
	$consulta="select * from nom_movimientos_nomina where codnom=".trim($codigo_nomina)." and ficha=$registro_id and tipnom=$tipo_nomina AND tipcon='A' and impdet='S' ORDER BY CODCON DESC";
	$query=query($consulta,$conexion);
	while($resul=fetch_array($query))
	{
		$this->Row(array(number_format($resul['valor'],2,',','.'),utf8_decode($resul['descrip']),number_format($resul['monto'],2,',','.')));
		$total+=$resul['monto'];
	}
	/*
	$resul=$pdf->buscar(4011);
	$total=0;
	if($resul!=null){
        	$this->Row(array(utf8_decode($resul['descrip']),number_format($resul['valor'],0,'.','.').utf8_decode(" Días X "),number_format(($total/30),2,',','.').'  Bs. = ',number_format($resul['monto'],2,',','.')));
		$total+=$resul['monto'];
	}
	//antiguedad/clusula
	$resul=$pdf->buscar(4012);
	if($resul!=null){
        	$this->Row(array(utf8_decode($resul['descrip']),number_format($resul['valor'],0,'.','.').utf8_decode(" Días X "),number_format(($total/30),2,',','.').'  Bs. = ',number_format($resul['monto'],2,',','.')));
		$total+=$resul['monto'];
	}
	
	$this->Cell(198,5,'VACACIONES ART.223',0,1,'L');

	//vacaciones
	$resul=$pdf->buscar(4013);
	if($resul!=null){
        $this->Row(array(utf8_decode("a) ".$resul['descrip']),number_format($resul['valor'],0,'.','.').utf8_decode(" Meses "),'  Bs. = ',number_format($resul['monto'],2,',','.')));
		$total+=$resul['monto'];
	}
	
	$resul=$pdf->buscar(4014);
	if($resul!=null){
        	$this->Row(array(utf8_decode("b) ".$resul['descrip']),number_format($resul['valor'],0,'.','.').utf8_decode(" Meses "),'  Bs. = ',number_format($resul['monto'],2,',','.')));
		$total+=$resul['monto'];
	}
	$resul=$pdf->buscar(4015);
	if($resul!=null){
        	$this->Row(array(utf8_decode("c) ".$resul['descrip']),number_format($resul['valor'],0,'.','.').utf8_decode(" Meses "),'  Bs. = ',number_format($resul['monto'],2,',','.')));
		$total+=$resul['monto'];
	}
	$resul=$pdf->buscar(4016);
	if($resul!=null){
        	$this->Row(array(utf8_decode("d) ".$resul['descrip']),number_format($resul['valor'],0,'.','.').utf8_decode(" Meses "),'  Bs. = ',number_format($resul['monto'],2,',','.')));
		$total+=$resul['monto'];
	}
	//bonificacion fin de año
	$resul=$pdf->buscar(4017);
	if($resul!=null){
        	$this->Row(array(utf8_decode("".$resul['descrip']),number_format($resul['valor'],0,'.','.').utf8_decode(" Meses "),'  Bs. = ',number_format($resul['monto'],2,',','.')));
		$bono=$resul['monto'];
		$total+=$resul['monto'];
	}
	//sustitutiva
	$resul=$pdf->buscar(4018);
	if($resul!=null){
        	$this->Row(array(utf8_decode("".$resul['descrip']),number_format($resul['valor'],0,'.','.').utf8_decode(" Meses "),'  Bs. = ',number_format($resul['monto'],2,',','.')));
		$total+=$resul['monto'];
	}
	//INCE
	$resul=$pdf->buscar(2502);
	if($resul!=null){
        	$this->Row(array(utf8_decode("".$resul['descrip']),number_format($bono,0,'.','.').' X '.utf8_decode(" 0.50 %"),'  Bs. = ',number_format($resul['monto'],2,',','.')));
		$total+=$resul['monto'];
	}

	//anticipo
	$resul=$pdf->buscar(2601);
	if($resul!=null){
        	$this->Row(array(utf8_decode("".$resul['descrip']),number_format($resul['valor'],0,'.','.').utf8_decode(" Días "),'  Bs. = ',number_format($resul['monto'],2,',','.')));
		$total-=$resul['monto'];
	}
	*/
	//total
	$this->SetFont('Arial','B',8);
	$this->SetWidths(array(30,138,30));
	$this->Setceldas(array(0,0,1,'T'));
	$pdf->SetAligns(array('R','R','R'));
	$this->Row(array('',utf8_decode("TOTAL ASIGNACIONES: "),number_format($total,2,',','.')));
	
	$this->Ln(2);
	$this->SetFont('Arial','I',8);
	// llamado para hacer multilinea sin que haga salto de linea
        $this->SetWidths(array(10,158,30));
	$this->SetAligns(array('C','L','R'));
        $this->Setceldas(array(1,1,1));
	$this->Setancho(array(5,5,5));	

	$total2=0;
	$consulta="select * from nom_movimientos_nomina where codnom=".trim($codigo_nomina)." and ficha=$registro_id and tipnom=$tipo_nomina AND tipcon='D' and impdet='S'";
	$query2=query($consulta,$conexion);
	while($resul2=fetch_array($query2))
	{
		$this->Row(array(number_format($resul2['valor'],0,'.','.'),utf8_decode($resul2['descrip']),number_format($resul2['monto'],2,',','.')));
		$total2+=$resul2['monto'];
	}
	
	$this->SetFont('Arial','B',8);
	$this->SetWidths(array(30,138,30));
	$this->Setceldas(array(0,0,1,'T'));
	$pdf->SetAligns(array('R','R','R'));
	$this->Row(array('',utf8_decode("TOTAL DEDUCCIONES: "),number_format($total2,2,',','.')));
	return $total-$total2;
	
	//fin
	
}


function Footer(){
	
	$this->SetY(-36);
	liquidacion2($this->fpdf);
	$this->Cell(0,5,utf8_decode('Página ').$this->PageNo().'/{nb}',0,1,'C');
}


}


//Creación del objeto de la clase heredada
$pdf=new PDF("P","mm","A4");
$pdf->AliasNbPages();
$pdf->AddPage('P','Letter');
$pdf->AddFont('Sanserif','','sanserif.php');
$pdf->SetFont('Sanserif','',12);


	$registro_id=$_GET['registro_id']. " ";
	$tipo_nomina=$_GET['codt'];
	$codigo_nomina=$_GET['codigo_nomina'];
$pdf->fpdf=$pdf;
$pdf->datos_empleado($registro_id,$tipo_nomina,$codigo_nomina);
$total=$pdf->conceptos_integrales($registro_id,$codigo_nomina,$tipo_nomina,$pdf);
$tpres=$pdf->prestaciones($total,$pdf);
//$pdf->imprimir_otros_pagos($registro_id,$codigo_nomina,$tipo_nomina,$pdf);
//$tasig=$pdf->asignaciones($total,$pdf);
//$tdedu=$pdf->deducciones($total,$pdf);

$pdf->SetFont('Arial','B',8);
$pdf->Setceldas(array(0,0,1,'T'));
$pdf->SetWidths(array(108,60,30));
$pdf->Row(array('',utf8_decode("NETO A PAGAR"),number_format($tpres,2,',','.')));



$pdf->Output();
?>
