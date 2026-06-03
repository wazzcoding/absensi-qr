<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

// GANTI BARIS 12 JADI INI:
class DashboardController extends Controller
{
    public function statistik(Request $request)
    {
        $userId = Auth::id();
        $tahunSekarang = Carbon::now()->year;

        // 1. Tangkap tahun dari filter dropdown. Kalau kosong, default-nya tahun sekarang.
        $tahunPilihan = $request->get('tahun', $tahunSekarang);

        // 2. Siapkan list tahun untuk menu dropdown (Tahun ini, 1 tahun lalu, 2 tahun lalu)
        $listTahun = [
            $tahunSekarang,
            $tahunSekarang - 1,
            $tahunSekarang - 2
        ];

        $dataAbsensi = [];

        // 3. Hitung data absen sesuai dengan $tahunPilihan
        for ($bulan = 1; $bulan <= 12; $bulan++) {
            $totalAbsen = DB::table('attendances')
                ->where('user_id', $userId)
                ->whereYear('created_at', $tahunPilihan)
                ->whereMonth('created_at', $bulan)
                ->count();

            $dataAbsensi[] = $totalAbsen;
        }

        $totalHadirTahunIni = array_sum($dataAbsensi);

        // 4. Kirim variabel baru ($listTahun dan $tahunPilihan) ke view
        return view('data-absen', compact('dataAbsensi', 'totalHadirTahunIni', 'listTahun', 'tahunPilihan'));
    }
}
