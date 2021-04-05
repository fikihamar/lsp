@extends('layouts.base')

@section('title','Login ')

@section('left-navbar')
<ul>
    <li><a href="/login/admin">Admin</a></li>
    <li><a href="/login/guru">Guru</a></li>
    <li><a href="/login/siswa">Siswa</a></li>
</ul>
@endsection

@section('header-left-body')
<h1>Login {{$role}}</h1>
@endsection
@section('content-left-body')
    <form action="{{route('login',$role)}}" method="POST" class="form">
    @csrf
    @if($role == 'admin')
    <div class="form-group">
        <label for="">Username</label>
    <input type="text" class="form-control" placeholder="Username" name="username" required><br>
    </div>
    @elseif($role == 'siswa')
    <div class="form-group">
        <label for="">NIS</label>
        <input type="text" class="form-control" placeholder="NIS" name="nis" required><br>
    </div>
    <div class="form-group"></div>
    
    @elseif($role == 'guru')
    <div class="form-group">
        <label for="">NIP</label>
        <input type="text" name="nip" placeholder="NIP" class="form-control" required><br></div>
    @endif
    <div class="form-group">
        <label for="">Password</label>
        <input type="password" name="password" placeholder="Password" class="form-control" required><br>
    </div>
    <button class="btn" type="submit">Login</button>
    </form>

@endsection

@section('right-body')
<h1>Selamat Datang di website penilaian SMK Indonesia</h1>
@endsection