<?php
 $Accion    = $_GET['Accion'];
 include("config_bd.php"); // archivo que llama a la base de datos 
 if ($Accion == 'Modificar')
 {
     $Codigo     = $_POST['Codccos'];
     $Descrip    = $_POST['Descrip'];  
	  	
     $result = mysql_query("UPDATE cwconcco SET Descrip='$Descrip' WHERE Codccos='$Codigo'", $conectar);	 	 
     mysql_close($conectar);
     header("Location: cwconccolist.php");   
 } else if ($Accion == 'Borrar')
 {
    $Codigo       = $_GET['Codccos'];
    $result = mysql_query("DELETE FROM cwconcco WHERE Codccos = '$Codigo'", $conectar);	 	 
    mysql_close($conectar);
    header("Location: cwconccolist.php"); 
	 
 }	else if ($Accion == 'Agregar')
 {
     $Codccos      = $_POST['Codccos'];
     $Descrip      = $_POST['Descrip'];   
	 
     $result = mysql_query("SELECT * FROM cwconcco WHERE Codccos ='$Codccos'", $conectar); 
     
	 $num_rows = mysql_num_rows($result);
	 
	 if ($num_rows > 0)
	 {
	   echo "Regresa, este código no es válido, ya existe.";
	   mysql_close($conectar);
	 } else if ($num_rows == 0)
	 {
	   $row = mysql_fetch_row($result);
	
       $result = mysql_query("INSERT INTO cwconcco (Descrip) VALUES ('$Descrip')", $conectar);	 	 
       mysql_close($conectar);
       header("Location: cwconccolist.php");   
     }
 }			
?>