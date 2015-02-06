<?php ?>
<html>
    <head>
        <title>.: SELECTRA N&Oacute;MINA :.</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" type="text/css" href="../includes/css/estilos.css" />
        <link rel="stylesheet" type="text/css" href="../includes/css/index.css" />
        <link rel="shortcut icon" href="../includes/imagenes/logo.ico" />
    </head>
    <body>
        <?php
        if (!isset($_SESSION)) {
            session_start();
            ob_start();
        }
        #include ('../generalp.config.inc.php');
        # lo anterior, incluido en include, estaba antes arriba
        include("lib/common.php");

        if (isset($_POST['tabla'])) {
            $enlace = new bd(SELECTRA_CONF_PYME);
            $sentencia = "select * from " . $_POST['tabla'] . " where codigo = '" . $_POST['codigo_empresa'] . "'";
            $resultado = $enlace->query($sentencia);

            $fila = $resultado->fetch_assoc();
            $_SESSION['cod_empresa'] = $_POST['codigo_empresa'];# Agregado 27-06-2012 para guardar en la tabla de control de acceso y en la tabla nomcalendarios_tiposnomina (28-06-2012)
            $_SESSION['empresa'] = $fila['nombre'];
            $_SESSION['bd'] = $fila['bd_nomina'];
            #echo "la base de datos es: ".$_SESSION['bd']." y el nombre es: ".$_SESSION['empresa'];
            #exit(0);
            switch ($_POST['tabla']) {
                case 'conempresa':
                    $url = "../contabilidad";
                    break;
                case 'nomempresa':
                    $url = "login.php";
                    break;
                case 'bienempresa':
                    $url = "../bienes";
                    break;
            }

            echo "<script type=\"text/javascript\">window.location.href=\"" . $url . "\"</script>";
        }
        $config = parse_ini_file("lib/selectra.ini");
        ?>
        <form action="seleccionar_empresa.php" method="post" name="seleccionar_empresa" id="seleccionar_empresa">
            <input type="hidden" name="tabla" value="<? echo $_GET['tabla'] ?>"/>
            <div class="contenedor">
                <div id="listado">
                    <table style='border-style:none'>
                        <tr>
                            <td><div style='border-style:none'><img src="../includes/imagenes/logo.png" width="400" height="90" /></div></td>
                        </tr>
                        <tr>
                            <td style='padding:10px'>
                                <hr/>
                                <div class="titulo1">SELECCIONE UNA EMPRESA PARA CONTINUAR </div>
                                <hr/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <iframe class="seleccionEmpresa" src="listado_empresas.php?tabla=<?php echo $_GET['tabla'] ?>" ></iframe>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <hr/>
                            </td>
                        </tr>
                        <tr>
                            <td id="seleccion"><input type="hidden" id="codigo_empresa" name="codigo_empresa" /></td>
                        </tr>
                    </table>
                </div>
                <table>
                    <tbody>
                        <tr>
                            <td style="width:50%; float:left; background:none;"><img src="../includes/imagenes/asys.png" style="width:60%"/></td>
                            <td style="width:15%; float:right; padding-right: 45px;"><?php btn2('Seleccionar', 'document.seleccionar_empresa.submit()', 'ok.gif') ?></td>
                            <td style="width:15%; float:right; padding-right: 10px;"><?php btn2('Agregar', 'window.open(\'empresas_agregar.php?tabla=nomempresa\',\'\',\'width=500,height=200\')', 'add.gif') ?></td>
                        </tr>
                    </tbody>
                </table>
                <div style="text-align: center; border-color: transparent;">
                    <a target="_self" href="../entrada/index.php"><img src="imagenes/back.gif"/>&nbsp;Ir al Men&uacute; de Sistemas</a>
                </div>
            </div>
        </form>
    </body>
</html>
