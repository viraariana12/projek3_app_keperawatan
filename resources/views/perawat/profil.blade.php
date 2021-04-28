@extends('perawat')

@php
    $perawat = Auth::guard('perawat')->user();
@endphp

@section('judul-halaman','Profil Perawat')

@section('isi')
<div class="row justify-content-center">
    <div class="col-8">
        <div class="card card-primary">
            <div class="card-body">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input
                        type="text"
                        class="form-control @error('nama') is-invalid @enderror"
                        id="nama"
                        placeholder="Nama Lengkap"
                        name="nama"
                        value="{{ $perawat->nama }}"
                    />
                    @error('nama')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Alamat E-Mail</label>
                    <input
                        type="text"
                        class="form-control @error('email') is-invalid @enderror"
                        id="email"
                        placeholder="Alamat E-Mail"
                        name="email"
                        value="{{ $perawat->email }}"
                    />
                    @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" value="1">
                        <label class="form-check-label">Laki-Laki</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" value="0">
                        <label class="form-check-label">Perempuan</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nama">Tempat Lahir</label>
                    <input
                        type="text"
                        class="form-control @error('tempat_lahir') is-invalid @enderror"
                        id="nama"
                        placeholder="Tempat Lahir"
                        name="tempat_lahir"
                        value="{{ $perawat->tempat_lahir }}"
                    />
                    @error('tempat_lahir')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama">Tanggal Lahir</label>
                    <input
                        type="date"
                        class="form-control @error('tanggal_lahir') is-invalid @enderror"
                        id="nama"
                        placeholder="Tanggal Lahir"
                        name="tanggal_lahir"
                        value="{{ $perawat->tanggal_lahir }}"
                    />
                    @error('tanggal_lahir')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat Lengkap" name="alamat" rows="3">{{$perawat->alamat}}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input
                        type="file"
                        class="form-control @error('foto') is-invalid @enderror"
                        id="foto"
                        placeholder="Foto Profil"
                        name="foto"
                    />
                    @error('foto')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>
@endsection
