<?php
include("../../libs/php/clases/clientes.php");
include("../../libs/php/clases/correlativos.php");
include("../../../menu_sistemas/lib/common.php") ;
$clientes = new Clientes();

if(isset($_POST["aceptar"])){ // si el usuario iso post


$correlativos = new Correlativos();
$nro_correlativo = $correlativos->getUltimoCorrelativo("cod_cliente", 1, "si");


$clientes->BeginTrans();

$instruccion = "INSERT INTO clientes (
`cod_cliente` ,
`nombre` ,
`fnacimiento` ,
`representante` ,
`direccion` ,
`altena` ,
`alterna2` ,
`telefonos` ,
`fax` ,
`email` ,
`permitecredito` ,
`limite` ,
`dias` ,
`tolerancia` ,
`porc_parcial` ,
`porc_descuento_global` ,
`calc_reten_impuesto_islr` ,
`calc_reten_impuesto_iva` ,
`calc_reten_impuesto_1x1000`,
`cod_vendedor` ,
`cod_zona` ,
`rif` ,
`nit` ,
`contribuyente_especial` ,
`retenido_por_cliente` ,
`cod_tipo_cliente` ,
`cod_entidad` ,
`cod_tipo_precio` ,
`clase`,
`estado`,
`cuenta_contable`
)
VALUES (
'".$nro_correlativo."' , '".
    strtoupper($_POST["nombre"])."', '".$_POST["fnacimiento"]."',
'".strtoupper($_POST["representante"])."', '".strtoupper($_POST["direccion"])."',
'".strtoupper($_POST["altena"])."', '".strtoupper($_POST["alterna2"])."',
'".$_POST["telefonos"]."', '".$_POST["fax"]."',
'".$_POST["email"]."', '".$_POST["permitecredito"]."', '".$_POST["limite"]."', '".$_POST["dias"]."',
'".$_POST["tolerancia"]."', '".$_POST["porc_parcial"]."', '".$_POST["porc_descuento_global"]."',
'".$_POST["calc_reten_impuesto_islr"]."',
'".$_POST["calc_reten_impuesto_iva"]."',
'".$_POST["calc_reten_impuesto_1x1000"]."',
'".$_POST["cod_vendedor"]."', '".$_POST["cod_zona"]."',
'".strtoupper($_POST["rif"])."', '".strtoupper($_POST["nit"])."', '".$_POST["contribuyente_especial"]."',
'".$_POST["retenido_por_cliente"]."', '".$_POST["cod_tipo_cliente"]."', '".$_POST["cod_entidad"]."',
'".$_POST["cod_tipo_precio"]."', '".$_POST["clase"]."',
'".$_POST["estado"]."','".$_POST["cuenta_contable"]."'
);";

$clientes->ExecuteTrans($instruccion);

$clientes->ExecuteTrans("update correlativos set contador = '".$nro_correlativo."' where campo = 'cod_cliente'");

if($clientes->errorTransaccion==1){Msg::setMessage("<span style=\"color:#62875f;\"><img src=\"../../libs/imagenes/ico_ok.gif\"> El cliente ".$_POST["nombre"]." fue creado exitosamente.<br>ID asignado: ".$nro_correlativo." .</span>");}
if($clientes->errorTransaccion==0){Msg::setMessage("<span style=\"color:red;\">Error el cliente, contacte al administrador.</span>");}
$clientes->CommitTrans($clientes->errorTransaccion);


