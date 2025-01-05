@extends('layouts.home')

@section('motor-show')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1>{{ $motor->motor_merk }}</h1>
        </div>
        <div class="card-body">
            <img src="{{ asset('storage/' . $motor->motor_gambar) }}" class="card-img-top mb-3" alt="{{ $motor->motor_merk }}">
            <p class="card-text"><strong>Kode:</strong> {{ $motor->motor_kode }}</p>
            <p class="card-text"><strong>Tipe:</strong> {{ $motor->motor_tipe }}</p>
            <p class="card-text"><strong>Warna:</strong> {{ $motor->motor_warna }}</p>
            <p class="card-text"><strong>Tahun:</strong> {{ $motor->motor_tahun }}</p>
            <p class="card-text"><strong>Harga:</strong> ${{ $motor->motor_harga }}</p>
            <a href="{{ route('motor.edit', $motor->motor_kode) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('motor.destroy', $motor->motor_kode) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection