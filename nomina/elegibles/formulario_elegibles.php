<?php 
session_start();
ob_start();

$termino=$_SESSION['termino'];
include("../lib/common.php");
include("func_bd.php");	
include("../header.php");


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
	$registro_id=$_POST[registro_id];
	$op_tp=$_POST[op_tp];
	$fecha_actual=date("Y-m-d");
	$validacion=0;
	
	$query="select * from nomempresa";
	$result=sql_ejecutar($query);	
	$row_emp = mysql_fetch_array ($result);	
	
	//if ($registro_id==0){ // Si el registro_id es 0 se va a agregar un registro nuevo

	echo $HTTP_POST_FILES['mifichero']['name'];
	if(isset($_POST['guardar'])){
if($_POST['txtficha']!="" && $_POST['txtcedula']!="" && $_POST['txtnombres']!="" && $_POST['txtapellidos']!=""){	
	$filesize = $_FILES['mifichero']['size'];
	$filetype = $_FILES['mifichero']['type'];
	$archivo=$HTTP_POST_FILES['mifichero']['name'];
	if($archivo!="")
	{
		$nombre_archivo1 = $HTTP_POST_FILES['mifichero']['name'];
		$tipo_archivo = $HTTP_POST_FILES['mifichero']['type'];
		$tamano_archivo = $HTTP_POST_FILES['mifichero']['size'];
		if(copy($HTTP_POST_FILES['mifichero']['tmp_name'],"fotos/".$nombre_archivo1)){//move_uploaded_file($HTTP_POST_FILES['mifichero']['tmp_name'], nomina/paginas/fotos."/".$nombre_archivo1)){
       		echo "<div align='center' style=\"background-color : #84225b; color : #fdfdfd; font-family : 'Arial Black'; font-size : 15px;\">EL archivo fue cargado exitosamente</div>";
				chmod("fotos/".$nombre_archivo1, 0777);			
    		}else{
       		echo "<div align='center' style=\"background-color : #84225b; color : #fdfdfd; font-family : 'Arial Black'; font-size : 15px;\">Ocurri&oacute; un problema cargando el archivo</div>";
					
    		}
	}

			
		if ($_POST[cboNivel1]=='') {$cod_nive1=0;} else {$cod_nive1=$_POST[cboNivel1];}
		if ($_POST[cboNivel2]=='') {$cod_nive2=0;} else {$cod_nive2=$_POST[cboNivel2];}
		if ($_POST[cboNivel3]=='') {$cod_nive3=0;} else {$cod_nive3=$_POST[cboNivel3];}
		if ($_POST[cboNivel4]=='') {$cod_nive4=0;} else {$cod_nive4=$_POST[cboNivel4];}
		if ($_POST[cboNivel5]=='') {$cod_nive5=0;} else {$cod_nive5=$_POST[cboNivel5];}
		if ($_POST[cboNivel6]=='') {$cod_nive6=0;} else {$cod_nive6=$_POST[cboNivel6];}
		if ($_POST[cboNivel7]=='') {$cod_nive7=0;} else {$cod_nive7=$_POST[cboNivel7];}
		
		$s_monto=str_replace (".", " ", $_POST[txtmonto]);
		$s_monto=str_replace (",", " ", $s_monto);			
		$temp1=$_POST['txtFechaNac'];
	$temp2=$_POST['txtFechaIngreso'];
	$temp3=$_POST['txtFechaInclusion'];
	if($temp1[4]!='-' && $temp1[7]!='-'){
		$fecha=fecha_sql($_POST['txtFechaNac']);
	}else{
				$fecha=$_POST['txtFechaNac'];
	}
	if($temp2[4]!='-' && $temp2[7]!='-'){
   	$fecha1=fecha_sql($_POST['txtFechaIngreso']);
   
	}else{
			$fecha1=$_POST['txtFechaIngreso'];
	}

	if($temp3[4]!='-' && $temp3[7]!='-'){
			$fecha2=fecha_sql($_POST['txtFechaInclusion']);
	}else{
			$fecha2=$_POST['txtFechaInclusion'];
	}


		$query="INSERT INTO nompersonal (foto,nacionalidad,cedula,apellidos,nombres,apenom,sexo,fecnac,lugarnac,codpro,direccion,telefonos,email,estado,fecing,fecharetiro,ficha,tipopres,forcob,codbancob,cuentacob,codbanlph,cuentalph,tipemp,sueldopro,suesal,tipnom,codcat,codcargo,codnivel1,codnivel2,codnivel3,codnivel4,codnivel5,codnivel6,codnivel7,inicio_periodo,fin_periodo) VALUES 
('fotos/".$nombre_archivo1."',
'".$_POST['optNacionalidad']."',
'".$_POST['txtcedula']."',
'".$_POST['txtapellidos']."',
'".$_POST['txtnombres']."',
'".$_POST['txtapellidos'].", ".$_POST['txtnombres']."',
'".$_POST['optSexo']."',
'".$fecha."',
'".$_POST['txtlugarNac']."',
'".$_POST['cboProfesion']."',
'".$_POST['txtdireccion']."',
'".$_POST['txttelefonos']."',
'".$_POST['txtemail']."',
'".$_POST['cbosituacion']."',
'".$fecha1."',
'".$fecha2."',
'".$_POST['txtficha']."',
'".$_POST['optPresentacion']."',
'".$_POST['cboTipocobro']."',
'".$_POST['cboBancos']."',
'".$_POST['txtcuenta']."',
'".$_POST['cbobancoaux']."',
'".$_POST['txtcuentaaux']."',
'".$_POST['optContrato']."',
'".$s_monto."',
'".$s_monto."',
'".$_POST['cboTipoNomina']."',
'".$_POST['cboCategorias']."',
'".$_POST['cboCargos']."',
'".$cod_nive1."',
'".$cod_nive2."',
'".$cod_nive3."',
'".$cod_nive4."',
'".$cod_nive5."',
'".$cod_nive6."',
'".$cod_nive7."',
'".fecha_sql($_POST['fecha_inicio_contrato'])."',
'".fecha_sql($_POST['fecha_fin_contrato'])."')";


$result=sql_ejecutar($query);	
activar_pagina("maestro_personal.php");				
}else{

if($_POST['txtficha']==""){
	mensaje("Debe introducir una ficha Válida");

}elseif($_POST['txtcedula']==""){
	mensaje("Debe introducir un numero de cédula");
}elseif($_POST['txtnombres']==""){
	mensaje("Debe introducir un nombre");
}elseif($_POST['txtapellidos']==""){
	mensaje("Debe introducir un apellido");
}



}
}

