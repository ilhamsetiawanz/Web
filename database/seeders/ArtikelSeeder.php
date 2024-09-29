<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artikel;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $judul_artikel = [
            'Tips Menanam Cabai di Rumah untuk Pemula',
            '5 Jenis Cabai Terpopuler di Indonesia',
            'Manfaat Kesehatan dari Konsumsi Cabai',
            'Cara Merawat Tanaman Cabai Agar Cepat Berbuah',
            'Mengatasi Hama pada Tanaman Cabai Secara Alami',
            'Keunikan Cabai Rawit: Si Kecil yang Punya Rasa Pedas Ekstrem',
            'Pentingnya Pemilihan Media Tanam untuk Tanaman Cabai',
            'Cabai Keriting: Pilihan Favorit untuk Sambal Nusantara',
            'Panduan Menanam Cabai di Pot untuk Lahan Sempit',
            'Mengenal Proses Pemanenan Cabai yang Tepat'
        ];

        foreach ($judul_artikel as $judul) {
            Artikel::create([
                'judul' => $judul,
                'slug' => Str::slug($judul),
                'image' => $faker->imageUrl(640, 480, 'vegetables', true, 'cabai'), // Gambar random dari faker
                'content' => $faker->paragraph(10), // Isi artikel random
                'Tanggal_Post' => $faker->dateTimeBetween('-1 years', 'now')
            ]);
        }
    }
}
