@extends('layout.main')
@section('title','Fakultas')

@section('content')
<h1>Halaman Fakultas</h1>
<div class="row">
    <div class="col-lg-12 grid-margin strech-card">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">Fakultas</h4>
            <p class="card-description">Daftar Fakultas Di MDP</p>
            @if (Auth::user()->role == 'A')
                <a href="{{route('fakultas.create')}}" class="btn btn-outline-primary btn-rounded btn-icon"><i class="mdi mdi-account-plus"></i></a>

            @endif
                <div class="table-responsive">
                    <table class="table table-dark">
                        <tr>
                            <th>Nama Fakultas</th>
                            @if (Auth::user()->role == 'A')
                                <th>Aksi</th>
                            @endif
                        </tr>
                        @foreach ($fakultas as $item)
                        <tr>
                            <td>{{$item['nama']}}</td>
                            @if (Auth::user()->role == 'A')
                                <td>
                                    <div class="d-flex">
                                    <a href="{{ route('fakultas.edit', $item->id) }}">
                                        <button class="btn btn-success btn-rounded btn-sm mx-3">Edit</button>
                                    </a>
                                    <form method="POST" action="{{ route('fakultas.destroy', $item->id) }}">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-rounded btn-sm show_confirm" data-toggle="tooltip" title="Delete" data-nama='{{ $item->nama }}'>Delete</button>
                                    </form>
                                    </div>
                                </td>
                            @endif
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
