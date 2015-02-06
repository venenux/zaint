<?php

session_start();
ob_start();
?>
<?

function concepto($codigo_concepto) {
    include 'globales.php';
    $selectra = new bd($_SESSION['bd']);
    $consulta = "select monto from nom_movimientos_nomina where ficha='" . $FICHA . "' and codcon='" . $codigo_concepto . "' and codnom='" . $CODNOM . "' and tipnom='" . $_SESSION['codigo_nomina'] . "'";

    $resultado = $selectra->query($consulta);
    $fila = $resultado->fetch_assoc();
    if ($resultado->num_rows <= 0) {
        return 0;
    } else {
        return $fila['monto'];
    }
}

function valorconcepto($codigo_concepto) {
    include 'globales.php';
    $selectra = new bd($_SESSION['bd']);
    $consulta = "select valor from nom_movimientos_nomina where ficha='" . $FICHA . "' and codcon='" . $codigo_concepto . "' and codnom='" . $CODNOM . "' and tipnom='" . $_SESSION['codigo_nomina'] . "'";

    $resultado = $selectra->query($consulta);
    $fila = $resultado->fetch_assoc();
    if ($resultado->num_rows <= 0) {
        return 0;
    } else {
        return $fila['valor'];
    }
}

function acumcom($codcon, $fecha_inicio, $fecha_fin) {
    include 'globales.php';
    $conexion = conexion();
    $consulta = "SELECT SUM(monto) AS monto FROM nom_movimientos_nomina WHERE mes=$mes AND anio=$anio AND tipcon='A' AND ficha=$ficha AND tipnom=$_SESSION[codigo_nomina] AND (codcon<>520 OR codcon<>1402 OR codcon<>1400 OR codcon<>1463)";
    $resultado = query($consulta, $conexion);
    $fila = fetch_array($resultado);
    $suma = $fila['suma'];
    return $suma;
}

function mensajecon($var) {

    echo $var;
}

function dia($fecha) {
    return date("d", strtotime($fecha));
}

function mes($fecha) {
    return date("m", strtotime($fecha));
}

function si($condicion, $v, $f) {

    if ($condicion == "") {
        return 0;
    }

    $if = "if(" . $condicion . "){\$retorno=" . $v . ";}else{\$retorno=" . $f . ";}";

    eval($if);
    return $retorno;
}

function salida($condicion, $v, $f) {
    if ($condicion == "") {
        return 0;
    }
    $if = "if(" . $condicion . "){" . $v . ";}else{\$retorno=" . $f . ";}";
    eval($if);
}

function lunes($periodo) {
//funcion lunes
    $cadena = explode("-", $periodo);
    //$mes=date($cadena[1]);
    //$ano=date("Y");
    $fecha_lunes = $cadena[0] . "-" . $cadena[1] . "-01";
    $num_dias_mes = date("t", strtotime($fecha_lunes));
    $dia_inicio = date("N", strtotime($fecha_lunes));
    $LUNES = 0;
    for ($i = 1; $i <= $num_dias_mes; $i++) {
        if ($dia_inicio == 1) {
            $dia_inicio++;
            $LUNES++;
        } elseif ($dia_inicio == 7) {
            $dia_inicio = 1;
        } else {
            $dia_inicio++;
        }
    }
    return $LUNES;
}

function lunes_per($inicio, $final) {
    if ($final < $inicio)
        return 0;
    if (($final == '') || ($inicio == ''))
        return 0;
    $fecha_inicio = explode("-", $inicio);
    $fecha_fin = explode("-", $final);
//			echo gregoriantojd($fecha_inicio[1],substr($fecha_inicio[2],0,2),$fecha_inicio[0]);

    $LUNES = 0;

    for ($i = gregoriantojd($fecha_inicio[1], substr($fecha_inicio[2], 0, 2), $fecha_inicio[0]); $i <= gregoriantojd($fecha_fin[1], substr($fecha_fin[2], 0, 2), $fecha_fin[0]); $i++) {
        if ($i % 7 == 0) {
            $LUNES++;
        }
    }
    return $LUNES;
}

function lunes_per_ingre($inicio, $final) {
    $cadena = explode("-", $final);
    //echo "-".$inicio."-";
    if ($inicio == "" || $inicio == "0000-00-00") {
        return 0;
    } else {
        //$inicio=sumadia($inicio,1);
        if ($final < $inicio)
            return 0;
        if (($final == '') || ($inicio == ''))
            return 0;
        $fecha_inicio = explode("-", $inicio);
        $fecha_fin = explode("-", $final);
        //			echo gregoriantojd($fecha_inicio[1],substr($fecha_inicio[2],0,2),$fecha_inicio[0]);

        $LUNES = 0;

        for ($i = gregoriantojd($fecha_inicio[1], substr($fecha_inicio[2], 0, 2), $fecha_inicio[0]); $i <= gregoriantojd($fecha_fin[1], substr($fecha_fin[2], 0, 2), $fecha_fin[0]); $i++) {
            if ($i % 7 == 0) {
                $LUNES++;
            }
        }
        return $LUNES;
    }
}

function lunes_per_vaca($inicio, $final) {
    $cadena = explode("-", $final);
    //echo "-".$inicio."-";
    if ($inicio == "" || $inicio == "0000-00-00") {
        return 0;
    } else {
        $inicio = sumadia($inicio, 1);
        if ($final < $inicio)
            return 0;
        if (($final == '') || ($inicio == ''))
            return 0;
        $fecha_inicio = explode("-", $inicio);
        $fecha_fin = explode("-", $final);
        //			echo gregoriantojd($fecha_inicio[1],substr($fecha_inicio[2],0,2),$fecha_inicio[0]);

        $LUNES = 0;

        for ($i = gregoriantojd($fecha_inicio[1], $fecha_inicio[2], $fecha_inicio[0]); $i <= gregoriantojd($fecha_fin[1], $fecha_fin[2], $fecha_fin[0]); $i++) {
            if ($i % 7 == 0) {
                $LUNES++;
            }
        }
        return $LUNES;
        //2455776
        //2455799
    }
}

function lunespervac($inicio, $final) {
    if ($final < $inicio)
        return 0;
    if (($final == '') || ($inicio == ''))
        return 0;
    $fecha_inicio = explode("-", $inicio);
    $fecha_fin = explode("-", $final);
//	echo gregoriantojd($fecha_inicio[1],substr($fecha_inicio[2],0,2),$fecha_inicio[0]);

    $LUNES = 0;
    for ($i = gregoriantojd($fecha_inicio[1], substr($fecha_inicio[2], 0, 2), $fecha_inicio[0]); $i <= gregoriantojd($fecha_fin[1], substr($fecha_fin[2], 0, 2), $fecha_fin[0]); $i++) {
        if ($i % 7 == 0) {
            $LUNES++;
        }
        if ($i == gregoriantojd($fecha_fin[1], substr($fecha_fin[2], 0, 2), $fecha_fin[0]))
            $LUNES = $LUNES - 1;
    }
    return $LUNES;
}

