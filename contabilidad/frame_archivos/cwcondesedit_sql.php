<?php
 $Accion    = $_GET['Accion'];
 include("config_bd.php"); // archivo que llama a la base de datos 
 if ($Accion == 'Modificar')
 {
     $Codigo     = $_POST['Codtipo'];
     $Descrip    = $_POST['Descrip'];  
	  	
     $result = mysql_query("UPDATE cwcondes SET Descrip='$Descrip' WHERE Codtipo='$Codigo'", $conectar);	 	 
     mysql_close($conectar);
     header("Location: cwcondeslist.php");   
 } else if ($Accion == 'Borrar')
 {
    $Codigo       = $_GET['Codtipo'];
    $result = mysql_query("DELETE FROM cwcondes WHERE Codtipo = '$Codigo'", $conectar);	 	 
    mysql_close($conectar);
    header("Location: cwcondeslist.php"); 
	 
 }	else if ($Accion == 'Agregar')
 {
     $Codtipo      = $_POST['Codtipo'];
     $Descrip      = $_POST['Descrip'];   
	 
     $result = mysql_query("SELECT * FROM cwcondes WHERE Codtipo ='$Codtipo'", $conectar); 
     
	 $num_rows = mysql_num_rows($result);
	 
	 if ($num_rows > 0)
	 {
	   echo "Regresa, este código no es válido, ya existe.";
	   mysql_close($conectar);
	 } else if ($num_rows == 0)
	 {
	   $row = mysql_fetch_row($result);
	
       $result = mysql_query("INSERT INTO cwcondes (Descrip) VALUES ('$Descrip')", $conectar);	 	 
       mysql_close($conectar);
       header("Location: cwcondeslist.php");   
     }
 }			
?>