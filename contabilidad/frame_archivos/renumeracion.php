<?php 
require_once 'lib/config.php';
require_once 'lib/common.php';
include ("header.php");
$conexion=conexion();

$anio=$_POST[anio];
if(isset($_POST[aceptar]))
{
	for($i=1;$i<=12;$i++)
	{
		echo $consulta="select * from cwconhco where year(Fecha)=$anio and month(Fecha)=$i order by Numcom";
		$query=query($consulta,$conexion);
		echo "</br>";
		while($fetch=fetch_array($query))
		{
			$mes=explode('-',$fetch[Fecha]);
			echo "Mes Actual:".$j=$mes[1];
			echo "</br>";
			if($j=='01')
			{
				$mesl='Enero';	
				$bd='Comene';
			}	
			elseif($j=='02')
			{
				$mesl='Febrero';
				$bd='Comfeb';
			}	
			elseif($j=='03')
			{
				$mesl='Marzo';
				$bd='Commar';
			}	
			elseif($j=='04')
			{
				$mesl='Abril';
				$bd='Comabr';
			}	
			elseif($j=='05')
			{
				$mesl='Mayo';
				$bd='Commay';
			}	
			elseif($j=='06')
			{
				$mesl='Junio';
				$bd='Comjun';
			}		
			elseif($j=='07')
			{
				$mesl='Julio';
				$bd='Comjul';
			}	
			elseif($j=='08')
			{
				$mesl='Agosto';
				$bd='Comago';
			}	
			elseif($j=='09')
			{
				$mesl='Septiembre';
				$bd='Comsep';
			}	
			elseif($j==10)
			{
				$mesl='Octubre';
				$bd='Comoct';
			}	
			elseif($j==11)
			{
				$mesl='Noviembre';
				$bd='Comnov';
			}	
			elseif($j==12)
			{
				$mesl='Diciembre';
				$bd='Comdic';
			}
			echo $consult = "SELECT $bd FROM cwconemp";
			echo "</br>";
			$result = query($consult, $conexion);
			$fila = fetch_array($result);
			echo "Consulta de ".$bd." nro: ".$fila[$bd];
			echo "</br>";
			echo $consulta2="update cwcondco set Numcom='".$fila[$bd]."' where Numcom='$fetch[Numcom]' and month(Fecha)=$i";
			$result2=query($consulta2,$conexion);
			echo "</br>";
			echo $consulta3="update cwconhco set Numcom='".$fila[$bd]."' where Numcom='$fetch[Numcom]' and month(Fecha)=$i";
			$result3=query($consulta3,$conexion);
			echo "</br>";
			echo "Consecutivo del Mes: ".$numero=$fila[$bd]+1;
			echo "</br>";
			echo $consult4= "update cwconemp set $bd=$numero";
			echo "</br>";
			$result4= query($consult4,$conexion);
			echo "Renombrado comprobante $fetch[Numcom] a ".$fila[$bd];
			echo "</br>";
		}
	}
}
?>

<FORM name="<?echo $url?>" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" target="_self">
<?
titulo('Renumeracion de codigos',"","menu_int.php","46");
?>
<tr class="" >
<br>
<td>Introduzca A&ntilde;o a Renumerar: </td>
<td><input type="text" name="anio" id="anio" value=""></td>
</tr>
<tr>

<td colspan="2"><br> <input name="aceptar" type="submit" id="aceptar" value='Aceptar'></td></tr>
</table>
</FORM>

