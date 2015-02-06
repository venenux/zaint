<?php
	require_once 'lib/config.php';
	require_once 'lib/common.php';
	include('header.php');
	
	$conexion = conexion();
	if(isset($_POST['enviar']))
	{
		echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
		location.href=\"r_activosfijos_tipos.php?tipo=".$_POST[tipo]."\"</SCRIPT>";
	}
	
	$consulta = "SELECT CODIGOTA,DESCRIP FROM activosfijos_tipos";
	$resultado333 = query($consulta,$conexion);
?>

<FORM name="seleccion" method="POST" target="_blank" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<TABLE width="100%">
		<TR class="row-br">
			<TD colspan="2"><? titulo("","","menu_activos_reportes.php","37");?></TD>
		</TR>
		<TR>
        <TD>
        <BR/>
        <select name="tipo" id="tipo">
        <option value="0">Seleccione un tipo</option>
        <?
            while($fetch333 = fetch_array($resultado333))
			{
				echo "<option value=\"$fetch333[CODIGOTA]\">$fetch333[DESCRIP]</option>";
			}
			?>
		</SELECT>
       
		</TD>	
		</TR>
		<TR>
        <TD>&nbsp;
         <br />
        </TD>
        </TR>
		<TR class="tb-tit">
			<TD colspan="2" align="center"><INPUT type="submit" name="enviar" value="Enviar"></TD>
		</TR>
	</TABLE>
</FORM>
</BODY>
</HTML>
