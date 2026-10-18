@extends('cms::frontend.layouts.public')

@section('title', $homeEntry?->title ?? 'PT. Nexera Pandawa Innovatech | Unlimited Innovation for the Future')

@section('content')

@if ($homeHtml)
    {!! $homeHtml !!}
@else

{{-- Hero Section --}}
<section id="beranda" class="hero-gradient min-h-screen flex items-center pt-20 relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4wNykiLz48L3N2Zz4=')] opacity-50"></div>
    <div class="absolute top-1/4 right-0 w-96 h-96 bg-brand-accent/20 rounded-full blur-3xl -z-0"></div>
    <div class="absolute bottom-0 left-1/4 w-72 h-72 bg-brand-primary/30 rounded-full blur-3xl -z-0"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 py-20 lg:py-0 w-full">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="text-center lg:text-left">
                <div class="inline-flex items-center px-4 py-1.5 rounded-full bg-slate-800/50 border border-slate-700 backdrop-blur-sm text-brand-accent text-sm font-semibold mb-6 shadow-lg">
                    <span class="flex h-2 w-2 rounded-full bg-brand-accent mr-3 animate-pulse"></span>
                    Est. 2020 • Spesialis RFID Indonesia
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-6">
                    Unlimited <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-accent to-blue-400">Innovation</span><br />for the Future
                </h1>
                <p class="text-lg md:text-xl text-slate-300 mb-10 max-w-2xl mx-auto lg:mx-0 leading-relaxed font-light">
                    Mengintegrasikan perangkat mutakhir dan aplikasi cerdas untuk mentransformasi operasional bisnis di berbagai industri melalui teknologi RFID.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <a href="#kontak" class="bg-brand-primary text-white font-semibold px-8 py-4 rounded-full hover:bg-blue-600 transition-all shadow-lg shadow-blue-500/40 transform hover:-translate-y-1 text-center flex items-center justify-center gap-2">
                        Konsultasi Sekarang <i class="fas fa-arrow-right text-sm"></i>
                    </a>
                    <a href="#layanan" class="px-8 py-4 rounded-full border border-slate-500 text-white font-medium hover:bg-slate-800 transition-all text-center flex items-center justify-center gap-2 group">
                        Eksplorasi Layanan
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

{{-- Klien / Mitra Bisnis --}}
<section class="py-12 bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <p class="text-center text-sm font-semibold text-slate-400 uppercase tracking-wider mb-8">Dipercaya oleh Perusahaan Terkemuka</p>
        <div class="flex flex-wrap justify-center items-center gap-10 md:gap-16 opacity-70 grayscale hover:grayscale-0 transition-all duration-700">
            <div class="flex items-center gap-2 font-bold text-xl text-slate-800"><i class="fas fa-car-side text-brand-primary"></i> TMMIN</div>
            <div class="flex items-center gap-2 font-bold text-xl text-slate-800"><i class="fas fa-hospital text-brand-accent"></i> RS Premier</div>
            <div class="flex items-center gap-2 font-bold text-xl text-slate-800"><i class="fas fa-industry text-brand-primary"></i> Wings Group</div>
            <div class="flex items-center gap-2 font-bold text-xl text-slate-800"><i class="fas fa-bolt text-brand-primary"></i> LG Electronics</div>
        </div>
    </div>
</section>

