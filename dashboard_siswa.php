<?php
// Copyright (c) 2025 github.com/rahman-wardantz
session_start();
require 'config.php';
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'siswa') {
    header('Location: index.php'); exit;
}
$siswa_id = $_SESSION['user_id'];
$nama = $_SESSION['nama'];
$kelas = $_SESSION['kelas'];
$tanggal = date('Y-m-d');
// Cek apakah sudah isi jurnal hari ini
$cek = mysqli_query($conn, "SELECT * FROM jurnal WHERE siswa_id=$siswa_id AND tanggal='$tanggal'");
$isi = mysqli_fetch_assoc($cek);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Jurnal Harian Siswa</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="light bg-main">
<div class="container">
    <img src="https://i.ibb.co.com/4wgzqjLh/SMP-Muh-logo-removebg-preview.png" alt="Logo" class="logo">
    <h2 class="heading-main">Jurnal Harian Siswa</h2>
    <p class="date-info">Senin, <?= date('d F Y') ?></p>
    <p class="user-info">Halo, <b><?= htmlspecialchars($nama) ?></b> Kelas <b><?= htmlspecialchars($kelas) ?></b> | <a href="logout.php" class="btn-logout">Logout</a></p>
    <a href="riwayat_jurnal.php" class="link-main">Lihat Riwayat</a>
    <?php if(!$isi): ?>
    <div class="card">
    <form method="post" action="isi_jurnal.php" class="form-jurnal">
        <label>Jam Subuh:</label>
        <input type="time" name="jam_subuh">
        <label>Jam Ibadah:</label>
        <input type="time" name="jam_ibadah">
        <label>Jam Olahraga:</label>
        <input type="time" name="jam_olahraga">
        <label>Jam Makan Sehat:</label>
        <input type="time" name="jam_makan_sehat">
        <label>Jam Belajar:</label>
        <input type="time" name="jam_belajar">
        <label>Jam Bermasyarakat:</label>
        <input type="time" name="jam_bermasyarakat">
        <label>Jam Tidur Cepat:</label>
        <input type="time" name="jam_tidur_cepat">
        <label>Checklist Sholat:</label>
        <div class="checklist-sholat">
            <label><input type="checkbox" name="sholat_subuh" value="1"> Subuh</label>
            <label><input type="checkbox" name="sholat_duhur" value="1"> Duhur</label>
            <label><input type="checkbox" name="sholat_ashar" value="1"> Ashar</label>
            <label><input type="checkbox" name="sholat_maghrib" value="1"> Maghrib</label>
            <label><input type="checkbox" name="sholat_isyak" value="1"> Isyak</label>
        </div>
        <label>Nama Kegiatan Bermasyarakat:</label>
        <input type="text" name="kegiatan_bermasyarakat" placeholder="Contoh: Kerja bakti lingkungan">
        <label>Deskripsi Kegiatan:</label>
        <textarea name="deskripsi" rows="3" class="textarea-main"></textarea>
        <button type="submit" class="btn-main">Simpan Jurnal</button>
    </form>
    </div>
    <?php else: ?>
    <p class="alert success">Jurnal hari ini sudah diisi.</p>
    <?php endif; ?>
    <p class="copyright">Copyright &copy; 2025 <a href="https://github.com/rahman-wardantz">rahman-wardantz</a></p>
</div>
</body>
</html>
