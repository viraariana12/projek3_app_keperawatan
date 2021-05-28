@extends('perawat')


@section('judul-halaman','Tambah Pasien Baru')

@section('isi')
<div class="row justify-content-center">
    <div class="col-8">
        <div class="card card-primary">
            <form action="{{ route('perawat.pasien.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="no_rm">No RM</label>
                        <input
                            type="text"
                            class="form-control @error('no_rm') is-invalid @enderror"
                            id="no_rm"
                            placeholder="Nomor Rekam Medis"
                            name="no_rm"
                        />
                        @error('no_rm')
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
                            placeholder="Nama Lengkap"
                            name="nama"
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
                        />
                        @error('email')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No HP</label>
                        <input
                            type="text"
                            class="form-control @error('no_hp') is-invalid @enderror"
                            id="no_hp"
                            placeholder="No HP"
                            name="no_hp"
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
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="1" />
                            <label class="form-check-label">Laki-Laki</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="0" />
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
                        />
                        @error('tanggal_lahir')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat Lengkap" name="alamat" rows="3"></textarea>
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Tambahkan</button>
                    <a href="{{route('perawat.pasien.index')}}" class="btn btn-warning">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
