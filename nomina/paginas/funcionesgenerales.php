<SCRIPT LANGUAGE="JavaScript" type="text/javascript">

function AbrirVentana(Ventana,Largo,Alto,Modal) 
{
	if (Modal==1)
	{
	mainWindow = showModalDialog(Ventana,'mainWindow','dialogWidth:'+Alto+'px;dialogHeight:'+Largo+'px;resizable:yes;toolbar:no;menubar:no;scrollbars:yes;help: no');
	}
	else
	{
	
	mainWindow = window.open(Ventana,'mainWindow','menub ar=no,resizable=no,width='+Alto+',height='+Largo+',left=0,top=0,titlebar=yes,alwaysraised=yes,status=no,scrollbars=yes');
	}


}
</SCRIPT>



<?php
function MsgBox($str)
{
$language = "language=\"javascript\"";
echo "<script $language>\n";
echo " alert('$str');\n";
echo "</script>\n";
}


?>
