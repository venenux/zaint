<?

if (!isset($_SESSION))
{ 
ob_start(); 
}

require_once('../../generalp.config.inc.php');

$ConnSys = array('server' => DB_HOST, 'user' =>  DB_USUARIO, 'pass' => DB_CLAVE, 'db' => DB_SELECTRA_CONT);
$host = DB_HOST;
$usuario = DB_USUARIO; //Aqui se coloca el nombre de usuario
$contrasena = DB_CLAVE; //Aqui se coloca el password
$conectar = mysql_connect($host, $usuario, $contrasena); //Aqui se pasan datos conexion bd
mysql_select_db(DB_SELECTRA_CONT, $conectar); //Aqui se conecta la bd
?>
