@php
    // Data shape: meta['hero'] = badge, title, highlight, title_suffix, description, cta1_*, cta2_*
    $s = $data['hero'] ?? $data;
    $badge = $s['badge'] ?? 'Est. 2020 • Spesialis RFID Indonesia';
    $title = $s['title'] ?? 'Unlimited';
    $highlight = $s['highlight'] ?? 'Innovation';
    $suffix = $s['title_suffix'] ?? 'for the Future';
    $desc = $s['description'] ?? '';
    $cta1t = $s['cta1_text'] ?? 'Konsultasi Sekarang';
    $cta1l = $s['cta1_link'] ?? '#kontak';
    $cta2t = $s['cta2_text'] ?? 'Eksplorasi Layanan';
    $cta2l = $s['cta2_link'] ?? '#layanan';
@endphp
<section id="beranda" class="hero-gradient min-h-screen flex items-center pt-20 relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4wNykiLz48L3N2Zz4=')] opacity-50"></div>
    <div class="absolute top-1/4 right-0 w-96 h-96 bg-brand-accent/20 rounded-full blur-3xl -z-0"></div>
    <div class="absolute bottom-0 left-1/4 w-72 h-72 bg-brand-primary/30 rounded-full blur-3xl -z-0"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 py-20 lg:py-0 w-full">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="text-center lg:text-left">
                <div class="inline-flex items-center px-4 py-1.5 rounded-full bg-slate-800/50 border border-slate-700 backdrop-blur-sm text-brand-accent text-sm font-semibold mb-6 shadow-lg">
                    <span class="flex h-2 w-2 rounded-full bg-brand-accent mr-3 animate-pulse"></span>
                    {{ $badge }}
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-6">
                    {{ $title }} <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-accent to-blue-400">{{ $highlight }}</span><br />{{ $suffix }}
                </h1>
                @if($desc)
                    <p class="text-lg md:text-xl text-slate-300 mb-10 max-w-2xl mx-auto lg:mx-0 leading-relaxed font-light">{{ $desc }}</p>
                @endif
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <a href="{{ $cta1l }}" class="bg-brand-primary text-white font-semibold px-8 py-4 rounded-full hover:bg-blue-600 transition-all shadow-lg shadow-blue-500/40 transform hover:-translate-y-1 text-center flex items-center justify-center gap-2">
                        {{ $cta1t }} <i class="fas fa-arrow-right text-sm"></i>
                    </a>
                    <a href="{{ $cta2l }}" class="px-8 py-4 rounded-full border border-slate-500 text-white font-medium hover:bg-slate-800 transition-all text-center flex items-center justify-center gap-2 group">
                        {{ $cta2t }}
                    </a>
                </div>
            </div>

            <div class="hidden lg:flex relative justify-end">
                <div class="relative w-[500px] h-[500px]">
                    <div class="absolute top-10 right-10 w-64 bg-slate-800/80 backdrop-blur-md rounded-2xl border border-slate-700 p-6 shadow-2xl z-20 transform hover:-translate-y-2 transition-transform duration-500">
                        <div class="flex items-center justify-between mb-4">
                            <i class="fas fa-microchip text-brand-accent text-2xl"></i>
                            <span class="text-xs text-slate-400 font-mono">ID: NX-RFID-99</span>
                        </div>
                        <h3 class="text-white font-bold mb-1">Smart Tracking</h3>
                        <p class="text-slate-400 text-sm mb-4">Real-time asset visibility</p>
                        <div class="w-full bg-slate-700 h-2 rounded-full overflow-hidden">
                            <div class="bg-brand-accent h-full w-3/4"></div>
                        </div>
                    </div>
                    <div class="absolute bottom-20 left-0 w-56 bg-slate-800/80 backdrop-blur-md rounded-2xl border border-slate-700 p-6 shadow-2xl z-30 transform hover:-translate-y-2 transition-transform duration-500">
                        <i class="fas fa-code text-blue-400 text-3xl mb-4"></i>
                        <h3 class="text-white font-bold">App Development</h3>
                        <p class="text-slate-400 text-sm mt-1">Custom enterprise solutions</p>
                    </div>
                    <div class="absolute inset-10 border-2 border-slate-700 rounded-full border-dashed animate-[spin_60s_linear_infinite] opacity-50 z-0"></div>
                    <div class="absolute inset-20 border border-brand-primary rounded-full animate-[spin_40s_linear_infinite_reverse] opacity-30 z-0"></div>
                </div>
            </div>
        </div>
    </div>
</section>
