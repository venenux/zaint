<?php 
session_start();
ob_start();
//$termino=$_SESSION['termino'];
	include ("../header.php");
	include("../lib/common.php");
	include("func_bd.php");
?>

<?
	$opcion=$_GET['opcion'];
	switch ($opcion)
	{
		case '1':
			$consulta="SELECT cod_centro, descripcion FROM centros WHERE cod_unidad='".$_GET['unidad']."'";
			$resultado_per=sql_ejecutar($consulta);
			?>
<!-- 			<div id="periodo"> -->
				<!--<SELECT name="sel_periodo" id="sel_periodo" onchange="javascript:cargar_fecha()">-->
			C. de costo usar en orden tipo nomina: 
			<SELECT name="ccosto" style="width:200px" id="ccosto">
			<option value="0">Seleccione</option>
			<?php
			while($fetch_per=fetch_array($resultado_per))
			{
				echo "<option title=".$fetch_per['descripcion']." value=\"$fetch_per[cod_centro]\">".$fetch_per['descripcion']." </option>";
			}
			
			?>
			</SELECT>
<!-- 			</div> -->

			<?
			break;
	}
?>