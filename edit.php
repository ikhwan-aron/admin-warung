<?php
include('dbconnect.php');

$id = $_POST['id_barang'];
$nama = $_POST['nama_barang'];
$harga = $_POST['harga_barang'];
$stok = $_POST['stok_barang'];
$satuan = $_POST['satuan'];
$deskripsi = $_POST['deskripsi'];
$foto_brg = $_FILES['foto_barang'];

$foto_brg = $_FILES['foto_barang']['name'];
  //cek dulu jika merubah gambar produk jalankan coding ini
  if($foto_brg != "") {
    $ekstensi_diperbolehkan = array('png','jpg','jpeg','gif'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $foto_brg); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['foto_barang']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$foto_brg; //menggabungkan angka acak dengan nama file sebenarnya
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                  move_uploaded_file($file_tmp, 'img/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                      
                    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
                   $query  = "UPDATE produk SET nama_barang = '$nama', harga_barang = '$harga', stok_barang = '$stok', satuan = '$satuan', 
				                    deskripsi = '$deskripsi', foto_barang = '$nama_gambar_baru'";
                    $query .= "WHERE id_barang = '$id'";
                    $result = mysqli_query($conn, $query);
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($conn).
                             " - ".mysqli_error($conn));
                    } else {
                      //tampil alert dan akan redirect ke halaman tampil_data.php
                      echo "<script>alert('Data berhasil diubah.');window.location='tampil_data.php';</script>";
                    }
              } else {     
               //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                  echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='editform.php';</script>";
              }
    } else {
      // jalankan query UPDATE berdasarkan ID yang produknya kita edit
      $query  = "UPDATE produk SET nama_barang = '$nama', harga_barang = '$harga', stok_barang = '$stok', satuan = '$satuan', 
				deskripsi = '$deskripsi'";
      $query .= "WHERE id_barang = '$id'";
      $result = mysqli_query($conn, $query);
      // periska query apakah ada error
      if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($conn).
                  " - ".mysqli_error($conn));
      } else {
        //tampil alert dan akan redirect ke halaman index.php
          echo "<script>alert('Data berhasil diubah.');window.location='tampil_data.php';</script>";
      }
    }


?>