<?
//desde aqui LM
//require_once "../../config/config.ini.php";
require_once($_SERVER['DOCUMENT_ROOT'].'/pyme/generalp.config.inc.php');
require_once 'lib/config.php';
require_once 'lib/common.php';
include("header.php");
$conexion = conexion();
//hasta aqui LM
//require_once "../../selectra/lib/common.php";
//include("header.php");
$url="contabilizar_fiscal";
//$conexion=conexion();

if(isset($_POST['enviar'])){
	
        // Asiento de Gastos Presupuestarios N� 1 
	
	$consulta="select * from cwconemp";
	$resultado=query($consulta,$conexion);
	$fila=fetch_array($resultado);
	$ultimo_comprobante=$fila['Numcom']+1;
	$resulatdo=query("update cwconemp set Numcom='".$ultimo_comprobante."'",$conexion);
	
	$consulta_banco="select * from bancos where codigo='".$_POST['bancos']."'";
	$resultado_banco=query($consulta_banco,$conexion);
	$fila_banco=fetch_array($resultado_banco);
	
	$consulta="insert into cwconhco (Numcom,Codtipo,Fecha,Descrip,Estado) values ('".$ultimo_comprobante."','6','".fecha_sql($_POST['hasta'])."','Movimientos Gastos Presupuestarios Periodo Desde: ".$_POST['desde']." Hasta: ".$_POST['hasta']."','1')";
	$resultado=query($consulta,$conexion);
//LM desde aqui
         $consulta_ordenes="SELECT ORD.numero_odp, ORD.fecha, ORD.monto AS monto_orden, ORD.numero_ocs, ORD.codigo_cliente, 
        ORD.estado,ORD.tipo, PRO.cod_proveedor, PRO.cuenta_contable AS cuenta_contable, PRO.compania AS proveedor
	FROM ordenes_pago AS ORD
	JOIN proveedores AS  PRO 
        ON PRO.cod_proveedor = ORD.codigo_cliente
	WHERE  ORD.fecha >='".fecha_sql($_POST['desde'])."' and ORD.fecha <='".fecha_sql($_POST['hasta'])."' 
               AND ORD.estado <> 'Anulada' order by ORD.fecha,ORD.numero_odp ";
 
        
        $resultado_ordenes=query($consulta_ordenes,$conexion);
       
	$i=1;
	while($fila_ordenes=fetch_array($resultado_ordenes)){
		 $odp=$fila_ordenes['numero_odp'];
		 $odcs=$fila_ordenes['numero_ocs'];
	 	 $consulta_codificacion="SELECT ORD.numero_odp AS codigo, ORD.fecha AS fecha_orden, ORD.numero_ocs AS numero_ocs_orden, EJE.RecNo, EJE.RecPrePar, EJE.Monto AS monto_causado, EJE.RecNoOrders, EJE.Partida, EJE.Sector, EJE.Programa, EJE.Actividad, PAR.Codigo, PAR.RecNo, PAR.Cuenta as Cuenta_Contable, PAR.Sector, PAR.Programa, PAR.Actividad, ORD.concepto AS Denominacion FROM ordenes_pago AS ORD 
		JOIN cwpreeje AS EJE ON ORD.numero_odp = EJE.RecNoOrders
		JOIN cwprepar AS PAR ON EJE.partida = PAR.Codigo AND EJE.Sector = PAR.Sector
		AND EJE.Programa = PAR.Programa AND EJE.Actividad = PAR.Actividad
		WHERE EJE.RecNoOrders=$odp order by ORD.fecha,ORD.numero_odp ";
		$resultado_codificacion=query($consulta_codificacion,$conexion);
              
	 
		while($fila_codificacion=fetch_array($resultado_codificacion)){
		$descripcion=utf8_encode($fila_codificacion['Denominacion'])." Orden C/S Nro: ".$odcs;
		$consulta_cwcondco="insert into cwcondco (Numcom,Fecha,Cuenta,Referen,Tiporef,Descrip,Debito,Credito,Numlim,FechaD) values ('".$ultimo_comprobante."','".fecha_sql($_POST['hasta'])."','".$fila_codificacion['Cuenta_Contable']."','".$odp."','GP','".$descripcion."','".$fila_codificacion['monto_causado']."','','".$i."','".fecha_sql($_POST['hasta'])."')";
		$resultado_cwcondco=query($consulta_cwcondco,$conexion);
		$i++;
		}
		$descripcion=utf8_encode($fila_ordenes['proveedor'])." CXP Orden C/S Nro: ".$odcs;
		$consulta_cwcondco="insert into cwcondco (Numcom,Fecha,Cuenta,Referen,Tiporef,Descrip,Debito,Credito,Numlim,FechaD) values ('".$ultimo_comprobante."','".fecha_sql($_POST['hasta'])."','".$fila_ordenes['cuenta_contable']."','".$odp."','OP','".$descripcion."','','".$fila_ordenes['monto_orden']."','".$i."','".fecha_sql($_POST['hasta'])."')";
		$resultado_cwcondco=query($consulta_cwcondco,$conexion);
		$i++;
	}
	//exit(0);
	//cerrar_conexion($conexion);
	echo"<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
	alert(\"Gastos Presupuestarios Contabilizado\")
	</SCRIPT>";
        
        // Asiento de Gastos Presupuestarios N� 2 
	
	$consulta="select * from cwconemp";
	$resultado=query($consulta,$conexion);
	$fila=fetch_array($resultado);
	$ultimo_comprobante=$fila['Numcom']+1;
	$resulatdo=query("update cwconemp set Numcom='".$ultimo_comprobante."'",$conexion);
	
	$consulta_banco="select * from bancos where codigo='".$_POST['bancos']."'";
	$resultado_banco=query($consulta_banco,$conexion);
	$fila_banco=fetch_array($resultado_banco);
	
	$consulta="insert into cwconhco (Numcom,Codtipo,Fecha,Descrip,Estado) values ('".$ultimo_comprobante."','2','".fecha_sql($_POST['hasta'])."','Movimientos Gastos por Pagar Periodo Desde: ".$_POST['desde']." Hasta: ".$_POST['hasta']."','1')";
	$resultado=query($consulta,$conexion);
	//LM
         $consulta_ordenes="SELECT ORD.numero_odp, ORD.fecha, ORD.monto AS monto_orden, ORD.codigo_cliente, 
        ORD.estado,ORD.tipo, PRO.cod_proveedor, PRO.cuenta_contable AS cuenta_contable, PRO.compania AS proveedor
	FROM ordenes_pago AS ORD
	JOIN proveedores AS  PRO 
        ON PRO.cod_proveedor = ORD.codigo_cliente
	WHERE  ORD.fecha >='".fecha_sql($_POST['desde'])."' and ORD.fecha <='".fecha_sql($_POST['hasta'])."' 
               AND ORD.estado <> 'Anulada' order by ORD.fecha,ORD.numero_odp ";
 
        
        $resultado_ordenes=query($consulta_ordenes,$conexion);
       
	$i=1;
	while($fila_ordenes=fetch_array($resultado_ordenes)){
		  $odp=$fila_ordenes['numero_odp'];
	 	 $consulta_codificacion="SELECT ORD.numero_odp AS codigo, ORD.fecha AS fecha_orden, EJE.RecNo, EJE.RecPrePar, EJE.Monto AS monto_causado, EJE.RecNoOrders, EJE.Partida, EJE.Sector, EJE.Programa, EJE.Actividad, PAR.Codigo, PAR.RecNo, PAR.Cuenta as Cuenta_Contable, PAR.Sector, PAR.Programa, PAR.Actividad, ORD.concepto AS Denominacion FROM ordenes_pago AS ORD 
		JOIN cwpreeje AS EJE ON ORD.numero_odp = EJE.RecNoOrders
		JOIN cwprepar AS PAR ON EJE.partida = PAR.Codigo AND EJE.Sector = PAR.Sector
		AND EJE.Programa = PAR.Programa AND EJE.Actividad = PAR.Actividad
		WHERE EJE.RecNoOrders=$odp order by ORD.fecha,ORD.numero_odp ";
		$resultado_codificacion=query($consulta_codificacion,$conexion);
              
	 
		while($fila_codificacion=fetch_array($resultado_codificacion)){
		$descripcion=utf8_encode($fila_codificacion['Denominacion'])." Orden Nro: ".$odp;
		$consulta_cwcondco="insert into cwcondco (Numcom,Fecha,Cuenta,Referen,Tiporef,Descrip,Debito,Credito,Numlim,FechaD) values ('".$ultimo_comprobante."','".fecha_sql($_POST['hasta'])."','103.01.01.','".$odp."','GP','".$descripcion."','".$fila_codificacion['monto_causado']."','','".$i."','".fecha_sql($_POST['hasta'])."')";
		$resultado_cwcondco=query($consulta_cwcondco,$conexion);
		$i++;
		}
		$descripcion=utf8_encode($fila_ordenes['proveedor'])." CXP ODP Nro: ".$odp;
		$consulta_cwcondco="insert into cwcondco (Numcom,Fecha,Cuenta,Referen,Tiporef,Descrip,Debito,Credito,Numlim,FechaD) values ('".$ultimo_comprobante."','".fecha_sql($_POST['hasta'])."','101.01.01.','".$odp."','OP','".$descripcion."','','".$fila_ordenes['monto_orden']."','".$i."','".fecha_sql($_POST['hasta'])."')";
		$resultado_cwcondco=query($consulta_cwcondco,$conexion);
		$i++;
	}
	//exit(0);
	//cerrar_conexion($conexion);
	echo"<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
	alert(\"Ordenes de Pago Contabilizado\")
	</SCRIPT>";

	//LM
/*
	$consulta_odp="select sum(monto) as bs from ordenes_pago where Fecha>='".fecha_sql($_POST['desde'])."' and Fecha<='".fecha_sql($_POST['hasta'])."' and estado<>'Causada' and estado<>'Pagada' and estado<>'Autorizada'";
	$resultado_odp=query($consulta_odp,$conexion);
        $fila_odp=fetch_array($resultado_odp);
	$suma=$fila_odp['bs'];
        	
	$consulta_cwcondco="insert into cwcondco (Numcom,Fecha,Cuenta,Referen,Tiporef,Descrip,Debito,Credito,Numlim,FechaD) values ('".$ultimo_comprobante."','".fecha_sql($_POST['hasta'])."','103.01.01.','".$fila_bauche['cheque']."','GP','Gastos x Pagar','".$suma."','0.00','1','".fecha_sql($_POST['hasta'])."')";
	$resultado_cwcondco=query($consulta_cwcondco,$conexion);
	         
        $consulta_cwcondco="insert into cwcondco (Numcom,Fecha,Cuenta,Referen,Tiporef,Descrip,Debito,Credito,Numlim,FechaD) values ('".$ultimo_comprobante."','".fecha_sql($_POST['hasta'])."','101.01.01.','".$fila_bauche['cheque']."','OP','Ordenes de Pago','0.00','".$suma."','2','".fecha_sql($_POST['hasta'])."')";
	$resultado_cwcondco=query($consulta_cwcondco,$conexion);
*/ 
        // Asiento de Gastos Presupuestarios N� 3
 
	$consulta="select * from cwconemp";
	$resultado=query($consulta,$conexion);
	$fila=fetch_array($resultado);
	$ultimo_comprobante=$fila['Numcom']+1;
	$resulatdo=query("update cwconemp set Numcom='".$ultimo_comprobante."'",$conexion);
	
	$consulta_banco="select * from bancos where codigo='".$_POST['bancos']."'";
	$resultado_banco=query($consulta_banco,$conexion);
	$fila_banco=fetch_array($resultado_banco);
	
	$consulta="insert into cwconhco (Numcom,Codtipo,Fecha,Descrip,Estado) values ('".$ultimo_comprobante."','3','".fecha_sql($_POST['hasta'])."','Movimientos Orden de Pago Pagadas Periodo Desde: ".$_POST['desde']." Hasta: ".$_POST['hasta']."','1')";
	$resultado=query($consulta,$conexion);
	
	$consulta_odpx="select * from ordenes_pago where Fecha>='".fecha_sql($_POST['desde'])."' and Fecha<='".fecha_sql($_POST['hasta'])."' and estado='Pagada'";
	$resultado_odpx=query($consulta_odpx,$conexion);
        $fila_odpx=fetch_array($resultado_odpx);
	$sumax=$fila_odpx['montopago'];
        
        $i=1;
	while($fila_odpx=fetch_array($resultado_odpx)){   
              
    	     $consulta_cwcondco="insert into cwcondco (Numcom,Fecha,Cuenta,Referen,Tiporef,Descrip,Debito,Credito,Numlim,FechaD) values ('".$ultimo_comprobante."','".fecha_sql($_POST['hasta'])."','101.01.01.','".$fila_odpx['numero_odp']."','OP','".$fila_odpx['concepto']."','".$fila_odpx['montopago']."','0.00','".$i."','".fecha_sql($_POST['hasta'])."')";
	     $resultado_cwcondco=query($consulta_cwcondco,$conexion);
	     $i++;
             
            $consulta_banco="select * from bancos where cuenta='".$fila_odpx['cuenta']."'";
	    $resultado_banco=query($consulta_banco,$conexion);
	    $fila_banco=fetch_array($resultado_banco);
             
            $consulta_cwcondco="insert into cwcondco (Numcom,Fecha,Cuenta,Referen,Tiporef,Descrip,Debito,Credito,Numlim,FechaD) values ('".$ultimo_comprobante."','".fecha_sql($_POST['hasta'])."','".$fila_banco['cuenta_contable_fiscal']."','".$fila_odpx['cheque']."','CH','".$fila_odpx['bene']."','0.00','".$fila_odpx['montopago']."','".$i."','".fecha_sql($_POST['hasta'])."')";
	    $resultado_cwcondco=query($consulta_cwcondco,$conexion);
	    $i++;
        }
         
	//exit(0);
	cerrar_conexion($conexion);
	echo"<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
	alert(\"Archivo Contabilizado\")
	parent.cont.location.href=\"menu_procesos.php\"
	</SCRIPT>";
}

titulo("Contabilización Fiscal (Genera 3 Comprobantes)","","menu_procesos.php");
?>
<FORM name="<?echo $url;?>" method="POST" target="_self" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table width="100%" border="0">
  <tbody>
    <tr>
      <td class="tb-head" width="8%"><strong>Desde:</strong></td>
		<TD width="160"> <input name="desde" type="text" id="desde" style="width:100px" value=" <?php echo $_POST['desde']; ?>" maxlength="60">&nbsp; <input name="d_fecha" type="image" id="d_fecha" src="lib/jscalendar/cal.gif" />
  		<script type="text/javascript">Calendar.setup({inputField:"desde",ifFormat:"%d/%m/%Y",button:"d_fecha"});</script></td>
	</TR>
	<TR>
      <td class="tb-head"><strong>Hasta: </strong></td>
		<TD><input name="hasta" type="text" id="hasta" style="width:100px" value="<?php echo $_POST['hasta']; ?>" maxlength="60" >&nbsp;
          <input name="h_fecha" type="image" id="h_fecha" src="lib/jscalendar/cal.gif" />
  			<script type="text/javascript">Calendar.setup({inputField:"hasta",ifFormat:"%d/%m/%Y",button:"h_fecha"});</script></td>
    </tr>
    
<tr><TD colspan="2" class="tb-tit" align="right"><INPUT type="submit" name="enviar" value="Enviar"></TD></tr>
  </tbody>
</table>

</FORM>
</body>

</html>
