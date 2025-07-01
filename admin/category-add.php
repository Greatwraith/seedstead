<?php include ('session.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>category</title>
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
                ADD CATEGORY
            </div>
        </div>

        <div class="container-section">
            <div class="section"> 
                <?php                    
                    $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id_login']."' "); // Melakukan query untuk mengambil data admin berdasarkan id_login yang disimpan dalam session                  
                    $d = mysqli_fetch_object($query); // Mengambil hasil query 
                ?>
                <form action="" method="post">
                    <br>
                        <legend style="font-size: 1em; font-weight: bold; color: #333;">
                            Category's Name
                        </legend>
                        <div class="input-boxfordata">
                            <!-- Input untuk nama kategori, wajib diisi -->
                            <input type="text" name="nama" placeholder="category.... " class="form-control" required>
                        </div>    
                        <button name="submit" type="submit" id="contact-submit" data-submit="...Sending"
                        style="background: #007bff; color: #fff; border: none; padding: 10px 20px; margin-top: 4px; font-size: 1em; border-radius: 5px; cursor: pointer; transition: background-color 0.3s ease;"
                        onmousedown="this.style.backgroundColor='#004085'; this.style.transform='scale(0.95)';"
                        onmouseup="this.style.backgroundColor='#007bff'; this.style.transform='scale(1)';"
                        onclick="alert('are you sure you want to add?')">ADD              
                </button>            
                </form>
				<?php             
                 if(isset($_POST['submit'])){ // Memeriksa apakah tombol submit pada form telah ditekan 
                 $nama = $_POST['nama']; // Mengambil data (berupa nama kategori) dari input form dengan nama 'nama'     
                 $insert = mysqli_query($conn, "INSERT INTO tb_category (category_name) VALUES('$nama')"); // Menggunakan perintah INSERT INTO untuk menambahkan kategori baru. Melakukan query untuk memasukkan data kategori ke dalam tabel tb_category.                    
                if($insert){   // Mengecek apakah query insert berhasil    
                         echo '<script>alert("Added!")</script>';// Jika berhasil, akan menampilkan pesan menggunakan alert JavaScript
                          echo '<script>window.location="category-data.php"</script>'; // Redirect pengguna ke halaman kategori_data.php setelah menampilkan pesan
               } else {      
                  echo 'fail to add '.mysqli_error($conn); // Jika gagal, maka akan menampilkan pesan error yang
            }                                
          }
?>
            </div>
        </div>
    </div>
</body>
</html>