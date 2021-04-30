@extends('perawat')

@section('judul-halaman','Asuhan Keperawatan Pasien')

@section('isi')
<div class="card">
    <div class="card-header">
        <a href="{{ route('askep.create') }}" class="btn btn-primary btn-sm">
            <i class="fa fa-plus"></i>
            Pasien Baru
        </a>
        <a href="{{ route('diagnosis.create') }}" class="btn btn-success btn-sm">
            <i class="fa fa-plus"></i>
            Pasien Lama
        </a>
    </div>
    <!-- ./card-header -->
    <div class="card-body table-responsive p-0">
      <table class="table table-sm table-head-fixed table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>No RM</th>
            <th>Nama Pasien</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($daftar_askep as $askep)
            <tr data-widget="expandable-table" aria-expanded="false">
                <td>{{$askep->id_asuhan_keperawatan}}</td>
                <td>{{$askep->pasien->no_rm}}</td>
                <td>{{$askep->pasien->nama}}</td>
                <td>
                    <a href="#" class="btn btn-xs btn-info">Lihat</a>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
