<!-- punya kevin -->


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
    <title>Seedstead</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="">
</head>

<body>
    <!-- header -->
    <header>
        <div class="container">
            <h1><a href="dashboard.php">BukaWarung</a></h1>
            <ul>
                <?php include 'navbar.php' ?>
            </ul>
        </div>
    </header>
    <table border="1" cellspacing="0" class="table">
        <thead>
            <tr>
                <th width="60px">No</th>
                <th>Kategori</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Gambar</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Pembayaran</th>
                <th>Tanggal</th>
                <th>Bukti</th>
                <th>Status</th>
                <th>Pengiriman</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $admin_id = $_SESSION['id_login'];
            $produk = mysqli_query($conn, "SELECT (c.jml * p.product_price) AS total, c.tgl, c.ck_id, cat.category_name, p.product_name, p.product_price, p.product_image, c.jml, c.bukti, c.validasi, c.status, c.ck_id FROM tb_checkout c JOIN tb_product p ON c.product_id = p.product_id JOIN tb_category cat ON p.category_id = cat.category_id WHERE c.status != 'Selesai' AND c.status != 'Batal' AND c.admin_id = $admin_id");
            while ($row = mysqli_fetch_array($produk)) {
            ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $row['category_name'] ?></td>
                    <td><?php echo $row['product_name'] ?></td>
                    <td>Rp. <?php echo number_format($row['product_price']) ?></td>
                    <td><a href="../produk/<?php echo $row['product_image'] ?>" target="_blank">
                            <img src="../produk/<?php echo $row['product_image'] ?>" width="50px">
                        </a></td>
                    <td><?php echo $row['jml'] ?></td>
                    <td>Rp. <?php echo number_format($row['total']) ?></td>
                    <td>Transfer</td>
                    <td><?php echo tgl_indo($row['tgl']) ?></td>
                    <td>
                        <a href="../bukti_transfer/<?php echo $row['bukti'] ?>" target="_blank">
                            <img src="../bukti_transfer/<?php echo $row['bukti'] ?>" width="50px">
                        </a>
                    </td>
                    <td><?php echo $row['validasi'] ?></td>
                    <?php
                        if($row['status'] == 'Proses'){
                            ?>
                            <td>
                                <mark><?php echo $row['status'] ?></mark><br>
                                <a class="text-white" href="proses.php?ck_id=<?php echo $row['ck_id'] ?>" onclick="return confirm('Yakin proudk telah sampai?')">
                                    <Strong>sampai?</Strong>
                                </a>
                            </td>
                            <?php
                        } else {
                            ?>
                                <td><mark><?php echo $row['status'] ?></mark></td>
                            <?php
                        }
                    ?>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>