<?session_start();
ob_start();
$termino= $_SESSION['termino'];
?>
<?
echo $_SESSION['bd'];
include "../lib/common.php";
include "../paginas/funciones_nomina.php";
//include "../header.php";
class txt{
	private $temp,$retorno;
	public function completar($cad,$long){
		$this->temp=$cad;
		//for($i=1;$i<=$long-strlen($cad);$i++){
		for($i=1;$i<=$long;$i++){
			$this->temp="0".$this->temp;
		}
		return $this->temp;
		
	}
	public function formatear_monto($monto){
		$this->temp=explode(".",$monto);
		$this->retorno=$this->temp[0];
		$this->retorno.=$this->temp[1];
		return $this->retorno;
	}

}

$directorio="txt/nomina".date("Y_m_d_H_i_s");
if(mkdir($directorio)){
$ruta=$directorio."/nomina.txt";
$archivo= fopen($ruta,"w");
chmod($directorio,0777);
chmod($ruta,0777);
}else{
echo "No se pudo crear el directrorio";

}

$totales=new bd($_SESSION['bd']);

//buscamos los datos del tipo de nomina

$consulta="select * from nomtipos_nomina where codtip='".$_SESSION['codigo_nomina']."'";
$resultado=$totales->query($consulta);
$fila=$resultado->fetch_assoc();
$codigo_empresa=$fila['codigo_banco'];
//buscamos los datos de la nomina
$consulta="select * from nom_nominas_pago where codnom='".$_GET['codigo_nomina']."' and tipnom='".$_SESSION['codigo_nomina']."'";
$resultado=$totales->query($consulta);
$fila=$resultado->fetch_assoc();


$consulta_temp="select count(*) as num,sum(neto) as total from nom_nomina_netos where codnom='".$_GET['codigo_nomina']."' and tipnom='".$_SESSION['codigo_nomina']."'";

$resultado_temp=$totales->query($consulta_temp);
$fila_temp=$resultado_temp->fetch_assoc();
$num_registros=$fila_temp['num'];//$resultado_temp->num_rows;
$num_registros+=1;

//llamamos a la clase de proceso

$proceso=new txt();



//creamos la cabecera del txt



unset($totales);
//construimos el detalle
$movimientos=new bd($_SESSION['bd']);

$consulta="select * from nom_nomina_netos where codnom='".$_GET['codigo_nomina']."' and tipnom='".$_SESSION['codigo_nomina']."' order by cedula";
$resultado=$movimientos->query($consulta);


while($fila=$resultado->fetch_assoc())
{
	$detalles="02";
	$neto_empleado=$fila['neto'];
	$cuenta_bancaria=$fila['cta_ban'];
	$cedula=$fila['cedula'];
	
	//$identificacion="770";
	//$detalles.=$identificacion;
	//$cuenta_bancaria="010800".$cuenta_bancaria;
	//$numero_cuenta=$proceso->completar($cuenta_bancaria,20);
	$detalles.=$cuenta_bancaria;

	//$campo_libre=$proceso->completar("",4);
	//$detalles.=$campo_libre;

	//$detalles.=$mes_pago;
	$detalles.="V";
	if(strlen($cedula)==6)
	{
		$detalles.="00";
	}
	elseif(strlen($cedula)==7)
	{
		$detalles.="0";
	}	
	$detalles.=$cedula;

	
	$monto=$proceso->formatear_monto($neto_empleado);
	if(strlen($monto)==5)
		$detalles.=$proceso->completar($monto,10);
	elseif(strlen($monto)==6)
		$detalles.=$proceso->completar($monto,9);
	elseif(strlen($monto)==7)
		$detalles.=$proceso->completar($monto,8);
	elseif(strlen($monto)==4)
		$detalles.=$proceso->completar($monto,11);
	elseif(strlen($monto)==3)
		$detalles.=$proceso->completar($monto,12);
	//$detalles.=$proceso->completar("",33);
	$consulta33="SELECT apenom FROM nompersonal WHERE ficha='".$fila['ficha']."'";
	$resultado33=$movimientos->query($consulta33);
	$fetch=$resultado33->fetch_assoc();

	$nombre=str_replace(" ,","",$fetch['apenom']);
	$nombre=str_replace(",","",$fetch['apenom']);
	$detalles.=$nombre;

	$detalles.="\n";
	fwrite($archivo,$detalles);
	//echo $detalles;
}


fclose($archivo);
//echo "Content-Disposition: attachment; filename=".$ruta;
header("Content-type: application/octet-stream");
readfile($ruta); 
header('Content-Disposition: attachment; filename="nomina.txt"');

?>
