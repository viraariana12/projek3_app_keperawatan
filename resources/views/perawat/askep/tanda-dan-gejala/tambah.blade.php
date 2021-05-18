@extends('perawat')

@section('judul-halaman','Tambah Tanda Dan Gejala Pasien')

@section('isi')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Pencarian Tanda Dan Gejala
                </h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <form  action="{{ route(
                        'asuhan-keperawatan.tanda-dan-gejala.create',
                        $asuhan_keperawatan->id_asuhan_keperawatan
                        ) }}" method="GET">
                        <div class="input-group">
                            <input type="search" name="nama" class="form-control" placeholder="Masukan kata kunci tanda dan gejala" />
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
                        <th>Tanda Dan Gejala</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($daftar_tanda_dan_gejala as $tanda_dan_gejala)
                        <tr>
                            <td>{{$tanda_dan_gejala->id_tanda_dan_gejala}}</td>
                            <td>{{$tanda_dan_gejala->nama}}</td>
                            <td>
                                <form action="
                                    {{ route(
                                        'asuhan-keperawatan.tanda-dan-gejala.store',
                                        $asuhan_keperawatan->id_asuhan_keperawatan
                                    ) }}" method="POST">
                                    @csrf
                                    <input
                                        type="hidden"
                                        name="id_tanda_dan_gejala"
                                        value="{{$tanda_dan_gejala->id_tanda_dan_gejala}}"
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
