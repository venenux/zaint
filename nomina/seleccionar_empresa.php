<?php 
session_start();
ob_start();
?>
<html>
<head>
<title>.: AMAXONIA SELECTRA N&Oacute;MINA :.</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="estilos.css" rel="stylesheet" type="text/css" />
</head>
<body class="fondo">

<?php
include("lib/common.php") ;

if(isset($_POST['tabla'])){
	

	$enlace= new bd("selectraconfx");
	$sentencia="select * from ".$_POST['tabla']." where codigo = '".$_POST['codigo_empresa']."'";
	$resultado = $enlace->query($sentencia);

  	$fila = $resultado->fetch_assoc();
	
	$_SESSION['empresa'] = $fila['nombre'];
	$_SESSION['bd'] = $fila['bd'];
	//echo "la base de datos es: ".$_SESSION['bd']." y el nombre es: ".$_SESSION['nombre'];
	//exit(0);
	switch($_POST['tabla']){
		case 'conempresa':
			$url="../contabilidad";
			break;
		case 'nomempresa':
			$url="login.php";
			break;
		case 'bienempresa':
			$url="../bienes";
			break;
		
	}
	
	echo "<script language=\"JavaScript\" type=\"text/javascript\">window.location.href=\"".$url."\"</script>";
	
}
$config=parse_ini_file("lib/selectra.ini");
?>
</font>
<form action="seleccionar_empresa.php" method="post" name="seleccionar_empresa" id="seleccionar_empresa">
<INPUT type="hidden" name="tabla" value="<?echo $_GET['tabla']?>">
  <div align="center">
    <p>&nbsp;</p>
     <table width="400"  border="0" align="center" cellpadding="0" cellspacing="3">
    <tr class="row-br">
      <td background=""><div align="center" class="Estilo5"><img src="img_sis/amaxonia_selectra2.png" width="401" height="140" /></div></td>
    </tr>
	  <tr class="row-br">
      <td  align="center" ><strong>Por favor Seleccione una Empresa para continuar</strong></td>
    </tr>
    <tr  class="row-br">
      <td>
<iframe align="textmiddle" height="150" src="listado_empresas.php?tabla=<?echo $_GET['tabla']?>" width="400"></iframe></td>
    </tr>
 <tr class="row-br">
      <td id="seleccion" align="center"><INPUT type="hidden" id="codigo_empresa" name="codigo_empresa" ></td>
    </tr>
    <tr class="row-br">
      <td  class="pie_login">
<table width="100%" border="0">
  <tbody>
    <tr>
      <td align="left"><img src="img_sis/<?echo $config['logo']?>" /></td>
<td align="right" width="15%"><?btn2('Seleccionar','document.seleccionar_empresa.submit()','ok.gif')?></td>
<td align="right" width="15%"><?btn2('Agregar','window.open(\'empresas_agregar.php?tabla=nomempresa\',\'\',\'width=500,height=200\')','add.gif')?></td>
    
    </tr>
  </tbody>
</table>

</td>
    </tr>
	 <tr>
            
            <td align="center" ><br><a target="_self" href="../selectra/sistemas.php" ><img src="img_sis/back.png" border="0" width="16" height="16" align="absmiddle"/>&nbsp;Ir a menu de Sistemas</a></td>
    </tr>
  </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
</form>
</body>
</html>
