
<HTML><HEAD><TITLE></TITLE>
<META http-equiv=Content-Type content="text/html; charset=utf-8"><LINK 
href="usuarioslist_archivos/rep_Asys_Maker.css" type=text/css rel=stylesheet><LINK 
href="usuarioslist_archivos/rep_estilos.css" type=text/css rel=stylesheet><style type="text/css">
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
  
  $fecha1 = $_POST['fecha11'];
  $fecha2 = $_POST['fecha22'];
  
  $Desde_cod = $_POST['Desde_cod'];
  $Hasta_cod = $_POST['Hasta_cod'];
  
  

  $fecha11 = $fecha1["6"].$fecha1["7"].$fecha1["8"].$fecha1["9"].'/'.$fecha1["3"].$fecha1["4"].'/'.$fecha1["0"].$fecha1["1"];
  $fecha22 = $fecha2["6"].$fecha2["7"].$fecha2["8"].$fecha2["9"].'/'.$fecha2["3"].$fecha2["4"].'/'.$fecha2["0"].$fecha2["1"];

//$fecha11=fecha_sql($fecha11);
//$fecha22=fecha_sql($fecha22);
// echo $fecha11." ".$fecha22;
  $Fecha = date("d/m/Y",time());
  $Hora  = date("h:i");

  include("config_bd.php"); // archivo que llama a la base de datos 
  $res_emp = mysql_query("SELECT * FROM cwconemp", $conectar); 
  $row_emp = mysql_fetch_array($res_emp);  
  $Nomemp = $row_emp["Nomemp"];
  
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

