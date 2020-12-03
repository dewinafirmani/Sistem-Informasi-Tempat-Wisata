<?php
// include database connection file
include_once("koneksi.php");

// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['update'])) {
    $id_wisata = $_POST['id_wisata'];
    $nama_wisata = $_POST['nama_wisata'];
    $alamat = $_POST['alamat'];
    $htm = $_POST['htm'];


    // update user data
    $result = mysqli_query($conn, "UPDATE wisata SET id_wisata='$id_wisata',nama_wisata='$nama_wisata',alamat='$alamat',htm='$htm' WHERE id_wisata=$id_wisata");

    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php

$id_wisata = $_GET['id_wisata'];

// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM wisata WHERE id_wisata=$id_wisata");

while ($user_data = mysqli_fetch_array($result)) {
    $id_wisata = $user_data['id_wisata'];
    $nama_wisata = $user_data['nama_wisata'];
    $alamat = $user_data['alamat'];
    $htm = $user_data['htm'];
}
?>
<html>

<head>
    <title>Edit Wisata</title>
    
</head>

<body>
    <h1 align='center' line-height='50%'>Edit Data Wisata</h1>

    <div class="kotak">
        <form action="edit_wisata.php" method="post">
            <input type="hidden" name="id_wisata" value=<?php echo $id_wisata; ?>>
            <label>Nama Wisata</label>
            <input type="text" name="nama_wisata" value=<?php echo $nama_wisata; ?>>
            <label>Alamat</label>
            <input type="text" name="alamat" value=<?php echo $alamat; ?>>
            <label>HTM</label>
            <input type="text" name="htm" value=<?php echo $htm; ?>>
            <button><a href="index.php">Batal</a></button>
            <input type="submit" name="update" class="submit" value="Update">
        </form>
    </div>
</body>

</html>