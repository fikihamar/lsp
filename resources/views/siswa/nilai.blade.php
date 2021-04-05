@extends('layouts.base')

@section('title','Data Nilai')

@section('left-navbar')
    @include('components/navbar-siswa')
@endsection

@section('header-left-body')
<h1>Data Nilai</h1>
@endsection

@section('content-left-body')
<table class="identity-table">
    <tr>
        <td>NIP Siswa</td>  
        <td>:</td>
        <td>{{$siswa->nis}} </td>
    </tr>
    <tr>
        <td>Nama Siswa</td>
        <td>:</td>
        <td>{{$siswa->nama}} </td>
    </tr>
    @if($data)
    <tr>
        <td>Kelas</td>
        <td>:</td>
        <td>{{$data[0]->nama_kelas}}</td>
    </tr>
    @endif
</table>
@endsection
@section('right-body')
<table class="table" border="1px solid">
<thead>
<th>No</th>
<th>Mata Pelajaran</th>
<th>Ulangan Harian</th>
<th>Ulangan Tengah Semester</th>
<th>Ulangan Akhir Semester</th>
<th>Nilai Akhir</th>
</thead>
<tbody>
@forelse($data as $item)
<tr>
<td>{{$loop->iteration}}</td>
<td>{{$item->nama_mapel}}</td>
<td>{{$item->uh}}</td>
<td>{{$item->uts}}</td>
<td>{{$item->uh}}</td>
<td>{{$item->na}}</td>
</tr>
@empty
 <tr>
     <td colspan="5" style="text-align: center"><span>Tidak Ada Data</span></td>
 </tr>
@endforelse
</tbody>
</table>
    
@endsection