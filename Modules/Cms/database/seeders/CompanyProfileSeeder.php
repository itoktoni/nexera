<?php

namespace Modules\Cms\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Modules\Cms\Models\Content;
use Modules\Cms\Models\Field;
use Modules\Cms\Models\Menu;
use Modules\Cms\Models\Section;
use Modules\Cms\Models\Type;

class CompanyProfileSeeder extends Seeder
{
    /**
     * Section partial (cms::frontend.sections.{name}) for each top-level field.
     * Order here drives render order on the homepage.
     */
    private array $sections = [
        'hero' => ['sort' => 10, 'icon' => 'home', 'desc' => 'Hero — badge, judul gradasi, deskripsi, 2 tombol CTA'],
        'clients' => ['sort' => 20, 'icon' => 'handshake', 'desc' => 'Strip logo klien / mitra'],
        'about' => ['sort' => 30, 'icon' => 'info', 'desc' => 'Tentang — visi, misi, dan keunggulan'],
        'services' => ['sort' => 40, 'icon' => 'layers', 'desc' => 'Layanan — Devices, Application, Services'],
        'products' => ['sort' => 50, 'icon' => 'inventory_2', 'desc' => 'Produk — perangkat keras & media supply (tab)'],
        'portfolio' => ['sort' => 60, 'icon' => 'briefcase', 'desc' => 'Portofolio & success story'],
        'contact' => ['sort' => 70, 'icon' => 'headset', 'desc' => 'Kontak — kartu WhatsApp, email, dan formulir pesan'],
    ];

    public function run(): void
    {
        $type = Type::updateOrCreate(
            ['slug' => 'homepage'],
            [
                'name' => 'Homepage',
                'type' => 'custom',
                'description' => 'PT. Nexera Pandawa Innovatech — hero, klien, tentang, layanan, produk, portofolio.',
                'supports' => ['title', 'slug'],
                'is_active' => true,
            ]
        );

        $fields = $this->seedFields($type);
        $this->seedSections($type, $fields);
        $this->cleanup($type);
        $this->seedContent($type);
        $this->seedMenus();
    }

    private function seedFields(Type $type): array
    {
        $defs = $this->fieldDefs();

        $byName = [];
        foreach ($defs as $def) {
            $children = $def['children'] ?? [];
            unset($def['children']);
            $def['type_id'] = $type->id;

            $parent = Field::updateOrCreate(['name' => $def['name'], 'type_id' => $type->id], $def);
            $byName[$def['name']] = $parent;

            $this->seedChildren($parent, $children, $type);
        }

        return $byName;
    }

    private function seedChildren(Field $parent, array $children, Type $type): void
    {
        foreach ($children as $child) {
            $grandChildren = $child['children'] ?? [];
            unset($child['children']);
            $child['parent_id'] = $parent->id;
            $child['type_id'] = $type->id;

            $node = Field::updateOrCreate(
                ['name' => $child['name'], 'parent_id' => $parent->id],
                $child
            );

            if ($grandChildren !== []) {
                $this->seedChildren($node, $grandChildren, $type);
            }
        }
    }

