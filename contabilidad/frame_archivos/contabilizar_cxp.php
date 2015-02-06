<?php
 session_start();

$_SESSION['variable'] = null;

$variable = "lo que sea da error de PHP porque esta variable tiene el mismo nombre q la de sesión";

include ("header.php");
require_once 'lib/config.php';
require_once 'lib/common.php';

$conexion=conexion();
$url="contabilizar_cxp";
 

if(isset($_POST['enviar'])){
	//$lines = file('texto');


       $consulta_ordenesx="SELECT *   FROM ordenes_pago WHERE  fecha >='".fecha_sql($_POST['desde'])."' and fecha <='".fecha_sql($_POST['hasta'])."' AND estado <> 'Anulada' AND estado <> 'Emitida'  ";
   
       $resultado_ordenesx=query($consulta_ordenesx,$conexion);
       $filax=fetch_array($resultado_ordenesx);
       if ($filax ==0){
             	echo"<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
	            alert(\"Ordenes de Pago no Existen en este Rango Verifique por Favor ....\")
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
		
     
	
	$consulta="insert into cwconhco (Numcom,Codtipo,Fecha,Descrip,Estado) values 
	
	('".$numCom."','28','".fecha_sql($_POST['hasta'])."','Ordenes de Pago a Proveedores Periodo Desde: ".$_POST['desde']." Hasta: ".$_POST['hasta']."','1')";
	
	$resultado=query($consulta,$conexc);
	$conexion=conexion();
        $consulta_ordenes="SELECT ORD.numero_odp, ORD.fecha, ORD.monto AS monto_orden, ORD.codigo_cliente, 
        ORD.estado,ORD.tipo, PRO.cod_proveedor, PRO.cuenta_contable AS cuenta_contable, PRO.compania AS proveedor
	FROM ordenes_pago AS ORD
	JOIN proveedores AS  PRO 
        ON PRO.cod_proveedor = ORD.codigo_cliente
	WHERE  ORD.fecha >='".fecha_sql($_POST['desde'])."' and ORD.fecha <='".fecha_sql($_POST['hasta'])."' 
               AND ORD.estado <> 'Anulada' AND ORD.estado <> 'Emitida' order by ORD.fecha,ORD.numero_odp ";
 
        
        $resultado_ordenes=query($consulta_ordenes,$conexion);
       
	$i=1;
	while($fila_ordenes=fetch_array($resultado_ordenes)){
		  $odp=$fila_ordenes['numero_odp'];
	 	 $consulta_codificacion="SELECT ORD.numero_odp AS codigo, ORD.fecha AS fecha_orden, EJE.RecNo, EJE.RecPrePar, EJE.Monto AS monto_causado, EJE.RecNoOrders, EJE.Partida, EJE.Sector, EJE.Programa, EJE.Actividad, PAR.Codigo, PAR.RecNo, PAR.Cuenta as Cuenta_Contable, PAR.Sector, PAR.Programa, PAR.Actividad, CUE.Denominacion as Denominacion,CUE.CodCue FROM ordenes_pago AS ORD
		JOIN cwpreeje AS EJE ON ORD.numero_odp = EJE.RecNoOrders
		JOIN cwprepar AS PAR ON EJE.partida = PAR.Codigo AND EJE.Sector = PAR.Sector
		AND EJE.Programa = PAR.Programa AND EJE.Actividad = PAR.Actividad
		JOIN cwprecue as CUE ON PAR.Codigo=CUE.CodCue
		WHERE EJE.RecNoOrders=$odp order by ORD.fecha,ORD.numero_odp ";
		$resultado_codificacion=query($consulta_codificacion,$conexion);
              
	 
		while($fila_codificacion=fetch_array($resultado_codificacion)){
		$descripcion=$fila_codificacion['Denominacion']." Orden Nro: ".$odp;

$conexc=conexion_contab();
		$consulta_cwcondco="insert into cwcondco (Numcom,Fecha,Cuenta,Referen,Tiporef,Descrip,Debito,Credito,Numlim,FechaD) values ('".$numCom."','".fecha_sql($_POST['hasta'])."','".$fila_codificacion['Cuenta_Contable']."','".$odp."','GP','".$descripcion."','".$fila_codificacion['monto_causado']."','','".$i."','".$fila_ordenes['fecha_orden']."')";
		$resultado_cwcondco=query($consulta_cwcondco,$conexc);
		$i++;
		}
$conexion=conexion();
		$descripcion=$fila_ordenes['proveedor']." CXP ODP Nro: ".$odp;
$conexc=conexion_contab();
		$consulta_cwcondco="insert into cwcondco (Numcom,Fecha,Cuenta,Referen,Tiporef,Descrip,Debito,Credito,Numlim,FechaD) values ('".$numCom."','".fecha_sql($_POST['hasta'])."','".$fila_ordenes['cuenta_contable']."','".$odp."','OP','".$descripcion."','','".$fila_ordenes['monto_orden']."','".$i."','".$fila_ordenes['fecha_orden']."')";
		$resultado_cwcondco=query($consulta_cwcondco,$conexc);
		$i++;
	}
	//exit(0);
	cerrar_conexion($conexion);
	echo"<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
	alert(\"Archivo Contabilizado\")
	parent.cont.location.href=\"procesos.php\"
	</SCRIPT>";
}

titulo("Contabilizar Cuentas x Pagar del Sistema Selectra Administrativo Publico","","menu_procesos.php");
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
<tr><TD colspan="2" class="tb-tit" align="right"><INPUT type="submit" name="enviar" value="Enviar"></TD></tr>
  </tbody>
</table>

</FORM>
</body>

</html>
