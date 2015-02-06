<?php
session_start();
?>
<html>
    <head>
        <title>.: SELECTRA :.</title>
        <link href="login_php_archivos/estilos.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="ewp.js"></script>
    </head>
    <body class="fondo">

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
        <br>
        <br>
        <form action=login_aux.php method=post onSubmit="return EW_checkMyForm(this);">
            <table  border="1	" align="center" cellpadding="0" cellspacing="3" bgcolor="#EEECFF">
                <tr bgcolor="#EEECFF" >
                    <td>
                        <table background="login_php_archivos/xxLogin.png" width="450" height="214" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td>
                                    <table width="100%"  border="0" cellspacing="0" cellpadding="2">
                                        <tr>
                                            <td height="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Usuario:</strong><span class="phpmaker">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input type="text" name="username" size="20" value="<?php echo @$_COOKIE[ewCookieUserName]; ?>" />
                                                </span></td>
                                        </tr>
                                        <tr>
                                            <td height="30" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Clave:</strong>
                                                <span class="phpmaker">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input type="password" name="password" size="20" />
                                                </span></td>
                                        </tr>
                                        <tr>
                                            <TD height="30">&nbsp;</TD>
                                        </tr>

                                        <table border="0" align="right">
                                            <tbody align="right" >
                                                <tr>
                                                    <td  align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="login_php_archivos/acep.png" width="21" height="21" align="absmiddle" class="icon"> <input type="submit" name="submit"  class="form-btn2" value="Aceptar" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="login_php_archivos/salir.png" width="21" height="21" align="absmiddle" class="icon">&nbsp;<input type="reset" name="reset" class="form-btn2" value="Cancelar" />&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </table>
                                </td>
                                <td></td>
                            </tr>
                        </table>                        
                    </td>
                </tr>
            </table>            
        </td>
    </tr>
    <? if (@$_SESSION[ewSessionMessage] <> "") { ?>
        <tr align="center" bgcolor="#FFFFCC" class="row-br">
            <td align="center" height="50"><table width="50%" align="center"  border="0" cellpadding="0" cellspacing="5">
                    <tr>
                        <td align="center" width="45%" ><div align="right"><img src="img_sis/ico_note.gif" width="16" height="16" align="absmiddle" /></div></td>
                        <td  align="left">Nombre de usuario<br/>
                            o contrase&ntilde;a incorrecto.</td>
                    </tr>
                </table></td>
        </tr>
        <? $_SESSION[ewSessionMessage] = "";
    } ?>
    <tr class="row-br">
    <div align="center"></div></td>
</tr>
</table>

</br>
<table align="center">
    <tr>

        <td align="center" ><a target="_self" href="../sistemas.php" ><img src="imagenes/back.png" border="0" width="16" height="16" align="absmiddle"/>&nbsp;Ir a menu de Sistemas</a></td>
    </tr>
</table>

</form>
<br>


</BODY>
</HTML>
