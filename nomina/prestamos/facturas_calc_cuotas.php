<?php 
session_start();
ob_start();
//$termino=$_SESSION['termino'];
include ("../header.php");
include("../lib/common.php");
include("../paginas/func_bd.php");
$i=1;
$mto=$mto2=$_GET['montopre'];
$mtoc=$_GET['montocuota'];
$numc=$_GET['numcuota'];
$ficha=$_GET['ficha'];
$numpre=$_GET['numpre'];
$fecha1=$_GET['fecha1'];
?>
<div id="divcuo">
<table width="100%" border="0">
<TR class="tb-head"  style="font-weight : bold;">
<TD># Cuota</TD><TD>Vence</TD><TD>Saldo inicio</TD><TD>Amortizado</TD><TD>Cuota</TD><TD>Saldo fin</TD>
</TR>
<?
while($i<=$numc)
{
	if($i==1)
	{
		$fecha=$fecha1;
	}
	else
	{
		$cad=split("/",$fecha1);
		if($cad[0]<=15)
		{
			$fecha_lunes=$cad[2]."-".$cad[1]."-01";
			$num_dias_mes=date("t",strtotime($fecha_lunes));
			$cad[0]=$num_dias_mes;
			
			if(strlen($cad[1])==1){
				$fecha1=$cad[0]."/0".$cad[1]."/".$cad[2];
			}else{
				$fecha1=$cad[0]."/".$cad[1]."/".$cad[2];
			}
		}
		elseif($cad[0]>=15)
		{
			if($cad[1]<12)
				$cad[1]+=1;
			elseif($cad[1]==12)
			{
				$cad[1]=1;
				$cad[2]+=1;
			}
			if(strlen($cad[1])==1){
				$fecha1="15/0".$cad[1]."/".$cad[2];
			}else{
				$fecha1="15/".$cad[1]."/".$cad[2];
			}

		}
	}
	if($i==$numc)
	{
		if($mto<$mtoc)
			$mtoc=$mto;
	}
	$mto2-=$mtoc;
	
?>
<tr>
<TD><input type="text" name="numcuo<?echo $i?>" id="numcuo<?echo $i?>" value="<?echo $i?>" size="4"></TD><TD><input type="text" name="vence<?echo $i?>" id="vence<?echo $i?>" value="<?echo $fecha1?>" size="8" align="right"></TD><TD><input type="text" name="salini<?echo $i?>" id="salini<?echo $i?>" size="8" value="<?echo $mto?>"></TD><TD><input type="text" name="amort<?echo $i?>" id="amort<?echo $i?>" size="8" value="<?echo $mtoc?>"></TD><TD><input type="text" name="mtocuo<?echo $i?>" id="mtocuo<?echo $i?>" size="8" value="<?echo $mtoc?>"></TD><TD><input type="text" name="salfin<?echo $i?>" id="salfin<?echo $i?>" size="7" value="<?echo $mto2?>"></TD>
</tr>
<?
$mto-=$mtoc;
$i+=1;
}
?>
</table>
</div>