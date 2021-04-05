@extends('layouts.base')

@section('title','Data Mata Pelajaran')

@section('left-navbar')
    @include('components/navbar-admin')
@endsection

@section('header-left-body')
<h1>Edit Mata Pelajaran</h1>

@endsection

@section('right-body')

<form action="{{route('save.mapel',$data->id)}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="">Nama Mata Pelajaran</label>
        <input placeholder="Nama Mata Pelajaran" class="form-control" type="text" name="nama" value="{{$data->nama}}" required>
    </div>
    <div class="form-group">
        <label for="">Kode Mata Pelajaran</label>
        <input placeholder="Kode Mata Pelajaran" class="form-control" type="text" name="kode" value="{{$data->kode}}" required>
    </div>
    <button type="submit" class="btn">Edit</button>
    </form>
</tbody>
</table>
@endsection