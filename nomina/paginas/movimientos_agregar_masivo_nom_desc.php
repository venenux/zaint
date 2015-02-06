<?php 
session_start();
ob_start();
?>
<?php 
require_once '../lib/common.php';
include ("../header.php");
include ("funciones_nomina.php");
include ("func_bd.php") ;
$url="movimientos_agregar_masivo";
$modulo="Agregar Movimientos a la Nomina";
$tabla="nomconceptos";

$ficha=$_GET['ficha'];
$todo=$_GET['todo'];

if(!isset($_POST['nomina']))
{
	$nombre_nomina=$_GET['nomina'];
}
else
{
	$nombre_nomina=$_POST['nomina'];
}
if(!isset($_POST['ficha']))
{
	$ficha=$_GET['ficha'];
}
else
{
	$ficha=$_POST['ficha'];
}



$conexion=conexion();
$consulta="select * from nom_nominas_pago where codnom='".$nombre_nomina."' and tipnom='".$_SESSION['codigo_nomina']."'";
$resultado_nom=query($consulta,$conexion);
$fila_nom=fetch_array($resultado_nom);
$CODNOM=$nombre_nomina;
$FECHANOMINA=$fila_nom['periodo_ini'];
$FECHAFINNOM=$fila_nom['periodo_fin'];
$LUNES=lunes($FECHANOMINA);	
$LUNESPER=lunes_per($FECHANOMINA,$FECHAFINNOM);
$consulta="select monsalmin from nomempresa";
$resultado_salmin=query($consulta,$conexion);
$fila_salmin=fetch_array($resultado_salmin);

$consulta="select * from nompersonal where ficha='".$ficha."' and tipnom='".$_SESSION['codigo_nomina']."'";
$resultado=query($consulta,$conexion);
$fila=fetch_array($resultado);
$CEDULA = $fila[cedula];
$FICHA = $fila[ficha];
$SUELDO=$fila[suesal];//LISTO
$SEXO=".".$fila[sexo]."'";
$FECHANACIMIENTO=date("d/m/Y",strtotime($fila[$fecnac]));
$EDAD=date("Y")-date("Y",$fila[$fecnac]);
$TIPONOMINA=$fila[tipnom];//LISTO
$FECHAINGRESO=$fila[fecing];//LISTO
$CODPROFESION=$fila[codpro];
$CODCATEGORIA=$fila[codcat];
$CODCARGO=$fila[codcargo];
$SITUACION=$fila[estado];
$SUELDOPROPUESTO=$fila[sueldopro];
$TIPOCONTRATO=$fila[contrato];
$FORMACOBRO=$fila[forcob];
$NIVEL1=$fila[codnivel1];
$NIVEL2=$fila[codnivel2];
$NIVEL3=$fila[codnivel3];
$NIVEL4=$fila[codnivel4];
$NIVEL5=$fila[codnivel5];
$NIVEL6=$fila[codnivel6];
$NIVEL7=$fila[codnivel7];
$FECHAAPLICACION=$fila[fechaplica];
$TIPOPRESENTACION=$fila[tipopres];
$FECHAFINSUS=$fila[fechasus];
$FECHAINISUS=$fila[fechareisus];
$FECHAFINCONTRATO=$fila[fecharetiro];
$FECHAVAC=$fila[fechavac];
$FECHAREIVAC=$fila[fechareivac];
$CONTRACTUAL=$fila[contractual];
$PRT=$fila[proratea];
$REF=0;
$SALARIOMIN=$fila_salmin['monsalmin'];

