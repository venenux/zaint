<?php
	require_once 'lib/config.php';
	require_once 'lib/common.php';
	include('header.php');
	
	//conexion = conexion();
	if(isset($_POST['enviar']))
	{
		echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
		location.href=\"r_activosfijos.php\"</SCRIPT>";
	}
	
	
?>

<FORM name="seleccion" method="POST" target="_blank" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<TABLE width="100%">
		<TR class="row-br">
			<TD colspan="2"><? titulo("","","menu_activos_reportes.php","37");?></TD>
		</TR>
		<TR>
        
		</TR>

		<TR class="tb-tit">
			<TD colspan="2" align="center"><INPUT type="submit" name="enviar" value="Ver Reporte"></TD>
		</TR>
	</TABLE>
</FORM>
</BODY>
</HTML>
