<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$nama_depan = $_SESSION['nama_depan'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h1>Selamat datang, <?php echo htmlspecialchars($nama_depan); ?>!</h1>
    <p>Ini adalah halaman dashboard Anda.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
