@extends('layouts.base')

@section('title','Data Mengajar')

@section('left-navbar')
    @include('components/navbar-admin')
@endsection

@section('header-left-body')
<h1>Data Mengajar</h1>
@endsection
@section('content-left-body')
    <form class="form" class="form" action="{{route('add.mengajar')}}" method="POST">
    @csrf
    <div class="form-group">\
        <label for="">Guru</label>
        <select class="form-control" name="guru" id="" required>
            <option value="" selected disabled>Pilih Guru</option>
            @forelse($guru as $guru)
            <option value="{{$guru->nip}}">{{$guru->nip}} || {{$guru->nama}}</option>
            @empty
                <option value="">Tidak Ada Data</option>
            @endforelse
        </select>
    </div>
    <div class="form-group">
        <label for="">Mapel</label>
        <select class="form-control" name="mapel" id="" required>
            <option value="" selected disabled>Pilih Mata Pelajaran</option>
            @forelse($mapel as $mapel)
            <option value="{{$mapel->id}}">{{$mapel->id}} || {{$mapel->nama}}</option>
            @empty
                <option value="">Tidak Ada Data</option>
            @endforelse
        </select>
    </div>
    <div class="form-group">
        <label for="">Kelas</label>
        <select class="form-control" name="kelas" id="" required>
            <option value="" selected disabled>Pilih Kelas</option>
            @forelse($kelas as $kelas)
            <option value="{{$kelas->id}}">{{$kelas->id}} || {{$kelas->nama}}</option>
            @empty
                <option value="">Tidak Ada Data</option>
            @endforelse
        </select>
    </div>
    <button type="submit" class="btn">Tambah</button>

    </form>

@endsection

@section('right-body')
<table class="table" border="1px solid">
<thead>
<th>No</th>
<th>NIP</th>
<th>Nama Guru</th>
<th>Mata Pelajaran</th>
<th>Kelas</th>
<th>Action</th>
</thead>
<tbody>
@foreach($data as $item)
<tr>
<td>{{$loop->iteration}}</td>
<td>{{$item->nip}}</td>
<td>{{$item->guru}}</td>
<td>{{$item->mapel}}</td>
<td>{{$item->kelas}}</td>
<td>
    <div class="button-group">
        <a class="btn" href="{{route('edit.mengajar',$item->id)}}">Edit</a>
        <form action="{{route('delete.mengajar',$item->id)}}" method="POST">
            @csrf
            <button class="btn btn-delete" type="submit">Delete</button>
        </form>
    </div>
</td>
</tr>
@endforeach
</tbody>
</table>
@endsection