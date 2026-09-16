{{-- FOOTER --}}
<footer class="bg-slate-800 py-4 pb-3 text-white sm:py-12 sm:pb-6">
    <div class="container mx-auto px-4 sm:px-6">

        <div class="grid grid-cols-2 gap-x-4 gap-y-4 pb-4 sm:grid-cols-2 sm:gap-8 sm:pb-10 lg:grid-cols-12">

            {{-- BRAND --}}
            <div class="col-span-2 lg:col-span-4">
                <div class="mb-2 flex items-center sm:mb-4">
                    <div class="mr-1.5 flex size-5 items-center justify-center rounded text-slate-800 sm:mr-2 sm:size-7">
                        <img src="{{ asset('assets/images/logo.png') }}" class="h-full w-full object-contain" alt="BRIN">
                    </div>

                    <h5 class="m-0 text-sm font-bold sm:text-lg">
                        BRIN
                    </h5>
                </div>

                <p class="max-w-72 text-[10px] leading-3.5 text-slate-300 sm:text-xs sm:leading-5">
                    Badan Riset dan Inovasi Nasional (BRIN) adalah lembaga pemerintah nonkementerian yang berada di bawah dan bertanggung jawab kepada Presiden dalam menyelenggarakan penelitian, pengembangan, pengkajian, dan penerapan.
                </p>
            </div>

            {{-- TENTANG --}}
            <div class="lg:col-span-2">
                <h6 class="mb-2 text-[10px] font-bold sm:mb-4 sm:text-sm">
                    Tentang
                </h6>

                <ul class="space-y-1.5 text-[10px] text-slate-300 sm:space-y-3 sm:text-xs">
                    <li class="cursor-pointer transition hover:translate-x-1 hover:text-white">
                        Profil BRIN
                    </li>
                    <li class="cursor-pointer transition hover:translate-x-1 hover:text-white">
                        Struktur Organisasi
                    </li>
                    <li class="cursor-pointer transition hover:translate-x-1 hover:text-white">
                        Deputi Bidang Riset
                    </li>
                    <li class="cursor-pointer transition hover:translate-x-1 hover:text-white">
                        Hubungi Kami
                    </li>
                </ul>
            </div>

            {{-- LAYANAN --}}
            <div class="lg:col-span-2">
                <h6 class="mb-2 text-[10px] font-bold sm:mb-4 sm:text-sm">
                    Layanan
                </h6>

                <ul class="space-y-1.5 text-[10px] text-slate-300 sm:space-y-3 sm:text-xs">
                    <li class="cursor-pointer transition hover:translate-x-1 hover:text-white">
                        Pendaftaran Event
                    </li>
                    <li class="cursor-pointer transition hover:translate-x-1 hover:text-white">
                        Pengajuan Fasilitas
                    </li>
                    <li class="cursor-pointer transition hover:translate-x-1 hover:text-white">
                        Dana Riset
                    </li>
                    <li class="cursor-pointer transition hover:translate-x-1 hover:text-white">
                        Publikasi Ilmiah
                    </li>
                </ul>
            </div>

            {{-- BANTUAN --}}
            <div class="lg:col-span-2">
                <h6 class="mb-2 text-[10px] font-bold sm:mb-4 sm:text-sm">
                    Bantuan
                </h6>

                <ul class="space-y-1.5 text-[10px] text-slate-300 sm:space-y-3 sm:text-xs">
                    <li class="cursor-pointer transition hover:translate-x-1 hover:text-white">
                        Pusat Bantuan
                    </li>
                    <li class="cursor-pointer transition hover:translate-x-1 hover:text-white">
                        Panduan Pengguna
                    </li>
                    <li class="cursor-pointer transition hover:translate-x-1 hover:text-white">
                        F.A.Q
                    </li>
                    <li class="cursor-pointer transition hover:translate-x-1 hover:text-white">
                        Kebijakan Privasi
                    </li>
                </ul>
            </div>

            {{-- IKUTI KAMI --}}
            <div class="lg:col-span-2">
                <h6 class="mb-2 text-[10px] font-bold sm:mb-4 sm:text-sm">
                    Ikuti Kami
                </h6>

                <ul class="space-y-1.5 text-[10px] text-slate-300 sm:space-y-3 sm:text-xs">
                    <li class="cursor-pointer transition hover:translate-x-1 hover:text-white">
                        Instagram
                    </li>
                    <li class="cursor-pointer transition hover:translate-x-1 hover:text-white">
                        YouTube
                    </li>
                    <li class="cursor-pointer transition hover:translate-x-1 hover:text-white">
                        LinkedIn
                    </li>
                    <li class="cursor-pointer transition hover:translate-x-1 hover:text-white">
                        X / Twitter
                    </li>
                </ul>
            </div>

        </div>

        {{-- COPYRIGHT --}}
        <div class="flex flex-col gap-1 border-t border-white/20 pt-3 text-[10px] text-slate-400 sm:gap-3 sm:pt-5 sm:text-xs md:flex-row md:justify-between">
            <div>
                © 2024 BRIN. Hak Cipta Dilindungi.
            </div>

            <div>
                Sistem Informasi Manajemen Event Ilmiah Nasional
            </div>
        </div>

    </div>
</footer>
