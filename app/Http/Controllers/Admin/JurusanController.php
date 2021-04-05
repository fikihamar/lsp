<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jurusan;

class JurusanController extends Controller
{
    private function validated($r){
        return $r->validate([
            'nama' => 'required|unique:jurusan,nama'
        ]);
    }   
    public function data()
    {
        return view('admin.jurusan.data',[
            'data' => Jurusan::all()
        ]);
    }
    public function store(Request $r)
    {
        $validated = $this->validated($r);

        Jurusan::create([
            'nama' => $r->nama
        ]);

        return back();
    }
    public function edit(Request $r,$id)
    {
        return view('admin.jurusan.edit',[
            'data'=> Jurusan::find($id)
        ]);
    }
    public function save(Request $r, $id)
    {

        $data = Jurusan::find($id);
        $data->nama = $r->nama;
        $data->save();
        return redirect()->route('data.jurusan');
    }
    public function delete(Request $r, $id)
    {
        $data = Jurusan::find($id);
        $data->delete();
        return back();
    }
}
