<?php 
session_start();
ob_start();
include ("../header.php");include("../lib/common.php");

//include("funciones_curr.php");	
?>
<?

$conexion = conexion(); 
if(isset($_POST['enviar']))
{
	$consulta = "SELECT ficha FROM nompersonal WHERE cedula = '".$_POST['cedula']."' ";
	$resultado = query($consulta,$conexion);
	
	if ($fetch = fetch_array($resultado)) 
	{

		echo "	<SCRIPT language='JavaScript'>
		location.href='datos_personales.php?cedula='+$_POST[cedula]
		</SCRIPT>";

	}
	else
	{
		echo "<SCRIPT language='JavaScript'>
		alert('Usuario invalido')
		location.href='cedula.php'
		</SCRIPT>";
	}
}


?>

<table align="center" width="100%" border="0">
  <tbody>
<tr><TD colspan="3" class="tb-tit" align="right"><?echo btn("back","menu_consultas.php")?></TD>
</tr>
</tbody>
</table>

<form id="form1" name="form1"  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <table width="400" height="100" align="center" border="0" class="row-br">
    <tr>
      <td height="31" class="row-br"><table width="400" border="0">
          <tr>
            <td width="400"><div align="left"><font color="#000066"><strong>Introduzca su cedula</strong></font></div></td>
            
          </tr>
        </table></td>
    </tr>
    <tr>
      <td width="200" height="100" align="center" class="ewTableAltRow"><table width="400" align="center" border="0">
        <tr>
          <td width="400"  colspan="4" align="center" valign="middle"><div align="left">Cedula:<font size="2" face="Arial, Helvetica, sans-serif">


<input type="text" name="cedula" id="cedula" size="20" > 


		</td>

		</tr>
      </table>
        <br>
        <table width="400" border="0">
          <tr>
            <td width="400"><div align="center">
       			<input type="submit" name="enviar" id="enviar"  value="enviar">
            </div></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</form>
</body>
</html>
