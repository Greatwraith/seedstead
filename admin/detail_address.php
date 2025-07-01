<?php 
include('session.php'); // Menyertakan file session.php
include 'fungsi_indotgl.php'; // Menyertakan fungsi tanggal Indonesia
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customer Address</title>
    <link rel="stylesheet" type="text/css" href="../css/css-admin/styleadmincheckout.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/all.css">
    <style>
        .address-card {
            background: #fff;
            padding: 30px 40px;
            max-width: 600px;
            margin: 40px auto;
            border-radius: 10px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        }

        .address-card h2 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #333;
        }

        .address-card p {
            font-size: 16px;
            color: #444;
            line-height: 1.8;
        }

        .address-card strong {
            color: #219B9D;
            display: block;
            margin-bottom: 8px;
        }
    </style>
</head>
<body>

<div class="wrapper">
    <div class="header">
        <div class="header-text">
            FULL ADDRESS
        </div>
    </div>

    <div class="sidebar">
        <div class="sidebar-title"><b>Seedstead</b></div>
        <ul>
            <?php include 'sidebar.php'; ?>
        </ul>
    </div>

    <div class="container-section">
        <div class="section">
            
            
            <div class="address-card">
                
                <?php
                $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '" . $_SESSION['id_login'] . "'");
                $data = mysqli_fetch_object($query);
                ?>
                <h2>Customer: <i><?php echo htmlspecialchars($data->admin_name); ?></i> </h2>
                <p>
                    <strong>Full Address:</strong>
                    <?php echo nl2br(htmlspecialchars($data->admin_address)); ?>
                </p>
                <br>  <br>
                <h3>
                <a href="checkout.php"> back to chekout </a> 
            </h3>
            </div>
        </div>
    </div>
</div>

</body>
</html>
