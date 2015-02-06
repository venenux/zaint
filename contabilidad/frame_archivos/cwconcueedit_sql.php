<?php 
session_start();
ob_start();
?>

<?php
$pagina=@$_GET['pagina'];
/******************************************************/
/* Funcion retorna_mes
 * $Mes:  aqui se introduce la fecha de inicio
 * Devuelve mes en letras
 */
function retorna_mes($Mes) 
{
  $Mes = $Mes[5].$Mes[6];
  switch($Mes)
  {
    case "01":
	  $Mes_letra = "ENERO";
	  return $Mes_letra; 
    break; 
    case "02":
      $Mes_letra = "FEBRERO";
	  return $Mes_letra;
    break;
    case "03":
      $Mes_letra = "MARZO";
	  return $Mes_letra;
    break;
    case "04":
      $Mes_letra = "ABRIL";
	  return $Mes_letra;
    break;	    
	case "05":
      $Mes_letra = "MAYO";
	  return $Mes_letra;
    break;	
    case "06":
      $Mes_letra = "JUNIO";
	  return $Mes_letra;
    break;	
     case "07":
      $Mes_letra = "JULIO";
	  return $Mes_letra;
    break;	
     case "08":
      $Mes_letra = "AGOSTO";
	  return $Mes_letra;
    break;	
     case "09":
      $Mes_letra = "SEPTIEMBRE";
	  return $Mes_letra;
    break;	
     case "10":
      $Mes_letra = "OCTUBRE";
	  return $Mes_letra;
    break;	
     case "11":
      $Mes_letra = "NOVIEMBRE";
	  return $Mes_letra;
    break;	
     case "12":
      $Mes_letra = "DICIEMBRE";
	  return $Mes_letra;
    break;	
  }
}

/******************************************************/
/* Funcion retorna_ano
 * $Mes:  aqui se introduce Fecini
 * Devuelve el ano de la fecha en numeros
  */
function retorna_ano($Ano) 
{
  $Ano = $Ano[0].$Ano[1].$Ano[2].$Ano[3];
  return $Ano;
}

/******************************************************/
/* Funcion retorna_mes_num
 * $Mes:  aqui se introduce Fecini
 * Devuelve el mes de la fecha en numero
 */
