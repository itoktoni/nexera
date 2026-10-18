<?php

namespace Modules\Cms\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Modules\Cms\Models\Category;
use Modules\Cms\Models\Content;
use Modules\Cms\Models\Tag;
use Modules\Cms\Models\Type;

class ArticlePageSeeder extends Seeder
{
    public function run(): void
    {
        $authorId = User::where('email', 'admin@nexera.test')->value('id')
            ?? User::orderBy('id')->value('id');

        $postType = $this->seedPostType();
        $pageType = $this->seedPageType();
        $categories = $this->seedCategories();
        $tags = $this->seedTags();

        $this->seedArticles($postType, $authorId, $categories, $tags);
        $this->seedPages($pageType, $authorId);
    }

    private function seedPostType(): Type
    {
        return Type::updateOrCreate(
            ['slug' => 'post'],
            [
                'name' => 'Articles',
                'type' => 'blog',
                'description' => 'Artikel & berita PT. Nexera Pandawa Innovatech.',
                'supports' => ['title', 'slug', 'excerpt', 'featured_image', 'status', 'author'],
                'is_active' => true,
            ]
        );
    }

    private function seedPageType(): Type
    {
        return Type::updateOrCreate(
            ['slug' => 'page'],
            [
                'name' => 'Pages',
                'type' => 'page',
                'description' => 'Halaman statis (tentang, kebijakan privasi, syarat & ketentuan).',
                'supports' => ['title', 'slug', 'featured_image', 'status'],
                'is_active' => true,
            ]
        );
    }

    private function seedCategories(): array
    {
        $defs = [
            ['name' => 'Teknologi RFID', 'slug' => 'teknologi-rfid', 'description' => 'Artikel seputar teknologi RFID UHF/HF.'],
            ['name' => 'Aplikasi & Software', 'slug' => 'aplikasi-software', 'description' => 'Pengembangan aplikasi web, mobile, dan desktop.'],
            ['name' => 'Berita Perusahaan', 'slug' => 'berita-perusahaan', 'description' => 'Kabar dan kegiatan Nexera.'],
        ];

        $out = [];
        foreach ($defs as $i => $def) {
            $out[$def['slug']] = Category::updateOrCreate(
                ['slug' => $def['slug']],
                array_merge($def, ['sort_order' => $i])
            );
        }

        return $out;
    }

    private function seedTags(): array
    {
        $out = [];
        foreach (['RFID', 'UHF', 'Aplikasi Mobile', 'Barcode', 'Warehouse'] as $name) {
            $slug = Str::slug($name);
            $out[$slug] = Tag::updateOrCreate(['slug' => $slug], ['name' => $name]);
        }

        return $out;
    }

