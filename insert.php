<?php

include('dbconnect.php');

$nama = $_POST['nama_brg'];
$harga = $_POST['harga_brg'];
$stok = $_POST['stok_brg'];
$satuan = $_POST['satuan_brg'];
$deskripsi = $_POST['deskripsi_brg'];

//query

$rand = rand();
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
 
if(!in_array($ext,$ekstensi) ) {
	header("location:tambah_data.php?alert=gagal_ekstensi");
}else{
	if($ukuran < 1044070){		
		$xx = $rand.'_'.$filename;
		move_uploaded_file($_FILES['foto']['tmp_name'], 'img/'.$rand.'_'.$filename);
		mysqli_query($conn, "INSERT INTO produk VALUES(NULL, '$nama', '$harga', '$stok', '$satuan', '$deskripsi', '$xx')");
		header("location:tampil_data.php?alert=berhasil");
	}else{
		header("location:tambah_data.php?alert=gagal_ukuran");
	}
}

?>