<?php
include 'session.php';// Menyertakan file session.php untuk memastikan pengguna telah login sebelum mengakses halaman ini
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>category</title>
    <link rel="stylesheet" type="text/css" href="../css/css-admin/styleadmin.css">
     <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/all.css">
</head><!-- Menghubungkan halaman ini dengan file CSS eksternal -->
</head>
</head>
<body>
    <div class="wrapper">
        <div class="header"></div>
        <div class="sidebar">
            <div class="sidebar-title"><b>Seedstead</b></div>
            <ul>
                <?php             
                include 'sidebar.php';//memuat/ menampilkan menu sidebar(isi dari sidebar.php)
                ?>
            </ul>
        </div>
        
        <!-- Header -->
        <div class="header">
            <div class="header-text">
                EDIT CATEGORY
            </div>
        </div>

        <div class="container-section">
            <div class="container">
            <?php

            $kategori = mysqli_query($conn, "SELECT * FROM tb_category WHERE category_id = '".$_GET['id']."'"); // Mengambil data kategori


          if(mysqli_num_rows($kategori) == 0){ // Cek Baris. jika data kategori tidak ditemukan
            echo "<script>window.location = 'admin/category-data.php';</script>"; // jika tidak ada data maka akan mengarahkan ke halaman kategori_data.php 
            }

            $k = mysqli_fetch_object($kategori); // mengubah kategori menjadi objek
            ?>
                
                <!-- Form untuk mengedit data kategori -->
                <form action="" method="post">
                    <br>
                        <legend style="font-size: 1em; font-weight: bold; color: #333; margin-left: 0;">
                            category's name
                        </legend>
                        <div class="input-boxfordata">
                            <!-- Input untuk nama kategori, nilai default diambil dari data yang ada -->
                            <input type="text" name="nama" value="<?php echo $k->category_name ?>" class="form-control" required>
                        </div>
                        
                        <!-- Tombol untuk menyimpan perubahan -->
                        <button name="submit" type="submit" class="contact-submit" data-submit="...Sending" 
                            style="background: #007bff; color: #fff; border: none; padding: 10px 20px; margin-top: 4px; font-size: 1em; border-radius: 5px; cursor: pointer; transition: background-color 0.3s ease;"
                            onmousedown="this.style.backgroundColor='#004085'; this.style.transform='scale(0.95)';"
                            onmouseup="this.style.backgroundColor='#007bff'; this.style.transform='scale(1)';"
                            onclick="alert('are You sure you want to Edit?')">
                            Edit  
                        </button>
                </form>

                <?php
                // Menangani pengiriman form
               if (isset($_POST["submit"])) { // Memeriksa apakah form telah disubmit dengan tombol 'submit'  
               $nama = $_POST['nama']; // Mengambil data(berupa nama) dari input form    
               $update = mysqli_query($conn,"UPDATE tb_category SET category_name = '".$nama."' WHERE category_id = '".$k->category_id."'"); 
               // Melakukan query untuk memperbarui nama kategori di database. "$conn"Koneksi ke database
    

    
             if ($update) { //Memeriksa apakah query update berhasil
               echo "<script>alert('Edited!');window.location = 'category-data.php';</script>"; // Jika berhasil, menampilkan pesan berhasil dan mengalihkan pengguna ke halaman kategori_data.php
               } else {   
                  echo 'fail to edit' . mysqli_error($conn);// Jika gagal, menampilkan pesan error yang dihasilkan oleh MySQL
               }
    }
         ?>
            </div>
        </div>
    </div>
</body>
</html>
