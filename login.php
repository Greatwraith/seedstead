<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seedstead | Login</title>
    <link rel="stylesheet" href="css/login_style.css">
</head>
<body id="bg-login">
    <div class="box-login">
        <h2>Login</h2>
        <form action="" method="post">
            <div class="input-box">
                <input type="text" name="user" placeholder="Username" required>
            </div>
            <div class="input-box">
                <input type="password" name="pass" placeholder="Password" required>
            </div>
            <button type="submit" name="submit" class="btn-login">Log In</button>
            <p class="register-link">
                Don't have an account yet? <a href="signup.php"><strong>Sign Up here!</strong></a>
            </p>
        </form>
        <?php
    // Menyertakan file database untuk koneksi ke database
    include "db.php";

    // Mengecek apakah tombol submit telah ditekan
    if(isset($_POST["submit"])){
        // Mengambil data username dan password dari form login
        $username = $_POST["user"];
        $password = $_POST["pass"];
        
        // Query untuk mencari user di database berdasarkan username dan password
        $sql = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username='$username' AND password='$password'");

        // Mengecek apakah query menghasilkan data
        if(mysqli_num_rows($sql) == 0){
            // Jika tidak ada data yang ditemukan, tampilkan pesan error dan kembali ke halaman login
            echo "
            <script>
                alert('your username or password wrong');
                window.location = 'login.php';
            </script>";
        }else{
            // Jika data ditemukan, mulai session
            session_start();
            $row = mysqli_fetch_assoc($sql); // Mengambil data user dalam bentuk array

            // Menyimpan informasi penting di session
            $_SESSION['id_login'] = $row['admin_id']; // Menyimpan ID user
            $_SESSION['level'] = $row['level'];      // Menyimpan level user (admin/pelanggan)
            $_SESSION['status_login'] = true;        // Menandakan user sudah login

            // Mengecek level user untuk diarahkan ke halaman yang sesuai
            if($row["level"] == "admin"){
                // var_dump($row);
                // exit;

                echo "
                <script>
                    alert('Logged in as admin');
                    window.location = 'admin/dashboard.php';
                </script>";
            }elseif($row["level"] == "user"){
                echo "
                <script>
                    alert('Logged in as customer');
                    window.location = 'user/home.php'; 
                </script>";
            }else{
    header('location: admin/dashboard.php');
}

        }
    }
?>

        
    </div>
</body>
</html>