function lunes_nuevo($inicio, $fin) {
    $start = strtotime($inicio);
    $end = strtotime($fin);
    $day = 1;

    $w = array(date('w', $start), date('w', $end));
    return floor(( date('z', $end) - date('z', $start) ) / 7) + ($day == $w[0] || $day == $w[1] || $day < ((7 + $w[1] - $w[0]) % 7));
}

function lunes_total_vaca($cedula) {
    $conexion = conexion();
    $consulta = "SELECT fechavac,fechareivac  FROM nom_progvacaciones WHERE tipooper='DA'  AND ceduda='$cedula'  AND estado='Pendiente' AND fechavac<>'0000-00-00' and fechareivac<>'0000-00-00'";
    $resultado = query($consulta, $conexion);
    $lunes = 0;
    while ($fila = fetch_array($resultado)) {
        $lunes+=lunes_nuevo($fila['fechavac'], $fila['fechareivac']);
    }
    return $lunes;
}

function antiguedad($fecha1, $fecha2, $tipo) {
    if ($fecha1 > $fecha2) {
        return 0;
    }
    if ($tipo == "") {
        return 0;
    }
    if ($fecha1 == "0000-00-00") {
        return 0;
    }
    $ano1 = substr($fecha1, 0, 4);
    $mes1 = substr($fecha1, 5, 2);
    $dia1 = substr($fecha1, 8, 2);

    $ano2 = substr($fecha2, 0, 4);
    $mes2 = substr($fecha2, 5, 2);
    $dia2 = substr($fecha2, 8, 2);

    if ($dia1 > $dia2) {
        $dia2+=30;
        $mes2-=1;
        if ($mes2 < 0) {
            $mes2 = 12;
            $ano2-=1;
        }
    }

    //calculo timestam de las dos fechas
    $timestamp1 = mktime(0, 0, 0, $mes1, $dia1, $ano1);
    $timestamp2 = mktime(0, 0, 0, $mes2, $dia2, $ano2);

    //resto a una fecha la otra
    $segundos_diferencia = $timestamp1 - $timestamp2;
    //echo $segundos_diferencia;
    //convierto segundos en dÃ­as
    $dias = $segundos_diferencia / (60 * 60 * 24);

    //obtengo el valor absoulto de los dÃ­as (quito el posible signo negativo)
    $dias = abs($dias);

    //quito los decimales a los dÃ­as de diferencia
    $dias = floor($dias);


// 	$fecha_inicio=explode("-",$fecha1);
// 	$fecha_fin=explode("-",$fecha2);
// 	$dias=0;
// 	for($i=gregoriantojd( $fecha_inicio[1],substr($fecha_inicio[2],0,2),$fecha_inicio[0]); $i<=gregoriantojd($fecha_fin[1],substr($fecha_fin[2],0,2),$fecha_fin[0]);$i++)
// 	{
// 		$dias++;
// 	}
    //$dias=$dia2-$dia1;
    if ($mes1 > $mes2) {
        $mes2+=12;
        $ano2-=1;
    }
    $meses = $mes2 - $mes1;
    $anios = $ano2 - $ano1;

    switch ($tipo) {
        case "A":
            return $anios;
            break;
        case "M":
            return $meses;
            break;
        case "D":
            return $dias;
            break;
    }
}

function cuotapre($ficha, $inicio, $final) {
    $conexion = conexion();
    $dia = substr($final, 8, 2);
    if ($dia > 25)
        $dia = 31;
    $final = substr($final, 0, 8) . $dia;
    $consulta = "SELECT SUM(montocuo) as total FROM nomprestamos_detalles WHERE ficha=$ficha and fechaven between '$inicio' and '$final' and estadopre='Pendiente'";
    $resultado = query($consulta, $conexion);
    $fetch = fetch_array($resultado);
    return $fetch[total];
}

function cuotaprecant($ficha, $inicio, $final) {
    $conexion = conexion();
    $dia = substr($final, 8, 2);
    if ($dia > 25)
        $dia = 31;
    $final = substr($final, 0, 8) . $dia;
    $consulta = "SELECT COUNT(montocuo) as total FROM nomprestamos_detalles WHERE ficha=$ficha and fechaven between '$inicio' and '$final' and estadopre='Pendiente'";
    $resultado = query($consulta, $conexion);
    $fetch = fetch_array($resultado);
    return $fetch[total];
}

function cuotafact($ficha, $inicio, $final) {
    $conexion = conexion();
    $dia = substr($final, 8, 2);
    if ($dia > 25)
        $dia = 31;
    $final = substr($final, 0, 8) . $dia;
    $consulta = "SELECT SUM(montocuo) as total FROM nomfacturas_detalles WHERE ficha=$ficha and fechaven between '$inicio' and '$final' and estadopre='Pendiente'";
    $resultado = query($consulta, $conexion);
    $fetch = fetch_array($resultado);
    return $fetch[total];
}

function cuotafactcant($ficha, $inicio, $final) {
    $conexion = conexion();
    $dia = substr($final, 8, 2);
    if ($dia > 25)
        $dia = 31;
    $final = substr($final, 0, 8) . $dia;
    $consulta = "SELECT COUNT(montocuo) as total FROM nomfacturas_detalles WHERE ficha=$ficha and fechaven between '$inicio' and '$final' and estadopre='Pendiente'";
    $resultado = query($consulta, $conexion);
    $fetch = fetch_array($resultado);
    return $fetch[total];
}

function cuotapretip($ficha, $inicio, $final, $tipo) {
    $conexion = conexion();
    $dia = substr($final, 8, 2);
    if ($dia > 25)
        $dia = 31;
    $final = substr($final, 0, 8) . $dia;
    $consulta = "SELECT SUM(montocuo) as total FROM nomprestamos_detalles as pd inner join nomprestamos_cabecera as pc on (pd.numpre=pc.numpre) WHERE pd.ficha=$ficha and pd.fechaven between '$inicio' and '$final' and pd.estadopre='Pendiente' and pc.codigopr='$tipo'";
    $resultado = query($consulta, $conexion);
    $fetch = fetch_array($resultado);
    return $fetch[total];
}

