<?php 
session_start();
ob_start();
?>

<?php

 $Accion    = $_GET['Accion'];
 $pagina= $_GET['pagina'];
 $feccom  = $_GET['feccom'];
 include("config_bd.php"); // archivo que llama a la base de datos 
if($_POST['feccom'])
	$feccom=$_POST['feccom'];

 if ($Accion == 'Modificar')
 {
     $Numcom     = $_POST['Numcom'];
     $Codtipo    = $_POST['Codtipo'];   
     $Fecha      = $_POST['fecha'];
     $Descrip    = $_POST['Descrip'];	 
     //$Estado     = $_POST['Nivel'];
	 
 	 $Fecha = $Fecha[6].$Fecha[7].$Fecha[8].$Fecha[9]."/".$Fecha[3].$Fecha[4]."/".$Fecha[0].$Fecha[1];		 
	 
	 if ($Descrip<>'')
	 { 	  	
       $result = mysql_query("UPDATE cwconhco SET Codtipo='$Codtipo', Fecha='$Fecha', Descrip='$Descrip' WHERE Numcom='$Numcom' and Fecha='$feccom'", $conectar);
	$consulta=mysql_query("INSERT INTO log_transacciones VALUES ('', 'EDITAR COMPROBANTE', '".date("Y-m-d H:i:s")."', 'COMPROBANTE', 'cwcondcoedit_sql.php','EDITAR', '".$Numcom."-".$Debito."-".$Credito."-".$Descrip."-".$RecNo."', '$_SESSION[nombre]')", $conectar);
	$resul = mysql_query("UPDATE cwcondco set Fecha='$Fecha' where Numcom = '$Numcom' and Fecha='$feccom'");
	
       mysql_close($conectar);
       header("Location: cwconhcolist.php?pagina=".$pagina);   
	 } else
	 {
	   echo "Regrese, no escribio la descripcion del comprobante, debe escribir una. ";
	   mysql_close($conectar);   
	 }  	   
	   
	   
 } else if ($Accion == 'Borrar')
 {
    $Numcom       = $_GET['Numcom'];
	$result = mysql_query("update cwconhco set estado=4 WHERE Numcom = '$Numcom'  and Fecha='$feccom'", $conectar);
	//$consul = "select * from cwcondco where Numcom='$Numcom'";
	//$resul = mysql_query($consul);
	//while ($fila = mysql_fetch_array($resul))
	//{
	$resul = mysql_query("delete from cwcondco where Numcom = '$Numcom'  and Fecha='$feccom'");
	$consulta=mysql_query("INSERT INTO log_transacciones VALUES ('', 'ELIMINAR COMPROBANTE', '".date("Y-m-d H:i:s")."', 'COMPROBANTE', 'cwcondcoedit_sql.php','ELIMINAR', '".$Numcom."', '$_SESSION[nombre]')", $conectar);
	//}		
	//echo $resul;	 
	$Numcom1=$Numcom-1;	
    mysql_close($conectar);
    header("Location: cwconhcolist.php?Numcom=".$Numcom1."&pagina=".$pagina);
	 
 }	else if ($Accion == 'Agregar')
 {
	$consult = "SELECT * FROM cwconemp";
	$result = mysql_query($consult, $conectar);
	$fil = mysql_fetch_array($result);
	
	$mes=explode('/',$_POST['fecha']);
	$i=$mes[1];
	if($i=='01')
	{
		$mesl='Enero';	
		$bd='Comene';
	}	
	elseif($i=='02')
	{
		$mesl='Febrero';
		$bd='Comfeb';
	}	
	elseif($i=='03')
	{
		$mesl='Marzo';
		$bd='Commar';
	}	
	elseif($i=='04')
	{
		$mesl='Abril';
		$bd='Comabr';
	}	
	elseif($i=='05')
	{
		$mesl='Mayo';
		$bd='Commay';
	}	
	elseif($i=='06')
	{
		$mesl='Junio';
		$bd='Comjun';
	}		
	elseif($i=='07')
	{
		$mesl='Julio';
		$bd='Comjul';
	}	
	elseif($i=='08')
	{
		$mesl='Agosto';
		$bd='Comago';
	}	
	elseif($i=='09')
	{
		$mesl='Septiembre';
		$bd='Comsep';
	}	
	elseif($i==10)
	{
		$mesl='Octubre';
		$bd='Comoct';
	}	
	elseif($i==11)
	{
		$mesl='Noviembre';
		$bd='Comnov';
	}	
	elseif($i==12)
	{
		$mesl='Diciembre';
		$bd='Comdic';
	}	
	
	$numCom = $fil[$bd] + 1;
        $ultimo_comprobante=$fil['Numcom']+1;
	$resulatdo=mysql_query("update cwconemp set Numcom='".$ultimo_comprobante."',$bd='".$numCom."'",$conectar);
	$consul = "SELECT * FROM cwconhco";
	$resul = mysql_query($consul, $conectar);
	$reg = mysql_fetch_row($resul);
		
      $Numcom = $fil[$bd];
   $Codtipo    = $_POST['Codtipo'];
   $Fecha      = $_POST['fecha'];
   $Descrip    = $_POST['Descrip'];
   $Estado     = '1';
 		 	 
	 $Fecha = $Fecha[6].$Fecha[7].$Fecha[8].$Fecha[9]."/".$Fecha[3].$Fecha[4]."/".$Fecha[0].$Fecha[1];
			 
     if ($reg==0){
	 	 	$result = mysql_query("INSERT INTO cwconhco (Numcom, Codtipo, Fecha, Descrip, Estado) VALUES ('$numCom','$Codtipo', '$Fecha', '$Descrip', '$Estado')", $conectar);
			$consulta=mysql_query("INSERT INTO log_transacciones VALUES ('', 'AGREGAR COMPROBANTE', '".date("Y-m-d H:i:s")."', 'COMPROBANTES', 'cwconhcoedit_sql.php','AGREGAR', '".$Numcom."-".$Descrip."', '$_SESSION[nombre]')", $conectar);	 	 
			mysql_close($conectar);
         header("Location: cwconhcolist.php?pagina=".$pagina);  
		}else{
       $result = mysql_query("INSERT INTO cwconhco (Numcom, Codtipo, Fecha, Descrip, Estado) VALUES ('$numCom','$Codtipo', '$Fecha', '$Descrip', '$Estado')", $conectar);
	$consulta=mysql_query("INSERT INTO log_transacciones VALUES ('', 'AGREGAR COMPROBANTE', '".date("Y-m-d H:i:s")."', 'COMPROBANTES', 'cwconhcoedit_sql.php','AGREGAR', '".$Numcom."-".$Descrip."', '$_SESSION[nombre]')", $conectar);	 
			mysql_close($conectar);
         header("Location: cwconhcolist.php?pagina=".$pagina);
	   mysql_close($conectar);
	 }  
 }				
?>