    private function seedArticles(Type $type, mixed $authorId, array $categories, array $tags): void
    {
        $articles = [
            [
                'title' => 'Mengenal Teknologi RFID UHF untuk Efisiensi Warehouse',
                'slug' => 'mengenal-rfid-uhf-warehouse',
                'excerpt' => 'Bagaimana RFID UHF memangkas waktu stock opname hingga 80% dibanding barcode konvensional.',
                'content' => '<p>Teknologi <strong>RFID UHF (Ultra High Frequency)</strong> memungkinkan pemindaian ratusan tag dalam hitungan detik tanpa garis pandang langsung — berbeda dengan barcode yang harus dipindai satu per satu.</p><p>Untuk operasional warehouse, manfaatnya nyata: penerimaan barang lebih cepat, stock opname yang tadinya berhari-hari menjadi hitungan jam, dan jejak audit setiap pergerakan barang tercatat otomatis.</p><p>Nexera membantu merancang arsitektur RFID end-to-end: pemilihan reader & antenna, penempatan gate, hingga aplikasi dashboard monitoring yang terintegrasi dengan sistem gudang Anda.</p>',
                'categories' => ['teknologi-rfid'],
                'tags' => ['rfid', 'uhf', 'warehouse'],
                'days_ago' => 2,
            ],
            [
                'title' => 'RFID vs Barcode: Mana yang Tepat untuk Bisnis Anda?',
                'slug' => 'rfid-vs-barcode',
                'excerpt' => 'Perbandingan jujur biaya, kecepatan, dan daya tahan RFID dan barcode untuk operasional industri.',
                'content' => '<p>Barcode murah dan universal, tetapi butuh garis pandang dan pemindaian satu per satu. RFID lebih mahal per tag, namun membaca massal, tahan kotor/debu, dan bisa ditulis ulang.</p><p>Aturan praktisnya: gunakan barcode untuk item bernilai rendah bervolume tinggi, dan RFID untuk aset bernilai, linen, dokumen, atau alur yang menuntut kecepatan seperti gate receiving dan audit massal.</p><p>Banyak klien Nexera memakai <strong>kombinasi keduanya</strong> — label hybrid barcode + RFID dalam satu media cetak.</p>',
                'categories' => ['teknologi-rfid'],
                'tags' => ['rfid', 'barcode'],
                'days_ago' => 6,
            ],
            [
                'title' => 'Aplikasi Timing System untuk Event Lari: Studi Kasus Tahura Trail Run',
                'slug' => 'timing-system-tahura-trail-run',
                'excerpt' => 'Pencatatan waktu peserta terintegrasi sensor cerdas dengan dashboard analitik real-time.',
                'content' => '<p>Pada event Tahura Trail Run, Nexera membangun aplikasi timing system yang terintegrasi sensor di garis start/finish. Setiap чип peserta terbaca otomatis dan hasilnya tampil di dashboard real-time untuk panitia dan penonton.</p><p>Arsitekturnya sederhana: mobile app untuk marshal di lapangan, gateway sinkronisasi, dan web dashboard untuk publikasi hasil. Pola yang sama bisa dipakai untuk event olahraga, ujian, maupun absensi massal.</p>',
                'categories' => ['aplikasi-software', 'berita-perusahaan'],
                'tags' => ['aplikasi-mobile'],
                'days_ago' => 11,
            ],
            [
                'title' => 'Smart Laundry System: Pangkas Waktu Inventarisasi Linen 80%',
                'slug' => 'smart-laundry-system',
                'excerpt' => 'Implementasi UHF RFID yang mengeliminasi kesalahan hitung manual di laundry skala industri.',
                'content' => '<p>Obsesiman Laundry menghadapi masalah klasik: kehilangan linen, hitung manual yang lama, dan selisih dengan pelanggan. Nexera mengimplementasikan Smart Laundry System berbasis UHF RFID — setiap potong linen ditempel tag tahan cuci.</p><p>Hasilnya: waktu inventarisasi terpangkas <strong>80%</strong>, setiap kantong laundry terverifikasi otomatis di gate, dan riwayat cuci per item tercatat untuk kontrol kualitas.</p>',
                'categories' => ['teknologi-rfid', 'berita-perusahaan'],
                'tags' => ['rfid', 'uhf'],
                'days_ago' => 17,
            ],
            [
                'title' => 'Panduan Memilih Printer Label Barcode untuk Industri',
                'slug' => 'panduan-printer-label-barcode',
                'excerpt' => 'Thermal transfer vs direct thermal, DPI, dan duty cycle —bedanya untuk kebutuhan massal.',
                'content' => '<p>Untuk pencetakan massal di gudang atau manufaktur, pilih <strong>thermal transfer</strong> (pakai ribbon) agar cetakan tahan gesekan dan cuaca. Direct thermal cocok untuk label berumur pendek seperti struk atau shipping label.</p><p>Perhatikan juga lebar cetak, DPI (203 cukup untuk barcode besar, 300 untuk label kecil farmasi/elektronik), dan duty cycle harian. Tim Nexera siap membantu sizing sebelum pengadaan agar tidak over/under spec.</p>',
                'categories' => ['aplikasi-software'],
                'tags' => ['barcode', 'warehouse'],
                'days_ago' => 24,
            ],
        ];

        foreach ($articles as $a) {
            $content = Content::updateOrCreate(
                ['slug' => $a['slug'], 'content_type_id' => $type->id],
                [
                    'title' => $a['title'],
                    'excerpt' => $a['excerpt'],
                    'content' => $a['content'],
                    'status' => 'published',
                    'published_at' => now()->subDays($a['days_ago']),
                    'content_type_id' => $type->id,
                    'author_id' => $authorId,
                ]
            );

            $content->has_categories()->sync(
                collect($a['categories'])->map(fn ($s) => $categories[$s]->id)->all()
            );
            $content->has_tags()->sync(
                collect($a['tags'])->map(fn ($s) => $tags[$s]->id)->filter()->values()->all()
            );
        }
    }

