<?session_start();
ob_start();
$termino= $_SESSION['termino'];
?>
<?
include "../lib/common.php";
include "../paginas/funciones_nomina.php";
//include "../header.php";
class txt{
	private $temp,$retorno;
	public function completar($cad,$long){
		$this->temp=$cad;
		for($i=1;$i<=$long-strlen($cad);$i++){
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

$totales=new bd("selectra");

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

$cabecera.="00000000000000000000";
$fecha=explode("-",$fila[fechapago]);
$cabecera.=$fecha[0].$fecha[1].$fecha[2];
$cabecera.=$proceso->completar($proceso->formatear_monto($fila_temp['total']),17);
$cabecera.=$proceso->completar($proceso->formatear_monto($fila_temp['num']),4);
$cabecera.="\r\n";
fwrite($archivo,$cabecera);
//echo "********************<br>";
//echo $cabecera;
//echo "<br>********************";

unset($totales);
//construimos el detalle
$movimientos=new bd("selectra");

$consulta="select * from nom_nomina_netos where codnom='".$_GET['codigo_nomina']."' and tipnom='".$_SESSION['codigo_nomina']."'";
$resultado=$movimientos->query($consulta);


$total=0;
while($fila=$resultado->fetch_assoc())
{
	$detalles.="1826";	
	$detalles.=$proceso->completar($proceso->formatear_monto($neto_empleado),12);
	$detalles.=$fila['cta_ban'];
	$detalles.=$proceso->completar($fila['cedula'],10);
	$detalles.="00000000";

	
	$detalles.="\R\n";
	fwrite($archivo,$detalles);
}
fclose($archivo);
//echo "Content-Disposition: attachment; filename=".$ruta;
header("Content-type: application/octet-stream");
readfile($ruta); 
header('Content-Disposition: attachment; filename="nomina.txt"');

?>
