@extends('layouts.home')

@section('cash-create')
<div class="container mt-5">
    <h1>Add New Cash Entry</h1>
    <form action="{{ route('cash.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="cash_kode" class="form-label">Cash Kode</label>
            <input type="text" class="form-control @error('cash_kode') is-invalid @enderror" id="cash_kode" name="cash_kode" value="{{ old('cash_kode') }}" required>
            @error('cash_kode')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="pembeli_ktp" class="form-label">Pembeli</label>
            <select class="form-select @error('pembeli_ktp') is-invalid @enderror" id="pembeli_ktp" name="pembeli_ktp" required>
                <option value="" disabled selected>Select Pembeli</option>
                @foreach($pembeli as $item)
                    <option value="{{ $item->pembeli_ktp }}">{{ $item->pembeli_nama }} ({{ $item->pembeli_ktp }})</option>
                @endforeach
            </select>
            @error('pembeli_ktp')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="motor_kode" class="form-label">Motor</label>
            <select class="form-select @error('motor_kode') is-invalid @enderror" id="motor_kode" name="motor_kode" required>
                <option value="" disabled selected>Select Motor</option>
                @foreach($motor as $item)
                    <option value="{{ $item->motor_kode }}">{{ $item->motor_kode }} - {{ $item->motor_merk }} {{ $item->motor_harga }}</option>
                @endforeach
            </select>
            @error('motor_kode')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="cash_bayar" class="form-label">Cash Bayar</label>
            <input type="number" class="form-control @error('cash_bayar') is-invalid @enderror" id="cash_bayar" name="cash_bayar" value="{{ old('cash_bayar') }}" required>
            @error('cash_bayar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="cash_tanggal" class="form-label">Cash Tanggal</label>
            <input type="date" class="form-control @error('cash_tanggal') is-invalid @enderror" id="cash_tanggal" name="cash_tanggal" value="{{ old('cash_tanggal') }}" required>
            @error('cash_tanggal')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
        <a href="{{ route('cash.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
