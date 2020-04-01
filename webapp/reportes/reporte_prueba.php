<?php
require '../../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;
// Form sent
// print($_POST['val']);
// if( isset($_POST['val']) ){

//ob_start();
// include dirname(__FILE__).'/res/foo.php';
// $content = ob_get_clean();

// $html2pdf = new HTML2PDF('P', 'A4', 'fr', true, 'UTF-8', array(15, 5, 15, 5));
// $html2pdf->pdf->SetDisplayMode('fullpage');
// $html2pdf->writeHTML($content);
// $html2pdf->Output('exemple02.pdf');//

try {
    
    $html2pdf = new HTML2PDF('P', 'A4', 'fr', true, 'UTF-8', array(30, 8, 30, 8));
    $html2pdf->pdf->SetTitle('Listado de PUBLICAIONES');
    $conectar = new mysqli('localhost', 'root', '', 'aula_virtual');
    
    //query, consulta
    
   $sql = "SELECT id_publicacion,titulo,creado_en,general,usuario FROM publicacion ORDER BY id_publicacion ASC";
    // print($sql);
    $query = $conectar->query($sql);
    
    /*
     * while ($row = $query->fetch_object()) {
     * $resultSet[] = $row;
     * }
     */
    
    ob_start();
    include dirname(__FILE__) . 'res/about.php';
    $mihtml = ob_get_clean();
    
    // Conseguimos todos los usuarios//
    // $allusers=$resultSet;//
    $mihtml .= '<body>' ;
    $mihtml .= '<br> ' ;
    $mihtml .= '<img  class="avatar" src="../Img/LOGO_PR.jpg" width="100" /> ' ;
    $mihtml .= '<br> ' ;
    $mihtml .= '<h1 style="text-align: center">REPORTE DE PUBLICACIONES</h1> ' ;
    $mihtml .= '<br> ' ;
    $mihtml .= '<br> ' ;
    $mihtml .= '<br> ' ;
    
    //TABLA
    $mihtml .= ' <table style="border: 0px solid #000; font-size: 9pt;align:center ">';
    $mihtml .= '<thead>';
    $mihtml .= '<tr ">';
    $mihtml .= '<th > NUM REGISTRO |</th>';
    $mihtml .= '<th > AUTOR  PUBLICACION| </th>';
    $mihtml .= '<th >  DIRIGIDO A| </th>';
    $mihtml .= '<th > TITULO DE PUBLICACION</th>';
    $mihtml .= '<th >|</th>';
    $mihtml .= '<th >FECHA DE CREACION </th>';
    $mihtml .= '</tr>';
    $mihtml .= '</thead>';
    $mihtml .= '<tbody >';
    
    //llamas a los campos de la base de datos 
    
    while ($transacciones = $query->fetch_assoc()) {
        $mihtml .= '<tr ><td >' . $transacciones['id_publicacion'] . "</td>";
        $mihtml .= '<td >' . $transacciones['usuario'] . "</td>";
        $mihtml .= '<td >' . $transacciones['general'] . "</td>";
        $mihtml .= '<td >' . $transacciones['titulo'] . "</td>";
        $mihtml .= '<th ><br></th>';
        $mihtml .= '<td >' . $transacciones['creado_en'] . "</td></tr>";
    }
    
    $mihtml .= '</tbody>';
    $mihtml .= '</table>';
    $mihtml .= '</body>' ;
    
    $html2pdf->writeHTML($mihtml, true, 0, true, 0);
    //$html2pdf->createIndex('Sommaire', 25, 12, false, true, 1);
    // $html2pdf->createIndex('Sommaire', 25, 12, false, true, 2, null, '10mm');
    $html2pdf->output('about.pdf');
} catch (Html2PdfException $e) {
    $html2pdf->clean();
    
    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}

?>