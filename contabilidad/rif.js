/*
 * Archivo JavaScript.
 * Funciones:
 * formatos para varios tipos de campos
 * Revisa
 * validarEmail
 * validDate
 * IsUnsignedInt
 * LeapYear
 * Activar
 */

//------------------------------------------------------------------------------
//formatos para varios tipos de campos
var letras = /^[a-zA-Z]$/
var tlf = /^[2-9]+[0-9]{6,}$/
var date = /^[0-9]{2}\/+[0-9]{2}\/+[0-9]{4}$/
var number = /^[0-9]{0,}$/
var decimal = /^[1-9]+[0-9]{1,}\.+[0-9]{2}/
var email = /^[a-zA-Z].+@[a-zA-Z_0-9-\.]+\.[a-zA-Z]{2,3}$/
var rif = /^[jJ|vV|gG|eE|pP]{1,1}+[0-9]{9,9}$/

//------------------------------------------------------------------------------
//funcion que permite el uso de los conjuntos
function Revisa(conjunto, cadena)	
{
	return conjunto.test(cadena)
}//Revisa

//------------------------------------------------------------------------------
// Funcion que valida el email
function ValidarCedula(cedula){
  if(!cedula.value == null || !cedula.value == ""){
    if(cedula.value.length>9 || 
       (cedula.value.charAt(0)!= 'v' && cedula.value.charAt(0)!= 'V' && cedula.value.charAt(0)!= 'e' && cedula.value.charAt(0)!= 'E') || 
       !Revisa(number,cedula.value.substring(1,9))){
      alert("Cedula Inválida. El formato de cédula debe ser vV, eE seguido de ocho dígitos numéricos, ej.: V12345678");
      //cedula.value="";
      cedula.focus();      
      return false;
    }
  }
  return true;
}

function ValidarDoc(indice){
  var doc = document.forms[indice].elements['rif']
  var radioObj = document.forms[indice].elements['tipodocumento'];
  if (radioObj[0].checked) { 
    return ValidarCedula(doc);
  } else {
    return ValidarRif(doc);
  }
}

//------------------------------------------------------------------------------
// Funcion que valida el email
function ValidarPorcentaje(porcentaje){
  if(!porcentaje.value == null || !porcentaje.value == ""){
    if(!Revisa(number,porcentaje.value)){
         alert("El porcentaje de participación no es válido, debe ser un número.");
         porcentaje.value="";
         porcentaje.focus();      
         return false;
    }
    if (Number(porcentaje.value)>100){
         alert("El porcentaje de paticipación no es válido, debe ser menor a 100%");
         porcentaje.value="";
         porcentaje.focus();      
         return false;
    }
  }
  return true;
}

//------------------------------------------------------------------------------
// Funcion que valida el email
function ValidarEmail(correo){
  if(!correo.value == null || !correo.value == ""){
    if(!Revisa(email,correo.value)){
      alert("email inválido");
      correo.value="";
      correo.focus();      
      return false;
    }
  }
  return true;
}


//------------------------------------------------------------------------------
// Funcion que valida el telefono
function ValidarTelefono(tlf){
  if(!tlf.value == null || !tlf.value == ""){
    if(Revisa(letras,tlf.value)){
      alert("teléfono inválido");
      tlf.value="";
      tlf.focus();      
      return false;
    }
  }
  return true;
}

//------------------------------------------------------------------------------
// Funcion que valida el email
function ValidarRif(text){
  if(!text.value == null || !text.value == ""){
    if(!Revisa(rif,text.value)){
      alert("el formato del RIF debe ser jJ, vV, gG, eE, seguido de nueve dígitos numéricos");
      text.value="";
      text.focus();
      return false;
    }
  }
  return true;
}

//------------------------------------------------------------------------------
function FormatoFecha(fecha) {
  if (fecha.value.length == 2 || fecha.value.length == 5){
    fecha.value = fecha.value + '/';
  }
}

