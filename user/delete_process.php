<?php
// Menginclude file db.php yang berada di direktori parent untuk koneksi database
include '../db.php';

// Mengambil parameter idc dari URL menggunakan method GET
$id = $_GET['idc'];

// Menjalankan query DELETE untuk menghapus item dari tabel tb_chart berdasarkan chart_id
// PERINGATAN: Kode ini rentan SQL Injection, sebaiknya gunakan prepared statement
mysqli_query($conn, "DELETE FROM tb_chart WHERE chart_id='$id'");

// Menampilkan alert JavaScript dan redirect ke halaman chart.php
echo "<script>
    alert('Product has deleted');
    location.href='cart.php';
</script>";
?>
