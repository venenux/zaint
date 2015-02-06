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

switch($_GET['tipo'])
{
	case "APORTE":

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
	
	unset($totales);
	//construimos el detalle
	$movimientos=new bd("selectra");
	
	$consulta="select sum(mn.monto) as monto,mn.ficha,mn.cedula,np.nacionalidad from nom_movimientos_nomina as mn INNER JOIN nompersonal as np on np.cedula=mn.cedula where mn.mes='".$_GET['mes']."' and mn.anio='".$_GET['anio']."' and (mn.codcon=2005 or mn.codcon=2022 or mn.codcon=2028 or mn.codcon=2408 or mn.codcon=2413 or mn.codcon=2418) group by mn.ficha";
	$resultado=$movimientos->query($consulta);
	
	
	while($fila=$resultado->fetch_assoc())
	{
		if(($fila['dfecing']=='')||($dfecing[0]!=$_GET['anio'])||($dfecing[1]!=$_GET['mes']))
		{
			$detalles="";
			$detalles2="";
			$detalles.="2601";
			$detalles2.="2604";
			$detalles.=$_GET['anio'].$_GET['mes']."15";
			$detalles2.=$_GET['anio'].$_GET['mes']."15";
		
			$cedula=$fila['cedula'];
			if(strlen($cedula)==8)
				$cedula=$cedula;
			elseif(strlen($cedula)==7)
				$cedula="0".$cedula;
			elseif(strlen($cedula)==6)
				$cedula="00".$cedula;
			elseif(strlen($cedula)==5)
				$cedula="000".$cedula;
		// 	for($i=1;$i<=$long-strlen($cedula);$i++)
		// 		$cedula=$cedula;
			$detalles.=$cedula;
			$detalles2.=$cedula;
			
			if($fila['nacionalidad']==0)
			{
				$detalles.="V";
				$detalles2.="V";
			}
			elseif($fila['nacionalidad']==1)
			{
				$detalles.="E";
				$detalles2.="E";
			}
			
			$detalles.="                              ";
			$detalles2.="                              ";
			$detalles.="EMPLEADO";
			$detalles2.="EMPLEADO";
			$detalles.="       ";
			$detalles2.="       ";
			$detalles.="00000000000000000000";
			$detalles2.="00000000000000000000";
			$detalles.="Mensual";
			$detalles2.="Mensual";
			$detalles.="                                                                   ";
			$detalles2.="                                                                   ";
			$neto_empleado=$fila['monto'];
			$detalles.=$proceso->completar($proceso->formatear_monto($neto_empleado),10);
			$detalles2.=$proceso->completar($proceso->formatear_monto($neto_empleado),10);
			$detalles.="-";
			$detalles2.="-";	
	
			$detalles.="\r\n";
			$detalles2.="\r\n";
			fwrite($archivo,$detalles);
			fwrite($archivo,$detalles2);
		}
		//echo $detalles;
	}
	
	fclose($archivo);
	//echo "Content-Disposition: attachment; filename=".$ruta;
	header("Content-type: application/octet-stream");
	readfile($ruta); 
	header('Content-Disposition: attachment; filename="APORTES.txt"');

	break;
	
	case "PRESTAMO":

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
	
	unset($totales);
	//construimos el detalle
	$movimientos=new bd("selectra");
	
	$consulta="select sum(mn.monto) as monto,mn.ficha,mn.cedula,np.nacionalidad from nom_movimientos_nomina as mn INNER JOIN nompersonal as np on np.cedula=mn.cedula where mn.mes='".$_GET['mes']."' and mn.anio='".$_GET['anio']."' and (mn.codcon=2007 or mn.codcon=2023 or mn.codcon=2409 or mn.codcon=2414) group by mn.ficha";
	$resultado=$movimientos->query($consulta);
	
	
	while($fila=$resultado->fetch_assoc())
	{
		$detalles="";
		$detalles.="2001";
		
		$detalles.=$_GET['anio'].$_GET['mes']."15";
		
	
		$cedula=$fila['cedula'];
		if(strlen($cedula)==8)
			$cedula=$cedula;
		elseif(strlen($cedula)==7)
			$cedula="0".$cedula;
		elseif(strlen($cedula)==6)
			$cedula="00".$cedula;
		elseif(strlen($cedula)==5)
			$cedula="000".$cedula;
	// 	for($i=1;$i<=$long-strlen($cedula);$i++)
	// 		$cedula=$cedula;
		$detalles.=$cedula;
		
		
		if($fila['nacionalidad']==0)
		{
			$detalles.="V";
		
		}
		elseif($fila['nacionalidad']==1)
		{
			$detalles.="E";
		
		}
		
		$detalles.="                              ";
		
		$detalles.="EMPLEADO";
		
		$detalles.="       ";
		
		$detalles.="00000000000000000000";
		
		$detalles.="MENSUAL";
		
		$detalles.="                                                                   ";
		
		$neto_empleado=$fila['monto'];
		$detalles.=$proceso->completar($proceso->formatear_monto($neto_empleado),10);
		
		$detalles.="-";
		

		$detalles.="\r\n";
		
		fwrite($archivo,$detalles);
		
		//echo $detalles;
	}
	
	fclose($archivo);
	//echo "Content-Disposition: attachment; filename=".$ruta;
	header("Content-type: application/octet-stream");
	readfile($ruta); 
	header('Content-Disposition: attachment; filename="PRESTAMOS.txt"');

	break;

	case "INGRESO":

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
	
	unset($totales);
	//construimos el detalle
	$movimientos=new bd("selectra");
	
	$consulta="select sum(mn.monto) as monto,mn.ficha,mn.cedula,np.nacionalidad, np.nombres, np.apellidos, np.dfecing, np.fecing from nom_movimientos_nomina as mn INNER JOIN nompersonal as np on np.cedula=mn.cedula where mn.mes='".$_GET['mes']."' and mn.anio='".$_GET['anio']."' and (mn.codcon=2005 or mn.codcon=2022 or mn.codcon=2028  or mn.codcon=2408 or mn.codcon=2413 or mn.codcon=2418) group by mn.ficha";
	$resultado=$movimientos->query($consulta);
	
	
	while($fila=$resultado->fetch_assoc())
	{
		$dfecing=explode("-",$fila['dfecing']);
		
		if(($fila['dfecing']!='')&&($dfecing[0]==$_GET['anio'])&&($dfecing[1]==$_GET['mes']))
		{
			$detalles="";
			$detalles.="2601";
			
			$detalles.=$_GET['anio'].$_GET['mes']."15";
			
		
			$cedula=$fila['cedula'];
			if(strlen($cedula)==8)
				$cedula=$cedula;
			elseif(strlen($cedula)==7)
				$cedula="0".$cedula;
			elseif(strlen($cedula)==6)
				$cedula="00".$cedula;
			elseif(strlen($cedula)==5)
				$cedula="000".$cedula;
		// 	for($i=1;$i<=$long-strlen($cedula);$i++)
		// 		$cedula=$cedula;
			$detalles.=$cedula;
			
			
			if($fila['nacionalidad']==0)
			{
				$detalles.="V";
			
			}
			elseif($fila['nacionalidad']==1)
			{
				$detalles.="E";
			
			}
			$nombres=explode(" ",$fila['nombres']);
			
			$apellidos=explode(" ",$fila['apellidos']);
			
			$apenom=$nombres[0]." ".$apellidos[0];
			
			$k=30-strlen($apenom);
			for($i=1;$i<=$k;$i++)
				$apenom=$apenom." ";
			
			
			$detalles.=$apenom;
		
			//$detalles.="                              ";
			
			$detalles.="EMPLEADO";
			
			$detalles.="       ";
			
			$detalles.="00000000000000000000";
			
			$detalles.="MENSUAL   ";
		
			$fecing=explode("-",$fila['fecing']);
			$fecingg=$fecing[0].$fecing[1].$fecing[2];
			$detalles.=$fecingg;
	
			$fecing=explode("-",$fila['dfecing']);
			$fecingg=$fecing[0].$fecing[1].$fecing[2];
			$detalles.=$fecingg;
	
			$detalles.="                    ";
			$detalles.="29";
			$detalles.="                          ";
			$neto_empleado=$fila['monto'];
			$detalles.=$proceso->completar($proceso->formatear_monto($neto_empleado),10);
			$detalles.="-";
			
			$detalles.="\r\n";		
			fwrite($archivo,$detalles);
			//echo $detalles;
		}
	}
	
	fclose($archivo);
	//echo "Content-Disposition: attachment; filename=".$ruta;
	header("Content-type: application/octet-stream");
	readfile($ruta); 
	header('Content-Disposition: attachment; filename="INGRESOS.txt"');

	break;
}


?>