{{-- Tentang Kami --}}
<section id="tentang" class="py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="relative group">
                <div class="absolute -inset-4 bg-gradient-to-tr from-brand-primary/20 to-brand-accent/20 rounded-3xl transform -rotate-3 z-0 transition-transform group-hover:rotate-0 duration-500"></div>
                <div class="relative z-10 bg-slate-800 rounded-2xl shadow-xl h-[500px] w-full flex items-center justify-center overflow-hidden border border-slate-700">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Tim PT Nexera Pandawa Innovatech Berkolaborasi" class="object-cover w-full h-full opacity-80 mix-blend-overlay hover:mix-blend-normal hover:opacity-100 transition-all duration-500" />
                </div>

                <div class="absolute -bottom-6 -right-6 bg-white p-6 rounded-2xl shadow-xl z-20 hidden md:flex items-center gap-4 border border-slate-100">
                    <div class="bg-brand-primary text-white w-14 h-14 rounded-xl flex items-center justify-center text-2xl shadow-inner">
                        <i class="fas fa-award"></i>
                    </div>
                    <div>
                        <p class="text-3xl font-bold text-slate-900">2020</p>
                        <p class="text-sm text-slate-500 font-medium">Berdiri Sejak</p>
                    </div>
                </div>
            </div>

            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 text-brand-primary font-semibold text-sm mb-4">
                    <i class="fas fa-info-circle"></i> Profil Perusahaan
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-6 leading-tight">Mitra Solusi Teknologi Anda.</h2>
                <p class="text-slate-600 mb-8 leading-relaxed text-lg">
                    PT. Nexera Pandawa Innovatech berawal dari dedikasi terhadap teknologi RFID dan kini telah berkembang menjadi penyedia solusi IT komprehensif, menghubungkan hardware andal dengan software cerdas.
                </p>

                <div class="space-y-4 mb-10">
                    <div class="bg-white p-5 rounded-xl shadow-sm border border-slate-200 border-l-4 border-l-brand-primary hover:shadow-md transition-shadow">
                        <h3 class="font-bold text-slate-900 mb-1 flex items-center gap-2">Visi Kami</h3>
                        <p class="text-slate-600 text-sm">Menjadi mitra terbaik dalam pengembangan teknologi kolaboratif dan solusi untuk semua industri.</p>
                    </div>
                    <div class="bg-white p-5 rounded-xl shadow-sm border border-slate-200 border-l-4 border-l-brand-accent hover:shadow-md transition-shadow">
                        <h3 class="font-bold text-slate-900 mb-1 flex items-center gap-2">Misi Kami</h3>
                        <p class="text-slate-600 text-sm">Selalu berusaha menghadirkan solusi teknologi terkini dan terus berinovasi untuk memberikan yang terbaik bagi pelanggan.</p>
                    </div>
                </div>

                <h3 class="text-xl font-bold text-slate-900 mb-6">Mengapa Memilih Nexera?</h3>
                <div class="grid sm:grid-cols-2 gap-6">
                    <div class="flex gap-4 items-start">
                        <div class="bg-blue-100 text-brand-primary w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                            <i class="fas fa-users-cog"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900">Expert Team</h4>
                            <p class="text-sm text-slate-500 mt-1">Tim profesional yang inovatif.</p>
                        </div>
                    </div>
                    <div class="flex gap-4 items-start">
                        <div class="bg-cyan-100 text-brand-accent w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                            <i class="fas fa-cubes"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900">Complete Solution</h4>
                            <p class="text-sm text-slate-500 mt-1">Solusi end-to-end terpadu.</p>
                        </div>
                    </div>
                    <div class="flex gap-4 items-start">
                        <div class="bg-blue-100 text-brand-primary w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900">Trusted &amp; Commitment</h4>
                            <p class="text-sm text-slate-500 mt-1">Integritas dan komitmen tinggi.</p>
                        </div>
                    </div>
                    <div class="flex gap-4 items-start">
                        <div class="bg-cyan-100 text-brand-accent w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900">Improve Tech</h4>
                            <p class="text-sm text-slate-500 mt-1">Teknologi yang berkelanjutan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Core Solutions / Layanan --}}
