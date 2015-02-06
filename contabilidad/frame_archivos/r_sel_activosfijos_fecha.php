<?php
	require_once 'lib/config.php';
	require_once 'lib/common.php';
	include('header.php');
	?>
	<SCRIPT language="JavaScript" type="text/javascript" src="lib/common.js"></SCRIPT>
	<script language="javascript" src="cal2.js"></script>
	<script language="javascript" src="cal_conf2.js"></script>
	<SCRIPT language="JavaScript" type="text/javascript"></script>
	<?
	
	if(isset($_POST['enviar']))
	{
		echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
		location.href=\"r_activosfijos_mov.php?mes=".$_POST[fechaD]."\"</SCRIPT>";
	}
	
?>

<FORM name="seleccion" method="POST" target="_blank" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<TABLE width="100%">
		<TR class="row-br">
			<TD colspan="2"><? titulo("","","menu_activos_reportes.php","37");?></TD>
		</TR>
		<TR>
      
      
       <TD class="tb-fila" width="150"> Fecha: </TD>
			<TD><INPUT type="text" name="fechaD" id="fechaD" size="15" maxlength="12" value="<? echo date("m/Y")?>">&nbsp;<input name="d_fecha" type="image" id="d_fecha" src="lib/jscalendar/cal.gif">
			<script type="text/javascript">Calendar.setup({inputField:"fechaD",ifFormat:"%m/%Y",button:"d_fecha"});</script></TD>
       
		</TD>	
		</TR>
		
		<TR class="tb-tit">
			<TD colspan="2" align="center"><INPUT type="submit" name="enviar" value="Enviar"></TD>
		</TR>
	</TABLE>
</FORM>
</BODY>
</HTML>