function saldopre($ficha, $inicio, $final, $tipo) {
    //saldo actual del prestamo, 0 para todos los prestamos, 1 en adelante para diferentes tipos de prestamos
    $conexion = conexion();
    $dia = substr($final, 8, 2);
    if ($dia > 25)
        $dia = 31;
    $final = substr($final, 0, 8) . $dia;
    if ($tipo == 0)
        $consulta = "SELECT SUM(salfinal) as total FROM nomprestamos_detalles WHERE ficha=$ficha and fechaven between '$inicio' and '$final' and estadopre='Pendiente'";
    else
        $consulta = "SELECT SUM(salfinal) as total FROM nomprestamos_detalles as pd inner join nomprestamos_cabecera as pc on (pd.numpre=pc.numpre) WHERE pd.ficha=$ficha and pd.fechaven between '$inicio' and '$final' and pd.estadopre='Pendiente' and pc.codigopr='$tipo'";
    $resultado = query($consulta, $conexion);
    $fetch = fetch_array($resultado);
    return $fetch[total];
}

function lunes_per2($inicio, $final, $fecing, $prt) {
//funcion lunes
    $cadena = explode("-", $final);
    if ($cadena[2] > 28)
        $cadena[2] = 30;
    $final2 = $cadena[0] . "-" . $cadena[1] . "-" . $cadena[2];
    //$mes=date($cadena[1]);
    //$ano=date("Y");
    if ($prt == 1)
        if (($fecing > $inicio) && ($fecing <= $final)) {
            $cadena = explode("-", $fecing);
            if ($cadena[2] == 31)
                $cadena[2] = 30;
            $fecha_lunes = $cadena[0] . "-" . $cadena[1] . "-" . $cadena[2];
        }
        else
            $fecha_lunes = $inicio;
    else
        $fecha_lunes = $inicio;
    //$fecha_lunes= $cadena[0]."-".$cadena[1]."-01";
    $num_dias = antiguedad($fecha_lunes, $final2, "D") + 1;
    $dia_inicio = date("N", strtotime($fecha_lunes));
    $LUNES = 0;
    for ($i = 1; $i <= $num_dias; $i++) {
        if ($dia_inicio == 1) {
            $dia_inicio++;
            $LUNES++;
        } elseif ($dia_inicio == 7) {
            $dia_inicio = 1;
        } else {
            $dia_inicio++;
        }
    }
    return $LUNES;
}

function sumadia($fecha, $dia) {
    //list($year,$mon,$day) = explode('-',$fecha);
    return date("Y-m-d", strtotime("$fecha + $dia days")); //date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));
}

function antiguedadliq($fecha1, $fecha2, $opcion, $preaviso, $codnom, $ficha) {
    //opcion 1 para bono vacacional
    //opcion 2 para dias de disfrute
    $conexion = conexion();
    $consulta = "SELECT diasbonvac, diasmaxinc, diasdisfrute, diasincrem, diasincremdis, diasmaxincdis, antigincremvac  FROM nomtipos_nomina WHERE codtip=$_SESSION[codigo_nomina]";
    $resultado = query($consulta, $conexion);
    $fetch = fetch_array($resultado);
    if ($opcion == 1) {
        $dias_defecto = $fetch['diasbonvac'];
        $dias_incremento = $fetch['diasincrem'];
        $dias_max_incremento = $fetch['diasmaxinc'];
    } elseif ($opcion == 2) {
        $dias_defecto = $fetch['diasdisfrute'];
        $dias_incremento = $fetch['diasincremdis'];
        $dias_max_incremento = $fetch['diasmaxincdis'];
    }

    $ant = antiguedad($fecha1, $fecha2, "A");
    $antmes = antiguedad($fecha1, $fecha2, "M");
    $mes1 = substr($fecha1, 5, 2);
    $dia1 = substr($fecha1, 8, 2);
    $mes2 = substr($fecha2, 5, 2);
    $dia2 = substr($fecha2, 8, 2);
    $diasant = 0;
    $diasadic = 0;
    if ($ant >= 1) {
        $diasant = $dias_defecto;
        if ($ant >= 2) {
            if ((($ant >= $fetch['antigincremvac']) && ($opcion == 2)) || ($opcion == 1)) {
                $diasadic = ($ant - 1) * $dias_incremento;
                if ($diasadic > $dias_max_incremento) {
                    $diasadic = $dias_max_incremento;
                }
                $diasant+=$diasadic;
                if ($mes1 < $mes2) {
                    $diasant+=1;
                } elseif ($mes1 == $mes2) {
                    if ($dia1 < $dia2) {
                        $diasant+=1;
                    }
                }
                if ($antmes >= 1) {
                    $diasant+=1;
                }
            }
        }
    }
    cerrar_conexion($conexion);
    return $diasant;
}

function tasainteres($fecha) {
    $ano = substr($fecha, 0, 4);
    $mes = substr($fecha, 5, 2);
    //$dia1=substr($fecha1,8,2);
    $conexion = conexion();
    $consulta = "SELECT tasa FROM nomtasas_interes WHERE anio=$ano AND mes=$mes";
    $resultado = query($consulta, $conexion);
    $fetch = fetch_array($resultado);
    cerrar_conexion($conexion);
    return $fetch['tasa'];
}

function asigmesactual($fechanom, $ficha) {
// 	$anios=antiguedad($fechaing,$fechafinnom,"A");
// 	$meses=antiguedad($fechaing,$fechafinnom,"M");
// 	if((($anios==0)&&($meses>=4))||(($anios>=1)))
// 	{
    $mes = substr($fechanom, 5, 2);
// 		$mes2=substr($fechaing,5,2);
    $anio = substr($fechanom, 0, 4);
    $conexion = conexion();
    $consulta = "SELECT SUM(monto) AS monto FROM nom_movimientos_nomina WHERE mes=$mes AND anio=$anio AND tipcon='A' AND (codcon<>520 AND codcon<>1402 AND codcon<>519 AND codcon<>1519) AND ficha=$ficha AND tipnom=$_SESSION[codigo_nomina]";
    $resultado = query($consulta, $conexion);
    $fetch = fetch_array($resultado);

    // DOZAVO DE UTILIDADES
// 		$doz_util=$fetch['monto']*(25/100);
// 		$diasvac=antiguedadliq($fechaing,$fechafinnom,2,0,0,0);
// 		$doz_vac=(($fetch['monto']/30)*$diasvac)/12;
// 		$total=$fetch['monto']+$doz_util+$doz_vac;
//
// 		if($mes==$mes2)
// 		{
// 			$diasantig=(($anios)*2)+5;
// 		}
// 		$prestacion=($total/30)*$diasantig;
    return $fetch['monto'];
// 		return $prestacion;
    cerrar_conexion($conexion);
// 	}
// 	else
// 		return;
}

