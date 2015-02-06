<?php 
session_start();
ob_start();
include("../header.php");
include("func_bd.php");	
include("../lib/common.php");

?>
<html>
<head>

<script language="JavaScript" type="text/javascript">

function AbrirConstancia(id)
{
AbrirVentana('rpt_constancia_personal2.php?registro_id='+id,800,800,0);
//AbrirVentana('rpt.php?registro_id='+id,660,800,0);

}

function AbrirRecibo(recibos,tipnom)
{
AbrirVentana('config_rpt_nomina2.php?opcion=general'+'&registro_id='+recibos+'&tipnom='+tipnom,800,850,0);
//AbrirVentana('rpt.php?registro_id='+id,660,800,0);

}

function cargar_foto(){
	var archivo=document.getElementById("mifichero")
	var imagen=document.getElementById("imgFoto")
	var cadena=archivo.value.split("/")
	var cantidad=cadena.length
}
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
       return false

    //compruebo que los ano, mes, dia son correctos
    var ano
    ano = parseInt(array_fecha[2]);
    if (isNaN(ano))
       return false

    var mes
    mes = parseInt(array_fecha[1]);
    if (isNaN(mes))
       return false

    var dia
    dia = parseInt(array_fecha[0]);
    if (isNaN(dia))
       return false


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


