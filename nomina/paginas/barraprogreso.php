<?php 
session_start();
ob_start();
?>
<?php
include("../lib/common.php");
include ("header.php");
include ("func_bd.php") ;
?>

<script>
function CerrarVentana(){
	javascript:window.close();
}


function progreso(n) {
       if (n>0 && n<=100) 
	   {             
			// Calculo en que decena se encuentra             
			var valor = parseInt(n/10);
			
             if (valor != 0) 
			 {                 
			 	// Cambio el cuadrado de la decena                 
			 	// correspondiente de vacio a lleno                 
			 	document.getElementById("pos"+valor).className = "lleno";             
			 }             
			 // Cambio el porcentaje             
			 document.getElementById("texto").innerHTML = "Cargando datos ...<BR>"+n+"%";         
		}     
}

</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>
<style>
div.barra-progreso 
{         
	width: 300px;
	height: 170px;
	text-align: left;
	border: 1px solid #315C7C;
}     
div.texto-progreso 
{         
	width: 100%;
	font-family: Arial;         
	font-size: 25px;         
	height: 70px;         
	text-align: center;         
	padding-top: 55px;         
	padding-bottom: 0px;         
	margin-top: 5px;         
	color: #315C7C;         
	background: url(espera.gif) no-repeat center top;     
}     
div.vacio 
{         
	position: absolute;         
	width: 20px;         
	height: 20px;         
	border: 2px solid #315C7C;         
	background: #FFF3C9;     
}     
div.lleno 
{         
	position: absolute;         
	width: 20px;         
	height: 20px;         
	border: 2px solid #315C7C;         
	background: #315C7C;     
}     
div#pos1 
{         
	margin-left: 17px;     
}   
div#pos2 
{         
	margin-left: 44px;     
}     
div#pos3 
{         
	margin-left: 71px;     
}     
div#pos4 
{         
	margin-left: 98px;     
}     
div#pos5 
{         
	margin-left: 125px;     
}     
div#pos6 
{         
	margin-left: 152px;     
}     
div#pos7 
{         
	margin-left: 179px;     
}     
div#pos8 
{         
	margin-left: 206px;     
}     
div#pos9 
{         
	margin-left: 233px;     
}     
div#pos10 
{         
	margin-left: 260px;     
}

</style>

<body>
<div class="barra-progreso">
	<div id="texto" class="texto-progreso">Cargando datos             ...<br>0%</div>        
			<div id="pos1" class="vacio"></div>         
			<div id="pos2" class="vacio"></div>      
			<div id="pos3" class="vacio"></div>         
			<div id="pos4" class="vacio"></div>         
			<div id="pos5" class="vacio"></div>         
			<div id="pos6" class="vacio"></div>         
			<div id="pos7" class="vacio"></div>         
			<div id="pos8" class="vacio"></div>         
			<div id="pos9" class="vacio"></div>         
			<div id="pos10" class="vacio"></div>     
</div>
<?php
	$query="select * from nompersonal";			
	$result=sql_ejecutar($query);
	
	$cont = 0;
	$total=311;
	$cargar=$total/100;
	$porcentaje=1;
	
	while ($fila = mysql_fetch_array($result))
  	{
	
	/*$query="";
	$query="insert into nom_movimientos_nomina (codnom,codcon,ficha) values (1,2,'".$fila[ficha]."')";			
	$resultado=sql_ejecutar($query);
	*/
	$cont = $cont +1;
	
		if ($cont>=$cargar)
		{
		$porcentaje=$porcentaje+1;
		?>
		<script>
		progreso(<?php echo $porcentaje; ?>);		
		</script>		
		<?php
		$cont=0;
		}
	}
	?>
	<script>
	CerrarVentana();
	</script>
	<?php
?>

</body>
</html>
