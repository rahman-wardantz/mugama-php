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
    <link rel="stylesheet" href="/css/style.css">
</head>
<body class="light bg-main">
<div class="container">
    <img src="https://i.ibb.co.com/4wgzqjLh/SMP-Muh-logo-removebg-preview.png" alt="Logo" class="logo">
    <div class="flex-header">
        <h2 class="heading-main">Panel Admin</h2>
        <a href="logout.php" class="btn-logout">Logout</a>
    </div>
    <div class="card">
        <h3 class="heading-sub">Buat Akun Baru</h3>
        <form method="post" action="buat_akun.php" class="form-akun">
            <label>Username:</label>
            <input type="text" name="username" placeholder="Username" required>
            <label>Nama:</label>
            <input type="text" name="nama" placeholder="Nama" required>
            <label>Role:</label>
            <select name="role" required>
                <option value="siswa">Siswa</option>
                <option value="wali">Wali Kelas</option>
            </select>
            <label>Kelas:</label>
            <select name="kelas" required>
                <option value="">Pilih Kelas</option>
                <option value="7A">7A</option>
                <option value="7B">7B</option>
                <option value="8A">8A</option>
                <option value="8B">8B</option>
                <option value="9A">9A</option>
                <option value="9B">9B</option>
            </select>
            <label>Password:</label>
            <input type="text" name="password" placeholder="Password" required>
            <button type="submit" class="btn-main">Buat Akun</button>
        </form>
    </div>
    <h3 class="heading-sub">Daftar Akun</h3>
    <form method="post" action="export_users_excel.php" class="form-export"><button type="submit" class="btn-main">Export ke Excel</button></form>
    <div class="table-responsive">
    <table>
        <tr><th>Username</th><th>Nama</th><th>Kelas</th><th>Role</th><th>Password</th><th>Aksi</th></tr>
        <?php while($u = mysqli_fetch_assoc($users)): ?>
        <tr>
            <td><?= htmlspecialchars($u['username']) ?></td>
            <td><?= htmlspecialchars($u['nama']) ?></td>
            <td><?= htmlspecialchars($u['kelas']) ?></td>
            <td><?= htmlspecialchars($u['role']) ?></td>
            <td><?= $u['password'] ?></td>
            <td>
                <a href="edit_akun.php?id=<?= $u['id'] ?>" class="link-edit">Edit</a> |
                <a href="delete_akun.php?id=<?= $u['id'] ?>" class="link-delete" onclick="return confirm('Yakin hapus akun ini?');">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    </div>
    <p class="copyright">Copyright &copy; 2025 <a href="https://github.com/rahman-wardantz">rahman-wardantz</a></p>
</div>
</body>
</html>
