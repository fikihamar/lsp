<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mengajar extends Model
{
    public $timestamps = false;
    public $fillable = [
        'id','nip','id_mapel','id_kelas'
    ];
    public $table = "mengajar";
}
