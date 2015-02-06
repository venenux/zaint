<?php

if ($_GET["generar"] == "si") {
    $directorio = "C:\FACTURAS\\";
    $nombre_archivo_spooler = "Selectra.001";
    $ruta = $directorio . $nombre_archivo_spooler;
    $archivo_spooler = fopen($ruta, "w");
    chmod($directorio, 0777);
    chmod($ruta, 0777);
    fwrite($archivo_spooler, "TIPO>X</TIPO");
    fclose($archivo_spooler);

    header("Location: index.php?opt_menu=106");
}
?>
