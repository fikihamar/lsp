@extends('layouts.base')

@section('title','Data Siswa')

@section('left-navbar')
    @include('components/navbar-admin')
@endsection
@section('header-left-body')
    <h1>Data Siswa</h1>
@endsection
@section('content-left-body')
    <form class="form" action="{{route('add.siswa')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="">NIS</label>
        <input placeholder="NIS" class="form-control" type="text" name="nis" required>
    </div>
    <div class="form-group">
        <label for="">Nama</label>
        <input placeholder="Nama" class="form-control" type="text" name="nama" required>
    </div>
    <div class="form-group">
        <label for="">Jenis Kelamin</label>
        <select class="form-control" name="jk" id="">
            <option value="" disabled selected>Pilih Jenis Kelamin</option>
            <option value="L">Laki Laki</option>
            <option value="P">Perempuan</option>
        </select>
    </div>
    <div class="form-group">
        <label for="">Password</label>
        <input placeholder="Password" class="form-control" type="text" name="password" required>
    </div>
    <div class="form-group">
        <label for="">Alamat</label>
        <textarea class="form-control" name="alamat" id="" cols="30" rows="10">
        </textarea>
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
    <button class="btn" type="submit">Tambah</button>
    </form>

@endsection

@section('right-body')
<table class="table" border="1px solid">
<thead>
<th>No</th>
<th>NIS</th>
<th>Nama Siswa</th>
<th>Jenis Kelamin</th>
<th>Alamat</th>
<th>Password</th>
<th>Kelas</th>
<th>Jurusan</th>
<th>Action</th>
</thead>
<tbody>
@foreach($data as $item)
<tr>
<td>{{$loop->iteration}}</td>
<td>{{$item->nis}}</td>
<td>{{$item->nama_siswa}}</td>
<td>{{$item->jk}}</td>
<td>{{$item->alamat}}</td>
<td>{{$item->password}}</td>
<td>{{$item->kelas}}</td>
<td>{{$item->jurusan}}</td>
<td>
    <div class="button-group">
        <a class="btn" href="{{route('edit.siswa',$item->nis)}}">Edit</a>
        <form action="{{route('delete.siswa',$item->nis)}}" method="POST">
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