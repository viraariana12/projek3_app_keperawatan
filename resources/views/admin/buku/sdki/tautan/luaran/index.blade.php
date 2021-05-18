@extends('admin')

@section('judul-halaman')
Luaran Diagnosis "{{ $diagnosis->nama }}"
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}" />
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item">Buku</li>
    <li class="breadcrumb-item">SDKI</li>
    <li class="breadcrumb-item">Diagnosis</li>
    <li class="breadcrumb-item active"><a href="#">Luaran</a></li>
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
        <a href="
            {{ route('admin.diagnosis.luaran.create', $diagnosis->id_diagnosis_keperawatan) . "?utama=1" }}" class="btn btn-primary btn-sm">
            <i class="fa fa-plus"></i>
            Utama
        </a>
        <a href="{{ route('admin.diagnosis.luaran.create', $diagnosis->id_diagnosis_keperawatan) . "?utama=0" }}" class="btn btn-success btn-sm">
            <i class="fa fa-plus"></i>
            Tambahan
        </a>
    </div>
    <!-- ./card-header -->
    <div class="card-body table-responsive p-0">
      <table class="table table-sm table-head-fixed table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Utama/Tambahan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
            @php
                $i=1;
            @endphp
            @foreach ($daftar_luaran as $luaran)
                <tr>
                    <td>{{$i++}}</td>
                    <td>
                        <a href="{{ route('admin.luaran.show', $luaran->id_luaran_keperawatan) }}">
                            {{$luaran->kode}}
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin.luaran.show', $luaran->id_luaran_keperawatan) }}">
                            {{$luaran->nama}}
                        </a>
                    </td>
                    @if ($luaran->pivot->utama)
                        <td>
                            <a class="btn btn-xs btn-danger">
                                Utama
                            </a>
                        </td>
                    @else
                        <td>
                            <a class="btn btn-xs btn-warning">
                                Tambahan
                            </a>
                        </td>
                    @endif

                    <td>
                        <a
                            href="
                                {{ route(
                                    'admin.diagnosis.luaran.edit',
                                    [
                                        "diagnosi" => $diagnosis->id_diagnosis_keperawatan,
                                        "luaran" => $luaran->id_luaran_keperawatan
                                    ]
                                ) }}"
                            class="btn btn-xs btn-success"
                        >Ubah</a>
                        <form
                            style="display: inline-block"
                            method="POST"

                            action="{{ route(
                                'admin.diagnosis.luaran.destroy',
                                [
                                    "diagnosi" => $diagnosis->id_diagnosis_keperawatan,
                                    "luaran" => $luaran->id_luaran_keperawatan
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
