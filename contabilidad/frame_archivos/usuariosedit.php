<?
require_once 'lib/config.php';
require_once 'lib/common.php';
include ("header.php");
?>
<BODY>
<?php 
 $accion= $_GET['accion'];
 
 if ($accion=='modificar')
 {
   $valor_boton  = 'Modificar';
   $url_dinamico = 'usuariosedit_sql.php?Accion=Modificar';
 } else if ($accion=='agregar')
 {
   $valor_boton = 'Agregar';
   $url_dinamico = 'usuariosedit_sql.php?Accion=Agregar';
 } 

 include("config_bd.php"); // archivo que llama a la base de datos 

 $result = mysql_query("SELECT Nivacca, Nivaccp, Nivaccc, Nivacci  FROM cwconfig", $conectar); 
 $row = mysql_fetch_row($result);    
 $act_usu_cnmi = "$row[0]";
 $pas_usu_cnmi = "$row[1]";
 $pat_usu_cnmi = "$row[2]";
 $gpe_usu_cnmi = "$row[3]";
 
 
 if ($accion=='modificar')
 {
   $cod_usu = $_GET['cod_usu'];
   
   $result = mysql_query("SELECT * FROM cwconusu WHERE Codusu ='$cod_usu'", $conectar); 
   $row = mysql_fetch_row($result);    
   
   $Nomusu       = "$row[2]";
   $Admin        = "$row[3]";
   $Claveusu     = "$row[4]";
   $Nivelusu     = "$row[5]";
   $Cractas      = "$row[6]";
   $Contabiliza  = "$row[7]";
   $Anula        = "$row[8]";
   $Repctas      = "$row[9]";
   $Repcomp      = "$row[10]";
   $Repanali     = "$row[11]";
   $Repbalcom    = "$row[12]";
   $Repbalgen    = "$row[13]";
   $Repganper    = "$row[14]";
   $Repotros     = "$row[15]";
   $Presupuesto  = "$row[16]";
   $Conciliacion = "$row[17]";
 }
?>
<?
titulo("Mantenimiento Usuarios","","usuarioslist.php","21");
?>
<TABLE width="100%">
  <TBODY>
  <TR>
    <TD class=row-br>
    <form name="Editar" method="post" action="<?php echo $url_dinamico?>"><pre><span class="Estilo4">
Nombre:&nbsp;&nbsp;<input 
            name=Nomusu id="cod_emp3" size=70 onBlur="javascript:this.value=this.value.toUpperCase()"  value="<?php if ($accion=='modificar') echo "$Nomusu"?>"><br> 
Usuario:&nbsp;&nbsp;<?php
			   if ($accion=='modificar')
               {
                 echo "<input name=cod_usu id='cod_usu' value='$cod_usu' readonly size=10 onBlur='javascript:this.value=this.value.toUpperCase()'>";
               } else if($accion=='agregar')
               {
                 echo '<input name=cod_usu id="cod_usu" value="" size=10 onBlur="javascript:this.value=this.value.toUpperCase()">';
               }        			
			?> 
<br>Contrase&ntilde;a:&nbsp;&nbsp;<input  type="password"
            name=Claveusu id="Claveusu"  size=35  value="<?php if ($accion=='modificar') echo "$Claveusu"?>">    Administrador:   <SELECT name=Admin size="1" id="Admin" 
            style="FONT-SIZE: 10px; FONT-FAMILY: Verdana">               <?php if ($accion=='modificar')
			  {
			    if ($Admin=='1')
				{
				  echo '<option selected value="1">SI</option>';
                  echo '<option value="0">NO</option>';
				} else if ($Admin=='0')
			    {
				  echo '<option value="1">SI</option>';
                  echo '<option selected value="0">NO</option>';
				}
			  } else if ($accion=='agregar')
			  {
				echo '<option value="1">SI</option>';
                echo '<option value="0">NO</option>';
		      }
			  ?>              </SELECT>    Nivel de acceso a cuentas:  <SELECT name=Nivelusu id="Nivelusu" 
            style="FONT-SIZE: 10px;  FONT-FAMILY: Verdana"> 			<?php if ($accion=='modificar')
			  {
			    switch($Nivelusu)
				{
				  case "1":
				    echo '<option selected value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break; 

				  case "2":
				    echo '<option value="1">1</option>';
                    echo '<option selected value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break;
					
				  case "3":
				    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option selected value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break;
					
				  case "4":
				    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option selected value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break;														

				  case "5":
				    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option selected value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break;
					
				  case "6":
				    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option selected value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break;
					
				  case "7":
				    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option selected value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break;
					
				  case "8":
				    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option selected value="8">8</option>';
                    echo '<option value="9">9</option>';
                    break;
					
				  case "9":
				    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
					echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '<option value="6">6</option>';
                    echo '<option value="7">7</option>';
                    echo '<option value="8">8</option>';
                    echo '<option selected value="9">9</option>';
                    break;			
				} 
			  } else if ($accion=='agregar')
			  {
			    echo '<option value="1">1</option>';
                echo '<option value="2">2</option>';
				echo '<option value="3">3</option>';
                echo '<option value="4">4</option>';
                echo '<option value="5">5</option>';
                echo '<option value="6">6</option>';
                echo '<option value="7">7</option>';
                echo '<option value="8">8</option>';
                echo '<option value="9">9</option>';
			  }
			  ?>                            </SELECT>

