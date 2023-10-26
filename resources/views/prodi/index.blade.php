@extends('layout.main')
@section('title','Prodi')

@section('content')
<h1>Halaman Fakultas</h1>
<table class="table table-striped">
    <tr>
        <th>Nama Prodi</th>
    </tr>
    @foreach ($prodi as $item)
    <tr>
        <td>{{$item['nama']}}</td>
        <td>{{$item['prodi']['nama']}}</td>
    </tr>
    @endforeach
</table>
@endsection
