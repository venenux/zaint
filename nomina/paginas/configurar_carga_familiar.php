<?php 
session_start();
ob_start();
?>
<script>
function genericoseleccion(){
	document.form1.guarderiatrabajadores.disabled=true
	document.form1.guarderiahijos.disabled=true


	//deshabilitar checked
	document.form1.utiles.checked=false
	document.form1.pvacacional.checked=false
	document.form1.juguetes.checked=false
	document.form1.fiesta.checked=false
	document.form1.becas.checked=false
	document.form1.hcm.checked=false
	document.form1.guarderia.checked=false

	document.form1.niveledu.disabled=true
	document.form1.niveledu2.disabled=true
	document.form1.afiliado.disabled=true

	
	
}
function guarderiaseleccion(){
	document.form1.guarderiatrabajadores.disabled=false
	document.form1.guarderiahijos.disabled=false


	//deshabilitar checked
	document.form1.utiles.checked=false
	document.form1.pvacacional.checked=false
	document.form1.juguetes.checked=false
	document.form1.fiesta.checked=false
	document.form1.becas.checked=false
	document.form1.hcm.checked=false
	document.form1.generico.checked=false
	document.form1.niveledu.disabled=true
	document.form1.afiliado.disabled=true
	document.form1.niveledu2.disabled=true

	
	
}

function reporte_guarderia(tipo){
	if(tipo=="trabajadores"){
		document.form1.guarderiahijos.checked=false
		document.form1.tipoguarderia.disabled=false
		document.form1.edad1.disabled=true
		document.form1.edad2.disabled=true
	}else{
		document.form1.guarderiatrabajadores.checked=false
		document.form1.edad1.disabled=false
		document.form1.edad2.disabled=false
		document.form1.tipoguarderia.disabled=true
	}

}


function AbrirReporteActivos()
{
	var edad1=document.getElementById("edad1")
	var edad2=document.getElementById("edad2")
	edad11=parseInt(edad1.value)
	edad22=parseInt(edad2.value)
	if (document.form1.guarderia.checked==true){
		if (document.form1.guarderiatrabajadores.checked==true){
			document.form1.action="../fpdf/reporte_guarderia_trabajadores.php"
			document.form1.submit();
		}
		if(document.form1.guarderiahijos.checked==true){
			if(edad11<=edad22){
				document.form1.action="../fpdf/reporte_guarderia_hijos.php"
				document.form1.submit();
				
			}
			else{
				alert("Debe seleccionar la edad de menor a mayor!!")
			}
		}
		
	}

//AbrirVentana('rpt_personal_activos.php?tipo='+tipo_reporte,660,800,0);

}

function utilesseleccion(){
	
	document.form1.guarderia.checked=false
	document.form1.pvacacional.checked=false
	document.form1.juguetes.checked=false
	document.form1.fiesta.checked=false
	document.form1.becas.checked=false
	document.form1.hcm.checked=false
	document.form1.generico.checked=false
	
	document.form1.guarderiatrabajadores.disabled=true
	document.form1.guarderiatrabajadores.checked=false
	document.form1.guarderiahijos.checked=false
	document.form1.guarderiahijos.disabled=true
	document.form1.tipoguarderia.disabled=true
	document.form1.niveledu.disabled=false
	document.form1.afiliado.disabled=true
	document.form1.edad1.disabled=false
	document.form1.edad2.disabled=false
	document.form1.niveledu2.disabled=true
	
}

