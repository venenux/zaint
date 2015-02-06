<?php 
session_start();
ob_start();
require_once '../lib/config.php';
include ("../paginas/func_bd.php");
include ("../header.php");
include("../lib/common.php");

$indices=array("ficha","cedula","apenom");
$url="buscar_empleado";
$conexion=conexion();

$numpag = $_GET['numpag'];


//codigo para pagina;
$TAMANO_PAGINA = 25;
$pagina = $_GET["pagina"];
if (!$pagina) 
{
    $inicio = 1;
    $pagina=1;
}
else 
{
    $inicio = ($pagina - 1) * $TAMANO_PAGINA+1;
} 
$limit=$inicio-1;



/////////////////////////////
$nombre_modulo='Personal disponible segun tipo de Nómina';
$nombre_tabla='nompersonal';
//campos en orden segun listado
$campo_1='ficha';
$campo_2='cedula';
$campo_3='apenom';
$campo_4='';
$campo_5='';
$campo_6='';
$campo_7='';
$campo_8='';
$campo_9='';
$campo_10='';
$documento_list='buscar_empleado.php';
$documento_edit='buscar_empleado.php';

?>
<script type="text/javascript">
var rows = document.getElementsByTagName('tr');
for (var i = 0; i < rows.length; i++) {
rows[i].onmouseover = function() {
this.className += ' hilite';
}
rows[i].onmouseout = function() {
this.className = this.className.replace('hilite', '');
}
}
</script>
<script type="text/javascript">
<!--
var firstrowoffset = 1; // first data row start at
var tablename = 'ewlistmain'; // table name
var lastrowoffset = 0; // footer row
var usecss = true; // use css
var rowclass = 'ewTableRow'; // row class
var rowaltclass = 'ewTableAltRow'; // row alternate class
var rowmoverclass = 'ewTableHighlightRow'; // row mouse over class
var rowselectedclass = 'ewTableSelectRow'; // row selected class
var roweditclass = 'ewTableEditRow'; // row edit class
var rowcolor = '#FFFFFF'; // row color
var rowaltcolor = '#EEF2F5'; // row alternate color
var rowmovercolor = '#DDEEFF'; // row mouse over color
var rowselectedcolor = '#DDEEFF'; // row selected color
var roweditcolor = '#DDEEFF'; // row edit color


function Aceptar(variable)
{
	//opener.document.forms[0].textfield.value=variable;
	//window.opener.SumarCampoFormula();
	window.opener.document.forms[0].ficha.value=variable;
	CerrarVentana();
}

function CerrarVentana(){
	javascript:window.close();
}

//function enviar(op){
	
//	document.frmPrincipal.op.value=op;
//	document.frmPrincipal.submit();
//}
</script>



<p>
  <font size="2" face="Arial, Helvetica, sans-serif">
<?php 

$codnomm = $_GET['codigo_nomina'];
$criterio=$_POST['optOpcion'];
$cadena=$_POST['textfield'];
$registro_id=$_POST['registro_id'];	
$op=$_POST['op'];
$codigo_nomina = $_SESSION['codigo_nomina'];
  

if(isset($_POST['buscar']) || $tipob!=NULL){
	if(!$tipob){
		$tipob=$_POST['palabra'];
		$des=$_POST['buscar'];
		$busqueda = $_POST['busqueda'];
	}
	switch($tipob){
		case "exacta":
			$consulta=buscar_exacta($nombre_tabla,$des,$busqueda);
			break;
		case "todas":
			$consulta=buscar_todas($nombre_tabla,$des,$busqueda);
			break;
		case "cualquiera":
			$consulta=buscar_cualquiera($nombre_tabla,$des,$busqueda);
			break;
	}
}else{	
	
	$consulta= "select * from $nombre_tabla where tipnom=$codigo_nomina and estado='Activo'";
	
}

$num_paginas=obtener_num_paginas($consulta);
$pagina=obtener_pagina_actual($pagina, $num_paginas);
$resultado=paginacion($pagina, $consulta);

?>
<link href="../estilos.css" rel="stylesheet" type="text/css" />
</font></p>
<form action="" method="post" name="buscar_empleado" id="frmPrincipal">
  <table width="100%" class="tb-tit">
    <tr>
      <td class="row-br"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="100%">
			<strong>
			<font color="#000066">
			 Personal disponible segun tipo de N&oacute;mina </font></strong></td>
            <td width="2%" align="right"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td>
				    <div align="right">
				      <?php btn('cancel','CerrarVentana();',2,'Salir') ?>
				    </div></td>
                </tr>
            </table></td>
          </tr>
      </table></td>
    </tr>
</table>
<table class="ewTableHeader" width="100%">
  <tr>
	<td><input type="text" name="buscar" size="20"></td>
	<TD><SELECT name="busqueda">
       	<option value="apenom">nombre</option>
	<option value="cedula">Cedula</option>
     	</SELECT></TD>
	<td><? btn('search',$url,1); ?></td>
	<td><? btn('show_all',$url.".php?pagina=".$pagina);?></td>
	<td width="120"><input onclick="javascript:actualizar(this);" checked="true" type="radio" name="palabra" value="exacta">Palabra exacta</td>
	<td width="150"><input onclick="javascript:actualizar(this);" type="radio" name="palabra" value="cualquiera">Cualquier palabra</td>
	<td colspan="3" width="386"></td>
  </tr>
  </table>

  <table width="100%" border="0" bordercolor="#0066FF" bgcolor="#FFFFFF" class="ewTable" id="lst"  cellspacing="0" cellpadding="0">
    <tr bgcolor="#CCCCCC" class="ewTableHeader"> 
    	<td width="16%" height="21" align="right" class="phpmakerlist"> 
			<div align="left" class="tb-head"><font size="2" face="Arial, Helvetica, sans-serif">Ficha</font></div>	  </td>
		
        <td width="19%" align="right" class="phpmakerlist"><div align="left">C&eacute;dula</div></td>
      <td width="65%" class="phpmakerlist"><div align="left"> <font size="2" face="Arial, Helvetica, sans-serif"><font size="2">Apellido y Nombre </font></font></div></td>
    </tr>	
     <?php 

	if($num_paginas!=0){
		$i=0; 
		while($fila=mysql_fetch_array($resultado)){
			$i++;
			if($i%2==0){
				echo "<tr class='tb-fila'>";
				
			}else{
				echo "<tr>";
				
			}

			foreach($indices as $campo){

		//$nom_tabla=mysql_field_name($resultado,$campo);
				if($campo== "ficha"){
						$var=$fila[$campo];
						?>
						<td onClick='Aceptar("<?php echo $fila[ficha]; ?>")' ><?echo $var?></td>
						<?
				}else{
					
						$var=$fila[$campo];
						?>
						<td  ><?echo $var?></td>
						<?
					
				}
			}
		}
	}
  	?>
    <input name="op" type="hidden" value="">	
	<input name="marcar_todos" type="hidden" value="1">
	<input type="hidden" name="codnomm"  value="<? echo $codnomm;?>">
	<input type="hidden" name="codtt"  value="<? echo $codigo_nomina;?>">
	<input type="hidden" name="numpagg"  value="<? echo $numpag;?>">	
</table>

      <?
	pie_pagina($url,$pagina,"&tipo=".$tipob."&des=".$des."&busqueda=".$busqueda,$num_paginas);
	?>    


</form>
</body>
</html>

