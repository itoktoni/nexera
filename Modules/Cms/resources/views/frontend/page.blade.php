@extends('cms::frontend.layouts.public')

@section('title', $entry->title . ' | Nexera')

@section('content')
{{-- Header --}}
<section class="hero-gradient pt-36 pb-16 relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4wNykiLz48L3N2Zz4=')] opacity-50"></div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-4">{{ $entry->title }}</h1>
        @if(!empty($entry->excerpt))
            <p class="text-slate-300 text-lg max-w-2xl mx-auto">{{ $entry->excerpt }}</p>
        @endif
    </div>
</section>

<section class="py-14 bg-slate-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        @if(!empty($entry->featured_image))
            <img src="{{ fileUrl($entry->featured_image) }}" alt="{{ $entry->title }}" class="w-full h-auto rounded-3xl shadow-xl border border-slate-200 mb-10" />
        @endif
        <div class="bg-white rounded-3xl shadow-sm border border-slate-200 p-8 md:p-12">
            <div class="prose max-w-none text-slate-700 leading-relaxed space-y-5">
                {!! $entry->content !!}
            </div>
        </div>

        <div class="mt-10 text-center">
            <a href="{{ url('/#kontak') }}" class="inline-flex items-center gap-2 bg-brand-primary text-white font-bold px-8 py-3.5 rounded-full hover:bg-blue-800 transition-all shadow-lg shadow-blue-500/30">
                Hubungi Kami <i class="fas fa-arrow-right text-sm"></i>
            </a>
        </div>
    </div>
</section>
@endsection