// GUARDA EL  REGISTRO EN EL EXPEDIENTE
if(isset($_POST['opcion']) and $_POST['opcion']=="Guardar" and isset($_POST['ficha']) and isset($_POST['codcon']))
{
	if($_POST['fecha_reintegro']=='')
		$fecha_reintegro='';
	else
		$fecha_reintegro=fecha_sql($_POST['fecha_reintegro']);
	if($_POST['fecha_salida']=='')
		$fecha_salida='';
	else
		$fecha_salida=fecha_sql($_POST['fecha_salida']);
	
	$consulta="INSERT INTO nomexpediente VALUES ('','$CEDULA','Permisos o Ausencias','$_POST[tipo_tiporegistro]','$_POST[descripcion]', '$_POST[monto]','$_POST[monto_nuevo]','$_POST[referencia]','".$fecha_reintegro."','".$fecha_salida."','$_POST[cod_cargo]','$_POST[cod_cargo_nuevo]','".date("Y-m-d")."','$_SESSION[nombre]','$_POST[pagado_por_emp]', '$_POST[institucion]', '$_POST[tipo_estudio]', '$_POST[nivel_actual]', '$_POST[costo_persona]', '$_POST[num_participantes]', '$_POST[nombre_especialista]', '$_POST[gerencia_anterior]', '$_POST[gerencia_nueva]', '$_POST[nomina_anterior]', '$_POST[nomina_nueva]', '$_POST[puntaje]', '$_POST[calificacion]', '$_POST[labor]', '$_POST[institucion_publica]','$_POST[tcamisa]', '$_POST[tchaqueta]','$_POST[tbata]','$_POST[tpantalon]','$_POST[tmono]','$_POST[tzapato]')";
	$resultado=query($consulta,$conexion);
}

