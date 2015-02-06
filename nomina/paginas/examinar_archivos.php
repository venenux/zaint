<?php 
$path="\wwwarchivos/"; 

$nombre_archivo = $_FILES['userfile']['name']; 
$tipo_archivo = $_FILES['userfile']['type']; 
$tamano_archivo = $_FILES['userfile']['size']; 

if (!((strpos($tipo_archivo, "doc") || strpos($tipo_archivo, "zip") || strpos($tipo_archivo,"jpg")) && ($tamano_archivo < 2000000000))) { 
echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos *.doc, *.zip o *.jpg<br><li>se permiten archivos de ?? máximo.</td></tr></table><br>"; 
echo "<a href='index.php'>Click aquá</a> para corregir los campos."; 
}else{ 
if (move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], $path.$_FILES['userfile']['name'])){ 
echo "El archivo ha sido cargado correctamente."; 
}else{ 
echo "Ocurrió algún error al subir el fichero. No pudo guardarse."; 
} 
} 
?>