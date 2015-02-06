
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
  $Buscar = $_POST['Buscar'];
  $Filtro_Estado = $_POST['Filtro_Estado'];  
  
  $fecha1 = $_POST['fecha11'];
  $fecha2 = $_POST['fecha22'];
  
  $fecha11 = $fecha1["6"].$fecha1["7"].$fecha1["8"].$fecha1["9"].'/'.$fecha1["3"].$fecha1["4"].'/'.$fecha1["0"].$fecha1["1"];
  $fecha22 = $fecha2["6"].$fecha2["7"].$fecha2["8"].$fecha2["9"].'/'.$fecha2["3"].$fecha2["4"].'/'.$fecha2["0"].$fecha2["1"];

//  $dia = ((integer)$fecha1["8"].$fecha1["9"]);
//  $mes = ((integer)$fecha1["5"].$fecha1["6"]);
//  $ano = ((integer)$fecha1["0"].$fecha1["1"].$fecha1["2"].$fecha1["3"]);
//  $fecha11=mktime(0,0,0,$mes,$dia,$ano);

//  $dia = ((integer)$fecha2["8"].$fecha2["9"]);
//  $mes = ((integer)$fecha2["5"].$fecha2["6"]);
//  $ano = ((integer)$fecha2["0"].$fecha2["1"].$fecha2["2"].$fecha2["3"]);
//  $fecha22=mktime(0,0,0,$mes,$dia,$ano);
  
  
  $Desde_cod = $_POST['Desde_cod'];
  $Hasta_cod = $_POST['Hasta_cod'];
  
  switch($Buscar)
  {
    case 0: 
     switch($Filtro_Estado)
     {
       case 0: // FILTRAR TODOS
         $criterio_str = 'SIN LIMITES / TODOS ESTADOS'; 
       break;
       case 1: // FILTRAR EN TRANSITO
         $criterio_str = 'SIN LIMITES / EN TRANSITO'; 
       break;
       case 2: // FILTRAR CONTABILIZADOS
         $criterio_str = 'SIN LIMITES / CONTABILIZADOS'; 
       break;
       case 3: // FILTRAR DESCUADRADOS
         $criterio_str = 'SIN LIMITES / DESCUADRADOS'; 
       break;
	} 
    break; 
    case 1: // BUSCAR POR FECHAS
    {
	  switch($Filtro_Estado)
      {
        case 0: // FILTRAR TODOS
          $criterio_str = 'POR FECHAS ENTRE '.' '.$fecha1.' Y '.$fecha2; 
        break;
        case 1: // FILTRAR EN TRANSITO
          $criterio_str = 'POR FECHAS ENTRE '.' '.$fecha1.' Y '.$fecha2.' EN TRANSITO'; 
        break;
        case 2: // FILTRAR CONTABILIZADOS
          $criterio_str = 'POR FECHAS ENTRE '.' '.$fecha1.' Y '.$fecha2.' CONTABILIZADOS'; 
        break;
        case 3: // FILTRAR DESCUADRADOS
          $criterio_str = 'POR FECHAS ENTRE '.' '.$fecha1.' Y '.$fecha2.' DESCUADRADOS'; 
        break;
	  }	
    }
	break;
    case 2: // BUSCAR POR CODIGO
    {
	  switch($Filtro_Estado)
      {
        case 0: // FILTRAR TODOS
          $criterio_str = 'POR CODIGO ENTRE '.' '.$Desde_cod.' Y '.$Hasta_cod.' EN TRANSITO'; 
        break;
        case 1: // FILTRAR EN TRANSITO
          $criterio_str = 'POR CODIGO ENTRE '.' '.$Desde_cod.' Y '.$Hasta_cod.' CONTABILIZADOS'; 
        break;
        case 2: // FILTRAR CONTABILIZADOS
          $criterio_str = 'POR CODIGO ENTRE '.' '.$Desde_cod.' Y '.$Hasta_cod.' DESCUADRADOS'; 
        break;
        case 3: // FILTRAR DESCUADRADOS
          $criterio_str = 'POR CODIGO ENTRE '.' '.$Desde_cod.' Y '.$Hasta_cod; 
        break;
	  }
    }
	break;
  }	



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

Sistema de contabilidad.                                   <strong>COMPROBANTES <?php echo $criterio_str?></strong>                                      

______________________________________________________________________________________________

