<?php 
session_start();
ob_start();
//$termino=$_SESSION['termino'];
include ("../header.php");
include("../lib/common.php");
include("func_bd.php");

$conexion=conexion();
$consulta="SELECT tipo_ingreso FROM nomtipos_nomina WHERE codtip=$_SESSION[codigo_nomina]";
$resultado_tiping=query($consulta,$conexion);
$fetch=fetch_array($resultado_tiping);

if($fetch['tipo_ingreso']=='S')
	$fetch['tipo_ingreso']=1;

function calcular_semana($mes,$anio)
{
	$fecha=$anio."-".$mes."-01";
	$num_dias_mes=date("t",strtotime($fecha));
	$dia_inicio=date("w",strtotime($fecha));
	$dia_inicio+=1;
	$num_semanas=(($num_dias_mes+$dia_inicio-2)/7)+1;
	$num_semanas= intval ($num_semanas);
	return $num_semanas;	
}

?>

<?
	$ficha = $_GET['ficha'];
	$concepto = $_GET['concepto'];
	$anio =$_GET['anio'];
	$opcion =$_GET['opcion'];
	switch ($opcion)
	{
		case '1':
			$semana=1;
			$semana2=0;
			$mes1=$mes2=$mes3=$mes4=$mes5=$mes6=$mes7=$mes8=$mes9=$mes10=$mes11=$mes12="0.00";
			for($i=1;$i<=12;$i++)
			{
				if($fetch['tipo_ingreso']==1)
				{
					$semana2+=calcular_semana($i,$anio);
					$consulta_fec_ini="SELECT finicio FROM nomperiodos WHERE codfre=$fetch[tipo_ingreso] AND anio=$anio AND nper=$semana";
					$resultado_fec_ini=query($consulta_fec_ini,$conexion);
					$fetch_fec_ini=fetch_array($resultado_fec_ini);
				
					$consulta_fec_fin="SELECT ffin FROM nomperiodos WHERE codfre=$fetch[tipo_ingreso] AND anio=$anio AND nper=$semana2";
					$resultado_fec_fin=query($consulta_fec_fin,$conexion);
					$fetch_fec_fin=fetch_array($resultado_fec_fin);
					$semana=$semana2+1;

					$consulta_acum="SELECT SUM(montototal) AS monto FROM nomacumulados_det WHERE anioa=$anio AND ficha=$ficha AND cod_tac='CON' AND codcon=$concepto AND fecha BETWEEN '".$fetch_fec_ini['finicio']."' AND '".$fetch_fec_fin['ffin']."'";
					$resultado_acum=query($consulta_acum,$conexion);
					$fetch_acum=fetch_array($resultado_acum);
				}
				elseif(($fetch['tipo_ingreso']=='Q')||($fetch['tipo_ingreso']=='M'))
				{
					$consulta_codnom="SELECT SUM(montototal) AS monto FROM nomacumulados_det WHERE tipnom=$_SESSION[codigo_nomina] AND mesa=$i AND ficha=$ficha AND anioa=$anio AND cod_tac='CON' AND codcon=$concepto";
					$resultado_codnom=query($consulta_codnom,$conexion);
					$fetch_acum=fetch_array($resultado_codnom);
				}
				if(($i==1)&&($fetch_acum['monto']))
					$mes1=$fetch_acum['monto'];
				elseif(($i==2)&&($fetch_acum['monto']))
					$mes2=$fetch_acum['monto'];
				elseif(($i==3)&&($fetch_acum['monto']))
					$mes3=$fetch_acum['monto'];
				elseif(($i==4)&&($fetch_acum['monto']))
					$mes4=$fetch_acum['monto'];
				elseif(($i==5)&&($fetch_acum['monto']))
					$mes5=$fetch_acum['monto'];
				elseif(($i==6)&&($fetch_acum['monto']))
					$mes6=$fetch_acum['monto'];
				elseif(($i==7)&&($fetch_acum['monto']))
					$mes7=$fetch_acum['monto'];
				elseif(($i==8)&&($fetch_acum['monto']))
					$mes8=$fetch_acum['monto'];
				elseif(($i==9)&&($fetch_acum['monto']))
					$mes9=$fetch_acum['monto'];
				elseif(($i==10)&&($fetch_acum['monto']))
					$mes10=$fetch_acum['monto'];
				elseif(($i==11)&&($fetch_acum['monto']))
					$mes11=$fetch_acum['monto'];
				elseif(($i==12)&&($fetch_acum['monto']))
					$mes12=$fetch_acum['monto'];
				$total+=$fetch_acum['monto'];
			}
			?>
			<div id="acum">
			<table align="center"  border="0" width="800">
			<tr><TD height="10"></TD></tr>
			<TR>			
			<TD height="40">ENERO: <? echo $mes1;?></TD><TD>FEBRERO: <?echo $mes2;?></TD>
			</TR>
			<TR>
			<TD height="40">MARZO: <? echo $mes3?></TD><TD>ABRIL: <?echo $mes4?></TD>
			</TR>
			<TR>
			<TD height="40">MAYO: <? echo $mes5?></TD><TD>JUNIO: <?echo $mes6?></TD>
			</TR>
			<TR>
			<TD height="40">JULIO: <? echo $mes7?></TD><TD>AGOSTO: <?echo $mes8?></TD>
			</TR>
			<TR>
			<TD height="40">SEPTIEMBRE: <? echo $mes9?></TD><TD>OCTUBRE: <?echo $mes10?></TD>
			</TR>
			<TR>
			<TD height="40">NOVIEMBRE: <? echo $mes11?></TD><TD>DICIEMBRE: <?echo $mes12?></TD>
			</TR>
			<tr><TD height="40" colspan="2"><strong>TOTAL: <? echo $total;?></strong></TD></tr>
			</table>
			</div>
			<?
			break;
		
		case '2':
			$semana=1;
			$semana2=0;
			$mes1=$mes2=$mes3=$mes4=$mes5=$mes6=$mes7=$mes8=$mes9=$mes10=$mes11=$mes12="0.00";
			?>
			<div id="acum">
			<table align="center" width="500" border="0" >
			<?
			for($i=1;$i<=12;$i++)
			{
				$fecha2=$anio."-".$i."-01";
				$num_dias_mes2=date("t",strtotime($fecha2));
				$fecha3=$num_dias_mes2."/".$i."/".$anio;
				if($fetch['tipo_ingreso']==1)
				{
					$semana2+=calcular_semana($i,$anio);
					$consulta_fec_ini="SELECT finicio FROM nomperiodos WHERE codfre=$fetch[tipo_ingreso] AND anio=$anio AND nper=$semana";
					$resultado_fec_ini=query($consulta_fec_ini,$conexion);
					$fetch_fec_ini=fetch_array($resultado_fec_ini);
				
					$consulta_fec_fin="SELECT ffin FROM nomperiodos WHERE codfre=$fetch[tipo_ingreso] AND anio=$anio AND nper=$semana2";
					$resultado_fec_fin=query($consulta_fec_fin,$conexion);
					$fetch_fec_fin=fetch_array($resultado_fec_fin);
					$semana=$semana2+1;
					
					$consulta_con="SELECT con.codcon AS codcon, conc.descrip AS descrip FROM nomconceptos_tiponomina con LEFT JOIN nomconceptos conc on (con.codcon=conc.codcon) WHERE con.codtip=3";
					$resultado_con=query($consulta_con,$conexion);

					
					while($fetch_con=fetch_array($resultado_con))
					{	
						$consulta_acum="SELECT SUM(montototal) AS monto FROM nomacumulados_det WHERE anioa=$anio AND ficha=$ficha AND cod_tac='$concepto' AND codcon=$fetch_con[codcon] AND fecha BETWEEN '".$fetch_fec_ini['finicio']."' AND '".$fetch_fec_fin['ffin']."'";
						$resultado_acum=query($consulta_acum,$conexion);
						$fetch_acum=fetch_array($resultado_acum);
						if($fetch_acum['monto']!='')
						{
						?>
						<TR>
						<TD><? echo $fecha3?></TD> <TD><? echo $fetch_con['descrip']?></TD>
						<TD align="right"><? echo $fetch_acum['monto']?></TD>
						</TR>
						<?
						}
						$total+=$fetch_acum['monto'];
					}
				}
				elseif(($fetch['tipo_ingreso']=='Q')||($fetch['tipo_ingreso']=='M'))
				{
					$consulta_con="SELECT con.codcon AS codcon, conc.descrip AS descrip FROM nomconceptos_tiponomina con LEFT JOIN nomconceptos conc on (con.codcon=conc.codcon) WHERE con.codtip=$_SESSION[codigo_nomina]";
					$resultado_con=query($consulta_con,$conexion);
					
					while($fetch_con=fetch_array($resultado_con))
					{	
						$consulta_codnom="SELECT SUM(montototal) AS monto FROM nomacumulados_det WHERE tipnom=$_SESSION[codigo_nomina] AND mesa=$i AND ficha=$ficha AND anioa=$anio AND cod_tac='$concepto' AND codcon=$fetch_con[codcon]";
						$resultado_codnom=query($consulta_codnom,$conexion);
						$fetch_acum=fetch_array($resultado_codnom);
						if($fetch_acum['monto']!='')
						{
						?>
						<TR>
						<TD><? echo $fecha3?></TD> <TD><? echo $fetch_con['descrip']?></TD>
						<TD align="right"><? echo $fetch_acum['monto']?></TD>
						</TR>
						<?
						}
						$total+=$fetch_acum['monto'];
					}
				}
			}
			?>
			<D><TD></TD><TD align="right"><strong>Total: </strong></TD><TD align="right"><strong><?echo $total;?></strong></TD></tr>
			</table>
			</div>
			<?
			
		break;
	}
?>