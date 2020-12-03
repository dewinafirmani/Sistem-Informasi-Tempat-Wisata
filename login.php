<?php 
session_start();
include 'koneksi.php';

if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = md5($_POST["password"]);
        $data = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");

$cek = mysqli_num_rows($data);

        if($cek > 0) {
            $_SESSION['status'] = 'login';
            echo "<script>window.alert('Berhasil Login')
            window.location='index.php'</script>";
        }else {
            echo "<script>window.alert('Gagal Login')
            window.location='login.php'</script>";
        }
    }
    ?>
    <html>
    <head>
    <body>
        <title>Database Wisata Jogja</title> 
        <link rel="stylesheet" href="desain.css">
    </head>
    <body>
    <br>   
        <div class="kotak">
        <div class="div1">
        <h2 style="margin-top: 16px; color: #eeeeee" align="center">Wisata Yogyakarta</h2>
        </div>
        <form action="" method="post">      
            <label>Username</label>
            <input class="form_login" type="text" name="username" required>
            <label>Password</label>
            <input class="form_login" type="password" name="password" required>
            <input class="submitBtn" type="submit" name="login" value="Log In">
        </form>
        </div>
    
    </body>
    </html>
    