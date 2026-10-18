@php
    // Data shape: meta['products'] = heading, subheading, items[{category: hardware|media, icon, title, description}]
    $s = $data['products'] ?? $data;
    $heading = $s['heading'] ?? 'Eksplorasi Perangkat Kami';
    $subheading = $s['subheading'] ?? 'Beragam hardware dan media supply industri dari merek terkemuka yang siap mendukung efisiensi operasional.';
    $items = $s['items'] ?? (array_is_list($s) ? $s : []);
    $hardware = collect($items)->where('category', 'hardware')->values();
    $media = collect($items)->where('category', 'media')->values();
    if ($hardware->isEmpty() && $media->isEmpty()) { $hardware = collect($items); }
@endphp
<section id="produk" class="py-24 bg-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-end mb-12">
            <div class="max-w-2xl">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-100 text-brand-primary font-semibold text-sm mb-4">
                    <i class="fas fa-tags"></i> Katalog Produk
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">{{ $heading }}</h2>
                <p class="text-slate-600">{{ $subheading }}</p>
            </div>
            <div class="mt-6 md:mt-0 flex gap-2 p-1 bg-white rounded-xl shadow-sm border border-slate-200">
                <button class="px-6 py-2.5 rounded-lg bg-brand-primary text-white text-sm font-bold transition-colors" id="tab-hardware" onclick="switchProductTab('hardware')">Perangkat Keras</button>
                <button class="px-6 py-2.5 rounded-lg bg-transparent text-slate-600 hover:bg-slate-50 text-sm font-bold transition-colors" id="tab-media" onclick="switchProductTab('media')">Media Supply</button>
            </div>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" id="grid-hardware">
            @forelse($hardware as $p)
                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all border border-slate-200 group flex flex-col h-full">
                    <div class="h-48 bg-slate-50 p-6 flex justify-center items-center group-hover:bg-slate-100 transition-colors">
                        <i class="{{ $p['icon'] ?? 'fas fa-box' }} text-6xl text-slate-300 group-hover:text-brand-primary transition-colors"></i>
                    </div>
                    <div class="p-6 flex-grow flex flex-col">
                        <h3 class="text-lg font-bold text-slate-900 mb-1">{{ $p['title'] ?? '' }}</h3>
                        <p class="text-slate-600 text-sm mb-4 flex-grow">{{ $p['description'] ?? '' }}</p>
                        <button onclick="prefillPesan('Halo, saya ingin menanyakan detail tentang produk {{ addslashes($p['title'] ?? '') }}...')" class="w-full py-2 rounded-lg bg-slate-100 text-brand-primary font-semibold hover:bg-brand-primary hover:text-white transition-colors text-sm">
                            Tanya Detail
                        </button>
                    </div>
                </div>
            @empty
                <p class="text-sm text-slate-400 col-span-full text-center">Belum ada produk — tambah dari CMS (Content → homepage → Produk).</p>
            @endforelse
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 hidden" id="grid-media">
            @foreach($media as $p)
                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all border border-slate-200 group flex flex-col h-full">
                    <div class="h-48 bg-slate-50 p-6 flex justify-center items-center group-hover:bg-slate-100 transition-colors">
                        <i class="{{ $p['icon'] ?? 'fas fa-box' }} text-6xl text-slate-300 group-hover:text-brand-accent transition-colors"></i>
                    </div>
                    <div class="p-6 flex-grow flex flex-col">
                        <h3 class="text-lg font-bold text-slate-900 mb-1">{{ $p['title'] ?? '' }}</h3>
                        <p class="text-slate-600 text-sm mb-4 flex-grow">{{ $p['description'] ?? '' }}</p>
                        <button onclick="prefillPesan('Halo, saya tertarik dengan {{ addslashes($p['title'] ?? '') }}...')" class="w-full py-2 rounded-lg bg-slate-100 text-brand-primary font-semibold hover:bg-brand-primary hover:text-white transition-colors text-sm">Tanya Detail</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
