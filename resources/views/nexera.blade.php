<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PT. Nexera Pandawa Innovatech | Unlimited Innovation for the Future')</title>
    <meta name="description" content="@yield('meta_description', 'PT. Nexera Pandawa Innovatech - Spesialis teknologi RFID, pengembangan aplikasi, dan solusi perangkat keras untuk berbagai industri di Indonesia sejak 2020.')">
    <meta property="og:title" content="@yield('og_title', 'PT. Nexera Pandawa Innovatech | RFID & Tech Solutions')">
    <meta property="og:description" content="@yield('og_description', 'Unlimited Innovation for the Future - Solusi komprehensif RFID, Aplikasi, dan Perangkat Keras Industri.')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">

    {{-- Tailwind v4 (browser build) --}}
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

    {{-- Icons & Fonts --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style type="text/tailwindcss">
        @theme {
            --color-brand-blue: #0f172a;
            --color-brand-primary: #1d4ed8;
            --color-brand-accent: #06b6d4;
            --font-inter: 'Inter', sans-serif;
        }
        body {
            font-family: var(--font-inter);
        }
        .glass-nav {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(8px);
        }
        .hero-gradient {
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 100%);
        }
        a:focus-visible, button:focus-visible, input:focus-visible, textarea:focus-visible, select:focus-visible {
            outline: 3px solid var(--color-brand-accent);
            outline-offset: 2px;
        }
    </style>

    @stack('styles')
</head>
<body class="bg-slate-50 text-slate-800 antialiased selection:bg-brand-accent selection:text-white">

{{-- Navigasi --}}
<nav class="fixed w-full z-50 glass-nav border-b border-slate-200 transition-all duration-300" id="navbar" role="navigation" aria-label="Main Navigation">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20 items-center">
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ url('/#beranda') }}" class="text-2xl font-bold text-brand-blue tracking-tight hover:text-brand-primary transition-colors" aria-label="Beranda">
                    {{ config('app.name', 'NEXERA') }}<span class="text-brand-accent">.</span>
                </a>
            </div>

            {{-- Desktop Menu --}}
            <div class="hidden md:flex space-x-8 items-center" role="menubar">
                @if(!empty($menu) && !empty($menu->items))
                    @php $navItems = collect($menu->items)->sortBy('sort_order')->values(); @endphp
                    @foreach($navItems as $item)
                        @if(!empty($item['children']))
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
                            <a href="{{ $item['url'] }}" role="menuitem" class="text-slate-600 hover:text-brand-primary font-medium transition-colors">{{ $item['label'] }}</a>
                        @endif
                    @endforeach
                @else
                    <a href="{{ url('/#beranda') }}" class="text-slate-600 hover:text-brand-primary font-medium transition-colors" role="menuitem">Beranda</a>
                    <a href="{{ url('/#tentang') }}" class="text-slate-600 hover:text-brand-primary font-medium transition-colors" role="menuitem">Tentang Kami</a>
                    <a href="{{ url('/page/produk') }}" class="text-slate-600 hover:text-brand-primary font-medium transition-colors" role="menuitem">Produk</a>
                    <a href="{{ url('/page/layanan') }}" class="text-slate-600 hover:text-brand-primary font-medium transition-colors" role="menuitem">Layanan</a>
                    <a href="{{ url('/#portofolio') }}" class="text-slate-600 hover:text-brand-primary font-medium transition-colors" role="menuitem">Portofolio</a>
                    <a href="{{ url('/blog') }}" class="text-slate-600 hover:text-brand-primary font-medium transition-colors" role="menuitem">Artikel</a>
                @endif
                <a href="{{ url('/#kontak') }}" class="bg-brand-primary text-white px-6 py-2.5 rounded-full hover:bg-blue-800 transition-all font-medium shadow-md shadow-blue-500/30 transform hover:-translate-y-0.5" role="menuitem">
                    Hubungi Kami
                </a>
            </div>

            {{-- Mobile Menu Toggle --}}
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-btn" class="text-slate-600 hover:text-brand-primary focus:outline-none p-2" aria-label="Toggle navigation menu" aria-expanded="false" aria-controls="mobile-menu">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Menu Panel --}}
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-slate-100 shadow-xl absolute w-full" role="menu">
        <div class="px-4 pt-2 pb-6 space-y-2">
            @if(!empty($menu) && !empty($menu->items))
                @foreach(collect($menu->items)->sortBy('sort_order')->values() as $item)
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

{{-- Isi halaman: @extends('nexera') + @section('content') --}}
@yield('content')