    private function fieldDefs(): array
    {
        return [
            ['name' => 'hero', 'label' => 'Hero', 'type' => 'container', 'mode' => 'single', 'sort_order' => 10, 'children' => [
                ['name' => 'badge', 'label' => 'Badge (Est. ...)', 'type' => 'text', 'sort_order' => 1],
                ['name' => 'title', 'label' => 'Judul (sebelum highlight)', 'type' => 'text', 'sort_order' => 2],
                ['name' => 'highlight', 'label' => 'Kata Highlight (gradasi)', 'type' => 'text', 'sort_order' => 3],
                ['name' => 'title_suffix', 'label' => 'Judul (sesudah highlight)', 'type' => 'text', 'sort_order' => 4],
                ['name' => 'description', 'label' => 'Deskripsi', 'type' => 'textarea', 'sort_order' => 5],
                ['name' => 'cta1_text', 'label' => 'Tombol 1 Teks', 'type' => 'text', 'sort_order' => 6],
                ['name' => 'cta1_link', 'label' => 'Tombol 1 Link', 'type' => 'url', 'sort_order' => 7],
                ['name' => 'cta2_text', 'label' => 'Tombol 2 Teks', 'type' => 'text', 'sort_order' => 8],
                ['name' => 'cta2_link', 'label' => 'Tombol 2 Link', 'type' => 'url', 'sort_order' => 9],
            ]],

            ['name' => 'clients', 'label' => 'Klien', 'type' => 'container', 'mode' => 'single', 'sort_order' => 20, 'children' => [
                ['name' => 'heading', 'label' => 'Judul Section', 'type' => 'text', 'sort_order' => 1],
                ['name' => 'items', 'label' => 'Daftar Klien', 'type' => 'container', 'mode' => 'multiple', 'sort_order' => 2, 'children' => [
                    ['name' => 'name', 'label' => 'Nama', 'type' => 'text', 'sort_order' => 1],
                    ['name' => 'icon', 'label' => 'Icon (Font Awesome class)', 'type' => 'text', 'sort_order' => 2],
                ]],
            ]],

            ['name' => 'about', 'label' => 'Tentang', 'type' => 'container', 'mode' => 'single', 'sort_order' => 30, 'children' => [
                ['name' => 'subtitle', 'label' => 'Subjudul', 'type' => 'text', 'sort_order' => 1],
                ['name' => 'title', 'label' => 'Judul', 'type' => 'text', 'sort_order' => 2],
                ['name' => 'description', 'label' => 'Deskripsi', 'type' => 'textarea', 'sort_order' => 3],
                ['name' => 'image', 'label' => 'Gambar', 'type' => 'image', 'sort_order' => 4],
                ['name' => 'year', 'label' => 'Tahun (angka)', 'type' => 'text', 'sort_order' => 5],
                ['name' => 'year_label', 'label' => 'Label Tahun', 'type' => 'text', 'sort_order' => 6],
                ['name' => 'visi_title', 'label' => 'Visi Judul', 'type' => 'text', 'sort_order' => 7],
                ['name' => 'visi', 'label' => 'Visi', 'type' => 'textarea', 'sort_order' => 8],
                ['name' => 'misi_title', 'label' => 'Misi Judul', 'type' => 'text', 'sort_order' => 9],
                ['name' => 'misi', 'label' => 'Misi', 'type' => 'textarea', 'sort_order' => 10],
                ['name' => 'features_heading', 'label' => 'Judul Keunggulan', 'type' => 'text', 'sort_order' => 11],
                ['name' => 'features', 'label' => 'Keunggulan', 'type' => 'container', 'mode' => 'multiple', 'sort_order' => 12, 'children' => [
                    ['name' => 'icon', 'label' => 'Icon (Font Awesome class)', 'type' => 'text', 'sort_order' => 1],
                    ['name' => 'title', 'label' => 'Judul', 'type' => 'text', 'sort_order' => 2],
                    ['name' => 'description', 'label' => 'Deskripsi', 'type' => 'text', 'sort_order' => 3],
                ]],
            ]],

            ['name' => 'services', 'label' => 'Layanan', 'type' => 'container', 'mode' => 'single', 'sort_order' => 40, 'children' => [
                ['name' => 'heading', 'label' => 'Judul Section', 'type' => 'text', 'sort_order' => 1],
                ['name' => 'subheading', 'label' => 'Subjudul', 'type' => 'textarea', 'sort_order' => 2],
                ['name' => 'items', 'label' => 'Daftar Layanan', 'type' => 'container', 'mode' => 'multiple', 'sort_order' => 3, 'children' => [
                    ['name' => 'icon', 'label' => 'Icon (Font Awesome class)', 'type' => 'text', 'sort_order' => 1],
                    ['name' => 'title', 'label' => 'Judul', 'type' => 'text', 'sort_order' => 2],
                    ['name' => 'description', 'label' => 'Deskripsi', 'type' => 'textarea', 'sort_order' => 3],
                    ['name' => 'features', 'label' => 'Fitur (satu per baris)', 'type' => 'textarea', 'sort_order' => 4],
                    ['name' => 'button_text', 'label' => 'Tombol Teks', 'type' => 'text', 'sort_order' => 5],
                    ['name' => 'button_link', 'label' => 'Tombol Link', 'type' => 'url', 'sort_order' => 6],
                    ['name' => 'highlight', 'label' => 'Sorot (kartu gelap)', 'type' => 'boolean', 'sort_order' => 7],
                ]],
            ]],

            ['name' => 'products', 'label' => 'Produk', 'type' => 'container', 'mode' => 'single', 'sort_order' => 50, 'children' => [
                ['name' => 'heading', 'label' => 'Judul Section', 'type' => 'text', 'sort_order' => 1],
                ['name' => 'subheading', 'label' => 'Subjudul', 'type' => 'textarea', 'sort_order' => 2],
                ['name' => 'items', 'label' => 'Daftar Produk', 'type' => 'container', 'mode' => 'multiple', 'sort_order' => 3, 'children' => [
                    ['name' => 'category', 'label' => 'Kategori', 'type' => 'select', 'sort_order' => 1, 'config' => ['options' => ['hardware' => 'Perangkat Keras', 'media' => 'Media Supply']]],
                    ['name' => 'icon', 'label' => 'Icon (Font Awesome class)', 'type' => 'text', 'sort_order' => 2],
                    ['name' => 'title', 'label' => 'Judul', 'type' => 'text', 'sort_order' => 3],
                    ['name' => 'description', 'label' => 'Deskripsi', 'type' => 'textarea', 'sort_order' => 4],
                ]],
            ]],

            ['name' => 'portfolio', 'label' => 'Portofolio', 'type' => 'container', 'mode' => 'single', 'sort_order' => 60, 'children' => [
                ['name' => 'heading', 'label' => 'Judul Section', 'type' => 'text', 'sort_order' => 1],
                ['name' => 'subheading', 'label' => 'Subjudul', 'type' => 'textarea', 'sort_order' => 2],
                ['name' => 'items', 'label' => 'Daftar Proyek', 'type' => 'container', 'mode' => 'multiple', 'sort_order' => 3, 'children' => [
                    ['name' => 'category', 'label' => 'Kategori', 'type' => 'select', 'sort_order' => 1, 'config' => ['options' => ['rfid' => 'Sistem RFID', 'app' => 'Aplikasi Khusus']]],
                    ['name' => 'badge', 'label' => 'Badge (industri)', 'type' => 'text', 'sort_order' => 2],
                    ['name' => 'icon', 'label' => 'Icon (Font Awesome class)', 'type' => 'text', 'sort_order' => 3],
                    ['name' => 'client', 'label' => 'Klien', 'type' => 'text', 'sort_order' => 4],
                    ['name' => 'subtitle', 'label' => 'Sub Judul', 'type' => 'text', 'sort_order' => 5],
                    ['name' => 'description', 'label' => 'Deskripsi', 'type' => 'textarea', 'sort_order' => 6],
                ]],
                ['name' => 'success', 'label' => 'Success Story', 'type' => 'container', 'mode' => 'single', 'sort_order' => 4, 'children' => [
                    ['name' => 'quote', 'label' => 'Kutipan', 'type' => 'textarea', 'sort_order' => 1],
                    ['name' => 'author', 'label' => 'Penulis', 'type' => 'text', 'sort_order' => 2],
                    ['name' => 'role', 'label' => 'Peran / Instansi', 'type' => 'text', 'sort_order' => 3],
                    ['name' => 'metric', 'label' => 'Angka Highlight', 'type' => 'text', 'sort_order' => 4],
                    ['name' => 'metric_label', 'label' => 'Label Angka', 'type' => 'text', 'sort_order' => 5],
                ]],
            ]],

            ['name' => 'contact', 'label' => 'Kontak', 'type' => 'container', 'mode' => 'single', 'sort_order' => 70, 'children' => [
                ['name' => 'heading', 'label' => 'Judul Section', 'type' => 'text', 'sort_order' => 1],
                ['name' => 'subheading', 'label' => 'Subjudul', 'type' => 'textarea', 'sort_order' => 2],
                ['name' => 'items', 'label' => 'Kartu Kontak (WhatsApp)', 'type' => 'container', 'mode' => 'multiple', 'sort_order' => 3, 'children' => [
                    ['name' => 'label', 'label' => 'Label (cth: WhatsApp - Jakarta)', 'type' => 'text', 'sort_order' => 1],
                    ['name' => 'name', 'label' => 'Nama Kontak', 'type' => 'text', 'sort_order' => 2],
                    ['name' => 'phone', 'label' => 'Nomor Tampilan', 'type' => 'text', 'sort_order' => 3],
                    ['name' => 'wa_link', 'label' => 'Link WhatsApp', 'type' => 'url', 'sort_order' => 4],
                    ['name' => 'icon', 'label' => 'Icon (Font Awesome class)', 'type' => 'text', 'sort_order' => 5],
                ]],
                ['name' => 'email_label', 'label' => 'Label Email', 'type' => 'text', 'sort_order' => 4],
                ['name' => 'email', 'label' => 'Alamat Email Tampilan', 'type' => 'text', 'sort_order' => 5],
                ['name' => 'email_link', 'label' => 'Link Email (mailto:)', 'type' => 'url', 'sort_order' => 6],
            ]],
        ];
    }