<section id="layanan" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 text-brand-primary font-semibold text-sm mb-4">
                <i class="fas fa-layer-group"></i> Core Solutions
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">Layanan Komprehensif Kami</h2>
            <p class="text-slate-600 text-lg">Pilar utama solusi teknologi yang siap mengoptimalkan proses bisnis dan memberikan nilai tambah pada organisasi Anda.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            {{-- Devices --}}
            <div class="bg-slate-50 rounded-2xl p-8 border border-slate-200 hover:shadow-xl transition-all duration-300 group hover:-translate-y-2">
                <div class="w-16 h-16 bg-white rounded-2xl shadow-sm flex items-center justify-center text-3xl text-brand-primary mb-6 group-hover:bg-brand-primary group-hover:text-white transition-colors">
                    <i class="fas fa-microchip"></i>
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-3">Devices</h3>
                <p class="text-slate-600 mb-6 text-sm leading-relaxed">
                    Penyediaan perangkat keras industri berkualitas yang handal untuk lingkungan kerja operasional yang menantang.
                </p>
                <ul class="space-y-3 mb-8 text-sm text-slate-700 font-medium">
                    <li class="flex items-center gap-3"><i class="fas fa-check-circle text-brand-accent"></i> RFID (Reader &amp; Antenna)</li>
                    <li class="flex items-center gap-3"><i class="fas fa-check-circle text-brand-accent"></i> Barcode Scanner</li>
                    <li class="flex items-center gap-3"><i class="fas fa-check-circle text-brand-accent"></i> Mobile Computer</li>
                    <li class="flex items-center gap-3"><i class="fas fa-check-circle text-brand-accent"></i> Printer Label</li>
                    <li class="flex items-center gap-3"><i class="fas fa-check-circle text-brand-accent"></i> Network Infrastructure</li>
                </ul>
                <button onclick="document.getElementById('form-layanan').value='Devices'; window.location.href='#kontak'" class="w-full py-3 px-4 bg-white border-2 border-brand-primary text-brand-primary font-bold rounded-xl hover:bg-brand-primary hover:text-white transition-colors">
                    Hubungi Pengadaan
                </button>
            </div>

            {{-- Application --}}
            <div class="bg-slate-900 rounded-2xl p-8 border border-slate-800 shadow-2xl relative overflow-hidden group transform md:-translate-y-4">
                <div class="absolute top-0 right-0 w-32 h-32 bg-brand-primary/30 rounded-bl-full -z-0"></div>
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-slate-800 rounded-2xl border border-slate-700 flex items-center justify-center text-3xl text-brand-accent mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-code"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-3">Application</h3>
                    <p class="text-slate-400 mb-6 text-sm leading-relaxed">
                        Pengembangan perangkat lunak kustom untuk menjembatani perangkat keras dengan kebutuhan manajemen data Anda.
                    </p>
                    <ul class="space-y-3 mb-8 text-sm text-slate-300 font-medium">
                        <li class="flex items-center gap-3"><i class="fas fa-check-circle text-brand-accent"></i> Web Applications</li>
                        <li class="flex items-center gap-3"><i class="fas fa-check-circle text-brand-accent"></i> Mobile Apps (Android/iOS)</li>
                        <li class="flex items-center gap-3"><i class="fas fa-check-circle text-brand-accent"></i> Desktop Applications</li>
                        <li class="flex items-center gap-3"><i class="fas fa-check-circle text-brand-accent"></i> Website Development</li>
                    </ul>
                    <button onclick="document.getElementById('form-layanan').value='Application'; window.location.href='#kontak'" class="w-full py-3 px-4 bg-brand-primary text-white font-bold rounded-xl hover:bg-blue-600 transition-colors shadow-lg shadow-blue-500/20">
                        Mulai Proyek App
                    </button>
                </div>
            </div>

            {{-- Services --}}
            <div class="bg-slate-50 rounded-2xl p-8 border border-slate-200 hover:shadow-xl transition-all duration-300 group hover:-translate-y-2">
                <div class="w-16 h-16 bg-white rounded-2xl shadow-sm flex items-center justify-center text-3xl text-brand-primary mb-6 group-hover:bg-brand-primary group-hover:text-white transition-colors">
                    <i class="fas fa-cogs"></i>
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-3">Services</h3>
                <p class="text-slate-600 mb-6 text-sm leading-relaxed">
                    Dukungan profesional berkelanjutan mulai dari desain sistem, pemasangan, hingga pemeliharaan jangka panjang.
                </p>
                <ul class="space-y-3 mb-8 text-sm text-slate-700 font-medium">
                    <li class="flex items-center gap-3"><i class="fas fa-check-circle text-brand-accent"></i> Installation &amp; Setup</li>
                    <li class="flex items-center gap-3"><i class="fas fa-check-circle text-brand-accent"></i> Solutions Consultant</li>
                    <li class="flex items-center gap-3"><i class="fas fa-check-circle text-brand-accent"></i> System Maintenance</li>
                    <li class="flex items-center gap-3"><i class="fas fa-check-circle text-brand-accent"></i> Technical Training</li>
                </ul>
                <button onclick="document.getElementById('form-layanan').value='Services'; window.location.href='#kontak'" class="w-full py-3 px-4 bg-white border-2 border-brand-primary text-brand-primary font-bold rounded-xl hover:bg-brand-primary hover:text-white transition-colors">
                    Jadwalkan Konsultasi
                </button>
            </div>
        </div>
    </div>
</section>

