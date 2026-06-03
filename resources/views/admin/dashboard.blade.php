<x-app-layout>
    <div class="block md:hidden bg-[#0f172a] min-h-screen flex flex-col items-center justify-center p-6 text-center">
        <div
            class="w-16 h-16 bg-rose-500/10 text-rose-500 rounded-full flex items-center justify-center mb-4 ring-8 ring-rose-500/5 animate-pulse">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 18h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2zM13 5h-2"></path>
            </svg>
        </div>
        <h1 class="text-white font-bold text-lg mb-2">Layar Terlalu Sempit</h1>
        <p class="text-slate-400 text-sm max-w-xs leading-relaxed">
            Halaman Dashboard Admin harus dibuka secara <span class="text-amber-400 font-semibold">Landscape
                (Miring)</span> atau menggunakan <span class="text-emerald-400 font-semibold">Laptop/Komputer</span>
            demi kenyamanan tampilan data.
        </p>
    </div>

    <div class="hidden md:block">

        <div class="mb-6 bg-[#0f172a] p-4 rounded-xl border border-white/5">
            <form action="{{ route('admin.dashboard') }}" method="GET" class="flex items-end gap-4">

                <div class="w-64">
                    <label class="block text-xs font-medium text-slate-400 uppercase mb-2">Kelompok</label>
                    <select name="group_id"
                        class="w-full rounded-lg border-white/10 bg-[#1e293b] p-2 text-sm text-white focus:ring-emerald-500">
                        <option value="">Semua Kelompok</option>
                        @foreach ($groups as $group)
                            <option value="{{ $group->id }}"
                                {{ request('group_id') == $group->id ? 'selected' : '' }}>
                                {{ $group->nama_desa }} - {{ $group->nama_kelompok }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="w-48">
                    <label class="block text-xs font-medium text-slate-400 uppercase mb-2">Pilih Tanggal</label>
                    <input type="date" name="tanggal_filter" value="{{ request('tanggal_filter') }}"
                        class="w-full rounded-lg border-white/10 bg-[#1e293b] p-2 text-sm text-white focus:ring-emerald-500 transition-all">
                </div>

                <button type="submit"
                    class="bg-emerald-500 hover:bg-emerald-400 text-[#020617] px-4 py-2 rounded-lg font-bold text-sm transition-all h-[38px]">
                    Filter
                </button>

                <div class="flex flex-col">
                    <span class="text-xs font-bold text-transparent select-none mb-2">FILTER STATUS</span>
                    <div class="flex items-center gap-2">

                        <a href="{{ request()->fullUrlWithQuery(['status_filter' => '']) }}"
                            class="p-2 rounded-lg border transition-all duration-200 block
                           {{ request('status_filter') == '' ? 'bg-slate-700 text-white border-slate-500 shadow-md scale-105' : 'bg-slate-800 text-slate-400 border-slate-700 hover:bg-slate-700 hover:text-slate-200' }}"
                            title="Semua Status">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                </path>
                            </svg>
                        </a>

                        <a href="{{ request()->fullUrlWithQuery(['status_filter' => 'Hadir']) }}"
                            class="p-2 rounded-lg border transition-all duration-200 block
                           {{ request('status_filter') == 'Hadir' ? 'bg-emerald-950 text-emerald-400 border-emerald-500 shadow-md scale-105 ring-1 ring-emerald-500' : 'bg-slate-800 text-emerald-500 border-slate-700 hover:bg-slate-700' }}"
                            title="Hadir">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                            </path>
                            </svg>
                        </a>

                        <a href="{{ request()->fullUrlWithQuery(['status_filter' => 'Hadir (Telat)']) }}"
                            class="p-2 rounded-lg border transition-all duration-200 block
                           {{ request('status_filter') == 'Hadir (Telat)' ? 'bg-yellow-950 text-yellow-400 border-yellow-500 shadow-md scale-105 ring-1 ring-yellow-500' : 'bg-slate-800 text-yellow-500 border-slate-700 hover:bg-slate-700' }}"
                            title="Hadir (Telat)">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </a>

                        <a href="{{ request()->fullUrlWithQuery(['status_filter' => 'Izin']) }}"
                            class="p-2 rounded-lg border transition-all duration-200 block
                           {{ request('status_filter') == 'Izin' ? 'bg-rose-950 text-rose-400 border-rose-500 shadow-md scale-105 ring-1 ring-rose-500' : 'bg-slate-800 text-rose-500 border-slate-700 hover:bg-slate-700' }}"
                            title="Izin">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                            </svg>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                            </svg>
                        </a>
                    </div>
                </div>

                @if (request('group_id') || request('tanggal_filter') || request('status_filter'))
                    <a href="{{ route('admin.dashboard') }}"
                        class="text-xs text-slate-500 hover:text-red-400 ml-2 mb-2">Reset</a>
                @endif
            </form>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                    <h2 class="text-2xl font-bold mb-4 text-gray-800">Data Absensi Terbaru</h2>

                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-100 text-left">
                                <th class="p-3 border-b">Nama Member</th>
                                <th class="p-3 border-b">Desa - Kelompok</th>
                                <th class="p-3 border-b">Tanggal</th>
                                <th class="p-3 border-b">Jam Absen</th>
                                <th class="p-3 border-b">Status</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            @foreach ($attendances as $attendance)
                                <tr class="border-b">
                                    <td class="p-3">{{ $attendance->user->name }}</td>
                                    <td class="p-3">
                                        {{ $attendance->user->group->nama_desa }} -
                                        {{ $attendance->user->group->nama_kelompok }}
                                    </td>
                                    <td class="p-3 text-slate-600">
                                        {{ $attendance->created_at->format('d/m/Y') }}
                                    </td>
                                    <td class="p-3 text-slate-600">
                                        @if ($attendance->status == 'Izin')
                                            -
                                        @else
                                            {{ $attendance->created_at ? $attendance->created_at->format('H:i:s') : '-' }}
                                        @endif
                                    </td>
                                    <td
                                        class="p-3 font-bold 
                                        @if ($attendance->status == 'Hadir') text-emerald-500 
                                        @elseif($attendance->status == 'Hadir (Telat)') text-yellow-500 
                                        @elseif($attendance->status == 'Izin') text-rose-500 @endif">
                                        {{ $attendance->status }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <script>
        function fetchAbsensi() {
            fetch('/admin/get-latest-absen')
                .then(response => response.json())
                .then(data => {
                    let html = '';
                    data.forEach(absen => {
                        let statusColor = '';
                        if (absen.status === 'Hadir') statusColor = 'text-emerald-500';
                        else if (absen.status === 'Hadir (Telat)') statusColor = 'text-yellow-500';
                        else if (absen.status === 'Izin') statusColor = 'text-rose-500';

                        let jamAbsen = absen.status === 'Izin' ? '-' : (absen.jam_masuk ? absen.jam_masuk :
                            '-');

                        html += `
                        <tr class="border-b">
                            <td class="p-3">${absen.user.name}</td>
                            <td class="p-3">${absen.user.group ? absen.user.group.nama_desa + ' - ' + absen.user.group.nama_kelompok : 'Tanpa Kelompok'}</td>
                            <td class="p-3 text-slate-600">${absen.tanggal}</td>
                            <td class="p-3 text-slate-600">${jamAbsen}</td>
                            <td class="p-3 font-bold ${statusColor}">${absen.status}</td>
                        </tr>`;
                    });
                    document.getElementById('table-body').innerHTML = html;
                });
        }

        setInterval(fetchAbsensi, 5000);
        fetchAbsensi(); 
    </script>
</x-app-layout>
