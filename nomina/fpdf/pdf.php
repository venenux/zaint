<?
function validar_firma($string){
	$conexionconf=conexion_conf();
	$consulta="select * from firmas where cod_reporte='".$string."'ORDER BY orden_reporte";
	$fir=query($consulta,$conexionconf);
	$can=num_rows($fir);
	if($can!=0){
		return true;
	}else{
		return false;
	}
}
function firma_dinamica($string,$pdf,$tamletra,$anblan){
	$conexionconf=conexion_conf();
	$consulta="select * from firmas where cod_reporte='".$string."'ORDER BY orden_reporte";
	$fir=query($consulta,$conexionconf);
	$can=num_rows($fir);
	$div=188/$can;
	
	$espacio=array($can);
	$aligns=array($can);
	$mlbr=array($can);
	$mlr=array($can);
	$mlbr=array($can);
	$sangria=array($can);
	$sangria2=array($can);
	
	for ($i=0;$i<$can;$i++){
		$espacio[$i]=$div;
		$aligns[$i]="C";
		$mltr[$i]="LTR";
		$mlr[$i]="LR";
		$mlbr[$i]="LBR";
		$sangria[$i]="5";
		$sangria2[$i]=$anblan;
	}
	
	$pdf->SetWidths($espacio);
	$pdf->SetAligns($aligns);
      	$pdf->Setancho($sangria);

	$pdf->Setceldas($mltr);
	$pdf->Setceldas($mlr);
	$pdf->Setceldas($mlbr);

	$pdf->SetFont('Arial','I',$tamletra);
	$v=0;
	while ($firma=fetch_array($fir)){
			$descripcion[$v]=utf8_decode($firma['descripcion']);
		$cargo[$v]=utf8_decode($firma['cargo_persona']);
		$nombre[$v]=utf8_decode($firma['nombre_persona']);
		$blanco[$v]=" ";
		$v++;
	}
	$pdf->Setceldas($mltr);
	$pdf->Row($descripcion);
	$pdf->SetFont('Arial','I',$tamletra);
	$pdf->Setceldas($mlr);
	$pdf->Setancho($sangria2);
	$pdf->Row($blanco);
	$pdf->Ln();
	$pdf->Ln(-5);
	$pdf->Setancho($sangria);
	$pdf->Setceldas($mltr);
	$pdf->Row($cargo);
	$pdf->Setceldas($mlbr);
	$pdf->Row($nombre);
	
	
}


function liquidacion($pdf){
	// Firmantes
	$pdf->SetFont('Arial','I',6);
	
	$pdf->Cell(33,10,'','LT',0);
	$pdf->Cell(33,10,'','LT',0);
	$pdf->Cell(37,10,'','LT',0);
	$pdf->Cell(33,10,'','LT',0);
	$pdf->Cell(31,10,'','LT',0);
	$pdf->Cell(31,10,'','LTR',1);
	
    // llamado para hacer multilinea sin que haga salto de linea
    	$pdf->SetWidths(array(33,33,37,33,31,31));
	$pdf->SetAligns(array('C','C','C','C','C','C'));
        $pdf->Setceldas(array('1','1','1','1','1',1));
	$pdf->Setancho(array(5,5,5,5,5,5));
        $pdf->Row(array(utf8_decode('Analista Responsable'),'Dpto. de Movimientos','Gcia.Cap. y Pagos al Personal','Gcia.Gral. de RRHH','Auditoria Interna','Gcia. de Finanzas'));
	
	// fin
}

function liquidacion2($pdf){
	// Firmantes
	$pdf->SetFont('Arial','I',6);
	
	$pdf->Cell(66,10,'','LT',0);
	$pdf->Cell(66,10,'','LT',0);
	$pdf->Cell(66,10,'','LTR',1);
	/*$pdf->Cell(33,10,'','LT',0);
	$pdf->Cell(31,10,'','LT',0);
	$pdf->Cell(31,10,'','LTR',1);
	*/
    // llamado para hacer multilinea sin que haga salto de linea
    	$pdf->SetWidths(array(66,66,66));
	$pdf->SetAligns(array('C','C','C'));
        $pdf->Setceldas(array('1','1','1',1));
	$pdf->Setancho(array(5,5,5));
        $pdf->Row(array(utf8_decode('DIRECTOR GENERAL DE DESPACHO'),'PRESIDENCIA','FIRMA DEL TRABAJADOR'));
	
	// fin
}



?>