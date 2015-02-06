<?php 
session_start();
ob_start();
?>
<script>


function genericoseleccion(){
	document.form1.condecoraciones.checked=false
	document.form1.condecoracionesgeneral.checked=false
	document.form1.condecoracionesespecifico.checked=false
	document.form1.jubilacion.checked=false
	document.form1.jubilacionadministracion.checked=false
	document.form1.jubilacioninstitucion.checked=false
	document.form1.jubilaciontotal.checked=false
	document.form1.permisos.checked=false
	document.form1.estudios.checked=false
	document.form1.movimiento.checked=false
	document.form1.dotacion.checked=false
	document.form1.anticipo.checked=false
	
	document.form1.condecoracionesgeneral.disabled=true
	document.form1.condecoracionesespecifico.disabled=true
	document.form1.antiguedad1.disabled=true
	document.form1.antiguedad2.disabled=true
	document.form1.jubilacionadministracion.disabled=true
	document.form1.jubilacioninstitucion.disabled=true
	document.form1.jubilaciontotal.disabled=true
	document.form1.antiguedad3.disabled=true
	document.form1.antiguedad4.disabled=true
	document.form1.tipos.disabled=true
	document.form1.especialidad.disabled=true
	document.form1.tipo2.disabled=true
	document.form1.cargo.disabled=true
	document.form1.entrega.disabled=true
	document.form1.fechadesde.disabled=true
	document.form1.fechahasta.disabled=true
// 	document.form1.permisoano.disabled=true
	document.form1.tipo3.disabled=true
	document.form1.fechadesdea.disabled=true
	document.form1.fechahastaa.disabled=true
	document.form1.fechadesde2.disabled=true
	document.form1.fechahasta2.disabled=true

	
}
function reporte_condecoraciones( tipo){
	if (tipo=="general"){
		document.form1.antiguedad1.disabled=false
		document.form1.antiguedad2.disabled=false
		document.form1.condecoracionesespecifico.checked=false
	}else{
		document.form1.antiguedad1.disabled=false
		document.form1.antiguedad2.disabled=false
		document.form1.condecoracionesgeneral.checked=false
	}
}
function condecoracionesseleccion(){
	document.form1.generico.checked=false
	document.form1.condecoracionesgeneral.checked=false
	document.form1.condecoracionesespecifico.checked=false
	document.form1.jubilacion.checked=false
	document.form1.jubilacionadministracion.checked=false
	document.form1.jubilacioninstitucion.checked=false
	document.form1.jubilaciontotal.checked=false
	document.form1.permisos.checked=false
	document.form1.estudios.checked=false
	document.form1.movimiento.checked=false
	document.form1.dotacion.checked=false
	document.form1.anticipo.checked=false
	
	document.form1.condecoracionesgeneral.disabled=false
	document.form1.condecoracionesespecifico.disabled=false
	document.form1.jubilacionadministracion.disabled=true
	document.form1.jubilacioninstitucion.disabled=true
	document.form1.jubilaciontotal.disabled=true
	document.form1.antiguedad3.disabled=true
	document.form1.antiguedad4.disabled=true
	document.form1.tipos.disabled=true
	document.form1.especialidad.disabled=true
	document.form1.tipo2.disabled=true
	document.form1.cargo.disabled=true
	document.form1.entrega.disabled=true
	document.form1.fechadesde.disabled=true
	document.form1.fechahasta.disabled=true
// 	document.form1.permisoano.disabled=true
	document.form1.tipo3.disabled=true
	document.form1.fechadesdea.disabled=true
	document.form1.fechahastaa.disabled=true
	document.form1.fechadesde2.disabled=true
	document.form1.fechahasta2.disabled=true
}
function reporte_jubilacion(tipo){
	if(tipo=="administracion"){
		document.form1.antiguedad3.disabled=false
		document.form1.antiguedad4.disabled=false
		document.form1.jubilacioninstitucion.checked=false
		document.form1.jubilaciontotal.checked=false
	}
	else{
		if(tipo=="institucion"){
			document.form1.antiguedad3.disabled=false
			document.form1.antiguedad4.disabled=false
			document.form1.jubilacionadministracion.checked=false
			document.form1.jubilaciontotal.checked=false	
		}else{
			document.form1.antiguedad3.disabled=false
			document.form1.antiguedad4.disabled=false
			document.form1.jubilacionadministracion.checked=false
			document.form1.jubilacioninstitucion.checked=false
		}
	}
}
function jubilacionseleccion(){
	document.form1.generico.checked=false
	document.form1.condecoraciones.checked=false
	document.form1.condecoracionesgeneral.checked=false
	document.form1.condecoracionesespecifico.checked=false
	document.form1.jubilacionadministracion.checked=false
	document.form1.jubilacioninstitucion.checked=false
	document.form1.jubilaciontotal.checked=false
	document.form1.permisos.checked=false
	document.form1.estudios.checked=false
	document.form1.movimiento.checked=false
	document.form1.dotacion.checked=false
	document.form1.anticipo.checked=false
	
	document.form1.condecoracionesgeneral.disabled=true
	document.form1.condecoracionesespecifico.disabled=true
	document.form1.antiguedad1.disabled=true
	document.form1.antiguedad2.disabled=true
	document.form1.jubilacionadministracion.disabled=false
	document.form1.jubilacioninstitucion.disabled=false
	document.form1.jubilaciontotal.disabled=false
	
	document.form1.tipos.disabled=true
	document.form1.especialidad.disabled=true
	document.form1.tipo2.disabled=true
	document.form1.cargo.disabled=true
	document.form1.entrega.disabled=true
	document.form1.fechadesde.disabled=true
	document.form1.fechahasta.disabled=true
// 	document.form1.permisoano.disabled=true
	document.form1.tipo3.disabled=true
	document.form1.fechadesdea.disabled=true
	document.form1.fechahastaa.disabled=true
	document.form1.fechadesde2.disabled=true
	document.form1.fechahasta2.disabled=true
	
}

