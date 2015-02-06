<?php

require_once 'lib/common.php';
include ("header.php");
$conexion=conexion();
//echo $conexion;

$url="tipo_activo";
$modulo="Tipos de Activos";
$tabla="activosfijos_tipos";
$titulos=array("C&oacute;digo","Descripci&oacute;n","Cuenta Real","Depreciable","Cuenta de Gasto o Depreciaci&oacute;n","Cuenta de Depreciaci&oacute;n Acumulada");
$indices=array("0","1","2","3","4","5");
$indices2=array("CODIGOTA","DESCRIP","CUENTAREAL","DEPRECIABLE","CUENTAGASTOS","CUENTAACUM");
$identificadores=array("CODIGOTA");

if(isset($_POST['aceptar'])) 
{
	$cadena="";//inicializamos la cadena
	foreach($indices2 as $campo)
	{//contruimos el update
		if($cadena=="")
		{
			$cadena=$cadena.$campo."='".$_POST[$campo]."'";
		}
		else
		{
			$cadena=$cadena.",".$campo."='".$_POST[$campo]."'";
		}
	}	
	$condicion="";//inicializamos la condicion
	foreach($identificadores as $campo){//construimos la condicion
		
		if($condicion==""){
		
			$condicion=$campo."='".$_POST[$campo]."'";
		}
		else{
			$condicion=$condicion.",".$campo."='".$_POST[$campo]."'";

		}
	}	

	$consulta="UPDATE ".$tabla." SET ".$cadena." WHERE ".$condicion;
	$resultado=query($consulta,$conexion);
	//echo $consulta;
	//exit(0);
	//cerrar_conexion($conexion);
	//$val=$_POST['codigo'];
	echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
	location.href=\"".$url.".php?pagina=1\"
	</SCRIPT>";
	
}else{
	$consulta="select * from ".$tabla;
	$resultado=query($consulta,$conexion);
	
}
?>
<html class="fondo">
<head>
  <title></title>
  <link href="../estilos.css" rel="stylesheet" type="text/css">
  <SCRIPT language="JavaScript" type="text/javascript" src="../lib/common.js">
  </SCRIPT>
<script language="javascript" src="cal2.js"></script>
<script language="javascript" src="cal_conf2.js"></script>
<SCRIPT language="JavaScript" type="text/javascript">

function cerrar(retorno){
	location.href="tipo_activo.php?pagina=1"
}
</SCRIPT>
</head>
<body>
<FORM name="sampleform" method="POST" target="_self" action="<?php echo $_SERVER['PHP_SELF']; ?>">



<TABLE  width="100%" height="100">

<TBODY>

<tr>
      <td colspan="2" height="30" class="tb-tit"><strong>Agregar Nuevo Registro de <?echo $modulo?></strong></td>
    </tr>
<?

	$cod = $_GET['id'];
	/*$consulta33="select max(CODIGOTA) as valor from activosfijos_tipos";
	$resultado_progra33=query($consulta33,$conexion);
//echo $consulta;
	$fila_progra=fetch_array($resultado_progra33);
	$max_progra=$fila_progra['valor'];
	$valor=$max_progra+1;
	*/
	$consulta="select * from ".$tabla." WHERE CODIGOTA = '".$cod."' ";
	$resultado=query($consulta,$conexion);
	$resultado2=query($consulta,$conexion);
	$fetch22 = fetch_array($resultado2);
	
	$consulta="select Cuenta, Descrip from cwconcue where Cuenta = '".$fetch22['CUENTAREAL']."' AND Tipo='P'";
	$resultadoC1=query($consulta,$conexion);
	$fetchC1 = fetch_array($resultadoC1);
	
	$consulta="select Cuenta, Descrip from cwconcue where Cuenta = '".$fetch22['CUENTAGASTOS']."' AND Tipo='P'";
	$resultadoC2=query($consulta,$conexion);
	$fetchC2 = fetch_array($resultadoC2);
	
	$consulta="select Cuenta, Descrip from cwconcue where Cuenta = '".$fetch22['CUENTAACUM']."' AND Tipo='P'";
	$resultadoC3=query($consulta,$conexion);
	$fetchC3 = fetch_array($resultadoC3);
	
	
	$consulta="select Cuenta, Descrip from cwconcue where Tipo='P'";
	$resultado_cuenta=query($consulta,$conexion);
	$resultado_cuenta1=query($consulta,$conexion);
	$resultado_cuenta2=query($consulta,$conexion);

