<head>
<title>Demo de despliegue de tabla y SQL</title>
</head>
<body bgcolor = "#303030">
<body text = "#E5E5E5">
<body leftmargin = "50">
<body topmargin = "50">
<font face = "tahoma">
<font size = "2">

<?php
/*
 * Created on Apr 10, 2003
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
echo "<p aling=center>";
echo "A continuación se muestra el resultado de la selección de registros.";
$host = "127.0.0.1";
$usuario = "root"; //Aqui se coloca el nombre de usuario
$contrasena = "steve"; //Aqui se coloca el password
$conectar = mysql_connect($host, $usuario, $contrasena);
mysql_select_db("selectra", $conectar);
$consulta = "SELECT * FROM cwconusu";
$query = mysql_query($consulta, $conectar);
echo "<table aling=center border=1 bgcolor=#6B6BFF cellspacing=10>";
while ($reg = mysql_fetch_row($query))
{ 
  echo "<tr>";
  echo "<br>";
  foreach($reg as $cambia)
  {
  	echo "<td>", $cambia, "</td>";
  }	
}
echo "</table>";
?>
