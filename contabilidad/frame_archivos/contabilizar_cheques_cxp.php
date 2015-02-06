<?
 session_start();

$_SESSION['variable'] = null;

$variable = "lo que sea da error de PHP porque esta variable tiene el mismo nombre q la de sesión";

include ("header.php");
require_once 'lib/config.php';
require_once 'lib/common.php';
$url="contabilizar_cheques_cxp";
$conexion=conexion();

if(isset($_POST['enviar'])){
	//$lines = file('texto');
	
       $consulta_chequex="select * from unes_selectra.cheques where fecha>='".fecha_sql($_POST['desde'])."' and fecha<='".fecha_sql($_POST['hasta'])."' and banco='".$_POST['bancos']."' and status='Im'  order by fecha,cheque";

	$resultado_chequex=query($consulta_chequex,$conexion);
   $filax=fetch_array($resultado_chequex);
       if ($filax ==0){
             	echo"<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
	            alert(\"Cheques no Existen en este Rango Verifique por Favor ....\")
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
		
	$conexion=conexion();
	$consulta_banco="select * from unes_selectra.bancos where codigo='".$_POST['bancos']."'";
	$resultado_banco=query($consulta_banco,$conexion);
	$fila_banco=fetch_array($resultado_banco);
	$conexc=conexion_contab();
	$consulta="insert into cwconhco (Numcom,Codtipo,Fecha,Descrip,Estado) values ('".$numCom."','7','".fecha_sql($_POST['hasta'])."','Cheques emitidos cuenta ".$fila_banco['cuenta']." ".$fila_banco['descripcion']." Desde: ".$_POST['desde']." Hasta: ".$_POST['hasta']."','1')";
	$resultado=query($consulta,$conexc);
	$conexion=conexion();
	$consulta_cheque="select * from unes_selectrare.cheques where fecha>='".fecha_sql($_POST['desde'])."' and fecha<='".fecha_sql($_POST['hasta'])."' and banco='".$_POST['bancos']."' and status='Im'  order by fecha,cheque";
	$resultado_cheque=query($consulta_cheque,$conexion);
         

        
        $i=1;
        while($fila_cheque=fetch_array($resultado_cheque)){
            
           
	 
            $consulta_prov="select * from unes_selectra.proveedores where rif='".$fila_cheque['cedula']."'";
	    $resultado_prov=query($consulta_prov,$conexion);
	    $fila_prov=fetch_array($resultado_prov);
            $cuenta =$fila_prov['cuenta_contable'];
            
            $consulta_odp="select * from unes_selectra.ordenes_pago where numero_odp='".$fila_cheque['orden']."'";
	    $resultado_odp=query($consulta_odp,$conexion);
	    $fila_odp=fetch_array($resultado_odp);
             
            $conexc=conexion_contab();
            $consulta_cwcondco="insert into cwcondco(Numcom,Fecha,Cuenta,Referen,Tiporef,Descrip,Debito,Credito,Numlim,FechaD) values ('".$numCom."','".fecha_sql($_POST['hasta'])."','".$cuenta."','".$fila_cheque['cheque']."','CH','Cancelacion CXP - ".$fila_cheque['beneficiario']."','".$fila_odp['monto']."','0','".$i."','".$fila_cheque['fecha']."')";
	    $resultado_cwcondco=query($consulta_cwcondco,$conexc);
	    $i++;
            $conexion=conexion();
            if($fila_odp['monto_islr']>0)
            {
               $conexc=conexion_contab();
               $consulta_cwcondco="insert into cwcondco (Numcom,Fecha,Cuenta,Referen,Tiporef,Descrip,Debito,Credito,Numlim,FechaD) values ('".$numCom."','".fecha_sql($_POST['hasta'])."','2.1.3.02.02.01.','".$fila_cheque['cheque']."','CH','Retencion del ISLR','0','".$fila_odp['monto_islr']."','".$i."','".$fila_cheque['fecha']."')";
	       $resultado_cwcondco=query($consulta_cwcondco,$conexc);
	       $i++; 
            }
              $conexion=conexion();
              if($fila_odp['monto_retiva']>0)
            {
               $conexc=conexion_contab();
               $consulta_cwcondco="insert into cwcondco (Numcom,Fecha,Cuenta,Referen,Tiporef,Descrip,Debito,Credito,Numlim,FechaD) values ('".$numCom."','".fecha_sql($_POST['hasta'])."','2.1.3.02.01.01.001.','".$fila_cheque['cheque']."','CH','Retencion del IVA','0','".$fila_odp['monto_retiva']."','".$i."','".$fila_cheque['fecha']."')";
	       $resultado_cwcondco=query($consulta_cwcondco,$conexc);
	       $i++; 
            }
              $conexion=conexion();
              if($fila_odp['monto_estam']>0)
            {
 $conexc=conexion();
               $consulta_cwcondco="insert into cwcondco (Numcom,Fecha,Cuenta,Referen,Tiporef,Descrip,Debito,Credito,Numlim,FechaD) values ('".$numCom."','".fecha_sql($_POST['hasta'])."','2.1.3.02.01.02.','".$fila_cheque['cheque']."','CH','Retencion del Timbre Fiscal','0','".$fila_odp['monto_estam']."','".$i."','".$fila_cheque['fecha']."')";
	       $resultado_cwcondco=query($consulta_cwcondco,$conexc);
	       $i++; 
            }
              $conexion=conexion();
              if($fila_odp['anticipo']>0)
            {
 $conexc=conexion();
               $consulta_cwcondco="insert into cwcondco (Numcom,Fecha,Cuenta,Referen,Tiporef,Descrip,Debito,Credito,Numlim,FechaD) values ('".$numCom."','".fecha_sql($_POST['hasta'])."','2.1.4.01.','".$fila_cheque['cheque']."','CH','Retencion Anticipo','0','".$fila_odp['fiel']."','".$i."','".$fila_cheque['fecha']."')";
	       $resultado_cwcondco=query($consulta_cwcondco,$conexc);
	       $i++; 
            }
              $conexion=conexion();
              if($fila_odp['laboral']>0)
            {
 $conexc=conexion_contab();
               $consulta_cwcondco="insert into cwcondco (Numcom,Fecha,Cuenta,Referen,Tiporef,Descrip,Debito,Credito,Numlim,FechaD) values ('".$numCom."','".fecha_sql($_POST['hasta'])."','2.1.4.02.','".$fila_cheque['cheque']."','CH','Retencion Fianza Laboral','0','".$fila_odp['fiel']."','".$i."','".$fila_cheque['fecha']."')";
	       $resultado_cwcondco=query($consulta_cwcondco,$conexc);
	       $i++; 
            }
            $conexion=conexion();
            if($fila_odp['fiel']>0)
            {
 $conexc=conexion_contab();
               $consulta_cwcondco="insert into cwcondco (Numcom,Fecha,Cuenta,Referen,Tiporef,Descrip,Debito,Credito,Numlim,FechaD) values ('".$numCom."','".fecha_sql($_POST['hasta'])."','2.1.4.03.','".$fila_cheque['cheque']."','CH','Retencion Fianza Fiel Cumplimiento','0','".$fila_odp['fiel']."','".$i."','".$fila_cheque['fecha']."')";
	       $resultado_cwcondco=query($consulta_cwcondco,$conexc);
	       $i++; 
            }

            $conexion=conexion();
            if($fila_odp['multa']>0)
            {
 $conexc=conexion_contab();
               $consulta_cwcondco="insert into cwcondco (Numcom,Fecha,Cuenta,Referen,Tiporef,Descrip,Debito,Credito,Numlim,FechaD) values ('".$numCom."','".fecha_sql($_POST['hasta'])."','2.1.1.01.','".$fila_cheque['cheque']."','CH','Retencion Deduccion','0','".$fila_odp['multa']."','".$i."','".$fila_cheque['fecha']."')";
	       $resultado_cwcondco=query($consulta_cwcondco,$conexc);
	       $i++; 
            }
            $consulta_cwcondco="insert into cwcondco (Numcom,Fecha,Cuenta,Referen,Tiporef,Descrip,Debito,Credito,Numlim,FechaD) values ('".$numCom."','".fecha_sql($_POST['hasta'])."','".$fila_banco['cuenta_contable']."','".$fila_cheque['cheque']."','CH','".$fila_cheque['beneficiario']."','0','".$fila_cheque['monto']."','".$i."','".$fila_cheque['fecha']."')";
	    $resultado_cwcondco=query($consulta_cwcondco,$conexc);
	    $i++;
                        
              
	}
	 
	 
	cerrar_conexion($conexion);
	echo"<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
	alert(\"Archivo Contabilizado\")
	parent.cont.location.href=\"contabilizar_cheques_cxp.php\"
	</SCRIPT>";
      exit(0);

}

titulo("Contabilización de Cheques con Cuentas x Pagar","","menu_procesos.php");
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
