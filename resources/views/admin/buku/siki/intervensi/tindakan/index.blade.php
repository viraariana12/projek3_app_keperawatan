@extends('admin')

@php
    $i = 1;
@endphp

@section('judul-halaman')
Daftar Tindakan Intervensi
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}" />
@endsection

@section('script')
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    @if (session('status'))
        <script>
            toastr.success("{{session('status')}}")
        </script>
    @endif
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item">Buku</li>
    <li class="breadcrumb-item">SIKI</li>
    <li class="breadcrumb-item">Intervensi</li>
    <li class="breadcrumb-item active"><a href="#">Tindakan</a></li>
@endsection

@section('isi')
<div class="card">
    <div class="card-header">
        <a href="{{ route('admin.intervensi.tindakan.create', $intervensi->id_intervensi_keperawatan) }}" class="btn btn-primary btn-sm">
            <i class="fa fa-plus"></i>
            Buat Baru
        </a>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-sm table-head-fixed table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama</th>
              <th>Jenis</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($daftar_tindakan as $tindakan)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$tindakan->nama}}</td>
                    @if ($tindakan->pivot->jenis)
                        <td>{{$tindakan->pivot->jenis->nama}}</td>
                    @else
                        <td>Tidak Ada</td>
                    @endif
                    <td>
                        <a
                            href="
                                {{ route(
                                    'admin.intervensi.tindakan.edit',
                                    [
                                        'intervensi' => $intervensi->id_intervensi_keperawatan,
                                        'tindakan' => $tindakan->id_tindakan_keperawatan
                                    ]
                                ) }}"
                            class="btn btn-xs btn-success"
                        >Ubah</a>
                        <form
                            style="display: inline-block"
                            method="POST"
                            action="{{
                                route('admin.intervensi.tindakan.destroy',
                                [
                                    "intervensi" => $intervensi->id_intervensi_keperawatan,
                                    "tindakan" => $tindakan->id_tindakan_keperawatan
                                ])
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
</div>
@endsection
