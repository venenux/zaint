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
	
// 	$consulta="select * from nomconceptos WHERE codcon=$_GET[conceptod]";
// 	$resultado33=query($consulta,$conexion);
// 	$fetch33 = fetch_array($resultado33);
	
	$this->SetFont('Arial','',12);
	$date1=date('d/m/Y');
	$date2=date('h:i a');	

	$this->Cell(150,5,utf8_decode($var_encabezado),0,0,'L');
	$this->Cell(38,5,'Fecha:  '.$date1,0,1,'R');
	$this->Cell(150,5,'RECURSOS HUMANOS',0,0,'L');
	$this->Cell(38,5,'Hora: '.$date2,0,1,'R');
	$this->Cell(150,5,'PRESTACIONES SOCIALES',0,1,'L');

	if(strlen($_GET['mes'])==1)
		$MES.="0".$_GET['mes'];
	else
		$MES=$_GET['mes'];
	$ANIO=$_GET['anio'];
	
		
	$this->Cell(188,8,'RELACION DEL '.$MES."/".$ANIO,0,1,'C');
	
	
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


function Cuentas($codcon,$codcon_pat,$pdf)
{
	$this->fpdf=$pdf;
	
	$conexion=conexion();
	$consulta="select na.*, np.cedula as cedula, np.fecing as fecing, np.codnivel4 as codnivel4, np.apenom as apenom, np.ficha as ficha from nom_movimientos_nomina as na inner join nompersonal as np on (na.cedula=np.cedula) where na.tipnom='".$_SESSION['codigo_nomina']."' and na.mes='$_GET[mes]' and na.anio='$_GET[anio]' and na.codcon=5004 order by np.codnivel4,np.ficha";
        // $consulta="select * from nompersonal where tipnom='".$_SESSION['codigo_nomina']."' order by codnivel4,ficha";
	$resultado=query($consulta,$conexion);
	
	// llamado para hacer multilinea sin que haga salto de linea
	
	$this->SetFont('Arial','B',9);
        $this->SetWidths(array(75,25,20,20,20,20,20));
	$this->SetAligns(array('C','C','C','C','C','C','C'));
        $this->Setceldas(array('T','T','T','T','T','T','T'));
	$this->Setancho(array(5,5,5,5,5,5,5));
        $this->Row(array('APELLIDOS Y NOMBRES',utf8_decode('CÉDULA'),'INGRESO','ACUM. PREST.','ACUM. INT.','PREST. DEL ' .$_GET['mes']."/".$_GET['anio'], 'INT. DEL '.$_GET['mes']."/".$_GET['anio']));
	
	// fin
	$consultast="SELECT status FROM nom_nominas_pago WHERE tipnom='".$_SESSION['codigo_nomina']."' and mes='$_GET[mes]' and anio='$_GET[anio]' and frecuencia=6";
	
	$resultado_status=query($consultast,$conexion);
	cerrar_conexion($conexion);
	$fetch_status=fetch_array($resultado_status);
	$cantidad_registros=30;
	$totalwhile=num_rows($resultado);
	$contar=1;
	$conta=1;
	$total_acum_prest_ger=$total_acum_int_ger=$total_prest_ger=$total_int_ger=0;
	$total_acum_prest=$total_acum_int=$total_prest=$total_int=0;
	$gerencia="";
	$i=0;
	while($totalwhile>=$contar)
	{
		$this->SetFont('Arial','',9);
		$conexion=conexion();
		$fila=fetch_array($resultado);
		if($gerencia!=$fila['codnivel4'])
		{
			//$this->SetFont('Arial','I',8);
			if($gerencia!="")
			{
				$this->SetFont('Arial','B',10);
				$this->Cell(180,5,"Total Prest. Acum.: ".number_format($total_acum_prest_ger,2,',','.')."   Total Int. Acum.: ".number_format($total_acum_int_ger,2,',','.')."  "."Total Prest.: ".number_format(($total_prest_ger),2,',','.')."  "."Total Int.: ".number_format(($total_int_ger),2,',','.'),0,1,'R');
				$total_acum_prest_ger=$total_acum_int_ger=$total_prest_ger=$total_int_ger=0;
			}
			$consulta_n4="SELECT descrip FROM nomnivel4 WHERE codorg='".$fila['codnivel4']."'";
			$resultado_n4=query($consulta_n4,$conexion);
			$fetchn4=fetch_array($resultado_n4);
			$this->SetFont("Arial","B",12);
			$this->Cell(100,5,$fila['codnivel4']."  ".$fetchn4['descrip'],0,1);
			$gerencia=$fila['codnivel4'];
			$this->SetFont('Arial','',10);
			
		}


		if($fetch_status['status']=='A')
		{
		
		$consulta="SELECT SUM(montototal) AS monto FROM nomacumulados_det WHERE ceduda=$fila[cedula] AND codcon=5000 AND cod_tac='PS'";
		$resultado_acum_ps=query($consulta,$conexion);
		$fetch_acum_ps=fetch_array($resultado_acum_ps);

		$consulta="SELECT SUM(monto) AS monto FROM nom_movimientos_nomina WHERE mes=".$_GET['mes']." and anio=".$_GET['anio']." and cedula=$fila[cedula] AND codcon=5000";
		$resultado_acum_ps2=query($consulta,$conexion);
		$fetch_acum_ps2=fetch_array($resultado_acum_ps2);

		$consulta="SELECT SUM(monto) AS monto FROM nom_movimientos_nomina WHERE mes=".$_GET['mes']." and anio=".$_GET['anio']." and cedula=$fila[cedula] AND codcon=5001";
		$resultado_acum_ant=query($consulta,$conexion);
		$fetch_acum_ant=fetch_array($resultado_acum_ant);

		$consulta="SELECT SUM(montototal) AS monto FROM nomacumulados_det WHERE ceduda=$fila[cedula] AND codcon=5004 AND cod_tac='ISP'";
		$resultado_acum_isp=query($consulta,$conexion);
		$fetch_acum_isp=fetch_array($resultado_acum_isp);
		
		$consulta="SELECT monto from nom_movimientos_nomina where mes=".$_GET['mes']." and anio=".$_GET['anio']." and ficha='".$fila['ficha']."' and tipnom='".$_SESSION['codigo_nomina']."' and codcon=5004 ";
		$resultado_int=query($consulta,$conexion);
		$fila_int=fetch_array($resultado_int);
		}
		elseif($fetch_status['status']=='C')
		{
		$consulta="SELECT SUM(montototal) AS monto FROM nomacumulados_det WHERE ceduda=$fila[cedula] AND codcon=5000 AND cod_tac='PS'";
		$resultado_acum_ps=query($consulta,$conexion);
		$fetch_acum_ps=fetch_array($resultado_acum_ps);

		$consulta="SELECT SUM(montototal) AS monto FROM nomacumulados_det WHERE mesa=".$_GET['mes']." and anioa=".$_GET['anio']." and  ceduda=$fila[cedula] AND codcon=5001 AND cod_tac='CON'";
		$resultado_acum_ant=query($consulta,$conexion);
		$fetch_acum_ant=fetch_array($resultado_acum_ant);

		$consulta="SELECT SUM(montototal) AS monto FROM nomacumulados_det WHERE ceduda=$fila[cedula] AND codcon=5004 AND cod_tac='ISP'";
		$resultado_acum_isp=query($consulta,$conexion);
		$fetch_acum_isp=fetch_array($resultado_acum_isp);
		
		$consulta="SELECT montototal as monto from nomacumulados_det where mesa=".$_GET['mes']." and anioa=".$_GET['anio']." AND tipnom='".$_SESSION['codigo_nomina']."' and codcon=5004 ";
		$resultado_int=query($consulta,$conexion);
		$fila_int=fetch_array($resultado_int);

		$consulta="SELECT SUM(monto) AS monto FROM nom_movimientos_nomina WHERE mes=".$_GET['mes']." and anio=".$_GET['anio']." AND cedula=$fila[cedula] AND codcon=5000";
		$resultado_acum_ps2=query($consulta,$conexion);
		$fetch_acum_ps2=fetch_array($resultado_acum_ps2);
		}
		if($fila_int['monto']!=0)
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
			$this->SetAligns(array('L','C','C','R','R','R','R'));
        		$this->Setceldas(array(0,0,0,0,0,0,0));
			if($fetch_status['status']=='A')
			{
			$this->Row(array($fila['apenom'],$cedula,fecha($fila['fecing']),number_format(($fetch_acum_ps['monto']+$fetch_acum_ps2['monto']-$fetch_acum_ant['monto']),2,',','.'),number_format(($fetch_acum_isp['monto']+$fila_int['monto']),2,',','.'),number_format($fetch_acum_ps2['monto'],2,',','.'),number_format($fila_int['monto'],2,',','.')));
			$total_acum_prest_ger+=($fetch_acum_ps['monto']+$fetch_acum_ps2['monto']-$fetch_acum_ant['monto']);
			$total_acum_int_ger+=$fetch_acum_isp['monto']+$fila_int['monto'];
			$total_prest_ger+=$fetch_acum_ps2['monto'];
			$total_int_ger+=$fila_int['monto'];
			$total_acum_prest+=($fetch_acum_ps['monto']+$fetch_acum_ps2['monto']-$fetch_acum_ant['monto']);
			$total_acum_int+=$fetch_acum_isp['monto']+$fila_int['monto'];
			$total_prest+=($fetch_acum_ps2['monto']);
			$total_int+=$fila_int['monto'];
			$conta++;
			$i++;
			}
			elseif($fetch_status['status']=='C')
			{
			$this->Row(array($fila['apenom'],$cedula,fecha($fila['fecing']),number_format(($fetch_acum_ps['monto']-$fetch_acum_ant['monto']),2,',','.'),number_format($fetch_acum_isp['monto'],2,',','.'),number_format($fetch_acum_ps2['monto'],2,',','.'),number_format($fila_int['monto'],2,',','.')));
			$total_acum_prest_ger+=($fetch_acum_ps['monto']-$fetch_acum_ant['monto']);
			$total_acum_int_ger+=$fetch_acum_isp['monto'];
			$total_prest_ger+=$fetch_acum_ps2['monto'];
			$total_int_ger+=$fila_int['monto'];
			$total_acum_prest+=($fetch_acum_ps['monto']-$fetch_acum_ant['monto']);
			$total_acum_int+=$fetch_acum_isp['monto'];
			$total_prest+=$fetch_acum_ps2['monto'];
			$total_int+=$fila_int['monto'];
			$conta++;
			$i++;
			}
		}
		if($conta==$cantidad_registros){
			$this->Ln(300);
			$this->AddPage('P','Letter');
			$this->SetFont('Arial','B',9);
       			$this->SetWidths(array(75,25,20,20,20,20,20));
			$this->SetAligns(array('C','C','C','C','C','C','C'));
        		$this->Setceldas(array('T','T','T','T','T','T','T'));
			$this->Setancho(array(5,5,5,5,5,5,5));
       			 $this->Row(array('APELLIDOS Y NOMBRES',utf8_decode('CÉDULA'),'INGRESO','ACUM. PREST.','ACUM. INT.','PREST. DEL ' .$_GET['mes']."/".$_GET['anio'], 'INT. DEL '.$_GET['mes']."/".$_GET['anio']));
			$conta=0;
			// fin
			
		}
		$contar++;

		
	}
	$this->SetFont('Arial','B',10);
	$this->Cell(180,5,"Total Prest. Acum.: ".number_format($total_acum_prest_ger,2,',','.')."   Total Int. Acum.: ".number_format($total_acum_int_ger,2,',','.')."  "."Total Prest.: ".number_format(($total_prest_ger),2,',','.')."  "."Total Int.: ".number_format(($total_int_ger),2,',','.'),0,1,'R');
	$this->Ln(2);
	
	$this->SetFont('Arial','',10);
	$this->Cell(62,5,'CANTIDAD DE PERSONAS: '.($i),0,1,'C');
	$this->Cell(62,5,'TOTAL PREST. ACUM: '.number_format($total_acum_prest,2,',','.'),0,0,'C');
	$this->Cell(62,5,'TOTAL INT. ACUM.: '.number_format($total_acum_int,2,',','.'),0,0,'C');
	$this->Cell(63,5,'TOTAL PREST DEL ' .$_GET['mes']."/".$_GET['anio'].' : '.number_format($total_prest,2,',','.'),0,1,'C');
	$this->Cell(63,5,'TOTAL INT. DEL ' .$_GET['mes']."/".$_GET['anio'].' : '.number_format($total_int,2,',','.'),0,1,'C');
	
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
