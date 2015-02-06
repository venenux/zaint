<?php
	require_once 'lib/config.php';
	require_once 'lib/common.php';
	include('header.php');
	
	$conexion = conexion();
	if(isset($_POST['enviar']))
	{
		echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
		location.href=\"r_activosfijos_cco.php?ccos=".$_POST[cco]."\"</SCRIPT>";
	}
	
	$consulta = "SELECT * FROM cwconcco";
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
        <select name="cco" id="cco">
        <option value="0">Seleccione un tipo</option>
        <?
            while($fetch333 = fetch_array($resultado333))
			{
				echo "<option value=\"$fetch333[Codccos]\">$fetch333[Descrip]</option>";
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
