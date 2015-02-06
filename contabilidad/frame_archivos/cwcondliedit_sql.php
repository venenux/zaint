<?php
 $Accion    = $_GET['Accion'];
 include("config_bd.php"); // archivo que llama a la base de datos 
 if ($Accion == 'Modificar')
 {
     $Codigo     = $_POST['RecNo'];
     $Descrip    = $_POST['Descrip'];  
	  	
     $result = mysql_query("UPDATE cwcondli SET Descrip='$Descrip' WHERE RecNo='$Codigo'", $conectar);	 	 
     mysql_close($conectar);
     header("Location: cwcondlilist.php");   
 } else if ($Accion == 'Borrar')
 {
    $Codigo       = $_GET['RecNo'];
    $result = mysql_query("DELETE FROM cwcondli WHERE RecNo = '$Codigo'", $conectar);	 	 
    mysql_close($conectar);
    header("Location: cwcondlilist.php"); 
	 
 }	else if ($Accion == 'Agregar')
 {
     $RecNo      = $_POST['RecNo'];
     $Descrip      = $_POST['Descrip'];   
	 
     $result = mysql_query("SELECT * FROM cwcondli WHERE RecNo ='$RecNo'", $conectar); 
     
	 $num_rows = mysql_num_rows($result);
	 
	 if ($num_rows > 0)
	 {
	   echo "Regresa, este código no es válido, ya existe.";
	   mysql_close($conectar);
	 } else if ($num_rows == 0)
	 {
	   $row = mysql_fetch_row($result);
	
       $result = mysql_query("INSERT INTO cwcondli (Descrip) VALUES ('$Descrip')", $conectar);	 	 
       mysql_close($conectar);
       header("Location: cwcondlilist.php");   
     }
 }			
?>