//------------------------------------------------------------------------------
// Script que valida las fechas
function ValidDate(fecha){
   if (fecha.value != "" ) {
      var fec_err=h_err=dia=mes=anio=hh=minutos=segundos=0;
      var mesaux = 0;
      fec_err = (((fecha.value.substring(2,3) == "/") ||
                  (fecha.value.substring(2,3) == "/")) &&
                 ((fecha.value.substring(5,6) == "/") ||
                  (fecha.value.substring(5,6) == "/")))? "0":"1";
      if (IsUnsignedInt(fecha.value.substring(0,2))) {
         dia = fecha.value.substring(0,2);
      } else { 
        fec_err = 1;
      }
      mesaux = fecha.value.substring(3,5);
      mesaux = mesaux.toUpperCase();
      if (mesaux == '01') { mesaux = '01';};
      if (mesaux == '04') { mesaux = '04' };
      if (mesaux == '08') { mesaux = '08' };
      if (mesaux == '12') { mesaux = '12' };
      if (mesaux == '01' || mesaux == '02' || mesaux == '03' || mesaux == '04' ||
         mesaux == '05' || mesaux == '06' || mesaux == '07' || mesaux == '08' ||
         mesaux == '09' || mesaux == '10' || mesaux == '11' || mesaux == '12') {
         mes = mesaux;
      } else {
        fec_err = 1;
      }
      if ( IsUnsignedInt(fecha.value.substring(6,10))) {
         anio = fecha.value.substring(6,10);
      } else {
        fec_err = 1;
      }
      if (anio < 1000 || anio > new Date().getYear()) { fec_err=1 }
      if ((dia > 31 || mes > 12 || dia <= 0 || mes <= 0 ) ||
         ((!LeapYear(anio)) && mes == '02' && dia > 28) || ((LeapYear(anio)) && mes == '02' && dia > 29)
         ||(fec_err == 1)||((mes == 04 || mes == 06 || mes == 09 || mes == 11) && dia > 30)) {
         alert("La Fecha no es Valida. El formato es DD/MM/AAAA");
         fecha.value = "";
         fecha.focus();
         return false;
      } else {
        fecha.value = dia + '/' + mes + '/' + anio;
      }
   }
   return true;
}//validDate

//------------------------------------------------------------------------------
function IsUnsignedInt(campo) {
	for (var i = 0; i < campo.length - 1; i++)	{
    	var pos = campo.charAt(i);
      if (pos < "0" || pos > "9") {
         return false; 
      }
  }
	return true;
}//IsUnsignedInt

//------------------------------------------------------------------------------
function LeapYear(anio) { 
	if ((anio % 400) == 0) {
     return true; 
  }
  if ((app = anio % 100) == 0) {
     return true;
  }
  if ((app = anio % 4) == 0) {
     return true;
  } else {
    return false;
  }
}//LeapYear

