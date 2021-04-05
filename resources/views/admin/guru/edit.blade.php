@extends('layouts.base')

@section('title','Edit Guru')

@section('left-navbar')
    @include('components/navbar-admin')
@endsection

@section('header-left-body')
<h1>Edit Guru</h1>
@endsection

@section('right-body')
<form class="form" action="{{route('save.guru',$data->nip)}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="">Nama</label>
        <input type="text" class="form-control" name="nama" value="{{$data->nama}}" required>
    </div>
    <div class="form-group">
        <label for="">Jenis Kelamin</label>
        <select class="form-control" name="jk" id="">
            <option @if ($data->jk == "L") selected="selected" @endif value="L">Laki Laki</option>
            <option @if ($data->jk == "P") selected="selected" @endif value="P">Perempuan</option>
        </select>
    </div>
    <div class="form-group">
        <label for="">Password</label>
        <input class="form-control" type="text" value="{{$data->password}}" name="password" required>
    </div>
    <div class="form-group">
        <label for="">Alamat</label>
        <textarea class="form-control" name="alamat" id="" cols="30" rows="10">
            {{$data->alamat}}
        </textarea>
    </div>
    <button class="btn" type="submit">Edit</button>

    </form>
@endsection
