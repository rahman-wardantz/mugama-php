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
<body class="light" style="background:url('https://i.ibb.co.com/Q3dpY15c/animegirl-mu.png') center/cover no-repeat fixed, linear-gradient(135deg, #e3f2fd 0%, #fff 100%);min-height:100vh;">
<div class="container" style="max-width:900px;backdrop-filter:blur(2px);background:rgba(255,255,255,0.96);box-shadow:0 4px 24px rgba(25,118,210,0.12),0 1.5px 6px #ccc;">
    <img src="https://i.ibb.co.com/4wgzqjLh/SMP-Muh-logo-removebg-preview.png" alt="Logo" width="90" style="margin-bottom:10px;box-shadow:0 2px 8px #90caf9;border-radius:10px;">
    <h2 style="color:#1976d2;">Panel Admin</h2>
    <a href="logout.php" style="float:right;color:#d32f2f;font-weight:500;">Logout</a>
    <div style="margin-bottom:24px;margin-top:8px;padding:18px 16px;background:#e3f2fd;border-radius:12px;box-shadow:0 2px 8px #90caf9;">
        <h3 style="color:#1565c0;margin-bottom:12px;">Buat Akun Baru</h3>
        <form method="post" action="buat_akun.php" style="text-align:left;">
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
            <button type="submit">Buat Akun</button>
        </form>
    </div>
    <h3 style="color:#1565c0;margin-bottom:12px;">Daftar Akun</h3>
    <form method="post" action="export_users_excel.php" style="margin-bottom:12px;"><button type="submit">Export ke Excel</button></form>
    <div style="overflow-x:auto;">
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
                <a href="edit_akun.php?id=<?= $u['id'] ?>" style="color:#1976d2;font-weight:500;">Edit</a> |
                <a href="delete_akun.php?id=<?= $u['id'] ?>" style="color:#d32f2f;font-weight:500;" onclick="return confirm('Yakin hapus akun ini?');">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    </div>
    <p>Copyright &copy; 2025 <a href="https://github.com/rahman-wardantz">rahman-wardantz</a></p>
</div>
</body>
</html>
