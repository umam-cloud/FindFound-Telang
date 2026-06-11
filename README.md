# 🔍 FindFound-Telang

> Sistem informasi pencarian dan penemuan barang hilang berbasis web untuk lingkungan kampus Telang.

---

## 📌 Deskripsi

**Find & Found Telang** adalah aplikasi web yang memudahkan mahasiswa dan civitas akademik untuk:
- 📢 Melaporkan barang yang **hilang**
- 📦 Melaporkan barang yang **ditemukan**
- 🔎 Mencari informasi barang hilang/temuan secara online

Dibangun menggunakan **PHP Native dengan pola arsitektur MVC** (tanpa framework) sebagai bagian dari tugas mata kuliah Pemrograman Web.

---

## 👥 Tim Pengembang

| Nama | NIM |
|------|-----|
| M. Fatihul Umam | 240411100209 | 
| Fathan Ruhul Alam  | 240411100190 | 
| Fathul Aziz Saifuddin | 240411100141 |
| Riko Tampati |240411100136 | 
| Mohammad Aziz Huzaini | 240411100079 | 
| Siti Nur Fadhilah | 240411100018 | 

---

## 🛠️ Teknologi yang Digunakan

- **Backend**: PHP 8.x (Native MVC tanpa framework)
- **Frontend**: HTML5, TailWind, JavaScript
- **Database**: MySQL
- **Tools**: Laragon, VS Code, GitHub
- **Design**: Figma

---

## 📁 Struktur Folder

```
FindFound-Telang/
├───app
│   ├───config
│   ├───controllers
│   ├───core
│   ├───models
│   └───views
│       ├───aktivitas
│       ├───auth
│       ├───home
│       ├───laporan
│       ├───postingan
│       ├───profile
│       └───templates
└───public
    ├───css
    ├───img
    │   ├───postingan
    │   └───profile
    └───js

```

---

## 🚀 Cara Menjalankan Project (Local)

### Prasyarat
- [Laragon](https://laragon.org/) sudah terinstall
- PHP >= 8.0
- MySQL

### Langkah-langkah

**1. Clone repository ini**
```bash
cd C:/laragon/www
git clone https://github.com/[username]/find-and-found-telang.git
cd find-and-found-telang
```

**2. Import database**
- Buka `http://localhost/phpmyadmin`
- Buat database baru bernama `find_found_telang`
- Import file `database/find_found_telang.sql`

**3. Konfigurasi koneksi database**

Edit file `app/config/database.php`:
```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'find_found_telang');
```

**4. Jalankan aplikasi**

Buka browser dan akses:
```
http://localhost/find-and-found-telang/public
```

---

## ✅ Fitur

- [x] Struktur MVC native PHP
- [x] Autentikasi (Login & Register)
- [x] Lapor barang hilang
- [x] Lapor barang ditemukan
- [x] Pencarian barang
- [x] Detail barang
- [x] Upload foto barang
- [x] Dashboard admin

---

## 📄 Lisensi

Project ini dibuat untuk keperluan tugas kuliah. © 2026 Tim Find & Found Telang.
