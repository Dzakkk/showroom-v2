@extends('layouts.home')

@section('motor')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Motor List</h1>
        <a href="{{ route('motor.create') }}" class="btn btn-success">Add New Motor</a>
    </div>
    <div class="row">
        @foreach($motors as $motor)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $motor->motor_gambar) }}" class="card-img-top" alt="{{ $motor->motor_merk }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $motor->motor_merk }}</h5>
                        <p class="card-text">{{ $motor->motor_tipe }}</p>
                        <p class="card-text">{{ $motor->motor_warna }}</p>
                        <p class="card-text"><strong>Price:</strong> ${{ $motor->motor_harga }}</p>
                        <a href="{{ route('motor.show', $motor->motor_kode) }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection