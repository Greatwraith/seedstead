<?php 
// Meng-include file session.php untuk memeriksa:
// 1. Status login admin (apakah sudah login atau belum)
// (apakah memiliki hak akses ke halaman ini)
//  (apakah session masih valid)
include('session.php'); 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>cart</title>
   <link rel="stylesheet" type="text/css" href="../css/css-admin/styleadmin.css"> 
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/all.css">
</head><!-- Menghubungkan halaman ini dengan file CSS eksternal -->
</head>
<body>

        <div class="wrapper">
        <div class="header"></div> <!-- Bagian header kosong -->
        
        <div class="sidebar">
            <div class="sidebar-title"><b>Seedstead</b></div>
            <ul>
                <?php include 'sidebar.php' ?> <!-- Mengimpor sidebar.php agar menu sidebar bisa ditampilkan -->
            </ul>
        </div>

        <div class="wrapper">
        <div class="header">
            <div class="header-text">
                CART
            </div>
        </div>

        <div class="container-section">
            <div class="section kategori-section">
                <!-- Main Section -->
                <table class="table1" width="100%">

                    <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Category</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                    <?php
                    $no = 1; // Variabel counter untuk nomor urut tabel, dimulai dari 1
                    
                    // Query database untuk mengambil data chart/keranjang belanja:
                    // - Menggabungkan 4 tabel: tb_product, tb_category, tb_chart, tb_admin
                    // - Menghitung total harga dengan (jml*product_price)
                    // - Kondisi JOIN:
                    //   1. Relasi kategori dengan produk (category_id)
                    //   2. Relasi chart dengan produk (product_id)  
                    //   3. Relasi admin dengan chart (admin_id)
                    $produk = mysqli_query($conn, "SELECT 
                        admin_name, 
                        (jml*product_price) AS total, 
                        chart_id, 
                        category_name, 
                        product_name, 
                        product_price, 
                        product_image, 
                        jml
                        FROM tb_product, tb_category, tb_chart, tb_admin
                        WHERE tb_category.category_id=tb_product.category_id AND
                        tb_chart.product_id=tb_product.product_id AND
                        tb_admin.admin_id=tb_chart.admin_id
                    ");
                    // Loop untuk menampilkan setiap produk dalam chart
                    // mysqli_fetch_array() mengambil hasil query sebagai array asosiatif
                    while ($row = mysqli_fetch_array($produk)) {
                    ?>
                    <tr>
                        <td><?php echo $no++; // Nomor urut, increment setelah ditampilkan ?></td>
                        <td><?php echo $row['admin_name']; // Nama admin yang melakukan pemesanan ?></td>
                        <td><?php echo $row['category_name']; // Nama kategori produk (ex: Oli, Ban, Aki) ?></td>
                        <td><?php echo $row['product_name']; // Nama lengkap produk ?></td>
                        <td>Rp. <?php echo number_format($row['product_price']); // Harga produk diformat dengan separator ribuan ?></td>
                        <td>
                            <a href="../produk/<?php echo $row['product_image']; ?>" target="_blank">
                                <img src="../produk/<?php echo $row['product_image']; ?>" width="50px"> 
                                <!-- // Menampilkan thumbnail gambar produk (50px) dengan link ke gambar full size
                                 Gambar disimpan di folder ../produk/
                                target="_blank" membuka gambar di tab baru -->
                            </a>
                        </td>
                        <td><?php echo $row['jml']; // Jumlah (quantity) produk yang dipesan ?></td>
                        <td>Rp. <?php echo number_format($row['total']); // Total harga (harga x jumlah) diformat dengan separator ribuan ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
