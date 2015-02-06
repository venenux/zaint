<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<!--  Version: Multiflex-3 Update-7 / Overview             -->
<!--  Date:    January 15, 2007                            -->
<!--  Author:  Wolfgang                                    -->
<!--  License: Fully open source without restrictions.     -->
<!--           Please keep footer credits with a link to   -->
<!--           Wolfgang (www.1-2-3-4.info). Thank you!     -->

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="cache-control" content="no-cache" />
  <meta http-equiv="expires" content="3600" />
  <meta name="revisit-after" content="2 days" />
  <meta name="robots" content="index,follow" />
  <meta name="publisher" content="Your publisher infos here ..." />
  <meta name="copyright" content="Your copyright infos here ..." />
  <meta name="author" content="Design: Wolfgang (www.1-2-3-4.info) / Modified: Your Name" />
  <meta name="distribution" content="global" />
  <meta name="description" content="Your page description here ..." />
  <meta name="keywords" content="Your keywords, keywords, keywords, here ..." />
  <link rel="stylesheet" type="text/css" media="screen,projection,print" href="./css/layout4_setup.css" />
  <link rel="stylesheet" type="text/css" media="screen,projection,print" href="./css/layout4_text.css" />
  <link rel="icon" type="image/x-icon" href="./img/tux.jpg" />
  
</head>

<!-- Global IE fix to avoid layout crash when single word size wider than column width -->
<!--[if IE]><style type="text/css"> body {word-wrap: break-word;}</style><![endif]-->

<body>
  <!-- Main Page Container -->
  <div class="page-container">

   <!-- For alternative headers START PASTE here -->

    <!-- A. HEADER -->      
    <div class="header">
      
      <!-- A.1 HEADER TOP -->
      <div class="header-top">
        
        <!-- Sitelogo and sitename -->
        <a class="sitelogo" href="#" title="Go to Start page"></a>
        <div class="sitename">
          
        </div>

      </div>
      
      <!-- A.2 HEADER MIDDLE -->
      <div class="header-middle">    
   
        <!-- Site message -->
        <div class="sitemessage">
          <h1>FACIL &bull; FLEXIBLE &bull; ROBUSTO</h1>
        </div>        
      </div>
      
      <!-- A.3 HEADER BOTTOM -->
      	
      <!-- A.4 HEADER BREADCRUMBS -->
      <!-- Breadcrumbs -->
      	
    </div>

    <!-- For alternative headers END PASTE here -->

    <!-- B. MAIN -->
    <div class="main">
 
      <!-- B.1 MAIN NAVIGATION -->
      <div class="main-navigation">

        <!-- Navigation Level 3 -->
        <div class="round-border-topright"></div>
        

        <!-- Navigation with grid style -->
        <dl class="nav3-grid">
          <dt><a href="index.html">Inicio</a></dt>
	  <dt><a href="empresa.html">Empresa</a></dt>
          <dt><a href="selectra.html">Selectra</a></dt>
          <dt><a href="tecnologias.html">Tenologias Usadas</a></dt>
	    	
          <dt><a href="administrativo.html">Selectra Administrativo</a></dt>
          <dt><a href="contable.html">Selectra Contable</a></dt>
	  <dt><a href="nomina.html">Selectra Nomina</a></dt>
	  <dt><a href="bienes.html">Selectra Bienes</a></dt>
	  <dt><a href="hacienda.html">Selectra Hacienda</a></dt>
		<dt><a href="../nomina/paginas/ing_curriculum.php">Ingresa tu curriculum</a></dt>
	</dl>                        

        <!-- Template infos -->                
        
      </div>
 
      <!-- B.2 MAIN CONTENT -->
      <div class="main-content">
        
        <!-- Pagetitle -->
        <h1 class="pagetitle">Selectra</h1>

        <!-- Content unit - One column -->
        <div class="column1-unit" align="justify">
          
	 <?php 
//session_start();
//ob_start();

//$termino=$_SESSION['termino'];
//include("../nomina/lib/common.php");
include("../nomina/paginas/funciones_curr.php");	
include("../nomina/header.php");


?>