function vacacionalseleccion(){
	

	
	document.form1.guarderiatrabajadores.disabled=true
	document.form1.guarderiatrabajadores.checked=false
	document.form1.guarderiahijos.checked=false
	document.form1.guarderiahijos.disabled=true
	document.form1.tipoguarderia.disabled=true
	document.form1.edad1.disabled=false
	document.form1.edad2.disabled=false

	document.form1.guarderia.checked=false
	document.form1.utiles.checked=false
	document.form1.juguetes.checked=false
	document.form1.fiesta.checked=false
	document.form1.becas.checked=false
	document.form1.hcm.checked=false
	document.form1.generico.checked=false
	
	document.form1.niveledu.disabled=true
	document.form1.afiliado.disabled=true
	document.form1.niveledu2.disabled=true
}
function juguetesseleccion(){
	

	
	document.form1.guarderiatrabajadores.disabled=true
	document.form1.guarderiatrabajadores.checked=false
	document.form1.guarderiahijos.checked=false
	document.form1.guarderiahijos.disabled=true
	document.form1.tipoguarderia.disabled=true
	document.form1.edad1.disabled=false
	document.form1.edad2.disabled=false

	document.form1.guarderia.checked=false
	document.form1.utiles.checked=false
	document.form1.pvacacional.checked=false
	document.form1.fiesta.checked=false
	document.form1.becas.checked=false
	document.form1.hcm.checked=false
	document.form1.generico.checked=false
	
	document.form1.niveledu.disabled=true
	document.form1.afiliado.disabled=true
	document.form1.niveledu2.disabled=true
}
function fiestaseleccion(){
	

	
	document.form1.guarderiatrabajadores.disabled=true
	document.form1.guarderiatrabajadores.checked=false
	document.form1.guarderiahijos.checked=false
	document.form1.guarderiahijos.disabled=true
	document.form1.tipoguarderia.disabled=true
	document.form1.edad1.disabled=false
	document.form1.edad2.disabled=false

	document.form1.guarderia.checked=false
	document.form1.utiles.checked=false
	document.form1.pvacacional.checked=false
	document.form1.juguetes.checked=false
	document.form1.becas.checked=false
	document.form1.hcm.checked=false
	document.form1.generico.checked=false
	
	document.form1.niveledu.disabled=true
	document.form1.afiliado.disabled=true
	document.form1.niveledu2.disabled=true
}
function becasseleccion(){
	

	
	document.form1.guarderiatrabajadores.disabled=true
	document.form1.guarderiatrabajadores.checked=false
	document.form1.guarderiahijos.checked=false
	document.form1.guarderiahijos.disabled=true
	document.form1.tipoguarderia.disabled=true
	document.form1.edad1.disabled=false
	document.form1.edad2.disabled=false

	document.form1.guarderia.checked=false
	document.form1.utiles.checked=false
	document.form1.pvacacional.checked=false
	document.form1.juguetes.checked=false
	document.form1.fiesta.checked=false
	document.form1.hcm.checked=false
	document.form1.generico.checked=false
	
	document.form1.niveledu.disabled=true
	document.form1.afiliado.disabled=true
	document.form1.niveledu2.disabled=false
}
function hcmseleccion(){
	

	
	document.form1.guarderiatrabajadores.disabled=true
	document.form1.guarderiatrabajadores.checked=false
	document.form1.guarderiahijos.checked=false
	document.form1.guarderiahijos.disabled=true
	document.form1.tipoguarderia.disabled=true
	document.form1.edad1.disabled=true
	document.form1.edad2.disabled=true

	document.form1.guarderia.checked=false
	document.form1.utiles.checked=false
	document.form1.pvacacional.checked=false
	document.form1.juguetes.checked=false
	document.form1.fiesta.checked=false
	document.form1.becas.checked=false
	document.form1.generico.checked=false
	
	document.form1.niveledu.disabled=true
	document.form1.afiliado.disabled=false
	document.form1.niveledu2.disabled=true
}
function AbrirReporteGenerico()
{
	var edad1=document.getElementById("edad1")
	var edad2=document.getElementById("edad2")
	edad11=parseInt(edad1.value)
	edad22=parseInt(edad2.value)
	
	if (document.form1.generico.checked==true)
	{
		if(edad11<=edad22){
			document.form1.action="../fpdf/reporte_generico_cargafamiliar.php"
			document.form1.submit();
		}
		else{
			alert("Debe seleccionar la edad de menor a mayor!!")
		}
	}
}

