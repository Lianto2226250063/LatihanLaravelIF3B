@extends('layout.main')
@section('title','Mahasiswa')

@section('content')
<h1>Halaman Index Mahasiswa</h1>
</table>
<div class="row">
    <div class="col-lg-12 grid-margin strech-card">
        <div class="card">
            <div class="card-body">
        <h4 class="card-title">Mahasiswa</h4>
        <p class="card-description">Daftar Mahasiswa Di MDP</p>
        <a href="{{route('mahasiswa.create')}}" class="btn btn-outline-primary btn-rounded btn-icon"><i class="mdi mdi-account-plus"></i></a>
            <div class="table-responsive">
                <table class="table table-dark">
                <tr>
                <th>NPM</th>
                <th>Nama</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>foto</th>
                <th>Nama Prodi</th>
                <th>Nama Fakultas</th>
                <th>Aksi</th>
                </tr>
                @foreach ($mahasiswa as $item)
                <tr>
                <td>{{$item['npm']}}</td>
                <td>{{$item['nama']}}</td>
                <td>{{$item['tempat_lahir']}}</td>
                <td>{{$item['tanggal_lahir']}}</td>
                <td>{{$item['jk']}}</td>
                <td><img src="images/{{$item['foto']}}" class="rounded-circle" width="70px" /></td>
                <td>{{$item['prodi']['nama']}}</td>
                <td>{{$item['prodi']['fakultas']['nama']}}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{ route('mahasiswa.edit', $item->id) }}">
                            <button class="btn btn-success btn-rounded btn-sm mx-3">Edit</button>
                        </a>
                        <form method="POST" action="{{ route('mahasiswa.destroy', $item->id) }}">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-rounded btn-sm show_confirm" data-toggle="tooltip" title="Delete" data-nama='{{ $item->nama }}'>Delete</button>
                        </form>
                    </div>
                </td>
                </tr>
                @endforeach
                </table>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        @if (Session::get('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif
    </script>
@endsection
