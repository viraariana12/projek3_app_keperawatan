@extends('admin')

@section('judul-halaman')
Buat Data Penyebab baru
@endsection

@section('isi')
<div class="row justify-content-center">
    <div class="col-8">
        <form method="POST" action="{{
            route('admin.diagnosis.penyebab.store',
            $diagnosis->id_diagnosis_keperawatan)
        }}">
            @csrf
            <div class="card card-primary">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama penyebab" name="nama">
                        </div>
                        @error('nama')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="jenis" class="col-sm-2 col-form-label">Jenis</label>
                        <div class="col-sm-10">
                            <select class="form-control @error('jenis') is-invalid @enderror" name="jenis">
                                @foreach ($daftar_jenis as $jenis)
                                    <option value="{{$jenis->id_jenis_penyebab}}">{{$jenis->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('jenis')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Tambahkan</button>
                    <a href="{{ route('admin.diagnosis.penyebab.index', $diagnosis->id_diagnosis_keperawatan) }}" class="btn btn-default">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
