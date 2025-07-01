<?php
// Menghubungkan ke file database untuk mengakses koneksi MySQL
include '../db.php';

// Proses pertama: Menghapus produk berdasarkan parameter idk
if(isset($_GET['idk'])){
   
    $delete = mysqli_query($conn, "DELETE FROM tb_product WHERE
    product_id = '" .$_GET['idk']."' ");
     // Membuat query SQL DELETE untuk menghapus produk dari tabel tb_product
    // WHERE clause digunakan untuk menentukan produk mana yang akan dihapus
    
    
    echo '<script>window.location="product-data.php"</script>';
    // Menggunakan JavaScript untuk mengarahkan kembali ke halaman produk_data.php
    // setelah proses penghapusan selesai
}

// Proses kedua: Menghapus produk beserta file gambarnya berdasarkan parameter idp
if(isset($_GET['idp'])){
    
    $produk = mysqli_query($conn, "SELECT product_image FROM tb_product WHERE product_id = '".$_GET['idp']."'");
    // Mengambil nama file gambar produk dari database
    
    $p = mysqli_fetch_object($produk);
    // Mengubah hasil query menjadi objek PHP untuk memudahkan akses data
  
    unlink('../produk/'.$p->product_image);
    // Menghapus file gambar produk dari direktori server
    // Fungsi unlink() digunakan untuk menghapus file dari sistem
    
    $delete = mysqli_query($conn, "DELETE FROM tb_product WHERE product_id = '".$_GET['idp']."'");
    // Menghapus data produk dari database setelah file gambar dihapus
   
    echo '<script>window.location="product-data.php"</script>';
     // Mengarahkan kembali ke halaman produk_data.php setelah proses selesai
}

?>
