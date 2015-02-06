<?php 
session_start();
ob_start();
?>

<?php
include("../lib/common.php");
include ("../header.php");
include ("func_bd.php");
include ("funciones_nomina.php");
ini_set("memory_limit", "16M");
ini_set("error_reporting","~E_ERROR");
//error_reporting(E_ERROR);
?>

<html>
<head>
<title>Generando Nomina</title>

<script type="text/javascript">
function CerrarVentana(){
	javascript:window.close();
}



var isCSS, isW3C, isIE4, isNN4, isIE6CSS;


function initDHTMLAPI() {
    if (document.images) {
        isCSS = (document.body && document.body.style) ? true : false;
        isW3C = (isCSS && document.getElementById) ? true : false;
        isIE4 = (isCSS && document.all) ? true : false;
        isNN4 = (document.layers) ? true : false;
        isIE6CSS = (document.compatMode && document.compatMode.indexOf("CSS1") >= 0) ? true : false;
    }
}

window.onload = initDHTMLAPI;

// Seek nested NN4 layer from string name
function seekLayer(doc, name) {
    var theObj;
    for (var i = 0; i < doc.layers.length; i++) {
        if (doc.layers[i].name == name) {
            theObj = doc.layers[i];
            break;
        }
        // dive into nested layers if necessary
        if (doc.layers[i].document.layers.length > 0) {
            theObj = seekLayer(document.layers[i].document, name);
        }
    }
    return theObj;
}

// Convert object name string or object reference
// into a valid element object reference
function getRawObject(obj) {
    var theObj;
    if (typeof obj == "string") {
        if (isW3C) {
            theObj = document.getElementById(obj);
        } else if (isIE4) {
            theObj = document.all(obj);
        } else if (isNN4) {
            theObj = seekLayer(document, obj);
        }
    } else {
        // pass through object reference
        theObj = obj;
    }
    return theObj;
}

// Convert object name string or object reference
// into a valid style (or NN4 layer) reference
function getObject(obj) {
    var theObj = getRawObject(obj);
    if (theObj && isCSS) {
        theObj = theObj.style;
    }
    return theObj;
}

// Position an object at a specific pixel coordinate
function shiftTo(obj, x, y) {
    var theObj = getObject(obj);
    if (theObj) {
        if (isCSS) {
            // equalize incorrect numeric value type
            var units = (typeof theObj.left == "string") ? "px" : 0 
            theObj.left = x + units;
            theObj.top = y + units;
        } else if (isNN4) {
            theObj.moveTo(x,y)
        }
    }
}

// Move an object by x and/or y pixels
function shiftBy(obj, deltaX, deltaY) {
    var theObj = getObject(obj);
    if (theObj) {
        if (isCSS) {
            // equalize incorrect numeric value type
            var units = (typeof theObj.left == "string") ? "px" : 0 
            theObj.left = getObjectLeft(obj) + deltaX + units;
            theObj.top = getObjectTop(obj) + deltaY + units;
        } else if (isNN4) {
            theObj.moveBy(deltaX, deltaY);
        }
    }
}

// Set the z-order of an object
function setZIndex(obj, zOrder) {
    var theObj = getObject(obj);
    if (theObj) {
        theObj.zIndex = zOrder;
    }
}

// Set the background color of an object
function setBGColor(obj, color) {
    var theObj = getObject(obj);
    if (theObj) {
        if (isNN4) {
            theObj.bgColor = color;
        } else if (isCSS) {
            theObj.backgroundColor = color;
        }
    }
}

// Set the visibility of an object to visible
function show(obj) {
    var theObj = getObject(obj);
    if (theObj) {
        theObj.visibility = "visible";
    }
}

// Set the visibility of an object to hidden
function hide(obj) {
    var theObj = getObject(obj);
    if (theObj) {
        theObj.visibility = "hidden";
    }
}

