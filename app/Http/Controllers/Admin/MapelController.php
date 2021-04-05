<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mapel;

class MapelController extends Controller
{
    private $validated = [
        'nama' => 'required|unique:mapel'
    ];
    public function data(Request $r)
    {
        return view('admin.mapel.data',[
            'data' => Mapel::all()
        ]);
    }
    public function store(Request $r)
    {
        $validated = $r->validate($this->validated);
        
        Mapel::create([
            'nama' => $r->nama,
            'kode' => $r->kode
        ]);

        return back();
    }
    public function edit(Request $r,$id)
    {
        return view('admin.mapel.edit',[
            'data'=> Mapel::find($id)
        ]);
    }
    public function save(Request $r, $id)
    {
        $data = Mapel::findOrFail($id);
        $data->nama = $r->nama;
        $data->kode = $r->kode;
        $data->save();
        return redirect()->route('data.mapel');
    }
    public function delete(Request $r, $id)
    {
        $data = Mapel::findOrFail($id);
        $data->delete();
        return back();
    }
}
