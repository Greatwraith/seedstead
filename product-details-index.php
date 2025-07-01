<?php
// error_reporting(0);

include 'db.php'; 

// Cek apakah parameter ID tersedia
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>window.location='product_user.php'</script>";
    exit;
}

$id = intval($_GET['id']);
$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = $id AND product_status = 1");
$p = mysqli_fetch_object($produk);

// Jika produk tidak ditemukan
if (!$p) {
    echo "<p>Product not found.</p>";
    exit;
}

// Ambil kontak admin (opsional jika ingin ditampilkan di footer)
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
    <link rel="stylesheet" type="text/css" href="css/product-details-index_style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body class="wrapper">

<header>
<nav class="navbar">
    <div class="nav-container">
        <div class="logo"><img src="./img/seedstead.png" alt=""></div>
        <ul class="nav-links">
            <li><a href="index.php">HOME</a></li>
            <li><a href="products.php">PRODUCTS</a></li>
            <li><a href="login.php">LOGIN</a></li>
            <li><a href="register.php">REGISTER</a></li>
        </ul>
    </div>
</nav>
</header>

<!-- Detail Produk -->
<main>
    <div class="container detail-produk">
        <div class="detail-wrapper">
            <div class="detail-image">
                <img src="produk/<?php echo $p->product_image ?>" alt="<?php echo $p->product_name ?>">
            </div>
            <div class="detail-info">
                <h2><?php echo $p->product_name ?></h2>
                <!-- <p class="stok">Stock: <strong>
                    <?php echo $p->stok ?>
                </strong> </p> -->
                <p class="deskripsi"><?php echo $p->product_description ?></p>
                 <h3 class="harga">Rp. <?php echo number_format($p->product_price) ?></h3>
                    <a href="login.php" class="btn-login" onclick="alert('You must log in to buy');">BUY</a>
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
