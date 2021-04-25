# Aplikasi Pembayaran SPP

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>
------

Aplikasi Pembayaran SPP Sekolah adalah aplikasi yang digunakan untuk kepentingan pembayaran uang SPP dan kegiatan siswa bagi sekolah-sekolah baik negeri maupun swasta.

Aplikasi Pembayaran SPP Sekolah menggunakan platform dasar web, sehingga mempermudah akses bagi pihak sekolah dalam menginput, mengolah dan menampilkan pelaporan keuangan SPP dan kegiatannya.

Adapun fiturnya sebagai berikut:

1. Mengelola data petugas dan admin
2. Mengelola data kelas dan siswa
3. Mengelola SPP dan Pembayaran
4. Pembayaran dilakukan sesuai dengan SPP berjalan dan bulan tahun masuk keluar/tamat siswa
5. Membuat Pelaporan Pembayaran SPP

## Requirements

1. PHP version 7.3+
2. PHP MySQL
3. Composer

## How can I Support dev?

- Memberi bintang repo kami ⭐

## Installation

Saya menyarankan anda menggunakan git.

Clone/Download repo ini.

Gunakan Terminal/Command Line lalu masuk ke folder repo.

```powershell
composer install
```

Copy .env.example menjadi .env, sesuaikan isi dari .env tersebut. Jalankan MySQL,

```powershell
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

Sekarang kita bisa login yang terdiri dari beberapa role user yaitu:

| Role         | Admin           |
| ------------ | --------------- |
| **Email**    | admin@gmail.com |
| **Password** | secret123       |

Anda bisa mengunjungi link demo [disini](http://spp-azim.herokuapp.com/home) login menggunakan email password di atas.

**Mohon untuk tidak mengubah password dan meghapus data pengguna di atas.**