function AbrirReporteUtiles()
{
	var edad1=document.getElementById("edad1")
	var edad2=document.getElementById("edad2")
	edad11=parseInt(edad1.value)
	edad22=parseInt(edad2.value)
	
	if (document.form1.utiles.checked==true)
	{
		if(edad11<=edad22){
			document.form1.action="../fpdf/reporte_utiles_hijos.php"
			document.form1.submit();
		}
		else{
			alert("Debe seleccionar la edad de menor a mayor!!")
		}
	}
}
function AbrirReporteVacacional()
{
	var edad1=document.getElementById("edad1")
	var edad2=document.getElementById("edad2")
	edad11=parseInt(edad1.value)
	edad22=parseInt(edad2.value)
	if (document.form1.pvacacional.checked==true){
		if(edad11<= edad22){
			document.form1.action="../fpdf/reporte_vacacional_hijos.php"
			document.form1.submit();
		}
		else{
			alert("Debe seleccionar la edad de menor a mayor!!")
		}
	}
}
function AbrirReporteJuguetes()
{
	var edad1=document.getElementById("edad1")
	var edad2=document.getElementById("edad2")
	edad11=parseInt(edad1.value)
	edad22=parseInt(edad2.value)
	if (document.form1.juguetes.checked==true){
		if(edad11<= edad22){
			document.form1.action="../fpdf/reporte_juguetes.php"
			document.form1.submit();
		}
		else{
			alert("Debe seleccionar la edad de menor a mayor!!")
		}
	}
}
function AbrirReporteFiesta()
{
	var edad1=document.getElementById("edad1")
	var edad2=document.getElementById("edad2")
	edad11=parseInt(edad1.value)
	edad22=parseInt(edad2.value)
	if (document.form1.fiesta.checked==true){
		if(edad11<= edad22){
			document.form1.action="../fpdf/reporte_fiesta.php"
			document.form1.submit();
		}
		else{
			alert("Debe seleccionar la edad de menor a mayor!!")
		}
	}
}
function AbrirReporteBecas()
{
	var edad1=document.getElementById("edad1")
	var edad2=document.getElementById("edad2")
	edad11=parseInt(edad1.value)
	edad22=parseInt(edad2.value)
	
	if (document.form1.becas.checked==true){
		if(edad11<= edad22){
			document.form1.action="../fpdf/reporte_becas.php"
			document.form1.submit();
		}else{
			alert("Debe seleccionar la edad de menor a mayor!!")
		}
		
		
	}
}
function AbrirReporteHcm()
{
	
	if (document.form1.hcm.checked==true){
		
			document.form1.action="../fpdf/reporte_hcm.php"
			document.form1.submit();
		
		
		
	}
}
</script>
<?php 
include("../lib/common.php");
include("../header.php"); 
include("func_bd.php");	
$modulo="Reportes Carga Familiar";
?>

