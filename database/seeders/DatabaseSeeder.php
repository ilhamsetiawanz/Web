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
            ["name" => "Daun Menghitam", "jenis_gejala" => "Daun"],
            ["name" => "Bercak Pada Buah", "jenis_gejala" => "Buah"],
            ["name" => "Bentuk buah yang tidak normal", "jenis_gejala" => "Buah"],
            ["name" => "Daun kering", "jenis_gejala" => "Daun"],
            ["name" => "Kehilangan kualitas buah", "jenis_gejala" => "Buah"],
            ["name" => "Busuk pada buah atau batang muda yang disertai dengan pertumbuhan jamur bulu seperti kapas dengan bintik hitam", "jenis_gejala" => "Lainnya"],
            ["name" => "Jaringan tanaman rusak dan berwarna gelap (cokelat kehitaman)", "jenis_gejala" => "Lainnya"],
            ["name" => "Serangan pada daun yang dapat menyebabkan perubahan warna serta kehancuran jaringan daun", "jenis_gejala" => "Daun"],
            ["name" => "Daun belang dengan warna hijau kekuningan yang tidak beraturan", "jenis_gejala" => "Daun"],
            ["name" => "Daun terpuntir karena berkerut", "jenis_gejala" => "Daun"],
            ["name" => "Mosaik dan belang pada daun", "jenis_gejala" => "Daun"],
            ["name" => "Urat daun yang menonjol (vein clearing)", "jenis_gejala" => "Daun"],
            ["name" => "Daun menggulung atau keriting", "jenis_gejala" => "Daun"],
            ["name" => "Tanaman tumbuh kerdil (stunting)", "jenis_gejala" => "Lainnya"],
            ["name" => "Bercak pada buah cabai", "jenis_gejala" => "Buah"],
            ["name" => "Penurunan kualitas buah", "jenis_gejala" => "Buah"],
            ["name" => "Daun menggulung atau melintir", "jenis_gejala" => "Daun"],
            ["name" => "Kekakuan daun", "jenis_gejala" => "Daun"],
            ["name" => "Pertumbuhan tanaman kerdil", "jenis_gejala" => "Lainnya"],
            ["name" => "Semaian agak kekuningan dengan bintil akar yang tidak bisa lepas walaupun akar diusap lebih keras", "jenis_gejala" => "Akar"],
            ["name" => "Seluruh bagian tanaman terinfeksi, batang busuk basah berwarna hijau kemudian menjadi coklat/hitam", "jenis_gejala" => "Batang"],
            ["name" => "Infeksi pada titik tumbuh, bunga, dan pucuk menyebabkan perubahan warna menjadi coklat, membusuk dan hitam", "jenis_gejala" => "Daun"],
            ["name" => "Kebusukan merambat ke bagian bawah tanaman", "jenis_gejala" => "Lainnya"],
            ["name" => "Bercak pada daun berbentuk sirkular, berukuran kecil dengan bintik putih yang dibatasi oleh pinggiran hitam", "jenis_gejala" => "Daun"],
            ["name" => "Bercak pucat atau kekuningan pada permukaan daun bagian atas", "jenis_gejala" => "Daun"],
            ["name" => "Daun melengkung ke bawah, kerutan-kerutan pada daun", "jenis_gejala" => "Daun"],
            ["name" => "Busuk basah pada buah dimulai dari tangkai dan kelopak buah", "jenis_gejala" => "Buah"],
            ["name" => "Bercak pada buah yang cepat menyebar dan menyebabkan kerusakan pada permukaan", "jenis_gejala" => "Buah"],
        ]);
        
        

        DataPenyakit::insert([
            ["KdPenyakit" => "PC1", "NamaPenyakit" => "Layu Fusarium", "reason" => "Jamur Fusarium oxysporum. Jamur ini menyerang tanaman melalui akar dan menyebar melalui sistem pembuluh tanaman, menyebabkan penyumbatan yang mengakibatkan tanaman layu."],
            ["KdPenyakit" => "PC2", "NamaPenyakit" => "Layu Bakteri", "reason" => "Bakteri Ralstonia solanacearum. Bakteri ini menginfeksi tanaman melalui akar atau luka pada batang, lalu menyebar melalui jaringan pembuluh tanaman, menyebabkan layu secara cepat."],
            ["KdPenyakit" => "PC3", "NamaPenyakit" => "Busuk Buah", "reason" => "Jamur Phytophthora capsici atau Colletotrichum spp. Jamur ini menyerang bagian buah yang basah atau terluka, terutama pada kondisi kelembaban tinggi dan ventilasi buruk."],
            ["KdPenyakit" => "PC4", "NamaPenyakit" => "Bercak Daun", "reason" => "Jamur Cercospora capsici atau Alternaria solani. Penyakit ini menyebar melalui spora yang terbawa angin, air, atau serangga, dan dapat menginfeksi daun terutama pada kondisi lembap."],
            ["KdPenyakit" => "PC5", "NamaPenyakit" => "Rebah Batang/Semi", "reason" => "Jamur Pythium spp. atau Rhizoctonia solani. Jamur ini menyerang bagian pangkal batang dekat permukaan tanah, terutama pada tanah yang terlalu basah dan sirkulasi udara yang buruk."],
            ["KdPenyakit" => "PC6", "NamaPenyakit" => "Busuk Kuncup", "reason" => "Jamur Botrytis cinerea. Jamur ini menginfeksi kuncup, ranting, atau bunga pada kondisi kelembaban tinggi, terutama jika ventilasi buruk dan terdapat luka pada tanaman."],
            ["KdPenyakit" => "PC7", "NamaPenyakit" => "Bercak Bakteri", "reason" => "Bakteri Xanthomonas campestris pv. vesicatoria. Bakteri ini masuk melalui luka kecil atau stomata pada daun, biasanya menyebar melalui air hujan atau alat pertanian yang terkontaminasi."],
            ["KdPenyakit" => "PC8", "NamaPenyakit" => "Virus Kuning", "reason" => "Tomato Yellow Leaf Curl Virus (TYLCV) atau virus lain yang ditularkan oleh serangga vektor seperti kutu kebul (Bemisia tabaci). Virus ini menyebabkan daun menguning, penggumpalan, dan pertumbuhan tanaman terhambat."],
            ["KdPenyakit" => "PC9", "NamaPenyakit" => "Virus Keriting", "reason" => "Pepper yellow leaf curl virus atau virus lainnya yang disebarkan oleh kutu daun (Myzus persicae) atau kutu kebul (Bemisia tabaci). Virus ini menyebabkan daun menjadi keriting, pertumbuhan terhambat, dan penurunan kualitas buah."],
            ["KdPenyakit" => "PC10", "NamaPenyakit" => "Antraknosa", "reason" => "Jamur Colletotrichum spp. Jamur ini menyerang buah, batang, dan daun, terutama pada kondisi cuaca hangat dan lembab, menyebar melalui air hujan, alat pertanian, atau sisa tanaman yang terinfeksi."],
            ["KdPenyakit" => "PC11", "NamaPenyakit" => "Penyakit Sentik", "reason" => "Deskripsi penyebab penyakit belum tersedia."],
            ["KdPenyakit" => "PC12", "NamaPenyakit" => "Virus Mosaik", "reason" => "Virus ini menyebabkan bercak mosaik pada daun, menghambat pertumbuhan, dan menurunkan kualitas hasil panen."],
            ["KdPenyakit" => "PC13", "NamaPenyakit" => "Chilli Veinal Mottle Virus (ChiVMV)", "reason" => "Virus ini menyebabkan daun memiliki garis-garis kuning dan hijau, serta mempengaruhi pertumbuhan tanaman."],
            ["KdPenyakit" => "PC14", "NamaPenyakit" => "Penyakit Virus Kentang Y", "reason" => "Virus ini menyerang tanaman kentang dan tomat, menyebabkan daun menguning dan pertumbuhan kerdil."],
            ["KdPenyakit" => "PC15", "NamaPenyakit" => "Nematoda Bengkak Akar", "reason" => "Nematoda Meloidogyne spp. menyerang akar tanaman, menyebabkan pembengkakan dan menghambat penyerapan nutrisi."],
            ["KdPenyakit" => "PC16", "NamaPenyakit" => "Busuk Daun Phytophthora", "reason" => "Jamur Phytophthora infestans menyerang daun, menyebabkan busuk dan bercak hitam yang meluas."],
            ["KdPenyakit" => "PC17", "NamaPenyakit" => "Busuk Daun Choanephora", "reason" => "Jamur Choanephora cucurbitarum menyebabkan pembusukan pada daun dan buah muda, terutama di musim hujan."],
            ["KdPenyakit" => "PC18", "NamaPenyakit" => "Bercak Kelabu Stemphylium", "reason" => "Jamur Stemphylium spp. menyebabkan bercak kelabu pada daun, terutama pada cuaca lembab."],
            ["KdPenyakit" => "PC19", "NamaPenyakit" => "Embun Tepung", "reason" => "Jamur Erysiphe spp. atau Oidium spp. menyebabkan lapisan putih seperti tepung pada daun, mempengaruhi fotosintesis."],
            ["KdPenyakit" => "PC20", "NamaPenyakit" => "Kerupuk", "reason" => "Deskripsi penyebab penyakit belum tersedia."],
            ["KdPenyakit" => "PC21", "NamaPenyakit" => "Busuk Basah Bakteri", "reason" => "Bakteri Erwinia spp. menyerang bagian tanaman yang basah, menyebabkan pembusukan yang berbau tidak sedap."],
            ["KdPenyakit" => "PC22", "NamaPenyakit" => "Bercak Kering Bakteri", "reason" => "Bakteri menyebabkan bercak coklat kering pada daun dan batang, biasanya pada kondisi kering."],
            ["KdPenyakit" => "PC23", "NamaPenyakit" => "Bercak Buah Phytophthora", "reason" => "Jamur Phytophthora capsici menyebabkan bercak coklat pada buah, terutama di musim hujan."]
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
        
            // Penyakit 11
            ['KdPenyakit' => 11, 'KdGejala' => 39],
            ['KdPenyakit' => 11, 'KdGejala' => 40],
            ['KdPenyakit' => 11, 'KdGejala' => 41],
        
            // Penyakit 12
            ['KdPenyakit' => 12, 'KdGejala' => 42],
            ['KdPenyakit' => 12, 'KdGejala' => 43],
            ['KdPenyakit' => 12, 'KdGejala' => 44],
        
            // Penyakit 13
            ['KdPenyakit' => 13, 'KdGejala' => 44],
            ['KdPenyakit' => 13, 'KdGejala' => 45],
            ['KdPenyakit' => 13, 'KdGejala' => 46],
            ['KdPenyakit' => 13, 'KdGejala' => 47],
            ['KdPenyakit' => 13, 'KdGejala' => 48],
        
            // Penyakit 14
            ['KdPenyakit' => 14, 'KdGejala' => 48],
            ['KdPenyakit' => 14, 'KdGejala' => 49],
            ['KdPenyakit' => 14, 'KdGejala' => 50],
            ['KdPenyakit' => 14, 'KdGejala' => 51],
            ['KdPenyakit' => 14, 'KdGejala' => 52],
        
            // Penyakit 15
            ['KdPenyakit' => 15, 'KdGejala' => 53],
            ['KdPenyakit' => 15, 'KdGejala' => 23],
            ['KdPenyakit' => 15, 'KdGejala' => 13],
        
            // Penyakit 16
            ['KdPenyakit' => 16, 'KdGejala' => 54],
            ['KdPenyakit' => 16, 'KdGejala' => 56],
            ['KdPenyakit' => 16, 'KdGejala' => 23],
            ['KdPenyakit' => 16, 'KdGejala' => 1],
        
            // Penyakit 17
            ['KdPenyakit' => 17, 'KdGejala' => 55],
            ['KdPenyakit' => 17, 'KdGejala' => 56],
            ['KdPenyakit' => 17, 'KdGejala' => 12],
            ['KdPenyakit' => 17, 'KdGejala' => 14],
        
            // Penyakit 18
            ['KdPenyakit' => 18, 'KdGejala' => 57],
            ['KdPenyakit' => 18, 'KdGejala' => 16],
            ['KdPenyakit' => 18, 'KdGejala' => 23],
        
            // Penyakit 19
            ['KdPenyakit' => 19, 'KdGejala' => 58],
            ['KdPenyakit' => 19, 'KdGejala' => 12],
            ['KdPenyakit' => 19, 'KdGejala' => 1],
        
            // Penyakit 20
            ['KdPenyakit' => 20, 'KdGejala' => 59],
            ['KdPenyakit' => 20, 'KdGejala' => 31],
            ['KdPenyakit' => 20, 'KdGejala' => 32],
        
            // Penyakit 21
            ['KdPenyakit' => 21, 'KdGejala' => 60],
            ['KdPenyakit' => 21, 'KdGejala' => 35],
            ['KdPenyakit' => 21, 'KdGejala' => 12],
        
            // Penyakit 22
            ['KdPenyakit' => 22, 'KdGejala' => 61],
            ['KdPenyakit' => 22, 'KdGejala' => 16],
            ['KdPenyakit' => 22, 'KdGejala' => 7],
        
            // Penyakit 23
            ['KdPenyakit' => 23, 'KdGejala' => 61],
            ['KdPenyakit' => 23, 'KdGejala' => 14],
            ['KdPenyakit' => 23, 'KdGejala' => 35],
        ]);
        
    }
}
