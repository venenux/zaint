<?php 
session_start();
ob_start();
?>
<?
require_once "../lib/common.php";
$conexion=conexion();
$opcion=$_POST['op'];
$codigo=$_POST['registro_id'];
$pagina=$_POST['pageno'];
if($opcion==4)
{
	$consulta="SELECT * FROM nomcampos_adicionales WHERE id=$codigo";
	$resultado=query($consulta,$conexion);
	$fetch=fetch_array($resultado);
	
	$consulta="UPDATE nomcampos_adic_personal SET valor='$fetch[valdefecto1]' WHERE id=$codigo AND tiponom='$_SESSION[codigo_nomina]'";
	$resultado2=query($consulta,$conexion);
	
	?>
	<SCRIPT type="text/javascript">
	alert("CAMPO ADICIONAL RESTABLECIDO EXITOSAMENTE!!")
	</SCRIPT>
	<?
}
elseif($opcion==5)
{
	$consulta="SELECT * FROM nomcampos_adicionales WHERE id=$codigo";
	$resultado=query($consulta,$conexion);
	$fetch=fetch_array($resultado);
	
	$consulta="SELECT ficha FROM nompersonal WHERE tipnom='".$_SESSION['codigo_nomina']."'";
	$resultado2=query($consulta,$conexion);
	
	while($fetch2=fetch_array($resultado2))
	{
		$consulta="SELECT * FROM nomcampos_adic_personal WHERE ficha='$fetch2[ficha]' AND tiponom='$_SESSION[codigo_nomina]' AND id=$codigo";
		$resultado3=query($consulta,$conexion);
		if(num_rows($resultado3)==0)
		{
			$consulta="insert into nomcampos_adic_personal (ficha,id,valor,tipo,codorgh,tiponom) values ('".$fetch2['ficha']."','".$fetch['id']."','".$fetch['valdefecto1']."','".$fetch['tipo']."','".$fetch['codorgh']."','".$_SESSION['codigo_nomina']."')";
			$resultado4=query($consulta,$conexion);
		}
	}
	?>
	<SCRIPT type="text/javascript">
	alert("CAMPO ADICIONAL AGREGADO EXITOSAMENTE!!")
	</SCRIPT>
	<?
}

header("Location: constantes_personal.php?pagina=".$pagina);
?>