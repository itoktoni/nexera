<nav class="fixed w-full z-50 glass-nav border-b border-slate-200 transition-all duration-300" id="navbar" role="navigation" aria-label="Main Navigation">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20 items-center">
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ url('/') }}" class="text-2xl font-bold text-brand-blue tracking-tight hover:text-brand-primary transition-colors" aria-label="Beranda">
                    {{ config('app.name', 'NEXERA') }}<span class="text-brand-accent">.</span>
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-8 items-center" role="menubar">
                @if($menu && $menu->items)
                    @php $navItems = collect($menu->items)->sortBy('sort_order')->values(); @endphp
                    @foreach($navItems as $item)
                        @if(!empty($item['children']) && count($item['children']) > 0)
                            <div class="relative group">
                                <button class="text-slate-600 hover:text-brand-primary font-medium transition-colors flex items-center gap-1" role="menuitem">
                                    {{ $item['label'] }}
                                    <i class="fas fa-chevron-down text-xs transition-transform group-hover:rotate-180"></i>
                                </button>
                                <div class="absolute left-0 top-full pt-3 hidden group-hover:block z-50">
                                    <div class="bg-white rounded-xl shadow-xl border border-slate-200 py-2 min-w-[220px]">
                                        @foreach($item['children'] as $child)
                                            <a href="{{ $child['url'] ?? '#' }}" target="{{ $child['target'] ?? '_self' }}" class="flex items-center gap-2 px-4 py-2.5 text-sm text-slate-600 hover:text-brand-primary hover:bg-slate-50 transition-colors">
                                                {{ $child['label'] }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @else
                            <a href="{{ $item['url'] }}" role="menuitem" class="text-slate-600 hover:text-brand-primary font-medium transition-colors {{ request()->is(trim($item['url'],'/').'*') ? 'text-brand-primary font-bold' : '' }}">{{ $item['label'] }}</a>
                        @endif
                    @endforeach
                @else
                    <a href="{{ url('/#beranda') }}" role="menuitem" class="text-slate-600 hover:text-brand-primary font-medium transition-colors">Beranda</a>
                    <a href="{{ url('/#tentang') }}" role="menuitem" class="text-slate-600 hover:text-brand-primary font-medium transition-colors">Tentang Kami</a>
                    <a href="{{ url('/page/produk') }}" role="menuitem" class="text-slate-600 hover:text-brand-primary font-medium transition-colors">Produk</a>
                    <a href="{{ url('/page/layanan') }}" role="menuitem" class="text-slate-600 hover:text-brand-primary font-medium transition-colors">Layanan</a>
                    <a href="{{ url('/#portofolio') }}" role="menuitem" class="text-slate-600 hover:text-brand-primary font-medium transition-colors">Portofolio</a>
                    <a href="{{ url('/blog') }}" role="menuitem" class="text-slate-600 hover:text-brand-primary font-medium transition-colors">Artikel</a>
                @endif
                <a href="{{ url('/#kontak') }}" class="bg-brand-primary text-white px-6 py-2.5 rounded-full hover:bg-blue-800 transition-all font-medium shadow-md shadow-blue-500/30 transform hover:-translate-y-0.5" role="menuitem">
                    Hubungi Kami
                </a>
            </div>

            <!-- Mobile Menu Toggle -->
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-btn" class="text-slate-600 hover:text-brand-primary focus:outline-none p-2" aria-label="Toggle navigation menu" aria-expanded="false" aria-controls="mobile-menu">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Panel -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-slate-100 shadow-xl absolute w-full" role="menu">
        <div class="px-4 pt-2 pb-6 space-y-2">
            @if($menu && $menu->items)
                @php $navItemsMobile = collect($menu->items)->sortBy('sort_order')->values(); @endphp
                @foreach($navItemsMobile as $item)
                    <a href="{{ $item['url'] }}" class="block px-4 py-3 text-base font-medium text-slate-700 hover:text-brand-primary hover:bg-slate-50 rounded-lg">{{ $item['label'] }}</a>
                @endforeach
            @else
                <a href="{{ url('/#beranda') }}" class="block px-4 py-3 text-base font-medium text-slate-700 hover:text-brand-primary hover:bg-slate-50 rounded-lg">Beranda</a>
                <a href="{{ url('/#tentang') }}" class="block px-4 py-3 text-base font-medium text-slate-700 hover:text-brand-primary hover:bg-slate-50 rounded-lg">Tentang Kami</a>
                <a href="{{ url('/page/produk') }}" class="block px-4 py-3 text-base font-medium text-slate-700 hover:text-brand-primary hover:bg-slate-50 rounded-lg">Produk</a>
                <a href="{{ url('/page/layanan') }}" class="block px-4 py-3 text-base font-medium text-slate-700 hover:text-brand-primary hover:bg-slate-50 rounded-lg">Layanan</a>
                <a href="{{ url('/#portofolio') }}" class="block px-4 py-3 text-base font-medium text-slate-700 hover:text-brand-primary hover:bg-slate-50 rounded-lg">Portofolio</a>
                <a href="{{ url('/blog') }}" class="block px-4 py-3 text-base font-medium text-slate-700 hover:text-brand-primary hover:bg-slate-50 rounded-lg">Artikel</a>
            @endif
            <a href="{{ url('/#kontak') }}" class="block px-4 py-3 text-base font-medium text-white bg-brand-primary rounded-lg text-center mt-4">Hubungi Kami</a>
        </div>
    </div>
</nav>
