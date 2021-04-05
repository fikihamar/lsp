<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    public $timestamps = false;
    public $fillable = [
        'id','kode','nama'
    ];
    public $table = "mapel";
}
