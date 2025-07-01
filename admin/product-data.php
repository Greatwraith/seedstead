<?php
include ('session.php'); // Memasukkan file session.php untuk memeriksa status login user
// include ('db.php'); // File koneksi database (dikomentari karena koneksi sudah ada di session.php)
// Koneksi database ($conn) sudah diinisialisasi di session.php dan bisa digunakan di seluruh halaman
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
   <link rel="stylesheet" type="text/css" href="../css/css-admin/styleadmin.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/all.css">
</head><!-- Menghubungkan halaman ini dengan file CSS eksternal -->
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <div class="sidebar-title"><b>Seedstead</b></div>
            <ul class="isiul">
                <?php include 'sidebar.php' ?> <!-- Menampilkan menu sidebar dari file sidebar.php -->

            </ul>
        </div>
        <!-- Header -->
        <div class="header">
            <div class="header-text">
              PRODUCT
            </div>
        </div>

     <div class="container-section">
      <div class="section kategori-section">
                <a href="product-add.php" style="background: #007bff; color: #fff; border: none; padding: 10px 20px; margin-top: 4px; font-size: 1em; border-radius: 5px; cursor: pointer; transition: background-color 0.3s ease;"
                    onmousedown="this.style.backgroundColor='#004085'; this.style.transform='scale(0.95)';" 
                    onmouseup="this.style.backgroundColor='#007bff'; this.style.transform='scale(1)';">ADD PRODUCT</a>
      
 <div>
    <table class="table1" >
        <thead>
        <tr>
            <th>NO</th>
            <th>category</th>
            <th>Name</th>
            <th>detail</th>
            <th>price</th>
            <th>stock</th>
            <th>image</th>
            <th>status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        
        <?php
        $no = 1; //variabel counter untuk nomor urut tabel
              
        $produk = mysqli_query($conn, "SELECT tb_product.*, tb_category.category_name 
    FROM tb_product 
    LEFT JOIN tb_category ON tb_product.category_id = tb_category.category_id 
    ORDER BY tb_product.product_id DESC");

if (!$produk) {
    die("Query error: " . mysqli_error($conn)); // Tambahkan ini untuk menampilkan pesan error dari query
}

            
        if (mysqli_num_rows($produk) > 0) { // Cek apakah ada data produk yang ditemukan
            while ($row = mysqli_fetch_array($produk)) { // Looping untuk setiap baris data produk
                // $row berisi array asosiatif dengan data produk dan kategori yang bisa diakses

                
        ?>

        <tr>
            <td><?php echo $no++ ?></td> <!-- Nomor urut -->
            <td><?php echo $row['category_name']?></td> <!-- Nama kategori -->
            <td><?php echo $row['product_name']?></td> <!-- Nama produk -->
            <td><?php echo $row['product_description']?></td> <!-- Deskripsi produk -->
            <td> Rp. <?php echo number_format($row['product_price'])?></td> <!-- Harga produk -->
            <td><?php echo $row['stok']?></td> <!-- Stok produk -->
            <td>
                <a href="produk/<?php echo $row['product_image']?>" target="_blank"> <!-- Link gambar -->
                    <img src="../produk/<?php echo $row['product_image'] ?>" width="50px"> <!-- Tampilkan gambar -->
                </a>
            </td>
            <td><?php echo $row['product_status'] ? 'active' : 'non-active';?></td> <!-- Status produk -->
            <td>
                <a href="product-edit.php?id=<?php echo $row['product_id'] ?>">EDIT</a> | <!-- Tombol edit -->
                <a href="product-delete-process.php?idp=<?php echo $row['product_id']?>" 
                   onclick="return confirm('are you sure you want to delete?')">DELETE</a> 
                   <!-- 
                   Tombol hapus dengan konfirmasi JavaScript
                   - Menggunakan JavaScript confirm() untuk memastikan user benar ingin menghapus
                   - Jika user klik OK, akan redirect ke produk_hapus_proses.php dengan ID produk
                   - Jika user klik Cancel, proses hapus akan dibatalkan
                   -->


            </td>

        </tr>
            </div>
        <?php 
            }
        } else { // Jika tidak ada data produk
        ?>

        <tr>
            <td colspan="9">there is no product</td> <!-- Pesan jika tidak ada produk -->

        </tr>
        <?php 
        } 
        ?>
    </table>
    </div>
    </div>
  </div>
<!-- </div> -->
        </div>
    </div>
</body>
</html>
