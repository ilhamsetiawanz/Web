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
                'name' => 'Test Petani',
                'email' => 'petani@example.com',
                'password' => Hash::make('password123'), 
                'role' => 'user',
            ]
        ]);

        DataGejala::insert([
        ["name" => "Daun menguning"],
        ["name" => "Batang membusuk"],
        ["name" => "Pucatnya tulang-tulang daun bagian atas"],
        ["name" => "Terkulainya tangkai daun"],
        ["name" => "Tanaman menjadi layu"],
        ["name" => "Tanaman mati"],
        ["name" => "Bercak coklat pada jaringan pembuluh batang"],
        ["name" => "Bercak coklat pada pembuluh akar"],
        ["name" => "Warna buah cabai menjadi kekuningan dan busuk"],
        ["name" => "Bagian bawah daun layu"],
        ["name" => "Tulang daun berwarna kuning"],
        ["name" => "Bercak pada daun berwarna pucat sampai putih"],
        ["name" => "Tanaman tumbuh kerdil"],
        ["name" => "Bercak coklat kehitaman pada buah"],
        ["name" => "Daun gugur"],
        ["name" => "Bercak kecil bulat yang kering pada daun"],
        ["name" => "Daun berlubang akibat bercak"],
        ["name" => "Tangkai daun berwarna kuning"],
        ["name" => "Pangkal batang berwarna coklat"],
        ["name" => "Busuk di bagian pangkal batang"],
        ["name" => "Ranting atau tangkai berwarna coklat kehitaman"],
        ["name" => "Spora cendawan berwarna kelabu terlihat"],
        ["name" => "Bercak kecoklatan pada daun"],
        ["name" => "Bercak putih yang dikelilingi warna coklat kehitaman pada buah"],
        ["name" => "Buah gugur"],
        ["name" => "Penggumpalan pada daun"],
        ["name" => "Daun kecil"],
        ["name" => "Buah kecil dan tidak normal"],
        ["name" => "Pertumbuhan terlambat"],
        ["name" => "Kekeringan pada daun"],
        ["name" => "Daun menggulung ke arah atas atau bawah, sering keriput atau melengkung"],
        ["name" => "Penurunan kualitas buah"],
        ["name" => "Lesi pada batang dan cabang"],
        ["name" => "Daun menghitam"],
        ["name" => "Bercak pada buah"],
        ["name" => "Bentuk buah yang tidak normal"],
        ["name" => "Daun kering"],
        ["name" => "Kehilangan kualitas buah"],
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
            // Kaidah untuk Penyakit 1
            [
                'KdPenyakit' => 1,
                'KdGejala' => 1,
                'next_first_gejala_id' => 5,
            ],
            [
                'KdPenyakit' => 1,
                'KdGejala' => 2,
                'next_first_gejala_id' => 5,
            ],
            [
                'KdPenyakit' => 1,
                'KdGejala' => 3,
                'next_first_gejala_id' => 5,
            ],
            [
                'KdPenyakit' => 1,
                'KdGejala' => 4,
                'next_first_gejala_id' => 5,
            ],
            [
                'KdPenyakit' => 1,
                'KdGejala' => 5,
                'next_first_gejala_id' => 6,
            ],
        
            // Kaidah untuk Penyakit 2
            // [
            //     'KdPenyakit' => 2,
            //     'KdGejala' => 5,
            //     'next_first_gejala_id' => 9,
            // ],
            [
                'KdPenyakit' => 2,
                'KdGejala' => 6,
                'next_first_gejala_id' => 9,
            ],
            [
                'KdPenyakit' => 2,
                'KdGejala' => 7,
                'next_first_gejala_id' => 9,
            ],
            [
                'KdPenyakit' => 2,
                'KdGejala' => 8,
                'next_first_gejala_id' => 9,
            ],
            // [
            //     'KdPenyakit' => 2,
            //     'KdGejala' => 9,
            //     'next_first_gejala_id' => 10,
            // ],
        
            // Kaidah untuk Penyakit 3
            [
                'KdPenyakit' => 3,
                'KdGejala' => 10,
                'next_first_gejala_id' => 15,
            ],
            [
                'KdPenyakit' => 3,
                'KdGejala' => 11,
                'next_first_gejala_id' => 15,
            ],
            [
                'KdPenyakit' => 3,
                'KdGejala' => 12,
                'next_first_gejala_id' => 15,
            ],
            [
                'KdPenyakit' => 3,
                'KdGejala' => 13,
                'next_first_gejala_id' => 15,
            ],
            [
                'KdPenyakit' => 3,
                'KdGejala' => 14,
                'next_first_gejala_id' => 15,
            ],
        
            // Kaidah untuk Penyakit 4
            // [
            //     'KdPenyakit' => 4,
            //     'KdGejala' => 1,
            //     'next_first_gejala_id' => 18,
            // ],
            [
                'KdPenyakit' => 4,
                'KdGejala' => 15,
                'next_first_gejala_id' => 19,
            ],
            [
                'KdPenyakit' => 4,
                'KdGejala' => 16,
                'next_first_gejala_id' => 19,
            ],
            [
                'KdPenyakit' => 4,
                'KdGejala' => 17,
                'next_first_gejala_id' => 19,
            ],
            [
                'KdPenyakit' => 4,
                'KdGejala' => 18,
                'next_first_gejala_id' => 19,
            ],
        
            // Kaidah untuk Penyakit 5
            // [
            //     'KdPenyakit' => 5,
            //     'KdGejala' => 5,
            //     'next_first_gejala_id' => 20,
            // ],
            [
                'KdPenyakit' => 5,
                'KdGejala' => 19,
                'next_first_gejala_id' => 20,
            ],
            [
                'KdPenyakit' => 5,
                'KdGejala' => 20,
                'next_first_gejala_id' => 21,
            ],
        
            // Kaidah untuk Penyakit 6
            // [
            //     'KdPenyakit' => 6,
            //     'KdGejala' => 20,
            //     'next_first_gejala_id' => 22,
            // ],
            [
                'KdPenyakit' => 6,
                'KdGejala' => 21,
                'next_first_gejala_id' => 23,
            ],
            [
                'KdPenyakit' => 6,
                'KdGejala' => 22,
                'next_first_gejala_id' => 23,
            ],
        
            // Kaidah untuk Penyakit 7
            // [
            //     'KdPenyakit' => 7,
            //     'KdGejala' => 15,
            //     'next_first_gejala_id' => 25,
            // ],
            [
                'KdPenyakit' => 7,
                'KdGejala' => 23,
                'next_first_gejala_id' => 25,
            ],
            [
                'KdPenyakit' => 7,
                'KdGejala' => 24,
                'next_first_gejala_id' => 25,
            ],
            [
                'KdPenyakit' => 7,
                'KdGejala' => 25,
                'next_first_gejala_id' => 26,
            ],
        
            // Kaidah untuk Penyakit 8
            // [
            //     'KdPenyakit' => 8,
            //     'KdGejala' => 1,
            //     'next_first_gejala_id' => 30,
            // ],
            [
                'KdPenyakit' => 8,
                'KdGejala' => 26,
                'next_first_gejala_id' => 30,
            ],
            [
                'KdPenyakit' => 8,
                'KdGejala' => 27,
                'next_first_gejala_id' => 30,
            ],
            [
                'KdPenyakit' => 8,
                'KdGejala' => 28,
                'next_first_gejala_id' => 30,
            ],
            [
                'KdPenyakit' => 8,
                'KdGejala' => 29,
                'next_first_gejala_id' => 30,
            ],
            [
                'KdPenyakit' => 8,
                'KdGejala' => 30,
                'next_first_gejala_id' => 31,
            ],
        
            // Kaidah untuk Penyakit 9
            // [
            //     'KdPenyakit' => 9,
            //     'KdGejala' => 1,
            //     'next_first_gejala_id' => 32,
            // ],
            // [
            //     'KdPenyakit' => 9,
            //     'KdGejala' => 29,
            //     'next_first_gejala_id' => 32,
            // ],
            [
                'KdPenyakit' => 9,
                'KdGejala' => 31,
                'next_first_gejala_id' => 33,
            ],
            [
                'KdPenyakit' => 9,
                'KdGejala' => 32,
                'next_first_gejala_id' => 33,
            ],
        
            // Kaidah untuk Penyakit 10
            // [
            //     'KdPenyakit' => 10,
            //     'KdGejala' => 16,
            //     'next_first_gejala_id' => 34,
            // ],
            // [
            //     'KdPenyakit' => 10,
            //     'KdGejala' => 27,
            //     'next_first_gejala_id' => 34,
            // ],
            // [
            //     'KdPenyakit' => 10,
            //     'KdGejala' => 28,
            //     'next_first_gejala_id' => 34,
            // ],
            [
                'KdPenyakit' => 10,
                'KdGejala' => 33,
                'next_first_gejala_id' => 37,
            ],
            [
                'KdPenyakit' => 10,
                'KdGejala' => 34,
                'next_first_gejala_id' => 37,
            ],
            [
                'KdPenyakit' => 10,
                'KdGejala' => 37,
                'next_first_gejala_id' => null,
            ],
        ]);
        
        
        
        
        
        
        
    }
}
