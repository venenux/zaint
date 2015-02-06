<?php
if (!isset($_SESSION)) {
    session_start();
    ob_start();
}
include ('../general.config.inc.php');
?>

<html>
    <head>
        <title>:: Selectra ::</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="estilos.css" rel="stylesheet" type="text/css" />
    </head>
    <body class="fondo" style='background:white; -moz-border-radius:10px'>

<?php
include("lib/common.php");
$config = parse_ini_file("lib/selectra.ini");
?>
        <script  language="JavaScript" type="text/javascript">
            function seleccionar(fila){
                //var tabla=document.getElementById('fila')
                var item=document.getElementById(fila)
                var i=1
                var fil=document.getElementById(i)
                while(fil!=null){
                    fil.style.background=""
                    i=i+1
                    var fil=document.getElementById(i)
                }
                item.style.background="#60B6F0"
                var sel=parent.document.getElementById("codigo_empresa")
                sel.value=item.id
            }
        </script>
        <table width="100%" cellspacing="0" border="0" cellpadding="0" id="lst" style='background:white'>
<?php
$global = new bd(SELECTRA_CONF_PYME);
$sentencia = "select * from " . $_GET['tabla'];

$resultado = $global->query($sentencia);
if ($resultado->num_rows == 0) {
    echo "<script languaje=\"Javascript\">window.open(\"empresas_agregar.php?tabla=" . $_GET['tabla'] . "\",'','left=300,width=600,height=200,resizable=no')</script>";
} else {

    while ($fila = $resultado->fetch_assoc()) {
        ?><tr style="margin-left: 20px;">
                        <td height="27" id="<? echo $fila['codigo'] ?>"  onclick="seleccionar(this.id)"><div align="left"><span><? echo $fila['nombre'] ?></span></div></td>
                    </tr>
                <?
                }
            }
            ?>
        </table>
