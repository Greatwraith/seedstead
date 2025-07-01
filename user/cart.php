<?php
include 'session.php';
include '../db.php';

$admin_id = $_SESSION['id_login']; 
// Retrieve the logged-in admin's ID from the session

// Query to fetch cart data for the current admin
$produk = mysqli_query($conn, "SELECT tb_chart.product_id, (jml * product_price) AS total, chart_id, category_name, product_name, product_price, product_image, jml 
                                FROM tb_product, tb_category, tb_chart 
                                WHERE tb_category.category_id = tb_product.category_id 
                                AND tb_chart.product_id = tb_product.product_id 
                                AND admin_id = $admin_id");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cart</title>
    <link rel="stylesheet" type="text/css" href="../css/cart_style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<script>
// Function to toggle all checkboxes in the cart table
function toggleAll(source) {
    const checkboxes = document.querySelectorAll('.checkItem');
    checkboxes.forEach(cb => cb.checked = source.checked);
}
</script>

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


<!-- Main Content Section -->
<div class="section">
    <div class="container">
        <h3>My Shopping Cart</h3>
        <div class="box">
            <form method="POST" action="">
                <table class="table table-checkout">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="checkAll" onclick="toggleAll(this)"></th>
                            <th>No</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $grandTotal = 0;
                        while ($row = mysqli_fetch_array($produk)) {
                            $grandTotal += $row['total'];
                        ?>
                        <tr>
                            <td>
                                <input type="checkbox" class="checkItem" name="check[]" value="<?php echo $row['chart_id']; ?>">
                                <input type="hidden" name="jml[]" value="<?php echo $row['jml']; ?>">
                                <input type="hidden" name="product_id[]" value="<?php echo $row['product_id']; ?>">
                                <input type="hidden" name="admin_id[]" value="<?php echo $admin_id; ?>">
                            </td>
                            <td><?php echo $no++; ?></td>
                            <td style="text-align: left;">
                                <div style="display: flex; align-items: center; gap: 12px;">
                                    <img src="../produk/<?php echo $row['product_image']; ?>" width="40" style="border-radius: 6px;">
                                    <div>
                                        <strong><?php echo $row['product_name']; ?></strong><br>
                                        <small style="color: #8b949e;"><?php echo $row['category_name']; ?></small>
                                    </div>
                                </div>
                            </td>
                            <td><?php echo $row['jml']; ?></td>
                            <td>Rp <?php echo number_format($row['product_price'], 0, ',', '.'); ?></td>
                            <td>Rp <?php echo number_format($row['total'], 0, ',', '.'); ?></td>
                            <td>
                                <a href="delete_process.php?idc=<?php echo $row['chart_id']; ?>" onclick="return confirm('Are you sure you want to remove this item?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <div class="cart-summary">
                    <b>TOTAL</b>: <span class="total-price">Rp <?php echo number_format($grandTotal, 0, ',', '.'); ?></span>
                </div>

                <button type="submit" class="btn" name="save">Checkout Selected Items</button>
            </form>
        </div>

        <?php
        // Process checkout action
        if (isset($_POST['save'])) {
            if (!empty($_POST['check'])) {
                $checkedItems = $_POST['check'];
                $quantities = $_POST['jml'];
                $productIds = $_POST['product_id'];
                $adminIds = $_POST['admin_id'];

                for ($i = 0; $i < count($checkedItems); $i++) {
                    $cartId = $checkedItems[$i];
                    $quantity = $quantities[$i];
                    $productId = $productIds[$i];
                    $adminId = $adminIds[$i];

                    mysqli_query($conn, "INSERT INTO tb_checkout_temp VALUES ($cartId, $productId, $quantity, $adminId)") or die(mysqli_error($conn));
                    mysqli_query($conn, "DELETE FROM tb_chart WHERE chart_id = $cartId") or die(mysqli_error($conn));
                }
                echo '<script>alert("Checkout successful!");</script>';
                echo '<script>window.location = "checkout.php";</script>';
            } else {
                echo '<script>alert("Please select at least one item to proceed with checkout.");</script>';
            }
        }
        ?>
    </div>
</div>


<!-- Footer -->
<footer>
    <p>© 2025 Seedstead | All Rights Reserved</p>
</footer>

</body>
</html>
