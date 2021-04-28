@extends('admin')

@section('judul-halaman')
Buat tanda dan gejala baru pada Diagnosis "{{$diagnosis->nama}}"
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item">Buku</li>
    <li class="breadcrumb-item">SDKI</li>
    <li class="breadcrumb-item">Diagnosis</li>
    <li class="breadcrumb-item active">Tanda Dan Gejala</li>
    <li class="breadcrumb-item active"><a href="#">Buat Baru</a></li>
@endsection

@section('isi')
<div class="row justify-content-center">
    <div class="col-8">
        <form method="POST" action="{{
            route('diagnosis.tanda-dan-gejala.store',
            $diagnosis->id_diagnosis_keperawatan)
        }}">
            @csrf
            <div class="card card-primary">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama tanda dan gejala" name="nama">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Mayor/Minor</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="mayor" value="1">
                            <label class="form-check-label">Mayor</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="mayor" value="0">
                            <label class="form-check-label">Minor</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Objektif/Subjektif</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="objektif" value="1">
                            <label class="form-check-label">Objektif</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="objektif" value="0">
                            <label class="form-check-label">Subjektif</label>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Tambahkan</button>
                    <a href="{{ route('diagnosis.tanda-dan-gejala.index', $diagnosis->id_diagnosis_keperawatan) }}" class="btn btn-default">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