<form id="form1" name="form1" method="post" action="">
<?
titulo($modulo,"","submenu_reportes_integrantes.php","21");
?>
<table width="800" border="0" align="center">
	 <tr><TD height="10"></TD></tr>
	 <tr >
		<TD >
			<table  border="1" class="row-br" >
			<TR>
				<?
				$conexion=conexion();
				$consulta="Select * from nomparentescos";
				$q=query($consulta,$conexion);
				?>
				<td height="40" > Parentesco: 
					<SELECT name="parentesco" >
					<option  selected="true"  value="Todos">Todos</option>
					<? while ($paren=fetch_array($q)){?>
						<option  value="<?echo $paren['codorg'];?>"><?echo $paren['descrip'];?></option>
					<?}?>
					
					</SELECT>
					
				</td>
				<td height="40" >&#160;Desde: 
					<SELECT name="edad1" id="edad1">
					<option value="0">0</option>
					<?for ($i=1;$i<=80;$i++){?>
						<option  value="<?echo $i;?>"><?echo $i;?></option>
					<?}?>
					
					</SELECT>
					&#160; Hasta: 
					<SELECT name="edad2" id="edad2" >
					<option value="100">100</option>
					<?for ($i=99;$i>=0;$i--){?>
						<option value="<?echo $i;?>"><?echo $i;?></option>
					<?}?>
					
					</SELECT>&#160;
					
				</td>
				<td height="40">&#160;Sexo: 
				<SELECT name="sexo" >
					<option  selected="true"  value="Todos">Todos</option>
					
					<option  value="Femenino">Femenino</option>
					<option  value="Masculino">Masculino</option>
				</SELECT>
				&#160;
				</td>
				<td height="40">&#160;Nomina: 
				<SELECT name="nomina" >
					<option  selected="true"  value="Todos">Todos</option>
					<?$consulta="select * from nomtipos_nomina";
					$que=query($consulta,$conexion);
					while($no=fetch_array($que)){?>
						<option  value="<?echo $no['codtip'];?>"><?echo $no['descrip'];?></option>
					
					<?}?>
				</SELECT>
				&#160;
				</td>
			</TR>
			</table>
		</TD>
	</tr>
	<tr><TD></TD></tr>
	 <tr>
          <td width="262" height="23" class="Estilo1"><label> &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160; &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
            <input name="generico" type="radio" value="1"  onclick="javascript:genericoseleccion()" > 
           Generico
          </label></td>
          </tr>
	<tr><TD></TD></tr>
	<TR >
		<TD >
			<table width="400"  border="0"  align="center">
			<TR>
				<td  align="center" >
				<label><?php btn('print','AbrirReporteGenerico();',2);  ?></label>
				</td>
				<td  align="center" >
				<label><?php btn('show_all','AbrirReporteActivos();',2);  ?></label>
				</td>
			</tr>
			</table>
		</TD>
	
	</TR>
        <tr><TD height="10"></TD></tr>
        <tr>
          <td width="262" height="23" class="Estilo1"><label> &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160; &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
            <input name="guarderia" type="radio" value="1"  onclick="javascript:guarderiaseleccion()" > 
           Guarderías
          </label></td>
          </tr>
	 <tr><TD height="10"></TD></tr>
        <tr >
		<TD >
			<table width="400"  border="0" class="row-br" align="center">
			<TR>
				<td width="200"  class="Estilo1" height="30"><label>
				<input name="guarderiahijos" type="radio" value="1"  disabled="true"  onclick="javascript:reporte_guarderia('hijos')" > 
				Listado de Hijos
				</label></td>
				<td width="200"  class="Estilo1" height="30"><label>
				<input name="guarderiatrabajadores" type="radio" value="1"  disabled="true" onclick="javascript:reporte_guarderia('trabajadores')"> 
				Listado de Trabajadores
				</label></td>
			</TR>

			
			<TR>
				
				<td > 
					
				</td>
				<td align="center">
					<SELECT name="tipoguarderia" disabled="true">
					<option  selected="true"  value="Todos">Todos</option>
					<?  $conexion=conexion();	
						$consulta="Select * from nomguarderias ORDER BY descrip";
					    $sql=query($consulta,$conexion);
						if (num_rows($sql)!=0){
					   		 while($fila=fetch_array($sql)){
							?>
								
								<option  value="<?echo $fila['codorg']?>"><? echo $fila['descrip']?></option>
							<?   }   
						}?>
					
					</SELECT>
				
				</td>
				
				
			</TR>
			  
			
		</table>
		
		</TD>
		
		
	</TR>
	<TR >
		<TD >
			<table width="400"  border="0"  align="center">
			<TR>
				<td  align="center" >
				<label><?php btn('print','AbrirReporteActivos();',2);  ?></label>
				</td>
				<td  align="center" >
				<label><?php btn('show_all','AbrirReporteActivos();',2);  ?></label>
				</td>
			</tr>
			</table>
		</TD>
	
	</TR>
	<tr><TD></TD></tr>
	 <tr>
          <td width="262" height="23" class="Estilo1"><label>
		&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160; &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
            <input name="utiles" type="radio" value="1"  onclick="javascript:utilesseleccion()" > 
            Dotación de Textos y Utiles Escolares
          </label></td>
          </tr>
	<tr><TD></TD></tr>
	<tr>
		<TD >
			<table width="400"  border="0" class="row-br" align="center">
			<TR>
				<td height="40" align="center">Nivel Educativo: 
						<SELECT disabled="true" name="niveledu" >
							<option  selected="true"  value="Todos">Todos</option>
							
							<option  value="Prescolar">Prescolar</option>
							<option  value="Primaria">Primaria</option>
							<option  value="Basica">Basica</option>
							<option  value="Diversificado">Diversificado</option>
							<option  value="Universitario">Universitario</option>
						</SELECT>
						&#160;
						</td>
			</tr>
			</table>
		</TD>
	</tr>
	<tr>
		<TD >
			<table width="400"  border="0"  align="center">
			<TR>
				<td  align="center" >
				<label><?php btn('print','AbrirReporteUtiles();',2);  ?></label>
				</td>
				<td  align="center" >
				<label><?php btn('show_all','AbrirReporteActivos();',2);  ?></label>
				</td>
			</tr>
			</table>
		</TD>
	
	</TR>
	<tr><TD></TD></tr>
	<tr>
          <td width="262" height="23" class="Estilo1"><label>
		&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160; &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
            <input name="pvacacional" type="radio" value="1"  onclick="javascript:vacacionalseleccion()" > 
            Plan Vacacional
          </label></td>
          </tr>
	<tr><TD></TD></tr>
	<tr>
		<TD >
			<table width="400"  border="0"  align="center">
			<TR>
				<td  align="center" >
				<label><?php btn('print','AbrirReporteVacacional();',2);  ?></label>
				</td>
				<td  align="center" >
				<label><?php btn('show_all','AbrirReporteActivos();',2);  ?></label>
				</td>
			</tr>
			</table>
		</TD>
	
	</TR>
	
	<tr><TD></TD></tr>
	<tr>
          <td width="262" height="23" class="Estilo1"><label>
		&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160; &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
            <input name="juguetes" type="radio" value="1"  onclick="javascript:juguetesseleccion()" > 
            Juguetes
          </label></td>
          </tr>
	<tr><TD></TD></tr>
	<tr>
		<TD >
			<table width="400"  border="0"  align="center">
			<TR>
				<td  align="center" >
				<label><?php btn('print','AbrirReporteJuguetes();',2);  ?></label>
				</td>
				<td  align="center" >
				<label><?php btn('show_all','AbrirReporteActivos();',2);  ?></label>
				</td>
			</tr>
			</table>
		</TD>
	
	</TR>
	<tr><TD></TD></tr>
	<tr>
          <td width="262" height="23" class="Estilo1"><label>
		&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160; &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
            <input name="fiesta" type="radio" value="1"  onclick="javascript:fiestaseleccion()" > 
            Fiesta Navideña
          </label></td>
          </tr>
	<tr><TD></TD></tr>
	<tr>
		<TD >
			<table width="400"  border="0"  align="center">
			<TR>
				<td  align="center" >
				<label><?php btn('print','AbrirReporteFiesta();',2);  ?></label>
				</td>
				<td  align="center" >
				<label><?php btn('show_all','AbrirReporteActivos();',2);  ?></label>
				</td>
			</tr>
			</table>
		</TD>
	
	</TR>
	<tr><TD></TD></tr>
	<tr>
          <td width="262" height="23" class="Estilo1"><label>
		&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160; &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
            <input name="becas" type="radio" value="1"  onclick="javascript:becasseleccion()" > 
            Becas
          </label></td>
          </tr>
	<tr><TD></TD></tr>
	<tr>
		<TD >
			<table width="400"  border="0" class="row-br" align="center">
			<TR>
				<td height="40" align="center">Nivel Educativo: 
						<SELECT disabled="true" name="niveledu2" >
							<option  selected="true"  value="Todos">Todos</option>
							
							<option  value="Prescolar">Prescolar</option>
							<option  value="Primaria">Primaria</option>
							<option  value="Basica">Basica</option>
							<option  value="Diversificado">Diversificado</option>
							<option  value="Universitario">Universitario</option>
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
			<TR>
				<td  align="center" >
				<label><?php btn('print','AbrirReporteBecas();',2);  ?></label>
				</td>
				<td  align="center" >
				<label><?php btn('show_all','AbrirReporteActivos();',2);  ?></label>
				</td>
			</tr>
			</table>
		</TD>
	
	</TR>
	<tr><TD></TD></tr>
	<tr>
          <td width="262" height="23" class="Estilo1"><label>
		&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160; &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
            <input name="hcm" type="radio" value="1"  onclick="javascript:hcmseleccion()" > 
            HCM
          </label></td>
          </tr>
	<tr><TD></TD></tr>
	<tr>
		<TD >
			<table width="400"  border="0" class="row-br" align="center">
			<TR>
				<td height="40" align="center">Afiliado: 
						<SELECT disabled="true" name="afiliado" >
							<option  selected="true"  value="Todos">Todos</option>
							
							<option  value="Si">Si</option>
							<option  value="No">No</option>
							
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
			<TR>
				<td  align="center" >
				<label><?php btn('print','AbrirReporteHcm();',2);  ?></label>
				</td>
				<td  align="center" >
				<label><?php btn('show_all','AbrirReporteActivos();',2);  ?></label>
				</td>
			</tr>
			</table>
		</TD>
	
	</TR>
</table>

</form>
</body>
</html>