<script language="JavaScript" type="text/javascript">
function calcular_antiguedad(fecha){
    hoy=new Date()
    var array_fecha = fecha.split("/")

    if (array_fecha.length!=3)
       return "La fecha introducida es incorrecta"
    var ano
    ano = parseInt(array_fecha[2]);
    if (isNaN(ano))
       return "El año es incorrecto"

    var mes
    mes = parseInt(array_fecha[1]);
    if (isNaN(mes))
       return "El mes es incorrecto"

    var dia
    dia = parseInt(array_fecha[0]);
    if (isNaN(dia))
       return "El dia introducido es incorrecto"

    if (ano<=99){
       ano +=1900
		
	 }

    edad=hoy.getFullYear()- ano - 1; //-1 porque no se si ha cumplido años ya este año
	 var meses

	 if (hoy.getMonth() + 1 - mes > 0 ){
		 meses=hoy.getMonth() + 1 - mes
       edad= edad+1
	 }
		if(hoy.getMonth() + 1 - mes < 0)
		{
			meses=hoy.getMonth() + 1 - mes+12
		}
		if(hoy.getMonth() + 1 - mes == 0){
			meses=0
	 }


			
	var dias
    //entonces es que eran iguales. miro los dias
    //si resto los dias y me da menor que 0 entonces no ha cumplido años. Si da mayor o igual si ha cumplido
    if (hoy.getDate() - dia >= 0){
       dias=hoy.getDate() - dia
		if(meses==0){	
		 edad=edad + 1
		}
	}else{
		dias=hoy.getDate()-dia+30
	}

    var antiguedad=edad+" A&#241;os, "+meses+" Meses y "+dias+" Dias"
	document.getElementById('antiguedad').innerHTML="<strong>"+antiguedad+"</strong>"
} 
function actualizar(valor1,valor2){
	var temp1=document.getElementById(valor1)
	var temp2=document.getElementById(valor2)
	
	var edad=calcular_edad(temp1.value)
	var cadena=edad.toString()
	temp2.innerHTML="<strong>"+cadena+" A&#241;os</strong>"

	

}
function calcular_edad(fecha){

    //calculo la fecha de hoy
    hoy=new Date()
    //alert(hoy)

    //calculo la fecha que recibo
    //La descompongo en un array
    var array_fecha = fecha.split("/")
    //si el array no tiene tres partes, la fecha es incorrecta
    if (array_fecha.length!=3)
       return "La fecha introducida es incorrecta"

    //compruebo que los ano, mes, dia son correctos
    var ano
    ano = parseInt(array_fecha[2]);
    if (isNaN(ano))
       return "El año es incorrecto"

    var mes
    mes = parseInt(array_fecha[1]);
    if (isNaN(mes))
       return "El mes es incorrecto"

    var dia
    dia = parseInt(array_fecha[0]);
    if (isNaN(dia))
       return "El dia introducido es incorrecto"

    //si el año de la fecha que recibo solo tiene 2 cifras hay que cambiarlo a 4
    if (ano<=99){
       ano +=1900
		
	 }
		
    //resto los años de las dos fechas
    edad=hoy.getFullYear()- ano - 1; //-1 porque no se si ha cumplido años ya este año
	
    //si resto los meses y me da menor que 0 entonces no ha cumplido años. Si da mayor si ha cumplido
    if (hoy.getMonth() + 1 - mes < 0) //+ 1 porque los meses empiezan en 0
       return edad
    if (hoy.getMonth() + 1 - mes > 0)
       return edad+1

    //entonces es que eran iguales. miro los dias
    //si resto los dias y me da menor que 0 entonces no ha cumplido años. Si da mayor o igual si ha cumplido
    if (hoy.getUTCDate() - dia >= 0)
       return edad + 1

    return edad
} 


function Actualizar_Foto() { 
		var archivo=document.getElementById("mifichero").value
		var long=archivo.length
		var i=0,cont
		cont=long
		
		var cadena_final="fotos/"+archivo.substr(cont,i)
	
		document.getElementById("imgFoto").src=archivo
		document.getElementById("imgFoto").lowsrc=archivo//cadena_final//document.getElementById("mifichero").value;
		
		document.getElementById("txtrutafoto").value=archivo//cadena_final//document.getElementById("mifichero").value;
	
} 
function Enviar(){					
	if (document.frmAgregarIntegrantes.registro_id.value==0){ 
		document.frmAgregarIntegrantes.op_tp.value=1}
	else{ 	
		document.frmAgregarIntegrantes.op_tp.value=2}		
	
	if (document.frmAgregarIntegrantes.txtnombres.value==0){
		document.frmAgregarIntegrantes.op_tp.value=-1
		alert("Debe ingresar un nombre valido. Verifique...");}	
	else if (document.frmAgregarIntegrantes.txtapellidos.value==0){
		document.frmAgregarIntegrantes.op_tp.value=-1
		alert("Debe ingresar un epellido valida. Verifique...");}				
	else if (document.frmAgregarIntegrantes.txtficha.value==0){
		document.frmAgregarIntegrantes.op_tp.value=-1
		alert("Debe ingresar una ficha valida. Verifique...");}				

}

