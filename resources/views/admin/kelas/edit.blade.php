@extends('layouts.base')

@section('title','Edit Kelas')

@section('left-navbar')
    @include('components/navbar-admin')
@endsection

@section('header-left-body')
<h1>Edit Kelas</h1>

@endsection

@section('right-body')

<form class="form" action="{{route('save.kelas',$data->id)}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="">Nama Kelas</label>
        <input type="text" class="form-control" value="{{$data->nama}}" name="nama" required>
    </div>
    <div class="form-group">
        <label for="">Jurusan</label>
        <select class="form-control" name="jurusan" id="" required>
            <option value="" disabled>Pilih Jurusan</option>
            @forelse($jurusan as $jurusan)
            <option @if ($data->id_jurusan == $jurusan->id) selected="selected" @endif value="{{$jurusan->id}}">{{$jurusan->id}} || {{$jurusan->nama}}</option>
            @empty
                <option value="">Tidak Ada Data</option>
            @endforelse
        </select>
    </div>
    <button class="btn" type="submit">Edit</button>

    </form>
@endsection