Crea cuentas:               <SELECT name="Cractas" id="Cractas" 
            style="FONT-SIZE: 10px; FONT-FAMILY: Verdana">               <?php if ($accion=='modificar')
			  {
			    if ($Cractas=='1')
				{
				  echo '<option selected value="1">SI</option>';
                  echo '<option value="0">NO</option>';
				} else if ($Cractas=='0')
			    {
				  echo '<option value="1">SI</option>';
                  echo '<option selected value="0">NO</option>';
				}
			  } else if ($accion=='agregar')
			  {
				echo '<option value="1">SI</option>';
                echo '<option value="0">NO</option>';
		      }
			  ?>              </SELECT>     Emite reportes de comprobaci&oacute;n:                   <select name="Repbalcom" id="Repbalcom" 
            style="FONT-SIZE: 10px; FONT-FAMILY: Verdana">       <?php if ($accion=='modificar')
			  {
			    if ($Repbalcom=='1')
				{
				  echo '<option selected value="1">SI</option>';
                  echo '<option value="0">NO</option>';
				} else if ($Repbalcom=='0')
			    {
				  echo '<option value="1">SI</option>';
                  echo '<option selected value="0">NO</option>';
				}
			  } else if ($accion=='agregar')
			  {
				echo '<option value="1">SI</option>';
                echo '<option value="0">NO</option>';
		      }
			  ?>           </select>
Contabiliza comprobante:    <SELECT name="Contabiliza" id="Contabiliza" 
            style="FONT-SIZE: 10px; FONT-FAMILY: Verdana">             <?php if ($accion=='modificar')
			  {
			    if ($Contabiliza=='1')
				{
				  echo '<option selected value="1">SI</option>';
                  echo '<option value="0">NO</option>';
				} else if ($Contabiliza=='0')
			    {
				  echo '<option value="1">SI</option>';
                  echo '<option selected value="0">NO</option>';
				}
			  } else if ($accion=='agregar')
			  {
				echo '<option value="1">SI</option>';
                echo '<option value="0">NO</option>';
		      }
			  ?>           </SELECT>     Emite reportes de ganancias y p&eacute;rdidas:           <SELECT name="Repganper" id="Repganper" 
            style="FONT-SIZE: 10px; FONT-FAMILY: Verdana">               <?php if ($accion=='modificar')
			  {
			    if ($Repganper=='1')
				{
				  echo '<option selected value="1">SI</option>';
                  echo '<option value="0">NO</option>';
				} else if ($Repganper=='0')
			    {
				  echo '<option value="1">SI</option>';
                  echo '<option selected value="0">NO</option>';
				}
			  } else if ($accion=='agregar')
			  {
				echo '<option value="1">SI</option>';
                echo '<option value="0">NO</option>';
		      }
			  ?>             </SELECT> 
Tiene acceso a presupuestos:<SELECT name="Presupuesto" id="Presupuesto" 
            style="FONT-SIZE: 10px; FONT-FAMILY: Verdana">               <?php if ($accion=='modificar')
			  {
			    if ($Presupuesto=='1')
				{
				  echo '<option selected value="1">SI</option>';
                  echo '<option value="0">NO</option>';
				} else if ($Presupuesto=='0')
			    {
				  echo '<option value="1">SI</option>';
                  echo '<option selected value="0">NO</option>';
				}
			  } else if ($accion=='agregar')
			  {
				echo '<option value="1">SI</option>';
                echo '<option value="0">NO</option>';
		      }
			  ?>             </SELECT>     Emite reportes de otros:                          <select name="Repotros" id="Repotros" 
            style="FONT-SIZE: 10px; FONT-FAMILY: Verdana">               <?php if ($accion=='modificar')
			  {
			    if ($Repotros=='1')
				{
				  echo '<option selected value="1">SI</option>';
                  echo '<option value="0">NO</option>';
				} else if ($Repotros=='0')
			    {
				  echo '<option value="1">SI</option>';
                  echo '<option selected value="0">NO</option>';
				}
			  } else if ($accion=='agregar')
			  {
				echo '<option value="1">SI</option>';
                echo '<option value="0">NO</option>';
		      }
			  ?>             </select>
