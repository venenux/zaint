
<?php
include ("../header.php");
include("../lib/common.php");

include("func_bd.php");	

$tipnom = $_GET['tipnom'];
//echo $tipnom;
$conexion = conexion2();

//echo $ficha;
?>
<script>
function VerRecibo(id)
{
	//alert(document.form1.cboTipoNomina.value);
	AbrirVentana('rpt_recibo_pago2.php?codigo_nomina='+document.form1.cboTipoNomina.value+'&codt='+document.form1.codt.value+'&registro_id='+id,800,800,0);
}





</script>

<form id="form1" name="form1" method="post" action="">
  <table width="807" height="229" border="0" class="row-br">
    <tr>
      <td height="31" class="row-br"><table width="789" border="0">
          <tr>
            <td width="762"><div align="left"><font color="#000066"><strong>Parametros del Reporte</strong></font></div></td>
            
          </tr>
        </table></td>
    </tr>
    <tr>
      <td width="489" height="190" class="ewTableAltRow"><table width="520" border="0">
        <tr>
          <td width="467" height="40" colspan="4" align="center" valign="middle"><div align="left">Nomina:<font size="2" face="Arial, Helvetica, sans-serif">

<?/*$consulta="select codtip from nomtipos_nomina where descrip='".$_SESSION['nomina']."'";
$resultado=sql_ejecutar($consulta);
$fila=mysql_fetch_array($resultado);*/
?>



   <select name="cboTipoNomina" id="select2" style="width:400px">
	<option>Seleccione una nomina</option>
   <?php
	$ficha = $_GET['registro_id'];
	$query="select codnom,descrip,codtip from nom_nominas_pago where codtip='".$tipnom."'";
	$result=mysql_query($query,$conexion);
	 	  //ciclo para mostrar los datos
  	while ($row = mysql_fetch_array($result))
  	{ 		
		// Opcion de modificar, se selecciona la situacion del registro a modifica.		
  		$codt= $row['codtip'];
		?>
      <option value="<?php echo $row['codnom'];?>"><?php echo $row['descrip'];?></option>
	<?
	}//fin del ciclo while
	?>		
   </select>
	<input type="hidden" name="codt" id="codt" value="<? echo $codt; ?>" >
          </font></div></td>
          </tr>
<?

$valor=$_GET['opcion']; 

switch($valor){
	case "analisis":

$consulta="select * from nomconceptos";
$resultado=mysql_query($consulta,$conexion);


	?>

<tr><td colspan="4">Concepto:&nbsp;&nbsp;<select name="seleccion_concepto" id="seleccion_concepto">
<option>Seleccione un Concepto</option>
<?
while($fila=mysql_fetch_array($resultado)){

?>
          <option value="<?echo $fila['codcon']?>"><?echo $fila['descrip']?></option>

<?}?>
        </select></td></tr>

<?
	break;

}
?>
        
        
        
        
      </table>
        <p>&nbsp;</p>
        <table width="467" border="0">
          <tr>
            <td width="466"><div align="right">
              <INPUT type="button" onclick="javascript:VerRecibo('<?php echo $ficha;?>');" name="Aceptar" value="Aceptar">
            </div></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</form>
</body>
</html>
