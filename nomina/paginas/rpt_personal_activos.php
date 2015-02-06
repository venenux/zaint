<?php 
session_start();
ob_start();
?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>
<table align="center" width="100%">
  <tbody>
    <tr>
      <td align="left"><INPUT type="button" name="imp" value="Imprimir" onclick="javascript:imprimir('area_impresion');"></td>
    </tr>
 <tr>
      <td align="left"><hr></td>
    </tr>
  </tbody>
</table>

<div id="area_impresion">

<?php 
include("../lib/common.php");
include ("../header.php");
include ("func_bd.php") ;

$tipo=$_GET[tipo];

if ($tipo==1)
{$estado='Activo';}
elseif ($tipo==2)
{$estado='Inactivo';}
elseif ($tipo==3)
{$estado='Jubilado';}
elseif ($tipo==4)
{$estado='Nuevo';}
elseif ($tipo==5)
{$estado='Suspendido';}
elseif ($tipo==6)
{$estado='Vacaciones';}
elseif ($tipo==7)
{$estado='Egresado';}

$var_sql = "SELECT imagen_izq, imagen_der FROM nomempresa";
$rs = sql_ejecutar($var_sql);
$row_rs = mysql_fetch_array($rs);

$var_imagen_izq = '../paginas/imagenes/logoIzq';;
$var_imagen_der = '../paginas/imagenes/logoDer';
$encabezado=encabezado('','','','','../imagenes/'.$var_imagen_izq,'../imagenes/'.$var_imagen_der);


$query="select * from nomempresa";		
$result=sql_ejecutar($query);	
$row = mysql_fetch_array ($result);	
$nompre_empresa=$row[nom_emp];
$pagina=1;
echo $encabezado;
$date1=date('d/m/Y');
	$date2=date('h:i a');	
	$datos="<TABLE width='743' align='center' border='0'>
		<TR>
			<TD align='right'><strong>Fecha: </strong>$date1</TD>
		</TR>
		<TR>
			<TD align='right'><strong>Hora: </strong>$date2</TD>
		</TR>
		<TR>
			<TD align='right'><strong>P&#225;g.: &nbsp;$pagina</strong></TD>
		</TR>
	</TABLE>";
	echo $datos;	
?>

<table width="743" border="0"  align="center">
<tr>
	<td align="center" style="font-size : 14px;"><strong>LISTADO GENERAL DE PERSONAL (<? echo $estado; ?>)</strong></td>
</tr>
</table>


<table width="743" border="0"  id="lst"  align="center" cellspacing="0" cellpadding="0">
<tr bgcolor="#CCCCCC" >
	<td width="70" height="21" align="center"><div align="left" > <font size="2" face="Arial, Helvetica, sans-serif"><strong> Ficha </strong></font></div></td>
	<td width="90" height="21" align="center"><div align="left" > <font size="2" face="Arial, Helvetica, sans-serif"><strong> Ced&uacute;la </strong></font></div></td>
        <td width="330" align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Apellidos y Nombres</strong></font></td>
        <td width="" height="21" align="center"><div > <font size="2" face="Arial, Helvetica, sans-serif"><strong> Cargo </strong></font></div></td>
        
          </tr>
          <?php
	//$sItemRowClass = " class=\"ewTableRow\"";
	//$sListTrJs = " onmouseover='ew_mouseover(this);' onmouseout='ew_mouseout(this);'";
	?>
        <tr height="10"><TD></TD><TD></TD><TD></TD><TD></TD></tr>
            <?php 
  	//operaciones para paginaciones
	
	$query="select * from
	nompersonal as per
	inner join
	nomtipos_nomina as nom on per.tipnom =nom.codtip 
	inner join 
	nomcargos as car on per.codcargo = car.cod_car
	where per.estado = '$estado' and tipnom='".$_SESSION['codigo_nomina']."'
	order by per.tipnom,per.apenom";		