//Funcion que activa y desactiva objetos en la clasificacion
function ActivarClasificacion() {
  var fm = document.forms[0];
	var retorno = true;  
	with (fm) {
    nroRegistro.value = "";
    nroGaceta.value = "";
    fechaGaceta.value = "";
    nroResolucion.value = "";
    fechaResolucion.value = "";

    if (elements["tipoAuxiliar.codigo"].value == '') {   // AGENTE DE ADUANAS
      nroRegistro.className         = 'inactivo';
		  nroGaceta.className           = 'inactivo';
		  fechaGaceta.className         = 'inactivo';
		  nroResolucion.className       = 'inactivo';
      fechaResolucion.className     = 'inactivo';
      calendarGaceta.className      = 'novisibles';      
      calendarResolucion.className  = 'novisibles';
      
      nroRegistro.disabled          = "true";
		  nroGaceta.disabled            = "true";
		  fechaGaceta.disabled          = "true";
		  nroResolucion.disabled        = "true";
		  fechaResolucion.disabled      = "true";

      labelnumerogaceta.value       = 'Número de Gaceta / Comprobante';
      labelfechagaceta.value        = 'Fecha de Gaceta / Comprobante'; 
      
     
    } else {
      if (elements["tipoAuxiliar.codigo"].value == '1') {   // AGENTE DE ADUANAS
        nroRegistro.className         = 'activo';
        nroGaceta.className           = 'activo';
        fechaGaceta.className         = 'activo';
        nroResolucion.className       = 'activo';
        fechaResolucion.className     = 'activo';
        calendarGaceta.className      = 'visibles';
        calendarResolucion.className  = 'visibles';
      
        nroRegistro.disabled          = null;
        nroGaceta.disabled            = null;
        fechaGaceta.disabled          = null;
        nroResolucion.disabled        = null;
        fechaResolucion.disabled      = null;
        calendarGaceta.disabled       = null;
        calendarResolucion.disabled   = null;

        labelnumerogaceta.value       = 'Número de Gaceta';
        labelfechagaceta.value        = 'Fecha de Gaceta';  
        
      } else { 
        if (elements["tipoAuxiliar.codigo"].value == '8') {  // EXPORTADOR
            nroGaceta.className           = 'activo';
            fechaGaceta.className         = 'activo';
            calendarGaceta.className      = 'visibles';
            nroRegistro.className         = 'inactivo';
            nroResolucion.className       = 'inactivo';
            fechaResolucion.className     = 'inactivo';
          
            nroGaceta.disabled            = null;
            fechaGaceta.disabled          = null;  
            calendarResolucion.className  = 'novisibles';
            nroRegistro.disabled          = "true";
            nroResolucion.disabled        = "true";
            fechaResolucion.disabled      = "true";

            labelnumerogaceta.value       = 'Número de Comprobante';
            labelfechagaceta.value        = 'Fecha de Comprobante'; 
      
        } else {
            nroRegistro.className         = 'activo';
            nroResolucion.className       = 'inactivo';
            fechaResolucion.className     = 'inactivo';
            nroGaceta.className           = 'inactivo';
            fechaGaceta.className         = 'inactivo';
            calendarGaceta.className      = 'novisibles';
            calendarResolucion.className  = 'novisibles';
          
            nroRegistro.disabled          = null;
            nroResolucion.disabled        = "true";
            fechaResolucion.disabled      = "true";
            nroGaceta.disabled            = "true";
            fechaGaceta.disabled          = "true";

            labelnumerogaceta.value       = 'Número de Gaceta / Comprobante';
            labelfechagaceta.value        = 'Fecha de Gaceta / Comprobante'; 
        }
      }
    }
  }
  return retorno;

}
//------------------------------------------------------------------------------
//Funcion que activa y desactiva objetos en la busqueda de contribuyentes preinscritos
function ActivarBusqPreinscritos() {
  var fm = document.forms[0];
	var retorno = true;  
	with (fm) {
    cedulaPasaporte.value = "";
    fecha.value = "";
    razonSocial.value = "";
    registroProvidencia.value = "";
    tomoGaceta.value = "";
    //folio.value = "";
    //protocolo.value = "";
    
    if (personalidad.value == '1' || personalidad.value == '2' || personalidad.value == '4' || personalidad.value == '6') { 
   	  fecha.className = 'activo';
      cedulaPasaporte.className     = 'activo';
		  razonSocial.className         = 'inactivo';
		  registroProvidencia.className = 'inactivo';
		  tomoGaceta.className          = 'inactivo';
      //folio.className               = 'inactivo';
		  //protocolo.className           = 'inactivo';
      p_calend.className            = 'visibles';
      
      cedulaPasaporte.disabled      = null;
		  fecha.disabled                = null;
		  razonSocial.disabled          = "false";
		  registroProvidencia.disabled  = "false";
		  tomoGaceta.disabled           = "false";
      //folio.disabled                = "false";
		  //protocolo.disabled            = "false";

      labelregistro.value = 'Nro Registro / Providencia';
      labeltomo.value     = 'Nro Tomo / Gaceta';    
      
      if (personalidad.value == '6')
        labelfechanac.value           = 'Fecha Fallecimiento';
      else
        labelfechanac.value           = 'Fecha Nacimiento';      

      if (personalidad.value == '1' || personalidad.value == '2' || personalidad.value == '6')
        labelcedula.value           = 'Cédula';
      else
        labelcedula.value           = 'Pasaporte';
        
	  } else { 
		  switch(personalidad.value){
		    case '0': 
          fecha.className               = 'inactivo';
        	cedulaPasaporte.className     = 'inactivo';
					registroProvidencia.className = 'inactivo';
					tomoGaceta.className          = 'inactivo';
					//protocolo.className           = 'inactivo';
          //folio.className               = 'inactivo';
        	razonSocial.className         = 'inactivo';
        	cedulaPasaporte.disabled      = "false";
        	fecha.disabled                = "false";
        	razonSocial.disabled          = "false";
					registroProvidencia.disabled  = "false";
					tomoGaceta.disabled           = "false";
					//protocolo.disabled            = "false";
          //folio.disabled                = "false";
        	p_calend.className            = 'novisibles';
          
          labelcedula.value   = 'Cédula / Pasaporte';
          labelfechanac.value = 'Fecha Nacimiento / Constitución';
          labelregistro.value = 'Nro Registro / Providencia';
          labeltomo.value     = 'Nro Tomo / Gaceta';          
			    break;
          
		    case '3':
        	fecha.className               = 'activo';
					registroProvidencia.className = 'activo';
					tomoGaceta.className          = 'activo';
					//protocolo.className           = 'activo';
          //folio.className               = 'activo';
        	razonSocial.className         = 'activo';
        	cedulaPasaporte.className     = 'inactivo';

        	cedulaPasaporte.disabled = "false";
        	fecha.disabled               = null;
        	razonSocial.disabled         = null;
					registroProvidencia.disabled = null;
					tomoGaceta.disabled          = null;
					//protocolo.disabled           = null;
          //folio.disabled               = null;
        	p_calend.className           = 'visibles';
          
          labelfechanac.value = 'Fecha Constitución';
          labelregistro.value = 'Nro Registro';
          labeltomo.value     = 'Nro Tomo';
          labelcedula.value   = 'Cédula / Pasaporte';
		  		break;
          
		    case '5': 
        	fecha.className               = 'activo';
        	cedulaPasaporte.className     = 'inactivo';
					registroProvidencia.className = 'activo';
					tomoGaceta.className          = 'activo';
					//protocolo.className           = 'inactivo';
          //folio.className               = 'activo';
        	razonSocial.className         = 'activo';
          
        	cedulaPasaporte.disabled     = "false";
					//protocolo.disabled           = "false";
        	fecha.disabled               = null;
        	razonSocial.disabled         = null;
					registroProvidencia.disabled = null;
					tomoGaceta.disabled          = null;
          //folio.disabled               = null;
        	p_calend.className           = 'visibles';
          
          labelfechanac.value = 'Fecha Constitución';
          labeltomo.value     = 'Nro Gaceta';
          labelregistro.value = 'Nro Providencia';
          labelcedula.value   = 'Cédula / Pasaporte';
			    break;
		  }
    }
  }
  return retorno;
}//ActivarBusqPreinscritos

