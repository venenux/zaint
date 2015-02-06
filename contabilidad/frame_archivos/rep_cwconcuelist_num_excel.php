<?php
session_start();
ob_start();

	header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=listado_cuentas.xls");
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
<?php 
  $criterio = $_GET['criterio'];
  $nivel    = $_GET['nivel'];  
  switch($criterio)
  {
    case 0: // POR CUENTAS
      $criterio_str = 'CUENTAS'; 
	break;
    case 1: // POR DESCRIPCION
      $criterio_str = 'POR DESCRIPCION'; 
	break;
    case 2: // POR NIVELES
      $criterio_str = 'NIVEL'; 
	break;
  }	
  $Fecha = date("d/m/Y",time());
  $Hora  = date("h:i");
  include("config_bd.php"); // archivo que llama a la base de datos 
  $res_emp = mysql_query("SELECT * FROM cwconemp", $conectar); 
  $row_emp = mysql_fetch_array($res_emp);  
  echo $Nomemp = $row_emp["Nomemp"];
  
  
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

Sistema de contabilidad.                                   <strong>PLAN DE CUENTAS POR <?php echo $criterio_str?></strong>                                      

______________________________________________________________________________________________</pre>
<pre class="Estilo1">&nbsp;</pre>
<p>  
  <?php 

  $res_info = mysql_query("SELECT Nomniv1, Nomniv2, Nomniv3, Nomniv4, Nomniv5, Nomniv6, Nomniv7, Nomniv8, Nomniv9 FROM cwconfig", $conectar); 
  $row_info = mysql_fetch_array($res_info);  

  switch($criterio)
  {
    case 0: // POR CUENTAS
      $result = mysql_query("SELECT * FROM cwconcue ORDER BY Cuenta ASC", $conectar); 
	break;
    case 1: // POR DESCRIPCION
      $result = mysql_query("SELECT * FROM cwconcue ORDER BY Descrip ASC", $conectar); 
	break;
    case 2: // POR NIVELES
      $result = mysql_query("SELECT * FROM cwconcue WHERE Nivel='$nivel' ORDER BY Cuenta ASC", $conectar); 
	break;
  }	
  
  if (mysql_num_rows($result))
  { 
    echo '<TABLE class=ewTable id=ewlistmain width="100%">'; // tabla externa
      echo "<table border = '0'> \n"; 
      echo "<tr class=ewTableHeader >";  

	      echo '<td vAlign=top><SPAN><b>CUENTA</b>                      </SPAN></td>';
	      echo '<td vAlign=top><SPAN><b>DESCRIPCION DEL NIVEL</b>        </SPAN></td>';
	      echo '<td vAlign=top><SPAN><b>NOMBRE</b>                   </SPAN></td>';
	      echo '<td vAlign=top><SPAN><b>TIPO</b>             </SPAN></td>';
	      echo '<td vAlign=top><SPAN><b>NIVEL</b></SPAN></td>';
	  echo "</tr> \n"; 
	
	  
      while ($row = @mysql_fetch_array($result)) 
      {  	
	    $Nivel = $row["Nivel"];
        $res_nivel = mysql_query("SELECT * FROM cwconfig", $conectar); 
        $row_nivel = mysql_fetch_array($res_nivel);  

        if ($row["Tipo"]=='T')
		{
		  $Destipo = 'Grupo';
		} else if ($row["Tipo"]=='P')
		{
		  $Destipo = 'Mvto';
		}

        switch($Nivel)
        {
          case 1: // NIVEL 1
    	    $Desnivel = $row_nivel["Nomniv1"];
		  break;
          case 2: // NIVEL 2
    	    $Desnivel = $row_nivel["Nomniv2"];
		  break;
          case 3: // NIVEL 3
    	    $Desnivel = $row_nivel["Nomniv3"];
		  break;
          case 4: // NIVEL 4
    	    $Desnivel = $row_nivel["Nomniv4"];
		  break;
          case 5: // NIVEL 5
    	    $Desnivel = $row_nivel["Nomniv5"];
		  break;
          case 6: // NIVEL 6
    	    $Desnivel = $row_nivel["Nomniv6"];
		  break;
          case 7: // NIVEL 7
    	    $Desnivel = $row_nivel["Nomniv7"];
		  break;
          case 8: // NIVEL 8
    	    $Desnivel = $row_nivel["Nomniv8"];
		  break;
          case 9: // NIVEL 9
    	    $Desnivel = $row_nivel["Nomniv9"];
		  break;
	    }
	  
	  
        echo "<tr class=ewTableAltRow ><td>".$row["Cuenta"]."</td><td>".$Desnivel."</td><td>".$row["Descrip"]."</td><td>".$Destipo."</td><td>".$row["Nivel"]."</td>"; 

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