if(isset($_POST['opcion']) and $_POST['opcion']=="Guardar" and $_POST['aplica']==1)
{
	$referencia=$_POST['referencia'];
	$concepto=$_POST['codcon'];
	if($SITUACION!="Inactivo")
	{
		$consulta_mov="select * from nom_movimientos_nomina where codcon='".$concepto."' and codnom='".$nombre_nomina."' and ficha ='".$_POST['ficha']."' and tipnom='".$_SESSION['codigo_nomina']."'";
		$resultado_mov=mysql_query($consulta_mov);
		
		if(num_rows($resultado_mov)==0)
		{
			$consulta="select * from nomconceptos where codcon='".$concepto."'";
			$resultado_con=mysql_query($consulta);
			$fila=fetch_array($resultado_con);
			$REF=$referencia;
			//echo $formula[$valor];
			eval($fila['formula']);
			
			if($MONTO<=0 && $fila['montocero']==1)
			{
				$entrar=0;
			}
			else
			{
				$entrar=1;
			}
			if($entrar==1)
			{
				$consulta="insert into nom_movimientos_nomina (codnom, codcon,ficha,mes,anio,tipcon,valor,monto,cedula,unidad,descrip,codnivel1,codnivel2,codnivel3,codnivel4,codnivel5,codnivel6,codnivel7,tipnom,contractual) values ('".$_POST['nomina']."', '".$concepto."','".$_POST['ficha']."','".$fila_nom['mes']."','".$fila_nom['anio']."','".$fila['tipcon']."','".$REF."','".$MONTO."','$CEDULA','".$fila['unidad']."','".$fila['descrip']."','$NIVEL1','$NIVEL2','$NIVEL3','$NIVEL4','$NIVEL5','$NIVEL6','$NIVEL7','".$_SESSION['codigo_nomina']."','$fila[contractual]')";
				if(!$resultado=mysql_query($consulta))
				{
					echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
					alert('No se puede calcular conceptos a esta persona')
					</SCRIPT>";
				}
			}
		}	
	}
	/*else
	{
		echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
		alert('No se puede calcular conceptos a esta persona')
		</SCRIPT>";
	}*/

	$registro_id=$_POST['nomina'];		
	$cod_nomina=$_GET['codigo_nomina'];	
	$consulta="select * from nom_nominas_pago where codnom='".$registro_id."' and tipnom='".$_SESSION['codigo_nomina']."'";
	$resultado_nom=sql_ejecutar($consulta);
	$fila_nom=fetch_array($resultado_nom);
	$op=$_POST['op'];
	$pagina2=$_GET['pagina2'];
	//mysql_free_result($resultado_nom);

	$consulta="select monsalmin from nomempresa";
	$resultado_salmin=sql_ejecutar($consulta);
	$fila_salmin=fetch_array($resultado_salmin);
	
		// BORRA LOS MOVIMIENTO DE LA NOMINA A PROCESAR
		// BORRA LOS MOVIMIENTO DE LA NOMINA A PROCESAR
		$query="delete from nom_movimientos_nomina where tipnom='".$_SESSION['codigo_nomina']."' and codnom='$registro_id' and ficha='".$_POST['ficha']."' and contractual=1";
		$result3=sql_ejecutar($query);	
		// FILTRALOS EMPLEADOS SEGUN LA NOMINA ACTUAL
		//$query="select * from nompersonal where tipnom = $cod_nomina";
		

		$query="select * from nomconceptos as c
		inner join
		nomconceptos_tiponomina as ct on c.codcon = ct.codcon
		inner join
		nomconceptos_frecuencias as cf on c.codcon = cf.codcon
		inner join
		nomconceptos_situaciones as cs on c.codcon = cs.codcon
		inner join
		nompersonal as pe on cs.estado = pe.estado 
		where cf.codfre='".$fila_nom['frecuencia']."' and pe.tipnom = '".$_SESSION['codigo_nomina']."' and ct.codtip = '".$_SESSION['codigo_nomina']."' and pe.ficha='$_POST[ficha]' and cs.estado = pe.estado and c.contractual='1' group by pe.apenom,pe.ficha,c.formula,c.codcon,cs.estado order by c.tipcon, c.codcon";
		$result2=sql_ejecutar($query);
		$end = num_rows($result2);	
		$cont=0;
		
		// pertenece a los campos pero es el mismo valor para todos
		$FECHAHOY=date("d/m/Y");

		$CODNOM=$registro_id;
		$FECHANOMINA=$fila_nom['periodo_ini'];
		$FECHAFINNOM=$fila_nom['periodo_fin'];
		$LUNES=lunes($FECHANOMINA);	
		$LUNESPER=lunes_per($FECHANOMINA,$FECHAFINNOM);
		$PRS=$bandera;

		$SALARIOMIN=$fila_salmin['monsalmin'];

		while ($fila = fetch_array($result2))
		{
			// prepara las variables con los valores
			
			$NOMBRE=$fila[apenom];
			
			//msgbox($fila[apenom]);
			
			?>
			<script>
			document.frmPrincipal.empleado.value ='Empleado: <?php echo $NOMBRE; ?>';
			document.frmPrincipal.concepto.value ='Concepto: <?php echo $fila[descrip]; ?>';			
			</script>
			<?php
			$CEDULA = $fila[cedula];
			$FICHA = $fila[ficha];
			$SUELDO=$fila[suesal];//LISTO
			$SEXO=".".$fila[sexo]."'";
			$FECHANACIMIENTO=date("d/m/Y",strtotime($fila[$fecnac]));
			$EDAD=date("Y")-date("Y",$fila[$fecnac]);
			$TIPONOMINA=$fila[tipnom];//LISTO
			$FECHAINGRESO=$fila[fecing];//LISTO
			$CODPROFESION=$fila[codpro];
			$CODCATEGORIA=$fila[codcat];
			$CODCARGO=$fila[codcargo];
			$SITUACIONPER=$SITUACION=$fila[estado];
			$SITUACIONPER=$fila[estado];
			$SUELDOPROPUESTO=$fila[sueldopro];
			$TIPOCONTRATO=$fila[contrato];
			$FORMACOBRO=$fila[forcob];
			$NIVEL1=$fila[codnivel1];
			$NIVEL2=$fila[codnivel2];
			$NIVEL3=$fila[codnivel3];
			$NIVEL4=$fila[codnivel4];
			$NIVEL5=$fila[codnivel5];
			$NIVEL6=$fila[codnivel6];
			$NIVEL7=$fila[codnivel7];
			$FECHAAPLICACION=$fila[fechaplica];
			$TIPOPRESENTACION=$fila[tipopres];
			$FECHAFINSUS=$fila[fechasus];
			$FECHAINISUS=$fila[fechareisus];
			$FECHAFINCONTRATO=$fila[fecharetiro];
			$REF=0;
			$CONTRACTUAL=$fila[contractual];
			$FECHAVAC=$fila[fechavac];
			$FECHAREIVAC=$fila[fechareivac];
			$PRT=$fila[proratea];
			//-----------------------------------
			$cont=$cont+1;
			if ($fila['formula']!='')
			{
				//$formula=strtoupper($fila[formula]);
				//$cadena_eval="\$MONTO=$formula";	
				$formula=$fila[formula];
				//eval($cadena_eval);

				if ($fila[contractual]==1){
					eval($formula);
					if($MONTO<=0 && $fila[montocero]==1){
						$entrar=0;
					}else{
						$entrar=1;
					}
					if ($entrar==1)
					{
						$query="insert into nom_movimientos_nomina 
						(codnom,codcon,ficha,mes,anio,monto,cedula,tipcon,unidad,valor,descrip,codnivel1,codnivel2,codnivel3,codnivel4,codnivel5,codnivel6,codnivel7,tipnom,contractual) values ('$registro_id','".$fila[codcon]."','".$fila[ficha]."','".$fila_nom[mes]."','".$fila_nom[anio]."','$MONTO','$CEDULA','".$fila[tipcon]."','".$fila[unidad]."','".$REF."','".$fila['descrip']."','$fila[codnivel1]','$fila[codnivel2]','$fila[codnivel3]','$fila[codnivel4]','$fila[codnivel5]','$fila[codnivel6]','$fila[codnivel7]','".$_SESSION['codigo_nomina']."','".$fila['contractual']."')";
						$result=sql_ejecutar($query);
						unset($result);
					}
				}
			}
		unset($MONTO);
		unset($T01);
		unset($T02);
		unset($T03);
		unset($T04);
		unset($T05);
		unset($T06);
		unset($T07);	
		unset($FICHA);
		unset($SUELDO);
		unset($SEXO);
		unset($FECHANACIMIENTO);
		unset($EDAD);
		unset($TIPONOMINA);
		unset($FECHAINGRESO);
		unset($CODPROFESION);
		unset($CODCATEGORIA);
		unset($CODCARGO);
		unset($SITUACION);
		unset($FORMACOBRO);
		//unset($formula);
		//unset($resultado2);
		//mysql_free_result($resultado2);
		}
		$codigo_nuevo=AgregarCodigo("nom_nominas_pago","codnom", "where codtip='".$_SESSION['codigo_nomina']."'");
		$codigo_nuevo-=1;
		$consulta="update nomtipos_nomina set codnom='".$codigo_nuevo."' where codtip='".$_SESSION['codigo_nomina']."'";
		sql_ejecutar($consulta);
	


}
/*
else
{
	echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
	alert('No se puede calcular')
	</SCRIPT>";
}
*/
$consulta="SELECT ficha, cedula, apenom FROM nompersonal WHERE tipnom='$_SESSION[codigo_nomina]'";
$result=query($consulta,$conexion);
?>
<script language="JavaScript" type="text/javascript">

