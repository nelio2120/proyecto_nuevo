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
    $html2pdf->pdf->SetTitle('Listado de Roles');
    $conectar = new mysqli('localhost', 'root', '', 'aula_virtual');
    
    
    $sql = "SELECT u.nombre,u.usuario,r.rol,u.edad,u.telefono FROM usuario u ,rol r ORDER BY nombre ASC";
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
    $mihtml .= '<img  class="avatar" src="../Img/LOGO_PR.jpg" width="100" /> ' ;
    $mihtml .= '<h1 style="text-align: center">REPORTE DE ROLES</h1> ' ;
    $mihtml .= '<br> ' ;
    $mihtml .= '<br> ' ;
    $mihtml .= ' <table style="border: 0px solid #000; font-size: 15pt;align:center ">';
    $mihtml .= '<thead>';
    $mihtml .= '<tr ">';
    $mihtml .= '<th >NOMBRES</th>';
    $mihtml .= '<th >USUARIO</th>';
    $mihtml .= '<th >ROL</th>';
    $mihtml .= '<th >EDAD</th>';
    $mihtml .= '<th colspan="3">TELEFONO</th>';
    $mihtml .= '</tr>';
    $mihtml .= '</thead>';
    $mihtml .= '<tbody >';
    
    while ($transacciones = $query->fetch_assoc()) {
        $mihtml .= '<tr ><td >' . $transacciones['nombre'] . "</td>";
        $mihtml .= '<td >' . $transacciones['usuario'] . "</td>";
        $mihtml .= '<td >' . $transacciones['rol'] . "</td>";
        $mihtml .= '<td >' . $transacciones['edad'] . "</td>";
        $mihtml .= '<td >' . $transacciones['telefono'] . "</td></tr>";
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