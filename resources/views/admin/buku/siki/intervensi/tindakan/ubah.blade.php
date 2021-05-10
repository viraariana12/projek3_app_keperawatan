@extends('admin')

@section('judul-halaman', 'Buat Tindakan Intervensi Baru')

@section('isi')
<div class="row justify-content-center">
    <div class="col-8">
        <form method="POST" action="{{ route(
            'admin.intervensi.tindakan.update',
            [
                'intervensi' => $intervensi->id_intervensi_keperawatan,
                'tindakan' => $tindakan->id_tindakan_keperawatan
            ]
            ) }}">
            @csrf
            @method('PUT')
            <div class="card card-primary">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input
                                type="text"
                                class="form-control @error('nama') is-invalid @enderror"
                                id="nama"
                                placeholder="Nama Tindakan"
                                name="nama"
                                value="{{ $tindakan->nama }}"
                            />
                        </div>
                        @error('nama')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="jenis" class="col-sm-2 col-form-label">Jenis</label>
                        <div class="col-sm-10">
                            <select class="form-control @error('jenis') is-invalid @enderror" name="jenis">
                                @foreach ($daftar_jenis as $jenis)
                                    <option
                                        value="{{$jenis->id_jenis_tindakan_keperawatan}}"
                                        @if($tindakan->pivot->jenis)
                                            @if (
                                                $tindakan->pivot->jenis->id_jenis_tindakan_keperawatan == $jenis->id_jenis_tindakan_keperawatan
                                            )
                                                selected
                                            @endif
                                        @endif
                                    >{{$jenis->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('jenis')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Simpan Perubahan</button>
                    <a href="{{ route('admin.intervensi.tindakan.index', $intervensi->id_intervensi_keperawatan) }}" class="btn btn-default">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
