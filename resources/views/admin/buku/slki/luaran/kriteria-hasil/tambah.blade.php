@extends('admin')

@section('judul-halaman')
Buat Kriteria Hasil Luaran "{{$luaran->nama}}"
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item">Buku</li>
    <li class="breadcrumb-item">SLKI</li>
    <li class="breadcrumb-item">Luaran</li>
    <li class="breadcrumb-item active">Kriteria Hasil</li>
    <li class="breadcrumb-item active"><a href="#">Buat Baru</a></li>
@endsection

@section('isi')
<div class="row justify-content-center">
    <div class="col-8">
        <form method="POST" action="{{
            route('admin.luaran.kriteria-hasil.store',
            $luaran->id_luaran_keperawatan)
        }}">
            @csrf
            <div class="card card-primary">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama Kriteria Hasil" name="nama">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Tambahkan</button>
                    <a href="{{ route('admin.luaran.kriteria-hasil.index', $luaran->id_luaran_keperawatan) }}" class="btn btn-default">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
