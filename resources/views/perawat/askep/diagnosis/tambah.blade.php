@extends('perawat')

@section('judul-halaman','Tambah Diagnosis Pasien')

@php
    $i = 1;
@endphp

@section('isi')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Pencarian Diagnosis
                </h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <form  action="{{ route(
                        'asuhan-keperawatan.diagnosis.create',
                        $asuhan_keperawatan->id_asuhan_keperawatan
                        ) }}" method="GET">
                        <div class="input-group">
                            <input type="search" name="nama" class="form-control" placeholder="Masukan kata kunci Diagnosis" />
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <table class="table table-sm table-head-fixed table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($daftar_diagnosis as $diagnosis)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$diagnosis->kode}}</td>
                            <td>{{$diagnosis->nama}}</td>
                            <td>
                                <form action="
                                    {{ route(
                                        'asuhan-keperawatan.diagnosis.store',
                                        $asuhan_keperawatan->id_asuhan_keperawatan
                                    ) }}" method="POST">
                                    @csrf
                                    <input
                                        type="hidden"
                                        name="id_diagnosis_keperawatan"
                                        value="{{$diagnosis->id_diagnosis_keperawatan}}"
                                    />
                                    <button type="submit" class="btn btn-xs btn-info">
                                        Tambahkan
                                    </a>
                                </form>
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
