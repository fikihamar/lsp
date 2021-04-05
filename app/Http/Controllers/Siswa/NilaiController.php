<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nilai;

class NilaiController extends Controller
{
    public function data(Request $r)
    {
        $siswa = $r->session()->get('user');
        $data = \DB::select("SELECT * FROM vnilai WHERE nis ='$siswa->nis'");
        return view('siswa.nilai',[
            'data' => $data,
            'siswa' => $siswa
        ]);
    }
}
