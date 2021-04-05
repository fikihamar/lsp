@extends('layouts.base')

@section('title','Data Mata Pelajaran')

@section('left-navbar')
    @include('components/navbar-admin')
@endsection

@section('header-left-body')
<h1>Data Mata Pelajaran</h1>
    
@endsection
@section('content-left-body')
    <form class="form" action="{{route('add.mapel')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="">Nama Mata Pelajaran</label>
        <input placeholder="Mata Pelajaran" class="form-control" type="text" name="nama" required>
    </div>
    <div class="form-group">
        <label for="">Kode Mata Pelajaran</label>
        <input placeholder="Kode Mata Pelajaran" class="form-control" type="text" name="kode" required>
    </div>
    <button class="btn" type="submit">Tambah</button>

    </form>

@endsection

@section('right-body')
<table class="table" border="1px solid">
<thead>
<th>No</th>
<th>Nama Mata Pelajaran</th>
<th>Kode Mata Pelajaran</th>
<th>Action</th>
</thead>
<tbody>
@foreach($data as $item)
<tr>
<td>{{$loop->iteration}}</td>
<td>{{$item->nama}}</td>
<td>{{$item->kode}}</td>
<td>
    <div class="button-group">
        <a class="btn" href="{{route('edit.mapel',$item->id)}}">Edit</a>
        <form action="{{route('delete.mapel',$item->id)}}" method="POST">
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