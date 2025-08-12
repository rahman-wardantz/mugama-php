<?php
// Copyright (c) 2025 github.com/rahman-wardantz
session_start();
require 'config.php';
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'siswa') {
    header('Location: index.php'); exit;
}
$siswa_id = $_SESSION['user_id'];
$tanggal = date('Y-m-d');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jam_subuh = $_POST['jam_subuh'] ?? NULL;
    $jam_ibadah = $_POST['jam_ibadah'] ?? NULL;
    $jam_olahraga = $_POST['jam_olahraga'] ?? NULL;
    $jam_makan_sehat = $_POST['jam_makan_sehat'] ?? NULL;
    $jam_belajar = $_POST['jam_belajar'] ?? NULL;
    $jam_bermasyarakat = $_POST['jam_bermasyarakat'] ?? NULL;
    $jam_tidur_cepat = $_POST['jam_tidur_cepat'] ?? NULL;
    $sholat_subuh = isset($_POST['sholat_subuh']) ? 1 : 0;
    $sholat_duhur = isset($_POST['sholat_duhur']) ? 1 : 0;
    $sholat_ashar = isset($_POST['sholat_ashar']) ? 1 : 0;
    $sholat_maghrib = isset($_POST['sholat_maghrib']) ? 1 : 0;
    $sholat_isyak = isset($_POST['sholat_isyak']) ? 1 : 0;
    $kegiatan_bermasyarakat = mysqli_real_escape_string($conn, $_POST['kegiatan_bermasyarakat'] ?? '');
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi'] ?? '');
    $sql = "INSERT INTO jurnal (siswa_id, tanggal, jam_subuh, jam_ibadah, jam_olahraga, jam_makan_sehat, jam_belajar, jam_bermasyarakat, jam_tidur_cepat, sholat_subuh, sholat_duhur, sholat_ashar, sholat_maghrib, sholat_isyak, kegiatan_bermasyarakat, deskripsi) VALUES ($siswa_id, '$tanggal', '$jam_subuh', '$jam_ibadah', '$jam_olahraga', '$jam_makan_sehat', '$jam_belajar', '$jam_bermasyarakat', '$jam_tidur_cepat', $sholat_subuh, $sholat_duhur, $sholat_ashar, $sholat_maghrib, $sholat_isyak, '$kegiatan_bermasyarakat', '$deskripsi')";
    if (mysqli_query($conn, $sql)) {
        header('Location: dashboard_siswa.php');
    } else {
        echo '<script>alert("Gagal simpan jurnal!"); window.location="dashboard_siswa.php";</script>';
    }
} else {
    header('Location: dashboard_siswa.php');
}
?>
