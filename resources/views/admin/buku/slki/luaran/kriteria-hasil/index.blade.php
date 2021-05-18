@extends('admin')

@section('judul-halaman')
Kriteria Hasil "{{ $luaran->nama }}"
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}" />
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item">Buku</li>
    <li class="breadcrumb-item">SLKI</li>
    <li class="breadcrumb-item">Luaran</li>
    <li class="breadcrumb-item active"><a href="#">Kriteria Hasil</a></li>
@endsection

@section('script')
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    @if (session('status'))
        <script>
            toastr.success("{{session('status')}}")
        </script>
    @endif
@endsection

@section('isi')
<div class="card">
    <div class="card-header">
        <a href="{{ route('admin.luaran.kriteria-hasil.create', $luaran->id_luaran_keperawatan) }}" class="btn btn-primary btn-sm">
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
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($daftar_kriteria_hasil as $kriteria_hasil)
                <tr>
                    <td>{{$kriteria_hasil->id_kriteria_hasil}}</td>
                    <td>{{$kriteria_hasil->nama}}</td>
                    <td>
                        <form
                            style="display: inline-block"
                            method="POST"

                            action="{{ route(
                                'admin.luaran.kriteria-hasil.destroy',
                                [
                                    "luaran" => $luaran->id_luaran_keperawatan,
                                    "kriteria_hasil" => $kriteria_hasil->id_kriteria_hasil
                                ]
                            ) }}"
                        >
                            @csrf
                            @method('DELETE')
                            <button
                            class="btn btn-xs btn-danger"
                            >
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
</div>
@endsection
