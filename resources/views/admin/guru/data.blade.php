@extends('layouts.base')

@section('title','Data Guru')

@section('left-navbar')
    @include('components/navbar-admin')
@endsection

@section('header-left-body')
<h1>Data Guru</h1>
@endsection

@section('content-left-body')
    <form class="form" action="{{route('add.guru')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="">NIP</label>
        <input class="form-control" type="text" name="nip" required>
    </div>
    <div class="form-group">
        <label for="">Nama</label>
        <input class="form-control" type="text" name="nama" required>
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
        <input type="text" class="form-control" name="password" required>
    </div>
    <div class="form-group">
        <label for="">Alamat</label>
        <textarea name="alamat" class="form-control" id="" cols="30" rows="10">
        </textarea> 
    </div>
    <button class="btn" type="submit">Tambah</button>

    </form>

@endsection

@section('right-body')
<table class="table" border="1px solid">
<thead>
<th>No</th>
<th>NIP</th>
<th>Nama Siswa</th>
<th>Jenis Kelamin</th>
<th>Alamat</th>
<th>Password</th>
<th>Action</th>
</thead>
<tbody>
@forelse($data as $item)
<tr>
<td>{{$loop->iteration}}</td>
<td>{{$item->nip}}</td>
<td>{{$item->nama}}</td>
<td>{{$item->jk}}</td>
<td>{{$item->alamat}}</td>
<td>{{$item->password}}</td>
<td>
    <div class="button-group">
        <a class="btn" href="{{route('edit.guru',$item->nip)}}">Edit</a>
        <form action="{{route('delete.guru',$item->nip)}}" method="POST">
         @csrf
         <button class="btn btn-delete" type="submit">Delete</button>
        </form>
    </div> 
</td>
</tr>
@empty
<tr><td colspan="7" style="text-align: center">Tidak Ada Data</td></tr>
@endforelse
</tbody>
</table>
@endsection