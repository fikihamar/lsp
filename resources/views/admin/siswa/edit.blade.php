@extends('layouts.base')

@section('title','Edit Siswa')

@section('left-navbar')
    @include('components/navbar-admin')
@endsection

@section('header-left-body')
<h1>Edit Siswa</h1>
@endsection

@section('right-body')
<form class="form" action="{{route('save.siswa',$data->nis)}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="">Nama</label>
        <input class="form-control" placeholder="" type="text" name="nama" value="{{$data->nama}}" required>
    </div>
    <div class="form-group">
        <label for="">Jenis Kelamin</label>
        <select class="form-control" name="jk" id="">
            <option value="" @if ($data->jk == null) selected="selected" @endif disabled>Pilih Jenis Kelamin</option>
            <option @if ($data->jk == "L") selected="selected" @endif value="L">Laki Laki</option>
            <option @if ($data->jk == "P") selected="selected" @endif value="P">Perempuan</option>
        </select>
    </div>
    <div class="form-group">
        <label for="">Password</label>
        <input class="form-control" placeholder="" type="text" value="{{$data->password}}" name="password" required>
    </div>
    <div class="form-group">
        <label for="">Alamat</label>
        <textarea class="form-control" name="alamat" id=""  rows="10">
            {{$data->alamat}}
        </textarea>
    </div>
    <div class="form-group">
        <label for="">Kelas</label>
        <select class="form-control" name="kelas" id="" required>
            <option value="" @if ($data->id_kelas == null) selected="selected" @endif disabled>Pilih siswa</option>
            @forelse($kelas as $kelas)
            <option @if ($data->id_kelas == $kelas->id) selected="selected" @endif value="{{$kelas->id}}">{{$kelas->id}} || {{$kelas->nama}}</option>
            @empty
                <option value="">Tidak Ada Data</option>
            @endforelse
        </select>
    </div>
    <button class="btn" type="submit">Edit</button>
    </form>
@endsection
