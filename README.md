# Praktikum 11: PHP OOP Lanjutan - Framework Modular

**Nama:** Sayyid Sulthan Abyan

**NIM:** 312410496

**Kelas:** TI 24 A5

## Tujuan Praktikum
1. Memahami konsep dasar Framework Modular
2. Memahami konsep dasar routing
3. Membuat Framework sederhana menggunakan PHP OOP

## Struktur Folder Project

```
lab11_php_oop/
├── .htaccess
├── config.php
├── index.php
├── class/
│   ├── Database.php
│   └── Form.php
├── module/
│   ├── home/
│   │   └── index.php
│   └── artikel/
│       ├── index.php
│       ├── tambah.php
│       └── ubah.php
└── template/
    ├── header.php
    └── footer.php
```

## Langkah-langkah Praktikum

### 1. Persiapan Database

Buat database dan tabel menggunakan query SQL berikut:

```sql
CREATE DATABASE IF NOT EXISTS latihan_oop;
USE latihan_oop;

CREATE TABLE IF NOT EXISTS artikel (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255) NOT NULL,
    isi TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

![Screenshot tabel](Screenshot/database.png)

### 2. Konfigurasi Database (config.php)

File ini berisi konfigurasi koneksi database.

```php
<?php
$config = [
    'host' => 'localhost',
    'username' => 'root',
    'password' => '',
    'db_name' => 'latihan_oop'
];
?>
```

### 3. Class Database (class/Database.php)

Class ini menangani operasi database (CRUD - Create, Read, Update, Delete).

**Fitur:**
- `query()` - Menjalankan query SQL
- `get()` - Mengambil satu data
- `insert()` - Menambah data
- `update()` - Mengubah data
- `delete()` - Menghapus data


### 4. Class Form (class/Form.php)

Class ini untuk membuat form input dinamis dengan berbagai tipe input.

**Tipe Input yang Didukung:**
- Text

### 5. File .htaccess

File ini mengatur URL rewriting agar routing dapat berfungsi.

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteBase /lab11_php_oop/
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^(.*)$ index.php/$1 [L]
</IfModule>
```


### 6. Routing System (index.php)

File ini adalah gerbang utama yang menangani routing ke modul-modul.

**Cara Kerja Routing:**
- URL: `http://localhost/lab11_php_oop/artikel/index`
- Module: `artikel`
- Page: `index`
- File: `module/artikel/index.php`


### 7. Template System

#### template/header.php
Berisi header HTML, CSS, dan navigasi.


#### template/footer.php
Berisi penutup HTML dan footer.


### 8. Module Home

#### module/home/index.php
Halaman utama/beranda aplikasi.


### 9. Module Artikel

#### module/artikel/index.php
Menampilkan daftar artikel dari database.

**Fitur:**
- Menampilkan semua artikel dalam tabel
- Tombol tambah artikel
- Tombol edit dan hapus per artikel


#### module/artikel/tambah.php
Form untuk menambah artikel baru.


#### module/artikel/ubah.php
Form untuk mengubah artikel yang sudah ada.


## Konsep yang Dipelajari

### 1. Framework Modular
Framework modular adalah arsitektur aplikasi di mana setiap fitur dipisahkan ke dalam modul-modul independen. Keuntungannya:
- Kode lebih terorganisir
- Mudah dikembangkan (scalable)
- Mudah dipelihara (maintainable)
- Dapat digunakan kembali (reusable)

### 2. Routing
Routing adalah mekanisme untuk mengarahkan URL ke controller/file yang sesuai.

**Contoh:**
```
URL: /lab11_php_oop/artikel/tambah
├── Module: artikel
└── Page: tambah
    └── File: module/artikel/tambah.php
```

### 3. URL Rewriting
Menggunakan `.htaccess` untuk membuat URL yang lebih bersih dan SEO-friendly.

**Sebelum:** `index.php?mod=artikel&page=tambah`  
**Sesudah:** `/artikel/tambah`

### 4. Template System
Memisahkan bagian layout (header, footer) dari konten untuk menghindari duplikasi kode.

## Hasil Output

### 1. Halaman Home
![Screenshot tabel](Screenshot/home.png)

### 2. Halaman Daftar Artikel
![Screenshot tabel](Screenshot/artikel.png)

### 3. Halaman Tambah Artikel
![Screenshot tabel](Screenshot/tambah.png)

### 4. Halaman Edit
![Screenshot tabel](Screenshot/edit.png)

### 5. Halaman Hapus
![Screenshot tabel](Screenshot/hapus.png)

## Cara Menjalankan Project

1. Pastikan XAMPP sudah terinstall dan Apache + MySQL aktif
2. Copy folder `lab11_php_oop` ke `C:\xampp\htdocs\`
3. Import database menggunakan file `database.sql`
4. Sesuaikan konfigurasi di `config.php`
5. Buka browser dan akses: `http://localhost/lab11_php_oop/`

## Testing

### Test Routing
- ✓ Home: `http://localhost/lab11_php_oop/home/index`
- ✓ Artikel: `http://localhost/lab11_php_oop/artikel/index`
- ✓ Tambah: `http://localhost/lab11_php_oop/artikel/tambah`

