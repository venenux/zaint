<?php 
session_start();
ob_start();
?>
<?php 
require_once '../lib/common.php';
include ("../header.php");
include ("funciones_nomina.php");
include ("func_bd.php") ;
$url="movimientos_agregar_masivo";
$modulo="Agregar Movimientos a la Nomina";
$tabla="nomconceptos";

$titulos=array("Ficha","Cedula","Nombre","Agregar?");
$indices=array("ficha","cedula","apenom");

$ficha=$_GET['ficha'];
$todo=$_GET['todo'];

$nomina=1;


$concepto=722;

$conexion=conexion();
$consulta="SELECT * FROM varcon722";
$resultado_var=query($consulta,$conexion);

$consulta="select * from nom_nominas_pago where codnom='".$nomina."' and tipnom='".$_SESSION['codigo_nomina']."'";
$resultado_nom=query($consulta,$conexion);
$fila_nom=fetch_array($resultado_nom);
$CODNOM=$nomina;
$FECHANOMINA=$fila_nom['periodo_ini'];
$FECHAFINNOM=$fila_nom['periodo_fin'];
$LUNES=lunes($FECHANOMINA);	
$LUNESPER=lunes_per($FECHANOMINA,$FECHAFINNOM);
$consulta="select monsalmin from nomempresa";
$resultado_salmin=query($consulta,$conexion);
$fila_salmin=fetch_array($resultado_salmin);


	$i=0;
	while($fila_var=fetch_array($resultado_var))
	{
	$referencia=$fila_var[valor];
	$consulta="select * from nompersonal where ficha='".$fila_var[ficha]."' and tipnom='".$_SESSION['codigo_nomina']."'";
	$resultado=query($consulta,$conexion);
	$fila=fetch_array($resultado);
	$CEDULA = $fila[cedula];
	$FICHA = $fila[ficha];
	$SUELDO=$fila[suesal];//LISTO
	$SEXO=".".$fila[sexo]."'";
	$FECHANACIMIENTO=date("d/m/Y",strtotime($fila[$fecnac]));
	$EDAD=date("Y")-date("Y",$fila[$fecnac]);
	$TIPONOMINA=$fila[tipnom];//LISTO
	$FECHAINGRESO=$fila[fecing];//LISTO
	$CODPROFESION=$fila[codpro];
	$CODCATEGORIA=$fila[codcat];
	$CODCARGO=$fila[codcargo];
	$SITUACION=$fila[estado];
	$SUELDOPROPUESTO=$fila[sueldopro];
	$TIPOCONTRATO=$fila[contrato];
	$FORMACOBRO=$fila[forcob];
	$NIVEL1=$fila[codnivel1];
	$NIVEL2=$fila[codnivel2];
	$NIVEL3=$fila[codnivel3];
	$NIVEL4=$fila[codnivel4];
	$NIVEL5=$fila[codnivel5];
	$NIVEL6=$fila[codnivel6];
	$NIVEL7=$fila[codnivel7];
	$FECHAAPLICACION=$fila[fechaplica];
	$TIPOPRESENTACION=$fila[tipopres];
	$FECHAFINSUS=$fila[fechasus];
	$FECHAINISUS=$fila[fechareisus];
	$FECHAFINCONTRATO=$fila[fecharetiro];
	$FECHAVAC=$fila[fechavac];
	$FECHAREIVAC=$fila[fechareivac];
	$CONTRACTUAL=$fila[contractual];
	$PRT=$fila[proratea];
	$REF=0;
	$SALARIOMIN=$fila_salmin['monsalmin'];
	if($SITUACION!="Inactivo")
	{
		$consulta_mov="select * from nom_movimientos_nomina where codcon='".$concepto."' and codnom='".$nomina."' and ficha ='".$fila_var[ficha]."' and tipnom='".$_SESSION['codigo_nomina']."'";
		$resultado_mov=mysql_query($consulta_mov);
		
		if(num_rows($resultado_mov)==0)
		{
			$consulta="select * from nomconceptos where codcon='".$concepto."'";
			$resultado_con=mysql_query($consulta);
			$fila=fetch_array($resultado_con);
			$REF=$referencia;
			//echo $formula[$valor];
			eval($fila['formula']);
			
			if($MONTO<=0 && $fila['montocero']==1)
			{
				echo $entrar=0;
			}
			else
			{
				echo $entrar=1;
			}
			if($entrar==1)
			{
				$consulta="insert into nom_movimientos_nomina (codnom, codcon,ficha,mes,anio,tipcon,valor,monto,cedula,unidad,descrip,codnivel1,codnivel2,codnivel3,codnivel4,codnivel5,codnivel6,codnivel7,tipnom,contractual) values ('".$nomina."', '".$concepto."','".$fila_var[ficha]."','".$fila_nom['mes']."','".$fila_nom['anio']."','".$fila['tipcon']."','".$REF."','".$MONTO."','$CEDULA','".$fila['unidad']."','".$fila['descrip']."','$NIVEL1','$NIVEL2','$NIVEL3','$NIVEL4','$NIVEL5','$NIVEL6','$NIVEL7','".$_SESSION['codigo_nomina']."','$fila[contractual]')";
				if(!$resultado=mysql_query($consulta))
				{
					echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
					alert('No se puede calcular conceptos a esta persona')
					</SCRIPT>";
				}
			}
		}	
	}	
}


