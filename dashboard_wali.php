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
<body class="light">
<div class="container" style="max-width:900px;">
    <h2 style="color:#1976d2;">Panel Wali Kelas</h2>
    <a href="logout.php" style="float:right;color:#d32f2f;font-weight:500;">Logout</a>
    <form method="post" action="export_jurnal_excel.php" style="margin-bottom:12px;"><button type="submit">Export Rekap ke Excel</button></form>
    <div style="background:#e3f2fd;padding:18px 16px;border-radius:12px;box-shadow:0 2px 8px #90caf9;margin-bottom:18px;">
        <h3 style="color:#1565c0;margin-bottom:12px;">Rekap Jurnal Harian Siswa</h3>
        <div style="overflow-x:auto;">
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
    <p>Copyright &copy; 2025 <a href="https://github.com/rahman-wardantz">rahman-wardantz</a></p>
</div>
</body>
</html>
