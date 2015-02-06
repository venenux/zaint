
<?php
   $text1 = "epa titin raton";

  include("config_bd.php"); // archivo que llama a la base de datos 

  $consulta = "SELECT Codemp, Nomemp, Nrifemp, Nnitemp, Direcc1, Direcc2, Fecini, Fecfin, Numcom FROM cwconemp";
  $query = mysql_query($consulta, $conectar);
  $reg = mysql_num_rows($query);
  if ($reg > 0)
  {
	while($row = mysql_fetch_array($query)) 
	{
      $cod_emp = $row["Codemp"];
      $nom_emp = $row["Nomemp"]; 
      $rif_emp = $row["Nrifemp"];
      $nit_emp = $row["Nnitemp"]; 
      $dir_emp1 = $row["Direcc1"];
      $dir_emp2 = $row["Direcc2"]; 
      $fecha = $row["Fecini"];
      $fecha_fin = $row["Fecfin"]; 
      $ult_com = $row["Numcom"]; 
 
    }
  }
  
  echo '<form name="form1" method="post" action="parametros_aux_sql.php">';
  echo "<td><input type=text name=fecha maxlength=40 value='$dir_emp1' size=80 ></td></tr>";
  echo '</form>';


 
?>
