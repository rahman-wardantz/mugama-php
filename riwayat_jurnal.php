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
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="light">
<div class="container">
    <h2>Riwayat Jurnal Siswa</h2>
    <a href="dashboard_siswa.php">Kembali</a>
    <table border="1" width="100%">
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
    <p>Copyright &copy; 2025 <a href="https://github.com/rahman-wardantz">rahman-wardantz</a></p>
</div>
</body>
</html>
