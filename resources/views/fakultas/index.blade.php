@extends('layout.main')
@section('title','Fakultas')

@section('content')
<h1>Halaman Fakultas</h1>
<div class="row">
    <div class="col-lg-12 grid-margin strech-card">
        <div class="card-body">
        <h4 class="card-title">Fakultas</h4>
        <p class="card-description">Daftar Fakultas Di MDP</p>
            <div class="table-responsive">
                <table class="table table-dark">
                    <tr>
                        <th>Nama Fakultas</th>
                    </tr>
                    @foreach ($fakultas as $item)
                    <tr>
                        <td>{{$item['nama']}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
