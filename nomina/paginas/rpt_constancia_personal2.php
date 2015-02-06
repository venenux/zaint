
  <?php 

include("../lib/common.php");
include ("../header.php");
include ("func_bd.php") ;

function smrVerMes( $nMes, $idioma="esp" ) { 
      $aMeses = array( 
                  "esp" => array( "","Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto" , "Septiembre", "Octubre", "Noviembre", "Diciembre" ), 
                  "cat" => array( "","Gener", "Febrer", "Marz", "Abril", "Maig", "Juny", "Juliol", "Agost" , "Septembre", "Octubre", "Novembre", "Decembre" ), 
                  "eng" => array( "","January", "February", "March", "April", "May", "June", "July", "August" , "September", "October", "November", "December" )    
                  ); 
         return( $aMeses[$idioma][$nMes] ); 
} 



$conexion = conexion2();

$query="select * from nomempresa";		
$result=mysql_query($query,$conexion);
$row = mysql_fetch_array ($result);	
$nompre_empresa=$row[nom_emp];
$ciudad=$row[ciu_emp];
$gerente=$row[ger_rrhh];

$registro_id=$_GET[registro_id];
$query="select * from nompersonal where ficha = '$registro_id'";

$result=mysql_query($query,$conexion);	
$fila = mysql_fetch_array ($result);	
$cargo_id=$fila[codcargo];

$query="select des_car from nomcargos where cod_car = $cargo_id";		
$result=mysql_query($query,$conexion);
$row = mysql_fetch_array ($result);	
$nompre_cargo=$row[des_car];

?>
</p>
<table width="741" border="0">
  <tr>
    <td width="350"><div align="left">
      <?php btn('print','window.print()',2)  ?>
    </div></td>
    <td width="381"><div align="right">
      
    </div></td>
  </tr>
</table>
<form name="frmIntegrantes" method="post" style="width:750px" action="">
  <table width="740" height="106" border="1">
    <tr>
      <td><p align="left" class="Estilo1"><span class="Estilo6"> <?php echo $nompre_empresa; ?></span>&nbsp;</p>
        <p align="center" class="Estilo1">&nbsp;</p>
        <p align="center" class="Estilo1"><span class="Estilo6">CONSTANCIA DE TRABAJO</span></p>
        <table width="726" border="0">
          <tr>
            <td><p class="Estilo3"><span class="Estilo4">&nbsp;&nbsp;&nbsp;&nbsp;Sirva la presenta para hacer constar que el Sr(a).:</span> 
                <?php echo $fila[apenom];  ?> 
                <span class="Estilo4">portador de la C&eacute;dula de Identidad 
                  No.: <?php echo number_format($fila[cedula]); ?> trabaj&oacute; en esta empresa desde el
                <?php echo date("d/m/Y",strtotime($fila[dfecing])); ?>
                hasta el
<?php echo date("d/m/Y"); ?>
                desempe&ntilde;ando el cargo de
  <?php echo $nompre_cargo; ?>
                devengando un salario mensual de Bs.:
  <?php echo number_format($fila[suesal],2,',','.'); ?></span><span class="Estilo4">.</span></p>
            <p class="Estilo3"><span class="Estilo4">&nbsp;&nbsp;&nbsp;&nbsp;Constancia que se expide a peticion de la parte interesada en la ciudad de
                
                <?php echo $ciudad; ?>, en la fecha
<?php echo date("d"). ' de ' . smrVerMes(date("n")) . ' de ' . date("Y"); ?>
.</span></p>
            <p class="Estilo3">&nbsp;</p>
            <p class="Estilo3">&nbsp;</p>
            <p class="Estilo3">&nbsp;</p>
            <p class="Estilo3">&nbsp;</p>
            <p class="Estilo3">&nbsp;</p>
            <p class="Estilo3">&nbsp;</p>
            <p align="center" class="Estilo3"><?php echo $gerente; ?>&nbsp;</p>
            <p align="center" class="Estilo4">Gerente de RR HH </p></td>
          </tr>
        </table>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p align="center"> </p></td>
    </tr>
  </table>
  <font size="2" face="Arial, Helvetica, sans-serif">  </font>
</form>
<p>&nbsp;</p>
</body>
</html>

