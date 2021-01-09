<?php
    session_start();
    include('dbconnect.php'); 

    $username = mysqli_real_escape_string($conn, $_POST['username']); // Ambil value username yang dikirim dari form
    $password = mysqli_real_escape_string($conn, md5($_POST['password'])); // Ambil value password yang dikirim dari form

    // Buat query untuk mengecek apakah ada data user dengan username dan password yang dikirim dari form
    $sql = mysqli_query($conn, "SELECT * FROM user WHERE username='".$username."' AND password='".$password."'");
    $data = mysqli_fetch_array($sql); 

    // Cek apakah variabel $data ada datanya atau tidak
    if( ! empty($data)){ 
        $_SESSION['username'] = $data['username']; 
        $_SESSION['nama'] = $data['nama']; 
        $_SESSION['fotouser'] = $data['fotouser']; 
        header("location: dashboard.php"); 
    }else{ // Jika $data nya kosong
        echo"<script>
		alert('Periksa username atau password anda');
		document.location='index.php';
		</script>";
    }
?>