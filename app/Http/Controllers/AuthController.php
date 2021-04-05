<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Helpers\SessionCheck;
use App\Models\Admin;
use App\Models\Guru;
use App\Models\Siswa;

class AuthController extends Controller
{
    private $role_array = ['admin','siswa','guru'];
    
    public function viewLogin(Request $r, $role)
    {   
        if(!in_array($role,$this->role_array))
            return abort(404);

        $session_role = $r->session()->get('role');
        if (SessionCheck::checkLogin($r,$session_role) == 200 ) {
            return redirect("/$session_role/home");
        }
        
        return view('login',[
            'role' => $role
        ]);
    }
    public function login(Request $r,$role)
    {
        $auth = '';
        if ($role == 'admin') {
           $auth = Admin::where([['username',$r->username],['password',$r->password]])->first();
        }
        elseif ($role == 'guru') {
            $auth = Guru::where([['nip',$r->nip],['password',$r->password]])->first();
        }
        elseif ($role == 'siswa') {
            $auth = Siswa::where([['nis',$r->nis],['password',$r->password]])->first();
        }

        if(!$auth)
            redirect()->route('view.login',$role);

        session([
            'user' => $auth,
            'role' => $role
        ]);
        return redirect("/$role/home");
    }
    public function logout(Request $r)
    {
        $r->session()->forget(['user','role']);
        return redirect()->route('view.login','admin');
    }
}
