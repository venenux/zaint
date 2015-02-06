<?php
require_once 'lib/config.php';
require_once 'lib/common.php';
include ("header.php");
$sw1 = false;
$sw2 = false;
$cantidad_registros = 40;

$conectar = conexion();

$Numcom = (empty($_REQUEST['Numcom'])) ? '' : $_REQUEST['Numcom']; //$_POST['fechadesde'];
$consulta_pag = "select * from cwcondco where Numcom=" . $Numcom;
$rs = query($consulta_pag, $conectar);

$num_paginas = obtener_num_paginas($consulta_pag, $cantidad_registros);
$pagina = obtener_pagina_actual($pagina, $num_paginas);

function imprimir_datos($pagina, $num_paginas, $Numcom, $Nombre) {

    $conexion = conexion();
    $Fecha = date("d/m/Y", time());
    $Hora = date("h:i");
    $consulta_emp = "SELECT * FROM cwconemp";
    $res_emp = query($consulta_emp, $conexion);
    $row_emp = mysql_fetch_array($res_emp);
    $Nomemp = $row_emp["Nomemp"];
    $logo= $row_emp["imagen"];
    //$fechaini = $row_emp["Fechaini"];
    $consulta_com = "SELECT * FROM cwconhco where Numcom=" . $Numcom;
    $res_com = query($consulta_com, $conexion);
    $row_com = fetch_array($res_com);
    $Nombre = $row_com['Descrip'];

    $datos_orden = '
<br>
<table width="70%" border="0" align="center">
<tr>
	<td valign="top" width="20" rowspan="3"><img src="Imagenes/'.$logo.'" width="70" height="76"> </td>
<tr>
<tr>
	<td valign="top" >  

			<table border="0" width="100%"> 
                        <tr>
                                <td colspan="4"><center>' . $Nomemp . '</center></td>
                        </tr>
                        <tr>
                                <td colspan="4"><center>REPORTE DE COMPROBANTE</center></td>
                        </tr>
                        <tr>
                                <td  colspan="4"><center>Sistema de Contabilidad</center></td>
                        </tr>
       				<td colspan="4">
					<center>
						Nro: ' . $Numcom . ' ' . $Nombre . '
					</center>
				</td>

				</tr>
                         <tr>
                                <td align= "right" colspan="4">Fecha: ' . $Fecha . '</td>
                        </tr>
                        <tr>
                                <td align="right" colspan="4">Pag.: ' . $pagina . '</td>
                        </tr>
                        <tr>
                                <td align="right" colspan="4">Hora: ' . $Hora . '</td>
                       </tr>
			</table>
	</td>
</tr>

</table>';



    /*
      $datos_orden='<br>
      <table width="800" border="1" align="center">
      <tr>
      <td  align="center" valign="top" rowspan="3"><img src="Imagenes/escudosanfco.png" width="90" height="80"></td>
      <td width="150" class="texto8" align="left">'.$Nomemp.'</td>
      <td></td>
      <td width="150" class="texto10" align="right" colspan ="3"><strong>Pág.: '.$pagina.'</strong></td>
      </tr>
      <tr>
      <td>Pag: '.$pagina.'</td>
      <td>Fecha: '.$Fecha.'</td>>
      </tr>




      tema de Contabilidad
      <br>
      Nro: '.$Numcom.' '.$Nombre.'
      </center>
      </td>
      <td width="150" class="texto10" align="right" colspan="3">Fecha: '.$Fecha.'</td>
      </tr>
      <tr>
      <td></td>
      <td></td>
      <td width="200" class="texto8" align="left"></td>
      <td width="200" align="right" class="texto10" colspan="2">Hora: '.$Hora.'</td>
      </tr>
      </table>

      <br><br>
      ';/ */
    
    echo $datos_orden . "<br>";

//cerrar_conexion($conexion);
//return $fechaini;
//$pie=pie_inzuvi();
}

