<?php
session_start();
include ('../db.php');

// Cek apakah pengguna sudah login
if (!isset($_SESSION['id_login']) || trim($_SESSION['id_login']) == '') { ?>
    <script>
        alert('Login terlebih dahulu!');
        window.location = "../";
    </script>
<?php
    exit();
}

// Ambil session ID
$session_id = $_SESSION['id_login'];

// Menggunakan Prepared Statement untuk keamanan
$stmt = $conn->prepare("SELECT * FROM user WHERE id_user = ?");
$stmt->bind_param("i", $session_id);
$stmt->execute();
$user_query = $stmt->get_result();

if ($user_query->num_rows > 0) {
    $user_row = $user_query->fetch_assoc();
} else {
    echo "User tidak ditemukan.";
}
?>
