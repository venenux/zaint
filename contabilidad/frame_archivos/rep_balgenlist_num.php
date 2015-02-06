
<HTML><HEAD><TITLE></TITLE>

<style type="text/css">
<!--
.Estilo1 {
	font-size: 14px;
	font-family: Arial, Helvetica, sans-serif;
}
.Estilo4 {font-size: x-small}
-->
</style>
<?php 
  $Buscar = $_POST['Buscar'];
  $Filtro_Estado = $_POST['Filtro_Estado'];  
  $Nivcue = $_POST['Nivcue'];
  include("config_bd.php"); // archivo que llama a la base de datos 
  $result_config = mysql_query("SELECT * FROM cwconfig", $conectar);
  $array_config  = @mysql_fetch_array($result_config);

    
  if ($Nivcue==1)
  {
    $Nivcue_str = $array_config["Nomniv1"];
  }	else if ($Nivcue==2)
  {
    $Nivcue_str = $array_config["Nomniv2"];  
  }	else if ($Nivcue==3)
  {
    $Nivcue_str = $array_config["Nomniv3"];  
  }	else if ($Nivcue==4)
  {
    $Nivcue_str = $array_config["Nomniv4"];  
  }	else if ($Nivcue==5)
  {
    $Nivcue_str = $array_config["Nomniv5"];  
  }	else if ($Nivcue==6)
  {
    $Nivcue_str = $array_config["Nomniv6"];  
  }	else if ($Nivcue==7)
  {
    $Nivcue_str = $array_config["Nomniv7"];  
  }	else if ($Nivcue==8)
  {
    $Nivcue_str = $array_config["Nomniv8"];  
  }	else if ($Nivcue==9)
  {
    $Nivcue_str = $array_config["Nomniv9"];  
  }	
	
	
	
  //$fecha1 = $_POST['fecha11'];
  $fecha2 = $_POST['fecha22'];
  
  $Desde_cod = $_POST['Desde_cod'];
  $Hasta_cod = $_POST['Hasta_cod'];
  $Hoja      = $_POST['Hoja'];   
  
  
  //$fecha11 = $fecha2["6"].$fecha2["7"].$fecha2["8"].$fecha2["9"].'/01/01';
  $fecha22 = $fecha2["6"].$fecha2["7"].$fecha2["8"].$fecha2["9"].'/'.$fecha2["3"].$fecha2["4"].'/'.$fecha2["0"].$fecha2["1"];

  $Fecha = date("d/m/Y",time());
  $Hora  = date("h:i");

  $res_emp = mysql_query("SELECT * FROM cwconemp", $conectar); 
  $row_emp = mysql_fetch_array($res_emp);  
  $Nomemp = $row_emp["Nomemp"];
  $fecha11 = $row_emp["Fecini"];
?>
</HEAD>
<BODY>







<pre class="Estilo1">                                                                                                                                                             Hora: <?php echo $Hora?>
                                                                                                                                                             
                                                                                                                                                             Fecha: <?php echo $Fecha?>  

<?php 
  echo '<b>';
  echo $Nomemp;
  echo '</b>';
?>

Sistema de contabilidad.                 <strong>            BALANCE GENERAL AL <?php echo $fecha2?></strong>                                      
<span class="Estilo4">Nivel: <?php echo $Nivcue_str;?>