?>



	<?
	$i=0;
	$cont=0;
	foreach($titulos as $nombre){
		$campo=mysql_field_name($resultado,$indices[$i]);
		
		if($i == 0)
		{
			echo "<TR>";?><td class=tb-head ><? echo "$nombre</td>";
			echo "<td colspan=\"3\"><INPUT type=\"text\" disabled=\"true\" name=\"codd\" value=\"$fetch22[$campo]\" size=\"80\">
			<INPUT type=\"hidden\"  name=\"$campo\" value=\"$fetch22[$campo]\" ></td> </tr>";
			$i++;
			$cont++;
			
		
		}
		elseif($i==3)
		{
			echo "<TR>";?><td class=tb-head ><? echo "$nombre</td>";
			echo "<td colspan=\"3\"><SELECT name=\"$campo\" id=\"$campo\">";
			if($fetch22[$campo] == "SI")
			{
				echo "<option value=SI selected>Depreciable</option>";
				echo "<option value=NO>No Depreciable</option>";
			}
			else
			{
				echo "<option value=SI>Depreciable</option>";
				echo "<option value=NO selected>No Depreciable</option>";
			}
			echo "</SELECT></td> </tr>";
			$i++;
			$cont++;
		}
		elseif($i==2)
		{
			echo "<TR>";?><td class=tb-head ><? echo "$nombre</td>";
			echo "<td colspan=\"3\"><SELECT name=\"$campo\" id=\"$campo\">";
			echo "<option value=\"$fetchC1[Cuenta]\">$fetchC1[Descrip]</option>";
            while($fetch33 = fetch_array($resultado_cuenta))
			{
				echo "<option value=\"$fetch33[Cuenta]\">$fetch33[Descrip]</option>";
			}
			echo "</SELECT></td> </tr>";
			$i++;
			$cont++;
		}
		elseif($i==4)
		{
			echo "<TR>";?><td class=tb-head ><? echo "$nombre</td>";
			echo "<td colspan=\"3\"><SELECT name=\"$campo\" id=\"$campo\">";
			echo "<option value=\"$fetchC2[Cuenta]\">$fetchC2[Descrip]</option>";
            while($fetch33 = fetch_array($resultado_cuenta1))
			{
				echo "<option value=\"$fetch33[Cuenta]\">$fetch33[Descrip]</option>";
			}
			echo "</SELECT></td> </tr>";
			$i++;
			$cont++;
		}
		elseif($i==5)
		{
			echo "<TR>";?><td class=tb-head ><? echo "$nombre</td>";
			echo "<td colspan=\"3\"><SELECT name=\"$campo\" id=\"$campo\">";
			echo "<option value=\"$fetchC3[Cuenta]\">$fetchC3[Descrip]</option>";
            while($fetch33 = fetch_array($resultado_cuenta2))
			{
				echo "<option value=\"$fetch33[Cuenta]\">$fetch33[Descrip]</option>";
			}
			echo "</SELECT></td> </tr>";
			$i++;
			$cont++;
		}
		else
		{
			echo "<TR>";?><td class=tb-head ><? echo "$nombre</td>";
			echo "<td colspan=\"3\"><INPUT type=\"text\" name=\"$campo\" value=\"$fetch22[$campo]\" size=\"80\"></td> </tr>";
			$i++;
			$cont++;
		}
		
		
	}
?>
    <tr class="tb-tit">
      <td></td>
      <td align="right"><INPUT type="submit" name="aceptar" value="Editar">&nbsp;<INPUT type="button" name="cancelar" value="Cancelar" onclick="javascript:cerrar('<?echo $url?>');"></td>
    </tr>
  </tbody>
</table>
</FORM>
</body>
</html>
<?
cerrar_conexion($conexion);
?>