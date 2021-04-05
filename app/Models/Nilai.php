<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    public $timestamps = false;
    public $fillable = [
        'id','uh','uts','uas','na','id_mengajar','nis'
    ];
    public $table = "nilai";
}
