<?php
// Copyright (c) 2025 github.com/rahman-wardantz
session_start();
require 'config.php';
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header('Location: index.php'); exit;
}
// Ambil data user
$users = mysqli_query($conn, "SELECT * FROM users");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Jurnal Kebiasaan Anak Sehat</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="light">
<div class="container">
    <h2>Panel Admin</h2>
    <a href="logout.php">Logout</a>
    <h3>Buat Akun Baru</h3>
    <form method="post" action="buat_akun.php">
        <input type="text" name="username" placeholder="Username" required>
        <input type="text" name="nama" placeholder="Nama" required>
        <select name="role" required>
            <option value="siswa">Siswa</option>
            <option value="wali">Wali Kelas</option>
        </select>
        <select name="kelas" required>
            <option value="">Pilih Kelas</option>
            <option value="7A">7A</option>
            <option value="7B">7B</option>
            <option value="8A">8A</option>
            <option value="8B">8B</option>
            <option value="9A">9A</option>
            <option value="9B">9B</option>
        </select>
        <input type="text" name="password" placeholder="Password" required>
        <button type="submit">Buat Akun</button>
    </form>
    <h3>Daftar Akun</h3>
    <form method="post" action="export_users_excel.php"><button type="submit">Export ke Excel</button></form>
    <table border="1" width="100%">
        <tr><th>Username</th><th>Nama</th><th>Kelas</th><th>Role</th><th>Password</th></tr>
        <?php while($u = mysqli_fetch_assoc($users)): ?>
        <tr>
            <td><?= htmlspecialchars($u['username']) ?></td>
            <td><?= htmlspecialchars($u['nama']) ?></td>
            <td><?= htmlspecialchars($u['kelas']) ?></td>
            <td><?= htmlspecialchars($u['role']) ?></td>
            <td><?= $u['password'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <p>Copyright &copy; 2025 <a href="https://github.com/rahman-wardantz">rahman-wardantz</a></p>
</div>
</body>
</html>
