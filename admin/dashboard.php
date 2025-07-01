<?php
include('session.php'); //menyertakan file session.php untuk memastikan pengguna telah login sebelum mengakses halaman ini
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" type="text/css" href="../css/css-admin/styleadmin.css">
      <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/all.css">
</head><!-- Menghubungkan halaman ini dengan file CSS eksternal -->
</head>
    <title>DASHBOARD</title>
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
        
        <!-- Header -->
        <div class="header">
            <div class="header-text">
                DASHBOARD
            </div>
        </div>
        <div class="container-section">
    <div class="section">
        <h1>Welcome <?php echo $user_row["admin_name"]; ?> (ADMIN)</h1> 
        <!-- Menampilkan teks "Welcome, Admin" diikuti dengan nama admin yang diambil dari database melalui array $user_row -->  
    </div>
</div>  
    </div>
</body>
</html>
