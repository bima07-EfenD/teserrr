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
        // Buat Provinsi (hindari duplikasi)
        $jatim = Provinsi::firstOrCreate(['nama' => 'Jawa Timur']);

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

        // Desa Lumajang (lengkap)
        $desaLumajang = [
            'Candipuro' => ['Candipuro','Jarit','Jugosari','Kloposawit','Penanggal','Sumbermujur','Sumberrejo','Sumberwuluh','Tambahrejo','Tumpeng'],
            'Gucialit' => ['Dadapan','Gucialit','Jeruk','Kenongo','Kertowono','Pakel','Sombo','Tunjung','Wonokerto'],
            'Jatiroto' => ['Banyuputih Kidul','Jatiroto','Kaliboto Kidul','Kaliboto Lor','Rojopolo','Sukosari'],
            'Kedungjajang' => ['Bandaran','Bence','Curahpetung','Grobogan','Jatisari','Kedungjajang','Krasak','Pandansari','Sawaran Kulon','Tempursari','Umbul','Wonorejo'],
            'Klakah' => ['Duren','Kebonan','Klakah','Kudus','Mlawang','Papringan','Ranupakis','Sawaran Lor','Sruni','Sumberwringin','Tegalciut','Tegalrandu'],
            'Kunir' => ['Dorogowok','Jatigono','Jatimulyo','Jatirejo','Kabuaran','Karanglo','Kedungmoro','Kunir Kidul','Kunir Lor','Sukorejo','Sukosari'],
            'Lumajang' => ['Banjarwaru','Blukon','Boreng','Denok','Labruk Lor','Citrodiwangsan','Ditotrunan','Jogotrunan','Jogoyudan','Kepuharjo','Rogotrunan','Tompokersan'],
            'Padang' => ['Babakan','Barat','Bodang','Kalisemut','Kedawung','Merakan','Mojo','Padang','Tanggung'],
            'Pasirian' => ['Bades','Bago','Condro','Gondoruso','Kalibendo','Madurejo','Nguter','Pasirian','Selok Anyar','Selok Awar-Awar','Sememu'],
            'Pasrujambe' => ['Jambearum','Jambekumbu','Karanganom','Kertosari','Pagowan','Pasrujambe','Sukorejo'],
            'Pronojiwo' => ['Oro-Oro Ombo','Pronojiwo','Sidomulyo','Sumberurip','Supiturang','Tamanayu'],
            'Randuagung' => ['Banyuputih Lor','Buwek','Gedangmas','Kalidilem','Kalipenggung','Ledoktempuro','Pajarakan','Randuagung','Ranulogong','Ranuwurung','Salak','Tunjung'],
            'Ranuyoso' => ['Alun-Alun','Jenggrong','Meninjo','Penawungan','Ranubedali','Ranuyoso','Sumberpetung','Tegalbangsri','Wates Kulon','Wates Wetan','Wonoayu'],
            'Rowokangkung' => ['Dawuhan Wetan','Kedungrejo','Nogosari','Rowokangkung','Sidorejo','Sumberanyar','Sumbersari'],
            'Senduro' => ['Argosari','Bedayu','Bedayutalang','Burno','Kandangan','Kandangtepus','Pandansari','Purworejo','Ranupani','Sarikemuning','Senduro','Wonocepokoayu'],
            'Sukodono' => ['Bondoyudo','Dawuhan Lor','Karangsari','Kebonagung','Klanting','Kutorenon','Selokbesuki','Selokgondang','Sumberejo','Uranggantung'],
            'Sumbersuko' => ['Grati','Kebonsari','Labruk Kidul','Mojosari','Petahunan','Purwosono','Sentul','Sumbersuko'],
            'Tekung' => ['Karangbendo','Klampokarum','Mangunsari','Tekung','Tukum','Wonogriyo','Wonokerto','Wonosari'],
            'Tempeh' => ['Besuk','Gesang','Jatisari','Jokarto','Kaliwungu','Lempeni','Pandanarum','Pandanwangi','Pulo','Sumberjati','Tempeh Kidul','Tempeh Lor','Tempeh Tengah'],
            'Tempursari' => ['Bulurejo','Kaliuling','Pundungsari','Purorejo','Tegalrejo','Tempurejo','Tempursari'],
            'Yosowilangun' => ['Darungan','Kalipepe','Karanganyar','Karangrejo','Kebonsari','Krai','Kraton','Munder','Tunjungrejo','Wotgalih','Yosowilangun Kidul','Yosowilangun Lor'],
        ];

        // Desa Jember (lengkap)
        $desaJember = [
            'Ajung' => ['Ajung','Klompangan','Mangaran','Pancakarya','Rowoindah','Sukamakmur','Wirowongso'],
            'Ambulu' => ['Ambulu','Andongsari','Karang Anyar','Pontang','Sabrang','Sumberejo','Tegalsari'],
            'Arjasa' => ['Arjasa','Biting','Candijati','Darsono','Kamal','Kemuning Lor'],
            'Balung' => ['Balung Kidul','Balung Kulon','Balung Lor','Curahlele','Gumelar','Karangduren','Karang Semanding','Tutul'],
            'Bangsalsari' => ['Badean','Bangsalsari','Banjarsari','Curahkalong','Gambirono','Karangsono','Langkap','Petung','Sukorejo','Tisnogambar','Tugusari'],
            'Gumukmas' => ['Bagorejo','Gumukmas','Karangrejo','Kepanjen','Mayangan','Menampu','Purwoasri','Tembokrejo'],
            'Jelbuk' => ['Jelbuk','Panduman','Sucopangepok','Sugerkidul','Sukojember','Sukowiryo'],
            'Jenggawah' => ['Cangkring','Jatimulyo','Jatisari','Jenggawah','Kemuningsari Kidul','Kertonegoro','Sruni','Wonojati'],
            'Jombang' => ['Jombang','Keting','Ngampelrejo','Padomasan','Sarimulyo','Wringinagung'],
            'Kalisat' => ['Ajung','Gambiran','Glagahwero','Gumuksari','Kalisat','Patempuran','Plalangan','Sebanen','Sukoreno','Sumberjeruk','Sumberkalong','Sumberketempa'],
            'Kaliwates' => ['Jember Kidul','Kaliwates','Kebon Agung','Kepatihan','Mangli','Sempusari','Tegal Besar'],
            'Kencong' => ['Cakru','Kencong','Kraton','Paseban','Wonorejo'],
            'Ledokombo' => ['Karangpaiton','Ledokombo','Lembengan','Slateng','Sukogidri','Sumberanget','Sumberbulus','Sumberlesung','Sumbersalak','Suren'],
            'Mayang' => ['Mayang','Mrawan','Seputih','Sidomukti','Sumberkejayan','Tegalwaru','Tegalrejo'],
            'Mumbulsari' => ['Karang Kedawung','Kawangrejo','Lampeji','Lengkong','Mumbulsari','Suco','Tamansari'],
            'Panti' => ['Glagahwero','Kemiri','Kemuningsari Lor','Pakis','Panti','Serut','Suci'],
            'Pakusari' => ['Bedadung','Jatian','Kertosari','Pakusari','Patemon','Subo','Sumberpinang'],
            'Patrang' => ['Banjarsengon','Baratan','Bintoro','Gebang','Jemberlor','Jumerto','Patrang','Slawu'],
            'Puger' => ['Bagon','Grenden','Jambearum','Kasiyan','Kasiyan Timur','Mlokorejo','Mojomulyo','Mojosari','Puger Kulon','Puger Wetan','Wonosari','Wringintelu'],
            'Rambipuji' => ['Curahmalang','Gugut','Kaliwining','Nogosari','Pecoro','Rambigundam','Rambipuji','Rowotamtu'],
            'Semboro' => ['Pondokdalem','Pondokjoyo','Rejoagung','Semboro','Sidomekar','Sidomulyo'],
            'Silo' => ['Garahan','Harjomulyo','Karangharjo','Mulyorejo','Pace','Sempolan','Sidomulyo','Silo','Sumberjati'],
            'Sukorambi' => ['Dukuhmencek','Jubung','Karangpring','Klungkung','Sukorambi'],
            'Sukowono' => ['Arjasa','Balet Baru','Dawuhanmangli','Mojogemi','Pocangan','Sukokerto','Sukorejo','Sukosari','Sukowono','Sumberwringin','Sumberdanti','Sumberwaru'],
            'Sumberbaru' => ['Gelang','Jambesari','Jamintoro','Jatiroto','Kaliglagah','Karangbayat','Pringgowirawan','Rowotengah','Sumberagung','Yosorati'],
            'Sumberjambe' => ['Cumedak','Gunungmalang','Jambearum','Plerean','Pringgondani','Randuagung','Rowosari','Sumberjambe','Sumberpakem'],
            'Sumbersari' => ['Antirogo','Karangrejo','Kebonsari','Kranjingan','Sumbersari','Tegalgede','Wirolegi'],
            'Tanggul' => ['Darungan','Klatakan','Kramat Sukoharjo','Manggisan','Patemon','Selodakon','Tanggul Kulon','Tanggul Wetan'],
            'Tempurejo' => ['Andongrejo','Curahnongko','Curahtakir','Pondokrejo','Sidodadi','Sanenrejo','Tempurejo','Wonoasri'],
            'Umbulsari' => ['Gadingrejo','Gunungsari','Mundurejo','Paleran','Sidorejo','Sukoreno','Tanjungsari','Tegalwangi','Umbulrejo','Umbulsari'],
            'Wuluhan' => ['Ampel','Dukuhdempok','Glundengan','Kesilir','Lojejer','Tamansari','Tanjungrejo'],
        ];

        // Desa Banyuwangi (lengkap)
        $desaBanyuwangi = [
            'Pesanggaran' => ['Kandangan','Pesanggaran','Sarongan','Sumberagung','Sumbermulyo'],
            'Siliragung' => ['Barurejo','Buluagung','Kesilir','Seneporejo','Siliragung'],
            'Bangorejo' => ['Bangorejo','Kebondalem','Ringintelu','Sambimulyo','Sambirejo','Sukorejo','Temurejo'],
            'Purwoharjo' => ['Bulurejo','Glagahagung','Grajagan','Karetan','Kradenan','Purwoharjo','Sidorejo','Sumberasri'],
            'Tegaldlimo' => ['Kalipait','Kedungasri','Kedunggebang','Kedungwungu','Kendalrejo','Purwoagung','Purwoasri','Tegaldlimo','Wringinpitu'],
            'Muncar' => ['Blambangan','Kedungrejo','Kedungringin','Kumendung','Sumber Beras','Sumbersewu','Tambakrejo','Tapanrejo','Tembokrejo','Wringinputih'],
            'Cluring' => ['Benculuk','Cluring','Kaliploso','Plampangrejo','Sarimulyo','Sembulung','Sraten','Tamanagung','Tampo'],
            'Gambiran' => ['Purwodadi','Jajag','Gambiran','Yosomulyo','Wringinrejo','Wringinagung'],
            'Tegalsari' => ['Dasri','Karangdoro','Karangmulyo','Tamansari','Tegalrejo','Tegalsari'],
            'Glenmore' => ['Tegalharjo','Sepanjang','Karangharjo','Tulungrejo','Sumbergondo','Bumiharjo','Margomulyo'],
            'Kalibaru' => ['Kalibarukulon','Kalibarumanis','Kalibaruwetan','Kajarharjo','Banyuanyar','Kebonrejo'],
            'Srono' => ['Bagorejo','Wonosobo','Sukonatar','Kebaman','Sumbersari','Parijatah Wetan','Parijatah Kulon','Rejoagung','Kepundungan','Sukomaju'],
            'Rogojampi' => ['Aliyan','Mangir','Gladag','Bubuk','Lemahbangdewo','Gitik','Karangbendo','Rogojampi','Pengatigan','Kedaleman'],
            'Kabat' => ['Bareng','Bunder','Gombolirang','Benelanlor','Labanasem','Pakistaji','Pondoknongko','Dadapan','Kedayunan','Kabat','Macanputih','Tambong','Pendarungan','Kalirejo'],
            'Singojuruh' => ['Gambor','Alasmalang','Benelan Kidul','Lemahbang Kulon','Singojuruh','Gumirih','Cantuk','Padang','Singolatren','Kemiri','Sumber Baru'],
            'Sempu' => ['Sempu','Jambewangi','Karangsari','Temuguruh','Gendoh','Temuasri','Tegalarum'],
            'Songgon' => ['Balak','Bangunsari','Bayu','Bedewang','Parangharjo','Songgon','Sragi','Sumberarum','Sumberbulu'],
            'Glagah' => ['Glagah','Kampung Anyar','Kemiren','Kenjo','Olehsari','Paspan','Rejosari','Tamansuruh'],
            'Licin' => ['Banjar','Gumuk','Jelun','Kluncing','Licin','Pakel','Segobang','Tamansari'],
            'Banyuwangi' => ['Kampung Mandar','Kampung Melayu','Karangrejo','Kebalenan','Kepatihan','Kertosari','Lateng','Pakis','Panderejo','Penganjuran','Pengantigan','Singonegaran','Singotrunan','Sobo','Sumber Rejo','Taman Baru','Temenggungan','Tukang Kayu'],
            'Giri' => ['Grogol','Jambesari','Boyolangu','Giri','Mojopanggung','Penataban'],
            'Kalipuro' => ['Bulusari','Kelir','Ketapang','Pesucen','Telemung','Bulusan','Gombengsari','Kalipuro','Klatak'],
            'Wongsorejo' => ['Alasbuluh','Alasrejo','Bajulmati','Bangsring','Bengkak','Bimorejo','Sumberanyar','Sumberkencono','Sidodadi','Sidowangi','Watukebo','Wongsorejo'],
            'Blimbingsari' => ['Badean','Blimbingsari','Bomo','Gintangan','Kaligung','Kaotan','Karangrejo','Patoman','Sukojati','Watukebo'],
        ];

        foreach ($mapLumajang as $kec => $obj) {
            if (!isset($desaLumajang[$kec])) {
                Desa::create([
                    'nama' => 'Desa Utama',
                    'kecamatan_id' => $obj->id,
                ]);
            } else {
                foreach ($desaLumajang[$kec] as $desa) {
                    Desa::create([
                        'nama' => $desa,
                        'kecamatan_id' => $obj->id,
                    ]);
                }
            }
        }
        foreach ($mapJember as $kec => $obj) {
            if (!isset($desaJember[$kec])) {
                Desa::create([
                    'nama' => 'Desa Utama',
                    'kecamatan_id' => $obj->id,
                ]);
            } else {
                foreach ($desaJember[$kec] as $desa) {
                    Desa::create([
                        'nama' => $desa,
                        'kecamatan_id' => $obj->id,
                    ]);
                }
            }
        }
        foreach ($mapBanyuwangi as $kec => $obj) {
            if (!isset($desaBanyuwangi[$kec])) {
                Desa::create([
                    'nama' => 'Desa Utama',
                    'kecamatan_id' => $obj->id,
                ]);
            } else {
                foreach ($desaBanyuwangi[$kec] as $desa) {
                    Desa::create([
                        'nama' => $desa,
                        'kecamatan_id' => $obj->id,
                    ]);
                }
            }
        }
    }
}
