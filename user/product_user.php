<?php
error_reporting(0);
include 'session.php';
include '../db.php'; 
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
$a = mysqli_fetch_object($kontak); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products</title>
    <link rel="stylesheet" href="../css/home2.css">
    <link rel="stylesheet" type="text/css" href="../css/product-user_style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
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
    
 <!-- Search Bar -->
        <div class="search">
            <div class="container">
                <form action="product_user.php">
                    <input type="text" name="search" placeholder="Search for a product" value="<?php echo $_GET['search'] ?>">
                    <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
                    <input type="submit" name="cari" value="Search">
                </form>
            </div>
        </div>
    <!-- Main Content -->
    <main>
        

        <!-- Category Filter -->
        <div class="section">
            <div class="container">
                <div class="kategori-wrapper">
                    <form method="GET" action="product_user.php">
                        <select name="kat" onchange="this.form.submit()" class="kategori-dropdown">
                            <option value=""><b>All Categories</b></option>
                            <?php
                            $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                            while ($k = mysqli_fetch_array($kategori)) {
                                $selected = ($_GET['kat'] == $k['category_id']) ? 'selected' : '';
                                echo "<option value='{$k['category_id']}' $selected>{$k['category_name']}</option>";
                            }
                            ?>
                        </select>
                        <input type="hidden" name="search" value="<?php echo $_GET['search'] ?>">
                    </form>
                </div>
            </div>
        </div>

        <!-- Product List -->
        <?php
        $where = "";
        if (!empty($_GET['search'])) {
            $search = $_GET['search'];
            $where .= " AND product_name LIKE '%$search%'";
        }
        if (!empty($_GET['kat'])) {
            $kat = $_GET['kat'];
            $where .= " AND category_id = $kat";
        }

        $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 $where ORDER BY product_id DESC");
        ?>

        <div class="box">
            <?php
            if (mysqli_num_rows($produk) > 0) {
                while ($p = mysqli_fetch_array($produk)) {
            ?>
            <div class="col-4">
                <a href="product_details.php?id=<?php echo $p['product_id'] ?>">
                    <img src="../produk/<?php echo $p['product_image'] ?>" alt="<?php echo $p['product_name'] ?>">
                    <p class="nama"><?php echo substr($p['product_name'], 0, 30) ?></p>
                    <p class="harga">Rp. <?php echo number_format($p['product_price']) ?></p>
                </a>
            </div>
            <?php
                }
            } else {
                echo "<p class='no-product-message'>Sorry, We Couldn't find The Product</p>";
            }
            ?>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <p>© 2025 Seedstead | All rights reserved.</p>
    </footer>

</body>
</html>
