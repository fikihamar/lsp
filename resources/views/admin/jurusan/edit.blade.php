@extends('layouts.base')

@section('title','Data Jurusan')

@section('left-navbar')
    @include('components/navbar-admin')
@endsection

@section('header-left-body')
<h1>Edit Jurusan</h1>
@endsection

@section('right-body')

<form class="form" action="{{route('save.jurusan',$data->id)}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="">Nama Jurusan</label>
        <input class="form-control" type="text" name="nama" value="{{$data->nama}}" required>
    </div>
    <button type="submit" class="btn">Edit</button>

    </form>
</tbody>
</table>
@endsection