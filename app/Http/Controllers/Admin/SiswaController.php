<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\kelas;

class SiswaController extends Controller
{
    private $validated = [
        'nis' => 'required|unique:siswa'
    ];
    public function data(Request $r)
    {
        $data = \DB::select('SELECT * FROM vsiswa');
        return view('admin.siswa.data',[
            'data' => $data,
            'kelas' => Kelas::all()
        ]);
    }
    public function store(Request $r)
    {
        $validated = $r->validate($this->validated);

        Siswa::create([
            'nis' => $r->nis,
            'nama' => $r->nama,
            'jk' => $r->jk,
            'alamat' => $r->alamat,
            'password' => $r->password,
            'id_kelas' => $r->kelas,
        ]);

        return back();
    }
    public function edit(Request $r,$nis)
    {
        return view('admin.siswa.edit',[
            'data' => Siswa::where('nis',$nis)->first(),
            'kelas' => Kelas::all()
        ]);
    }
    public function save(Request $r, $nis)
    {

        \DB::update("UPDATE siswa SET nama='$r->nama',
        jk='$r->jk',
        alamat='$r->alamat',
        password='$r->password',
        id_kelas='$r->kelas'
        WHERE nis='$nis'");
        // Siswa::update([
        //     'nama' => $r->nama,
        //     'jk' => $r->jk,
        //     'alamat' => $r->alamat,
        //     'password' => $r->password,
        //     'id_kelas' => $r->kelas,
        // ],['nis'=>$nis]);
        return redirect()->route('data.siswa');
    }
    public function delete(Request $r, $nis)
    {
        \DB::delete("DELETE FROM siswa WHERE nis='$nis'");
        return back();
    }
}
