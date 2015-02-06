<?php 
session_start();
ob_start();
?>
<script>


function genericoseleccion(){
	document.form1.jamones.checked=false
	document.form1.ayuda.checked=false
	document.form1.visita.checked=false
	document.form1.madre.checked=false
}

function jamonesseleccion(){
	document.form1.generico.checked=false
	document.form1.ayuda.checked=false
	document.form1.visita.checked=false
	document.form1.madre.checked=false
}

function ayudaseleccion(){
	document.form1.generico.checked=false
	document.form1.jamones.checked=false
	document.form1.visita.checked=false
	document.form1.madre.checked=false
}

function visitaseleccion(){
	document.form1.generico.checked=false
	document.form1.jamones.checked=false
	document.form1.ayuda.checked=false
	document.form1.madre.checked=false
}
function madreseleccion(){
	document.form1.generico.checked=false
	document.form1.jamones.checked=false
	document.form1.ayuda.checked=false
	document.form1.visita.checked=false
}
function AbrirReporteGenerico()
{
	
	if (document.form1.generico.checked==true){
		
			document.form1.action="../fpdf/reporte_personal_generico.php?inicio="+document.getElementById('txtFechaIni').value+"&fin="+document.getElementById('txtFechaFin').value;
			document.form1.submit();
		
	}
}
function AbrirReporteMadre()
{
	
	if (document.form1.madre.checked==true){
		
			document.form1.action="../fpdf/reporte_personal_madre.php"
			document.form1.submit();
		
	}
}
function AbrirReporteJamones()
{
	
	if (document.form1.jamones.checked==true){
		
			document.form1.action="../fpdf/reporte_personal_jamones.php"
			document.form1.submit();
		
	}
}


function AbrirReporteAyuda()
{
	
	if (document.form1.ayuda.checked==true){
		
			document.form1.action="../fpdf/reporte_personal_ayuda.php"
			document.form1.submit();
		
	}
}

function AbrirReporteVisita()
{
	
	if (document.form1.visita.checked==true){
		
			document.form1.action="../fpdf/reporte_personal_visita.php"
			document.form1.submit();
		
	}
}





</script>
<?php 
include("../lib/common.php");
include("../header.php"); 
include("func_bd.php");	
$modulo="Reportes Personal";
?>

<form id="form1" name="form1" method="post" action="">
<?
titulo($modulo,"","submenu_reportes_integrantes.php","21");
?>
<table width="850" border="0" align="center">
	 <tr><TD height="10"></TD></tr>
	 <tr >
		<TD >
			<table  border="1" class="row-br" align="center" >
			<TR>
				
				<td height="40" >Desde: 
					 <input name="txtFechaIni" type="text" id="txtFechaIni" style="width:100px" value="<?php echo $_POST['txtFechaIni']; ?>" maxlength="60" onblur="javascript:actualizar('txtFechaIni','fila_edad');">
          				<input name="image2" type="image" id="d_fechaini" src="../lib/jscalendar/cal.gif" />
  					<script type="text/javascript">Calendar.setup({inputField:"txtFechaIni",ifFormat:"%d/%m/%Y",button:"d_fechaini"});</script>
          				</font>
					&#160; Hasta: 
					<input name="txtFechaFin" type="text" id="txtFechaFin" style="width:100px" value="<?php echo $_POST['txtFechaFin']; ?>" maxlength="60" onblur="javascript:actualizar('txtFechaFin','fila_edad');">
          				<input name="image2" type="image" id="d_fechafin" src="../lib/jscalendar/cal.gif" />
  					<script type="text/javascript">Calendar.setup({inputField:"txtFechaFin",ifFormat:"%d/%m/%Y",button:"d_fechafin"});</script>
          				</font>					
				</td>
				<td>Nomina:
				<SELECT name="nomina" id="nomina" >
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
        
	<tr><TD></TD></tr>

	     <tr>
          <td width="262" height="23" class="Estilo1"><label>
		&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160; &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
            <input name="jamones" type="radio" value="1"  onclick="javascript:jamonesseleccion()" > 
            Jamones
          </label></td>
          </tr>
	 <tr><TD height="10"></TD></tr>
	<tr>
		<TD >
			<table width="400"  border="0"  align="center">
			<TR>
				<td  align="left" >
				<label><?php btn('print','AbrirReporteJamones();',2);  ?></label>
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
            <input name="ayuda" type="radio" value="1"  onclick="javascript:ayudaseleccion()" > 
            Ayuda Económica
          </label></td>
          </tr>
	 <tr><TD height="10"></TD></tr>
	<tr>
		<TD >
			<table width="400"  border="0"  align="center">
			<TR>
				<td  align="left" >
				<label><?php btn('print','AbrirReporteAyuda();',2);  ?></label>
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
            <input name="visita" type="radio" value="1"  onclick="javascript:visitaseleccion()" > 
            Visitas Sociales
          </label></td>
          </tr>
	 <tr><TD height="10"></TD></tr>
	<tr>
		<TD >
			<table width="400"  border="0"  align="center">
			<TR>
				<td  align="left" >
				<label><?php btn('print','AbrirReporteVisita();',2);  ?></label>
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
            <input name="madre" type="radio" value="1"  onclick="javascript:madreseleccion()" > 
            Madres
          </label></td>
          </tr>
	 <tr><TD height="10"></TD></tr>
	<tr>
		<TD >
			<table width="400"  border="0"  align="center">
			<TR>
				<td  align="left" >
				<label><?php btn('print','AbrirReporteMadre();',2);  ?></label>
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
