<?php

namespace Database\Seeders;

use App\Models\Artikel;
use App\Models\DataGejala;
use App\Models\DataPenyakit;
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

        // User::insert([
        //     [
        //         'id' => (string) Str::uuid(),
        //         'name' => 'Test Admin',
        //         'email' => 'admin@example.com',
        //         // 'password' => hash('md5'),
        //         'role' => 'Admin',
        //     ],
        //     [
        //         'id' => (string) Str::uuid(),
        //         'name' => 'Test Petani',
        //         'email' => 'petani@example.com',
        //         'password' => bcrypt('petani123'),
        //         'role' => 'Petani',
        //     ]
        // ]);

        DataGejala::insert([
            ["name" => "Daun tua atau daun muda menguning"],
            ["name" => "Batang membusuk"],
            ["name" => "Pucatnya tulang-tulang daun bagian atas"],
            ["name" => "Terkulainya tangkai daun"],
            ["name" => "Tanaman menjadi layu"],
            ["name" => "Tanaman mati"],
            ["name" => "Bercak coklat pada jaringan pembuluh batang"],
            ["name" => "Bercak coklat pada pembuluh akar"],
            ["name" => "Warna buah cabai menjadi kekuningan dan busuk"],
            ["name" => "Bagian bawah daun layu"],
            ["name" => "Bercak pada daun berwarna pucat sampai putih"],
            ["name" => "Tanaman tumbuh kerdil"],
            ["name" => "Bercak coklat kehitaman pada permukaan buah"],
            ["name" => "Daun yang terinfeksi menguning dan gugur"],
            ["name" => "Bercak kecil bulat pada daun yang mengering"],
            ["name" => "Daun berlubang akibat bercak"],
            ["name" => "Tangkai daun berwarna kuning"],
            ["name" => "Pangkal batang berwarna coklat"],
            ["name" => "Busuk pada pangkal batang"],
            ["name" => "Ranting/tangkai berwarna coklat kehitaman"],
            ["name" => "Spora cendawan berwarna kelabu terlihat"],
            ["name" => "Bercak kecoklatan pada daun"],
            ["name" => "Bercak putih yang dikelilingi warna coklat kehitaman pada buah"],
            ["name" => "Daun berguguran"],
            ["name" => "Buah gugur"],
            ["name" => "Kuning daun"],
            ["name" => "Penggumpalan pada daun"],
            ["name" => "Daun kecil"],
            ["name" => "Buah kecil dan tidak normal"],
            ["name" => "Pertumbuhan terlambat"],
            ["name" => "Kekeringan pada daun"],
            ["name" => "Daun menggulung ke arah atas atau bawah, sering keriput atau melengkung"],
            ["name" => "Penurunan kualitas buah"],
            ["name" => "Lesi pada batang dan cabang"],
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
        
        
        
    }
}
