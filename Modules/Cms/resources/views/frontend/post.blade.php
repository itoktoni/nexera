@extends('cms::frontend.layouts.public')

@section('title', $entry->title . ' | Nexera')

@section('content')
@php
    $postCategories = $entry->has_categories()->get();
    $postTags = $entry->has_tags()->get();
@endphp

{{-- Header --}}
<section class="hero-gradient pt-36 pb-14 relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4wNykiLz48L3N2Zz4=')] opacity-50"></div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <a href="{{ route('blog') }}" class="inline-flex items-center gap-2 text-slate-300 hover:text-white font-medium text-sm mb-6 transition-colors">
            <i class="fas fa-arrow-left text-xs"></i> Semua Artikel
        </a>
        @if($postCategories->count() > 0)
            <div class="flex flex-wrap gap-2 mb-4">
                @foreach($postCategories as $cat)
                    <a href="{{ route('blog.category', $cat->slug) }}" class="text-xs font-bold text-white bg-brand-accent/20 border border-brand-accent/40 px-3 py-1.5 rounded-full hover:bg-brand-accent/30 transition-colors">{{ $cat->name }}</a>
                @endforeach
            </div>
        @endif
        <h1 class="text-3xl md:text-4xl font-extrabold text-white leading-tight mb-4">{{ $entry->title }}</h1>
        <div class="flex items-center gap-4 text-sm text-slate-300">
            @if($entry->published_at)
                <span><i class="far fa-calendar-alt mr-1.5"></i>{{ $entry->published_at->format('d F Y') }}</span>
            @endif
            @if($entry->has_author)
                <span><i class="far fa-user mr-1.5"></i>{{ $entry->has_author->name }}</span>
            @endif
        </div>
    </div>
</section>

<article class="py-14 bg-slate-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        @if(!empty($entry->featured_image))
            <figure class="mb-10 -mt-24 relative z-10">
                <img src="{{ fileUrl($entry->featured_image) }}" alt="{{ $entry->title }}" class="w-full h-auto rounded-3xl shadow-2xl border border-slate-200" />
            </figure>
        @endif

        <div class="bg-white rounded-3xl shadow-sm border border-slate-200 p-8 md:p-12">
            @if(!empty($entry->excerpt))
                <p class="text-lg text-slate-600 leading-relaxed border-l-4 border-brand-accent pl-5 mb-8 italic">{{ $entry->excerpt }}</p>
            @endif

            <div class="prose max-w-none text-slate-700 leading-relaxed space-y-5">
                {!! $entry->content !!}
            </div>

            @if($postTags->count() > 0)
                <div class="flex flex-wrap gap-2 mt-10 pt-8 border-t border-slate-100">
                    @foreach($postTags as $t)
                        <a href="{{ route('blog.tag', $t->slug) }}" class="text-xs font-semibold text-slate-500 bg-slate-100 px-3 py-1.5 rounded-full hover:bg-slate-200 transition-colors">#{{ $t->name }}</a>
                    @endforeach
                </div>
            @endif
        </div>

        {{-- CTA --}}
        <div class="mt-10 bg-slate-900 rounded-3xl p-8 md:p-10 text-white relative overflow-hidden border border-slate-800">
            <div class="absolute -right-10 -bottom-10 opacity-10"><i class="fas fa-headset text-[160px]"></i></div>
            <div class="relative z-10 flex flex-col md:flex-row md:items-center gap-6 justify-between">
                <div>
                    <h3 class="text-xl md:text-2xl font-bold mb-2">Butuh solusi serupa untuk bisnis Anda?</h3>
                    <p class="text-slate-400">Konsultasikan kebutuhan Anda dengan tim Nexera — gratis.</p>
                </div>
                <a href="{{ url('/#kontak') }}" class="shrink-0 bg-brand-primary text-white font-bold px-8 py-3.5 rounded-full hover:bg-blue-600 transition-all shadow-lg shadow-blue-500/30 text-center">
                    Konsultasi Sekarang
                </a>
            </div>
        </div>
    </div>
</article>

{{-- Artikel terkait --}}
@if(!empty($related) && $related->count() > 0)
<section class="py-16 bg-white border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl md:text-3xl font-bold text-slate-900 mb-8">Artikel Terkait</h2>
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($related as $rel)
                <a href="{{ route('blog.post', $rel->slug) }}" class="bg-slate-50 rounded-2xl overflow-hidden border border-slate-200 hover:shadow-xl transition-all group flex flex-col">
                    <div class="h-44 bg-slate-900 relative flex items-center justify-center overflow-hidden">
                        @if(!empty($rel->featured_image))
                            <img src="{{ fileUrl($rel->featured_image) }}" alt="{{ $rel->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                        @else
                            <i class="fas fa-microchip text-5xl text-white/10 group-hover:scale-110 transition-transform duration-500"></i>
                        @endif
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        @if($rel->published_at)
                            <p class="text-xs text-slate-400 mb-2">{{ $rel->published_at->format('d M Y') }}</p>
                        @endif
                        <h3 class="font-bold text-slate-900 group-hover:text-brand-primary transition-colors line-clamp-2 mb-2">{{ $rel->title }}</h3>
                        @if($rel->excerpt)
                            <p class="text-sm text-slate-600 line-clamp-2">{{ $rel->excerpt }}</p>
                        @endif
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
