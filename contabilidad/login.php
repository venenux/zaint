<?php
session_start();
?>
<html>
    <head>
        <title>.: SELECTRA :.</title>
        <link href="login_php_archivos/estilos.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="ewp.js"></script>
        <link rel="stylesheet" href="../selectraerp/libs/css/login.otro.css" type="text/css" />
    </head>
    <body>
        <script type="text/javascript">
            function EW_checkMyForm(EW_this) {
                if (!EW_hasValue(EW_this.username, "TEXT" )) {
                    if  (!EW_onError(EW_this, EW_this.username, "TEXT", "Por favor ingrese una Identificación de Usuario"))
                        return false;
                }
                if (!EW_hasValue(EW_this.password, "PASSWORD" )) {
                    if (!EW_onError(EW_this, EW_this.password, "PASSWORD", "Por favor ingrese contraseña"))
                        return false;
                }
                return true;
            }
        </script>
        <div id="login">
            <div id="logo1"><img src="../selectraerp/imagenes/login_logo.png"></div>
            <div id="cont">
                <form action=login_aux.php method=post onSubmit="return EW_checkMyForm(this);">
                    <ul>
                        <li>
                            <label for="usuario">Usuario</label>
                            <input type="text" name="username" size="20" value="<?php echo @$_COOKIE[ewCookieUserName]; ?>" />
                        </li>
                        <li>
                            <label for="clave">Clave</label>
                            <input type="password" name="password" size="20" />
                        </li>
                    </ul>
                    <div>
                        <input type="submit" name="submit" id="submit" value="Ingresar" />
                    </div>
                    <div>
                        <!--a target="_self" href="../../../sistemas.php" ><img src="../../imagenes/back.png" border="0" width="16" height="16" align="absmiddle"/>&nbsp;Ir a menu de Sistemas</a-->
                        <a target="_self" href="../sistemas.php" ><img src="imagenes/back.png" border="0" width="16" height="16" align="absmiddle"/>&nbsp;Ir a menu de Sistemas</a>
                    </div>
                    <div align="center">
                        <?php if (@$_SESSION[ewSessionMessage] <> "") { ?>
                            <p>Nombre de usuario o contrase&ntilde;a incorrecto.</p>
                            <?php $_SESSION[ewSessionMessage] = "";
                        } ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>