@extends('admin')

@section('judul-halaman')
    {{$diagnosis->nama}}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item">Buku</li>
    <li class="breadcrumb-item">SDKI</li>
    <li class="breadcrumb-item">Diagnosis</li>
    <li class="breadcrumb-item active"><a href="#">Lihat</a></li>
@endsection

@php
    $tanda_dan_gejala_mayor = $diagnosis->tanda_dan_gejala()->wherePivot('mayor', 1)->get();
    $tanda_dan_gejala_minor = $diagnosis->tanda_dan_gejala()->wherePivot('mayor', 0)->get();
@endphp

@section('isi')
<div class="row justify-content-center">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="kode">Kode</label>
                    <input
                        type="text"
                        class="form-control"
                        id="kode"
                        placeholder="Kode Unik Diagnosis"
                        readonly
                        value="{{ $diagnosis->kode }}"
                    />
                </div>
                <div class="form-group">
                    <label for="definisi">Definisi</label>
                    <textarea
                        class="form-control"
                        id="definisi"
                        readonly
                        name="definisi"
                        rows="3"
                    >{{ $diagnosis->definisi }}</textarea>
                </div>
                <div class="form-group">
                    <label for="kategori">Tag</label>
                    <div class="form-control" id="kategori">
                        <a href="#" class="btn-sm btn-primary">Kategori</a>
                        <a href="#" class="btn-sm btn-success">Sub Kategori</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">
                    Tanda Dan Gejala
                </h3>
            </div>
            <div class="card-body">
                <h5>Mayor</h5>
                <ol>
                    @foreach ($tanda_dan_gejala_mayor as $tanda_dan_gejala )
                        <li>{{$tanda_dan_gejala->nama}}</li>
                    @endforeach
                </ol>

                <h5>Minor</h5>
                <ol>
                    @foreach ($tanda_dan_gejala_minor as $tanda_dan_gejala )
                        <li>{{$tanda_dan_gejala->nama}}</li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection
