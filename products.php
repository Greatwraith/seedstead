<?php
include 'db.php';
error_reporting(0);

// Ambil data kontak admin
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
$a = mysqli_fetch_object($kontak);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products</title>
    <link rel="stylesheet" type="text/css" href="css/home2.css.css">
    <link rel="stylesheet" type="text/css" href="css/products-index_style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body class="wrapper">
     <!-- Navbar -->
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

<!-- Search (di luar main, tetap background gelap) -->
<div class="search">
    <div class="container">
        <form action="products.php" method="get">
    <input type="text" name="search" placeholder="Search Product" 
        value="<?php echo isset($_GET['search']) ? $_GET['search'] : '' ?>">
    <input type="hidden" name="kat" 
        value="<?php echo isset($_GET['kat']) ? $_GET['kat'] : '' ?>">
    <input type="submit" name="cari" value="Search Product">
</form>

    </div>
</div>

<!-- Login Prompt (juga di luar main) -->
<div class="container login-container">
    <p class="login-prompt">
        Please log in to start shopping, 
        <a href="login.php" class="login-link"><strong>CLICK HERE</strong></a>
    </p>
</div>


<main>
    <!-- Categories -->
    <div class="section">
        <div class="container">
            <div class="kategori-wrapper">
                <form method="GET" action="products.php">
    <select name="kat" onchange="this.form.submit()" class="kategori-dropdown">
        <option value=""><b>ALL CATEGORIES</b></option>
        <?php
        $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
        while ($k = mysqli_fetch_array($kategori)) {
            $selected = (isset($_GET['kat']) && $_GET['kat'] == $k['category_id']) ? 'selected' : '';
            echo "<option value='{$k['category_id']}' $selected>{$k['category_name']}</option>";
        }
        ?>
    </select>
    <input type="hidden" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : '' ?>">
</form>

            </div>
        </div>
    </div>

    <!-- Products -->
            <div class="box">
                <?php
               $where = "WHERE product_status = 1";

// Jika kategori dipilih
if (isset($_GET['kat']) && $_GET['kat'] != '') {
    $where .= " AND category_id = '" . $_GET['kat'] . "'";
}

// Jika ada keyword pencarian
if (isset($_GET['search']) && $_GET['search'] != '') {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $where .= " AND product_name LIKE '%$search%'";
}

$products = mysqli_query($conn, "SELECT * FROM tb_product $where ORDER BY product_id DESC LIMIT 8");


                if (mysqli_num_rows($products) > 0) {
                    while ($p = mysqli_fetch_array($products)) {
                ?>
                        <div class="col-4">
                            <a href="product-details-index.php?id=<?php echo $p['product_id'] ?>">
                                <img src="produk/<?php echo $p['product_image'] ?>" alt="<?php echo $p['product_name'] ?>">
                                <p class="nama"><?php echo substr($p['product_name'], 0, 30) ?></p>
                                <p class="harga">Rp. <?php echo number_format($p['product_price']) ?> </p>
                            </a>
                        </div>
                <?php
                    }
                } else {
                    echo "<p>Sorry, we couldn't find any products that you searched.</p>";
                }
                ?>
    </div>
</main>

<!-- Footer -->
<footer>
  <div class="container-footer">
    <div class="contact-info">
      <h4>Address : SMK Telkom Banjarbaru</h4>
      <h4>Email : seedstead@gmail.com</h4>
      <h4>Phone : Number 08XYZ</h4>
    </div> <p>&copy; 2025 Seedstead. All rights reserved.</p> 
  </div>
</footer>
</body>
</html>
