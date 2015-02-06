<?php
session_start();
ob_start();
$config = parse_ini_file("lib/selectra.ini");

if ($_SESSION['bd'] == "") {
    #echo 'salio';exit;
    $_SESSION['bd'] = $config['bdnombre'];
    $_SESSION['termino'] = $config['termino'];
}

require_once "lib/common.php";
if ($_SESSION['ewSessionStatus'] == "login") {
    header("Location:paginas/seleccionar_nomina.php");
    exit(0);
}
?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0

if (@$_POST["submit"] <> "") {
    $bValidPwd = false;
    $sUsername = @$_POST["username"];
    $sPassword = @$_POST["password"];
    #echo $_SESSION['EmpresaNomina'];exit;
    $sSql = new bd($_SESSION['bd']);
    $result = $sSql->query("select nom_emp from nomempresa");
    $filaemp = $result->fetch_assoc();
    $_SESSION["empresa"] = $filaemp['nom_emp'];
    //echo "select * from nomusuarios where login_usuario='$sUsername' and clave='".hash("sha256",$sPassword)."'";
    $result = $sSql->query("select * from nomusuarios where login_usuario='$sUsername' and clave='" . hash("sha256", $sPassword) . "'");
    if ($result->num_rows > 0) {
        cerrar_conexion($Conn);
        $fila = $result->fetch_assoc();
        $_SESSION[ewSessionStatus] = "login";
        $_SESSION[ewSessionUserName] = $sUsername;
        $_SESSION['nombre'] = $fila[descrip];
        $_SESSION['coduser'] = $fila[coduser];
        $_SESSION[ewSessionSysAdmin] = 0; // Non system admin

        $_SESSION['acce_configuracion'] = $fila['acce_configuracion'];
        $_SESSION['acce_usuarios'] = $fila['acce_usuarios'];
        $_SESSION['acce_elegibles'] = $fila['acce_elegibles'];
        $_SESSION['acce_personal'] = $fila['acce_personal'];
        $_SESSION['acce_prestamos'] = $fila['acce_prestamos'];
        $_SESSION['acce_consultas'] = $fila['acce_consultas'];
        $_SESSION['acce_transacciones'] = $fila['acce_transacciones'];
        $_SESSION['acce_procesos'] = $fila['acce_procesos'];
        $_SESSION['acce_reportes'] = $fila['acce_reportes'];
        $_SESSION['acce_enviar_nom'] = $fila['acce_enviar_nom'];
        $_SESSION['acce_autorizar_nom'] = $fila['acce_autorizar_nom'];
        $_SESSION['acce_estuaca'] = $fila['acce_estuaca'];
        $_SESSION['acce_xestuaca'] = $fila['acce_xestuaca'];
        $_SESSION['acce_permisos'] = $fila['acce_permisos'];
        $_SESSION['acce_logros'] = $fila['acce_logros'];
        $_SESSION['acce_penalizacion'] = $fila['acce_penalizacion'];
        $_SESSION['acce_movpe'] = $fila['acce_movpe'];
        $_SESSION['acce_evalde'] = $fila['acce_evalde'];
        $_SESSION['acce_experiencia'] = $fila['acce_experiencia'];
        $_SESSION['acce_antic'] = $fila['acce_antic'];
        $_SESSION['acce_uniforme'] = $fila['acce_uniforme'];
        $_SESSION['acce_generarordennomina'] = $fila['acce_generarordennomina'];
        $sLoginType = strtolower($_POST["rememberme"]);
        $expirytime = time() + 365 * 24 * 60 * 60; // change cookie expiry time here

        if ($sLoginType == "a") {
            setCookie(ewCookieAutoLogin, "autologin", $expirytime);
            setCookie(ewCookieUserName, $sUsername, $expirytime);
            setCookie(ewCookiePassword, TEAencrypt($sPassword, EW_RANDOM_KEY), $expirytime);
        } elseif ($sLoginType == "u") {
            setCookie(ewCookieAutoLogin, "rememberusername", $expirytime);
            setCookie(ewCookieUserName, $sUsername, $expirytime);
        } else {
            setCookie(ewCookieAutoLogin, "", $expirytime);
        }

        $_SESSION[ewSessionStatus] = "login";
        $_SESSION['termino'] = $config['termino'];
        header("Location:paginas/seleccionar_nomina.php");
        exit();
    } else {
        $_SESSION[ewSessionMessage] = "no";
    }
}
?>
<html>
    <head>
        <script type="text/javascript" src="paginas/ewp.js"></script>
        <link rel="stylesheet" href="../selectraerp/libs/css/login.otro.css" type="text/css" />
        <link href="estilos.css" rel="stylesheet" type="text/css">
        <link rel="shortcut icon" href="imagenes/logo.ico" />
        <title>.: SELECTRA :.</title>
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
                <form action="login.php" method="post" onSubmit="return EW_checkMyForm(this);">
                    <ul>
                        <li>
                            <label for="usuario">Usuario</label>
                            <input type="text" id="usuario" name="username" maxlength="10" size="15" value="<?php echo @$_COOKIE[ewCookieUserName]; ?>" />
                            <script type="text/javascript">
                                document.getElementById("usuario").focus();
                            </script>
                        </li>
                        <li>
                            <label for="password">Contrase&ntilde;a</label>
                            <input type="password" id="password" name="password" maxlength="10" size="15" />
                        </li>
                    </ul>
                    <div>
                        <input type="submit" name="submit" id="submit" value="Ingresar" />
                    </div>
                    <div>
                        <br/>
                        <a target="_self" href="../sistemas.php" ><img src="img_sis/back.png" border="0" width="16" height="16" align="absmiddle"/>&nbsp;Ir al Men&uacute;s de Sistemas</a>
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
    </body>
</html>
