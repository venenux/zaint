<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!-- saved from url=(0046)http://asys.no-ip.org/asysadmin/parametros.php -->
<HTML xmlns="http://www.w3.org/1999/xhtml" xmlns:spry = 
"http://ns.adobe.com/spry"><HEAD><TITLE>SELECTRA</TITLE>
<META http-equiv=Content-Type content="text/html; charset=utf-8"><LINK 
href="parametros_archivos/estilos.css" type=text/css rel=stylesheet>


<SCRIPT src="configuracion_archivos/common.js" type=text/javascript></SCRIPT>

<SCRIPT src="configuracion_archivos/xpath.js" type=text/javascript></SCRIPT>

<SCRIPT type=text/javascript>
  function Val_num_cod(longitud, palabra) 
  {
    palabra_validada = '';
    if (palabra.length > longitud)
    {
      palabra_validada = palabra.substring(0, longitud);
	  alert("Su código será recortado por sobrepasar la longitud máxima configurada.");
	  return palabra_validada;
	}
	else
	{
	  num_resta = longitud - palabra.length;
	  if (num_resta > 0) 
	  { 
	    palabra_rellenada = '';
	    for (i=0; i<num_resta; i++)
        {
          palabra_rellenada = palabra_rellenada + '0';
        }	
		palabra_rellenada = palabra_rellenada + palabra;
		return palabra_rellenada;		  
	  }
	  else
	  {
	    return palabra
	  }
	}    
  }
</SCRIPT>


<META content="MSHTML 6.00.2900.2873" name=GENERATOR>
<style type="text/css">
<!--
.Estilo4 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.Estilo5 {font-size: 12px}
-->
</style>
</HEAD>
<BODY>
<?php 
  $accion       = $_GET['accion'];
  $Nivel_Cuenta = $_GET['Nivel_Cuenta'];
  $codigo= $_GET['Cuenta'];
  $pagina= $_GET['pagina'];

  include("config_bd.php"); // archivo que llama a la base de datos 
   
  $result = mysql_query("SELECT * FROM cwconcue WHERE Cuenta ='$codigo'", $conectar); 
  $row = mysql_fetch_row($result);    
   
  $Cuenta     = "$row[0]";

  $Nivel      = "$row[1]";
  $Tipo       = "$row[2]";
  $Descrip    = "$row[3]";
  $Bancos     = "$row[4]";
  $MonPre     = "$row[5]";

  $MonModif   = "$row[6]";
  $FechaNueva = "$row[7]";
  $CtaNueva   = "$row[8]";
  $Auxunico   = "$row[9]";
  $Monetaria  = "$row[10]";

  $Ctaajuste  = "$row[11]";
  $Marca      = "$row[12]";
  $MonPreu    = "$row[13]";
  $MonModify  = "$row[14]";
  $Ccostos    = "$row[15]";

  $Terceros   = "$row[16]";
  $Cuentalt   = "$row[17]";
  $Fiscaltipo = "$row[18]";
  $Tipocosto  = "$row[19]";

  $result = mysql_query("SELECT Fiscaltipo FROM cwconcue WHERE Cuenta ='$codigo'", $conectar); 
  $row = mysql_fetch_row($result);    
  $Fiscaltipo = "$row[0]";

  $result_cifras = mysql_query("SELECT Nromax, Niv1, Niv2, Niv3, Niv4, Niv5, Niv6, Niv7, Niv8, Niv9, Sepacta FROM cwconfig", $conectar); 
  $row_cifras    = mysql_fetch_row($result_cifras);    

  $Nromax = "$row_cifras[0]";

  if ( ((integer)$Nivel) >= ((integer)$Nromax) )
  {
    $Nivel_nueva_str = 'NIVEL NO VALIDO';
  } else
  {
    $Nivel_nueva_int = ((integer)$Nivel) + 1;
    $Nivel_nueva_str = ((string)$Nivel_nueva_int);
  }

  
  switch($Nivel_nueva_str)
  {
    case "1":
      $numero_cifras      = 'Solo '.$row_cifras[1].' cifras permitidas';
	  $numero_cifras_solo = ((integer)$row_cifras[1]);
    break;
    case "2":
      $numero_cifras      = 'Solo '.$row_cifras[2].' cifras permitidas';
	  $numero_cifras_solo = ((integer)$row_cifras[2]);
    break;	
    case "3":
      $numero_cifras      = 'Solo '.$row_cifras[3].' cifras permitidas';
	  $numero_cifras_solo = ((integer)$row_cifras[3]);
    break;	
    case "4":
      $numero_cifras      = 'Solo '.$row_cifras[4].' cifras permitidas';
	  $numero_cifras_solo = ((integer)$row_cifras[4]);
    break;	
    case "5":
      $numero_cifras      = 'Solo '.$row_cifras[5].' cifras permitidas';
	  $numero_cifras_solo = ((integer)$row_cifras[5]);
    break;	
    case "6":
      $numero_cifras      = 'Solo '.$row_cifras[6].' cifras permitidas';
	  $numero_cifras_solo = ((integer)$row_cifras[6]);
    break;	
    case "7":
      $numero_cifras      = 'Solo '.$row_cifras[7].' cifras permitidas';
	  $numero_cifras_solo = ((integer)$row_cifras[7]);
    break;	
    case "8":
      $numero_cifras      = 'Solo '.$row_cifras[8].' cifras permitidas';
	  $numero_cifras_solo = ((integer)$row_cifras[8]);
    break;	
    case "9":
      $numero_cifras      = 'Solo '.$row_cifras[9].' cifras permitidas';
	  $numero_cifras_solo = ((integer)$row_cifras[9]);
    break;
  }
  
  
  
  
