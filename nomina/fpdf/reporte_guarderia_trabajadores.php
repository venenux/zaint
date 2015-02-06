<?php 
if (!isset($_SESSION)) {
  session_start();
}
require('fpdf.php');
require_once '../lib/config.php';
require_once '../lib/common.php';

include('numerosALetras.class.php');

class PDF extends FPDF
{

//Cabecera de página
function Header()
{
    $var_izquierda='../imagenes/SiSalud.jpg';
	$var_centro='../imagenes/dot.JPG';
	$var_derecha='../imagenes/dot.JPG';
	
    $this->SetFont("Arial","B",12);
    $this->Image($var_izquierda,25,12,30,15);
	$this->Image($var_centro,110,12,45,15);
	$this->Image($var_derecha,155,12,20,13);
	$this->SetFont('Arial','B',12);
     	$this->Ln(25);
	$this->Cell(188,5,'LISTADO DE TRABAJADORES CON PAGO DE GUARDERIA',0,0,'C');
	$this->Ln(10);

}

function Footer(){
	$this->SetY(-15);
	$this->SetFont('Arial','I',8);
	$this->Cell(0,5,utf8_decode('Página ').$this->PageNo().'/{nb}',0,1,'C');
	$this->Cell(188,10,'Elaborado Por: '.$_SESSION['nombre'],0,0,'L');

}


//Hacer que sea multilinea sin que haga un salto de linea
var $widths;
var $aligns;
var $celdas;
var $ancho;

function SetWidths($w)
{
    //Set the array of column widths
    $this->widths=$w;
} 
function SetAligns($a)
{
    //Set the array of column alignments
    $this->aligns=$a;
} 
// Marco de la celda
function Setceldas($cc)
{
   
    $this->celdas=$cc;
} 
// Ancho de la celda
function Setancho($aa)
{
    $this->ancho=$aa;
}
function CheckPageBreak($h)
{
    //If the height h would cause an overflow, add a new page immediately
    if($this->GetY()+$h>$this->PageBreakTrigger)
        $this->AddPage($this->CurOrientation);
} 
function NbLines($w,$txt)
{
    //Computes the number of lines a MultiCell of width w will take
    $cw=&$this->CurrentFont['cw'];
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
    $s=str_replace("\r",'',$txt);
    $nb=strlen($s);
    if($nb>0 and $s[$nb-1]=="\n")
        $nb--;
    $sep=-1;
    $i=0;
    $j=0;
    $l=0;
    $nl=1;
    while($i<$nb)
    {
        $c=$s[$i];
        if($c=="\n")
        {
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
            continue;
        }
        if($c==' ')
            $sep=$i;
        $l+=$cw[$c];
        if($l>$wmax)
        {
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
            }
            else
                $i=$sep+1;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
        }
        else
            $i++;
    }
    return $nl;
} 

function Row($data)
{
    //Calculate the height of the row
    $nb=0;
    for($i=0;$i<count($data);$i++)
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
    $h=5*$nb;
    //Issue a page break first if needed
    $this->CheckPageBreak($h);
    //Draw the cells of the row
    for($i=0;$i<count($data);$i++)
    {
        $w=$this->widths[$i];
        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
        //Save the current position
        $x=$this->GetX();
        $y=$this->GetY();
        //Draw the border
        //$this->Rect($x,$y,$w,$h);
        //Print the text
        $this->MultiCell($w,$this->ancho[$i],$data[$i],$this->celdas[$i],$a);
        //Put the position to the right of the cell
        $this->SetXY($x+$w,$y);
    }
    //Go to the next line
    $this->Ln($h);
}
//fin

