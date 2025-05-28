<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Desa;

class WilayahSeeder extends Seeder
{
    public function run(): void
    {
        // Buat Provinsi
        $jatim = Provinsi::create(['nama' => 'Jawa Timur']);

        // Buat Kabupaten
        $lumajang   = Kabupaten::create(['nama' => 'Lumajang',   'provinsi_id' => $jatim->id]);
        $jember     = Kabupaten::create(['nama' => 'Jember',     'provinsi_id' => $jatim->id]);
        $banyuwangi = Kabupaten::create(['nama' => 'Banyuwangi', 'provinsi_id' => $jatim->id]);

        // Daftar kecamatan per kabupaten
        $lumajangKecamatan = [
            'Candipuro','Gucialit','Jatiroto','Kedungjajang','Klakah','Kunir',
            'Lumajang','Padang','Pasirian','Pasrujambe','Pronojiwo','Randuagung',
            'Ranuyoso','Rowokangkung','Senduro','Sukodono','Sumbersuko','Tekung',
            'Tempeh','Tempursari','Yosowilangun',
        ];

        $jemberKecamatan = [
            'Ajung','Ambulu','Arjasa','Bangsalsari','Balung','Gumukmas',
            'Jelbuk','Jenggawah','Jombang','Kalisat','Kaliwates','Kencong',
            'Ledokombo','Mayang','Mumbulsari','Panti','Pakusari','Patrang',
            'Puger','Rambipuji','Semboro','Silo','Sukorambi','Sukowono',
            'Sumberbaru','Sumberjambe','Sumbersari','Tanggul','Tempurejo',
            'Umbulsari','Wuluhan',
        ];

        $banyuwangiKecamatan = [
            'Pesanggaran','Siliragung','Bangorejo','Purwoharjo','Tegaldlimo',
            'Muncar','Cluring','Gambiran','Tegalsari','Glenmore','Kalibaru',
            'Srono','Rogojampi','Kabat','Singojuruh','Sempu','Songgon','Glagah',
            'Licin','Banyuwangi','Giri','Kalipuro','Wongsorejo','Blimbingsari',
        ];

        // Simpan kecamatan dan desa
        $mapLumajang   = [];
        foreach ($lumajangKecamatan as $nama) {
            $mapLumajang[$nama] = Kecamatan::create([
                'nama'          => $nama,
                'kabupaten_id'  => $lumajang->id,
            ]);
        }

        $mapJember = [];
        foreach ($jemberKecamatan as $nama) {
            $mapJember[$nama] = Kecamatan::create([
                'nama'          => $nama,
                'kabupaten_id'  => $jember->id,
            ]);
        }

        $mapBanyuwangi = [];
        foreach ($banyuwangiKecamatan as $nama) {
            $mapBanyuwangi[$nama] = Kecamatan::create([
                'nama'          => $nama,
                'kabupaten_id'  => $banyuwangi->id,
            ]);
        }

        // Desa Jember
        $desaJember = [
            'Ajung' => ['Ajung','Klompangan','Mangaran','Pancakarya','Rowoindah','Sukamakmur','Wirowongso'],
            'Ambulu' => ['Ambulu','Andongsari','Karang Anyar','Pontang','Sabrang','Sumberejo','Tegalsari'],
            'Arjasa' => ['Arjasa','Biting','Candijati','Darsono','Kamal','Kemuning Lor'],
            'Balung' => ['Balung Kidul','Balung Kulon','Balung Lor','Curahlele','Gumelar','Karangduren','Karang Semanding','Tutul'],
            'Bangsalsari' => ['Badean','Bangsalsari','Banjarsari','Curahkalong','Gambirono','Karangsono','Langkap','Petung','Sukorejo','Tisnogambar','Tugusari'],
            'Gumukmas' => ['Bagorejo','Gumukmas','Karangrejo','Kepanjen','Mayangan','Menampu','Mojomulyo','Tembokrejo'],
            'Jelbuk' => ['Jelbuk','Kamal','Karangpring','Panduman','Suger Kidul','Suger Lor'],
            'Jenggawah' => ['Cangkring','Jenggawah','Keting','Mojosari','Sidomekar','Sidomulyo','Suco','Tanjungrejo'],
            'Jombang' => ['Jombang','keting','ngampelrejo','Padomasan','Sarimulyo','Wringinagung'],
            'Kalisat' => ['Kalisat','Patempuran','Sumberjeruk','Plerean'],
            'Kaliwates' => ['Kepatihan','Sempusari','Jember Kidul','Tegalbesar'],
            'Kencong' => ['Kencong','Cakru','Paseban','Wonorejo'],
            'Ledokombo' => ['Ledokombo','Sumber Anget','Slateng','Karanganyar'],
            'Mayang' => ['Mayang','Mrawan','Sumber Kejayan','Tegalrejo'],
            'Mumbulsari' => ['Mumbulsari','Sabrang','Suco','Sukoreno'],
            'Panti' => ['Panti','Serut','Kemiri','Pakisan'],
            'Pakusari' => ['Pakusari','Jatisari','Bedadung','Subo'],
            'Patrang' => ['Patrang','Slawu','Bintoro','Baratan'],
            'Puger' => ['Puger','Kasiyan','Grenden','Wonosari'],
            'Rambipuji' => ['Rambipuji','Curahmas','Rowotamtu','Karangrejo'],
            'Semboro' => ['Semboro','Pondokdalem','Sidomekar','Sidomulyo'],
            'Silo' => ['Silo','Sempolan','Garahan','Mulyorejo'],
            'Sukorambi' => ['Sukorambi','Karangpring','Karangrejo'],
            'Sukowono' => ['Sukowono','Sumberwringin','Kertonegoro','Baletbaru'],
            'Sumberbaru' => ['Sumberbaru','Gunungsari','Pondokrejo','Yosorati'],
            'Sumberjambe' => ['Sumberjambe','Plerean','Rowosari','Sumberpakem'],
            'Sumbersari' => ['Sumbersari','Kebonsari','Kranjingan','Antirogo'],
            'Tanggul' => ['Tanggul','Klatakan','Tanggul Kulon','Tanggul Wetan'],
            'Tempurejo' => ['Tempurejo','Andongrejo','Curahnongko','Sidodadi'],
            'Umbulsari' => ['Umbulsari','Gunungsari','Tanjungsari','Sidorejo'],
            'Wuluhan' => ['Wuluhan','Glundengan','Tampo','Lojejer'],
        ];

        foreach ($desaJember as $kec => $desas) {
            foreach ($desas as $desa) {
                Desa::create([
                    'nama'          => $desa,
                    'kecamatan_id'  => $mapJember[$kec]->id,
                ]);
            }
        }

        // Desa Banyuwangi
        $desaBanyuwangi = [
            'Pesanggaran' => ['Pesanggaran','Bambang','Kedungrejo','Buleleng','Sumberarum'],
            'Siliragung' => ['Siliragung','Jatisari','Kondangrejo','Sumurgeneng'],
            'Bangorejo' => ['Bangorejo','Kemuning','Tegalrejo','Rejopuro'],
            'Purwoharjo' => ['Purwoharjo','Mulyorejo','Gambiran','Kedungrejo'],
            'Tegaldlimo' => ['Tegaldlimo','Gumukmas','Mayangsari'],
            'Muncar' => ['Muncar','Gumukmas','Pakis'],
            'Cluring' => ['Cluring','Sebangin','Lumbang','Prau'],
            'Gambiran' => ['Gambiran','Tegalrejo','Bangorejo'],
            'Tegalsari' => ['Tegalsari','Gumukmas','Tegaldlimo'],
            'Glenmore' => ['Glenmore','Kaliwates','Banyuwangi'],
            'Kalibaru' => ['Kalibaru','Tegalsari','Muncar'],
            'Srono' => ['Srono','Gambiran'],
            'Rogojampi' => ['Rogojampi','Kalipuro','Tegaldlimo'],
            'Kabat' => ['Kabat','Sumberbaru'],
            'Singojuruh' => ['Singojuruh','Banyuwangi','Licin'],
            'Sempu' => ['Sempu'],
            'Songgon' => ['Songgon'],
            'Glagah' => ['Glagah'],
            'Licin' => ['Licin'],
            'Banyuwangi' => ['Banyuwangi','Lembung'],
            'Giri' => ['Giri'],
            'Kalipuro' => ['Kalipuro'],
            'Wongsorejo' => ['Wongsorejo'],
            'Blimbingsari' => ['Blimbingsari'],
        ];

        foreach ($desaBanyuwangi as $kec => $desas) {
            foreach ($desas as $desa) {
                Desa::create([
                    'nama'          => $desa,
                    'kecamatan_id'  => $mapBanyuwangi[$kec]->id,
                ]);
            }
        }

        // Desa Lumajang
        $desaLumajang = [
            'Tempursari' => ['Tegalrejo','Bulurejo','Purorejo','Tempurejo','Tempursari','Pundungsari','Kaliuling'],
            'Pronojiwo' => ['Sidomulyo','Pronojiwo','Tamanayu','Sumberurip','Oro-Oro Ombo','Supiturang'],
            'Candipuro' => ['Jugosari','Jarit','Kloposawit','Penanggal','Sumbermujur','Sumberwuluh','Tamanayu','Tamansari','Tegalrandu','Tegalrejo'],
            'Pasirian' => ['Bades','Bago','Condro','Gondoruso','Kalibendo','Madurejo','Nguter','Selok Awar-Awar','Selok Anyar','Sumberagung','Sumberanyar'],
            'Tempeh' => ['Besuk','Gesang','Jatisari','Jokarto','Kaliwungu','Lempeni','Pandanarum','Pandanwangi','Pulo','Sumberjati','Tempeh Kidul','Tempeh Lor','Tempeh Tengah'],
            'Sumbersuko' => ['Sumbersuko','Kebonsari','Grati','Labruk Kidul','Mojosari','Sentul','Purwosono','Petahunan'],
            'Tekung' => ['Wonogriyo','Wonosari','Mangunsari','Tekung','Wonokerto','Tukum','Karangbendo','Klampokarum'],
            'Kunir' => ['Dorogowok','Jatigono','Jatimulyo','Jatirejo','Kabuaran','Karanglo','Kedungmoro','Kunir Kidul','Kunir Lor','Sukorejo','Sukosari'],
            'Yosowilangun' => ['Darungan','Kalipepe','Karanganyar','Karangrejo','Kebonsari','Kraton','Petahunan','Sumberanyar','Sumberrejo','Tunjungrejo','Wotgalih','Yosowilangun Kidul'],
            'Rowokangkung' => ['Nogosari','Kedungrejo','Sidorejo','Rowokangkung','Sumbersari','Sumberanyar','Dawuhan Wetan'],
            'Jatiroto' => ['Banyuputih Kidul','Rojopolo','Sukosari','Kaliboto Kidul','Kaliboto Lor','Jatiroto'],
            'Randuagung' => ['Banyuputih Lor','Kalidilem','Tunjung','Gedangmas','Kalipenggung','Ranulogong','Randuagung','Ledok Tempuro','Pajarakan','Salak','Wonoayu','Tegalbangsri'],
            'Sukodono' => ['Bondoyudo','Dawuhan Lor','Karangsari','Kebonagung','Klanting','Kutorenon','Sukodono','Sukorejo','Tukum','Wotgalih'],
            'Padang' => ['Babakan','Barat','Bodang','Kalisemut','Kalisemut Lor','Kalisemut Kidul','Padang','Padang Lor','Padang Kidul'],
            'Pasrujambe' => ['Pasrujambe','Jambekumbu','Sukorejo','Jambearum','Kertosari','Pagowan','Karanganom'],
            'Senduro' => ['Argosari','Bedayu','Bedayutalang','Burno','Kandangan','Kandangtepus','Pandansari','Purworejo','Ranupani','Sarikemuning','Senduro','Wonocepokoayu'],
            'Gucialit' => ['Wonokerto','Pakel','Kenongo','Dadapan','Kertowono','Tunjung','Jeruk','Sombo','Gucialit'],
            'Kedungjajang' => ['Pandansari','Krasak','Kedungjajang','Wonorejo','Umbul','Curahpetung','Grobogan','Bence','Jatisari','Bandaran','Sumberwuluh','Sumberanyar'],
            'Klakah' => ['Duren','Kebonan','Klakah','Kudus','Mlawang','Papringan','Ranupakis'],
        ];

        foreach ($desaLumajang as $kec => $desas) {
            foreach ($desas as $desa) {
                Desa::create([
                    'nama'          => $desa,
                    'kecamatan_id'  => $mapLumajang[$kec]->id,
                ]);
            }
        }
    }
}
