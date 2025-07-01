<?php
// Start of PHP script
include '../db.php'; // Include the database connection

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $jml        = $_POST['jml'];         // Quantity of product
    $product_id = $_POST['product_id'];  // Product ID
    $admin_id   = $_POST['admin_id'];    // Admin ID
    $stok       = $_POST['stok'];        // Available stock

    // Check if stock is insufficient
    if ($stok < $jml) {
        // Show alert and redirect if stock is not enough
        echo "<script>alert('Insufficient stock available');</script>";
        echo "<script>location='product_user.php';</script>";
    } 
    // Check if stock is zero
    elseif ($stok == 0) {
        // Show alert and redirect if out of stock
        echo "<script>alert('This product is currently out of stock');</script>";
        echo "<script>location='product_user.php';</script>";
    } 
    else {
        // If stock is sufficient, insert data into the cart
        $insert = mysqli_query($conn, "INSERT INTO tb_chart VALUES (NULL, '$product_id', '$jml', '$admin_id')");

        // Check if the insert was successful
        if ($insert) {
            // Alert success and redirect to the product page
            echo "<script>alert('Product successfully added to cart');</script>";
            echo "<script>location='product_user.php';</script>";
        } else {
            // Alert failure
            echo "<script>alert('Failed to add product to cart');</script>";
        }
    }
}
// End of PHP script
?>
