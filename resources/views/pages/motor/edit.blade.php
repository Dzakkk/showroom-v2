@extends('layouts.home')

@section('motor-edit')
<div class="container mt-5">
    <h1 class="mb-4">Update Motor</h1>
    <form method="POST" action="{{ route('motor.update', $motor->motor_kode) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="motor_kode" class="form-label">Motor Kode</label>
            <input type="text" class="form-control" id="motor_kode" name="motor_kode" value="{{ $motor->motor_kode }}" required>
        </div>
        <div class="mb-3">
            <label for="motor_merk" class="form-label">Motor Merk</label>
            <input type="text" class="form-control" id="motor_merk" name="motor_merk" value="{{ $motor->motor_merk }}" required>
        </div>
        <div class="mb-3">
            <label for="motor_tipe" class="form-label">Motor Tipe</label>
            <input type="text" class="form-control" id="motor_tipe" name="motor_tipe" value="{{ $motor->motor_tipe }}" required>
        </div>
        <div class="mb-3">
            <label for="motor_warna" class="form-label">Motor Warna</label>
            <input type="text" class="form-control" id="motor_warna" name="motor_warna" value="{{ $motor->motor_warna }}" required>
        </div>
        <div class="mb-3">
            <label for="motor_tahun" class="form-label">Motor Tahun</label>
            <input type="number" class="form-control" id="motor_tahun" name="motor_tahun" value="{{ $motor->motor_tahun }}" required>
        </div>
        <div class="mb-3">
            <label for="motor_harga" class="form-label">Motor Harga</label>
            <input type="number" class="form-control" id="motor_harga" name="motor_harga" value="{{ $motor->motor_harga }}" required>
        </div>
        <div class="mb-3">
            <label for="motor_gambar" class="form-label">Motor Gambar</label>
            <input type="file" class="form-control" id="motor_gambar" name="motor_gambar">
            @if($motor->motor_gambar)
                <img src="{{ asset('storage/' . $motor->motor_gambar) }}" alt="{{ $motor->motor_merk }}" class="img-thumbnail mt-2" width="150">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection