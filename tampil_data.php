<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <title>Penjualan</title>
    <style>
        .container {
            width : 90%;
            margin : auto;
        }
        table {
            margin : auto;
        }
        .logout{
            position : absolute;
            right: 100px;
            margin-top: 10px;
        }
        .logout a {
            background-color: #f44336;
            color: white;
            padding: 14px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }
        border-collapse: collapse;{
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {background-color: #f2f2f2;}

        .edit a {
            background-color: #e3d622;
            color: black;
            padding: 14px 25px;
            text-decoration: none;
            display: inline-block;
        }
        .delete a {
            background-color: red;
            color: white;
            padding: 14px 25px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-tambah {
            margin-left : 10px;
        }

        .btn-tambah a {
            background-color: green;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            display: inline-block;
        }

        .pagination {
            display: inline-block;
        }

        .pagination a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
        }

        input[type=text]{
		    margin-left : 10px;
            float: left;
		}

    </style>
	<link rel="stylesheet" type="text/css">
</head>
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

    <?php
    // start session
        session_start();
    ?>

    <!--mobile navigation-->
    <div class="mobile_nav">
        <div class="nav_bar">
            <i class="fa fa-bars nav_btn"></i>
        </div>
        <div class="mobile_nav_items">
            <a href="dashboard.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
            <a href="tambah_data.php"><i class="fas fa-cogs"></i><span>Tambah Data</span></a>
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
        <a href="dashboard.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
        <a href="tambah_data.php"><i class="fas fa-th"></i><span>Tambah Data</span></a>
        <a href="tampil_data.php"><i class="fas fa-table"></i><span>Lihat Data</span></a>
        <a href="about.php"><i class="fas fa-info-circle"></i><span>About</span></a>
    </div>
    <!--sidebar-->

    <div class="content">
        <?php
        include('dbconnect.php');
        @session_start(); // Start session nya
        // cek apakah user sudah login atau belum
        if( ! isset($_SESSION['username'])){ 
        @header("location: index.php"); 
        }

        //query
        $query = "SELECT * FROM produk";
        $result = mysqli_query($conn , $query);
    ?>

        <div class="container">
            <center><h3>Tabel Daftar Barang</h3></center>
            <!-- form cari -->
            <form action="tampil_data.php" method="get">
                <input type="text" name="cari" placeholder="Cari">
                <input type="submit" value="Cari">
                </form>
            </form>
            <?php 
            if(isset($_GET['cari'])){
                $cari = $_GET['cari'];
                echo "<b>Hasil pencarian : ".$cari."</b>";
            }
            ?>

            <!-- form tampil -->
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Harga Barang</th>
                        <th>Stok Barang</th>
                        <th>Satuan</th>
                        <th>Deskripsi</th>
                        <th>foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody> 
                    
                    <?php
                        
                        $halaman = 5; /* page halaman*/
                        $page =isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
                        $mulai =($page>1) ? ($page * $halaman) - $halaman : 0;
                        $result =mysqli_query($conn, "SELECT * FROM produk");
                        $total = mysqli_num_rows($result);
                        $pages = ceil($total/$halaman);

                        //memerika apakah ada data yang dikirim menggunakan method get
                        if(isset($_GET['cari'])){
                                $cari = $_GET['cari'];
                                //query untuk mencari data
                                $result = mysqli_query($conn,"select * from produk where nama_barang like
                                '%".$cari."%'");
                        }
                        else{
                            //mengambil data dari table produk
                            $query = "SELECT * FROM produk LIMIT $mulai, $halaman";
                            $result = mysqli_query($conn, $query);
                        }
                        
                        $no = 1;  
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['nama_barang']; ?></td>
                        <td><?php echo $row['harga_barang']; ?></td>
                        <td><?php echo $row['stok_barang']; ?></td>
                        <td><?php echo $row['satuan']; ?></td>
                        <td><?php echo $row['deskripsi']; ?></td>
                        <td><img src="img/<?php echo $row['foto_barang'] ?>" width="50" height="55"></td>
                        <td>
                        <div class="edit">
                            <a href="editform.php?id=<?php echo $row['id_barang'];?>">Edit</a>
                        </div>
                        </td>
                        <td>
                            <div class="delete">
                                <a href="delete.php?id=<?php echo $row['id_barang']?>" onclick="return confirm('udah yakin ?')">Delete</a>
                            </div>
                        </td>
                    </tr>

                    <?php
                        }
                        mysqli_close($conn); 
                        
                    ?>
                </tbody>
            </table>
            <?php
            for ($i=1; $i<=$pages ; $i++){
            ?>  
                <div class="pagination">
                    <a href="?halaman=<?php echo $i; ?>">
                    <u><?php echo $i; ?></u></a>
                </div>
            <?php
            }
            ?>
            <div class="btn-tambah">
                <a href="tambah_data.php">Tambah Data</a>
            </div>

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