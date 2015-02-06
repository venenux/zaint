
<HTML><HEAD><TITLE></TITLE>
<META http-equiv=Content-Type content="text/html; charset=utf-8"><LINK 
href="usuarioslist_archivos/rep_Asys_Maker.css" type=text/css rel=stylesheet><LINK 
href="usuarioslist_archivos/rep_estilos.css" type=text/css rel=stylesheet>
<style type="text/css">
<!--
.Estilo1 {
	font-size: 14px;
	font-family: Arial, Helvetica, sans-serif;
}
.Estilo2 {font-size: 16px}
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

  $Fecha = date("d/m/Y",time());
  $Hora  = date("h:i");

  include("config_bd.php"); // archivo que llama a la base de datos 
  $res_emp = mysql_query("SELECT * FROM cwconemp", $conectar); 
  $row_emp = mysql_fetch_array($res_emp);  
  $Nomemp = $row_emp["Nomemp"];
  
?>
</HEAD>
<BODY>



<table width="800">
  <tbody>
    <tr>
      <td><?echo $Nomemp?></td>
      <td></td>
      <td>Pagina: </td>
    </tr>
    <tr>
      <td><?echo $Nomemp?></td>
      <td><strong>Analitico</strong></td>
      <td>Fecha: <?echo $Fecha?></td>
    </tr>
    <tr>
      <td><strong>Sistema de Contabilidad</strong></td>
      <td><?echo "Desde: ".$fecha11." Hasta: ".$fecha22;?></td>
      <td><?echo "Hora: ".$Hora;?></td>
    </tr>
    <tr>
      <td>Expresado en: BOLIVARES</td>
      <td></td>
      <td></td>
    </tr>
  </tbody>
</table>

