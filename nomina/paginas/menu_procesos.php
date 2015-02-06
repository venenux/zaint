<?php 
session_start();
ob_start();
$termino=$_SESSION['termino'];
include "../lib/common.php";

?>

<html  class="fondo">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<style type="text/css">
<!--
.Estilo1 {  font-family: Arial, Helvetica, sans-serif;
    font-size: 12px;
}
-->
</style>
<link href="../estilos.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.Estilo2 {  font-size: 18px;
    font-weight: bold;
}
-->
</style>
</head>

<body>
<?
//titulo_mejorada("Procesos","","","");
?>
<form id="form1" name="form1" method="post" action="">
  <table width="100%" border="0">
  
   <tr class="tb-tit">
      <td height="32" class=""><font color="#000066"><strong>&nbsp;Procesos</strong></font></td>
    </tr>
  
       <tr>
          <td width="106" height="49" valign="middle" class="icon"><table width="454" border="0">
        <tr>
          <td width="106" height="49" align="center" valign="middle" class="icon"><div align="center"><a href="../procesos/filtro_nomina.php?opcion=4" target="_self" ><img src="../imagenes/mercantil.jpeg" title="Generar diskette de <?echo $termino?> para el banco Mercantil" border="0" align="absmiddle" class="icon" /></a></div></td>
          <td width="110" align="center" valign="middle" class="icon"><div align="center"><a href="../procesos/filtro_nomina.php?opcion=7" target="_self" ><img src="../imagenes/Bvenezuela.png" title="Generar diskette de <?echo $termino?> para el banco banco de venezuela" border="0" align="absmiddle" class="icon" /></a></div></td>
          <td width="110" align="center" valign="middle" class="icon"><div align="center"><a href="../procesos/filtro_nomina.php?opcion=1" target="_self" ><img src="../imagenes/provincial.png" title="Generar diskette de <?echo $termino?> para el banco provincial" border="0" align="absmiddle" class="icon" /></a></div></td>
          <td width="110" align="center" valign="middle" class="icon"><div align="center"><a href="../procesos/filtro_nomina.php?opcion=12" target="_self" ><img src="../imagenes/bicentenario.png" width="100" height="86" title="Generar diskette de <?echo $termino?> para el banco bicentenario" border="0" align="absmiddle" class="icon" /></a></div></td>
        </tr>
        <tr>
          <td height="32"><div align="center">TXT banco Mercantil</div></td>
          <td height="32"><div align="center">TXT banco Venezuela</div></td>
          <td height="32"><div align="center">TXT nomina obreros banco Provincial</div></td>
          <td height="32"><div align="center">TXT banco Bicentenario</div></td>
        </tr>
        <tr>
          <td width="110" align="center" valign="middle" class="icon"><div align="center"><a href="" target="_self" ><img src="../imagenes/banesco.png" title="Generar diskette de <?echo $termino?> para el banco banesco" border="0" align="absmiddle" class="icon" /></a></div></td>
           <td width="110" align="center" valign="middle" class="icon"><div align="center"><a href="../procesos/filtro_nomina.php?opcion=6" target="_self" ><img src="../imagenes/1.png" title="Contabilizar Nomina" border="0" align="absmiddle" class="icon" /></a></div></td>
          <td width="110" align="center" valign="middle" class="icon"><div align="center"><a href="../procesos/filtro_nomina.php?opcion=2" target="_self" ><img src="../imagenes/banesco.png" title="Generar diskette de <?echo $termino?> para el banco banesco" border="0" align="absmiddle" class="icon" /></a></div></td>
          <td width="110" align="center" valign="middle" class="icon"><div align="center"><a href="../procesos/filtro_nomina.php?opcion=3" target="_self" ><img src="../imagenes/Bvenezuela.png" title="Generar diskette de <?echo $termino?> para el banco de Venezuela" border="0" align="absmiddle" class="icon" /></a></div></td>
          <td>&nbsp;</td>
          </tr>
        <tr>
          <td height="32"><div align="center">Generar TXT banco Banesco</div></td>
          <td height="32"><div align="center">Contabilizaci&oacute;n de N&oacute;mina</div></td>
          <td height="32"><div align="center">TXT LPH mensual</div></td>
          <td height="32"><div align="center">TXT  LPH mensual</div></td>
          </tr>

     <tr>
    <!--    <td width="110" align="center" valign="middle" class="icon"> <div align="center"><a href="../procesos/filtro_nomina.php?opcion=5" target="_self" > <img src="../imagenes/29.png" width="32" height="32" title="Generar Orden tipo <?echo $termino?>" border="0" align="absmiddle" class="icon" /></a></div></td>   -->
          <td width="110" align="center" valign="middle" class="icon"><div align="center"><a href="../procesos/filtro_nomina.php?opcion=8" target="_self" ><img src="../imagenes/logo-BFC.png" width="100" height="86" title="Generar diskette de <?echo $termino?> para el banco banesco" border="0" align="absmiddle" class="icon" /></a></div></td>
        <td width="110" align="center" valign="middle" class="icon"><div align="center"><a href="../procesos/filtro_nomina.php?opcion=9" target="_self" ><img src="../imagenes/LOGO-BOD.png" title="Generar diskette de <?echo $termino?> para el banco BOD" border="0" align="absmiddle" class="icon" /></a></div></td>
           <td width="110" align="center" valign="middle" class="icon"><div align="center"><a href="../procesos/filtro_nomina.php?opcion=10" target="_self" ><img src="../imagenes/txt.png" title="Generar diskette de <?echo $termino?> para caja de ahorro" border="0" align="absmiddle" class="icon" /></a></div></td>
          <td>&nbsp;</td>
          </tr>
        <tr>
      <!--      <td height="32"><div align="center">Generar Orden tipo nomina</div></td>    -->
        <td height="32"><div align="center">Generar TXT banco BFC</div></td>
            <td height="32"><div align="center">Generar TXT banco BOD</div></td>
          <td height="32"><div align="center">TXT caja de ahorro mensual</div></td>
          </tr>

    <tr>
          <td width="110" align="center" valign="middle" class="icon"> <div align="center"><a href="../procesos/filtro_nomina.php?opcion=11" target="_self" > <img src="../imagenes/29.png" width="32" height="32" title="Generar Orden tipo <?echo $termino?>" border="0" align="absmiddle" class="icon" /></a></div></td>
          <!--<td width="110" align="center" valign="middle" class="icon"><div align="center"><a href="../procesos/filtro_nomina.php?opcion=8" target="_self" ><img src="../imagenes/logo-BFC.png" width="100" height="86" title="Generar diskette de <?echo $termino?> para el banco banesco" border="0" align="absmiddle" class="icon" /></a></div></td>
        <td width="110" align="center" valign="middle" class="icon"><div align="center"><a href="../procesos/filtro_nomina.php?opcion=9" target="_self" ><img src="../imagenes/LOGO-BOD.png" title="Generar diskette de <?echo $termino?> para el banco BOD" border="0" align="absmiddle" class="icon" /></a></div></td>
           <td width="110" align="center" valign="middle" class="icon"><div align="center"><a href="../procesos/filtro_nomina.php?opcion=10" target="_self" ><img src="../imagenes/txt.png" title="Generar diskette de <?echo $termino?> para caja de ahorro" border="0" align="absmiddle" class="icon" /></a></div></td>
          <td>&nbsp;</td>-->
          </tr>
        <tr>
          <td height="32"><div align="center">Recibos de pago a correo</div></td>
        <!--<td height="32"><div align="center">Generar TXT banco BFC</div></td>
            <td height="32"><div align="center">Generar TXT banco BOD</div></td>
          <td height="32"><div align="center">TXT caja de ahorro mensual</div></td>-->
          </tr>


      </table></td>
        </tr>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>
