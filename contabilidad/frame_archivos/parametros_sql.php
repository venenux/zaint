<?php
 
/******************************************************/
/* Funcion cuadrar_mes
 * $Mes:  aqui se introduce el mes de la fecha de inicio
 * Devuelve mes incrementado
 */
function cuadrar_mes($Mes) {
  switch($Mes)
  {
    case "01":
      $Mes = "02";
    break; 
    case "02":
      $Mes = "03";
    break;
    case "03":
      $Mes = "04";
    break;
    case "04":
      $Mes = "05";
    break;	    
	case "05":
      $Mes = "06";
    break;	
    case "06":
      $Mes = "07";
    break;	
     case "07":
      $Mes = "08";
    break;	
     case "08":
      $Mes = "09";
    break;	
     case "09":
      $Mes = "10";
    break;	
     case "10":
      $Mes = "11";
    break;	
     case "11":
      $Mes = "12";
    break;	
     case "12":
      $Mes = "01";
    break;	
  }
  return $Mes;
}

/******************************************************/
/* Funcion abierto_cerrado
 * $Mes:  aqui se introduce el estado
 * Devuelve estado en letras
 */
function abierto_cerrado($abi_est) 
{
	switch($abi_est)
	{
		case "1":
		$Res_est = "ABIERTO";
			return $Res_est; 
		break; 
		case "0":
		$Res_est = "CERRADO";
			return $Res_est;
		break;
	}	
}

$Periodo = $_GET['Periodo'];
include("config_bd.php"); // archivo que llama a la base de datos 

$str='';
for($i=1;$i<=12;$i++)
{
	if($i==1)
	{
		$mesl='Enero';	
		$bd='Comene';
	}	
	elseif($i==2)
	{
		$mesl='Febrero';
		$bd='Comfeb';
	}	
	elseif($i==3)
	{
		$mesl='Marzo';
		$bd='Commar';
	}	
	elseif($i==4)
	{
		$mesl='Abril';
		$bd='Comabr';
	}	
	elseif($i==5)
	{
		$mesl='Mayo';
		$bd='Commay';
	}	
	elseif($i==6)
	{
		$mesl='Junio';
		$bd='Comjun';
	}		
	elseif($i==7)
	{
		$mesl='Julio';
		$bd='Comjul';
	}	
	elseif($i==8)
	{
		$mesl='Agosto';
		$bd='Comago';
	}	
	elseif($i==9)
	{
		$mesl='Septiembre';
		$bd='Comsep';
	}	
	elseif($i==10)
	{
		$mesl='Octubre';
		$bd='Comoct';
	}	
	elseif($i==11)
	{
		$mesl='Noviembre';
		$bd='Comnov';
	}	
	elseif($i==12)
	{
		$mesl='Diciembre';
		$bd='Comdic';
	}
	$str.=', '.$bd.'='.$_POST[$bd];
}