Sistema de contabilidad.                 <strong>BALANCE DE COMPROBACION DESDE <?php echo $fecha1?> HASTA <?php echo $fecha2?></strong>                                      
<span class="Estilo4">___________________________________________________________________________________________________________
<?php 
   $result_emp = mysql_query("SELECT * FROM cwconemp ", $conectar); 
   $row_emp    = @mysql_fetch_array($result_emp);
   $Fecini     = $row_emp["Fecini"];
   $result_config = mysql_query("SELECT * FROM cwconfig", $conectar);
   $array_config  = @mysql_fetch_array($result_config);
   $Sepacta       = $array_config["Sepacta"];
   $Sepacta_len   = strlen($Sepacta);
   $result = mysql_query("DELETE FROM cwconaux WHERE Cuenta<>'Z'", $conectar);  
   $result = mysql_query("SELECT * FROM cwconcue ORDER BY Cuenta DESC", $conectar); 
   //$pag = mysql_num_rows($result);
   //echo $pag."ASPA";
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
           echo "<tr class=ewTableHeader >";  
	       echo '<td vAlign=top><SPAN><b>CUENTA</b></SPAN></td>';
           echo "<TD>&nbsp;</TD>";
	       echo '<td vAlign=top><SPAN><b>NOMBRE</b></SPAN></td>';
           echo "<TD>&nbsp;</TD>";
	       echo '<td vAlign=top><SPAN><b>S ANT</b></SPAN></td>';
           echo "<TD>&nbsp;</TD>";
	       echo '<td vAlign=top><SPAN><b>DEBITOS</b></SPAN></td>';
           echo "<TD>&nbsp;</TD>";
	       echo '<td vAlign=top><SPAN><b>CREDITOS</b></SPAN></td>';
           echo "<TD>&nbsp;</TD>";
	       echo '<td vAlign=top><SPAN><b>S MES</b></SPAN></td>';
           echo "<TD>&nbsp;</TD>";
	       echo '<td vAlign=top><SPAN><b>S ACT</b></SPAN></td>';
	     echo "</tr> \n"; 

   //$result_niv = mysql_query("SELECT * FROM cwconaux ORDER BY Cuenta ASC", $conectar); 
   //$resul_pag=mysql_query($cosulta_pag,$conectar);
   //echo $cosulta_pag."Resul".$resul_niv."<br>";
   //$pag=mysql_num_rows($result_niv);
   //echo $pag."Cuenta";
   
   $result_niv1 = mysql_query("SELECT * FROM cwconaux WHERE Nivel='1' ORDER BY Cuenta ASC", $conectar); 
   $niv1=mysql_num_rows($result_niv1);
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
   
     echo "<tr class=ewTableAltRow ><td>".$Cuenta_niv1."</td><td></td><td>".$Descrip_niv1."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td></tr> \n"; 
        	
     $result_niv2 = mysql_query("SELECT * FROM cwconaux WHERE Nivel='2' AND Cuenta LIKE '$Cuenta_niv1%' ORDER BY Cuenta ASC", $conectar); 
	$niv2=mysql_num_rows($result_niv2);
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
    
	   if ($Tipo_niv2 == 'T')
	   {
         echo "<tr class=ewTableAltRow ><td>".$Cuenta_niv2."</td><td></td><td>".$Descrip_niv2."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td></tr> \n"; 
       } else if ($Tipo_niv2 == 'P')
	   {
         echo "<tr class=ewTableAltRow ><td>".$Cuenta_niv2."</td><td></td><td>".$Descrip_niv2."</td><td></td><td>".$Salantu_float_format_niv2."</td><td></td><td>".$Debito_float_format_niv2."</td><td></td><td>".$Credito_float_format_niv2."</td><td></td><td>".$Salmes_float_format_niv2."</td><td></td><td>".$Salactu_float_format_niv2."</td></tr> \n"; 
       } 
	   	    
       $result_niv3 = mysql_query("SELECT * FROM cwconaux WHERE Nivel='3' AND Cuenta LIKE '$Cuenta_niv2%' ORDER BY Cuenta ASC", $conectar); 
       $niv3=mysql_num_rows($result_niv3);
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
   
         if ($Tipo_niv3 == 'T')
	     {
           echo "<tr class=ewTableAltRow ><td>".$Cuenta_niv3."</td><td></td><td>".$Descrip_niv3."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td></tr> \n"; 
         } else if ($Tipo_niv3 == 'P')
	     {
           echo "<tr class=ewTableAltRow ><td>".$Cuenta_niv3."</td><td></td><td>".$Descrip_niv3."</td><td></td><td>".$Salantu_float_format_niv3."</td><td></td><td>".$Debito_float_format_niv3."</td><td></td><td>".$Credito_float_format_niv3."</td><td></td><td>".$Salmes_float_format_niv3."</td><td></td><td>".$Salactu_float_format_niv3."</td></tr> \n"; 
         } 
	   
         $result_niv4 = mysql_query("SELECT * FROM cwconaux WHERE Nivel='4' AND Cuenta LIKE '$Cuenta_niv3%' ORDER BY Cuenta ASC", $conectar); 
         $niv4=mysql_num_rows($result_niv4);
		 while ($row_niv4 = @mysql_fetch_array($result_niv4)) //NIVEL 4
         {  	
           $Debito_niv4  = $row_niv4["Debito"];
           $Credito_niv4 = $row_niv4["Credito"];
           $Descrip_niv4 = $row_niv4["Descrip"];
           $Cuenta_niv4  = $row_niv4["Cuenta"];    	
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
   
    	   if ($Tipo_niv4 == 'T')
    	   {
             echo "<tr class=ewTableAltRow ><td>".$Cuenta_niv4."</td><td></td><td>".$Descrip_niv4."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td></tr> \n"; 
           } else if ($Tipo_niv4 == 'P')
	       {
             echo "<tr class=ewTableAltRow ><td>".$Cuenta_niv4."</td><td></td><td>".$Descrip_niv4."</td><td></td><td>".$Salantu_float_format_niv4."</td><td></td><td>".$Debito_float_format_niv4."</td><td></td><td>".$Credito_float_format_niv4."</td><td></td><td>".$Salmes_float_format_niv4."</td><td></td><td>".$Salactu_float_format_niv4."</td></tr> \n"; 
           } 

           $result_niv5 = mysql_query("SELECT * FROM cwconaux WHERE Nivel='5' AND Cuenta LIKE '$Cuenta_niv4%' ORDER BY Cuenta ASC", $conectar); 
		   $niv5=mysql_num_rows($result_niv5);
           while ($row_niv5 = @mysql_fetch_array($result_niv5)) //NIVEL 5
           {  	
             $Debito_niv5  = $row_niv5["Debito"];
             $Credito_niv5 = $row_niv5["Credito"];
             $Descrip_niv5 = $row_niv5["Descrip"];
             $Cuenta_niv5  = $row_niv5["Cuenta"];    	
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
   
             if ($Tipo_niv5 == 'T')
	         {
               echo "<tr class=ewTableAltRow ><td>".$Cuenta_niv5."</td><td></td><td>".$Descrip_niv5."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td></tr> \n"; 
             } else if ($Tipo_niv5 == 'P')
             {
               echo "<tr class=ewTableAltRow ><td>".$Cuenta_niv5."</td><td></td><td>".$Descrip_niv5."</td><td></td><td>".$Salantu_float_format_niv5."</td><td></td><td>".$Debito_float_format_niv5."</td><td></td><td>".$Credito_float_format_niv5."</td><td></td><td>".$Salmes_float_format_niv5."</td><td></td><td>".$Salactu_float_format_niv5."</td></tr> \n"; 
             } 
		   
             $result_niv6 = mysql_query("SELECT * FROM cwconaux WHERE Nivel='6' AND Cuenta LIKE '$Cuenta_niv5%' ORDER BY Cuenta ASC", $conectar); 
             $niv6=mysql_num_rows($result_niv6);
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
   
        	   if ($Tipo_niv6 == 'T')
       	       {
                 echo "<tr class=ewTableAltRow ><td>".$Cuenta_niv6."</td><td></td><td>".$Descrip_niv6."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td></tr> \n"; 
               } else if ($Tipo_niv6 == 'P') 
        	   {
                 echo "<tr class=ewTableAltRow ><td>".$Cuenta_niv6."</td><td></td><td>".$Descrip_niv6."</td><td></td><td>".$Salantu_float_format_niv6."</td><td></td><td>".$Debito_float_format_niv6."</td><td></td><td>".$Credito_float_format_niv6."</td><td></td><td>".$Salmes_float_format_niv6."</td><td></td><td>".$Salactu_float_format_niv6."</td></tr> \n"; 
               } 
			  
               $result_niv7 = mysql_query("SELECT * FROM cwconaux WHERE Nivel='7' AND Cuenta LIKE '$Cuenta_niv6%' ORDER BY Cuenta ASC", $conectar); 
               $niv7=mysql_num_rows($result_niv7);
			   while ($row_niv7 = @mysql_fetch_array($result_niv7)) //NIVEL 7
               {    	
                 $Debito_niv7  = $row_niv7["Debito"];
                 $Credito_niv7 = $row_niv7["Credito"];
                 $Descrip_niv7 = $row_niv7["Descrip"];
                 $Cuenta_niv7  = $row_niv7["Cuenta"];    	
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
   
                 if ($Tipo_niv7 == 'T')
	             {
                   echo "<tr class=ewTableAltRow ><td>".$Cuenta_niv7."</td><td></td><td>".$Descrip_niv7."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td></tr> \n"; 
                 } else if ($Tipo_niv7 == 'P')
	             {
                   echo "<tr class=ewTableAltRow ><td>".$Cuenta_niv7."</td><td></td><td>".$Descrip_niv7."</td><td></td><td>".$Salantu_float_format_niv7."</td><td></td><td>".$Debito_float_format_niv7."</td><td></td><td>".$Credito_float_format_niv7."</td><td></td><td>".$Salmes_float_format_niv7."</td><td></td><td>".$Salactu_float_format_niv7."</td></tr> \n"; 
                 }     
          
		         $result_niv8 = mysql_query("SELECT * FROM cwconaux WHERE Nivel='8' AND Cuenta LIKE '$Cuenta_niv7%' ORDER BY Cuenta ASC", $conectar);
				 $niv8=mysql_num_rows($result_niv8); 
                 while ($row_niv8 = @mysql_fetch_array($result_niv8)) //NIVEL 8
                 {    	
                   $Debito_niv8  = $row_niv8["Debito"];
                   $Credito_niv8 = $row_niv8["Credito"];
                   $Descrip_niv8 = $row_niv8["Descrip"];
                   $Cuenta_niv8  = $row_niv8["Cuenta"];    	
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
   
            	   if ($Tipo_niv8 == 'T')
	               {
                     echo "<tr class=ewTableAltRow ><td>".$Cuenta_niv8."</td><td></td><td>".$Descrip_niv8."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td></tr> \n"; 
                   } else if ($Tipo_niv8 == 'P')
	               {
                     echo "<tr class=ewTableAltRow ><td>".$Cuenta_niv8."</td><td></td><td>".$Descrip_niv8."</td><td></td><td>".$Salantu_float_format_niv8."</td><td></td><td>".$Debito_float_format_niv8."</td><td></td><td>".$Credito_float_format_niv8."</td><td></td><td>".$Salmes_float_format_niv8."</td><td></td><td>".$Salactu_float_format_niv8."</td></tr> \n"; 
                   } 

                   $result_niv9 = mysql_query("SELECT * FROM cwconaux WHERE Nivel='9' AND Cuenta LIKE '$Cuenta_niv8%' ORDER BY Cuenta ASC", $conectar); 
				   $niv9=mysql_num_rows($result_niv9);
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
   
                     if ($Tipo_niv9 == 'T')
	                 {
                       echo "<tr class=ewTableAltRow ><td>".$Cuenta_niv9."</td><td></td><td>".$Descrip_niv9."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td><td></td><td>".' '."</td></tr> \n"; 
                     } else if ($Tipo_niv9 == 'P')
	                 {
                       echo "<tr class=ewTableAltRow ><td>".$Cuenta_niv9."</td><td></td><td>".$Descrip_niv9."</td><td></td><td>".$Salantu_float_format_niv9."</td><td></td><td>".$Debito_float_format_niv9."</td><td></td><td>".$Credito_float_format_niv9."</td><td></td><td>".$Salmes_float_format_niv9."</td><td></td><td>".$Salactu_float_format_niv9."</td></tr> \n"; 
                     } 

                     $res_posteo_niv9 = mysql_query("SELECT * FROM cwconcue WHERE Cuenta='$Cuenta_niv9'", $conectar); 
                     $row_posteo_niv9 = @mysql_fetch_array($res_posteo_niv9);
                     $Tipo_niv9       = $row_posteo_niv9["Tipo"];
					 echo "<strong>";
                     if ($Tipo_niv9=='T') echo "<tr class=ewTableAltRow ><td>".' '."</td><td></td><td>".'TOTAL '.$Descrip_niv9."</td><td></td><td>".$Salantu_float_format_niv9."</td><td></td><td>".$Debito_float_format_niv9."</td><td></td><td>".$Credito_float_format_niv9."</td><td></td><td>".$Salmes_float_format_niv9."</td><td></td><td>".$Salactu_float_format_niv9."</td></tr> \n"; 
                     echo "</strong>";    
// echo "<br>Total lineas".$niv9;
                   } //FINAL NIVEL 9 
					 
                   $res_posteo_niv8 = mysql_query("SELECT * FROM cwconcue WHERE Cuenta='$Cuenta_niv8'", $conectar); 
                   $row_posteo_niv8 = @mysql_fetch_array($res_posteo_niv8);
                   $Tipo_niv8       = $row_posteo_niv8["Tipo"];
                   echo "<strong>";
				   if ($Tipo_niv8=='T') echo "<tr class=ewTableAltRow ><td>".' '."</td><td></td><td>".'TOTAL '.$Descrip_niv8."</td><td></td><td>".$Salantu_float_format_niv8."</td><td></td><td>".$Debito_float_format_niv8."</td><td></td><td>".$Credito_float_format_niv8."</td><td></td><td>".$Salmes_float_format_niv8."</td><td></td><td>".$Salactu_float_format_niv8."</td></tr> \n"; 
                   echo "</strong>";   
// echo "<br>Total lineas".$niv8;
                 } //FINAL NIVEL 8  
				
                 $res_posteo_niv7 = mysql_query("SELECT * FROM cwconcue WHERE Cuenta='$Cuenta_niv7'", $conectar); 
                 $row_posteo_niv7 = @mysql_fetch_array($res_posteo_niv7);
                 $Tipo_niv7       = $row_posteo_niv7["Tipo"];
                 echo "<strong>";            
			     if ($Tipo_niv7=='T') echo "<tr class=ewTableAltRow ><td>".' '."</td><td></td><td>".'TOTAL '.$Descrip_niv7."</td><td></td><td>".$Salantu_float_format_niv7."</td><td></td><td>".$Debito_float_format_niv7."</td><td></td><td>".$Credito_float_format_niv7."</td><td></td><td>".$Salmes_float_format_niv7."</td><td></td><td>".$Salactu_float_format_niv7."</td></tr> \n"; 
                 echo "</strong>";     
// echo "<br>Total lineas".$niv7;
               } //FINAL NIVEL 7  

               $res_posteo_niv6 = mysql_query("SELECT * FROM cwconcue WHERE Cuenta='$Cuenta_niv6'", $conectar); 
               $row_posteo_niv6 = @mysql_fetch_array($res_posteo_niv6);
               $Tipo_niv6       = $row_posteo_niv6["Tipo"];
               echo "<strong>";  
               if ($Tipo_niv6=='T') echo "<tr class=ewTableAltRow ><td>".' '."</td><td></td><td>".'TOTAL '.$Descrip_niv6."</td><td></td><td>".$Salantu_float_format_niv6."</td><td></td><td>".$Debito_float_format_niv6."</td><td></td><td>".$Credito_float_format_niv6."</td><td></td><td>".$Salmes_float_format_niv6."</td><td></td><td>".$Salactu_float_format_niv6."</td></tr> \n"; 
               echo "</strong>"; 
// echo "<br>Total lineas".$niv6;
             } //FINAL NIVEL 6  
			
           $res_posteo_niv5 = mysql_query("SELECT * FROM cwconcue WHERE Cuenta='$Cuenta_niv5'", $conectar); 
           $row_posteo_niv5 = @mysql_fetch_array($res_posteo_niv5);
           $Tipo_niv5       = $row_posteo_niv5["Tipo"];
           echo "<strong>";     
           if ($Tipo_niv5=='T') echo "<tr class=ewTableAltRow ><td>".' '."</td><td></td><td>".'TOTAL '.$Descrip_niv5."</td><td></td><td>".$Salantu_float_format_niv5."</td><td></td><td>".$Debito_float_format_niv5."</td><td></td><td>".$Credito_float_format_niv5."</td><td></td><td>".$Salmes_float_format_niv5."</td><td></td><td>".$Salactu_float_format_niv5."</td></tr> \n"; 
           echo "</strong>";
