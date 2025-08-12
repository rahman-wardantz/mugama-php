<?php
// Copyright (c) 2025 github.com/rahman-wardantz
session_start();
require 'config.php';
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'siswa') {
    header('Location: index.php'); exit;
}
$siswa_id = $_SESSION['user_id'];
$jurnal = mysqli_query($conn, "SELECT * FROM jurnal WHERE siswa_id=$siswa_id ORDER BY tanggal DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Jurnal Siswa</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body class="light" style="background:url('https://i.ibb.co.com/Q3dpY15c/animegirl-mu.png') center/cover no-repeat fixed, linear-gradient(135deg, #e3f2fd 0%, #fff 100%);min-height:100vh;">
<div class="container">
    <img src="https://i.ibb.co.com/4wgzqjLh/SMP-Muh-logo-removebg-preview.png" alt="Logo" class="logo">
    <h2 style="color:#1976d2;">Riwayat Jurnal Siswa</h2>
    <a href="dashboard_siswa.php" style="color:#1976d2;font-weight:500;">&larr; Kembali</a>
    <div style="background:#e3f2fd;padding:18px 16px;border-radius:12px;box-shadow:0 2px 8px #90caf9;margin-bottom:18px;">
        <div style="overflow-x:auto;">
        <table>
            <tr><th>Tanggal</th><th>Subuh</th><th>Duhur</th><th>Ashar</th><th>Maghrib</th><th>Isyak</th><th>Kegiatan Bermasyarakat</th><th>Jam Bermasyarakat</th><th>Deskripsi</th></tr>
            <?php while($j = mysqli_fetch_assoc($jurnal)): ?>
            <tr>
                <td><?= htmlspecialchars($j['tanggal']) ?></td>
                <td><?= $j['sholat_subuh'] ? '✔️' : '❌' ?></td>
                <td><?= $j['sholat_duhur'] ? '✔️' : '❌' ?></td>
                <td><?= $j['sholat_ashar'] ? '✔️' : '❌' ?></td>
                <td><?= $j['sholat_maghrib'] ? '✔️' : '❌' ?></td>
                <td><?= $j['sholat_isyak'] ? '✔️' : '❌' ?></td>
                <td><?= htmlspecialchars($j['kegiatan_bermasyarakat']) ?></td>
                <td><?= htmlspecialchars($j['jam_bermasyarakat']) ?></td>
                <td><?= htmlspecialchars($j['deskripsi']) ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
        </div>
    </div>
    <p style="margin-top:8px;font-size:0.98rem;color:#444;">Copyright &copy; 2025 <a href="https://github.com/rahman-wardantz" style="color:#1976d2;">rahman-wardantz</a></p>
</div>
</body>
</html>