Emite reportes anal&iacute;ticos:  <SELECT name="Repanali" id="Repanali" 
            style="FONT-SIZE: 10px; FONT-FAMILY: Verdana">               <?php if ($accion=='modificar')
			  {
			    if ($Repanali=='1')
				{
				  echo '<option selected value="1">SI</option>';
                  echo '<option value="0">NO</option>';
				} else if ($Repanali=='0')
			    {
				  echo '<option value="1">SI</option>';
                  echo '<option selected value="0">NO</option>';
				}
			  } else if ($accion=='agregar')
			  {
				echo '<option value="1">SI</option>';
                echo '<option value="0">NO</option>';
		      }
			  ?>             </SELECT>     Emite reportes de cuentas:                        <SELECT name="Repctas" id="Repctas" 
            style="FONT-SIZE: 10px; FONT-FAMILY: Verdana">               <?php if ($accion=='modificar')
			  {
			    if ($Repctas=='1')
				{
				  echo '<option selected value="1">SI</option>';
                  echo '<option value="0">NO</option>';
				} else if ($Repctas=='0')
			    {
				  echo '<option value="1">SI</option>';
                  echo '<option selected value="0">NO</option>';
				}
			  } else if ($accion=='agregar')
			  {
				echo '<option value="1">SI</option>';
                echo '<option value="0">NO</option>';
		      }
			  ?>             </SELECT> 
Tiene acceso a conciliaci&oacute;n:<SELECT name="Conciliacion" id="Conciliacion" 
            style="FONT-SIZE: 10px; FONT-FAMILY: Verdana">               <?php if ($accion=='modificar')
			  {
			    if ($Conciliacion=='1')
				{
				  echo '<option selected value="1">SI</option>';
                  echo '<option value="0">NO</option>';
				} else if ($Conciliacion=='0')
			    {
				  echo '<option value="1">SI</option>';
                  echo '<option selected value="0">NO</option>';
				}
			  } else if ($accion=='agregar')
			  {
				echo '<option value="1">SI</option>';
                echo '<option value="0">NO</option>';
		      }
			  ?>             </SELECT>     Emite reportes de comprobantes:                   <SELECT name="Repcomp" id="Repcomp" 
            style="FONT-SIZE: 10px; FONT-FAMILY: Verdana">               <?php if ($accion=='modificar')
			  {
			    if ($Repcomp=='1')
				{
				  echo '<option selected value="1">SI</option>';
                  echo '<option value="0">NO</option>';
				} else if ($Repcomp=='0')
			    {
				  echo '<option value="1">SI</option>';
                  echo '<option selected value="0">NO</option>';
				}
			  } else if ($accion=='agregar')
			  {
				echo '<option value="1">SI</option>';
                echo '<option value="0">NO</option>';
		      }
			  ?>             </SELECT>  
Anula comprobantes:         <select name="Anula" id="Anula" 
            style="FONT-SIZE: 10px; FONT-FAMILY: Verdana">             <?php if ($accion=='modificar')
			  {
			    if ($Anula=='1')
				{
				  echo '<option selected value="1">SI</option>';
                  echo '<option value="0">NO</option>';
				} else if ($Anula=='0')
			    {
				  echo '<option value="1">SI</option>';
                  echo '<option selected value="0">NO</option>';
				}
			  } else if ($accion=='agregar')
			  {
				echo '<option value="1">SI</option>';
                echo '<option value="0">NO</option>';
		      }
			  ?>           </select>     Emite reportes de balance general:                <SELECT name="Repbalgen" id="Repbalgen" 
            style="FONT-SIZE: 10px; FONT-FAMILY: Verdana">               <?php if ($accion=='modificar')
			  {
			    if ($Repbalgen=='1')
				{
				  echo '<option selected value="1">SI</option>';
                  echo '<option value="0">NO</option>';
				} else if ($Repbalgen=='0')
			    {
				  echo '<option value="1">SI</option>';
                  echo '<option selected value="0">NO</option>';
				}
			  } else if ($accion=='agregar')
			  {
				echo '<option value="1">SI</option>';
                echo '<option value="0">NO</option>';
		      }
			  ?>             </SELECT>
<!--
</span><span class="ewGroupAggregate Estilo4">NIVELES DE ACCESO A CUENTAS DE:
</span><span class="Estilo4">Activo usuarios con nivel mayor o igual:    <input 
            name=act_usu_cnmi id="act_usu_cnmi" readonly size=08 value='<?php echo "$act_usu_cnmi"?>'>     Patrimonio usuarios con nivel mayor o igual:  <input 
            name=pat_usu_cnmi id="cod_emp6" readonly size=08 value='<?php echo "$pat_usu_cnmi"?>'> 
Pasivo usuarios con nivel mayor o igual:  <input 
            name=pas_usu_cnmi id="cod_emp5" readonly size=08  value='<?php echo "$pas_usu_cnmi"?>'>     Gan. per. usuarios con nivel mayor o igual:      <input 
            name=gpe_usu_cnmi id="cod_emp7" readonly size=08 value='<?php echo "$gpe_usu_cnmi"?>'><input name="Codigo" type="hidden" id="Codigo" value='<?php echo "$cod_usu"?>'></span></pre>
            -->
<input name="Codigo" type="hidden" id="Codigo" value='<?php echo "$cod_usu"?>'>
                                                 <input name="Modificar" type="submit" id="Modificar" value='<?php echo "$valor_boton"?>'>
            </form>
            </TD>
          </TR>
        </TBODY></TABLE>
      </DIV></TD></TR></TBODY></TABLE></BODY></HTML>


