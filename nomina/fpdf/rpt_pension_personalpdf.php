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
    /*    $var_izquierda='../imagenes/izquierda.jpg';
	$var_centro='../imagenes/centro.jpg';
	$var_derecha='../imagenes/derecha.jpg';
	
        $this->SetFont("Arial","B",12);
     	$this->Image($var_izquierda,25,12,80,15);
	$this->Image($var_centro,110,12,45,15);
	$this->Image($var_derecha,155,12,20,13);*/
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
	$this->Cell(188,10,'Elaborado Por: '.$_SESSION['nombre'],0,0,'L');

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
	
	$query="select * from nomcampos_adic_personal where ficha = '$ficha' and tiponom='$tipo'";
	$resultado3 = query($query,$conexion);
		
	$n = new numerosALetras();
	$salarioletras=$n->convertir($monto);

	
	$salario=number_format($monto,2,',','.');
	
	$sex=$personal['sexo'];
	if($sex=='Femenino'){
		$ciu='la ciudadana ';
		$ad='pensionada ';
	}
	else{
		$ciu='el ciudadano ';
		$ad='pensionado ';
	}


	
	$this->Ln(10);
	$this->SetFont('Arial','B',12);
	$this->Cell(188,7,'CONSTANCIA',0,0,'C');
	$this->Ln(20);
	$this->SetFont('Arial','I',12);
	$contenido='     Quien suscribe, Gerente General de Recursos Humanos, hace constar por medio de la presente que '.$ciu.$persona.', titular de la Cédula de Identidad Nº '.number_format($cedula,0,',','.').', prestó sus servicios para la Empresa desde el '.$fechaini.', siendo '.$ad.' a partir del '.$fechasus.', con el cargo de '.$cargo.', actualmente devenga una pensión mensual de '.$salarioletras.' (Bs. '.$salario.').';

	$n = new numerosALetras();
	$dialetra=$n->convertirdia(date('d'));
	$añoletra=$n->convertirdia(date('Y'));

	$subcontenido='     Constancia que se expide a petición de la parte interesada, en Caracas a los '.$dialetra.' ('.date('d').') días del mes de '.mesaletras(date('m')).' del año '.$añoletra.' ('.date('Y').').';
	$this->Cell(10,7,'',0,0);
	$this->MultiCell(168,10,utf8_decode($contenido),0,'J');
	$this->Ln(10);
	$this->Cell(10,7,'',0,0);
	$this->MultiCell(168,10,utf8_decode($subcontenido),0,'J');
	$this->SetFont('Arial','B',12);
	$this->Ln(35);
	$this->Cell(188,7,$RRHH,0,0,'C');
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
