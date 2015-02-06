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
$fila33=$resultado->fetch_assoc();
$fechap=explode("-",$fila33['fechapago']);
$fechapp=$fechap[0].$fechap[1].$fechap[2];


$consulta_temp="select count(*) as num,sum(neto) as total from nom_nomina_netos where codnom='".$_GET['codigo_nomina']."' and tipnom='".$_SESSION['codigo_nomina']."'";

$resultado_temp=$totales->query($consulta_temp);
$fila_temp=$resultado_temp->fetch_assoc();
$num_registros=$fila_temp['num'];//$resultado_temp->num_rows;
$num_registros+=1;

//llamamos a la clase de proceso

$proceso=new txt();



//creamos la cabecera del txt
/*
$cabecera.="000000";
$cabecera.=date("Yma").date("His");
$cabecera.=date("Ym")."28";
$cabecera.="080000";
$cabecera.="00000000";
$cabecera.="000000";
$cabecera.="003913";
$cabecera.="000001";
$cabecera.=" LC";
$cabecera.="0000000000005800191460";
$cabecera.="   0000000000000000000000000000000000000000000000000000000000000000000000000000000000";
$cabecera.="\n";
fwrite($archivo,$cabecera);
//echo "********************<br>";
//echo $cabecera;*/
//echo "<br>********************";

unset($totales);
//construimos el detalle
$movimientos=new bd("selectra");

$consulta="select * from nom_nomina_netos where codnom='".$_GET['codigo_nomina']."' and tipnom='".$_SESSION['codigo_nomina']."'";
$resultado=$movimientos->query($consulta);


while($fila=$resultado->fetch_assoc())
{
	if($fila['cta_ban']!='')
	{	
	$detalles="";
	$consulta33="SELECT forcob FROM nompersonal WHERE ficha='".$fila['ficha']."' and tipnom='".$_SESSION['codigo_nomina']."' ";
	$resultado33=$movimientos->query($consulta33);
	$fetch=$resultado33->fetch_assoc();

	$cedula=$fila['cedula'];
	if(strlen($cedula)==9)
		$cedula=$cedula."      ";
	elseif(strlen($cedula)==8)
		$cedula=$cedula."       ";
	elseif(strlen($cedula)==7)
		$cedula=$cedula."        ";
	elseif(strlen($cedula)==6)
		$cedula=$cedula."         ";
	for($i=1;$i<=$long-strlen($cedula);$i++)
		$cedula=$cedula." ";
		
	$detalles.=$cedula;

	$detalles.="00".$fila['cta_ban'];

	$neto_empleado=$fila['neto'];
	$detalles.=$proceso->completar($proceso->formatear_monto($neto_empleado),15);

	$detalles.=$fechapp;
	
	$detalles.="       \r\n";
	fwrite($archivo,$detalles);
	}	
	//echo $detalles;
}

fclose($archivo);
//echo "Content-Disposition: attachment; filename=".$ruta;
header("Content-type: application/octet-stream");
readfile($ruta); 
header('Content-Disposition: attachment; filename="nomina.txt"');

?>