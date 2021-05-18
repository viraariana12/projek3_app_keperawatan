@extends('admin')

@section('judul-halaman','Ubah Perawat')

@section('isi')
<div class="row justify-content-center">
    <div class="col-8">
        <div class="card card-primary">
            <form action="{{ route('admin.perawat.update', $perawat->id_perawat) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input
                            type="text"
                            class="form-control @error('nama') is-invalid @enderror"
                            id="nama"
                            placeholder="Nama Lengkap"
                            name="nama"
                            value="{{$perawat->nama}}"
                        />
                        @error('nama')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Alamat E-Mail</label>
                        <input
                            type="text"
                            class="form-control @error('email') is-invalid @enderror"
                            id="email"
                            placeholder="Alamat E-Mail"
                            name="email"
                            value="{{$perawat->email}}"
                        />
                        @error('email')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Ganti Password</label>
                        <input
                            type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            id="password"
                            placeholder="Password baru"
                            name="password"
                        />
                        @error('password')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                    <a href="{{route('admin.perawat.index')}}" class="btn btn-warning">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