// echo "<br>Total lineas".$niv5;
           } //FINAL NIVEL 5 
			
           $res_posteo_niv4 = mysql_query("SELECT * FROM cwconcue WHERE Cuenta='$Cuenta_niv4'", $conectar); 
           $row_posteo_niv4 = @mysql_fetch_array($res_posteo_niv4);
           $Tipo_niv4       = $row_posteo_niv4["Tipo"];
           echo "<strong>";
		   if ($Tipo_niv4=='T') echo "<tr class=ewTableAltRow ><td>".' '."</td><td></td><td>".'TOTAL '.$Descrip_niv4."</td><td></td><td>".$Salantu_float_format_niv4."</td><td></td><td>".$Debito_float_format_niv4."</td><td></td><td>".$Credito_float_format_niv4."</td><td></td><td>".$Salmes_float_format_niv4."</td><td></td><td>".$Salactu_float_format_niv4."</td></tr> \n"; 
           echo "</strong>";   
// echo "<br>Total lineas".$niv4;
         } //FINAL NIVEL 4 
		
         $res_posteo_niv3 = mysql_query("SELECT * FROM cwconcue WHERE Cuenta='$Cuenta_niv3'", $conectar); 
         $row_posteo_niv3 = @mysql_fetch_array($res_posteo_niv3);
         $Tipo_niv3       = $row_posteo_niv3["Tipo"];
         echo "<strong>";
         if ($Tipo_niv3=='T') echo "<tr class=ewTableAltRow ><td>".' '."</td><td></td><td>".'TOTAL '.$Descrip_niv3."</td><td></td><td>".$Salantu_float_format_niv3."</td><td></td><td>".$Debito_float_format_niv3."</td><td></td><td>".$Credito_float_format_niv3."</td><td></td><td>".$Salmes_float_format_niv3."</td><td></td><td>".$Salactu_float_format_niv3."</td></tr> \n"; 
         echo "</strong>";
