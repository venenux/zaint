<?php
session_start();
ob_start();
$termino=$_SESSION['termino'];
?>
<?
include "../lib/common.php";
include "../header.php";

$conexion=conexion_conf();

$consulta_iva="SELECT ctaiva,precompromisos from parametros";
$result_iva=query($consulta_iva,$conexion);
$fila_iva=fetch_array($result_iva);
//$partida_iva=$fila_iva['ctaiva'];
$precompromisos=$fila_iva['precompromisos'];
//echo $precompromisos;
//exit(0);
cerrar_conexion($conexion);

$conexion=conexion();

$nomina=$_GET['codigo_nomina'];

//$consulta="UPDATE nom_nominas_pago SET comprometida=1 WHERE codnom=$nomina AND tipnom=$_SESSION[codigo_nomina]";
//$result00=query($consulta,$conexion);

//BUSCAMOS EL CODIGO DEL MATERIAL, PROVEEDOR, UNIDAD Y CCOSTO CON LOS CUALES VAMOS A CODIFICAR LA ORDEN
$consulta="SELECT cod_material, ccosto, proveedor, unidad FROM nomempresa";
$resultma=query($consulta,$conexion);
$fetchma=fetch_array($resultma);


//SE CALCULA EL MONTO TOTAL DE LAS ASIGNACIONES PARA ESTA NOMINA
$consulta="SELECT SUM(monto) as monto FROM nom_movimientos_nomina WHERE codnom=$nomina AND tipnom=$_SESSION[codigo_nomina] AND tipcon='A'";
$result=query($consulta,$conexion);
$fetch=fetch_array($result);

//SE CONSULTA EL NUMERO DE LA ORDEN TIPO NOMINA Y SE INCREMENTA EN UNO
$consulta="SELECT codigo FROM ordenes_tipos WHERE cod_orden_tipo=4";
$result1=query($consulta,$conexion);
$fetch1=fetch_array($result1);
$codigo_ref=$fetch1['codigo']+1;

//SE HACE EL UPDATE DE LA CONSULTA ANTERIOR
$consulta="UPDATE ordenes_tipos SET codigo=".$codigo_ref." WHERE cod_orden_tipo=4";
$result2=query($consulta,$conexion);

//SE CONSULTA EL CODIGO MAS ALTO DE LAS ORDENES
$consulta="SELECT MAX(codigo) as cod_ord FROM ordenes";
$result3=query($consulta,$conexion);
$fetch3=fetch_array($result3);

//SE CONSULTA EL CODIGO MAS ALTO DE LAS REQUISICIONES
$consulta="SELECT MAX(cod_requisicion) as cod_req FROM requisiciones";
$result4=query($consulta,$conexion);
$fetch4=fetch_array($result4);

//SE CREA LA NUEVA REQUISICION
$consulta="INSERT INTO requisiciones SET cod_requisicion=".($fetch4['cod_req']+1).", agregada_fecha='".date('Y-m-d')."', situacion='Adjudicada', unidad='".$fetchma['unidad']."', cod_centro='".$fetchma['ccosto']."', concepto=(SELECT descrip FROM nom_nominas_pago WHERE codnom=$nomina AND tipnom=$_SESSION[codigo_nomina]), fecha='".date('Y-m-d')."', tipo=4";
$result5=query($consulta,$conexion);

// SE CONSULTA EL CODIGO MAS ALTO DE LOS DETALLES DE LAS REQUISICIONES
$consulta="SELECT MAX(cod_requisicion_det) as cod_req_det FROM requisiciones_det";
$result6=query($consulta,$conexion);
$fetch6=fetch_array($result6);

//SE HACE LA INSERCION EN REQUISICIONES DETALLES
$consulta="INSERT INTO requisiciones_det SET cod_requisicion_det=".($fetch6['cod_req_det']+1).", cod_requisicion=".($fetch4['cod_req']+1).", cod_material='".$fetchma['cod_material']."', descripcion='NOMINA DE PAGO', cantidad=1, unidad='".$fetchma['unidad']."', cod_centro='".$fetchma['ccosto']."'";
$result7=query($consulta,$conexion);

