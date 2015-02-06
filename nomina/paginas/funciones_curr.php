<?
require_once($_SERVER['DOCUMENT_ROOT'].'/pyme/general.config.inc.php');

function conexion(){
//$config=parse_ini_file("selectra.ini");
//if($config[bd]=="mysql"){
	$host=DB_HOST;
	$usuario=DB_USUARIO;
	$clave=DB_CLAVE;
	$conexion= mysql_connect($host,$usuario,$clave);
	$base= mysql_select_db(DB_SELECTRA_DEFAULT,$conexion);
	return $conexion;
//}else{
	//echo "No se ha implementado en postgres";
//}
}

function fecha_sql($value) { // fecha de DD/MM/YYYY a YYYYY/MM/DD
 return substr($value,6,4) ."-". substr($value,3,2) ."-". substr($value,0,2);
}

function fecha($value) { // fecha de YYYY/MM/DD a DD/MM/YYYY
 if ( ! empty($value) ) return substr($value,8,2) ."/". substr($value,5,2) ."/". substr($value,0,4);
}

function btn($tipo,$url,$accion=0,$caption=""){ // Accion 0=location / 1=Form url = form name / 2 JS ** 3 reset **terminar**

switch ($tipo) {;

 case "add":

	$icon = 'add';

	$name = 'Agregar';

	break;

 case "edit":

	$icon = 'edit';

	$name = 'Editar';

	break;

 case "print":

	$icon = 'ico_print';

	$name = 'Imprimir';

	break;

 case "cal_iva":

	$icon = 'edit';

	$name = 'Cambiar IVA';

	break;

 case "del":

	$icon = 'delete';

	$name = 'Borrar';

	break;

 case "save":

	$icon = 'delete';

	$name = 'Borrar';

	break;

 case "ok":

	$icon = 'ok';

	$name = 'Aceptar';

	break;

 case "cancel":

	$icon = 'cancel';

	$name = 'Cancelar';

	break;

 case "search":

	$icon = 'search';

	$name = 'Buscar';

	break;

 case "show_all":

	$icon = 'list';

	$name = 'Mostrar todo';

	break;

 case "maestro":

	$icon = 'back';

	$name = 'Volver a la pÃ¡gina maestra';

	break;



case "back":

	$icon = 'atras';

	$name = 'Regresar';

	break;

case "grabar":

	$icon = 'back';

	$name = 'Grabar';

	break;

case "enviar":

	$icon = 'ok';

	$name = 'Enviar';

	break;

case "incorporar":

	$icon = 'add';

	$name = 'Incorporacion';

	break;

case "bienes":

	$icon = 'bien';

	$name = 'Bienes';

	break;

case "generar":

	$icon = 'list';

	$name = 'Generar';

	break;
case "cerrar":
	$icon = 'Salir';
	$name = 'Cerrar';
	break;
 }

if ($caption<>"")
	{$name =$caption;}
switch ($accion) {;

 case 0:

	$js = "window.location='$url'";

	break;

 case 1:



	$js = "window.document.$url.submit();";

	break;

 case 2:

	$js = $url;

	break;

 }

echo '<table style="cursor: pointer;" class="btn_bg" onClick="javascript:'.$js.'" name="buscar" border="0" cellpadding="0" cellspacing="0">
		<tr>
		  <td style="padding: 0px;" align="right"><img src="../imagenes/bt_left.gif" alt="" width="4" height="21" style="border-width: 0px;"/></td>
		  <td class="btn_bg"><img src="../imagenes/'.$icon.'.gif" width="16" height="16"/></td>
		  <td class="btn_bg" nowrap style="padding: 0px 4px;">'.$name.'</td>
		  <td style="padding: 0px;" align="left"><img src="../imagenes/bt_right.gif" alt="" width="4" height="21" style="border-width: 0px;"/></td>
		</tr>
	  </table>';

}

?>
