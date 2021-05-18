@extends('admin')

@section('judul-halaman')
Daftar Perawat
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}" />
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item">Perawat</li>
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
        <a href="{{ route('admin.perawat.create') }}" class="btn btn-primary btn-sm">
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
            <th>Nama</th>
            <th>E-Mail</th>
            <th>Jenis Kelamin</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($daftar_perawat as $perawat)
            <tr data-widget="expandable-table" aria-expanded="false">
                <td>{{$i++}}</td>
                <td>{{$perawat->nama}}</td>
                <td>{{$perawat->email}}</td>
                @if ($perawat->jenis_kelamin)
                    <td>Pria</td>
                @else
                    <td>Wanita</td>
                @endif
                <td>
                    <a href="
                        {{
                            route(
                                'admin.perawat.show',
                                $perawat->id_perawat
                            )
                        }}
                    " class="btn btn-xs btn-info">Lihat</a>
                    <a
                        href="
                            {{ route(
                                'admin.perawat.edit',
                                $perawat->id_perawat
                            ) }}"
                        class="btn btn-xs btn-success"
                    >Ubah</a>
                    <form
                        style="display: inline-block"
                        method="POST"
                        action="{{
                            route('admin.perawat.destroy',
                            $perawat->id_perawat)
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
