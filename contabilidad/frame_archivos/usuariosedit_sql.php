<?php
 $Accion    = $_GET['Accion'];
 include("config_bd.php"); // archivo que llama a la base de datos 
 if ($Accion == 'Modificar')
 {
     $Codigo       = $_POST['Codigo'];
     $Nomusu       = $_POST['Nomusu'];   
     $Claveusu     = $_POST['Claveusu'];
     $Admin        = $_POST['Admin'];
     $Nivelusu     = $_POST['Nivelusu'];   
     $Cractas      = $_POST['Cractas'];
     $Contabiliza  = $_POST['Contabiliza'];
     $Presupuesto  = $_POST['Presupuesto'];  
     $Repanali     = $_POST['Repanali'];   
     $Conciliacion = $_POST['Conciliacion'];
     $Anula        = $_POST['Anula'];
     $Repbalcom    = $_POST['Repbalcom'];   
     $Repganper    = $_POST['Repganper'];
     $Repotros     = $_POST['Repotros'];	 
     $Repctas      = $_POST['Repctas'];
     $Repcomp      = $_POST['Repcomp'];
     $Repbalgen    = $_POST['Repbalgen'];  
	  $Claveusu=hash("sha256",$Claveusu);
     //$Nivacca = $_POST['act_usu_cnmi'];
     //$Nivaccp = $_POST['pas_usu_cnmi'];
	 //$Nivaccc = $_POST['pat_usu_cnmi'];
     //$Nivacci = $_POST['gpe_usu_cnmi']; 	 
$consulta="UPDATE cwconusu SET Nomusu='$Nomusu', Claveusu='$Claveusu', Admin='$Admin', Nivelusu='$Nivelusu', Cractas='$Cractas', Contabiliza='$Contabiliza', Presupuesto='$Presupuesto', Repanali='$Repanali', Conciliacion='$Conciliacion', Anula='$Anula', Repbalcom='$Repbalcom', Repganper='$Repganper', Repotros='$Repotros', Repctas='$Repctas', Repcomp='$Repcomp', Repbalgen='$Repbalgen' WHERE Codusu='$Codigo'";

     $result = mysql_query($consulta, $conectar);
//exit(0);	 	 
     mysql_close($conectar);
     header("Location: usuarioslist.php");   
 } else if ($Accion == 'Borrar')
 {
    $Codigo       = $_GET['cod_usu'];
    $result = mysql_query("DELETE FROM cwconusu WHERE Codusu = '$Codigo'", $conectar);	 	 
    mysql_close($conectar);
    header("Location: usuarioslist.php"); 
	 
 }	else if ($Accion == 'Agregar')
 {
     $Codigo       = $_POST['cod_usu'];
     $Nomusu       = $_POST['Nomusu'];   
     $Claveusu     = $_POST['Claveusu'];
     $Admin        = $_POST['Admin'];
     $Nivelusu     = $_POST['Nivelusu'];   
     $Cractas      = $_POST['Cractas'];
     $Contabiliza  = $_POST['Contabiliza'];
     $Presupuesto  = $_POST['Presupuesto'];  
     $Repanali     = $_POST['Repanali'];   
     $Conciliacion = $_POST['Conciliacion'];
     $Anula        = $_POST['Anula'];
     $Repbalcom    = $_POST['Repbalcom'];   
     $Repganper    = $_POST['Repganper'];
     $Repotros     = $_POST['Repotros'];	 
     $Repctas      = $_POST['Repctas'];
     $Repcomp      = $_POST['Repcomp'];
     $Repbalgen    = $_POST['Repbalgen'];  
	  
     //$Nivacca = $_POST['act_usu_cnmi'];
     //$Nivaccp = $_POST['pas_usu_cnmi'];
	 //$Nivaccc = $_POST['pat_usu_cnmi'];
     //$Nivacci = $_POST['gpe_usu_cnmi']; 	 

     $result = mysql_query("SELECT * FROM cwconusu WHERE Codusu ='$Codigo'", $conectar); 
     
	 $num_rows = mysql_num_rows($result);
	 
	 if ($num_rows > 0)
	 {
	   echo "Regresa, este c�digo no es v�lido, ya existe.";
	   mysql_close($conectar);
	 } else if ($num_rows == 0)
	 {
	   $row = mysql_fetch_row($result);
		$Claveusu=hash("sha256",$Claveusu);
       $result = mysql_query("INSERT INTO cwconusu (Nomusu, Claveusu, Admin, Nivelusu, Cractas, Contabiliza, Presupuesto, Repanali, Conciliacion, Anula, Repbalcom, Repganper, Repotros, Codusu) VALUES ('$Nomusu', '$Claveusu', '$Admin', '$Nivelusu', '$Cractas', '$Contabiliza', '$Presupuesto', '$Repanali', '$Conciliacion', '$Anula', '$Repbalcom', '$Repganper', '$Repotros', '$Codigo')", $conectar);	 	 
       mysql_close($conectar);
       header("Location: usuarioslist.php");   
     }
 }			
?>
