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
    <title>Edit Product</title>
</head>
<body>
<div class="wrapper">
    <div class="sidebar">
        <div class="sidebar-title"><b>Seedstead</b></div>
        <ul class="isiul">
            <?php include 'sidebar.php' ?>
        </ul>
    </div>

    <div class="header">
        <div class="header-text">
            EDIT PRODUCT
        </div>
    </div>

    <div class="container-section">
        <div class="section">
        <?php 
        $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '" . $_GET['id'] . "'");
        if (mysqli_num_rows($produk) == 0) {
            echo '<script>window.location="product-data.php"</script>';
        }
        $p = mysqli_fetch_object($produk);
        ?>

        <h3>Edit Product</h3>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="input-boxfordata">
                <select class="form-control" name="kategori" required>
                    <option value="">CHOOSE CATEGORY</option>
                    <?php
                    $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                    while ($r = mysqli_fetch_array($kategori)) {
                    ?>
                        <option value="<?php echo $r['category_id'] ?>" <?php echo ($r['category_id'] == $p->category_id) ? 'selected' : ''; ?>>
                            <?php echo $r['category_name'] ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="input-boxfordata">
                <input type="text" name="nama" placeholder="Name..." class="form-control" value="<?php echo $p->product_name ?>" required>
            </div>

            <div class="input-boxfordata">
                <input type="text" name="harga" placeholder="Price..." class="form-control" value="<?php echo $p->product_price ?>" required>
            </div>

            <div class="input-boxfordata">
                <input type="number" name="stok" placeholder="Stock..." class="form-control" value="<?php echo $p->product_stok ?>" required>
            </div>

            <div class="input-boxfordata">
                <!-- <img src="../produk/<?php echo $p->product_image ?>" width="100px" alt=""> -->
                <input type="hidden" name="foto" value="<?php echo $p->product_image ?>">
                <input type="file" name="gambar" class="form-control">
            </div>

            <div class="input-boxfordata">
                <textarea name="deskripsi" placeholder="DESCRIPTION..." class="form-control" required><?php echo $p->product_description ?></textarea>
            </div>

            <div class="input-boxfordata">
                <select class="form-control" name="status">
                    <option value="">CHOOSE STATUS</option>
                    <option value="1" <?php echo ($p->product_status == 1) ? 'selected' : ''; ?>>ACTIVE</option>
                    <option value="0" <?php echo ($p->product_status == 0) ? 'selected' : ''; ?>>INACTIVE</option>
                </select>
            </div>

            <button name="submit" type="submit" id="contact-submit" style="background: #007bff; color: #fff; border: none; padding: 10px 20px; margin-top: 4px; font-size: 1em; border-radius: 5px; cursor: pointer; transition: background-color 0.3s ease;"
                onmousedown="this.style.backgroundColor='#004085'; this.style.transform='scale(0.95)';"
                onmouseup="this.style.backgroundColor='#007bff'; this.style.transform='scale(1)';">EDIT</button>
        </form>

        <?php
        if(isset($_POST['submit'])) {
            $id = $_GET['id'];
            $kategori = $_POST['kategori'];
            $nama = $_POST['nama'];
            $harga = $_POST['harga'];
            $stok = $_POST['stok'];
            $deskripsi = $_POST['deskripsi'];
            $status = $_POST['status'];
            $foto = $_POST['foto'];

            $filename = $_FILES['gambar']['name'];
            $filetmp  = $_FILES['gambar']['tmp_name'];

            if ($filename != '') {
                $type1 = explode('.', $filename);
                $type2 = end($type1);
                $newname = 'produk' . time() . '.' . $type2;
                $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                if (!in_array($type2, $tipe_diizinkan)) {
                    echo "<script>alert('The file format is not allowed.')</script>";
                } else {
                    if (file_exists('../produk/' . $foto)) {
                        unlink('../produk/' . $foto);
                    }
                    move_uploaded_file($filetmp, '../produk/' . $newname);
                    $namagambar = $newname;
                }
            } else {
                $namagambar = $foto;
            }

            $update = mysqli_query($conn, "UPDATE tb_product SET 
                category_id = '$kategori',  
                product_name = '$nama',     
                product_price = '$harga',  
                product_description = '$deskripsi', 
                stok = '$stok',
                product_image = '$namagambar', 
                product_status = '$status'  
                WHERE product_id = '$id'");

            if ($update) {
                echo "<script>alert('Successfully edited');window.location = 'product-data.php';</script>";
            } else {
                echo 'Fail To Edit!: ' . mysqli_error($conn);
            }
        }
        ?>
        </div>
    </div>
</div>
</body>
</html>
