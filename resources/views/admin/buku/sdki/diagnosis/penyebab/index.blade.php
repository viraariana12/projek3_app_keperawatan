@extends('admin')

@php
    $i=1
@endphp

@section('judul-halaman')
Penyebab "{{ $diagnosis->nama }}"
@endsection

@section('isi')
<div class="card">
    <div class="card-header">
        <a href="{{ route('admin.diagnosis.penyebab.create', $diagnosis->id_diagnosis_keperawatan) }}" class="btn btn-primary btn-sm">
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
              @foreach ($daftar_penyebab as $penyebab)
                  <tr>
                      <td>{{$i++}}</td>
                      <td>{{$penyebab->nama}}</td>
                      <td>
                          {{$penyebab->pivot->jenis->nama}}
                      </td>
                      <td>
                        <a
                            href="
                                {{ route(
                                    'admin.diagnosis.penyebab.edit',
                                    [
                                        "diagnosi" => $diagnosis->id_diagnosis_keperawatan,
                                        "penyebab" => $penyebab->id_penyebab
                                    ]
                                ) }}"
                            class="btn btn-xs btn-success"
                        >Ubah</a>
                        <form
                            style="display: inline-block"
                            method="POST"

                            action="{{
                                route('admin.diagnosis.penyebab.destroy',
                                    [
                                        "diagnosi" => $diagnosis->id_diagnosis_keperawatan,
                                        "penyebab" => $penyebab->id_penyebab
                                    ]
                                )
                            }}"
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
