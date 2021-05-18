@extends('admin')

@section('judul-halaman')
Daftar Diagnosis
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}" />
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item">Buku</li>
    <li class="breadcrumb-item">SDKI</li>
    <li class="breadcrumb-item">Diagnosis</li>
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

@section('isi')
<div class="card">
    <div class="card-header">
        <a href="{{ route('admin.diagnosis.create') }}" class="btn btn-primary btn-sm">
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
            <th>Kode</th>
            <th>Nama</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($daftar_diagnosis as $diagnosis)
            <tr data-widget="expandable-table" aria-expanded="false">
                <td>{{$diagnosis->id_diagnosis_keperawatan}}</td>
                <td>{{$diagnosis->kode}}</td>
                <td>{{$diagnosis->nama}}</td>
                <td>
                    <a href="
                        {{
                            route(
                                'admin.diagnosis.show',
                                $diagnosis->id_diagnosis_keperawatan
                            )
                        }}
                    " class="btn btn-xs btn-info">Lihat</a>
                    <a
                        href="
                            {{ route(
                                'admin.diagnosis.edit',
                                $diagnosis->id_diagnosis_keperawatan
                            ) }}"
                        class="btn btn-xs btn-success"
                    >Ubah</a>
                    <form
                        style="display: inline-block"
                        method="POST"
                        action="{{
                            route('admin.diagnosis.destroy',
                            $diagnosis->id_diagnosis_keperawatan)
                        }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-xs btn-danger">Hapus</button>
                    </form>
                </td>
              </tr>
              <tr class="expandable-body">
                <td colspan="5">
                  <p>
                    {{$diagnosis->definisi}}
                  </p>
                </td>
              </tr>
            @endforeach

        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
