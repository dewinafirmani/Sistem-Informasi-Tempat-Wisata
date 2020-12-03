<?php
// include database connection file
include_once("koneksi.php");

// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['update'])) {
    $id_hotel = $_POST['id_hotel'];
    $nama_hotel = $_POST['nama_hotel'];
    $id_wisata = $_POST['id_wisata'];


    // update user data
    $result = mysqli_query($conn, "UPDATE hotel SET id_hotel='$id_hotel',nama_hotel='$nama_hotel', id_wisata='$id_wisata' WHERE id_hotel=$id_hotel");

    // Redirect to homepage to display updated user in list
    header("Location: tabel_hotel.php");
}
?>
<?php

$id_hotel = $_GET['id_hotel'];

// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM hotel WHERE id_hotel=$id_hotel");

while ($user_data = mysqli_fetch_array($result)) {
    $id_hotel = $user_data['id_hotel'];
    $nama_hotel = $user_data['nama_hotel'];
    $id_wisata = $user_data['id_wisata'];
}
?>
<html>

<head>
    <title>Edit Hotel</title>
    
</head>

<body>
    <h1 align='center' line-height='50%'>Edit Data Hotel</h1>

    <div class="kotak">
        <form action="edit_hotel.php" method="post">
            <input type="hidden" name="id_hotel" value=<?php echo $id_hotel; ?>>
            <label>Nama Hotel</label>
            <input type="text" name="nama_hotel" value=<?php echo $nama_hotel; ?>>
            <label>ID Wisata</label>
            <input type="text" name="id_wisata" value=<?php echo $id_wisata; ?>>
            
            <button><a href="tabel_hotel.php">Batal</a></button>
            <input type="submit" name="update" class="submit" value="Update">
        </form>
    </div>
</body>

</html>