<?php
// Copyright (c) 2025 github.com/rahman-wardantz
require 'config.php';
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="rekap_jurnal.xls"');
echo "Tanggal\tNama\tKelas\tSubuh\tDuhur\tAshar\tMaghrib\tIsyak\tKegiatan Bermasyarakat\tJam Bermasyarakat\tDeskripsi\n";
$res = mysqli_query($conn, "SELECT j.*, u.nama, u.kelas FROM jurnal j JOIN users u ON j.siswa_id=u.id ORDER BY j.tanggal DESC");
while($row = mysqli_fetch_assoc($res)) {
    echo $row['tanggal']."\t".$row['nama']."\t".$row['kelas']."\t".($row['sholat_subuh']?'✔️':'❌')."\t".($row['sholat_duhur']?'✔️':'❌')."\t".($row['sholat_ashar']?'✔️':'❌')."\t".($row['sholat_maghrib']?'✔️':'❌')."\t".($row['sholat_isyak']?'✔️':'❌')."\t".$row['kegiatan_bermasyarakat']."\t".$row['jam_bermasyarakat']."\t".$row['deskripsi']."\n";
}
exit;
