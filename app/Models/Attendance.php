<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'tanggal', 'jam_masuk', 'status'];

    // INI JEMBATAN YANG HILANG
    public function user()
    {
        // Artinya: Satu data absen ini adalah milik (belongsTo) dari satu User
        return $this->belongsTo(User::class);
    }
}