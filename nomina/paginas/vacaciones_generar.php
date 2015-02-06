<?php 
session_start();
ob_start();
?>
<?
require_once '../lib/common.php';
//require_once 'funciones_nomina.php';
include ("../header.php");

?>

<script type="text/javascript">

function enviar()
{
	//document.frmPrincipal.op.value=1;
	var ano = document.form1.ano.value
	document.form1.submit();
	//alert("Anio "+ano+" generado con exito!!");
	//parent.cont.location.href = "submenu_vacaciones.php"
}

</script>

<?php

function antiguedad($fecha1,$fecha2,$tipo)
{	
	if($fecha1>$fecha2)
	{
		return;
	}
	if($tipo=="")
	{
		return;
	}
	$ano1=substr($fecha1,0,4);
	$mes1=substr($fecha1,5,2);
	$dia1=substr($fecha1,8,2);
	
	$ano2=substr($fecha2,0,4);
	$mes2=substr($fecha2,5,2);
	$dia2=substr($fecha2,8,2);
	
	if($dia1>$dia2)
	{
		$dia2+=30;
		$mes2-=1;
		if($mes2<0)
		{
			$mes2=12;
			$ano2-=1;
		}
	}
	
	//calculo timestam de las dos fechas
	$timestamp1 = mktime(0,0,0,$mes1,$dia1,$ano1);
	$timestamp2 = mktime(0,0,0,$mes2,$dia2,$ano2);

	//resto a una fecha la otra
	$segundos_diferencia = $timestamp1 - $timestamp2;
	//echo $segundos_diferencia;

	//convierto segundos en días
	$dias = $segundos_diferencia / (60 * 60 * 24);

	//obtengo el valor absoulto de los días (quito el posible signo negativo)
	$dias = abs($dias);

	//quito los decimales a los días de diferencia
	$dias = floor($dias);

	//echo $dias_diferencia; 

	/*
	$fecha_inicio=explode("-",$fecha1);
	$fecha_fin=explode("-",$fecha2);
	$dias=0;
	for($i=gregoriantojd( $fecha_inicio[1],substr($fecha_inicio[2],0,2),$fecha_inicio[0]); $i<=gregoriantojd($fecha_fin[1],substr($fecha_fin[2],0,2),$fecha_fin[0]);$i++)
	{
		$dias++;
	}
	*/
	//$dias=$dia2-$dia1;
	if($mes1>$mes2)
	{
		$mes2+=12;
		$ano2-=1;
	}
	$meses=$mes2-$mes1;
	$anios=$ano2-$ano1;
	
	switch($tipo)
	{
		case "A":
			return $anios;
			break;
		case "M":
			return $meses;
			break;
		case "D":
			return $dias;
			break;
	}
}