function mostrar_div_periodos(valor){
	
	
	var div_fin=document.getElementById("div_fin_periodo")
	var div_inicio=document.getElementById("div_inicio_periodo")
	if(valor!="Fijo"){
		div_fin.style.visibility="visible"
		div_inicio.style.visibility="visible"
	}else{
		div_fin.style.visibility="hidden"
		div_inicio.style.visibility="hidden"
	}
}
</script>




<?php 

	
$conexion = conexion();
$registro_id=$_POST[registro_id];
$op_tp=$_POST[op_tp];
$fecha_actual=date("Y-m-d");
$validacion=0;
	
	
$query="select * from nomempresa";
$result=mysql_query($query,$conexion);	
$row_emp = mysql_fetch_array ($result);	
	
	//if ($registro_id==0){ // Si el registro_id es 0 se va a agregar un registro nuevo

echo $HTTP_POST_FILES['mifichero']['name'];
if(isset($_POST['guardar']))
{
if($_POST['txtcedula']!="" && $_POST['txtnombres']!="" && $_POST['txtapellidos']!="")
{	
	$filesize = $_FILES['mifichero']['size'];
	$filetype = $_FILES['mifichero']['type'];
	$archivo=$HTTP_POST_FILES['mifichero']['name'];
	if($archivo!="")
	{
		$nombre_archivo1 = $HTTP_POST_FILES['mifichero']['name'];
		$tipo_archivo = $HTTP_POST_FILES['mifichero']['type'];
		$tamano_archivo = $HTTP_POST_FILES['mifichero']['size'];
		if(copy($HTTP_POST_FILES['mifichero']['tmp_name'],"fotos/".$nombre_archivo1))
		{//move_uploaded_file($HTTP_POST_FILES['mifichero']['tmp_name'], nomina/paginas/fotos."/".$nombre_archivo1)){
      	echo "<div align='center' style=\"background-color : #84225b; color : #fdfdfd; font-family : 'Arial Black'; font-size : 15px;\">EL archivo fue cargado exitosamente</div>";
			chmod("fotos/".$nombre_archivo1, 0777);			
    	}
		else
		{
    		echo "<div align='center' style=\"background-color : #84225b; color : #fdfdfd; font-family : 'Arial Black'; font-size : 15px;\">Ocurri&oacute; un problema cargando el archivo</div>";
		}
	}

			
	$temp1=$_POST['txtFechaNac'];
	
	if($temp1[4]!='-' && $temp1[7]!='-')
	{
		$fecha=fecha_sql($_POST['txtFechaNac']);
	}
	else
	{
		$fecha=$_POST['txtFechaNac'];
	}

	$temp2=$_POST['txtFecha'];
	
	if($temp2[4]!='-' && $temp2[7]!='-')
	{
		$fecha2=fecha_sql($_POST['txtFecha']);
	}
	else
	{
		$fecha2=$_POST['txtFecha'];
	}
	
	$apenom = $_POST['txtapellidos'].$_POST['txtnombres'];

		$query="INSERT INTO nomelegibles (cedula,foto,apenom,sexo,fecnac,telefono,direccion,email,cod_profesion,grado_instruccion,area_desempeno,anios_exp,observacion,fecha_reg) VALUES 
('".$_POST['txtcedula']."',
'fotos/".$nombre_archivo1."',
'".$apenom."', 
'".$_POST['optSexo']."',
'".$fecha."',
'".$_POST['txttelefonos']."',
'".$_POST['txtdireccion']."',
'".$_POST['txtemail']."',
'".$_POST['cboProfesion']."',
'".$_POST['cboInstruccion']."', 
'".$_POST['txtaread']."',
'".$_POST['txtanosex']."',
'".$_POST['txtobs']."',
'".$fecha2."')";


	if ($result2=mysql_query($query,$conexion))
	{
		?>
			<script type="text/javascript">
			alert("Registro guardado exitosamente")
			</script>
		<?
	}
	else
	{
		?>
			<script type="text/javascript">
			alert("Error guardando registro")
			</script>
		<?
	}


}
if($_POST['txtcedula']==""){
	?> <script type="text/javascript">
		alert("Debe introducir un numero de cédula")
		</script>
	<?
}elseif($_POST['txtnombres']==""){
	?> <script type="text/javascript">
		alert("Debe introducir un nombre")
		</script>
	<?
}elseif($_POST['txtapellidos']==""){
	?> <script type="text/javascript">
		alert("Debe introducir un apellido")
		</script>
	<?
}


}