function permisosseleccion(){
	document.form1.generico.checked=false
	document.form1.condecoraciones.checked=false
	document.form1.condecoracionesgeneral.checked=false
	document.form1.condecoracionesespecifico.checked=false
	document.form1.jubilacion.checked=false
	document.form1.jubilacionadministracion.checked=false
	document.form1.jubilacioninstitucion.checked=false
	document.form1.jubilaciontotal.checked=false
	document.form1.estudios.checked=false
	document.form1.movimiento.checked=false
	document.form1.dotacion.checked=false
	document.form1.anticipo.checked=false

	
	document.form1.condecoracionesgeneral.disabled=true
	document.form1.condecoracionesespecifico.disabled=true
	document.form1.antiguedad1.disabled=true
	document.form1.antiguedad2.disabled=true
	document.form1.jubilacionadministracion.disabled=true
	document.form1.jubilacioninstitucion.disabled=true
	document.form1.jubilaciontotal.disabled=true
	document.form1.antiguedad3.disabled=true
	document.form1.antiguedad4.disabled=true
	document.form1.tipos.disabled=false
	document.form1.especialidad.disabled=true
	document.form1.tipo2.disabled=true
	document.form1.cargo.disabled=true
	document.form1.entrega.disabled=true
	document.form1.fechadesde.disabled=true
	document.form1.fechahasta.disabled=true
// 	document.form1.permisoano.disabled=false 
	document.form1.tipo3.disabled=true
	document.form1.fechadesdea.disabled=true
	document.form1.fechahastaa.disabled=true
	document.form1.fechadesde2.disabled=false
	document.form1.fechahasta2.disabled=false
	

	
}