//------------------------------------------------------------------------------
//Valida el formulario de busqueda de contribuyentes activos
function ValidarBusquedaContribuyentes () {
  var fm = document.forms[0];
  var ok = true;
    if((fm.rif.value == null || fm.rif.value == "") && (fm.personalidad.value == null || fm.personalidad.value == "0") && (fm.cedula.value == null || fm.cedula.value == "") && (fm.fecha.value == null || fm.fecha.value == "") && (fm.nombre.value == null || fm.nombre.value == "")){
      alert ('debe ingresar al menos un parámetro para efectuar la búsqueda');
      ok = false;
	  }  
	  if(!fm.rif.value == null || !fm.rif.value == ""){
	  	if(!Revisa(rif,fm.rif.value)){
        alert("el formato del RIF debe ser jJ, vV, gG, eE, seguido de nueve dígitos numéricos");
		    ok = false;
      }
	  }
	  if(!fm.cedula.value == null || !fm.cedula.value == ""){
      if(!fm.personalidad.value == null || !fm.personalidad.value == "0"){
        if(!Revisa(number,fm.cedula.value)){
          alert("el formato del documento de identidad debe ser un número con un máximo de 10 dígitos");
          ok = false;
        }
      }
	  }
	  if(!fm.fecha.value == null || !fm.fecha.value == ""){
      if(!fm.personalidad.value == null || !fm.personalidad.value == "0"){
        if(!Revisa(date,fm.fecha.value)){
          alert("La fecha no es válida");
          ok = false;
        }
      }
	  }
    if((fm.rif.value == null || fm.rif.value == "") && (fm.cedula.value == null || fm.cedula.value == "") && (fm.nombre.value == null || fm.nombre.value == "")){
      if((fm.personalidad.value != null && fm.personalidad.value != "0") || (fm.fecha.value != null && fm.fecha.value != "")){
        alert ('La búsqueda por los campos Tipo de Personas y Fecha de Constitución, debe combinarse con algun otro campo.');
        ok = false;
      }
	  } 
    if (ok) {
      fm.submit();
  	}
}//ValidarBusquedaContribuyentes

