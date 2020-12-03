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
	<title> Database Wisata Jogja </title>
    <link rel="stylesheet" href="desain.css">

</head>
<body class = "body">
<div>
  <a class ="link" class="active" href="index.php">Daftar Wisata</a>
  <a class ="link" href="tabel_hotel.php">Daftar Penginapan Terdekat</a>
  <a class ="link" href="tabel_resto.php">Daftar Rumah Makan Terdekat</a>
  <a style="padding: 0px; float: right;"><form action="" method="POST">
	</form>
	</a>
</div>
<a class = "logout" style="float: right; padding-top: 10px; padding-bottom: 15px;" href="logout.php">Log Out</a>

<br>
<form action="" method="POST">
    <input type="text" name="query" placeholder="Cari Data" class="form_cari">
    <input class="btn_cari" type="submit" name="cari" value="Search">
    </form>

<div>
<table class="hoverTable" border="1" width="100%" align="center">
    <thead>
    <tr><th>ID Wisata</th>
        <th>Nama Wisata</th>
        <th>Alamat</th>
        <th>HTM</th>
        <th>Aksi</th>
        </tr>
    </thead>
     

<tbody>
<?php
$query = $_POST['query'];

if($query != ''){
    $result = mysqli_query($conn, "SELECT * FROM wisata WHERE id_wisata like '%$query%' OR nama_wisata like '%$query%' ORDER BY id_wisata");
}else{
     $result = mysqli_query($conn, "SELECT * FROM wisata");
}
if(mysqli_num_rows($result)){
    while ($data = mysqli_fetch_array($result)){
        ?>
<tr class="hoverTable"> 
    <td><?php echo $data['id_wisata'];?></td>
    <td><?php echo $data['nama_wisata'] ?></td>
    <td><?php echo $data['alamat'] ?></td>
    <td><?php echo $data['htm'] ?></td>
    <td><button><a class=" Edit " href= "edit_wisata.php?id_wisata=<?php echo $data['id_wisata']; ?>"> Edit </a></button>
    <button1><a class=" Hapus " href= "hapus_wisata.php?id_wisata=<?php echo $data['id_wisata']; ?>"> Hapus </a></button1>
    </td>
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
<button2><a href="add_wisata.php">Tambah Wisata</a></button2>
</div>
</html>
