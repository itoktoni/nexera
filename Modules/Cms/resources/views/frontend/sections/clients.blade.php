@php
    // Data shape: meta['clients'] = heading, items[{name, icon}]
    // "icon" holds an uploaded logo path/URL (field type=image); old FA classes still render as fallback.
    $s = $data['clients'] ?? $data;
    $heading = $s['heading'] ?? 'Dipercaya oleh Perusahaan Terkemuka';
    $items = $s['items'] ?? (array_is_list($s) ? $s : []);
    $isImage = fn($v) => is_string($v) && $v !== '' && (str_starts_with(trim($v), 'http') || str_contains($v, '/') || (bool) preg_match('/\.(png|jpe?g|webp|gif|svg|avif)(\?.*)?$/i', trim($v)));
@endphp
<section class="py-12 bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <p class="text-center text-sm font-semibold text-slate-400 uppercase tracking-wider mb-8">{{ $heading }}</p>
        @if(empty($items))
            <p class="text-center text-sm text-slate-400">Logo klien akan tampil di sini — isi dari CMS (Content → homepage → Klien).</p>
        @else
            <div class="flex flex-wrap justify-center items-center gap-10 md:gap-16 opacity-70 grayscale hover:grayscale-0 transition-all duration-700">
                @foreach($items as $item)
                    @if($isImage($item['icon'] ?? ''))
                        <img src="{{ fileUrl($item['icon']) }}" alt="{{ $item['name'] ?? $item['label'] ?? 'Klien' }}" class="h-10 md:h-12 w-auto object-contain" loading="lazy">
                    @else
                        <div class="flex items-center gap-2 font-bold text-xl text-slate-800">
                            @if(!empty($item['icon']))<i class="{{ $item['icon'] }} text-brand-primary"></i>@endif
                            {{ $item['name'] ?? $item['label'] ?? '' }}
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
    </div>
</section>
