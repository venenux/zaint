<?php ?>
<html>
    <head>
        <title>.: SELECTRA N&Oacute;MINA :.</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="estilos.css" rel="stylesheet" type="text/css" />
    </head>
    <body class="fondo">
        <style>
            input{
                width:200px;
            }
            input.inc{
                background: #FDA08F ;
                border-color: #E91D18;
            }
            input.corr{
                background:#C6FFC6;
                border-color: #33CC00;
            }
            .procesando{
                width:401px;
                height: 400px;
                background:white;
                position:absolute;
                border:0.1px;
                border-style:solid;
                border-color:green;
                -moz-border-radius:10px;
                margin: auto 0 auto 0;
            }
            span.error{
                font-weight:normal;
                text-align:left;
                color: #C00;
                width:140px;
                padding-left:25px;
                background-attachment: scroll;
                background-image: none;
                background-repeat: no-repeat;
                background-position: left;
            }
            .columna1{
                background:white;
                opacity:0.7;
                -moz-border-radius:10px;
                margin-left:20px;
                padding-left:10px;

            }
            .titulo1{
                font-size:10px;
                font-family:arial;
                font-weight:bold;
                text-align:center;
            }
            #nuevaEmpresa td{
                color:black;
                font-size:10px;
                font-family:arial;
                text-transform:uppercase;
            }
            #nuevaEmpresa{
                background-color:#ecEdeF;
                position:absolute;
                top:10px;
                left:10px;
                width:320px;
                height:120px;
                padding:10px;
                font-size:10px;
                font-family:arial;
                border:0.1px;
                border-style:solid;
                border-color:green;
                -moz-border-radius:10px;
            }

            hr{
                color:white;
            }
            .contenedor{
                border:0.1px;
                width:401;
                border-style:solid;
                border-color:blue;
                -moz-border-radius:10px;
                height:390px
            }
            .seleccionEmpresa{
                border:0.1px;
                background:white
                    margin-left:7px;
                width:387px;
                height:120px;
                border-style:solid;
                border-color:blue;
                -moz-border-radius:10px;
            }
        </style>

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
        </font>
    <center>
        <form action="seleccionar_empresa.php" method="post" name="seleccionar_empresa" id="seleccionar_empresa">
            <INPUT type="hidden" name="tabla" value="<? echo $_GET['tabla'] ?>">
            <div align="center">
                <p>&nbsp;</p>
                <div class="contenedor">
                    <table width="400"  border="0" align="center" cellpadding="0"  style='border-style:none'>
                        <tr>
                            <td background=""><div align="center" style='border-style:none'><img src="img_sis/logo.png" width="401" height="100" /></div></td>
                        </tr>
                        <tr>
                            <td  align="center" style='padding:10px' ><hr ><strong>Por favor Seleccione una Empresa para continuar</strong> <hr ></td>
                        </tr>
                        <tr>
                            <td> &nbsp;
                                <iframe class="seleccionEmpresa"   src="listado_empresas.php?tabla=<? echo $_GET['tabla'] ?>" ></iframe></td>
                        </tr>
                        <tr>
                            <td>
                                <hr >
                            </td>
                        </tr>
                        <tr>
                            <td id="seleccion" align="center"><INPUT type="hidden" id="codigo_empresa" name="codigo_empresa" ></td>
                        </tr>
                        <tr>
                        <table width="100%" border="0">
                            <tbody>
                                <tr>
                                    <td align="left"><img src="img_sis/<?php echo $config['logo'] ?>" width="60%"/></td>
                                    <td align="right" width="15%"><?php btn2('Seleccionar', 'document.seleccionar_empresa.submit()', 'ok.gif') ?></td>
                                    <td align="right" width="15%"><?php btn2('Agregar', 'window.open(\'empresas_agregar.php?tabla=nomempresa\',\'\',\'width=500,height=200\')', 'add.gif') ?></td>

                                </tr>
                            </tbody>
                        </table>
                </div>
                </td>
                </tr>
                <tr>
                    <td align="center" ><br><a target="_self" href="../entrada/index.php" ><img src="img_sis/back.png" border="0" width="16" height="16" align="absmiddle"/>&nbsp;Ir a menu de Sistemas</a></td>
                </tr>
                </table>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
            </div>
        </form>
    </center>
</body>
</html>