// echo "<br>Total lineas".$niv3;
       } //FINAL NIVEL 3 
		
       $res_posteo_niv2 = mysql_query("SELECT * FROM cwconcue WHERE Cuenta='$Cuenta_niv2'", $conectar); 
       $row_posteo_niv2 = @mysql_fetch_array($res_posteo_niv2);
       $Tipo_niv2       = $row_posteo_niv2["Tipo"];
       echo "<strong>";  
	   if ($Tipo_niv2=='T') echo "<tr class=ewTableAltRow ><td>".' '."</td><td></td><td>".'TOTAL '.$Descrip_niv2."</td><td></td><td>".$Salantu_float_format_niv2."</td><td></td><td>".$Debito_float_format_niv2."</td><td></td><td>".$Credito_float_format_niv2."</td><td></td><td>".$Salmes_float_format_niv2."</td><td></td><td>".$Salactu_float_format_niv2."</td></tr> \n"; 
       echo "</strong>"; 
// echo "<br>Total lineas".$niv2;
     } //FINAL NIVEL 2 
	
     $res_posteo_niv1 = mysql_query("SELECT * FROM cwconcue WHERE Cuenta='$Cuenta_niv1'", $conectar); 
     $row_posteo_niv1 = @mysql_fetch_array($res_posteo_niv1);
	 $Tipo_niv1       = $row_posteo_niv1["Tipo"];
     echo "<strong>";
	 if ($Tipo_niv1=='T') echo "<tr class=ewTableAltRow ><td>".' '."</td><td></td><td>".'TOTAL '.$Descrip_niv1."</td><td></td><td>".$Salantu_float_format_niv1."</td><td></td><td>".$Debito_float_format_niv1."</td><td></td><td>".$Credito_float_format_niv1."</td><td></td><td>".$Salmes_float_format_niv1."</td><td></td><td>".$Salactu_float_format_niv1."</td></tr> \n"; 
     echo "</strong>";
