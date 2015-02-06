<?php 
session_start();
ob_start();
$termino=$_SESSION['termino'];
$tipo=$_GET['tipo'];
$nomina_id=$_GET['nomina_id'];
$codtp=$_GET['codt'];
$departamento=$_GET['dep'];


require('fpdf.php');

include("../lib/common.php");

function fecha($value) { // fecha de YYYY/MM/DD a DD/MM/YYYY
 if ( ! empty($value) ) return substr($value,8,2) ."/". substr($value,5,2) ."/". substr($value,0,4);
}


class PDF extends FPDF
{

function header(){
// 	$Conn=conexion();
//       $var_izquierda='../imagenes/LOGO_FUNDAVANZA_RECIBO.jpg';
// 	$date1=date('d/m/Y');
// 	$date2=date('h:i a');
// 
//         $this->SetFont("Arial","",12);
//      	
//         
//      	$this->Cell(188,5,"Fecha:   ".$date1,0,1,"R");
//      	$this->Cell(188,5,"Hora:    ".$date2,0,1,'R');
// 	$this->Cell(188,8,"RECIBO DE PAGO",0,1,"C");
// 	$this->Ln(5);
// 	$this->SetFont("Arial","",10);
	$conexion=conexion();
	$var_sql="select * from nomempresa";
	$rs = query($var_sql,$conexion);
	$row_rs = fetch_array($rs);
	$var_encabezado=$row_rs['nom_emp'];
	$var_izquierda='../imagenes/'.$row_rs[imagen_izq];
	$this->Image($var_izquierda,10,4,30,15);
	
	$this->SetFont('Arial','',9);
	$date1=date('d/m/Y');
	$date2=date('h:i a');	

       
       $this->Cell(70,5,'',0,0,'L');
//	$this->Cell(70,5,utf8_decode($var_encabezado),0,0,'L');
	$this->Cell(50,5,'RECIBO DE PAGO'.$ANIO,0,0,'C');
	$this->Cell(70,5,'Fecha:  '.$date1,0,1,'R');
//	$this->Cell(50,5,'Gobierno de Carabobo',0,0,'L');
	$this->Ln(4);
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

function personas($nomina_id,$codtp,$departamento){

	$conexion=conexion();

	
	$consulta3 = "SELECT periodo_ini, periodo_fin, periodo FROM nom_nominas_pago WHERE codnom = '".$nomina_id."' AND codtip = '".$codtp."'";
	$result5 = query($consulta3,$conexion);
	$fetch5 = fetch_array($result5);
	
	
	
	$query="select * from nomempresa";		
	$result=query($query,$conexion);	
	$row = fetch_array ($result);	
	$nompre_empresa=$row[nom_emp];
	$ciudad=$row[ciu_emp];
	$gerente=$row[ger_rrhh];
	
	if($departamento=='Todos'){
		$query="select * from nomvis_per_movimiento where codnom='".$nomina_id."' and tipnom='".$_SESSION['codigo_nomina']."' ";		
	}else{
		$query="select * from nomvis_per_movimiento where codnom='".$nomina_id."' and tipnom='".$_SESSION['codigo_nomina']."' and codnivel3= ".$departamento;

	}
	$result_lote=query($query,$conexion);
	
	$totalbd=num_rows($result);
	
	while ($fila=fetch_array($result_lote))
	{
		//Datos personal
		$registro_id=$fila['ficha'];
		$query="select * from nompersonal where ficha = '$registro_id' and tipnom=$_SESSION[codigo_nomina]";
		$result=query($query,$conexion);	
		$fila = fetch_array ($result);	
		$cargo_id=$fila['codcargo'];
		$ingreso=$fila['fecing'];
		
		$query="select des_car from nomcargos where cod_car = '$cargo_id'";		
		$result=query($query,$conexion);	
		$row = fetch_array ($result);	
		$nompre_cargo=$row[des_car];
		$sub_total_dedu=0;
		
		$this->SetFont('Arial','',9);
		$this->SetWidths(array(30,100));
		$this->SetAligns(array('L','L'));
		$this->Setceldas(array(0,0));
		$this->Setancho(array(5,5));
		$query="select cod_ban,des_ban from nombancos where cod_ban='".$fila[codbancob]."'";
		$resultado=query($query,$conexion);
		$row2 = mysql_fetch_array($resultado);

              $this->Row(array('Ficha: '.$fila[ficha],utf8_decode('Nombre:').$fila[apenom],utf8_decode('Cédula:').number_format($fila[cedula],0,'.','.')));
		//$this->Row(array('Ficha: '.$fila[ficha],utf8_decode('Cédula: ').number_format($fila[cedula],0,'.','.')));
		//$this->Row(array(number_format($fila[cedula],0,'.','.'),utf8_decode($fila[apenom]),$fila[ficha]));             
              
              $this->SetWidths(array(60,123));
              $this->Row(array('Sueldo/salario: '.number_format($fila[suesal],2,',','.'),$_SESSION[nomina]));
		$this->SetWidths(array(100,123));
		$this->Row(array('Fecha de ingreso: '.date("d/m/Y",strtotime($ingreso)),'Periodo del: '.fecha($fetch5['periodo_ini']).' al: '.fecha($fetch5['periodo_fin'])));
		$this->SetWidths(array(10,10));
		$query="select cod_car,des_car from nomcargos where cod_car='".$fila[codcargo]."'";
		$result=query($query,$conexion);
  		$row = mysql_fetch_array($result);
		$this->SetWidths(array(100,123));
		$this->SetAligns(array('L','L'));
		$this->Setceldas(array(0,0));
		$this->Setancho(array(5,5));
		$this->Row(array('Cargo: '.$row[des_car],'Banco/Cuenta: '.$row[des_ban] .$row2[des_ban].'- '. $fila[cuentacob]));
		$this->Ln(1);
				
		$query="select * from nom_movimientos_nomina as mn
			inner join
			nompersonal as pe on mn.ficha = pe.ficha
			inner join
			nomconceptos as c on c.codcon = mn.codcon
			where pe.ficha = '$registro_id' and pe.tipnom =".$_SESSION['codigo_nomina']." and mn.codnom= '".$nomina_id."' and mn.tipnom='".$codtp."' and mn.tipcon<>'P'
			group by pe.apenom,pe.ficha,c.formula,c.codcon order by pe.apenom, mn.tipcon";

		$this->Cell(1,0,utf8_decode('--------------------------------------------------------------------'),0,0,'L');
              $this->Cell(1,16,utf8_decode('--------------------------------------------------------------------'),0,0,'L');
              $result =query($query,$conexion);
             	$this->Cell(105,7,utf8_decode('Código y Descripción de Concepto'),0,0,'L');
		$this->Cell(25,7,utf8_decode('Ref'),0,0,'C');
		$this->Cell(31,7,utf8_decode('Asignación'),0,0,'R');
		$this->Cell(30,7,utf8_decode('Deducción'),0,1,'R');
		$this->Ln(2);
		
		$sub_total_asig=0;
		$sub_total_dedu=0;
		while ($row = mysql_fetch_array($result))
		{
			if ($row[tipcon]=='A')
			{
			$asig= number_format($row[monto],2,',','.');
			$sub_total_asig=$row[monto]+$sub_total_asig;
			}

			if ($row[tipcon]=='D')
			{
			$dedu= number_format($row[monto],2,',','.');
			$sub_total_dedu=$row[monto]+$sub_total_dedu;
			}
			
			$this->SetFont('Arial','',8);
			$this->SetWidths(array(105,25,31,30));
			$this->SetAligns(array('L','C','R','R'));
			$this->Setceldas(array(0,0,0,0));
			$this->Setancho(array(5,5,5,5));
			$this->Row(array($row[codcon] . ' - ' . utf8_decode($row[descrip]),$row[valor],$asig,$dedu));
			$asig='';
			$dedu='';
			
		}
	
			$this->SetFont('Arial','',8);
			$this->Cell(120,5,'Sub-Totales: ',0,0,'R');
			$this->Cell(34,6,number_format($sub_total_asig,2,',','.'),'T',0,'R');
			$this->Cell(34,6,number_format($sub_total_dedu,2,',','.'),'T',1,'R');
		//	$this->Ln(1);
			$this->Cell(120,5,'Neto a Depositar Bs.: ',0,0,'R');
			$this->Cell(68,5,number_format($sub_total_asig-$sub_total_dedu,2,',','.'),'T',1,'C');
// 			$this->MultiCell(188,5,'Observaciones: '.$observacion,0);
// 			$this->Ln(3);
// 			$this->Cell(188,1,'','TB',1);
			$this->Ln(8);
			$this->Cell(64,5,'');
			$this->Cell(60,6,'RECIBO CONFORME','T',0,'C');	
			$this->Cell(64,5,'');
			$this->Ln(420);
			
			
			
	}
}


function Footer(){
// 	$this->SetY(-15);
// 	$this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}


}


//Creación del objeto de la clase heredada
// $pdf = new PDF('L', 'mm', array(215,139));
$pdf=new PDF('P','mm','mcarta');

$pdf->AliasNbPages();
$pdf->AddPage('P','mcarta');
$pdf->SetFont('Arial','',9);
$pdf->personas($nomina_id,$codtp,$departamento);
$pdf->Output();
?>
