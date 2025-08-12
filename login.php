<?php
// Copyright (c) 2025 github.com/rahman-wardantz
session_start();
require 'config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['role'] = $row['role'];
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['kelas'] = $row['kelas'];
        if ($row['role'] == 'admin') header('Location: dashboard_admin.php');
        elseif ($row['role'] == 'wali') header('Location: dashboard_wali.php');
        elseif ($row['role'] == 'siswa') header('Location: dashboard_siswa.php');
        exit;
    } else {
        echo '<script>alert("Login gagal! Username atau password salah."); window.location="index.php";</script>';
    }
} else {
    header('Location: index.php');
    exit;
}
?>