{{-- Produk & Perangkat --}}
<section id="produk" class="py-24 bg-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-end mb-12">
            <div class="max-w-2xl">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-100 text-brand-primary font-semibold text-sm mb-4">
                    <i class="fas fa-tags"></i> Katalog Produk
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">Eksplorasi Perangkat Kami</h2>
                <p class="text-slate-600">Beragam hardware dan media supply industri dari merek terkemuka yang siap mendukung efisiensi operasional.</p>
            </div>
            <div class="mt-6 md:mt-0 flex gap-2 p-1 bg-white rounded-xl shadow-sm border border-slate-200">
                <button class="px-6 py-2.5 rounded-lg bg-brand-primary text-white text-sm font-bold transition-colors" id="tab-hardware" onclick="switchProductTab('hardware')">Perangkat Keras</button>
                <button class="px-6 py-2.5 rounded-lg bg-transparent text-slate-600 hover:bg-slate-50 text-sm font-bold transition-colors" id="tab-media" onclick="switchProductTab('media')">Media Supply</button>
            </div>
        </div>

        {{-- Hardware Grid --}}
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" id="grid-hardware">
            <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all border border-slate-200 group flex flex-col h-full">
                <div class="h-48 bg-slate-50 p-6 flex justify-center items-center group-hover:bg-slate-100 transition-colors">
                    <i class="fas fa-wifi text-6xl text-slate-300 group-hover:text-brand-primary transition-colors"></i>
                </div>
                <div class="p-6 flex-grow flex flex-col">
                    <h3 class="text-lg font-bold text-slate-900 mb-1">RFID Systems</h3>
                    <p class="text-slate-600 text-sm mb-4 flex-grow">RFID Reader, Antenna industri, dan perangkat pemindai jarak jauh.</p>
                    <button onclick="prefillPesan('Halo, saya ingin menanyakan detail tentang produk RFID Systems...')" class="w-full py-2 rounded-lg bg-slate-100 text-brand-primary font-semibold hover:bg-brand-primary hover:text-white transition-colors text-sm">
                        Tanya Detail
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all border border-slate-200 group flex flex-col h-full">
                <div class="h-48 bg-slate-50 p-6 flex justify-center items-center group-hover:bg-slate-100 transition-colors">
                    <i class="fas fa-mobile-screen text-6xl text-slate-300 group-hover:text-brand-primary transition-colors"></i>
                </div>
                <div class="p-6 flex-grow flex flex-col">
                    <h3 class="text-lg font-bold text-slate-900 mb-1">Mobile Computer</h3>
                    <p class="text-slate-600 text-sm mb-4 flex-grow">Komputer genggam tangguh (rugged PDA) untuk mobilitas data.</p>
                    <button onclick="prefillPesan('Halo, saya ingin menanyakan detail tentang produk Mobile Computer...')" class="w-full py-2 rounded-lg bg-slate-100 text-brand-primary font-semibold hover:bg-brand-primary hover:text-white transition-colors text-sm">
                        Tanya Detail
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all border border-slate-200 group flex flex-col h-full">
                <div class="h-48 bg-slate-50 p-6 flex justify-center items-center group-hover:bg-slate-100 transition-colors">
                    <i class="fas fa-print text-6xl text-slate-300 group-hover:text-brand-primary transition-colors"></i>
                </div>
                <div class="p-6 flex-grow flex flex-col">
                    <h3 class="text-lg font-bold text-slate-900 mb-1">Printer Label</h3>
                    <p class="text-slate-600 text-sm mb-4 flex-grow">Printer barcode industri dan desktop untuk pencetakan label massal.</p>
                    <button onclick="prefillPesan('Halo, saya ingin menanyakan detail tentang produk Printer Label...')" class="w-full py-2 rounded-lg bg-slate-100 text-brand-primary font-semibold hover:bg-brand-primary hover:text-white transition-colors text-sm">
                        Tanya Detail
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all border border-slate-200 group flex flex-col h-full">
                <div class="h-48 bg-slate-50 p-6 flex justify-center items-center group-hover:bg-slate-100 transition-colors">
                    <i class="fas fa-barcode text-6xl text-slate-300 group-hover:text-brand-primary transition-colors"></i>
                </div>
                <div class="p-6 flex-grow flex flex-col">
                    <h3 class="text-lg font-bold text-slate-900 mb-1">Barcode Scanner</h3>
                    <p class="text-slate-600 text-sm mb-4 flex-grow">Pemindai 1D/2D berkabel maupun nirkabel untuk kasir &amp; gudang.</p>
                    <button onclick="prefillPesan('Halo, saya ingin menanyakan detail tentang produk Barcode Scanner...')" class="w-full py-2 rounded-lg bg-slate-100 text-brand-primary font-semibold hover:bg-brand-primary hover:text-white transition-colors text-sm">
                        Tanya Detail
                    </button>
                </div>
            </div>
        </div>

        {{-- Media Supply Grid (Hidden by default) --}}
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 hidden" id="grid-media">
            <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all border border-slate-200 group flex flex-col h-full">
                <div class="h-48 bg-slate-50 p-6 flex justify-center items-center group-hover:bg-slate-100 transition-colors">
                    <i class="fas fa-sim-card text-6xl text-slate-300 group-hover:text-brand-accent transition-colors"></i>
                </div>
                <div class="p-6 flex-grow flex flex-col">
                    <h3 class="text-lg font-bold text-slate-900 mb-1">RFID Tags</h3>
                    <p class="text-slate-600 text-sm mb-4 flex-grow">Beragam jenis tag UHF/HF (Label, Hard Tag, Metal Tag) untuk identifikasi unik aset.</p>
                    <button onclick="prefillPesan('Halo, saya tertarik dengan RFID Tags...')" class="w-full py-2 rounded-lg bg-slate-100 text-brand-primary font-semibold hover:bg-brand-primary hover:text-white transition-colors text-sm">Tanya Detail</button>
                </div>
            </div>

            <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all border border-slate-200 group flex flex-col h-full">
                <div class="h-48 bg-slate-50 p-6 flex justify-center items-center group-hover:bg-slate-100 transition-colors">
                    <i class="fas fa-sticky-note text-6xl text-slate-300 group-hover:text-brand-accent transition-colors"></i>
                </div>
                <div class="p-6 flex-grow flex flex-col">
                    <h3 class="text-lg font-bold text-slate-900 mb-1">Label &amp; Ribbon</h3>
                    <p class="text-slate-600 text-sm mb-4 flex-grow">Media cetak thermal transfer berkualitas untuk daya tahan informasi pada barang.</p>
                    <button onclick="prefillPesan('Halo, saya tertarik dengan Label &amp; Ribbon...')" class="w-full py-2 rounded-lg bg-slate-100 text-brand-primary font-semibold hover:bg-brand-primary hover:text-white transition-colors text-sm">Tanya Detail</button>
                </div>
            </div>

            <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all border border-slate-200 group flex flex-col h-full">
                <div class="h-48 bg-slate-50 p-6 flex justify-center items-center group-hover:bg-slate-100 transition-colors">
                    <i class="fas fa-receipt text-6xl text-slate-300 group-hover:text-brand-accent transition-colors"></i>
                </div>
                <div class="p-6 flex-grow flex flex-col">
                    <h3 class="text-lg font-bold text-slate-900 mb-1">Thermal Paper</h3>
                    <p class="text-slate-600 text-sm mb-4 flex-grow">Kertas thermal standar untuk struk, mesin kasir (POS), dan printer mobile.</p>
                    <button onclick="prefillPesan('Halo, saya tertarik dengan Thermal Paper...')" class="w-full py-2 rounded-lg bg-slate-100 text-brand-primary font-semibold hover:bg-brand-primary hover:text-white transition-colors text-sm">Tanya Detail</button>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Portofolio --}}
