<?php 
session_start();
ob_start();
?>

<html>
<head>
	<title>Ejemplo de uso de htmlArea</title>
<script language="Javascript1.2">
<!-- 
// Carga de htmlarea
_editor_url = "" // URL del archivo htmlarea
var win_ie_ver = parseFloat(navigator.appVersion.split("MSIE")[1]);
if (navigator.userAgent.indexOf('Mac')        >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Windows CE') >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Opera')      >= 0) { win_ie_ver = 0; }
if (win_ie_ver >= 5.5) {
 document.write('<scr' + 'ipt src="' +_editor_url+ 'editor.js"');
 document.write(' language="Javascript1.2"></scr' + 'ipt>');  
} else { document.write('<scr'+'ipt>function editor_generate() { return false; }</scr'+'ipt>'); }
// -->
</script> 
</head>

<body>
<h1>Ejemplo de uso de htmlArea</h1>
<br>
<form>

<textarea name="campo1" style="width:500px; height:200px;">
Esto esto dentro del textarea. <b>Negrita!</b>
<br><br>
<div align="center"><font color="#0000FF" size=5>Centrado</font></div>
</textarea>
<script language="JavaScript1.2" defer>
editor_generate('campo1');
</script>

</form>
</body>
</html>
