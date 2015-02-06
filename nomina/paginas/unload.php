<?php
include ("func_bd.php") ;
function subirfichero($nombre,$directorio)
            
{
            
      $ruta_fichero = "$_SERVER[DOCUMENT_ROOT]/$directorio/";
           
      if (!is_dir("$ruta_fichero"))                                                   mkdir("$ruta_fichero",0777);
      $ruta_relativa ="$directorio/";
      $name=$_FILES[$nombre]['name'];
      $name = ereg_replace("[^a-z0-9._]", "",str_replace(" ", "_", str_replace("%20", "_", strtolower($name))));
      $location = $ruta_fichero.$name;
 
      copy($_FILES[$nombre]['tmp_name'],$location);          
      unlink($_FILES[$nombre]['tmp_name']);            
 
      $fichero = $ruta_relativa.$name;
        return($fichero);
            
 
}
echo '<head>
            
 
              <title>'.$_SERVER[PHP_SELF].'</title>
            
 
      </head>
            
 
      <html>
            
 
      <body>';
            
 
if(isset($_POST[boton]))
            
 
{
            
 
      subirfichero("mifichero","subidos");
            
 
}      
echo '<form action="'.$_SERVER[PHP_SELF].'" method="post" enctype=multipart/form-data>
            
 
Fichero: <input type=file name=mifichero>
            
 
<input type="submit" name=boton value="Subir">
            
 
</form>';
echo "<a href=$_SERVER[PHP_SELF]>Recargar la Página</a>";
echo '</body>
            
 
      </html>';
?>
 
