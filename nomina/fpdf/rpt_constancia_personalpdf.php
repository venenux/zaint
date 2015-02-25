<?php 
header('Content-Type: text/html; charset=iso-8859-1');
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
       
/*	
	$var_izquierda='../imagenes/logoIzq.jpg';
	//$var_centro='../imagenes/centro.jpg';
       $var_derecha='../imagenes/logoDer.jpg';
	
        $this->SetFont("Arial","B",12);
     	$this->Image($var_izquierda,25,12,35,23);
	//$this->Image($var_centro,110,12,55,15);
	$this->Image($var_derecha,140,12,35,13);*/
     	$this->Ln(30);	

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
	//$this->Cell(188,10,'Elaborado Por: '.$_SESSION['nombre'],0,0,'L');
	
}
	
function detalle(){

	$conexion=conexion();
	$conOCS = 'select * from nomempresa';
	$resOCS = query($conOCS,$conexion);
	$filaOCS = fetch_array($resOCS);
	$RRHH = $filaOCS['ger_rrhh'];

	$registro_id=$_GET[registro_id];
	$tipo=$_GET[tipN];
	$esta=$_GET[est];
	$query="select * from nompersonal where ficha = '$registro_id' and tipnom='$tipo'";
	$resultado = query($query,$conexion);
	$personal = fetch_array($resultado);
	
	$persona=$personal['apenom'];
	$cedula=$personal['cedula'];
	$fecha=$personal['fecing'];

	list($anio,$mes,$dia)=explode("-",$fecha);
   	$fecha= $dia."/".$mes."/".$anio; 
	
	$id_cargo=$personal['codcargo'];
	$query="select * from nomcargos where cod_car = '$id_cargo'";
	$resultado1 = query($query,$conexion);
	$cargo = fetch_array($resultado1);
	$cargo=$cargo['des_car'];

	$id_gerencia=$personal['codnivel4'];
	$query="select * from nomnivel4 where codorg = '$id_gerencia'";
	$resultado2 = query($query,$conexion);
	$ger = fetch_array($resultado2);
	$gerencia=$ger['descrip'];
	
	$monto=$personal['suesal'];
	$ficha=$personal['ficha'];
	
	$monto=$monto;
	
	
	$query="select * from nomcampos_adic_personal where ficha ='$ficha' and id=7";
	$resultado4 = query($query,$conexion);
	
	while ($extra= fetch_array($resultado4)){
	     $compensacion=$extra['valor'];
	}
		
	$query="select * from nomcampos_adic_personal where ficha = '$ficha' and tiponom='$tipo'";
	$resultado3 = query($query,$conexion);
			
	if ($tipo=='3'){
		
		$monto=($monto*52)/12;
		
		while ($adiocional = fetch_array($resultado3)){
			$id=$adiocional['id'];
			If ($id==14||$id== 13){
				$can=$adiocional['valor'];
				$monto=$monto+ $can;
			}
		}
	}
	else{
		while ($adiocional = fetch_array($resultado3)){
			$id=$adiocional['id'];
			If ($id==14||$id== 13 ||$id==23 ||$id==6 ||$id==5 ||$id==32 ||$id==33 ||$id==25){
				$can=$adiocional['valor'];
				$monto=$monto+ $can;
			}
		}
	}	
	$n = new numerosALetras();
	$salarioletras=$n->convertir($monto+ $compensacion);
	
	$salario=number_format($monto+ $compensacion,2,',','.');
	$sex=$personal['sexo'];
	if($sex=='Femenino'){
		$ciu='la ciudadana ';
		$ad='adscrita ';
	}
	else{
		$ciu='el ciudadano ';
		$ad='adscrito ';
	}
	$this->Ln(20);
	$this->SetFont('Arial','B',18);
	$this->Cell(188,7,'CONSTANCIA',0,0,'C');
	$this->Ln(20);
	$this->SetFont('Arial','I',11);
	$contenido='Quien suscribe, José Manuel García, titular de la cédula de identidad N� 10.736.726 en mi carácter de Director General del Despacho, hago constar que la (el) Ciudadana (o): '.$persona.', titular de la Cédula de Identidad Nº '.number_format($cedula,0,',','.').', presta sus servicios en la Fundación para el Avance Social (FUNDAVANZA), adscrita al Gobierno del Estado Carabobo desde el '.$fecha.', desempeñando actualmente el cargo de '.$cargo.', devengando un salario mensual de '.$salarioletras.' (Bs. '.$salario.').';

	if ($esta=='SI'){
	$contenido=$contenido.' Adicionalmente percibe bono de alimentación, de acuerdo a Gaceta Oficial Nº 38094 de fecha 27/12/04.';
	}
	$n = new numerosALetras();
	$dialetra=$n->convertirdia(date('d'));
	$añoletra=$n->convertirdia(date('Y'));

	$subcontenido='     Constancia que se expide a petición de la parte interesada, en Valencia a los '.$dialetra.' ('.date('d').') días del mes de '.mesaletras(date('m')).' del año '.$añoletra.' ('.date('Y').').';
	$subcontenido2='José Manuel García';
       $subcontenido3='Director General del Despacho';
       $subcontenido1='Atentamente,';
       $this->Cell(10,7,'',0,0);
	$this->MultiCell(168,10,utf8_decode($contenido),0,'J');
	$this->Ln(10);
	$this->Cell(10,7,'',0,0);
       $this->MultiCell(168,10,utf8_decode($subcontenido),0,'J');
	$this->Ln(10);
       $this->Cell(10,7,'',0,0);
       $this->MultiCell(168,7,utf8_decode($subcontenido1),0,'C');  
	$this->Ln(13);
       $this->Cell(10,7,'',0,0);
       $this->MultiCell(168,7,utf8_decode($subcontenido2),0,'C'); 
       $this->Ln(0.2);
       $this->Cell(10,6,'',0,0);
       $this->MultiCell(168,7,utf8_decode($subcontenido3),0,'C');
       $this->Ln();
	
}
}
//Creación del objeto de la clase heredada

$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->detalle();
$pdf->Output();
?>
