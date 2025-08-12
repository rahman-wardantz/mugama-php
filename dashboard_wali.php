<?php
// Copyright (c) 2025 github.com/rahman-wardantz
session_start();
require 'config.php';
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'wali') {
    header('Location: index.php'); exit;
}
// Ambil rekap jurnal siswa
$jurnal = mysqli_query($conn, "SELECT j.*, u.nama, u.kelas FROM jurnal j JOIN users u ON j.siswa_id=u.id ORDER BY j.tanggal DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Panel Wali Kelas - Jurnal Kebiasaan Anak Sehat</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="light bg-main">
<div class="container">
    <img src="https://i.ibb.co.com/4wgzqjLh/SMP-Muh-logo-removebg-preview.png" alt="Logo" class="logo">
    <div class="flex-header">
        <h2 class="heading-main">Panel Wali Kelas</h2>
        <a href="logout.php" class="btn-logout">Logout</a>
    </div>
    <form method="post" action="export_jurnal_excel.php" class="form-export"><button type="submit" class="btn-main">Export Rekap ke Excel</button></form>
    <div class="card">
        <h3 class="heading-sub">Rekap Jurnal Harian Siswa</h3>
        <div class="table-responsive">
        <table>
            <thead>
            <tr>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Subuh</th>
                <th>Duhur</th>
                <th>Ashar</th>
                <th>Maghrib</th>
                <th>Isyak</th>
                <th>Kegiatan Bermasyarakat</th>
                <th>Jam Bermasyarakat</th>
                <th>Deskripsi</th>
            </tr>
            </thead>
            <tbody>
            <?php while($j = mysqli_fetch_assoc($jurnal)): ?>
            <tr>
                <td><?= htmlspecialchars($j['tanggal']) ?></td>
                <td><?= htmlspecialchars($j['nama']) ?></td>
                <td><?= htmlspecialchars($j['kelas']) ?></td>
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
            </tbody>
        </table>
        </div>
    </div>
    <p class="copyright">Copyright &copy; 2025 <a href="https://github.com/rahman-wardantz">rahman-wardantz</a></p>
</div>
</body>
</html>
