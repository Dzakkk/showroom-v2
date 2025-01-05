<!-- filepath: /d:/laragon/www/showroom-v2/resources/views/pages/paket/create.blade.php -->
@extends('layouts.home')

@section('paket-create')
<div class="container mt-5">
    <h1 class="mb-4">Create Paket</h1>
    <form method="POST" action="{{ route('paket.store') }}">
        @csrf
        <div class="mb-3">
            <label for="paket_kode" class="form-label">Paket Kode</label>
            <input type="text" class="form-control" id="paket_kode" name="paket_kode" required>
        </div>
        <div class="mb-3">
            <label for="paket_nama" class="form-label">Paket Nama</label>
            <input type="text" class="form-control" id="paket_nama" name="paket_nama">
        </div>
        <div class="mb-3">
            <label for="paket_harga_cash" class="form-label">Paket Harga Cash</label>
            <input type="number" class="form-control" id="paket_harga_cash" name="paket_harga_cash">
        </div>
        <div class="mb-3">
            <label for="paket_uang_muka" class="form-label">Paket Uang Muka</label>
            <input type="number" class="form-control" id="paket_uang_muka" name="paket_uang_muka">
        </div>
        <div class="mb-3">
            <label for="paket_jumlah_cicilan" class="form-label">Paket Jumlah Cicilan</label>
            <input type="number" class="form-control" id="paket_jumlah_cicilan" name="paket_jumlah_cicilan">
        </div>
        <div class="mb-3">
            <label for="paket_nilai_cicilan" class="form-label">Paket Nilai Cicilan</label>
            <input type="number" class="form-control" id="paket_nilai_cicilan" name="paket_nilai_cicilan">
        </div>
        <div class="mb-3">
            <label for="paket_bunga" class="form-label">Paket Bunga</label>
            <input type="number" class="form-control" id="paket_bunga" name="paket_bunga">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection