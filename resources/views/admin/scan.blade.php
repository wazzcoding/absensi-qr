<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Pusat Scanner Absensi') }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-[#0b1329] px-4 py-8 text-white">
        <div class="max-w-md mx-auto space-y-6">
            
            <div class="text-center mb-2">
                <h1 class="text-xl font-extrabold text-white tracking-tight">Kamera Scan Mandiri</h1>
                <p class="text-xs text-slate-400 mt-1">Pilih status terlebih dahulu sebelum mengarahkan QR Code</p>
            </div>

            <div class="flex p-1 bg-slate-950/80 rounded-xl border border-slate-800/60 shadow-lg">
                <button onclick="setAbsenMode('hadir')" id="btn-mode-hadir" 
                        class="flex-1 py-2.5 text-xs font-bold rounded-lg bg-emerald-500 text-white transition-all duration-200">
                    🟢 HADIR
                </button>
                <button onclick="setAbsenMode('izin')" id="btn-mode-izin" 
                        class="flex-1 py-2.5 text-xs font-bold rounded-lg text-slate-400 hover:text-slate-200 transition-all duration-200">
                    🟡 IZIN / SAKIT
                </button>
            </div>

            <div id="card-scanner" class="bg-slate-950/60 backdrop-blur-md border-2 border-emerald-500/30 p-4 sm:p-5 rounded-2xl shadow-xl relative overflow-hidden transition-all duration-300">
                
                <div class="flex items-center gap-3 mb-4">
                    <div id="status-badge" class="text-xs font-bold px-3 py-1 rounded-md bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 uppercase tracking-wide">
                        Mode: Hadir
                    </div>
                </div>

                <div class="bg-slate-900 rounded-xl overflow-hidden p-2 border border-slate-800">
                    <div id="reader" class="w-full"></div>
                </div>
            </div>

        </div>
    </div>

    <style>
        #reader #html5-qrcode-anchor-scan-type {
            color: #10b981 !important; 
            font-size: 12px !important;
            font-weight: bold !important;
            text-decoration: underline !important;
            display: block !important;
            margin-top: 10px !important;
            text-align: center !important;
        }
        #reader button {
            background-color: #1e293b !important;
            color: #ffffff !important;
            border: 1px solid #334155 !important;
            padding: 6px 12px !important;
            border-radius: 8px !important;
            font-size: 12px !important;
            cursor: pointer !important;
        }
        #reader button:hover {
            background-color: #334155 !important;
        }
    </style>

    <script src="https://unpkg.com/html5-qrcode"></script>
    <script>
        // default mode scan pengurus
        let currentMode = 'hadir'; 
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // section ganti hadir dan izin
        function setAbsenMode(mode) {
            currentMode = mode;
            const btnHadir = document.getElementById('btn-mode-hadir');
            const btnIzin = document.getElementById('btn-mode-izin');
            const cardScanner = document.getElementById('card-scanner');
            const statusBadge = document.getElementById('status-badge');

            if (mode === 'hadir') {
                // Set warna tombol 
                btnHadir.className = "flex-1 py-2.5 text-xs font-bold rounded-lg bg-emerald-500 text-white transition-all duration-200";
                btnIzin.className = "flex-1 py-2.5 text-xs font-bold rounded-lg text-slate-400 hover:text-slate-200 transition-all duration-200";
                // Set border card & badge
                cardScanner.className = "bg-slate-950/60 backdrop-blur-md border-2 border-emerald-500/30 p-4 sm:p-5 rounded-2xl shadow-xl relative overflow-hidden transition-all duration-300";
                statusBadge.className = "text-xs font-bold px-3 py-1 rounded-md bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 uppercase tracking-wide";
                statusBadge.innerText = "Mode: Hadir";
            } else {
                btnHadir.className = "flex-1 py-2.5 text-xs font-bold rounded-lg text-slate-400 hover:text-slate-200 transition-all duration-200";
                btnIzin.className = "flex-1 py-2.5 text-xs font-bold rounded-lg bg-amber-500 text-white transition-all duration-200";
                cardScanner.className = "bg-slate-950/60 backdrop-blur-md border-2 border-amber-500/30 p-4 sm:p-5 rounded-2xl shadow-xl relative overflow-hidden transition-all duration-300";
                statusBadge.className = "text-xs font-bold px-3 py-1 rounded-md bg-amber-500/10 text-amber-400 border border-amber-500/20 uppercase tracking-wide";
                statusBadge.innerText = "Mode: Izin / Sakit";
            }
        }

        //proses absen
        function onScanSuccess(decodedText, decodedResult) {
            html5QrcodeScanner.clear(); 

            // logika route
            let targetUrl = currentMode === 'hadir' ? '/admin/absen' : '/admin/izin';
            let statusLabel = currentMode === 'hadir' ? '🟢 HADIR' : '🟡 IZIN';

            fetch(targetUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ 
                    email: decodedText,
                    status_absen: currentMode
                })
            })
            .then(response => response.json())
            .then(data => {
                alert(`${statusLabel} BERHASIL!\nQR Baca: ${decodedText}\nPesan: ${data.message}`);
                location.reload();
            })
            .catch(error => {
                alert(`Gagal mencatat absensi ${currentMode}`);
                location.reload();
            });
        }

        let html5QrcodeScanner = new Html5QrcodeScanner("reader", {
            fps: 10,
            qrbox: { width: 230, height: 230 },
            videoConstraints: { facingMode: { exact: "environment" } }
        });
        html5QrcodeScanner.render(onScanSuccess);
    </script>
</x-app-layout>