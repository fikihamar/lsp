<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public  $timestamps = false;
    public $fillable = [
        'id','username','password'
    ];
    public $table = "admin";
}