function datos_cuenta($codigo, $descripcion, $saldoanterior, $saldoactual) {

    $datos_cuenta = '

<table width="800" border="0" align="center">
		<tr>
          	        <td width="175" align="left" class="texto10"><strong>' . $codigo . '</strong></td>
			<td width="325" align="justify" class="texto10"><strong>' . $descripcion . '</strong></td>
			<td width="150" align="right" class="texto10"><strong>' . $saldoanterior . '</strong></td>
			<td width="150" align="right" class="texto10"><strong>' . $saldoactual . '</strong></td>
   		</tr>
	</table>';
    echo $datos_cuenta;
}
?>
<div align="right"><INPUT type="button" name="imprimir" value="Imprimir" onclick="javascript:imprimir('impresion')"></div>
<div id="impresion">
    <?
    imprimir_datos($pagina++, $num_paginas, $Numcom, $Nombre);

//datos_de_orden($var_nomemp,$var_direccion,$var_fecha,$var_nom_und,$var_monto_orden,$var_codigo,$var_dias_credito);
    ?> 
<!--<table width="800" border="1" align="center">-->
    <?
    $cont = 1;

    $result_cuenta = mysql_query("SELECT * FROM cwcondco WHERE Numcom='$Numcom'", $conectar);

    $Debito_total = 0;
    $Credito_total = 0;


    if (mysql_num_rows($result_cuenta)) {
        while ($row = @mysql_fetch_array($result_cuenta)) {
            $Cuenta_query = $row["Cuenta"];
            $result = mysql_query("SELECT * FROM cwconcue where Cuenta='$Cuenta_query' ORDER BY Cuenta DESC", $conectar);
            $rowa = @mysql_fetch_array($result);
            $Descrip = $rowa["Descrip"];

            $Numlim = $row["Numlim"];

            $Debito = $row["Debito"];
            $Credito = $row["Credito"];

            $Debito_float = ((real) $Debito);
            $Credito_float = ((real) $Credito);

            $Debito_float_format = number_format($Debito_float, 2, ',', '.');
            $Credito_float_format = number_format($Credito_float, 2, ',', '.');

            $Debito_float_format = ((string) $Debito_float_format);
            $Credito_float_format = ((string) $Credito_float_format);

            $Tiporef = $row["Tiporef"];

            if ($sw1 == false) {
                echo '
 <table width="800" align="center" style="border-bottom:1px solid black;background-color:white; ">

<tr style="background-color:#c9c9c9;border-bottom-style : outset; border-left-style : outset; border-right-style : outset; border-top-style : outset;">
        <td width="70"  align="center"><strong>Fecha</strong></td>
        <td width="50"  align="center"><strong>Cuenta</strong></td>
        <td width="5"  align="center"><strong>Ref<strong></td>
        <td width="30"  align="right" ><strong>Tipo</strong></td>
        <td width="200" align="center"><strong>Asiento</strong></td>
        <td width="100" align="right"><strong>Debito</strong></td>
        <td width="100" align="right"><strong>Credito</strong></td>
</tr>
';

                $sw1 = true;
            }



            $color = "white";


            echo '
	<tr style="border-bottom: 1px solid black;background-color:' . $color . ';">
<td width="70" valign="top" align="left" style="border-left:1px solid black;">' . $row["FechaD"] . '</td>
<td width="50" valign="top" align="left" style="border-left:1px solid black;">' . $row["Cuenta"] . '</td>
<td width="5" valign="top" align="center" style="border-left:1px solid black;">' . $row["Referen"] . '</td>
<td width="30" valign="top" align="center" style="border-left:1px solid black;">' . $row["Tiporef"] . '</td>
<td width="200" valign="top" align="justify" style="border-left:1px solid black;" >' . $row["Descrip"] . '</td>
<td width="100" valign="top" align="right" style="border-left:1px solid black;" >' . $Debito_float_format . '</td>
<td width="100" valign="top" align="right" style="border-left:1px solid black;border-right:1px solid black;">' . $Credito_float_format . '</td>
	</tr>';
            //$Salantu = $Salactu;

            $nro_lineas = contar_lineas($row["Descrip"], 45);
            //echo $nro_lineas;
            $cont = $cont + $nro_lineas - 1;

            if ($cont >= $cantidad_registros) {
                echo "</table><br class=\"saltopagina\">";
                if ($pagina > $num_paginas) {
                    $num_paginas++;
                }
                //echo $encabezado.'<br><br>';
                imprimir_datos($pagina++, $num_paginas, $Numcom, $Nombre);

                echo '
 <table width="800" align="center" style="border-bottom:1px solid black;background-color:white; ">

<tr style="background-color:#c9c9c9;border-bottom-style : outset; border-left-style : outset; border-right-style : outset; border-top-style : outset;">
        <td width="70"  align="center"><strong>Fecha</strong></td>
        <td width="50"  align="center"><strong>Cuenta</strong></td>
        <td width="1"  align="center"><strong>Ref<strong></td>
        <td width="30"  align="right" ><strong>Tipo</strong></td>
        <td width="200" align="center"><strong>Asiento</strong></td>
        <td width="100" align="right"><strong>Debito</strong></td>
        <td width="100" align="right"><strong>Credito</strong></td>
</tr>
';
//	echo '<table width="800" border="0" align="center" cellpadding="2" cellspacing="2" class="">';


                $cont = 1;
            } else {
                $cont++;
            }
            //echo "Cont: ".$cont;
            if ($cont > $cantidad_registros) {
                echo "</table>";
            }
        }

        $result_sum = mysql_query("SELECT Sum(Debito) as suma_Debito FROM cwcondco WHERE Numcom='$Numcom'", $conectar); //SUMA DE DEBITOS DE LISTA DE ASIENTOS
        $Debito_total_array = mysql_fetch_array($result_sum);

        $result_sum = mysql_query("SELECT Sum(Credito) as suma_Credito FROM cwcondco WHERE Numcom='$Numcom'", $conectar); //SUMA DE DEBITOS DE LISTA DE ASIENTOS
        $Credito_total_array = mysql_fetch_array($result_sum);

        $Debito_total = $Debito_total_array["suma_Debito"];
        $Credito_total = $Credito_total_array["suma_Credito"];

        $Total = $Debito_total - $Credito_total;

        $result_lineas = mysql_query("SELECT COUNT(*) FROM cwcondco WHERE Numcom='$Numcom'", $conectar); //SUMA DE DEBITOS DE LISTA DE ASIENTOS
        $Total_lineas_row = mysql_fetch_row($result_lineas);

        $Total_lineas = $Total_lineas_row[0];

        $result_estado_contabilizado = mysql_query("SELECT * FROM cwconhco WHERE Numcom='$Numcom'", $conectar); //VALIDA SI ESTA CONTABILIZADO
        $Total_estado_contabilizado = mysql_fetch_array($result_estado_contabilizado);
        $Estado_array_valida = $Total_estado_contabilizado["Estado"];
        if (($Estado_array_valida == 1) || ($Estado_array_valida == 3)) {
            if ($Total <> 0) {
                $descuadrado = mysql_query("UPDATE cwconhco SET Estado='3' WHERE Numcom='$Numcom'", $conectar);  //DESCUADRADO	 
            } else if ($Total == 0) {
                $descuadrado = mysql_query("UPDATE cwconhco SET Estado='1' WHERE Numcom='$Numcom'", $conectar);  //EN TRANSITO	 
            }
        }
    }
    echo '<table width="800" border="0" align="center">
				<tr><td  width="800" colspan="3" align="right">_______________________________________</td></tr>
				<tr>
					<td width="570" aling="left"><strong>TOTAL DE CUENTA: </strong></td>
					<td width="115"align="right" class="texto8">' . $Debito_total . '</td>
					<td width="115" align="right" class="texto8">' . $Credito_total . '</td>
				</tr>
				<br>
				<tr><td  align="center" colspan="3">Diferencia: ' . $Total . '</td></tr>
				<tr><td  align="center" colspan="3">Nro. L&iacute;neas: ' . $Total_lineas . '</td></tr>
			  </table>';
    echo "<br>";
    ?>
    <? cerrar_conexion($conectar); ?>

</div>

</body>
</html>

    <?
//De aqui pa bajo arreglar...
    ?>


