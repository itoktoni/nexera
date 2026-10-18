@extends('cms::frontend.layouts.public')

@section('title', isset($category) ? 'Artikel — ' . $category->name : (isset($tag) ? 'Artikel — #' . $tag->name : 'Artikel & Berita | Nexera'))

@section('content')
{{-- Header --}}
<section class="hero-gradient pt-36 pb-16 relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4wNykiLz48L3N2Zz4=')] opacity-50"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-slate-800/50 border border-slate-700 text-brand-accent font-semibold text-sm mb-4">
            <i class="fas fa-newspaper"></i> Blog Nexera
        </div>
        <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-4">
            @if(isset($category))
                {{ $category->name }}
            @elseif(isset($tag))
                #{{ $tag->name }}
            @else
                Artikel & <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-accent to-blue-400">Berita</span>
            @endif
        </h1>
        <p class="text-slate-300 text-lg max-w-2xl mx-auto mb-8">Wawasan teknologi RFID, pengembangan aplikasi, dan kabar terbaru dari Nexera.</p>

        {{-- Search --}}
        <form action="{{ route('search') }}" method="GET" class="max-w-xl mx-auto flex gap-2">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari artikel..."
                class="flex-1 px-5 py-3 rounded-full bg-white/10 border border-slate-600 text-white placeholder:text-slate-400 focus:bg-white focus:text-slate-900 focus:placeholder:text-slate-400 outline-none transition-all" />
            <button type="submit" class="bg-brand-primary text-white px-6 py-3 rounded-full font-semibold hover:bg-blue-600 transition-colors flex items-center gap-2">
                <i class="fas fa-search"></i><span class="hidden sm:inline">Cari</span>
            </button>
        </form>
    </div>
</section>

{{-- Filter kategori --}}
@if(!empty($categories) && $categories->count() > 0)
<section class="py-8 bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-wrap justify-center gap-2">
        <a href="{{ route('blog') }}" class="px-5 py-2 rounded-full text-sm font-bold transition-colors {{ empty($activeCategory) && !isset($tag) ? 'bg-brand-primary text-white' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">Semua</a>
        @foreach($categories as $cat)
            <a href="{{ route('blog.category', $cat->slug) }}" class="px-5 py-2 rounded-full text-sm font-bold transition-colors {{ ($activeCategory ?? null) === $cat->slug ? 'bg-brand-primary text-white' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">{{ $cat->name }}</a>
        @endforeach
    </div>
</section>
@endif

{{-- List artikel --}}
<section class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($posts->count() > 0)
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($posts as $post)
                    <a href="{{ route('blog.post', $post->slug) }}" class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all border border-slate-200 group flex flex-col">
                        @if(!empty($post->featured_image))
                            <div class="h-52 overflow-hidden bg-slate-100">
                                <img src="{{ fileUrl($post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                            </div>
                        @else
                            <div class="h-52 bg-slate-900 relative flex items-center justify-center overflow-hidden">
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/60 to-transparent z-10"></div>
                                <i class="fas fa-microchip text-6xl text-white/10 group-hover:scale-110 transition-transform duration-500"></i>
                            </div>
                        @endif
                        <div class="p-6 flex flex-col flex-grow">
                            <div class="flex items-center gap-2 text-xs text-slate-400 mb-3">
                                @if($post->published_at)
                                    <span><i class="far fa-calendar-alt mr-1"></i>{{ $post->published_at->format('d M Y') }}</span>
                                @endif
                                @if($post->has_type)
                                    <span class="w-1 h-1 bg-slate-300 rounded-full"></span>
                                    <span class="text-brand-primary font-semibold">{{ $post->has_type->name }}</span>
                                @endif
                            </div>
                            <h3 class="text-lg font-bold text-slate-900 mb-2 group-hover:text-brand-primary transition-colors line-clamp-2">{{ $post->title }}</h3>
                            @if($post->excerpt)
                                <p class="text-slate-600 text-sm line-clamp-3 mb-4 flex-grow">{{ $post->excerpt }}</p>
                            @endif
                            <span class="mt-2 inline-flex items-center gap-2 text-brand-primary font-semibold text-sm">
                                Baca Selengkapnya <i class="fas fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="mt-12 flex justify-center">
                {{ $posts->links() }}
            </div>
        @else
            <div class="text-center py-20">
                <div class="w-20 h-20 mx-auto rounded-2xl bg-slate-100 text-slate-300 flex items-center justify-center text-4xl mb-6">
                    <i class="fas fa-newspaper"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">Belum Ada Artikel</h3>
                <p class="text-slate-500">Belum ada artikel pada kategori ini. Silakan kembali lagi nanti.</p>
                <a href="{{ route('blog') }}" class="inline-flex items-center gap-2 mt-6 text-brand-primary font-semibold hover:gap-3 transition-all">
                    <i class="fas fa-arrow-left text-sm"></i> Semua Artikel
                </a>
            </div>
        @endif
    </div>
</section>
@endsection
