<?php

include "../config/koneksi.php";

$Id = @$_POST['Id'];
$Nama_barang = @$_POST['Nama_barang'];
$Jumlah_barang = @$_POST['jumlah_barang'];

$data = [];

$query = mysqli_query($kon, "UPDATE 'barang' SET 'Nama_barang'='". $Nama_barang ."',
	'Jumlah_barang'='". $Jumlah_barang ."'
	WHERE 'Id'='". $Id . "'");

if($query){
	$status = true;
	$pesan = "request success";
	$data[] = $query;

}else{
	$status = false;
	$pesan = "request failed";
}

$json = [
	"status" => $status,
	"pesan" => $pesan,
	"data" => $data

];

header("Content-Type: application/json");
echo json_encode($json);

?>
