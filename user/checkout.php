<?php
    session_start();
    include '../db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="../css/home2.css">
    <link rel="stylesheet" href="../css/checkout_style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
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

    <!-- Main Content -->
   <main>
        <div class="section">
            <div class="container">
                <h3 class="section-title">Selected Items</h3>
                <div class="box">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Category</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                $admin_id = $_SESSION['id_login'];
                                $produk = mysqli_query($conn, "SELECT tb_checkout_temp.product_id, (jml*product_price) AS total, chart_id, category_name, product_name, product_price, product_image, jml 
                                                                FROM tb_product, tb_category, tb_checkout_temp 
                                                                WHERE tb_category.category_id = tb_product.category_id 
                                                                AND tb_checkout_temp.product_id = tb_product.product_id 
                                                                AND admin_id = '$admin_id'");
                                while($row = mysqli_fetch_array($produk)){
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['category_name'] ?></td>
                                <td><?= $row['product_name'] ?></td>
                                <td>Rp. <?= number_format($row['product_price']) ?></td>
                                <td><img src="../produk/<?= $row['product_image'] ?>" width="40px" /></td>
                                <td align="center"><?= $row['jml'] ?></td>
                                <td align="center">Rp. <?= number_format($row['total']) ?></td>
                            </tr>
                            <?php } ?>

                            <?php
                                $total_query = mysqli_query($conn, "SELECT SUM(jml) AS jumlah, SUM(jml*product_price) AS total 
                                                                    FROM tb_product, tb_category, tb_checkout_temp 
                                                                    WHERE tb_category.category_id = tb_product.category_id 
                                                                    AND tb_checkout_temp.product_id = tb_product.product_id 
                                                                    AND admin_id = '$admin_id'");
                                $total_row = mysqli_fetch_array($total_query);
                            ?>
                        </tbody>
                    </table>

                    <!-- Cart Summary -->
                    <div class="cart-summary">
                        <p><strong>Total Items:</strong> <?= $total_row['jumlah'] ?></p>
                        <p class="total-price"><strong>Total Price:</strong> Rp. <?= number_format($total_row['total']) ?></p>
                    </div>
                </div>

                <!-- Payment Section -->
                <div class="payment-section">
                    <h3>Payment</h3>
                    <form action="" method="POST" enctype="multipart/form-data" class="form-box">
                        <p><b>Select a Bank Account</b>:</p>
                        <ul class="bank-list">
                            <li>BRI - 0236816293941</li>
                            <li>BNI - 2036182921</li>
                            <li>MANDIRI - 8973277619293</li>
                            <li>BCA - 68289123</li>
                            <li>BSI - 23916240</li>
                        </ul>

                        <label>Upload Transfer Receipt:</label><br>
                        <input type="file" name="gambar" required class="form-control"><br>
                        <input type="submit" name="proses" value="Submit Payment" class="btn">
                    </form>
        

                    <?php
                        if(isset($_POST['proses'])){
                            $tgl = date('Y-m-d');
                            $filename = $_FILES['gambar']['name'];
                            $tmp_name = $_FILES['gambar']['tmp_name'];

                            $type1 = explode('.', $filename);
                            $type2 = strtolower(end($type1));
                            $newname = 'tf'.time().'.'.$type2;
                            $tipe_diizinkan = array('jpg','jpeg','png','gif', 'JPG', 'JPEG', 'PNG', 'GIF');

                            if(!in_array($type2, $tipe_diizinkan)){
                                echo '<script>alert("File format is not allowed.")</script>';
                            } else {
                                if(move_uploaded_file($tmp_name, "../bukti_transfer/".$newname)){
                                    $query = mysqli_query($conn, "SELECT * FROM tb_checkout_temp NATURAL JOIN tb_product");

                                    while($r = mysqli_fetch_array($query)){
                                        $jml = $r['jml'];
                                        $product_price = $r['product_price'];
                                        $total = $jml * $product_price;

                                        $insert = mysqli_query($conn, "INSERT INTO tb_checkout VALUES (null, '$r[product_id]', '$jml', '$r[admin_id]', '$total', '$newname', 'Waiting', 'Pending', '$tgl')");
                                        mysqli_query($conn, "UPDATE tb_product SET stok=stok-'$jml' WHERE product_id='$r[product_id]'");
                                    }

                                    mysqli_query($conn, "TRUNCATE tb_checkout_temp");

                                    if($insert){
                                        echo '<script>alert("Payment successfully submitted.")</script>';
                                        echo '<script>window.location="pending_orders.php"</script>';
                                    } else {
                                        echo 'Failed: ' .mysqli_error($conn);
                                    }
                                }
                            }
                        }
                    ?>
                </div>

            </div>
        </div>
   </main>

    <!-- Footer -->
    <footer>
        <p>© 2025 Seedstead | All rights reserved.</p>
    </footer>

</body>
</html>