//per.estado,
	$result=sql_ejecutar($query);	
	//$fila = mysql_fetch_array ($result);	

  	$num_fila = 0;
  	$in=1+(($pagina-1)*5);
	$k=1;
  	//ciclo para mostrar los datos 
	$contador=1;
  	while ($fila = mysql_fetch_array($result))
  	{ 
  	++$contador;
	if($k==1)
	{$nomina=$fila['descrip'];}
	$consulta4 = "SELECT descrip FROM nomprofesiones WHERE codorg = '".$fila['codpro']."' ";
	$resultado4 = sql_ejecutar($consulta4);
	$fetch4 = mysql_fetch_array($resultado4);	
	if(($k==1)||($nomina!=$fila['descrip']))
	{
		echo "<tr height='25' bgcolor='#CCCCCC'><td colspan='3'><strong>$fila[descrip]</strong></td><td></td></tr>";
		$nomina=$fila['descrip'];
		$k=2;
	}
	?>
	<tr>
		<td height="" ><div align="left" ><font size="2" face="Arial, Helvetica, sans-serif">
                <?php 
		  echo $fila['ficha']; 	// Ficha
		  ?>
            </font></div></td>
            <td height="" ><div align="left" ><font size="2" face="Arial, Helvetica, sans-serif">
                <?php 
		  echo $fila[cedula]; 	// cedula de identidad
		  ?>
            </font></div></td>
            <td ><font size="2" face="Arial, Helvetica, sans-serif">
              <?php 
	  		echo $fila[apellidos].', '.$fila[nombres];  	// apellidos y nombres
	  	?>
            </font></td>
            <td ><font size="2" face="Arial, Helvetica, sans-serif">
              <?php 
	  		echo $fetch4['descrip'];//echo number_format($fila[suesal],2,',','.');   	// apellidos y nombres
	  	?>
            </font></td>
           
          </tr>
          <?php
          $contador+=1;
		if($contador >= 90)
	{
?>

<?
      echo "</table> <br><br><br><br>";
      ?>
	<br  style="page-break-after : always;">  
      <?
      echo $encabezado;
      $date1=date('d/m/Y');
      $date2=date('h:i a');	
      $datos="<TABLE width='743' align='center' border='0'>
      <TR>
	    <TD align='right'><strong>Fecha: </strong>$date1</TD>
      </TR>
      <TR>
	    <TD align='right'><strong>Hora: </strong>$date2</TD>
     </TR>
     <TR>
	    <TD align='right'><strong>P&#225;g.: &nbsp;".++$pagina."</strong></TD>
     </TR>
     </TABLE>";
     echo $datos;	
     $contador=1;
     ?>
	
		<table width="743" border="0"  align="center">
		<tr>
		<td align="center" style="font-size : 14px;"><strong>LISTADO GENERAL DE PERSONAL (<? echo $estado; ?>)</strong></td>
		</tr>
		</table>
		<table width="743" border="0"  id="lst"  align="center" cellspacing="0" cellpadding="0">
<tr bgcolor="#CCCCCC" >
	<td width="70" height="21" align="right"><div align="left" > <trong size="2" face="Arial, Helvetica, sans-serif"><strong> Ficha </strong></font></div></td>
	<td width="90" height="21" align="right"><div align="left" > <font size="2" face="Arial, Helvetica, sans-serif"><strong> Ced&uacute;la </strong></font></div></td>
        <td width="330"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Apellidos y Nombres</strong></font></td>
        <td width=""><strong>Cargo</strong></td>
        
          </tr>

		<?
		//echo "<table width='1100'  align='center' border='0'>";
	}
   
  	}//fin del ciclo while
  	//operaciones de paginacion
	$num_fila++;
  	$in++;  
  	?>
          <input name="registro_id" type="hidden" value="">
          <input name="op" type="hidden" value="">
        </table>
      </td>
      <p align="center"></p></td>
    </tr>
  </table>
</div>
  <font size="2" face="Arial, Helvetica, sans-serif">  </font>
</form>
<p>&nbsp;</p>
</body>
</html>

