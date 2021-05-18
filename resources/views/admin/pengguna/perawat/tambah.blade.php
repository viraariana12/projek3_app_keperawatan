@extends('admin')

@section('judul-halaman','Tambah Perawat Baru')

@section('isi')
<div class="row justify-content-center">
    <div class="col-8">
        <div class="card card-primary">
            <form action="{{ route('admin.perawat.store') }}" method="POST">
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
                        />
                        @error('email')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input
                            type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            id="password"
                            placeholder="Password"
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
                    <button type="submit" class="btn btn-info">Tambahkan</button>
                    <a href="{{route('admin.perawat.index')}}" class="btn btn-warning">Batal</a>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection
