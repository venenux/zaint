<?php
error_reporting(E_ALL^E_NOTICE);
define('DB_USUARIO','root', true);
define('DB_CLAVE', 'armadillo', true);
define('DB_HOST', 'localhost', true);
/*define('DB_SELECTRA_DEFAULT', 'sisalud_selectra', true);*/
define('DB_SELECTRA_CONF', 'SELECTRA_CONF_PYME', true);#sisalud_selectraconf
define('DB_SELECTRA_CONT', 'pyme_contabilidad', true);
define('DB_SELECTRA_NOM', 'xtrasport_nomina', true);
define('DB_SELECTRA_FAC', 'pyme_administracion_r14_14052012', true);
#define('TOMCAT', 'http://localhost:8080/JavaBridge/java/Java.inc', true);
/*
 * CONSTANTES UTILIZADAS POR LA INTERFAZ DE REGISTRO DE EVENTOS (LOG)
 */

define('REG_INFO',0, true);
define('REG_LOGIN_OK',1, true);
define('REG_LOGIN_FAIL',2, true);
define('REG_LOGOUT',3, true);
define('REG_SESSION_INVALIDATE',4, true);
define('REG_SESSION_READ_ERROR',5, true);
define('REG_SQL_OK',6, true);
define('REG_SQL_FAIL',7, true);
define('REG_ILLEGAL_ACCESS',8, true);
define('REG_ALL',9, true);

/**
 * $config es un "por ahora", mientras se define donde va a residir la
 * configuracion general de selectra
 **/

 #$ConnSys = array('server' => DB_HOST, 'user' => DB_USUARIO, 'pass' => DB_CLAVE, 'db' => DB_SELECTRA_DEFAULT);

 $config['bd']='mysql';

 /** Archivo _temporal_ para ir colocando las funciones generales... :/ */
 //require_once($_SERVER['DOCUMENT_ROOT'].'/funciones.inc.php');
 require_once('funciones.inc.php');

?>
