<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Besar</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
</head>

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

    <!--mobile navigasi-->
    <div class="mobile_nav">
        <div class="nav_bar">
            <i class="fa fa-bars nav_btn"></i>
        </div>
        <div class="mobile_nav_items">
        <a href="dashboard.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
        <a href="tambah_data.php"><i class="fas fa-th"></i><span>Tambah Data</span></a>
        <a href="tampil_data.php"><i class="fas fa-table"></i><span>Lihat Data</span></a>
        <a href="about.php"><i class="fas fa-info-circle"></i><span>About</span></a>
        </div>
    </div>
    <!--mobile navigasi-->

    <!--sidebar-->
    <div class="sidebar">
        <div class="profile_info">
            <img src="img/<?php echo $_SESSION['fotouser']; ?>" class="profile_image">
            <h4>Selamat Datang <?php echo $_SESSION['nama']; ?></h4>
        </div>
        <a href="dashboard.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
        <a href="tambah_data.php"><i class="fas fa-cogs"></i><span>Tambah Data</span></a>
        <a href="tampil_data.php"><i class="fas fa-table"></i><span>Lihat Data</span></a>
        <a href="about.php"><i class="fas fa-info-circle"></i><span>About</span></a>
    </div>
    <!--sidebar-->

    <div class="content">
        <div class="card">
            <h1>Aplikasi Admin Warung Versi 1.0.0</h1>
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