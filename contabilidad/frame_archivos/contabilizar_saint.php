
<?php
 session_start();

$_SESSION['variable'] = null;

$variable = "lo que sea da error de PHP porque esta variable tiene el mismo nombre q la de sesión";

include ("header.php");
require_once 'lib/config.php';
require_once 'lib/common.php';

$conexion=conexion();

$url="contabilizar_saint";



if(isset($_POST['enviar']))
{
    if (is_uploaded_file($_FILES['archivo']['tmp_name']))
    {
       
		query ("TRUNCATE TABLE texto_contabilidad",$conexion);
		$contenido = file($_FILES[archivo][tmp_name]); 
		for( $i = 0 ; $i < sizeof ( $contenido ); $i ++) 
		{
			$linea = trim ( $contenido [ $i ]);
			 
			$cuenta=substr($linea,0,1).".";
			if(substr($linea,1,1)!='  ')
				$cuenta.=substr($linea,1,1).".";
			if(substr($linea,2,1)!='  ')
				$cuenta.=substr($linea,2,1).".";
			if(substr($linea,3,2)!='  ')
				$cuenta.=substr($linea,3,2).".";
			if(substr($linea,5,2)!='  ')
				$cuenta.=substr($linea,5,2).".";
			if(substr($linea,7,2)!='  ')
				$cuenta.=substr($linea,7,2).".";
			if(substr($linea,9,3)!='   ')
				$cuenta.=substr($linea,9,3).".";
			$nomina=substr($linea,20,3);
			$fecha=substr($linea,23,8);
			$nombre=substr($linea,31,35);
			$monto1=substr($linea,66,12);
			$monto2=substr($linea,78,2);
			$monto=$monto1.".".$monto2;
			$tipo=substr($linea,80,1);
			$sql = "insert into texto_contabilidad values ('".$cuenta."','".$nomina."','".$fecha."','".$nombre."','".$monto."','".$tipo."')" ; 
			$consulta = query ($sql,$conexion); 
		}
		
    }
	$conexc=conexion();
	
	$fecha=substr($fecha,0,2)."/".substr($fecha,2,2)."/".substr($fecha,4,4);
	
	$consult = "SELECT * FROM cwconemp";
	$result = mysql_query($consult, $conexc);
	$fil = mysql_fetch_array($result);
	
	$mes=explode('/',$fecha);
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
	
	$consulta="insert into cwconhco (Numcom,Codtipo,Fecha,Descrip,Estado) values ('".$numCom."','3','".fecha_sql($fecha)."','Movimientos Nomina "."  Fecha: ".$fecha."','1')";
	$resultado=query($consulta,$conexion);
	$consulta="select * from texto_contabilidad order by tipo desc";
	$resultado=query($consulta,$conexion);
	$i=1;
	while($fila=fetch_array($resultado))
	{
		$conexc=conexion();
		 
		if($fila['tipo'] == "D")
		{
			$consulta_cwcondco="insert into cwcondco (Numcom,Fecha,Cuenta,Referen,Tiporef,Descrip,Debito,Credito,Numlim,FechaD) values ('".$numCom."','".fecha_sql($fecha)."','".$fila[cuenta]."','','','$fila[nombre]','".$fila['monto']."','0','".$i."','".$fila['fecha']."')";
			$resultado_cwcondco=query($consulta_cwcondco,$conexc);
			$i++;
		}
	
		if ($fila['tipo'] =="C")
		{
			$consulta_cwcondco="insert into cwcondco (Numcom,Fecha,Cuenta,Referen,Tiporef,Descrip,Debito,Credito,Numlim,FechaD) values ('".$numCom."','".fecha_sql($fecha)."','".$fila[cuenta]."','','','$fila[nombre]','0','".$fila['monto']."','".$i."','".$fila['fecha']."')";
			$resultado_cwcondco=query($consulta_cwcondco,$conexc);
			$i++;
		}
		
	}
	
	
    cerrar_conexion($conexion);
    echo"<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
    alert(\"Nomina Contabilizada\")
    parent.cont.location.href=\"menu_procesos.php\"
    </SCRIPT>";
}
titulo("Contabilización de Nomina Saint","","menu_procesos.php");
?>
 
<form method="post" enctype="multipart/form-data" action="contabilizar_saint.php">
<input type="file" name="archivo">
<input type="submit" name="enviar" value="Enviar">
</form>
</body>

</html>