?>

<TABLE width="100%">
  <TBODY>
  <TR>
    <TD class=row-br>
      <DIV class=tb-tit>
      <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
        <TBODY>
        <TR>
          <TD><SPAN style="FLOAT: left"><IMG class=icon height=33 src="Imagenes/cuentas2.jpg" 
            width=35>Crear cuentas de niveles secundarios </SPAN></TD>
          <TD align=right>
            <TABLE class=btn_bg style="CURSOR: pointer" 
            onclick="javascript:window.location='cwconcuelist.php?pagina=<?echo $pagina?>';" 
            cellSpacing=0 cellPadding=0 border=0>
              <TBODY>
              <TR>
                <TD 
                style="PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px" 
                align=right><IMG 
                  style="BORDER-TOP-WIDTH: 0px; BORDER-LEFT-WIDTH: 0px; BORDER-BOTTOM-WIDTH: 0px; BORDER-RIGHT-WIDTH: 0px" 
                  height=20 alt="" src="parametros_archivos/bt_left.gif" 
                width=5></TD>
                <TD class=btn_bg><IMG height=16 
                  src="parametros_archivos/ico_up.gif" width=16></TD>
                <TD class=btn_bg 
                style="PADDING-RIGHT: 4px; PADDING-LEFT: 4px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px">Regresar</TD>
                <TD 
                style="PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px" 
                align=left><IMG 
                  style="BORDER-TOP-WIDTH: 0px; BORDER-LEFT-WIDTH: 0px; BORDER-BOTTOM-WIDTH: 0px; BORDER-RIGHT-WIDTH: 0px" 
                  height=20 alt="" src="parametros_archivos/bt_right.gif" 
                  width=5></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></DIV></TD></TR>
  <TR>
    <TD class=row-br>
      <DIV class=tb-body>
      <TABLE cellSpacing=0 cellPadding=4 width="100%" border=0>
        <TBODY>
        <TR>
          <TD colspan="6"><form name="Editar" method="post" action="cwconcueedit_sql.php?Accion=Agregar_sec&pagina=<?echo $pagina?>">
            <pre><span class="Estilo4">
Cuenta prefijo:  <input name="Cuentaprefijo" type="text" id="Cuentaprefijo" value="<?php echo "$Cuenta"?>" size=40 readonly>    Cuenta: <input name=Cuenta id='Cuenta' value="" size=40  onBlur='javascript:this.value=Val_num_cod(<?php echo $numero_cifras_solo?>, this.value)'>   <?php echo $numero_cifras?>  

Descripci&oacute;n de cuenta:   <input 
            name=Descrip id="Descrip" size=70 onBlur="javascript:this.value=this.value.toUpperCase()"  value="">     Nivel de cuenta:  <input name="Nivel_cuenta" type="text" id="Nivel_cuenta2" value="<?php echo "$Nivel_nueva_str"?>" size=15 readonly >

Centros de Costos:  <select name="Ccostos">
				<option value="1">SI</option>
                <option value="0">NO</option></select>   Terceros:  <select name="Terceros">
			    <option value="1">SI</option>
                <option value="0">NO</option></select>  Tipo Fiscal:  <select name="Fiscaltipo">
                <option value="0">NINGUNO</option>
                <option value="1">FIJO</option>
				<option value="2">VARIABLE</option>
				</select>   Tipo Costo:  <select name="Tipocosto">
			    <option value="0">ACTIVO</option>
                <option value="1">PASIVO</option>
				<option value="2">RESULTADO</option></select>

Cuenta Alterna:   <input 
            name=Cuentalt id="Cuentalt" size=40 onBlur="javascript:this.value=this.value.toUpperCase()"  value=""> </span> 

<span class="Estilo4">Descripci&oacute;n Cuenta Alterna:   <input 
            name=Descripalt id="Descripalt" size=70 onBlur="javascript:this.value=this.value.toUpperCase()"  value=""> </span><span class="Estilo4"><input name="Codigo" type="hidden" id="Codigo" value='<?php echo "$codigo"?>'></span></pre>
            
              <?php if ($Nivel_nueva_str == 'NIVEL NO VALIDO') 
			        {
					  echo 'NO PUEDE AGREGAR EL NIVEL ESTA POR ENCIMA DEL MAXIMO CONFIGURADO, REGRESE';
					} else 
					{
					  echo '<input name="Modificar" type="submit" id="Modificar" value="Agregar">';
				    } ?> 
            </form>
            </TD>
          </TR>
        </TBODY></TABLE>
      </DIV></TD></TR></TBODY></TABLE></BODY></HTML>


