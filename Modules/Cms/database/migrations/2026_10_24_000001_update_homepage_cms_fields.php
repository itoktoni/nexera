<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Homepage CMS field updates (image upload, link tanpa validasi URL, success carousel).
     * Idempotent — aman dijalankan di DB yang sudah maupun belum diupdate.
     */
    public function up(): void
    {
        // 1. Produk & klien: icon FA -> upload gambar (key "icon" dipertahankan agar meta lama terbaca).
        $this->updateChild('clients', 'items', 'icon', ['type' => 'image', 'label' => 'Logo (upload gambar)']);
        $this->updateChild('products', 'items', 'icon', ['type' => 'image', 'label' => 'Gambar Produk (upload)']);

        // 2. Semua field link: hapus validasi URL bawaan browser (mendukung "#kontak", "mailto:", dsb).
        DB::table('cms_fields')->where('type', 'url')->update(['type' => 'text']);

        // 3. Success story: single -> multiple (carousel).
        $this->updateChild('portfolio', null, 'success', [
            'mode' => 'multiple',
            'label' => 'Success Story (carousel — tambah beberapa)',
        ]);

        // 4. Bungkus meta success lama (assoc) menjadi list berisi 1 item.
        $typeId = DB::table('cms_types')->where('slug', 'homepage')->value('id');
        if ($typeId) {
            $contents = DB::table('cms_contents')->where('content_type_id', $typeId)->get(['id', 'meta']);
            foreach ($contents as $row) {
                $meta = is_string($row->meta) ? json_decode($row->meta, true) : $row->meta;
                if (! is_array($meta) || ! isset($meta['portfolio']['success']) || ! is_array($meta['portfolio']['success'])) {
                    continue;
                }
                if (array_is_list($meta['portfolio']['success'])) {
                    continue;
                }
                $meta['portfolio']['success'] = [$meta['portfolio']['success']];
                DB::table('cms_contents')->where('id', $row->id)->update(['meta' => json_encode($meta)]);
            }
        }
    }

    public function down(): void
    {
        $this->updateChild('clients', 'items', 'icon', ['type' => 'text', 'label' => 'Icon (Font Awesome class)']);
        $this->updateChild('products', 'items', 'icon', ['type' => 'text', 'label' => 'Icon (Font Awesome class)']);
        $this->updateChild('portfolio', null, 'success', ['mode' => 'single', 'label' => 'Success Story']);
    }

    /**
     * Update field anak berdasarkan nama: top -> (mid) -> target.
     * $mid null berarti target langsung di bawah $top.
     */
    private function updateChild(string $top, ?string $mid, string $target, array $values): void
    {
        $topId = DB::table('cms_fields')->where('name', $top)->whereNull('parent_id')->value('id');
        if (! $topId) {
            return;
        }
        $parentId = $topId;
        if ($mid !== null) {
            $midId = DB::table('cms_fields')->where('name', $mid)->where('parent_id', $topId)->value('id');
            if (! $midId) {
                return;
            }
            $parentId = $midId;
        }
        DB::table('cms_fields')->where('name', $target)->where('parent_id', $parentId)->update($values);
    }
};
