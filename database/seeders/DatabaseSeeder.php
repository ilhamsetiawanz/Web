<?php

namespace Database\Seeders;

use App\Models\Artikel;
use App\Models\DataGejala;
use App\Models\DataPenyakit;
use App\Models\Rule;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::insert([
            [
                'name' => 'Test Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password123'), 
                'role' => 'admin',
            ],
            [
                'name' => 'harma1234',
                'email' => 'harm@example.com',
                'password' => Hash::make('password123'), 
                'role' => 'user',
            ]
        ]);

        DataGejala::insert([
            ["name" => "Daun menguning", "jenis_gejala" => "Daun"],
            ["name" => "Batang membusuk", "jenis_gejala" => "Batang"],
            ["name" => "Pucatnya tulang-tulang daun bagian atas", "jenis_gejala" => "Daun"],
            ["name" => "Terkulainya tangkai daun", "jenis_gejala" => "Daun"],
            ["name" => "Tanaman menjadi layu", "jenis_gejala" => "Lainnya"],
            ["name" => "Tanaman mati", "jenis_gejala" => "Lainnya"],
            ["name" => "Bercak coklat pada jaringan pembuluh batang", "jenis_gejala" => "Batang"],
            ["name" => "Bercak coklat pada pembuluh akar", "jenis_gejala" => "Akar"],
            ["name" => "Warna buah cabai menjadi kekuningan dan busuk", "jenis_gejala" => "Buah"],
            ["name" => "Bagian bawah daun layu", "jenis_gejala" => "Daun"],
            ["name" => "Tulang daun berwarna kuning", "jenis_gejala" => "Daun"],
            ["name" => "Bercak pada daun berwarna pucat sampai putih", "jenis_gejala" => "Daun"],
            ["name" => "Tanaman tumbuh kerdil", "jenis_gejala" => "Lainnya"],
            ["name" => "Bercak coklat kehitaman pada buah", "jenis_gejala" => "Buah"],
            ["name" => "Daun gugur", "jenis_gejala" => "Daun"],
            ["name" => "Bercak kecil bulat yang kering pada daun", "jenis_gejala" => "Daun"],
            ["name" => "Daun berlubang akibat bercak", "jenis_gejala" => "Daun"],
            ["name" => "Tangkai daun berwarna kuning", "jenis_gejala" => "Daun"],
            ["name" => "Pangkal batang berwarna coklat", "jenis_gejala" => "Batang"],
            ["name" => "Busuk di bagian pangkal batang", "jenis_gejala" => "Batang"],
            ["name" => "Ranting atau tangkai berwarna coklat kehitaman", "jenis_gejala" => "Batang"],
            ["name" => "Spora cendawan berwarna kelabu terlihat", "jenis_gejala" => "Lainnya"],
            ["name" => "Bercak kecoklatan pada daun", "jenis_gejala" => "Daun"],
            ["name" => "Bercak putih yang dikelilingi warna coklat kehitaman pada buah", "jenis_gejala" => "Buah"],
            ["name" => "Buah gugur", "jenis_gejala" => "Buah"],
            ["name" => "Penggumpalan pada daun", "jenis_gejala" => "Daun"],
            ["name" => "Daun kecil", "jenis_gejala" => "Daun"],
            ["name" => "Buah kecil dan tidak normal", "jenis_gejala" => "Buah"],
            ["name" => "Pertumbuhan terlambat", "jenis_gejala" => "Lainnya"],
            ["name" => "Kekeringan pada daun", "jenis_gejala" => "Daun"],
            ["name" => "Daun menggulung ke arah atas atau bawah, sering keriput atau melengkung", "jenis_gejala" => "Daun"],
            ["name" => "Penurunan kualitas buah", "jenis_gejala" => "Buah"],
            ["name" => "Lesi pada batang dan cabang", "jenis_gejala" => "Batang"],
            ["name" => "Daun menghitam", "jenis_gejala" => "Daun"],
            ["name" => "Bercak pada buah", "jenis_gejala" => "Buah"],
            ["name" => "Bentuk buah yang tidak normal", "jenis_gejala" => "Buah"],
            ["name" => "Daun kering", "jenis_gejala" => "Daun"],
            ["name" => "Kehilangan kualitas buah", "jenis_gejala" => "Buah"],
        ]);


        DataPenyakit::insert([
            ["KdPenyakit" => "P1", "NamaPenyakit" => "Layu Fusarium", "reason" => "Jamur Fusarium oxysporum. Jamur ini menyerang tanaman melalui akar dan menyebar melalui sistem pembuluh tanaman, menyebabkan penyumbatan yang mengakibatkan tanaman layu."],
            ["KdPenyakit" => "P2", "NamaPenyakit" => "Layu Bakteri", "reason" => "Bakteri Ralstonia solanacearum. Bakteri ini menginfeksi tanaman melalui akar atau luka pada batang, lalu menyebar melalui jaringan pembuluh tanaman, menyebabkan layu secara cepat."],
            ["KdPenyakit" => "P3", "NamaPenyakit" => "Busuk Buah", "reason" => "Jamur Phytophthora capsici atau Colletotrichum spp. Jamur ini menyerang bagian buah yang basah atau terluka, terutama pada kondisi kelembaban tinggi dan ventilasi buruk."],
            ["KdPenyakit" => "P4", "NamaPenyakit" => "Bercak Daun", "reason" => "Jamur Cercospora capsici atau Alternaria solani. Penyakit ini menyebar melalui spora yang terbawa angin, air, atau serangga, dan dapat menginfeksi daun terutama pada kondisi lembap."],
            ["KdPenyakit" => "P5", "NamaPenyakit" => "Rebah Batang/Semi", "reason" => "Jamur Pythium spp. atau Rhizoctonia solani. Jamur ini menyerang bagian pangkal batang dekat permukaan tanah, terutama pada tanah yang terlalu basah dan sirkulasi udara yang buruk."],
            ["KdPenyakit" => "P6", "NamaPenyakit" => "Busuk Kuncup", "reason" => "Jamur Botrytis cinerea. Jamur ini menginfeksi kuncup, ranting, atau bunga pada kondisi kelembaban tinggi, terutama jika ventilasi buruk dan terdapat luka pada tanaman."],
            ["KdPenyakit" => "P7", "NamaPenyakit" => "Bercak Bakteri", "reason" => "Bakteri Xanthomonas campestris pv. vesicatoria. Bakteri ini masuk melalui luka kecil atau stomata pada daun, biasanya menyebar melalui air hujan atau alat pertanian yang terkontaminasi."],
            ["KdPenyakit" => "P8", "NamaPenyakit" => "Virus Kuning", "reason" => "Tomato Yellow Leaf Curl Virus (TYLCV) atau virus lain yang ditularkan oleh serangga vektor seperti kutu kebul (Bemisia tabaci). Virus ini menyebabkan daun menguning, penggumpalan, dan pertumbuhan tanaman terhambat."],
            ["KdPenyakit" => "P9", "NamaPenyakit" => "Virus Keriting", "reason" => "Pepper yellow leaf curl virus atau virus lainnya yang disebarkan oleh kutu daun (Myzus persicae) atau kutu kebul (Bemisia tabaci). Virus ini menyebabkan daun menjadi keriting, pertumbuhan terhambat, dan penurunan kualitas buah."],
            ["KdPenyakit" => "P10", "NamaPenyakit" => "Antraknosa", "reason" => "Jamur Colletotrichum spp. Jamur ini menyerang buah, batang, dan daun, terutama pada kondisi cuaca hangat dan lembab, menyebar melalui air hujan, alat pertanian, atau sisa tanaman yang terinfeksi."]
        ]);

        Rule::insert([
            // Penyakit 1
            ['KdPenyakit' => 1, 'KdGejala' => 1],
            ['KdPenyakit' => 1, 'KdGejala' => 2],
            ['KdPenyakit' => 1, 'KdGejala' => 3],
            ['KdPenyakit' => 1, 'KdGejala' => 4],
            ['KdPenyakit' => 1, 'KdGejala' => 5],
            
            // Penyakit 2
            ['KdPenyakit' => 2, 'KdGejala' => 5],
            ['KdPenyakit' => 2, 'KdGejala' => 6],
            ['KdPenyakit' => 2, 'KdGejala' => 7],
            ['KdPenyakit' => 2, 'KdGejala' => 8],
            ['KdPenyakit' => 2, 'KdGejala' => 9],
            
            // Penyakit 3
            ['KdPenyakit' => 3, 'KdGejala' => 10],
            ['KdPenyakit' => 3, 'KdGejala' => 11],
            ['KdPenyakit' => 3, 'KdGejala' => 12],
            ['KdPenyakit' => 3, 'KdGejala' => 13],
            ['KdPenyakit' => 3, 'KdGejala' => 14],
            
            // Penyakit 4
            ['KdPenyakit' => 4, 'KdGejala' => 1],
            ['KdPenyakit' => 4, 'KdGejala' => 15],
            ['KdPenyakit' => 4, 'KdGejala' => 16],
            ['KdPenyakit' => 4, 'KdGejala' => 17],
            ['KdPenyakit' => 4, 'KdGejala' => 18],
            
            // Penyakit 5
            ['KdPenyakit' => 5, 'KdGejala' => 5],
            ['KdPenyakit' => 5, 'KdGejala' => 19],
            ['KdPenyakit' => 5, 'KdGejala' => 20],
            
            // Penyakit 6
            ['KdPenyakit' => 6, 'KdGejala' => 20],
            ['KdPenyakit' => 6, 'KdGejala' => 21],
            ['KdPenyakit' => 6, 'KdGejala' => 22],
            
            // Penyakit 7
            ['KdPenyakit' => 7, 'KdGejala' => 15],
            ['KdPenyakit' => 7, 'KdGejala' => 23],
            ['KdPenyakit' => 7, 'KdGejala' => 24],
            ['KdPenyakit' => 7, 'KdGejala' => 25],
            
            // Penyakit 8
            ['KdPenyakit' => 8, 'KdGejala' => 1],
            ['KdPenyakit' => 8, 'KdGejala' => 26],
            ['KdPenyakit' => 8, 'KdGejala' => 27],
            ['KdPenyakit' => 8, 'KdGejala' => 28],
            ['KdPenyakit' => 8, 'KdGejala' => 29],
            ['KdPenyakit' => 8, 'KdGejala' => 30],
            
            // Penyakit 9
            ['KdPenyakit' => 9, 'KdGejala' => 1],
            ['KdPenyakit' => 9, 'KdGejala' => 29],
            ['KdPenyakit' => 9, 'KdGejala' => 31],
            ['KdPenyakit' => 9, 'KdGejala' => 32],
            
            // Penyakit 10
            ['KdPenyakit' => 10, 'KdGejala' => 16],
            ['KdPenyakit' => 10, 'KdGejala' => 27],
            ['KdPenyakit' => 10, 'KdGejala' => 28],
            ['KdPenyakit' => 10, 'KdGejala' => 33],
            ['KdPenyakit' => 10, 'KdGejala' => 34],
            ['KdPenyakit' => 10, 'KdGejala' => 37],
        ]);
    }
}
