<?php 
session_start();
ob_start();
?>

<?php
include("config_bd.php"); // archivo que llama a la base de datos 
include("header.php");
$Numcom  = $_GET['Numcom'];
$Estado  = $_GET['Estado'];
$Accion  = $_GET['Accion'];
$pagina=@$_GET['pagina'];
$feccom  = $_GET['feccom'];
if($_POST['feccom'])
	$feccom=$_POST['feccom'];

if (($Accion=='Contabilizar') && ($Estado=='1'))
{

	$result_config = mysql_query("SELECT * FROM cwconfig", $conectar);
	$array_config  = @mysql_fetch_array($result_config);
	$Sepacta       = $array_config["Sepacta"];
	$Sepacta_len   = strlen($Sepacta);
	
	$Niv1          = $array_config["Niv1"];
	$Niv2          = $array_config["Niv2"];
	$Niv3          = $array_config["Niv3"];
	$Niv4          = $array_config["Niv4"];
	$Niv5          = $array_config["Niv5"];
	$Niv6          = $array_config["Niv6"];
	$Niv7          = $array_config["Niv7"];
	$Niv8          = $array_config["Niv8"];
	$Niv9          = $array_config["Niv9"];
	
	$Niv1_length = $Niv1 + $Sepacta_len;
	$Niv2_length = $Niv1 + $Sepacta_len + $Niv2 + $Sepacta_len;
	$Niv3_length = $Niv1 + $Sepacta_len + $Niv2 + $Sepacta_len + $Niv3 + $Sepacta_len;
	$Niv4_length = $Niv1 + $Sepacta_len + $Niv2 + $Sepacta_len + $Niv3 + $Sepacta_len + $Niv4 + $Sepacta_len;
	$Niv5_length = $Niv1 + $Sepacta_len + $Niv2 + $Sepacta_len + $Niv3 + $Sepacta_len + $Niv4 + $Sepacta_len + $Niv5 + $Sepacta_len;
	$Niv6_length = $Niv1 + $Sepacta_len + $Niv2 + $Sepacta_len + $Niv3 + $Sepacta_len + $Niv4 + $Sepacta_len + $Niv5 + $Sepacta_len + $Niv6 + $Sepacta_len;
	$Niv7_length = $Niv1 + $Sepacta_len + $Niv2 + $Sepacta_len + $Niv3 + $Sepacta_len + $Niv4 + $Sepacta_len + $Niv5 + $Sepacta_len + $Niv6 + $Sepacta_len + $Niv7 + $Sepacta_len;
	$Niv8_length = $Niv1 + $Sepacta_len + $Niv2 + $Sepacta_len + $Niv3 + $Sepacta_len + $Niv4 + $Sepacta_len + $Niv5 + $Sepacta_len + $Niv6 + $Sepacta_len + $Niv7 + $Sepacta_len + $Niv8 + $Sepacta_len;
	$Niv9_length = $Niv1 + $Sepacta_len + $Niv2 + $Sepacta_len + $Niv3 + $Sepacta_len + $Niv4 + $Sepacta_len + $Niv5 + $Sepacta_len + $Niv6 + $Sepacta_len + $Niv7 + $Sepacta_len + $Niv8 + $Sepacta_len + $Niv9 + $Sepacta_len;

	$result = mysql_query("SELECT * FROM cwcondco WHERE Numcom=$Numcom and Fecha='$feccom'", $conectar); 
	
	if (mysql_num_rows($result)) while ($row = @mysql_fetch_array($result)) 
	{
		$Debito    = $row["Debito"];
		$Credito   = $row["Credito"];
		$Fecha     = $row["Fecha"];
		
		$Fecha_sub = $Fecha[5].$Fecha[6];
		$Fecha_int = ((integer)$Fecha_sub);
		$Fecha_sub2 = $Fecha[0].$Fecha[1].$Fecha[2].$Fecha[3];
		$Anio=((integer)$Fecha_sub2);
		$Cuenta = $row["Cuenta"];
		
		$result_niv = mysql_query("SELECT * FROM cwconcue WHERE Cuenta='$Cuenta'", $conectar); 
		$row_niv    = @mysql_fetch_array($result_niv);
		$Nivel      = $row_niv["Nivel"];
	
		for ($num = $Nivel; $num > 0; $num--)
		{
			switch($num)
			{
				case 1:
				$longitud = $Niv1_length;
				break;
				case 2:
				$longitud = $Niv2_length;
				break;
				case 3:
				$longitud = $Niv3_length;
				break;
				case 4:
				$longitud = $Niv4_length;
				break;
				case 5:
				$longitud = $Niv5_length;
				break;
				case 6:
				$longitud = $Niv6_length;
				break;
				case 7:
				$longitud = $Niv7_length;
				break;
				case 8:
				$longitud = $Niv8_length;
				break;
				case 9:
				$longitud = $Niv9_length;
				break;
			}
			$Cuenta_sub = substr($Cuenta, 0, $longitud);
		   ////
 
			echo $result_nivel = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta_sub' AND Mes='$Fecha_int' and Anio='$Anio' ", $conectar); 
			$row_nivel    = @mysql_fetch_array($result_nivel);
			$Debitou  = $row_nivel["Debitou"];	
			$Creditou = $row_nivel["Creditou"];
			
			$Debito_sum  = $Debitou  + $Debito; 
			$Credito_sum = $Creditou + $Credito;
				
			$result_deb_cre_his = mysql_query("UPDATE cwconhis SET Debitou='$Debito_sum', Creditou='$Credito_sum' WHERE Cuenta='$Cuenta_sub' AND Mes='$Fecha_int' and Anio='$Anio'", $conectar);
			
// 			$result_his = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta_sub'", $conectar); 
// 			$Salantu     = 0;
					//if (mysql_num_rows($result_his)) 
		
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			$result_his  = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta_sub'  AND Mes='$Fecha_int' and Anio='$Anio'", $conectar); 
			$row_his     = @mysql_fetch_array($result_his);
			$Salantu=$row_his["Salantu"];
			$Mes_his     = $row_his["Mes"];
			$Debito_his  = $row_his["Debitou"];
			$Credito_his = $row_his["Creditou"];
			
			$Salactu     = $Salantu + $Debito_his - $Credito_his;
			$result_his  = mysql_query("UPDATE cwconhis SET Salactu='$Salactu' WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his'  and Anio='$Anio'", $conectar);	 	 
			$Salantu     = $Salactu;
			$Mes_his  = $Mes_his + 1;
  		//	if($Cuenta_sub=='1.1.1.01.02.02.001.')
 		//		exit;
			if ($Mes_his == 13) continue;//$Mes_his = 1;
	
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
		
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//MES 2
			$result_his  = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar); 
			$row_his     = @mysql_fetch_array($result_his);
				//$Mes_his     = $row_his["Mes"];
			$Debito_his  = $row_his["Debitou"];
			$Credito_his = $row_his["Creditou"];
				
			$Salactu     = $Salantu + $Debito_his - $Credito_his;
			$result_his  = mysql_query("UPDATE cwconhis SET Salantu='$Salantu', Salactu='$Salactu' WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar);	 	 
			$Salantu     = $Salactu;
	
			$Mes_his  = $Mes_his + 1;
			if ($Mes_his == 13) continue;//$Mes_his = 1;
			
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//MES 3
			$result_his  = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar); 
			$row_his     = @mysql_fetch_array($result_his);
			//$Mes_his     = $row_his["Mes"];
			$Debito_his  = $row_his["Debitou"];
			$Credito_his = $row_his["Creditou"];
			
			$Salactu     = $Salantu + $Debito_his - $Credito_his;
			$result_his  = mysql_query("UPDATE cwconhis SET Salantu='$Salantu', Salactu='$Salactu' WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar);	 	 
			$Salantu     = $Salactu;
			
			$Mes_his  = $Mes_his + 1;
			if ($Mes_his == 13) continue;//$Mes_his = 1;
	
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//MES 4
			$result_his  = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar); 
			$row_his     = @mysql_fetch_array($result_his);
			//$Mes_his     = $row_his["Mes"];
			$Debito_his  = $row_his["Debitou"];
			$Credito_his = $row_his["Creditou"];
			
			$Salactu     = $Salantu + $Debito_his - $Credito_his;
			$result_his  = mysql_query("UPDATE cwconhis SET Salantu='$Salantu', Salactu='$Salactu' WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar);	 	 
			$Salantu     = $Salactu;
			
			$Mes_his  = $Mes_his + 1;
			if ($Mes_his == 13) continue;//$Mes_his = 1;
	
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//MES 5
			$result_his  = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar); 
			$row_his     = @mysql_fetch_array($result_his);
			//$Mes_his     = $row_his["Mes"];
			$Debito_his  = $row_his["Debitou"];
			$Credito_his = $row_his["Creditou"];
			
			$Salactu     = $Salantu + $Debito_his - $Credito_his;
			$result_his  = mysql_query("UPDATE cwconhis SET Salantu='$Salantu', Salactu='$Salactu' WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar);	 	 
			$Salantu     = $Salactu;
			
			$Mes_his  = $Mes_his + 1;
			if ($Mes_his == 13) continue;//$Mes_his = 1;
	
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//MES 6
			$result_his  = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar); 
			$row_his     = @mysql_fetch_array($result_his);
			//$Mes_his     = $row_his["Mes"];
			$Debito_his  = $row_his["Debitou"];
			$Credito_his = $row_his["Creditou"];
			
			$Salactu     = $Salantu + $Debito_his - $Credito_his;
			$result_his  = mysql_query("UPDATE cwconhis SET Salantu='$Salantu', Salactu='$Salactu' WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar);	 	 
			$Salantu     = $Salactu;
			
			$Mes_his  = $Mes_his + 1;
			if ($Mes_his == 13) continue;//$Mes_his = 1;
	
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//MES 7
			$result_his  = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar); 
			$row_his     = @mysql_fetch_array($result_his);
			//$Mes_his     = $row_his["Mes"];
			$Debito_his  = $row_his["Debitou"];
			$Credito_his = $row_his["Creditou"];
			
			$Salactu     = $Salantu + $Debito_his - $Credito_his;
			$result_his  = mysql_query("UPDATE cwconhis SET Salantu='$Salantu', Salactu='$Salactu' WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar);	 	 
			$Salantu     = $Salactu;
			
			$Mes_his  = $Mes_his + 1;
			if ($Mes_his == 13) continue;//$Mes_his = 1;
	
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//MES 8
			$result_his  = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio", $conectar); 
			$row_his     = @mysql_fetch_array($result_his);
			//$Mes_his     = $row_his["Mes"];
			$Debito_his  = $row_his["Debitou"];
			$Credito_his = $row_his["Creditou"];
			
			$Salactu     = $Salantu + $Debito_his - $Credito_his;
			$result_his  = mysql_query("UPDATE cwconhis SET Salantu='$Salantu', Salactu='$Salactu' WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar);	 	 
			$Salantu     = $Salactu;
			
			$Mes_his  = $Mes_his + 1;
			if ($Mes_his == 13) continue;//$Mes_his = 1;
	
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//MES 9
			$result_his  = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar); 
			$row_his     = @mysql_fetch_array($result_his);
			//$Mes_his     = $row_his["Mes"];
			$Debito_his  = $row_his["Debitou"];
			$Credito_his = $row_his["Creditou"];
			
			$Salactu     = $Salantu + $Debito_his - $Credito_his;
			$result_his  = mysql_query("UPDATE cwconhis SET Salantu='$Salantu', Salactu='$Salactu' WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar);	 	 
			$Salantu     = $Salactu;
			
			$Mes_his  = $Mes_his + 1;
			if ($Mes_his == 13) continue;//$Mes_his = 1;
	
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//MES 10
			$result_his  = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar); 
			$row_his     = @mysql_fetch_array($result_his);
			//$Mes_his     = $row_his["Mes"];
			$Debito_his  = $row_his["Debitou"];
			$Credito_his = $row_his["Creditou"];
			
			$Salactu     = $Salantu + $Debito_his - $Credito_his;
			$result_his  = mysql_query("UPDATE cwconhis SET Salantu='$Salantu', Salactu='$Salactu' WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar);	 	 
			$Salantu     = $Salactu;
			
			$Mes_his  = $Mes_his + 1;
			if ($Mes_his == 13) continue;//$Mes_his = 1;
	
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//MES 11
			$result_his  = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar); 
			$row_his     = @mysql_fetch_array($result_his);
			//$Mes_his     = $row_his["Mes"];
			$Debito_his  = $row_his["Debitou"];
			$Credito_his = $row_his["Creditou"];
			
			$Salactu     = $Salantu + $Debito_his - $Credito_his;
			$result_his  = mysql_query("UPDATE cwconhis SET Salantu='$Salantu', Salactu='$Salactu' WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar);	 	 
			$Salantu     = $Salactu;
			
			$Mes_his  = $Mes_his + 1;
			if ($Mes_his == 13) continue;//$Mes_his = 1;
		
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//MES 12
			$result_his  = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar); 
			$row_his     = @mysql_fetch_array($result_his);
			//$Mes_his     = $row_his["Mes"];
			$Debito_his  = $row_his["Debitou"];
			$Credito_his = $row_his["Creditou"];
			
			$Salactu     = $Salantu + $Debito_his - $Credito_his;
			$result_his  = mysql_query("UPDATE cwconhis SET Salantu='$Salantu', Salactu='$Salactu' WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar);	 	 
			$Salantu     = $Salactu;
			
			$Mes_his  = $Mes_his + 1;
			if ($Mes_his == 13) continue;//$Mes_his = 1;
		}
		$result_fin  = mysql_query("UPDATE cwconhco SET Estado='2' WHERE Numcom='$Numcom' and Fecha='$feccom'", $conectar);
	}
	$consulta=mysql_query("INSERT INTO log_transacciones VALUES ('', 'CONTABILIZAR COMPROBANTE', '".date("Y-m-d H:i:s")."', 'COMPROBANTES', 'contab_trans.php','CONTABILIZAR', '".$Numcom."', '$_SESSION[nombre]')", $conectar);
	mysql_close($conectar);  
	// header("Location: cwconhcolist.php?pagina=".$pagina); 
	echo "<SCRIPT  type='text/javascript'> 
	location.href='cwconhcolist.php?pagina=$pagina';</SCRIPT>";
}
else if (($Accion=='Contabilizar') && ($Estado<>'1'))
{
	echo "<SCRIPT  type='text/javascript'> alert('El estado del Comprobante debe estar en transito para poder contabilizar!!');
	location.href='cwconhcolist.php';</SCRIPT>";
	
	mysql_close($conectar);
}
else if (($Accion=='Transito') && ($Estado=='2'))
{
	$result_config = mysql_query("SELECT * FROM cwconfig", $conectar);
	$array_config  = @mysql_fetch_array($result_config);
	$Sepacta       = $array_config["Sepacta"];
	$Sepacta_len   = strlen($Sepacta);
	
	$Niv1          = $array_config["Niv1"];
	$Niv2          = $array_config["Niv2"];
	$Niv3          = $array_config["Niv3"];
	$Niv4          = $array_config["Niv4"];
	$Niv5          = $array_config["Niv5"];
	$Niv6          = $array_config["Niv6"];
	$Niv7          = $array_config["Niv7"];
	$Niv8          = $array_config["Niv8"];
	$Niv9          = $array_config["Niv9"];
	
	$Niv1_length = $Niv1 + $Sepacta_len;
	$Niv2_length = $Niv1 + $Sepacta_len + $Niv2 + $Sepacta_len;
	$Niv3_length = $Niv1 + $Sepacta_len + $Niv2 + $Sepacta_len + $Niv3 + $Sepacta_len;
	$Niv4_length = $Niv1 + $Sepacta_len + $Niv2 + $Sepacta_len + $Niv3 + $Sepacta_len + $Niv4 + $Sepacta_len;
	$Niv5_length = $Niv1 + $Sepacta_len + $Niv2 + $Sepacta_len + $Niv3 + $Sepacta_len + $Niv4 + $Sepacta_len + $Niv5 + $Sepacta_len;
	$Niv6_length = $Niv1 + $Sepacta_len + $Niv2 + $Sepacta_len + $Niv3 + $Sepacta_len + $Niv4 + $Sepacta_len + $Niv5 + $Sepacta_len + $Niv6 + $Sepacta_len;
	$Niv7_length = $Niv1 + $Sepacta_len + $Niv2 + $Sepacta_len + $Niv3 + $Sepacta_len + $Niv4 + $Sepacta_len + $Niv5 + $Sepacta_len + $Niv6 + $Sepacta_len + $Niv7 + $Sepacta_len;
	$Niv8_length = $Niv1 + $Sepacta_len + $Niv2 + $Sepacta_len + $Niv3 + $Sepacta_len + $Niv4 + $Sepacta_len + $Niv5 + $Sepacta_len + $Niv6 + $Sepacta_len + $Niv7 + $Sepacta_len + $Niv8 + $Sepacta_len;
	$Niv9_length = $Niv1 + $Sepacta_len + $Niv2 + $Sepacta_len + $Niv3 + $Sepacta_len + $Niv4 + $Sepacta_len + $Niv5 + $Sepacta_len + $Niv6 + $Sepacta_len + $Niv7 + $Sepacta_len + $Niv8 + $Sepacta_len + $Niv9 + $Sepacta_len;

	$result = mysql_query("SELECT * FROM cwcondco WHERE Numcom=$Numcom and Fecha='$feccom'", $conectar); 

	if (mysql_num_rows($result)) while ($row = @mysql_fetch_array($result)) 
	{   
		$Debito    = $row["Debito"];
		$Credito   = $row["Credito"];
		$Fecha     = $row["Fecha"];
		
		$Fecha_sub = $Fecha[5].$Fecha[6];
		$Fecha_int = ((integer)$Fecha_sub);
			
		$Cuenta = $row["Cuenta"];
		
		$result_niv = mysql_query("SELECT * FROM cwconcue WHERE Cuenta='$Cuenta'", $conectar); 
		$row_niv    = @mysql_fetch_array($result_niv);
		$Nivel      = $row_niv["Nivel"];
	
		for ($num = $Nivel; $num > 0; $num--)
		{
			switch($num)
			{
				case 1:
				$longitud = $Niv1_length;
				break;
				case 2:
				$longitud = $Niv2_length;
				break;
				case 3:
				$longitud = $Niv3_length;
				break;
				case 4:
				$longitud = $Niv4_length;
				break;
				case 5:
				$longitud = $Niv5_length;
				break;
				case 6:
				$longitud = $Niv6_length;
				break;
				case 7:
				$longitud = $Niv7_length;
				break;
				case 8:
				$longitud = $Niv8_length;
				break;
				case 9:
				$longitud = $Niv9_length;
				break;
			}
			$Cuenta_sub = substr($Cuenta, 0, $longitud);
				
			$result_nivel = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta_sub' AND Mes='$Fecha_int' and Anio='$Anio'", $conectar); 
			$row_nivel    = @mysql_fetch_array($result_nivel);
			$Debitou  = $row_nivel["Debitou"];	
			$Creditou = $row_nivel["Creditou"];
			
			$Debito_sum  = $Debitou  - $Debito; 
			$Credito_sum = $Creditou - $Credito;

			$result_deb_cre_his = mysql_query("UPDATE cwconhis SET Debitou='$Debito_sum', Creditou='$Credito_sum' WHERE Cuenta='$Cuenta_sub' AND Mes='$Fecha_int' and Anio='$Anio'", $conectar);	 	 

// 	     $result_his = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta_sub'", $conectar); 
//          $Salantu     = 0;
		 //if (mysql_num_rows($result_his)) 
		
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //MES 1
			$result_his  = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta_sub' AND Mes='$Fecha_int' and Anio='$Anio'", $conectar); 
			$row_his     = @mysql_fetch_array($result_his);
				$Mes_his     = $row_his["Mes"];
			$Debito_his  = $row_his["Debitou"];
			$Credito_his = $row_his["Creditou"];
				
			$Salactu     = $Salantu + $Debito_his - $Credito_his;
			$result_his  = mysql_query("UPDATE cwconhis SET Salantu='$Salantu', Salactu='$Salactu' WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar); 
			$Salantu     = $Salactu;
			
			$Mes_his  = $Mes_his + 1;
			if ($Mes_his == 13) continue;//$Mes_his = 1;

		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
		
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//MES 2
			$result_his  = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar); 
			$row_his     = @mysql_fetch_array($result_his);
				//$Mes_his     = $row_his["Mes"];
			$Debito_his  = $row_his["Debitou"];
			$Credito_his = $row_his["Creditou"];
		 
			$Salactu     = $Salantu + $Debito_his - $Credito_his;
			$result_his  = mysql_query("UPDATE cwconhis SET Salantu='$Salantu', Salactu='$Salactu' WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar);	 	 
			$Salantu     = $Salactu;
			
			$Mes_his  = $Mes_his + 1;
			if ($Mes_his == 13) continue;//$Mes_his = 1;
	
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
		
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//MES 3
			$result_his  = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar); 
			$row_his     = @mysql_fetch_array($result_his);
				//$Mes_his     = $row_his["Mes"];
			$Debito_his  = $row_his["Debitou"];
			$Credito_his = $row_his["Creditou"];
				
			$Salactu     = $Salantu + $Debito_his - $Credito_his;
			$result_his  = mysql_query("UPDATE cwconhis SET Salantu='$Salantu', Salactu='$Salactu' WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar);
			$Salantu     = $Salactu;
		 
			$Mes_his  = $Mes_his + 1;
			if ($Mes_his == 13) continue;//$Mes_his = 1;
	
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//MES 4
			$result_his  = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar); 
			$row_his     = @mysql_fetch_array($result_his);
				//$Mes_his     = $row_his["Mes"];
			$Debito_his  = $row_his["Debitou"];
			$Credito_his = $row_his["Creditou"];
				
			$Salactu     = $Salantu + $Debito_his - $Credito_his;
			$result_his  = mysql_query("UPDATE cwconhis SET Salantu='$Salantu', Salactu='$Salactu' WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar);	 	 
			$Salantu     = $Salactu;
		 
			$Mes_his  = $Mes_his + 1;
			if ($Mes_his == 13) continue;//$Mes_his = 1;
	
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //MES 5
			$result_his  = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar); 
			$row_his     = @mysql_fetch_array($result_his);
				//$Mes_his     = $row_his["Mes"];
			$Debito_his  = $row_his["Debitou"];
			$Credito_his = $row_his["Creditou"];
				
			$Salactu     = $Salantu + $Debito_his - $Credito_his;
			$result_his  = mysql_query("UPDATE cwconhis SET Salantu='$Salantu', Salactu='$Salactu' WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar);	 	 
			$Salantu     = $Salactu;
			
			$Mes_his  = $Mes_his + 1;
	
			if ($Mes_his == 13) continue;//$Mes_his = 1;
	
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//MES 6
			$result_his  = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar); 
			$row_his     = @mysql_fetch_array($result_his);
				//$Mes_his     = $row_his["Mes"];
			$Debito_his  = $row_his["Debitou"];
			$Credito_his = $row_his["Creditou"];
				
			$Salactu     = $Salantu + $Debito_his - $Credito_his;
			$result_his  = mysql_query("UPDATE cwconhis SET Salantu='$Salantu', Salactu='$Salactu' WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar);	 	 
			$Salantu     = $Salactu;
		 
			$Mes_his  = $Mes_his + 1;
			if ($Mes_his == 13) continue;//$Mes_his = 1;
	
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //MES 7
			$result_his  = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar); 
			$row_his     = @mysql_fetch_array($result_his);
				//$Mes_his     = $row_his["Mes"];
			$Debito_his  = $row_his["Debitou"];
			$Credito_his = $row_his["Creditou"];
				
			$Salactu     = $Salantu + $Debito_his - $Credito_his;
			$result_his  = mysql_query("UPDATE cwconhis SET Salantu='$Salantu', Salactu='$Salactu' WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar);	 	 
			$Salantu     = $Salactu;
			
			$Mes_his  = $Mes_his + 1;
			if ($Mes_his == 13) continue;//$Mes_his = 1;
	
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //MES 8
			$result_his  = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar); 
			$row_his     = @mysql_fetch_array($result_his);
				//$Mes_his     = $row_his["Mes"];
			$Debito_his  = $row_his["Debitou"];
			$Credito_his = $row_his["Creditou"];
				
			$Salactu     = $Salantu + $Debito_his - $Credito_his;
			$result_his  = mysql_query("UPDATE cwconhis SET Salantu='$Salantu', Salactu='$Salactu' WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar);	 	 
			$Salantu     = $Salactu;
			
			$Mes_his  = $Mes_his + 1;
			if ($Mes_his == 13) continue;//$Mes_his = 1;
		
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//MES 9
			$result_his  = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar); 
			$row_his     = @mysql_fetch_array($result_his);
				//$Mes_his     = $row_his["Mes"];
			$Debito_his  = $row_his["Debitou"];
			$Credito_his = $row_his["Creditou"];
				
			$Salactu     = $Salantu + $Debito_his - $Credito_his;
			$result_his  = mysql_query("UPDATE cwconhis SET Salantu='$Salantu', Salactu='$Salactu' WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar);	 	 
			$Salantu     = $Salactu;
			
			$Mes_his  = $Mes_his + 1;
			if ($Mes_his == 13) continue;//$Mes_his = 1;
	
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        		//MES 10
			$result_his  = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar); 
			$row_his     = @mysql_fetch_array($result_his);
				//$Mes_his     = $row_his["Mes"];
			$Debito_his  = $row_his["Debitou"];
			$Credito_his = $row_his["Creditou"];
				
			$Salactu     = $Salantu + $Debito_his - $Credito_his;
			$result_his  = mysql_query("UPDATE cwconhis SET Salantu='$Salantu', Salactu='$Salactu' WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar);	 	 
			$Salantu     = $Salactu;
			
			$Mes_his  = $Mes_his + 1;
			if ($Mes_his == 13) continue;//$Mes_his = 1;
	
			/////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
	
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//MES 11
			$result_his  = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar); 
			$row_his     = @mysql_fetch_array($result_his);
			//$Mes_his     = $row_his["Mes"];
			$Debito_his  = $row_his["Debitou"];
			$Credito_his = $row_his["Creditou"];
			
			$Salactu     = $Salantu + $Debito_his - $Credito_his;
			$result_his  = mysql_query("UPDATE cwconhis SET Salantu='$Salantu', Salactu='$Salactu' WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar);	 	 
			$Salantu     = $Salactu;
			
			$Mes_his  = $Mes_his + 1;
			if ($Mes_his == 13) continue;//$Mes_his = 1;
		
			/////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
	
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//MES 12
			$result_his  = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar); 
			$row_his     = @mysql_fetch_array($result_his);
			//$Mes_his     = $row_his["Mes"];
			$Debito_his  = $row_his["Debitou"];
			$Credito_his = $row_his["Creditou"];
			
			$Salactu     = $Salantu + $Debito_his - $Credito_his;
			$result_his  = mysql_query("UPDATE cwconhis SET Salantu='$Salantu', Salactu='$Salactu' WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his' and Anio='$Anio'", $conectar);	 	 
			$Salantu     = $Salactu;
			
			$Mes_his  = $Mes_his + 1;
			if ($Mes_his == 13) continue;//$Mes_his = 1;
		
			/////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
		}
		$result_fin  = mysql_query("UPDATE cwconhco SET Estado='1' WHERE Numcom='$Numcom' and Fecha='$feccom'", $conectar);
	}

	$consulta=mysql_query("INSERT INTO log_transacciones VALUES ('', 'TRANSITO COMPROBANTE', '".date("Y-m-d H:i:s")."', 'COMPROBANTES', 'contab_trans.php','EN TRANSITO', '".$Numcom."', '$_SESSION[nombre]')", $conectar);
	mysql_close($conectar);  
	echo "<SCRIPT  type='text/javascript'> 
	location.href='cwconhcolist.php?pagina=$pagina';</SCRIPT>";
    //header("Location: cwconhcolist.php?pagina=".$pagina); 
} 
else if (($Accion=='Transito') && ($Estado<>'2'))
{
	echo "<SCRIPT  type='text/javascript'> alert('El estado del Comprobante debe estar en contabilizado para devolverlo a Transito!!');
	location.href='cwconhcolist.php';</SCRIPT>";
	
	mysql_close($conectar);
}
else
{
	echo "<SCRIPT  type='text/javascript'> alert('DAtos Errados!!');
	location.href='cwconhcolist.php';</SCRIPT>";
	
	mysql_close($conectar);
}
?>
</body>