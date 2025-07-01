<?php
// Membuat koneksi ke database MySQL
$conn = mysqli_connect("localhost", "root", "", "ujian_blok6");

// Debugging koneksi database
if (!$conn) {
    die("fail to connect to database: " . mysqli_connect_error());
} else {
    // echo "Koneksi berhasil";
}

// ... sisa kode
?>
