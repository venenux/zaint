<?
require_once 'lib/config.php';
require_once 'lib/common.php';
include ("header.php");
?>
<SCRIPT type="text/javascript">
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




<style type="text/css">
<!--
.Estilo4 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.Estilo5 {font-size: 12px}
-->
</style>

<BODY>
<?php 
 $accion= $_GET['accion'];
 $pagina=@$_GET['pagina'];
 
 if ($accion=='modificar')
 {
   $valor_boton  = 'Modificar';
   $url_dinamico = 'cwconcueedit_sql.php?Accion=Modificar&pagina='.$pagina;  
 } else if ($accion=='agregar')
 {
   $valor_boton = 'Agregar';
   $url_dinamico = 'cwconcueedit_sql.php?Accion=Agregar&pagina='.$pagina;
 } 

 include("config_bd.php"); // archivo que llama a la base de datos 

 $result_cifras = mysql_query("SELECT * FROM cwconfig", $conectar); 
 $row_cifras    = mysql_fetch_row($result_cifras);    
 $Niv1 = ((integer)$row_cifras[10]);
 
 
 
 if ($accion=='modificar')
 {
   $codigo= $_GET['Cuenta'];
   
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
   $Descripalt = "$row[18]";
   $Fiscaltipo = "$row[19]";
   $Tipocosto  = "$row[20]";

   $result = mysql_query("SELECT Fiscaltipo FROM cwconcue WHERE Cuenta ='$codigo'", $conectar); 
   $row = mysql_fetch_row($result);    
   $Fiscaltipo = "$row[0]";
   
   
  
   
 }
?>
<?
titulo_mejorada("Cuentas de primer nivel","","cwconcuelist.php?pagina=$pagina","Imagenes/cuentas2");
?>
<TABLE width="100%">
  <TBODY>
  
  <TR>
    <TD class=row-br>
      <DIV class=tb-body>
      <TABLE cellSpacing=0 cellPadding=4 width="100%" border=0>
        <TBODY>
        <TR>
          <TD colspan="6"><form name="Editar" method="post" action="<?php echo $url_dinamico?>">
            <pre><span class="Estilo4">Cuenta: <?php
			   if ($accion=='modificar')
               {
                 echo "<input name=Cuenta id='Cuenta' value='$Cuenta' readonly size=40>";
               } else if($accion=='agregar')
               {
                 echo '<input name=Cuenta id="Cuenta" value=""  size=40 onBlur="javascript:this.value=Val_num_cod('.$Niv1.',this.value)">';
               }        			
			?>               Nivel de cuenta:  <input name="Nivel" type="text" id="Nivel" value="<?php if ($accion=='modificar') {echo "$Nivel";} else {echo "1";} ?>" size=4 readonly  >

Descripci&oacute;n de cuenta:   <input 
            name=Descrip id="Descrip" size=70 onBlur="javascript:this.value=this.value.toUpperCase()"  value="<?php if ($accion=='modificar') echo "$Descrip"?>"> 

Centros de Costos:  <select name="Ccostos"><?php if ($accion=='modificar')
			  {
			    if ($Ccostos=='1')
				{
				  echo '<option selected value="1">SI</option>';
                  echo '<option value="0">NO</option>';
				} else if ($Ccostos=='0')
			    {
				  echo '<option value="1">SI</option>';
                  echo '<option selected value="0">NO</option>';
				} 
			  } else if ($accion=='agregar')
			  {
				echo '<option value="1">SI</option>';
                echo '<option value="0">NO</option>';
		      }
			  ?>              </select>   Terceros:  <select name="Terceros"><?php if ($accion=='modificar')
			  {
			    if ($Terceros=='1')
				{
				  echo '<option selected value="1">SI</option>';
                  echo '<option value="0">NO</option>';
				} else if ($Terceros=='0')
			    {
				  echo '<option value="1">SI</option>';
                  echo '<option selected value="0">NO</option>';
				} 
			  } else if ($accion=='agregar')
			  {
				echo '<option value="1">SI</option>';
                echo '<option value="0">NO</option>';
		      }
			  ?> </select>  Tipo Fiscal:  <select name="Fiscaltipo"><?php if ($accion=='modificar')
			  {
			    if ($Fiscaltipo=='0')
				{
				  echo '<option selected value="0">NINGUNO</option>';
                  echo '<option value="1">FIJO</option>';
				  echo '<option value="2">VARIABLE</option>';
				} else if ($Fiscaltipo=='1')
			    {
				  echo '<option value="0">NINGUNO</option>';
                  echo '<option selected value="1">FIJO</option>';
				  echo '<option value="2">VARIABLE</option>';
		    	} else if ($Fiscaltipo=='2')
			    {
				  echo '<option value="0">NINGUNO</option>';
                  echo '<option value="1">FIJO</option>';
				  echo '<option selected value="2">VARIABLE</option>';
				} 
			  } else if ($accion=='agregar')
			  {
                echo '<option value="0">NINGUNO</option>';
                echo '<option value="1">FIJO</option>';
				echo '<option value="2">VARIABLE</option>';
		      }
			  ?></select>   Tipo Costo:  <select name="Tipocosto"><?php if ($accion=='modificar')
			  {
			if ($Tipocosto=='0')
			{
				echo '<option selected value="0">ACTIVO</option>';
                  		echo '<option value="1">PASIVO</option>';
				echo '<option value="2">RESULTADO</option>';
			} 
			elseif($Tipocosto=='1')
			    {
				echo '<option value="0">ACTIVO</option>';
                  		echo '<option selected value="1">PASIVO</option>';
				echo '<option value="2">RESULTADO</option>';
		    	} else if ($Tipocosto=='2')
			    {
				echo '<option value="0">ACTIVO</option>';
                  		echo '<option value="1">PASIVO</option>';
				echo '<option selected value="2">RESULTADO</option>';
				} 
			  } else if ($accion=='agregar')
			  {
				  echo '<option value="0">ACTIVO</option>';
				echo '<option value="1">PASIVO</option>';
				  echo '<option value="2">RESULTADO</option>';
		      }
			  ?></select>

Cuenta Alterna:   <input 
            name=Cuentalt id="Cuentalt" size=40 onBlur="javascript:this.value=this.value.toUpperCase()"  value="<?php if ($accion=='modificar') echo "$Cuentalt"?>"> </span> 

<span class="Estilo4">Descripci&oacute;n Cuenta Alterna:   <input 
            name=Descripalt id="Descripalt" size=70 onBlur="javascript:this.value=this.value.toUpperCase()"  value="<?php if ($accion=='modificar') echo "$Descripalt"?>"> </span><span class="Estilo4"><input name="Codigo" type="hidden" id="Codigo" value='<?php echo "$codigo"?>'></span></pre>
            
              <input name="Modificar" type="submit" id="Modificar" value='<?php echo "$valor_boton"?>'>
            </form>
            </TD>
          </TR>
        </TBODY></TABLE>
      </DIV></TD></TR></TBODY></TABLE></BODY></HTML>


