@extends('perawat')

@section('judul-halaman')
Asuhan Keperawatan Pasien
@endsection

@php
    $daftar_tanda_dan_gejala = $asuhan_keperawatan->tanda_dan_gejala;
    $daftar_diagnosis = $asuhan_keperawatan->diagnosis_pasien;
    $i = 1;
@endphp

@section('isi')
<div class="row justify-content-center">
    <div class="col-4">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">
                    Data Pasien
                </h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="no_rm">No RM</label>
                    <input
                        type="text"
                        class="form-control"
                        id="no_rm"
                        readonly
                        value="{{$asuhan_keperawatan->pasien->no_rm}}"
                    >
                </div>
                <div class="form-group">
                    <label for="nama">Nama Pasien</label>
                    <input
                        type="text"
                        class="form-control"
                        id="nama"
                        readonly
                        value="{{$asuhan_keperawatan->pasien->nama}}"
                        >
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <p class="form-control">
                    @if ($asuhan_keperawatan->pasien->jenis_kelamin)
                        Laki-Laki
                    @else
                        Perempuan
                    @endif
                    </p>
                </div>
            </div>
            <div class="card-footer">
                <a href="#" class="btn btn-success">Edit</a>
            </div>
        </div>
    </div>
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Tanda Dan Gejala Pasien
                </h3>
                <div class="card-tools">
                    <a href="{{
                        route(
                            'asuhan-keperawatan.tanda-dan-gejala.create',
                            $asuhan_keperawatan->id_asuhan_keperawatan
                        ) }}" class="btn btn-xs btn-info">
                        Tambah
                    </a>
                </div>
            </div>
            <div class="card-body @if(count($daftar_tanda_dan_gejala) > 0) table-responsive p-0 @endif">
                @if(count($daftar_tanda_dan_gejala) > 0)
                    <table class="table table-sm table-head-fixed table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($daftar_tanda_dan_gejala as $tanda_dan_gejala)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$tanda_dan_gejala->nama}}</td>
                                <td>Hapus</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-info"></i> Info</h5>
                        Anda belum memasukan data tanda dan gejala yang dialami Pasien
                    </div>
                @endif
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Diagnosis Pasien
                </h3>
                <div class="card-tools">
                    <a href="{{
                        route(
                            'asuhan-keperawatan.diagnosis.create',
                            $asuhan_keperawatan->id_asuhan_keperawatan
                        ) }}" class="btn btn-xs btn-info">
                        Tambah
                    </a>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-sm table-head-fixed table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Yang Menambahkan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($daftar_diagnosis as $diagnosis)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$diagnosis->diagnosis->nama}}</td>
                            <td>{{$diagnosis->perawat_yang_mencatat->nama}}</td>
                            <td>
                                <a href="#" class="btn btn-xs btn-info">
                                    Lihat
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
