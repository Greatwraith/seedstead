<?php
  include "session.php";
  include "../db.php";
  include "fungsi_indotgl.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home2.css">
    <link rel="stylesheet" href="../css/cancel_style.css">
    <title>Cancel</title>
</head>
<body class="wrapper">
     <header>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo"><img src="../img/seedstead.png" alt=""></div>
            <ul class="nav-links">
               <?php include 'navbar.php'; ?> 
            </ul>
        </div>
    </nav>
 </header>
    <main>
    <div class="section">
        <div class="container">
            <h3 class="section-title">Canceled Checkout</h3>
            <div class="box">
                <table class="table-cancel">
                    <thead>
                        <tr>
                            <th>No</th>
                                <th>Product</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Payment</th>
                                <th>Date</th>
                                <th>Receipt</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $admin_id = $_SESSION['id_login'];
                        $produk = mysqli_query($conn, "SELECT (jml*product_price) AS total, tgl, ck_id, category_name, product_name, product_price, product_image, jml, bukti, validasi, status FROM tb_product, tb_category, tb_checkout WHERE tb_category.category_id = tb_product.category_id AND tb_checkout.product_id = tb_product.product_id AND status = 'Batal' AND admin_id = $admin_id");
                        while ($row = mysqli_fetch_array($produk)) {
                        ?>
                        <tr>
                            <td data-label="No"><?php echo $no++ ?></td>
                            <td data-label="Produk"><?php echo $row['product_name'] ?></td>
                            <td data-label="Kategori"><?php echo $row['category_name'] ?></td>
                            <td data-label="Gambar">
                                <a href="../produk/<?php echo $row['product_image'] ?>" target="_blank">
                                    <img src="../produk/<?php echo $row['product_image'] ?>" width="50px" alt="">
                                </a>
                            </td>
                            <td data-label="Harga">Rp. <?php echo number_format($row['product_price']) ?></td>
                            <td data-label="Jumlah"><?php echo $row['jml'] ?></td>
                            <td data-label="Total">Rp. <?php echo number_format($row['total']) ?></td>
                            <td data-label="Metode">Transfer</td>
                            <td data-label="Tanggal"><?php echo tgl_indo($row['tgl']) ?></td>
                            <td data-label="Bukti">
                                <a href="../bukti_transfer/<?php echo $row['bukti'] ?>" target="_blank">
                                    <img src="../bukti_transfer/<?php echo $row['bukti'] ?>" width="50px" alt="">
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

    
     <!-- Footer -->
    <footer>
        <p>© 2025 Seedstead | All Rights Reserved</p>
    </footer>
</body>
</html>