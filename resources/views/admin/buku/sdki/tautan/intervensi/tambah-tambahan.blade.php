@extends('admin')

@section('judul-halaman')
Tambah Intervensi Tambahan
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}" />
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item">Buku</li>
    <li class="breadcrumb-item">SDKI</li>
    <li class="breadcrumb-item">Diagnosis</li>
    <li class="breadcrumb-item">Intervensi</li>
    <li class="breadcrumb-item"><a href="#">Tambah</a></li>
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
<div class="card">

    <div class="card-body">
        <form action="{{ route(
            'admin.diagnosis.intervensi.create',
            $diagnosis->id_diagnosis_keperawatan
        ) . "?utama=0" }}" method="GET">
            <div class="input-group">
                <input
                    type="text"
                    class="form-control"
                    placeholder="Masukan kata kunci"
                    name="cari_nama"
                />
                <span class="input-group-append">
                <button type="submit" class="btn btn-info btn-flat">Cari</button>
                </span>
            </div>
        </form>
        <table class="table table-sm table-head-fixed table-hover mt-2">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i=1;
                @endphp
                @foreach ($daftar_intervensi as $intervensi)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$intervensi->nama}}</td>
                        <td>
                            <form
                                method="POST"
                                action="{{ route(
                                    'admin.diagnosis.intervensi.store',
                                    $diagnosis->id_diagnosis_keperawatan
                                ) }}"
                            >
                                @csrf
                                <input
                                    type="hidden"
                                    name="utama"
                                    value="0" />
                                <input
                                    type="hidden"
                                    name="id_intervensi_keperawatan"
                                    value="{{$intervensi->id_intervensi_keperawatan}}"
                                />
                                <button
                                    type="submit"
                                    class="btn btn-xs btn-info"
                                >
                                    Tambahkan
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
