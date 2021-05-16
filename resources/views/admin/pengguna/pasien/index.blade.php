@extends('admin')

@section('judul-halaman')
Daftar Pasien
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
        <a href="{{ route('admin.pasien.create') }}" class="btn btn-primary btn-sm">
            <i class="fa fa-plus"></i>
            Buat Baru
        </a>
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
                    <a href="
                        {{
                            route(
                                'admin.pasien.show',
                                $pasien->id_pasien
                            )
                        }}
                    " class="btn btn-xs btn-info">Lihat</a>
                    <a
                        href="
                            {{ route(
                                'admin.pasien.edit',
                                $pasien->id_pasien
                            ) }}"
                        class="btn btn-xs btn-success"
                    >Ubah</a>
                    <form
                        style="display: inline-block"
                        method="POST"
                        action="{{
                            route('admin.pasien.destroy',
                            $pasien->id_pasien)
                        }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-xs btn-danger">Hapus</button>
                    </form>
                </td>
              </tr>
            @endforeach

        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
