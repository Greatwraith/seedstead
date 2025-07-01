<?php

session_start(); // Memulai sesi
// digunakan untuk memulai atau melanjutkan sesi yang sudah ada. 
// Ini memastikan bahwa kita dapat mengakses data sesi yang telah disimpan sebelumnya.


session_destroy(); // Menghancurkan semua data
// Fungsi session_destroy() digunakan untuk menghapus semua data yang tersimpan di server.
// Setelah fungsi ini dijalankan, semua informasi sesi seperti variabel sesi akan dihapus, 
// lalu pengguna akan dianggap "logout" dari sistem.


echo '<script>window.location="login.php"</script>'; //pengguna diarahkan kembali ke halaman login
// Baris ini memakai JavaScript untuk mengarahkan (redirect) pengguna ke halaman login.php.
// Fungsi ini memastikan pengguna keluar dari sesi yang aktif dan diarahkan ke halaman login

?>