function VerCamposAdicionales(){
AbrirVentana('otrosdatos_integrantes.php?txtficha='+document.frmAgregarIntegrantes.txtficha.value,600,620,0);
}
function VerFamiliares(){
AbrirVentana('familiares.php?txtficha='+document.frmAgregarIntegrantes.txtficha.value,600,720,0);
}
function Actualizar_Foto() { 
		var archivo=document.getElementById("mifichero").value
		var long=archivo.length
		var i=0,cont
		cont=long
		
		while(archivo[cont-1]!='/'){
		i++
		cont--
		}
		//alert("antes"+archivo.substr(cont,i)+"despues")
		
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
//function mostrar_div_periodos(valor){
	
	
/*	var div_fin=document.getElementById("div_fin_periodo")
	var div_inicio=document.getElementById("div_inicio_periodo")
	if(valor!="Fijo"){
		div_fin.style.visibility="visible"
		div_inicio.style.visibility="visible"
	}else{
		div_fin.style.visibility="hidden"
		div_inicio.style.visibility="hidden"
	}
}*/
</script>



<?php 	

	//if ($registro_id==0){ // Si el registro_id es 0 se va a agregar un registro nuevo

$conexion = conexion();


$temp2=$_POST['txtFechaIngreso'];
if($temp2[4]!='-' && $temp2[7]!='-')
{
   $fecha1=fecha_sql($_POST['txtFechaIngreso']);
   
}else{
	$fecha1=$_POST['txtFechaIngreso'];
}

$cedula=$_GET['cedula'];
$consulta="select * from nompersonal where cedula='".$cedula."'";
$result=query($consulta,$conexion);	

$fila=fetch_array($result);

?>

<form action="ed_maestro_integrantes.php" method="post" name="frmAgregarIntegrantes" id="frmAgregarIntegrantes" enctype="multipart/form-data">
<input name="op_tp" type="Hidden" id="op_tp" value="-1">
<input name="registro_id" type="Hidden" id="registro_id" value="<?php echo $_POST[registro_id]; ?>">

<table align="center" width="1100" border="0">
  <tbody>
<tr><TD colspan="3" class="tb-tit" align="right"><? echo btn("back","menu_consultas.php")?></TD></tr>
<tr><TD colspan="3"><br></TD></tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">Nomina: </font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
             
              <?php
	 	$query="select codtip,descrip from nomtipos_nomina";
		$result=query($query,$conexion);	
		$tiponomina=$fila['tipnom'];
	 	  //ciclo para mostrar los datos
  		while ($row = fetch_array($result))
  		{ 		
		// option de modificar, se selecciona la situacion del registro a modificar				
  		if ($row[codtip]==$tiponomina){ 
		?>
              <input size="50" type="text" value="<?php  echo $row[descrip];?>"  >
              <?php 
		}
		 
		}//fin del ciclo while
		?>
          
          </font></td>
      <td rowspan="7"><img src="<?echo $fila['foto']?>" lowsrc="<?echo $fila['foto']?>" border="1" name="imgFoto" id="imgFoto"
	   width="177" height="179" align="middle" class="" style="top:0px"></td>
    </tr>
    <tr>
      <td><font size="2" face="Arial, Helvetica, sans-serif">No de Ficha:</font></td>
      <td><font size="2" face="Arial, Helvetica, sans-serif">
            <input name="txtficha" type="text" id="txtficha" size="10" value="<?php echo $fila['ficha'] ?>" maxlength="20"></td>
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
<table align="center" width="1100" border="0" class="">



        <tr >
          <td width="200"><font size="2" face="Arial, Helvetica, sans-serif">Apellidos:</font></td>
          <td width="500" ><font size="2" face="Arial, Helvetica, sans-serif"><input name="txtapellidos" type="text" disabled="true" id="txtapellidos" style="width:200px" value="<?php echo $fila['apellidos']; ?>" maxlength="30">
          </font></td>
		
          <td width="200"><font size="2" face="Arial, Helvetica, sans-serif">Nombres</font>:</td>
          <td width="350"><font size="2" face="Arial, Helvetica, sans-serif"><input name="txtnombres" disabled="true" type="text" id="txtnombres" style="width:200px" value="<?php echo $fila['nombres']; ?>" maxlength="30">
          </font></td>
		</tr>
			<tr>
          <td ><font size="2" face="Arial, Helvetica, sans-serif">C&eacute;dula:</font></td>
          <td ><font size="2" face="Arial, Helvetica, sans-serif">
            <input disabled="true" name="txtcedula" type="text" id="txtcedula" style="width:100px" value="<?=$fila['cedula']?>" maxlength="10">
          </font></td>
			
          <td><font size="2" face="Arial, Helvetica, sans-serif">Nacionalidad:</font></td>
          <td><font size="2" face="Arial, Helvetica, sans-serif">
            <input  name="optNacionalidad" type="radio" value="0"
	    <?php if ($fila['nacionalidad']==0)
					{?> 
						checked="true" 
			<?php }?> >
            Venezolano
            <input name="optNacionalidad" type="radio" value="1"
		<?php if ($fila['nacionalidad']==1){?> checked= "true" <?php }?>>
            Extranjero</font> <font size="2" face="Arial, Helvetica, sans-serif">

            </font></td>
			</tr>
          <td ><font size="2" face="Arial, Helvetica, sans-serif">Sexo: </font></td>
          <td ><span ><font size="2" face="Arial, Helvetica, sans-serif">
            <input  name="optSexo" type="radio" value="Masculino" <?if($fila['sexo']=="Masculino"){?> checked="true"<?}?>>Masculino<input name="optSexo" type="radio" value="Femenino" <?if($fila['sexo']=="Femenino"){?> checked="true"<?}?>>
            Femenino</font></span></td>
			
          <td><font size="2" face="Arial, Helvetica, sans-serif">Fecha de Nacimiento:</font></td>
          <td><font size="2" face="Arial, Helvetica, sans-serif">
            <input disabled="true" name="txtFechaNac" type="text" id="txtFechaNac" style="width:100px" value="<?php echo fecha($fila['fecnac']) ?>" maxlength="60" >
          
          </font></td>
		</tr>
		<tr>
          <td ><font size="2" face="Arial, Helvetica, sans-serif">Lugar de Nacimiento: </font></td>
          <td ><font size="2" face="Arial, Helvetica, sans-serif">
				
            <input disabled="true" name="txtlugarNac" type="text" id="txtlugarNac" style="width:200px" value="<?php echo $fila['lugarnac']; ?>" maxlength="20">
          </font></td>
			
          <td ><font size="2" face="Arial, Helvetica, sans-serif">Profesi&oacute;n</font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">:</font></td>
          <td><font size="2" face="Arial, Helvetica, sans-serif">
     


              <?php
		  
	 	$query="select codorg,descrip from nomprofesiones where codorg = '".$fila['codpro']."' ";
		$result=mysql_query($query,$conexion);
		
	 	  //ciclo para mostrar los datos
  		while ($row = mysql_fetch_array($result))
  		{
		   ?>
              <input disabled="true" type="text" size="30" name="prof" value="<?echo $row['descrip'];?>"></n>
              <?php  
		}//fin del ciclo while
		?>
            
          </font></td>
			</tr>
			
          <td ><font size="2" face="Arial, Helvetica, sans-serif">Direcci&oacute;n</font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">:</font></td>
          <td ><font size="2" face="Arial, Helvetica, sans-serif">
            <textarea cols="50" rows="2" name="txtdireccion" id="txtdireccion"><?php echo $row['direccion']; ?></textarea>
          </font></td>
			
          <td ><font size="2" face="Arial, Helvetica, sans-serif">Tel&eacute;fono:</font></td>
          <td  ><font size="2" face="Arial, Helvetica, sans-serif">
            <input disabled="true" name="txttelefonos" type="text" id="txttelefonos" style="width:200px" value="<?php echo $row['telefonos']; ?>" maxlength="20">
          </font></td>
			
        </tr>
        <tr bgcolor="">
          <td ><font size="2" face="Arial, Helvetica, sans-serif">E-Mail:</font></td>
          <td ><font size="2" face="Arial, Helvetica, sans-serif">
            <input disabled="true" name="txtemail" type="text" id="txtemail" style="width:200px"  value="<?php echo $row['email']; ?>" maxlength="40" >
          </font></td>
			
          <td  ><font size="2" face="Arial, Helvetica, sans-serif">Situaci&oacute;n:</font></td>
          <td ><font size="2" face="Arial, Helvetica, sans-serif">
          
              <?php
	 	$query="select situacion from nomsituaciones";
		$result=query($query,$conexion);
	 	  //ciclo para mostrar los datos
  		while ($row = fetch_array($result))
  		{ 		
		// option de modificar, se selecciona la situacion del registro a modificar		
  			if ($row['situacion']==$fila['estado'])
			{ ?>
              <input type="text" disabled="true" size="15" value="<?php echo $row['situacion'];?>"> <?php 
			}
			 
		}//fin del ciclo while
		?>
            </select>
          </font></td>
			
        </tr>
        






			<tr bgcolor="">
          <td  ><font size="2" face="Arial, Helvetica, sans-serif">Fecha de Ingreso:</font></td>
          <td  ><font size="2" face="Arial, Helvetica, sans-serif">
            <input  name="txtFechaIngreso" type="text" id="txtFechaIngreso" style="width:100px" value="<?echo fecha($fila['fecing'])?>" onblur="javascript:calcular_antiguedad(txtFechaIngreso);" maxlength="60">

          
          </font></td>
			
          <td><font size="2" face="Arial, Helvetica, sans-serif">Antiguedad</font></td>
          <td  id="antiguedad"><font size="2" face="Arial, Helvetica, sans-serif"><strong> A&#241;os
          </strong></font></td>
			
        </tr>
        <tr bgcolor="">
          <td ><font size="2" face="Arial, Helvetica, sans-serif">Fecha de Inclusi&oacute;n en N&oacute;mina:</font></td>
          <td ><font size="2" face="Arial, Helvetica, sans-serif">
            <input disabled="true" name="txtFechaInclusion" type="text" id="txtFechaInclusion" style="width:100px" value="<?php echo fecha($fila['fecharetiro']); ?>" maxlength="60">
            
          </font></td>
			<td></td>
			<td></td>
        </tr>




        
        <tr bgcolor="">
          <td  ><font size="2" face="Arial, Helvetica, sans-serif">Prestaciones</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">:</font></td>
          <td  ><font size="2" face="Arial, Helvetica, sans-serif">
              <input  name="optPresentacion" type="radio" value="1" <?if($fila['tipopres']=='1'){?> checked="true"<?}?>>
            Fideicomiso
            <input  name="optPresentacion" type="radio" value="2" <?if($fila['tipopres']=='2'){?> checked="true"<?}?>>
            Fondo
            <input  name="optPresentacion" type="radio" value="3" <?if($fila['tipopres']=='3'){?> checked="true"<?}?>>
            Contabilidad &nbsp;</font></td>
          
          <td ><font size="2" face="Arial, Helvetica, sans-serif">Tipo de Cobro: </font></td>
   
          <td  ><font size="2" face="Arial, Helvetica, sans-serif">
            <select disabled="true" name="cboTipocobro" id="select" style="width:200px">
              <option value="Efectivo" <?if($fila['forcob']=='Efectivo'){?> selected="true"<?}?>>
	  Efectivo</option>
              <option value="Cheque" <?if($fila['forcob']=='Cheque'){?> selected="true"<?}?>>
	  Cheque</option>
              <option value="Deposito Ahorro" <?if($fila['forcob']=='Deposito Ahorro'){?> selected="true"<?}?>>
	  Deposito Ahorro</option>
              <option value="Deposito Cta.Corriente" <?if($fila['forcob']=='Deposito Cta.Corriente'){?> selected="true"<?}?>>
	  Deposito Cta.Corriente</option>
              <option value="Deposito F.A.L." <?if($fila['forcob']=='Deposito F.A.L.'){?> selected="true"<?}?>>
	  Deposito F.A.L.</option>
            </select>
          </font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
          
          </tr>
        <tr bgcolor="">
          <td  ><font size="2" face="Arial, Helvetica, sans-serif">Banco:</font></td>
          <td  ><font size="2" face="Arial, Helvetica, sans-serif">
           

              <?php
	 	$query="select cod_ban,des_ban from nombancos";
		$result=query($query,$conexion);
	 	  //ciclo para mostrar los datos
		  
  		while ($row = fetch_array($result))
  		{ 		
		// option de modificar, se selecciona la situacion del registro a modificar		
  		if ($row[cod_ban]==$fila['codbancob']){ ?>
              <input type="text" disabled="true" value="<?php echo $row[des_ban];?>">
              <?php 
		}
		
		}//fin del ciclo while
		?>
            </select>
          </font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>

          
          <td  ><font size="2" face="Arial, Helvetica, sans-serif">Cuenta:</font></td>
          <td  ><font size="2" face="Arial, Helvetica, sans-serif">
            <input disabled="true" name="txtcuenta" type="text" id="txtcuenta" style="width:200px" value="<?echo $fila['cuentacob']?>" maxlength="20">
          </font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
          
          </tr>

       
<?//todo mas fino hasta aqui?>
       
        <tr bgcolor="">
          <td  ><font size="2" face="Arial, Helvetica, sans-serif">Tipo de Contrato:</font></td>
          <td ><table>
<TR>
<TD colspan="2">

<font size="2" face="Arial, Helvetica, sans-serif">
            <input  name="optContrato" type="radio" value="Fijo" <?if($fila['tipemp']=="Fijo"){?> checked="true"<?}?> onclick="javascript:mostrar_div_periodos(this.value)">
            Fijo
            <input  name="optContrato" type="radio" value="Temporal" <?if($fila['tipemp']=="Temporal"){?> checked="true"<?}?> onclick="javascript:mostrar_div_periodos(this.value)">
            Temporal
            <input  name="optContrato" type="radio" value="Contratado" <?if($fila['tipemp']=="Contratado"){?> checked="true"<?}?> onclick="javascript:mostrar_div_periodos(this.value)">
            Contratado
            <input  name="optContrato" type="radio" value="Pasante" <?if($fila['tipemp']=="Pasante"){?> checked="true"<?}?> onclick="javascript:mostrar_div_periodos(this.value)">
            Pasante</font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></TD>
</TR>
			
<TR>
<TD></TD><td></td>
			<td></td></TR></table><!--<font size="2" face="Arial, Helvetica, sans-serif">
            <input name="optContrato" type="radio" value="Fijo" <?if($fila['tipemp']=="Fijo"){?> checked="true"<?}?>>
            Fijo
            <input name="optContrato" type="radio" value="Temporal" <?if($fila['tipemp']=="Temporal"){?> checked="true"<?}?>>
            Temporal
            <input name="optContrato" type="radio" value="Contratado" <?if($fila['tipemp']=="Contratado"){?> checked="true"<?}?>>
            Contratado
            <input name="optContrato" type="radio" value="Pasante" <?if($fila['tipemp']=="Pasante"){?> checked="true"<?}?>>
            Pasante</font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font>--></td>

          <td ><font size="2" face="Arial, Helvetica, sans-serif">Sueldo:</font></td>
          <td  ><font size="2" face="Arial, Helvetica, sans-serif">
            <input disabled="true" name="txtmonto" type="text" id="txtmonto" style="width:100px" value="<?echo $fila['suesal']?>" maxlength="20"></font><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font><font size="2" face="Arial, Helvetica, sans-serif"></font></td>
		
        </tr>
        
        
        <tr bgcolor="">
          <td  ><font size="2" face="Arial, Helvetica, sans-serif">Categoria</font></td>
          <td ><font size="2" face="Arial, Helvetica, sans-serif">
           
              <?php
	 	$query="select * from nomcategorias";
		$result=query($query,$conexion);
	 	  //ciclo para mostrar los datos
		  
  		while ($row = fetch_array($result))
  		{ 		
		// option de modificar, se selecciona la situacion del registro a modificar				
  		if ($row[codorg]==$fila['codcat']){ 
		?>
              <input type="text" disabled="true" value="<?php echo $row[descrip];?>">
              <?php 
		}
		
		}//fin del ciclo while
		?>
            </select>
          </font></td>
			
          <td  ><font size="2" face="Arial, Helvetica, sans-serif">Cargo:</font></td>
          <td><font size="2" face="Arial, Helvetica, sans-serif">


              <?php
	 	$query="select cod_car,des_car from nomcargos";
		$result=query($query,$conexion);
	 	  //ciclo para mostrar los datos
		  
  		while ($row = fetch_array($result))
  		{ 		
		// option de modificar, se selecciona la situacion del registro a modificar				
  			if ($row['cod_car']==$fila['codcargo']){ 
			?>
              <input size="40" type="text" disabled="true" value="<?php echo $row[des_car];?>">
              <?php 
		}
		
		}//fin del ciclo while
		?>
            </select>
          </font></td>
       
			</tr>
<?if ($row_emp[nivel1]==1) {?>
<tr bgcolor="">
          <td >
		  <?php echo $row_emp[nomniv1]; ?>:</td>
          <td ><font size="2" face="Arial, Helvetica, sans-serif">
            <select disabled="true" name="cboNivel1" id="select7" style="width:230px">

			<?php
			
			$query="select * from nomnivel1";
			$result=query($query,$conexion);
			 //ciclo para mostrar los datos
			 
			while ($row = fetch_array($result)){				
			// option de modificar, se selecciona la situacion del registro a modificar					
			if ($row[codorg]==$fila['codnivel1']){ ?>			
				  <option value="<?php echo $row[codorg];?>" selected="true"> <?php echo $row[descrip];?> </option><?php 
			}
			else {// option de agregar			 
			   ?><option value="<?php echo $row[codorg];?>"><?php echo $row[descrip];?></option><?php 
			} 
			}//fin del ciclo while
			?>
            </select>
          </font></td>
			
  <?php 
		  }
		  ?>

<?if ($row_emp[nivel2]==1){?>
        
     
          <td  >
		  <?php echo $row_emp[nomniv2];?>:</td>
		   
          <td ><font size="2" face="Arial, Helvetica, sans-serif">
            <select disabled="true" name="cboNivel2" id="select8" style="width:230px">

            <?php
			$query="select * from nomnivel2";
			$result=query($query,$conexion);
			 //ciclo para mostrar los datos
			while ($row = fetch_array($result)){				
			// option de modificar, se selecciona la situacion del registro a modificar					
			if ($row[codorg]==$fila['codnivel2']){ ?>			
				  <option value="<?php echo $row[codorg];?>" selected="true"> <?php echo $row[descrip];?> </option><?php 
			}
			else {// option de agregar			 
			   ?><option value="<?php echo $row[codorg];?>"><?php echo $row[descrip];?></option><?php 
			} 
			}//fin del ciclo while
			?>
            </select>
          </font></td>
		  
          </tr><?php }?>
<?if ($row_emp[nivel3]==1){?>
<tr>

<td  >
		  <?php echo $row_emp[nomniv3];?>:</td>
          <td ><font size="2" face="Arial, Helvetica, sans-serif">
            <select disabled="true" name="cboNivel3" id="select9" style="width:230px">

			<?php
			$query="select * from nomnivel3";
			$result=query($query,$conexion);
			 //ciclo para mostrar los datos
			while ($row = fetch_array($result)){				
			// option de modificar, se selecciona la situacion del registro a modificar					
			if ($row[codorg]==$fila['codnivel3']){ ?>			
				  <option value="<?php echo $row[codorg];?>" selected="true"> <?php echo $row[descrip];?> </option><?php 
			}
			else {// option de agregar			 
			   ?><option value="<?php echo $row[codorg];?>"><?php echo $row[descrip];?></option><?php 
			} 
			}//fin del ciclo while
			?>
            </select>
          </font></td>
		 
<?php }?>
<?if ($row_emp[nivel4]==1){?>
<td  >
		  <?php echo $row_emp[nomniv4];?>:</td>
          <td  ><font size="2" face="Arial, Helvetica, sans-serif">
            <select disabled="true" name="cboNivel4" id="select10" style="width:230px">
				
			<?php
			$query="select * from nomnivel4";
			$result=query($query,$conexion);
			 //ciclo para mostrar los datos
			while ($row = fetch_array($result)){				
			// option de modificar, se selecciona la situacion del registro a modificar					
			if ($row[codorg]==$fila['codnivel4']){ ?>			
				  <option value="<?php echo $row[codorg];?>" selected > <?php echo $row[descrip];?> </option><?php 
			}
			else {// option de agregar			 
			   ?><option value="<?php echo $row[codorg];?>"><?php echo $row[descrip];?></option><?php 
			} 
			}//fin del ciclo while
			?>
            </select>
          </font></td>

		  </tr><?php }?>
<? if ($row_emp[nivel5]==1){?>
<tr><td >
		  <?php echo $row_emp[nomniv5];?>:</td>
          <td ><font size="2" face="Arial, Helvetica, sans-serif">
            <select disabled="true" name="cboNivel5" id="select11" style="width:230px">
<option>Seleccione un valor</option>
			<?php
			$query="select * from nomnivel5";
			$result=query($query,$conexion);
			 //ciclo para mostrar los datos
			while ($row = fetch_array($result)){				
			// option de modificar, se selecciona la situacion del registro a modificar					
			if ($row[codorg]==$fila['codnivel5']){ ?>			
				  <option value="<?php echo $row[codorg];?>" selected > <?php echo $row[descrip];?> </option><?php 
			}
			else {// option de agregar			 
			   ?><option value="<?php echo $row[codorg];?>"><?php echo $row[descrip];?></option><?php 
			} 
			}//fin del ciclo while
			?>
            </select>
          </font></td>
<td></td>
			<td></td>
		  </tr>
<?php }?>
<? if ($row_emp[nivel6]==1){?>
<tr><td  >
		  <?echo $row_emp[nomniv6];?>:</td>
          <td ><font size="2" face="Arial, Helvetica, sans-serif">
            <select disabled="true" name="cboNivel6" id="select12" style="width:230px">

			<?php
			$query="select * from nomnivel6";
			$result=query($query,$conexion);
			 //ciclo para mostrar los datos
			while ($row = fetch_array($result)){				
			// option de modificar, se selecciona la situacion del registro a modificar					
			if ($row[codorg]==$fila['codnivel6']){ ?>			
				  <option value="<?php echo $row[codorg];?>" selected > <?php echo $row[descrip];?> </option><?php 
			}
			else {// option de agregar			 
			   ?><option value="<?php echo $row[codorg];?>"><?php echo $row[descrip];?></option><?php 
			} 
			}//fin del ciclo while
			?>
            </select>
          </font></td>
<td></td>
			<td></td>
		  </tr>
<?php }?>
<?php if ($row_emp[nivel7]==1){?>
<tr><td >
		  <?echo $row_emp[nomniv7];?>:</td>
          <td ><font size="2" face="Arial, Helvetica, sans-serif">
            <select disabled="true" name="cboNivel7" id="select13" style="width:230px">
	
			<?php
			$query="select * from nomnivel7";
			$result=query($query,$conexion);
			 //ciclo para mostrar los datos
			while ($row = fetch_array($result)){				
			// option de modificar, se selecciona la situacion del registro a modificar					
			if ($row[codorg]==$fila['codnivel7']){ ?>			
				  <option value="<?php echo $row[codorg];?>"> <?php echo $row[descrip];?> </option><?php 
			}
			else {// option de agregar			 
			   ?><option value="<?php echo $row[codorg];?>"><?php echo $row[descrip];?></option><?php 
			} 
			}//fin del ciclo while
			?>
            </select>
          </font></td>
			<td></td>
			<td></td>
		  </tr>
<?php }?>




<tr><td colspan="2" height="50" align="right" class="tb-tit" ><INPUT type="button" onclick="javascript:AbrirConstancia('<?php echo $fila['ficha']; ?>');" name="Constancia" value="Constancia de trabajo"></td><td colspan="2" height="50" align="left" class="tb-tit"> <INPUT type="button" onclick="javascript:AbrirRecibo('<?php echo $fila['ficha']; ?>','<?php echo $fila['tipnom']; ?>');" name="recibo" value="Recibos de pago"></td></tr>
     </table>

</form>
<script language="JavaScript" type="text/javascript">

//mostrar_div_periodos('<?echo $fila['tipemp']?>')

//actualizar('txtFechaNac','fila_edad')

calcular_antiguedad('<?echo fecha($fila['fecing'])?>')
</script>


</body>
</html>
