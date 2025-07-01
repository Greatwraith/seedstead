<?php
// Menghubungkan file database untuk membuat koneksi ke database
include '../db.php';

// Mengecek apakah parameter 'idk' ada 
if (isset($_GET['idk'])) {
    $delete = mysqli_query($conn, "DELETE FROM tb_category WHERE category_id = '".$_GET['idk']."' ");
     // Menjalankan query untuk menghapus data kategori berdasarkan 'category_id' yang diterima dari URL
    echo '<script>window.location="category-data.php"</script>';
    //mengarahkan kembali ke halaman 'kategori_data.php' setelah berhasil dihapus
    // Mengarahkan ulang halaman agar daftar kategori yang telah dihapus tidak lagi muncul di halaman
}
?>