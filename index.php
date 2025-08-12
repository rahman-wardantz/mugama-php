<?php
// Copyright (c) 2025 github.com/rahman-wardantz
// SMP Muhammadiyah 3 Mlati
session_start();
if(isset($_SESSION['role'])) {
    if($_SESSION['role']=='admin') header('Location: dashboard_admin.php');
    elseif($_SESSION['role']=='wali') header('Location: dashboard_wali.php');
    elseif($_SESSION['role']=='siswa') header('Location: dashboard_siswa.php');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Jurnal Kebiasaan Anak Sehat</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="icon" href="https://i.ibb.co.com/4wgzqjLh/SMP-Muh-logo-removebg-preview.png">
</head>
<body class="light bg-main">
    <div class="container">
        <img src="https://i.ibb.co.com/4wgzqjLh/SMP-Muh-logo-removebg-preview.png" alt="Logo" class="logo">
        <h2 class="heading-main">SMP Muhammadiyah 3 Mlati</h2>
        <h3 class="heading-sub">Jurnal Kebiasaan Anak Sehat</h3>
        <form method="post" action="login.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Masukkan username" required autocomplete="username">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Masukkan password" required autocomplete="current-password">
            <button type="submit" aria-label="Login">Login</button>
        </form>
        <p class="copyright">Copyright &copy; 2025 <a href="https://github.com/rahman-wardantz">rahman-wardantz</a></p>
    </div>
</body>
</html>