    private function seedPages(Type $type, mixed $authorId): void
    {
        $pages = [
            [
                'title' => 'Tentang Kami',
                'slug' => 'tentang-kami',
                'content' => '<p>PT. <strong>Nexera Pandawa Innovatech</strong> berawal dari dedikasi terhadap teknologi RFID dan kini telah berkembang menjadi penyedia solusi IT komprehensif, menghubungkan hardware andal dengan software cerdas.</p><p><strong>Visi:</strong> menjadi mitra terbaik dalam pengembangan teknologi kolaboratif dan solusi untuk semua industri.<br><strong>Misi:</strong> selalu menghadirkan solusi teknologi terkini dan terus berinovasi untuk memberikan yang terbaik bagi pelanggan.</p>',
            ],
            [
                'title' => 'Kebijakan Privasi',
                'slug' => 'kebijakan-privasi',
                'content' => '<p>Kami menghormati privasi Anda. Data yang dikirim melalui formulir kontak (nama, email, nomor telepon, dan isi pesan) hanya digunakan untuk menanggapi pertanyaan Anda dan tidak dibagikan ke pihak ketiga tanpa persetujuan.</p><p>Anda dapat meminta penghapusan data kapan saja dengan menghubungi email resmi kami.</p>',
            ],
            [
                'title' => 'Layanan Kami',
                'slug' => 'layanan',
                'content' => '<h2>Devices — Perangkat Keras Industri</h2><p>Penyediaan perangkat keras industri berkualitas yang handal untuk lingkungan kerja operasional yang menantang: RFID Reader & Antenna, Barcode Scanner 1D/2D, Mobile Computer (rugged PDA), Printer Label industri & desktop, hingga Network Infrastructure.</p><h2>Application — Pengembangan Software Kustom</h2><p>Kami menjembatani perangkat keras dengan kebutuhan manajemen data Anda melalui Web Applications, Mobile Apps (Android/iOS), Desktop Applications, dan Website Development — dirancang khusus mengikuti alur bisnis, bukan sebaliknya.</p><h2>Services — Dukungan Profesional Berkelanjutan</h2><p>Mulai dari Solutions Consultant & desain sistem, Installation & Setup di lokasi, System Maintenance berkala, hingga Technical Training untuk tim Anda. Satu pintu untuk seluruh lifecycle solusi.</p><p>Ceritakan kebutuhan Anda melalui halaman kontak — konsultan kami akan merespons dengan proposal solusi yang tepat.</p>',
            ],
            [
                'title' => 'Katalog Produk',
                'slug' => 'produk',
                'content' => '<h2>Perangkat Keras</h2><ul><li><strong>RFID Systems</strong> — RFID Reader, antenna industri, dan perangkat pemindai jarak jauh.</li><li><strong>Mobile Computer</strong> — komputer genggam tangguh (rugged PDA) untuk mobilitas data lapangan.</li><li><strong>Printer Label</strong> — printer barcode industri dan desktop untuk pencetakan label massal.</li><li><strong>Barcode Scanner</strong> — pemindai 1D/2D berkabel maupun nirkabel untuk kasir & gudang.</li></ul><h2>Media Supply</h2><ul><li><strong>RFID Tags</strong> — beragam tag UHF/HF (label, hard tag, metal tag) untuk identifikasi unik aset.</li><li><strong>Label & Ribbon</strong> — media cetak thermal transfer berkualitas untuk daya tahan informasi.</li><li><strong>Thermal Paper</strong> — kertas thermal untuk struk, mesin kasir (POS), dan printer mobile.</li></ul><p>Untuk harga dan ketersediaan stok, hubungi tim sales kami melalui halaman kontak.</p>',
            ],
        ];

        foreach ($pages as $p) {
            Content::updateOrCreate(
                ['slug' => $p['slug'], 'content_type_id' => $type->id],
                [
                    'title' => $p['title'],
                    'content' => $p['content'],
                    'excerpt' => Str::limit(strip_tags($p['content']), 160),
                    'status' => 'published',
                    'published_at' => now(),
                    'content_type_id' => $type->id,
                    'author_id' => $authorId,
                ]
            );
        }
    }
}
