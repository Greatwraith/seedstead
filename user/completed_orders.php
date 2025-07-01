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
    <link rel="stylesheet" href="../css/done_style.css">
    <title>Completed Orders </title>
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
                <h3 class="section-title">Completed Orders</h3>
                <div class="box">
                    <table class="table-complete">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Date</th>
                                <th>Receipt</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                $admin_id = $_SESSION['id_login'];
                                $produk = mysqli_query($conn, "SELECT admin_name, admin_telp, admin_address, (jml*product_price) AS total, tgl, ck_id, product_name, product_price, product_image, jml, bukti, validasi, status 
                                                               FROM tb_product, tb_checkout, tb_admin 
                                                               WHERE tb_admin.admin_id = tb_checkout.admin_id 
                                                               AND tb_checkout.product_id = tb_product.product_id 
                                                               AND status = 'Selesai'");

                                while ($row = mysqli_fetch_array($produk)) {
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['product_name']; ?></td>
                                <td>Rp. <?php echo number_format($row['product_price']); ?></td>
                                <td>
                                    <a href="../produk/<?php echo $row['product_image']; ?>" target="_blank">
                                        <img src="../produk/<?php echo $row['product_image']; ?>" width="50px">
                                    </a>
                                </td>
                                <td><?php echo $row['jml']; ?></td>
                                <td>Rp. <?php echo number_format($row['total']); ?></td>
                                <td><?php echo tgl_indo($row['tgl']); ?></td>
                                <td>
                                    <a href="../bukti_transfer/<?php echo $row['bukti']; ?>" target="_blank">
                                        <img src="../bukti_transfer/<?php echo $row['bukti']; ?>" width="50px">
                                    </a>
                                </td>
                                <td><?php echo $row['admin_name']; ?></td>
                                <td><?php echo $row['admin_address']; ?></td>
                                <td><?php echo $row['admin_telp']; ?></td>
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