//SE CREA LA NUEVA ORDEN
$consulta="INSERT INTO ordenes SET codigo=".($fetch3['cod_ord']+1).", fecha='".date('Y-m-d')."', unidad='".$fetchma['unidad']."', centro_costo='".$fetchma['ccosto']."', monto_orden=$fetch[monto], concepto=(SELECT descrip FROM nom_nominas_pago WHERE codnom=$nomina AND tipnom=$_SESSION[codigo_nomina]), tipo=4, imponible=$fetch[monto], monto_iva=0, monto_excento=0, cod_provee='".$fetchma['proveedor']."', cod_produ=0, cod_requi=".($fetch4['cod_req']+1).", estado='Emitida', saldo=$fetch[monto], codigo_ref=$codigo_ref, condicioncompra='Otros', tipomoneda='Bolivares (Bs.)'";
$result8=query($consulta,$conexion);

//SE HACE LA INSERCION EN ORDENES DETALLES
$consulta="INSERT INTO ordenes_detalles SET cod_ord=".($fetch3['cod_ord']+1).", cod_pro='".$fetchma['cod_material']."', cantidad_pedida=1, cantidad_des=1, precio=$fetch[monto], iva=0, total=$fetch[monto], total_gen=$fetch[monto], cod_requisicion=".($fetch4['cod_req']+1).", cod_ord_ref=".$codigo_ref."";
$result9=query($consulta,$conexion);

