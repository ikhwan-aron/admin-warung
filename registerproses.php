<?php

include('dbconnect.php');

$email = $_POST['email'];
$name = $_POST['name'];
$usname = $_POST['username'];
$pass = $_POST['password'];




$rand = rand();
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array($ext,$ekstensi) ) {
	header("location:registerform.php?alert=gagal_ekstensi");
}else{
	if($ukuran < 1044070){		
		$xx = $rand.'_'.$filename;
		move_uploaded_file($_FILES['foto']['tmp_name'], 'img/'.$rand.'_'.$filename);
		mysqli_query($conn, "INSERT INTO user VALUES(NULL,'$email','$name','$usname', '$pass','$xx')");
		header("location:login.php?alert=berhasil-register");
	}else{
		header("location:registerform.php?alert=gagal_ukuran");
	}
}