function retorna_mes_num($Mes) 
{
  $Mes = $Mes[5].$Mes[6];
  return $Mes;
}

 $Accion    = $_GET['Accion'];
 include("config_bd.php"); // archivo que llama a la base de datos 
 if ($Accion == 'Modificar')
 {
     $Cuenta     = $_POST['Cuenta'];
     $Ccostos    = $_POST['Ccostos'];   
     $Terceros   = $_POST['Terceros'];
     $Descrip    = $_POST['Descrip'];	 
     $Nivel      = $_POST['Nivel'];
     $Tipo       = $_POST['Tipo'];   
     $Fiscaltipo = $_POST['Fiscaltipo'];
     $Tipocosto  = $_POST['Tipocosto'];
	 $Cuentalt   = $_POST['Cuentalt'];
	 $Descripalt = $_POST['Descripalt'];
	 
	  	  	
     $result = mysql_query("UPDATE cwconcue SET Ccostos='$Ccostos', Terceros='$Terceros', Descrip='$Descrip', Nivel='$Nivel', Fiscaltipo='$Fiscaltipo', Tipocosto='$Tipocosto', Cuentalt='$Cuentalt', Descripalt='$Descripalt' WHERE Cuenta='$Cuenta'", $conectar);	 

	$consulta=mysql_query("INSERT INTO log_transacciones VALUES ('', 'MODIFICAR CUENTA', '".date("Y-m-d H:i:s")."', 'CUENTAS', 'cwconcueedit_sql.php','CUENTAS', '".$Cuenta."-".$Descrip."', '$_SESSION[nombre]')", $conectar);	 
     mysql_close($conectar);
     header("Location: cwconcuelist.php?pagina=".$pagina);   
 } else if ($Accion == 'Borrar')
 {
    $Codigo       = $_GET['Cuenta'];
    	 	 
    $resul    = mysql_query("select * from cwcondco where Cuenta = '$Codigo'", $conectar);
    $num_r = mysql_num_rows($resul);
    
	 
         if ($num_r > 0)
	 {
	   echo " Esta Cuenta ya tiene Asientos no puede ser Eliminada: ";
	   echo $Codigo;
	   mysql_close($conectar);
	   //header("Location: cwconcuelist.php?pagina=".$pagina);
           

	 } else if ($num_r == 0)
         { 
           $result = mysql_query("DELETE FROM cwconcue WHERE Cuenta = '$Codigo'", $conectar);
           mysql_close($conectar);
		$consulta=mysql_query("INSERT INTO log_transacciones VALUES ('', 'ELIMINAR CUENTA', '".date("Y-m-d H:i:s")."', 'CUENTAS', 'cwconcueedit_sql.php','CUENTAS', '".$Codigo."', '$_SESSION[nombre]')", $conectar);
           header("Location: cwconcuelist.php?pagina=".$pagina);
         }
 
	 
 }	else if ($Accion == 'Agregar')
 {
     $result_cifras = mysql_query("SELECT * FROM cwconfig", $conectar); 
     $row_cifras    = mysql_fetch_row($result_cifras);    
     $Niv1 = ((integer)$row_cifras[10]); 
     $Sepacta = $row_cifras[2];

     $Cuenta     = $_POST['Cuenta'];
	 $Cuenta_completa = $Cuenta.$Sepacta;
	 $Cuenta_sub = substr($Cuenta, 0, $Niv1).$Sepacta;
		 
     $Ccostos    = $_POST['Ccostos'];   
     $Terceros   = $_POST['Terceros'];
     $Descrip    = $_POST['Descrip'];	 
     $Nivel      = $_POST['Nivel'];
     $Tipo       = 'T';   
     $Fiscaltipo = $_POST['Fiscaltipo'];
     $Tipocosto  = $_POST['Tipocosto'];	
	 $Cuentalt   = $_POST['Cuentalt'];
	 $Descripalt = $_POST['Descripalt'];
	 	 
     $result = mysql_query("SELECT * FROM cwconcue WHERE Cuenta ='$Cuenta_sub'", $conectar); 
     
	 $num_rows = mysql_num_rows($result);
	 
	 if ($num_rows > 0)
	 {
	   echo "Regresa, este c�digo no es v�lido, ya existe. Usted intent� el c�digo: ";
	   echo $Cuenta_sub;
	   mysql_close($conectar);
	 } else if ($num_rows == 0)
	 {
	   if ($Cuenta<>'')
	   {
	     $row = mysql_fetch_row($result);
	     $result = mysql_query("INSERT INTO cwconcue (Cuenta, Ccostos, Terceros, Descrip, Nivel, Tipo, Fiscaltipo, Tipocosto, Cuentalt, Descripalt) VALUES ('$Cuenta_sub', '$Ccostos', '$Terceros', '$Descrip', '$Nivel', '$Tipo', '$Fiscaltipo', '$Tipocosto', '$Cuentalt', '$Descripalt')", $conectar);	 	 

	     $result_config   = mysql_query("SELECT Fecini FROM cwconemp", $conectar);	 	 
	     $row_config      = mysql_fetch_row($result_config);
         $Fecini          = "$row_config[0]";
         $Ano_Fecini      = retorna_ano($Fecini); 
		 $Mesletra_Fecini = retorna_mes($Fecini); 
         $MesnumFecini    = retorna_mes_num($Fecini);       

  		 switch($MesnumFecini)
         {
            case '01':
		      $Mesdos_num    = "02";
		      $Mestres_num   = "03";
		      $Mescuatro_num = "04";
		      $Mescinco_num  = "05";
		      $Messeis_num   = "06";
		      $Messiete_num  = "07";
		      $Mesocho_num   = "08";
		      $Mesnueve_num  = "09";
		      $Mesdiez_num   = "10";
		      $Mesonce_num   = "11";
		      $Mesdoce_num   = "12";

		      $Mesdos_letra = "FEBRERO";	  		  
		      $Mestres_letra = "MARZO";	  		  
		      $Mescuatro_letra = "ABRIL";	  		  
		      $Mescinco_letra = "MAYO";	  		  
		      $Messeis_letra = "JUNIO";	  		  
		      $Messiete_letra = "JULIO";	  		  
		      $Mesocho_letra = "AGOSTO";	  		  
		      $Mesnueve_letra = "SEPTIEMBRE";	  		  
		      $Mesdiez_letra = "OCTUBRE";	  		  
		      $Mesonce_letra = "NOVIEMBRE";	  		  
		      $Mesdoce_letra = "DICIEMBRE";	  		  
		    break;	

            case '02':
		      $Mesdos_num    = "03";
		      $Mestres_num   = "04";
		      $Mescuatro_num = "05";
		      $Mescinco_num  = "06";
		      $Messeis_num   = "07";
		      $Messiete_num  = "08";
		      $Mesocho_num   = "09";
		      $Mesnueve_num  = "10";
		      $Mesdiez_num   = "11";
		      $Mesonce_num   = "12";
		      $Mesdoce_num   = "01";

		      $Mesdos_letra    = "MARZO";	  		  
		      $Mestres_letra   = "ABRIL";	  		  
		      $Mescuatro_letra = "MAYO";	  		  
		      $Mescinco_letra  = "JUNIO";	  		  
		      $Messeis_letra   = "JULIO";	  		  
		      $Messiete_letra  = "AGOSTO";	  		  
		      $Mesocho_letra   = "SEPTIEMBRE";	  		  
		      $Mesnueve_letra  = "OCTUBRE";	  		  
		      $Mesdiez_letra   = "NOVIEMBRE";	  		  
		      $Mesonce_letra   = "DICIEMBRE";	  		  
		      $Mesdoce_letra   = "ENERO";	  		  
		    break;	
			
            case '03':
		      $Mesdos_num    = "04";
		      $Mestres_num   = "05";
		      $Mescuatro_num = "06";
		      $Mescinco_num  = "07";
		      $Messeis_num   = "08";
		      $Messiete_num  = "09";
		      $Mesocho_num   = "10";
		      $Mesnueve_num  = "11";
		      $Mesdiez_num   = "12";
		      $Mesonce_num   = "01";
		      $Mesdoce_num   = "02";

		      $Mesdos_letra    = "ABRIL";	  		  
		      $Mestres_letra   = "MAYO";	  		  
		      $Mescuatro_letra = "JUNIO";	  		  
		      $Mescinco_letra  = "JULIO";	  		  
		      $Messeis_letra   = "AGOSTO";	  		  
		      $Messiete_letra  = "SEPTIEMBRE";	  		  
		      $Mesocho_letra   = "OCTUBRE";	  		  
		      $Mesnueve_letra  = "NOVIEMBRE";	  		  
		      $Mesdiez_letra   = "DICIEMBRE";	  		  
		      $Mesonce_letra   = "ENERO";	  		  
		      $Mesdoce_letra   = "FEBRERO";	  		  
		    break;	

            case '04':
		      $Mesdos_num    = "05";
		      $Mestres_num   = "06";
		      $Mescuatro_num = "07";
		      $Mescinco_num  = "08";
		      $Messeis_num   = "09";
		      $Messiete_num  = "10";
		      $Mesocho_num   = "11";
		      $Mesnueve_num  = "12";
		      $Mesdiez_num   = "01";
		      $Mesonce_num   = "02";
		      $Mesdoce_num   = "03";

		      $Mesdos_letra    = "MAYO";	  		  
		      $Mestres_letra   = "JUNIO";	  		  
		      $Mescuatro_letra = "JULIO";	  		  
		      $Mescinco_letra  = "AGOSTO";	  		  
		      $Messeis_letra   = "SEPTIEMBRE";	  		  
		      $Messiete_letra  = "OCTUBRE";	  		  
		      $Mesocho_letra   = "NOVIEMBRE";	  		  
		      $Mesnueve_letra  = "DICIEMBRE";	  		  
		      $Mesdiez_letra   = "ENERO";	  		  
		      $Mesonce_letra   = "FEBRERO";	  		  
		      $Mesdoce_letra   = "MARZO";	  		  
		    break;

            case '05':
		      $Mesdos_num    = "06";
		      $Mestres_num   = "07";
		      $Mescuatro_num = "08";
		      $Mescinco_num  = "09";
		      $Messeis_num   = "10";
		      $Messiete_num  = "11";
		      $Mesocho_num   = "12";
		      $Mesnueve_num  = "01";
		      $Mesdiez_num   = "02";
		      $Mesonce_num   = "03";
		      $Mesdoce_num   = "04";

		      $Mesdos_letra    = "JUNIO";	  		  
		      $Mestres_letra   = "JULIO";	  		  
		      $Mescuatro_letra = "AGOSTO";	  		  
		      $Mescinco_letra  = "SEPTIEMBRE";	  		  
		      $Messeis_letra   = "OCTUBRE";	  		  
		      $Messiete_letra  = "NOVIEMBRE";	  		  
		      $Mesocho_letra   = "DICIEMBRE";	  		  
		      $Mesnueve_letra  = "ENERO";	  		  
		      $Mesdiez_letra   = "FEBRERO";	  		  
		      $Mesonce_letra   = "MARZO";	  		  
		      $Mesdoce_letra   = "ABRIL";	  		  
		    break;

            case '06':
		      $Mesdos_num    = "07";
		      $Mestres_num   = "08";
		      $Mescuatro_num = "09";
		      $Mescinco_num  = "10";
		      $Messeis_num   = "11";
		      $Messiete_num  = "12";
		      $Mesocho_num   = "01";
		      $Mesnueve_num  = "02";
		      $Mesdiez_num   = "03";
		      $Mesonce_num   = "04";
		      $Mesdoce_num   = "05";

		      $Mesdos_letra    = "JULIO";	  		  
		      $Mestres_letra   = "AGOSTO";	  		  
		      $Mescuatro_letra = "SEPTIEMBRE";	  		  
		      $Mescinco_letra  = "OCTUBRE";	  		  
		      $Messeis_letra   = "NOVIEMBRE";	  		  
		      $Messiete_letra  = "DICIEMBRE";	  		  
		      $Mesocho_letra   = "ENERO";	  		  
		      $Mesnueve_letra  = "FEBRERO";	  		  
		      $Mesdiez_letra   = "MARZO";	  		  
		      $Mesonce_letra   = "ABRIL";	  		  
		      $Mesdoce_letra   = "MAYO";	  		  
		    break;

            case '07':
		      $Mesdos_num    = "08";
		      $Mestres_num   = "09";
		      $Mescuatro_num = "10";
		      $Mescinco_num  = "11";
		      $Messeis_num   = "12";
		      $Messiete_num  = "01";
		      $Mesocho_num   = "02";
		      $Mesnueve_num  = "03";
		      $Mesdiez_num   = "04";
		      $Mesonce_num   = "05";
		      $Mesdoce_num   = "06";

		      $Mesdos_letra    = "AGOSTO";	  		  
		      $Mestres_letra   = "SEPTIEMBRE";	  		  
		      $Mescuatro_letra = "OCTUBRE";	  		  
		      $Mescinco_letra  = "NOVIEMBRE";	  		  
		      $Messeis_letra   = "DICIEMBRE";	  		  
		      $Messiete_letra  = "ENERO";	  		  
		      $Mesocho_letra   = "FEBRERO";	  		  
		      $Mesnueve_letra  = "MARZO";	  		  
		      $Mesdiez_letra   = "ABRIL";	  		  
		      $Mesonce_letra   = "MAYO";	  		  
		      $Mesdoce_letra   = "JUNIO";	  		  
		    break;

            case '08':
		      $Mesdos_num    = "09";
		      $Mestres_num   = "10";
		      $Mescuatro_num = "11";
		      $Mescinco_num  = "12";
		      $Messeis_num   = "01";
		      $Messiete_num  = "02";
		      $Mesocho_num   = "03";
		      $Mesnueve_num  = "04";
		      $Mesdiez_num   = "05";
		      $Mesonce_num   = "06";
		      $Mesdoce_num   = "07";

		      $Mesdos_letra    = "SEPTIEMBRE";	  		  
		      $Mestres_letra   = "OCTUBRE";	  		  
		      $Mescuatro_letra = "NOVIEMBRE";	  		  
		      $Mescinco_letra  = "DICIEMBRE";	  		  
		      $Messeis_letra   = "ENERO";	  		  
		      $Messiete_letra  = "FEBRERO";	  		  
		      $Mesocho_letra   = "MARZO";	  		  
		      $Mesnueve_letra  = "ABRIL";	  		  
		      $Mesdiez_letra   = "MAYO";	  		  
		      $Mesonce_letra   = "JUNIO";	  		  
		      $Mesdoce_letra   = "JULIO";	  		  
		    break;

            case '09':
		      $Mesdos_num    = "10";
		      $Mestres_num   = "11";
		      $Mescuatro_num = "12";
		      $Mescinco_num  = "01";
		      $Messeis_num   = "02";
		      $Messiete_num  = "03";
		      $Mesocho_num   = "04";
		      $Mesnueve_num  = "05";
		      $Mesdiez_num   = "06";
		      $Mesonce_num   = "07";
		      $Mesdoce_num   = "08";

		      $Mesdos_letra    = "OCTUBRE";	  		  
		      $Mestres_letra   = "NOVIEMBRE";	  		  
		      $Mescuatro_letra = "DICIEMBRE";	  		  
		      $Mescinco_letra  = "ENERO";	  		  
		      $Messeis_letra   = "FEBRERO";	  		  
		      $Messiete_letra  = "MARZO";	  		  
		      $Mesocho_letra   = "ABRIL";	  		  
		      $Mesnueve_letra  = "MAYO";	  		  
		      $Mesdiez_letra   = "JUNIO";	  		  
		      $Mesonce_letra   = "JULIO";	  		  
		      $Mesdoce_letra   = "AGOSTO";	  		  
		    break;

            case '10':
		      $Mesdos_num    = "11";
		      $Mestres_num   = "12";
		      $Mescuatro_num = "01";
		      $Mescinco_num  = "02";
		      $Messeis_num   = "03";
		      $Messiete_num  = "04";
		      $Mesocho_num   = "05";
		      $Mesnueve_num  = "06";
		      $Mesdiez_num   = "07";
		      $Mesonce_num   = "08";
		      $Mesdoce_num   = "09";

		      $Mesdos_letra    = "NOVIEMBRE";	  		  
		      $Mestres_letra   = "DICIEMBRE";	  		  
		      $Mescuatro_letra = "ENERO";	  		  
		      $Mescinco_letra  = "FEBRERO";	  		  
		      $Messeis_letra   = "MARZO";	  		  
		      $Messiete_letra  = "ABRIL";	  		  
		      $Mesocho_letra   = "MAYO";	  		  
		      $Mesnueve_letra  = "JUNIO";	  		  
		      $Mesdiez_letra   = "JULIO";	  		  
		      $Mesonce_letra   = "AGOSTO";	  		  
		      $Mesdoce_letra   = "SEPTIEMBRE";	  		  
		    break;

            case '11':
		      $Mesdos_num    = "12";
		      $Mestres_num   = "01";
		      $Mescuatro_num = "02";
		      $Mescinco_num  = "03";
		      $Messeis_num   = "04";
		      $Messiete_num  = "05";
		      $Mesocho_num   = "06";
		      $Mesnueve_num  = "07";
		      $Mesdiez_num   = "08";
		      $Mesonce_num   = "09";
		      $Mesdoce_num   = "10";

		      $Mesdos_letra    = "DICIEMBRE";	  		  
		      $Mestres_letra   = "ENERO";	  		  
		      $Mescuatro_letra = "FEBRERO";	  		  
		      $Mescinco_letra  = "MARZO";	  		  
		      $Messeis_letra   = "ABRIL";	  		  
		      $Messiete_letra  = "MAYO";	  		  
		      $Mesocho_letra   = "JUNIO";	  		  
		      $Mesnueve_letra  = "JULIO";	  		  
		      $Mesdiez_letra   = "AGOSTO";	  		  
		      $Mesonce_letra   = "SEPTIEMBRE";	  		  
		      $Mesdoce_letra   = "OCTUBRE";	  		  
		    break;

            case '12':
		      $Mesdos_num    = "01";
		      $Mestres_num   = "02";
		      $Mescuatro_num = "03";
		      $Mescinco_num  = "04";
		      $Messeis_num   = "05";
		      $Messiete_num  = "06";
		      $Mesocho_num   = "07";
		      $Mesnueve_num  = "08";
		      $Mesdiez_num   = "09";
		      $Mesonce_num   = "10";
		      $Mesdoce_num   = "11";

		      $Mesdos_letra    = "ENERO";	  		  
		      $Mestres_letra   = "FEBRERO";	  		  
		      $Mescuatro_letra = "MARZO";	  		  
		      $Mescinco_letra  = "ABRIL";	  		  
		      $Messeis_letra   = "MAYO";	  		  
		      $Messiete_letra  = "JUNIO";	  		  
		      $Mesocho_letra   = "JULIO";	  		  
		      $Mesnueve_letra  = "AGOSTO";	  		  
		      $Mesdiez_letra   = "SEPTIEMBRE";	  		  
		      $Mesonce_letra   = "OCTUBRE";	  		  
		      $Mesdoce_letra   = "NOVIEMBRE";	  		  
		    break;			
		 }	
		 
	     $result_his = mysql_query("INSERT INTO cwconhis (Anio, Mes, Cuenta, Desmes) VALUES ('$Ano_Fecini', '$MesnumFecini', '$Cuenta_sub', '$Mesletra_Fecini')", $conectar);	 	 
		 
         if  ($Mesdos_letra=="ENERO")
		 {
		   $Ano_Fecini = ((string)((integer)$Ano_Fecini) + 1);
		 }
	     $result_his = mysql_query("INSERT INTO cwconhis (Anio, Mes, Cuenta, Desmes) VALUES ('$Ano_Fecini', '$Mesdos_num', '$Cuenta_sub', '$Mesdos_letra')", $conectar);	 	 

         if  ($Mestres_letra=="ENERO")
		 {
		   $Ano_Fecini = ((string)((integer)$Ano_Fecini) + 1);
		 }
	     $result_his = mysql_query("INSERT INTO cwconhis (Anio, Mes, Cuenta, Desmes) VALUES ('$Ano_Fecini', '$Mestres_num', '$Cuenta_sub', '$Mestres_letra')", $conectar);	 	 

         if  ($Mescuatro_letra=="ENERO")
		 {
		   $Ano_Fecini = ((string)((integer)$Ano_Fecini) + 1);
		 }
	     $result_his = mysql_query("INSERT INTO cwconhis (Anio, Mes, Cuenta, Desmes) VALUES ('$Ano_Fecini', '$Mescuatro_num', '$Cuenta_sub', '$Mescuatro_letra')", $conectar);	 	 

         if  ($Mescinco_letra=="ENERO")
		 {
		   $Ano_Fecini = ((string)((integer)$Ano_Fecini) + 1);
		 }
	     $result_his = mysql_query("INSERT INTO cwconhis (Anio, Mes, Cuenta, Desmes) VALUES ('$Ano_Fecini', '$Mescinco_num', '$Cuenta_sub', '$Mescinco_letra')", $conectar);	 	 

         if  ($Messeis_letra=="ENERO")
		 {
		   $Ano_Fecini = ((string)((integer)$Ano_Fecini) + 1);
		 }
	     $result_his = mysql_query("INSERT INTO cwconhis (Anio, Mes, Cuenta, Desmes) VALUES ('$Ano_Fecini', '$Messeis_num', '$Cuenta_sub', '$Messeis_letra')", $conectar);	 	 

         if  ($Messiete_letra=="ENERO")
		 {
		   $Ano_Fecini = ((string)((integer)$Ano_Fecini) + 1);
		 }
	     $result_his = mysql_query("INSERT INTO cwconhis (Anio, Mes, Cuenta, Desmes) VALUES ('$Ano_Fecini', '$Messiete_num', '$Cuenta_sub', '$Messiete_letra')", $conectar);	 	 

         if  ($Mesocho_letra=="ENERO")
		 {
		   $Ano_Fecini = ((string)((integer)$Ano_Fecini) + 1);
		 }
	     $result_his = mysql_query("INSERT INTO cwconhis (Anio, Mes, Cuenta, Desmes) VALUES ('$Ano_Fecini', '$Mesocho_num', '$Cuenta_sub', '$Mesocho_letra')", $conectar);	 	 

         if  ($Mesnueve_letra=="ENERO")
		 {
		   $Ano_Fecini = ((string)((integer)$Ano_Fecini) + 1);
		 }
	     $result_his = mysql_query("INSERT INTO cwconhis (Anio, Mes, Cuenta, Desmes) VALUES ('$Ano_Fecini', '$Mesnueve_num', '$Cuenta_sub', '$Mesnueve_letra')", $conectar);	 	 

         if  ($Mesdiez_letra=="ENERO")
		 {
		   $Ano_Fecini = ((string)((integer)$Ano_Fecini) + 1);
		 }
	     $result_his = mysql_query("INSERT INTO cwconhis (Anio, Mes, Cuenta, Desmes) VALUES ('$Ano_Fecini', '$Mesdiez_num', '$Cuenta_sub', '$Mesdiez_letra')", $conectar);	 	 

         if  ($Mesonce_letra=="ENERO")
		 {
		   $Ano_Fecini = ((string)((integer)$Ano_Fecini) + 1);
		 }
	     $result_his = mysql_query("INSERT INTO cwconhis (Anio, Mes, Cuenta, Desmes) VALUES ('$Ano_Fecini', '$Mesonce_num', '$Cuenta_sub', '$Mesonce_letra')", $conectar);	 	 

         if  ($Mesdoce_letra=="ENERO")
		 {
		   $Ano_Fecini = ((string)((integer)$Ano_Fecini) + 1);
		 }
	     $result_his = mysql_query("INSERT INTO cwconhis (Anio, Mes, Cuenta, Desmes) VALUES ('$Ano_Fecini', '$Mesdoce_num', '$Cuenta_sub', '$Mesdoce_letra')", $conectar);	 	 
	
	$consulta=mysql_query("INSERT INTO log_transacciones VALUES ('', 'AGREGAR CUENTA', '".date("Y-m-d H:i:s")."', 'CUENTAS', 'cwconcueedit_sql.php','CUENTAS', '".$Cuenta_sub."', '$_SESSION[nombre]')", $conectar);
         mysql_close($conectar);
		 header("Location: cwconcuelist.php?pagina=".$pagina);  
	   } else
	   {
		 echo "Regresa, c�digo propuesto en blanco, debe introducir uno. ";
	     mysql_close($conectar);   
	   }  
     }
 }  else if ($Accion == 'Agregar_sec')
 {
     $result_cifras = mysql_query("SELECT * FROM cwconfig", $conectar); 
     $row_cifras    = mysql_fetch_row($result_cifras);    
     $Niv1 = ((integer)$row_cifras[10]); 
     $Sepacta = $row_cifras[2];


     $Cuentaprefijo   = $_POST['Cuentaprefijo'];
	 $result_update = mysql_query("UPDATE cwconcue SET Tipo='T' WHERE Cuenta='$Cuentaprefijo'", $conectar);	 	 

	 
	 
     $Cuenta          = $_POST['Cuenta'];
	 $Cuenta_completa = $Cuentaprefijo.$Cuenta.$Sepacta;
	 $Cuenta_sub      = substr($Cuenta, 0, $Niv1).$Sepacta;
	 
		 
     $Ccostos    = $_POST['Ccostos'];   
     $Terceros   = $_POST['Terceros'];
     $Descrip    = $_POST['Descrip'];	 
     $Nivel      = $_POST['Nivel_cuenta'];
     $Tipo       = 'P';   
     $Fiscaltipo = $_POST['Fiscaltipo'];
     $Tipocosto  = $_POST['Tipocosto'];	
	 $Cuentalt   = $_POST['Cuentalt'];
	 $Descripalt = $_POST['Descripalt'];
	 	 
     $result = mysql_query("SELECT * FROM cwconcue WHERE Cuenta ='$Cuenta_completa'", $conectar); 
     
	 $num_rows = mysql_num_rows($result);
	 
	 if ($num_rows > 0)
	 {
	   echo "Regresa, este c�digo no es v�lido, ya existe. Usted intent� el c�digo: ";
	   echo $Cuenta_completa;
	   mysql_close($conectar);
	 } else if ($num_rows == 0)
	 {
       if ($Cuenta<>'')
	   {
         $row = mysql_fetch_row($result);
	
         $result = mysql_query("INSERT INTO cwconcue (Cuenta, Ccostos, Terceros, Descrip, Nivel, Tipo, Fiscaltipo, Tipocosto, Cuentalt, Descripalt) VALUES ('$Cuenta_completa', '$Ccostos', '$Terceros', '$Descrip', '$Nivel', '$Tipo', '$Fiscaltipo', '$Tipocosto', '$Cuentalt', '$Descripalt')", $conectar);	 	 $consulta=mysql_query("INSERT INTO log_transacciones VALUES ('', 'AGREGAR CUENTA', '".date("Y-m-d H:i:s")."', 'CUENTAS', 'cwconcueedit_sql.php','CUENTAS', '".$Cuenta_completa."', '$_SESSION[nombre]')", $conectar);

	     $result_config   = mysql_query("SELECT Fecini FROM cwconemp", $conectar);	 	 
	     $row_config      = mysql_fetch_row($result_config);
         $Fecini          = "$row_config[0]";
         $Ano_Fecini      = retorna_ano($Fecini); 
		 $Mesletra_Fecini = retorna_mes($Fecini); 
         $MesnumFecini    = retorna_mes_num($Fecini);       

  		 switch($MesnumFecini)
         {
            case '01':
		      $Mesdos_num    = "02";
		      $Mestres_num   = "03";
		      $Mescuatro_num = "04";
		      $Mescinco_num  = "05";
		      $Messeis_num   = "06";
		      $Messiete_num  = "07";
		      $Mesocho_num   = "08";
		      $Mesnueve_num  = "09";
		      $Mesdiez_num   = "10";
		      $Mesonce_num   = "11";
		      $Mesdoce_num   = "12";

		      $Mesdos_letra = "FEBRERO";	  		  
		      $Mestres_letra = "MARZO";	  		  
		      $Mescuatro_letra = "ABRIL";	  		  
		      $Mescinco_letra = "MAYO";	  		  
		      $Messeis_letra = "JUNIO";	  		  
		      $Messiete_letra = "JULIO";	  		  
		      $Mesocho_letra = "AGOSTO";	  		  
		      $Mesnueve_letra = "SEPTIEMBRE";	  		  
		      $Mesdiez_letra = "OCTUBRE";	  		  
		      $Mesonce_letra = "NOVIEMBRE";	  		  
		      $Mesdoce_letra = "DICIEMBRE";	  		  
		    break;	

            case '02':
		      $Mesdos_num    = "03";
		      $Mestres_num   = "04";
		      $Mescuatro_num = "05";
		      $Mescinco_num  = "06";
		      $Messeis_num   = "07";
		      $Messiete_num  = "08";
		      $Mesocho_num   = "09";
		      $Mesnueve_num  = "10";
		      $Mesdiez_num   = "11";
		      $Mesonce_num   = "12";
		      $Mesdoce_num   = "01";

		      $Mesdos_letra    = "MARZO";	  		  
		      $Mestres_letra   = "ABRIL";	  		  
		      $Mescuatro_letra = "MAYO";	  		  
		      $Mescinco_letra  = "JUNIO";	  		  
		      $Messeis_letra   = "JULIO";	  		  
		      $Messiete_letra  = "AGOSTO";	  		  
		      $Mesocho_letra   = "SEPTIEMBRE";	  		  
		      $Mesnueve_letra  = "OCTUBRE";	  		  
		      $Mesdiez_letra   = "NOVIEMBRE";	  		  
		      $Mesonce_letra   = "DICIEMBRE";	  		  
		      $Mesdoce_letra   = "ENERO";	  		  
		    break;	
			
            case '03':
		      $Mesdos_num    = "04";
		      $Mestres_num   = "05";
		      $Mescuatro_num = "06";
		      $Mescinco_num  = "07";
		      $Messeis_num   = "08";
		      $Messiete_num  = "09";
		      $Mesocho_num   = "10";
		      $Mesnueve_num  = "11";
		      $Mesdiez_num   = "12";
		      $Mesonce_num   = "01";
		      $Mesdoce_num   = "02";

		      $Mesdos_letra    = "ABRIL";	  		  
		      $Mestres_letra   = "MAYO";	  		  
		      $Mescuatro_letra = "JUNIO";	  		  
		      $Mescinco_letra  = "JULIO";	  		  
		      $Messeis_letra   = "AGOSTO";	  		  
		      $Messiete_letra  = "SEPTIEMBRE";	  		  
		      $Mesocho_letra   = "OCTUBRE";	  		  
		      $Mesnueve_letra  = "NOVIEMBRE";	  		  
		      $Mesdiez_letra   = "DICIEMBRE";	  		  
		      $Mesonce_letra   = "ENERO";	  		  
		      $Mesdoce_letra   = "FEBRERO";	  		  
		    break;	

            case '04':
		      $Mesdos_num    = "05";
		      $Mestres_num   = "06";
		      $Mescuatro_num = "07";
		      $Mescinco_num  = "08";
		      $Messeis_num   = "09";
		      $Messiete_num  = "10";
		      $Mesocho_num   = "11";
		      $Mesnueve_num  = "12";
		      $Mesdiez_num   = "01";
		      $Mesonce_num   = "02";
		      $Mesdoce_num   = "03";

		      $Mesdos_letra    = "MAYO";	  		  
		      $Mestres_letra   = "JUNIO";	  		  
		      $Mescuatro_letra = "JULIO";	  		  
		      $Mescinco_letra  = "AGOSTO";	  		  
		      $Messeis_letra   = "SEPTIEMBRE";	  		  
		      $Messiete_letra  = "OCTUBRE";	  		  
		      $Mesocho_letra   = "NOVIEMBRE";	  		  
		      $Mesnueve_letra  = "DICIEMBRE";	  		  
		      $Mesdiez_letra   = "ENERO";	  		  
		      $Mesonce_letra   = "FEBRERO";	  		  
		      $Mesdoce_letra   = "MARZO";	  		  
		    break;

            case '05':
		      $Mesdos_num    = "06";
		      $Mestres_num   = "07";
		      $Mescuatro_num = "08";
		      $Mescinco_num  = "09";
		      $Messeis_num   = "10";
		      $Messiete_num  = "11";
		      $Mesocho_num   = "12";
		      $Mesnueve_num  = "01";
		      $Mesdiez_num   = "02";
		      $Mesonce_num   = "03";
		      $Mesdoce_num   = "04";

		      $Mesdos_letra    = "JUNIO";	  		  
		      $Mestres_letra   = "JULIO";	  		  
		      $Mescuatro_letra = "AGOSTO";	  		  
		      $Mescinco_letra  = "SEPTIEMBRE";	  		  
		      $Messeis_letra   = "OCTUBRE";	  		  
		      $Messiete_letra  = "NOVIEMBRE";	  		  
		      $Mesocho_letra   = "DICIEMBRE";	  		  
		      $Mesnueve_letra  = "ENERO";	  		  
		      $Mesdiez_letra   = "FEBRERO";	  		  
		      $Mesonce_letra   = "MARZO";	  		  
		      $Mesdoce_letra   = "ABRIL";	  		  
		    break;

            case '06':
		      $Mesdos_num    = "07";
		      $Mestres_num   = "08";
		      $Mescuatro_num = "09";
		      $Mescinco_num  = "10";
		      $Messeis_num   = "11";
		      $Messiete_num  = "12";
		      $Mesocho_num   = "01";
		      $Mesnueve_num  = "02";
		      $Mesdiez_num   = "03";
		      $Mesonce_num   = "04";
		      $Mesdoce_num   = "05";

		      $Mesdos_letra    = "JULIO";	  		  
		      $Mestres_letra   = "AGOSTO";	  		  
		      $Mescuatro_letra = "SEPTIEMBRE";	  		  
		      $Mescinco_letra  = "OCTUBRE";	  		  
		      $Messeis_letra   = "NOVIEMBRE";	  		  
		      $Messiete_letra  = "DICIEMBRE";	  		  
		      $Mesocho_letra   = "ENERO";	  		  
		      $Mesnueve_letra  = "FEBRERO";	  		  
		      $Mesdiez_letra   = "MARZO";	  		  
		      $Mesonce_letra   = "ABRIL";	  		  
		      $Mesdoce_letra   = "MAYO";	  		  
		    break;

            case '07':
		      $Mesdos_num    = "08";
		      $Mestres_num   = "09";
		      $Mescuatro_num = "10";
		      $Mescinco_num  = "11";
		      $Messeis_num   = "12";
		      $Messiete_num  = "01";
		      $Mesocho_num   = "02";
		      $Mesnueve_num  = "03";
		      $Mesdiez_num   = "04";
		      $Mesonce_num   = "05";
		      $Mesdoce_num   = "06";

		      $Mesdos_letra    = "AGOSTO";	  		  
		      $Mestres_letra   = "SEPTIEMBRE";	  		  
		      $Mescuatro_letra = "OCTUBRE";	  		  
		      $Mescinco_letra  = "NOVIEMBRE";	  		  
		      $Messeis_letra   = "DICIEMBRE";	  		  
		      $Messiete_letra  = "ENERO";	  		  
		      $Mesocho_letra   = "FEBRERO";	  		  
		      $Mesnueve_letra  = "MARZO";	  		  
		      $Mesdiez_letra   = "ABRIL";	  		  
		      $Mesonce_letra   = "MAYO";	  		  
		      $Mesdoce_letra   = "JUNIO";	  		  
		    break;

            case '08':
		      $Mesdos_num    = "09";
		      $Mestres_num   = "10";
		      $Mescuatro_num = "11";
		      $Mescinco_num  = "12";
		      $Messeis_num   = "01";
		      $Messiete_num  = "02";
		      $Mesocho_num   = "03";
		      $Mesnueve_num  = "04";
		      $Mesdiez_num   = "05";
		      $Mesonce_num   = "06";
		      $Mesdoce_num   = "07";

		      $Mesdos_letra    = "SEPTIEMBRE";	  		  
		      $Mestres_letra   = "OCTUBRE";	  		  
		      $Mescuatro_letra = "NOVIEMBRE";	  		  
		      $Mescinco_letra  = "DICIEMBRE";	  		  
		      $Messeis_letra   = "ENERO";	  		  
		      $Messiete_letra  = "FEBRERO";	  		  
		      $Mesocho_letra   = "MARZO";	  		  
		      $Mesnueve_letra  = "ABRIL";	  		  
		      $Mesdiez_letra   = "MAYO";	  		  
		      $Mesonce_letra   = "JUNIO";	  		  
		      $Mesdoce_letra   = "JULIO";	  		  
		    break;

            case '09':
		      $Mesdos_num    = "10";
		      $Mestres_num   = "11";
		      $Mescuatro_num = "12";
		      $Mescinco_num  = "01";
		      $Messeis_num   = "02";
		      $Messiete_num  = "03";
		      $Mesocho_num   = "04";
		      $Mesnueve_num  = "05";
		      $Mesdiez_num   = "06";
		      $Mesonce_num   = "07";
		      $Mesdoce_num   = "08";

		      $Mesdos_letra    = "OCTUBRE";	  		  
		      $Mestres_letra   = "NOVIEMBRE";	  		  
		      $Mescuatro_letra = "DICIEMBRE";	  		  
		      $Mescinco_letra  = "ENERO";	  		  
		      $Messeis_letra   = "FEBRERO";	  		  
		      $Messiete_letra  = "MARZO";	  		  
		      $Mesocho_letra   = "ABRIL";	  		  
		      $Mesnueve_letra  = "MAYO";	  		  
		      $Mesdiez_letra   = "JUNIO";	  		  
		      $Mesonce_letra   = "JULIO";	  		  
		      $Mesdoce_letra   = "AGOSTO";	  		  
		    break;

            case '10':
		      $Mesdos_num    = "11";
		      $Mestres_num   = "12";
		      $Mescuatro_num = "01";
		      $Mescinco_num  = "02";
		      $Messeis_num   = "03";
		      $Messiete_num  = "04";
		      $Mesocho_num   = "05";
		      $Mesnueve_num  = "06";
		      $Mesdiez_num   = "07";
		      $Mesonce_num   = "08";
		      $Mesdoce_num   = "09";

		      $Mesdos_letra    = "NOVIEMBRE";	  		  
		      $Mestres_letra   = "DICIEMBRE";	  		  
		      $Mescuatro_letra = "ENERO";	  		  
		      $Mescinco_letra  = "FEBRERO";	  		  
		      $Messeis_letra   = "MARZO";	  		  
		      $Messiete_letra  = "ABRIL";	  		  
		      $Mesocho_letra   = "MAYO";	  		  
		      $Mesnueve_letra  = "JUNIO";	  		  
		      $Mesdiez_letra   = "JULIO";	  		  
		      $Mesonce_letra   = "AGOSTO";	  		  
		      $Mesdoce_letra   = "SEPTIEMBRE";	  		  
		    break;

            case '11':
		      $Mesdos_num    = "12";
		      $Mestres_num   = "01";
		      $Mescuatro_num = "02";
		      $Mescinco_num  = "03";
		      $Messeis_num   = "04";
		      $Messiete_num  = "05";
		      $Mesocho_num   = "06";
		      $Mesnueve_num  = "07";
		      $Mesdiez_num   = "08";
		      $Mesonce_num   = "09";
		      $Mesdoce_num   = "10";

		      $Mesdos_letra    = "DICIEMBRE";	  		  
		      $Mestres_letra   = "ENERO";	  		  
		      $Mescuatro_letra = "FEBRERO";	  		  
		      $Mescinco_letra  = "MARZO";	  		  
		      $Messeis_letra   = "ABRIL";	  		  
		      $Messiete_letra  = "MAYO";	  		  
		      $Mesocho_letra   = "JUNIO";	  		  
		      $Mesnueve_letra  = "JULIO";	  		  
		      $Mesdiez_letra   = "AGOSTO";	  		  
		      $Mesonce_letra   = "SEPTIEMBRE";	  		  
		      $Mesdoce_letra   = "OCTUBRE";	  		  
		    break;

            case '12':
		      $Mesdos_num    = "01";
		      $Mestres_num   = "02";
		      $Mescuatro_num = "03";
		      $Mescinco_num  = "04";
		      $Messeis_num   = "05";
		      $Messiete_num  = "06";
		      $Mesocho_num   = "07";
		      $Mesnueve_num  = "08";
		      $Mesdiez_num   = "09";
		      $Mesonce_num   = "10";
		      $Mesdoce_num   = "11";

		      $Mesdos_letra    = "ENERO";	  		  
		      $Mestres_letra   = "FEBRERO";	  		  
		      $Mescuatro_letra = "MARZO";	  		  
		      $Mescinco_letra  = "ABRIL";	  		  
		      $Messeis_letra   = "MAYO";	  		  
		      $Messiete_letra  = "JUNIO";	  		  
		      $Mesocho_letra   = "JULIO";	  		  
		      $Mesnueve_letra  = "AGOSTO";	  		  
		      $Mesdiez_letra   = "SEPTIEMBRE";	  		  
		      $Mesonce_letra   = "OCTUBRE";	  		  
		      $Mesdoce_letra   = "NOVIEMBRE";	  		  
		    break;			
		 }	
		 
	     $result_his = mysql_query("INSERT INTO cwconhis (Anio, Mes, Cuenta, Desmes) VALUES ('$Ano_Fecini', '$MesnumFecini', '$Cuenta_completa', '$Mesletra_Fecini')", $conectar);	 	 
		 
         if  ($Mesdos_letra=="ENERO")
		 {
		   $Ano_Fecini = ((string)((integer)$Ano_Fecini) + 1);
		 }
	     $result_his = mysql_query("INSERT INTO cwconhis (Anio, Mes, Cuenta, Desmes) VALUES ('$Ano_Fecini', '$Mesdos_num', '$Cuenta_completa', '$Mesdos_letra')", $conectar);	 	 

         if  ($Mestres_letra=="ENERO")
		 {
		   $Ano_Fecini = ((string)((integer)$Ano_Fecini) + 1);
		 }
	     $result_his = mysql_query("INSERT INTO cwconhis (Anio, Mes, Cuenta, Desmes) VALUES ('$Ano_Fecini', '$Mestres_num', '$Cuenta_completa', '$Mestres_letra')", $conectar);	 	 

         if  ($Mescuatro_letra=="ENERO")
		 {
		   $Ano_Fecini = ((string)((integer)$Ano_Fecini) + 1);
		 }
	     $result_his = mysql_query("INSERT INTO cwconhis (Anio, Mes, Cuenta, Desmes) VALUES ('$Ano_Fecini', '$Mescuatro_num', '$Cuenta_completa', '$Mescuatro_letra')", $conectar);	 	 

         if  ($Mescinco_letra=="ENERO")
		 {
		   $Ano_Fecini = ((string)((integer)$Ano_Fecini) + 1);
		 }
	     $result_his = mysql_query("INSERT INTO cwconhis (Anio, Mes, Cuenta, Desmes) VALUES ('$Ano_Fecini', '$Mescinco_num', '$Cuenta_completa', '$Mescinco_letra')", $conectar);	 	 

         if  ($Messeis_letra=="ENERO")
		 {
		   $Ano_Fecini = ((string)((integer)$Ano_Fecini) + 1);
		 }
	     $result_his = mysql_query("INSERT INTO cwconhis (Anio, Mes, Cuenta, Desmes) VALUES ('$Ano_Fecini', '$Messeis_num', '$Cuenta_completa', '$Messeis_letra')", $conectar);	 	 

         if  ($Messiete_letra=="ENERO")
		 {
		   $Ano_Fecini = ((string)((integer)$Ano_Fecini) + 1);
		 }
	     $result_his = mysql_query("INSERT INTO cwconhis (Anio, Mes, Cuenta, Desmes) VALUES ('$Ano_Fecini', '$Messiete_num', '$Cuenta_completa', '$Messiete_letra')", $conectar);	 	 

         if  ($Mesocho_letra=="ENERO")
		 {
		   $Ano_Fecini = ((string)((integer)$Ano_Fecini) + 1);
		 }
	     $result_his = mysql_query("INSERT INTO cwconhis (Anio, Mes, Cuenta, Desmes) VALUES ('$Ano_Fecini', '$Mesocho_num', '$Cuenta_completa', '$Mesocho_letra')", $conectar);	 	 

         if  ($Mesnueve_letra=="ENERO")
		 {
		   $Ano_Fecini = ((string)((integer)$Ano_Fecini) + 1);
		 }
	     $result_his = mysql_query("INSERT INTO cwconhis (Anio, Mes, Cuenta, Desmes) VALUES ('$Ano_Fecini', '$Mesnueve_num', '$Cuenta_completa', '$Mesnueve_letra')", $conectar);	 	 

         if  ($Mesdiez_letra=="ENERO")
		 {
		   $Ano_Fecini = ((string)((integer)$Ano_Fecini) + 1);
		 }
	     $result_his = mysql_query("INSERT INTO cwconhis (Anio, Mes, Cuenta, Desmes) VALUES ('$Ano_Fecini', '$Mesdiez_num', '$Cuenta_completa', '$Mesdiez_letra')", $conectar);	 	 

         if  ($Mesonce_letra=="ENERO")
		 {
		   $Ano_Fecini = ((string)((integer)$Ano_Fecini) + 1);
		 }
	     $result_his = mysql_query("INSERT INTO cwconhis (Anio, Mes, Cuenta, Desmes) VALUES ('$Ano_Fecini', '$Mesonce_num', '$Cuenta_completa', '$Mesonce_letra')", $conectar);	 	 

         if  ($Mesdoce_letra=="ENERO")
		 {
		   $Ano_Fecini = ((string)((integer)$Ano_Fecini) + 1);
		 }
	     $result_his = mysql_query("INSERT INTO cwconhis (Anio, Mes, Cuenta, Desmes) VALUES ('$Ano_Fecini', '$Mesdoce_num', '$Cuenta_completa', '$Mesdoce_letra')", $conectar);	 	 

         mysql_close($conectar);
         header("Location: cwconcuelist.php?pagina=".$pagina); 
	   } else
	   {
		 echo "Regresa, c�digo propuesto en blanco, debe introducir uno. ";
	     mysql_close($conectar);   
	   } 		 
		   
     }
 }				
?>


