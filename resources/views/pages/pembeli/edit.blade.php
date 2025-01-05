@extends('layouts.home')

@section('pembeli-edit')
<div class="container mt-5">
    <h1 class="mb-4">Update Pembeli</h1>
    <form method="POST" action="{{ route('pembeli.update', $pembeli->pembeli_ktp) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="pembeli_ktp" class="form-label">KTP</label>
            <input type="text" class="form-control" id="pembeli_ktp" name="pembeli_ktp" value="{{ $pembeli->pembeli_ktp }}" required>
        </div>
        <div class="mb-3">
            <label for="pembeli_nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="pembeli_nama" name="pembeli_nama" value="{{ $pembeli->pembeli_nama }}" required>
        </div>
        <div class="mb-3">
            <label for="pembeli_alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="pembeli_alamat" name="pembeli_alamat" value="{{ $pembeli->pembeli_alamat }}" required>
        </div>
        <div class="mb-3">
            <label for="pembeli_telepon" class="form-label">Telepon</label>
            <input type="text" class="form-control" id="pembeli_telepon" name="pembeli_telepon" value="{{ $pembeli->pembeli_telepon }}" required>
        </div>
        <div class="mb-3">
            <label for="pembeli_email" class="form-label">Email</label>
            <input type="email" class="form-control" id="pembeli_email" name="pembeli_email" value="{{ $pembeli->pembeli_email }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection