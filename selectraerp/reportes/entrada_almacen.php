<?php
include('config_reportes.php');
include('fpdf.php');

class PDF extends FPDF {
    public $title;
    public $conexion;
    public $datosgenerales;
    public $array_compra;
    function Header() {

        $width = 10;

        //$this->Image('../imagenes/banner_superior.jpg',10,5,190);


        $this->SetY(5);
        $this->SetFont('Arial','',6);
        //$this->SetFillColor(239,239,239);
        
        //$this->Cell(0,0, utf8_decode("Fecha de Creación: ".$this->array_movimiento[0]["fecha"]),0,0,'R');
        $this->Ln(3);

        $this->SetFont('Arial','',8);
        $this->Cell(0,0, "Cod. Movimiento: ".$this->array_movimiento[0]["id_transaccion"],0,0,'R');
        $this->Ln(3);

        $this->SetX(14);
        $this->SetFont('Arial','',6);
        $this->Cell(0,0, utf8_decode($this->datosgenerales[0]["nombre_empresa"]),0,0,'L');
        $this->Ln(3);

        $this->SetX(14);
        $this->Cell(0,0, utf8_decode($this->datosgenerales[0]["direccion"]),0,0,'L');
        $this->Ln(3);

        $this->SetX(14);
        $this->Cell(0,0,$this->datosgenerales[0]["id_fiscal2"].": ".$this->datosgenerales[0]["nit"]." - Telefonos: ".$this->datosgenerales[0]["telefonos"],0,0,'L');
        $this->Ln(3);

        $this->SetX(14);
        $this->SetFont('Arial','B',12);
        $this->Cell(0,0, "REPORTE DETALLE DE ENTRADA",0,0,'C');
        $this->Ln(6);




        $this->SetLeftMargin(50);
        $width = 5;
        $this->SetX(14);
        $this->SetFont('Arial','',6);
        $this->SetFillColor(10,10,10,10,10,10,10,10,10);
        $this->Cell(26,$width,'Codigo',1,0,"C",0);
        $this->Cell(140,$width,utf8_decode('Descripción'),1,0,"C",0);
        $this->Cell(26,$width,utf8_decode('Cantidad'),1,0,"C",0);
        $this->Ln(5);


    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial','I',10);

        $this->Cell(0,10,'Pagina '.$this->PageNo(),0,0,'C');
    }

    function dwawCell($title,$data) {
        $width = 8;
        $this->SetFont('Arial','B',12);
        $y =  $this->getY() * 20;
        $x =  $this->getX();
        $this->SetFillColor(10,10,10);
        $this->MultiCell(175,8,$title,0,1,'L',0);
        $this->SetY($y);
        $this->SetFont('Arial','',12);
        $this->SetFillColor(10,10,10);
        $w=$this->GetStringWidth($title)+3;
        $this->SetX($x+$w);
        $this->SetFillColor(10,10,10);
        $this->MultiCell(175,8,$data,0,1,'J',0);

    }


    function ChapterBody() {



        //$conn = new rp_Connect();
        //$conn->SQL("select * from esquema.almacen_ubicacion");





        $this->SetWidths(array(26,140,26));
        $this->SetAligns(array("C","J","C"));
        $this->SetFillColor(232,232,232);
        $cantidaditems = $this->array_movimiento[0]["numero_item"];

        $subtotal = 0;
        for($i=0;$i<$cantidaditems;$i++) {
            $this->SetLeftMargin(30);
            $width = 5;
            $this->SetX(14);
            $this->SetFont('Arial','',6);

            $this->Row(
                    array(  $this->array_movimiento[$i]["cod_item"],
                    $this->array_movimiento[$i]["descripcion1"],
                    $this->array_movimiento[$i]["cantidad_item"]),1);

        }
    }

    function ChapterTitle($num,$label) {
        $this->SetFont('Arial','',10);
        $this->SetFillColor(232,232,232);
        $this->Cell(0,6,"$label",0,1,'L',1);
        $this->Ln(8);
    }

    function SetTitle($title) {
        $this->title   = $title;
    }

    function PrintChapter() {
        $this->AddPage();
        $this->ChapterBody();
    }

    function DatosGenerales($array) {
        $this->datosgenerales = $array;
    }

    function Arraymovimiento($array) {
        $this->array_movimiento = $array;
    }


}


$id_transaccion = @$_GET["id_transaccion"];
$comunes = new ConexionComun();

$array_parametros_generales = $comunes->ObtenerFilasBySqlSelect("select * from parametros_generales");

$operacion="Entrada";
$array_movimiento = $comunes->ObtenerFilasBySqlSelect("SELECT *,kad.cantidad as cantidad_item, count(kad.id_item) as numero_item
    from kardex_almacen_detalle as kad left join almacen as alm on kad.id_almacen_entrada=alm.cod_almacen left join item as ite on kad.id_item=ite.id_item where id_transaccion = ".$id_transaccion);

if(count($array_movimiento)==0){
    echo "no se encontraron registros.";
    exit;
}

$pdf=new PDF('P','mm','letter');
$title='Detalle de Movimiento de Almacen';
$pdf->DatosGenerales($array_parametros_generales);
$pdf->Arraymovimiento($array_movimiento);

$pdf->SetTitle($title);
$pdf->PrintChapter();
$pdf->SetDisplayMode('default');
$pdf->Output();

?>
