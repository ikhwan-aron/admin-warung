<?php 
$id = $_GET['id']; 

//koneksi database
include('dbconnect.php');

//query
$query = "SELECT * FROM produk WHERE id_barang='$id'";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Penjualan</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
	<style>
		input[type=text], select, textarea {
			width: 90%;
			padding: 12px;
			border: 1px solid #ccc;
			border-radius: 4px;
			resize: vertical;
		}

		.col-25 label {
			padding: 12px 12px 12px 0;
			display: inline-block;
		}

		.container {
			border-radius: 5px;
			background-color: #f2f2f2;
			padding: 20px;
		}

		.col-25 {
			float: left;
			width: 25%;
			margin-top: 6px;
		}

		.col-75 {
			float: left;
			width: 75%;
			margin-top: 6px;
		}

		/* Clear floats after the columns */
		.row:after {
			content: "";
			display: table;
			clear: both;
		}

		.tombol {
			float : right;
			margin-top : 10px;
			margin-right : 50px;
		}

		button {
			background-color: #079100;
			margin-right : 20px;	
			padding: 14px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
		}
		button:hover {
			cursor : pointer;
			background-color : #a39190;
		}
		.tombol a {
			background-color: blue;
			color : black;
            padding: 14px 25px;
            text-decoration: none;
            display: inline-block;
		}
		.tombol  a:hover{
			background-color : #a39190;
		}
	</style>
</head>
<body>

<body>
	<?php	
        session_start();
    ?>
    <input type="checkbox" id="check">
    <!--area header-->
    <header>
        <label for="check">
        <i class="fas fa-bars" id="sidebar_btn"></i>
        </label>
        <div class="left_area">
            <h3>Admin <span>Warung</span></h3>
        </div>
        <div class="right_area">
        <a href="logout.php" class="logout_btn">Logout</a>
        </div>
    </header>
    <!--area header-->

    <!--mobile navigation-->
    <div class="mobile_nav">
        <div class="nav_bar">
        	<i class="fa fa-bars nav_btn"></i>
        </div>
        <div class="mobile_nav_items">
			<a href="#"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
			<a href="tambah_data.php"><i class="fas fa-th"></i><span>Tambah Data</span></a>
			<a href="tampil_data.php"><i class="fas fa-table"></i><span>Lihat Data</span></a>
			<a href="about.php"><i class="fas fa-info-circle"></i><span>About</span></a>
        </div>
    </div>
    <!--mobile navigation-->

    <!--sidebar-->
    <div class="sidebar">
        <div class="profile_info">
        <img src="img/<?php echo $_SESSION['fotouser']; ?>" class="profile_image">
        <h4>Selamat Datang <?php echo $_SESSION['nama']; ?></h4>
        </div>
        <a href="dashboard.html"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
        <a href="tambah_data.php"><i class="fas fa-cogs"></i><span>Tambah Data</span></a>
        <a href="tampil_data.php"><i class="fas fa-table"></i><span>Lihat Data</span></a>
        <a href="about.php"><i class="fas fa-info-circle"></i><span>About</span></a>
    </div>
    <!--sidebar-->

    <div class="content">
		<div class="container">
			<h3>Update Data Barang</h3>
			<form action="edit.php" method="get" enctype="multipart/form-data">
				<?php
				while ($row = mysqli_fetch_assoc($result)) {	
				?>
					<input type="hidden" name="id_barang" value="<?php echo $row['id_barang']; ?>">

					<div class="row">
						<div class="col-25">
							<label>Nama Barang</label>
						</div>
						<div class="col-75">
							<input type="text"name="nama_barang" placeholder="Nama" value="<?php echo $row['nama_barang']; ?>">
						</div>
					</div>

					<div class="row">
						<div class="col-25">
							<label>Harga Barang</label>
						</div>
						<div class="col-75">
							<input type="text"name="harga_barang" placeholder="Harga" value="<?php echo $row['harga_barang']; ?>">
						</div>
					</div>

					<div class="row">
						<div class="col-25">
							<label>Stok Barang</label>
						</div>
						<div class="col-75">
							<input type="text"name="stok_barang" placeholder="Stok" value="<?php echo $row['stok_barang']; ?>">
						</div>
					</div>

					<div class="row">
						<div class="col-25">
							<label>Satuan</label>
						</div>
						<div class="col-75">
							<input type="text"name="satuan" placeholder="Satuan" value="<?php echo $row['satuan']; ?>">
						</div>
					</div>

					<div class="row">
						<div class="col-25">
							<label>Deskripsi</label>
						</div>
						<div class="col-75">
							<input type="text"name="deskripsi" placeholder="Deskripsi" value="<?php echo $row['deskripsi']; ?>">
						</div>
					</div>

					<div class="row">
						<div class="col-25">
							<label>Foto</label>
						</div>
						<div class="col-75">
							<img src="img/<?php echo $row['foto_barang']; ?>" width="50" height="55">
							<input type="file" name="foto_barang" />
						</div>
						<div class="tombol">
							<button type="submit">Update Data</button>		
						</div>
					</div>

				<?php 
				}
				mysqli_close($conn);
				?>				
			</form>
		</div>
    </div>

    <script type="text/javascript">
    $(document).ready(function(){
        $('.nav_btn').click(function(){
        $('.mobile_nav_items').toggleClass('active');
        });
    });
    </script>

</body>
</html> 