if ($Periodo=='SI')
{
	$Codemp   = $_POST['Codigo'];
	$Estcie1_pre  = $_POST['estado1'];
	$Estcie2_pre  = $_POST['estado2'];
	$Estcie3_pre  = $_POST['estado3'];
	$Estcie4_pre  = $_POST['estado4'];
	$Estcie5_pre  = $_POST['estado5'];
	$Estcie6_pre  = $_POST['estado6'];
	$Estcie7_pre  = $_POST['estado7'];
	$Estcie8_pre  = $_POST['estado8'];
	$Estcie9_pre  = $_POST['estado9'];
	$Estcie10_pre = $_POST['estado10'];
	$Estcie11_pre = $_POST['estado11'];
	$Estcie12_pre = $_POST['estado12'];
	
	$Estcie1  = abierto_cerrado($Estcie1_pre);
	$Estcie2  = abierto_cerrado($Estcie2_pre);
	$Estcie3  = abierto_cerrado($Estcie3_pre);
	$Estcie4  = abierto_cerrado($Estcie4_pre);
	$Estcie5  = abierto_cerrado($Estcie5_pre);
	$Estcie6  = abierto_cerrado($Estcie6_pre);
	$Estcie7  = abierto_cerrado($Estcie7_pre);
	$Estcie8  = abierto_cerrado($Estcie8_pre);
	$Estcie9  = abierto_cerrado($Estcie9_pre);
	$Estcie10 = abierto_cerrado($Estcie10_pre);
	$Estcie11 = abierto_cerrado($Estcie11_pre);
	$Estcie12 = abierto_cerrado($Estcie12_pre);
	
	$result = mysql_query("UPDATE cwconemp SET Estcie1='$Estcie1', Estcie2='$Estcie2', Estcie3='$Estcie3', Estcie4='$Estcie4', Estcie5='$Estcie5', Estcie6='$Estcie6', Estcie7='$Estcie7', Estcie8='$Estcie8', Estcie9='$Estcie9', Estcie10='$Estcie10', Estcie11='$Estcie11', Estcie12='$Estcie12' $str WHERE Codemp='$Codemp'", $conectar);
	mysql_close($conectar);
	header("Location: menu_int.php");
}
else
{
   $Codemp  = $_POST['Codemp'];
   $Nomemp  = $_POST['Nomemp'];
   $Rifemp  = $_POST['Rifemp'];
   $Nnitemp = $_POST['Nnitemp'];
   $Direcc1 = $_POST['Direcc1']; 
   $Direcc2 = $_POST['Direcc2'];
   $Fecini  = $_POST['fecha'];
   $Fecfin  = $_POST['fecha_fin'];
   $Numcom  = $_POST['Numcom'];
 
   $Mescie1 = $Fecini[6].$Fecini[7].$Fecini[8].$Fecini[9]."/".$Fecini[3].$Fecini[4]."/".$Fecini[0].$Fecini[1];
   $Conmes  = $Fecini[3].$Fecini[4];
   $Conano  = $Fecini[6].$Fecini[7].$Fecini[8].$Fecini[9];
 
 
   $Conmes = cuadrar_mes($Conmes); 
   if ($Conmes == "01")
   {
     settype($Conano,'Integer');
     $Conano  = $Conano + 1;
     settype($Conano,'String');
   }
   $Mescie2 = $Conano[0].$Conano[1].$Conano[2].$Conano[3]."/".$Conmes[0].$Conmes[1]."/".$Fecini[0].$Fecini[1];

   $Conmes = cuadrar_mes($Conmes); 
   if ($Conmes == "01")
   {
     settype($Conano,'Integer');
     $Conano  = $Conano + 1;
     settype($Conano,'String');
   }
   $Mescie3 = $Conano[0].$Conano[1].$Conano[2].$Conano[3]."/".$Conmes[0].$Conmes[1]."/".$Fecini[0].$Fecini[1];
 
   $Conmes = cuadrar_mes($Conmes); 
   if ($Conmes == "01")
   {
     settype($Conano,'Integer');
     $Conano  = $Conano + 1;
     settype($Conano,'String');
   }
   $Mescie4 = $Conano[0].$Conano[1].$Conano[2].$Conano[3]."/".$Conmes[0].$Conmes[1]."/".$Fecini[0].$Fecini[1];

   $Conmes = cuadrar_mes($Conmes); 
   if ($Conmes == "01")
   {
     settype($Conano,'Integer');
     $Conano  = $Conano + 1;
     settype($Conano,'String');
   }
   $Mescie5 = $Conano[0].$Conano[1].$Conano[2].$Conano[3]."/".$Conmes[0].$Conmes[1]."/".$Fecini[0].$Fecini[1];

   $Conmes = cuadrar_mes($Conmes); 
   if ($Conmes == "01")
   {
     settype($Conano,'Integer');
     $Conano  = $Conano + 1;
     settype($Conano,'String');
   }
   $Mescie6 = $Conano[0].$Conano[1].$Conano[2].$Conano[3]."/".$Conmes[0].$Conmes[1]."/".$Fecini[0].$Fecini[1];

   $Conmes = cuadrar_mes($Conmes); 
   if ($Conmes == "01")
   {
     settype($Conano,'Integer');
     $Conano  = $Conano + 1;
     settype($Conano,'String');
   }
   $Mescie7 = $Conano[0].$Conano[1].$Conano[2].$Conano[3]."/".$Conmes[0].$Conmes[1]."/".$Fecini[0].$Fecini[1];
 
   $Conmes = cuadrar_mes($Conmes); 
   if ($Conmes == "01")
   {
     settype($Conano,'Integer');
     $Conano  = $Conano + 1;
     settype($Conano,'String');
   }
   $Mescie8 = $Conano[0].$Conano[1].$Conano[2].$Conano[3]."/".$Conmes[0].$Conmes[1]."/".$Fecini[0].$Fecini[1];

   $Conmes = cuadrar_mes($Conmes); 
   if ($Conmes == "01")
   {
     settype($Conano,'Integer');
     $Conano  = $Conano + 1;
     settype($Conano,'String');
   }
   $Mescie9 = $Conano[0].$Conano[1].$Conano[2].$Conano[3]."/".$Conmes[0].$Conmes[1]."/".$Fecini[0].$Fecini[1];
 
   $Conmes = cuadrar_mes($Conmes); 
   if ($Conmes == "01")
   {
     settype($Conano,'Integer');
     $Conano  = $Conano + 1;
     settype($Conano,'String');
   }
   $Mescie10 = $Conano[0].$Conano[1].$Conano[2].$Conano[3]."/".$Conmes[0].$Conmes[1]."/".$Fecini[0].$Fecini[1];

   $Conmes = cuadrar_mes($Conmes); 
   if ($Conmes == "01")
   {
     settype($Conano,'Integer');
     $Conano  = $Conano + 1;
     settype($Conano,'String');
   }
   $Mescie11 = $Conano[0].$Conano[1].$Conano[2].$Conano[3]."/".$Conmes[0].$Conmes[1]."/".$Fecini[0].$Fecini[1];

   $Conmes = cuadrar_mes($Conmes); 
   if ($Conmes == "01")
   {
     settype($Conano,'Integer');
     $Conano  = $Conano + 1;
     settype($Conano,'String');
   }
   $Mescie12 = $Conano[0].$Conano[1].$Conano[2].$Conano[3]."/".$Conmes[0].$Conmes[1]."/".$Fecini[0].$Fecini[1];

   $Abierto = "ABIERTO"; 

   $Fecini = $Fecini[6].$Fecini[7].$Fecini[8].$Fecini[9]."/".$Fecini[3].$Fecini[4]."/".$Fecini[0].$Fecini[1];
   $Fecfin = $Fecfin[6].$Fecfin[7].$Fecfin[8].$Fecfin[9]."/".$Fecfin[3].$Fecfin[4]."/".$Fecfin[0].$Fecfin[1];

	//echo $str;

	//echo "UPDATE cwconemp SET Nomemp='$Nomemp', Nrifemp='$Rifemp', Nnitemp='$Nnitemp', Direcc1='$Direcc1', Direcc2='$Direcc2', Fecini='$Fecini', Fecfin='$Fecfin', Numcom='$Numcom', Mescie1='$Mescie1', Mescie2='$Mescie2', Mescie3='$Mescie3', Mescie4='$Mescie4', Mescie5='$Mescie5', Mescie6='$Mescie6', Mescie7='$Mescie7', Mescie8='$Mescie8', Mescie9='$Mescie9', Mescie10='$Mescie10', Mescie11='$Mescie11', Mescie12='$Mescie12', Estcie1='$Abierto', Estcie2='$Abierto', Estcie3='$Abierto', Estcie4='$Abierto', Estcie5='$Abierto', Estcie6='$Abierto', Estcie7='$Abierto', Estcie8='$Abierto', Estcie9='$Abierto', Estcie10='$Abierto', Estcie11='$Abierto', Estcie12='$Abierto' $str WHERE Codemp='$Codemp'";

   $result = mysql_query("UPDATE cwconemp SET Nomemp='$Nomemp', Nrifemp='$Rifemp', Nnitemp='$Nnitemp', Direcc1='$Direcc1', Direcc2='$Direcc2', Fecini='$Fecini', Fecfin='$Fecfin', Numcom='$Numcom', Mescie1='$Mescie1', Mescie2='$Mescie2', Mescie3='$Mescie3', Mescie4='$Mescie4', Mescie5='$Mescie5', Mescie6='$Mescie6', Mescie7='$Mescie7', Mescie8='$Mescie8', Mescie9='$Mescie9', Mescie10='$Mescie10', Mescie11='$Mescie11', Mescie12='$Mescie12', Estcie1='$Abierto', Estcie2='$Abierto', Estcie3='$Abierto', Estcie4='$Abierto', Estcie5='$Abierto', Estcie6='$Abierto', Estcie7='$Abierto', Estcie8='$Abierto', Estcie9='$Abierto', Estcie10='$Abierto', Estcie11='$Abierto', Estcie12='$Abierto' $str WHERE Codemp='$Codemp'", $conectar);
   mysql_close($conectar);
   header("Location: parametros.php");
}  

?>