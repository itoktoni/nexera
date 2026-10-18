@php
    // Data shape: meta['services'] = heading, subheading, items[{icon,title,description,features(\n string|array),button_text,button_link,highlight}]
    $s = $data['services'] ?? $data;
    $heading = $s['heading'] ?? 'Layanan Komprehensif Kami';
    $subheading = $s['subheading'] ?? 'Pilar utama solusi teknologi yang siap mengoptimalkan proses bisnis dan memberikan nilai tambah pada organisasi Anda.';
    $items = $s['items'] ?? $s['services'] ?? (array_is_list($s) ? $s : []);
@endphp
<section id="layanan" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 text-brand-primary font-semibold text-sm mb-4">
                <i class="fas fa-layer-group"></i> Core Solutions
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">{{ $heading }}</h2>
            <p class="text-slate-600 text-lg">{{ $subheading }}</p>
        </div>

        @if(empty($items))
            <p class="text-center text-sm text-slate-400">Belum ada layanan — tambah dari CMS (Content → homepage → Layanan).</p>
        @else
            <div class="grid md:grid-cols-3 gap-8">
                @foreach($items as $card)
                    @php
                        $isHighlight = !empty($card['highlight']);
                        $rawFeatures = $card['features'] ?? [];
                        $featureList = is_string($rawFeatures)
                            ? array_values(array_filter(array_map('trim', explode("\n", $rawFeatures))))
                            : (is_array($rawFeatures) ? $rawFeatures : []);
                    @endphp
                    @if($isHighlight)
                        <div class="bg-slate-900 rounded-2xl p-8 border border-slate-800 shadow-2xl relative overflow-hidden group transform md:-translate-y-4">
                            <div class="absolute top-0 right-0 w-32 h-32 bg-brand-primary/30 rounded-bl-full -z-0"></div>
                            <div class="relative z-10">
                                <div class="w-16 h-16 bg-slate-800 rounded-2xl border border-slate-700 flex items-center justify-center text-3xl text-brand-accent mb-6 group-hover:scale-110 transition-transform">
                                    <i class="{{ $card['icon'] ?? 'fas fa-code' }}"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-white mb-3">{{ $card['title'] ?? '' }}</h3>
                                <p class="text-slate-400 mb-6 text-sm leading-relaxed">{{ $card['description'] ?? '' }}</p>
                                <ul class="space-y-3 mb-8 text-sm text-slate-300 font-medium">
                                    @foreach($featureList as $f)
                                        <li class="flex items-center gap-3"><i class="fas fa-check-circle text-brand-accent"></i> {{ is_array($f) ? ($f['text'] ?? $f['label'] ?? '') : $f }}</li>
                                    @endforeach
                                </ul>
                                @if(!empty($card['button_text']))
                                    <button onclick="document.getElementById('form-layanan').value='{{ $card['title'] ?? '' }}'; window.location.href='{{ $card['button_link'] ?? '#kontak' }}'" class="w-full py-3 px-4 bg-brand-primary text-white font-bold rounded-xl hover:bg-blue-600 transition-colors shadow-lg shadow-blue-500/20">
                                        {{ $card['button_text'] }}
                                    </button>
                                @endif
                            </div>
                        </div>
                    @else
                        <div class="bg-slate-50 rounded-2xl p-8 border border-slate-200 hover:shadow-xl transition-all duration-300 group hover:-translate-y-2">
                            <div class="w-16 h-16 bg-white rounded-2xl shadow-sm flex items-center justify-center text-3xl text-brand-primary mb-6 group-hover:bg-brand-primary group-hover:text-white transition-colors">
                                <i class="{{ $card['icon'] ?? 'fas fa-microchip' }}"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-slate-900 mb-3">{{ $card['title'] ?? '' }}</h3>
                            <p class="text-slate-600 mb-6 text-sm leading-relaxed">{{ $card['description'] ?? '' }}</p>
                            <ul class="space-y-3 mb-8 text-sm text-slate-700 font-medium">
                                @foreach($featureList as $f)
                                    <li class="flex items-center gap-3"><i class="fas fa-check-circle text-brand-accent"></i> {{ is_array($f) ? ($f['text'] ?? $f['label'] ?? '') : $f }}</li>
                                @endforeach
                            </ul>
                            @if(!empty($card['button_text']))
                                <button onclick="document.getElementById('form-layanan').value='{{ $card['title'] ?? '' }}'; window.location.href='{{ $card['button_link'] ?? '#kontak' }}'" class="w-full py-3 px-4 bg-white border-2 border-brand-primary text-brand-primary font-bold rounded-xl hover:bg-brand-primary hover:text-white transition-colors">
                                    {{ $card['button_text'] }}
                                </button>
                            @endif
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
    </div>
</section>
