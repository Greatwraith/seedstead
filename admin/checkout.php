<?php include('session.php'); // Menyertakan file session.php untuk memulai sesi pengguna. Ini biasanya digunakan untuk mengelola login dan autentikasi pengguna. ?>

<?php include 'fungsi_indotgl.php'; // Menyertakan file fungsi_indotgl.php yang berisi fungsi untuk mengubah format tanggal ke format Indonesia. ?>

<!DOCTYPE html> <!-- Mendefinisikan tipe dokumen sebagai HTML5. -->
<html>
<head>
    <meta charset="utf-8"> <!-- Menetapkan karakter encoding untuk dokumen HTML. -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <!-- Mengatur viewport untuk responsif di perangkat mobile. -->
    <title>checkout</title> <!-- Menetapkan judul halaman yang akan ditampilkan di tab browser. -->
     <link rel="stylesheet" type="text/css" href="../css/css-admin/styleadmincheckout.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/all.css">
</head>
</head>
<body>

<div class="wrapper"> <!-- Membungkus seluruh konten dalam div dengan kelas 'wrapper'. -->
    <div class="header"> <!-- Membuat div untuk header. -->
        <div class="header-text"> <!-- Membuat div untuk teks header. -->
            CHECKOUT <!-- Teks yang ditampilkan di header. -->
        </div>
    </div>

    <div class="sidebar"> <!-- Membuat div untuk sidebar. -->
        <div class="sidebar-title"><b>Seedstead</b></div> <!-- Judul sidebar. -->
        <ul> <!-- Membuat daftar untuk menu sidebar. -->
            <?php include 'sidebar.php'; // Menyertakan file sidebar.php yang berisi menu navigasi untuk sidebar. ?>
        </ul>
    </div>

    <div class="container-section"> <!-- Membuat div untuk konten utama. -->
        <div class="section"> <!-- Membuat div untuk bagian konten. -->
            <h4 class="card-title">Waiting for Validation and Delivery</h4> <!-- Judul untuk tabel data checkout. -->
    
            <table class="table1"> <!-- Membuat tabel dengan kelas 'table1'. -->
                <tr> <!-- Membuat baris untuk header tabel. -->
                    <th>No</th> <!-- Kolom untuk nomor urut. -->
                    <th>Product</th> <!-- Kolom untuk nama produk. -->
                    <th>Price</th> <!-- Kolom untuk harga. -->
                    <th>Image</th> <!-- Kolom untuk gambar produk. -->
                    <th>Quantity</th> <!-- Kolom untuk jumlah produk. -->
                    <th>Total</th> <!-- Kolom untuk total harga. -->
                    <th>Date</th> <!-- Kolom untuk tanggal. -->
                    <th>Receipt</th> <!-- Kolom untuk bukti pembayaran. -->
                    <th>Validate</th> <!-- Kolom untuk validasi. -->
                    <th>Shipping</th> <!-- Kolom untuk status pengiriman. -->
                    <th>Buyer</th> <!-- Kolom untuk nama pelanggan. -->
                    <th>Address</th> <!-- Kolom untuk alamat pelanggan. -->
                    <th>Telp</th> <!-- Kolom untuk nomor telepon pelanggan. -->
                </tr>
                <?php
                        $no = 1;
                        $admin_id = $_SESSION['id_login'];
                        $produk = mysqli_query($conn, "SELECT admin_name, admin_telp, admin_address,
                        (jml*product_price) AS total,tgl, ck_id, product_name, product_price, product_image, jml, bukti, validasi,
                        status FROM tb_product, tb_checkout, tb_admin WHERE tb_admin.admin_id=tb_checkout.admin_id AND
                        tb_checkout.product_id=tb_product.product_id AND
                        status != 'Selesai' AND status != 'Batal'");
                        while ($row = mysqli_fetch_array($produk)) {
                        ?>

                <tr> <!-- Membuat baris baru untuk setiap produk. -->
                    <td><?php echo $no++ ?></td> <!-- Menampilkan nomor urut dan menambahkannya. -->
                   <td class="wrap-text"><?php echo $row['product_name'] ?></td>

                    <td>Rp. <?php echo number_format($row['product_price']) ?></td> <!-- Menampilkan harga produk dalam format mata uang. -->
                    <td><a href="../produk/<?php echo $row['product_image'] ?>" target="_blank"><img src="../produk/<?php echo $row['product_image'] ?>" width="50px" ></a></td> <!-- Menampilkan gambar produk dengan tautan ke gambar yang lebih besar. -->
                    <td><?php echo $row['jml'] ?></td> <!-- Menampilkan jumlah produk. -->
                    <td>Rp. <?php echo number_format($row['total']) ?></td> <!-- Menampilkan total harga produk. -->
                    <td><?php echo tgl_indo($row['tgl']) ?></td> <!-- Menampilkan tanggal dalam format Indonesia. -->
                    <td><a href="../bukti_transfer/<?php echo $row['bukti'] ?>" target="_blank"><img src="../bukti_transfer/<?php echo $row['bukti'] ?>" width="50px" ></a></td> <!-- Menampilkan bukti transfer dengan tautan ke gambar bukti. -->
                    <?php if (strtolower($row['validasi']) == 'waiting' || strtolower($row['validasi']) == 'menunggu') { // Memeriksa apakah status validasi adalah 'Menunggu'. ?>
                    <td>
                        <i><?php echo $row['validasi'] ?></i><br> <!-- Menampilkan status validasi. -->
                        <a class="text-black" href="process_valid.php?ck_id=<?php echo $row['ck_id'] ?>" onclick="return confirm('Are you sure The Receipt is Valid?')"> <!-- Tautan untuk memvalidasi bukti. -->
                            <strong>Valid?</strong>
                        </a><br>
                        <a class="text-black" href="process_nonvalid.php?ck_id=<?php echo $row['ck_id'] ?>" onclick="return confirm('Are you sure The Receipt is not Valid?')"> <!-- Tautan untuk menandai bukti sebagai tidak valid. -->
                            <strong>No?</strong>
                        </a>
                    </td>
                    <?php } else { ?>
                    <td><mark><?php echo $row['validasi'] ?></mark><br></td> <!-- Menampilkan status validasi jika tidak 'Menunggu'. -->
                    <?php } ?>
                    <td><?php echo $row['status'] ?></td> <!-- Menampilkan status pengiriman. -->
                    <td><?php echo $row['admin_name'] ?></td> <!-- Menampilkan nama admin yang menangani checkout. -->
                  <td class="full-address">
    <div class="address-text">
        <a href="detail_address.php"  target="_blank">View Address
        </a>
    </div>
</td>



                    <td><?php echo $row['admin_telp'] ?></td> <!-- Menampilkan nomor telepon admin. -->
                </tr>
                <?php } // Menutup while loop. ?>
            </table>
    
        </div>
    </div>
</body>
</html>