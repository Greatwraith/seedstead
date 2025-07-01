<?php

include ('../db.php');
// Menyertakan file koneksi database untuk mengakses database MySQL
// File ini isinya konfigurasi koneksi ke database untuk menjalankan query

session_start();
// Memulai session untuk mengakses data session
// Session digunakan untuk menyimpan informasi login pengguna selama browser tetap terbuka


// Mengecek apakah session id_login sudah ada dan tidak kosong
// Ini validasi keamanan untuk memastikan hanya pengguna yang sudah login yang bisa mengakses halaman ini
if (!isset($_SESSION['id_login']) || (trim($_SESSION['id_login']) == '')) { ?>
       <script>
        alert('Login First!');         
        window.location = "../";
        // Menampilkan alert jika user belum login     
        // lalu akan Redirect ke halaman utama
    </script>
<?php
}


$session_id = $_SESSION['id_login']; 
// Mengambil nilai session id_login yang disimpan saat proses login
// Nilai ini digunakan untuk mengidentifikasi pengguna yang sedang aktif


$user_query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '$session_id'") or die(mysqli_error($conn));
// Query untuk mengambil data user berdasarkan id_user dari session
// Query ini mengambil semua informasi pengguna dari tabel user berdasarkan ID yang tersimpan di session


$user_row = mysqli_fetch_array($user_query);
// Mengambil hasil query dalam bentuk array asosiatif
// Data ini berisi semua informasi pengguna yang akan digunakan di halaman yang membutuhkan



?>