/*
//SE CONSULTAN LOS DISTINTOS CONCEPTOS TIPO ASIGNACION QUE EXISTEN EN ESTA NOMINA
$consulta="SELECT DISTINCT(codcon) FROM nom_movimientos_nomina WHERE codnom=$nomina AND tipnom=$_SESSION[codigo_nomina] AND tipcon='A' ORDER BY tipcon";	
$result10=query($consulta,$conexion);

$totalA=0;
$codigo=$fetch3['cod_ord']+1;
$Fecha = date('Y-m-d');
//$sector=99;$programa='AC1';$actividad='AE2';
$log_usr=$_SESSION['nombre'];

while($fila1=fetch_array($result10))
{
	
	$consulta = "SELECT DISTINCT(codnivel3) FROM nom_movimientos_nomina WHERE codnom=$nomina AND tipnom=$_SESSION[codigo_nomina] AND codcon = '".$fila1['codcon']."' ";
	$result34 = query($consulta,$conexion);
	while($fetch34 = fetch_array($result34))
	{
		
	$sector=substr($fetch34[codnivel3],0,2);
        $programa=substr($fetch34[codnivel3],2,2);
        $actividad=substr($fetch34[codnivel3],4,2);

	//SE CALCULA EL TOTAL DEL CONCEPTO ACTUAL
		$consulta = "SELECT SUM(monto) as suma FROM nom_movimientos_nomina WHERE codnom=$nomina AND tipnom=$_SESSION[codigo_nomina] AND codcon = '".$fila1['codcon']."' AND codnivel3='$fetch34[codnivel3]' ";
		$result11 = query($consulta,$conexion);
		$fetch11 = fetch_array($result11);

		//SE CONSULTA LA CUENTA PRESUPUESTARIA DEL CONCEPTO ACTUAL
		$consulta = "SELECT ctacon1 FROM nomconceptos WHERE codcon = '".$fila1['codcon']."' ";	
		$result12 = query($consulta,$conexion);
		$fetch12 = fetch_array($result12);
		
		//SE CONSULTA EL RECNO DE CWPREPAR
		$consulta="SELECT RecNo FROM cwprepar WHERE Sector='$sector' AND Programa='$programa' AND Actividad='$actividad' AND Codigo='$fetch12[ctacon1]'";
		$result13=query($consulta,$conexion);
		$fetch13 = fetch_array($result13);
	
	//SE CONSULTA EL RecNo MAS  ALTO EN CWPREEJC
// 	$consulta="SELECT MAX(RecNo) as RecNo FROM cwpreejc";
// 	$result14=query($consulta,$conexion);
// 	$fetch14=fetch_array($result14);
	
	//SE REALIZA EL INSERT EN CWPREEJC
	/*$consulta="INSERT INTO cwpreejc SET RecNo=".($fetch14['RecNo']+1).", RecPrePar=$fetch13[RecNo], Monto=$fetch11[suma], saldo=$fetch11[suma], fecha='".date('Y-m-d')."', RecNoOrders=".($fetch3['cod_ord']+1).", Partida='$fetch12[ctacon1]', Sector=99, Programa='AC1', Actividad='AE2'";
	$result15=query($consulta,$conexion);
	
	
		if($fetch12['ctacon1']!='')
		{
                 //   echo $fetch12['ctacon1'];
                 //   echo $sector;
                 //   echo $programa;
                  /*  echo $actividad;
                    
			$partida_material=$fetch12['ctacon1'];
			$consulta_prepar = "SELECT RecNo,Dispo,Precom FROM cwprepar where Codigo='".$fetch12['ctacon1']."' and Sector='".$sector."' and Programa='".$programa."' and Actividad='".$actividad."'";
				//echo $consulta_prepar."<br>";
			$resultado_prepar=query($consulta_prepar,$conexion);
			$numero=num_rows($resultado_prepar);
			if($numero>0)
			{
				$fila_prepar=fetch_array($resultado_prepar);
				$RecPrePar=$fila_prepar["RecNo"];
				$Disponible=$fila_prepar["Dispo"]-$fila_prepar['Precom'];
					//echo $Disponible;
				$consultajc = "SELECT MAX(RecNo) AS maximo FROM cwpreejc_tmp";
				$resultadojc = query($consultajc,$conexion);
				$filajc = fetch_array($resultadojc);
				$maximo = $filajc['maximo'];
				$RecNo = $maximo + 1;
				$Fecha = date('Y-m-d');
				$log_usr=$_SESSION['nombre'];
		
				if($Disponible>=$fetch11['suma'])
				{
					$consultax="SELECT * FROM cwpreejc_tmp WHERE RecPrePar=$RecPrePar";
					$resultadox=query($consultax,$conexion);
					$fetchx=fetch_array($resultadox);
					if($fetchx[RecPrePar]==$RecPrePar)
					{
						$mot=$fetchx['Monto']+$fetch11['suma'];
						$consultay="UPDATE cwpreejc_tmp SET Monto=$mot WHERE RecPrePar=$RecPrePar";
						$resultadoy=query($consultay,$conexion);
					}
					else
					{
						$conIn = "INSERT INTO cwpreejc_tmp VALUES ('".$RecNo."', '".$RecPrePar."', '".$fetch11['suma']."','".$fetch11['suma']."', '".$Fecha."', '".$codigo."', '".$fetch12['ctacon1']."', '".$sector."', '".$programa."', '".$actividad."', '', '".$log_usr."')";
						$resIn = query($conIn, $conexion);
						$num=0;
					}
				}
				else
				{
					echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
					alert(\"La Partida Presupuestaria del material $partida_material sector $sector programa $programa, actividad $actividad No Tiene Disponibilidad Suficiente\")
					</SCRIPT>";
				}
			}
			else
			{
				echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
				alert(\"La Partida Presupuestaria del material $partida_material No esta en el sector $sector programa $programa, actividad $actividad\")
				</SCRIPT>";
			}
		}
	}
}


$codigo=($fetch3['cod_ord']+1);

$consulta_cwpreejc = "SELECT * from cwpreejc_tmp where RecNoOrders=".$codigo."";
//$consulta_cwpreejc = "SELECT sum(monto) as Monto,RecPrePar,Partida,Sector,Programa,Actividad from cwpreejc_tmp where RecNoOrders=".$codigo." GROUP BY Partida"; 
$resultado_cwpreejc = query($consulta_cwpreejc,$conexion);
while ($fila_cwpreejc = fetch_array($resultado_cwpreejc))
{
	$partida = $fila_cwpreejc['Partida'];

	$consulta_prepar = "SELECT RecNo,Dispo,Precom FROM cwprepar where Codigo='".$fila_cwpreejc['Partida']."' and Sector='".$fila_cwpreejc['Sector']."' and Programa='".$fila_cwpreejc['Programa']."' and Actividad='".$fila_cwpreejc['Actividad']."'";
	$resultado_prepar=query($consulta_prepar,$conexion);
	$fila_prepar=fetch_array($resultado_prepar);
	$RecPrePar=$fila_prepar["RecNo"];
	$Disponible=$fila_prepar["Dispo"] - $fila_prepar['Precom'];
	//echo "Disponible: ".$Disponible."<br>";
	$Precom=$fila_prepar['Precom'] + $fila_cwpreejc['Monto'];
	//echo "PRECOM: ".$fila_prepar['Precom']." y MONTO ORDEN: ".$fila_cwpreejc['Monto']."<br>";
	
	$consultajc = "SELECT MAX(RecNo) AS maximo FROM cwpreejc";
	$resultadojc = query($consultajc,$conexion);
	$filajc = fetch_array($resultadojc);
	$maximo = $filajc['maximo'];
	$RecNo = $maximo + 1;
	$Fecha = date('Y-m-d');
	$log_usr=$_SESSION['nombre'];

	if($Disponible > $fila_cwpreejc['Monto'])
	{
		$consulta_existe = "SELECT * FROM cwpreejc where RecNoOrders=".$codigo." and Partida='".$fila_cwpreejc['Partida']."' and Sector='".$fila_cwpreejc['Sector']."' and Programa='".$fila_cwpreejc['Programa']."' and Actividad='".$fila_cwpreejc['Actividad']."'";
		$resultado_existe = query($consulta_existe,$conexion);
		$num_rows = num_rows($resultado_existe);
		if($num_rows==0)
		{
			$conIn = "INSERT INTO cwpreejc VALUES ('".$RecNo."', '".$RecPrePar."', '".$fila_cwpreejc['Monto']."','".$fila_cwpreejc['Monto']."', '".$Fecha."', '".$codigo."', '".$fila_cwpreejc['Partida']."', '".$fila_cwpreejc['Sector']."', '".$fila_cwpreejc['Programa']."', '".$fila_cwpreejc['Actividad']."', '', '".$log_usr."','')";
			$resIn = query($conIn, $conexion);
				//echo $conIn."<br>";
				
			$conPrePar = "UPDATE cwprepar SET Precom='".$Precom."' WHERE Codigo='".$fila_cwpreejc['Partida']."' AND Sector='".$fila_cwpreejc['Sector']."' AND Programa='".$fila_cwpreejc['Programa']."' AND Actividad='".$fila_cwpreejc['Actividad']."'";
			$resPrePar = query($conPrePar, $conexion);
				//echo $conPrePar."<br>";
					
			$Partida_sub_niv3 = substr($fila_cwpreejc['Partida'], 0, 11);
			$result_int  = query("SELECT * FROM cwprepar WHERE Codigo='".$Partida_sub_niv3."' and Sector='".$fila_cwpreejc['Sector']."' and Programa='".$fila_cwpreejc['Programa']."' and Actividad='".$fila_cwpreejc['Actividad']."'",$conexion);
			$filaPrePar1 = fetch_array($result_int);
			$precom = $filaPrePar1['Precom'];
			$precompromiso = $precom + $fila_cwpreejc['Monto'];
					
			$conPrePar = "UPDATE cwprepar SET Precom='".$precompromiso."' WHERE Codigo='".$Partida_sub_niv3."' and Sector='".$fila_cwpreejc['Sector']."' and Programa='".$fila_cwpreejc['Programa']."' and Actividad='".$fila_cwpreejc['Actividad']."'";
			$resPrePar = query($conPrePar, $conexion);
				//echo $conPrePar."<br>";
					
			$Partida_sub_niv3 = substr($fila_cwpreejc['Partida'], 0, 8);
			$result_int  = query("SELECT * FROM cwprepar WHERE Codigo='".$Partida_sub_niv3."' and Sector='".$fila_cwpreejc['Sector']."' and Programa='".$fila_cwpreejc['Programa']."' and Actividad='".$fila_cwpreejc['Actividad']."'", $conexion);
			$filaPrePar1 = fetch_array($result_int);
			$precom = $filaPrePar1['Precom'];
			$precompromiso = $precom + $fila_cwpreejc['Monto'];
					
			$conPrePar = "UPDATE cwprepar SET Precom='".$precompromiso."' WHERE Codigo='".$Partida_sub_niv3."' and Sector='".$fila_cwpreejc['Sector']."' and Programa='".$fila_cwpreejc['Programa']."' and Actividad='".$fila_cwpreejc['Actividad']."'";
			$resPrePar = query($conPrePar, $conexion);
				//echo $conPrePar."<br>";
				
			$Partida_sub_niv3 = substr($fila_cwpreejc['Partida'], 0, 5);
			$result_int  = query("SELECT * FROM cwprepar WHERE Codigo='".$Partida_sub_niv3."' and Sector='".$fila_cwpreejc['Sector']."' and Programa='".$fila_cwpreejc['Programa']."' and Actividad='".$fila_cwpreejc['Actividad']."'", $conexion);
			$filaPrePar1 = fetch_array($result_int);
			$precom = $filaPrePar1['Precom'];
			$precompromiso = $precom + $fila_cwpreejc['Monto'];
			
			$conPrePar = "UPDATE cwprepar SET Precom='".$precompromiso."' WHERE Codigo='".$Partida_sub_niv3."' and Sector='".$fila_cwpreejc['Sector']."' and Programa='".$fila_cwpreejc['Programa']."' and Actividad='".$fila_cwpreejc['Actividad']."'";
			$resPrePar = query($conPrePar, $conexion);
		}
		//echo $conIn."<br>";
	}
	else
	{
		echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
		alert(\"La Partida Presupuestaria $partida del Proyecto $programa, Actividad $actividad No Tiene Disponibilidad Suficiente\")
		</SCRIPT>";
	}
}

$vaciar="TRUNCATE TABLE cwpreejc_tmp";
$resultado_vaciar=query($vaciar,$conexion);

$RecNoOrders = ($fetch3['cod_ord']+1);
//$Diferencia = 0;
//$marca = $_GET['marca'];
$consul_ant = "SELECT SUM(Monto) AS MontoSum FROM cwpreejc WHERE RecNoOrders='".$codigo."'";
$resul_ant = query($consul_ant, $conexion);
$row_an    = fetch_array($resul_ant);
$MontoSum   = $row_an["MontoSum"];
$total_orden=$fetch["monto"];
$Diferencia = $total_orden - $MontoSum;
//echo "Total Orden: ".$total_orden." Monto Sum: ".$MontoSum;
//exit(0);

if($Diferencia != 0)
{
	echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
	alert(\"No se puede comprometer esta orden! Revise la codificacion realizada\")
	parent.cont.location.href=\"../paginas/home.php\"
	</SCRIPT>";
	$con = "update cwpreejc set Marca='D' WHERE RecNoOrders='".$RecNoOrders."'";
	$res = query($con, $conexion);
	$consulta = "UPDATE ordenes SET Marca='D' WHERE codigo='".$RecNoOrders."'";
	$resultado = query($consulta,$conexion);
	exit(0);
} 
elseif($precompromisos=='SI')
{
	echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
	alert(\"Precompromiso Realizado con Exito\")
	parent.cont.location.href=\"cworderlist_1.php\"
	</SCRIPT>";
	$con = "update cwpreejc set Marca='C' WHERE RecNoOrders='".$RecNoOrders."'";
	$res = query($con, $conexion);
	$consulta = "UPDATE ordenes SET Marca='C',estado='PreComprometida' WHERE codigo='".$RecNoOrders."'";
	$resultado = query($consulta,$conexion);
	exit(0);
}
else	
{
	$consulta = "UPDATE ordenes SET estado='Comprometida',Marca='X' WHERE codigo='".$RecNoOrders."'";
	$resultado = query($consulta,$conexion);

	$consulta = "SELECT * FROM cwpreejc where RecNoOrders='".$RecNoOrders."'";
	$resultado = query($consulta,$conexion);
		
	while($fila = fetch_array($resultado))
	{
		$conPrePar1 = "SELECT * FROM cwprepar WHERE Codigo='".$fila['Partida']."' AND Sector='".$fila['Sector']."' AND Programa='".$fila['Programa']."' AND Actividad='".$fila['Actividad']."'";
		$resPrePar1 = query($conPrePar1, $conexion);
		$filaPrePar1 = fetch_array($resPrePar1);
		$precompromiso = $fila['Monto'];
		$compromiso = $filaPrePar1['AcuCom'] + $precompromiso;
		//echo "Monto Actualizado=".$filaPrePar1['Monto']."<br>";
		//echo "AcuCom=".$filaPrePar1['AcuCom']."<br>";
		//echo "Precompromiso=".$precompromiso."<br>";
		//echo "Compromiso=".$compromiso."<br>";
			
			
		$dispo = $filaPrePar1['Dispo'];
		$disponible = $filaPrePar1['Monto'] - ($filaPrePar1['AcuCom']  + $precompromiso);
		$precompromiso=$precompromiso-$fila['Monto'];

		$conPrePar = "UPDATE cwprepar SET Dispo= '".$disponible."', AcuCom='".$compromiso."', Precom='".$precompromiso."' WHERE Codigo='".$fila['Partida']."' AND Sector='".$fila['Sector']."' AND Programa='".$fila['Programa']."' AND Actividad='".$fila['Actividad']."'";
		$resPrePar = query($conPrePar, $conexion);
			//echo $conPrePar."<br>";
		$Partida_sub_niv3 = substr($fila['Partida'], 0, 11);
		$result_int  = query("SELECT * FROM cwprepar WHERE Codigo='".$Partida_sub_niv3."' and Sector='".$fila['Sector']."' and Programa='".$fila['Programa']."' and Actividad='".$fila['Actividad']."'",$conexion);
		$filaPrePar1 = fetch_array($result_int);
		$precompromiso = $fila['Monto'];
		$compromiso = $filaPrePar1['AcuCom'] + $precompromiso;
			//echo "Monto Actualizado=".$filaPrePar1['Monto']."<br>";
			//echo "AcuCom=".$filaPrePar1['AcuCom']."<br>";
			//echo "Precompromiso=".$precompromiso."<br>";
			//echo "Compromiso=".$compromiso."<br>";
			
		$dispo = $filaPrePar1['Dispo'];
		$disponible = $filaPrePar1['Monto'] - ($filaPrePar1['AcuCom']  + $precompromiso);
		$precompromiso=$precompromiso-$fila['Monto'];
			
		$conPrePar = "UPDATE cwprepar SET Dispo= '".$disponible."', AcuCom='".$compromiso."', Precom='".$precompromiso."' WHERE Codigo='".$Partida_sub_niv3."' and Sector='".$fila['Sector']."' and Programa='".$fila['Programa']."' and Actividad='".$fila['Actividad']."'";
		$resPrePar = query($conPrePar, $conexion);
			//echo $conPrePar."<br>";
		$Partida_sub_niv3 = substr($fila['Partida'], 0, 8);
		$result_int  = query("SELECT * FROM cwprepar WHERE Codigo='".$Partida_sub_niv3."' and Sector='".$fila['Sector']."' and Programa='".$fila['Programa']."' and Actividad='".$fila['Actividad']."'", $conexion);
		$filaPrePar1 = fetch_array($result_int);
		$precompromiso = $fila['Monto'];
		$compromiso = $filaPrePar1['AcuCom'] + $precompromiso;
			//echo "Monto Actualizado=".$filaPrePar1['Monto']."<br>";
			//echo "AcuCom=".$filaPrePar1['AcuCom']."<br>";
			//echo "Precompromiso=".$precompromiso."<br>";
			//echo "Compromiso=".$compromiso."<br>";
			
		$dispo = $filaPrePar1['Dispo'];
		$disponible = $filaPrePar1['Monto'] - ($filaPrePar1['AcuCom']  + $precompromiso);
		$precompromiso=$precompromiso-$fila['Monto'];

		$conPrePar = "UPDATE cwprepar SET Dispo= '".$disponible."', AcuCom='".$compromiso."', Precom='".$precompromiso."' WHERE Codigo='".$Partida_sub_niv3."' and Sector='".$fila['Sector']."' and Programa='".$fila['Programa']."' and Actividad='".$fila['Actividad']."'";
		$resPrePar = query($conPrePar, $conexion);
			//echo $conPrePar."<br>";
		$Partida_sub_niv3 = substr($fila['Partida'], 0, 5);
		$result_int  = query("SELECT * FROM cwprepar WHERE Codigo='".$Partida_sub_niv3."' and Sector='".$fila['Sector']."' and Programa='".$fila['Programa']."' and Actividad='".$fila['Actividad']."'", $conexion);
		$filaPrePar1 = fetch_array($result_int);
		$precompromiso = $fila['Monto'];
		$compromiso = $filaPrePar1['AcuCom'] + $precompromiso;
			//echo "Monto Actualizado=".$filaPrePar1['Monto']."<br>";
			//echo "AcuCom=".$filaPrePar1['AcuCom']."<br>";
			//echo "Precompromiso=".$precompromiso."<br>";
			//echo "Compromiso=".$compromiso."<br>";
			
		$dispo = $filaPrePar1['Dispo'];
		$disponible = $filaPrePar1['Monto'] - ($filaPrePar1['AcuCom']  + $precompromiso);
		$precompromiso=$precompromiso-$fila['Monto'];
		
		$conPrePar = "UPDATE cwprepar SET Dispo= '".$disponible."', AcuCom='".$compromiso."', Precom='".$precompromiso."' WHERE Codigo='".$Partida_sub_niv3."' and Sector='".$fila['Sector']."' and Programa='".$fila['Programa']."' and Actividad='".$fila['Actividad']."'";
		$resPrePar = query($conPrePar, $conexion);
			//echo $conPrePar."<br>";
		if($fila['ordinal']!="")
		{
			$consulta="select * from ordinales where ordinal='".$fila['ordinal']."' and sec='".$fila['Sector']."' and pro='".$fila['Programa']."' obr='".$fila['Actividad']."'";
			$resPrePar1 = query($consulta, $conexion);
			$filaPrePar1 = fetch_array($resPrePar1);
			$compromiso = $filaPrePar1['compromiso'] + $fila['Monto'];
			$precom = $filaPrePar1['Precom'];
			$precompromiso = $precom - $fila['Monto'];
				
			$conPrePar = "UPDATE ordinales SET compromiso='".$compromiso."', PreCom='".$precompromiso."' WHERE ordinal='".$fila['ordinal']."' and codigo='".$fila['Partida']."' and sec='".$fila['Sector']."' and pro='".$fila['Programa']."' obr='".$fila['Actividad']."'";
			$resPrePar = query($conPrePar, $conexion);
		}
	}

}//exit(0);
$con = "update cwpreejc set Marca='X' WHERE RecNoOrders='".$RecNoOrders."'";
$res = query($con, $conexion);
/*echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
parent.cont.location.href=\"cworderlist2.php\"
</SCRIPT>";*/
cerrar_conexion($conexion);

