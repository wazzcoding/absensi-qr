<x-app-layout>
    <style>
        /* Efek dasar sebelum elemen masuk layar */
        .scroll-reveal {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 1.2s cubic-bezier(0.215, 0.610, 0.355, 1), 
                        transform 1.2s cubic-bezier(0.215, 0.610, 0.355, 1);
            will-change: transform, opacity;
        }

        /* Kondisi ketika elemen sudah masuk layar (Aktif) */
        .scroll-reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        /* Variasi Delay */
        .delay-100 { transition-delay: 100ms; }
        .delay-200 { transition-delay: 200ms; }
        .delay-300 { transition-delay: 300ms; }

        /* Pattern Nuansa Islami Modern & Transparan */
        .islamic-pattern {
            background-color: #0b1329;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='80' height='80' viewBox='0 0 80 80'%3E%3Cg fill='%2310b981' fill-opacity='0.03'%3E%3Cpath d='M0 0h40v40H0V0zm40 40h40v40H40V40zm0-40h2l-2 2V0zm0 4l4-4h2L40 6V4zm0 4l6-6h2L40 10V8zm0 4l8-8h2L40 14v-2zm0 4l10-10h2L40 18v-2zm0 4l12-12h2L40 22v-2zm0 4l14-14h2L40 26v-2zm0 4l16-16h2L40 30v-2zm0 4l18-18h2L40 34v-2zm0 4l20-20h2L40 38v-2zm0 4l22-22h2L40 42v-2zm0 4l24-24h2L40 46v-2zm0 4l26-26h2L40 50v-2zm0 4l28-28h2L40 54v-2zm0 4l30-30h2L40 58v-2zm0 4l32-32h2L40 62v-2zm0 4l34-34h2L40 66v-2zm0 4l36-36h2L40 70v-2zm0 4l38-38h2L40 74v-2zm0 4l40-40h2L40 78v-2zm-4 4l4-4v4h-4zm-4 0l8-8v2l-6 6h-2zm-4 0l10-10v2l-8 8h-2zm-4 0l12-12v2l-10 10h-2zm-4 0l14-14v2l-12 12h-2zm-4 0l16-16v2l-14 14h-2zm-4 0l18-18v2l-16 16h-2zm-4 0l20-20v2l-18 18h-2zm-4 0l22-22v2l-20 20h-2zm-4 0l24-24v2l-22 22h-2zm-4 0l26-26v2l-24 24h-2zm-4 0l28-28v2l-26 26h-2zm-4 0l30-30v2l-28 28h-2zm-4 0l32-32v2l-30 30h-2zm-4 0l34-34v2l-32 32h-2zm-4 0l34-34v2l-32 32h-2zm-4 0l36-36v2l-34 34h-2zm-4 0l38-38v2l-36 36h-2z'/%3E%3C/g%3E%3C/svg%3E");
        }

        /* MODIFIKASI SCROLLBAR ASLI: Dibuat tipis & transparan agar estetik */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #0b1329;
        }
        ::-webkit-scrollbar-thumb {
            background: #1e293b;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #10b981;
        }

        /* ELEMEN MELAYANG BINTANG ISLAMI (MENGGANTIKAN VISUAL SCROLL BAR) */
        #islamic-scroll-tracker {
            position: fixed;
            right: 12px; /* Jarak dari ujung kanan layar */
            top: 0px;    /* Ini nanti akan dimanipulasi oleh JS sesuai scroll */
            z-index: 9999;
            pointer-events: none; /* Biar ga ngeganggu klik user */
            transition: top 0.1s ease-out; /* Animasi gerak halus */
        }
    </style>

    <div id="islamic-scroll-tracker" class="text-emerald-400 drop-shadow-[0_0_8px_rgba(16,185,129,0.6)]">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 animate-spin" style="animation-duration: 10s;" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 2l2.4 4.3 4.9-1.3-1.3 4.9 4.3 2.4-4.3 2.4 1.3 4.9-4.9-1.3-2.4 4.3-2.4-4.3-4.9 1.3 1.3-4.9-4.3-2.4 4.3-2.4-1.3-4.9 4.9 1.3z"/>
        </svg>
    </div>

    <div class="-mx-4 -mt-12 md:-mx-8 lg:-mx-12 overflow-hidden bg-[#0b1329]">

        <div class="relative w-full h-[calc(100vh-64px)] islamic-pattern overflow-hidden border-b border-slate-800/30"> 
            
            <div class="absolute inset-0 bg-gradient-to-b from-[#0b1329]/40 via-transparent to-[#0b1329] pointer-events-none"></div>

            <div class="absolute top-[40%] left-1/2 -translate-x-1/2 -translate-y-1/2 w-full max-w-6xl px-6 flex flex-col items-center text-center space-y-8 z-10">
                
                <div class="space-y-6 w-full">
                    <h1 class="text-4xl md:text-7xl font-extrabold text-white tracking-tight flex flex-wrap justify-center items-center text-center">
                        <span>ABSENSI&nbsp;</span>
                        <span id="typing-text" class="text-emerald-500 border-r-4 border-emerald-500 pr-2"></span>
                    </h1>
                    <p class="scroll-reveal text-slate-300 text-base md:text-xl max-w-3xl mx-auto leading-relaxed">
                        Sistem pencatatan kehadiran berbasis QR Code untuk pengajian. Cepat, akurat, dan transparan.
                    </p>
                </div>

                <div class="scroll-reveal delay-100 pt-4">
                    @auth
                        <a href="{{ route('member.qr') }}" class="inline-block rounded-xl bg-emerald-600 px-16 py-4 text-base font-bold text-white border-2 border-emerald-600 transition-all duration-300 hover:bg-white hover:text-emerald-600 hover:border-white focus:outline-none focus:ring active:bg-emerald-500 shadow-lg shadow-emerald-950/20">
                            Absen Sekarang
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="inline-block rounded-xl bg-emerald-600 px-16 py-4 text-base font-bold text-white border-2 border-emerald-600 transition-all duration-300 hover:bg-white hover:text-emerald-600 hover:border-white focus:outline-none focus:ring active:bg-emerald-500 shadow-lg shadow-emerald-950/20">
                            Absen Sekarang
                        </a>
                    @endauth
                </div>
                
                
            </div>
        </div>

        <div class="w-full min-h-screen md:h-[calc(100vh-64px)] islamic-pattern py-20 md:py-0 flex items-center relative overflow-hidden border-b border-slate-800/30">
            
            <div class="absolute inset-0 bg-gradient-to-tr from-[#0b1329] via-transparent to-[#0b1329]/40 pointer-events-none"></div>

            <div class="w-full max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-12 gap-12 items-center px-6 relative z-10">
                
                <div class="md:col-span-7 space-y-6 text-center md:text-left">
                    <div class="scroll-reveal inline-flex items-center space-x-2 bg-emerald-500/10 border border-emerald-500/20 px-4 py-1.5 rounded-full text-xs font-semibold text-emerald-400">
                        <span>Sodaqoh via Qris</span>
                    </div>
                    
                    <h2 class="scroll-reveal delay-100 text-3xl md:text-5xl font-extrabold text-white tracking-tight leading-tight">
                        Digital <span class="text-emerald-500">Sodaqoh & Infaq</span>
                    </h2>
                    
                    <p class="scroll-reveal delay-200 text-slate-300 text-sm md:text-lg leading-relaxed max-w-xl mx-auto md:mx-0">
                        Apabila para Jamaah ingin bersodaqoh tetapi tidak membawa uang cash bisa melalui sodaqoh digital yang sudah kami sediakan, alhamdulillahijazakumullahukhoiro.
                    </p>
                    
                    <div class="scroll-reveal delay-300 pt-2">
                        <a href="/sodaqoh" class="inline-block rounded-xl bg-emerald-600 px-12 py-3.5 text-sm font-bold text-white border-2 border-emerald-600 transition-all duration-300 hover:bg-white hover:text-emerald-600 hover:border-white focus:outline-none focus:ring active:bg-emerald-500 shadow-lg shadow-blue-950/50">
                            Mulai Bersodaqoh
                        </a>
                    </div>
                </div>

                <div class="md:col-span-5 scroll-reveal delay-200 flex justify-center items-center">
                    <div class="w-full max-w-sm bg-slate-900/80 backdrop-blur-md border border-slate-800/60 p-8 rounded-3xl shadow-2xl text-center space-y-6">
                        <div class="w-16 h-16 bg-emerald-500/10 text-emerald-400 rounded-2xl flex items-center justify-center mx-auto border border-emerald-500/20">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-white">Sodaqoh & Infaq Digital</h4>
                            <p class="text-xs text-slate-500 mt-1">Gunakan QRIS all payment</p>
                        </div>
                        <div class="border-t border-slate-800 border-dashed w-full"></div>
                        <div class="flex justify-between items-center text-xs px-2">
                            <span class="text-slate-400">Mudah & Aman</span>
                            <span class="text-emerald-400 font-bold">100% Real-Time</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full min-h-screen md:h-[calc(100vh-64px)] islamic-pattern py-20 md:py-0 flex items-center relative overflow-hidden border-b border-slate-800/30">
            
            <div class="absolute inset-0 bg-gradient-to-tr from-[#0b1329] via-transparent to-[#0b1329]/40 pointer-events-none"></div>
        
            <div class="w-full max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-12 gap-12 items-center px-6 relative z-10">
                
                <div class="md:col-span-5 order-2 md:order-1 scroll-reveal delay-200 flex justify-center items-center">
                    <div class="w-full max-w-sm bg-slate-900/80 backdrop-blur-md border border-slate-800/60 p-8 rounded-3xl shadow-2xl text-center space-y-6">
                        <div class="w-16 h-16 bg-emerald-500/10 text-emerald-400 rounded-2xl flex items-center justify-center mx-auto border border-emerald-500/20">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                              </svg>                                                         
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-white">Rekap Absensi Digital</h4>
                            <p class="text-xs text-slate-500 mt-1">Lihat Data kehadiran selama 1 tahun</p>
                        </div>
                        <div class="border-t border-slate-800 border-dashed w-full"></div>
                        <div class="flex justify-between items-center text-xs px-2">
                            <span class="text-slate-400">Modern & Aesthetic</span>
                            <span class="text-emerald-400 font-bold">100% Akurat</span>
                        </div>
                    </div>
                </div>
        
                <div class="md:col-span-7 order-1 md:order-2 space-y-6 text-center md:text-left">
                    <div class="scroll-reveal inline-flex items-center space-x-2 bg-emerald-500/10 border border-emerald-500/20 px-4 py-1.5 rounded-full text-xs font-semibold text-emerald-400">
                        <span>Lihat Performa Kehadiran Selama 1 Tahun</span>
                    </div>
                    
                    <h2 class="scroll-reveal delay-100 text-3xl md:text-5xl font-extrabold text-white tracking-tight leading-tight">
                        Rekap Data  <span class="text-emerald-500">Absensi</span>
                    </h2>
                    
                    <p class="scroll-reveal delay-200 text-slate-300 text-sm md:text-lg leading-relaxed max-w-xl mx-auto md:mx-0">
                        Rekapan kehadiran para Jamaah, 
                        Jika Jamaah ingin melihat performa kehadiran jamaah selama 1 tahun secara akurat.
                    </p>
                    
                    <div class="scroll-reveal delay-300 pt-2">
                        <a href="/data-absensi-bulanan" class="inline-block rounded-xl bg-emerald-600 px-12 py-3.5 text-sm font-bold text-white border-2 border-emerald-600 transition-all duration-300 hover:bg-white hover:text-emerald-600 hover:border-white focus:outline-none focus:ring active:bg-emerald-500 shadow-lg shadow-blue-950/50">
                            Lihat Performa Saya
                        </a>
                    </div>
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

    <script>
        // 1. Animasi Mengetik (Typing)
        const textElement = document.getElementById('typing-text');
        const words = ["NGAJI", "TANGBAR", "DAERAH", "DIGITAL"]; 
        let wordIndex = 0; let charIndex = 0; let isDeleting = false; let typeSpeed = 200;

        function type() {
            const currentWord = words[wordIndex];
            if (isDeleting) {
                textElement.textContent = currentWord.substring(0, charIndex - 1);
                charIndex--; typeSpeed = 100; 
            } else {
                textElement.textContent = currentWord.substring(0, charIndex + 1);
                charIndex++; typeSpeed = 200;
            }
            if (!isDeleting && charIndex === currentWord.length) {
                isDeleting = true; typeSpeed = 2000; 
            } else if (isDeleting && charIndex === 0) {
                isDeleting = false; wordIndex = (wordIndex + 1) % words.length; typeSpeed = 500;
            }
            setTimeout(type, typeSpeed);
        }
        setTimeout(type, 1500);

        // 2. Engine Scroll Reveal
        document.addEventListener("DOMContentLoaded", function() {
            const observerOptions = { root: null, threshold: 0.05, rootMargin: "0px 0px -40px 0px" };
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) { entry.target.classList.add('active'); }
                    else { entry.target.classList.remove('active'); }
                });
            }, observerOptions);
            const revealElements = document.querySelectorAll('.scroll-reveal');
            revealElements.forEach(el => observer.observe(el));
        });

        // 3. ENGINE UTAMA: Menggerakkan Bintang Islami Mengikuti Scroll Layar
        const starTracker = document.getElementById('islamic-scroll-tracker');
        
        window.addEventListener('scroll', () => {
            // Ambil data posisi scroll saat ini
            const scrollTop = window.scrollY;
            const docHeight = document.documentElement.scrollHeight - window.innerHeight;
            
            // Hitung persentase scroll (0 sampai 1)
            const scrollPercent = scrollTop / docHeight;
            
            // Tentukan area gerak bintang (misal: dari top 10% layar sampai maksimal 90% layar)
            const startPos = window.innerHeight * 0.1;
            const endPos = window.innerHeight * 0.85;
            
            // Rumus posisi bintang saat ini berjalan real-time
            const currentStarTop = startPos + (scrollPercent * (endPos - startPos));
            
            // Terapkan ke style top si bintang
            starTracker.style.top = currentStarTop + 'px';
        });

        // Jalankan fungsi sekali saat pertama kali load agar posisinya pas
        window.dispatchEvent(new Event('scroll'));
    </script>
</x-app-layout>