function estudiosseleccion(){
	document.form1.generico.checked=false
	document.form1.condecoraciones.checked=false
	document.form1.condecoracionesgeneral.checked=false
	document.form1.condecoracionesespecifico.checked=false
	document.form1.jubilacion.checked=false
	document.form1.jubilacionadministracion.checked=false
	document.form1.jubilacioninstitucion.checked=false
	document.form1.jubilaciontotal.checked=false
	document.form1.permisos.checked=false
	document.form1.movimiento.checked=false
	document.form1.dotacion.checked=false
	document.form1.anticipo.checked=false

	
	document.form1.condecoracionesgeneral.disabled=true
	document.form1.condecoracionesespecifico.disabled=true
	document.form1.antiguedad1.disabled=true
	document.form1.antiguedad2.disabled=true
	document.form1.jubilacionadministracion.disabled=true
	document.form1.jubilacioninstitucion.disabled=true
	document.form1.jubilaciontotal.disabled=true
	document.form1.antiguedad3.disabled=true
	document.form1.antiguedad4.disabled=true
	document.form1.tipos.disabled=true
	document.form1.especialidad.disabled=false
	document.form1.tipo2.disabled=false
	document.form1.cargo.disabled=true
	document.form1.entrega.disabled=true
	document.form1.fechadesde.disabled=true
	document.form1.fechahasta.disabled=true
// 	document.form1.permisoano.disabled=true
	document.form1.tipo3.disabled=true
	document.form1.fechadesdea.disabled=true
	document.form1.fechahastaa.disabled=true
	document.form1.fechadesde2.disabled=true
	document.form1.fechahasta2.disabled=true

	
}
function anticiposeleccion(){
	document.form1.generico.checked=false
	document.form1.condecoraciones.checked=false
	document.form1.condecoracionesgeneral.checked=false
	document.form1.condecoracionesespecifico.checked=false
	document.form1.jubilacion.checked=false
	document.form1.jubilacionadministracion.checked=false
	document.form1.jubilacioninstitucion.checked=false
	document.form1.jubilaciontotal.checked=false
	document.form1.permisos.checked=false
	document.form1.estudios.checked=false
	document.form1.dotacion.checked=false
	document.form1.movimiento.checked=false
	
	document.form1.condecoracionesgeneral.disabled=true
	document.form1.condecoracionesespecifico.disabled=true
	document.form1.antiguedad1.disabled=true
	document.form1.antiguedad2.disabled=true
	document.form1.jubilacionadministracion.disabled=true
	document.form1.jubilacioninstitucion.disabled=true
	document.form1.jubilaciontotal.disabled=true
	document.form1.antiguedad3.disabled=true
	document.form1.antiguedad4.disabled=true
	document.form1.tipos.disabled=true
	document.form1.especialidad.disabled=true
	document.form1.tipo2.disabled=true
	document.form1.cargo.disabled=true
	document.form1.entrega.disabled=true
	document.form1.fechadesde.disabled=true
	document.form1.fechahasta.disabled=true
// 	document.form1.permisoano.disabled=true
	document.form1.tipo3.disabled=true
	document.form1.fechadesdea.disabled=false
	document.form1.fechahastaa.disabled=false
	document.form1.fechadesde2.disabled=true
	document.form1.fechahasta2.disabled=true

	
}
function movimientoseleccion(){
	document.form1.generico.checked=false
	document.form1.condecoraciones.checked=false
	document.form1.condecoracionesgeneral.checked=false
	document.form1.condecoracionesespecifico.checked=false
	document.form1.jubilacion.checked=false
	document.form1.jubilacionadministracion.checked=false
	document.form1.jubilacioninstitucion.checked=false
	document.form1.jubilaciontotal.checked=false
	document.form1.permisos.checked=false
	document.form1.estudios.checked=false
	document.form1.dotacion.checked=false
	document.form1.anticipo.checked=false

	document.form1.condecoracionesgeneral.disabled=true
	document.form1.condecoracionesespecifico.disabled=true
	document.form1.antiguedad1.disabled=true
	document.form1.antiguedad2.disabled=true
	document.form1.jubilacionadministracion.disabled=true
	document.form1.jubilacioninstitucion.disabled=true
	document.form1.jubilaciontotal.disabled=true
	document.form1.antiguedad3.disabled=true
	document.form1.antiguedad4.disabled=true
	document.form1.tipos.disabled=true
	document.form1.especialidad.disabled=true
	document.form1.tipo2.disabled=true
	document.form1.cargo.disabled=true
	document.form1.entrega.disabled=true
	document.form1.fechadesde.disabled=true
	document.form1.fechahasta.disabled=true
// 	document.form1.permisoano.disabled=true
	
	document.form1.fechadesdea.disabled=true
	document.form1.fechahastaa.disabled=true
	document.form1.fechadesde2.disabled=true
	document.form1.fechahasta2.disabled=true
	document.form1.tipo3.disabled=false

	
}

