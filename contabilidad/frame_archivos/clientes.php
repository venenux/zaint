<html> 
<body> 
<?php 

  include("config_bd.php"); // archivo que llama a la base de datos 

  $consulta = "SELECT RecNo, Codusu, Nivelusu FROM cwconusu";
  $result   = mysql_query($consulta, $conectar);

  if (mysql_num_rows($result))
  { 
    echo "<table border = '1'> \n"; 
    echo "<tr><td>RecNo</td><td>Codusu</td><td>Nivelusu</td></tr> \n"; 
    while ($row = @mysql_fetch_array($result)) 
    { 
      echo "<tr><td>".$row["RecNo"]."</td><td>".$row["Codusu"]."</td><td>".$row["Nivelusu"]."</td></tr> \n"; 
    }
  echo "</table> \n"; 
}
else
  echo "¡ No se ha encontrado ningún registro !";
?> 
</body> 
</html>