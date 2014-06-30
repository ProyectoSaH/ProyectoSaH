<pre>
<?php

$estado = $_POST;
print_r($estado);
print_r($estado['data']['User']['field']);
$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

if(isset($estado['type_1'])){
$es = 'Ver';    //True se Ve el PDF
}else{
$es = 'Descarga';    //False se Descarga el PDF
}

$select = $estado['data']['User']['field']; //Seleccion Valor
?>
</pre>

<!--    INICIO PDF      -->
<?php
App::import('Vendor','tcpdf/xtcpdf');
ob_clean();

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('IECI');
$pdf->SetTitle('SISTEMA SAH');
$pdf->SetSubject('Desarrollo de Software');


$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.$select, PDF_HEADER_STRING);

$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

$pdf->SetFont('Helvetica', '', 10);

$pdf->AddPage();
$html = '<h1>Informe de '.$select.' del mes de '.$meses[date('n')-1].'</h1><br>';
$pdf->writeHTML($html, true, false, true, false, '');

$html = '<p>El presente documento muestra muestra la informacion seleccionada a fin de conocer la situacion de los usuarios, clientes y citas hechas en esta aplicacion<br><br><b>Metodo de entrada: </b>'.$es.'<br><b>Tipo Informe: </b>'.$select.'</p><br>';
$pdf->writeHTML($html, true, false, true, false, '');

//Columnas de la tabla
$subtable = '<table border="1" cellspacing="6" cellpadding="4"><tr><td>a</td><td>b</td></tr><tr><td>c</td><td>d</td></tr></table>'; 
$html = '<h2>Numero de usuarios: </h2>
<h2>Fecha: '.$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y').'</h2>
<table border="1" cellspacing="3" cellpadding="4">
    <tr>
        <th align="center" width="200">Nombre</th>
        <th align="center">Cargo</th>
        <th align="center" width="90">Citas del mes</th>
        <th align="center" width="90">Citas Realizadas</th>
        <th align="center" width="90">Citas Canceladas</th>
    </tr>
    <tr>
        <td>nombre del loco</td>
        <td>cargo del loco</td>
        <td align="center">2</td>
        <td align="center">1</td>
        <td align="center">1</td>
    </tr>
    
</table>';
$pdf->writeHTML($html, true, false, true, false, '');

$pdf->lastPage();

if(isset($estado['type_1'])) {
$pdf->Output('info_'.'_'.date('d'.'_'.'m'.'_'.'y'.'_'.'h'.'_'.'i').'.pdf', 'I');
}else{
$pdf->Output('info_'.'_'.date('d'.'_'.'m'.'_'.'y'.'_'.'h'.'_'.'i').'.pdf', 'D');

}
?>
<!--    FIN PDF      -->