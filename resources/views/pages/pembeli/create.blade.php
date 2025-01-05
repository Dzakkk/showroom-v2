@extends('layouts.home')

@section('pembeli-create')
<div class="container mt-5">
    <h1 class="mb-4">Create Pembeli</h1>
    <form method="POST" action="{{ route('pembeli.store') }}">
        @csrf
        <div class="mb-3">
            <label for="pembeli_ktp" class="form-label">KTP</label>
            <input type="text" class="form-control" id="pembeli_ktp" name="pembeli_ktp" required>
        </div>
        <div class="mb-3">
            <label for="pembeli_nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="pembeli_nama" name="pembeli_nama" required>
        </div>
        <div class="mb-3">
            <label for="pembeli_alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="pembeli_alamat" name="pembeli_alamat" required>
        </div>
        <div class="mb-3">
            <label for="pembeli_telepon" class="form-label">Telepon</label>
            <input type="text" class="form-control" id="pembeli_telepon" name="pembeli_telepon" required>
        </div>
        <div class="mb-3">
            <label for="pembeli_email" class="form-label">Email</label>
            <input type="email" class="form-control" id="pembeli_email" name="pembeli_email" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection