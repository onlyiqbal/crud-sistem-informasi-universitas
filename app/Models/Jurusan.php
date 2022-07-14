<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    protected $fillable = ['nama','kepala_jurusan','daya_tampung'];

    public function dosens(){
        return $this->hasMany('App\Models\Dosen');
    }

    public function mahasiswas(){
        return $this->hasMany('App\Models\Mahasiswa');
    }

    public function matakuliahs(){
        return $this->hasMany('App\Models\Matakuliah');
    }
}