function prestcontratados($cedula, $ficha, $codcon) {
    $conexion = conexion();
    $consulta = "SELECT SUM(montototal) AS monto FROM nomacumulados_det WHERE ceduda=$cedula AND codcon=$codcon ";
    $resultado = query($consulta, $conexion);
    $fetch = fetch_array($resultado);

    cerrar_conexion($conexion);
    return $fetch['monto'];
}

function prestcontratadosref($cedula, $ficha, $codcon) {
    $conexion = conexion();
    $consulta = "SELECT SUM(refer) AS monto FROM nomacumulados_det WHERE ceduda=$cedula AND ficha=$ficha AND codcon=$codcon";
    $resultado = query($consulta, $conexion);
    $fetch = fetch_array($resultado);

    cerrar_conexion($conexion);
    return $fetch['monto'];
}

function asigmensuales($ficha, $mes, $anio) {
    $conexion = conexion();
    $consulta = "SELECT SUM(monto) AS monto FROM nom_movimientos_nomina WHERE mes=$mes AND anio=$anio AND tipcon='A' AND (codcon<>520 OR codcon<>1402) AND ficha=$ficha AND tipnom=$_SESSION[codigo_nomina]";
    $resultado = query($consulta, $conexion);
    $fetch = fetch_array($resultado);

    cerrar_conexion($conexion);
    return $fetch['monto'];
}

function anticipos($cedula) {
    $conexion = conexion();
    $consulta = "SELECT SUM(monto) AS monto FROM nomexpediente WHERE tipo_registro='Antic. prestaciones' AND cedula=$cedula";
    $resultado = query($consulta, $conexion);
    $fetch = fetch_array($resultado);

    cerrar_conexion($conexion);
    return $fetch['monto'];
}

function diasreposo($cedula, $anio) {
    $conexion = conexion();
    $fecha1 = ($anio - 1) . "-11-" . "01";
    $fecha2 = $anio . "-10-" . "31";
    $consulta = "SELECT SUM(dias) AS dias FROM nomexpediente WHERE tipo_registro='Permisos' AND tipo_tiporegistro=4 AND cedula=$cedula AND fecha_salida BETWEEN '$fecha1' AND '$fecha2'";
    $resultado = query($consulta, $conexion);
    $fetch = fetch_array($resultado);

    cerrar_conexion($conexion);
    return $fetch['dias'];
}

function vacbonopendiente($cedula, $fecha, $opcion) {

    $conexion = conexion();
    if ($opcion == 1) {
        $consulta = "SELECT fecha_venc FROM nom_progvacaciones WHERE estado='Pendiente' AND tipnom=$_SESSION[codigo_nomina] AND ceduda=$cedula AND tipooper='DV'";
        $resultado1 = query($consulta, $conexion);
        $fetch1 = fetch_array($resultado1);

        if ($fecha < $fetch1['fecha_venc'])
            return 0;

        $consulta = "SELECT SUM(ddisfrute) AS dias FROM nom_progvacaciones WHERE estado='Pendiente' AND tipnom=$_SESSION[codigo_nomina] AND ceduda=$cedula AND (tipooper='DV' OR tipooper='DA')";
        $resultado = query($consulta, $conexion);
        $fetch = fetch_array($resultado);

        $consulta = "SELECT SUM(dpagob) AS dpagob FROM nom_progvacaciones WHERE estado='Pendiente' AND tipnom=$_SESSION[codigo_nomina] AND ceduda=$cedula AND tipooper='DV'";
        $resultado2 = query($consulta, $conexion);
        $fetch2 = fetch_array($resultado2);
        return $fetch['dias'] - $fetch2['dpagob'];
    }
    elseif ($opcion == 2) {
        $consulta = "SELECT fecha_venc FROM nom_progvacaciones WHERE estado='Pendiente' AND tipnom=$_SESSION[codigo_nomina] AND ceduda=$cedula AND tipooper='DV'";
        $resultado1 = query($consulta, $conexion);
        $fetch1 = fetch_array($resultado1);
        if ($fecha < $fetch1[fecha_venc])
            return 0;

        $consulta = "SELECT SUM(dpago) AS bono FROM nom_progvacaciones WHERE estado='Pendiente' AND tipnom=$_SESSION[codigo_nomina] AND ceduda=$cedula AND tipooper='DB'";
        $resultado = query($consulta, $conexion);
        $fetch = fetch_array($resultado);
        return $fetch['bono'];
    }
    cerrar_conexion($conexion);
}

function meseslaborados($codnom, $codcon, $ficha, $fecha, $fechaing) {
    $anos = substr($fecha, 4, 0);
    $fec = $anos . "-01-01";
    if ($fechaing > $fec) {
        $meses = antiguedad($fechaing, $fecha, "M");
        return $meses;
    } else {
        $meses = antiguedad($fec, $fecha, "M");
        return $meses;
    }
}

/* function meseslaborados($codnom,$codcon,$ficha,$fecha)
  {
  $meses=substr($fecha,5,2);
  $dias=substr($fecha,8,2);
  if($dias<25)
  return $meses-1;
  else
  return $meses;
  cerrar_conexion($conexion);
  } */

function diashabilesvac($cedula, $fecha) {
    $conexion = conexion();
    $anio = substr($fecha, 0, 4);
    $consulta = "SELECT SUM(ddisfrute) AS dias FROM nom_progvacaciones WHERE (tipooper='DA' OR tipooper='DV') AND ceduda=$cedula AND periodo=$anio AND estado='Pendiente'";
    $resultado = query($consulta, $conexion);
    $fetch = fetch_array($resultado);
    return $fetch['dias'];
    cerrar_conexion($conexion);
}

function diashabilesvacsinperiodo($cedula) {
    $conexion = conexion();
    $anio = substr($fecha, 0, 4);
    $consulta = "SELECT SUM(ddisfrute) AS dias FROM nom_progvacaciones WHERE (tipooper='DA' OR tipooper='DV') AND ceduda=$cedula  AND estado='Pendiente' AND fechavac<>'0000-00-00' and fechareivac<>'0000-00-00'";
    $resultado = query($consulta, $conexion);
    $fetch = fetch_array($resultado);
    return $fetch['dias'];
    cerrar_conexion($conexion);
}

function bonovac($cedula, $fecha) {
    $conexion = conexion();
    $anio = substr($fecha, 0, 4);
    $consulta = "SELECT SUM(dpago) AS bono FROM nom_progvacaciones WHERE tipooper='DB' AND ceduda=$cedula AND periodo=$anio AND estado='Pendiente'";
    $resultado = query($consulta, $conexion);
    $fetch = fetch_array($resultado);
    if ($fetch['bono'] == '')
        return 0;
    else
        return $fetch['bono'];
    cerrar_conexion($conexion);
}

