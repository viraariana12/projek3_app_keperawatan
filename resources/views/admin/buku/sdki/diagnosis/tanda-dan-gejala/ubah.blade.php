@extends('admin')

@section('judul-halaman')
Ubah Tanda dan Gejala
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item">Buku</li>
    <li class="breadcrumb-item">SDKI</li>
    <li class="breadcrumb-item">Diagnosis</li>
    <li class="breadcrumb-item active">Tanda Dan Gejala</li>
    <li class="breadcrumb-item active"><a href="#">Ubah</a></li>
@endsection

@section('isi')
<div class="row justify-content-center">
    <div class="col-8">
        <form method="POST" action="{{
            route(
                'admin.diagnosis.tanda-dan-gejala.update',
                [
                    "diagnosi" => $diagnosis->id_diagnosis_keperawatan,
                    "tanda_dan_gejala" => $tanda_dan_gejala->id_tanda_dan_gejala
                ]
            )
        }}">
            @csrf
            @method('PUT')
            <div class="card card-primary">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input
                            type="text"
                            class="form-control @error('nama') is-invalid @enderror"
                            id="nama"
                            placeholder="Nama tanda dan gejala"
                            name="nama"
                            value="{{$tanda_dan_gejala->nama}}"
                        />
                        @error('nama')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Mayor/Minor</label>
                        <div class="form-check">
                            <input
                                class="form-check-input"
                                type="radio"
                                name="mayor"
                                value="1"
                                @if ($pivot_data->mayor)
                                    checked
                                @endif
                            />
                            <label class="form-check-label">Mayor</label>
                        </div>
                        <div class="form-check">
                            <input
                                class="form-check-input"
                                type="radio"
                                name="mayor"
                                value="0"
                                @if (!$pivot_data->mayor)
                                    checked
                                @endif
                            />
                            <label class="form-check-label">Minor</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Objektif/Subjektif</label>
                        <div class="form-check">
                            <input
                                class="form-check-input"
                                type="radio"
                                name="objektif"
                                value="1"
                                @if ($pivot_data->objektif)
                                    checked
                                @endif
                            />
                            <label class="form-check-label">Objektif</label>
                        </div>
                        <div class="form-check">
                            <input
                                class="form-check-input"
                                type="radio"
                                name="objektif"
                                value="0"
                                @if (!$pivot_data->objektif)
                                    checked
                                @endif
                            />
                            <label class="form-check-label">Subjektif</label>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                    <a href="{{ route('admin.diagnosis.tanda-dan-gejala.index', $diagnosis->id_diagnosis_keperawatan) }}" class="btn btn-default">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