/*
$consulta = "SELECT * FROM cwpreejc where RecNoOrders='".$RecNoOrders."'";
$resultado = query($consulta,$conexion);

while($fila = fetch_array($resultado))
{
	$conPrePar1 = "SELECT * FROM cwprepar WHERE Codigo='".$fila['Partida']."' AND Sector='".$fila['Sector']."' AND Programa='".$fila['Programa']."' AND Actividad='".$fila['Actividad']."'";
	$resPrePar1 = query($conPrePar1, $conexion);
	$filaPrePar1 = fetch_array($resPrePar1);
	$compromiso = $filaPrePar1['AcuCom'] + $fila['Monto'];
	$precom = $filaPrePar1['Precom'];
	$precompromiso = $precom - $fila['Monto'];
	$dispo = $filaPrePar1['Dispo'];
	$disponible = $dispo - $fila['Monto'];

	$conPrePar = "UPDATE cwprepar SET Dispo= '".$disponible."', AcuCom='".$compromiso."', Precom='".$precompromiso."' WHERE Codigo='".$fila['Partida']."' AND Sector='".$fila['Sector']."' AND Programa='".$fila['Programa']."' AND Actividad='".$fila['Actividad']."'";
			$resPrePar = query($conPrePar, $conexion);
			
	$Partida_sub_niv3 = substr($fila['Partida'], 0, 11);
	$result_int  = query("SELECT * FROM cwprepar WHERE Codigo='".$Partida_sub_niv3."' and Sector='".$fila['Sector']."' and Programa='".$fila['Programa']."' and Actividad='".$fila['Actividad']."'",$conexion);
	$filaPrePar1 = fetch_array($result_int);
	$compromiso = $filaPrePar1['AcuCom'] + $fila['Monto'];
	$precom = $filaPrePar1['Precom'];
	$precompromiso = $precom - $fila['Monto'];
	$dispo = $filaPrePar1['Dispo'];
	$disponible = $dispo - $fila['Monto'];
		
	$conPrePar = "UPDATE cwprepar SET Dispo= '".$disponible."', AcuCom='".$compromiso."', Precom='".$precompromiso."' WHERE Codigo='".$Partida_sub_niv3."' and Sector='".$fila['Sector']."' and Programa='".$fila['Programa']."' and Actividad='".$fila['Actividad']."'";
	$resPrePar = query($conPrePar, $conexion);
			
	$Partida_sub_niv3 = substr($fila['Partida'], 0, 8);
	$result_int  = query("SELECT * FROM cwprepar WHERE Codigo='".$Partida_sub_niv3."' and Sector='".$fila['Sector']."' and Programa='".$fila['Programa']."' and Actividad='".$fila['Actividad']."'", $conexion);
	$filaPrePar1 = fetch_array($result_int);
	$compromiso = $filaPrePar1['AcuCom'] + $fila['Monto'];
	$precom = $filaPrePar1['Precom'];
	$precompromiso = $precom - $fila['Monto'];
	$dispo = $filaPrePar1['Dispo'];
	$disponible = $dispo - $fila['Monto'];

	$conPrePar = "UPDATE cwprepar SET Dispo= '".$disponible."', AcuCom='".$compromiso."', Precom='".$precompromiso."' WHERE Codigo='".$Partida_sub_niv3."' and Sector='".$fila['Sector']."' and Programa='".$fila['Programa']."' and Actividad='".$fila['Actividad']."'";
	$resPrePar = query($conPrePar, $conexion);

	$Partida_sub_niv3 = substr($fila['Partida'], 0, 5);
	$result_int  = query("SELECT * FROM cwprepar WHERE Codigo='".$Partida_sub_niv3."' and Sector='".$fila['Sector']."' and Programa='".$fila['Programa']."' and Actividad='".$fila['Actividad']."'", $conexion);
	$filaPrePar1 = fetch_array($result_int);
	$compromiso = $filaPrePar1['AcuCom'] + $fila['Monto'];
	$precom = $filaPrePar1['Precom'];
	$precompromiso = $precom - $fila['Monto'];
	$dispo = $filaPrePar1['Dispo'];
	$disponible = $dispo - $fila['Monto'];
		
	$conPrePar = "UPDATE cwprepar SET Dispo= '".$disponible."', AcuCom='".$compromiso."', Precom='".$precompromiso."' WHERE Codigo='".$Partida_sub_niv3."' and Sector='".$fila['Sector']."' and Programa='".$fila['Programa']."' and Actividad='".$fila['Actividad']."'";
	$resPrePar = query($conPrePar, $conexion);
			
	if($fila['ordinal']!="")
	{
		$consulta="select * from ordinales where ordinal='".$fila['ordinal']."' and sec='".$fila['Sector']."' and pro='".$fila['Programa']."' obr='".$fila['Actividad']."'";
		$resPrePar1 = query($consulta, $conexion);
		$filaPrePar1 = fetch_array($resPrePar1);
		$compromiso = $filaPrePar1['compromiso'] + $fila['Monto'];
		$precom = $filaPrePar1['Precom'];
		$precompromiso = $precom - $fila['Monto'];
				
		$conPrePar = "UPDATE ordinales SET compromiso='".$compromiso."', PreCom='".$precompromiso."' WHERE ordinal='".$fila['ordinal']."' and codigo='".$fila['Partida']."' and sec='".$fila['Sector']."' and pro='".$fila['Programa']."' obr='".$fila['Actividad']."'";
		$resPrePar = query($conPrePar, $conexion);
	}
}
*/
echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
alert(\"ORDEN REALIZADA EXITOSAMENTE!!!\")
</SCRIPT>";


echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
parent.cont.location.href=\"../paginas/menu_procesos.php\"
</SCRIPT>";

?>
