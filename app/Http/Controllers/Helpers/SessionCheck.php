<?php

namespace App\Http\Controllers\Helpers;
use Illuminate\Http\Request;

class SessionCheck
{
    public static function CheckLogin($r, $role){
        $session_role = $r->session()->get('role');
        if ($r->session()->has('user') && $session_role == $role) {
            return 200;
        }
        return 401;
    }
}
