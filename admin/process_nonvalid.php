<?php


include '../db.php';
// Menginclude/memasukkan file db.php yang berada di direktori 
// File ini berisi koneksi database ($conn) yang akan digunakan untuk query

if (isset($_GET['ck_id'])) {
    // Mengecek apakah parameter GET 'ck_id' ada/tidak kosong
    // $_GET['ck_id'] adalah parameter yang dikirim melalui URL
    
    $delete = mysqli_query($conn, "UPDATE tb_checkout SET validasi = 'Tidak Valid', status = 'Batal' WHERE ck_id = '" . $_GET['ck_id'] . "'");
    // Melakukan query UPDATE ke tabel tb_checkout dengan kondisi WHERE ck_id = nilai dari $_GET['ck_id']
    // Query ini akan mengubah:
    // - kolom validasi menjadi 'Tidak Valid'
    // - kolom status menjadi 'Batal'
    // Hasil query disimpan dalam variabel $delete
    
    echo '<script>window.location="checkout.php"</script>';
    // Menampilkan script JavaScript untuk redirect/arahkan ulang ke halaman checkout.php
    // Ini akan memuat ulang halaman checkout.php setelah update selesai
}

?>