<section id="portofolio" class="py-24 bg-white relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 text-brand-primary font-semibold text-sm mb-4">
                <i class="fas fa-briefcase"></i> Kisah Sukses
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">Portofolio &amp; Implementasi</h2>
            <p class="text-slate-600 text-lg">Kepercayaan klien besar adalah bukti komitmen kami dalam memberikan solusi nyata.</p>
        </div>

        {{-- Filter Bar --}}
        <div class="flex justify-center flex-wrap gap-2 mb-12">
            <button class="portfolio-filter-btn active px-6 py-2 rounded-full text-sm font-bold bg-brand-primary text-white" data-filter="all">Semua Proyek</button>
            <button class="portfolio-filter-btn px-6 py-2 rounded-full text-sm font-bold bg-slate-100 text-slate-600 hover:bg-slate-200" data-filter="rfid">Sistem RFID</button>
            <button class="portfolio-filter-btn px-6 py-2 rounded-full text-sm font-bold bg-slate-100 text-slate-600 hover:bg-slate-200" data-filter="app">Aplikasi Khusus</button>
        </div>

        {{-- Portfolio Grid --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="portfolio-item rfid bg-white rounded-2xl border border-slate-200 overflow-hidden hover:shadow-xl transition-all group">
                <div class="h-56 bg-slate-900 relative p-6 flex flex-col justify-end">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/60 to-transparent z-10"></div>
                    <i class="fas fa-car-side absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-7xl text-white/10 group-hover:scale-110 transition-transform duration-500"></i>
                    <div class="relative z-20">
                        <span class="inline-block px-3 py-1 bg-brand-accent text-white text-xs font-bold rounded-md mb-3">Manufaktur</span>
                        <h3 class="text-xl font-bold text-white">Toyota Motor (TMMIN)</h3>
                    </div>
                </div>
                <div class="p-6">
                    <p class="text-brand-primary font-semibold text-sm mb-2">Implementasi RFID Tracking</p>
                    <p class="text-slate-600 text-sm mb-4">Sistem pelacakan inventaris komponen otomotif secara otomatis di lini produksi untuk efisiensi rantai pasok.</p>
                </div>
            </div>

            <div class="portfolio-item rfid bg-white rounded-2xl border border-slate-200 overflow-hidden hover:shadow-xl transition-all group">
                <div class="h-56 bg-slate-900 relative p-6 flex flex-col justify-end">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/60 to-transparent z-10"></div>
                    <i class="fas fa-hospital absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-7xl text-white/10 group-hover:scale-110 transition-transform duration-500"></i>
                    <div class="relative z-20">
                        <span class="inline-block px-3 py-1 bg-brand-accent text-white text-xs font-bold rounded-md mb-3">Kesehatan</span>
                        <h3 class="text-xl font-bold text-white">RS Premier Bintaro</h3>
                    </div>
                </div>
                <div class="p-6">
                    <p class="text-brand-primary font-semibold text-sm mb-2">Asset Management System</p>
                    <p class="text-slate-600 text-sm mb-4">Integrasi RFID untuk pelacakan dan audit alat-alat medis kritis rumah sakit secara cepat dan presisi.</p>
                </div>
            </div>

            <div class="portfolio-item app bg-white rounded-2xl border border-slate-200 overflow-hidden hover:shadow-xl transition-all group">
                <div class="h-56 bg-slate-900 relative p-6 flex flex-col justify-end">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/60 to-transparent z-10"></div>
                    <i class="fas fa-running absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-7xl text-white/10 group-hover:scale-110 transition-transform duration-500"></i>
                    <div class="relative z-20">
                        <span class="inline-block px-3 py-1 bg-brand-accent text-white text-xs font-bold rounded-md mb-3">Event &amp; Olahraga</span>
                        <h3 class="text-xl font-bold text-white">Tahura Trail Run</h3>
                    </div>
                </div>
                <div class="p-6">
                    <p class="text-brand-primary font-semibold text-sm mb-2">Timing System Application</p>
                    <p class="text-slate-600 text-sm mb-4">Aplikasi pencatatan waktu peserta lari terintegrasi sensor cerdas dengan dashboard analitik real-time.</p>
                </div>
            </div>
        </div>

        {{-- Highlight Success Story --}}
        <div class="mt-16 bg-slate-900 rounded-3xl p-8 md:p-12 text-white shadow-2xl relative overflow-hidden border border-slate-800">
            <div class="absolute -right-20 -bottom-20 opacity-10">
                <i class="fas fa-quote-right text-[250px]"></i>
            </div>
            <div class="relative z-10 max-w-4xl">
                <div class="flex items-center gap-2 text-brand-accent font-bold mb-6">
                    <i class="fas fa-star"></i> SUCCESS STORY HIGHLIGHT
                </div>
                <p class="text-xl md:text-2xl font-light italic mb-8 leading-relaxed">
                    "Implementasi Smart Laundry System dengan teknologi UHF RFID dari Nexera telah memangkas waktu inventarisasi linen kami hingga <span class="font-bold text-brand-accent">80%</span> dan mengeliminasi kesalahan hitung manual yang sering terjadi."
                </p>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-slate-700 rounded-full flex items-center justify-center text-xl">
                        <i class="fas fa-user text-slate-400"></i>
                    </div>
                    <div>
                        <p class="font-bold">Manajer Operasional</p>
                        <p class="text-sm text-slate-400">Obsesiman Laundry</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Kontak --}}
