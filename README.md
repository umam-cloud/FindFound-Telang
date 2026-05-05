# 🔍 Find & Found Telang

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

| Nama | NIM | Role |
|------|-----|------|
| M. Fatihul Umam | 240411100209 | 
| Fathan Ruhul Alam  | 240411100190 | 
| Fathul Aziz Saifuddin | 240411100141 |
| Riko Tampati |240411100136 | 
| Mohammad Aziz Huzaini | 240411100079 | 
| Siti Nur Fadhilah | 240411100018 | 

---

## 🛠️ Teknologi yang Digunakan

- **Backend**: PHP 8.x (Native MVC tanpa framework)
- **Frontend**: HTML5, CSS3, JavaScript
- **Database**: MySQL
- **Tools**: Laragon, VS Code, GitHub
- **Design**: Figma

---

## 📁 Struktur Folder

```
find-and-found-telang/
│
├── app/
│   ├── config/
│   │   └── database.php        # Konfigurasi koneksi database
│   │
│   ├── core/
│   │   ├── App.php             # Router utama
│   │   ├── Controller.php      # Base controller
│   │   └── Model.php           # Base model
│   │
│   ├── controllers/
│   │   ├── Home.php
│   │   ├── Barang.php
│   │   └── Auth.php
│   │
│   ├── models/
│   │   ├── BarangModel.php
│   │   └── UserModel.php
│   │
│   └── views/
│       ├── templates/          # header, navbar, footer
│       ├── home/
│       ├── barang/
│       ├── auth/
│       └── about/
│
├── public/
│   ├── index.php               # Entry point
│   ├── .htaccess
│   ├── css/
│   ├── js/
│   └── img/
│
└── database/
    └── find_found_telang.sql   # File SQL untuk import
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

## 🌿 Struktur Branch

| Branch | Fungsi |
|--------|--------|
| `main` | Versi final/production |
| `dev` | Integrasi semua fitur |
| `feat/frontend` | Pengembangan tampilan (tim frontend) |
| `feat/backend` | Pengembangan logika & database (tim backend) |

### Alur Kerja Git
```bash
# Sebelum mulai kerja, selalu pull dulu
git pull origin feat/frontend   # atau feat/backend

# Setelah selesai coding
git add .
git commit -m "feat: deskripsi singkat perubahan"
git push origin feat/frontend   # atau feat/backend
```

### Konvensi Commit Message
| Prefix | Digunakan untuk |
|--------|----------------|
| `feat:` | Fitur baru |
| `fix:` | Perbaikan bug |
| `style:` | Perubahan CSS/tampilan |
| `db:` | Perubahan database |
| `docs:` | Update dokumentasi |

---

## ✅ Fitur

- [x] Struktur MVC native PHP
- [ ] Autentikasi (Login & Register)
- [ ] Lapor barang hilang
- [ ] Lapor barang ditemukan
- [ ] Pencarian barang
- [ ] Detail barang
- [ ] Upload foto barang
- [ ] Dashboard admin

---

## 📄 Lisensi

Project ini dibuat untuk keperluan tugas kuliah. © 2025 Tim Find & Found Telang.
