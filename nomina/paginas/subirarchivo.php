<?php 
session_start();
ob_start();
?>
<script>

function Actualizar_Foto(img,obj) { 
         //alert(obj.value); 
		 //alert(img); 
		 
		img.src =obj.value;				
} 
</script>
<?php
include("../lib/common.php");
include ("func_bd.php") ;
include ("../header.php");
function subirfichero($nombre,$directorio)
            
{        
    $ruta_fichero = "$_SERVER[DOCUMENT_ROOT]/$directorio/";
           
    if (!is_dir("$ruta_fichero"))                                                   mkdir("$ruta_fichero",0777);
    $ruta_relativa ="$directorio/";
    $name=$_FILES[$nombre]['name'];
    $name = ereg_replace("[^a-z0-9._]", "",str_replace(" ", "_", str_replace("%20", "_", strtolower($name))));
    $location = $ruta_fichero.$name;
 		
	//msgbox($_FILES[$nombre]['tmp_name']);
	// msgbox($location);
		
    copy($_FILES[$nombre]['tmp_name'],$location);          
    unlink($_FILES[$nombre]['tmp_name']);            
 
    $fichero = $ruta_relativa.$name;
	return($fichero); 
}
?>
<head>
<title>Seleccionar Archivo de Foto</title>
<style type="text/css">
<!--
.Estilo1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style>
</head>
<html>
<body>
 <?php
if(isset($_POST[boton]))
{ 

  subirfichero("mifichero","nomina/paginas/fotos");
  echo "<script> window.close(); </script>";
}     


msgbox($_POST[txtcedula]);
?> 
<form action="" method="post"  enctype="multipart/form-data" name="frmsubir" id="frmsubir" style="width:500px;">
  <table width="501" height="288" border="0" align="left">
    <tr>
      <td height="180" style="top:0px">&nbsp;</td>
      <td style="top:0px"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><img src="fotos/silueta.gif" alt="imagen" name="imgFoto"
	   width="170" height="175" border="1" align="middle" id="imgFoto" style="top:0px"></font></div></td>
      <td width="103" style="top:0px">&nbsp;</td>
    </tr>
    <tr>
      <td width="155" height="50" style="top:0px"><div align="center"><span class="Estilo1">Archivo de Imagen</span></div></td>
      <td width="229" style="top:0px"><input type="file" name="mifichero"  onChange="Actualizar_Foto(document.frmsubir.imgFoto, this);"></td>
      <td style="top:0px"><div align="center"><a href=<?php $_SERVER[PHP_SELF] ?>>
        <input type="submit" name="boton" style="width:85px" value="Aceptar">
      </a></div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
<p>&nbsp;</p>
</body> 
</html>

