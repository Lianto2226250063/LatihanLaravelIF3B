@extends('layout.main')
@section('title','Mahasiswa')

@section('content')
<h1>Halaman Index Mahasiswa</h1>
<table class="table table-striped">
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
</table>
@endsection
