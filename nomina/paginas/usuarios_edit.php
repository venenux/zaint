<?php 
session_start();
ob_start();
?>
<?php

require_once '../lib/common.php';
$conexion=conexion();

$url="usuarios_list";
$modulo="Usuarios";
$tabla="nomusuarios";
$titulos=array("Nombre","Nombre de Usuario");
$indices=array("1","33");

if(isset($_POST['aceptar'])){
	$indices=array("1","33","4");	
	$consulta="select * from ".$tabla;
	$resultado=query($consulta,$conexion);

	
	$cadena="";
	foreach($indices as $valor){
		$campo=mysql_field_name($resultado,$valor);
		if($cadena==""){
			
			$cadena=$cadena.$campo."='".$_POST[$campo]."'";
		}
		else{
			$cadena=$cadena.",".$campo."='".$_POST[$campo]."'";
		}
	}
	
	echo $consulta="UPDATE ".$tabla." SET descrip='$_POST[descrip]', login_usuario='$_POST[login_usuario]', clave='".hash("sha256",$_POST['clave'])."', acce_configuracion='$_POST[acce_configuracion]', acce_elegibles='$_POST[acce_elegibles]', acce_personal='$_POST[acce_personal]', acce_prestamos='$_POST[acce_prestamos]', acce_consultas='$_POST[acce_consultas]', acce_transacciones='$_POST[acce_transacciones]', acce_procesos='$_POST[acce_procesos]', acce_reportes='$_POST[acce_reportes]', acce_usuarios='$_POST[acce_usuarios]', acce_autorizar_nom='$_POST[acce_autorizar_nom]', acce_enviar_nom='$_POST[acce_enviar_nom]', acce_estuaca='$_POST[acce_estuaca]', acce_xestuaca='$_POST[acce_xestuaca]', acce_permisos='$_POST[acce_permisos]', acce_logros='$_POST[acce_logros]',  acce_penalizacion='$_POST[acce_penalizacion]', acce_movpe='$_POST[acce_movpe]', acce_evalde='$_POST[acce_evalde]', acce_experiencia='$_POST[acce_experiencia]', acce_antic='$_POST[acce_antic]', acce_uniforme='$_POST[acce_uniforme]' where coduser='".$_POST["codigo"]."'";
	$resultado=query($consulta,$conexion);
	cerrar_conexion($conexion);
	echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
	
	parent.cont.location.href=\"".$url.".php?pagina=1\"
	</SCRIPT>";
	

}
	$codigo = @$_GET['codigo'];
	
	
	$consulta="select * from ".$tabla." where coduser='".$codigo."'";
	//echo $consulta;
	$resultado=query($consulta,$conexion);
	$fila=fetch_array($resultado);

?>

<html class="fondo">

<head>
  <title></title>
  <link href="../estilos.css" rel="stylesheet" type="text/css">
  <SCRIPT language="JavaScript" type="text/javascript" src="../lib/common.js">
  </SCRIPT>
<SCRIPT language="JavaScript" type="text/javascript">

function cerrar(retorno){
	parent.cont.location.href=retorno+".php?pagina=1"
}

function contra(){
		
		if(this.document.forms.sampleform.clave.value==this.document.forms.sampleform.comprobar.value){
				
				this.document.forms.sampleform.aceptar.focus();
				
		
			}
		else{
				alert("Las contraseñas introducidas no coinciden");
				this.document.forms.sampleform.clave.focus();
				this.document.forms.sampleform.clave.value="";
				this.document.forms.sampleform.comprobar.value="";
		
		}

}

