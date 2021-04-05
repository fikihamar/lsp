<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mengajar;
use App\Models\Siswa;
use App\Models\Nilai;

class NilaiController extends Controller
{
    public function data(Request $r)
    {
        $guru = $r->session()->get('user');
        $mengajar = Mengajar::where('nip',$guru->nip)->get();
        $id_kelas = [];
        foreach ($mengajar as $mengajar) {
            array_push($id_kelas,$mengajar->id_kelas);
        }
        $data = \DB::select("SELECT * FROM vnilai WHERE nip ='$guru->nip'");
        return view('guru.nilai.data',[
            'data' => $data,
            'mengajar' => Mengajar::where('nip',$guru->nip)->get(),
            'siswa' => Siswa::whereIn('id_kelas',$id_kelas)->get(),
            'guru' => $guru
        ]);
    }
    public function store(Request $r)
    {
        $na = $r->uh + $r->uts + $r->uas;
        Nilai::create([
            'uh' => $r->uh,
            'uts' => $r->uts,
            'uas' => $r->uh,
            'na' => $na,
            'id_mengajar' => $r->mengajar,
            'nis' => $r->siswa
        ]);
        return back();
    }
    public function edit(Request $r,$id)
    {
        $guru = $r->session()->get('user');
        $mengajar = Mengajar::where('nip',$guru->nip)->get();
        $id_kelas = [];
        foreach ($mengajar as $mengajar) {
            array_push($id_kelas,$mengajar->id_kelas);
        }
        return view('guru.nilai.edit',[
            'data'=> Nilai::find($id),
            'mengajar1' => Mengajar::where('nip',$guru->nip)->get(),
            'siswa' => Siswa::whereIn('id_kelas',$id_kelas)->get()
        ]);
    }
    public function save(Request $r, $id)
    {
        $na = $r->uh + $r->uts + $r->uas;
        $data = Nilai::find($id);
        $data->uh = $r->uh;
        $data->uts = $r->uts;
        $data->uas = $r->uh;
        $data->na = $na;
        $data->id_mengajar = $r->mengajar;
        $data->nis = $r->siswa;
        $data->save();
        return redirect()->route('data.nilai');
    }
    public function delete(Request $r, $id)
    {
        $data = Nilai::find($id);
        $data->delete();
        return back();
    }
}
