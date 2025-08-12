# Jurnal Kebiasaan Anak Sehat

Website jurnal harian siswa untuk monitoring kebiasaan sehat di SMP Muhammadiyah 3 Mlati. Dibangun dengan PHP dan MySQL, dilengkapi fitur multi-role (Admin, Wali Kelas, Siswa), rekap, export Excel, dan UI/UX modern.

## Fitur Utama
- **Login 3 Role:** Admin, Wali Kelas, Siswa
- **Admin:**
  - Buat, edit, hapus akun siswa & wali kelas
  - Lihat password akun
  - Export data akun ke Excel
- **Wali Kelas:**
  - Rekap jurnal harian siswa
  - Export rekap ke Excel
- **Siswa:**
  - Isi jurnal harian (jam kegiatan, checklist sholat, deskripsi)
  - Lihat riwayat jurnal
- **Pilihan Kelas:** 7A, 7B, 8A, 8B, 9A, 9B
- **UI/UX:** Light theme, background custom, responsif
- **Copyright:** github.com/rahman-wardantz

## Instalasi & Deploy
1. **Clone repository**
   ```bash
   git clone https://github.com/rahman-wardantz/mugama-php.git
   ```
2. **Upload ke hosting (CP Panel)**
   - Upload semua file ke folder `public_html` atau domain Anda
3. **Buat database MySQL**
   - Buat database dan user di CP Panel
   - Import file `db_init.sql` via phpMyAdmin
4. **Edit konfigurasi database**
   - Ubah file `config.php` sesuai user, password, dan nama database hosting
5. **Akses website**
   - Buka domain Anda, login dengan akun yang sudah ada

## Akun Default
- **Admin:**
  - Username: `admin`
  - Password: `admin123`
- **Wali Kelas:**
  - Username: `wali4`
  - Password: `wali4`
- **Siswa:**
  - Username: `siswa4`
  - Password: `siswa4`

## Struktur Folder
```
├── assets/         # Logo dan file statis
├── css/            # File CSS
├── db_init.sql     # Skrip SQL database
├── config.php      # Koneksi database
├── index.php       # Halaman login
├── dashboard_admin.php
├── dashboard_wali.php
├── dashboard_siswa.php
├── edit_akun.php
├── delete_akun.php
├── ...             # File fitur lain
```

## Lisensi
Copyright (c) 2025 github.com/rahman-wardantz

---
Website ini dikembangkan untuk kebutuhan monitoring kebiasaan sehat siswa dan kemudahan rekap oleh wali kelas dan admin sekolah.
