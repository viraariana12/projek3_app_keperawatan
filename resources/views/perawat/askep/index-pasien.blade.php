@extends('perawat')

@section('judul-halaman')
Pilih Pasien lama atau buat Pasien Baru
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}" />
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item">Pasien</li>
    <li class="breadcrumb-item active"><a href="#">Daftar</a></li>
@endsection

@section('script')
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    @if (session('status'))
        <script>
            toastr.success("{{session('status')}}")
        </script>
    @endif
@endsection

@php
    $i=1;
@endphp

@section('isi')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <a href="{{ route('perawat.asuhan-keperawatan.form-pasien-baru') }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus"></i>
                    Pasien Baru
                </a>
            </div>
            <div class="col-6">
                <form action="{{ route('perawat.asuhan-keperawatan.create') }}" method="GET">
                    <div class="input-group">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Cari Berdasarkan Nomor RM"
                            name="no_rm"
                        />
                        <span class="input-group-append">
                            <button type="submit" class="btn btn-info btn-flat">Cari</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ./card-header -->
    <div class="card-body table-responsive p-0">

      <table class="table table-sm table-head-fixed table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>No RM</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($daftar_pasien as $pasien)
            <tr data-widget="expandable-table" aria-expanded="false">
                <td>{{$i++}}</td>
                <td>{{$pasien->no_rm}}</td>
                <td>{{$pasien->nama}}</td>
                @if ($pasien->jenis_kelamin)
                    <td>Pria</td>
                @else
                    <td>Wanita</td>
                @endif
                <td>
                    <form
                        style="display:inline-block"
                        action="{{ route('perawat.asuhan-keperawatan.pasien-lama') }}" method="POST">
                        @csrf
                        <input
                            type="hidden"
                            name="id_pasien"
                            value="{{ $pasien->id_pasien }}"
                        />
                        <button class="btn btn-xs btn-success">Pilih</button>
                    </form>
                    <a href="
                        {{
                            route(
                                'perawat.pasien.show',
                                $pasien->id_pasien
                            )
                        }}
                    " class="btn btn-xs btn-info">Lihat</a>
                </td>
              </tr>
            @endforeach

        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
