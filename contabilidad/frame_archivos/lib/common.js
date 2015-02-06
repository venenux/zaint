function actualizar(seleccion){
	var opcion=document.getElementsByTagName("input");

	for (i=0; i<opcion.length; i++){
		if (opcion[i].type == "radio" && opcion[i].name != seleccion.name) {
			opcion[i].checked = false;
		}
	}	
}
function regresar(){
	parent.cont.location.href='configuracion.php'
}

function habilitar(valor){

	var opcion=document.getElementsByTagName("input");
	
	for (i=0; i<opcion.length; i++){
		if (opcion[i].type == "radio" && opcion[i].value == valor) {
			opcion[i].checked = true
			
		}
		else{
			opcion[i].disabled=true
		}
	}


}

function paginacion(url,valor,campos){

location.href=url+".php?pagina="+valor+"&"+campos
}

function confirmar(msg,url) {
 self.rValue = false;
 if (confirm(msg) == true) {
  window.location.href = url;
 }
}

function over(element,estilo){
	element.addClassName(estilo);
}
function out(element,estilo){
	element.removeClassName(estilo);
}

function copytext(s) {
	window.clipboardData.setData("Text", s);
}

function abrirAjax()
{ 
	
	var xmlhttp=false;
	try
	{
		xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
	}
	catch(e)
	{
		try
		{
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		catch(E)
		{
			if (!xmlhttp && typeof XMLHttpRequest!='undefined') xmlhttp=new XMLHttpRequest();
		}
	}
	return xmlhttp; 
}

function imprimir(nombre){
	var ficha = document.getElementById(nombre)
	var ventimp = window.open(' ', 'popimpr','width=10, height=10, TOOLBAR=NO, LOCATION=NO, MENUBAR=NO, SCROLLBARS=NO, RESIZABLE=NO')
var estilo="<link href=\"../estilos.css\" rel=\"stylesheet\" type=\"text/css\">"
ventimp.document.write( estilo )
	ventimp.document.write( ficha.innerHTML )
	ventimp.document.close()
	ventimp.print()
	ventimp.close()
}
function cargar_municipio(){
 	
 	var estado=document.getElementById('cod_estado')
	var municipio=document.getElementById('cod_municipio')
	
	
	var contenido_municipio=abrirAjax()
	
	contenido_municipio.open("GET", "procesos.php?estado="+estado.value, true)
   contenido_municipio.onreadystatechange=function() 
	{ 

		if (contenido_municipio.readyState==1)
		{
			
			municipio.length=0
			var opcion=document.createElement("opcion")
			opcion.value=0
			opcion.innerHTML= "Calculando..."
			municipio.appendChild(opcion)
			municipio.disabled=true
			
		}
		if (contenido_municipio.readyState==4)
		{
			municipio.parentNode.innerHTML = contenido_municipio.responseText;
		} 
	}
	contenido_municipio.send(null);
	
}
function cargar_programa(){
	var sector=document.getElementById('sel_sector')
	var programa=document.getElementById('sel_programa')
	var contenido_programa=abrirAjax()
	contenido_programa.open("GET", "procesos.php?accion=1&sector="+sector.value, true)
   	contenido_programa.onreadystatechange=function() 
	{ 
		if (contenido_programa.readyState==1)
		{
			programa.length=0
			var opcion=document.createElement("opcion")
			opcion.value=0
			opcion.innerHTML= "Cargando..."
			programa.appendChild(opcion)
			programa.disabled=true
		}
		if (contenido_programa.readyState==4)
		{
			programa.parentNode.innerHTML = contenido_programa.responseText;
		} 
	}
	contenido_programa.send(null);
}
function cargar_actividad(){
 	var sector=document.getElementById('sel_sector')
	var programa=document.getElementById('sel_programa')
	var actividad=document.getElementById('sel_actividad')
	
	var contenido_actividad=abrirAjax()
	
	contenido_actividad.open("GET", "procesos.php?accion=2&sector="+sector.value+"&programa="+programa.value, true)
   	contenido_actividad.onreadystatechange=function() 
	{ 
		if (contenido_actividad.readyState==1)
		{
			actividad.length=0
			var opcion=document.createElement("opcion")
			opcion.value=0
			opcion.innerHTML= "Cargando..."
			actividad.appendChild(opcion)
			actividad.disabled=true
		}
		if (contenido_actividad.readyState==4)
		{
			actividad.parentNode.innerHTML = contenido_actividad.responseText;
		}
	}
	contenido_actividad.send(null);
}

function cargar_nombrecue()
{
 	var cuenta=document.getElementById('Cuenta')
	var nombrec=document.getElementById('nombrec')

	var contenido_nombrec=abrirAjax()
	contenido_nombrec.open("GET", "proceso2.php?opcion=1&cuenta="+cuenta.value, true)
   	contenido_nombrec.onreadystatechange=function() 
	{ 
		if (contenido_nombrec.readyState==1)
		{
			nombrec.length=0
			var opcion=document.createElement("opcion")
			opcion.value=0
			opcion.innerHTML= "Cargando..."
			nombrec.appendChild(opcion)
			nombrec.disabled=true
		}
		if (contenido_nombrec.readyState==4)
		{
			nombrec.parentNode.innerHTML = contenido_nombrec.responseText;
		}
	}
	contenido_nombrec.send(null);
}