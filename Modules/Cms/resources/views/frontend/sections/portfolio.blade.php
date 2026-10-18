@php
    // Data shape: meta['portfolio'] = heading, subheading, items[{category: rfid|app, badge, icon, image, client, subtitle, description}], success{quote, author, role, metric, metric_label}
    $s = $data['portfolio'] ?? $data;
    $heading = $s['heading'] ?? 'Portofolio & Implementasi';
    $subheading = $s['subheading'] ?? 'Kepercayaan klien besar adalah bukti komitmen kami dalam memberikan solusi nyata.';
    $items = $s['items'] ?? (array_is_list($s) ? $s : []);
    $success = $s['success'] ?? [];
@endphp
<section id="portofolio" class="py-24 bg-white relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 text-brand-primary font-semibold text-sm mb-4">
                <i class="fas fa-briefcase"></i> Kisah Sukses
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">{{ $heading }}</h2>
            <p class="text-slate-600 text-lg">{{ $subheading }}</p>
        </div>

        <div class="flex justify-center flex-wrap gap-2 mb-12">
            <button class="portfolio-filter-btn active px-6 py-2 rounded-full text-sm font-bold bg-brand-primary text-white" data-filter="all">Semua Proyek</button>
            <button class="portfolio-filter-btn px-6 py-2 rounded-full text-sm font-bold bg-slate-100 text-slate-600 hover:bg-slate-200" data-filter="rfid">Sistem RFID</button>
            <button class="portfolio-filter-btn px-6 py-2 rounded-full text-sm font-bold bg-slate-100 text-slate-600 hover:bg-slate-200" data-filter="app">Aplikasi Khusus</button>
        </div>

        @if(empty($items))
            <p class="text-center text-sm text-slate-400">Belum ada portofolio — tambah dari CMS (Content → homepage → Portofolio).</p>
        @else
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($items as $p)
                    <div class="portfolio-item {{ $p['category'] ?? '' }} bg-white rounded-2xl border border-slate-200 overflow-hidden hover:shadow-xl transition-all group">
                        <div class="h-56 bg-slate-900 relative p-6 flex flex-col justify-end overflow-hidden">
                            @if(!empty($p['image']))
                                <img src="{{ fileUrl($p['image']) }}" alt="{{ $p['client'] ?? 'Portofolio' }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy" />
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/60 to-transparent z-10"></div>
                            @if(empty($p['image']))
                                <i class="{{ $p['icon'] ?? 'fas fa-briefcase' }} absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-7xl text-white/10 group-hover:scale-110 transition-transform duration-500"></i>
                            @endif
                            <div class="relative z-20">
                                @if(!empty($p['badge']))
                                    <span class="inline-block px-3 py-1 bg-brand-accent text-white text-xs font-bold rounded-md mb-3">{{ $p['badge'] }}</span>
                                @endif
                                <h3 class="text-xl font-bold text-white">{{ $p['client'] ?? '' }}</h3>
                            </div>
                        </div>
                        <div class="p-6">
                            <p class="text-brand-primary font-semibold text-sm mb-2">{{ $p['subtitle'] ?? '' }}</p>
                            <p class="text-slate-600 text-sm mb-4">{{ $p['description'] ?? '' }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        @if(!empty($success))
            <div class="mt-16 bg-slate-900 rounded-3xl p-8 md:p-12 text-white shadow-2xl relative overflow-hidden border border-slate-800">
                <div class="absolute -right-20 -bottom-20 opacity-10">
                    <i class="fas fa-quote-right text-[250px]"></i>
                </div>
                <div class="relative z-10 max-w-4xl">
                    <div class="flex items-center gap-2 text-brand-accent font-bold mb-6">
                        <i class="fas fa-star"></i> SUCCESS STORY HIGHLIGHT
                    </div>
                    <p class="text-xl md:text-2xl font-light italic mb-8 leading-relaxed">
                        "{{ $success['quote'] ?? '' }}"
                        @if(!empty($success['metric']))
                            <span class="font-bold text-brand-accent">{{ $success['metric'] }}</span>
                        @endif
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-slate-700 rounded-full flex items-center justify-center text-xl">
                            <i class="fas fa-user text-slate-400"></i>
                        </div>
                        <div>
                            <p class="font-bold">{{ $success['author'] ?? '' }}</p>
                            <p class="text-sm text-slate-400">{{ $success['role'] ?? '' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
