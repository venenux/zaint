<?
if (!isset($_SESSION)) {
    session_start();
    ob_start();
}
?>
<html>
    <head>
        <title>:: Selectra ::</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="estilos.css" rel="stylesheet" type="text/css" />
        <script language="JavaScript" type="text/javascript" src="lib/common.js"></script>
        <link rel="stylesheet" type="text/css" media="all" href="lib/jscalendar/calendar-blue.css" title="win2k-cold-1" /> 
        <script type="text/javascript" src="lib/jscalendar/calendar.js"></script> 
        <script type="text/javascript" src="lib/jscalendar/lang/calendar-es.js"></script> 
        <script type="text/javascript" src="lib/jscalendar/calendar-setup.js"></script>
    </head>
    <body class="fondo">
        <?php setlocale(LC_MONETARY, 'es_VE.utf8'); ?>

