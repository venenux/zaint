<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once '../lib/config.php';
require_once '../lib/common.php';
include ("../header.php");
?>

<html class="fondo">

<head>
  <title></title>
  <link href="estilos.css" rel="stylesheet" type="text/css">
  <SCRIPT language="JavaScript" type="text/javascript" src="../lib/common.js">
  </SCRIPT>
<script language="javascript" src="cal2.js"></script>
<script language="javascript" src="cal_conf2.js"></script>
<SCRIPT language="JavaScript" type="text/javascript">

</SCRIPT>

</head>
<body>


<FORM name="sampleform" method="POST" target="_self" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<TABLE  width="100%" height="100">
<TBODY>
<tr>
<td>
<p align="center">
<strong>LICENCIA BSD</strong>
</p>
<p align="justify">
Copyright ©1991, 1992, 1993, 1994 Regentes de la Universidad de California. Todos los Derechos reservados.
</p>

<p align="justify">
    Se permite su redistribución tanto en forma de código fuente como en forma binaria, con o sin modificaciones, con tal de que se cumplan las siguientes condiciones:
</p>
<p align="justify">
    1.Redistrubuciones del código fuente deben retener el aviso de copyright declarada arriba, esta lista de condiciones y la denegación de garantía que sigue.
</p>
<p align="justify">
    2.Redistribuciones en forma binaria deben reproducir el aviso de copyright declarada arriba, esta lista de condiciones y la denegación de garantía que sigue en la documentación y/u otros materiales que acompañen la distribución.
</p>
<p align="justify">
    3.Todo material de promoción que mencione características o el uso de este software debe mostrar el siguiente reconocimiento: Este producto incluye software desarrollado por la Universidad de California, Berkely y sus contribuidores.
</p>
<p align="justify">
    4.No se permite ni el uso del nombre de la Universidad ni el uso de los nombres de sus contribuidores para apoyar o promover productos derivados de este software sin previo permiso específico por escrito.
</p>
<p align="justify">

    LOS REGENTES Y CONTRIBUIDORES PROVEEN ESTE SOFTWARE ''TAL Y COMO ESTÁ'', Y DENEGA CUALQUIER GARANTÍA, YA SEA EXPRESA O IMPLÍCITA, INCLUYENDO SIN LIMITACIÓN LAS GARANTÍAS IMPLÍCITAS DE COMERCIABILIDAD Y APTITUD PARA UN PROPÓSITO ESPECÍFICO. NI LOS REGENTES NI SUS CONTRIBUIDORES SERÁN EN NINGÚN CASO RESPONSABLES POR PERJUICIOS, YA SEAN DIRECTOS, INDIRECTOS, INCIDENTALES, ESPECIALES, PUNITIVOS O CONSECUENTES (INCLUYENDO SIN LIMITACIÓN LA ADQUISICIÓN DE BIENES O SERVICIOS DE SUSTITUCIÓN; PÉRDIDA DE USO, DATOS O GANANCIAS; O INTERRUPCIÓN DE NEGOCIOS), SEA CUAL SEA SU CAUSA Y BAJO CUALQUIER TEORÍA DE RESPONSABILIDAD, YA SEA EN CONTRATO, RESPONSABILIDAD ESTRICTA O ENTUERTO (INCLUYENDO DE NEGLIGENCIA O DE CUALQUIER OTRA MANERA) QUE SURJA DE CUALQUIER MANERA DEL USO DE ESTE SOFTWARE, AÚN EN EL CASO DE HABER SIDO AVISADO DE LA POSIBILIDAD DE TAL PERJUICIO.
</p>
</td>
</tr>
</tbody>
</table>
</FORM>
</body>
</html>
