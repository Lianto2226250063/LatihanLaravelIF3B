@extends('layout.main')
@section('title','Edit Mahasiswa')

@section('content')
<h1>Halaman Mahasiswa</h1>
<div class="row">
    <div class="col-lg-12 grid-margin strech-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Mahasiswa</h4>
                <p class="card-description">Formulir Edit mahasiswa</p>
                <form class="forms-sample" method="POST" action="{{route('mahasiswa.update', $mahasiswa->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="npm">NPM</label>
                        <input type="text" class="form-control" name="npm" placeholder="NPM" value=" {{ $mahasiswa['npm'] }}">
                        @error('npm')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror

                        <label for="nama">Nama Mahasiswa</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Mahasiswa" value=" {{ $mahasiswa['nama'] }}">
                        @error('nama')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror

                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" value=" {{ $mahasiswa['tempat_lahir'] }}">
                        @error('tempat_lahir')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror

                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir" value=" {{ $mahasiswa['tanggal_lahir'] }}">
                        @error('tanggal_lahir')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror

                        <label for="foto">Foto</label>
                        <input type="file" class="form-control" name="foto" placeholder="Foto" value=" {{ $mahasiswa['foto'] }}">
                        @error('foto')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror

                        <label for="prodi">Program Studi</label>
                        <select name="prodi_id" class="form-control">
                            <option value="">Pilih</option>
                            @foreach ($prodi as $item)
                                <option value="{{$item['id']}}"
                                    @if (old('prodi_id', $mahasiswa->prodi_id) == $item['id'])
                                        selected
                                    @endif
                                    >
                                    {{$item['nama']}}
                                </option>
                            @endforeach
                        </select>
                        @error('prodi_id')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror

                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ url('mahasiswa')}}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
