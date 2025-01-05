@extends('layouts.home')

@section('motor-create')
<div class="container mt-5">
    <h1 class="mb-4">Create Motor</h1>
    <form method="POST" action="{{ route('motor.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="motor_kode" class="form-label">Motor Kode</label>
            <input type="text" class="form-control" id="motor_kode" name="motor_kode" required>
        </div>
        <div class="mb-3">
            <label for="motor_merk" class="form-label">Motor Merk</label>
            <input type="text" class="form-control" id="motor_merk" name="motor_merk" required>
        </div>
        <div class="mb-3">
            <label for="motor_tipe" class="form-label">Motor Tipe</label>
            <input type="text" class="form-control" id="motor_tipe" name="motor_tipe" required>
        </div>
        <div class="mb-3">
            <label for="motor_warna" class="form-label">Motor Warna</label>
            <input type="text" class="form-control" id="motor_warna" name="motor_warna" required>
        </div>
        <div class="mb-3">
            <label for="motor_tahun" class="form-label">Motor Tahun</label>
            <input type="number" class="form-control" id="motor_tahun" name="motor_tahun" required>
        </div>
        <div class="mb-3">
            <label for="motor_harga" class="form-label">Motor Harga</label>
            <input type="number" class="form-control" id="motor_harga" name="motor_harga" required>
        </div>
        <div class="mb-3">
            <label for="motor_gambar" class="form-label">Motor Gambar</label>
            <input type="file" class="form-control" id="motor_gambar" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection