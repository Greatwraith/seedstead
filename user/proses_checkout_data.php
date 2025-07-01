<?php
// Menginclude file db.php untuk koneksi ke database
include '../db.php';

// Memeriksa apakah parameter ck_id ada di URL (GET request)
if(isset($_GET['ck_id'])){
    // Query untuk mengupdate status checkout menjadi 'selesai' berdasarkan ck_id
    $delete = mysqli_query($conn, "UPDATE FROM tb_checkout SET status='selesai' WHERE ck_id = '".$_GET['ck_id']."'");
    
    // Redirect ke halaman selesai.php setelah update berhasil
    echo '<script>window.location="selesai.php"</script>';
}
?>