?>
<form action="ing_curriculum.php" method="post" name="frmAgregarIntegrantes" id="frmAgregarIntegrantes" enctype="multipart/form-data">
<input name="op_tp" type="hidden" id="op_tp" value="-1">
<input name="registro_id" type="hidden" id="registro_id" value="<?php echo $_POST[registro_id]; ?>">

<table align="center" width="700" border="0">
  <tbody>
<tr><TD colspan="3" class="tb-tit" align="right"><?echo btn("back","maestro_personal.php")?></TD></tr>
<tr><TD colspan="3"><br></TD></tr>
    <tr>
      
      <td rowspan="7"><img src="fotos/silueta.gif" lowsrc="fotos/silueta.gif" border="1" name="imgFoto" id="imgFoto"
	   width="177" height="179" align="middle" class="" style="top:0px"></td>
    </tr>
 
    <tr>
      <td>Archivo de Foto:</td>
      <td><input type="file" name="mifichero" id="mifichero" onchange="Actualizar_Foto();" style="width:320px" ><input name="txtrutafoto" type="hidden" id="txtrutafoto" value="" maxlength="30"></td>
    </tr>
<tr>
      <td></td>
      <td></td>
    </tr>
<tr>
      <td></td>
      <td></td>
    </tr>
<tr>
      <td></td>
      <td></td>
    </tr>
<tr>
      <td></td>
      <td></td>
    </tr>
  </tbody>
</table>
<br>
<table align="center" width="700" border="0" class="">

		  <tr>
          <td><font size="2" face="Arial, Helvetica, sans-serif">Fecha:</font></td>
          <td><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtFecha" type="text" id="txtFecha" style="width:100px" value="<?php echo $_POST['txtFecha']; ?>" maxlength="60" onblur="javascript:actualizar('','');">
          <input name="image2" type="image" id="d_fecha" src="../lib/jscalendar/cal.gif" />
  <script type="text/javascript">Calendar.setup({inputField:"txtFecha",ifFormat:"%d/%m/%Y",button:"d_fecha"});</script>
          </font></td>
        </tr>

        <tr >
          <td width="200"><font size="2" face="Arial, Helvetica, sans-serif">Apellidos:</font></td>
          <td width="500" ><font size="2" face="Arial, Helvetica, sans-serif"><input name="txtapellidos" type="text" id="txtapellidos" style="width:200px" value="<?php echo $_POST['txtapellidos']; ?>" maxlength="30">
          </font></td>
        </tr>
        <tr bgcolor="">
          <td ><font size="2" face="Arial, Helvetica, sans-serif">Nombres</font>:</td>
          <td ><font size="2" face="Arial, Helvetica, sans-serif"><input name="txtnombres" type="text" id="txtnombres" style="width:200px" value="<?php echo $_POST['txtnombres']; ?>" maxlength="30">
          </font></td>
        </tr>
<tr >
          <td ><font size="2" face="Arial, Helvetica, sans-serif">C&eacute;dula:</font></td>
          <td ><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtcedula" type="text" id="txtcedula" style="width:100px" value="<?=$_POST['txtcedula']?>" maxlength="10">
          </font></td>
        </tr>

        <tr>
          <td ><font size="2" face="Arial, Helvetica, sans-serif">Sexo: </font></td>
          <td ><span ><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="optSexo" type="radio" value="Masculino" checked="true">Masculino<input name="optSexo" type="radio" value="Femenino">
            Femenino</font></span></td>
        </tr>
        <tr>
          <td><font size="2" face="Arial, Helvetica, sans-serif">Fecha de Nacimiento:</font></td>
          <td><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtFechaNac" type="text" id="txtFechaNac" style="width:100px" value="<?php echo $_POST['txtFechaNac']; ?>" maxlength="60" onblur="javascript:actualizar('txtFechaNac','fila_edad');">
          <input name="image2" type="image" id="d_fechanac" src="../lib/jscalendar/cal.gif" />
  <script type="text/javascript">Calendar.setup({inputField:"txtFechaNac",ifFormat:"%d/%m/%Y",button:"d_fechanac"});</script>
          </font></td>
        </tr>
        <tr >
          <td  >Edad:</td>
          <td id="fila_edad" ><font size="2" face="Arial, Helvetica, sans-serif"><strong>
            A&ntilde;os de Edad
          </strong></font></td>
        </tr>
        <tr >
          <td ><font size="2" face="Arial, Helvetica, sans-serif">Lugar de Nacimiento: </font></td>
          <td ><font size="2" face="Arial, Helvetica, sans-serif">
				
            <input name="txtlugarNac" type="text" id="txtlugarNac" style="width:200px" value="<?php echo $_POST['txtlugarNac']; ?>" maxlength="20">
          </font></td>
        </tr>
        <tr bgcolor="">
          <td ><font size="2" face="Arial, Helvetica, sans-serif">Profesi&oacute;n</font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">:</font></td>
          <td><font size="2" face="Arial, Helvetica, sans-serif">
            <select name="cboProfesion" style="width:200px">