// Retrieve the x coordinate of a positionable object
function getObjectLeft(obj)  {
    var elem = getRawObject(obj);
    var result = 0;
    if (document.defaultView) {
        var style = document.defaultView;
        var cssDecl = style.getComputedStyle(elem, "");
        result = cssDecl.getPropertyValue("left");
    } else if (elem.currentStyle) {
        result = elem.currentStyle.left;
    } else if (elem.style) {
        result = elem.style.left;
    } else if (isNN4) {
        result = elem.left;
    }
    return parseInt(result);
}

// Retrieve the y coordinate of a positionable object
function getObjectTop(obj)  {
    var elem = getRawObject(obj);
    var result = 0;
    if (document.defaultView) {
        var style = document.defaultView;
        var cssDecl = style.getComputedStyle(elem, "");
        result = cssDecl.getPropertyValue("top");
    } else if (elem.currentStyle) {
        result = elem.currentStyle.top;
    } else if (elem.style) {
        result = elem.style.top;
    } else if (isNN4) {
        result = elem.top;
    }
    return parseInt(result);
}

// Retrieve the rendered width of an element
function getObjectWidth(obj)  {
    var elem = getRawObject(obj);
    var result = 0;
    if (elem.offsetWidth) {
        result = elem.offsetWidth;
    } else if (elem.clip && elem.clip.width) {
        result = elem.clip.width;
    } else if (elem.style && elem.style.pixelWidth) {
        result = elem.style.pixelWidth;
    }
    return parseInt(result);
}

// Retrieve the rendered height of an element
function getObjectHeight(obj)  {
    var elem = getRawObject(obj);
    var result = 0;
    if (elem.offsetHeight) {
        result = elem.offsetHeight;
    } else if (elem.clip && elem.clip.height) {
        result = elem.clip.height;
    } else if (elem.style && elem.style.pixelHeight) {
        result = elem.style.pixelHeight;
    }
    return parseInt(result);
}

// Return the available content width space in browser window
function getInsideWindowWidth() {
    if (window.innerWidth) {
        return window.innerWidth;
    } else if (isIE6CSS) {
        // measure the html element's clientWidth
        return document.body.parentElement.clientWidth
    } else if (document.body && document.body.clientWidth) {
        return document.body.clientWidth;
    }
    return 0;
}

// Return the available content height space in browser window
function getInsideWindowHeight() {
    if (window.innerHeight) {
        return window.innerHeight;
    } else if (isIE6CSS) {
        // measure the html element's clientHeight
        return document.body.parentElement.clientHeight
    } else if (document.body && document.body.clientHeight) {
        return document.body.clientHeight;
    }
    return 0;
}


</script>
<script type="text/javascript">
// Center a positionable element whose name is passed as 
// a parameter in the current window/frame, and show it
function centerOnWindow(elemID) {
    // 'obj' is the positionable object
    var obj = getRawObject(elemID);
    // window scroll factors
    var scrollX = 0, scrollY = 0;
    if (document.body && typeof document.body.scrollTop != "undefined") {
        scrollX += document.body.scrollLeft;
        scrollY += document.body.scrollTop;
        if (document.body.parentNode && 
            typeof document.body.parentNode.scrollTop != "undefined") {
            scrollX += document.body.parentNode.scrollLeft;
            scrollY += document.body.parentNode.scrollTop
        }
    } else if (typeof window.pageXOffset != "undefined") {
        scrollX += window.pageXOffset;
        scrollY += window.pageYOffset;
    }
    var x = Math.round((getInsideWindowWidth()/2) - (getObjectWidth(obj)/2)) + scrollX;
    var y = Math.round((getInsideWindowHeight()/2) -  (getObjectHeight(obj)/2)) + scrollY;
    shiftTo(obj, x, y);
    show(obj);
}