<span class="Estilo2">
<?php 
/*
$cosulta_pag="select cue.Cuenta,cue.Descrip as Descripcion, dco.Numcom,dco.Fecha,dco.Referen,
dco.Tiporef,dco.Descrip,dco.Debito,dco.Credito from cwconcue as cue
left join cwcondco as dco on cue.Cuenta=dco.Cuenta  where cue.Tipo='p' 
and dco.FechaD >=".$fecha11." and dco.FechaD <=".$fecha22." and 
cue.Cuenta between '".$Desde_cod."'and'".$Hasta_cod."'";

$resul_pag=mysql_query($cosulta_pag,$conectar);
echo $cosulta_pag."Resul".$resul_pag."<br>";
$pag=mysql_num_rows($resul_pag);
echo $pag."Cuenta";
*/

  $result_cuenta = mysql_query("SELECT * FROM cwconcue WHERE Tipo='P' AND Cuenta BETWEEN '$Desde_cod' AND '$Hasta_cod' ORDER BY Cuenta", $conectar); 

  $Debito_total  = 0; 
  $Credito_total = 0;
 

   if (mysql_num_rows($result_cuenta))
   { 
     while ($row_cuenta = @mysql_fetch_array($result_cuenta)) 
     {  	
       //$row_cuenta    = @mysql_fetch_array($result_cuenta))
       $Cuenta_bucle  = $row_cuenta["Cuenta"];    
   
       $encabezado_cuenta = 'CUENTA # '.$row_cuenta["Cuenta"].'        '.$row_cuenta["Descrip"] ;
       echo '<BR>';
       echo '<strong>';
       echo $encabezado_cuenta;
       echo '<P>';
       echo '</strong>';
       echo '<BR>';
    
	   //QUERY PARA EL SALDO ANTERIOR
       $result_emp = mysql_query("SELECT * FROM cwconemp ", $conectar); 
       $row_emp    = @mysql_fetch_array($result_emp);
       $Fecini     = $row_emp["Fecini"];

       $result_ant = mysql_query("SELECT SUM(Credito) AS Credsum, SUM(Debito) AS Debsum  FROM cwcondco WHERE Cuenta LIKE '$Cuenta_bucle%' AND FechaD >='$Fecini' AND FechaD <'$fecha11'", $conectar); 
       $row_ant = @mysql_fetch_array($result_ant); 
       $Salantu   = $row_ant["Debsum"] - $row_ant["Credsum"];
        
       //QUERY PARA EL DESPLIEGUE
       $result = mysql_query("SELECT * FROM cwcondco WHERE Cuenta='$Cuenta_bucle' AND FechaD BETWEEN '$fecha11' AND '$fecha22' ORDER BY FechaD", $conectar); 
	  
       if (mysql_num_rows($result))
       { 
         echo '<TABLE class=ewTable id=ewlistmain width="100%">'; // tabla externa
           echo "<table border = '0'> \n"; 
           echo "<tr class=ewTableHeader>";  //<font size=""></font>
 
	       echo '<td vAlign=top><SPAN><b>FECHA</b></SPAN></td>';
           echo "<TD>&nbsp;</TD>";
	       echo '<td vAlign=top><SPAN><b>#COMP</b></SPAN></td>';
           echo "<TD>&nbsp;</TD>";
	       echo '<td vAlign=top><SPAN><b>REF</b></SPAN></td>';
           echo "<TD>&nbsp;</TD>";
   	       echo '<td vAlign=top><SPAN><b>MOVIMIENTO</b></SPAN></td>';
           echo "<TD>&nbsp;</TD>";
	       echo '<td vAlign=top><SPAN><b>S ANT</b></SPAN></td>';
           echo "<TD>&nbsp;</TD>";
	       echo '<td vAlign=top><SPAN><b>DEBITO</b></SPAN></td>';
           echo "<TD>&nbsp;</TD>";
	       echo '<td vAlign=top><SPAN><b>CREDITO</b></SPAN></td>';
           echo "<TD>&nbsp;</TD>";
	       echo '<td vAlign=top><SPAN><b>S ACT</b></SPAN></td>';

	     echo "</tr> \n"; 
	
	  
         while ($row = @mysql_fetch_array($result)) 
         {  	
           $Fecha_query = $row["Fecha"];
           $Fecha_query = $Fecha_query["8"].$Fecha_query["9"].'/'.$Fecha_query["5"].$Fecha_query["6"].'/'.$Fecha_query["0"].$Fecha_query["1"].$Fecha_query["2"].$Fecha_query["3"];

           $Debito  = $row["Debito"];
	       $Credito = $row["Credito"];

	       $Debito_float  = ((real) $Debito);
	       $Credito_float = ((real) $Credito);
		   $Debito_float_format  = number_format($Debito_float,2,',','.');
		   $Credito_float_format = number_format($Credito_float,2,',','.');
		   $Debito_float_format  = ((string)$Debito_float_format);
	       $Credito_float_format = ((string)$Credito_float_format);

           $Salactu = $Salantu + $Debito - $Credito;
		
           $Salactu_float  = ((real) $Salactu);
	       $Salantu_float = ((real) $Salantu);
		   $Salactu_float_format  = number_format($Salactu_float,2,',','.');
		   $Salantu_float_format = number_format($Salantu_float,2,',','.');
		   $Salactu_float_format  = ((string)$Salactu_float_format);
		   $Salantu_float_format = ((string)$Salantu_float_format);
		  
		   $Tiporef= $row["Tiporef"];
		   
           echo "<tr class=ewTableAltRow ><td>".$Fecha_query."</td><td></td><td>".$row["Numcom"]."</td><td></td><td>".$Tiporef.' '.$row["Referen"]."</td><td></td><td>".$row["Descrip"]."</td><td></td><td>".$Salantu_float_format."</td><td></td><td>".$Debito_float_format."</td><td></td><td>".$Credito_float_format."</td><td></td><td>".$Salactu_float_format."</td>"; 
           echo "</tr> \n";
           $Salantu = $Salactu;

         }
         $result_subtotal = mysql_query("SELECT SUM(Credito) AS Credsum, SUM(Debito) AS Debsum  FROM cwcondco WHERE Cuenta LIKE '$Cuenta_bucle%' AND Fecha >='$Fecini' AND Fecha <'$fecha11'", $conectar); 
         $row_subtotal = @mysql_fetch_array($result_subtotal); 
         $Salantu_tot   = $row_subtotal["Debsum"] - $row_subtotal["Credsum"];

         $result_subtotal = mysql_query("SELECT SUM(Credito) AS Credsum, SUM(Debito) AS Debsum  FROM cwcondco WHERE Cuenta LIKE '$Cuenta_bucle%' AND Fecha BETWEEN '$fecha11' AND '$fecha22'", $conectar); 
         $row_subtotal = @mysql_fetch_array($result_subtotal); 

         $Debito  = $row_subtotal["Debsum"];
         $Credito = $row_subtotal["Credsum"];

         $Debito_total  = $Debito_total + $Debito; 
         $Credito_total = $Credito_total + $Credito;

	     $Debito_float  = ((real) $Debito);
	     $Credito_float = ((real) $Credito);
		 $Debito_float_format  = number_format($Debito_float,2,',','.');
         $Credito_float_format = number_format($Credito_float,2,',','.');
		 $Debito_float_format  = ((string)$Debito_float_format);
	     $Credito_float_format = ((string)$Credito_float_format);

         $result_subtotal = mysql_query("SELECT SUM(Credito) AS Credsum, SUM(Debito) AS Debsum  FROM cwcondco WHERE Cuenta LIKE '$Cuenta_bucle%' AND Fecha BETWEEN '$Fecini' AND '$fecha22'", $conectar); 
         $row_subtotal = @mysql_fetch_array($result_subtotal); 
         $Salactu_tot   = $row_subtotal["Debsum"] - $row_subtotal["Credsum"];

         $Salactu_float  = ((real) $Salactu_tot);
         $Salantu_float = ((real) $Salantu_tot);
		 $Salactu_float_format  = number_format($Salactu_float,2,',','.');
		 $Salantu_float_format = number_format($Salantu_float,2,',','.');
		 $Salactu_float_format  = ((string)$Salactu_float_format);
		 $Salantu_float_format = ((string)$Salantu_float_format);
         echo "<tr class=ewTableAltRow><td>".'TOTAL DE CUENTA'."</td><td></td><td>".''."</td><td></td><td>".''."</td><td></td><td>".''."</td><td></td><td>".$Salantu_float_format."</td><td></td><td>".$Debito_float_format."</td><td></td><td>".$Credito_float_format."</td><td></td><td>".$Salactu_float_format."</td>"; 
         echo "</tr> \n";
		 
         echo "</table> \n";
	     echo "</table> \n"; //fin de tabla externa 
         echo '<P>';
         echo '___________________________________________________________________________';
         echo '<P>';
         echo '<P>';

       } else 
	   {  
         echo "</table> \n";
	     echo "</table> \n"; //fin de tabla externa 
		 echo "¡ No se ha encontrado ningún registro para esta cuenta !";
         echo '<P>';
         echo '___________________________________________________________________________';
         echo '<P>';
         echo '<P>';
	   }	 
     }

       $Debito_float  = ((real) $Debito_total);
       $Credito_float = ((real) $Credito_total);
       $Debito_float_format  = number_format($Debito_float,2,',','.');
       $Credito_float_format = number_format($Credito_float,2,',','.');
	   $Debito_float_format  = ((string)$Debito_float_format);
	   $Credito_float_format = ((string)$Credito_float_format);

       echo '<TABLE class=ewTable id=ewlistmain width="100%">'; // tabla externa
       echo "<table border = '0'> \n"; 
	       echo '<td vAlign=top><SPAN><b>     </b></SPAN></td>';
           echo "<TD>&nbsp;</TD>";
	       echo '<td vAlign=top><SPAN><b>     </b></SPAN></td>';
           echo "<TD>&nbsp;</TD>";
	       echo '<td vAlign=top><SPAN><b>     </b></SPAN></td>';
           echo "<TD>&nbsp;</TD>";
   	       echo '<td vAlign=top><SPAN><b>     </b></SPAN></td>';
           echo "<TD>&nbsp;</TD>";
	       echo '<td vAlign=top><SPAN><b>     </b></SPAN></td>';
           echo "<TD>&nbsp;</TD>";
	       echo '<td vAlign=top><SPAN><b>DEBITO</b></SPAN></td>';
           echo "<TD>&nbsp;</TD>";
	       echo '<td vAlign=top><SPAN><b>CREDITO</b></SPAN></td>';
           echo "<TD>&nbsp;</TD>";
	       echo '<td vAlign=top><SPAN><b>     </b></SPAN></td>';

	     echo "</tr> \n"; 
       echo "<tr class=ewTableAltRow ><td>".'TOTAL GENERAL'."</td><td></td><td>".''."</td><td></td><td>".''."</td><td></td><td>".''."</td><td></td><td>".''."</td><td></td><td>".$Debito_float_format."</td><td></td><td>".$Credito_float_format."</td><td></td><td>".''."</td>"; 
       echo "</tr> \n";
       echo "</table> \n";

   } else
   {
     echo "¡ No se han encontrado estas cuentas !";
   } 

  
?>
</p></span>
</pre>
<pre>&nbsp;</pre>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body> 
</html>
