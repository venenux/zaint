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
		for($i=1;$i<=$long-strlen($cad);$i++){
		//for($i=1;$i<=$long;$i++){
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

if(strlen($_GET['mes'])==1)
	$mes.="0".$_GET['mes'];
else
	$mes=$_GET['mes'];

if(mkdir($directorio))
{
	$ruta=$directorio."/PHBA".$mes.substr($_GET['anio'],2,2).".txt";
	$archivo= fopen($ruta,"w");
	chmod($directorio,0777);
	chmod($ruta,0777);
}
else
{
	echo "No se pudo crear el directrorio";
}


$movimientos=new bd("selectra");

// buscamos el rif de la institucion

$consulta="SELECT rif from nomempresa";
$resultado_mov=$movimientos->query($consulta);
$fila_mov=$resultado_mov->fetch_assoc();

$proceso=new txt();

if($_GET['tipo']=="APORTE")
{
	
	$consulta="select sum(mn.monto) as monto,mn.ficha,mn.cedula, np.sfecing,np.nacionalidad from nom_movimientos_nomina as mn INNER JOIN nompersonal as np on np.cedula=mn.cedula where mn.mes='".$_GET['mes']."' and mn.anio='".$_GET['anio']."' and (mn.codcon=2003 or mn.codcon=2018 or mn.codcon=2027 or mn.codcon=2403 or mn.codcon=2412 or mn.codcon=2027  or mn.codcon=2417) group by mn.ficha";
	$resultado=$movimientos->query($consulta);
	
	while($fila=$resultado->fetch_assoc())
	{
		$sfecing=explode("-",$fila['sfecing']);
		if(($fila['sfecing']=='')||($sfecing[0]!=$_GET['anio'])||($sfecing[1]!=$_GET['mes']))
		{
			$detalles="";
			$cedula=$fila['cedula'];
				
			if($fila['nacionalidad']==0)
				$detalles.="V";
			else
				$detalles.="E";
			
			if(strlen($cedula)==6)
			{
				$detalles.="00";
			}
			elseif(strlen($cedula)==7)
			{
				$detalles.="0";
			}
			$detalles.=$cedula;
			
			$neto_empleado=$fila['monto'];
			$detalles.=$proceso->completar($proceso->formatear_monto($neto_empleado),10);	
			$detalles.=$proceso->completar($proceso->formatear_monto(($neto_empleado*2)),10);	
			
			$detalles.=$mes.$_GET['anio'];
			$detalles.=$fila_mov['rif'];
			$detalles.="01";
			$detalles.="\r\n";
			fwrite($archivo,$detalles);
		}
	}
	
	$nom_arch="Aporte".$mes.$_GET['anio'].".txt";
	fclose($archivo);
	//echo "Content-Disposition: attachment; filename=".$ruta;
	header("Content-type: application/octet-stream");
	readfile($ruta); 
	header("Content-Disposition: attachment; filename=$nom_arch");
}
elseif($_GET['tipo']=="INGRESO")
{
	
	$consulta="select sum(mn.monto) as monto,mn.ficha,mn.cedula,np.nacionalidad, np.nombres, np.apellidos, np.fecnac, np.sfecing, np.sexo from nom_movimientos_nomina as mn INNER JOIN nompersonal as np on np.cedula=mn.cedula where mn.mes='".$_GET['mes']."' and mn.anio='".$_GET['anio']."' and (mn.codcon=2003 or mn.codcon=2018 or mn.codcon=2027 or mn.codcon=2403 or mn.codcon=2412 or mn.codcon=2027  or mn.codcon=2417) group by mn.ficha";
	$resultado=$movimientos->query($consulta);
	
	while($fila=$resultado->fetch_assoc())
	{
		$sfecing=explode("-",$fila['sfecing']);
		
		if(($fila['sfecing']!='')&&($sfecing[0]==$_GET['anio'])&&($sfecing[1]==$_GET['mes']))
		{
			$detalles="";
			$cedula=$fila['cedula'];
				
			if($fila['nacionalidad']==0)
				$detalles.="V";
			else
				$detalles.="E";
			
			if(strlen($cedula)==6)
			{
				$detalles.="00";
			}
			elseif(strlen($cedula)==7)
			{
				$detalles.="0";
			}
			$detalles.=$cedula;
	
			$nom=utf8_decode($fila['nombres']);
			$k=40-strlen($nom);
			for($i=1;$i<=$k;$i++)
				$nom=$nom." ";
			$detalles.=$nom;
	
			$ape=utf8_decode($fila['apellidos']);
			$k=40-strlen($ape);
			for($i=1;$i<=$k;$i++)
				$ape=$ape." ";
			$detalles.=$ape;
	
			$fecnac=explode("-",$fila['fecnac']);
			$fecnac=$fecnac[0].$fecnac[1].$fecnac[2];
			$detalles.=$fecnac;
	
			$detalles.=$sexo=substr($fila['sexo'],0,1);
			
			$detalles.="01".$mes.$_GET['anio'];
			$detalles.=$fila_mov['rif'];
			$detalles.="01";
			$detalles.="\r\n";
			fwrite($archivo,$detalles);
		}
	}
	
	$nom_arch="Ingresos".$mes.$_GET['anio'].".txt";
	fclose($archivo);
	//echo "Content-Disposition: attachment; filename=".$ruta;
	header("Content-type: application/octet-stream");
	readfile($ruta); 
	header("Content-Disposition: attachment; filename=$nom_arch");
}
?>