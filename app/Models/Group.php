<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    // Tambahkan baris ini agar kolom bisa diisi otomatis
    protected $fillable = ['nama_desa', 'nama_kelompok'];
}