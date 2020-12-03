<?php
// include database connection file
include_once("koneksi.php");

// Get id from URL to delete that user
$id_hotel = $_GET['id_hotel'];

// Delete user row from table based on given id
$result = mysqli_query($conn, "DELETE FROM hotel WHERE id_hotel=$id_hotel");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location: tabel_hotel.php");