<section id="kontak" class="py-24 bg-slate-50 border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-5 gap-12 lg:gap-16">
            {{-- Info Kontak --}}
            <div class="lg:col-span-2">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-100 text-brand-primary font-semibold text-sm mb-4">
                    <i class="fas fa-headset"></i> Mari Berdiskusi
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-6">Hubungi Tim Kami</h2>
                <p class="text-slate-600 mb-8 text-lg">Punya pertanyaan atau siap memulai transformasi digital? Konsultan kami siap mendengarkan kebutuhan unik Anda.</p>

                <div class="space-y-4">
                    <a href="https://wa.me/6285697832022" target="_blank" rel="noopener noreferrer" class="flex items-center gap-5 p-5 bg-white rounded-2xl border border-slate-200 hover:border-green-400 hover:shadow-lg transition-all group">
                        <div class="w-14 h-14 bg-green-50 text-green-500 rounded-xl flex items-center justify-center text-3xl group-hover:bg-green-500 group-hover:text-white transition-colors">
                            <i class="fab fa-whatsapp"></i>
                        </div>
                        <div>
                            <p class="text-sm text-slate-500 font-medium">WhatsApp - Jakarta</p>
                            <p class="text-lg font-bold text-slate-900">Aryo Bayu</p>
                            <p class="text-brand-primary font-semibold">+62 856 9783 2022</p>
                        </div>
                    </a>

                    <a href="https://wa.me/62818889312" target="_blank" rel="noopener noreferrer" class="flex items-center gap-5 p-5 bg-white rounded-2xl border border-slate-200 hover:border-green-400 hover:shadow-lg transition-all group">
                        <div class="w-14 h-14 bg-green-50 text-green-500 rounded-xl flex items-center justify-center text-3xl group-hover:bg-green-500 group-hover:text-white transition-colors">
                            <i class="fab fa-whatsapp"></i>
                        </div>
                        <div>
                            <p class="text-sm text-slate-500 font-medium">WhatsApp - Tangerang</p>
                            <p class="text-lg font-bold text-slate-900">Nouval Gucci</p>
                            <p class="text-brand-primary font-semibold">+62 81 888 9312</p>
                        </div>
                    </a>

                    <a href="https://wa.me/628111040159" target="_blank" rel="noopener noreferrer" class="flex items-center gap-5 p-5 bg-white rounded-2xl border border-slate-200 hover:border-green-400 hover:shadow-lg transition-all group">
                        <div class="w-14 h-14 bg-green-50 text-green-500 rounded-xl flex items-center justify-center text-3xl group-hover:bg-green-500 group-hover:text-white transition-colors">
                            <i class="fab fa-whatsapp"></i>
                        </div>
                        <div>
                            <p class="text-sm text-slate-500 font-medium">WhatsApp - Yogyakarta</p>
                            <p class="text-lg font-bold text-slate-900">Itok Toni</p>
                            <p class="text-brand-primary font-semibold">+62 811 1040 159</p>
                        </div>
                    </a>

                    <a href="mailto:nexerapandawa@gmail.com" class="flex items-center gap-5 p-5 bg-white rounded-2xl border border-slate-200 hover:border-blue-400 hover:shadow-lg transition-all group">
                        <div class="w-14 h-14 bg-blue-50 text-brand-primary rounded-xl flex items-center justify-center text-2xl group-hover:bg-brand-primary group-hover:text-white transition-colors">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <p class="text-sm text-slate-500 font-medium">Email Resmi</p>
                            <p class="text-lg font-bold text-slate-900">sales@nexeratech.co.id</p>
                        </div>
                    </a>
                </div>
            </div>

            {{-- Formulir Kontak --}}
            <div class="lg:col-span-3">
                <div class="bg-white rounded-3xl shadow-xl p-8 md:p-10 border border-slate-200">
                    <h3 class="text-2xl font-bold text-slate-900 mb-6 pb-4 border-b border-slate-100">Kirim Pesan Langsung</h3>

                    @if(session('success'))
                        <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-r-lg flex items-start" role="alert">
                            <i class="fas fa-check-circle text-green-500 mt-0.5 mr-3 text-lg"></i>
                            <div>
                                <p class="text-green-800 font-bold">Pesan Terkirim!</p>
                                <p class="text-sm text-green-700 mt-1">{{ session('success') }}</p>
                            </div>
                        </div>
                    @endif

                    <form id="contact-form" method="POST" action="{{ route('contact.post') }}" novalidate onsubmit="return composeAndSubmit(event)">
                        @csrf

                        <div class="grid md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="nama" class="block text-sm font-semibold text-slate-700 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                                <input type="text" id="nama" name="name" value="{{ old('name') }}" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-brand-primary focus:border-brand-primary focus:bg-white outline-none transition-all @error('name') border-red-500 @enderror" placeholder="John Doe">
                                @error('name')<p class="text-red-500 text-xs mt-1 font-medium"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">Alamat Email <span class="text-red-500">*</span></label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-brand-primary focus:border-brand-primary focus:bg-white outline-none transition-all @error('email') border-red-500 @enderror" placeholder="email@perusahaan.com">
                                @error('email')<p class="text-red-500 text-xs mt-1 font-medium"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="telepon" class="block text-sm font-semibold text-slate-700 mb-2">No. WhatsApp/Telepon <span class="text-red-500">*</span></label>
                                <input type="tel" id="telepon" name="telepon" value="{{ old('telepon') }}" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-brand-primary focus:border-brand-primary focus:bg-white outline-none transition-all" placeholder="0812xxxxxx">
                            </div>
                            <div>
                                <label for="perusahaan" class="block text-sm font-semibold text-slate-700 mb-2">Perusahaan/Instansi</label>
                                <input type="text" id="perusahaan" name="perusahaan" value="{{ old('perusahaan') }}" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-brand-primary focus:border-brand-primary focus:bg-white outline-none transition-all" placeholder="PT / CV / Instansi">
                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="form-layanan" class="block text-sm font-semibold text-slate-700 mb-2">Topik Kebutuhan <span class="text-red-500">*</span></label>
                            <select id="form-layanan" name="subject" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-brand-primary focus:border-brand-primary focus:bg-white outline-none transition-all appearance-none cursor-pointer @error('subject') border-red-500 @enderror">
                                <option value="" disabled {{ old('subject') ? '' : 'selected' }}>Pilih Layanan</option>
                                <option value="Solusi &amp; Sistem RFID" {{ old('subject') == 'Solusi & Sistem RFID' ? 'selected' : '' }}>Solusi &amp; Sistem RFID</option>
                                <option value="Pembuatan Web / Aplikasi Mobile" {{ old('subject') == 'Pembuatan Web / Aplikasi Mobile' ? 'selected' : '' }}>Pembuatan Web / Aplikasi Mobile</option>
                                <option value="Kebutuhan Hardware (Scanner/Printer)" {{ old('subject') == 'Kebutuhan Hardware (Scanner/Printer)' ? 'selected' : '' }}>Kebutuhan Hardware (Scanner/Printer)</option>
                                <option value="Konsultasi / Instalasi / Maintenance" {{ old('subject') == 'Konsultasi / Instalasi / Maintenance' ? 'selected' : '' }}>Konsultasi / Instalasi / Maintenance</option>
                                <option value="Pertanyaan Umum Lainnya" {{ old('subject') == 'Pertanyaan Umum Lainnya' ? 'selected' : '' }}>Pertanyaan Umum Lainnya</option>
                            </select>
                            @error('subject')<p class="text-red-500 text-xs mt-1 font-medium"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>@enderror
                        </div>

                        <div class="mb-6">
                            <label for="form-pesan" class="block text-sm font-semibold text-slate-700 mb-2">Pesan Detail <span class="text-red-500">*</span></label>
                            <textarea id="form-pesan" name="message" rows="4" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-brand-primary focus:border-brand-primary focus:bg-white outline-none transition-all resize-y @error('message') border-red-500 @enderror" placeholder="Ceritakan detail masalah atau kebutuhan sistem Anda...">{{ old('message') }}</textarea>
                            @error('message')<p class="text-red-500 text-xs mt-1 font-medium"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>@enderror
                        </div>

                        {{-- Honeypot --}}
                        <div class="hidden" aria-hidden="true">
                            <label>Jangan isi ini</label>
                            <input type="text" name="website" value="" autocomplete="off" tabindex="-1" />
                        </div>

                        {{-- CAPTCHA --}}
                        <div class="mb-8">
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Captcha <span class="text-red-500">*</span></label>
                            <div class="flex items-center gap-4">
                                <img src="{{ route('captcha.contact', ['key' => $captchaKey = uniqid()]) }}" alt="Captcha" class="rounded-lg border border-slate-200" style="height:56px;" id="captcha-image" />
                                <button type="button" onclick="document.getElementById('captcha-image').src='{{ route('captcha.contact') }}?key='+document.querySelector('input[name=captcha_key]').value+'&_='+Date.now()" class="px-4 py-2.5 bg-slate-100 border border-slate-200 rounded-xl text-sm hover:bg-slate-200 transition-colors">
                                    <i class="fas fa-rotate-right"></i> Refresh
                                </button>
                            </div>
                            <input type="hidden" name="captcha_key" value="{{ $captchaKey }}">
                            <input type="text" name="captcha" required placeholder="Masukkan hasil captcha" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-brand-primary focus:border-brand-primary focus:bg-white outline-none transition-all mt-3 @error('captcha') border-red-500 @enderror" />
                            @error('captcha')<p class="text-red-500 text-xs mt-1 font-medium"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>@enderror
                        </div>

                        <button type="submit" id="btn-submit" class="w-full bg-brand-primary text-white font-bold py-4 rounded-xl hover:bg-blue-800 transition-all shadow-lg shadow-blue-500/30 flex justify-center items-center gap-2">
                            <span>Kirim Pesan Sekarang</span>
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endif

