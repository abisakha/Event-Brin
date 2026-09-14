{{-- FOOTER --}}
<footer class="bg-slate-800 text-white py-12 pb-6">
    <div class="container mx-auto px-6">

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-8 pb-10">

            {{-- BRAND --}}
            <div class="lg:col-span-4">
                <div class="flex items-center mb-4">
                    <div class="w-7 h-7  text-slate-800 rounded flex items-center justify-center font-extrabold mr-2">
                        <img src="{{ asset('assets/images/logo.png') }}">
                    </div>

                    <h5 class="text-lg font-bold m-0">
                        BRIN
                    </h5>
                </div>

                <p class="max-w-72 text-xs leading-5 text-slate-300">
                    Badan Riset dan Inovasi Nasional (BRIN) adalah lembaga pemerintah nonkementerian yang berada di bawah dan bertanggung jawab kepada Presiden dalam menyelenggarakan penelitian, pengembangan, pengkajian, dan penerapan.
                </p>
            </div>

            {{-- TENTANG --}}
            <div class="lg:col-span-2">
                <h6 class="text-sm font-bold mb-4">
                    Tentang
                </h6>

                <ul class="space-y-3 text-xs text-slate-300">
                    <li class="hover:text-white hover:translate-x-1 transition cursor-pointer">
                        Profil BRIN
                    </li>
                    <li class="hover:text-white hover:translate-x-1 transition cursor-pointer">
                        Struktur Organisasi
                    </li>
                    <li class="hover:text-white hover:translate-x-1 transition cursor-pointer">
                        Deputi Bidang Riset
                    </li>
                    <li class="hover:text-white hover:translate-x-1 transition cursor-pointer">
                        Hubungi Kami
                    </li>
                </ul>
            </div>

            {{-- LAYANAN --}}
            <div class="lg:col-span-2">
                <h6 class="text-sm font-bold mb-4">
                    Layanan
                </h6>

                <ul class="space-y-3 text-xs text-slate-300">
                    <li class="hover:text-white hover:translate-x-1 transition cursor-pointer">
                        Pendaftaran Event
                    </li>
                    <li class="hover:text-white hover:translate-x-1 transition cursor-pointer">
                        Pengajuan Fasilitas
                    </li>
                    <li class="hover:text-white hover:translate-x-1 transition cursor-pointer">
                        Dana Riset
                    </li>
                    <li class="hover:text-white hover:translate-x-1 transition cursor-pointer">
                        Publikasi Ilmiah
                    </li>
                </ul>
            </div>

            {{-- BANTUAN --}}
            <div class="lg:col-span-2">
                <h6 class="text-sm font-bold mb-4">
                    Bantuan
                </h6>

                <ul class="space-y-3 text-xs text-slate-300">
                    <li class="hover:text-white hover:translate-x-1 transition cursor-pointer">
                        Pusat Bantuan
                    </li>
                    <li class="hover:text-white hover:translate-x-1 transition cursor-pointer">
                        Panduan Pengguna
                    </li>
                    <li class="hover:text-white hover:translate-x-1 transition cursor-pointer">
                        F.A.Q
                    </li>
                    <li class="hover:text-white hover:translate-x-1 transition cursor-pointer">
                        Kebijakan Privasi
                    </li>
                </ul>
            </div>

            {{-- IKUTI KAMI --}}
            <div class="lg:col-span-2">
                <h6 class="text-sm font-bold mb-4">
                    Ikuti Kami
                </h6>

                <ul class="space-y-3 text-xs text-slate-300">
                    <li class="hover:text-white hover:translate-x-1 transition cursor-pointer">
                        Instagram
                    </li>
                    <li class="hover:text-white hover:translate-x-1 transition cursor-pointer">
                        YouTube
                    </li>
                    <li class="hover:text-white hover:translate-x-1 transition cursor-pointer">
                        LinkedIn
                    </li>
                    <li class="hover:text-white hover:translate-x-1 transition cursor-pointer">
                        X / Twitter
                    </li>
                </ul>
            </div>

        </div>

        {{-- COPYRIGHT --}}
        <div class="border-t border-white/20 pt-5 flex flex-col md:flex-row md:justify-between gap-3 text-xs text-slate-400">
            <div>
                © 2024 BRIN. Hak Cipta Dilindungi.
            </div>

            <div>
                Sistem Informasi Manajemen Event Ilmiah Nasional
            </div>
        </div>

    </div>
</footer>