    private function seedSections(Type $type, array $fields): void
    {
        foreach ($this->sections as $name => $meta) {
            $field = $fields[$name] ?? null;
            if (! $field) {
                continue;
            }

            Section::updateOrCreate(
                ['name' => $name, 'content_type_id' => $type->id],
                [
                    'description' => $meta['desc'],
                    'icon' => $meta['icon'],
                    'content_type_id' => $type->id,
                    'field_ids' => [$field->id],
                    'sort_order' => $meta['sort'],
                    'is_active' => true,
                ]
            );
        }
    }

    /**
     * Remove stale grocery-era sections/fields that no longer map to a template section.
     */
    private function cleanup(Type $type): void
    {
        Section::where('content_type_id', $type->id)
            ->whereNotIn('name', array_keys($this->sections))
            ->delete();

        Field::where('type_id', $type->id)
            ->whereNull('parent_id')
            ->whereNotIn('name', array_keys($this->sections))
            ->delete();
    }

    private function seedContent(Type $type): void
    {
        $meta = [
            'hero' => [
                'badge' => 'Est. 2020 • Spesialis RFID Indonesia',
                'title' => 'Unlimited',
                'highlight' => 'Innovation',
                'title_suffix' => 'for the Future',
                'description' => 'Mengintegrasikan perangkat mutakhir dan aplikasi cerdas untuk mentransformasi operasional bisnis di berbagai industri melalui teknologi RFID.',
                'cta1_text' => 'Konsultasi Sekarang',
                'cta1_link' => '#kontak',
                'cta2_text' => 'Eksplorasi Layanan',
                'cta2_link' => '#layanan',
            ],
            'clients' => [
                'heading' => 'Dipercaya oleh Perusahaan Terkemuka',
                'items' => [
                    ['name' => 'TMMIN', 'icon' => 'fas fa-car-side'],
                    ['name' => 'RS Premier', 'icon' => 'fas fa-hospital'],
                    ['name' => 'Wings Group', 'icon' => 'fas fa-industry'],
                    ['name' => 'LG Electronics', 'icon' => 'fas fa-bolt'],
                ],
            ],
            'about' => [
                'subtitle' => 'Profil Perusahaan',
                'title' => 'Mitra Solusi Teknologi Anda.',
                'description' => 'PT. Nexera Pandawa Innovatech berawal dari dedikasi terhadap teknologi RFID dan kini telah berkembang menjadi penyedia solusi IT komprehensif, menghubungkan hardware andal dengan software cerdas.',
                'image' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'year' => '2020',
                'year_label' => 'Berdiri Sejak',
                'visi_title' => 'Visi Kami',
                'visi' => 'Menjadi mitra terbaik dalam pengembangan teknologi kolaboratif dan solusi untuk semua industri.',
                'misi_title' => 'Misi Kami',
                'misi' => 'Selalu berusaha menghadirkan solusi teknologi terkini dan terus berinovasi untuk memberikan yang terbaik bagi pelanggan.',
                'features_heading' => 'Mengapa Memilih Nexera?',
                'features' => [
                    ['icon' => 'fas fa-users-cog', 'title' => 'Expert Team', 'description' => 'Tim profesional yang inovatif.'],
                    ['icon' => 'fas fa-cubes', 'title' => 'Complete Solution', 'description' => 'Solusi end-to-end terpadu.'],
                    ['icon' => 'fas fa-handshake', 'title' => 'Trusted & Commitment', 'description' => 'Integritas dan komitmen tinggi.'],
                    ['icon' => 'fas fa-chart-line', 'title' => 'Improve Tech', 'description' => 'Teknologi yang berkelanjutan.'],
                ],
            ],
            'services' => [
                'heading' => 'Layanan Komprehensif Kami',
                'subheading' => 'Pilar utama solusi teknologi yang siap mengoptimalkan proses bisnis dan memberikan nilai tambah pada organisasi Anda.',
                'items' => [
                    [
                        'icon' => 'fas fa-microchip',
                        'title' => 'Devices',
                        'description' => 'Penyediaan perangkat keras industri berkualitas yang handal untuk lingkungan kerja operasional yang menantang.',
                        'features' => "RFID (Reader & Antenna)\nBarcode Scanner\nMobile Computer\nPrinter Label\nNetwork Infrastructure",
                        'button_text' => 'Hubungi Pengadaan',
                        'button_link' => '#kontak',
                        'highlight' => false,
                    ],
                    [
                        'icon' => 'fas fa-code',
                        'title' => 'Application',
                        'description' => 'Pengembangan perangkat lunak kustom untuk menjembatani perangkat keras dengan kebutuhan manajemen data Anda.',
                        'features' => "Web Applications\nMobile Apps (Android/iOS)\nDesktop Applications\nWebsite Development",
                        'button_text' => 'Mulai Proyek App',
                        'button_link' => '#kontak',
                        'highlight' => true,
                    ],
                    [
                        'icon' => 'fas fa-cogs',
                        'title' => 'Services',
                        'description' => 'Dukungan profesional berkelanjutan mulai dari desain sistem, pemasangan, hingga pemeliharaan jangka panjang.',
                        'features' => "Installation & Setup\nSolutions Consultant\nSystem Maintenance\nTechnical Training",
                        'button_text' => 'Jadwalkan Konsultasi',
                        'button_link' => '#kontak',
                        'highlight' => false,
                    ],
                ],
            ],
            'products' => [
                'heading' => 'Eksplorasi Perangkat Kami',
                'subheading' => 'Beragam hardware dan media supply industri dari merek terkemuka yang siap mendukung efisiensi operasional.',
                'items' => [
                    ['category' => 'hardware', 'icon' => 'fas fa-wifi', 'title' => 'RFID Systems', 'description' => 'RFID Reader, Antenna industri, dan perangkat pemindai jarak jauh.'],
                    ['category' => 'hardware', 'icon' => 'fas fa-mobile-screen', 'title' => 'Mobile Computer', 'description' => 'Komputer genggam tangguh (rugged PDA) untuk mobilitas data.'],
                    ['category' => 'hardware', 'icon' => 'fas fa-print', 'title' => 'Printer Label', 'description' => 'Printer barcode industri dan desktop untuk pencetakan label massal.'],
                    ['category' => 'hardware', 'icon' => 'fas fa-barcode', 'title' => 'Barcode Scanner', 'description' => 'Pemindai 1D/2D berkabel maupun nirkabel untuk kasir & gudang.'],
                    ['category' => 'media', 'icon' => 'fas fa-sim-card', 'title' => 'RFID Tags', 'description' => 'Beragam jenis tag UHF/HF (Label, Hard Tag, Metal Tag) untuk identifikasi unik aset.'],
                    ['category' => 'media', 'icon' => 'fas fa-sticky-note', 'title' => 'Label & Ribbon', 'description' => 'Media cetak thermal transfer berkualitas untuk daya tahan informasi pada barang.'],
                    ['category' => 'media', 'icon' => 'fas fa-receipt', 'title' => 'Thermal Paper', 'description' => 'Kertas thermal standar untuk struk, mesin kasir (POS), dan printer mobile.'],
                ],
            ],
            'portfolio' => [
                'heading' => 'Portofolio & Implementasi',
                'subheading' => 'Kepercayaan klien besar adalah bukti komitmen kami dalam memberikan solusi nyata.',
                'items' => [
                    [
                        'category' => 'rfid',
                        'badge' => 'Manufaktur',
                        'icon' => 'fas fa-car-side',
                        'client' => 'Toyota Motor (TMMIN)',
                        'subtitle' => 'Implementasi RFID Tracking',
                        'description' => 'Sistem pelacakan inventaris komponen otomotif secara otomatis di lini produksi untuk efisiensi rantai pasok.',
                    ],
                    [
                        'category' => 'rfid',
                        'badge' => 'Kesehatan',
                        'icon' => 'fas fa-hospital',
                        'client' => 'RS Premier Bintaro',
                        'subtitle' => 'Asset Management System',
                        'description' => 'Integrasi RFID untuk pelacakan dan audit alat-alat medis kritis rumah sakit secara cepat dan presisi.',
                    ],
                    [
                        'category' => 'app',
                        'badge' => 'Event & Olahraga',
                        'icon' => 'fas fa-running',
                        'client' => 'Tahura Trail Run',
                        'subtitle' => 'Timing System Application',
                        'description' => 'Aplikasi pencatatan waktu peserta lari terintegrasi sensor cerdas dengan dashboard analitik real-time.',
                    ],
                ],
                'success' => [
                    'quote' => 'Implementasi Smart Laundry System dengan teknologi UHF RFID dari Nexera telah memangkas waktu inventarisasi linen kami hingga 80% dan mengeliminasi kesalahan hitung manual yang sering terjadi.',
                    'author' => 'Manajer Operasional',
                    'role' => 'Obsesiman Laundry',
                    'metric' => '80%',
                    'metric_label' => 'Waktu inventarisasi lebih hemat',
                ],
            ],
            'contact' => [
                'heading' => 'Hubungi Tim Kami',
                'subheading' => 'Punya pertanyaan atau siap memulai transformasi digital? Konsultan kami siap mendengarkan kebutuhan unik Anda.',
                'items' => [
                    ['label' => 'WhatsApp - Jakarta', 'name' => 'Aryo Bayu', 'phone' => '+62 856 9783 2022', 'wa_link' => 'https://wa.me/6285697832022', 'icon' => 'fab fa-whatsapp'],
                    ['label' => 'WhatsApp - Tangerang', 'name' => 'Nouval Gucci', 'phone' => '+62 81 888 9312', 'wa_link' => 'https://wa.me/62818889312', 'icon' => 'fab fa-whatsapp'],
                    ['label' => 'WhatsApp - Yogyakarta', 'name' => 'Itok Toni', 'phone' => '+62 811 1040 159', 'wa_link' => 'https://wa.me/628111040159', 'icon' => 'fab fa-whatsapp'],
                ],
                'email_label' => 'Email Resmi',
                'email' => 'sales@nexeratech.co.id',
                'email_link' => 'mailto:nexerapandawa@gmail.com',
            ],
        ];

        $content = Content::updateOrCreate(
            ['slug' => 'homepage', 'content_type_id' => $type->id],
            [
                'title' => 'Homepage',
                'content' => null,
                'excerpt' => 'PT. Nexera Pandawa Innovatech — homepage',
                'status' => 'published',
                'published_at' => now(),
                'content_type_id' => $type->id,
                'meta' => $meta,
                'active_sections' => Section::where('content_type_id', $type->id)
                    ->whereIn('name', array_keys($this->sections))
                    ->pluck('id')
                    ->all(),
            ]
        );

        if (empty($content->slug)) {
            $content->slug = Str::slug($content->title).'-'.$content->id;
            $content->saveQuietly();
        }
    }

