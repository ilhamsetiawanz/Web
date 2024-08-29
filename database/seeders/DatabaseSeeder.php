<?php

namespace Database\Seeders;

use App\Models\Artikel;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Artikel::insert([
            [
                'id' => (string) Str::uuid(),
                'judul' => 'Cara Menanam Cabai Di Lahan Yang Sempit',
                'image' => "https://www.kampustani.com/wp-content/uploads/2018/10/Cara-Budidaya-Cabai-Di-Polybag.jpg",
                'status' => "Published",
                'Tanggal_Post' => date(now()),
                'content' => "Menanam cabai di lahan sempit bisa dilakukan dengan memanfaatkan polybag atau pot. Cabai membutuhkan sinar matahari cukup, sehingga letakkan di area yang terang. Media tanamnya terdiri dari campuran tanah, pupuk kandang, dan sekam. Penyiraman dilakukan rutin, tapi jangan sampai air menggenang. Hasil panen bisa dipetik setelah tanaman berusia 3-4 bulan.",
            ],
            [
                'id' => (string) Str::uuid(),
                'judul' => 'Cara Mengatasi Hama Pada Tanaman Cabai',
                'image' => "https://www.agrowindo.com/wp-content/uploads/2020/08/hama-cabai.jpg",
                'status' => "Published",
                'Tanggal_Post' => date(now()),
                'content' => "Hama seperti kutu daun, thrips, dan ulat sering menyerang tanaman cabai. Untuk mengatasinya, gunakan pestisida organik seperti campuran bawang putih dan sabun cuci. Selain itu, jaga kebersihan lahan dan jangan biarkan gulma tumbuh. Pemangkasan daun yang terinfeksi juga penting untuk mencegah penyebaran hama.",
            ],
            [
                'id' => (string) Str::uuid(),
                'judul' => 'Manfaat Cabai Bagi Kesehatan',
                'image' => "https://cdn.medcom.id/dynamic/content/2020/09/17/1196321/GkCVYymDrP.jpg",
                'status' => "Published",
                'Tanggal_Post' => date(now()),
                'content' => "Cabai kaya akan vitamin C dan capsaicin, senyawa yang memberikan sensasi pedas dan memiliki efek antiinflamasi. Mengonsumsi cabai dapat membantu meningkatkan metabolisme, mengurangi risiko penyakit jantung, dan memperkuat sistem imun. Namun, konsumsi berlebihan bisa memicu gangguan pencernaan, jadi tetaplah dalam jumlah yang moderat.",
            ]
        ]);
        
    }
}
