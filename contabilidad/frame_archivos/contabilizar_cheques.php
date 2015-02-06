<?
 session_start();

$_SESSION['variable'] = null;

$variable = "lo que sea da error de PHP porque esta variable tiene el mismo nombre q la de sesión";

include ("header.php");
require_once 'lib/config.php';
require_once 'lib/common.php';
$url="contabilizar_cheques";
$conexion=conexion();

if(isset($_POST['enviar'])){
	//$lines = file('texto');
	
        $conexc=conexion();
	$consulta="select * from cwconemp";
	$resultado=query($consulta,$conexc);
	$fila=fetch_array($resultado);
	$ultimo_comprobante=$fila['Numcom']+1;
	$resulatdo=query("update cwconemp set Numcom='".$ultimo_comprobante."'",$conexc);
	$conexion=conexion_publica();
	$consulta_banco="select * from bancos where codigo='".$_POST['bancos']."'";
	$resultado_banco=query($consulta_banco,$conexion);
	$fila_banco=fetch_array($resultado_banco);
	$conexc=conexion();
	$consulta="insert into cwconhco (Numcom,Codtipo,Fecha,Descrip,Estado) values ('".$ultimo_comprobante."','7','".fecha_sql($_POST['hasta'])."','Movimientos cuenta bancaria numero ".$fila_banco['cuenta']." ".$fila_banco['descripcion']."','1')";
	$resultado=query($consulta,$conexc);
	$conexion=conexion_publica();
	$resultado_bauche=query($consulta_bauche,$conexion);

	$i=1;
	while($fila_bauche=fetch_array($resultado_bauche)){
	$conexion=conexion_publica();

			$con="select * from cwprepar where Codigo = '".$fila_bauche['cuenta']."'";
			$res=query($con,$conexion);
			$fil=fetch_array($res);
			$cuecon=$fila_bauche['cuenta'];
			if($fil['Cuenta']!=""){
				$cuecon=$fil['Cuenta'];
			}
			
			
			$consulta_cheque="select * from cheques where cuenta ='".trim($fila_bauche['ctaban'])."' and cheque='".$fila_bauche['cheque']."'";
			$resultado_cheque=query($consulta_cheque,$conexion);
			
			$fila_cheque=fetch_array($resultado_cheque);
			if($cuecon{0}==1 || $cuecon{0}==6){
				
				$descripcion=$fila_cheque['beneficiario']." ODP: ".$fila_cheque['orden'];
			}else{
				$descripcion=$fila_bauche['descripcion']." ".$fila_cheque['beneficiario'];
			}
			$descripcion=$descripcion." ".$fila_cheque['concepto'];
			$conexc=conexion();
			$consulta_cwcondco="insert into cwcondco (Numcom,Fecha,Cuenta,Referen,Tiporef,Descrip,Debito,Credito,Numlim,FechaD) values ('".$ultimo_comprobante."','".fecha_sql($_POST['hasta'])."','".$cuecon."','".$fila_bauche['cheque']."','CH','".$descripcion."','".$fila_bauche['debitos']."','".$fila_bauche['creditos']."','".$i."','".$fila_bauche['fecha']."')";
			$resultado_cwcondco=query($consulta_cwcondco,$conexc);
			$i++;
	}
	exit(0);
	cerrar_conexion($conexion);
	echo"<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
	alert(\"Archivo Contabilizado\")
	parent.cont.location.href=\"procesos.php\"
	</SCRIPT>";
}

titulo("Contabilización de Cheques","","menu_procesos.php");
?>
<FORM name="<?echo $url;?>" method="POST" target="_self" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table width="100%" border="0">
  <tbody>
    <tr>
      <td class="tb-head" width="8%"><strong>Desde:</strong></td>
		<TD width="160"> <input name="desde" type="text" id="desde" style="width:100px" value=" <?php echo $_POST['desde']; ?>" maxlength="60">&nbsp; <input name="d_fecha" type="image" id="d_fecha" src="../lib/jscalendar/cal.gif" />
  		<script type="text/javascript">Calendar.setup({inputField:"desde",ifFormat:"%d/%m/%Y",button:"d_fecha"});</script></td>
	</TR>
	<TR>
      <td class="tb-head"><strong>Hasta: </strong></td>
		<TD><input name="hasta" type="text" id="hasta" style="width:100px" value="<?php echo $_POST['hasta']; ?>" maxlength="60" >&nbsp;
          <input name="h_fecha" type="image" id="h_fecha" src="../lib/jscalendar/cal.gif" />
  			<script type="text/javascript">Calendar.setup({inputField:"hasta",ifFormat:"%d/%m/%Y",button:"h_fecha"});</script></td>
    </tr>
    <tr>
      <td class="tb-head"><strong>Banco:</strong> </td>
		<TD><SELECT name="bancos">
                             <?
$conexion=conexion_publica();
$consulta="select * from bancos";
$resultado=query($consulta,$conexion);

while($fila=fetch_array($resultado)){
?>
<option value="<?echo $fila['codigo']?>"><?echo $fila['codigo']." ".$fila['descripcion']?></option>
<?}
	?>
                           </SELECT></TD>
    </tr>
<tr><TD colspan="2" class="tb-tit" align="right"><INPUT type="submit" name="enviar" value="Enviar"></TD></tr>
  </tbody>
</table>

</FORM>
</body>

</html>