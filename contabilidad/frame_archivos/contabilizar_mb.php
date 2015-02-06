<?php
session_start();

$_SESSION['variable'] = null;

$variable = "lo que sea da error de PHP porque esta variable tiene el mismo nombre q la de sesión";

include ("header.php");
require_once 'lib/config.php';
require_once 'lib/common.php';
$url="contabilizar_mb";
$conexion=conexion();

if(isset($_POST['enviar']))
{
	$consultamb="select * from unes_selectra.movimientos_bancarios where fecha>='".fecha_sql($_POST['desde'])."' and fecha<='".fecha_sql($_POST['hasta'])."' and codigo='".$_POST['bancos']."'";
	$resultadomb=query($consultamb,$conexion);
	$filamb=fetch_array($resultadomb);
	if ($filamb ==0)
	{
		echo"<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
		alert(\"Movimientos Bancarios no Existen en este Rango Verifique por Favor ....\")
		parent.cont.location.href=\"procesos.php\"
		</SCRIPT>";
		exit(0);
	}
	$conexc=conexion_contab();
	
	
	$consult = "SELECT * FROM cwconemp";
	$result = mysql_query($consult, $conexc);
	$fil = mysql_fetch_array($result);
	
	$mes=explode('/',$_POST['hasta']);
	$i=$mes[1];
	if($i=='01')
	{
		$mesl='Enero';	
		$bd='Comene';
	}	
	elseif($i=='02')
	{
		$mesl='Febrero';
		$bd='Comfeb';
	}	
	elseif($i=='03')
	{
		$mesl='Marzo';
		$bd='Commar';
	}	
	elseif($i=='04')
	{
		$mesl='Abril';
		$bd='Comabr';
	}	
	elseif($i=='05')
	{
		$mesl='Mayo';
		$bd='Commay';
	}	
	elseif($i=='06')
	{
		$mesl='Junio';
		$bd='Comjun';
	}		
	elseif($i=='07')
	{
		$mesl='Julio';
		$bd='Comjul';
	}	
	elseif($i=='08')
	{
		$mesl='Agosto';
		$bd='Comago';
	}	
	elseif($i=='09')
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
	
	$numCom = $fil[$bd] + 1;
	$ultimo_comprobante=$fil['Numcom']+1;	
	
	$resulatdo=mysql_query("update cwconemp set Numcom='".$ultimo_comprobante."',$bd='".$numCom."'",$conexc);
	$Numcom = $fil[$bd];
	
	$conexion=conexion_publica();
	$consulta_banco="select * from unes_selectra.bancos where codigo='".$_POST['bancos']."'";
	$resultado_banco=query($consulta_banco,$conexion);
	$fila_banco=fetch_array($resultado_banco);
	$conexc=conexion_contab();
	$consulta="insert into cwconhco (Numcom,Codtipo,Fecha,Descrip,Estado) values ('".$numCom."','3','".fecha_sql($_POST['hasta'])."','Movimientos Bancarios cuenta ".$fila_banco['cuenta']." ".$fila_banco['descripcion']." Desde: ".$_POST['desde']." Hasta: ".$_POST['hasta']."','1')";
	
	$resultado=query($consulta,$conexc);
	$conexion=conexion();
	$consulta_banco="select * from bancos where codigo='".$_POST['bancos']."'";
	$resultado_banco=query($consulta_banco,$conexion);
	$fila_banco=fetch_array($resultado_banco);
	
	
	$consulta="select * from movimientos_bancarios where fecha>='".fecha_sql($_POST['desde'])."' and fecha<='".fecha_sql($_POST['hasta'])."' and codigo='".$_POST['bancos']."' ";
	$resultado=query($consulta,$conexion);
	$i=1;
	while($fila=fetch_array($resultado))
	{
		$conexc=conexion_contab();
		$cta=explode("-",$fila[cuenta_contf]);
		if($fila['tipo'] == "Deposito")
		{
			$consulta_cwcondco="insert into cwcondco (Numcom,Fecha,Cuenta,Referen,Tiporef,Descrip,Debito,Credito,Numlim,FechaD) values ('".$numCom."','".fecha_sql($_POST['hasta'])."','".$cta[0]."','".$fila['numero']."','DP','".$fila['concepto']."','".$fila['monto']."','0','".$i."','".$fila['fecha']."')";
			$resultado_cwcondco=query($consulta_cwcondco,$conexc);
			
			$consulta_cwcondco="insert into cwcondco (Numcom,Fecha,Cuenta,Referen,Tiporef,Descrip,Debito,Credito,Numlim,FechaD) values ('".$numCom."','".fecha_sql($_POST['hasta'])."','".$cta[1]."','".$fila['numero']."','DP','Ingresos','0','".$fila['monto']."','".$i."','".$fila['fecha']."')";
			$resultado_cwcondco=query($consulta_cwcondco,$conexc);
			$i++;
		}
	
		if($fila['tipo'] == "Debito")
		{
			$consulta_cwcondco="insert into cwcondco (Numcom,Fecha,Cuenta,Referen,Tiporef,Descrip,Debito,Credito,Numlim,FechaD) values ('".$numCom."','".fecha_sql($_POST['hasta'])."','".$cta[0]."','".$fila['numero']."','ND','Egresos','".$fila['monto']."','0','".$i."','".$fila['fecha']."')";
			$resultado_cwcondco=query($consulta_cwcondco,$conexc);
	
			$consulta_cwcondco="insert into cwcondco (Numcom,Fecha,Cuenta,Referen,Tiporef,Descrip,Debito,Credito,Numlim,FechaD) values ('".$numCom."','".fecha_sql($_POST['hasta'])."','".$cta[1]."','".$fila['numero']."','ND','".$fila['concepto']."','0','".$fila['monto']."','".$i."','".$fila['fecha']."')";
			$resultado_cwcondco=query($consulta_cwcondco,$conexc);
			$i++;
		}
	
		if ($fila['tipo'] =="Credito")
		{
			$consulta_cwcondco="insert into cwcondco (Numcom,Fecha,Cuenta,Referen,Tiporef,Descrip,Debito,Credito,Numlim,FechaD) values ('".$numCom."','".fecha_sql($_POST['hasta'])."','".$cta[0]."','".$fila['numero']."','NC','".$fila['concepto']."','".$fila['monto']."','0','".$i."','".$fila['fecha']."')";
			$resultado_cwcondco=query($consulta_cwcondco,$conexc);
			
			$consulta_cwcondco="insert into cwcondco (Numcom,Fecha,Cuenta,Referen,Tiporef,Descrip,Debito,Credito,Numlim,FechaD) values ('".$numCom."','".fecha_sql($_POST['hasta'])."','$cta[1]','".$fila['numero']."','NC','Ingresos','0','".$fila['monto']."','".$i."','".$fila['fecha']."')";
			$resultado_cwcondco=query($consulta_cwcondco,$conexc);
			$i++;
		}
		
	}
		
		cerrar_conexion($conexion);
		cerrar_conexion($conexc);
		echo"<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
		alert(\"Movimientos Bancarios Contabilizados\")
		parent.cont.location.href=\"contabilizar_mb.php\"
		</SCRIPT>";
}

titulo("Contabilización de Movimientos Bancarios","","menu_procesos.php");
?>
<FORM name="<?echo $url;?>" method="POST" target="_self" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table width="100%">
  <tbody>
    <tr>
      <td width="8%" class="tb-head"><strong>Desde:</strong></td>
		<TD> <input name="desde" type="text" id="desde" style="width:100px" value=" <?php echo $_POST['desde']; ?>" maxlength="60">
          <input name="d_fecha" type="image" id="d_fecha" src="../lib/jscalendar/cal.gif" />
  <script type="text/javascript">Calendar.setup({inputField:"desde",ifFormat:"%d/%m/%Y",button:"d_fecha"});</script></td>
		</tr>
		<TR>
      <td class="tb-head"><strong>Hasta:</strong></td>
		<td> <input name="hasta" type="text" id="hasta" style="width:100px" value="<?php echo $_POST['hasta']; ?>" maxlength="60" >
          <input name="h_fecha" type="image" id="h_fecha" src="../lib/jscalendar/cal.gif" />
  <script type="text/javascript">Calendar.setup({inputField:"hasta",ifFormat:"%d/%m/%Y",button:"h_fecha"});</script></td>
    </tr>
    <tr>
      <td class="tb-head"><strong>Banco:</strong></td>
		<TD>
		<SELECT name="bancos">
                             <?
$conexion=conexion_publica();
$consulta="select * from bancos";
$resultado=query($consulta,$conexion);

while($fila=fetch_array($resultado)){
?>
<option value="<?echo $fila['codigo']?>"><?echo $fila['codigo']." ".$fila['descripcion']?></option>
<?}
	?>
                           </SELECT></td>
    </tr>
<tr><TD colspan="2" class="tb-tit" align="right"><INPUT type="submit" name="enviar" value="Enviar"></TD></tr>
  </tbody>
</table>

</FORM>
</body>

</html>