header("Location: ?opt_menu=".$_POST["opt_menu"]."&opt_seccion=".$_POST["opt_seccion"]);
exit;
}else{

//CONSULTA DE ID FISCAL EN PARAMETROS
$valueSELECT = "";
$outputSELECT =  "";
$data_parametros  = $clientes->ObtenerFilasBySqlSelect("select * from parametros_generales");
foreach($data_parametros as $key => $item){
    $valueSELECT[] = $item["cod_empresa"];
    $outputidfiscalSELECT[] = $item["id_fiscal"];
    $outputidfiscal2SELECT[] = $item["id_fiscal2"];
}
$smarty->assign("option_values_parametros",$valueSELECT);
$smarty->assign("option_output_idfiscal",$outputidfiscalSELECT);
$smarty->assign("option_output_idfiscal2",$outputidfiscal2SELECT);



//CARGAMOS EL COMBO cod_vendedor
$valueSELECT = 		"";
$outputSELECT =  	"";
$tprecio  = $clientes->ObtenerFilasBySqlSelect("select * from vendedor");
foreach($tprecio as $key => $item){
    $valueSELECT[] = $item["cod_vendedor"];
    $outputSELECT[] = $item["nombre"];
}
$smarty->assign("option_values_vendedor",$valueSELECT);
$smarty->assign("option_output_vendedor",$outputSELECT);
$smarty->assign("option_selected","");

//CARGAMOS EL COMBO cod_zona
$valueSELECT = "";
$outputSELECT =  "";
$tprecio  = $clientes->ObtenerFilasBySqlSelect("select * from zonas");
foreach($tprecio as $key => $item){
    $valueSELECT[] = $item["cod_zona"];
    $outputSELECT[] = $item["descripcion"];
}
$smarty->assign("option_values_zona",$valueSELECT);
$smarty->assign("option_output_zona",$outputSELECT);
$smarty->assign("option_selected","");



//CARGAMOS EL COMBO COD_TIPO_CLIENTE
$valueSELECT = "";
$outputSELECT =  "";
$tcliente = $clientes->ObtenerFilasBySqlSelect("select * from tipo_cliente");
foreach($tcliente as $key => $item){
    $valueSELECT[] = $item["cod_tipo_cliente"];
    $outputSELECT[] = $item["descripcion"];
}
$smarty->assign("option_values",$valueSELECT);
$smarty->assign("option_output",$outputSELECT);
$smarty->assign("option_selected","");


//CARGAMOS EL COMBO COD_TIPO_PRECIO
$valueSELECT = "";
$outputSELECT =  "";
$tprecio  = $clientes->ObtenerFilasBySqlSelect("select * from tipo_precio");
foreach($tprecio as $key => $item){
    $valueSELECT[] = $item["cod_tipo_precio"];
    $outputSELECT[] = $item["descripcion"];
}
$smarty->assign("option_values_tipo_precio",$valueSELECT);
$smarty->assign("option_output_tipo_precio",$outputSELECT);
$smarty->assign("option_selected","");

//TIPO DE ENTIDAD
$valueSELECT = "";
$outputSELECT =  "";
$tprecio  = $clientes->ObtenerFilasBySqlSelect("select * from entidades");
foreach($tprecio as $key => $item){
    $valueSELECT[] = $item["cod_entidad"];
    $outputSELECT[] = $item["descripcion"];
}
$smarty->assign("option_values_entidad",$valueSELECT);
$smarty->assign("option_output_entidad",$outputSELECT);


// CONSULTA DE CUENTAS CONTABLES
$global=new bd(SELECTRA_CONF_PYME);
$sentencia="select * from nomempresa where bd='".$_SESSION['EmpresaFacturacion']."'";
$contabilidad = $global->query($sentencia);
$fila = $contabilidad->fetch_assoc();

$valueSELECT = "";
$outputSELECT =  "";
$contabilidad = $clientes->ObtenerFilasBySqlSelect("select * from ".$fila['bd_contabilidad'].".cwconcue where Tipo='P'");
foreach($contabilidad as $key => $cuenta){
    $valueSELECT[] = $cuenta["Cuenta"];
    $outputSELECT[] = $cuenta["Cuenta"]." - ".$cuenta["Descrip"];
}
$smarty->assign("option_values_cuenta",$valueSELECT);
$smarty->assign("option_output_cuenta",$outputSELECT);


}

?>
