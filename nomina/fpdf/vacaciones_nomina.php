<?php
if (!isset($_SESSION)) {
  session_start();
}
require('fpdf.php');

require_once '../lib/config.php';
require_once '../lib/pdfcommon.php';
require_once '../lib/common.php';
//include ("../selectra/header.php");


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
	
	//$this->Image($var_imagen_izq,8,6,25);
	$this->Cell(150,5,utf8_decode($var_encabezado),0,0,'L');
	$this->Cell(38,5,'Fecha:  '.$date1,0,1,'R');
	$this->Cell(150,5,'GERENCIA DE RECURSOS HUMANOS',0,0,'L');
	$this->Cell(38,5,'Hora: '.$date2,0,1,'R');

	$this->Cell(188,5,utf8_decode('VACACIONES NOMINA DE ').$_SESSION['nomina'],0,1,'C');
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

function datos($rc){

	
	$this->Ln(5);
	$this->SetFont('Arial','B',8);
	$this->Cell(67,5,'APELLIDO Y NOMBRES ',1,0);
	$this->Cell(27,5,utf8_decode('Nº C.I. '),1,0);
	$this->Cell(73,5,utf8_decode('CARGO '),1,0);
	$this->Cell(28,5,utf8_decode('FICHA'),1,0);
	$this->Ln();
	$this->SetFont('Arial','I',7);
	// llamado para hacer multilinea sin que haga salto de linea
        $this->SetWidths(array(71,27,69,28));
	$this->SetAligns(array('L','C','L','C'));
	$this->Setceldas(array(0,0,0,0));
        
	$this->Setancho(array(5,5,5,5));
        $this->Row(array(utf8_decode($rc['apenom']),number_format($rc['cedula'],0,'.','.'),utf8_decode($rc['cargo']),$rc['ficha']));
	//fin
}

function imprimir_tabla($pdf){
	$cantidad_registros=4;
	$conexion=conexion();
	$consulta="SELECT pe.apenom as apenom, pe.cedula as cedula, pe.ficha as ficha, pe.fecing as fecing, pe.suesal as suesal, car.des_car as cargo from nompersonal pe LEFT JOIN nomcargos car on (pe.codcargo=car.cod_car) WHERE tipnom=$_SESSION[codigo_nomina]";
	$rs = query($consulta, $conexion);
	$num_paginas = obtener_num_paginas($consulta,$cantidad_registros);
	$total= num_rows($rs);
	$this->Ln(10);


	
	//Datos
	$cont=1;
	$contar=1;
	$pagina=1;
	$reg=0;
	$totalRet=0;
	while ($total>=$contar)
	{
	
		$fila = fetch_array($rs);
		$reg++;
		$ficha=$fila['ficha'];
		$cedula=$fila['cedula'];
		$consulta="SELECT * FROM nom_progvacaciones WHERE ficha=$ficha AND ceduda=$cedula AND estado<>'Pagado' ORDER BY periodo DESC";
		$filav=query($consulta,$conexion);
		$pdf->datos($fila);
		//Cabecera
		$this->SetFont('Arial','B',8);
		$this->SetWidths(array(25,30,25,25,30,30,30));
		$this->SetAligns(array('C','C','C','C','C','C','C'));
		$this->Setancho(array(5,5,5,5,5,5,5));
		$this->Setceldas(array(1,1,1,1,1,1,1));
		$this->Row(array(utf8_decode('AÑO'),utf8_decode('Fecha Venc.'),utf8_decode('Días Vac.'),utf8_decode('Días Bono'),utf8_decode('Mto. Bono'),utf8_decode('Fecha Ini. Vac.'),utf8_decode('Fecha Rei. Vac.')));
		
		
		$i=0;
		$anio2=0;
		
		while(($fila1=fetch_array($filav))!=null){
		
			$anio=$fila1['periodo'];
			if($i==1)
				$anio2=$anio;
			if(($anio!=$anio2)&&($i!=0))
			{
				$this->SetFont('Arial','I',8);
				$this->SetAligns(array('C','C','C','C','R','C','C'));
				$this->Setceldas(array(0,0,0,0,0,0,0));

				if($dbono==0){
					$mb=0;
				}else{
					$mb=$fila3['dpago'];
				}
				$this->Row(array($fila2['periodo'],fecha($fila2['fecha_venc']),number_format(($ddisfrute-$fila2['dpagob']), 0, ',', '.'),number_format($dbono, 0, ',', '.'),number_format($mb, 2, ',', '.'), fecha($fila2['fechavac']),fecha($fila2['fechareivac'])));

				
				$dbono=0;
				$totaldis+=$ddisfrute;
				$totalpag+=$fila2['dpagob'];
				$ddisfrute=0;
				$anio2=$anio;
			}
			//echo $anio2.'/'.$anio;
			$anio2=$anio;
			$i++;
				switch($fila1['tipooper']){
					case 'DA':
						$ddisfrute+=$fila1['ddisfrute'];
					break;
					case 'DV':
						$ddisfrute+=$fila1['ddisfrute'];
						$fila2=$fila1;
					break;
					case 'DB':
						$dbono+=$fila1['dpagob'];
						$fila3=$fila1;
					break;
					case 'DI':
						$dbono+=$fila1['dpagob'];
					break;
				}
				
				
			}
				$this->SetFont('Arial','I',8);
				$this->SetAligns(array('C','C','C','C','R','C','C'));
				$this->Setceldas(array(0,0,0,0,0,0,0));
				if($dbono==0){
					$mb=0;
				}else{
					$mb=$fila3['dpago'];
				}
				
				$this->Row(array($fila2['periodo'],fecha($fila2['fecha_venc']),number_format(($ddisfrute-$fila2['dpagob']), 0, ',', '.'),number_format($dbono, 0, ',', '.'),number_format($mb, 2, ',', '.'),fecha($fila2['fechavac']),fecha($fila2['fechareivac'])));

				$totaldis+=$ddisfrute;
				$totalpag+=$fila2['dpagob'];
				$ddisfrute=0;
				$dbono=0;
				$this->SetFont('Arial','B',8);
				$this->Cell(198,5,utf8_decode('Total Días de Vacaciones = '.$totaldis.'     Total Días Disfrutados =  '.$totalpag.'   Total Días Pendientes = '.($totaldis-$totalpag)),0,1,'C');
				$totaldis=0;
				$totalpag=0;
	
		
		
	
		if($cont==$cantidad_registros)
		{	
			if ($pagina!=$num_paginas){
				$this->Ln(160);
				$pagina++;
				//$pdf->imprimir_datos($pagina,$num_paginas,$fechaDesde,$fechaHasta);
				
				$cont=1;
			}
		}else{$cont++;}
		//echo $contar;
		$contar++;
	
	}
	

	


}
}


//Creación del objeto de la clase heredada
$pdf=new PDF('P','mm','Letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$conexion=conexion();
$pdf->imprimir_tabla($pdf);

$pdf->Output();
?>