    private function seedMenus(): void
    {
        Menu::updateOrCreate(
            ['slug' => 'main-menu'],
            [
                'name' => 'Main Navigation',
                'location' => 'main',
                'is_active' => true,
                'sort_order' => 0,
                'items' => [
                    ['label' => 'Beranda', 'url' => '/', 'sort_order' => 0],
                    ['label' => 'Tentang Kami', 'url' => '/#tentang', 'sort_order' => 1],
                    ['label' => 'Produk', 'url' => '/page/produk', 'sort_order' => 2],
                    ['label' => 'Layanan', 'url' => '/page/layanan', 'sort_order' => 3],
                    ['label' => 'Portofolio', 'url' => '/#portofolio', 'sort_order' => 4],
                    ['label' => 'Artikel', 'url' => '/blog', 'sort_order' => 5],
                    ['label' => 'Hubungi Kami', 'url' => '/contact', 'sort_order' => 6],
                ],
            ]
        );

        Menu::updateOrCreate(
            ['slug' => 'footer-menu'],
            [
                'name' => 'Footer',
                'location' => 'footer',
                'is_active' => true,
                'sort_order' => 0,
                'items' => [
                    ['label' => 'Navigasi Utama', 'sort_order' => 0, 'children' => [
                        ['label' => 'Beranda', 'url' => '/', 'sort_order' => 0],
                        ['label' => 'Tentang Kami', 'url' => '/#tentang', 'sort_order' => 1],
                        ['label' => 'Produk', 'url' => '/page/produk', 'sort_order' => 2],
                        ['label' => 'Layanan', 'url' => '/page/layanan', 'sort_order' => 3],
                        ['label' => 'Portofolio', 'url' => '/#portofolio', 'sort_order' => 4],
                        ['label' => 'Artikel', 'url' => '/blog', 'sort_order' => 5],
                    ]],
                    ['label' => 'Layanan Solusi', 'sort_order' => 1, 'children' => [
                        ['label' => 'Sistem RFID Terpadu', 'url' => '/page/layanan', 'sort_order' => 0],
                        ['label' => 'Pembuatan Aplikasi', 'url' => '/page/layanan', 'sort_order' => 1],
                        ['label' => 'Kebutuhan Barcode', 'url' => '/page/produk', 'sort_order' => 2],
                        ['label' => 'Instalasi & Maintenance', 'url' => '/page/layanan', 'sort_order' => 3],
                    ]],
                ],
            ]
        );

        Menu::whereIn('slug', ['main-navigation', 'footer-company'])->delete();
    }
}