function detalle($tipo_guarderia,$sexo,$parentesco,$nomina){

	$cadenaselect='';
	if($sexo!='Todos'){
		$cadenaselect=$cadenaselect." and nf.sexo='".$sexo."'";
	}
	if($parentesco!='Todos'){
		$cadenaselect=$cadenaselect.' and codpar='.$parentesco;
	}
	if($nomina!='Todos'){
		$cadenaselect=$cadenaselect.' and np.tipnom='.$nomina;
	}
	$conexion=conexion();
	if($tipo_guarderia=="Todos"){
		$consulta="select * from nompersonal as np INNER JOIN nomfamiliares as nf ON np.ficha=nf.ficha and nf.cedula=np.cedula and np.estado='Activo' and nf.codgua<>0  $cadenaselect  ORDER BY np.tipnom,nf.codgua,np.codnivel4,np.apenom ";
	}else{
		$consulta="select * from nompersonal as np INNER JOIN nomfamiliares as nf ON np.ficha=nf.ficha and nf.cedula=np.cedula and np.estado='Activo' and nf.codgua=$tipo_guarderia   $cadenaselect  ORDER BY np.tipnom,np.codnivel4,np.apenom";
	}
	
	$query=query($consulta,$conexion);
	
	
	$cantidad_registros=30;
	$cod_gerencia='';
	$cod_guarderia='';
	$TOTALTRABAJADOR=0;
	$TOTALCARGAFAMILIAR=0;
	$cod_nomina='';
	$totalcosto=0;
	$cod_persona='';
	while($fila=fetch_array($query)){
		$codg=$fila['codnivel4'];
		$codgu=$fila['codgua'];
		$codnom=$fila['tipnom'];
		$codper=$fila['ficha'];
		
			if($codnom!=$cod_nomina){
				$conexion=conexion();
				
				$consul="select * from nomtipos_nomina where codtip=$codnom";
				$q=query($consul,$conexion);
				$resuln=fetch_array($q);
				$nomnomina=$resuln['descrip'];
				$this->SetFont("Arial","B",12);
				if($cantidad_registros<=4){
					$this->Ln(300);
					$cantidad_registros=30;
					
				}

				$this->SetFont("Arial","B",10);
				$this->Cell(188,7,utf8_decode($codnom.".- ".$nomnomina),0,1,'L');
				$cantidad_registros-=1;
				$cod_nomina=$codnom;
				
	
	
			}
		
		if($codgu!=$cod_guarderia){
			$conexion=conexion();
			$this->Ln(5);
			$this->SetFont("Arial","B",12);
			$consul="select * from nomguarderias where codorg=$codgu";
			$qg=query($consul,$conexion);
			$resulg=fetch_array($qg);
			$nomguarderia=$resulg['descrip'];
			if($cantidad_registros<=3){
					$this->Ln(300);
					$cantidad_registros=30;
			}
			$this->Cell(188,5,"          ".utf8_decode($nomguarderia).utf8_decode("   -  Monto de Inscripción: ").number_format($resulg['montinscr'],2,',','.'),0,1,'L');
			$cantidad_registros-=1;
			$cod_guarderia=$codgu;
			$this->SetFont("Arial","I",12);
		}

		if($codg!=$cod_gerencia){
			
			$conexion=conexion();
			$this->SetFont("Arial","B",12);
			$consul="select * from nomnivel4 where codorg=$codg";
			$q=query($consul,$conexion);
			$resul=fetch_array($q);
			$nomgerencia=$resul['descrip'];
			if($cantidad_registros<=3){
					$this->Ln(300);
					$cantidad_registros=30;
			}
			$this->Cell(188,5,utf8_decode($codg.".- ".$nomgerencia),0,1,'L');
			$cantidad_registros-=2;
			$cod_gerencia=$codg;
			
			$this->SetFont("Arial","I",11);
			$this->SetWidths(array(15,75,20,50,28));
			$this->SetAligns(array('C','C','C','C','C'));
			$this->Setceldas(array(1,1,1,1,1));
			$this->Setancho(array(5,5,5,5,5));
			$this->Row(array(utf8_decode('Código'),'Nombre y Apellido',utf8_decode('Cédula'),'Hijo(a)','Mto Mensual '));


		}
			//$this->Cell(188,5,$cod_persona,0,1);
			if(($cod_persona!=trim($fila['ficha'])) && ($cod_persona!='')){
				
				if($totalcosto!=0){
					$this->SetFont('Arial','B',8);
					$this->Cell(178,5,'Total a Pagar--> '.number_format($totalcosto,2,',','.'),0,1,'R');
					$totalcosto=0;
					$this->SetFont('Arial','I',8);
					$cod_persona=$file['ficha'];
					$cantidad_registros-=1;
				}
			}
			if($cod_personal==''){
				$cod_persona=$fila['ficha'];
			}
			$ca=$fila['apellido'].', '.$fila['nombre'];
			$this->SetFont('Arial','I',8);
			$this->SetWidths(array(15,75,20,50,28));
			$this->SetAligns(array('C','L','L','L','R'));
			$this->Setceldas(array(1,1,1,1,1));
			if(strlen($ca)>=27){
				$var=1;
			}else{
				$var=0;
			}
			//$this->Cell(188,5,strlen($ca),0,1);
			if ((strlen($fila['apenom'])>=43)&& $var==1){
				$this->Setancho(array(10,5,10,5,10));
				$cantidad_registros-=1;
			}
			if ((strlen($fila['apenom'])>=43)&& $var==0){
				$this->Setancho(array(10,5,10,10,10));
				$cantidad_registros-=1;
			}
			if ((strlen($fila['apenom'])<43)&& $var==1){
				$this->Setancho(array(10,10,10,5,10));
				$cantidad_registros-=1;
			}
			if ((strlen($fila['apenom'])<43)&& $var==0){
				$this->Setancho(array(5,5,5,5,5));
				
			}
			
			$this->Row(array($fila['ficha'],$fila['apenom'],number_format($fila[0],0,'.','.'),utf8_decode($ca),number_format($fila['costo'],2,',','.')));
			$cantidad_registros-=1;
			$totalcosto+=$fila['costo'];
			$TOTALCARGAFAMILIAR+=1;
			
		
		if($cantidad_registros==0){
			
			$this->Ln(300);
			$cantidad_registros=30;
		}
		
		
		
		
		
		
	}
			
		if($totalcosto!=0){
			$this->SetFont('Arial','B',8);
			$this->Cell(178,5,'Total a Pagar--> '.number_format($totalcosto,2,',','.'),0,1,'R');
			$totalcosto=0;
			$this->SetFont('Arial','I',8);
			$cod_persona=$file['ficha'];
			$cantidad_registros-=1;
		}
	
	$this->Ln();
	$conexion=conexion();
	if($tipo_guarderia=="Todos"){
		$consulta="select * from nompersonal as np INNER JOIN nomfamiliares as nf ON np.ficha=nf.ficha and nf.cedula=np.cedula and np.estado='Activo' and nf.codgua<>0  $cadenaselect group by np.cedula ORDER BY np.tipnom,nf.codgua,np.codnivel4,np.apenom ";
	}else{
		$consulta="select * from nompersonal as np INNER JOIN nomfamiliares as nf ON np.ficha=nf.ficha and nf.cedula=np.cedula and np.estado='Activo' and nf.codgua=$tipo_guarderia   $cadenaselect group by np.cedula ORDER BY np.tipnom,np.codnivel4,np.apenom";
	}
	
	$query=query($consulta,$conexion);
	$this->Ln();
	$this->SetFont('Arial','B',12);
	$this->Cell(188,5,'Total de Trabajadores => '.num_rows($query),0,1,'R');
	$this->Cell(188,5,'Total de Carga Familiar => '.$TOTALCARGAFAMILIAR,0,1,'R');
	
}
}
//Creación del objeto de la clase heredada
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$tipo_guarderia=$_POST['tipoguarderia'];
$sexo=$_POST['sexo'];
$parentesco=$_POST['parentesco'];
$nomina=$_POST['nomina'];

$pdf->detalle($tipo_guarderia,$sexo,$parentesco,$nomina);

$pdf->Output();
?>