function initProgressBar() {

  // create quirks object whose default (CSS-compatible) values
    // are zero; pertinent values for quirks mode filled in later  
  if (navigator.appName == "Microsoft Internet Explorer" && 
        navigator.userAgent.indexOf("Win") != -1 && 
        (typeof document.compatMode == "undefined" || 
        document.compatMode == "BackCompat")) {
        document.getElementById("progressBar").style.height = "81px";
        document.getElementById("progressBar").style.width = "444px";
        document.getElementById("sliderWrapper").style.fontSize = "xx-small";
        document.getElementById("slider").style.fontSize = "xx-small";
        document.getElementById("slider").style.height = "13px";
        document.getElementById("slider").style.width = "415px";
    }
}

function showProgressBar() {
    centerOnWindow("progressBar");
}

function calcProgress(current, total) {
    if (current <= total) {
        var factor = current/total;
        var pct = Math.ceil(factor * 100);
        document.getElementById("sliderWrapper").firstChild.nodeValue = pct + "%";
        document.getElementById("slider").firstChild.nodeValue = pct + "%";
        document.getElementById("slider").style.clip = "rect(0px " + parseInt(factor * 417) + "px 16px 0px)";
		//alert("s");
    }
}

function hideProgressBar() {
    hide("progressBar");
    calcProgress(0, 0);
}

// Test bench to see progress bar in action at random intervals
//var loopObject = {start:0, end:311, current:0, interval:null};


function runit() {
    if (loopObject.current <= loopObject.end) {
        calcProgress(loopObject.current, loopObject.end);
        //loopObject.current += Math.random();
        loopObject.interval = setTimeout("runit()", 700);
    } else {
        calcProgress(loopObject.end, loopObject.end);
        loopObject.current = 0;
        loopObject.interval = null;
        setTimeout("hideProgressBar()", 500);
    }
}

function test() {
    showProgressBar();
    runit();
}

function Enviar(){
	document.frmPrincipal.op.value=1;
	document.frmPrincipal.submit();
}

</script>
</head>
<body>

</p>
<?php 

	$registro_id=$_GET['nomina'];		
	$cod_nomina=$_GET['codigo_nomina'];	
	$consulta="select * from nom_nominas_pago where codnom='".$registro_id."' and tipnom='".$_SESSION['codigo_nomina']."'";
	$resultado_nom=sql_ejecutar($consulta);
	$fila_nom=fetch_array($resultado_nom);
	$op=$_POST['op'];
	$pagina2=$_GET['pagina2'];
	//mysql_free_result($resultado_nom);

	$consulta="select monsalmin from nomempresa";
	$resultado_salmin=sql_ejecutar($consulta);
	$fila_salmin=fetch_array($resultado_salmin);
	
