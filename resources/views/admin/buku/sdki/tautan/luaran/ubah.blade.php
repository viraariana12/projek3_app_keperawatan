@extends('admin')

@section('judul-halaman')
Ubah Luaran
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}" />
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item">Buku</li>
    <li class="breadcrumb-item">SDKI</li>
    <li class="breadcrumb-item">Diagnosis</li>
    <li class="breadcrumb-item">Luaran</li>
    <li class="breadcrumb-item"><a href="#">Ubah</a></li>
@endsection

@section('script')
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    @if (session('status'))
        <script>
            toastr.success("{{session('status')}}")
        </script>
    @endif
@endsection

@section('isi')
<div class="row justify-content-center">
    <div class="col-8">
        <form method="POST" action="{{
            route('admin.diagnosis.luaran.update', [
                "diagnosi" => $data->pivot->id_diagnosis_keperawatan,
                "luaran" => $data->pivot->id_luaran_keperawatan
            ])
        }}">
            @csrf
            @method('PUT')
            <div class="card card-primary">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama Luaran</label>
                        <input
                            type="text"
                            class="form-control"
                            id="nama"
                            name="nama"
                            value="{{ $data->nama }}"
                            readonly
                        />
                    </div>
                    <div class="form-group">
                        <label for="">Utama/Tambahan</label>
                        <select name="utama" class="form-control">
                            <option value="1"
                                @if ($data->pivot->utama)
                                    selected
                                @endif
                            >Utama</option>
                            <option value="0"
                                @if (!$data->pivot->utama)
                                    selected
                                @endif
                            >Tambahan</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                    <a href="{{ route('admin.diagnosis.luaran.index', $data->pivot->id_diagnosis_keperawatan) }}" class="btn btn-default">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
