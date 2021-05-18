@extends('admin')

@section('judul-halaman')
    {{$luaran->nama}}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item">Buku</li>
    <li class="breadcrumb-item">SLKI</li>
    <li class="breadcrumb-item">Luaran</li>
    <li class="breadcrumb-item active"><a href="#">Lihat</a></li>
@endsection

@section('isi')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Detail Luaran</h3>
                  <a href="{{ route('admin.luaran.edit', $luaran->id_luaran_keperawatan) }}">Ubah</a>
                </div>
            </div>
            <div class="card-body">
                <dl>
                    <dt>Kode</dt>
                    <dd>{{$luaran->kode}}</dd>
                    <dt>Definisi</dt>
                    <dd>{{$luaran->definisi}}</dd>
                </dl>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Kriteria Hasil</h3>
                  <a href="{{ route('admin.luaran.kriteria-hasil.index', $luaran->id_luaran_keperawatan) }}">Ubah</a>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-sm">
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($daftar_kriteria_hasil as $kriteria_hasil)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$kriteria_hasil->nama}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