function dotacionseleccion(){
	document.form1.generico.checked=false
	document.form1.condecoraciones.checked=false
	document.form1.condecoracionesgeneral.checked=false
	document.form1.condecoracionesespecifico.checked=false
	document.form1.jubilacion.checked=false
	document.form1.jubilacionadministracion.checked=false
	document.form1.jubilacioninstitucion.checked=false
	document.form1.jubilaciontotal.checked=false
	document.form1.permisos.checked=false
	document.form1.estudios.checked=false
	document.form1.movimiento.checked=false
	document.form1.anticipo.checked=false

	document.form1.condecoracionesgeneral.disabled=true
	document.form1.condecoracionesespecifico.disabled=true
	document.form1.antiguedad1.disabled=true
	document.form1.antiguedad2.disabled=true
	document.form1.jubilacionadministracion.disabled=true
	document.form1.jubilacioninstitucion.disabled=true
	document.form1.jubilaciontotal.disabled=true
	document.form1.antiguedad3.disabled=true
	document.form1.antiguedad4.disabled=true
	document.form1.tipos.disabled=true
	document.form1.especialidad.disabled=true
	document.form1.tipo2.disabled=true
	document.form1.cargo.disabled=false
	document.form1.entrega.disabled=false
	document.form1.fechadesde.disabled=false
	document.form1.fechahasta.disabled=false
// 	document.form1.permisoano.disabled=true
	document.form1.tipo3.disabled=true
	document.form1.fechadesdea.disabled=true
	document.form1.fechahastaa.disabled=true
	document.form1.fechadesde2.disabled=true
	document.form1.fechahasta2.disabled=true

	
}
function AbrirReporteGenerico()
{
	
	if (document.form1.generico.checked==true){
		
			document.form1.action="../fpdf/reporte_personal_generico.php"
			document.form1.submit();
		
	}
}

function AbrirReporteCondecoraciones()
{
	var edad1=document.getElementById("antiguedad1")
	var edad2=document.getElementById("antiguedad2")
	edad11=parseInt(edad1.value)
	edad22=parseInt(edad2.value)
	if(edad11<=edad22){
	
		if (document.form1.condecoracionesgeneral.checked==true){
			document.form1.action="../fpdf/reporte_personal_condecoracionesgeneral.php"
			document.form1.submit();
				
		}
		if (document.form1.condecoracionesespecifico.checked==true){
			document.form1.action="../fpdf/reporte_personal_condecoracionesespecifico.php"
			document.form1.submit();
				
		}
	}else{
		alert("Debe seleccionar la Antiguedad de Menor a Mayor!!")
	}

	
	
}


function AbrirReporteJubilacion()
{
	
	if (document.form1.jubilacionadministracion.checked==true){
		
			document.form1.action="../fpdf/reporte_personal_jubilacion_administracion.php"
			document.form1.submit();
		
	}
	if (document.form1.jubilacioninstitucion.checked==true){
		
			document.form1.action="../fpdf/reporte_personal_jubilacion_institucion.php"
			document.form1.submit();
		
	}
	if (document.form1.jubilaciontotal.checked==true){
		
			document.form1.action="../fpdf/reporte_personal_jubilacion_total.php?tipo=3"
			document.form1.submit();
		
	}
}

function AbrirReportePermisos()
{
	
	if (document.form1.permisos.checked==true){
		
			document.form1.action="../fpdf/reporte_personal_permisos.php"
			document.form1.submit();
		
	}
}
function AbrirReporteUniforme()
{
	if (document.form1.dotacion.checked==true){
		if(document.form1.fechadesde.value!="" && document.form1.fechahasta.value!=""){
// 			document.form1.action="../fpdf/reporte_personal_uniformes.php"
			document.form1.submit();
		}
		
	}
}

function AbrirReporteEstudios()
{
	if (document.form1.estudios.checked==true){
		document.form1.action="../fpdf/reporte_personal_estudios.php"
		document.form1.submit();
	}
}
function AbrirReporteMovimiento()
{
	if (document.form1.movimiento.checked==true){
		document.form1.action="../fpdf/reporte_personal_movimientos.php"
		document.form1.submit();
	}
}
function AbrirReporteAnticipo()
{
	if (document.form1.anticipo.checked==true){
		document.form1.action="../fpdf/reporte_personal_anticipo.php"
		document.form1.submit();
	}
}
function AbrirReporteUniforme()
{
	if (document.form1.dotacion.checked==true){
		document.form1.action="../fpdf/reporte_uniformes.php"
		document.form1.submit();
	}
}

</script>
<?php 
include("../lib/common.php");
include("../header.php"); 
include("func_bd.php");	
$modulo="Reportes Expediente Personal";
?>

