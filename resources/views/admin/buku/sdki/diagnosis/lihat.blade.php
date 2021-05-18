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

@section('isi')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Detail Diagnosis</h3>
                  <a href="{{ route('admin.diagnosis.edit', $diagnosis->id_diagnosis_keperawatan) }}">Ubah</a>
                </div>
            </div>
            <div class="card-body">
                <dl>
                    <dt>Kode</dt>
                    <dd>{{$diagnosis->kode}}</dd>
                    <dt>Definisi</dt>
                    <dd>{{$diagnosis->definisi}}</dd>
                </dl>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title">Tanda dan Gejala Mayor Pasien</h3>
                    <a href="{{ route('admin.diagnosis.tanda-dan-gejala.index', $diagnosis->id_diagnosis_keperawatan) }}">Ubah</a>
                </div>
            </div>
            <div class="card-body p-0 row">
                <table class="table table-sm col-6">
                    <tr>
                        <th colspan="2">
                            Objektif
                        </th>
                    </tr>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($daftar_mayor_objektif as $tanda_dan_gejala)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$tanda_dan_gejala->nama}}</td>
                        </tr>
                    @endforeach
                </table>
                <table class="table table-sm col-6">
                    <tr>
                        <th colspan="2">
                            Subjektif
                        </th>
                    </tr>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($daftar_mayor_subjektif as $tanda_dan_gejala)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$tanda_dan_gejala->nama}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title">Tanda dan Gejala Minor Pasien</h3>
                    <a href="{{ route('admin.diagnosis.tanda-dan-gejala.index', $diagnosis->id_diagnosis_keperawatan) }}">Ubah</a>
                </div>
            </div>
            <div class="card-body p-0 row">
                <table class="table table-sm col-6">
                    <tr>
                        <th colspan="2">
                            Objektif
                        </th>
                    </tr>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($daftar_minor_objektif as $tanda_dan_gejala)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$tanda_dan_gejala->nama}}</td>
                        </tr>
                    @endforeach
                </table>
                <table class="table table-sm col-6">
                    <tr>
                        <th colspan="2">
                            Subjektif
                        </th>
                    </tr>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($daftar_minor_subjektif as $tanda_dan_gejala)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$tanda_dan_gejala->nama}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                <h3 class="card-title">Penyebab</h3>
                <a href="{{ route('admin.diagnosis.penyebab.index', $diagnosis->id_diagnosis_keperawatan) }}">Ubah</a>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-sm">
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($daftar_penyebab as $penyebab)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$penyebab->nama}}</td>
                                <td>{{$penyebab->pivot->jenis->nama}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
