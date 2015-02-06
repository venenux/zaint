<?php


if (!isset($_SESSION))
{
	session_start();
	ob_start();
}
include ('../general.config.inc.php');
?>

<html>
<head>
<title>:: Selectra ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="estilos.css" rel="stylesheet" type="text/css" />
</head>
<body class="fondo">



<?php
include("lib/common.php") ;


if(isset($_GET['tabla'])){
	$tabla=$_GET['tabla'];
}else{
	$tabla=$_POST['tabla'];
}

if(isset($_POST['tabla'])){
	
	if($_POST['empresa']!="" and $_POST['bd']!=""){
		#echo $_POST['empresa']." con ".$_POST['bd'];exit;
		//se construye una base de datos
		$conexion=new bd(DB_SELECTRA_NOM);#SELECTRA_CONF_NOMINA

		$conexion->create_database($_POST['bd']);
		unset($conexion);

		//se construyen las tablas segun la el modulo deseado

		switch($tabla){
			case 'conempresa':
				$archivo=file("contabilidad.sql", FILE_SKIP_EMPTY_LINES);
				break;
			case 'nomempresa':
				$archivo=file("nomina.sql", FILE_SKIP_EMPTY_LINES);

				break;
			case 'bienempresa':
				break;

		}
		$selectraconf=new bd(SELECTRA_CONF_PYME);#SELECTRA_CONF_NOMINA
		$sentencia="insert into ".$tabla." (nombre,bd_nomina) values ('".$_POST['empresa']."','".$_POST['bd']."')";
		$selectraconf->query($sentencia);
		$conexion=new bd($_POST['bd']);
		//$consulta=fopen("contabilidad.sql","r");

		//$conexion->multi_query($consulta);

		foreach($archivo as $lineas){

			//$temp=split(" ",$lineas);
			$consulta.=$lineas;
			if(substr($lineas, -2, 1)==";"){

				$conexion->query($consulta);

				$consulta="";
			}
		}




		?>

	<script type="text/javascript">
window.opener.parent.location.href="seleccionar_empresa.php?tabla=<?echo $tabla?>"
window.close()
</script>
<?


	}else{

		?>

	<script type="text/javascript">
alert("Debe introducir datos validos")
</script>
<?
	}
}


titulo_mejorada("Agregar Empresa","","","");
?>

	<BR>
	<FORM name="empresas_agregar" id="empresas_agregar"
		action="empresas_agregar.php" method="POST">
		<INPUT type="hidden" name="tabla" value="<?echo $tabla?>">
		<table>
			<tbody>
				<tr>
					<td class="tb-head">Empresa</td>
					<td><INPUT type="text" name="empresa" size="50"></td>
				</tr>
				<tr>
					<td class="tb-head">Nombre de la base de datos</td>
					<td><INPUT type="text" name="bd" size="20"></td>
				</tr>
			</tbody>
		</table>
		<br>
		<?
		titulo_mejorada("","","btn2('Agregar','document.empresas_agregar.submit()','add.gif');","");
?>
	</FORM>
</BODY>
</html>
