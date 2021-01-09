<?php 

$id = $_GET['id'];

//include(dbconnect.php);
include('dbconnect.php');

//query hapus
$query = "DELETE FROM produk WHERE id_barang = '$id' ";

if (mysqli_query($conn , $query)) {
	header("location:tampil_data.php");
}
else{
	echo "ERROR, data gagal dihapus". mysqli_error($conn);
}

mysqli_close($conn);
?>