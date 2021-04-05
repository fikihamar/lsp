@extends('layouts.base')

@section('title','Data Jurusan')

@section('left-navbar')
    @include('components/navbar-admin')
@endsection

@section('header-left-body')
<h1>Data Jurusan</h1>
@endsection

@section('content-left-body')
    <form class="form" action="{{route('add.jurusan')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="">Nama Jurusan</label>
        <input type="text" class="form-control" name="nama" required>
    </div>
    <button type="submit" class="btn">Tambah</button>

    </form>

@endsection

@section('right-body')
<table class="table" border="1px solid">
<thead>
<th>No</th>
<th>Nama Jurusan</th>
<th>Action</th>
</thead>
<tbody>
@foreach($data as $item)
<tr>
<td>{{$loop->iteration}}</td>
<td>{{$item->nama}}</td>
<td>
    <div class="button-group">
<a class="btn" href="{{route('edit.jurusan',$item->id)}}">Edit</a>
<form action="{{route('delete.jurusan',$item->id)}}" method="POST">
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