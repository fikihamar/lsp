@extends('layouts.base')

@section('title','Data Nilai')

@section('left-navbar')
    @include('components/navbar-guru')
@endsection

@section('header-left-body')
    
<h1>Data Nilai</h1>
@endsection
@section('content-left-body')
<table class="identity-table">
    <tr>
        <td>NIP Guru</td>
        <td>:</td>
        <td>{{$guru->nip}}</td>
    </tr>
    <tr>
        <td>Nama Guru</td>
        <td>:</td>
        <td>{{$guru->nama}}</td>
    </tr>
</table>

    <form action="{{route('add.nilai')}}" class="form" method="POST">
    @csrf
    <div class="form-group">
    <label for="">Ulangan Harian</label>
    <input class="form-control" type="number" placeholder="Ulangan Harian" name="uh">
    </div>
    <div class="form-group">
        <label for="">Ulangan Tengah Semester</label>
        <input class="form-control" type="number" placeholder="Ulangan Tengah Semester" name="uts">
    </div>
    <div class="form-group">
        
    </div>
    <div class="form-group">
        <label for="">Ulangan Akhir Semester</label>
        <input type="number" class="form-control" placeholder="Ulangan Akhir Semester" name="uas">
    </div>
    <div class="form-group">
        <label for="">Mengajar</label>
        <select class="form-control" name="mengajar" id="" required>
            <option value="" selected disabled>Pilih Mengajar</option>
            @forelse($mengajar as $mengajar)
             <option value="{{$mengajar->id}}">{{$mengajar->id}} || {{$mengajar->nip}}</option>
            @empty
                <option value="">Tidak Ada Data</option>
            @endforelse
        </select>
    </div>
    <div class="form-group">
        <label for="">Siswa</label>
    <select class="form-control" name="siswa" id="" required>
        <option value="" selected disabled>Pilih Siswa</option>
        @forelse($siswa as $siswa)
        <option value="{{$siswa->nis}}">{{$siswa->nis}} || {{$siswa->nama}}</option>
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
<th>NIS</th>
<th>Nama Siswa</th>
<th>Kelas</th>
<th>Mata Pelajaran</th>
<th>UH</th>
<th>UTS</th>
<th>UAS</th>
<th>NA</th>
<th>Action</th>
</thead>
<tbody>
@foreach($data as $item)
<tr>
<td>{{$loop->iteration}}</td>
<td>{{$item->nis}}</td>
<td>{{$item->nama_siswa}}</td>
<td>{{$item->nama_kelas}}</td>
<td>{{$item->nama_mapel}}</td>
<td>{{$item->uh}}</td>
<td>{{$item->uts}}</td>
<td>{{$item->uh}}</td>
<td>{{$item->na}}</td>
<td>
    <div class="button-group">
        <a class="btn" href="{{route('edit.nilai',$item->id)}}">Edit</a>
        <form action="{{route('delete.nilai',$item->id)}}" method="POST">
         @csrf
         <button class="btn btn-delete" type="submit" class="btn">Delete</button>
        </form>
    </div>

</td>
</tr>
@endforeach
</tbody>
</table>
@endsection