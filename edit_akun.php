<?php
// Copyright (c) 2025 github.com/rahman-wardantz
session_start();
require 'config.php';
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header('Location: index.php'); exit;
}
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$user = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
$u = mysqli_fetch_assoc($user);
if (!$u) { header('Location: dashboard_admin.php'); exit; }
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $role = $_POST['role'];
    $kelas = $_POST['kelas'];
    $password = $_POST['password'];
    mysqli_query($conn, "UPDATE users SET username='$username', nama='$nama', role='$role', kelas='$kelas', password='$password' WHERE id=$id");
    header('Location: dashboard_admin.php'); exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Akun</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="light" style="background:url('https://i.ibb.co.com/Q3dpY15c/animegirl-mu.png') center/cover no-repeat fixed, linear-gradient(135deg, #e3f2fd 0%, #fff 100%);min-height:100vh;">
<div class="container">
    <img src="https://i.ibb.co.com/4wgzqjLh/SMP-Muh-logo-removebg-preview.png" alt="Logo" class="logo">
    <h2 style="color:#1976d2;">Edit Akun</h2>
    <div style="background:#e3f2fd;padding:18px 16px;border-radius:12px;box-shadow:0 2px 8px #90caf9;">
    <form method="post" style="text-align:left;">
        <label>Username:</label>
        <input type="text" name="username" value="<?= htmlspecialchars($u['username']) ?>" required>
        <label>Nama:</label>
        <input type="text" name="nama" value="<?= htmlspecialchars($u['nama']) ?>" required>
        <label>Role:</label>
        <select name="role" required>
            <option value="siswa" <?= $u['role']=='siswa'?'selected':'' ?>>Siswa</option>
            <option value="wali" <?= $u['role']=='wali'?'selected':'' ?>>Wali Kelas</option>
        </select>
        <label>Kelas:</label>
        <select name="kelas" required>
            <option value="">Pilih Kelas</option>
            <option value="7A" <?= $u['kelas']=='7A'?'selected':'' ?>>7A</option>
            <option value="7B" <?= $u['kelas']=='7B'?'selected':'' ?>>7B</option>
            <option value="8A" <?= $u['kelas']=='8A'?'selected':'' ?>>8A</option>
            <option value="8B" <?= $u['kelas']=='8B'?'selected':'' ?>>8B</option>
            <option value="9A" <?= $u['kelas']=='9A'?'selected':'' ?>>9A</option>
            <option value="9B" <?= $u['kelas']=='9B'?'selected':'' ?>>9B</option>
        </select>
        <label>Password:</label>
        <input type="text" name="password" value="<?= htmlspecialchars($u['password']) ?>" required>
        <button type="submit">Simpan Perubahan</button>
    </form>
    </div>
    <p style="margin-top:18px;"><a href="dashboard_admin.php" style="color:#1976d2;font-weight:500;">&larr; Kembali</a></p>
    <p style="margin-top:8px;font-size:0.98rem;color:#444;">Copyright &copy; 2025 <a href="https://github.com/rahman-wardantz" style="color:#1976d2;">rahman-wardantz</a></p>
</div>
</body>
</html>
