<?
session_start();
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
		//for($i=1;$i<=$long-strlen($cad);$i++){
		for($i=1;$i<=$long;$i++){
			$this->temp="0".$this->temp;
		}
		return $this->temp;
		
	}
	public function formatear_monto($monto){
		$this->temp=number_format($monto,2,'','');
		//$this->retorno=$this->temp;
		//$this->retorno.=$this->temp[1];
		return $this->temp;
	}

}

$directorio="txt/nomina".date("Y_m_d_H_i_s");
if(mkdir($directorio))
{
	
	if(strlen($_GET['mes'])==1)
		$mes.="0".$_GET['mes'];
	else
		$mes=$_GET['mes'];
	
	$ruta=$directorio."/PHBA".$mes.substr($_GET['anio'],2,2).".txt";
	$archivo= fopen($ruta,"w");
	chmod($directorio,0777);
	chmod($ruta,0777);
}
else
{
	echo "No se pudo crear el directrorio";
}

$totales=new bd("selectra");

// codigo del concepto LPH dependiendo del tipo de nomina
if($_SESSION['codigo_nomina']=='1')
{
	$codcon=2063;
	$codcon_pat=3542;
}
elseif($_SESSION['codigo_nomina']=='2')
{
	$codcon=2003;
	$codcon_pat=3503;
}
elseif($_SESSION['codigo_nomina']=='3')
{
	$codcon=2023;
	$codcon_pat=3522;
}
elseif($_SESSION['codigo_nomina']=='4')
{
	$codcon=2403;
	$codcon_pat=3552;
}
//buscamos los datos del tipo de nomina

$consulta="select * from nompersonal where tipnom='".$_SESSION['codigo_nomina']."' order by apenom";
$resultado=$totales->query($consulta);


$consulta="select pre_sid from nomempresa";
$resultado_emp=$totales->query($consulta);
$fila_emp=$resultado_emp->fetch_assoc();

$rif=str_replace("-","",$fila_emp['pre_sid']);

$proceso=new txt();

unset($totales);
//construimos el detalle
$movimientos=new bd("selectra");

while($fila=$resultado->fetch_assoc())
{
	$consulta="SELECT SUM(monto) as monto from nom_movimientos_nomina where mes=$_GET[mes] and anio=$_GET[anio] and ficha=$fila[ficha] and tipnom='".$_SESSION['codigo_nomina']."' and codcon=$codcon";
	$resultado_mov=$movimientos->query($consulta);
	$fila_mov=$resultado_mov->fetch_assoc();
	
	$consulta="SELECT SUM(monto) as monto from nom_movimientos_nomina where mes=$_GET[mes] and anio=$_GET[anio] and ficha=$fila[ficha] and tipnom='".$_SESSION['codigo_nomina']."' and codcon=$codcon_pat";
	$resultado_mov_pat=$movimientos->query($consulta);
	$fila_mov_pat=$resultado_mov_pat->fetch_assoc();
	
	if($fila_mov['monto']!=0)
	{
		$detalles=$rif;
		$neto_empleado=$fila_mov['monto']+$fila_mov_pat['monto'];
		$cuenta_bancaria=$fila['cta_ban'];
		$cedula=$fila['cedula'];
		$detalles.="00";
		if($fila['nacionalidad']==0)
			$detalles.="V";
		else
			$detalles.="E";
		
		if(strlen($cedula)==6)
		{
			$detalles.="0000";
		}
		elseif(strlen($cedula)==7)
		{
			$detalles.="000";
		}
		elseif(strlen($cedula)==8)
		{
			$detalles.="00";
		}	
		elseif(strlen($cedula)==9)
		{
			$detalles.="0";
		}
		$detalles.=$cedula;
		
		$nombre=str_replace(",","",$fila['apenom']);
		$nombre=str_replace("  "," ",$nombre);
		$nombre=str_replace("Ñ","N",$nombre);
		
		if(strlen($nombre)<30)
		{	
			$i=strlen($nombre);
			while($i<30)
			{
				$nombre.=" ";
				$i+=1;
			}
		}
		elseif(strlen($nombre)>30)
		{
			$nombre=substr($nombre,0,30);
		}
		
		$detalles.=$nombre;
		$fecnac=str_replace("-","",$fila['fecnac']);
		$detalles.=$fecnac;
		
		if($fila['sexo']=="Femenino")
			$detalles.="2";
		else
			$detalles.="1";
		
		$detalles.="0";
		
		$monto=$proceso->formatear_monto($neto_empleado);
		if(strlen($monto)==4)
			$detalles.=$proceso->completar($monto,6);
		elseif(strlen($monto)==5)
			$detalles.=$proceso->completar($monto,5);
		elseif(strlen($monto)==6)
			$detalles.=$proceso->completar($monto,4);
		elseif(strlen($monto)==3)
			$detalles.=$proceso->completar($monto,7);
		
		if(strlen($_GET['mes'])==1)
			$detalles.=$proceso->completar($_GET['mes'],1);
	
		$detalles.=substr($_GET['anio'],2,2);
		
		if($fila['codnivel7']!=111111)
			$detalles.=$fila['codnivel7'];
		elseif($fila['codnivel6']!=11111)
			$detalles.=$fila['codnivel6']."00";
		elseif($fila['codnivel4']!=1111)
			$detalles.=$fila['codnivel4']."000";
		elseif($fila['codnivel4']!=111)
			$detalles.=$fila['codnivel4']."0000";
		
		$detalles.="    ";
		$detalles.="\n";
		fwrite($archivo,$detalles);
	}
}

$nom_arch="PHBA".$mes.substr($_GET['anio'],2,2).".txt";
fclose($archivo);
//echo "Content-Disposition: attachment; filename=".$ruta;
header("Content-type: application/octet-stream");
readfile($ruta); 
header("Content-Disposition: attachment; filename=$nom_arch");

?>