<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\siswa;

class kelas extends Model
{
    protected $table = 'kelas';

    protected $fillable = [
    'nama_kelas',
    'jurusan',
];


public function siswa()
{
    return $this->hasMany(siswa::class, 'kelas_id');
}
}