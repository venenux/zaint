


<?php
include ("../header.php");
//include("../lib/common.php");

include("funciones_curr2.php");	


?>



<?

$cad = $_POST['sel_nom'];
//$nomina = $_POST['nomina'];
//echo $cad;

//$conexion = conexion(); 
$conexion2 = conexion();

$consulta2 = "SELECT DESCRIP,OWNER FROM SWNOMTIP";
$resultado2 = mssql_query($consulta2,$conexion2);




if(isset($_POST['enviar']))
{
	
	//$a = $b = $c = $c = 1; 
	

		$i = 0;
		$tok = strtok ($cad,",");
		while ($tok) 
		{
			if($i == 0)
			{
				$a=$tok;
    			$tok = strtok (",");
				$i = $i+1;
			}
                        if($i == 1)
			{
				$b=$tok;
    			$tok = strtok (",");
				$i = $i+1;
			}
			if($i == 2)
			{
				$c=$tok;
    			$tok = strtok (",");
				$i = $i+1;
			}
			if($i == 3)
			{
				$d=$tok;
    			$tok = strtok (",");
				$i = $i+1;
			}
                        if($i == 4)
			{
				$nom=$tok;
    			$tok = strtok (",");
				$i = $i+1;
			}
		}
	echo $a."aaa".$b."aaa".$c."aaa".$d."aaa".$nom."aaa";
	
	$conexion1 = conexion1($a,$b,$c,$d);
	
	$consulta = "SELECT APENOM FROM SWNOMPER WHERE CEDULA = '".$_POST['cedula']."' ";
	$resultado = mssql_query($consulta,$conexion1);
	
	if ($fetch = mssql_fetch_array($resultado)) 
	{
		//echo $fetch['APENOM'];
		echo "<SCRIPT language='JavaScript'>
		location.href=\"datos_personales2.php?cedula=".$_POST['cedula']."&host=".$a."&bd=".$b."&usr=".$c."&key=".$d."&nom=".$nom."\"
		</SCRIPT>";
		
	}
	else
	{
		echo "<SCRIPT language='JavaScript'>
		alert('Usuario invalido')
		location.href='../../webselectra/index.html'
		</SCRIPT>";
	}
}


?>



<form id="form1" name="form1"  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <table width="400" height="100" align="center" border="0" class="row-br">
    <tr>
      <td height="31" class="row-br"><table width="400" border="0">
          <tr>
            <td width="400"><div align="left"><font color="#000066"><strong>Introduzca su cedula</strong></font></div></td>
            
          </tr>
        </table>
		</td>
    </tr>
    <tr>
      <td width="200" height="100" align="center" class="ewTableAltRow">
	  <table width="400" align="center" border="1">
	  
	  	<tr>
		<td width="400"  colspan="4" align="center" valign="middle"><div align="left">Tipo de nomina<font size="2" face="Arial, Helvetica, sans-serif">
		<SELECT name="sel_nom" id="sel_nom">
			<OPTION value="0" class="tb-fila">Seleccione tipo de nomina</OPTION>
			<? 	while($fetch1 = mssql_fetch_array($resultado2)) 
				{
					$descripcion = $fetch1['DESCRIP'];
					$bd = $fetch1['OWNER'];
                                        $dat = $bd.",".$descripcion;
					echo "<option value='$dat'>Nomina&nbsp;$descripcion</option>";
                                        
				} ?>
					</SELECT>  
                  <input type="hidden" name="nomina" id="nomina" value="<? echo $descripcion; ?>">
		</td>
		</tr>
	  
        <tr>
          <td width="400"  colspan="4" align="center" valign="middle"><div align="left">Cedula:<font size="2" face="Arial, Helvetica, sans-serif">
<input type="text" name="cedula" id="cedula" size="20" > 


		</td>

		</tr>
		
		
		
      </table>
        <br>
        <table width="400" border="0">
          <tr>
            <td width="400"><div align="center">
       			<input type="submit" name="enviar" id="enviar"  value="enviar">
            </div></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</form>
</body>
</html>
