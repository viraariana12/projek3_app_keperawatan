@extends('admin')

@section('judul-halaman')
Tanda dan gejala diagnosis "{{ $diagnosis->nama }}"
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}" />
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item">Buku</li>
    <li class="breadcrumb-item">SDKI</li>
    <li class="breadcrumb-item">Diagnosis</li>
    <li class="breadcrumb-item active"><a href="#">Tanda Dan Gejala</a></li>
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
        <a href="{{ route('admin.diagnosis.tanda-dan-gejala.create', $diagnosis->id_diagnosis_keperawatan) }}" class="btn btn-primary btn-sm">
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
            <th>Mayor/Minor</th>
            <th>Objektif/Subjektif</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
            @php
                $i=1;
            @endphp
            @foreach ($tanda_dan_gejala as $item)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$item->nama}}</td>
                    @if ($item->pivot->mayor)
                        <td>
                            <a class="btn btn-xs btn-danger">
                                Mayor
                            </a>
                        </td>
                    @else
                        <td>
                            <a class="btn btn-xs btn-warning">
                                Minor
                            </a>
                        </td>
                    @endif
                    @if ($item->pivot->objektif)
                        <td>
                            <a class="btn btn-xs btn-success">
                                Objektif
                            </a>
                        </td>
                    @else
                        <td>
                            <a class="btn btn-xs btn-info">
                                Subjektif
                            </a>
                        </td>
                    @endif
                    <td>
                        <a
                            href="
                                {{ route(
                                    'admin.diagnosis.tanda-dan-gejala.edit',
                                    [
                                        "diagnosi" => $diagnosis->id_diagnosis_keperawatan,
                                        "tanda_dan_gejala" => $item->id_tanda_dan_gejala
                                    ]
                                ) }}"
                            class="btn btn-xs btn-success"
                        >Ubah</a>
                        <form
                            style="display: inline-block"
                            method="POST"

                            action="{{ route(
                                'admin.diagnosis.tanda-dan-gejala.destroy',
                                [
                                    "diagnosi" => $diagnosis->id_diagnosis_keperawatan,
                                    "tanda_dan_gejala" => $item->id_tanda_dan_gejala
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