if(isset($_POST['ano']))
{
	$conexion=conexion();
	$anio= $_POST['ano'] ;

	$consulta = "SELECT * FROM nomtipos_nomina WHERE codtip=".$_SESSION['codigo_nomina']."";
	$resultado1 = query($consulta,$conexion);
	$fetch1 = fetch_array($resultado1);


	if(isset($_POST['cedula']))
	{
		$consulta1 = "SELECT * FROM nompersonal WHERE tipnom='".$_SESSION['codigo_nomina']."' AND estado<>'Egresado' AND cedula=$_POST[cedula]";
		$resultado = query($consulta1,$conexion);
		$consulta="DELETE FROM nom_progvacaciones WHERE ceduda=$_POST[cedula] AND periodo='$anio' AND estado='Pendiente' AND tipnom=".$_SESSION['codigo_nomina']." ";
		$resultado3=query($consulta,$conexion);
	}
	else	
	{
		$consulta1 = "SELECT * FROM nompersonal WHERE tipnom='".$_SESSION['codigo_nomina']."' AND estado<>'Egresado'";
		$resultado = query($consulta1,$conexion);
		$consulta="DELETE FROM nom_progvacaciones WHERE periodo='$anio' AND estado='Pendiente' AND tipnom=".$_SESSION['codigo_nomina']." ";
		$resultado3=query($consulta,$conexion);
	}
	
	
	

	while($fetch = fetch_array($resultado))
	{
		$fechaing3=$fetch['fecing'];
		$fec33 = explode("-",$fetch['fecing']);
		$fechahoy=$_POST['ano']."-".$fec33[1]."-".$fec33[2];
		if($fetch1['fecha']!='')
		{
			if($fetch1['fecha']>=$fetch['fecing'])
				$fetch['fecing']=$fetch1['fecha'];
		}
		$antiguedad =antiguedad($fetch['fecing'],$fechahoy,"D");
		$antmes=antiguedad($fetch['fecing'],$fechahoy,"M");
		//echo "<br>";
		
		
		
		if(($antiguedad>=$fetch1['diasantiguedad'])&&($antiguedad<($fetch1['diasantiguedad']*2)))
		{
			if(($fetch['tipemp']=="Fijo")||($fetch['tipemp']=="Contratado"))
			{
				$diasadic=$fetch1['diasincremdis'];
				
				if($fetch1['quinquenio']==1)
				{
					if($_SESSION['nomina']==3)
						$a =$antiguedad/365;
					else
						$a =$antiguedad/360;
					$antig_anos=(int) $a;
					$antig_anos=$antig_anos+$fetch['antiguedadap'];
					if(($antig_anos>=1)&&($antig_anos<=5))
						$dias_incremento=0;
					elseif(($antig_anos>=6)&&($antig_anos<=10))
						$dias_incremento=$diasadic;
					elseif(($antig_anos>=11)&&($antig_anos<=15))
						$dias_incremento=$diasadic*2;
					elseif($antig_anos>=16)
						$dias_incremento=($diasadic*3)+1;
				}
				else
				{
					$dias_incremento=0;
				}
				if($fetch1['tipodisfrute']=="Co")
				{
					$fecha = explode("-",$fechaing3);
					//echo $fetch['fecing'];
					//echo "<br>";	
					$fecha[0]=$anio;
					if(($fecha[1]==2)&&($fecha[2]==29))
					{
						$fecha[2]=28;
					}
					$ano=$ano0=$fecha[0];
					$mes=$mes0=$fecha[1];
					$dia=$dia0=$diainivac=$fecha[2];
					$fechainivac=$ano."-".$mes."-".$dia;
					$i=0;
					//echo $ano."-".$mes."-".$dia;
					$iniciomes=$ano."-".$mes."-01";	
					$diasvac = $fetch1['diasdisfrute'];
					$numdiasmes = date("t",strtotime($iniciomes));
					//echo "<br>";
					while($i<$diasvac)
					{
						if($numdiasmes==$diainivac)
						{
							$diainivac=1;
							$diainivac="0".$diainivac;
							$i=$i+1;
							if($mes==12)
							{
								$mes=1;
								$ano=$ano+1;
								$iniciomes=$ano."-".$mes."-01";	
								$numdiasmes = date("t",strtotime($iniciomes));
							}
							else
							{
								$mes=$mes+1;
								if($mes<=9)
									$mes="0".$mes;
								$iniciomes=$ano."-".$mes."-01";	
								$numdiasmes = date("t",strtotime($iniciomes));
							}
						}
						else
						{
							
							$diainivac=$diainivac+1;
							if($diainivac<=9)
								$diainivac="0".$diainivac;
							$i=$i+1;
						}
						$fechaconsulta=$ano."-".$mes."-".$diainivac;
						$consulta="SELECT dia_fiesta FROM nomcalendarios_tiposnomina WHERE cod_tiponomina='".$_SESSION['codigo_nomina']."' AND fecha='".$fechaconsulta."'";
						$resultado2=query($consulta,$conexion);
						$fetch2=fetch_array($resultado2);
						//echo $fetch2['dia_fiesta'];
						if($fetch2['dia_fiesta']==3)
							$i=$i-1;
					}
					//$fechaconsulta; VARIABLE QUE CONTIENE LA FECHA DE REGRESO DE VACACIONES
					//echo "<br>";
					//echo "<br>";
					$consulta="SELECT ceduda FROM nom_progvacaciones WHERE periodo=".$anio." AND ficha=".$fetch['ficha']." AND tipooper='DV' AND  tipnom=".$_SESSION['codigo_nomina']." ";
					$resultadover1=query($consulta,$conexion);
					if(num_rows($resultadover1)==0)
					{
					$consulta="INSERT INTO nom_progvacaciones SET periodo=".$anio.", ficha=".$fetch['ficha'].", ceduda=".$fetch['cedula'].", ddisfrute=".$diasvac.", dpago=".$fetch1['diasbonvac'].", fechareivac='', fecha_venc='".$fechainivac."', fechavac='', fechaopr='".date("Y-m-d")."', estado='Pendiente', tipooper='DV', desoper='Dias Vacaciones', tipnom=".$_SESSION['codigo_nomina']." ";
					$resultado3=query($consulta,$conexion);
					}

					$consulta="SELECT ceduda FROM nom_progvacaciones WHERE periodo=".$anio." AND ficha=".$fetch['ficha']." AND tipooper='DA' AND  tipnom=".$_SESSION['codigo_nomina']." ";
					$resultadover2=query($consulta,$conexion);
					if(num_rows($resultadover2)==0)
					{
					$consulta="INSERT INTO nom_progvacaciones SET periodo=".$anio.", ficha=".$fetch['ficha'].", ceduda=".$fetch['cedula'].", ddisfrute=".$dias_incremento.", fechaopr='".date("Y-m-d")."', estado='Pendiente', tipooper='DA', desoper='Dias Vacaciones Adicionales', tipnom=".$_SESSION['codigo_nomina']." ";
					$resultado4=query($consulta,$conexion);
					}
					

					$consulta="SELECT ceduda FROM nom_progvacaciones WHERE periodo=".$anio." AND ficha=".$fetch['ficha']." AND tipooper='DB' AND  tipnom=".$_SESSION['codigo_nomina']." ";
					$resultadover3=query($consulta,$conexion);
					if(num_rows($resultadover3)==0)
					{
						$dbono=$fetch1['diasbonvac'];
						$consulta="SELECT SUM(valor) AS valor FROM nomcampos_adic_personal WHERE (id=6 OR id=7) AND ficha=".$fetch['ficha']." AND tiponom=".$_SESSION['codigo_nomina']."";
						$resultado9=query($consulta,$conexion);
						$fetch4=fetch_array($resultado9);
						$suel=$fetch['suesal']/30;
						$total=(($fetch4['valor']/30)+$suel)*$dbono;
	
						$consulta="INSERT INTO nom_progvacaciones SET periodo=".$anio.", ficha=".$fetch['ficha'].", ceduda=".$fetch['cedula'].",dpago=$total,  dpagob=$fetch1[diasbonvac], fechaopr='".date("Y-m-d")."', estado='Pendiente', tipooper='DB', desoper='Dias Bono', tipnom=".$_SESSION['codigo_nomina']." ";
						$resultado5=query($consulta,$conexion);	
					}
					
					$consulta="SELECT ceduda FROM nom_progvacaciones WHERE periodo=".$anio." AND ficha=".$fetch['ficha']." AND tipooper='DI' AND  tipnom=".$_SESSION['codigo_nomina']." ";
					$resultadover4=query($consulta,$conexion);
					if(num_rows($resultadover4)==0)
					{
					$consulta="INSERT INTO nom_progvacaciones SET periodo=".$anio.", ficha=".$fetch['ficha'].", ceduda=".$fetch['cedula'].", dpagob=0, fechaopr='".date("Y-m-d")."', estado='Pendiente', tipooper='DI', desoper='Dias Incremento Bono', tipnom=".$_SESSION['codigo_nomina']." ";
					$resultado7=query($consulta,$conexion);	
					}
					
				
					$consulta="UPDATE nompersonal SET periodo=".$anio.", fechareivac='".$fechaconsulta."', fechavac='".$fechainivac."' WHERE ficha=".$fetch['ficha']." AND tipnom=".$_SESSION['codigo_nomina']." ";
					$resultado6=query($consulta,$conexion);
				}
				elseif($fetch1['tipodisfrute']=="Ha")
				{
					$fecha = explode("-",$fechaing3);
					//echo $fetch['fecing'];
					//echo "<br>";	
					$fecha[0]=$anio;
					if(($fecha[1]==2)&&($fecha[2]==29))
					{
						$fecha[2]=28;
					}
					$ano=$ano0=$fecha[0];
					$mes=$mes0=$fecha[1];
					$dia=$dia0=$diainivac=$fecha[2];
					$fechainivac=$ano."-".$mes."-".$dia;
					$i=0;
					//echo $ano."-".$mes."-".$dia;
					$iniciomes=$ano."-".$mes."-01";	
					$diasvac = $fetch1['diasdisfrute'];
					$numdiasmes = date("t",strtotime($iniciomes));
					//echo "<br>";
					while($i<$diasvac)
					{
						if($numdiasmes==$diainivac)
						{
							$diainivac=1;
							$diainivac="0".$diainivac;
							$i=$i+1;
							if($mes==12)
							{
								$mes=1;
								$ano=$ano+1;
								$iniciomes=$ano."-".$mes."-01";	
								$numdiasmes = date("t",strtotime($iniciomes));
							}
							else
							{
								$mes=$mes+1;
								if($mes<=9)
									$mes="0".$mes;
								$iniciomes=$ano."-".$mes."-01";	
								$numdiasmes = date("t",strtotime($iniciomes));
							}
						}
						else
						{
							
							$diainivac=$diainivac+1;
							if($diainivac<=9)
								$diainivac="0".$diainivac;
							$i=$i+1;
						}
						$fechaconsulta=$ano."-".$mes."-".$diainivac;
						$consulta="SELECT dia_fiesta FROM nomcalendarios_tiposnomina WHERE cod_tiponomina='".$_SESSION['codigo_nomina']."' AND fecha='".$fechaconsulta."'";
						$resultado2=query($consulta,$conexion);
						$fetch2=fetch_array($resultado2);
						//echo $fetch2['dia_fiesta'];
						if(($fetch2['dia_fiesta']==3)||($fetch2['dia_fiesta']==1))
							$i=$i-1;
					}
					//echo $fechaconsulta;
					//echo "<br>";
					//echo "<br>";
					$consulta="SELECT ceduda FROM nom_progvacaciones WHERE periodo=".$anio." AND ficha=".$fetch['ficha']." AND tipooper='DV' AND  tipnom=".$_SESSION['codigo_nomina']." ";
					$resultadover1=query($consulta,$conexion);
					if(num_rows($resultadover1)==0)
					{
					$consulta="INSERT INTO nom_progvacaciones SET periodo=".$anio.", ficha=".$fetch['ficha'].", ceduda=".$fetch['cedula'].", ddisfrute=".$diasvac.", dpago=".$fetch1['diasbonvac'].", fechareivac='', fechavac='', fecha_venc='".$fechainivac."', fechaopr='".date("Y-m-d")."', estado='Pendiente', tipooper='DV', desoper='Dias Vacaciones', tipnom=".$_SESSION['codigo_nomina']." ";
					$resultado3=query($consulta,$conexion);
					}
					
					$consulta="SELECT ceduda FROM nom_progvacaciones WHERE periodo=".$anio." AND ficha=".$fetch['ficha']." AND tipooper='DA' AND  tipnom=".$_SESSION['codigo_nomina']." ";
					$resultadover2=query($consulta,$conexion);
					if(num_rows($resultadover2)==0)
					{
					$consulta="INSERT INTO nom_progvacaciones SET periodo=".$anio.", ficha=".$fetch['ficha'].", ceduda=".$fetch['cedula'].", fechaopr='".date("Y-m-d")."', ddisfrute=".$dias_incremento.", estado='Pendiente', tipooper='DA', desoper='Dias Vacaciones Adicionales', tipnom=".$_SESSION['codigo_nomina']." ";
					$resultado4=query($consulta,$conexion);	
					}

					$consulta="SELECT ceduda FROM nom_progvacaciones WHERE periodo=".$anio." AND ficha=".$fetch['ficha']." AND tipooper='DB' AND  tipnom=".$_SESSION['codigo_nomina']." ";
					$resultadover3=query($consulta,$conexion);
					if(num_rows($resultadover3)==0)
					{
						$dbono=$fetch1['diasbonvac'];
						$consulta="SELECT SUM(valor) AS valor FROM nomcampos_adic_personal WHERE (id=6 OR id=7) AND ficha=".$fetch['ficha']." AND tiponom=".$_SESSION['codigo_nomina']."";
						$resultado9=query($consulta,$conexion);
						$fetch4=fetch_array($resultado9);
						$suel=$fetch['suesal']/30;
						$total=(($fetch4['valor']/30)+$suel)*$dbono;
					
						$consulta="INSERT INTO nom_progvacaciones SET periodo=".$anio.", ficha=".$fetch['ficha'].", ceduda=".$fetch['cedula'].", dpagob=$fetch1[diasbonvac], fechaopr='".date("Y-m-d")."', dpago=$total, estado='Pendiente', tipooper='DB', desoper='Dias Bono', tipnom=".$_SESSION['codigo_nomina']." ";
						$resultado5=query($consulta,$conexion);	
					}
					
					$consulta="SELECT ceduda FROM nom_progvacaciones WHERE periodo=".$anio." AND ficha=".$fetch['ficha']." AND tipooper='DI' AND  tipnom=".$_SESSION['codigo_nomina']." ";
					$resultadover4=query($consulta,$conexion);
					if(num_rows($resultadover4)==0)
					{
					$consulta="INSERT INTO nom_progvacaciones SET periodo=".$anio.", ficha=".$fetch['ficha'].", ceduda=".$fetch['cedula'].", dpagob=0, fechaopr='".date("Y-m-d")."', estado='Pendiente', tipooper='DI', desoper='Dias Incremento Bono', tipnom=".$_SESSION['codigo_nomina']." ";
					$resultado7=query($consulta,$conexion);	
					}
					$consulta="UPDATE nompersonal SET periodo=".$anio.", fechareivac='".$fechaconsulta."', fechavac='".$fechainivac."' WHERE ficha=".$fetch['ficha']." AND tipnom=".$_SESSION['codigo_nomina']." ";
					$resultado6=query($consulta,$conexion);
				}
			}
		}
		elseif($antiguedad>=($fetch1['diasantiguedad']*2))
		{
			$xx=0;
			if($antmes>=1)
			{
				$xx=1;
			}
			if($_SESSION['nomina']==3)
				$a =$antiguedad/365;
			else
				$a =$antiguedad/360;
			$antig_anos=(int) $a;
			//echo $antig_anos;
			//echo "<br>";
			$diasadic=$fetch1['diasincremdis'];
			$diasadicb=$fetch1['diasincrem'];
			
			if($fetch1['quinquenio']==1)
			{
				$antig_anos=$antig_anos+$fetch['antiguedadap'];
				if(($antig_anos>=1)&&($antig_anos<=5))
					$dias_incremento=0;
				elseif(($antig_anos>=6)&&($antig_anos<=10))
					$dias_incremento=$diasadic;
				elseif(($antig_anos>=11)&&($antig_anos<=15))
					$dias_incremento=$diasadic*2;
				elseif($antig_anos>=16)
					$dias_incremento=($diasadic*3)+1;
			}
			else
			{
				if($antig_anos>=($fetch1['antigincremvac']))
				{
					$dias_incremento=(($antig_anos-$fetch1['antigincremvac'])*$diasadic);
					if($dias_incremento>=$fetch1['diasmaxincdis'])
						$dias_incremento=$fetch1['diasmaxincdis'];
				}
				else
					$dias_incremento=0;
			}
			$dias_incremento_bono=(($antig_anos-1)*$diasadicb);
			if($dias_incremento_bono>=$fetch1['diasmaxinc'])
				$dias_incremento_bono=$fetch1['diasmaxinc'];
			
			if(($fetch['tipemp']=="Fijo")||($fetch['tipemp']=="Contratado"))
			{
				if($fetch1['tipodisfrute']=="Co")
				{
					$fecha = explode("-",$fechaing3);
					//echo $fetch['fecing'];
					//echo "<br>";	
					$fecha[0]=$anio;
					if(($fecha[1]==2)&&($fecha[2]==29))
					{
						$fecha[2]=28;
					}
					$ano=$ano0=$fecha[0];
					$mes=$mes0=$fecha[1];
					$dia=$dia0=$diainivac=$fecha[2];
					$fechainivac=$ano."-".$mes."-".$dia;
					$i=0;
					//echo $ano."-".$mes."-".$dia;
					$iniciomes=$ano."-".$mes."-01";	
					$diasvac = $fetch1['diasdisfrute'];
					$diasvac1=$diasvac+$dias_incremento;
					$diasbono=$dias_incremento_bono+$fetch1['diasbonvac'];
					$numdiasmes = date("t",strtotime($iniciomes));
					//echo "<br>";
					while($i<$diasvac1)
					{
						if($numdiasmes==$diainivac)
						{
							$diainivac=1;
							$diainivac="0".$diainivac;
							$i=$i+1;
							if($mes==12)
							{
								$mes=1;
								$ano=$ano+1;
								$iniciomes=$ano."-".$mes."-01";	
								$numdiasmes = date("t",strtotime($iniciomes));
							}
							else
							{
								$mes=$mes+1;
								if($mes<=9)
									$mes="0".$mes;
								$iniciomes=$ano."-".$mes."-01";	
								$numdiasmes = date("t",strtotime($iniciomes));
							}
						}
						else
						{
							
							$diainivac=$diainivac+1;
							if($diainivac<=9)
								$diainivac="0".$diainivac;
							$i=$i+1;
						}
						$fechaconsulta=$ano."-".$mes."-".$diainivac;
						$consulta="SELECT dia_fiesta FROM nomcalendarios_tiposnomina WHERE cod_tiponomina='".$_SESSION['codigo_nomina']."' AND fecha='".$fechaconsulta."'";
						$resultado2=query($consulta,$conexion);
						$fetch2=fetch_array($resultado2);
						//echo $fetch2['dia_fiesta'];
						if($fetch2['dia_fiesta']==3)
							$i=$i-1;
					}
					//echo $fechaconsulta;
					//echo "<br>";
					//echo "<br>";

					$consulta="SELECT ceduda FROM nom_progvacaciones WHERE periodo=".$anio." AND ficha=".$fetch['ficha']." AND tipooper='DV' AND  tipnom=".$_SESSION['codigo_nomina']." ";
					$resultadover1=query($consulta,$conexion);
					if(num_rows($resultadover1)==0)
					{
					$consulta="INSERT INTO nom_progvacaciones SET periodo=".$anio.", ficha=".$fetch['ficha'].", ceduda=".$fetch['cedula'].", ddisfrute=".$diasvac.", dpago=".$diasbono.", fechareivac='', fechavac='', fecha_venc='".$fechainivac."', fechaopr='".date("Y-m-d")."', estado='Pendiente', tipooper='DV', desoper='Dias Vacaciones', tipnom=".$_SESSION['codigo_nomina']." ";
					$resultado3=query($consulta,$conexion);
					}
		
					$consulta="SELECT ceduda FROM nom_progvacaciones WHERE periodo=".$anio." AND ficha=".$fetch['ficha']." AND tipooper='DA' AND  tipnom=".$_SESSION['codigo_nomina']." ";
					$resultadover2=query($consulta,$conexion);
					if(num_rows($resultadover2)==0)
					{
						$consulta="INSERT INTO nom_progvacaciones SET periodo=".$anio.", ficha=".$fetch['ficha'].", ceduda=".$fetch['cedula'].", ddisfrute=".$dias_incremento.", fechaopr='".date("Y-m-d")."', estado='Pendiente', tipooper='DA', desoper='Dias Vacaciones Adicionales', tipnom=".$_SESSION['codigo_nomina']." ";
						$resultado4=query($consulta,$conexion);	
					}

					$consulta="SELECT ceduda FROM nom_progvacaciones WHERE periodo=".$anio." AND ficha=".$fetch['ficha']." AND tipooper='DB' AND  tipnom=".$_SESSION['codigo_nomina']." ";
					$resultadover3=query($consulta,$conexion);
					if(num_rows($resultadover3)==0)
					{
						$dbono=$fetch1['diasbonvac']+$dias_incremento_bono;
						$consulta="SELECT SUM(valor) AS valor FROM nomcampos_adic_personal WHERE (id=6 OR id=7) AND ficha=".$fetch['ficha']." AND tiponom=".$_SESSION['codigo_nomina']."";
						$resultado9=query($consulta,$conexion);
						$fetch4=fetch_array($resultado9);
						$suel=$fetch['suesal']/30;
						$total=(($fetch4['valor']/30)+$suel)*$dbono;
						
						$consulta="INSERT INTO nom_progvacaciones SET periodo=".$anio.", ficha=".$fetch['ficha'].", ceduda=".$fetch['cedula'].", dpago=$total,  dpagob=".$fetch1['diasbonvac'].", fechaopr='".date("Y-m-d")."', estado='Pendiente', tipooper='DB', desoper='Dias Bono', tipnom=".$_SESSION['codigo_nomina']." ";
						$resultado5=query($consulta,$conexion);	
					}

					$consulta="SELECT ceduda FROM nom_progvacaciones WHERE periodo=".$anio." AND ficha=".$fetch['ficha']." AND tipooper='DI' AND  tipnom=".$_SESSION['codigo_nomina']." ";
					$resultadover4=query($consulta,$conexion);
					if(num_rows($resultadover4)==0)
					{
					$consulta="INSERT INTO nom_progvacaciones SET periodo=".$anio.", ficha=".$fetch['ficha'].", ceduda=".$fetch['cedula'].", dpagob=".$dias_incremento_bono.", fechaopr='".date("Y-m-d")."', estado='Pendiente', tipooper='DI', desoper='Dias Incremento Bono', tipnom=".$_SESSION['codigo_nomina']." ";
					$resultado7=query($consulta,$conexion);
					}
				
					$consulta="UPDATE nompersonal SET periodo=".$anio.", fechareivac='".$fechaconsulta."', fechavac='".$fechainivac."' WHERE ficha=".$fetch['ficha']." AND tipnom=".$_SESSION['codigo_nomina']." ";
					$resultado6=query($consulta,$conexion);
				}
				elseif($fetch1['tipodisfrute']=="Ha")
				{
					$fecha = explode("-",$fechaing3);
					//echo $fetch['fecing'];
					//echo "<br>";	
					$fecha[0]=$anio;
					if(($fecha[1]==2)&&($fecha[2]==29))
					{
						$fecha[2]=28;
					}
					$ano=$ano0=$fecha[0];
					$mes=$mes0=$fecha[1];
					$dia=$dia0=$diainivac=$fecha[2];
					$fechainivac=$ano."-".$mes."-".$dia;
					$i=0;
					//echo $ano."-".$mes."-".$dia;
					$iniciomes=$ano."-".$mes."-01";	
					$diasvac = $fetch1['diasdisfrute'];
					$diasvac1=$diasvac+$dias_incremento;
					$diasbono=$dias_incremento_bono+$fetch1['diasbonvac'];
					$numdiasmes = date("t",strtotime($iniciomes));
					//echo "<br>";
					while($i<$diasvac1)
					{
						if($numdiasmes==$diainivac)
						{
							$diainivac=1;
							$diainivac="0".$diainivac;
							$i=$i+1;
							if($mes==12)
							{
								$mes=1;
								$ano=$ano+1;
								$iniciomes=$ano."-".$mes."-01";	
								$numdiasmes = date("t",strtotime($iniciomes));
							}
							else
							{
								$mes=$mes+1;
								if($mes<=9)
									$mes="0".$mes;
								$iniciomes=$ano."-".$mes."-01";	
								$numdiasmes = date("t",strtotime($iniciomes));
							}
						}
						else
						{
							
							$diainivac=$diainivac+1;
							if($diainivac<=9)
								$diainivac="0".$diainivac;
							$i=$i+1;
						}
						$fechaconsulta=$ano."-".$mes."-".$diainivac;
						$consulta="SELECT dia_fiesta FROM nomcalendarios_tiposnomina WHERE cod_tiponomina='".$_SESSION['codigo_nomina']."' AND fecha='".$fechaconsulta."'";
						$resultado2=query($consulta,$conexion);
						$fetch2=fetch_array($resultado2);
						//echo $fetch2['dia_fiesta'];
						if(($fetch2['dia_fiesta']==3)||($fetch2['dia_fiesta']==1))
							$i=$i-1;
					}
					//echo $fechaconsulta;
					//echo "<br>";
					//echo "<br>";
					$consulta="SELECT ceduda FROM nom_progvacaciones WHERE periodo=".$anio." AND ficha=".$fetch['ficha']." AND tipooper='DV' AND  tipnom=".$_SESSION['codigo_nomina']." ";
					$resultadover1=query($consulta,$conexion);
					if(num_rows($resultadover1)==0)
					{
					$consulta="INSERT INTO nom_progvacaciones SET periodo=".$anio.", ficha=".$fetch['ficha'].", ceduda=".$fetch['cedula'].", ddisfrute=".$diasvac.", dpago=".$diasbono.", fechareivac='', fechavac='', fecha_venc='".$fechainivac."', fechaopr='".date("Y-m-d")."', estado='Pendiente', tipooper='DV', desoper='Dias Vacaciones', tipnom=".$_SESSION['codigo_nomina']." ";
					$resultado3=query($consulta,$conexion);
					}
		
					$consulta="SELECT ceduda FROM nom_progvacaciones WHERE periodo=".$anio." AND ficha=".$fetch['ficha']." AND tipooper='DA' AND  tipnom=".$_SESSION['codigo_nomina']." ";
					$resultadover2=query($consulta,$conexion);
					if(num_rows($resultadover2)==0)
					{
					$consulta="INSERT INTO nom_progvacaciones SET periodo=".$anio.", ficha=".$fetch['ficha'].", ceduda=".$fetch['cedula'].", ddisfrute=".$dias_incremento.", fechaopr='".date("Y-m-d")."', estado='Pendiente', tipooper='DA', desoper='Dias Vacaciones Adicionales', tipnom=".$_SESSION['codigo_nomina']." ";
					$resultado4=query($consulta,$conexion);	
					}

					$consulta="SELECT ceduda FROM nom_progvacaciones WHERE periodo=".$anio." AND ficha=".$fetch['ficha']." AND tipooper='DB' AND  tipnom=".$_SESSION['codigo_nomina']." ";
					$resultadover3=query($consulta,$conexion);
					if(num_rows($resultadover3)==0)
					{
						$dbono=$fetch1['diasbonvac']+$dias_incremento_bono;
						$consulta="SELECT SUM(valor) AS valor FROM nomcampos_adic_personal WHERE (id=6 OR id=7) AND ficha=".$fetch['ficha']." AND tiponom=".$_SESSION['codigo_nomina']."";
						$resultado9=query($consulta,$conexion);
						$fetch4=fetch_array($resultado9);
						$suel=$fetch['suesal']/30;
						$total=(($fetch4['valor']/30)+$suel)*$dbono;
					
						$consulta="INSERT INTO nom_progvacaciones SET periodo=".$anio.", ficha=".$fetch['ficha'].", ceduda=".$fetch['cedula'].", dpago=$total,  dpagob=".$fetch1['diasbonvac'].", fechaopr='".date("Y-m-d")."', estado='Pendiente', tipooper='DB', desoper='Dias Bono', tipnom=".$_SESSION['codigo_nomina']." ";
						$resultado5=query($consulta,$conexion);	
					}

					$consulta="SELECT ceduda FROM nom_progvacaciones WHERE periodo=".$anio." AND ficha=".$fetch['ficha']." AND tipooper='DI' AND  tipnom=".$_SESSION['codigo_nomina']." ";
					$resultadover4=query($consulta,$conexion);
					if(num_rows($resultadover4)==0)
					{
					$consulta="INSERT INTO nom_progvacaciones SET periodo=".$anio.", ficha=".$fetch['ficha'].", ceduda=".$fetch['cedula'].", dpagob=".$dias_incremento_bono.", fechaopr='".date("Y-m-d")."', estado='Pendiente', tipooper='DI', desoper='Dias Incremento Bono', tipnom=".$_SESSION['codigo_nomina']." ";
					$resultado7=query($consulta,$conexion);	
					}
					$consulta="UPDATE nompersonal SET periodo=".$anio.", fechareivac='".$fechaconsulta."', fechavac='".$fechainivac."' WHERE ficha=".$fetch['ficha']." AND tipnom=".$_SESSION['codigo_nomina']." ";
					$resultado6=query($consulta,$conexion);
				}
			}	
		}	
		
	}
	?>
	<script type="text/javascript">
//	function openAlert() 
//	{
  // 		Dialog.alert("Vacaciones generada exitosamente", {windowParameters: {top: 50, width:250, className: "alphacube", okLabel: "Yes"}})

//	}

	alert("VACACIONES GENERADAS CON EXITOSAMENTE!!!")
	parent.cont.location.href="submenu_vacaciones.php"
//	openAlert() 
	</script>
	<?php	
}

