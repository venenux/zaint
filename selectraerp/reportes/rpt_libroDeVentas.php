<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Libro_de_ventas.xls");
include('config_reportes.php');
include('../../menu_sistemas/lib/common.php');

$fecha = @$_GET["fecha"];
$comunes = new ConexionComun();

$datosGenerales = $comunes->ObtenerFilasBySqlSelect("select * from parametros_generales");
$fechaz = $fecha . "-01";
$arrayFacturas = $comunes->ObtenerFilasBySqlSelect("
SELECT f.*, c.nombre, c.direccion, c.nit,c.cod_cliente, c.telefonos,c.direccion, c.rif FROM factura f inner join clientes c on c.id_cliente = f.id_cliente  where month(f.fechaFactura) = month('$fechaz') and year(f.fechaFactura) = year('$fechaz')");
$array_facturas_devueltas = $comunes->ObtenerFilasBySqlSelect("SELECT * FROM factura_devolucion");
$mes = mesaletras(substr($fecha, 5, 2));
?>
<table border="1">
    <tr style="Font-weight: bold;" >
        <td align='center' colspan="8" >RELACION DE VENTAS <?php echo $mes . " " . substr($fecha, 0, 4); ?></td>
        <td colspan="5">EMPRESA: <?php echo $datosGenerales[0]["nombre_empresa"]; ?></td>
        <td colspan="4">RIF: <?php echo $datosGenerales[0]["rif"]; ?></td>
    </tr>
    <tr style="Font-weight: bold;">
        <td>Oper. Nro.</td><td>Fecha Factura</td><td>Nombre o Razon social del Cliente</td><td>C.I/R.I.F./PAS</td><td>N Factura</td><td>Nota de Debito</td><td>Nota de Credito</td><td>Total de Ventas con IVA</td><td>Ventas no gravadas</td><td>Base Imponible</td><td>%</td><td>IVA</td><td>IVA Retenido</td><td>Nro. de Comprobante de Retencion</td>
    </tr>
    <tr>
        <?php
        $totalDebito = $totalCredito = $totalVentasConIva = $totalVentasNoGravadas = $totalBaseImponible = $totalIva = $totalIvaRet = 0;
        $i = 0;
        
        /*  nuevo */
        
              
        
        
        while ($arrayFacturas[$i]) {
            $iva_factura = ($arrayFacturas[$i][ivaTotalFactura]);
            $total_factura = ($arrayFacturas[$i][totalizar_total_general]);
            if ($iva_factura>0){
                $gb=0;
            }else{
               $gb=$total_factura; 
            }
            
            if ($iva_factura>0){
                $totalconiva=$total_factura ;
                $porc = 12;
            }else{
               $totalconiva=0; 
               $porc = 0;
            }
            
           // $porc = ($arrayFacturas[$i][ivaTotalFactura] * 100) / $arrayFacturas[$i][montoItemsFactura];
           // if (($porc >= 11.9) && ($porc < 12))
                //$porc = 12;
           // echo "<td>" . ($i + 1) . "</td><td>" . $arrayFacturas[$i][fechaFactura] . "</td><td>" . $arrayFacturas[$i][rif] . "</td><td>" . $arrayFacturas[$i][nombre] . "</td><td>" . $arrayFacturas[$i][cod_factura] . "</td><td>" . $arrayFacturas[$i][cod_factura] . "</td><td>0,00</td><td>0,00</td><td></td><td></td><td>" . ( + $arrayFacturas[$i][ivaTotalFactura]) . "</td><td></td><td>" . $arrayFacturas[$i][totalizar_base_imponible] . "</td><td>" . $porc . "</td><td>" . $arrayFacturas[$i][ivaTotalFactura] . "</td><td>" . $arrayFacturas[$i][totalizar_total_retencion] . "</td><td>0</td>";
            echo "<td>" . ($i + 1) . "</td><td>" . $arrayFacturas[$i][fechaFactura] . "</td><td>" . $arrayFacturas[$i][nombre] . "</td><td>" . $arrayFacturas[$i][rif]  . "</td><td>" . $arrayFacturas[$i][cod_factura] . "</td><td>0,00</td><td>0,00</td> <td>" . $totalconiva. "</td> <td>" . $gb. "</td>  <td>" . $arrayFacturas[$i][totalizar_base_imponible]  . "</td> <td>" . $porc. "</td><td>" . $arrayFacturas[$i][ivaTotalFactura] . "</td><td>" . $arrayFacturas[$i][totalizar_total_retencion] . "</td><td>0</td>       ";
            
            echo "</tr>";
            $totalDebito+=0;
            $totalCredito+=0;
            //$totalVentasConIva+=($arrayFacturas[$i][montoItemsFactura] + $arrayFacturas[$i][ivaTotalFactura]);
            $totalVentasConIva+=$totalconiva;
            $totalVentasNoGravadas+=$gb;
            $totalBaseImponible+=$arrayFacturas[$i][totalizar_base_imponible];
            $totalIva+=$arrayFacturas[$i][ivaTotalFactura];
            $totalIvaRet+=$arrayFacturas[$i][totalizar_total_retencion];
            $i++;
        }
        echo "<tr><td colspan='6'> TOTAL: </td> <td> </td>  <td>" . $totalVentasConIva . "</td> <td>" . $totalVentasNoGravadas . "</td><td>" . $totalBaseImponible . "</td><td></td><td>" . $totalIva . "</td><td>" . $totalIvaRet . "</td><td></td>";
        #echo "</tr>";
        ?>
    </tr>
</table>