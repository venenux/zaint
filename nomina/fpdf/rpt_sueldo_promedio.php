<?php 
if (!isset($_SESSION)) {
  session_start();
}
require('fpdf.php');
require_once '../lib/config.php';
require_once '../lib/common.php';

include('numerosALetras.class.php');

class PDF extends FPDF
{

//Cabecera de página
function Header()
{
        $var_izquierda='../imagenes/izquierda.jpg';
	$var_centro='../imagenes/centro.jpg';
	$var_derecha='../imagenes/derecha.jpg';
	
        $this->SetFont("Arial","B",12);
     	$this->Image($var_izquierda,25,12,80,15);
	$this->Image($var_centro,110,12,45,15);
	$this->Image($var_derecha,155,12,20,13);
	$this->SetFont('Arial','B',12);
     	$this->Ln(10);

}

function Footer(){
	$this->SetY(-40);
	$this->Cell(188,10,'','B',0);
	$conexion=conexion();
	$conOCS = 'select * from nomempresa';
	$resOCS = query($conOCS,$conexion);
	$filaOCS = fetch_array($resOCS);
	
	$direccion=$filaOCS['dir_emp'].' '.$filaOCS['ciu_emp'].' '.$filaOCS['edo_emp'];
	$this->Ln();
	$this->SetFont('Arial','I',8);
	$this->Cell(188,5,$direccion,'',0,'C');

	$telefono='Telefonos: '.$filaOCS['tel_emp'].' Fax: '.$filaOCS['fax_emp'];
	$this->Ln();
	$this->Cell(188,5,$telefono,'',0,'C');
	
	$this->SetY(-15);
	$this->SetFont('Arial','I',8);
	$this->Cell(188,10,'Elaborado Por: '.$_SESSION['nombre'],0,0,'L');

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
function variacion_sueldo($tipo_nom,$ficha){
	$ano=date('Y')-1;
	$conexion=conexion();
	$consulta="select * from nom_movimientos_nomina where ficha='$ficha' and anio=$ano and tipnom=$tipo_nom group by mes ";
	$resultado=query($consulta,$conexion);
	


}
function detalle($pdf){

	$conexion=conexion();
	//datos de la persona
	$registro_id=$_GET[registro_id];
	$tipo=$_GET[tipN];
	$esta=$_GET[est];
	$query="select * from nompersonal where ficha = '$registro_id' and tipnom='$tipo'";
	$resultado = query($query,$conexion);
	$personal = fetch_array($resultado);
	
	
	$fechaini=$personal['fecing'];

	list($anio,$mes,$dia)=explode("-",$fechaini);
   	$fechaini= $dia."/".$mes."/".$anio; 
	$fechasus=$personal['fechajubipensi'];
	list($anio,$mes,$dia)=explode("-",$fechasus);
   	$fechasus= $dia."/".$mes."/".$anio; 
	
	$id_cargo=$personal['codcargo'];
	
	$query="select * from nomcargos where cod_car = '$id_cargo'";
	$resultado1 = query($query,$conexion);
	$cargo1 = fetch_array($resultado1);
	$cargo=$cargo1['des_car'];

	$id_gerencia=$personal['codnivel4'];
	$query="select * from nomnivel4 where codorg = '$id_gerencia'";
	$resultado2 = query($query,$conexion);
	$ger = fetch_array($resultado2);
	$gerencia=$ger['descrip'];
	
	$monto=$personal['suesal'];
	
	$ficha=$personal['ficha'];
	
		
	$n = new numerosALetras();
	$salarioletras=$n->convertir($monto);

	
	$salario=number_format($monto,2,',','.');
	
	
	
	$this->Ln(10);
	$this->SetFont('Arial','B',12);
	$this->Cell(188,7,'CALCULO DEL SUELDO PROMEDIO',0,1,'C');
	$this->SetFont('Arial','B',10);
	$this->Cell(188,7,utf8_decode('FECHA DE ELABORACIÓN:     ').date("d/m/Y"),0,1,'R');

	
        $this->SetWidths(array(65,65,33,25));
	$this->SetAligns(array('C','C','C','C'));
        $this->Setceldas(array(1,1,1,1));
	$this->Setancho(array(5,5,5,5));
	$this->SetFont('Arial','B',8);
        $this->Row(array('APELLIDOS','NOMBRES',utf8_decode('CÉDULA IDENTIDAD'),'F. INGRESO'));
	$this->SetFont('Arial','I',8);
	$this->Setceldas(array(0,0,0,0));
	$this->Row(array($personal['apellidos'],$personal['nombres'],$personal['cedula'],$fechaini));
	
	//categoria
	$consulta3="select * from nomcampos_adic_personal where ficha='$ficha' and id =16 and tiponom='$tipo'";
	$query3=query($consulta3,$conexion);
	$rca=fetch_array($query3);

	$this->Ln(5);
	$this->SetFont('Arial','B',8);
	$this->Setceldas(array(1,1,1,1));
        $this->Row(array('UBIC. ADMINISTRATIVA','CARGO',utf8_decode('CÓDIGO'),'CATEGORIA'));
	$this->SetFont('Arial','I',8);
	$this->Setceldas(array(0,0,0,0));
	$this->Row(array($gerencia,$cargo,$personal['ficha'],$fechaini,$rca['valor']));
	
	$pdf->variacion_sueldo($tipo,$ficha);
	
	
}
}
//Creación del objeto de la clase heredada
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

	$pdf->detalle($pdf);
$pdf->Output();
?>