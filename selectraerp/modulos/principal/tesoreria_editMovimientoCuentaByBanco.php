<?php


$comunes = new Comunes();


if(isset($_GET["cod_cuenta"])){
    $campos = $comunes->ObtenerFilasBySqlSelect("
select
tb.cod_tesor_bandodet,
tb.cod_banco,
tb.nro_cuenta,
b.descripcion as descripcion_banco,
tb.descripcion as descripcion_cuenta
from tesor_bancodet tb
inner join banco b on b.cod_banco = tb.cod_banco
 where tb.cod_tesor_bandodet = ".$_GET["cod_cuenta"]);
$smarty->assign("datos_banco",$campos);
}




if(isset ($_POST["aceptar"])){
    $instruccion_update="update movimientos_bancarios set fecha_movimiento='".$_POST["fecha_movimiento"]."', tipo_movimiento='".$_POST["cod_tipo_movimiento"]."',
numero_movimiento='".$_POST["numero_movimiento"]."', monto='".$_POST["monto"]."', concepto='".$_POST["concepto"]."' where cod_movimiento_ban='".$_POST["cod_movimiento_ban"]."'";
    $comunes->Execute2($instruccion_update);
header("Location: ?opt_menu=".$_POST["opt_menu"]."&opt_seccion=".$_POST["opt_seccion"]."&opt_subseccion=movimientosCuentaByBanco&cod=".$_POST["codBanco"]."&cod_cuenta=".$_POST["codCuenta"]);
exit;

}
if(isset($_GET["cod_movimiento_ban"])){
$campos = $comunes->ObtenerFilasBySqlSelect("select * from movimientos_bancarios  WHERE cod_movimiento_ban = ".$_GET["cod_movimiento_ban"]);
$smarty->assign("datos_movimiento",$campos);
}

$valueSELECT = "";
$outputSELECT =  "";
$campos = $comunes->ObtenerFilasBySqlSelect("select * from tipo_movimientos_ban");
foreach($campos as $key => $item){
    $valueSELECT[] = $item["cod_tipo_movimientos_ban"];
    $outputSELECT[] = $item["descripcion"];
}
$smarty->assign("option_values_funciontipomovimiento",$valueSELECT);
$smarty->assign("option_output_funciontipomovimiento",$outputSELECT);


?>