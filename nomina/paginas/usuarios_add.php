<?php 
session_start();
ob_start();
?>
<?php

require_once '../lib/common.php';
include ("../header.php");
$conexion=conexion();

$url="usuarios_list";
$modulo="Usuarios";
$tabla="nomusuarios";
$titulos=array("Nombre");
$indices=array("descrip","login_usuario");

if(isset($_POST['aceptar'])){
    $indices=array("1","23","4");
    $consulta="select * from ".$tabla;
    $resultado=query($consulta,$conexion);
    if($_POST['clave']=="" || $_POST['login_usuario']==""){
        echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
        alert(\"Datos imcompletos, no se puede realizar la operacion\")";
        echo "</SCRIPT>";
    }else{
    foreach($indices as $valor){
        $campo=mysql_field_name($resultado,$valor);
        if($cadena_campos=="" && $cadena_valores==""){
        
            $cadena_campos=$cadena_campos.$campo;
            $cadena_valores=$cadena_valores."'".$_POST[$campo]."'";
        }
        else{
            $cadena_campos=$cadena_campos.",".$campo;
            $cadena_valores=$cadena_valores.",'".$_POST[$campo]."'";
        }
    }
    //echo $cadena_campos." ";
    //echo $cadena_valores;
    
    //$consulta="insert into ".$tabla." (".$cadena_campos.") values (".$cadena_valores.")";
    $consulta="INSERT INTO ".$tabla." SET descrip='$_POST[descrip]', login_usuario='$_POST[login_usuario]', clave='".hash("sha256",$_POST[clave])."', acce_configuracion='$_POST[acce_configuracion]', acce_elegibles='$_POST[acce_configuracion]', acce_personal='$_POST[acce_personal]', acce_prestamos='$_POST[acce_configuracion]', acce_consultas='$_POST[acce_consultas]', acce_transacciones='$_POST[acce_transacciones]', acce_procesos='$_POST[acce_procesos]', acce_reportes='$_POST[acce_reportes]', acce_usuarios='$_POST[acce_usuarios]', acce_autorizar_nom='$_POST[acce_autorizar_nom]', acce_enviar_nom='$_POST[acce_enviar_nom]', acce_estuaca='$_POST[acce_estuaca]', acce_xestuaca='$_POST[acce_xestuaca]', acce_permisos='$_POST[acce_permisos]', acce_logros='$_POST[acce_logros]',  acce_penalizacion='$_POST[acce_penalizacion]', acce_movpe='$_POST[acce_movpe]', acce_evalde='$_POST[acce_evalde]', acce_experiencia='$_POST[acce_experiencia]', acce_antic='$_POST[acce_antic]', acce_uniforme='$_POST[acce_uniforme]', acce_generarordennomina='$_POST[acce_generarordennomina]'";
    $resultado=query($consulta,$conexion);
    //echo $consulta;
    //exit(0);
    
    echo"<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
    
    parent.cont.location.href=\"".$url.".php?pagina=1\"
    </SCRIPT>";
    }

}else{

    $consulta="select * from ".$tabla;
    $resultado=query($consulta,$conexion);
}
?>



<html class="fondo">

<head>
<title></title>
<link href="estilos.css" rel="stylesheet" type="text/css">
<SCRIPT language="JavaScript" type="text/javascript" src="lib/common.js">
</SCRIPT>
<script language="javascript" src="cal2.js"></script>
<script language="javascript" src="cal_conf2.js"></script>
<SCRIPT language="JavaScript" type="text/javascript">

function cerrar(retorno){
    parent.cont.location.href=retorno+".php?pagina=1"
}

function contra()
{
    if(this.document.forms.sampleform.clave.value==this.document.forms.sampleform.comprobar.value)
    {
        this.document.forms.sampleform.aceptar.focus();
    }
    else
    {
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
        document.sampleform.acce_generarordennomina.checked=true;
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
        document.sampleform.acce_generarordennomina.checked=false;
    }
}

</SCRIPT>

</head>
<body>

<FORM name="sampleform" method="POST" target="_self" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<TABLE  width="100%" height="100">
<TBODY>

<tr>
      <td colspan="4" height="30" class="tb-tit"><strong>Agregar Nuevo Registro de <? echo $modulo?></strong></td>
    </tr>


    
        <TR><td class=tb-head >Nombre</td>
        <td colspan="3"><INPUT type="text" name="descrip" maxlength="10" value="" size="100"></td>
    
        <TR><td class=tb-head >Usuario</td>
        <td colspan="3"><INPUT type="text" name="login_usuario" maxlength="10" value="" size="100"></td>

        <TR><td class=tb-head >Contrase&#241;a</td>
        <td colspan="3"><INPUT type="password" name="clave" maxlength="15" value="" size="100"></td>
        
        </tr>
        <TR><td class=tb-head >Confirmar Contrase&#241;a</td>
        <td colspan="3"><INPUT type="password" name="comprobar" maxlength="15" size="100" value="" onblur="contra()"></td> </tr>
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
            <td colspan="1"  width="20" class=tb-head ><INPUT type="checkbox"   name="acce_configuracion" value="1" /></td>
            
        </tr>
        <tr>
            <td  class=tb-head>&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Modificar registro de usuarios</td>
            <td colspan="1" ><INPUT type="checkbox"  name="acce_usuarios" value="1" ></td>  
        </tr>
            
        <tr>
            <td class=tb-head   >&#043; M&oacute;dulo de Elegibles</td>
            <td colspan="1" class=tb-head><INPUT type="checkbox"  name="acce_elegibles" value="1" /></td>
            
        </tr>
        <tr>
            <td  class=tb-head  > &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Transferir Elegidos</td>
            <td colspan="1" ><INPUT type="checkbox"  name="acce_transferencia" value="1" size="200"></td>
            
        </tr>
        <tr>
            
            <td class=tb-head  > &#043; M&oacute;dulo de Personal</td>
            <td colspan="1" class=tb-head><INPUT type="checkbox"  name="acce_personal" value="1" ></td>
        </tr>
        <tr>
            <td  class=tb-head>&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Modificar Reg. del Personal</td>
            <td colspan="1" ><INPUT type="checkbox"  name="acce_reg_personal" value="1" ></td>  
        </tr>
        <tr>
            <td  class=tb-head   > &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Agregar registro Estudios academicos (Expediente)</td>
            <td colspan="1" ><INPUT type="checkbox"  name="acce_estuaca" value="1" size="100"></td>
        </tr>
        <tr>
            <td  class=tb-head   > &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Agregar registro Estudios extra academicos (Expediente)</td>
            <td colspan="1" ><INPUT type="checkbox"  name="acce_xestuaca" value="1" size="100"></td>
        </tr>
        <tr>
            <td  class=tb-head   > &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Agregar registro Permisos (Expediente)</td>
            <td colspan="1" ><INPUT type="checkbox"  name="acce_permisos" value="1" size="100"></td>
        </tr>
        <tr>
            <td  class=tb-head   > &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Agregar registro Logros (Expediente)</td>
            <td colspan="1" ><INPUT type="checkbox"  name="acce_logros" value="1" size="100"></td>
        </tr>
        <tr>
            <td  class=tb-head   > &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Agregar registro Penalizaciones (Expediente)</td>
            <td colspan="1" ><INPUT type="checkbox"  name="acce_penalizacion" value="1" size="100"></td>
        </tr>
        <tr>
            <td  class=tb-head   > &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Agregar registro Movimientos de personal (Expediente)</td>
            <td colspan="1" ><INPUT type="checkbox"  name="acce_movpe" value="1" size="100"></td>
        </tr>
        <tr>
            <td  class=tb-head   > &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Agregar registro Evaluacion de desempe&ntilde;o (Expediente)</td>
            <td colspan="1" ><INPUT type="checkbox"  name="acce_evalde" value="1" size="100"></td>
        </tr>
        <tr>
            <td  class=tb-head   > &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Agregar registro Experiencia (Expediente)</td>
            <td colspan="1" ><INPUT type="checkbox"  name="acce_experiencia" value="1" size="100"></td>
        </tr>
        <tr>
            <td  class=tb-head   > &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Agregar registro Anticipo de prest. sociales (Expediente)</td>
            <td colspan="1" ><INPUT type="checkbox"  name="acce_antic" value="1" size="100"></td>
        </tr>
        <tr>
            <td  class=tb-head   > &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Agregar registro Entrega de uniforme (Expediente)</td>
            <td colspan="1" ><INPUT type="checkbox"  name="acce_uniforme" value="1" size="100"></td>
        </tr>
        <tr>
            <td class=tb-head > &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Aumentos</td>
            <td colspan="1" ><INPUT type="checkbox"  name="acce_aumentos" value="1" ></td>
        </tr>
        <tr>
            <td  class=tb-head   > &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Consultar Acumulados</td>
            <td colspan="1" ><INPUT type="checkbox"  name="acce_acumulados" value="1" size="100"></td>
        </tr>
        <tr>
            <td class=tb-head  >&#043; M&oacute;dulo Prestamos</td>
            <td colspan="1" class=tb-head ><INPUT type="checkbox"  name="acce_prestamos" value="1" ></td>
        </tr>
        <tr>    
            <td class=tb-head  > &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Generar Prestamos</td>
            <td colspan="1" ><INPUT type="checkbox"  name="acce_gen_prestamos" value="1" /></td>
        </tr>
        <tr>
            <td  class=tb-head  > &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Mantenimiento de Prestamos</td>
            <td colspan="1" ><INPUT type="checkbox"  name="acce_man_prestamos" value="1" ></td>
        </tr>
        <tr >
            <td class=tb-head >&#043; M&oacute;dulo de Consultas</td>
            <td colspan="1" class=tb-head><INPUT type="checkbox"  name="acce_consultas" value="1" ></td>
        </tr>
        <tr>
            <td  class=tb-head>&#043; M&oacute;dulo de Transacciones</td>
            <td colspan="1" class=tb-head ><INPUT type="checkbox"  name="acce_transacciones" value="1" ></td>
        </tr>
        <tr>
            <td  class=tb-head  >&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Agregar y modificar nominas</td>
            <td colspan="1" ><INPUT type="checkbox"  name="acce_nominas" value="1" ></td>
        
        </tr>
        <tr>
            <td  class=tb-head  >&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Autorizar nominas</td>
            <td colspan="1" ><INPUT type="checkbox"  name="acce_autorizar_nom" value="1" ></td>
        
        </tr>
        <tr>
            <td  class=tb-head  >&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Enviar nominas a presupuesto y cont.</td>
            <td colspan="1" ><INPUT type="checkbox"  name="acce_enviar_nom" value="1" ></td>
        
        </tr>
        <tr>
            <td  class=tb-head  >&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Generar y modificar vacaciones</td>
            <td colspan="1" ><INPUT type="checkbox"  name="acce_vacaciones" value="1" ></td>

        </tr>
        <tr>
            <td class=tb-head  > &#043;M&oacute;dulo de Procesos</td>
            <td colspan="1" class=tb-head ><INPUT type="checkbox"  name="acce_procesos" value="1" > </td>


        </tr>
        <tr>
            <td  class=tb-head  >&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;Generar Orden Tipo Nomina</td>
            <td colspan="1" ><INPUT type="checkbox"  name="acce_generarordennomina" value="1" ></td>

        </tr>
        <tr>
            <td  class=tb-head  >  &#043;M&oacute;dulo de Reportes &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;</td>
            <td colspan="1" class=tb-head><INPUT type="checkbox"  name="acce_reportes" value="1" ></td>
        </tr>
        
        
</table >


<TABLE  width="100%">
    <tr class="tb-tit">
      <td></td>
      <td align="right"><INPUT type="submit" id="aceptar" name="aceptar" value="Aceptar">&nbsp;<INPUT type="button" name="cancelar" value="Cancelar" onclick="javascript:cerrar('<?echo $url?>');"></td>
    </tr>
  </tbody>
</table>
</FORM>
</body>
</html>
<?
cerrar_conexion($conexion);

?>
