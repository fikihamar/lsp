@extends('layouts.base')

@section('title','Edit Kelas')

@section('left-navbar')
    @include('components/navbar-admin')
@endsection

@section('header-left-body')
<h1>Edit Mengajar</h1>

@endsection

@section('right-body')

<form class="form" action="{{route('save.mengajar',$data->id)}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="">Guru</label>
        <select class="form-control" name="guru" id="" required>
            <option value="" disabled>Pilih Guru</option>
            @forelse($guru as $guru)
            <option @if($data->nip == $guru->nip) selected="selected" @endif value="{{$guru->nip}}">{{$guru->nip}} || {{$guru->nama}}</option>
            @empty
                <option value="">Tidak Ada Data</option>
            @endforelse
        </select>
    </div>
    <div class="form-group">
        <label for="">Mapel</label>
        <select class="form-control" name="mapel" id="" required>
            <option value="" disabled>Pilih Mata Pelajaran</option>
            @forelse($mapel as $mapel)
            <option @if($data->id_mapel == $mapel->id) selected="selected" @endif value="{{$mapel->id}}">{{$mapel->id}} || {{$mapel->nama}}</option>
            @empty
                <option value="">Tidak Ada Data</option>
            @endforelse
        </select>
    </div>
    <div class="form-group">
        <label for="">Kelas</label>
        <select class="form-control" name="kelas" id="" required>
            <option value="" disabled>Pilih Kelas</option>
            @forelse($kelas as $kelas)
            <option @if($data->id_kelas == $kelas->id) selected="selected" @endif value="{{$kelas->id}}">{{$kelas->id}} || {{$kelas->nama}}</option>
            @empty
                <option value="">Tidak Ada Data</option>
            @endforelse
        </select>
    </div>
    <button class="btn" type="submit">Edit</button>

    </form>
@endsection