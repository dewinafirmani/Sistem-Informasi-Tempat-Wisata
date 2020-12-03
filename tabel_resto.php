<?php 
error_reporting(0);
include 'koneksi.php';
    session_start();
    if($_SESSION['status']!="login") {
    	header("location: login.php");

    }
?>
<!DOCTYPE html>
<html>
<head>
	<title> Database Restoran </title>
    <link rel="stylesheet" href="desain.css">
</head>
<body class="body">
<div>
  <a class ="link" href="index.php">Daftar Wisata</a>
  <a class ="link" href="tabel_hotel.php">Daftar Penginapan</a>
  <a class ="link" class="active" href="tabel_resto.php">Daftar Rumah Makan Terdekat</a>
  <a style="padding: 0px; float: right;"><form action="" method="POST">
	</form>
	</a>
</div>
<a class = "logout"style="float: right; padding-top: 10px; padding-bottom: 9px;" href="logout.php">Log Out</a>

<br>
<form action="" method="POST">
    <input type="text" name="query" placeholder="Cari Data" class="form_cari">
    <input class="btn_cari" type="submit" name="cari" value="Search">
    </form>

<div>
<table class="hoverTable" border="1" width="100%" align="center">
    <thead>
    <tr><th>Nama Wisata</th>
        <th>Nama Rumah Makan</th>
        <th>Menu Favorit</th>
        </tr>
    </thead>
     

<tbody>
<?php
$query = $_POST['query'];

if($query != ''){
    $result = mysqli_query($conn, "SELECT * FROM resto WHERE menu_favorit like '%$query%' OR nama_rm like '%$query%' ORDER BY nama_rm");
}else{
     $result = mysqli_query($conn, "SELECT * FROM resto");
}
if(mysqli_num_rows($result)){
    while ($data = mysqli_fetch_array($result)){
        ?>
<tr> 
    <td><?php echo $data['nama_wisata'];?></td>
    <td><?php echo $data['nama_rm'] ?></td>
    <td><?php echo $data['menu_favorit'] ?></td>
    
</tr>
<?php
}}else{
    echo '<tr><td colspan="9">Data Tidak Ditemukan</td></tr>';
}
?>
</tbody>


</table>
<br>
</body>
<div align="center">
</div>
</html>
