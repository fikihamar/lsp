<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    public $timestamps = false;
    public $fillable = [
        'id','nama','id_jurusan'
    ];
    public $table = "kelas";

}
