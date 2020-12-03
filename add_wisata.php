<html>

<head>
    <title>Tambah Wisata</title>
    <link rel="stylesheet" href="desain.css">
</head>

<body>
    <h1 align='center' line-height='50%'>Tambah Data Wisata</h1>

    <div>
        <form action="add_wisata.php" method="post" >
            <label>Nama Wisata</label>
            <input type="text" name="nama_wisata" >
            <label>Alamat Wisata</label>
            <input type="text" name="alamat" >
            <label>HTM</label>
            <input  type="text" name="htm" >
            <button><a href="tabel_hotel.php">Batal</a></button>
            <input type="submit" name="Submit" class="submit" value="Simpan">
        </form>

    </div>
<br>
    <?php

    // Check If form submitted, insert form data into users table.
    if (isset($_POST['Submit'])) {
        $id_wisata = $_POST['id_wisata'];
        $nama_wisata = $_POST['nama_wisata'];
        $alamat = $_POST['alamat'];
        $htm = $_POST['htm'];

        // include database connection file
        include_once("koneksi.php");

        // Insert user data into table
        $result = mysqli_query($conn, "INSERT INTO wisata (nama_wisata, alamat, htm) VALUES('$nama_wisata', '$alamat', '$htm')");

        // Show message when user added
        header("Location: tabel_hotel.php");
    }
    ?>
</body>

</html>