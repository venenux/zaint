<?php 
  include("config_bd.php"); // archivo que llama a la base de datos 
require_once "lib/common.php";
  include("header.php");

$MES=$_GET[mes];

$conexion=conexion();
$consulta="select Numcom from cwconhco where year(Fecha)=2009 and month(Fecha)=$MES and Estado=1 order by Numcom";
$resultado=query($consulta,$conexion);
//exit(0);
while ($fila=fetch_array($resultado))
{

  $Numcom  = $fila['Numcom'];

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

    $result = mysql_query("SELECT * FROM cwcondco WHERE Numcom=$Numcom", $conectar); 

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
		 
	     $result_nivel = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta_sub' AND Mes='$Fecha_int'", $conectar); 
         $row_nivel    = @mysql_fetch_array($result_nivel);
	     $Debitou  = $row_nivel["Debitou"];	
		 $Creditou = $row_nivel["Creditou"];
		 
		 $Debito_sum  = $Debitou  + $Debito; 
		 $Credito_sum = $Creditou + $Credito;
		 	 
         $result_deb_cre_his = mysql_query("UPDATE cwconhis SET Debitou='$Debito_sum', Creditou='$Credito_sum' WHERE Cuenta='$Cuenta_sub' AND Mes='$Fecha_int'", $conectar);	 	 

	     $result_his = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta_sub'", $conectar); 
         $Salantu     = 0;
		 //if (mysql_num_rows($result_his)) 
		
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //MES 1
		 $result_his  = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta_sub'", $conectar); 
         $row_his     = @mysql_fetch_array($result_his);
		 $Mes_his     = $row_his["Mes"];
         $Debito_his  = $row_his["Debitou"];
	     $Credito_his = $row_his["Creditou"];
		 
         $Salactu     = $Salantu + $Debito_his - $Credito_his;
    	 $result_his  = mysql_query("UPDATE cwconhis SET Salantu='$Salantu', Salactu='$Salactu' WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his'", $conectar);	 	 
		 $Salantu     = $Salactu;
		 
		 $Mes_his  = $Mes_his + 1;
		 if ($Mes_his == 13) $Mes_his = 1;
	
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
		
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //MES 2
		 $result_his  = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his'", $conectar); 
         $row_his     = @mysql_fetch_array($result_his);
		 //$Mes_his     = $row_his["Mes"];
         $Debito_his  = $row_his["Debitou"];
	     $Credito_his = $row_his["Creditou"];
		 
         $Salactu     = $Salantu + $Debito_his - $Credito_his;
    	 $result_his  = mysql_query("UPDATE cwconhis SET Salantu='$Salantu', Salactu='$Salactu' WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his'", $conectar);	 	 
		 $Salantu     = $Salactu;
		 
		 $Mes_his  = $Mes_his + 1;
		 if ($Mes_his == 13) $Mes_his = 1;
	
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
		
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //MES 3
		 $result_his  = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his'", $conectar); 
         $row_his     = @mysql_fetch_array($result_his);
		 //$Mes_his     = $row_his["Mes"];
         $Debito_his  = $row_his["Debitou"];
	     $Credito_his = $row_his["Creditou"];
		 
         $Salactu     = $Salantu + $Debito_his - $Credito_his;
    	 $result_his  = mysql_query("UPDATE cwconhis SET Salantu='$Salantu', Salactu='$Salactu' WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his'", $conectar);	 	 
		 $Salantu     = $Salactu;
		 
		 $Mes_his  = $Mes_his + 1;
		 if ($Mes_his == 13) $Mes_his = 1;
	
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //MES 4
		 $result_his  = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his'", $conectar); 
         $row_his     = @mysql_fetch_array($result_his);
		 //$Mes_his     = $row_his["Mes"];
         $Debito_his  = $row_his["Debitou"];
	     $Credito_his = $row_his["Creditou"];
		 
         $Salactu     = $Salantu + $Debito_his - $Credito_his;
    	 $result_his  = mysql_query("UPDATE cwconhis SET Salantu='$Salantu', Salactu='$Salactu' WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his'", $conectar);	 	 
		 $Salantu     = $Salactu;
		 
		 $Mes_his  = $Mes_his + 1;
		 if ($Mes_his == 13) $Mes_his = 1;
	
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //MES 5
		 $result_his  = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his'", $conectar); 
         $row_his     = @mysql_fetch_array($result_his);
		 //$Mes_his     = $row_his["Mes"];
         $Debito_his  = $row_his["Debitou"];
	     $Credito_his = $row_his["Creditou"];
		 
         $Salactu     = $Salantu + $Debito_his - $Credito_his;
    	 $result_his  = mysql_query("UPDATE cwconhis SET Salantu='$Salantu', Salactu='$Salactu' WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his'", $conectar);	 	 
		 $Salantu     = $Salactu;
		 
		 $Mes_his  = $Mes_his + 1;
		 if ($Mes_his == 13) $Mes_his = 1;
	
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //MES 6
		 $result_his  = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his'", $conectar); 
         $row_his     = @mysql_fetch_array($result_his);
		 //$Mes_his     = $row_his["Mes"];
         $Debito_his  = $row_his["Debitou"];
	     $Credito_his = $row_his["Creditou"];
		 
         $Salactu     = $Salantu + $Debito_his - $Credito_his;
    	 $result_his  = mysql_query("UPDATE cwconhis SET Salantu='$Salantu', Salactu='$Salactu' WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his'", $conectar);	 	 
		 $Salantu     = $Salactu;
		 
		 $Mes_his  = $Mes_his + 1;
		 if ($Mes_his == 13) $Mes_his = 1;
	
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //MES 7
		 $result_his  = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his'", $conectar); 
         $row_his     = @mysql_fetch_array($result_his);
		 //$Mes_his     = $row_his["Mes"];
         $Debito_his  = $row_his["Debitou"];
	     $Credito_his = $row_his["Creditou"];
		 
         $Salactu     = $Salantu + $Debito_his - $Credito_his;
    	 $result_his  = mysql_query("UPDATE cwconhis SET Salantu='$Salantu', Salactu='$Salactu' WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his'", $conectar);	 	 
		 $Salantu     = $Salactu;
		 
		 $Mes_his  = $Mes_his + 1;
		 if ($Mes_his == 13) $Mes_his = 1;
	
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //MES 8
		 $result_his  = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his'", $conectar); 
         $row_his     = @mysql_fetch_array($result_his);
		 //$Mes_his     = $row_his["Mes"];
         $Debito_his  = $row_his["Debitou"];
	     $Credito_his = $row_his["Creditou"];
		 
         $Salactu     = $Salantu + $Debito_his - $Credito_his;
    	 $result_his  = mysql_query("UPDATE cwconhis SET Salantu='$Salantu', Salactu='$Salactu' WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his'", $conectar);	 	 
		 $Salantu     = $Salactu;
		 
		 $Mes_his  = $Mes_his + 1;
		 if ($Mes_his == 13) $Mes_his = 1;
	
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //MES 9
		 $result_his  = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his'", $conectar); 
         $row_his     = @mysql_fetch_array($result_his);
		 //$Mes_his     = $row_his["Mes"];
         $Debito_his  = $row_his["Debitou"];
	     $Credito_his = $row_his["Creditou"];
		 
         $Salactu     = $Salantu + $Debito_his - $Credito_his;
    	 $result_his  = mysql_query("UPDATE cwconhis SET Salantu='$Salantu', Salactu='$Salactu' WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his'", $conectar);	 	 
		 $Salantu     = $Salactu;
		 
		 $Mes_his  = $Mes_his + 1;
		 if ($Mes_his == 13) $Mes_his = 1;
	
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //MES 10
		 $result_his  = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his'", $conectar); 
         $row_his     = @mysql_fetch_array($result_his);
		 //$Mes_his     = $row_his["Mes"];
         $Debito_his  = $row_his["Debitou"];
	     $Credito_his = $row_his["Creditou"];
		 
         $Salactu     = $Salantu + $Debito_his - $Credito_his;
    	 $result_his  = mysql_query("UPDATE cwconhis SET Salantu='$Salantu', Salactu='$Salactu' WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his'", $conectar);	 	 
		 $Salantu     = $Salactu;
		 
		 $Mes_his  = $Mes_his + 1;
		 if ($Mes_his == 13) $Mes_his = 1;
	
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //MES 11
		 $result_his  = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his'", $conectar); 
         $row_his     = @mysql_fetch_array($result_his);
		 //$Mes_his     = $row_his["Mes"];
         $Debito_his  = $row_his["Debitou"];
	     $Credito_his = $row_his["Creditou"];
		 
         $Salactu     = $Salantu + $Debito_his - $Credito_his;
    	 $result_his  = mysql_query("UPDATE cwconhis SET Salantu='$Salantu', Salactu='$Salactu' WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his'", $conectar);	 	 
		 $Salantu     = $Salactu;
		 
		 $Mes_his  = $Mes_his + 1;
		 if ($Mes_his == 13) $Mes_his = 1;
	
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //MES 12
		 $result_his  = mysql_query("SELECT * FROM cwconhis WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his'", $conectar); 
         $row_his     = @mysql_fetch_array($result_his);
		 //$Mes_his     = $row_his["Mes"];
         $Debito_his  = $row_his["Debitou"];
	     $Credito_his = $row_his["Creditou"];
		 
         $Salactu     = $Salantu + $Debito_his - $Credito_his;
    	 $result_his  = mysql_query("UPDATE cwconhis SET Salantu='$Salantu', Salactu='$Salactu' WHERE Cuenta='$Cuenta_sub' AND Mes='$Mes_his'", $conectar);	 	 
		 $Salantu     = $Salactu;
		 
		 $Mes_his  = $Mes_his + 1;
		 if ($Mes_his == 13) $Mes_his = 1;
	
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

    	 $result_fin  = mysql_query("UPDATE cwconhco SET Estado='2' WHERE Numcom='$Numcom'", $conectar);	 	 
       } 
    }
	
echo "CONTABILIZADO COMPROBANTE --->".$Numcom."<BR>";


	   
}

mysql_close($conectar);

?>
