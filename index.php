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
    <link rel="icon" href="https://i.ibb.co.com/4wgzqjLh/SMP-Muh-logo-removebg-preview.png">
</head>
<body class="light" style="background:url('https://i.ibb.co.com/Q3dpY15c/animegirl-mu.png') center/cover no-repeat fixed, linear-gradient(135deg, #e3f2fd 0%, #fff 100%);min-height:100vh;">
    <div class="container" style="max-width:440px;backdrop-filter:blur(2px);background:rgba(255,255,255,0.96);box-shadow:0 4px 24px rgba(25,118,210,0.12),0 1.5px 6px #ccc;">
        <img src="https://i.ibb.co.com/4wgzqjLh/SMP-Muh-logo-removebg-preview.png" alt="Logo" width="120" style="margin-bottom:16px;box-shadow:0 2px 8px #90caf9;border-radius:10px;">
        <h2 style="color:#1976d2;font-size:1.7rem;margin-bottom:8px;">SMP Muhammadiyah 3 Mlati</h2>
        <h3 style="color:#1565c0;font-size:1.15rem;margin-bottom:22px;">Jurnal Kebiasaan Anak Sehat</h3>
        <form method="post" action="login.php" style="text-align:left;">
            <label for="username" style="font-weight:500;color:#1976d2;">Username:</label>
            <input type="text" id="username" name="username" placeholder="Masukkan username" required autocomplete="username" style="margin-bottom:10px;">
            <label for="password" style="font-weight:500;color:#1976d2;">Password:</label>
            <input type="password" id="password" name="password" placeholder="Masukkan password" required autocomplete="current-password" style="margin-bottom:10px;">
            <button type="submit" aria-label="Login" style="background:linear-gradient(90deg,#1976d2 60%,#64b5f6 100%);color:#fff;border:none;cursor:pointer;padding:10px 0;width:96%;border-radius:8px;font-size:1.08rem;font-weight:500;box-shadow:0 2px 8px rgba(25,118,210,0.08);margin-top:12px;transition:background 0.2s;">Login</button>
        </form>
        <p style="margin-top:24px;font-size:0.98rem;color:#444;">Copyright &copy; 2025 <a href="https://github.com/rahman-wardantz" style="color:#1976d2;">rahman-wardantz</a></p>
    </div>
</body>
</html>
