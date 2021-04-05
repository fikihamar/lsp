<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;

class GuruController extends Controller
{
    private $validated = [
        'nip' => 'required|unique:guru'
    ];
    public function data(Request $r)
    {
        return view('admin.guru.data',[
            'data' => Guru::all()
        ]);
    }
    public function store(Request $r)
    {
        $validated = $r->validate($this->validated);

        Guru::create([
            'nip' => $r->nip,
            'nama' => $r->nama,
            'jk' => $r->jk,
            'alamat' => $r->alamat,
            'password' => $r->password
        ]);

        return back();
    }
    public function edit(Request $r,$nip)
    {
        return view('admin.guru.edit',[
            'data' => Guru::where('nip',$nip)->first()
        ]);
    }
    public function save(Request $r, $nip)
    {
        Guru::where('nip',$nip)->update([
            'nama' => $r->nama,
            'jk' => $r->jk,
            'alamat' => $r->alamat,
            'password' => $r->password
        ]);
        // \DB::update("UPDATE guru SET nama='$r->nama',
        // jk='$r->jk',
        // alamat='$r->alamat',
        // password='$r->password'
        // WHERE nip='$nip'");
        // Siswa::update([
        //     'nama' => $r->nama,
        //     'jk' => $r->jk,
        //     'alamat' => $r->alamat,
        //     'password' => $r->password,
        //     'id_kelas' => $r->kelas,
        // ],['nis'=>$nis]);
        return redirect()->route('data.guru');
    }
    public function delete(Request $r, $nip)
    {
        \DB::delete("DELETE FROM guru WHERE nip='$nip'");
        return back();
    }
}
