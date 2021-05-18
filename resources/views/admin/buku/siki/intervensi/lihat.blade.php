@extends('admin')

@section('judul-halaman')
    {{$intervensi->nama}}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item">Buku</li>
    <li class="breadcrumb-item">SIKI</li>
    <li class="breadcrumb-item">Intervensi</li>
    <li class="breadcrumb-item active"><a href="#">Lihat</a></li>
@endsection

@section('isi')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Detail Intervensi</h3>
                  <a href="{{ route('admin.intervensi.edit', $intervensi->id_intervensi_keperawatan) }}">Ubah</a>
                </div>
            </div>
            <div class="card-body">
                <dl>
                    <dt>Kode</dt>
                    <dd>{{$intervensi->kode}}</dd>
                    <dt>Definisi</dt>
                    <dd>{{$intervensi->definisi}}</dd>
                </dl>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Tindakan</h3>
                  <a href="{{ route('admin.intervensi.tindakan.index', $intervensi->id_intervensi_keperawatan) }}">Ubah</a>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-sm">
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($daftar_tindakan as $tindakan)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$tindakan->nama}}</td>
                                <td>{{$tindakan->pivot->jenis->nama}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
