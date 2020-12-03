<?php
// include database connection file
include_once("koneksi.php");

// Get id from URL to delete that user
$id_wisata = $_GET['id_wisata'];

// Delete user row from table based on given id
$result = mysqli_query($conn, "DELETE FROM wisata WHERE id_wisata=$id_wisata");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:index.php");
