<x-app-layout>
    <div class="animate-reveal delay-100 py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#0f172a] overflow-hidden shadow-xl sm:rounded-2xl border border-white/5">
                <div class="p-8 text-center">
                    
                    <h2 class="text-3xl font-extrabold text-white mb-4">
                        Sodaqoh <span class="text-emerald-400">via QRIS</span>
                    </h2>
                    
                    <p class="text-slate-400 text-lg leading-relaxed mb-8">
                        "Sedekah itu tidak akan mengurangi harta."- H.R Muslim. <br>
                        Mari bersodaqoh karena sesungguhnya sodaqoh itu adalah amalan jariyah.
                    </p>

                    <div class="bg-white p-4 rounded-3xl inline-block shadow-2xl shadow-emerald-500/10 mb-6">
                        <img src="{{ asset('img/qris-sodaqoh.png') }}" 
                             alt="QRIS Sodaqoh" 
                             class="w-64 h-64 object-contain mx-auto">
                    </div>

                    <div class="mt-4">
                        <p class="text-sm text-slate-500">
                            Scan QRIS di atas menggunakan GoPay, OVO, Dana, LinkAja, atau Mobile Banking kamu.
                        </p>
                        <div class="mt-6 flex justify-center gap-2">
                            <span class="px-3 py-1 bg-white/5 rounded-full text-xs text-slate-400 border border-white/10">BCA</span>
                            <span class="px-3 py-1 bg-white/5 rounded-full text-xs text-slate-400 border border-white/10">GOPAY</span>
                            <span class="px-3 py-1 bg-white/5 rounded-full text-xs text-slate-400 border border-white/10">DANA</span>
                        </div>
                    </div>

                </div>
            </div>

            <div class="mt-8 text-center">
                <a href="{{ route('dashboard') }}" class="text-sm text-emerald-500 hover:text-emerald-400 transition-colors">
                    ← Kembali ke Dashboard
                </a>
            </div>
        </div>
    </div>
    <footer class="w-screen relative left-1/2 right-1/2 -ml-[50vw] -mr-[50vw] bg-[#070d1c] py-10 border-t border-slate-800/40 z-20">
        <div class="w-full max-w-6xl mx-auto px-6 text-center space-y-4">
            
            <div class="text-sm text-slate-400 tracking-wide">
                <span class="text-white font-bold block mb-1 uppercase tracking-wider text-xs">Sekretariat Masjid</span>
                <p>Jl. Krisna - Munjul, Kec. Solear, Kab. Tangerang, Banten | <span class="text-emerald-400">📞</span> +62 812-3456-7890</p>
            </div>
    
            <div class="border-t border-slate-800/60 max-w-md mx-auto"></div>
    
            <div class="text-xs text-slate-500 leading-relaxed">
                <p>
                    &copy; {{ date('Y') }} E-Masjid Digital. All Rights Reserved. 
                    <span class="block sm:inline sm:ml-1 text-slate-400">
                        Developed by 
                        <a href="https://github.com/fawazubaidillah" target="_blank" class="text-emerald-400 hover:text-emerald-300 font-semibold tracking-wide transition-all hover:underline">
                            Muhammad Fawaz Ubaidillah
                        </a>
                    </span>
                </p>
            </div>
    
        </div>
    </footer>
</x-app-layout>