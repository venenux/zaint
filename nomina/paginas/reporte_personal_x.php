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
<?php 
include("../lib/common.php");
include ("../header.php");
include ("func_bd.php");
include ("funciones_nomina.php");

$tipo=$_GET[tipo];

if ($tipo==1)
{$estado='Activo';}



$var_sql = "SELECT imagen_izq, imagen_der FROM nomempresa";
$rs = sql_ejecutar($var_sql);
$row_rs = mysql_fetch_array($rs);

$var_imagen_izq = '/../../imagenes/SiSalud.bmp';
$var_imagen_der = '/../../imagenes/dot.JPG';
$encabezado=encabezado('','','','','../imagenes/SiSalud.bmp'.$var_imagen_izq,'../imagenes/Sisalud.bmp'.$var_imagen_der);

$query="select * from nomempresa";		
$result=sql_ejecutar($query);	
$row = mysql_fetch_array ($result);	
$nompre_empresa=$row[nom_emp];
$pagina=1;

?>
<table align="center" width="600">
  <tbody>
    <tr>
      <td align="right"><INPUT type="button" name="imp" value="Imprimir" onclick="javascript:imprimir('area_impresion');"></td>
    </tr>
    <td align="right"><hr></td>
    </tr>
  </tbody>
</table>
<div id="area_impresion">
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
	<td width="70" height="21" align="right"><div align="left" > <trong size="2" face="Arial, Helvetica, sans-serif"><strong> Ficha </strong></font></div></td>
	<td width="90" height="21" align="right"><div align="left" > <font size="2" face="Arial, Helvetica, sans-serif"><strong> Ced&uacute;la </strong></font></div></td>
        <td width="330"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Apellidos y Nombres</strong></font></td>
        <td  align="center"><strong>F. ingreso</strong></td>
        <td width="65"><div align="center"><strong>Sexo</strong></div></td>
<!--         <td width="12%"><div align="left"> <font size="2" face="Arial, Helvetica, sans-serif"> Situaci&oacute;n </font></div></td> -->
        <td align="center">
        <div align="center" ><font size="2" face="Arial, Helvetica, sans-serif"><strong> Sueldo</strong> </font></div>
            </div></td>
	<td width=""><div align="center">
        <div align="left" ><font size="2" face="Arial, Helvetica, sans-serif"><strong> A&#241;os/Servicios</strong> </font></div>
            </div></td>

          </tr>
          <?php

	?>
        <tr height="10"><TD></TD><TD></TD><TD></TD><TD></TD><TD></TD><TD></TD><TD></TD></tr>
            <?php 
  	//operaciones para paginaciones
	
	$query="select * from 
	nompersonal as per
	inner join 
	nomtipos_nomina as nom on per.tipnom = nom.codtip 
	inner join
	nomcargos as car on per.codcargo = car.cod_car
	where per.estado = '$estado' and tipnom='".$_SESSION ['codigo_nomina']."'
	order by  car.des_car";		
//per.estado,per.apenom, per.tipnom, 
	$result=sql_ejecutar($query);	
	//$fila = mysql_fetch_array ($result);	

  	$num_fila = 0;
  	$in=1+(($pagina-1)*5);
	$k=1;
  	//ciclo para mostrar los datos 
	$contador=1;
  	while ($fila = mysql_fetch_array($result))
  	{ 
  	
	if($k==1)
	{$nomina=$fila['des_car'];}
	$consulta4 = "SELECT descrip FROM nomprofesiones WHERE codorg = '".$fila['codpro']."' ";
	$resultado4 = sql_ejecutar($consulta4);
	$fetch4 = mysql_fetch_array($resultado4);	
	if(($k==1)||($nomina!=$fila['des_car']))
	{
		echo "<tr height='25' bgcolor='#EEEEEE'><td colspan='3'><strong>$fila[des_car]</strong></td><td></td><td></td><td></td><td></td></tr>";
		$nomina=$fila['des_car'];
		$k=2;
	}
	?>
	<tr>
		<td height="20" ><div align="left" ><font size="2" face="Arial, Helvetica, sans-serif">
                <?php 
		  echo $fila['ficha']; 	// cedula de identidad
		  ?>
            </font></div></td>
            <td height="20" ><div align="left" ><font size="2" face="Arial, Helvetica, sans-serif">
                <?php 
		  echo $fila[cedula]; 	// cedula de identidad
		  ?>
            </font></div></td>
            <td ><font size="2" face="Arial, Helvetica, sans-serif">
              <?php 
	  		echo $fila[apellidos].', '.$fila[nombres];  	// apellidos y nombres
	  	?>
            </font></td>
            <td align="center" ><font size="2" face="Arial, Helvetica, sans-serif">
              <?php 
	  		$fecha6 = fecha($fila['fecing']);
			echo $fecha6;
			$fecha6 = fecha_sql($fecha6);//echo number_format($fila[suesal],2,',','.');   	// apellidos y nombres
	  	?>
            </font></td>
            <td ><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
                <?php 
	  		$sexo=$fila['sexo'];
			echo $sexo[0];
	  	?>
            </font></div></td>
<!--             <td ><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"> -->
           <?php 
	  	//echo $fila[estado];   	// 
	  	?>
<!--             </font></div></td> -->
            <td ><div align="center" ><font size="2" face="Arial, Helvetica, sans-serif">
                <?php 
	  	echo number_format($fila['suesal'],2,',','.');//echo $fila[descrip];   	
	  	?>
            </font></div></td>

	<td ><div align="center" ><font size="2" face="Arial, Helvetica, sans-serif">
                <?php 
	  	$fecha7= date('Y/m/d');
		echo antiguedad($fecha6,$fecha7,'A');//echo $fila[descrip];   	
	  	?>
            </font></div></td>

          </tr>
          <?php
		$contador+=1;
		if($contador >= 25)
		{
?>

	 

<?
		echo "</table>";
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
        <td width=""><strong>F. Ingreso</strong></td>
        <td width="65"><div align="center"><strong>Sexo</strong></div></td>
<!--         <td width="12%"><div align="left"> <font size="2" face="Arial, Helvetica, sans-serif"> Situaci&oacute;n </font></div></td> -->
        <td width=""><div align="center">
        <div align="left" ><font size="2" face="Arial, Helvetica, sans-serif"><strong> Sueldo</strong> </font></div>
            </div></td>
	<td width=""><div align="center">
        <div align="left" ><font size="2" face="Arial, Helvetica, sans-serif"><strong>A&#241;os/Servicios</strong> </font></div>
            </div></td>
          </tr>

		<?
	}
   
  	}//fin del ciclo while
  	//operaciones de paginacion
	$num_fila++;
  	$in++;  
  	?>
       </table>
   </td>
    </tr>
  </table>
</div>
</body>
</html>

