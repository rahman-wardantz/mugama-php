<?php
// Copyright (c) 2025 github.com/rahman-wardantz
session_start();
require 'config.php';
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header('Location: index.php'); exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $role = $_POST['role'];
    $kelas = isset($_POST['kelas']) ? mysqli_real_escape_string($conn, $_POST['kelas']) : NULL;
    $password = md5($_POST['password']);
    $sql = "INSERT INTO users (username, password, nama, kelas, role) VALUES ('$username', '$password', '$nama', '$kelas', '$role')";
    if (mysqli_query($conn, $sql)) {
        header('Location: dashboard_admin.php');
    } else {
        echo '<script>alert("Gagal membuat akun!"); window.location="dashboard_admin.php";</script>';
    }
} else {
    header('Location: dashboard_admin.php');
}
?>
