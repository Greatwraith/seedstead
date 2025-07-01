<?php include('session.php'); ?> <!-- Memasukkan file session.php untuk memastikan bahwa hanya pengguna yang telah login yang bisa mengakses halaman ini -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="icon" type="image/x-icon" href="../img/gradation1.jpg">
    <link rel="stylesheet" type="text/css" href="../css/css-admin/styleadmin.css"> <!-- Menghubungkan halaman ini dengan file CSS eksternal -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/all.css">
</head>
<body>
    <div class="wrapper">
        <div class="header"></div> <!-- Bagian header kosong -->
        
        <div class="sidebar">
            <div class="sidebar-title"><b>Seedstead</b></div>
            <ul>
                <?php include 'sidebar.php' ?> <!-- Mengimpor sidebar.php agar menu sidebar bisa ditampilkan -->
            </ul>
        </div>
        
        <div class="header">
            <div class="header-text">
                PROFILE
            </div>
        </div>
        
        <div class="container-section">
            <div class="section kategori-section">
            <?php
                // Mengambil data admin dari database berdasarkan ID login yang tersimpan dalam session
                $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '" . $_SESSION['id_login'] . "' ");
                $d = mysqli_fetch_object($query); // Mengubah hasil query menjadi objek agar lebih mudah diakses
            ?>
            
            <form id="contact" action="" method="post"> <!-- Form untuk mengubah data profil admin -->
                <h3>Profile</h3>
                
                <!-- Input Nama -->
                <div class="input-boxfordata">
                    <input type="text" name="nama" placeholder="full name..." class="form-control" value="<?php echo $d->admin_name ?>" required>
                </div>
                
                <!-- Input Username -->
                <div class="input-boxfordata">
                    <input type="text" name="user" placeholder="Username..." class="form-control" value="<?php echo $d->username ?>" required>
                </div>
                
                <!-- Input No HP -->
                <div class="input-boxfordata">
                    <input type="text" name="hp" placeholder="Phone number..." class="form-control" value="<?php echo $d->admin_telp ?>" required>  
                </div>
                
                <!-- Input Email -->
                <div class="input-boxfordata">
                    <input type="email" name="email" placeholder="Email..." class="form-control" value="<?php echo $d->admin_email ?>" required>  
                </div>
                
                <!-- Input Alamat -->
                <div class="input-boxfordata">
                    <input type="text" name="alamat" placeholder="address..." class="form-control" value="<?php echo $d->admin_address ?>" required>
                </div>  
                
                <!-- Tombol Submit -->                                            
                <button name="submit" type="submit" id="contact-submit" data-submit="...sending"  
                    style="background: #007bff; color: #fff; border: none; padding: 10px 20px; margin-top: 4px; font-size: 1em; border-radius: 5px; cursor: pointer; transition: background-color 0.3s ease;"
                    onmousedown="this.style.backgroundColor='#004085'; this.style.transform='scale(0.95)';" 
                    onmouseup="this.style.backgroundColor='#007bff'; this.style.transform='scale(1)';" 
                    onclick="alert('are you sure You want to change profile?')">change Profile</button>                   
            </form>
            
            <?php
            // Jika tombol submit ditekan, proses pembaruan data
            if (isset($_POST['submit'])) {
                $nama = ucwords($_POST['nama']);  // Mengubah setiap kata dalam nama menjadi huruf kapital di awal
                $user = $_POST['user'];  // Mengambil username dari input
                $hp = $_POST['hp'];  // Mengambil nomor HP dari input
                $email = $_POST['email'];  // Mengambil email dari input
                $alamat = ucwords($_POST['alamat']); // Mengubah setiap kata dalam alamat menjadi huruf kapital di awal

                // Query untuk memperbarui data admin dalam database berdasarkan admin_id
                $update = mysqli_query($conn, "UPDATE tb_admin SET 
                    admin_name = '" . $nama . "', 
                    username = '" . $user . "',
                    admin_telp = '" . $hp . "', 
                    admin_email = '" . $email . "', 
                    admin_address = '" . $alamat . "'
                    WHERE admin_id = '" . $d->admin_id . "' ");

                if ($update) {
                    echo '<script>alert("new information successfully changed")</script>'; // Menampilkan notifikasi sukses
                    echo '<script>window.location="profile.php"</script>'; // Redirect ke halaman profil
                } else {
                    echo 'FAIL! ' . mysqli_error($conn); // Jika terjadi error, tampilkan pesan error dari MySQL
                }
            }
            ?>
            
            <br>
           
            <form id="contact" action="" method="post"> <!-- Form untuk mengubah password -->
                <h3>Password</h3>
                
                <!-- Input Password Baru -->
                <div class="input-boxfordata">
                    <input type="password" name="pass1" placeholder="Password...." class="form-control" required>
                </div>
                
                <!-- Input Konfirmasi Password Baru -->
                <div class="input-boxfordata">
                    <input type="password" name="pass2" placeholder="confirm your new Password" class="form-control" required>
                </div>                
                
                <!-- Tombol Submit -->
                <button name="ubah_password" type="submit" id="contact-submit" data-submit="...Sending"
                style="background: #007bff; color: #fff; border: none; padding: 10px 20px; margin-top: 4px; font-size: 1em; border-radius: 5px; cursor: pointer; transition: background-color 0.3s ease;"
                    onmousedown="this.style.backgroundColor='#004085'; this.style.transform='scale(0.95)';" 
                    onmouseup="this.style.backgroundColor='#007bff'; this.style.transform='scale(1)';"
                    onclick="return confirm('are you sure You want to change your password?')">change Password</button> <!-- Konfirmasi sebelum mengubah password -->
            </form>            
           
            
            <?php
            // Jika tombol ubah password ditekan, proses perubahan password akan dijalankan
            if (isset($_POST['ubah_password'])) {
                $pass1 = $_POST['pass1'];
                $pass2 = $_POST['pass2'];

                if ($pass1 != $pass2) {
                    echo '<script>alert("New Password does not match")</script>'; // alert jika password tidak cocok
                } else {
                    // Query untuk memperbarui password admin dalam database
                    $up_pass = mysqli_query($conn, "UPDATE tb_admin SET password = '" . $pass1 . "' WHERE admin_id = '" . $d->admin_id . "' ");

                    if ($up_pass) {
                        echo '<script>alert("new password has been changed")</script>';
                        echo '<script>window.location="profile.php"</script>';
                    } else {
                        echo 'fail ' . mysqli_error($conn); // Jika terjadi error, tampilkan pesan error dari MySQL
                    }
                }
            }
            ?>
            </div>
        </div>
    </div>
</body>
</html>
