<?php 
include('dbconnect.php');
$halaman = 5; //batasan halaman
$page = isset($_GET['halaman'])? (int)$_GET["halaman"]:1;
$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
$query = mysqli_query("select * from produk LIMIT $mulai, $halaman");
$sql = mysqli_query("select * from produk");
$total = mysqli_num_rows($sql);
$pages = ceil($total/$halaman); 
for ($i=1; $i<=$pages ; $i++){ ?>
 <a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>

 <?php } 

?>