function diabonovac($cedula, $fecha) {
    $conexion = conexion();
    $anio = substr($fecha, 0, 4);
    $consulta = "SELECT SUM(dpagob) AS bono FROM nom_progvacaciones WHERE (tipooper='DB'  OR tipooper='DI') AND ceduda=$cedula AND periodo=$anio AND estado='Pendiente'";
    $resultado = query($consulta, $conexion);
    $fetch = fetch_array($resultado);
    if ($fetch['bono'] == '')
        return 0;
    else
        return $fetch['bono'];
    cerrar_conexion($conexion);
}

function diabonovacsinperiodo($cedula) {
    $conexion = conexion();
    $anio = substr($fecha, 0, 4);
    //con el bono vacacional en nomina general
    $consulta_u = "SELECT periodo  FROM nom_progvacaciones WHERE tipooper='DV' AND ceduda=$cedula  AND estado='Pendiente' and fechavac<>'0000-00-00' and fechareivac<>'0000-00-00' ";
    $resultado_u = query($consulta_u, $conexion);
    $cantidad = 0;
    while ($fila = fetch_array($resultado_u)) {
        $consulta = "SELECT SUM(dpagob) AS bono FROM nom_progvacaciones WHERE (tipooper='DB'  OR tipooper='DI') AND ceduda=$cedula  AND estado='Pendiente' and periodo='" . $fila['periodo'] . "' ";
        $resultado = query($consulta, $conexion);
        $fetch = fetch_array($resultado);
        if ($fetch['bono'] != '')
            $cantidad+= $fetch['bono'];
    }
    return $cantidad;
    cerrar_conexion($conexion);
}

function reintvac($fechareivac, $fechanomina, $fechafinnom) {
    if (($fechareivac >= $fechanomina) && ($fechareivac <= $fechafinnom))
        return $resp = "SI";
    else
        return $resp = "NO";
}

function diasnohabiles($cedula, $fecha1) {
    $conexion = conexion();
    $diasvac = diashabilesvac($cedula, $fecha1);
    $anio = substr($fecha1, 0, 4);
    $consulta = "SELECT fechavac FROM nom_progvacaciones WHERE tipooper='DV' AND ceduda=$cedula AND periodo=$anio AND estado='Pendiente'";
    $resultado = query($consulta, $conexion);
    $fetch = fetch_array($resultado);

    $fecha = explode("-", $fetch['fechavac']);
    $ano = $ano0 = $fecha[0];
    $mes = $mes0 = $fecha[1];
    $dia = $dia0 = $diainivac = $fecha[2];
    $fechainivac = $ano . "-" . $mes . "-" . $dia;
    $i = 0;

    $iniciomes = $ano . "-" . $mes . "-01";
    $numdiasmes = date("t", strtotime($iniciomes));
    $contador = 0;
    //echo "<br>";
    while ($i < $diasvac) {
        if ($diainivac == 1) {
            //$diainivac=1;
            $diainivac = "0" . $diainivac;
            $i = $i + 1;
            if ($mes == 12) {
                $mes = 1;
                $ano = $ano + 1;
                $iniciomes = $ano . "-" . $mes . "-01";
                $numdiasmes = date("t", strtotime($iniciomes));
            } elseif ($i == 1) {

                if ($mes <= 9)
                    $mes = "0" . $mes;
                $iniciomes = $ano . "-" . $mes . "-01";
                $numdiasmes = date("t", strtotime($iniciomes));
            }
            else {
                $mes = $mes + 1;
                if ($mes <= 9)
                    $mes = "0" . $mes;
                $iniciomes = $ano . "-" . $mes . "-01";
                $numdiasmes = date("t", strtotime($iniciomes));
            }
        }
        else {
            //$diainivac=$diainivac+1;
            if ($diainivac <= 9)
                $diainivac = "0" . $diainivac;
            $i = $i + 1;
        }
        echo $fechaconsulta = $ano . "-" . $mes . "-" . $diainivac;
        $consulta = "SELECT dia_fiesta FROM nomcalendarios_tiposnomina WHERE cod_tiponomina='" . $_SESSION['codigo_nomina'] . "' AND fecha='" . $fechaconsulta . "'";
        $resultado2 = query($consulta, $conexion);
        $fetch2 = fetch_array($resultado2);
        $fetch2['dia_fiesta'];
        if (($fetch2['dia_fiesta'] == 3) || ($fetch2['dia_fiesta'] == 1)) {
            $i-=1;
            $contador+=1;
        }
        if ($numdiasmes == $diainivac)
            $diainivac = 1;
        else
            $diainivac = $diainivac + 1;
    }
    return $contador;
    cerrar_conexion($conexion);
}

function diasnohabilessinperiodo($cedula) {
    $conexion = conexion();
    //echo $diasvac=diashabilesvacsinperiodo($cedula);
    //$anio=substr($fecha1,0,4);
    $consulta = "SELECT fechavac FROM nom_progvacaciones WHERE tipooper='DV' AND ceduda=$cedula AND fechavac<>'0000-00-00' and fechareivac<>'0000-00-00' AND estado='Pendiente'";
    $resultado = query($consulta, $conexion);
    $contador = 0;
    while ($fetch = fetch_array($resultado)) {

        $consulta_dia = "SELECT sum(ddisfrute) as dias FROM nom_progvacaciones WHERE (tipooper='DV' or tipooper='DA') AND ceduda=$cedula AND fechavac='" . $fetch['fechavac'] . "' AND estado='Pendiente'";
        $resultado_dia = query($consulta_dia, $conexion);
        $dia_query = fetch_array($resultado_dia);
        $diasvac = $dia_query['dias'];
        $fecha = explode("-", $fetch['fechavac']);
        $ano = $ano0 = $fecha[0];
        $mes = $mes0 = trim($fecha[1]);
        $dia = $dia0 = $diainivac = $fecha[2];
        $fechainivac = $ano . "-" . $mes . "-" . $dia;
        $i = 0;

        $iniciomes = $ano . "-" . $mes . "-01";
        $numdiasmes = date("t", strtotime($iniciomes));

        //echo "<br>";
        while ($i < $diasvac) {
            if ($diainivac == 1) {
                //$diainivac=1;
                $diainivac = "0" . $diainivac;
                $i = $i + 1;
                if ($mes == 12) {
                    $mes = 1;
                    $ano = $ano + 1;
                    $iniciomes = $ano . "-" . $mes . "-01";
                    $numdiasmes = date("t", strtotime($iniciomes));
                } elseif ($i == 1) {

                    if ($mes <= 9)
                        $mes = "0" . $mes;
                    $iniciomes = $ano . "-" . $mes . "-01";
                    $numdiasmes = date("t", strtotime($iniciomes));
                }
                else {
                    $mes = $mes + 1;
                    if ($mes <= 9)
                        $mes = "0" . $mes;
                    $iniciomes = $ano . "-" . $mes . "-01";
                    $numdiasmes = date("t", strtotime($iniciomes));
                }
            }
            else {
                //$diainivac=$diainivac+1;
                if ($diainivac <= 9)
                    $diainivac = "0" . $diainivac;
                $i = $i + 1;
            }
            $fechaconsulta = $ano . "-" . $mes . "-" . $diainivac;
            $consulta = "SELECT dia_fiesta FROM nomcalendarios_tiposnomina WHERE cod_tiponomina='" . $_SESSION['codigo_nomina'] . "' AND fecha='" . $fechaconsulta . "'";
            $resultado2 = query($consulta, $conexion);
            $fetch2 = fetch_array($resultado2);
            $fetch2['dia_fiesta'];
            if (($fetch2['dia_fiesta'] == 3) || ($fetch2['dia_fiesta'] == 1)) {
                $i-=1;
                $contador+=1;
            }
            if ($numdiasmes == $diainivac)
                $diainivac = 1;
            else
                $diainivac = $diainivac + 1;
        }
    }
    return $contador;
    cerrar_conexion($conexion);
}

