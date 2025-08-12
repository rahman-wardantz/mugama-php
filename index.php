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
    <div class="container">
        <img src="https://iili.io/F4i5Ly7.png" alt="Logo" width="100">
        <h2>SMP Muhammadiyah 3 Mlati</h2>
        <h3>Jurnal Kebiasaan Anak Sehat</h3>
        <form method="post" action="login.php">
            <label>Username:</label><br>
            <input type="text" name="username" required><br>
            <label>Password:</label><br>
            <input type="password" name="password" required><br>
            <button type="submit">Login</button>
        </form>
        <p>Copyright &copy; 2025 <a href="https://github.com/rahman-wardantz">rahman-wardantz</a></p>
    </div>
</body>
</html>
