<?php
 //$RecNo_Ant = $_GET['RecNo'];
 $Accion    = $_GET['Accion'];
 $pagina= @$_GET['pagina'];
 include("config_bd.php"); // archivo que llama a la base de datos 
 
 if ($Accion == 'Modificar')
 {
     $Numcom      = $_POST['Comprobante'];
     $RecNo         = $_GET['RecNo'];
     $Cuenta        = $_POST['Cuenta'];
     $Referen       = $_POST['Referen'];
     $Tiporef       = $_POST['Tiporef'];
     $Descrip       = $_POST['Descrip'];
     $Deb_cre_menu  = $_POST['Deb_cre_menu'];
     $Deb_cre       = $_POST['Deb_cre'];
	  $fechaD        = $_POST['fecha'];
	  $fch = explode("/",$fechaD);
     $FechaD = $fch[2]."-".$fch[1]."-".$fch[0];

     if ($Deb_cre_menu=='0')
     {
       $Debito   = $Deb_cre;
       $Credito  = '0';
     } else if ($Deb_cre_menu=='1')
     {
       $Debito   = '0';
       $Credito  = $Deb_cre;
     }
	 if ($Cuenta<>'')
	 {
		$consult = "UPDATE cwcondco SET Cuenta='$Cuenta', Referen='$Referen', Tiporef='$Tiporef', Descrip='$Descrip', Debito='$Debito', Credito='$Credito', FechaD='$FechaD' WHERE RecNo='$RecNo'";
		$result = mysql_query($consult, $conectar);
       mysql_close($conectar);
       header("Location: cwcondcolist.php?Numcom=".$Numcom."&RecNo=".$RecNo."&pagina=".$pagina);
	 } else
	 {
	   echo "Regrese, tiene campos vacios. ";
	   mysql_close($conectar);
	 }
 } else if ($Accion == 'Borrar')
 {
    $RecNo       = $_GET['Asiento'];
	 $Numcom      = $_GET['Numcom'];
    $result = mysql_query("DELETE FROM cwcondco WHERE RecNo='$RecNo'", $conectar);
    mysql_close($conectar);
	$RecNo=$RecNo-1;
    header("Location: cwcondcolist.php?Numcom=".$Numcom."&RecNo=".$RecNo."&pagina=".$pagina);
	 
 }	else if ($Accion == 'Agregar')
 {
	$Numcom   = $_POST['Comprobante'];
	
	$consulta = "select Fecha from cwconhco where Numcom=".$Numcom;
	$resultado= mysql_query($consulta);
	$fila = @mysql_fetch_array($resultado);
	$Fecha         = $fila["Fecha"];
     $Asiento    = $_GET['Asiento'];
	 //$Numcom   = $_POST['Comprobante'];
 
     $Cuenta        = $_POST['Cuenta'];
     $Referen       = $_POST['Referen'];
     $Tiporef       = $_POST['Tiporef'];
     $Descrip       = $_POST['Descrip'];
     $Deb_cre_menu  = $_POST['Deb_cre_menu'];
     $Deb_cre       = $_POST['Deb_cre'];
     $Numlim        = $_POST['Numlim'];
     $fechaD        = $_POST['fecha'];
     //$Fecha         = $fila['Fecha'];
     $fch = explode("/",$fechaD);
     $FechaD = $fch[2]."-".$fch[1]."-".$fch[0];


     if ($Deb_cre_menu=='0') 
     { 
       $Debito   = $Deb_cre; 
       $Credito  = '0';
     } else if ($Deb_cre_menu=='1') 
     { 
       $Debito   = '0'; 
       $Credito  = $Deb_cre;
     } 
			 
     if (($Cuenta<>'') && ($Deb_cre<>''))
	 {
	   $result = mysql_query("INSERT INTO cwcondco (Cuenta, Referen, Tiporef, Descrip, Debito, Credito, Fecha, Numcom, Numlim, FechaD) VALUES ('$Cuenta', '$Referen', '$Tiporef', '$Descrip', '$Debito', '$Credito', '$Fecha', '$Numcom', '$Numlim', '$FechaD')", $conectar);
		//$resulta = mysql_query("select * from ")
       mysql_close($conectar);
		//echo "Pase por aqui".$Asiento;
		//exit(0);
		header("Location: cwcondcoedit.php?Numcom=".$Numcom."&accion=agregar&RecNo=".$Asiento."&pagina=".$pagina);  
       //header("Location: cwcondcolist.php?Numcom=".$Numcom);  
	 } else
	 {
	   echo "Regrese, tiene campos vacios. ";
	   mysql_close($conectar);   
	 }  
 }				
?>