___________________________________________________________________________________________________________
<?php 
   $result_emp = mysql_query("SELECT * FROM cwconemp ", $conectar); 
   $row_emp    = @mysql_fetch_array($result_emp);
   $Fecini     = $row_emp["Fecini"];
   $result_config = mysql_query("SELECT * FROM cwconfig", $conectar);
   $array_config  = @mysql_fetch_array($result_config);
   $Balpas_fin    = $array_config["Balpas"];
   $Balact_fin    = $array_config["Balact"];
    
   $Sepacta       = $array_config["Sepacta"];
   $Sepacta_len   = strlen($Sepacta);
   $Balact_pas    = $Hoja.$Sepacta; 
   $result = mysql_query("DELETE FROM cwconaux WHERE Cuenta<>'Z'", $conectar);  
   $result = mysql_query("SELECT * FROM cwconcue WHERE Cuenta LIKE '$Balact_pas%' ORDER BY Cuenta DESC", $conectar);
 
   while ($row = @mysql_fetch_array($result)) 
   {  	
     $Cuenta  = $row["Cuenta"];
	 $Descrip = $row["Descrip"];
     $Nivel   = $row["Nivel"];  
	 $Tipo    = $row["Tipo"];     

     //QUERY PARA EL SALDO ANTERIOR
     $result_ant = mysql_query("SELECT SUM(Credito) AS Credsum, SUM(Debito) AS Debsum  FROM cwcondco WHERE Cuenta LIKE '$Cuenta%' AND FechaD>='$Fecini' AND FechaD<'$fecha11'", $conectar); 
     $row_ant = @mysql_fetch_array($result_ant); 
     $Credito = $row_ant["Credsum"];
     $Debito  = $row_ant["Debsum"];
     $Salantu = $Debito - $Credito; //SALDO ANTERIOR HASTA LA FECHA
     $result_sum = mysql_query("SELECT SUM(Credito) AS Credsum, SUM(Debito) AS Debsum  FROM cwcondco WHERE Cuenta LIKE '$Cuenta%' AND FechaD BETWEEN '$fecha11' AND '$fecha22'", $conectar); 
     $row_sum = @mysql_fetch_array($result_sum);
	 $Credito = $row_sum["Credsum"];
     $Debito  = $row_sum["Debsum"];
     $Salmes  =  $Debito - $Credito;
     $Salactu = $Salantu + $Salmes;
     $result_insert = mysql_query("INSERT INTO cwconaux (Cuenta, Descrip, Debito, Credito, Salmes, Salant, Salactu, Nivel, Tipo) VALUES ('$Cuenta','$Descrip','$Debito','$Credito','$Salmes','$Salantu','$Salactu', $Nivel, '$Tipo')", $conectar); 
   }  
         echo '<TABLE class=ewTable id=ewlistmain width="100%">'; // tabla externa
           echo "<table border = '0'> \n"; 

   $result_niv1 = mysql_query("SELECT * FROM cwconaux WHERE Nivel='1' ORDER BY Cuenta ASC", $conectar); 
   while ($row_niv1 = @mysql_fetch_array($result_niv1)) //NIVEL 1
   { 
     $Debito_niv1  = $row_niv1["Debito"];
     $Credito_niv1 = $row_niv1["Credito"];
     $Descrip_niv1 = $row_niv1["Descrip"];
     $Cuenta_niv1 = $row_niv1["Cuenta"]; 

     $Debito_float  = ((real) $Debito_niv1);
     $Credito_float = ((real) $Credito_niv1);
     $Debito_float_format  = number_format($Debito_float,2,',','.');
     $Credito_float_format = number_format($Credito_float,2,',','.');
     $Debito_float_format_niv1  = ((string)$Debito_float_format);
     $Credito_float_format_niv1 = ((string)$Credito_float_format);

     $Salactu_niv1  = $row_niv1["Salactu"];
     $Salantu_niv1  = $row_niv1["Salant"];
		
     $Salactu_float  = ((real) $Salactu_niv1);
     $Salantu_float = ((real) $Salantu_niv1);
     $Salactu_float_format  = number_format($Salactu_float,2,',','.');
     $Salantu_float_format = number_format($Salantu_float,2,',','.');
     $Salactu_float_format_niv1  = ((string)$Salactu_float_format);
     $Salantu_float_format_niv1 = ((string)$Salantu_float_format);
	  
     $Salmes_niv1  = $row_niv1["Salmes"];
     $Salmes_float  = ((real) $Salmes_niv1);
     $Salmes_float_format  = number_format($Salmes_float,2,',','.');
     $Salmes_float_format_niv1  = ((string)$Salmes_float_format);   
   
     if ($Nivcue>=1) if ($Nivcue==1)
	 {
       echo "<tr class=ewTableAltRow ><td></td><td>".$Descrip_niv1."</td><td></td><td>".$Salactu_float_format."</td><td></td><td>".' '."</td></tr> \n"; 
     } else
	 {
       echo "<tr class=ewTableAltRow ><td>".$Descrip_niv1."</td><td></td><td></td><td>".' '."</td><td></td><td>".$Salactu_float_format."</td></tr> \n"; 
	 } 
	    	
     $result_niv2 = mysql_query("SELECT * FROM cwconaux WHERE Nivel='2' AND Cuenta LIKE '$Cuenta_niv1%' ORDER BY Cuenta ASC", $conectar); 
     while ($row_niv2 = @mysql_fetch_array($result_niv2)) //NIVEL 2
     {  	
       $Debito_niv2  = $row_niv2["Debito"];
       $Credito_niv2 = $row_niv2["Credito"];
       $Descrip_niv2 = $row_niv2["Descrip"];
       $Cuenta_niv2  = $row_niv2["Cuenta"];    	
       $Tipo_niv2    = $row_niv2["Tipo"]; 

       $Debito_float  = ((real) $Debito_niv2);
       $Credito_float = ((real) $Credito_niv2);
       $Debito_float_format  = number_format($Debito_float,2,',','.');
       $Credito_float_format = number_format($Credito_float,2,',','.');
       $Debito_float_format_niv2  = ((string)$Debito_float_format);
       $Credito_float_format_niv2 = ((string)$Credito_float_format);

       $Salactu_niv2  = $row_niv2["Salactu"];
       $Salantu_niv2  = $row_niv2["Salant"];
		
       $Salactu_float  = ((real) $Salactu_niv2);
       $Salantu_float = ((real) $Salantu_niv2);
       $Salactu_float_format  = number_format($Salactu_float,2,',','.');
       $Salantu_float_format = number_format($Salantu_float,2,',','.');
       $Salactu_float_format_niv2  = ((string)$Salactu_float_format);
       $Salantu_float_format_niv2 = ((string)$Salantu_float_format);
	  
       $Salmes_niv2  = $row_niv2["Salmes"];
       $Salmes_float  = ((real) $Salmes_niv2);
       $Salmes_float_format  = number_format($Salmes_float,2,',','.');
       $Salmes_float_format_niv2  = ((string)$Salmes_float_format);   
   
       if ($Nivcue>=2) if ($Nivcue==2)
	   {
         echo "<tr class=ewTableAltRow ><td></td><td>".$Descrip_niv2."</td><td></td><td>".$Salactu_float_format."</td><td></td><td>".' '."</td></tr> \n"; 
       } else
	   {
         echo "<tr class=ewTableAltRow ><td>".$Descrip_niv2."</td><td></td><td></td><td>".' '."</td><td></td><td>".$Salactu_float_format."</td></tr> \n"; 
	   }
	 
       $result_niv3 = mysql_query("SELECT * FROM cwconaux WHERE Nivel='3' AND Cuenta LIKE '$Cuenta_niv2%' ORDER BY Cuenta ASC", $conectar); 
       while ($row_niv3 = @mysql_fetch_array($result_niv3)) //NIVEL 3
       {  	
         $Debito_niv3  = $row_niv3["Debito"];
         $Credito_niv3 = $row_niv3["Credito"];
         $Descrip_niv3 = $row_niv3["Descrip"];
         $Cuenta_niv3  = $row_niv3["Cuenta"];    	
         $Tipo_niv3    = $row_niv3["Tipo"]; 

         $Debito_float  = ((real) $Debito_niv3);
         $Credito_float = ((real) $Credito_niv3);
         $Debito_float_format  = number_format($Debito_float,2,',','.');
         $Credito_float_format = number_format($Credito_float,2,',','.');
         $Debito_float_format_niv3  = ((string)$Debito_float_format);
         $Credito_float_format_niv3 = ((string)$Credito_float_format);

         $Salactu_niv3  = $row_niv3["Salactu"];
         $Salantu_niv3  = $row_niv3["Salant"];
		
         $Salactu_float  = ((real) $Salactu_niv3);
         $Salantu_float = ((real) $Salantu_niv3);
         $Salactu_float_format  = number_format($Salactu_float,2,',','.');
         $Salantu_float_format = number_format($Salantu_float,2,',','.');
         $Salactu_float_format_niv3  = ((string)$Salactu_float_format);
         $Salantu_float_format_niv3 = ((string)$Salantu_float_format);
	  
         $Salmes_niv3  = $row_niv3["Salmes"];
         $Salmes_float  = ((real) $Salmes_niv3);
         $Salmes_float_format  = number_format($Salmes_float,2,',','.');
         $Salmes_float_format_niv3  = ((string)$Salmes_float_format);   
   
         if ($Nivcue>=3) if ($Nivcue==3) 
    	 {
           echo "<tr class=ewTableAltRow ><td></td><td".$Descrip_niv3."></td><td></td><td>".$Salactu_float_format."</td><td></td><td>".' '."</td></tr> \n"; 
         } else
	     {
           echo "<tr class=ewTableAltRow ><td>".$Descrip_niv3."</td><td></td><td></td><td>".' '."</td><td></td><td>".$Salactu_float_format."</td></tr> \n"; 
	     } 
	   
         $result_niv4 = mysql_query("SELECT * FROM cwconaux WHERE Nivel='4' AND Cuenta LIKE '$Cuenta_niv3%' ORDER BY Cuenta ASC", $conectar); 
         while ($row_niv4 = @mysql_fetch_array($result_niv4)) //NIVEL 4
         {  	
           $Debito_niv4  = $row_niv4["Debito"];
           $Credito_niv4 = $row_niv4["Credito"];
           $Descrip_niv4 = $row_niv4["Descrip"];
           $Cuenta_niv4 = $row_niv4["Cuenta"];    	
           $Tipo_niv4    = $row_niv4["Tipo"]; 

           $Debito_float  = ((real) $Debito_niv4);
           $Credito_float = ((real) $Credito_niv4);
           $Debito_float_format  = number_format($Debito_float,2,',','.');
           $Credito_float_format = number_format($Credito_float,2,',','.');
           $Debito_float_format_niv4  = ((string)$Debito_float_format);
           $Credito_float_format_niv4 = ((string)$Credito_float_format);

           $Salactu_niv4  = $row_niv4["Salactu"];
           $Salantu_niv4  = $row_niv4["Salant"];
		
           $Salactu_float  = ((real) $Salactu_niv4);
           $Salantu_float = ((real) $Salantu_niv4);
           $Salactu_float_format  = number_format($Salactu_float,2,',','.');
           $Salantu_float_format = number_format($Salantu_float,2,',','.');
           $Salactu_float_format_niv4  = ((string)$Salactu_float_format);
           $Salantu_float_format_niv4 = ((string)$Salantu_float_format);
	  
           $Salmes_niv4  = $row_niv4["Salmes"];
           $Salmes_float  = ((real) $Salmes_niv4);
           $Salmes_float_format  = number_format($Salmes_float,2,',','.');
           $Salmes_float_format_niv4  = ((string)$Salmes_float_format);   
   
           if ($Nivcue>=4) if ($Nivcue==4)
           {
             echo "<tr class=ewTableAltRow ><td></td><td>".$Descrip_niv4."</td><td></td><td>".$Salactu_float_format."</td><td></td><td>".' '."</td></tr> \n"; 
           } else
	       {
             echo "<tr class=ewTableAltRow ><td>".$Descrip_niv4."</td><td></td><td></td><td>".' '."</td><td></td><td>".$Salactu_float_format."</td></tr> \n"; 
	       }

           $result_niv5 = mysql_query("SELECT * FROM cwconaux WHERE Nivel='5' AND Cuenta LIKE '$Cuenta_niv4%' ORDER BY Cuenta ASC", $conectar); 
           while ($row_niv5 = @mysql_fetch_array($result_niv5)) //NIVEL 5
           {  	
             $Debito_niv5  = $row_niv5["Debito"];
             $Credito_niv5 = $row_niv5["Credito"];
             $Descrip_niv5 = $row_niv5["Descrip"];
             $Cuenta_niv5 = $row_niv5["Cuenta"];    	
             $Tipo_niv5    = $row_niv5["Tipo"]; 

             $Debito_float  = ((real) $Debito_niv5);
             $Credito_float = ((real) $Credito_niv5);
             $Debito_float_format  = number_format($Debito_float,2,',','.');
             $Credito_float_format = number_format($Credito_float,2,',','.');
             $Debito_float_format_niv5  = ((string)$Debito_float_format);
             $Credito_float_format_niv5 = ((string)$Credito_float_format);

             $Salactu_niv5  = $row_niv5["Salactu"];
             $Salantu_niv5  = $row_niv5["Salant"];
		
             $Salactu_float  = ((real) $Salactu_niv5);
             $Salantu_float = ((real) $Salantu_niv5);
             $Salactu_float_format  = number_format($Salactu_float,2,',','.');
             $Salantu_float_format = number_format($Salantu_float,2,',','.');
             $Salactu_float_format_niv5  = ((string)$Salactu_float_format);
             $Salantu_float_format_niv5 = ((string)$Salantu_float_format);
	  
             $Salmes_niv5  = $row_niv5["Salmes"];
             $Salmes_float  = ((real) $Salmes_niv5);
             $Salmes_float_format  = number_format($Salmes_float,2,',','.');
             $Salmes_float_format_niv5  = ((string)$Salmes_float_format);   
   
             if ($Nivcue>=5) if ($Nivcue==5)
        	 {
               echo "<tr class=ewTableAltRow ><td></td><td>".$Descrip_niv5."</td><td></td><td>".$Salactu_float_format."</td><td></td><td>".' '."</td></tr> \n"; 
             } else
	         {
               echo "<tr class=ewTableAltRow ><td>".$Descrip_niv5."</td><td></td><td></td><td>".' '."</td><td></td><td>".$Salactu_float_format."</td></tr> \n"; 
	         }
			  		   
             $result_niv6 = mysql_query("SELECT * FROM cwconaux WHERE Nivel='6' AND Cuenta LIKE '$Cuenta_niv5%' ORDER BY Cuenta ASC", $conectar); 
             while ($row_niv6 = @mysql_fetch_array($result_niv6)) //NIVEL 6
             {    	
               $Debito_niv6  = $row_niv6["Debito"];
               $Credito_niv6 = $row_niv6["Credito"];
               $Descrip_niv6 = $row_niv6["Descrip"];
               $Cuenta_niv6  = $row_niv6["Cuenta"]; 			   
               $Tipo_niv6    = $row_niv6["Tipo"]; 
			 
               $Debito_float  = ((real) $Debito_niv6);
               $Credito_float = ((real) $Credito_niv6);
               $Debito_float_format  = number_format($Debito_float,2,',','.');
               $Credito_float_format = number_format($Credito_float,2,',','.');
               $Debito_float_format_niv6  = ((string)$Debito_float_format);
               $Credito_float_format_niv6 = ((string)$Credito_float_format);

               $Salactu_niv6  = $row_niv6["Salactu"];
               $Salantu_niv6  = $row_niv6["Salant"];
		
               $Salactu_float  = ((real) $Salactu_niv6);
               $Salantu_float = ((real) $Salantu_niv6);
               $Salactu_float_format  = number_format($Salactu_float,2,',','.');
               $Salantu_float_format = number_format($Salantu_float,2,',','.');
               $Salactu_float_format_niv6  = ((string)$Salactu_float_format);
               $Salantu_float_format_niv6 = ((string)$Salantu_float_format);
	  
               $Salmes_niv6  = $row_niv6["Salmes"];
               $Salmes_float  = ((real) $Salmes_niv6);
               $Salmes_float_format  = number_format($Salmes_float,2,',','.');
               $Salmes_float_format_niv6  = ((string)$Salmes_float_format);   
   
               if ($Nivcue>=6) if ($Nivcue==6)
               {
                 echo "<tr class=ewTableAltRow ><td></td><td>".$Descrip_niv6."</td><td></td><td>".$Salactu_float_format."</td><td></td><td>".' '."</td></tr> \n"; 
               } else
               {
                 echo "<tr class=ewTableAltRow ><td>".$Descrip_niv6."</td><td></td><td></td><td>".' '."</td><td></td><td>".$Salactu_float_format."</td></tr> \n"; 
	           } 
			 
               $result_niv7 = mysql_query("SELECT * FROM cwconaux WHERE Nivel='7' AND Cuenta LIKE '$Cuenta_niv6%' ORDER BY Cuenta ASC", $conectar); 
               while ($row_niv7 = @mysql_fetch_array($result_niv7)) //NIVEL 7
               {    	
                 $Debito_niv7  = $row_niv7["Debito"];
                 $Credito_niv7 = $row_niv7["Credito"];
                 $Descrip_niv7 = $row_niv7["Descrip"];
                 $Cuenta_niv7 = $row_niv7["Cuenta"];    	
                 $Tipo_niv7    = $row_niv7["Tipo"]; 
 
                 $Debito_float  = ((real) $Debito_niv7);
                 $Credito_float = ((real) $Credito_niv7);
                 $Debito_float_format  = number_format($Debito_float,2,',','.');
                 $Credito_float_format = number_format($Credito_float,2,',','.');
                 $Debito_float_format_niv7  = ((string)$Debito_float_format);
                 $Credito_float_format_niv7 = ((string)$Credito_float_format);

                 $Salactu_niv7  = $row_niv7["Salactu"];
                 $Salantu_niv7  = $row_niv7["Salant"];
		
                 $Salactu_float  = ((real) $Salactu_niv7);
                 $Salantu_float = ((real) $Salantu_niv7);
                 $Salactu_float_format  = number_format($Salactu_float,2,',','.');
                 $Salantu_float_format = number_format($Salantu_float,2,',','.');
                 $Salactu_float_format_niv7  = ((string)$Salactu_float_format);
                 $Salantu_float_format_niv7 = ((string)$Salantu_float_format);
	  
                 $Salmes_niv7  = $row_niv7["Salmes"];
                 $Salmes_float  = ((real) $Salmes_niv7);
                 $Salmes_float_format  = number_format($Salmes_float,2,',','.');
                 $Salmes_float_format_niv7  = ((string)$Salmes_float_format);   
   
                 if ($Nivcue>=7) if ($Nivcue==7)
            	 {
                   echo "<tr class=ewTableAltRow ><td></td><td>".$Descrip_niv7."</td><td></td><td>".$Salactu_float_format."</td><td></td><td>".' '."</td></tr> \n"; 
                 } else
            	 {
                   echo "<tr class=ewTableAltRow ><td>".$Descrip_niv7."</td><td></td><td></td><td>".' '."</td><td></td><td>".$Salactu_float_format."</td></tr> \n"; 
	             } 

                 $result_niv8 = mysql_query("SELECT * FROM cwconaux WHERE Nivel='8' AND Cuenta LIKE '$Cuenta_niv7%' ORDER BY Cuenta ASC", $conectar); 
                 while ($row_niv8 = @mysql_fetch_array($result_niv8)) //NIVEL 8
                 {    	
                   $Debito_niv8  = $row_niv8["Debito"];
                   $Credito_niv8 = $row_niv8["Credito"];
                   $Descrip_niv8 = $row_niv8["Descrip"];
                   $Cuenta_niv8 = $row_niv8["Cuenta"];    	
                   $Tipo_niv8    = $row_niv8["Tipo"]; 

                   $Debito_float  = ((real) $Debito_niv8);
                   $Credito_float = ((real) $Credito_niv8);
                   $Debito_float_format  = number_format($Debito_float,2,',','.');
                   $Credito_float_format = number_format($Credito_float,2,',','.');
                   $Debito_float_format_niv8  = ((string)$Debito_float_format);
                   $Credito_float_format_niv8 = ((string)$Credito_float_format);

                   $Salactu_niv8  = $row_niv8["Salactu"];
                   $Salantu_niv8  = $row_niv8["Salant"];
		
                   $Salactu_float  = ((real) $Salactu_niv8);
                   $Salantu_float = ((real) $Salantu_niv8);
                   $Salactu_float_format  = number_format($Salactu_float,2,',','.');
                   $Salantu_float_format = number_format($Salantu_float,2,',','.');
                   $Salactu_float_format_niv8  = ((string)$Salactu_float_format);
                   $Salantu_float_format_niv8 = ((string)$Salantu_float_format);
	  
                   $Salmes_niv8  = $row_niv8["Salmes"];
                   $Salmes_float  = ((real) $Salmes_niv8);
                   $Salmes_float_format  = number_format($Salmes_float,2,',','.');
                   $Salmes_float_format_niv8  = ((string)$Salmes_float_format);   
   
                   if ($Nivcue>=8) if ($Nivcue==8)
       	           {
                     echo "<tr class=ewTableAltRow ><td></td><td>".$Descrip_niv8."</td><td></td><td>".$Salactu_float_format."</td><td></td><td>".' '."</td></tr> \n"; 
                   } else
	               {
                     echo "<tr class=ewTableAltRow ><td>".$Descrip_niv8."</td><td></td><td></td><td>".' '."</td><td></td><td>".$Salactu_float_format."</td></tr> \n"; 
	               }
	 
                   $result_niv9 = mysql_query("SELECT * FROM cwconaux WHERE Nivel='9' AND Cuenta LIKE '$Cuenta_niv8%' ORDER BY Cuenta ASC", $conectar); 
                   while ($row_niv9 = @mysql_fetch_array($result_niv9)) //NIVEL 9
                   {    	
                     $Debito_niv9  = $row_niv9["Debito"];
                     $Credito_niv9 = $row_niv9["Credito"];
                     $Descrip_niv9 = $row_niv9["Descrip"];
                     $Cuenta_niv9  = $row_niv9["Cuenta"];    	
                     $Tipo_niv9    = $row_niv9["Tipo"]; 

                     $Debito_float  = ((real) $Debito_niv9);
                     $Credito_float = ((real) $Credito_niv9);
                     $Debito_float_format  = number_format($Debito_float,2,',','.');
                     $Credito_float_format = number_format($Credito_float,2,',','.');
                     $Debito_float_format_niv9  = ((string)$Debito_float_format);
                     $Credito_float_format_niv9 = ((string)$Credito_float_format);

                     $Salactu_niv9  = $row_niv9["Salactu"];
                     $Salantu_niv9  = $row_niv9["Salant"];
		
                     $Salactu_float  = ((real) $Salactu_niv9);
                     $Salantu_float = ((real) $Salantu_niv9);
                     $Salactu_float_format  = number_format($Salactu_float,2,',','.');
                     $Salantu_float_format = number_format($Salantu_float,2,',','.');
                     $Salactu_float_format_niv9  = ((string)$Salactu_float_format);
                     $Salantu_float_format_niv9 = ((string)$Salantu_float_format);
	  
                     $Salmes_niv9  = $row_niv9["Salmes"];
                     $Salmes_float  = ((real) $Salmes_niv9);
                     $Salmes_float_format  = number_format($Salmes_float,2,',','.');
                     $Salmes_float_format_niv9  = ((string)$Salmes_float_format);   
   
                     if ($Nivcue>=9) if ($Nivcue==9)
                 	 {
                       echo "<tr class=ewTableAltRow ><td></td><td>".$Descrip_niv9."</td><td></td><td>".$Salactu_float_format."</td><td></td><td>".' '."</td></tr> \n"; 
                     } else
	                 {
                       echo "<tr class=ewTableAltRow ><td>".$Descrip_niv9."</td><td></td><td></td><td>".' '."</td><td></td><td>".$Salactu_float_format."</td></tr> \n"; 
	                 }
                   } //FINAL NIVEL 9  
                 } //FINAL NIVEL 8  
               } //FINAL NIVEL 7  
             } //FINAL NIVEL 6  
           } //FINAL NIVEL 5 
         } //FINAL NIVEL 4 
       } //FINAL NIVEL 3 
     } //FINAL NIVEL 2 
     if ($Hoja==$Balact_fin) 
	 { 
       echo "<tr class=ewTableAltRow ><td>"."_______________________"."</td><td></td><td></td><td></td><td></td><td>"."________________"."</td></tr> \n"; 
       echo "<tr class=ewTableAltRow ><td>".$Descrip_niv1."</td><td></td><td></td><td>".' '."</td><td></td><td>".$Salactu_float_format."</td></tr> \n"; 
     } else if ($Hoja==$Balpas_fin) 
	 {
 
       $Resultado  = 0;
       $Resultado_float  = ((real) $Resultado);
       $Resultado_float_format  = number_format($Resultado_float,2,',','.');
       $Resultado_float_format_print  = ((string)$Resultado_float_format);   
 	 
	 
       echo "<tr class=ewTableAltRow ><td>"."_______________________"."</td><td></td><td></td><td></td><td></td><td>"."________________"."</td></tr> \n"; 
       echo "<tr class=ewTableAltRow ><td>".'RESULTADO'."</td><td></td><td></td><td>".' '."</td><td></td><td>".$Resultado_float_format_print."</td></tr> \n"; 

       $Pasivo_y_Resultado  = $Salactu_niv1 + $Resultado;
       $Pasivo_y_Resultado_float  = ((real) $Pasivo_y_Resultado);
       $Pasivo_y_Resultado_float_format  = number_format($Pasivo_y_Resultado_float,2,',','.');
       $Pasivo_y_Resultado_float_format_print  = ((string)$Pasivo_y_Resultado_float_format);   
	   
	   
       echo "<tr class=ewTableAltRow ><td>"."_______________________"."</td><td></td><td></td><td></td><td></td><td>"."________________"."</td></tr> \n"; 
       echo "<tr class=ewTableAltRow ><td>".'PASIVO Y RESULTADOS'."</td><td></td><td></td><td>".' '."</td><td></td><td>".$Pasivo_y_Resultado_float_format_print."</td></tr> \n"; 

       $Capital = 0;
       $Capital_float  = ((real) $Capital);
       $Capital_float_format  = number_format($Capital_float,2,',','.');
       $Capital_float_format_print  = ((string)$Capital_float_format);   

       echo "<tr class=ewTableAltRow ><td>"."_______________________"."</td><td></td><td></td><td></td><td></td><td>"."________________"."</td></tr> \n"; 
       echo "<tr class=ewTableAltRow ><td>".'CAPITAL'."</td><td></td><td></td><td>".' '."</td><td></td><td>".$Capital_float_format_print."</td></tr> \n"; 

       $Total = $Pasivo_y_Resultado + $Capital;
       $Total_float  = ((real) $Total);
       $Total_float_format  = number_format($Total_float,2,',','.');
       $Total_float_format_print  = ((string)$Total_float_format);	   
	   
       echo "<tr class=ewTableAltRow ><td>"."_______________________"."</td><td></td><td></td><td></td><td></td><td>"."________________"."</td></tr> \n"; 
       echo "<tr class=ewTableAltRow ><td></td><td></td><td></td><td>".' '."</td><td></td><td>".$Total_float_format_print."</td></tr> \n"; 

     }

   } //FINAL NIVEL 1

   
?></span></pre>
</body> 
</html>
