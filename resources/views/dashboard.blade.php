<x-app-layout>
    

    <div class="animate-reveal delay-100 py-12 bg-[#0f172a] min-h-screen">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="bg-slate-900/50 border border-white/5 rounded-3xl p-10 shadow-2xl backdrop-blur-sm text-center">
                
                <div class="mb-10">
                    <h3 class="text-2xl font-bold text-white mb-2">Kartu Absen <span class="text-emerald-500">Digital</span></h3>
                    <p class="text-gray-400 italic text-sm">
                        "Amal sholeh absen online dulu yaa sebelum ngaji."
                    </p>
                    <p class="text-gray-400 italic text-sm">
                        "Alhamdulillahijazakumullahukhoiro."
                    </p>
                </div>

                <div class="flex justify-center mb-8">
    
                    <div class="block md:hidden bg-white p-4 rounded-3xl shadow-[0_0_25px_rgba(16,185,129,0.15)] max-w-[212px]">
                        {!! QrCode::size(150)->margin(1)->generate(Auth::user()->id) !!}
                    </div>
                
                    <div class="hidden md:block bg-white p-5 rounded-3xl shadow-[0_0_25px_rgba(16,185,129,0.15)] max-w-[300px]">
                        {!! QrCode::size(200)->margin(1)->generate(Auth::user()->id) !!}
                    </div>
                
                </div>

                <div class="mt-6 space-y-4">
                    <p class="text-xl font-black text-white uppercase tracking-tight leading-none text-center">
                        {{ Auth::user()->name }}
                    </p>
                    
                    <div class="flex items-center justify-center gap-3 text-[10px] sm:text-sm font-bold bg-emerald-500/5 px-4 py-2 sm:py-3 rounded-lg border border-emerald-500/20 shadow-sm">
                        
                        <div class="flex gap-1.5 items-center">
                            <span class="text-emerald-500 uppercase">DESA:</span>
                            <span class="text-white uppercase font-extrabold tracking-wide">{{ Auth::user()->group->nama_desa ?? '-' }}</span>
                        </div>
                
                        <div class="w-[1px] h-3 sm:h-4 bg-emerald-500/30"></div>
                
                        <div class="flex gap-1.5 items-center">
                            <span class="text-emerald-500 uppercase">KELOMPOK:</span>
                            <span class="text-white uppercase font-extrabold tracking-wide">{{ Auth::user()->group->nama_kelompok ?? '-' }}</span>
                        </div>
                    </div>
                </div>

                <div class="mt-10 pt-6 border-t border-white/5">
                    <p class="text-[10px] text-gray-400 uppercase tracking-[0.4em]">
                        Scan QR untuk Absensi Kehadiran
                    </p>
                </div>
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