function actualizar_administrador(){
	if (document.sampleform.ADMIN.checked==true){
		
		document.sampleform.acce_configuracion.checked=true;
		document.sampleform.acce_elegibles.checked=true;
		document.sampleform.acce_personal.checked=true;
		document.sampleform.acce_prestamos.checked=true;
		document.sampleform.acce_consultas.checked=true;
		document.sampleform.acce_transacciones.checked=true;
		document.sampleform.acce_procesos.checked=true;
		document.sampleform.acce_reportes.checked=true;
		document.sampleform.acce_transferencia.checked=true;
		document.sampleform.acce_reg_personal.checked=true;
		document.sampleform.acce_aumentos.checked=true;
		document.sampleform.acce_acumulados.checked=true;
		document.sampleform.acce_gen_prestamos.checked=true;
		document.sampleform.acce_man_prestamos.checked=true;
		document.sampleform.acce_nominas.checked=true;
		document.sampleform.acce_vacaciones.checked=true;
		document.sampleform.acce_usuarios.checked=true;
		document.sampleform.acce_autorizar_nom.checked=true;
		document.sampleform.acce_enviar_nom.checked=true;
		
		document.sampleform.acce_estuaca.checked=true;
		document.sampleform.acce_xestuaca.checked=true;
		document.sampleform.acce_permisos.checked=true;
		document.sampleform.acce_logros.checked=true;
		document.sampleform.acce_penalizacion.checked=true;
		document.sampleform.acce_movpe.checked=true;
		document.sampleform.acce_evalde.checked=true;
		document.sampleform.acce_experiencia.checked=true;
		document.sampleform.acce_antic.checked=true;
		document.sampleform.acce_uniforme.checked=true;
		
	}
	else
	{
		document.sampleform.acce_configuracion.checked=false;
		document.sampleform.acce_elegibles.checked=false;
		document.sampleform.acce_personal.checked=false;
		document.sampleform.acce_prestamos.checked=false;
		document.sampleform.acce_consultas.checked=false;
		document.sampleform.acce_transacciones.checked=false;
		document.sampleform.acce_procesos.checked=false;
		document.sampleform.acce_reportes.checked=false;
		document.sampleform.acce_transferencia.checked=false;
		document.sampleform.acce_reg_personal.checked=false;
		document.sampleform.acce_aumentos.checked=false;
		document.sampleform.acce_acumulados.checked=false;
		document.sampleform.acce_gen_prestamos.checked=false;
		document.sampleform.acce_man_prestamos.checked=false;
		document.sampleform.acce_nominas.checked=false;
		document.sampleform.acce_vacaciones.checked=false;
		document.sampleform.acce_usuarios.checked=false;
		document.sampleform.acce_autorizar_nom.checked=false;
		document.sampleform.acce_enviar_nom.checked=false;
		
		document.sampleform.acce_estuaca.checked=false;
		document.sampleform.acce_xestuaca.checked=false;
		document.sampleform.acce_permisos.checked=false;
		document.sampleform.acce_logros.checked=false;
		document.sampleform.acce_penalizacion.checked=false;
		document.sampleform.acce_movpe.checked=false;
		document.sampleform.acce_evalde.checked=false;
		document.sampleform.acce_experiencia.checked=false;
		document.sampleform.acce_antic.checked=false;
		document.sampleform.acce_uniforme.checked=false;
	}
}


</SCRIPT>

</head>
<body>

<FORM name="sampleform" method="POST" target="_self" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<TABLE  width="100%" height="100">
<TBODY>

<tr>
<td colspan="2" height="30" class="tb-tit"><strong>Editar un Registro de <?echo $modulo?></strong></td>
<INPUT type="hidden" name="codigo" value="<?echo $codigo?>">
</tr>

<?
$i=0;
foreach($titulos as $nombre)
{
	$campo=mysql_field_name($resultado,$indices[$i]);
	//echo $campo;
	echo "<TR>";?><td class=tb-head ><?echo "$nombre"?></td>
	<td><INPUT type="text" name="<?echo $campo?>" size="100" value='<?echo "$fila[$campo]";?>'></td> </tr><?
	$i++;
		
}
	?>
	<TR><td class=tb-head >Contrase&#241;a</td>
		<td colspan="3"><INPUT type="password" name="clave" size="100"></td>
		
	</tr>
		<TR><td class=tb-head >Confirmar Contrase&#241;a</td>
		<td colspan="3"><INPUT type="password" name="comprobar" size="100" onblur="contra()"></td> </tr>
	</table>
	
	<table  width="100%" >
	    	<tr><td colspan="7" height="30" class="tb-tit"><strong>Accesos al Sistema: </strong></td></tr>
		<tr align="center"> <td><strong>Administrador</strong>
		<INPUT onclick="actualizar_administrador()" type="checkbox"  name="ADMIN" value="1"  size="100">
		</TD>
		</tr>	
	    