<?php 

  //$res_info = mysql_query("SELECT Nomniv1, Nomniv2, Nomniv3, Nomniv4, Nomniv5, Nomniv6, Nomniv7, Nomniv8, Nomniv9 FROM cwconfig", $conectar); 
  //$row_info = mysql_fetch_array($res_info);  

  switch($Buscar)
  {
    case 0: 
    {
	 switch($Filtro_Estado)
     {
       case 0: // FILTRAR TODOS
         $result = mysql_query("SELECT * FROM cwconhco ORDER BY Fecha ASC", $conectar); 
       break;
       case 1: // FILTRAR EN TRANSITO
         $result = mysql_query("SELECT * FROM cwconhco WHERE Estado=1 ORDER BY Fecha ASC", $conectar); 
       break;
       case 2: // FILTRAR CONTABILIZADOS
         $result = mysql_query("SELECT * FROM cwconhco WHERE Estado=2 ORDER BY Fecha ASC", $conectar); 
       break;
       case 3: // FILTRAR DESCUADRADOS
         $result = mysql_query("SELECT * FROM cwconhco WHERE Estado=3 ORDER BY Fecha ASC", $conectar); 
       break;
	  } 
    }
    break; 
    case 1: // BUSCAR POR FECHAS
    {
     switch($Filtro_Estado)
     {
	   case 0: // FILTRAR TODOS
         $result = mysql_query("SELECT * FROM cwconhco WHERE Fecha BETWEEN '$fecha11' AND '$fecha22' ORDER BY Fecha ASC", $conectar); 
       break;
       case 1: // FILTRAR EN TRANSITO
         $result = mysql_query("SELECT * FROM cwconhco WHERE Estado=1 AND Fecha BETWEEN '$fecha11' AND '$fecha22' ORDER BY Fecha ASC", $conectar); 
       break;
       case 2: // FILTRAR CONTABILIZADOS
         $result = mysql_query("SELECT * FROM cwconhco WHERE Estado=2 AND Fecha BETWEEN '$fecha11' AND '$fecha22' ORDER BY Fecha ASC", $conectar); 
       break;
       case 3: // FILTRAR DESCUADRADOS
         $result = mysql_query("SELECT * FROM cwconhco WHERE Estado=3 AND Fecha BETWEEN '$fecha11' AND '$fecha22' ORDER BY Fecha ASC", $conectar); 
       break;
	 }
    }
	break;
    case 2: // BUSCAR POR CODIGO
    {
     switch($Filtro_Estado)
	 {
       case 0: // FILTRAR TODOS
         $result = mysql_query("SELECT * FROM cwconhco WHERE Numcom BETWEEN '$Desde_cod' AND '$Hasta_cod' ORDER BY Fecha ASC", $conectar); 
       break;
       case 1: // FILTRAR EN TRANSITO
         $result = mysql_query("SELECT * FROM cwconhco WHERE Estado=1 AND Numcom BETWEEN '$Desde_cod' AND '$Hasta_cod' ORDER BY Fecha ASC", $conectar); 
       break;
       case 2: // FILTRAR CONTABILIZADOS
         $result = mysql_query("SELECT * FROM cwconhco WHERE Estado=2 AND Numcom BETWEEN '$Desde_cod' AND '$Hasta_cod' ORDER BY Fecha ASC", $conectar); 
       break;
       case 3: // FILTRAR DESCUADRADOS
         $result = mysql_query("SELECT * FROM cwconhco WHERE Estado=3 AND Numcom BETWEEN '$Desde_cod' AND '$Hasta_cod' ORDER BY Fecha ASC", $conectar); 
       break;
     }
    }
	break;
  }	
  
  if (mysql_num_rows($result))
  { 
    echo '<TABLE class=ewTable id=ewlistmain width="100%">'; // tabla externa
      echo "<table border = '0'> \n"; 
      echo "<tr class=ewTableHeader >";  

	      echo '<td vAlign=top><SPAN><b>NUMERO</b></SPAN></td>';
          echo "<TD>&nbsp;</TD>";
	      echo '<td vAlign=top><SPAN><b>FECHA</b></SPAN></td>';
          echo "<TD>&nbsp;</TD>";
	      echo '<td vAlign=top><SPAN><b>GRUPO</b></SPAN></td>';
          echo "<TD>&nbsp;</TD>";
	      echo '<td vAlign=top><SPAN><b>DESCRIPCION</b></SPAN></td>';
          echo "<TD>&nbsp;</TD>";
	      echo '<td vAlign=top><SPAN><b>ESTADO</b></SPAN></td>';
	  echo "</tr> \n"; 
	
	  
      while ($row = @mysql_fetch_array($result)) 
      {  	
        if ($row["Estado"]==1)
		{
		  $Destipo = 'TRANSITO';
		} else if ($row["Estado"]==2)
		{
		  $Destipo = 'CONTABILIZADO';
		} else if ($row["Estado"]==3)
		{
		  $Destipo = 'DESCUADRADO';
		}

        $Fecha_query = $row["Fecha"];
        $Fecha_query = $Fecha_query["8"].$Fecha_query["9"].'/'.$Fecha_query["5"].$Fecha_query["6"].'/'.$Fecha_query["0"].$Fecha_query["1"].$Fecha_query["2"].$Fecha_query["3"];
		

	    $Codtipo = $row["Codtipo"];
        $res_codtipo = mysql_query("SELECT * FROM cwcontco WHERE Codtipo='$Codtipo'", $conectar); 
        $row_codtipo = mysql_fetch_array($res_codtipo);  
		$Grupo = $row_codtipo["Descrip"];
	  
        echo "<tr class=ewTableAltRow ><td>".$row["Numcom"]."</td><td></td><td>".$Fecha_query."</td><td></td><td>".$Grupo."</td><td></td><td>".$row["Descrip"]."</td><td></td><td>".$Destipo."</td>"; 

        echo "</tr> \n";
      }
      echo "</table> \n";
	echo "</table> \n"; //fin de tabla externa 
  } else
  {
    echo "¡ No se ha encontrado ningún registro !";
  } 

?>
</pre>
<pre>&nbsp;</pre>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body> 
</html>