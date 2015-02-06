<?php
if (!isset($_SESSION)) {
    session_start();
    ob_start();
}
?>
<html>
    <head>
        <title>.: SELECTRA CONTABILIDAD :.</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="../includes/css/estilos.css" rel="stylesheet" type="text/css" />
        <link href="../includes/css/index.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="../includes/js/index.js"></script>
        <script type="text/javascript" src="libs/js/ajax.js"></script>
    </head>
    <body>
        <?php
        #include("../generalp.config.inc.php");
        #session_start();
        #ob_start();
        include("../menu_sistemas/lib/common.php");

        $conexion = new bd(SELECTRA_CONF_PYME);

        $empresas = new bd(SELECTRA_CONF_PYME);
        $query = "select * from nomempresa ";
        $resultado = $empresas->query($query);

        $ejecutar = $_GET['ejecutar'];

        $baseDatos = $_GET['baseDatos'];
        ?>
        <?php if (isset($_GET['empresaSeleccionada'])): ?>
            <?php $_SESSION['EmpresaContabilidad'] = $_GET['empresaSeleccionada']; ?>
        <?php endif; ?>
        <?php if (isset($_SESSION['EmpresaContabilidad'])): ?>
            <?php #echo "<script> location = 'login.php'; </script>";exit;?>
            <?php header("Location: login.php"); ?>
        <?php else: ?>
            <div class="contenedor">
                <div class="procesando" id="procesando" style="visibility:hidden; text-align: center">
                    <br/>
                    <h1 style="color:green; font-family:arial; "><br/> Se Est&aacute; Creando  <br/> La Nueva Empresa </h1>
                    <img src="imagenes/Procesando.gif"/>
                    <br/><br/><br/>Esta Operaci&oacute;n <br/> Puede Durar Algunos Minutos<br/><br/>
                    <img src="img_sis/asys.png" />
                </div>
                <img src="../includes/imagenes/logo.png" width="401" height="90"/>
                <hr/>
                <div class="titulo1">SELECCIONE UNA EMPRESA PARA CONTINUAR </div>
                <hr/>
                <div id="listado">
                    <form id="seleccionar_empresa" name="seleccionar_empresa" method="get">
                        <select class="seleccionEmpresa" multiple="multiple" name="empresaSeleccionada">
                            <?php while ($fila = $resultado->fetch_assoc()) : ?>
                                <option value="<?php echo $fila['bd_contabilidad'] ?>"> <?php echo $fila['nombre'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </form>
                </div>           
                <hr/>
                <table>
                    <tbody>
                        <tr>
                            <td style="float:left; background:none; width:50%;"><img src="../includes/imagenes/asys.png" style="width:60%"/></td>
                            <td style='width:15%; padding-right: 45px; float:right;'><?php btn2(" Seleccionar ", 'document.seleccionar_empresa.submit()', 'ok.gif') ?></td>
                            <td style='width:15%; padding-right: 10px; float:right;'><?php btn2('Nueva', 'mostrarAgregarEmpresa();', 'add.gif') ?></td>
                        </tr>
                    </tbody>
                </table>
                <br/>
                <div style='text-align: center; border-color: transparent;'>
                    <a target="_self" href="../entrada/index.php" ><img src="imagenes/back.gif"/>&nbsp;Ir al Men&uacute; de Sistemas</a>
                </div>
            </div><!-- contenedor-->
        <?php endif; ?>
        <div id='nuevaEmpresa' class='nuevaEmpresa' style='visibility:hidden'>
            <div onclick='ocultarAgregarEmpresa()' style='position:absolute; cursor:pointer; top:0px; right:0px; width:240px'>
                <img src='imagenes/cerrar.png'>
            </div>
            <hr/>
            <div class="titulo1" style='background:none;' >AGREGAR EMPRESA </div>
            <hr/>
            <form id='formularioNuevaEmpresa'>
                <table>
                    <tr>
                        <td style="width:100px" class='columna1' >Nombre de la Empresa</td>
                        <td>
                            <input type="text"   id='nombre'  name='nombre' onchange="chk_NombreEmpresa(this);" >
                            <div id='resultado1' style='position:absolute' ></div>
                            <span id='nombre_error' class='error'></span><!--  name='nombre_error' -->
                        </td>
                    </tr>
                    <tr>
                        <td class='columna1'>Nombre de Base de Datos Administrativo: </td>
                        <td>
                            <input type="text" id='base_adm' name='base_adm' onchange="chk_BaseDatos(this);">
                            <div id='resultado2' style='position:absolute' ></div>
                            <span id='base_error1' class='error'></span><!--  name='base_error' -->
                        </td>
                    </tr>                           
                    <?php if (file_exists($_SESSION['ROOT_PROYECTO'] . "/contabilidad")): ?>
                        <tr>
                            <td class='columna1'>Nombre de Base de Datos Contabilidad: </td>
                            <td>
                                <input type="text" id='base_con' name='base_con' onchange="chk_BaseDatos(this);">                                
                                <div id='resultado3' style='position:absolute' ></div>
                                <span id='base_error2' class='error'></span><!--  name='base_error' -->
                            </td> 
                        </tr>
                    <?php endif; ?>
                    <?php if (file_exists($_SESSION['ROOT_PROYECTO'] . "/nomina")): ?>
                        <tr>
                            <td class='columna1'>Nombre de Base de Datos Nomina: </td>
                            <td>
                                <input type="text" id='base_nom' name='base_nom' onchange="chk_BaseDatos(this);">
                                <div id='resultado4' style='position:absolute' ></div>
                                <span id='base_error' class='error3'></span><!--  name='base_error' -->
                            </td>
                        </tr>
                    <?php endif; ?>
                </table>
                <br/>
                <div id='boton1' style='visibility:hidden;'>
                    <?php btn2('Agregar', 'agregarEmpresa();', 'add.gif') ?>
                </div>
                <br/><br/>
            </form>
        </div>
        <iframe id='iframe_procesamiento' style='visibility:hidden;'></iframe>
    </body>
</html>