function baremo($codigo_baremo, $valor) {
    $val = 0;
    $resultado = 0;
    $conexion = conexion();
    $consulta = "select * from nombaremos where codigo='" . $codigo_baremo . "'";
    $result = query($consulta, $conexion);
    echo "AAAAAAAAAAA";
    if (num_rows($result) == 0) {
        return;
    }

    $consulta = "select * from nomtarifas where codigo='" . $codigo_baremo . "'";
    $resultado = query($consulta, $conexion);


    if (num_rows($resultado) == 0) {
        return;
    }
    while ($fila = fetch_array($resultado)) {
        if ($fila['limite_menor'] <= $valor and $fila['limite_mayor'] >= $valor) {
            return $fila['monto'];
        }
    }
    return;
}

function conceptonomant($codigo_concepto, $opcion) {
//========================================================================================
// FUNCION CONCEPTONOMANT: Devuelve el valor del monto del concepto en la nomina anterior
// codigo_concepto = Codigo del concepto
// opcion   = '1' referencia, '2' monto resultado
//========================================================================================
    include 'globales.php';
    $conexion = conexion();
    $consulta = "select * from nomtipos_nomina where codtip='" . $_SESSION['codigo_nomina'] . "'";
    $resultado = query($consulta, $conexion);
    $fila = fetch_array($resultado);
    $consulta = "select max(codnom) as codnom from nom_movimientos_nomina where tipnom='" . $_SESSION['codigo_nomina'] . "' and codnom<" . $fila['codnom'];
    $resultado = query($consulta, $conexion);
    $fila = fetch_array($resultado);
    if (num_rows($resultado) > 0) {
        $ultima_nomina = $fila['codnom'];
    } else {
        $ultima_nomina = 1;
    }


    $consulta = "select * from nom_movimientos_nomina where codnom='$ultima_nomina' and ficha='$FICHA' and codcon='" . $codigo_concepto . "' and tipnom='" . $_SESSION['codigo_nomina'] . "'";
    $resultado = query($consulta, $conexion);

    if (num_rows($resultado) == 0) {
        return 0;
    }
    $fila = fetch_array($resultado);
    switch ($opcion) {
        case '1':
            return $fila['valor'];
        case '2':
            return $fila['monto'];
    }
}

function buscarcuantosconcepto($codigo_concepto, $opcion) {
    //me dice cuantas nomina no le he cobrado este concepto
    include 'globales.php';
    $conexion = conexion();
    $consulta = "select * from nomtipos_nomina where codtip='" . $_SESSION['codigo_nomina'] . "'";
    $resultado = query($consulta, $conexion);
    $fila = fetch_array($resultado);
    $consulta = "select codnom from nom_movimientos_nomina where tipnom='" . $_SESSION['codigo_nomina'] . "' and codnom<'" . $fila['codnom'] . "'  group by codnom order by codnom DESC";
    $resultado2 = query($consulta, $conexion);
    $i = 0;
    while ($fila = fetch_array($resultado2)) {
        $consulta_con = "select * from nom_movimientos_nomina where codnom='" . $fila['codnom'] . "' and ficha='$FICHA' and codcon='" . $codigo_concepto . "' and tipnom='" . $_SESSION['codigo_nomina'] . "'";
        $resultado_con = query($consulta_con, $conexion);
        $concepto = fetch_array($resultado_con);
        if ($concepto['monto'] == 0) {
            $i++;
        } else {
            break;
        }
    }
    return $i;
}

function conceptonomant2ultimavac($codigo_concepto, $opcion, $tipo) {
//========================================================================================
// FUNCION CONCEPTONOMANT: Devuelve el valor del monto del concepto en la nomina anterior
// codigo_concepto = Codigo del concepto
// opcion   = '1' referencia, '2' monto resultado
//========================================================================================
    include 'globales.php';
    $conexion = conexion();
    $consulta = "select * from nomtipos_nomina where codtip='" . $tipo . "'";
    $resultado = query($consulta, $conexion);
    $fila = fetch_array($resultado);
    if (num_rows($resultado) > 0) {
        $ultima_nomina = $fila['codnom'] - 1;
    } else {
        $ultima_nomina = 0;
    }
    $consulta = "select max(nom.codnom) as codnom from nom_movimientos_nomina as nom inner join nom_nominas_pago as pag on pag.codnom=nom.codnom where pag.tipnom='" . $tipo . "' and pag.frecuencia<>8 and nom.tipnom='" . $tipo . "' and nom.codnom<" . $ultima_nomina;
    $resultado = query($consulta, $conexion);
    $fila = fetch_array($resultado);
    if (num_rows($resultado) > 0) {
        $ultima_nomina = $fila['codnom'];
    } else {
        $ultima_nomina = 0;
    }


    $consulta = "select max(nom.codnom) as codnom from nom_movimientos_nomina as nom inner join nom_nominas_pago as pag on pag.codnom=nom.codnom where pag.tipnom='" . $tipo . "' and pag.frecuencia<>8 and nom.tipnom='" . $tipo . "' and nom.codnom<" . $ultima_nomina;
    $resultado = query($consulta, $conexion);
    $fila = fetch_array($resultado);
    if (num_rows($resultado) > 0) {
        $ultima_nomina2 = $fila['codnom'];
    } else {
        $ultima_nomina2 = 0;
    }


    $consulta = "select * from nom_movimientos_nomina where codnom='$ultima_nomina' and ficha='$FICHA' and codcon='" . $codigo_concepto . "' and tipnom='" . $tipo . "'";
    $resultado = query($consulta, $conexion);

    $consulta2 = "select * from nom_movimientos_nomina where codnom='$ultima_nomina2' and ficha='$FICHA' and codcon='" . $codigo_concepto . "' and tipnom='" . $tipo . "'";
    $resultado2 = query($consulta2, $conexion);
    $valor = 0;
    $ref = 0;

    $fila = fetch_array($resultado);
    switch ($opcion) {
        case '1':
            $ref+= $fila['valor'];
        case '2':
            $valor+= $fila['monto'];
    }
    $fila = fetch_array($resultado2);
    switch ($opcion) {
        case '1':
            $ref+= $fila['valor'];
        case '2':
            $valor+= $fila['monto'];
    }
    switch ($opcion) {
        case '1':
            return $ref;
        case '2':
            return $valor;
    }
}

