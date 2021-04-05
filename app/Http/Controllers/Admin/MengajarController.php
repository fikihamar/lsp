<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kelas;
use App\Models\Guru;
use App\Models\Mengajar;
use App\Models\Mapel;

class MengajarController extends Controller
{
    public function data(Request $r)
    {
        $data = \DB::select('SELECT * FROM vmengajar');
        return view('admin.mengajar.data',[
            'data' => $data,
            'guru' => Guru::all(),
            'mapel' => Mapel::all(),
            'kelas' => Kelas::all(),
        ]);
    }
    public function store(Request $r)
    {
        $validate = Mengajar::where([['nip',$r->guru],['id_mapel',$r->mapel],['id_kelas',$r->kelas]])->first();
        if ($validate) {
            return back();
        }
        Mengajar::create([
            'nip' => $r->guru,
            'id_mapel' => $r->mapel,
            'id_kelas' => $r->kelas,
        ]);

        return back();
    }
    public function edit(Request $r,$id)
    {
        return view('admin.mengajar.edit',[
            'data' => Mengajar::find($id),
            'guru' => Guru::all(),
            'mapel' => Mapel::all(),
            'kelas' => Kelas::all(),
        ]);
    }
    public function save(Request $r, $id)
    {
        $data = Mengajar::find($id);
        $validate = Mengajar::where([['id','<>',$id],['nip',$r->guru],['id_mapel',$r->mapel],['id_kelas',$r->kelas]])->first();
        if ($validate) {
            return back();
        }
        $data->nip = $r->guru;
        $data->id_mapel = $r->mapel;
        $data->id_kelas = $r->kelas;
        $data->save();
        return redirect()->route('data.mengajar');
    }
    public function delete(Request $r, $id)
    {
        $data = Mengajar::find($id);
        $data->delete();
        return back();
    }
}
