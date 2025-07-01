<?php
include('session.php');
include('fungsi_indotgl.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>canceled</title>
    <link rel="stylesheet" type="text/css" href="../css/css-admin/styleadmin.css"> <!-- Menghubungkan halaman ini dengan file CSS eksternal -->
     <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/all.css">
</head>
</head>
</head>
<body>
    <div class="wrapper">

        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-title"><b>Seedstead</b></div>
            <ul class="isiul">
                <?php include 'sidebar.php'; ?>
            </ul>
        </div>

        <!-- Header -->
        <div class="header">
            <div class="header-text">CHECKOUT CANCELED</div>
        </div>

        <!-- Konten utama -->
        <div class="container-section">
            <div class="section kategori-section">
                <h5 class="card-title">Check Out Canceled (Invalid Evidence)</h5>
                <table class="table1" width="40%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th class="small-col">Image</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Date</th>
                            <th class="small-col">Receipt</th>
                            <th>Customer</th>
                            <th>Address</th>
                            <th class="small-col">Telephone</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    $admin_id = $_SESSION['id_login'];
                    $query = "SELECT a.admin_name, a.admin_telp, a.admin_address, 
                 (c.jml * b.product_price) AS total, c.tgl, c.ck_id, b.product_name, 
                 b.product_price, b.product_image, c.jml, c.bukti, c.validasi, c.status 
          FROM tb_admin a
          JOIN tb_checkout c ON a.admin_id = c.admin_id
          JOIN tb_product b ON c.product_id = b.product_id
          WHERE c.status = 'Batal'";

                    
                    $produk = mysqli_query($conn, $query);

                    if (!$produk) {
                        echo "<tr><td colspan='11'>Query error: " . htmlspecialchars(mysqli_error($conn)) . "</td></tr>";
                    } elseif (mysqli_num_rows($produk) == 0) {
                        echo "<tr><td colspan='11'>no canceled check out.</td></tr>";
                    } else {
                        while ($row = mysqli_fetch_assoc($produk)) {
                    ?>
                        <tr>
                            <td><?php echo htmlspecialchars($no++); ?></td>
                            <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                            <td>Rp. <?php echo number_format($row['product_price']); ?></td>
                            <td class="small-col">
                                <a href="../produk/<?php echo htmlspecialchars($row['product_image']); ?>" target="_blank">
                                    <img src="../produk/<?php echo htmlspecialchars($row['product_image']); ?>" width="50" alt="Gambar Produk">
                                </a>
                            </td>
                            <td><?php echo htmlspecialchars($row['jml']); ?></td>
                            <td>Rp. <?php echo number_format($row['total']); ?></td>
                            <td><?php echo htmlspecialchars(tgl_indo($row['tgl'])); ?></td>
                            <td class="small-col">
                                <a href="../bukti_transfer/<?php echo htmlspecialchars($row['bukti']); ?>" target="_blank">
                                    <img src="../bukti_transfer/<?php echo htmlspecialchars($row['bukti']); ?>" width="50" alt="Bukti Transfer">
                                </a>
                            </td>
                            <td><?php echo htmlspecialchars($row['admin_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['admin_address']); ?></td>
                            <td class="small-col"><?php echo htmlspecialchars($row['admin_telp']); ?></td>
                        </tr>
                    <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>
</html>
