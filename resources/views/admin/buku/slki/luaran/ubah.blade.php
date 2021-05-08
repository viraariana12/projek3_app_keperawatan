@extends('admin')

@section('judul-halaman', 'Ubah data Luaran')

@section('breadcrumb')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item">Buku</li>
    <li class="breadcrumb-item">SIKI</li>
    <li class="breadcrumb-item">Luaran</li>
    <li class="breadcrumb-item active"><a href="#">Ubah</a></li>
@endsection

@section('isi')
<div class="row justify-content-center">
    <div class="col-8">
        <form method="POST" action="{{ route('admin.luaran.update', $luaran->id_luaran_keperawatan) }}">
            @csrf
            @method('PUT')
            <div class="card card-primary">
                <div class="card-body">
                    <div class="form-group">
                        <label for="kode">Kode</label>
                        <input
                            type="text"
                            class="form-control @error('kode') is-invalid @enderror"
                            id="kode" placeholder="Kode Unik Luaran"
                            name="kode"
                            value="{{ $luaran->kode }}"
                        />
                        @error('kode')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input
                            type="text"
                            class="form-control @error('nama') is-invalid @enderror"
                            id="nama"
                            placeholder="Nama Luaran"
                            name="nama"
                            value="{{ $luaran->nama }}"
                        />
                        @error('nama')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="definisi">Definisi</label>
                        <textarea class="form-control @error('definisi') is-invalid @enderror" id="definisi" placeholder="Penjelasan Luaran" name="definisi" rows="3">{{ $luaran->definisi }}</textarea>
                        @error('definisi')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                    <a href="{{ route('admin.luaran.index') }}" class="btn btn-default">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
