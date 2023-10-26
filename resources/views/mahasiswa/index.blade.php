@extends('layout.main')
@section('title','Mahasiswa')

@section('content')
<h1>Halaman Index Mahasiswa</h1>
{{-- <table class="table table-striped">
    <tr>
        <th>NPM</th>
        <th>Nama</th>
    </tr>
    @foreach ($mahasiswa as $item)
    <tr>
        <td>{{$item['npm']}}</td>
        <td>{{$item['nama']}}</td>
    </tr>
    @endforeach
</table> --}}
<table class="table table-striped">
    <tr>
        <th>NPM</th>
        <th>Nama</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>foto</th>
        <th>Nama Prodi</th>
        <th>Nama Fakultas</th>
    </tr>
    @foreach ($mahasiswa as $item)
    <tr>
        <td>{{$item['npm']}}</td>
        <td>{{$item['nama']}}</td>
        <td>{{$item['tempat_lahir']}}</td>
        <td>{{$item['tanggal_lahir']}}</td>
        <td><img src="images/{{$item['foto']}}" class="rounded-circle" width="70px" /></td>
        <td>{{$item['prodi']['nama']}}</td>
        <td>{{$item['prodi']['fakultas']['nama']}}</td>
    </tr>
    @endforeach
</table>
@endsection
