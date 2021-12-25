<?php
include'koneksi.php';

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");		// CORS
header("Access-Control-Allow-Headers: Access-Control-Allow-Origin, Accept");

$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
 
if ($conn->connect_error) {
 
	die("Connection failed: " . $conn->connect_error);
}else
{
// Getting the received ID in JSON Format into $json variable.
 $json = file_get_contents('php://input');
 
 // Decoding the received JSON.
 $obj = json_decode($json,true);
 
 // Populate ID from JSON $obj array and store into $ID variable.
 $ID = $obj['id_kategori'];
	$sql = "SELECT * FROM produk ORDER BY id_produk DESC";
	 
	$result = $conn->query($sql);
 
if ($result->num_rows >0) {
 
	 while($row[] = $result->fetch_assoc()) {
	 
	 
	 $item = $row;
	 
	
	 $json = json_encode(array('result'=>$item, JSON_NUMERIC_CHECK));
	 
 }
 
} else {
	echo "No Data Found.";
}
echo $json ;
$conn->close();
}
?>