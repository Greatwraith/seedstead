<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seedstead | Sign Up</title>
    <link rel="stylesheet" href="css/register_style.css"> <!-- Make sure you're using the same stylesheet -->
</head>
<body id="bg-login">
    <div class="box-login">
        <h2>Sign Up</h2>
       <form action="" method="POST">
    <div class="form-columns">
        <div class="left-col">
            <div class="input-box">
                <input type="text" name="nama" placeholder="Nama Lengkap" required>
            </div>
            <div class="input-box">
                <input type="text" name="alamat" placeholder="Alamat" required>
            </div>
        </div>
        <div class="right-col">
            <div class="input-box">
                <input type="text" name="telpon" placeholder="Telepon" required>
            </div>
            <div class="input-box">
                <input type="email" name="email" placeholder="Email" required>
            </div>
        </div>
    </div>
    <hr><br>
    <div class="input-box">
        <input type="text" name="user" placeholder="Username" required>
    </div>
    <br>
    <div class="input-box">
        <input type="password" name="pass" placeholder="Password" required>
    </div>
    <br>
    <button type="submit" name="submit" class="btn-login">Sign Up</button>
    <p class="register-link">
        Already have an account? <a href="login.php"><strong>Log in here!</strong></a>
    </p>
</form>

        <?php
        include('db.php');
        if(isset($_POST['submit'])){
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $telpon = $_POST['telpon'];
            $email = $_POST['email'];
            $username = $_POST['user'];
            $password = $_POST['pass'];

            $insert = mysqli_query($conn, "INSERT INTO tb_admin VALUES (null,'".$nama."',
            '".$username."','".$password."','".$telpon."','".$email."','".$alamat."','user')");

            if($insert){
                echo "<script>alert('Berhasil, silakan login');</script>";
                echo "<script>window.location='login.php';</script>";
            } else {
                echo "<script>alert('Gagal!');</script>";
                echo "<script>window.location='register.php';</script>";
            }
        }
        ?>
    </div>
</body>
</html>