function conceptonomant2ultima($codigo_concepto, $opcion) {
//========================================================================================
// FUNCION CONCEPTONOMANT: Devuelve el valor del monto del concepto en la nomina anterior
// codigo_concepto = Codigo del concepto
// opcion   = '1' referencia, '2' monto resultado
//========================================================================================
    include 'globales.php';
    $conexion = conexion();
    $consulta = "select * from nomtipos_nomina where codtip='" . $_SESSION['codigo_nomina'] . "'";
    $resultado = query($consulta, $conexion);
    $fila = fetch_array($resultado);

    $consulta = "select max(nom.codnom) as codnom from nom_movimientos_nomina as nom inner join nom_nominas_pago as pag on pag.codnom=nom.codnom where pag.tipnom='" . $_SESSION['codigo_nomina'] . "' and pag.frecuencia<>8 and nom.tipnom='" . $_SESSION['codigo_nomina'] . "' and nom.codnom<" . ($fila['codnom'] - 1);
    $resultado = query($consulta, $conexion);
    $fila = fetch_array($resultado);
    if (num_rows($resultado) > 0) {
        $ultima_nomina = $fila['codnom'];
    } else {
        $ultima_nomina = 0;
    }
    $consulta = "select max(nom.codnom) as codnom from nom_movimientos_nomina as nom inner join nom_nominas_pago as pag on pag.codnom=nom.codnom where pag.tipnom='" . $_SESSION['codigo_nomina'] . "' and pag.frecuencia<>8 and nom.tipnom='" . $_SESSION['codigo_nomina'] . "' and nom.codnom<" . $ultima_nomina;
    $resultado = query($consulta, $conexion);
    $fila = fetch_array($resultado);
    if (num_rows($resultado) > 0) {
        $ultima_nomina2 = $fila['codnom'];
    } else {
        $ultima_nomina2 = 0;
    }

    $consulta = "select * from nom_movimientos_nomina where codnom='$ultima_nomina' and ficha='$FICHA' and codcon='" . $codigo_concepto . "' and tipnom='" . $_SESSION['codigo_nomina'] . "'";
    $resultado = query($consulta, $conexion);

    $consulta2 = "select * from nom_movimientos_nomina where codnom='$ultima_nomina2' and ficha='$FICHA' and codcon='" . $codigo_concepto . "' and tipnom='" . $_SESSION['codigo_nomina'] . "'";
    $resultado2 = query($consulta2, $conexion);
    $valor = 0;
    $ref = 0;

    $fila = fetch_array($resultado);
    switch ($opcion) {
        case '1':
            $ref+= $fila['valor'];
        case '2':
            $valor+= $fila['monto'];
    }
    $fila = fetch_array($resultado2);
    switch ($opcion) {
        case '1':
            $ref+= $fila['valor'];
        case '2':
            $valor+= $fila['monto'];
    }
    switch ($opcion) {
        case '1':
            return $ref;
        case '2':
            return $valor;
    }
}

function conceptonomant2ultimaSF($codigo_concepto, $ficha, $opcion) {
//========================================================================================
// FUNCION CONCEPTONOMANT: Devuelve el valor del monto del concepto en la nomina anterior
// codigo_concepto = Codigo del concepto
// opcion   = '1' referencia, '2' monto resultado
//========================================================================================
    include 'globales.php';
    $conexion = conexion();
    $consulta = "select * from nomtipos_nomina where codtip='" . $_SESSION['codigo_nomina'] . "'";
    $resultado = query($consulta, $conexion);
    $fila = fetch_array($resultado);

    $consulta = "select max(nom.codnom) as codnom from nom_movimientos_nomina as nom inner join nom_nominas_pago as pag on pag.codnom=nom.codnom where pag.tipnom='" . $_SESSION['codigo_nomina'] . "' and pag.frecuencia<>8 and nom.tipnom='" . $_SESSION['codigo_nomina'] . "' and nom.codnom<" . ($fila['codnom'] - 1);
    $resultado = query($consulta, $conexion);
    $fila = fetch_array($resultado);
    if (num_rows($resultado) > 0) {
        $ultima_nomina = $fila['codnom'];
    } else {
        $ultima_nomina = 0;
    }
    $consulta = "select max(nom.codnom) as codnom from nom_movimientos_nomina as nom inner join nom_nominas_pago as pag on pag.codnom=nom.codnom where pag.tipnom='" . $_SESSION['codigo_nomina'] . "' and pag.frecuencia<>8 and nom.tipnom='" . $_SESSION['codigo_nomina'] . "' and nom.codnom<" . $ultima_nomina;
    $resultado = query($consulta, $conexion);
    $fila = fetch_array($resultado);
    if (num_rows($resultado) > 0) {
        $ultima_nomina2 = $fila['codnom'];
    } else {
        $ultima_nomina2 = 0;
    }

    $consulta = "select * from nom_movimientos_nomina where codnom='$ultima_nomina' and ficha='" . $ficha . "' and codcon='" . $codigo_concepto . "' and tipnom='" . $_SESSION['codigo_nomina'] . "'";
    $resultado = query($consulta, $conexion);

    $consulta2 = "select * from nom_movimientos_nomina where codnom='$ultima_nomina2' and ficha='" . $ficha . "' and codcon='" . $codigo_concepto . "' and tipnom='" . $_SESSION['codigo_nomina'] . "'";
    $resultado2 = query($consulta2, $conexion);
    $valor = 0;
    $ref = 0;

    $fila = fetch_array($resultado);
    switch ($opcion) {
        case '1':
            $ref+= $fila['valor'];
        case '2':
            $valor+= $fila['monto'];
    }
    $fila = fetch_array($resultado2);
    switch ($opcion) {
        case '1':
            $ref+= $fila['valor'];
        case '2':
            $valor+= $fila['monto'];
    }
    switch ($opcion) {
        case '1':
            return $ref;
        case '2':
            return $valor;
    }
}