<form id="form1" name="form1" method="post" action="">
<?
titulo($modulo,"","submenu_reportes_integrantes.php","10000");
?>
<table width="750" border="0" align="center">
	 <tr><TD height="10"></TD></tr>
	 <tr >
		<TD >
			<table  border="1" class="row-br" align="center" >
			<TR>
				
				<!--<td height="40" >Desde: 
					<SELECT name="edad1" id="edad1">
					<option value="0">0</option>
					<?for ($i=1;$i<=50;$i++){?>
						<option  value="<?echo $i;?>"><?echo $i;?></option>
					<?}?>
					
					</SELECT>
					&#160; Hasta: 
					<SELECT name="edad2" id="edad2" >
					<option value="50">50</option>
					<?for ($i=49;$i>=0;$i--){?>
						<option value="<?echo $i;?>"><?echo $i;?></option>
					<?}?>
					
					</SELECT>
					
				</td>-->
				<td>Nomina:
				<SELECT name="nomina" >
					<option  selected="true"  value="Todos">Todos</option>
			
					<?$conexion=conexion();
					$consulta="select * from nomtipos_nomina";
					$que=query($consulta,$conexion);
					while($no=fetch_array($que)){?>
						<option  value="<?echo $no['codtip'];?>"><?echo $no['descrip'];?></option>
					
					<?}?>
				</SELECT>
				</td>
				<td>Gerencia:
				<SELECT name="gerencia" >
					<option  selected="true"  value="Todos">Todos</option>
			
					<?$conexion=conexion();
					$consulta="select * from nomnivel4";
					$que=query($consulta,$conexion);
					while($no=fetch_array($que)){?>
						<option  value="<?echo $no['codorg'];?>"><?echo $no['descrip'];?></option>
					
					<?}?>
				</SELECT>
				</td>
				
			</TR>
			</table>
		</TD>
	</tr>
	<tr><TD height="10"></TD></tr>
        <tr>
          <td width="262" height="23" class="Estilo1"><label>
		&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160; &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
            <input name="generico" type="radio" value="1"  onclick="javascript:genericoseleccion()" > 
            Generico
          </label></td>
          </tr>
	 <tr><TD height="10"></TD></tr>
	<tr>
		<TD >
			<table width="400"  border="0"  align="center">
			<TR>
				<td   align="left" >
				<label><?php btn('print','AbrirReporteGenerico();',2);  ?></label>
				</td>
				<!--<td  align="center" >
				<label><?php btn('show_all','AbrirReporteActivos();',2);  ?></label>
				</td>-->
			</tr>
			</table>
		</TD>
	
	</TR>
        
	 <tr><TD height="10"></TD></tr>
        <tr>
          <td width="262" height="23" class="Estilo1"><label> &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160; &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
            <input name="condecoraciones" type="radio" value="1"  onclick="javascript:condecoracionesseleccion()" > 
           Condecoraciones
          </label></td>
          </tr>
	 <tr><TD height="10"></TD></tr>
        <tr >
		<TD >
			<table width="400"  border="0" class="row-br" align="center">
			<TR>
				<td width="200"  class="Estilo1" height="30"><label>
				<input name="condecoracionesgeneral" type="radio" value="1"  disabled="true"  onclick="javascript:reporte_condecoraciones('general')" > 
				Listado de Especifico
				</label></td>
				<td width="200"  class="Estilo1" height="30"><label>
				<input name="condecoracionesespecifico" type="radio" value="1"  disabled="true" onclick="javascript:reporte_condecoraciones('especifico')"> 
				Listado de General
				</label></td>
			</TR>

			
			<TR align="center">
				
				<td height="40" colspan="3" >&#160;Desde: 
					<SELECT name="antiguedad1" id="antiguedad1" disabled="true">
					<option value="0">0</option>
					<?for ($i=1;$i<=50;$i++){?>
						<option  value="<?echo $i;?>"><?echo $i;?></option>
					<?}?>
					
					</SELECT>
					&#160; Hasta: 
					<SELECT name="antiguedad2" id="antiguedad2"  disabled="true">
					<option value="50">50</option>
					<?for ($i=49;$i>=0;$i--){?>
						<option value="<?echo $i;?>"><?echo $i;?></option>
					<?}?>
					
					</SELECT>&#160;
					
				</td>
				
				
			</TR>
			  
			
		</table>
		
		</TD>
		
		
	</TR>
	<tr><TD></TD></tr>
	<tr>
		<TD >
			<table width="400"  border="0"  align="center">
			<TR  >
				<td  align="center" >
				<label><?php btn('print','AbrirReporteCondecoraciones();',2);  ?></label>
				</td>
				<!--<td  align="center" >
				<label><?php btn('show_all','AbrirReporteActivos();',2);  ?></label>
				</td>-->
			</tr>
			</table>
		</TD>
	
	</TR>

	<tr><TD></TD></tr>

	     <tr>
          <td width="262" height="23" class="Estilo1"><label>
		&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160; &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
            <input name="jubilacion" type="radio" value="1"  onclick="javascript:jubilacionseleccion()" > 
            Plan de Jubilación y Pensiones
          </label></td>
          </tr>
	 <tr><TD height="10"></TD></tr>
	 <tr >
		<TD >
			<table width="400"  border="0" class="row-br" align="center">
			<TR>
				<td width="200"  class="Estilo1" height="30"><label>
				<input name="jubilacionadministracion" type="radio" value="1"  disabled="true"  onclick="javascript:reporte_jubilacion('administracion')" > 
				Administración Publica
				</label></td>
				<td width="100"  class="Estilo1" height="30"><label>
				<input name="jubilacioninstitucion" type="radio" value="1"  disabled="true" onclick="javascript:reporte_jubilacion('institucion')"> 
				Institución
				</label></td>
				<td width="100"  class="Estilo1" height="30"><label>
				<input name="jubilaciontotal" type="radio" value="1"  disabled="true" onclick="javascript:reporte_jubilacion('total')"> 
				Suma Total
				</label></td>
				
			</TR>

			
			<TR align="center">
				
				<td height="40" colspan="3" >&#160;Desde: 
					<SELECT name="antiguedad3" id="antiguedad3" disabled="true">
					<option value="0">0</option>
					<?for ($i=1;$i<=50;$i++){?>
						<option  value="<?echo $i;?>"><?echo $i;?></option>
					<?}?>
					
					</SELECT>
					&#160; Hasta: 
					<SELECT name="antiguedad4" id="antiguedad4"  disabled="true">
					<option value="50">50</option>
					<?for ($i=49;$i>=0;$i--){?>
						<option value="<?echo $i;?>"><?echo $i;?></option>
					<?}?>
					
					</SELECT>&#160;
					
				</td>
				
				
			</TR>
			  
			
		</table>
		
		</TD>
		
		
	</TR>
	<tr><TD></TD></tr>
		<tr>
		<TD >
			<table width="400"  border="0"  align="center">
			<TR  >
				<td  align="center" >
				<label><?php btn('print','AbrirReporteJubilacion();',2);  ?></label>
				</td>
				<!--<td  align="center" >
				<label><?php btn('show_all','AbrirReporteActivos();',2);  ?></label>
				</td>-->
			</tr>
			</table>
		</TD>
	
	</TR>

	<tr><TD></TD></tr>

	 <tr>
          <td width="262" height="23" class="Estilo1"><label>
		&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160; &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
            <input name="permisos" type="radio" value="1"  onclick="javascript:permisosseleccion()" > 
            Permisos
          </label></td>
          </tr>
	 <tr><TD height="10"></TD></tr>
	<tr>
		<TD >
			<table width="400"  border="0" class="row-br" align="center">
			<TR>
				<td height="40" align="center">Tipos: 
						<SELECT disabled="true" name="tipos" >
							<option  selected="true"  value="Todos">Todos</option>
							<?
								$conexion=conexion();
								$consulta="select * from nomsuspenciones";
								$qs=query($consulta,$conexion);
								while($fs=fetch_array($qs)){
                                                        ?>
								<option  value="<?echo $fs['codigo'];?>"><? echo utf8_encode($fs['descrip']);?></option>
							<?}?>
						</SELECT>
						&#160;
				</td>
			</tr>
			<tr>
				<TD colspan="2" align="center"> Desde: 
					<input name="fechadesde2" type="text" id="fechadesde2"  disabled="true" style="width:100px" value="<?php echo date("d/m/Y")?>" maxlength="60">
					<input name="image2" type="image" id="d_fechanac2" src="../lib/jscalendar/cal.gif" />
					<script type="text/javascript">Calendar.setup({inputField:"fechadesde2",ifFormat:"%d/%m/%Y",button:"d_fechanac2"});</script>
	
	
					Hasta: 
					<input name="fechahasta2" type="text"  disabled="true" id="fechahasta2" style="width:100px" value="<?php echo date("d/m/Y") ?>" maxlength="60" >
					<input name="image2" type="image" id="d_fechanac22" src="../lib/jscalendar/cal.gif" />
					<script type="text/javascript">Calendar.setup({inputField:"fechahasta2",ifFormat:"%d/%m/%Y",button:"d_fechanac22"});</script>
				</TD>
			</tr>
			</table>
		</TD>
	</tr>
	<tr><TD></TD></tr>
		<tr>
		<TD >
			<table width="400"  border="0"  align="center">
			<TR  >
				<td  align="center" >
				<label><?php btn('print','AbrirReportePermisos();',2);  ?></label>
				</td>
				<!--<td  align="center" >
				<label><?php btn('show_all','AbrirReporteActivos();',2);  ?></label>
				</td>-->
			</tr>
			</table>
		</TD>
	
	</TR>
	<tr><TD></TD></tr>

	 <tr>
          <td width="262" height="23" class="Estilo1"><label>
		&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160; &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
            <input name="estudios" type="radio" value="1"  onclick="javascript:estudiosseleccion()" > 
            Estudios Extra Académicos
          </label></td>
          </tr>
	 <tr><TD height="10"></TD></tr>
	<tr>
		<TD >
			<table width="400"  border="0" class="row-br" align="center">
			<TR>
				<td height="40">&#160;&#160;Especialidad: 
						
						<SELECT disabled="true" name="especialidad" >
							<option  selected="true"  value="Todos">Todos</option>
							<?
								$conexion=conexion();
								echo $consulta="select * from nomexpediente group by nombre_especialista";
								$qs=query($consulta,$conexion);
								while($fs=fetch_array($qs)){
                                                        ?>
								<option  value="<?echo $fs['nombre_especialista'];?>"><? echo $fs['nombre_especialista'];?></option>
							<?}?>
						</SELECT>
						&#160;
				</td>
				<td height="40" >&#160;&#160;Tipo: 
						<SELECT disabled="true" name="tipo2" >
							<option  selected="true"  value="Todos">Todos</option>
							<?
								$conexion=conexion();
								$consulta="select * from nomexpediente group by tipo_estudio";
								$qs=query($consulta,$conexion);
								while($fs=fetch_array($qs)){
                                                        ?>
								<option  value="<?echo $fs['tipo_estudio'];?>"><? echo $fs['tipo_estudio'];?></option>
							<?}?>
						</SELECT>
						&#160;
				</td>
			</tr>
			</table>
		</TD>
	</tr>
	<tr><TD></TD></tr>
		<tr>
		<TD >
			<table width="400"  border="0"  align="center">
			<TR  >
				<td  align="center" >
				<label><?php btn('print','AbrirReporteEstudios();',2);  ?></label>
				</td>
				<!--<td  align="center" >
				<label><?php btn('show_all','AbrirReporteActivos();',2);  ?></label>
				</td>-->
			</tr>
			</table>
		</TD>
	
	</TR>
	<tr><TD></TD></tr>
	<tr>
          <td width="262" height="23" class="Estilo1"><label>
		&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160; &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
            <input name="movimiento" type="radio" value="1"  onclick="javascript:movimientoseleccion()" > 
            Movimientos de Personal
          </label></td>
          </tr>
	 <tr><TD height="10"></TD></tr>
	<tr><TD>
		<table width="400"  border="0" class="row-br" align="center">
			<TR>
				<td height="40" align="center">&#160;&#160;Tipo: 
						<SELECT disabled="true" name="tipo3" >
							<option  selected="true"  value="Todos">Todos</option>
							<?
								$conexion=conexion();
								$consulta="select * from nomexpediente where tipo_registro='Movimiento de Personal' group by tipo_tiporegistro";
								$qs=query($consulta,$conexion);
								while($fs=fetch_array($qs)){
                                                        ?>
								<option  value="<?echo $fs['tipo_tiporegistro'];?>"><? echo $fs['tipo_tiporegistro'];?></option>
							<?}?>
						</SELECT>
						&#160;
				</td>
			</tr>
			</table>
	</TD></tr>
	<tr>
		<TD >
			<table width="400"  border="0"  align="center">
			<TR>
				<td  align="center" >
				<label><?php btn('print','AbrirReporteMovimiento();',2);  ?></label>
				</td>
				<!--<td  align="center" >
				<label><?php btn('show_all','AbrirReporteActivos();',2);  ?></label>
				</td>-->
			</tr>
			</table>
		</TD>
	
	</TR>
	<tr>
          <td width="262" height="23" class="Estilo1"><label>
		&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160; &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
            <input name="anticipo" type="radio" value="1"  onclick="javascript:anticiposeleccion()" > 
            Anticipo de Prestaciones Sociales
          </label></td>
          </tr>
	 <tr><TD height="10"></TD></tr>
	<tr>
		<TD >
			<table width="400"  border="0" class="row-br" align="center">
			<tr>
			<TD colspan="2" align="center"> Desde: 
				<input name="fechadesdea" type="text" id="fechadesdea"  disabled="true" style="width:100px" value="<?php echo date("d/m/Y")?>" maxlength="60">
          			<input name="image2" type="image" id="d_fechanaca" src="../lib/jscalendar/cal.gif" />
 				 <script type="text/javascript">Calendar.setup({inputField:"fechadesdea",ifFormat:"%d/%m/%Y",button:"d_fechanaca"});</script>


				Hasta: 
				<input name="fechahastaa" type="text"  disabled="true" id="fechahastaa" style="width:100px" value="<?php echo date("d/m/Y") ?>" maxlength="60" >
          			<input name="image2" type="image" id="d_fechanaca2" src="../lib/jscalendar/cal.gif" />
 				 <script type="text/javascript">Calendar.setup({inputField:"fechahastaa",ifFormat:"%d/%m/%Y",button:"d_fechanaca2"});</script>
				</TD>
			</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td >
			<table width="400"  border="0"  align="center">
			<TR>
				<td   align="center">
				<label><?php btn('print','AbrirReporteAnticipo();',2);  ?></label>
				</td>
				<!--<td  align="center" >
				<label><?php btn('show_all','AbrirReporteActivos();',2);  ?></label>
				</td>-->
			</tr>
			</table>
		</TD>
	
	</TR>
	<tr>
          <td width="262" height="23" class="Estilo1"><label>
		&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160; &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
            <input name="dotacion" type="radio" value="1"  onclick="javascript:dotacionseleccion()" > 
            Dotacion de Uniformes
          </label></td>
          </tr>
	<tr><TD height="10"></TD></tr>
	<tr>
		<TD >
			<table width="400"  border="0" class="row-br" align="center">
			<TR>
				<td height="40" align="center">Cargos: 
						<SELECT disabled="true" name="cargo" >
							<option  selected="true"  value="Todos">Todos</option>
							<?
								$conexion=conexion();
								$consulta="select * from nomcargos";
								$qs=query($consulta,$conexion);
								while($fs=fetch_array($qs)){
                                                        ?>
								<option  value="<?echo $fs['cod_car'];?>"><? echo $fs['des_car'];?></option>
							<?}?>
						</SELECT>
						&#160;
						</td>
				<td height="40" align="center">Entregado: 
					<SELECT disabled="true" name="entrega" >
						<option  selected="true"  value="Si">Si</option>
						<option    value="No">No</option>
						&#160;
						</td>
			</tr>
			<tr><TD colspan="2" align="center"> Desde: 
				<input name="fechadesde" type="text" id="fechadesde"  disabled="true" style="width:100px" value="<?php echo date("d/m/Y")?>" maxlength="60">
          			<input name="image2" type="image" id="d_fechanac" src="../lib/jscalendar/cal.gif" />
 				 <script type="text/javascript">Calendar.setup({inputField:"fechadesde",ifFormat:"%d/%m/%Y",button:"d_fechanac"});</script>


				Hasta: 
				<input name="fechahasta" type="text"  disabled="true" id="fechahasta" style="width:100px" value="<?php echo date("d/m/Y") ?>" maxlength="60" >
          			<input name="image222" type="image" id="d_fechanac222" src="../lib/jscalendar/cal.gif" />
 				 <script type="text/javascript">Calendar.setup({inputField:"fechahasta",ifFormat:"%d/%m/%Y",button:"d_fechanac222"});</script>
				</TD></tr>
			</table>
		</TD>
	</tr>
	<tr><TD></TD></tr>
		<tr>
		<TD >
			<table width="400"  border="0"  align="center">
			<TR  >
				<td  align="center" >
				<label><?php btn('print','AbrirReporteUniforme();',2);  ?></label>
				</td>
				<!--<td  align="center" >
				<label><?php btn('show_all','AbrirReporteActivos();',2);  ?></label>
				</td>-->
			</tr>
			</table>
		</TD>
	
	</TR>
</table>

</form>
</body>
</html>
