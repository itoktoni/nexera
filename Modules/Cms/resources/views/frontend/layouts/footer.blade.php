<footer class="bg-slate-900 text-slate-300 pt-16 pb-8 border-t-4 border-brand-accent">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12 border-b border-slate-800 pb-12">
            <div class="lg:col-span-2">
                <a href="{{ url('/') }}" class="text-3xl font-bold text-white tracking-tight mb-4 block">{{ config('app.name', 'NEXERA') }}<span class="text-brand-accent">.</span></a>
                <p class="text-slate-400 mb-6 max-w-md leading-relaxed">
                    Spesialis teknologi terintegrasi di Indonesia yang fokus pada pemanfaatan RFID, pengembangan perangkat lunak kustom, dan pengadaan perangkat keras industri.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center text-white hover:bg-brand-primary hover:text-white transition-colors" aria-label="LinkedIn">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center text-white hover:bg-brand-primary hover:text-white transition-colors" aria-label="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center text-white hover:bg-brand-primary hover:text-white transition-colors" aria-label="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </div>
            </div>

            @if($footerMenu && $footerMenu->items)
                @php $footerItems = collect($footerMenu->items)->sortBy('sort_order')->values(); @endphp
                @foreach($footerItems->take(2) as $item)
                    <div>
                        <h4 class="text-lg font-bold mb-6 text-white border-b border-slate-700 pb-2 inline-block">{{ $item['label'] }}</h4>
                        <ul class="space-y-3">
                            @foreach(($item['children'] ?? []) as $child)
                                <li><a href="{{ $child['url'] ?? '#' }}" target="{{ $child['target'] ?? '_self' }}" class="text-slate-400 hover:text-brand-accent transition-colors flex items-center gap-2"><i class="fas fa-chevron-right text-xs"></i> {{ $child['label'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
                <div>
                    <h4 class="text-lg font-bold mb-6 text-white border-b border-slate-700 pb-2 inline-block">Kontak</h4>
                    <ul class="space-y-3">
                        <li class="text-slate-400 flex items-center gap-2"><i class="fas fa-microchip text-brand-accent text-sm"></i> Sistem RFID Terpadu</li>
                        <li class="text-slate-400 flex items-center gap-2"><i class="fas fa-code text-brand-accent text-sm"></i> Pembuatan Aplikasi</li>
                        <li class="text-slate-400 flex items-center gap-2"><i class="fas fa-barcode text-brand-accent text-sm"></i> Kebutuhan Barcode</li>
                        <li class="text-slate-400 flex items-center gap-2"><i class="fas fa-wrench text-brand-accent text-sm"></i> Instalasi &amp; Maintenance</li>
                    </ul>
                </div>
            @else
                <div>
                    <h4 class="text-lg font-bold mb-6 text-white border-b border-slate-700 pb-2 inline-block">Navigasi Utama</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ url('/#beranda') }}" class="text-slate-400 hover:text-brand-accent transition-colors flex items-center gap-2"><i class="fas fa-chevron-right text-xs"></i> Beranda</a></li>
                        <li><a href="{{ url('/#tentang') }}" class="text-slate-400 hover:text-brand-accent transition-colors flex items-center gap-2"><i class="fas fa-chevron-right text-xs"></i> Tentang Kami</a></li>
                        <li><a href="{{ url('/page/produk') }}" class="text-slate-400 hover:text-brand-accent transition-colors flex items-center gap-2"><i class="fas fa-chevron-right text-xs"></i> Produk</a></li>
                        <li><a href="{{ url('/page/layanan') }}" class="text-slate-400 hover:text-brand-accent transition-colors flex items-center gap-2"><i class="fas fa-chevron-right text-xs"></i> Layanan</a></li>
                        <li><a href="{{ url('/#portofolio') }}" class="text-slate-400 hover:text-brand-accent transition-colors flex items-center gap-2"><i class="fas fa-chevron-right text-xs"></i> Portofolio</a></li>
                        <li><a href="{{ url('/blog') }}" class="text-slate-400 hover:text-brand-accent transition-colors flex items-center gap-2"><i class="fas fa-chevron-right text-xs"></i> Artikel</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-6 text-white border-b border-slate-700 pb-2 inline-block">Layanan Solusi</h4>
                    <ul class="space-y-3">
                        <li class="text-slate-400 flex items-center gap-2"><i class="fas fa-microchip text-brand-accent text-sm"></i> Sistem RFID Terpadu</li>
                        <li class="text-slate-400 flex items-center gap-2"><i class="fas fa-code text-brand-accent text-sm"></i> Pembuatan Aplikasi</li>
                        <li class="text-slate-400 flex items-center gap-2"><i class="fas fa-barcode text-brand-accent text-sm"></i> Kebutuhan Barcode</li>
                        <li class="text-slate-400 flex items-center gap-2"><i class="fas fa-wrench text-brand-accent text-sm"></i> Instalasi &amp; Maintenance</li>
                    </ul>
                </div>
            @endif
        </div>

        <div class="flex flex-col md:flex-row justify-between items-center text-sm text-slate-500">
            <p>&copy; {{ date('Y') }} {{ config('app.name', 'PT. Nexera Pandawa Innovatech') }}. Hak Cipta Dilindungi.</p>
            <div class="mt-4 md:mt-0 flex space-x-6">
                <a href="#" class="hover:text-white transition-colors">Kebijakan Privasi</a>
                <a href="#" class="hover:text-white transition-colors">Syarat &amp; Ketentuan</a>
            </div>
        </div>
    </div>
</footer>
