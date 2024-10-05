# Sistem Pakar Diagnosa Penyakit Tanaman Cabai

## Daftar Isi
- [Apa itu Sistem Pakar?](#apa-itu-sistem-pakar)
- [Metode Forward Chaining](#metode-forward-chaining)
- [Fitur](#fitur)
- [Teknologi yang Digunakan](#teknologi-yang-digunakan)
- [Persyaratan Sistem](#persyaratan-sistem)
- [Instalasi](#instalasi)
- [Penggunaan](#penggunaan)
- [Kontribusi](#kontribusi)
- [Lisensi](#lisensi)

Sistem Pakar Diagnosa Penyakit Tanaman Cabai adalah aplikasi berbasis web yang menggunakan metode Forward Chaining untuk membantu petani atau penggemar tanaman cabai dalam mendiagnosa penyakit pada tanaman cabai mereka.

## Apa itu Sistem Pakar?

Sistem Pakar adalah sistem komputer yang dirancang untuk meniru kemampuan pemecahan masalah dari seorang pakar manusia. Sistem ini menggunakan pengetahuan yang telah dikodifikasi dari para ahli dalam bidang tertentu untuk memecahkan masalah yang biasanya memerlukan keahlian manusia.

## Metode Forward Chaining

Forward Chaining adalah salah satu metode inferensi dalam sistem pakar. Metode ini bekerja dengan memulai dari sekumpulan fakta yang diketahui, kemudian menurunkan fakta baru berdasarkan aturan yang premisnya cocok dengan fakta yang diketahui. Proses ini berlanjut sampai mencapai goal atau tidak ada aturan lagi yang premisnya cocok dengan fakta yang diketahui atau diturunkan.

Dalam konteks diagnosa penyakit tanaman cabai, sistem akan memulai dari gejala-gejala yang diamati (fakta), kemudian mencocokkannya dengan aturan-aturan yang ada untuk mencapai kesimpulan tentang penyakit yang mungkin menyerang tanaman.

## Fitur

- Diagnosa penyakit tanaman cabai berdasarkan gejala yang dipilih
- Database penyakit dan gejala yang dapat diperbarui
- Hasil diagnosa dengan penjelasan dan saran penanganan
- Interface yang user-friendly

## Teknologi yang Digunakan

- Laravel 11.x
- PHP 8.2+
- MySQL
- Bootstrap 5

## Persyaratan Sistem

- PHP 8.2 atau lebih tinggi
- Composer
- MySQL
- Node.js dan NPM

## Instalasi

1. Clone repositori ini:
   ```
   git clone https://github.com/username/repo-sistem-pakar-cabai.git
   ```

2. Pindah ke direktori proyek:
   ```
   cd repo-sistem-pakar-cabai
   ```

3. Instal dependensi PHP dengan Composer:
   ```
   composer install
   ```

4. Salin file `.env.example` menjadi `.env`:
   ```
   cp .env.example .env
   ```

5. Generate key aplikasi:
   ```
   php artisan key:generate
   ```

6. Konfigurasikan database MySQL Anda di file `.env`.

7. Jalankan migrasi database:
   ```
   php artisan migrate
   ```

8. (Opsional) Jalankan seeder jika tersedia:
   ```
   php artisan db:seed
   ```

9. Instal dependensi frontend:
   ```
   npm install
   ```

10. Compile assets:
    ```
    npm run dev
    ```

11. Jalankan server development:
    ```
    php artisan serve
    ```

Aplikasi sekarang dapat diakses di `http://localhost:8000`.

## Kontribusi

Jika Anda ingin berkontribusi pada proyek ini, silakan buat pull request. Untuk perubahan besar, harap buka issue terlebih dahulu untuk mendiskusikan apa yang ingin Anda ubah.

## Lisensi

DO WHAT THE FUCK YOU WANT TO PUBLIC LICENSE
Version 2, December 2004

Copyright (C) 2004 Sam Hocevar <sam@hocevar.net>

Everyone is permitted to copy and distribute verbatim or modified
copies of this license document, and changing it is allowed as long
as the name is changed.

DO WHAT THE FUCK YOU WANT TO PUBLIC LICENSE
TERMS AND CONDITIONS FOR COPYING, DISTRIBUTION AND MODIFICATION

0. You just DO WHAT THE FUCK YOU WANT TO.
