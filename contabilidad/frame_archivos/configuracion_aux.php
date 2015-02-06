<?php

 $Accion    = $_GET['Accion'];
 $Configuracion    = $_GET['Configuracion'];

 include("config_bd.php"); // archivo que llama a la base de datos 
 $result = mysql_query("SELECT Sepacta FROM cwconfig", $conectar); 
 $row = mysql_fetch_row($result);    

 if ($Configuracion == 'Config1')
 {
   $Nromax    = $_POST['Nromax'];
   $Niv1      = $_POST['Niv1'];
   $Niv2      = $_POST['Niv2'];
   $Niv3      = $_POST['Niv3'];
   $Niv4      = $_POST['Niv4']; 
   $Niv5      = $_POST['Niv5'];
   $Niv6      = $_POST['Niv6'];
   $Niv7      = $_POST['Niv7'];
   $Niv8      = $_POST['Niv8'];
   $Niv9      = $_POST['Niv9'];
   $Planunico = $_POST['Planunico'];
   $Confis    = $_POST['Confis'];  
   $Nomniv1   = $_POST['Nomniv1'];
   $Nomniv2   = $_POST['Nomniv2'];
   $Nomniv3   = $_POST['Nomniv3'];
   $Nomniv4   = $_POST['Nomniv4'];
   $Nomniv5   = $_POST['Nomniv5'];
   $Nomniv6   = $_POST['Nomniv6'];
   $Nomniv7   = $_POST['Nomniv7'];
   $Nomniv8   = $_POST['Nomniv8'];
   $Nomniv9   = $_POST['Nomniv9']; 
   $Codigo    = $_POST['Codigo'];
	$cuenta_cm=$_POST['cuenta_cierre_mes'];
	
   if ($Accion == 'Previa')
   {
     echo '<head>';
     echo '<title>Vista previa formato</title>';
     echo '</head>';  
   
     $Sepacta   = "$row[0]";

     $Formato    = "";

     if (($Nromax >= 1) && ($Niv1>0))
     {
       for ($i = 1; $i <= $Niv1; $i++) //NIVEL 1
       {
         $Formato = $Formato.'#'; 
       }
       $Formato = $Formato.$Sepacta;
     }
     if (($Nromax >= 2) && ($Niv2>0)) //NIVEL 2
     {
       for ($i = 1; $i <= $Niv2; $i++)
       {
         $Formato = $Formato.'#'; 
       }
       $Formato = $Formato.$Sepacta;
     }
     if (($Nromax >= 3) && ($Niv3>0)) //NIVEL 3
     {
       for ($i = 1; $i <= $Niv3; $i++)
       {
         $Formato = $Formato.'#'; 
       }
       $Formato = $Formato.$Sepacta;
     }  
     if (($Nromax >= 4) && ($Niv4>0)) //NIVEL 4
     {
       for ($i = 1; $i <= $Niv4; $i++)
       {
         $Formato = $Formato.'#'; 
       }
       $Formato = $Formato.$Sepacta;
     }  
     if (($Nromax >= 5) && ($Niv5>0)) //NIVEL 5
     {
       for ($i = 1; $i <= $Niv5; $i++)
       {
         $Formato = $Formato.'#'; 
       }
       $Formato = $Formato.$Sepacta;
     } 
     if (($Nromax >= 6) && ($Niv6>0)) //NIVEL 6
     {
       for ($i = 1; $i <= $Niv6; $i++)
       {
         $Formato = $Formato.'#'; 
       }
       $Formato = $Formato.$Sepacta;
     }
     if (($Nromax >= 7) && ($Niv7>0)) //NIVEL 7
     {
       for ($i = 1; $i <= $Niv7; $i++)
       {
         $Formato = $Formato.'#'; 
       }
       $Formato = $Formato.$Sepacta;
     } 
     if (($Nromax >= 1) && ($Niv8>0))  //NIVEL 8
     { 
       for ($i = 1; $i <= $Niv8; $i++)
       {
         $Formato = $Formato.'#'; 
       }
       $Formato = $Formato.$Sepacta;
     }
     if (($Nromax >= 1) && ($Niv9>0)) //NIVEL 9
     {
       for ($i = 1; $i <= $Niv9; $i++)
       {
         $Formato = $Formato.'#'; 
       }
       $Formato = $Formato.$Sepacta;
     } 
     echo "EL FORMATO QUE OBTENDRA CON LOS DATOS ACTUALES ES:  ";
     echo "$Formato";
	 mysql_close($conectar);  
   }
   if ($Accion == 'Modificar')
   {      
	 $result = mysql_query("UPDATE cwconfig SET Nromax='$Nromax', Niv1='$Niv1', Niv2='$Niv2', Niv3='$Niv3', Niv4='$Niv4', Niv5='$Niv5', Niv6='$Niv6', Niv7='$Niv7', Niv8='$Niv8', Niv9='$Niv9', Planunico='$Planunico', Confis='$Confis', Nomniv1='$Nomniv1', Nomniv2='$Nomniv2', Nomniv3='$Nomniv3', Nomniv4='$Nomniv4', Nomniv5='$Nomniv5', Nomniv6='$Nomniv6', Nomniv7='$Nomniv7', Nomniv8='$Nomniv8', Nomniv9='$Nomniv9', cuenta_cierre_mes='$cuenta_cm' WHERE Codigo='$Codigo'", $conectar);
	
mysql_close($conectar);
     header("Location: menu_int.php");
   }
 }   
  
 if ($Configuracion == 'Config2')
 { 
   if ($Accion == 'Modificar')
   {
     $Codigo    = $_POST['Codigo'];
     $Sepacta   = $_POST['Sepacta'];   
     $Balact    = $_POST['Balact'];
     $Balpas    = $_POST['Balpas'];
     $Balgan    = $_POST['Balgan'];   
     $Baling    = $_POST['Baling'];
     $Baleng    = $_POST['Baleng'];
     $balord    = $_POST['balord'];  
     $Nivacca   = $_POST['Nivacca'];   
     $Nivaccp   = $_POST['Nivaccp'];
     $Nivaccc   = $_POST['Nivaccc'];
     $Nivacci   = $_POST['Nivacci'];   
     $Nromaximo = $_POST['Nromaximo'];
     $Nroauto   = $_POST['Nroauto'];
 
     $result = mysql_query("UPDATE cwconfig SET Balact='$Balact',  Balpas='$Balpas', Balgan='$Balgan', Baling='$Baling', Baleng='$Baleng', Balord='$balord', Nivacca='$Nivacca', Nivaccp='$Nivaccp', Nivaccc='$Nivaccc', Nivacci='$Nivacci', Nromaximo='$Nromaximo', Nroauto='$Nroauto' WHERE Codigo='$Codigo'", $conectar);
     mysql_close($conectar);
     header("Location: menu_int.php");
   }	
 }   
 
 if ($Configuracion == 'Config3')
 { 
   if ($Accion == 'Modificar')
   {  
     $Nromaxaf  = $_POST['Nromaxaf'];
     $Niv1af    = $_POST['Niv1af'];
     $Niv2af    = $_POST['Niv2af'];
     $Niv3af    = $_POST['Niv3af'];
     $Niv4af    = $_POST['Niv4af']; 
     $Niv5af    = $_POST['Niv5af'];
     $Niv6af    = $_POST['Niv6af'];
     $Niv7af    = $_POST['Niv7af'];
     $Niv8af    = $_POST['Niv8af'];
     $Niv9af    = $_POST['Niv9af'];
     $Sepacta   = $_POST['Sepacta'];
     $Codigo    = $_POST['Codigo'];	

     $result = mysql_query("UPDATE cwconfig SET Niv1af='$Niv1af', Niv2af='$Niv2af', Niv3af='$Niv3af', Niv4af='$Niv4af', Niv5af='$Niv5af', Niv6af='$Niv6af', Niv7af='$Niv7af', Niv8af='$Niv8af', Niv9af='$Niv9af', Sepacta='$Sepacta', Nromaxaf='$Nromaxaf' WHERE Codigo='$Codigo'", $conectar);
     mysql_close($conectar);
     header("Location: menu_int.php");
   }
 } 
  			


?>