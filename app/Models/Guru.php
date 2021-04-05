<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    public $timestamps = false;
    public $fillable = [
        'nip','nama','jk','alamat','password'
    ];
    public $table = "guru";
}
