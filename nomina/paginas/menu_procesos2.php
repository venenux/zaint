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
          <td width="110" align="center" valign="middle" class="icon"> <div align="center"><a href="../procesos/filtro_nomina.php?opcion=5" target="_self" > <img src="../imagenes/29.png" width="32" height="32" title="Generar Orden tipo <?echo $termino?>" border="0" align="absmiddle" class="icon" /></a></div></td>

          <td>&nbsp;</td>
          </tr>
        <tr>
          <td height="32"><div align="center">Generar Orden tipo nomina</div></td>

          </tr>

    <tr>
    </table></td>
        </tr>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>