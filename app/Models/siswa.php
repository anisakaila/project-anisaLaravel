<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    // Nama tabel sesuai migration
    protected $table = 'siswa';

    // Mass assignable
    protected $fillable = [
        'nis',
        'nama',
        'kelas_id',
        'jenis_kelamin',
        'alamat',
        'no_telp'
    ];

    // Relasi ke tabel kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}
