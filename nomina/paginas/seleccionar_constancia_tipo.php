<?php 
session_start();
ob_start();
include("../header.php") ;
?>


<script>
function VerificarSeleccion()
{
		
	
	if ((document.getElementById('opt2').checked==false) && (document.getElementById('opt1').checked==false) && (document.getElementById('opt3').checked==false)){
		alert("Debe seleccionar un tipo de constancia. Verifique...")}
	else{
	//document.frmseleccionar.action="frame.php";	
	//document.frmseleccionar.submit();
	//alert("SS");
	//document.frmseleccionar.seleccion_nomina.value=1;
	document.frmseleccionar.submit();
	}
}

function seleccionar(valor){
	
	if(valor==1){
		document.getElementById('opt1').checked=true;
		document.getElementById('opt2').checked=false;
		document.getElementById('opt3').checked=false;
	
	}else{
		if(valor==2){
			document.getElementById('opt2').checked=true;
			document.getElementById('opt1').checked=false;
			document.getElementById('opt3').checked=false;
		
		}else{
			document.getElementById('opt3').checked=true;
			document.getElementById('opt1').checked=false;
			document.getElementById('opt2').checked=false;
		}
	}

}
</script>

<font size="3" face="Arial, Helvetica, sans-serif">
<?php
include("../lib/common.php") ;
include("func_bd.php") ;


$seleccion=$_POST[seleccion_nomina];


?>

</font>
<form action="list_personal.php" method="post" name="frmseleccionar" id="frmseleccionar">
<input name="seleccion_nomina" type="hidden" value="0">
  <label></label>
  <div align="center">
    <table width="100%" height="5" class="tb-tit" bgcolor="#FFE4AF">
      <tr class="" align="left">
      <td height="31"><font color="#000066"><strong>&nbsp;Seleccionar Tipo de N&#243;mina</strong></font></td>
    </tr>
    <tr>
    </table>
    <br>
    <table width="500"  border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="500" height="49" colspan="2"><table width="500" border="0" id="lst" cellspacing="0" cellpadding="0">
          <tr>
            <td width="100%" colspan="2" height="21" class="tb-head"><div align="center"><STRONG>Las constancias van dirigidas</STRONG></font></div></td>
          </tr>
          <?php
	//$sItemRowClass = " class=\"ewTableRow\"";
	//$sListTrJs = " onmouseover='ew_mouseover(this);' onmouseout='ew_mouseout(this);'";
	?>
          <tr>
            <td height="27" class=""><div align="left"><span>
                <input name="opt1" type="radio" class="icon" id="opt1" value="1" onclick="seleccionar(1);"  />
                <?php
	  echo "Ninguno";
	  ?>
            </span></div></td>
			
          </tr>
		  <tr>
            <td height="27" class=""><div align="left"><span>
                <input name="opt2" type="radio" class="icon" id="opt2" value="2" onclick="seleccionar(2);" />
                <?php
	  echo "A quien pueda interesar";
	  ?>
            </span></div></td></tr>
			 <tr>
            <td height="27" class=""><div align="left"><span>
                <input name="opt3" type="radio" class="icon" id="opt3" value="2" onclick="seleccionar(3);" />
                <?php
	  echo "Otro";
	  ?>
            </span></div></td>
			<td height="27" class=""><div align="left"><span>
                <input name="identificacion" type="text" class="icon" id="identificacion" value=""  />
                <?php

	  ?>
            </span></div></td>
			
          </tr>

          <?php   
  	//fin del ciclo while
  	//operaciones de paginacion
	$num_fila++;
  	$in++;  
  	?>
        </table></td>
      </tr>

      <?php
	
	if (@$_SESSION[ewSessionMessage] <> "") 	
	{	
	
	?>

      <?php 
	$_SESSION[ewSessionMessage] = ""; 
	} 
	?>
    </table>
    <table width="500" border="0" class="tb-head">
      <tr>
        <td width="283"><div align="center"><?php 
			btn('ok','VerificarSeleccion();',2) ?>
        </div></td>
      <!--  <td width="295"><div align="center">
          <?php 
			//btn('cancel','cerrar();',2) ?>
        </div></td> -->
      </tr>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
</form>
</body>
</html>