$consulta="select tipoficha from nomempresa";
$resultadoempresa=sql_ejecutar($consulta);	

$filaempresa=mysql_fetch_array($resultadoempresa);

if($filaempresa['tipoficha']==1){
$consulta="select max(ficha) as valor from nompersonal where tipnom='".$_SESSION['codigo_nomina']."'";
$result=sql_ejecutar($consulta);	

$fila=mysql_fetch_array($result);
$actual=$fila['valor']+1;


}else{

$consulta="select max(ficha) as valor from nompersonal";
$result=sql_ejecutar($consulta);	

$fila=mysql_fetch_array($result);
$actual=$fila['valor']+1;

}


?>
<form action="ag_maestro_integrantes.php" method="post" name="frmAgregarIntegrantes" id="frmAgregarIntegrantes" enctype="multipart/form-data">
<input name="op_tp" type="Hidden" id="op_tp" value="-1">
<input name="registro_id" type="Hidden" id="registro_id" value="<?php echo $_POST[registro_id]; ?>">

<table align="left" width="700" border="0">
  <tbody>
<tr><TD colspan="3" class="tb-tit" align="right"><?echo btn("back","maestro_personal.php")?></TD></tr>
<tr><TD colspan="3"><br></TD></tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif"><?echo $termino?>: </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
            <select name="cboTipoNomina" id="select2" >
              <?php
	 	$query="select codtip,descrip from nomtipos_nomina";
		$result=sql_ejecutar($query);
		$tiponomina=($_SESSION['codigo_nomina']);
	 	  //ciclo para mostrar los datos
  		while ($row = mysql_fetch_array($result))
  		{ 		
		// option de modificar, se selecciona la situacion del registro a modificar				
  		if ($row[codtip]==$tiponomina){ 
		?>
              <option value="<?php echo $row[codtip];?>" selected="true"> <?php echo $row[descrip];?> </option>
              <?php 
		}
		else // option de agregar
		{ 
		   ?>
              <option value="<?php echo $row[codtip];?>"><?php echo $row[descrip];?></option>
              <?php 
		} 
		}//fin del ciclo while
		?>
            </select>
          </font></td>
      <td rowspan="7"><img src="fotos/silueta.gif" lowsrc="fotos/silueta.gif" border="1" name="imgFoto" id="imgFoto"
	   width="177" height="179" align="middle" class="" style="top:0px"></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">No de Ficha:</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtficha" type="text" id="txtficha" size="10" value="<?php echo $actual ?>" maxlength="20"></td>
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
<table align="left" width="700" border="0" class="">

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
          <td><font size="2" face="Arial, Helvetica, sans-serif">Nacionalidad:</font></td>
          <td><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="optNacionalidad" type="radio" value="0"
	    <?php if ($row[nacionalidad]==0){?> checked= "true" <?php }?>>
            <?if($termino!="Planilla"){?>Venezolano<?}else{?>Paname&#241;o<?}?>
            <input name="optNacionalidad" type="radio" value="1"
		<?php if ($row[nacionalidad]==1){?> checked= "true" <?php }?>>
            Extranjero</font> <font size="2" face="Arial, Helvetica, sans-serif">

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
		$result=sql_ejecutar($query);
		
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
          <td ><font size="2" face="Arial, Helvetica, sans-serif">Direcci&oacute;n</font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">:</font></td>
          <td ><font size="2" face="Arial, Helvetica, sans-serif">
            <textarea cols="50" rows="5" name="txtdireccion" id="txtdireccion"><?php echo $_POST['txtdireccion']; ?></textarea>
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
       

<tr><td colspan="2" height="50" align="center" class="tb-tit" ><INPUT type="submit" name="guardar" value="Guardar"></td></tr>
    </tr>
  </table>

</form>

</body>
</html>

