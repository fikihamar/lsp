@extends('layouts.base')

@section('title','Edit Kelas')

@section('left-navbar')
    @include('components/navbar-guru')
@endsection

@section('header-left-body')
<h1>Edit Nilai</h1>

@endsection

@section('right-body')
<form class="form" action="{{route('save.nilai',$data->id)}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="">Ulangan Harian</label>
        <input class="form-control" type="text" name="uh" value="{{$data->uh}}">
    </div>
    <div class="form-group">
        <label for="">Ulangan Tengah Semester</label>
        <input class="form-control" type="text" name="uts" value="{{$data->uts}}">
    </div>
    <div class="form-group">
        <label for="">Ulangan Akhir Semester</label>
        <input class="form-control" type="text" name="uas" value="{{$data->uas}}">
    </div>
    <div class="form-group">
        <label for="">Mengajar</label>
        <select class="form-control" name="mengajar" id="" required>
            <option value="" disabled>Pilih Mengajar</option>
            @forelse($mengajar1 as $mengajar)
            <option @if($data->id_mengajar == $mengajar->id) selected="selected" @endif value="{{$mengajar->id}}">{{$mengajar->id}} || {{$mengajar->id_mapel}}</option>
            @empty
                <option value="">Tidak Ada Data</option>
            @endforelse
        </select>
    </div>
    <div class="form-group">
        <label for="">Siswa</label>
        <select class="form-control" name="siswa" id="" required>
            <option value="" disabled>Pilih Siswa</option>
            @forelse($siswa as $siswa)
            <option @if($data->nis == $siswa->nis) selected="selected" @endif value="{{$siswa->nis}}">{{$siswa->nis}} || {{$siswa->nama}}</option>
            @empty
                <option value="">Tidak Ada Data</option>
            @endforelse
        </select>
    </div>
    <button class="btn" type="submit">Edit</button>

    </form>
@endsection