@extends('layout.main')
@section('title','Prodi')

@section('content')
<h1>Halaman Program Studi</h1>
<div class="row">
    <div class="col-lg-12 grid-margin strech-card">
            <div class="card">
            <div class="card-body">
            <h4 class="card-title">Program Studi</h4>
            <p class="card-description">Daftar Program Studi Di MDP</p>
            <a href="{{route('prodi.create')}}" class="btn btn-outline-primary btn-rounded btn-icon"><i class="mdi mdi-account-plus"></i></a>
                <div class="table-responsive">
                    <table class="table table-dark">
                    <tr>
                        <th>Nama Prodi</th>
                        <th>Nama Fakultas</th>
                    </tr>
                    @foreach ($prodi as $item)
                    <tr>
                        <td>{{$item['nama']}}</td>
                        <td>{{$item['fakultas']['nama']}}</td>
                        <td>
                        <div class="d-flex">
                            <a href="{{ route('prodi.edit', $item->id) }}">
                                <button class="btn btn-success btn-rounded btn-sm mx-3">Edit</button>
                            </a>
                            <form method="POST" action="{{ route('prodi.destroy', $item->id) }}">
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
