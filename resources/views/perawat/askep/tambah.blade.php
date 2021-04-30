@extends('perawat')

@section('judul-halaman','Buat Asuhan Keperawatan Pasien Baru')

@section('isi')
<div class="row justify-content-center">
    <div class="col-8">
        <form method="POST" action="{{ route('askep.store') }}">
            @csrf
            <div class="card card-primary">
                <div class="card-body">
                    <div class="form-group">
                        <label for="no_rm">No RM Pasien Baru</label>
                        <input type="text" class="form-control @error('no_rm') is-invalid @enderror" id="no_rm" placeholder="No RM untuk Pasien" name="no_rm">
                        @error('no_rm')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Pasien Baru</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama Lengkap Pasien" name="nama">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin Pasien Baru</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="1">
                            <label class="form-check-label">Laki-Laki</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="0">
                            <label class="form-check-label">Perempuan</label>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Buat</button>
                    <a href="{{ route('askep.index') }}" class="btn btn-default">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
