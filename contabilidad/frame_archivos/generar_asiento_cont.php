<?
require_once "lib/common.php";
include("header.php");
$url="generar_asiento_cont";
$conexion=conexion();

function ultimodia($anho,$mes){
   if (((fmod($anho,4)==0) and (fmod($anho,100)!=0)) or (fmod($anho,400)==0)) {
       $dias_febrero = 29;
   } else {
       $dias_febrero = 28;
   }
   if ($mes == 09) 
   {
   		return 30; 
		break;
   }
   elseif ($mes == 08)
   {
		return 31; 
		break;   	
   }
   switch($mes) {
       case 01: return 31; break;
       case 02: return $dias_febrero; break;
       case 03: return 31; break;
       case 04: return 30; break;
       case 05: return 31; break;
       case 06: return 30; break;
       case 07: return 31; break;
       case 8: return 31; break;
       case 9: return 30; break;
       case 10: return 31; break;
       case 11: return 30; break;
       case 12: return 31; break;
   }
} 

if(isset($_POST['enviar'])){

	$fd = "01/".$_POST['desde'];
	$fd1 = $_POST['desde'];
	
	$mes = substr($fd1,0,2);
	$anio = substr($fd1,3,4);
	
   	$ultimo = ultimodia($anio,$mes);
	$fh = $anio."-".$mes."-".$ultimo;
	
	
	
	$consulta="select * from cwconemp";
	$resultado1=query($consulta,$conexion);
	$fila=fetch_array($resultado1);
	$ultimo_comprobante=$fila['Numcom']+1;
	$resultado2=query("update cwconemp set Numcom='".$ultimo_comprobante."'",$conexion);
	
	$consulta="insert into cwconhco (Numcom,Codtipo,Fecha,Descrip,Estado) values ('".$ultimo_comprobante."','888','".$fh."','Depreciacion de Activos Fijos, Mes: ".$_POST['desde']."','1')";
	$resultado3=query($consulta,$conexion);
	
	$consulta="select act.CTAGASTOS as ctag, act.CTADPRACUM as ctad, mov.CODACT as cod, act.DECRIPAF as des, mov.MONMOV as mto, mov.FECMOV as fec  FROM activosfijos_movimientos AS mov INNER JOIN activosfijos AS act on act.CODACT = mov.CODACT WHERE FECMOV >= '".fecha_sql($fd)."' and FECMOV<='".$fh."'";
	
	$resultado4=query($consulta,$conexion);
	$i=1;
	
	  
	while($fila=fetch_array($resultado4))
	{	
		$consulta_cwcondco="insert into cwcondco (Numcom,Fecha,Cuenta,Referen,Tiporef,Descrip,Debito,Credito,Numlim,FechaD) values ('".$ultimo_comprobante."','".$fh."','".$fila['ctag']."','".$fila['cod']."','---','".$fila['des']."','".$fila['mto']."','0','".$i."','".$fila['fec']."')";
		$resultado_cwcondco=query($consulta_cwcondco,$conexion);
		$consulta_cwcondco="insert into cwcondco (Numcom,Fecha,Cuenta,Referen,Tiporef,Descrip,Debito,Credito,Numlim,FechaD) values ('".$ultimo_comprobante."','".$fh."','".$fila['ctad']."','".$fila['cod']."','---','".$fila['des']."','0','".$fila['mto']."','".$i."','".$fila['fec']."')";
		$resultado_cwcondco2=query($consulta_cwcondco,$conexion);	
		$i++;
		
	}
	
	cerrar_conexion($conexion);
	
	
	echo"<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
	alert(\"Activos Fijos Depreciados Contabilizados\")
	location.href=\"menu_activos.php\"
	</SCRIPT>";
	
}
titulo("Contabilización de Activos Fijos","","menu_activos.php");
?>
<FORM name="<?echo $url;?>" method="POST" target="_self" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table width="100%">
  <tbody>
    <tr>
      <td width="150" class="tb-head"><strong>Mes a Contabilizar:</strong></td>
		<TD> <input name="desde" type="text" id="desde" style="width:60px" value=" <?php echo $_POST['desde']; ?>" maxlength="60">
          <input name="d_fecha" type="image" id="d_fecha" src="lib/jscalendar/cal.gif" />
  <script type="text/javascript">Calendar.setup({inputField:"desde",ifFormat:"%m/%Y",button:"d_fecha"});</script></td>
		</tr>
		
    
<tr><TD colspan="2" class="tb-tit" align="right"><INPUT type="submit" name="enviar" value="Enviar"></TD></tr>
  </tbody>
</table>

</FORM>
</body>

</html>