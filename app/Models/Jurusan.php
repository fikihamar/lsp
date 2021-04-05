<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    public $timestamps = false;
    public $fillable = [
        'id','nama'
    ];
    public $table = "jurusan";
}
