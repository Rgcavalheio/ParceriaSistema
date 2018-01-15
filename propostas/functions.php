<?php
require_once('../config.php');
require_once(DBAPI);
$customers = null;
$customer = null;  
define('MPDF_PATH', 'MPDF/');
include(MPDF_PATH.'mpdf.php');



function viewPdf($vendedor,$cliente,$html1,$html2 = null,$html3 = null){

  $mpdf =new mPDF('utf-8', 'a4', 0, 'Calibri', 5, 5, 9, 0, 0, 0);
  $css = file_get_contents('pdf.css');
  $mpdf->WriteHTML($css,1);
  $mpdf->WriteHTML($html1);

  if($html2 != null){
    $mpdf->AddPage();
    $mpdf->WriteHTML($html2);
  }
   if($html3 != null){
    $mpdf->AddPage();
    $mpdf->WriteHTML($html3);
  }


  $mpdf->Output();


}


function imprimirPdf($vendedor,$cliente,$html1,$html2 = null,$html3 = null){

  $mpdf =new mPDF('utf-8', 'a4', 0, 'Calibri', 5, 5, 9, 0, 0, 0);
    $css = file_get_contents('pdf.css');
  $mpdf->WriteHTML($css,1);
  $mpdf->WriteHTML($html1);
    if($html2 != null){
    $mpdf->AddPage();
    $mpdf->WriteHTML($html2);
  }
    if($html3 != null){
    $mpdf->AddPage();
    $mpdf->WriteHTML($html3);
  }
  $mpdf->SetJS('this.print();');
  $mpdf->Output();


}


function gerapdf($vendedor,$proposta,$cliente,$html,$valor){

  $data = date("Y-m-d");
  $id = next_ai();
  

  $mpdf =new mPDF('utf-8', 'a4', 0, 'Calibri', 5, 5, 9, 0, 0, 0);
  $css = file_get_contents('pdf.css');
  $mpdf->WriteHTML($css,1);
  $mpdf->WriteHTML($html);
  $dir = "../propostas_geradas/";
  $file = $dir.$id.'.pdf';
  $mpdf->Output($file,'F');
  grava_historico($data,$vendedor,$proposta,$cliente,$valor);
  return $id;









}

function grava_historico($data,$vendedor,$proposta,$cliente,$valor){

  $database = open_database();



  // remove a ultima virgula
  
  $sql = "INSERT INTO historico (data,id_vendedor,id_proposta,id_cliente,valor) VALUES ('".$data."','".$vendedor."','".$proposta."','".$cliente."','".$valor."');";

  try {
    $database->query($sql);
    $array = next_ai();

    $_SESSION['type'] = 'success';
    


  } catch (Exception $e) { 


    $_SESSION['type'] = 'danger';
    
  } 
  close_database($database);


}












function index() {
	global $propostas;
	$propostas = find2('propostas');

}
function add() {


  if (!empty($_POST['proposta'])) {    


    $proposta = $_POST['proposta'];


    
    save('propostas', $proposta);
    header('location: index.php');
    
  }
}
function edit() {

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_POST['proposta'])) {
      $proposta = $_POST['proposta'];  

      update('propostas', $id, $proposta);
      header('location: index.php');
    } else {
      global $proposta;
      $proposta = find('propostas', $id);

    } 
  } else {
    header('location: index.php');
  }
}
function view($id = null) {
  global $proposta;
  $proposta = find('propostas', $id);

}
function delete($id = null) {
  global $proposta;
  $proposta = remove('propostas', $id);
  header('location: index.php');
}