@endsection

@push('scripts')
<script>
    // Prefill contact message from product/service buttons
    function prefillPesan(text) {
        var pesan = document.getElementById('form-pesan');
        if (pesan) {
            pesan.value = text;
            var kontak = document.getElementById('kontak');
            if (kontak) kontak.scrollIntoView({ behavior: 'smooth' });
        }
    }

    // Switch product tabs (hardware / media supply)
    function switchProductTab(tabId) {
        var btnHardware = document.getElementById('tab-hardware');
        var btnMedia = document.getElementById('tab-media');
        var gridHardware = document.getElementById('grid-hardware');
        var gridMedia = document.getElementById('grid-media');
        if (!btnHardware || !btnMedia || !gridHardware || !gridMedia) return;

        var activeCls = ['px-6', 'py-2.5', 'rounded-lg', 'bg-brand-primary', 'text-white', 'text-sm', 'font-bold', 'transition-colors'];
        var inactiveCls = ['px-6', 'py-2.5', 'rounded-lg', 'bg-transparent', 'text-slate-600', 'hover:bg-slate-50', 'text-sm', 'font-bold', 'transition-colors'];

        function apply(btn, active) {
            btn.className = (active ? activeCls : inactiveCls).join(' ');
        }

        if (tabId === 'hardware') {
            apply(btnHardware, true); apply(btnMedia, false);
            gridHardware.classList.remove('hidden');
            gridMedia.classList.add('hidden');
        } else {
            apply(btnMedia, true); apply(btnHardware, false);
            gridMedia.classList.remove('hidden');
            gridHardware.classList.add('hidden');
        }
    }

    // Portfolio filter
    document.addEventListener('DOMContentLoaded', function() {
        var filterBtns = document.querySelectorAll('.portfolio-filter-btn');
        var portfolioItems = document.querySelectorAll('.portfolio-item');
        filterBtns.forEach(function(btn) {
            btn.addEventListener('click', function() {
                filterBtns.forEach(function(b) {
                    b.classList.remove('bg-brand-primary', 'text-white');
                    b.classList.add('bg-slate-100', 'text-slate-600');
                });
                btn.classList.remove('bg-slate-100', 'text-slate-600');
                btn.classList.add('bg-brand-primary', 'text-white');
                var filterValue = btn.getAttribute('data-filter');
                portfolioItems.forEach(function(item) {
                    if (filterValue === 'all' || item.classList.contains(filterValue)) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    });

    // Fold phone/company into message before submitting to the backend
    function composeAndSubmit(e) {
        var form = e.target;
        var pesan = document.getElementById('form-pesan');
        var telepon = (document.getElementById('telepon') || {}).value || '';
        var perusahaan = (document.getElementById('perusahaan') || {}).value || '';
        var extras = [];
        if (telepon.trim()) extras.push('Telepon: ' + telepon.trim());
        if (perusahaan.trim()) extras.push('Perusahaan: ' + perusahaan.trim());
        if (pesan && extras.length) {
            pesan.value = pesan.value + "\n\n" + extras.join("\n");
        }
        // basic HTML5 validation gate
        if (typeof form.checkValidity === 'function' && !form.checkValidity()) {
            form.reportValidity();
            return false;
        }
        return true;
    }
</script>
@endpush
