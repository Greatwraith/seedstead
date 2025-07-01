<?php
// Menginclude file db.php untuk koneksi ke database
// File ini berisi konfigurasi koneksi ke database MySQL
include '../db.php'; 

// Mengambil nilai parameter 'id' dari URL menggunakan method GET
// Parameter ini digunakan untuk mengidentifikasi transaksi yang akan diupdate
$id = $_GET['ck_id'];

// Menjalankan query SQL untuk mengupdate status transaksi menjadi 'Selesai'
// Query ini akan mencari record dengan id yang sesuai dan mengubah statusnya
// Catatan: Variabel koneksi seharusnya $conn (sesuai standar) bukan $koneksi
mysqli_query($conn, "UPDATE tb_checkout SET status='Selesai' WHERE ck_id='$id'"); // Line 5

// Melakukan redirect ke halaman checkout_data.php setelah update berhasil
// header() digunakan untuk mengirim header HTTP ke browser
// Location: mengarahkan browser ke halaman yang ditentukan
header("location:checkout.php"); // Line 6
?>