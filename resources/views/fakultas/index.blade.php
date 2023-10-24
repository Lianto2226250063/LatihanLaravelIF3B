@extends('layout.main')
@section('title','Fakultas')

@section('content')
<h1>Halaman Fakultas</h1>
<table class="table table-striped">
    <tr>
        <th>Nama Fakultas</th>
    </tr>
    @foreach ($fakultas as $item)
    <tr>
        <td>{{$item['nama']}}</td>
    </tr>
    @endforeach
</table>
@endsection
