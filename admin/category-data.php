<?php include 'session.php'; ?>
<!--memulai sesi pengguna yang sedang login -->
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
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-title"><b>Seedstead</b></div>
            <ul class="isiul">
                <?php include 'sidebar.php'; ?>
                <!-- Menyertakan dan menampilkan isi dari file 'sidebar.php' yang berisi menu navigasi sidebar untuk admin -->
            </ul>
        </div>

        <!-- Header -->
        <div class="header">
            <div class="header-text">
                CATEGORY           
            </div>
        </div>

        <!-- Main Section -->
        <div class="container-section">
            <div class="section kategori-section">              
                    <a href="category-add.php" style="background: #007bff; color: #fff; border: none; padding: 10px 20px; margin-top: 4px; font-size: 1em; border-radius: 5px; cursor: pointer; transition: background-color 0.3s ease;"
                    onmousedown="this.style.backgroundColor='#004085'; this.style.transform='scale(0.95)';" 
                    onmouseup="this.style.backgroundColor='#007bff'; this.style.transform='scale(1)';">ADD CATEGORY</a>
                    <!-- Link untuk menambah data kategori baru, mengarahkan ke halaman kategori_tambah.php -->
                <table class="table1" width="80%">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>category</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php 
                    $no = 1; //nomor urut untuk baris data kategori yang akan ditampilkan dalam tabel.  
                    $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id ASC");
                    // Menjalankan query untuk mengambil semua data kategori dari tabel tb_category

                    // Mengecek apakah ada data kategori yang ditemukan di database
                    if (mysqli_num_rows($kategori) > 0) {  // jika row nya lebih dari 0 maka dia akan lanjut ke while di bawah
                        while ($row = mysqli_fetch_array($kategori)) { // Mengambil data kategori satu per satu
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <!-- Menampilkan nomor urut kategori -->
                        <td><?php echo $row['category_name']; ?></td>
                        <!-- Menampilkan nama kategori dari database -->
                        <td>
                            <a href="category-edit.php?id=<?php echo $row['category_id']; ?>">Edit</a> |
                            <!--link mengedit data kategori, mengarahkan ke kategori_edit.php dengan ID kategori -->
                            <a href="delete-process.php?idk=<?php echo $row['category_id']; ?>" onclick="return confirm('Are you sure you want to delete it?')">Delete</a>
                            <!-- Link menghapus data kategori, mengarahkan ke hapus_proses.php dengan ID kategori dan menampilkan pesan konfirmasi sebelum menghapus -->
                        </td>
                    </tr>
                    <?php } } else { ?>
                    <!-- Jika tidak ada data kategori, maka akan ditampilkan pesan 'Tidak ada data' -->
                    <tr>
                        <td colspan="3">there is no data</td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
