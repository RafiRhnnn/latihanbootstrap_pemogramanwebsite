<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_depan = $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // enkripsi password

    try {
        $sql = "INSERT INTO mahasiswa (nama_depan, nama_belakang, email, username, password) VALUES (:nama_depan, :nama_belakang, :email, :username, :password)";
        $stmt = $database_connetion->prepare($sql);
        
        $stmt->bindParam(':nama_depan', $nama_depan);
        $stmt->bindParam(':nama_belakang', $nama_belakang);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            echo "Registrasi berhasil!";
        } else {
            echo "Terjadi kesalahan saat registrasi.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registrasi</title>
</head>
<body>
    <h2>Form Registrasi</h2>
    <form action="register.php" method="post">
        <label>Nama Depan:</label><br>
        <input type="text" name="nama_depan" required><br>
        
        <label>Nama Belakang:</label><br>
        <input type="text" name="nama_belakang" required><br>
        
        <label>Email:</label><br>
        <input type="email" name="email" required><br>
        
        <label>Username:</label><br>
        <input type="text" name="username" required><br>
        
        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>
        
        <button type="submit">Register</button>
        <a href="login.php">
            <button type="button">Login</button>
        </a>
    </form>
</body>
</html>
