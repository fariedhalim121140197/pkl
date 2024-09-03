@extends('dashboard.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Profil</h1>
    </div>

    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="col-lg-8">
        <form method="post" action="{{ url('/dashboard/profils/update') }}" class="mb-5">
            @method('put')
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" autofocus value="{{ old('nama', $nama) }}">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" autofocus value="{{ old('alamat', $alamat) }}">
                @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="telp" class="form-label">No. Telepon</label>
                <input type="text" class="form-control @error('telp') is-invalid @enderror" id="telp" name="telp" autofocus value="{{ old('telp', $telp) }}">
                @error('telp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" autofocus value="{{ old('email', $email) }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="maps" class="form-label">Maps</label>
                <input type="text" class="form-control @error('maps') is-invalid @enderror" id="maps" name="maps" autofocus value="{{ old('maps', $maps) }}">
                @error('maps')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="fb" class="form-label">Tautan Facebook</label>
                <input type="text" class="form-control @error('fb') is-invalid @enderror" id="fb" name="fb" autofocus value="{{ old('fb', $fb) }}">
                @error('fb')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ig" class="form-label">Tautan Instagram</label>
                <input type="text" class="form-control @error('ig') is-invalid @enderror" id="ig" name="ig" autofocus value="{{ old('ig', $ig) }}">
                @error('ig')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="instance1" class="form-label">Nama Instansi 1</label>
                <input type="text" class="form-control @error('instance1') is-invalid @enderror" id="instance1" name="instance1" autofocus value="{{ old('instance1', $instance1) }}">
                @error('instance1')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="instance2" class="form-label">Nama Instansi 2</label>
                <input type="text" class="form-control @error('instance2') is-invalid @enderror" id="instance2" name="instance2" autofocus value="{{ old('instance2', $instance2) }}">
                @error('instance2')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="instance3" class="form-label">Nama Instansi 3</label>
                <input type="text" class="form-control @error('instance3') is-invalid @enderror" id="instance3" name="instance3" autofocus value="{{ old('instance3', $instance3) }}">
                @error('instance3')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="deskripsi_home" class="form-label">Deskripsi (Di Menu Beranda)</label>
                <textarea class="form-control @error('deskripsi_home') is-invalid @enderror" id="deskripsi_home" name="deskripsi_home" rows="3">{{ old('deskripsi_home', $deskripsi_home) }}</textarea>
                @error('deskripsi_home')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="deskripsi_profil" class="form-label">Deskripsi (Di Menu Profil)</label>
                <textarea class="form-control @error('deskripsi_profil') is-invalid @enderror" id="deskripsi_profil" name="deskripsi_profil" rows="3">{{ old('deskripsi_profil', $deskripsi_profil) }}</textarea>
                @error('deskripsi_profil')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Perbarui</button>
        </form>
    </div>

    <script>
        document.addEventListener('trix-file-accept', function(e){
            e.preventDefault();
        })
    </script>
@endsection
