@extends('layouts.base')

@section('title','Data Jurusan')

@section('left-navbar')
    @include('components/navbar-admin')
@endsection

@section('header-left-body')
<h1>Data Kelas</h1>
@endsection

@section('content-left-body')
    <form class="form" action="{{route('add.kelas')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="">Nama Kelas</label>
        <input class="form-control" type="text" name="nama" required>
    </div>
    <div class="form-group">
        <label for="">Jurusan</label>
        <select class="form-control" name="jurusan" id="" required>
            <option value="" selected disabled>Pilih Jurusan</option>
            @forelse($jurusan as $jurusan)
            <option value="{{$jurusan->id}}">{{$jurusan->id}} || {{$jurusan->nama}}</option>
            @empty
                <option value="">Tidak Ada Data</option>
            @endforelse
        </select>
    </div>
    <button class="btn" type="submit">Tambah</button>

    </form>

@endsection

@section('right-body')
<table class="table" border="1px solid">
<thead>
<th>No</th>
<th>Nama Kelas</th>
<th>Jurusan</th>
<th>Action</th>
</thead>
<tbody>
@foreach($data as $item)
<tr>
<td>{{$loop->iteration}}</td>
<td>{{$item->nama_kelas}}</td>
<td>{{$item->nama_jurusan}}</td>
<td>
    <div class="button-group">
        <a class="btn" href="{{route('edit.kelas',$item->id)}}">Edit</a>
        <form action="{{route('delete.kelas',$item->id)}}" method="POST">
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