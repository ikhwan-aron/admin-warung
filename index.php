<!DOCTYPE html>
<html>
<head>
<style>
    * {
        box-sizing: border-box;
    }

    input[type=text], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
    }

    input[type=password], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
    }

    label {
        padding: 12px 12px 12px 0;
        display: inline-block;
    }

    input[type=submit] {
        background-color: #4CAF50;
        color: white;
        margin-top: 10px;
        padding: 12px 25px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    .container {
        margin : 150px auto;
        width : 40%;
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }

    .col-3 {
        float: left;
        width: 25%;
        margin-top: 6px;
    }

    .col-5 {
        float: left;
        width: 75%;
        margin-top: 6px;
    }

    .row {
        margin-left : 10px;
    }

    .row a {
        margin-left: 300px;
        margin-top: 10px;
        background-color: green;
        border-radius: 4px;
        color: white;
        padding: 10px 10px;
        text-decoration: none;
        display: inline-block;
    }

    .row a:hover {
        background-color: #4CAF50;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Responsive layout  */
    @media screen and (max-width: 600px) {
    .col-3, .col-5, input[type=submit] {
        width: 100%;
        margin-top: 0;
    }
    }
</style>
</head>
<body>
<?php
    session_start(); // Start session
    // Kita cek apakah user sudah login atau belum
    if(isset($_SESSION['username'])){ 
        header("location: tampil_data.php");
    }
?>

    <div class="container">
    <center><h1>Silahkan Login</h1></center>
        <form action="login.php" method="post">
            <div class="row">
                <div class="col-3">
                <label for="name">User Name</label>
                </div>
                <div class="col-5">
                <input type="text"name="username" placeholder="User Name">
                </div>
            </div>
            
            <div class="row">
                <div class="col-3">
                <label for="pass">Password</label>
                </div>
                <div class="col-5">
                <input type="password"name="password" placeholder="Password">
                </div>
            </div>

            <div class="row">
                <input type="submit" value="Login">
                <a href="registerform.php" >Buat Akun</a>
            </div>
        </form>
    </div>

</body>
</html>