function campoadicionalper($idcampo) {
    include 'globales.php';
    $conexion = conexion();
    $consulta = "select valor from nomcampos_adic_personal where id='" . $idcampo . "' and ficha='" . $FICHA . "' and tiponom=$_SESSION[codigo_nomina]";
    $resultado = query($consulta, $conexion);
    if (num_rows($resultado) == 0) {
        return;
    } else {
        $fila = fetch_array($resultado);
        return $fila['valor'];
    }
}

function puntos($nivel, $codnivel) {
    $conexion = conexion();
    $consulta = "SELECT sum(grado) as suma FROM nomcargos  as nc inner join nompersonal as np on (nc.cod_car=np.codcargo) where np.codnivel$nivel=$codnivel";
    $resultado = query($consulta, $conexion);
    $fila = fetch_array($resultado);
    return $fila['suma'];
}

function entrefechas($inicio, $fin, $fecha) {
    if ($fecha == null || $fecha == "") {
        return "NO";
    } else {
        $fecha = sumadia($fecha, 1);
        if (($fecha >= $inicio) && ($fecha <= $fin))
            return "SI";
        else
            return "NO";
    }
}

function control($cedula, $concepto) {
    $conexion = conexion();
    #$consulta = "SELECT sum(valor) as suma FROM procesar where concepto='" . $concepto . "' and trabajador='" . $cedula . "'";
    $consulta = "SELECT valor FROM procesar p INNER JOIN nompersonal np ON p.trabajador = np.ficha WHERE p.concepto = '" . $concepto . "' AND np.cedula = '" . $cedula . "'";
    $resultado = query($consulta, $conexion);
    $fila = fetch_array($resultado);
    return $fila['valor'];
}

function hcm($cedula) {
    $conexion = conexion();
    $consulta = "Select * from nomfamiliares where cedula='" . $cedula . "' and afiliado=1";
    $familiares = query($consulta, $conexion);
    $acumulado = 0;
    while ($fila = fetch_array($familiares)) {
        $anos = antiguedad($fila['fecha_nac'], date('Y-m-d'), 'A');
        $consulta_seg = "select * from nomseguro where desde_seg<=" . $anos . " and hasta_seg>=" . $anos;
        $monto = query($consulta_seg, $conexion);
        $fila2 = fetch_array($monto);
        $acumulado+=$fila2["monto_seg"];
    }
    return $acumulado;
}

function hcm_total($cedula) {
    $conexion = conexion();
    $consulta = "SELECT fechavac,fechareivac  FROM nom_progvacaciones WHERE (tipooper='DA' OR tipooper='DV') AND ceduda=$cedula  AND estado='Pendiente' AND fechavac<>'0000-00-00' and fechareivac<>'0000-00-00'";
    $resultado = query($consulta, $conexion);
    $suma = 0;
    $monto = hcm($cedula);
    while ($fila = fetch_array($resultado)) {
        $suma++;
    }
    $total = $monto * $suma;
    return $total;
}

function hcm_persona($cedula) {
    $conexion = conexion();
    $consulta = "Select * from nompersonal where cedula='" . $cedula . "'";
    $personal = query($consulta, $conexion);
    $fila = fetch_array($personal);
    $anos = antiguedad($fila['fecnac'], date('Y-m-d'), 'A');
    $consulta_seg = "select * from nomseguro where desde_seg<=" . $anos . " and hasta_seg>=" . $anos;
    $monto = query($consulta_seg, $conexion);
    $fila = fetch_array($monto);
    $acumulado = $fila["monto_seg"];

    return $acumulado;
}

function suma_fechas($fecha, $ndias) {
//$fecha="2005-10-03"; // tu sabrÃ¡s como la obtienes, solo asegurate que tenga este formato

    $nuevafecha = date("Y-m-d", strtotime("$fecha +$ndias day"));
    return ($nuevafecha);
}

function cumpleperiodo($fecha, $fechades, $fechahas) {
    if (($fecha >= $fechades)) {
        return $resp = "NO";
    } else {
        $diaantes = suma_fechas($fechades, -1);
        $antes = antiguedad($fecha, $diaantes, "A");
        $ahora = antiguedad($fecha, $fechahas, "A");

        if (($antes == $ahora))
            return $resp = "NO";
        else
            return $resp = "SI";
    }
}

/*Función hecha para trabajar con control de acceso*/
function diastrabajados($cedula, $cod_concepto, $fecha_ini, $fecha_fin) {
    $conexion = conexion();
    $consulta = "SELECT cod_enca FROM control_encabezado WHERE fecha_ini = '{$fecha_ini}' AND fecha_fin = '{$fecha_fin}'";
    $result = query($consulta, $conexion);
    $control_encabezado = fetch_array($result);

    $consulta = "SELECT ficha FROM nompersonal WHERE cedula = {$cedula}";
    $result = query($consulta, $conexion);
    $nompersonal = fetch_array($result);

    #$consulta = "SELECT valor FROM control_acceso ca INNER JOIN nompersonal np ON ca.cod_trabajador = np.ficha AND np.cedula = {$cedula} WHERE ca.cod_enca = {$control_encabezado['cod_enca']} AND ca.concepto = {$cod_concepto} AND ca.cod_compania = {$_SESSION['cod_empresa']} AND ca.cod_nomina = {$_SESSION['codigo_nomina']}";
    $consulta = "SELECT valor FROM control_acceso WHERE cod_trabajador = '{$nompersonal['ficha']}' AND cod_enca = '{$control_encabezado['cod_enca']}' AND concepto = '{$cod_concepto}' AND cod_compania = '{$_SESSION['cod_empresa']}' AND cod_nomina = '{$_SESSION['codigo_nomina']}'";
    $personal = query($consulta, $conexion);
    $fila = fetch_array($personal);
    #$anos = antiguedad($fila['fecnac'], date('Y-m-d'), 'A');
    #$consulta_seg = "select * from nomseguro where desde_seg<=" . $anos . " and hasta_seg>=" . $anos;
    #$monto = query($consulta_seg, $conexion);
    #$fila = fetch_array($monto);
    return $fila["valor"];
}

?>