{{-- Footer --}}
<footer class="bg-slate-900 text-slate-300 pt-16 pb-8 border-t-4 border-brand-accent">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12 border-b border-slate-800 pb-12">
            <div class="lg:col-span-2">
                <a href="{{ url('/') }}" class="text-3xl font-bold text-white tracking-tight mb-4 block">{{ config('app.name', 'NEXERA') }}<span class="text-brand-accent">.</span></a>
                <p class="text-slate-400 mb-6 max-w-md leading-relaxed">
                    {{ $footer_description ?? 'Spesialis teknologi terintegrasi di Indonesia yang fokus pada pemanfaatan RFID, pengembangan perangkat lunak kustom, dan pengadaan perangkat keras industri.' }}
                </p>
                <div class="flex space-x-4">
                    <a href="{{ config('website.social.linkedin', '#') }}" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center text-white hover:bg-brand-primary hover:text-white transition-colors" aria-label="LinkedIn">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="{{ config('website.social.instagram', '#') }}" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center text-white hover:bg-brand-primary hover:text-white transition-colors" aria-label="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="{{ config('website.social.facebook', '#') }}" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center text-white hover:bg-brand-primary hover:text-white transition-colors" aria-label="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </div>
            </div>

            @if(!empty($footerMenu) && !empty($footerMenu->items))
                @foreach(collect($footerMenu->items)->sortBy('sort_order')->values()->take(2) as $item)
                    <div>
                        <h4 class="text-lg font-bold mb-6 text-white border-b border-slate-700 pb-2 inline-block">{{ $item['label'] }}</h4>
                        <ul class="space-y-3">
                            @foreach(($item['children'] ?? []) as $child)
                                <li><a href="{{ $child['url'] ?? '#' }}" target="{{ $child['target'] ?? '_self' }}" class="text-slate-400 hover:text-brand-accent transition-colors flex items-center gap-2"><i class="fas fa-chevron-right text-xs"></i> {{ $child['label'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
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

{{-- Interaktivitas JS (dari nexera.html, Blade-safe) --}}
<script>
    // Prefill pesan kontak dari tombol produk/layanan
    function prefillPesan(text) {
        var pesan = document.getElementById('form-pesan');
        if (pesan) {
            pesan.value = text;
            var kontak = document.getElementById('kontak');
            if (kontak) kontak.scrollIntoView({ behavior: 'smooth' });
        }
    }

    // Switch tab produk (hardware / media)
    function switchProductTab(tabId) {
        var btnHardware = document.getElementById('tab-hardware');
        var btnMedia = document.getElementById('tab-media');
        var gridHardware = document.getElementById('grid-hardware');
        var gridMedia = document.getElementById('grid-media');
        if (!btnHardware || !btnMedia || !gridHardware || !gridMedia) return;

        var setActive = function (btn) { btn.className = "px-6 py-2.5 rounded-lg bg-brand-primary text-white text-sm font-bold transition-colors"; };
        var setInactive = function (btn) { btn.className = "px-6 py-2.5 rounded-lg bg-transparent text-slate-600 hover:bg-slate-50 text-sm font-bold transition-colors"; };

        if (tabId === 'hardware') {
            setActive(btnHardware); setInactive(btnMedia);
            gridHardware.classList.remove('hidden'); gridMedia.classList.add('hidden');
        } else {
            setActive(btnMedia); setInactive(btnHardware);
            gridMedia.classList.remove('hidden'); gridHardware.classList.add('hidden');
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        // Sticky navbar shadow + scrollspy
        var navbar = document.getElementById('navbar');
        var sections = document.querySelectorAll('section[id]');
        var navLinks = document.querySelectorAll('.hidden.md\\:flex a[role="menuitem"]');

        window.addEventListener('scroll', function () {
            if (!navbar) return;
            if (window.scrollY > 20) { navbar.classList.add('shadow-md'); }
            else { navbar.classList.remove('shadow-md'); }

            var currentSection = '';
            sections.forEach(function (section) {
                if (window.scrollY >= (section.offsetTop - 150)) {
                    currentSection = section.getAttribute('id');
                }
            });

            navLinks.forEach(function (link) {
                link.classList.remove('text-brand-primary', 'font-bold');
                var href = link.getAttribute('href') || '';
                if (currentSection !== '' && href.includes(currentSection)) {
                    if (!link.classList.contains('bg-brand-primary')) {
                        link.classList.add('text-brand-primary', 'font-bold');
                    }
                }
            });
        });

        // Mobile menu toggle
        var mobileBtn = document.getElementById('mobile-menu-btn');
        var mobileMenu = document.getElementById('mobile-menu');
        if (mobileBtn && mobileMenu) {
            mobileBtn.addEventListener('click', function () {
                var isHidden = mobileMenu.classList.contains('hidden');
                mobileMenu.classList.toggle('hidden');
                mobileBtn.setAttribute('aria-expanded', String(isHidden));
                mobileBtn.innerHTML = isHidden
                    ? '<i class="fas fa-times text-2xl"></i>'
                    : '<i class="fas fa-bars text-2xl"></i>';
            });
            mobileMenu.querySelectorAll('a').forEach(function (link) {
                link.addEventListener('click', function () {
                    mobileMenu.classList.add('hidden');
                    mobileBtn.setAttribute('aria-expanded', 'false');
                    mobileBtn.innerHTML = '<i class="fas fa-bars text-2xl"></i>';
                });
            });
        }

        // Filter portofolio
        var filterBtns = document.querySelectorAll('.portfolio-filter-btn');
        var portfolioItems = document.querySelectorAll('.portfolio-item');
        filterBtns.forEach(function (btn) {
            btn.addEventListener('click', function () {
                filterBtns.forEach(function (b) {
                    b.classList.remove('bg-brand-primary', 'text-white');
                    b.classList.add('bg-slate-100', 'text-slate-600');
                });
                btn.classList.remove('bg-slate-100', 'text-slate-600');
                btn.classList.add('bg-brand-primary', 'text-white');

                var filterValue = btn.getAttribute('data-filter');
                portfolioItems.forEach(function (item) {
                    if (filterValue === 'all' || item.classList.contains(filterValue)) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    });
</script>

@stack('scripts')
</body>
</html>
