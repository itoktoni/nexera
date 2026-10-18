@php
    // Data shape: meta['about'] = subtitle, title, description, image, year, year_label,
    //   visi_title, visi, misi_title, misi, features_heading, features[{icon,title,description}]
    $s = $data['about'] ?? $data;
    $subtitle = $s['subtitle'] ?? 'Profil Perusahaan';
    $title = $s['title'] ?? $s['heading'] ?? 'Mitra Solusi Teknologi Anda.';
    $description = $s['description'] ?? $s['content'] ?? '';
    $image = $s['image'] ?? $s['featured_image'] ?? 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80';
    $features = $s['features'] ?? $s['stats'] ?? [];
@endphp
<section id="tentang" class="py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="relative group">
                <div class="absolute -inset-4 bg-gradient-to-tr from-brand-primary/20 to-brand-accent/20 rounded-3xl transform -rotate-3 z-0 transition-transform group-hover:rotate-0 duration-500"></div>
                <div class="relative z-10 bg-slate-800 rounded-2xl shadow-xl h-[500px] w-full flex items-center justify-center overflow-hidden border border-slate-700">
                    <img src="{{ $image }}" alt="Tim PT Nexera Pandawa Innovatech Berkolaborasi" class="object-cover w-full h-full opacity-80 mix-blend-overlay hover:mix-blend-normal hover:opacity-100 transition-all duration-500" />
                </div>
                @if(!empty($s['year']))
                    <div class="absolute -bottom-6 -right-6 bg-white p-6 rounded-2xl shadow-xl z-20 hidden md:flex items-center gap-4 border border-slate-100">
                        <div class="bg-brand-primary text-white w-14 h-14 rounded-xl flex items-center justify-center text-2xl shadow-inner">
                            <i class="fas fa-award"></i>
                        </div>
                        <div>
                            <p class="text-3xl font-bold text-slate-900">{{ $s['year'] }}</p>
                            <p class="text-sm text-slate-500 font-medium">{{ $s['year_label'] ?? 'Berdiri Sejak' }}</p>
                        </div>
                    </div>
                @endif
            </div>

            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 text-brand-primary font-semibold text-sm mb-4">
                    <i class="fas fa-info-circle"></i> {{ $subtitle }}
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-6 leading-tight">{{ $title }}</h2>
                @if($description)
                    <p class="text-slate-600 mb-8 leading-relaxed text-lg">{{ $description }}</p>
                @endif

                @if(!empty($s['visi']) || !empty($s['misi']))
                    <div class="space-y-4 mb-10">
                        @if(!empty($s['visi']))
                            <div class="bg-white p-5 rounded-xl shadow-sm border border-slate-200 border-l-4 border-l-brand-primary hover:shadow-md transition-shadow">
                                <h3 class="font-bold text-slate-900 mb-1 flex items-center gap-2">{{ $s['visi_title'] ?? 'Visi Kami' }}</h3>
                                <p class="text-slate-600 text-sm">{{ $s['visi'] }}</p>
                            </div>
                        @endif
                        @if(!empty($s['misi']))
                            <div class="bg-white p-5 rounded-xl shadow-sm border border-slate-200 border-l-4 border-l-brand-accent hover:shadow-md transition-shadow">
                                <h3 class="font-bold text-slate-900 mb-1 flex items-center gap-2">{{ $s['misi_title'] ?? 'Misi Kami' }}</h3>
                                <p class="text-slate-600 text-sm">{{ $s['misi'] }}</p>
                            </div>
                        @endif
                    </div>
                @endif

                @if(!empty($features))
                    <h3 class="text-xl font-bold text-slate-900 mb-6">{{ $s['features_heading'] ?? 'Mengapa Memilih Nexera?' }}</h3>
                    <div class="grid sm:grid-cols-2 gap-6">
                        @foreach($features as $f)
                            <div class="flex gap-4 items-start">
                                <div class="bg-blue-100 text-brand-primary w-10 h-10 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                    <i class="{{ $f['icon'] ?? 'fas fa-check' }}"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-900">{{ $f['title'] ?? $f['label'] ?? '' }}</h4>
                                    <p class="text-sm text-slate-500 mt-1">{{ $f['description'] ?? $f['value'] ?? '' }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
