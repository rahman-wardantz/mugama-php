<?php
// Copyright (c) 2025 github.com/rahman-wardantz
require 'config.php';
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="daftar_akun.xls"');
echo "Username\tNama\tKelas\tRole\tPassword\n";
$res = mysqli_query($conn, "SELECT * FROM users");
while($row = mysqli_fetch_assoc($res)) {
    echo $row['username']."\t".$row['nama']."\t".$row['kelas']."\t".$row['role']."\t".$row['password']."\n";
}
exit;
