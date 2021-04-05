<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    public $timestamps = false;
    public $fillable = [
        'nis','nama','jk','alamat','password','id_kelas'
    ];
    public $table = "siswa";
}
