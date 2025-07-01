<?php include('session.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Profile</title>
    <link rel="stylesheet" href="../css/home2.css">
  <link rel="stylesheet" href="../css/profile_style.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body class="wrapper">
<header>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo"><img src="../img/seedstead.png" alt=""></div>
            <ul class="nav-links">
               <?php include 'navbar.php'; ?> 
            </ul>
        </div>
    </nav>
 </header>

  <!-- Page Header -->
  <header class="header">
    <h1>My Profile</h1>
  </header>

  <!-- Main Section -->
  <main class="container-section">
    <div class="form-container">
      <?php
        $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '" . $_SESSION['id_login'] . "'");
        $d = mysqli_fetch_object($query);
      ?>

      <!-- Profile Update Form -->
      <form method="post" class="profile-form">
        <h2>Update Profile</h2>

        <input type="text" name="nama" placeholder="Full Name" value="<?= $d->admin_name ?>" required />
        <input type="text" name="user" placeholder="Username" value="<?= $d->username ?>" required />
        <input type="text" name="hp" placeholder="Phone Number" value="<?= $d->admin_telp ?>" required />
        <input type="email" name="email" placeholder="Email" value="<?= $d->admin_email ?>" required />
        <input type="text" name="alamat" placeholder="Address" value="<?= $d->admin_address ?>" required />

        <button type="submit" name="submit" onclick="return confirm('Are you sure you want to change profile?')">Update Profile</button>
      </form>

      <?php
        if (isset($_POST['submit'])) {
          $nama = ucwords($_POST['nama']);
          $user = $_POST['user'];
          $hp = $_POST['hp'];
          $email = $_POST['email'];
          $alamat = ucwords($_POST['alamat']);

          $update = mysqli_query($conn, "UPDATE tb_admin SET 
            admin_name = '$nama', 
            username = '$user',
            admin_telp = '$hp', 
            admin_email = '$email', 
            admin_address = '$alamat' 
            WHERE admin_id = '$d->admin_id'");

          if ($update) {
            echo '<script>alert("Profile updated successfully."); window.location="profile_user.php";</script>';
          } else {
            echo 'Error: ' . mysqli_error($conn);
          }
        }
      ?>

      <!-- Password Update Form -->
      <form method="post" class="profile-form">
        <h2>Change Password</h2>
        <input type="password" name="pass1" placeholder="New Password" required />
        <input type="password" name="pass2" placeholder="Confirm Password" required />
        <button type="submit" name="ubah_password" onclick="return confirm('Are you sure you want to change your password?')">Change Password</button>
      </form>

      <?php
        if (isset($_POST['ubah_password'])) {
          $pass1 = $_POST['pass1'];
          $pass2 = $_POST['pass2'];

          if ($pass1 !== $pass2) {
            echo '<script>alert("Passwords do not match.");</script>';
          } else {
            $updatePass = mysqli_query($conn, "UPDATE tb_admin SET password = '$pass1' WHERE admin_id = '$d->admin_id'");
            if ($updatePass) {
              echo '<script>alert("Password changed successfully."); window.location="profile_user.php";</script>';
            } else {
              echo 'Error: ' . mysqli_error($conn);
            }
          }
        }
      ?>
    </div>
  </main>

  <!-- Footer -->
  <footer>
        <p>© 2025 Seedstead | All rights reserved.</p>
    </footer>

</body>
</html>
