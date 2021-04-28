@extends('admin')

@section('judul-halaman', 'Ubah Diagnosis')

@section('breadcrumb')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item">Buku</li>
    <li class="breadcrumb-item">SDKI</li>
    <li class="breadcrumb-item">Diagnosis</li>
    <li class="breadcrumb-item active"><a href="#">Ubah</a></li>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}" />
@endsection

@section('script')
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    @if ($errors->any())
        <script>
            toastr.error("Data yang dimasukan tidak valid")
        </script>
    @endif
@endsection


@section('isi')
<div class="row justify-content-center">
    <div class="col-8">
        <form method="POST" action="{{ route('diagnosis.update', $diagnosis->id_diagnosis_keperawatan) }}">
            @method('PUT')
            @csrf
            <div class="card card-primary">
                <div class="card-body">
                    <div class="form-group">
                        <label for="kode">Kode</label>
                        <input
                            type="text"
                            class="form-control @error('kode') is-invalid @enderror"
                            id="kode"
                            placeholder="Kode Unik Diagnosis"
                            name="kode"
                            value="{{ $diagnosis->kode }}"
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
                            placeholder="Nama Diagnosis"
                            name="nama"
                            value="{{ $diagnosis->nama }}"
                        />
                        @error('nama')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="definisi">Definisi</label>
                        <textarea
                            class="form-control @error('definisi') is-invalid @enderror"
                            id="definisi"
                            placeholder="Penjelasan Diagnosis"
                            name="definisi"
                            rows="3"
                        >{{ $diagnosis->definisi }}</textarea>
                        @error('definisi')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                    <a href="{{ route('diagnosis.index') }}" class="btn btn-default">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