// echo "<br>Total lineas".$niv1;
   } //FINAL NIVEL 1 
	

   //QUERY PARA EL SALDO ANTERIOR TOTAL
   $result_ant_tot = mysql_query("SELECT SUM(Credito) AS Credsum, SUM(Debito) AS Debsum  FROM cwconaux", $conectar); 
   $row_ant_tot = @mysql_fetch_array($result_ant_tot); 
   $Credito = $row_ant_tot["Credsum"];
   $Debito  = $row_ant_tot["Debsum"];
   $Salantu_tot = $Debito - $Credito; //SALDO ANTERIOR HASTA LA FECHA TOTAL
   $result_sum_tot = mysql_query("SELECT SUM(Credito) AS Credsum, SUM(Debito) AS Debsum  FROM cwconaux", $conectar); 
   $row_sum_tot = @mysql_fetch_array($result_sum_tot);
   $Credito_tot = $row_sum_tot["Credsum"];
   $Debito_tot  = $row_sum_tot["Debsum"];
   $Salmes_tot  =  $Debito_tot - $Credito_tot;
   $Salactu_tot = $Salantu_tot  + $Salmes_tot ;

   $Descrip_tot = 'TOTAL GENERAL';

   $Debito_float  = ((real) $Debito_tot);
   $Credito_float = ((real) $Credito_tot);
   $Debito_float_format  = number_format($Debito_float,2,',','.');
   $Credito_float_format = number_format($Credito_float,2,',','.');
   $Debito_float_format_tot  = ((string)$Debito_float_format);
   $Credito_float_format_tot = ((string)$Credito_float_format);

   $Salactu_float  = ((real) $Salactu_tot);
   $Salantu_float = ((real) $Salantu_tot);
   $Salactu_float_format  = number_format($Salactu_float,2,',','.');
   $Salantu_float_format = number_format($Salantu_float,2,',','.');
   $Salactu_float_format_tot  = ((string)$Salactu_float_format);
   $Salantu_float_format_tot = ((string)$Salantu_float_format);
	  
   $Salmes_float  = ((real) $Salmes_tot);
   $Salmes_float_format  = number_format($Salmes_float,2,',','.');
   $Salmes_float_format_tot  = ((string)$Salmes_float_format);   

   echo "<strong>";
   echo "<tr class=ewTableAltRow ><td>".' '."</td><td></td><td>".$Descrip_tot."</td><td></td><td>".$Salantu_float_format_tot."</td><td></td><td>".$Debito_float_format_tot."</td><td></td><td>".$Credito_float_format_tot."</td><td></td><td>".$Salmes_float_format_tot."</td><td></td><td>".$Salactu_float_format_tot."</td></tr> \n"; 
   echo "</strong>";
   
?></span></pre>
</body> 
</html>