?>
<form id="form1" name="form1" method="post" action="">
<table width="807" height="150" border="0" class="row-br">
<tr>
<td height="31" class="tb-tit">
<table width="789" border="0">
<tr>
<td width="762"><div align="left"><font color="#000066"><strong>Generar programa anual de vacaciones</strong></font></div></td>
<td width="17"><div align="center"><?php btn('back','submenu_vacaciones.php')  ?></div></td>
</tr>
</table>
</td>
</tr>
<tr>
<td width="489" height="150" class="ewTableAltRow">
<table width="520" border="0">
<?
if($_GET['opcion']!=1)
{
?>
	<TR>
	<TD colspan="2" width="200"><strong>Nota: este proceso genera el programa anual de vacaciones del personal de la nomina actual.</strong></TD>
<?
}
?>

<TR>
<TD class="tb-fila" width="200">Seleccione a&#241;o a procesar: </TD>
<TD>
<INPUT type="text" name="ano" id="ano" size="15" maxlength="12" value="<? echo date("Y")?>">
</TD>
</TR>
<?
if($_GET['opcion']==1)
{
?>
	<TR>
	<TD class="tb-fila" width="200">C&eacute;dula del trabajador: </TD>
	<TD>
	<INPUT type="text" name="cedula" id="cedula" size="15" maxlength="12">
	</TD>
	</TR>
<?
}
?>
</table>
</td>
</tr>
<tr><TD>
<table width="100%" border="0">
<tr>
<td width="466">
<div align="center">
<?php 
btn('ok','enviar();',2);
?>
</div></td>
</tr>
</table>
</TD></tr>
</table>



</form>

</body>
</html>