?>
<form id="frmPrincipal" name="frmPrincipal" method="post" action="">
	<input type="hidden" name="op" id="op" value="0">
	<input type="hidden" name="codnomm" id="codnomm" value="<?echo $registro_id;?>">
	<input type="hidden" name="codtt" id="codtt" value="<?echo $_SESSION['codigo_nomina'];?>">
	<input type="hidden" name="pagina" id="pagina" value="<?echo $pagina2;?>">
	<div id="progressBar">
	<div id="progressBarMsg">
	  <p>
	    <?php
	if ($op==1)	
	{
	?>
	    Generando N&oacute;mina, Espere por favor...
	    <?php 
	}
	else
	{
	?>
	    Presione Aceptar para Generar la N&oacute;mina...
	    <?php
	}
	?>
      </p>

	    <label></label>
	    <label></label>
	</div>
	
	<div id="sliderWrapper">0%
	  <div id="slider" style="visibility:hidden"><input border="0" style=" visibility:visible;width:300px;border:hidden;background-color:#FFFFFF;border-color:#eeeeee" value="" type="text" id="empleado" name="empleado" />
	    <input border="0" style=" visibility:visible;width:300px;border:hidden; background-color:#FFFFFF;border-color:#eeeeee" value="" type="text" id="concepto" name="concepto" />
	  </div>
	</div>
	</div>
	
  <p>
  <?php

	if ($op==1)
	{
		// BORRA LOS MOVIMIENTO DE LA NOMINA A PROCESAR
		// BORRA LOS MOVIMIENTO DE LA NOMINA A PROCESAR
		$query="delete from nom_movimientos_nomina where tipnom='".$_SESSION['codigo_nomina']."' and codnom='$registro_id' and ficha='".$_GET['ficha']."' and contractual=1";
		$result3=sql_ejecutar($query);	
		// FILTRALOS EMPLEADOS SEGUN LA NOMINA ACTUAL
		//$query="select * from nompersonal where tipnom = $cod_nomina";
		

		$query="select * from nomconceptos as c
		inner join
		nomconceptos_tiponomina as ct on c.codcon = ct.codcon
		inner join
		nomconceptos_frecuencias as cf on c.codcon = cf.codcon
		inner join
		nomconceptos_situaciones as cs on c.codcon = cs.codcon
		inner join
		nompersonal as pe on cs.estado = pe.estado 
		where cf.codfre='".$fila_nom['frecuencia']."' and pe.tipnom = '".$_SESSION['codigo_nomina']."' and ct.codtip = '".$_SESSION['codigo_nomina']."' and pe.ficha='$_GET[ficha]' and cs.estado = pe.estado and c.contractual='1' group by pe.apenom,pe.ficha,c.formula,c.codcon,cs.estado order by c.tipcon, c.codcon";
		$result2=sql_ejecutar($query);
		$end = num_rows($result2);	
		$cont=0;
		
		// pertenece a los campos pero es el mismo valor para todos
		$FECHAHOY=date("d/m/Y");
		
		?>
	  <script>
		var loopObject = {start:0, end:<?php echo $end; ?>, current:0, interval:null};
		</script>
	  <?php

		$CODNOM=$registro_id;
		$FECHANOMINA=$fila_nom['periodo_ini'];
		$FECHAFINNOM=$fila_nom['periodo_fin'];
		$LUNES=lunes($FECHANOMINA);	
		$LUNESPER=lunes_per($FECHANOMINA,$FECHAFINNOM);
		$PRS=$bandera;

		$SALARIOMIN=$fila_salmin['monsalmin'];

		while ($fila = fetch_array($result2))
		{
			// prepara las variables con los valores
			
			$NOMBRE=$fila[apenom];
			$FECHARETIRO=$fila[fecharetiro];
			//msgbox($fila[apenom]);
			
			?>
			<script>
			document.frmPrincipal.empleado.value ='Empleado: <?php echo $NOMBRE; ?>';
			document.frmPrincipal.concepto.value ='Concepto: <?php echo $fila[descrip]; ?>';			
			</script>
			<?php
			$CEDULA = $fila[cedula];
			$FICHA = $fila[ficha];
			$SUELDO=$fila[suesal];//LISTO
			$SEXO=".".$fila[sexo]."'";
			$FECHANACIMIENTO=date("d/m/Y",strtotime($fila[$fecnac]));
			$EDAD=date("Y")-date("Y",$fila[$fecnac]);
			$TIPONOMINA=$fila[tipnom];//LISTO
			$FECHAINGRESO=$fila[fecing];//LISTO
			$CODPROFESION=$fila[codpro];
			$CODCATEGORIA=$fila[codcat];
			$CODCARGO=$fila[codcargo];
			$SITUACIONPER=$SITUACION=$fila[estado];
			$SITUACIONPER=$fila[estado];
			$SUELDOPROPUESTO=$fila[sueldopro];
			$TIPOCONTRATO=$fila[contrato];
			$FORMACOBRO=$fila[forcob];
			$NIVEL1=$fila[codnivel1];
			$NIVEL2=$fila[codnivel2];
			$NIVEL3=$fila[codnivel3];
			$NIVEL4=$fila[codnivel4];
			$NIVEL5=$fila[codnivel5];
			$NIVEL6=$fila[codnivel6];
			$NIVEL7=$fila[codnivel7];
			$FECHAAPLICACION=$fila[fechaplica];
			$TIPOPRESENTACION=$fila[tipopres];
			$FECHAFINSUS=$fila[fechasus];
			$FECHAINISUS=$fila[fechareisus];
			$FECHAFINCONTRATO=$fila[fecharetiro];
			$REF=0;
			$CONTRACTUAL=$fila[contractual];
			if($fila[fechavac])
				$FECHAVAC=date("Y-m-d", strtotime("$fila[fechavac] -1 day"));
			else
				$FECHAVAC='0000-00-00';
			$FECHAREIVAC=$fila[fechareivac];
			$PRT=$fila[proratea];
			//-----------------------------------



			$cont=$cont+1;

			if ($fila['formula']!='')
			{
				//$formula=strtoupper($fila[formula]);
				//$cadena_eval="\$MONTO=$formula";	
				$formula=$fila[formula];
				//eval($cadena_eval);

				if ($fila[contractual]==1){
					eval($formula);
					if($MONTO<=0 && $fila[montocero]==1){
						$entrar=0;
					}else{
						$entrar=1;
					}
					if ($entrar==1)
					{
						$query="insert into nom_movimientos_nomina 
						(codnom,codcon,ficha,mes,anio,monto,cedula,tipcon,unidad,valor,descrip,codnivel1,codnivel2,codnivel3,codnivel4,codnivel5,codnivel6,codnivel7,tipnom,contractual) values ('$registro_id','".$fila[codcon]."','".$fila[ficha]."','".$fila_nom[mes]."','".$fila_nom[anio]."','$MONTO','$CEDULA','".$fila[tipcon]."','".$fila[unidad]."','".$REF."','".$fila['descrip']."','$fila[codnivel1]','$fila[codnivel2]','$fila[codnivel3]','$fila[codnivel4]','$fila[codnivel5]','$fila[codnivel6]','$fila[codnivel7]','".$_SESSION['codigo_nomina']."','".$fila['contractual']."')";
						$result=sql_ejecutar($query);
						unset($result);
					}
				}
			}

			?>
		<script>
		loopObject.current =<?php echo $cont; ?>;
		runit();
		</script>		
	  <?php	
		unset($MONTO);
		unset($T01);
		unset($T02);
		unset($T03);
		unset($T04);
		unset($T05);
		unset($T06);
		unset($T07);	
		unset($FICHA);
		unset($SUELDO);
		unset($SEXO);
		unset($FECHANACIMIENTO);
		unset($EDAD);
		unset($TIPONOMINA);
		unset($FECHAINGRESO);
		unset($CODPROFESION);
		unset($CODCATEGORIA);
		unset($CODCARGO);
		unset($SITUACION);
		unset($FORMACOBRO);
		//unset($formula);
		//unset($resultado2);
		//mysql_free_result($resultado2);
		}
		$codigo_nuevo=AgregarCodigo("nom_nominas_pago","codnom", "where codtip='".$_SESSION['codigo_nomina']."'");
		$codigo_nuevo-=1;
		$consulta="update nomtipos_nomina set codnom='".$codigo_nuevo."' where codtip='".$_SESSION['codigo_nomina']."'";
		sql_ejecutar($consulta);
		//echo memory_get_usage()/1024;
 		echo "<SCRIPT language=\"JavaScript\" type=\"text/javascript\">
		window.opener.document.forms[0].buscar.value=$_GET[ficha]
		window.opener.document.forms[0].submit() 		
		
		</SCRIPT>";
	}
	
	?>
	<script>
	document.frmPrincipal.empleado.value ='';
	document.frmPrincipal.concepto.value ='';
	</script><a href="func_bd.php"></a>
	<?php

	?>
  <label></label>
  <table width="280" border="0">
    <tr>
      <td width="160"><div align="center">
        <?php btn('ok','Enviar();',2) ?>
      </div></td>
      <td width="118"><div align="center">
        <?php btn('cerrar','CerrarVentana();',2) ?>
      </div></td>
    </tr>
  </table>
  </form>
</body>
</html>
