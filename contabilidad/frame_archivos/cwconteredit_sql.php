<?php
 $Accion    = $_GET['Accion'];
 $Grupo      = $_GET['Grupo'];
 include("config_bd.php"); // archivo que llama a la base de datos 
 if ($Accion == 'Modificar'){
     $Codigo     = $_POST['Codtipo'];
     $Descrip    = $_POST['Descrip']; 
	 $Rif        = $_POST['Rif'];
     $Nit        = $_POST['Nit']; 

	  	
     $result = mysql_query("UPDATE cwconter SET Descrip='$Descrip', Rif='$Rif', Nit='$Nit', grupo='$Grupo' WHERE Codtipo='$Codigo'", $conectar);	 	 
     mysql_close($conectar);
     header("Location: cwconterlist.php?grupo=$Grupo");   
 } else if ($Accion == 'Borrar'){
    $Codigo       = $_GET['Codtipo'];
    $result = mysql_query("DELETE FROM cwconter WHERE Codtipo = '$Codigo'", $conectar);	 	 
    mysql_close($conectar);

    header("Location: cwconterlist.php?grupo=$Grupo"); 
	 
 }	else if ($Accion == 'Agregar'){
     $Codtipo      = $_POST['Codtipo'];
     $Descrip      = $_POST['Descrip'];   
     $Rif          = $_POST['Rif'];
     $Nit          = $_POST['Nit'];	 
	 	 
     $result = mysql_query("SELECT * FROM cwconter WHERE Codtipo ='$Codtipo'", $conectar);      
	 $num_rows = mysql_num_rows($result);
	 
	 if ($num_rows > 0){
	   echo "Regrese, este código no es válido, ya existe.";
	   mysql_close($conectar);
	 } else if ($num_rows == 0){
	   $row = mysql_fetch_row($result);	
       $result = mysql_query("INSERT INTO cwconter (Descrip, Rif, Nit, grupo) VALUES ('$Descrip', '$Rif', '$Nit', '$Grupo')", $conectar);	 	 
       mysql_close($conectar);
       header("Location: cwconterlist.php?grupo=$Grupo");   
     }
 }			
?>