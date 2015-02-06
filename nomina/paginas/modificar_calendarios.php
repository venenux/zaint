<?php 
session_start();
ob_start();
?>
<?
require_once '../lib/common.php';
include ("../header.php");

$fecha = $_GET['fecha'];
$estado = $_GET['estado'];
$dia = $_GET['dia'];

$conexion=conexion();
$laborable="lightgray";
$nolaborable="red";
$mediajornada="magenta";
$feriado="green";
	
$consulta="UPDATE nomcalendarios_tiposnomina SET dia_fiesta = '".$estado."' where fecha='".$fecha."' AND cod_tiponomina = '".$_SESSION['codigo_nomina']."'";
$resultado=query($consulta,$conexion);

$color=$laborable;
if($estado=="1")
{
	$color=$nolaborable;
}
elseif($estado=="2")
{
	$color=$mediajornada;
}
elseif($estado=="3")
{
	$color=$feriado;
}
?>
<script type="text/javascript">
parent.cont.location.href="calendarios.php"
</script>
<!--<td onclick="javascript:alerta('<?//php echo $fecha; ?>','<?//php echo $dia; ?>');" id="< ?php echo $fecha;?>" align="center" style="cursor : pointer; font-size : 12pt;" title="<?//php echo utf8_encode($fila['descripcion_dia_fiesta']);?>" bgcolor="<?//php echo $color;?>"><?//php echo $dia;?></td>-->
