<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $groups = \App\Models\Group::all();
        $query = \App\Models\Attendance::with(['user.group']);

        // Filter berdasarkan Kelompok
        if ($request->filled('group_id')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('group_id', $request->group_id);
            });
        }

        // Filter berdasarkan Tanggal (Fitur Baru)
        if ($request->filled('tanggal_filter')) {
            $query->whereDate('created_at', $request->tanggal_filter);
        }

        // 🔥 KODE BARU YANG KAMU SELIPKAN DI SINI:
        if ($request->filled('status_filter')) {
            $query->where('status', $request->status_filter);
        }

        $attendances = $query->latest()->get();

        return view('admin.dashboard', compact('attendances', 'groups'));
    }

    // Fungsi untuk menampilkan halaman scanner
    public function scan()
    {
        return view('admin.scan');
    }

    // Fungsi untuk memproses hasil scan (saat kamera berhasil baca QR)
    public function prosesAbsen(Request $request)
    {
        $user = \App\Models\User::where('id', $request->email)->first();
        
        if ($user) {
            $jamSekarang = date('H:i:s');
            $batasTelat = '09:00:00'; 
        
            if ($jamSekarang > $batasTelat) {
                $status = 'Hadir (Telat)';
            } else {
                $status = 'Hadir';
            }

            // Cek apakah sudah absen hari ini (biar data gak double)
            /*$sudahAbsen = \App\Models\Attendance::where('user_id', $user->id)
                                                ->where('tanggal', date('Y-m-d'))
                                                ->first();
            if ($sudahAbsen) {
                return response()->json([
                    'message' => $user->name . ' sudah mencatat kehadiran/izin hari ini.'
                ], 400);
            } */

            \App\Models\Attendance::create([
                'user_id' => $user->id,
                'tanggal' => date('Y-m-d'),
                'jam_masuk' => $jamSekarang,
                'status' => $status
            ]);

            // untuk respon ke jamaah
            if ($status == 'Hadir (Telat)') {
                return response()->json([
                    'message' => 'Amal sholeh tepat waktu yaa ' . $user->name . ' masuk pada jam ' . date('H:i', strtotime($jamSekarang)) . '.'
                ]);
            }

            return response()->json([
                'message' => 'Berhasil! ' . $user->name . ' alhamdulillahijazakumullahukhoiro.'
            ]);
        }

        return response()->json([
            'message' => 'User tidak ditemukan!'
        ], 404);
    }

   // Fungsi prosesIzin 
    public function prosesIzin(Request $request)
    {
        $user = \App\Models\User::where('id', $request->email)->first();

        if ($user) {
            
            $sudahAbsen = \App\Models\Attendance::where('user_id', $user->id)
                                                ->where('tanggal', date('Y-m-d'))
                                                ->first();
            /*if ($sudahAbsen) {
                return response()->json([
                    'message' => $user->name . ' sudah mencatat kehadiran/izin hari ini.'
                ], 400);
            }
            */
            // 🔥 SEKARANG AMAN: jam_masuk di-set null agar tidak ditolak database
            \App\Models\Attendance::create([
                'user_id'    => $user->id,
                'tanggal'    => date('Y-m-d'),
                'jam_masuk'  => date('H:i:s'),
                'status'     => 'Izin',
                'created_at' => \Carbon\Carbon::now(), 
                'updated_at' => \Carbon\Carbon::now()
            ]);
            return response()->json([
                'message' => 'Alhamdulillah, status izin ' . $user->name . ' berhasil dicatat.'
            ]);
        }

        return response()->json([
            'message' => 'User tidak ditemukan!'
        ], 404);
    
    }
    
}