@php
    // Data shape: meta['contact'] = heading, subheading, items[{label, name, phone, wa_link, icon}], email_label, email, email_link
    $s = $data['contact'] ?? $data;
    $heading = $s['heading'] ?? 'Hubungi Tim Kami';
    $subheading = $s['subheading'] ?? 'Punya pertanyaan atau siap memulai transformasi digital? Konsultan kami siap mendengarkan kebutuhan unik Anda.';
    $items = $s['items'] ?? (array_is_list($s) ? $s : []);
    $fallback = [
        ['label' => 'WhatsApp - Jakarta', 'name' => 'Aryo Bayu', 'phone' => '+62 856 9783 2022', 'wa_link' => 'https://wa.me/6285697832022', 'icon' => 'fab fa-whatsapp'],
        ['label' => 'WhatsApp - Tangerang', 'name' => 'Nouval Gucci', 'phone' => '+62 81 888 9312', 'wa_link' => 'https://wa.me/62818889312', 'icon' => 'fab fa-whatsapp'],
        ['label' => 'WhatsApp - Yogyakarta', 'name' => 'Itok Toni', 'phone' => '+62 811 1040 159', 'wa_link' => 'https://wa.me/628111040159', 'icon' => 'fab fa-whatsapp'],
    ];
    if (empty($items)) { $items = $fallback; }
    $emailLabel = $s['email_label'] ?? 'Email Resmi';
    $email = $s['email'] ?? 'sales@nexeratech.co.id';
    $emailLink = $s['email_link'] ?? 'mailto:nexerapandawa@gmail.com';
@endphp
<section id="kontak" class="py-24 bg-slate-50 border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-5 gap-12 lg:gap-16">
            <div class="lg:col-span-2">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-100 text-brand-primary font-semibold text-sm mb-4">
                    <i class="fas fa-headset"></i> Mari Berdiskusi
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-6">{{ $heading }}</h2>
                <p class="text-slate-600 mb-8 text-lg">{{ $subheading }}</p>

                <div class="space-y-4">
                    @foreach($items as $c)
                        <a href="{{ $c['wa_link'] ?? '#' }}" target="_blank" rel="noopener noreferrer" class="flex items-center gap-5 p-5 bg-white rounded-2xl border border-slate-200 hover:border-green-400 hover:shadow-lg transition-all group">
                            <div class="w-14 h-14 bg-green-50 text-green-500 rounded-xl flex items-center justify-center text-3xl group-hover:bg-green-500 group-hover:text-white transition-colors">
                                <i class="{{ $c['icon'] ?? 'fab fa-whatsapp' }}"></i>
                            </div>
                            <div>
                                <p class="text-sm text-slate-500 font-medium">{{ $c['label'] ?? '' }}</p>
                                <p class="text-lg font-bold text-slate-900">{{ $c['name'] ?? '' }}</p>
                                <p class="text-brand-primary font-semibold">{{ $c['phone'] ?? '' }}</p>
                            </div>
                        </a>
                    @endforeach

                    <a href="{{ $emailLink }}" class="flex items-center gap-5 p-5 bg-white rounded-2xl border border-slate-200 hover:border-blue-400 hover:shadow-lg transition-all group">
                        <div class="w-14 h-14 bg-blue-50 text-brand-primary rounded-xl flex items-center justify-center text-2xl group-hover:bg-brand-primary group-hover:text-white transition-colors">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <p class="text-sm text-slate-500 font-medium">{{ $emailLabel }}</p>
                            <p class="text-lg font-bold text-slate-900">{{ $email }}</p>
                        </div>
                    </a>
                </div>
            </div>

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
                                <option value="Solusi & Sistem RFID" {{ old('subject') == 'Solusi & Sistem RFID' ? 'selected' : '' }}>Solusi &amp; Sistem RFID</option>
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

                        <div class="hidden" aria-hidden="true">
                            <label>Jangan isi ini</label>
                            <input type="text" name="website" value="" autocomplete="off" tabindex="-1" />
                        </div>

                        <div class="mb-8">
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Captcha <span class="text-red-500">*</span></label>
                            <div class="flex items-center gap-4">
                                @php $captchaKey = uniqid(); @endphp
                                <img src="{{ route('captcha.contact', ['key' => $captchaKey]) }}" alt="Captcha" class="rounded-lg border border-slate-200" style="height:56px;" id="captcha-image" />
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