//------------------------------------------------------------------------------
// Funcion que valida el formulario de busqueda de contribuyentes preinscritos
function ValidarBusquedaPreinscritos(reincorporar){
  var frm = document.forms[0];
  var personalidad        = frm.personalidad.value;
  var razonSocial         = frm.razonSocial.value;
  var fecha               = frm.fecha.value;
  var cedulaPasaporte     = frm.cedulaPasaporte.value;
  var registroProvidencia = frm.registroProvidencia.value;
  var tomoGaceta          = frm.tomoGaceta.value;
  var numeroControl       = frm.numeroControl.value;
  var rifReincorp         = null;

  if (numeroControl != null) {
    if(!Revisa(number,numeroControl) || numeroControl.lenght < 5){
      alert("el formato del Número de Control debe ser un número mayor de 5 dígitos");
      return false;
    }
    return true; 
  }
  
  if (reincorporar != null && reincorporar != ''){
      rifReincorp = frm.rif.value;
  }

  if(personalidad != null && personalidad != ''){
      if (reincorporar == 'S') {
          if (rifReincorp == null || rifReincorp == ''){
                alert("Debe ingresar el rif que se desea reincorporar");
                return false; 
          } else {
              if(!Revisa(rif,rifReincorp)){
                alert("el formato del RIF debe ser jJ, vV, gG, eE, seguido de nueve dígitos numéricos");
                return false;
              }
          }
      }  
      
      if(personalidad == '1' || personalidad == '2' || personalidad == '4' || personalidad == '6'){
        if(fecha != '' && cedulaPasaporte != ''){
          if ((personalidad == '1' && cedulaPasaporte.charAt(0) != 'V') || (personalidad == '2' && cedulaPasaporte.charAt(0) != 'E')){
                alert("El tipo de persona no se corresponde con la cédula ingresada");
                return false; 
          } else {
            return true; 
          }
        }
      } else {
         if(personalidad == '3'){
             if(fecha != '' && razonSocial != '' && registroProvidencia != '' && tomoGaceta != ''){ //&& protocolo != '' && folio != ''){
               return true;
             } 
         } else { 
             if(personalidad == '5'){
                 if(fecha != '' && razonSocial != '' && registroProvidencia != '' && tomoGaceta!= ''){ // && folio != ''){
                   return true;
                 } 
             } 
         }

      }
   
  }
  alert("Debe transcribir todos los datos solicitados");
  return false;
}

//------------------------------------------------------------------------------
// Funcion que habilita los campos del formulario de relacion en base al tipo 
// de relacion seleccionada
function HabilitarCamposRelacion(tipoRelacion){
  if (tipoRelacion.value == '02') { //socio
    document.forms[0].elements["cargo"].value = 'NO INDICA';
    document.forms[0].elements["participacion"].value = '';
	  document.forms[0].elements["cargo"].disabled = true;
    document.forms[0].elements["participacion"].disabled = null;
  } else {
    if (tipoRelacion.value == '03') { //directivo
      document.forms[0].elements["cargo"].value = '';
      document.forms[0].elements["participacion"].value = '0.0';
      document.forms[0].elements["cargo"].disabled = null;
	    document.forms[0].elements["participacion"].disabled = true;      
    } else {
      document.forms[0].elements["cargo"].value = 'NO INDICA';
      document.forms[0].elements["participacion"].value = '0.0';    
      document.forms[0].elements["cargo"].disabled = true;
      document.forms[0].elements["participacion"].disabled = "true";
    }
  }
}

