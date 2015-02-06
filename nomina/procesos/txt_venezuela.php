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
	public function completar($cad,$long)
	{
		$this->temp=$cad;
		for($i=1;$i<=$long;$i++){
			$this->temp="0".$this->temp;
		}
		return $this->temp;
		
	}
	public function completar2($LARGO,$CADENA)
	{
		$this->temp=$cad;
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

$proceso=new txt();

$nomina=$_GET['codigo_nomina'];

if($_SESSION['codigo_nomina']=='4')
{
	$codcon=2065;
	//$codcon_pat=3542;
}


$directorio="txt/nomina".date("Y_m_d_H_i_s");


if(mkdir($directorio))
{
	$ruta=$directorio."/NOMINA".$mes.substr($_GET['anio'],2,2).".txt";
	$archivo= fopen($ruta,"w");
	chmod($directorio,0777);
	chmod($ruta,0777);
}
else
{
	echo "No se pudo crear el directrorio";
}

$totales=new bd("selectra");


//buscamos todas las personas de ese tipo de nomina

$consulta="SELECT SUM(neto) AS total FROM nom_nomina_netos WHERE tipnom='".$_SESSION['codigo_nomina']."' AND codnom=$nomina";
$resultado=$totales->query($consulta);
$fetch_total=$resultado->fetch_assoc();
$total_nom=$proceso->formatear_monto($fetch_total['total']);
$largo_total_nom=strlen($total_nom);


$LARGO=13;
for($i=$largo_total_nom;$i<$LARGO;$i++)
	$total_nom="0".$total_nom;


$consulta="SELECT COUNT(neto) AS cantidad FROM nom_nomina_netos WHERE tipnom='".$_SESSION['codigo_nomina']."' AND codnom=$nomina";
$resultadocant=$totales->query($consulta);
$fetch_total_cant=$resultadocant->fetch_assoc();
$cantidad=$fetch_total_cant['cantidad'];
$largo_cantidad_nom=strlen($cantidad);

$LARGO=7;
for($i=$largo_cantidad_nom;$i<$LARGO;$i++)
	$cantidad="0".$cantidad;


// buscamos el rif de la institucion
// NOMBRE DE LA COMPANIA

$consulta="SELECT nom_emp, rif FROM nomempresa";
$result_nomemp=$totales->query($consulta);
$fetch_nomemp=$result_nomemp->fetch_assoc();
$rif=str_replace("-",'',$fetch_nomemp['rif']);

$cad=$fetch_nomemp['nom_emp'];
$largo_cad=strlen($cad);
$LARGO=40;
for($i=$largo_cad;$i<$LARGO;$i++)
	$cad.=' ';

//FECHA DE PAGO DE LA NOMINA
$consulta="SELECT * FROM nom_nominas_pago WHERE tipnom=4 AND codnom=$nomina";
$result_fec=$totales->query($consulta);
$fetch_fec=$result_fec->fetch_assoc();
$fechapago=substr($fetch_fec['fechapago'],8,2)."/".substr($fetch_fec['fechapago'],5,2)."/".substr($fetch_fec['fechapago'],2,2);



$fecha=$_GET['anio']."-".$mes."-01";
$num_dias_mes=date("t",strtotime($fecha));
$fecha=$num_dias_mes.$mes.substr($_GET['anio'],2,2);

$cabecera="H".$cad."00000000000000000000"."01".$fechapago.$total_nom."03291   0102"."000000000000001".$rif.$cantidad."P";
$cabecera.="\n";
fwrite($archivo,$cabecera);


$consulta="SELECT pe.apenom AS apenom, pe.cedula AS cedula, ne.neto AS neto FROM nompersonal pe LEFT JOIN nom_nomina_netos ne ON (pe.tipnom=ne.tipnom AND pe.ficha=ne.ficha) WHERE ne.codnom=$nomina AND ne.tipnom=$_SESSION[codigo_nomina] ORDER BY pe.cedula";
$resultado2=$totales->query($consulta);

while($fila=$resultado2->fetch_assoc())
{
	$detalles="100000000000000000000";
	$total_emp=$proceso->formatear_monto($fila['neto']);
	$largo_total_emp=strlen($total_emp);

	$LARGO=11;
	for($i=$largo_total_emp;$i<$LARGO;$i++)
		$total_emp="0".$total_emp;
	
	$detalles.=$total_emp;
	$fille4="0000";
	$detalles.=$fille4;

	$nombre=str_replace(",","",$fila['apenom']);
	$nombre=str_replace("  "," ",$nombre);
	$nombre=str_replace("Ñ","N",$nombre);

	if(strlen($nombre)<40)
	{	
		$i=strlen($nombre);
		while($i<40)
		{
			$nombre.=" ";
			$i+=1;
		}
	}
	elseif(strlen($nombre)>40)
	{
		$nombre=substr($nombre,1,40);
	}
	$detalles.=$nombre;


	$cedula=$fila['cedula'];
	$largo_cedula=strlen($cedula);

	$LARGO=10;
	for($i=$largo_cedula;$i<$LARGO;$i++)
		$cedula="0".$cedula;
	
	$detalles.=$cedula;
	$detalles.="003291";
	$detalles.="0102";
	$detalles.="000000000000001";
	$detalles.=$rif;
	$detalles.="        ";
	$detalles.="\n";
	fwrite($archivo,$detalles);
}


$nom_arch="NOMINA.txt";
fclose($archivo);
//echo "Content-Disposition: attachment; filename=".$ruta;
header("Content-type: application/octet-stream");
readfile($ruta); 
header("Content-Disposition: attachment; filename=$nom_arch");

?>