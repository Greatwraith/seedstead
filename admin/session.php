<?php 
include ('../db.php'); // Menyertakan file koneksi ke database yang diperlukan untuk menjalankan query

session_start();
// Cek apakah variabel sesi 'id_login' ada dan tidak kosong, jika tidak ada,pengguna akan diarahkan ke halaman login
if (!isset($_SESSION['id_login']) || trim($_SESSION['id_login']) == '') {
    echo "<script>alert('Log In First!');</script>";  // Jika variabel sesi 'id_login' tidak ada atau kosong, maka akan ditampilkan pesan alert untuk login
    echo '<script>window.location="../login.php";</script>'; // Redirect/akan diarahkan ke halaman login setelah pesan alert muncul   
    exit(); // menghentikan eksekusi, karena pengguna tidak terautentikasi 
}

// Menyimpan ID login pengguna 
$session_id = $_SESSION['id_login']; // mengambil ID login pengguna yang sudah tersimpan dalam sesi

// Menjalankan query SQL untuk mengambil data admin berdasarkan ID login yang ada di sesi
$user_query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '$session_id'") 
             or die(mysqli_error($conn)); // Jika query gagal, akan ditampilkan pesan error

// Mengambil data hasil query dan menyimpannya dalam variabel $user_row
$user_row = mysqli_fetch_array($user_query); // data baris pertama akan diambil lalu disimpan dalam $user_row
?>












