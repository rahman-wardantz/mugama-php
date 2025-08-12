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
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="assets/logo.png">
</head>
<body class="light">
    <div class="container" style="max-width:440px;">
        <img src="https://iili.io/F4i5Ly7.png" alt="Logo" width="110" style="margin-bottom:16px;box-shadow:0 2px 8px #90caf9;border-radius:10px;">
        <h2 style="color:#1976d2;font-size:1.7rem;margin-bottom:8px;">SMP Muhammadiyah 3 Mlati</h2>
        <h3 style="color:#1565c0;font-size:1.15rem;margin-bottom:22px;">Jurnal Kebiasaan Anak Sehat</h3>
        <form method="post" action="login.php" style="text-align:left;">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Masukkan username" required autocomplete="username">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Masukkan password" required autocomplete="current-password">
            <button type="submit" aria-label="Login">Login</button>
        </form>
        <p style="margin-top:24px;font-size:0.98rem;color:#444;">Copyright &copy; 2025 <a href="https://github.com/rahman-wardantz" style="color:#1976d2;">rahman-wardantz</a></p>
    </div>
</body>
</html>
