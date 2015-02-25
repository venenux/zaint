<?php 
session_start();
ob_start();
$termino=$_SESSION['termino'];
$tipo=$_GET['tipo'];
$nomina_id=$_GET['nomina_id'];
$codt = $_SESSION['codigo_nomina'];


require('fpdf.php');
include("../lib/common.php");


function fecha($value) { // fecha de YYYY/MM/DD a DD/MM/YYYY
 if ( ! empty($value) ) return substr($value,8,2) ."/". substr($value,5,2) ."/". substr($value,0,4);
}

class PDF extends FPDF
{

function header(){
	$Conn=conexion();
	$var_sql="select * from nomempresa";
	$rs = query($var_sql,$Conn);
	$row_rs = fetch_array($rs);
	$var_encabezado1=$row_rs['nom_emp'];
	$var_izquierda='../imagenes/'.$row_rs[imagen_izq];
	$var_derecha='../imagenes/'.$row_rs[imagen_der];
	
	
	$query="select * from nom_nominas_pago where codnom = '".$_GET['nomina_id']."' AND codtip= '".$_SESSION['codigo_nomina']."' ";		
	$result2=query($query,$Conn);	
	$fila2 = fetch_array($result2);

        $this->SetFont("Arial","",10);
     	
        
     	//$this->Cell(100,6,$var_encabezado1,0,0,"L");
	$this->Image($var_izquierda,10,6,30,15);
	$this->Image($var_derecha,170,6,30,15);
	$this->Ln(5);
     	$this->Cell(130,6,$_SESSION['termino'].': '. $_GET['nomina_id'] .' - '. $_SESSION[nomina],0,0,'C');
     	$this->Ln(10);
	 $this->SetFont("Arial","",10);
     	
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

function personas($nomina_id,$codt,$pdf){

	$conexion=conexion();
	$query="select per.*,car.* from nompersonal as per LEFT join nom_movimientos_nomina as nom on (per.ficha = nom.ficha) left join nomcargos as car on per.codcargo = car.cod_car where  nom.codnom = '$nomina_id' and nom.tipnom = ".$codt." and per.tipnom=".$codt." group by per.ficha order by per.codnivel3, per.apenom";
	
	$result=query($query,$conexion);


	$query="select * from nom_nominas_pago where codnom = '".$nomina_id."' AND codtip= '".$codt."' ";		
	$result2=query($query,$conexion);	
	$fila2 = fetch_array($result2);
	$contador=1;
	$num=1;
	$gerencia="";
	$persona=0;
	$totalpersonas=0;
	$totalbd=num_rows($result);
	$pers=0;
	$CANTIDAD=52;
	while ($fila = fetch_array($result))
	{
		
		if($gerencia!=$fila['codnivel3']){
			$persona=0;
			if ($gerencia!=""){
				$this->SetFont('Arial','I',8);
				$this->Ln();
				$this->MultiCell(188,5,'Total Gerencia --> Total empleados: '.$pers.'    Total Asignaciones: '.number_format($total_asig_gerencia,2,',','.').'     Total Deducciones: '.number_format($total_deduc_gerencia,2,',','.'). '     Total : '.number_format(($total_asig_gerencia-$total_deduc_gerencia),2,',','.'),0,'R');
				
				$this->Ln(250);
				$CANTIDAD=52;
				$total_asig_gerencia=0;
				$total_deduc_gerencia=0;
				$pers=0;
			}
			
			
			$this->SetFont('Arial','I',8);
			$consulta_n4="SELECT descrip FROM nomnivel4 WHERE codorg='".$fila['codnivel3']."'";
			$resultado_n4=query($consulta_n4,$conexion);
			$fetchn4=fetch_array($resultado_n4);
			 $this->SetFont("Arial","",10);
			$this->Cell(100,5,$fila['codnivel3']."  ".$fetchn4['descrip']);
			$this->Ln();
			$this->Cell(188,5,'Desde: '.fecha($fila2['periodo_ini']).' Hasta: '.fecha($fila2['periodo_fin']).' Pago: '.fecha($fila2['fechapago']),0,0,'C');
			$this->Ln();
			 $this->SetFont("Arial","I",8);
			$gerencia=$fila['codnivel3'];
			$CANTIDAD=52;
		}
		
		
			
		if($gertmp!=$fila['codnivel3'])
		{
			$persona+=1;
			
// 			if($persona>$nump){
// 				$this->Ln(250);
// 				$this->SetFont('Arial','I',8);
// 				$consulta_n4="SELECT descrip FROM nomnivel3 WHERE codorg='".$fila['codnivel4']."'";
// 				$resultado_n4=query($consulta_n4,$conexion);
// 				$fetchn4=fetch_array($resultado_n4);
// 				$this->SetFont("Arial","",10);
// 				$this->Cell(100,5,$fila['codnivel3']."  ".$fetchn4['descrip']);
// 				$this->Ln();
// 				$this->Cell(188,5,'Desde: '.fecha($fila2['periodo_ini']).' Hasta: '.fecha($fila2['periodo_fin']).' Pago: '.fecha($fila2['fechapago']),0,0,'C');
// 				$this->Ln();
// 				$this->SetFont("Arial","",8);
// 				$gerencia=$fila['codnivel3'];
// 				$persona=1;
// 			}
			
				
			$sficha = $fila['ficha'];
			
			$query="select * from nom_movimientos_nomina as mn
			inner join nompersonal as pe on mn.ficha = pe.ficha
			inner join nomconceptos as c on c.codcon = mn.codcon
			where pe.ficha = '".$sficha."' and pe.tipnom='".$codt."' and mn.codnom = '".$nomina_id."' and mn.tipnom = '".$codt."' and mn.tipcon<>'P' order by mn.tipcon,c.codcon";	
			//exit(0); 
		
			$result1=query($query,$conexion);

		
			
			if(num_rows($result1)+6>$CANTIDAD){
				$this->Ln(300);
				$this->SetFont('Arial','I',8);
				$consulta_n4="SELECT descrip FROM nomnivel3 WHERE codorg='".$fila['codnivel4']."'";
				$resultado_n4=query($consulta_n4,$conexion);
				$fetchn4=fetch_array($resultado_n4);
				$this->SetFont("Arial","",10);
				$this->Cell(100,5,$fila['codnivel3']."  ".$fetchn4['descrip']);
				$this->Ln();
				$this->Cell(188,5,'Desde: '.fecha($fila2['periodo_ini']).' Hasta: '.fecha($fila2['periodo_fin']).' Pago: '.fecha($fila2['fechapago']),0,0,'C');
				$this->Ln();
				$this->SetFont("Arial","",8);
				$gerencia=$fila['codnivel3'];
				$CANTIDAD=52;
			}
			$CANTIDAD=$CANTIDAD-num_rows($result1)-6;

			//$this->Cell(100,5,$CANTIDAD,0,1);
			//Datos personal
			$this->SetFont('Arial','',8);
			$this->SetWidths(array(94,94));
			$this->SetAligns(array('L','L'));
			$this->Setceldas(array('LT','TR'));
			$this->Setancho(array(5,5));
			$this->Row(array('Nombre: '.$fila['apellidos'].", ".$fila['nombres'],'Cargo: '.$fila['des_car']));
			$this->Setceldas(array('LB','BR'));
			$this->Row(array(utf8_decode('Cédula: '.number_format($fila['cedula'],0,',','.')),'Ficha: '.$fila['ficha']."            Sueldo Basico:  ".$fila[suesal]));
			
			$this->Ln(2);
			$this->SetFont('Arial','',8);
			$this->Cell(90,5,'Concepto',1,0,'C');
			$this->Cell(24,5,'Ref',1,0,'C');
			$this->Cell(37,5,'Asignaciones',1,0,'C');
			$this->Cell(37,5,'Deducciones',1,1,'C');
			
			$pers+=1;	
			$sub_total_asig=0;
			$sub_total_dedu=0;
			$sub_total_pat=0;
			
			while ($row = fetch_array($result1))
			{
				$contador++;
				if ($row['tipcon']=='A')
					{
						$valor1= number_format($row['monto'],2,',','.');
						$valor2="";
						$sub_total_asig=$row['monto']+$sub_total_asig;
						$total_asig=$row['monto']+$total_asig;
						$total_asig_gerencia=$row['monto']+$total_asig_gerencia;
					}
				if ($row['tipcon']=='D')
						{
						$valor2= number_format($row['monto'],2,',','.');
						$valor1="";
						$sub_total_dedu=$row['monto']+$sub_total_dedu;
						$total_dedu=$row['monto']+$total_dedu;
						$total_deduc_gerencia=$row['monto']+$total_deduc_gerencia;
						}
				// llamado para hacer multilinea sin que haga salto de linea
				$this->SetFont('Arial','I',8);
				$this->SetWidths(array(90,24,37,37));
				$this->SetAligns(array('L','C','R','R'));
				$this->Setceldas(array(0,0,0,0));
				$this->Setancho(array(5,5,5,5));
				$this->Row(array($row[codcon].'  '.$row[descrip],$row[valor],$valor1,$valor2));
		
			
			}


			$this->Cell(114,5,'Sub-Total: ',0,0,'R');
			$this->Cell(37,5,number_format($sub_total_asig,2,',','.'),'T',0,'C');
			$this->Cell(37,5,number_format($sub_total_dedu,2,',','.'),'T',0,'C');
			$this->Ln();
			 $this->SetFont("Arial","I",8);
			$this->Cell(151,5,'Total',0,0,'R');
			$this->Cell(37,5,number_format($sub_total_asig-$sub_total_dedu,2,',','.'),0,0,'C');
			$this->Ln();
			$this->SetFont("Arial","I",8);
			$totalpersonas=$totalpersonas+1;
			if ($persona==2 && $totalpersonas==$totalbd){
				$this->SetFont('Arial','I',8);
				$this->Ln();
				$this->MultiCell(188,5,'Total Gerencia -->     Total Asignaciones: '.number_format($total_asig_gerencia,2,',','.').'     Total Deducciones: '.number_format($total_deduc_gerencia,2,',','.'). '     Total : '.number_format(($total_asig_gerencia-$total_deduc_gerencia),2,',','.'),0,'R');
				$CANTIDAD=52;
				$this->Ln(300);
			}
			
		}
		
		

		
	}
	
	$pdf->firmas($total_asig,$total_dedu,$CANTIDAD);
	
		  
}
function Vacaciones(){
	
	$conexion=conexion();
	$consulta_vac="SELECT ficha, apenom FROM nompersonal WHERE tipnom =".$_SESSION['codigo_nomina']." and estado='Vacaciones' ORDER BY ficha";
	$resultado_vac=query($consulta_vac,$conexion);

	$this->Ln(20);
	$this->SetFont('Arial','I',12);
	if(num_rows($resultado_vac)!=0){
		$this->Ln(300);
		$this->Cell(188,8,'PERSONAL DE VACACIONES',0,0,'C');
		$this->Ln(10);
		$this->SetFont('Arial','',10);
		$cantidad_registros=40;
		$totalwhile=num_rows($resultado_vac);
		$contar=1;
		while($totalwhile>=$contar)
		{
			$fetchvac=fetch_array($resultado_vac);
			$this->Cell(60,5,$fetchvac['ficha'],0,0,'R');
			$this->Cell(100,5,'   '.$fetchvac['apenom'],0,0,'L');
			$this->Ln();
			if($contar==$cantidad_registros){
				$this->Ln(300);
				$this->SetFont('Arial','I',12);
				$this->Cell(188,8,'PERSONAL DE VACACIONES',0,0,'C');
				$this->SetFont('Arial','I',10);
				$this->Ln(10);
				
			}
			$contar++;
	
			
		}
	}
}
function Footer(){
	$this->SetY(-15);
	$this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}

function firmas($total_asig,$total_dedu,$cantidad){

	$conexion=conexion();
	$consulta_vac="SELECT ficha, apenom FROM nompersonal WHERE tipnom =".$_SESSION['codigo_nomina']." and estado='Vacaciones' ORDER BY ficha";

	
	
	$resultado_vac=query($consulta_vac,$conexion);
	
	$consultaa="SELECT ficha, apenom FROM nompersonal WHERE tipnom =".$_SESSION['codigo_nomina']." and estado<>'Egresado'";
	$resultadooo=query($consultaa,$conexion);
	$cant_personal+=num_rows($resultadooo);
	
	$query="select * from nom_nominas_pago where codnom = '".$_GET['nomina_id']."' AND codtip= '".$_SESSION['codigo_nomina']."' ";		
	$result2=query($query,$conexion);	
	$fila2 = fetch_array($result2);
	
	$this->SetFont('Arial','',10);
	$queda=$cantidad-10;
	if($queda<0){
		$this->Ln(300);
		$this->Cell(188,8,'Desde: '.fecha($fila2['periodo_ini']).' Hasta: '.fecha($fila2['periodo_fin']).' Pago: '.fecha($fila2['fechapago']),0,0,'C');
		$this->Ln();
	}
	
    
	$this->Cell(50,5,'Cant. de Personas: '.$cant_personal,0,1,'L');
	
	$this->Cell(188,5,'Total Generales: '.number_format($total_asig,2,',','.').'       '.number_format($total_dedu,2,',','.'),0,1,'R');

 	$this->Cell(188,5,'Neto: '.number_format($total_asig-$total_dedu,2,',','.'),0,1,'R');
        $this->Ln(10);

	$this->SetFont('Arial','I',7);

   	$this->Cell(62,5,' ','LT',0);
   	$this->Cell(62,5,' ','LT',0);
    	$this->Cell(62,5,' ','LTR',1);
	
	$this->Cell(62,10,'','L',0);
   	$this->Cell(62,10,'','L',0);
    	$this->Cell(62,10,'','LR',1);
    	
    // llamado para hacer multilinea sin que haga salto de linea
        $this->SetWidths(array(62,62,62));
	$this->SetAligns(array('C','C','C'));
        $this->Setceldas(array('1','1','1'));
	$this->Setancho(array(5,5,5));
        $this->Row(array('ANALISTA DE PERSONAL','ANALISTA DE PERSONAL CONTROL INTERNO','JEFE DE LA OFICINA DE RRHH'));

	
}
}


//Creación del objeto de la clase heredada
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4');
$pdf->AddFont('Sanserif','','sanserif.php');
$pdf->SetFont('Sanserif','',10);

$pdf->personas($nomina_id,$codt,$pdf);

//$pdf->Vacaciones();

$pdf->Output();
?>