### Test CRUD Operations
- ✓ Create: Tambah artikel baru
- ✓ Read: Tampilkan daftar artikel
- ✓ Update: Edit artikel
- ✓ Delete: Hapus artikel

## Kesimpulan

Dari praktikum ini, saya telah mempelajari:
1. Cara membuat framework modular sederhana menggunakan PHP OOP
2. Implementasi routing untuk membuat URL yang lebih bersih
3. Penggunaan class Database untuk operasi CRUD
4. Penggunaan class Form untuk membuat form dinamis
5. Pemisahan tampilan menggunakan template system

Framework ini dapat dikembangkan lebih lanjut dengan menambahkan:
- Authentication system
- Validation
- Middleware
- Error handling yang lebih baik
- Dan fitur-fitur lainnya

## Referensi
- Modul Praktikum Pemrograman Web - Universitas Pelita Bangsa
- PHP Manual: https://www.php.net/manual/en/
- PHP OOP Tutorial

---

# Praktikum 12: PHP OOP – Authentication & Session

## Tujuan Praktikum
Praktikum 12 bertujuan untuk:
1. Memahami konsep autentikasi pengguna (login dan logout)
2. Mengimplementasikan session pada aplikasi PHP OOP
3. Membatasi akses halaman menggunakan session
4. Mengintegrasikan sistem login ke framework modular
5. Meningkatkan keamanan aplikasi web

---

## Struktur Folder Tambahan
```pgsql
lab11_php_oop/
├── module/
│   └── user/
│       ├── login.php
│       ├── logout.php
│       └── profile.php
└── database/
    └── users.sql

```

---

## Langkah-langkah Praktikum 12
### 1. Menambahkan Tabel Users

Tabel users digunakan untuk menyimpan data akun pengguna yang dapat login ke sistem.
```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    username VARCHAR(50),
    password VARCHAR(255)
);
```
Password disimpan dalam bentuk hash untuk meningkatkan keamanan data.

---

### 2. Halaman Login (module/user/login.php)

Halaman login berfungsi sebagai gerbang autentikasi pengguna.

**Fitur:**
- Input username dan password
- Verifikasi password menggunakan password_verify()
- Pembuatan session setelah login berhasil
- Menampilkan pesan error jika login gagal
- Fitur show/hide password untuk kenyamanan pengguna

**Alur Login:**
- User mengisi username dan password
- Sistem mengambil data user dari database
- Password diverifikasi
- Jika valid → session dibuat
- User diarahkan ke halaman artikel

---

### 3. Penggunaan Session

Session digunakan untuk menandai status login pengguna.
```php
$_SESSION['is_login'] = true;
$_SESSION['username'] = $user['username'];
$_SESSION['nama'] = $user['nama'];
```

Session ini akan digunakan oleh sistem untuk menentukan apakah pengguna memiliki hak akses ke halaman tertentu.

---

### 4. Proteksi Halaman

Halaman tertentu seperti artikel dan profil tidak dapat diakses tanpa login.
```php
if (!isset($_SESSION['is_login'])) {
    header("Location: /user/login");
    exit;
}
```

Jika user belum login, sistem akan otomatis mengarahkan ke halaman login.

---

### 5. Halaman Profil (`module/user/profile.php`)

Halaman profil menampilkan informasi akun pengguna dan menyediakan fitur untuk mengganti password.

**Fitur:**
- Menampilkan nama dan username
- Mengubah password
- Proteksi akses menggunakan session

---

6. Logout (module/user/logout.php)

Logout dilakukan dengan menghapus session pengguna.
```php
session_destroy();
header("Location: /user/login");
exit;
```

Setelah logout, user tidak dapat mengakses halaman sistem tanpa login ulang.

---

## Konsep yang Dipelajari pada Praktikum 12
### 1. Authentication

Authentication adalah proses validasi identitas pengguna sebelum diberikan akses ke sistem.

---

### 2. Session Management

Session digunakan untuk:
- Menyimpan status login
- Mengamankan halaman
- Mengelola hak akses pengguna

---

### 3. Password Hashing

Password tidak disimpan dalam bentuk teks asli, melainkan di-hash menggunakan fungsi bawaan PHP untuk meningkatkan keamanan.

---

### 4. Integrasi dengan Framework Modular

Sistem login diintegrasikan ke framework modular yang telah dibuat pada Praktikum 11, sehingga:
- Struktur aplikasi tetap rapi
- Mudah dikembangkan
- Konsisten dengan arsitektur modular

---

## Hasil Output Praktikum 12
### 1. Halaman Login

Menampilkan form login dengan desain modern dan fitur show/hide password.

### 2. Login Berhasil

User diarahkan ke halaman daftar artikel setelah login berhasil.

### 3. Proteksi Halaman

Akses langsung ke halaman artikel tanpa login akan diarahkan ke halaman login.

### 4. Halaman Profil

Menampilkan data user dan fitur ubah password.

### 5. Logout

Session berhasil dihapus dan user diarahkan ke halaman login.

---

**Universitas Pelita Bangsa - 2025**
