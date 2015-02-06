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


$consulta_temp="select count(*) as num,sum(neto) as total from nom_nomina_netos where codnom='".$_GET['codigo_nomina']."' and tipnom='".$_SESSION['codigo_nomina']."' and cta_ban<>''";

$resultado_temp=$totales->query($consulta_temp);
$fila_temp=$resultado_temp->fetch_assoc();
$num_registros=$fila_temp['num'];//$resultado_temp->num_rows;


//llamamos a la clase de proceso

$proceso=new txt();


switch($_SESSION['bd']){
	case 'sisalud_nomina':$lote=1;break;
	case 'SIGASTRO_NOMINA':$lote=2;break;
	case 'DIAGIMG_NOMINA':$lote=5;break;
	case 'FISIA_NOMINA':$lote=4;break;
	case 'LABORAT_NOMINA':$lote=6;break;

}
if($_SESSION['codigo_nomina']==2){
	$lote=3;
}

$total_nomina=$fila_temp['total'];
$total_nomina=str_replace(".","",$total_nomina);
$cuanto=strlen($total_nomina);
$concatenar='';
for($i=$cuanto;$i<15;$i++){
	$concatenar.='0';
}
$total_nomina=$concatenar.$total_nomina;

$cuanto=strlen($num_registros);
$concatenar='';
for($i=$cuanto;$i<5;$i++){
	$concatenar.='0';
}
$num_registros=$concatenar.$num_registros;



$cabecera="00102206J0304985339                    00000000000000".$lote."105VEF1193036135".$total_nomina.$num_registros.str_replace('-','',$fila['fechapago']);
$cabecera.="\r\n";
fwrite($archivo,$cabecera);


unset($totales);
//construimos el detalle
$movimientos=new bd($_SESSION['bd']);

$consulta="select * from nom_nomina_netos where codnom='".$_GET['codigo_nomina']."' and tipnom='".$_SESSION['codigo_nomina']."' and cta_ban<>''  ";
$resultado=$movimientos->query($consulta);


while($fila=$resultado->fetch_assoc()){
	$detalles="";
	$neto_empleado=$fila['neto'];
	$cuenta_bancaria=$fila['cta_ban'];
	$identificacion="01";
	$detalles.=$identificacion;

	$consulta_personal="select nacionalidad,cedula,apenom from nompersonal where ficha=".$fila['ficha'];
	$resul_personal=$movimientos->query($consulta_personal);
	$fila_personal=$resul_personal->fetch_assoc();
	if($fila_personal['nacionalidad']==0)$nac='V';
	if($fila_personal['nacionalidad']==1)$nac='E';

	$detalles.=$nac;

	$cuanto=strlen($fila_personal['cedula']);
	$concatenar='';
	for($i=$cuanto;$i<10;$i++){
		$concatenar.='0';
	}
	$detalles.=$concatenar.$fila_personal['cedula'];
	//$len_per=utf8_decode($fila_personal['apenom']);
	$len_per=str_replace('Ñ','N',$fila_personal['apenom']);
	$cuanto=strlen($len_per);
	$concatenar='';
	for($i=$cuanto;$i<60;$i++){
		$concatenar.=' ';
	}
	$detalles.=$len_per.$concatenar;
	$detalles.=$cuenta_bancaria;


	$neto_empleado=str_replace(".","",$neto_empleado);
	$cuanto=strlen($neto_empleado);
	$concatenar='';
	for($i=$cuanto;$i<15;$i++){
		$concatenar.='0';
	}
	$detalles.=$concatenar.$neto_empleado;
	$detalles.=$concatenar.$neto_empleado;


	$detalles.="\r\n";
	fwrite($archivo,$detalles);
	//echo $detalles;
}



fclose($archivo);
//echo "Content-Disposition: attachment; filename=".$ruta;
header("Content-type: application/octet-stream");
readfile($ruta); 
header('Content-Disposition: attachment; filename="nomina.txt"');


?>