</table>
<table   width="410"      >

		<tr>
			<td class=tb-head  >&#8226; M&oacute;dulo de Configuraci&oacute;n</td>
			<td colspan="1"  width="20" class=tb-head ><INPUT <? if($fila['acce_configuracion']==1) echo "checked='true'"?> type="checkbox"   name="acce_configuracion" value="1" /></td>
			
		</tr>
		<tr>
			<td  class=tb-head>&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Modificar registro de usuarios</td>
			<td colspan="1" ><INPUT type="checkbox" <? if($fila['acce_usuarios']==1) echo "checked='true'"?>  name="acce_usuarios" value="1" ></td>	
		</tr>
			
		<tr>
			<td class=tb-head   >&#043; M&oacute;dulo de Elegibles</td>
			<td colspan="1" class=tb-head><INPUT type="checkbox" <? if($fila['acce_elegibles']==1) echo "checked='true'"?>  name="acce_elegibles" value="1" /></td>
			
		</tr>
		<tr>
			<td  class=tb-head > &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Transferir Elegidos</td>
			<td colspan="1" ><INPUT <? if($fila['acce_transferencia']==1) echo "checked='true'"?>  type="checkbox"  name="acce_transferencia" value="1" size="100"></td>
			
		</tr>
		<tr>
			
			<td class=tb-head  > &#043; M&oacute;dulo de Personal</td>
			<td colspan="1" class=tb-head><INPUT <? if($fila['acce_personal']==1) echo "checked='true'"?>  type="checkbox"  name="acce_personal" value="1" ></td>
		</tr>
		<tr>
			<td  class=tb-head>&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Modificar Reg. del Personal</td>
			<td colspan="1" ><INPUT <? if($fila['acce_reg_personal']==1) echo "checked='true'"?>  type="checkbox"  name="acce_reg_personal" value="1" ></td>	
		</tr>
		<tr>
			<td  class=tb-head   > &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Agregar registro Estudios academicos (Expediente)</td>
			<td colspan="1" ><INPUT type="checkbox" <? if($fila['acce_estuaca']==1) echo "checked='true'"?> name="acce_estuaca" value="1" size="100"></td>
		</tr>
		<tr>
			<td  class=tb-head   > &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Agregar registro Estudios extra academicos (Expediente)</td>
			<td colspan="1" ><INPUT type="checkbox" <? if($fila['acce_xestuaca']==1) echo "checked='true'"?> name="acce_xestuaca" value="1" size="100"></td>
		</tr>
		<tr>
			<td  class=tb-head   > &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Agregar registro Permisos (Expediente)</td>
			<td colspan="1" ><INPUT type="checkbox" <? if($fila['acce_permisos']==1) echo "checked='true'"?> name="acce_permisos" value="1" size="100"></td>
		</tr>
		<tr>
			<td  class=tb-head   > &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Agregar registro Logros (Expediente)</td>
			<td colspan="1" ><INPUT type="checkbox" <? if($fila['acce_logros']==1) echo "checked='true'"?> name="acce_logros" value="1" size="100"></td>
		</tr>
		<tr>
			<td  class=tb-head   > &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Agregar registro Penalizaciones (Expediente)</td>
			<td colspan="1" ><INPUT type="checkbox" <? if($fila['acce_penalizacion']==1) echo "checked='true'"?> name="acce_penalizacion" value="1" size="100"></td>
		</tr>
		<tr>
			<td  class=tb-head   > &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Agregar registro Movimientos de personal (Expediente)</td>
			<td colspan="1" ><INPUT type="checkbox" <? if($fila['acce_movpe']==1) echo "checked='true'"?> name="acce_movpe" value="1" size="100"></td>
		</tr>
		<tr>
			<td  class=tb-head   > &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Agregar registro Evaluacion de desempe&ntilde;o (Expediente)</td>
			<td colspan="1" ><INPUT type="checkbox" <? if($fila['acce_evalde']==1) echo "checked='true'"?> name="acce_evalde" value="1" size="100"></td>
		</tr>
		<tr>
			<td  class=tb-head   > &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Agregar registro Experiencia (Expediente)</td>
			<td colspan="1" ><INPUT type="checkbox" <? if($fila['acce_experiencia']==1) echo "checked='true'"?> name="acce_experiencia" value="1" size="100"></td>
		</tr>
		<tr>
			<td  class=tb-head   > &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Agregar registro Anticipo de prest. sociales (Expediente)</td>
			<td colspan="1" ><INPUT type="checkbox" <? if($fila['acce_antic']==1) echo "checked='true'"?> name="acce_antic" value="1" size="100"></td>
		</tr>
		<tr>
			<td  class=tb-head   > &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Agregar registro Entrega de uniforme (Expediente)</td>
			<td colspan="1" ><INPUT type="checkbox" <? if($fila['acce_uniforme']==1) echo "checked='true'"?>  name="acce_uniforme" value="1" size="100"></td>
		</tr>
		<tr>
			<td class=tb-head > &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Aumentos</td>
			<td colspan="1" ><INPUT <? if($fila['acce_aumentos']==1) echo "checked='true'"?>  type="checkbox"  name="acce_aumentos" value="1" ></td>
		</tr>
		<tr>
			<td  class=tb-head   > &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Consultar Acumulados</td>
			<td colspan="1" ><INPUT <? if($fila['acce_acumulados']==1) echo "checked='true'"?>  type="checkbox"  name="acce_acumulados" value="1" size="100"></td>
		</tr>
		<tr>
			<td class=tb-head  >&#043; M&oacute;dulo Prestamos</td>
			<td colspan="1" class=tb-head ><INPUT <? if($fila['acce_prestamos']==1) echo "checked='true'"?>  type="checkbox"  name="acce_prestamos" value="1" ></td>
		</tr>
		<tr>	
			<td class=tb-head  > &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Generar Prestamos</td>
			<td colspan="1" ><INPUT <? if($fila['acce_gen_prestamos']==1) echo "checked='true'"?>  type="checkbox"  name="acce_gen_prestamos" value="1" /></td>
		</tr>
		<tr>
			<td  class=tb-head  > &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Mantenimiento de Prestamos</td>
			<td colspan="1" ><INPUT <? if($fila['acce_man_prestamos']==1) echo "checked='true'"?>  type="checkbox"  name="acce_man_prestamos" value="1" ></td>
		</tr>
		<tr >
			<td class=tb-head >&#043; M&oacute;dulo de Consultas</td>
			<td colspan="1" class=tb-head><INPUT  <? if($fila['acce_consultas']==1) echo "checked='true'"?>  type="checkbox"  name="acce_consultas" value="1" ></td>
		</tr>
		<tr>
			<td  class=tb-head>&#043; M&oacute;dulo de Transacciones</td>
			<td colspan="1" class=tb-head ><INPUT <? if($fila['acce_transacciones']==1) echo "checked='true'"?> type="checkbox"  name="acce_transacciones" value="1" ></td>
		</tr>
		<tr>
			<td  class=tb-head  >&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Agregar y modificar nominas</td>
			<td colspan="1" ><INPUT <? if($fila['acce_nominas']==1) echo "checked='true'"?>  type="checkbox"  name="acce_nominas" value="1" ></td>
		
		</tr>
		<tr>
			<td  class=tb-head  >&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Autorizar nominas</td>
			<td colspan="1" ><INPUT <? if($fila['acce_autorizar_nom']==1) echo "checked='true'"?>  type="checkbox"  name="acce_autorizar_nom" value="1" ></td>
		
		</tr>
		<tr>
			<td  class=tb-head  >&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Enviar nominas a presupuesto y cont.</td>
			<td colspan="1" ><INPUT <? if($fila['acce_enviar_nom']==1) echo "checked='true'"?>  type="checkbox"  name="acce_enviar_nom" value="1" ></td>
		
		</tr>
		<tr>
			<td  class=tb-head  >&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Generar y modificar vacaciones</td>
			<td colspan="1" ><INPUT <? if($fila['acce_vacaciones']==1) echo "checked='true'"?>  type="checkbox"  name="acce_vacaciones" value="1" ></td>
		</tr>
		<tr>
			<td class=tb-head  > &#043;M&oacute;dulo de Procesos</td>
			<td colspan="1" class=tb-head ><INPUT <? if($fila['acce_procesos']==1) echo "checked='true'"?>  type="checkbox"  name="acce_procesos" value="1" > </td>
		</tr>
		<tr>
			<td  class=tb-head  >  &#043;M&oacute;dulo de Reportes &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;</td>
			<td colspan="1" class=tb-head><INPUT <? if($fila['acce_reportes']==1) echo "checked='true'"?>  type="checkbox"  name="acce_reportes" value="1" ></td>
		</tr>
		
		
		</table	>	

	<table width="100%" border="0">
	<tr class="tb-tit">
      <td></td>
      <td align="right"><INPUT type="submit" name="aceptar" value="Aceptar">&nbsp;<INPUT type="button" name="cancelar" value="Cancelar" onclick="javascript:cerrar('<?echo $url?>');"></td>
    </tr>
  </tbody>
</table>
</FORM>
</body>
</html>
<?
cerrar_conexion($conexion);

?>