<option>Seleccione una Profesi&oacute;n</option>
              <?php
		  
	 	$query="select codorg,descrip from nomprofesiones where codorg";
		$result=mysql_query($query,$conexion);
		
	 	  //ciclo para mostrar los datos
  		while ($row = mysql_fetch_array($result))
  		{
		   ?>
              <option value="<?php echo $row['codorg'];?>"><?php echo $row['descrip'];?></option>
              <?php  
		}//fin del ciclo while
		?>
            </select>
          </font></td>
        </tr>



		<tr bgcolor="">
          <td ><font size="2" face="Arial, Helvetica, sans-serif">Instrucci&oacute;n</font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">:</font></td>
          <td><font size="2" face="Arial, Helvetica, sans-serif">
            <select name="cboInstruccion" style="width:200px">

<option>Seleccione un grado de instrucci&oacute;n</option>
              <?php
		  
	 	$query="select * from instruccion";
		$result=mysql_query($query,$conexion);
		
	 	  //ciclo para mostrar los datos
  		while ($row = mysql_fetch_array($result))
  		{
		   ?>
              <option value="<?php echo $row['codigo'];?>"><?php echo $row['descripcion'];?></option>
              <?php  
		}//fin del ciclo while
		?>
            </select>
          </font></td>
        </tr>

<tr bgcolor="">
          <td ><font size="2" face="Arial, Helvetica, sans-serif">Area de desempeño:</font></td>
          <td ><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtaread" type="text" id="txtaread" style="width:200px"  value="<?php echo $_POST['txtaread']; ?>" maxlength="40" >
          </font></td>
        </tr>

		 <tr bgcolor="">
          <td ><font size="2" face="Arial, Helvetica, sans-serif">Años de experiencia:</font></td>
          <td ><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtanosex" type="text" id="txtanosex" style="width:50px"  value="<?php echo $_POST['txtanosex']; ?>" maxlength="2" >
          </font></td>
        </tr>


        
        <tr >
          <td ><font size="2" face="Arial, Helvetica, sans-serif">Tel&eacute;fono:</font></td>
          <td  ><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txttelefonos" type="text" id="txttelefonos" style="width:200px" value="<?php echo $_POST['txttelefonos']; ?>" maxlength="20">
          </font></td>

        </tr>
        <tr bgcolor="">
          <td ><font size="2" face="Arial, Helvetica, sans-serif">E-Mail:</font></td>
          <td ><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtemail" type="text" id="txtemail" style="width:200px"  value="<?php echo $_POST['txtemail']; ?>" maxlength="40" >
          </font></td>
        </tr>
       <tr bgcolor="">
          <td ><font size="2" face="Arial, Helvetica, sans-serif">Direcci&oacute;n</font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">:</font></td>
          <td ><font size="2" face="Arial, Helvetica, sans-serif">
            <textarea cols="50" rows="5" name="txtdireccion" id="txtdireccion"><?php echo $_POST['txtdireccion']; ?></textarea>
          </font></td>

        </tr>
		<tr bgcolor="">
          <td ><font size="2" face="Arial, Helvetica, sans-serif">Observaci&oacute;n</font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">:</font></td>
          <td ><font size="2" face="Arial, Helvetica, sans-serif">
            <textarea cols="50" rows="5" name="txtobs" id="txtobs"><?php echo $_POST['txtobs']; ?></textarea>
          </font></td>

        </tr>
        
        
        
    

<tr><td colspan="2" height="50" align="center" class="tb-tit" ><INPUT type="submit" name="guardar" value="Guardar"></td></tr>
    </tr>

  </table>

</form>



        </div>
        <hr class="clear-contentunit" />          

        <!-- Content unit - One column -->
        
      </div>
                
      <!-- B.3 SUBCONTENT -->
     
      
    <!-- C. FOOTER AREA -->      

    <div class="footer">
      
    </div>      
  </div> 
  
</body>
</html>

