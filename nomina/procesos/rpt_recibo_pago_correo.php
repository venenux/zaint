<?php 
session_start();
ob_start();
$termino=$_SESSION['termino'];
	
include ("../header.php");
include ("../paginas/func_bd.php");
include ("../lib/common.php");
require("class.phpmailer.php");
include("class.smtp.php");
$mail = new PHPMailer();
$mail->IsSMTP();

////////////Creacion de la carpeta que contiene los html.

$query="select nomvis_per_movimiento.* from nomvis_per_movimiento inner join nompersonal on nompersonal.cedula=nomvis_per_movimiento.cedula where codnom='".$_GET['codigo_nomina']."' and nomvis_per_movimiento.tipnom='".$_SESSION['codigo_nomina']."' and nompersonal.email<>'' ";		
$result_lote=sql_ejecutar($query);	

$directorio="recibos/nomina_".$_GET['codigo_nomina']."_tipo_".$_SESSION['codigo_nomina'].date("Y_m_d_H_i_s");
if(mkdir($directorio))
{
	echo "<div align='center' style=\"background-color : #84225b; color : #fdfdfd; font-family : 'Arial Black'; font-size : 15px;\">Envio de correo Procesado Correctamente!</div>";
	//echo "Directrorio Creado";
	echo "</br>";
}
else
{
	echo "No se pudo crear el directrorio por favor vuelva a intentar";
	exit(0);
}
//////////////////////ENCABEZADO
$var_sql = "SELECT imagen_izq, imagen_der FROM nomempresa";
$rs = sql_ejecutar($var_sql);
$row_rs = mysql_fetch_array($rs);

$var_imagen_izq =$row_rs['imagen_izq'];
$var_imagen_der ='../imagenes/'.$row_rs['imagen_der'];

$imagen=$row_rs['imagen_izq'];
$encabezado2="<table width='754' height='70' border='0'>
<tr>
<td align='left' valign='top'><img src='http://192.168.1.141/sisalud/nomina/imagenes/".$var_imagen_izq."' alt='Sisalud' width='100' height='70' /></td>
<td><p align='left'><strong>INVERSIONES SISALUD</strong></p></td>
</tr>
</table>";


// recorrido de creacion y envio 

