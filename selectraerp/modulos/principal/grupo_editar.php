<?php
include("../../libs/php/clases/departamento.php");
$departamento = new Departamento();
if(isset($_POST["aceptar"])){
$instruccion = "
update grupo set descripcion = '".$_POST["descripcion_grupo"]."'
 where cod_grupo = ".$_POST["cod_grupo"];
$departamento->Execute2($instruccion);
header("Location: ?opt_menu=".$_POST["opt_menu"]."&opt_seccion=".$_POST["opt_seccion"]);
}


if(isset($_GET["cod"])){
$campos = $departamento->ObtenerFilasBySqlSelect("select * from grupo where cod_grupo = ".$_GET["cod"]);
$smarty->assign("datos_grupo",$campos);
}


?>