<?php
include 'session.php';
include '../db.php';
include 'fungsi_indotgl.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending Orders</title>
    <link rel="stylesheet" href="../css/home2.css">
    <link rel="stylesheet" type="text/css" href="../css/checkout-data_style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body class="wrapper">

    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo"><img src="../img/seedstead.png" alt=""></div>
            <ul class="nav-links">
                <?php include 'navbar.php'; ?> 
            </ul>
        </div>
    </nav>

    <!-- Checkout Data Section -->
    <div class="section">
        <div class="container">
            <h3 class="section-title">Orders in Progress</h3>
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
                            <th>Status</th>
                            <th>Shipping</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $admin_id = $_SESSION['id_login'];
                        $produk = mysqli_query($conn, "SELECT (jml * product_price) AS total, tgl, ck_id, category_name, product_name, 
                            product_price, product_image, jml, bukti, validasi, status FROM tb_product 
                            JOIN tb_category ON tb_category.category_id = tb_product.category_id 
                            JOIN tb_checkout ON tb_checkout.product_id = tb_product.product_id 
                            WHERE status != 'Selesai' AND status != 'Batal' AND admin_id = $admin_id");

                        while($row = mysqli_fetch_assoc($produk)){
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
                                    <img src="../bukti_transfer/<?php echo $row['bukti'] ?>" width="50px">
                                </a>
                            </td>
                            <td data-label="Status"><?php echo $row['validasi'] ?></td>
                            <?php if ($row['status'] == 'Proses') { ?>
                                <td data-label="Pengiriman">
                                    <mark><?php echo $row['status'] ?></mark><br>
                                    <a class="text-white" href="proses.php?ck_id=<?php echo $row['ck_id'] ?>" onclick="return confirm('Are you Sure Product Has Arrived?')">
                                        <strong>arrived?</strong>
                                    </a>
                                </td>
                            <?php } else { ?>
                                <td data-label="Pengiriman"><mark><?php echo $row['status'] ?></mark></td>
                            <?php } ?>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>© 2025 Seedstead | All Rights Reserved</p>
    </footer>

</body>
</html>
