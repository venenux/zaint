<?php
  $Fecha = date("d/m/Y",time());
  $Hora  = date("h:i");



  include("config_bd.php"); // archivo que llama a la base de datos
  $res_emp = mysql_query("SELECT * FROM cwconemp", $conectar);
  $row_emp = mysql_fetch_array($res_emp);
  $Nomemp = $row_emp["Nomemp"];


?>

<HTML><HEAD><TITLE></TITLE>

<style type="text/css">
<!--
.Estilo1 {
	font-size: 14px;
	font-family: Arial, Helvetica, sans-serif;
}
-->
</style>

</HEAD>
<BODY>







<pre class="Estilo1">                                                                                                                                                             Hora: <?php echo $Hora?>
                                                                                                                                                             
                                                                                                                                                             Fecha: <?php echo $Fecha?>  

<?php 
  echo '<b>';
  echo $Nomemp;
  echo '</b>';
?>

Sistema de contabilidad.                                   <strong>GRUPOS DE COMPROBANTES</strong>                                      

______________________________________________________________________________________________</pre>
<pre class="Estilo1">&nbsp;</pre>
<p>  
<?php 

  $result = mysql_query("SELECT * FROM cwcontco ORDER BY Codtipo ASC", $conectar); 
  
  if (mysql_num_rows($result))
  { 
    echo '<TABLE class=ewTable id=ewlistmain width="100%">'; // tabla externa
      echo "<table border = '0'> \n"; 
      echo "<tr class=ewTableHeader >";  

	      echo '<td vAlign=top><SPAN><b>CODIGO</b>                      </SPAN></td>';
	      echo '<td vAlign=top><SPAN><b>NOMBRE</b>        </SPAN></td>';
	  echo "</tr> \n"; 
	
	  
      while ($row = @mysql_fetch_array($result)) 
      {  	
        echo "<tr class=ewTableAltRow ><td>".$row["Codtipo"]."</td><td>".$row["Descrip"]."</td>"; 

        echo "</tr> \n";
      }
      echo "</table> \n";
	echo "</table> \n"; //fin de tabla externa 
  } else
  {
    echo "¡ No se ha encontrado ningún registro !";
  } 

?>
</p>
<pre>&nbsp;</pre>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body> 
</html>
