<?php

require_once 'lib/common.php';
//include ("header.php");
$conexion=conexion();
//echo $conexion;



	
	
	$consulta = "SELECT CUENTAREAL,CUENTAGASTOS,CUENTAACUM FROM activosfijos_tipos WHERE CODIGOTA = '".$_GET['tipo']."' ";
	$resultado333 = query($consulta,$conexion);
	$fetch44 = fetch_array($resultado333);

	$consulta = "SELECT Cuenta,Descrip FROM cwconcue WHERE Cuenta = '".$fetch44['CUENTAREAL']."' ";
	$resultado55 = query($consulta,$conexion);
	$fetch55 = fetch_array($resultado55);
	
	$consulta = "SELECT Cuenta,Descrip FROM cwconcue WHERE Cuenta = '".$fetch44['CUENTAGASTOS']."' ";
	$resultado66 = query($consulta,$conexion);
	$fetch66 = fetch_array($resultado66);
	
	$consulta = "SELECT Cuenta,Descrip FROM cwconcue WHERE Cuenta = '".$fetch44['CUENTAACUM']."' ";
	$resultado77 = query($consulta,$conexion);
	$fetch77 = fetch_array($resultado77);
	
	$consulta = "select Cuenta, Descrip from cwconcue where Tipo='P'";
	$resultado_cuenta=query($consulta,$conexion);
	$resultado_cuenta1=query($consulta,$conexion);
	$resultado_cuenta2=query($consulta,$conexion);

?>

	
	
	
	<TBODY id="cuentas">
	
	<TR><td class=tb-head width="263" >Cuenta Real del Activo</td>
	<td width="300" colspan="3"><SELECT name="CTAREAL" id="CTAREAL">
	<option value="<? echo $fetch44['CUENTAREAL']?>"><? echo $fetch55['Cuenta'];echo $fetch55['Descrip']?></option>
    <?
	while($fetch33 = fetch_array($resultado_cuenta))
	{
		?><option value="<? echo $fetch33[Cuenta]; ?>"><? echo $fetch33['Cuenta']; echo $fetch33[Descrip]; ?></option>
	<? 
	}
	
	?>
	
	</SELECT>
	</td>
	</tr>	
	
	
	<TR><td class=tb-head >Cuenta Gastos de Depreciaci&oacute;n</td>
	<td width="300" colspan="3"><SELECT name="CTAGASTOS" id="CTAGASTOS">";
	<option value="<? echo $fetch44['CUENTAGASTOS']?>"><? echo $fetch66['Cuenta']; echo $fetch66['Descrip']?></option>
    <?
	while($fetch33 = fetch_array($resultado_cuenta1))
	{
		?><option value="<? echo $fetch33[Cuenta]; ?>"><? echo $fetch33['Cuenta'];echo $fetch33[Descrip]; ?></option>
	<? 
	}
	
	?>
	
	</SELECT>
	</td>
	</tr>	
	
	
	<TR><td class=tb-head >Cuenta Depreciaci&oacute;n Acumulada</td>
	<td width="300" colspan="3"><SELECT name="CTADPRACUM" id="CTADPRACUM">";
	<option value="<? echo $fetch44['CUENTAACUM']?>"><? echo $fetch77['Cuenta'];echo $fetch77['Descrip']?></option>
    <?
	while($fetch33 = fetch_array($resultado_cuenta2))
	{
		?><option value="<? echo $fetch33[Cuenta]; ?>"><? echo $fetch33['Cuenta']; echo $fetch33[Descrip]; ?></option>
	<? 
	}
	
	?>
	
	</SELECT>
	</td>
	</tr>
	</tbody>
	
	
