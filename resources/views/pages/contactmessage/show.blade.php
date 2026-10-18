<?php /** @var App\Models\ContactMessage $model */ ?>

<x-layouts::app>
    <x-breadcrumb :items="[['url' => moduleRoute('getTable'), 'label' => moduleLabel()], ['url' => '', 'label' => 'Detail Pesan']]" />

    <x-card label="Detail Pesan Kontak">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <p class="text-xs font-semibold text-on-surface-variant uppercase tracking-wide mb-1">Nama</p>
                <p class="text-sm font-medium text-on-surface">{{ $model->name }}</p>
            </div>
            <div>
                <p class="text-xs font-semibold text-on-surface-variant uppercase tracking-wide mb-1">Email</p>
                <p class="text-sm font-medium text-on-surface">{{ $model->email }}</p>
            </div>
            <div class="md:col-span-2">
                <p class="text-xs font-semibold text-on-surface-variant uppercase tracking-wide mb-1">Topik (Subject)</p>
                <p class="text-sm font-medium text-on-surface">{{ $model->subject }}</p>
            </div>
            <div class="md:col-span-2">
                <p class="text-xs font-semibold text-on-surface-variant uppercase tracking-wide mb-1">Isi Pesan</p>
                <div class="text-sm text-on-surface leading-relaxed whitespace-pre-line bg-surface-container-low rounded-xl p-4 border border-outline-variant/30">{{ $model->message }}</div>
            </div>
            <div>
                <p class="text-xs font-semibold text-on-surface-variant uppercase tracking-wide mb-1">IP Address</p>
                <p class="text-sm font-medium text-on-surface">{{ $model->ip_address ?? '-' }}</p>
            </div>
            <div>
                <p class="text-xs font-semibold text-on-surface-variant uppercase tracking-wide mb-1">Dikirim Pada</p>
                <p class="text-sm font-medium text-on-surface">{{ $model->created_at?->format('d/m/Y H:i') ?? '-' }}</p>
            </div>
        </div>
    </x-card>

    <div class="flex items-center gap-3 mt-6">
        <a href="{{ moduleRoute('getTable') }}" wire:navigate class="inline-flex items-center justify-center gap-1 h-10 px-4 text-sm font-semibold rounded-lg border border-outline-variant text-on-surface-variant hover:bg-surface-container transition-all">
            <span class="material-symbols-outlined text-xl">arrow_back</span>
            <span>Kembali</span>
        </a>
        @can('delete', $model)
        <a onclick="return confirm('Are you sure you want to delete?')" href="{{ moduleRoute('getDelete', ['id' => $model->field_primary]) }}" class="inline-flex items-center justify-center gap-1 h-10 px-4 text-sm font-semibold rounded-lg bg-error text-on-error hover:bg-error/90 transition-all">
            <span class="material-symbols-outlined text-xl">delete</span>
            <span>Hapus</span>
        </a>
        @endcan
    </div>
</x-layouts::app>
