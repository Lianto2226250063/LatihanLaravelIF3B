@extends('layout.main')
@section('title','Mahasiswa')

@section('content')
<h1>Halaman Index Mahasiswa</h1>
</table>
<div class="row">
    <div class="col-lg-12 grid-margin strech-card">
        <div class="card">
            <div class="card-body">
        <h4 class="card-title">Program Studi</h4>
        <p class="card-description">Daftar Program Studi Di MDP</p>
        <a href="{{route('mahasiswa.create')}}" class="btn btn-outline-primary btn-rounded btn-icon"><i class="mdi mdi-account-plus"></i></a>
            <div class="table-responsive">
                <table class="table table-dark">
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
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
