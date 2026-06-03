<x-app-layout>
    <style>
        /* Mengunci warna dropdown option saat diklik agar tetap dark mode */
        .layout-dark-select option {
            background-color: #0b1329 !important;
            color: #e2e8f0 !important;
        }

        /* Menghilangkan efek warna biru bawaan browser saat option di-hover */
        .layout-dark-select option:hover,
        .layout-dark-select option:focus,
        .layout-dark-select option:active,
        .layout-dark-select option:checked {
            background-color: #10b981 !important;
            color: #ffffff !important;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="min-h-screen bg-[#0b1329] px-3 py-6 md:p-6 text-white islamic-pattern">
        <div class="max-w-4xl mx-auto space-y-6">

            <div class="space-y-2">
                <h1 class="text-2xl font-extrabold tracking-tight md:text-3xl text-white">
                    Statistik <span class="text-emerald-500">Kehadiran Jamaah</span>
                </h1>
                <p class="text-sm text-slate-400">
                    Grafik garis di bawah menunjukkan total frekuensi absensi kamu di setiap bulan pada tahun ini.
                </p>
            </div>

            <div class="bg-slate-950/60 backdrop-blur-md border border-slate-800/60 p-4 sm:p-6 rounded-2xl shadow-xl">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                    <div>
                        <h3 class="text-lg font-bold text-white">Ringkasan Absensi Bulanan</h3>
                        <p class="text-xs text-slate-500 mt-0.5">Menampilkan histori kehadiran jamaah</p>
                    </div>

                    <div class="flex items-center gap-3 w-full sm:w-auto">
                        <form action="{{ route('member.statistik') }}" method="GET" id="filterTahunForm"
                            class="w-full sm:w-auto">
                            <select name="tahun" onchange="document.getElementById('filterTahunForm').submit()"
                                class="w-full sm:w-auto bg-slate-900 border border-slate-700 rounded-xl px-3 py-1.5 text-sm text-emerald-400 font-medium focus:outline-none focus:border-emerald-500 transition-all duration-300 cursor-pointer layout-dark-select">
                                @foreach ($listTahun as $tahun)
                                    <option value="{{ $tahun }}" {{ $tahun == $tahunPilihan ? 'selected' : '' }}
                                        class="bg-[#0b1329] text-slate-200 py-2">
                                        Tahun {{ $tahun }}
                                        {{ $tahun == Carbon\Carbon::now()->year ? '(Sekarang)' : '' }}
                                    </option>
                                @endforeach
                            </select>
                        </form>

                        <div
                            class="bg-emerald-500/10 border border-emerald-500/20 px-3 py-2 rounded-xl text-xs font-semibold text-emerald-400 whitespace-nowrap">
                            Total: {{ $totalHadirTahunIni }} Hadir
                        </div>
                    </div>

                </div>
                <div class="relative w-full h-[300px] md:h-[400px]">
                    <canvas id="lineAbsensiChart"></canvas>
                </div>
            </div>

        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // 1. Ambil element canvas
            const ctx = document.getElementById('lineAbsensiChart').getContext('2d');

            const dataAbsensiPerBulan = @json($dataAbsensi);

            // 3. Setup Gradient Warna Emerald di Bawah Garis (Biar Glowing Premium)
            const gradient = ctx.createLinearGradient(0, 0, 0, 300);
            gradient.addColorStop(0, 'rgba(16, 185, 129, 0.3)'); // Hijau emerald transparan di atas
            gradient.addColorStop(1, 'rgba(16, 185, 129, 0)'); // Memudar jadi transparan total di bawah

            // 4. Inisialisasi Chart.js dengan Tipe 'line'
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov',
                        'Des'
                    ],
                    datasets: [{
                        label: 'Frekuensi Absen',
                        data: dataAbsensiPerBulan,
                        borderColor: '#10b981', // Warna garis utama (Emerald-500)
                        borderWidth: 3, // Ketebalan garis diagram
                        backgroundColor: gradient, // Efek bayangan gradient di bawah garis
                        fill: true, // Aktifkan pengisian area di bawah garis
                        tension: 0.3, // Membuat garis melengkung smooth (tidak kaku patah-patah)
                        pointBackgroundColor: '#10b981', // Warna titik data
                        pointBorderColor: '#ffffff', // Pinggiran titik data berwarna putih
                        pointHoverRadius: 7, // Ukuran titik membesar saat kursor hover
                        pointRadius: 4 // Ukuran standar titik data
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false // Sembunyikan label kotak bawaan karena sudah kita buatkan card di atas
                        },
                        tooltip: {
                            backgroundColor: '#0f172a', // Background popup saat di-hover (Slate-900)
                            titleColor: '#ffffff',
                            bodyColor: '#10b981',
                            borderColor: '#334155',
                            borderWidth: 1,
                            padding: 10,
                            displayColors: false,
                            callbacks: {
                                label: function(context) {
                                    return ' Absen: ' + context.raw + ' Kali';
                                }
                            }
                        }
                    },
                    scales: {
                        // Pengaturan Garis Horizontal (X)
                        x: {
                            grid: {
                                color: 'rgba(51, 65, 85, 0.2)' // Warna garis latar belakang tipis (Slate-700)
                            },
                            ticks: {
                                autoSkip: false, // Biar gak ada bulan yang disembunyikan
                                maxRotation: 0,
                                minRotation: 0,
                                color: '#94a3b8',

                                // 🔥 SAKTI: Mengubah nama bulan jadi 1 huruf khusus di HP
                                callback: function(value, index, values) {
                                    // Ambil nama bulan asli bawaan grafikmu (Jan, Feb, dst)
                                    const label = this.getLabelForValue(value);

                                    // Cek ukuran layar, kalau di bawah 640px (HP), ambil huruf pertamanya aja
                                    if (window.innerWidth < 640) {
                                        return label.charAt(0); // Jan jadi J, Feb jadi F, dst
                                    }

                                    return label; // Kalau di laptop tetap utuh (Jan, Feb, Mar...)
                                },

                                // Ukuran font kita standarkan aja biar aman
                                font: {
                                    size: 10,
                                    weight: 'medium'
                                }
                            }
                        },
                        // Pengaturan Garis Vertikal Angka (Y)
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(51, 65, 85, 0.2)'
                            },
                            ticks: {
                                color: '#94a3b8',
                                stepSize: 1, // Memastikan loncatan angka naik 1 per 1 (tidak desimal koma)
                                callback: function(value) {
                                    return value + 'x'; // Menambahkan akhiran 'x' (Contoh: 1x, 2x, 3x)
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
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