function buscar_empleado()
{
	AbrirVentana('buscar_empleado_acumulados.php',660,700,0);
}

function buscar_concepto()
{
	AbrirVentana('buscar_concepto.php',660,700,0);
}

function enviar(op)
{
	document.frmPrincipal.opcion.value=op;
	var val1=document.getElementById('ficha');
	var val2=document.getElementById('codcon');
	var val3=document.getElementById('referencia');
	var val4=document.getElementById('tipo_tiporegistro');
	var val5=document.getElementById('fecha_salida');
	var val6=document.getElementById('fecha_reintegro');
	
	if((val1.value==0)||(val1.value=='')||(val2.value==0)||(val2.value=='')||(val3.value==0)||(val3.value=='')||(val4.value==0)||(val4.value=='')||(val5.value==0)||(val5.value=='')||(val6.value==0)||(val6.value==''))
	{
		alert("DEBE INTRODUCIR DATOS VALIDOS... VERIFIQUE");
		return false;
	}
	else
		document.frmPrincipal.submit();
}

</script>
<FORM name="frmPrincipal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"  target="_self">
<?
titulo_mejorada($modulo,"21.png","btn('cancel','window.close()',2);","");
?>
<input name="marcar_todos" type="hidden" value="1">
<input name="opcion" id="opcion" type="hidden" value="">
<input name="nomina" id="nomina" type="hidden" value="<?echo $nombre_nomina?>">
<table width="100%" cellspacing="0" border="0" cellpadding="1" align="center">
<tbody>
<tr class='tb-fila' >
<td width="20%" height="25"><strong><font color='#000066'>CODIGO:</font></strong></td>
<td>
<input type="text" name="ficha" id="ficha" maxlength="5" size="16" onblur="javascript:cargar_nombre();">
<a href="javascript:buscar_empleado();"><img src="images/search.gif" name="buscar" id="buscar" border="0"/></a>
</td>
<td><div id="nombre"></div></td>
</tr>
<tr >
<td width="20%" height="25"><strong><font color='#000066'>CONCEPTO:</font></strong></td>
<td>
<input type="text" name="codcon" id="codcon" maxlength="5" size="16" onblur="javascript:cargar_concepto();">
<a href="javascript:buscar_concepto();"> <img src="images/search.gif" name="buscar" id="buscar" border="0" /></a>
</td>
<td><div id="concepto"></div></td>
</tr>
</tbody>
</table>
<table width="100%" cellspacing="0" border="0" cellpadding="1" align="center">
<tbody>
<tr class="tb-head">
<table width="100%" border="0">
<tr class='tb-fila'>
<td><?
$consulta="SELECT * FROM nomsuspenciones";
$resultado=sql_ejecutar($consulta);
?>
<div id="tipo_tipo">
<font color='#000066'><strong>TIPO PERMISO: </strong></font><SELECT name="tipo_tiporegistro" id="tipo_tiporegistro">
<option value="">Seleccione</option>
<?php
while($fetch=fetch_array($resultado))
{
?>
<option value="<? echo $fetch['codigo']?>" <? if ($fetch33['tipo_tiporegistro']==$fetch['codigo']) echo "selected='true'"?>><? echo $fetch['descrip']?></option>";
<?
}
?>
</SELECT>
</div>			
</TD>
<td>&nbsp;&nbsp;<font color='#000066'><STRONG>APLICA?:</STRONG></font><input type="checkbox" name="aplica" id="aplica" value="1"></td>
</tr>
</table>			
<table width="100%" border="0">
<TR height="25">
<TD colspan="2"><font color='#000066'><STRONG>DESCRIPCION:</STRONG></font> <input type="text" name="descripcion" id="descripcion" <? if (isset($fetch33['descripcion'])) echo "value='$fetch33[descripcion]'"?> size="70"/>
</TD>
</TR>
<tr class='tb-fila'  height="25">
<TD colspan="2"><font color='#000066'><STRONG>DURACION (D&iacute;as): </STRONG></font>
<input type="text" size="3" name="referencia" id="referencia" maxlength="2" <? if (isset($fetch33['dias'])) echo "value='$fetch33[dias]'"?>/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<font color='#000066'><STRONG>FECHA DE INICIO:</STRONG></font>
<input size="10" type="text" name="fecha_salida" id="fecha_salida" value="<?if(isset($fetch33['fecha_salida'])) echo fecha($fetch33['fecha_salida']);?>">
<a>
<input name="image5" type="image" id="d_fechainicio" src="../lib/jscalendar/cal.gif"/>
<script type="text/javascript">
Calendar.setup({inputField:"fecha_salida",ifFormat:"%d/%m/%Y",button:"d_fechainicio"})
</script>
			
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color='#000066'><STRONG>FECHA DE CULMINACION:</STRONG></font>
<input size="10" type="text" name="fecha_reintegro" id="fecha_reintegro" value="<?if(isset($fetch33['fecha_retorno'])) echo fecha($fetch33['fecha_retorno']);?>">
<a>
<input name="image55" type="image" id="d_fechafin" src="../lib/jscalendar/cal.gif"/>
<script type="text/javascript">
Calendar.setup({inputField:"fecha_reintegro",ifFormat:"%d/%m/%Y",button:"d_fechafin"})
</script>

</TD>
</tr>
</table>
<br>

<table width="100%" cellspacing="0" border="0" cellpadding="1" align="center">
<tbody>
<tr><td colspan="2" height="50" align="center" class="tb-tit"><INPUT type="button" name="guardar" value="Guardar" onclick="javascript:enviar('Guardar');"><INPUT type="submit" name="eliminar" value="Eliminar" onclick="javascript:enviar('Eliminar');">
</td></tr>
</tr>
</tbody>
</table>
</FORM>
</BODY>
</html>
