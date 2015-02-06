<?
session_start();
ob_start();

require_once '../lib/common.php';
$url="constantes_personal";
$modulo="Constante de Personal (Trabajador)";
//abrimos la conexion
$conexion=conexion();

// borramos los campos adicionales de ese tipo de nomina
$consulta="DELETE FROM nomcampos_adic_personal WHERE tiponom='".$_SESSION['codigo_nomina']."'";
$resultado_DEL=query($consulta,$conexion);


//realizamos una consulta al maestro de personal de ese tipo de nomina

$consulta="select * from nompersonal where tipnom='".$_SESSION['codigo_nomina']."'";
$resultado=query($consulta,$conexion);

//mientras existan integrantes asociar los campos adicionales que tengan que ver con nom personal

while($fila=fetch_array($resultado)){

$consulta_ca="select id,tipo,codorgh,valdefecto1 from nomcampos_adicionales where archivo='nompersonal'";
$resultado_ca=query($consulta_ca,$conexion);
	while($fila_ca=fetch_array($resultado_ca)){
		$consulta_temp="select * from nomcampos_adic_personal where ficha='".$fila['ficha']."' and id='".$fila_ca['id']."' and tiponom='".$_SESSION['codigo_nomina']."'";
		$resultado_temp=query($consulta_temp,$conexion);
		if(num_rows($resultado_temp)==0){	
	
		$valor=$fila_ca['valdefecto1'];
		switch($fila_ca['tipo']){
			case "N":
				if($fila_ca['valdefecto1']!=null and is_numeric($fila_ca['valdefecto1'])){
					$valor=number_format($fila_ca['valdefecto1'],2,",",".");
				}else{
					$valor="0";
				}
				break;
			
			case "F":
				
				if(strtotime(fecha_sql($fila_ca['valdefecto1']))==null){
					$valor="00/00/0000";
				}else{
					$valor=date("d/m/Y",strtotime(fecha_sql($fila_ca['valdefecto1'])));
				}
				break;
			case "A":
				
				$valor=$fila_ca['valdefecto1'];
				break;
		}

		$consulta_cap="insert into nomcampos_adic_personal (ficha,id,valor,tipo,codorgh,tiponom) values ('".$fila['ficha']."','".$fila_ca['id']."','".$valor."','".$fila_ca['tipo']."','".$fila_ca['codorgh']."','".$_SESSION['codigo_nomina']."')";
		$resultado_cap=query($consulta_cap,$conexion);
		}
	}

}
	cerrar_conexion($conexion);
	echo"<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
	alert(\"Campos adicionales asociados satisfactoriamente\")
	parent.cont.location.href=\"".$url.".php?pagina=1\"
	</SCRIPT>";


?>