<?php
/* Database connection start */
$servername = "mysql.parceriaafsistema.com.br";
$username = "parceriaafsist";
$password = "3791645j";
$dbname = "parceriaafsist";


$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'id', 
	1 => 'nome',
	2 => 'telefone',
	4 => 'cidade',
	6 => 'email',
	7 => 'situacao',
);

// getting total number records without any search, nome, telefone, celular, cidade, uf, email, situacao, id_vendedor
$sql = "SELECT id, nome, telefone, cidade, email";
$sql.=" FROM clientes";
$query=mysqli_query($conn, $sql) or die("cliente-grid-data.php: get clientes");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT id, nome, telefone, cidade, email ";
$sql.=" FROM clientes WHERE 1=1";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( name LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR email LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR cidade LIKE '".$requestData['search']['value']."%' )";
	
}
$query=mysqli_query($conn, $sql) or die("cliente-grid-data.php: get clientes");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($conn, $sql) or die("cliente-grid-data.php: get clientes");

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["id"];
	$nestedData[] = $row["nome"];
	$nestedData[] = $row["telefone"];
	$nestedData[] = $row["cidade"];
	$nestedData[] = $row["email"];
	$nestedData[] = $row["situacao"];
	
	$data[] = $nestedData;
}



$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>