while ($fetchxx=fetch_array($result_lote))
{


	$registro_id=$fetchxx['ficha'];
	$codnomn=$fetchxx['codnom'];
	$nomina_id=$fetchxx['codnom'];
	$codti = $_SESSION[codigo_nomina];
	
	$query="select * from nom_nominas_pago where codnom = '".$nomina_id."' AND codtip = '".$codti."' ";	
	$result2=sql_ejecutar($query);	
	$fila2 = mysql_fetch_array($result2);
	$frecuencia=$fila2['frecuencia'];


	$query="select * from nomempresa";		
	$result=sql_ejecutar($query);	
	$row = mysql_fetch_array ($result);	
	$nompre_empresa=$row[nom_emp];
	$ciudad=$row[ciu_emp];
	$gerente=$row[ger_rrhh];


	$query="select * from nompersonal where ficha = '".$registro_id."'";

	$result=sql_ejecutar($query);	
	$fila = mysql_fetch_array ($result);	
	$cargo_id=$fila['codcargo'];
	$ingreso=$fila['fecing'];
	$email=$fila['email'];

	$query="select des_car from nomcargos where cod_car = '".$cargo_id."'";		
	$result=sql_ejecutar($query);	
	$row = mysql_fetch_array ($result);	
	$nompre_cargo=$row[des_car];

	$ruta=$directorio."/".$fila[cedula].".html";
	$archivo= fopen($ruta,"w");
	chmod($directorio,0777);
	chmod($ruta,0777);


	$asunto="";
	$asunto.="
	<BODY>";
	$asunto.=$encabezado2;
	if($frecuencia!=8){
			$asunto.="
			<table width='754' height='106' border='0'>
			<tr>
			<td><p align='center' class='Estilo1'>&nbsp;</p>
			<p align='center' class='Estilo7'>RECIBO DE PAGO </p>
			<table width='754' border='1'>
			<tr>
			<td align='center'  width='100' >Cedula:</td>
			<td align='center' colspan='3'>Nombre y Apellido:</td>
			<td align='center' width=''>Ficha:</td>
			</tr>
			<tr>
			<td align='center'><strong>".$fila[cedula]."</strong></td>
			<td align='center' colspan='3'><strong>$fila[apenom]</strong></td>
			<td align='center'><strong>$fila[ficha]</strong></td>
			</tr>
			</table>
			<table width='754' style='border-top-style : none;' border='1'>
			<tr>
			<td align='center' width='100'>Fecha Ingreso:</td>
			<td align='center' width='120'>Sueldo/Salario:</td>
			<td align='center' colspan='3' >Cargo:</td>
			</tr>
			<tr>
			<td align='center'><strong>
			".date("d/m/Y",strtotime($ingreso))." 
			</strong></td>
			<td align='center' ><strong>".number_format($fila[suesal],2,',','.')."</strong></td>
			<td align='center' colspan='3'><strong>"; 
	}else{
			$query="select * from nom_progvacaciones where ficha = '".$registro_id."' and fechareivac<>'0000-00-00'";
			$result=sql_ejecutar($query);	
			$fila = mysql_fetch_array ($result);
			
			$asunto.="
			<table width='754' height='106' border='0'>
			<tr>
			<td><p align='center' class='Estilo1'>&nbsp;</p>
			<p align='center' class='Estilo7'>RECIBO DE PAGO </p>
			<table width='754' border='1'>
			<tr>
			<td align='center'  width='100' >Cedula:</td>
			<td align='center' colspan='3'>Nombre y Apellido:</td>
			<td align='center' width=''>Ficha:</td>
			</tr>
			<tr>
			<td align='center'><strong>".$fila[cedula]."</strong></td>
			<td align='center' colspan='3'><strong>$fila[apenom]</strong></td>
			<td align='center'><strong>$fila[ficha]</strong></td>
			</tr>
			</table>
			<table width='754' style='border-top-style : none;' border='1'>
			<tr>
			<td align='center' width='100'>Fecha Ingreso:</td>
			<td align='center' width='100'>Fecha Reintegro:</td>
			<td align='center' width='120'>Sueldo/Salario:</td>
			<td align='center' colspan='2' >Cargo:</td>
			</tr>
			<tr>
			<td align='center'><strong>
			".date("d/m/Y",strtotime($ingreso))." 
			</strong></td>
			<td align='center'><strong>
			".date("d/m/Y",strtotime($ingreso))." 
			</strong></td>
			<td align='center' ><strong>".number_format($fila[suesal],2,',','.')."</strong></td>
			<td align='center' colspan='3'><strong>"; 
	}
	$query="select cod_car,des_car from nomcargos where cod_car='".$fila['codcargo']."'";
	$result=sql_ejecutar($query);
	$row = mysql_fetch_array($result);
	$asunto.=$row[des_car]."
	</strong></td>
	</tr>
	</table>
	<br>
	<table width='754' border='1'>
	<tr>
	<td width='500' align='center'><strong>Periodo de Pago de $termino </strong></td> 
	<td width='254' align='center' ><strong>Banco/Cuenta:</strong></td>
	</tr>
	<tr>
	<td width='500' align='center' ><strong>$_SESSION[nomina] - DESDE:&nbsp; ".fecha($fila2[periodo_ini])." HASTA:&nbsp; ".fecha($fila2[periodo_fin])."</strong></td>
	<td width='254' align='center' ><strong>"; 
	$query="select cod_ban,des_ban from nombancos where cod_ban='".$fila['codbancob']."'";
	$resultado=sql_ejecutar($query);
	$row = mysql_fetch_array($resultado);
	$asunto.=$row[des_ban] . ' - ' . $fila[cuentacob]."</strong></td>
	</tr>
	</table>
	<br>
	<table width='754' border='1'>
	<tr>
	<td width='396' colspan='2'><div align='center'><strong>Codigo y Descripci&oacute;n de Concepto </strong></div></td>
	<td width='89'><div align='center'><strong>Asignacion</strong></div></td>
	<td width='87' colspan='1'><div align='center'><strong>Deduccion</strong></div></td>
	</tr>";
	$query="select * from nom_movimientos_nomina as mn inner join nompersonal as pe on mn.ficha = pe.ficha inner join nomconceptos as c on c.codcon = mn.codcon where pe.ficha = '$registro_id' and mn.codnom= '".$nomina_id."' and mn.tipnom='".$codti."' group by pe.apenom,pe.ficha,c.formula,c.codcon order by pe.apenom, mn.tipcon";
	$result =sql_ejecutar($query);
	while ($row = mysql_fetch_array($result))
	{
		if($row['tipcon']!='P')
		{
			$asunto.="
			 <tr><td width='396' colspan='2'>$row[codcon] - $row[descrip]</td>";
		}
		if (($row['tipcon']=='A')&&($row['impdet']=='S'))
		{
			$asunto.="<td align='right'>
			".number_format($row[monto],2,',','.');
			$sub_total_asig=$row[monto]+$sub_total_asig;
			$asunto.="</td><td align='right'>&nbsp;</td>";
		}
		if (($row['tipcon']=='D')&&($row['impdet']=='S'))
		{
			$asunto.="<td align='right'>&nbsp;</td><td align='right' width='87' colspan='2'>
			".number_format($row[monto],2,',','.');
			$sub_total_dedu=$row[monto]+$sub_total_dedu;
			$asunto.="</td>";
		}
		$asunto.="</tr>";
	}
	$asunto.="</table>
	<table width='754' border='1'>
	<tr>
	<td width='396' colspan='2'><div align='center'><strong>Subtotales</strong></div></td>
	<td width='89'><div align='right'>".number_format($sub_total_asig,2,',','.')."</div></td>
	<td width='87' colspan='1'><div align='right'>".number_format($sub_total_dedu,2,',','.')."</div></td>
	</tr>
	<tr>
	<td width='396' colspan='2' ><div align='center'><strong>Neto a Depositar Bs.:</strong></div></td>
	<td width='89'><div align='right'>&nbsp;</div></td>
	<td width='87'colspan='1'><div align='right'>".number_format($sub_total_asig-$sub_total_dedu,2,',','.')."</div></td>
	
	</tr>
	</table>";
	/*
	<table width='754' border='1'>
	<tr>
	<td width='748' colspan='3'><strong>Observaciones:</strong></td>
	</tr>
	<tr>
	<td>&nbsp;</td>
	</tr>
	</table>
	</td>
	</tr>
	</table>
*/
	$asunto.="
	</div>
	</body>
	</html>";
	$sub_total_asig=$sub_total_dedu=0;
	fwrite($archivo,$asunto);
	fclose($archivo);
	

#$email='reineracuna@sisalud.net';
if($email!='')
{
	$nombre_origen    = "RRHH SISALUD";
	$email_origen     = "rrhh@sisalud.net";
	$email_copia      = "rrhh@sisalud.net";
	$email_ocultos    = "rrhh@sisalud.net";
	$email_destino    = $email;

	$headers  = "From: $nombre_origen <$email_origen> \r\n";
	//$headers .= "Return-Path: <$email_origen> \r\n";
	$headers .= "Reply-To: $email_origen \r\n";
	$headers .= "Cc: $email_copia \r\n";
	//$headers .= "Bcc: $email_ocultos \r\n";
	//$headers .= "X-Sender: $email_origen \r\n";
	//$headers .= "X-Mailer: [Habla software de noticias v.1.0] \r\n";
	//$headers .= "X-Priority: 3 \r\n";
	$headers .= "MIME-Version: 1.0 \r\n";
	//$headers .= "Content-Transfer-Encoding: 7bit \r\n";
	//$headers .= "Disposition-Notification-To: \"$nombre_origen\" <$email_origen> \r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	$tit='RECIBO DE PAGO '.$_SESSION[nomina]." - DESDE: ".fecha($fila2[periodo_ini])." HASTA: ".fecha($fila2[periodo_fin]);

	//$cabeceras = "From: rrhh@fundavanza.gob.ve\r\nContent-type: text/html\r\n";;
	//mail($email,$tit,$asunto,$cabeceras) or die("no se pudo enviar");
	if(mail($email,$tit,$asunto,$headers))
		echo "enviado a $email";
	else
		echo "no enviado a $email";
	echo "<br/>";
}
//exit(0);
}
//echo "<br/>";
//echo "Archivos creados exitosamente";






?>
