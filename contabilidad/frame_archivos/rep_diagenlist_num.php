
<HTML><HEAD><TITLE></TITLE>
<META http-equiv=Content-Type content="text/html; charset=utf-8"><LINK 
href="usuarioslist_archivos/rep_Asys_Maker.css" type=text/css rel=stylesheet><LINK 
href="usuarioslist_archivos/rep_estilos.css" type=text/css rel=stylesheet>
<style type="text/css">
<!--
.Estilo1 {	font-size: 14px;
	font-family: Arial, Helvetica, sans-serif;
}
.Estilo4 {font-size: x-small}
.Estilo6 {font-size: 18px}
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
<pre>
<span class="Estilo1">                                                                                                                                                             Hora: <?php echo $Hora?>
                                                                                                                                                             
                                                                                                                                                             Fecha: <?php echo $Fecha?>  

<?php 
  echo '<b>';
  echo $Nomemp;
  echo '</b>';
?><?php
 include("config_bd.php"); // archivo que llama a la base de datos 

 //$Numcom  = $_GET['Numcom'];
 $result_estado_contabilizado = mysql_query("SELECT * FROM cwconhco WHERE Numcom='$Numcom'", $conectar); //VALIDA SI ESTA CONTABILIZADO
 $Total_estado_contabilizado  = mysql_fetch_array($result_estado_contabilizado);
 $Estado_array_valida         = $Total_estado_contabilizado["Estado"];


?>

Sistema de contabilidad.        <strong>       DIARIO GENERAL DESDE <strong><?php echo $fecha1?></strong> AL <?php echo $fecha2?></strong>                                      
<span class="Estilo4">
___________________________________________________________________________________________________________
</span></span>
<?php 
$result_ext = mysql_query("SELECT * FROM cwconhco WHERE Fecha BETWEEN '$fecha11' AND '$fecha22' ORDER BY Fecha ASC ", $conectar); //LISTA DE COMPROBANTES
while ($row_ext = @mysql_fetch_array($result_ext)) 
{  	
  $Numcom  = $row_ext["Numcom"]; 

  echo '<span class="Estilo1"><strong>NUMERO DE COMPROBANTE:'.$Numcom.'</strong> </span>';  
  
  $result = mysql_query("SELECT RecNo, Cuenta, Referen, Tiporef, Descrip, Debito, Credito, Numlim FROM cwcondco WHERE Numcom='$Numcom' ORDER BY Numlim ASC ", $conectar); //LISTA DE ASIENTOS
  
  if (mysql_num_rows($result))
  { 
    echo '<TABLE class=ewTable id=ewlistmain width="100%">'; // tabla externa
      echo "<table border = '0'> \n"; 
      echo "<tr class=ewTableHeader >";  

        echo '<td vAlign=top><SPAN><b>CUENTA</b></SPAN></td>';
		echo '<td vAlign=top><SPAN><b>DESCRIPCION</b></SPAN></td>';
        echo '<td vAlign=top><SPAN><b>REFERENCIA</b></SPAN></td>';
		echo '<td vAlign=top><SPAN><b>T</b></SPAN></td>';
        echo '<td vAlign=top><SPAN><b>ASIENTO</b></SPAN></td>';
        echo '<td vAlign=top><SPAN><b>DEBITO</b></SPAN></td>';
        echo '<td vAlign=top><SPAN><b>CREDITO</b></SPAN></td>';

		echo "<TD>&nbsp;</TD>";
		echo "<TD>&nbsp;</TD>";
		echo "<TD>&nbsp;</TD>";
	  echo "</tr> \n"; 
	
	  
      while ($row = @mysql_fetch_array($result)) 
      {  	
        $Cuenta_query  = $row["Cuenta"]; 
        $result_cuenta = mysql_query("SELECT * FROM cwconcue WHERE Cuenta='$Cuenta_query'", $conectar);
		$row_cuenta    = mysql_fetch_row($result_cuenta);
		$Cuenta_bucle  = "$row_cuenta[3]"; 

        $Numlim  = $row["Numlim"];
		
	    $Debito  = $row["Debito"];
	    $Credito = $row["Credito"];

	    $Debito_float  = ((real) $Debito);
	    $Credito_float = ((real) $Credito);
		
		$Debito_float_format  = number_format($Debito_float,2,',','.');
		$Credito_float_format = number_format($Credito_float,2,',','.');
		
		$Debito_float_format  = ((string)$Debito_float_format);
		$Credito_float_format = ((string)$Credito_float_format);
  
        echo "<tr class=ewTableAltRow onmouseover=ew_mouseover(this); onclick=ew_click(this); onmouseout=ew_mouseout(this);><td>".$row["Cuenta"]."</td><td>".$Cuenta_bucle."</td><td>".$row["Referen"]."</td><td>".$row["Tiporef"]."</td><td>".$row["Descrip"]."</td><td>".$Debito_float_format."</td><td>".$Credito_float_format."</td>"; 

      }
      echo "</table> \n";
	echo "</table> \n"; //fin de tabla externa 
  } else
  {
    echo "¡ No se ha encontrado ningún asiento para este comprobante !";
  } 

 

 
  $result_sum = mysql_query("SELECT Sum(Debito) as suma_Debito FROM cwcondco WHERE Numcom='$Numcom'", $conectar); //SUMA DE DEBITOS DE LISTA DE ASIENTOS
  $Debito_total_array  = mysql_fetch_array($result_sum);

  $result_sum = mysql_query("SELECT Sum(Credito) as suma_Credito FROM cwcondco WHERE Numcom='$Numcom'", $conectar); //SUMA DE DEBITOS DE LISTA DE ASIENTOS
  $Credito_total_array = mysql_fetch_array($result_sum);

  $Debito_total  = $Debito_total_array["suma_Debito"];
  $Credito_total = $Credito_total_array["suma_Credito"]; 

  $Total = $Debito_total - $Credito_total;
  
  $result_lineas = mysql_query("SELECT COUNT(*) FROM cwcondco WHERE Numcom='$Numcom'", $conectar); //SUMA DE DEBITOS DE LISTA DE ASIENTOS
  $Total_lineas_row = mysql_fetch_row($result_lineas);
    
  $Total_lineas = $Total_lineas_row[0];
  echo '<P>';
  echo '<pre class="Estilo6"><span class="Estilo8">  </span>';
  echo '                           D Total: '."$Debito_total".'   C Total: '."$Credito_total";
  echo '<P>';
  echo '<P>';
  echo '                                  Diferencia: '.$Total;
  echo '<P>';
  echo '<P>';
  echo '                                  Nro. L&iacute;neas: '.$Total_lineas;
  echo '</pre>';
  echo '<P>';
  echo '___________________________________________________________________________________________________________';
  echo '<P>';
  echo '<P>';
}
?>
</pre>

<form name="form1" method="post" action="">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
<p>&nbsp;</p>
</body> 
</html>

<?php  mysql_close($conectar); ?>