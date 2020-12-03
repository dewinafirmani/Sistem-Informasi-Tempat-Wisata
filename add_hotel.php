<html>

<head>
    <title>Tambah Hotel</title>
    <link rel="stylesheet" href="desain.css">
</head>

<body>
    <h1 align='center' line-height='50%'>Tambah Data Hotel</h1>

    <div>
        <form action="add_hotel.php" method="post" >
            <label>Nama Hotel</label>
            <input type="text" name="nama_hotel" >
            <label>ID Wisata</label>
            <input type="text" name="id_wisata" >
            <button><a href="tabel_hotel.php">Batal</a></button>
            <input type="submit" name="Submit" class="submit" value="Simpan">
        </form>

    </div>
<br>
    <?php

    // Check If form submitted, insert form data into users table.
    if (isset($_POST['Submit'])) {
        $id_hotel = $_POST['id_hotel'];
        $nama_hotel = $_POST['nama_hotel'];
        $id_wisata = $_POST['id_wisata'];

        // include database connection file
        include_once("koneksi.php");

        // Insert user data into table
        $result = mysqli_query($conn, "INSERT INTO hotel (nama_hotel, id_wisata) VALUES('$nama_hotel', '$id_wisata')");

        // Show message when user added
        header("Location: tabel_hotel.php");
    }
    ?>
</body>

</html>