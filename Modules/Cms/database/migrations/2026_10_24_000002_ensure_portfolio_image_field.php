<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Pastikan field upload gambar ada di portfolio items (idempotent).
     */
    public function up(): void
    {
        $topId = DB::table('cms_fields')->where('name', 'portfolio')->whereNull('parent_id')->value('id');
        if (! $topId) {
            return;
        }
        $itemsId = DB::table('cms_fields')->where('name', 'items')->where('parent_id', $topId)->value('id');
        if (! $itemsId) {
            return;
        }
        $exists = DB::table('cms_fields')->where('name', 'image')->where('parent_id', $itemsId)->exists();
        if (! $exists) {
            $typeId = DB::table('cms_fields')->where('id', $itemsId)->value('type_id');
            DB::table('cms_fields')->insert([
                'name' => 'image',
                'label' => 'Gambar / Foto Implementasi',
                'type' => 'image',
                'sort_order' => 7,
                'parent_id' => $itemsId,
                'type_id' => $typeId,
                'mode' => 'multiple',
                'is_required' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    public function down(): void
    {
        // Sengaja tidak menghapus field agar data gambar tidak hilang.
    }
};
