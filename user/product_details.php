<?php
error_reporting(0);
include 'session.php';
include '../db.php'; 

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>window.location='product_user.php'</script>";
    exit;
}

$id = intval($_GET['id']);
$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = $id AND product_status = 1");
$p = mysqli_fetch_object($produk);

if (!$p) {
    echo "<p>Product not found.</p>";
    exit;
}

$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
$a = mysqli_fetch_object($kontak); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
    <link rel="stylesheet" href="../css/home2.css">
    <link rel="stylesheet" type="text/css" href="../css/product_details.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body class="wrapper">

<header>
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
    <div class="container detail-produk">
        <div class="detail-wrapper">
            <div class="detail-image">
                <img src="../produk/<?php echo $p->product_image ?>" alt="<?php echo $p->product_name ?>">
            </div>
            <div class="detail-info">
                <h2><?php echo $p->product_name ?></h2>
                <p class="stok">Stock: <strong><?php echo $p->stok ?></strong></p>
                <p class="deskripsi"><?php echo $p->product_description ?></p>
                <h3 class="harga">Rp. <?php echo number_format($p->product_price) ?></h3>

                <form action="cart_proses.php" method="POST" class="form-beli">
                    <input type="hidden" name="product_id" value="<?php echo $p->product_id; ?>">
                    <input type="hidden" name="stok" value="<?php echo $p->stok; ?>">
                    <input type="hidden" name="admin_id" value="<?php echo $_SESSION['id_login']; ?>">

                    <div class="qty-cart-row">
                        <div class="quantity-container">
                            <button type="button" class="qty-btn minus">−</button>
                            <input class="input-jml" id="jml" type="number" name="jml" value="0" min="0" max="<?php echo $p->stok ?>" required>
                            <button type="button" class="qty-btn plus">+</button>
                        </div>
                        <button type="submit" name="submit" class="add-to-cart"><b>ADD TO CART</b></button>
                    </div>
                </form>

                <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const container = document.querySelector('.quantity-container');
                    const input = container.querySelector('.input-jml');
                    const btnMinus = container.querySelector('.minus');
                    const btnPlus = container.querySelector('.plus');
                    const form = document.querySelector('.form-beli');

                    btnMinus.addEventListener('click', function () {
                        let val = parseInt(input.value);
                        if (val > parseInt(input.min)) {
                            input.value = val - 1;
                        }
                    });

                    btnPlus.addEventListener('click', function () {
                        let val = parseInt(input.value);
                        if (val < parseInt(input.max)) {
                            input.value = val + 1;
                        }
                    });

                    form.addEventListener('submit', function (e) {
                        if (parseInt(input.value) === 0) {
                            e.preventDefault();
                            alert('You must select at least one item.');
                        }
                    });
                });
                </script>

            </div>
        </div>
    </div>
</main>

<footer>
    <p>© 2025 Seedstead | All rights reserved.</p>
</footer>

</body>
</html>