//------------------------------------------------------------------------------
// Funcion que valida la fecha de nacimiento de la carga familiar para la solicitud
// del nro de informe medico
function ValidarInformeMedico(){
  if (document.forms[0].elements["fechaNacimiento"].value != '' && document.forms[0].elements["parentesco.codigo"].value == '40') { 
    var parts = document.forms[0].elements["fechaNacimiento"].value.split('/'); 
    var textDate = new Date(parts[2], parts[1], parts[0]); 
    var mm    = textDate.getMonth(); 
    var bday  = textDate.getDate();
    var byear = textDate.getYear();
    if (100 > byear) byear = byear + 1900;
    thedate = new Date();
    mm2 = thedate.getMonth() + 1;
    dd2 = thedate.getDate();
    yy2 = thedate.getYear();
    if (byear > yy2) {
      alert("La fecha no es válida");
      document.forms[0].elements["fechaNacimiento"].value = "";
    } else {
      var yourage = yy2 - byear;     
      if (mm > mm2) yourage--;   
      if ((mm2 == mm) && (bday > dd2)) yourage--; 

      radioObj = document.forms[0].elements["radioinforme"];
      if (yourage > 25) { 
         document.forms[0].elements["nroInformeMedico"].value = "";
         radioObj[0].disabled = true;
         radioObj[1].disabled = null;          
      } else {
          if ((yourage < 25 || yourage == 25) && (yourage > 18 || yourage == 18)) {
              document.forms[0].elements["nroInformeMedico"].value = "";
              radioObj[0].disabled = null;
              radioObj[1].disabled = null;          
          } else {
              document.forms[0].elements["nroInformeMedico"].value = "NO APLICA";
              radioObj[0].disabled = true;
              radioObj[1].disabled = true;
          }
		  }
    }
	} else {
    document.forms[0].elements["nroInformeMedico"].value = "NO APLICA";
    radioObj = document.forms[0].elements["radioinforme"];
    radioObj[0].disabled = true;
    radioObj[1].disabled = true;    
  }
}

     
//------------------------------------------------------------------------------
//Valida el formulario de relacion
function validarFormRelacion () {
	var fm = document.formRelacion;
  var ok = true;
	if(!fm.r_rif.value == null || !fm.r_rif.value == ""){ 
	 	if(!Revisa(rif,fm.r_rif.value)){
	  	alert("el formato del RIF debe ser jJ, vV, gG, eE, seguido de nueve dígitos numéricos");
		  ok = false;
	  }
  }
  if((fm.r_rif.value == "") ||  (fm.r_tiporelacion.value == "")){ 
	  alert ('debe ingresar el Rif y tipo de relación del Contribuyente para incluir la relación');
    ok = false;
	}
    if  (fm.r_tiporelacion.value == '02') // Socio 
       {  
	        if(fm.r_participacion.value == null || fm.r_participacion.value == "") 
           {        
	        	alert(" Debe ingresar el Porcentaje de participacion si el tipo de relacion es Socio .... ");
		        ok = false;
            }  
          }  
    if  (fm.r_tiporelacion.value == '03') // Directivo 
       {   
	        if(fm.r_cargo.value == null || fm.r_cargo.value == ""){          
	        	alert(" Debe ingresar el Cargo si el tipo de relacion es Directivo .... ");
		        ok = false;
       }
       }  
  if (ok)   	fm.submit();

   }//validarFormRelacion

//------------------------------------------------------------------------------
// Valida el formulario de cargas familiares
function validarFormCargas () {
	var fm = document.formCargas;
  var ok = true;
	   
  if((fm.p_nombre1.value == "") || (fm.p_parentesco.value == "") || (fm.p_apellido1.value == "") || (fm.p_fechanac.value == "") ) {   
		  alert ('debe ingresar al menos el primer nombre, el primer apellido, la fecha de nacimiento y el parentesco de la relacion del Contribuyente para incluir la carga familiar');
      ok = false;
	}  
  if(!fm.p_cedula.value == null || !fm.p_cedula.value == "") {
    if(!Revisa(number,fm.p_cedula.value))  {
      alert("el formato del documento de identidad debe ser un número con un máximo de 10 dígitos");
		  ok = false;
		}
	}
	if(!fm.p_fechanac.value == null || !fm.p_fechanac.value == ""){
    if(!Revisa(date,fm.p_fechanac.value)){
      alert("La fecha no es válida");
		  ok = false;
		}
  }

  if (ok) {
    fm.submit();
  }    
}//validarFormCargas



//------------------------------------------------------------------------------
//Funcion que abre la ventana de imprimir comprobante
function imprimirComprobante(){
      alert("Asegurese de tener encendida y conectada su impresora, ya que esta página se cerrara al finalizar la impresión");
      window.print();
      parent.close();
}//imprimirComprobante


function buscarExpediente(idContribuyente){
  document.forms[1].elements["expidcontribuyente"].value= idContribuyente;
  document.forms[1].submit();
}
