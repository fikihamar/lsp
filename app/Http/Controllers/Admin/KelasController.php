<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Jurusan;

class KelasController extends Controller
{
    private $validated = [
        'nama' => 'required|unique:kelas'
    ];
    public function data(Request $r)
    {
        $data = \DB::select('SELECT * FROM vkelas');
        return view('admin.kelas.data',[
            'data' => $data,
            'jurusan' => Jurusan::all()
        ]);
    }
    public function store(Request $r)
    {
        $validated = $r->validate($this->validated);

        Kelas::create([
            'nama' => $r->nama,
            'id_jurusan' => $r->jurusan
        ]);

        return back();
    }
    public function edit(Request $r,$id)
    {
        return view('admin.kelas.edit',[
            'data'=> kelas::find($id),
            'jurusan' => Jurusan::all()
        ]);
    }
    public function save(Request $r, $id)
    {

        $data = Kelas::find($id);
        $data->nama = $r->nama;
        $data->id_jurusan = $r->jurusan;
        $data->save();
        return redirect()->route('data.kelas');
    }
    public function delete(Request $r, $id)
    {
        $data = Kelas::find($id);
        $data->delete();
        return back();
    }
}
