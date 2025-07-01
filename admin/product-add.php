<?php
include('session.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product</title>
    <link rel="stylesheet" type="text/css" href="../css/css-admin/styleadmin.css">
     <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/all.css">
</head><!-- Menghubungkan halaman ini dengan file CSS eksternal -->
</head>
</head>
<body>
<div class="wrapper">
        <div class="sidebar">
            <div class="sidebar-title"><b>Seedstead</b></div>
            <ul class="isiul">
                <?php include 'sidebar.php' ?> <!--menampilkan isidari sidebar.php-->
            </ul>
        </div>
        <!-- Header -->
        <div class="header">
            <div class="header-text">
               ADD PRODUCT
            </div>
        </div>
        

<div class="container-section">
    <div class="section">
        <?php
        $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE
        admin_id = '".$_SESSION['id_login']."' ");
        $d = mysqli_fetch_object($query);
        ?>

      <h3>Add product</h3>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="input-boxfordata">
            <!-- <label>category</label> -->
            <select class="form-control" name="kategori" required>
                        <option value="">CHOOSE CATEGORY</option>
                        <?php 
                        $kategori = mysqli_query($conn, "SELECT * FROM
                        tb_category ORDER BY category_id DESC");// Mengambil semua data kategori dari database untuk ditampilkan di dropdown

                        while ($r = mysqli_fetch_array($kategori)) {
                            ?>
                            <option value="<?php echo $r['category_id'] ?>"><?php
                            echo $r['category_name'] ?></option> <?php 
                        } ?>
                        <!-- Looping untuk menampilkan setiap kategori sebagai opsi dropdown-->
                        </select>
        </div>
        <div class="input-boxfordata">
            <!-- <label>Name</label> -->
            <input type="text" name="nama" placeholder="Name..." class="form-control" required>
      </div>
       
      <div class="input-boxfordata">
            <!-- <label>Price</label> -->
            <input type="text" name="harga" placeholder="price..." class="form-control" required>
      </div> 

        <div class="input-boxfordata">
            <!-- <label>Stock</label> -->
            <input type="number" name="stok" placeholder="stock..." class="form-control" required>
        </div>

         <div class="input-boxfordata">
            <!-- <label>Image</label> -->
            <input type="file" name="gambar" placeholder="image..." class="form-control" required>
       </div>

         <div class="input-boxfordata">
            <!-- <label>Description</label> -->
            <textarea name="deskripsi" placeholder="DESCRIPTION..." class="form-control" required></textarea>
        </div>

         <div class="input-boxfordata">
            <!-- <label>status</label> -->
            <select class="form-control" name="status">
                <option value=""><i><b>CHOOSE STATUS</b></i></option>
                <option value="1">ACTIVE</option>
                <option value="0">INACTIVE</option>
            </select>
         </div>
      

       
            <button name="submit" type="submit" id="contact-submit" data-submit="....sending"  style="background: #007bff; color: #fff; border: none; padding: 10px 20px; margin-top: 4px; font-size: 1em; border-radius: 5px; cursor: pointer; transition: background-color 0.3s ease;"
                            onmousedown="this.style.backgroundColor='#004085'; this.style.transform='scale(0.95)';"
                            onmouseup="this.style.backgroundColor='#007bff'; this.style.transform='scale(1)';">ADD</button>
        
     </form>
     <?php
     if (isset($_POST['submit'])) {
    $nama      = $_POST['nama'];
    $harga     = $_POST['harga'];
    $stok      = $_POST['stok'];
    $kategori  = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $status    = $_POST['status'];

    $filename = $_FILES['gambar']['name'];
    $filetmp  = $_FILES['gambar']['tmp_name'];

    $type1 = explode('.', $filename);
    $type2 = strtolower(end($type1)); // Lebih aman: mengambil ekstensi dari akhir array
    $newname = 'produk' . time() . '.' . $type2;

    $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

    if (!in_array($type2, $tipe_diizinkan)) {
        echo '<script>alert("Format file tidak diizinkan!")</script>';
    } else {
        // Pastikan folder ../produk/ ada dan bisa diakses
        if (!is_dir('../produk/')) {
            mkdir('../produk/', 0777, true);
        }

        move_uploaded_file($filetmp, '../produk/' . $newname);

        $insert = mysqli_query($conn, "INSERT INTO tb_product 
        (category_id, product_name, product_price, product_description, product_image, product_status, data_created, stok)
        VALUES 
        ('$kategori', '$nama', '$harga', '$deskripsi', '$newname', '$status', NOW(), '$stok')");

        if ($insert) {
            echo '<script>alert("Product has been added successfully!")</script>';
            echo '<script>window.location="product-data.php"</script>';
        } else {
            echo 'FAIL! ' . mysqli_error($conn);
        }
    }
}


     ?>
    </div>
</div>
</body>
</html>