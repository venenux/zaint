<?php 
session_start();
ob_start();
?>
<?
require_once '../lib/common.php';
include ("../header.php");
#$_GET['estado'];

function vista_dia($dia,$mes,$ano)
{
	$conexion=conexion();
	$laborable="lightgray";
	$nolaborable="red";
	$mediajornada="white";
	$feriado="lightgreen";
	
	$fecha=$ano."-".$mes."-".$dia;
	$consulta="select * from nomcalendarios_tiposnomina where fecha='".$fecha."' AND cod_tiponomina = '".$_SESSION['codigo_nomina']."'";
	$resultado=query($consulta,$conexion);
	
	$fila=fetch_array($resultado);
	$color=$laborable;
	if($fila['dia_fiesta']=="1")
	{
		$color=$nolaborable;
	}
	elseif($fila['dia_fiesta']=="2")
	{
		$color=$mediajornada;
	}
	elseif($fila['dia_fiesta']=="3")
	{
		$color=$feriado;
	}
	?>
	<td onclick="javascript:alerta('<?php echo $fecha; ?>','<?php echo $dia; ?>','<?php echo $ano; ?>');" id="<?php echo $fecha;?>" align="center" style="cursor : pointer; font-size : 12pt;" title="<?php echo utf8_encode($fila['descripcion_dia_fiesta']);?>" bgcolor="<?php echo $color;?>"><?php echo $dia;?></td>
	<?php
}
function vista_calendario($mes,$ano)
{
//estados
$fecha_lunes= $ano."-".$mes."-01";
$num_dias_mes=date("t",strtotime($fecha_lunes));
$dia_inicio=date("N",strtotime($fecha_lunes));

?>
<table cellspacing="3" border="1"  cellpadding="1" > 
<tbody valign="top">
<tr>
<TD colspan="7" bgcolor="lightBlue" align="center">
<?php 
if($mes==1)
	echo "<strong>Enero</strong>";
elseif($mes==2)
	echo "<strong>Febrero</strong>";
elseif($mes==3)
	echo "<strong>Marzo</strong>";
elseif($mes==4)
	echo "<strong>Abril</strong>";
elseif($mes==5)
	echo "<strong>Mayo</strong>";
elseif($mes==6)
	echo "<strong>Junio</strong>";
elseif($mes==7)
	echo "<strong>Julio</strong>";
elseif($mes==8)
	echo "<strong>Agosto</strong>";
elseif($mes==9)
	echo "<strong>Septiempbre</strong>";
elseif($mes==10)
	echo "<strong>Octubre</strong>";
elseif($mes==11)
	echo "<strong>Noviembre</strong>";
elseif($mes==12)
	echo "<strong>Diciembre</strong>";
?>
</TD>
</tr>
<TR align="center"><TD>L</TD><TD>M</TD><TD>Mi</TD><TD>J</TD><TD>V</TD><TD>S</TD><TD>D</TD></TR>

<?
	$dia=1;
	echo "<TR>";
	for($i=1;$i<$dia_inicio;$i++)
	{
		echo "<TD></TD>";
	}
	for($i=1; $i<=$num_dias_mes;$i++)
	{
		$marca=0;
		if($dia_inicio<=7)
		{
			vista_dia($i,$mes,$ano);			
		}
		else
		{
			$marca=1;
			echo "</TR><TR>";
			$dia_inicio=1;
			$i--;
		}
		if($marca==0)
		{
			$dia_inicio++;
		}		
	}
	for($i=$dia_inicio;$i<=7;$i++)
	{
		echo "<TD></TD>";
	}
	echo "</tr>";
?>
</tbody>
</table>
<?
}
$ano=$_GET['ano'];
$bloques=4;
?>
<table width="789" border="0">
<tr class="tb-tit">
<td width="762"><div align="left"><font color="#000066"><strong>Ver y modificar calendario</strong></font></div></td>
<td width="17"><div align="center"><?php btn('back','consultar_calendarios.php')  ?></div></td>
</tr>
</table>
<table border="0" cellspacing="1">
<tr><TD>
<table border="0" cellspacing="1" align="center">
<tbody valign="top">
<tr>
<TD valign="middle" colspan="4" align="center">
<span style="font-size:14px;"><strong>CALENDARIO <?php echo $ano;?></strong></span>
</TD>
</tr>
<?php
$i=0;
for($mes=1;$mes<=12;$mes++)
{	
	echo "<TD>";
	vista_calendario($mes,$ano);
	echo "</TD>";
	$i++;
	if($i==$bloques){
		echo "</TR><TR valign=\"top\" align=\"center\">";
		$i=0;
	}	
}
echo "</tr>";
?>
</tbody>
</table>
</TD>
<td>
<select name="estado" id="estado">
<option value="0" <?php if($_GET['estado']==0) echo "selected='true'" ?> >Laborable</option>
<option value="1" <?php if($_GET['estado']==1) echo "selected='true'" ?> >No laborable</option>
<option value="2" <?php if($_GET['estado']==2) echo "selected='true'" ?> >Media jornada</option>
<option value="3" <?php if($_GET['estado']==3) echo "selected='true'" ?> >Feriado</option>
</select>
</TD>
</tr>
</table>
</body>
</html>