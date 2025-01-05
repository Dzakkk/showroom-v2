@extends('layouts.home')

@section('kredit-create')
<div class="container mt-5">
    <h1 class="mb-4">Create Kredit</h1>
    <form method="POST" action="{{ route('kredit.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="kredit_kode" class="form-label">Kredit Kode</label>
            <input type="text" class="form-control" id="kredit_kode" name="kredit_kode" required>
        </div>
        <div class="mb-3">
            <label for="pembeli_ktp" class="form-label">Pembeli KTP</label>
            <select class="form-control" id="pembeli_ktp" name="pembeli_ktp" required>
                @foreach($pembeli as $item)
                    <option value="{{ $item->pembeli_ktp }}">{{ $item->pembeli_nama }} ({{ $item->pembeli_ktp }})</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="motor_kode" class="form-label">Motor Kode</label>
            <select class="form-control" id="motor_kode" name="motor_kode" required>
                @foreach($motor as $item)
                    <option value="{{ $item->motor_kode }}">{{ $item->motor_merk }} - {{ $item->motor_tipe }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="motor_kode" class="form-label">Paket Kode</label>
            <select class="form-control" id="motor_kode" name="motor_kode" required>
                @foreach($paket as $item)
                    <option value="{{ $item->paket_kode }}">{{ $item->paket_bunga }} - {{ $item->paket_nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="kredit_tanggal" class="form-label">Kredit Tanggal</label>
            <input type="date" class="form-control" id="kredit_tanggal" name="kredit_tanggal" required>
        </div>
        <div class="mb-3">
            <label for="photo_ktp" class="form-label">Photo KTP</label>
            <input type="file" class="form-control" id="photo_ktp" name="photo_ktp">
        </div>
        <div class="mb-3">
            <label for="photo_kk" class="form-label">Photo KK</label>
            <input type="file" class="form-control" id="photo_kk" name="photo_kk">
        </div>
        <div class="mb-3">
            <label for="photo_slip_gaji" class="form-label">Photo Slip Gaji</label>
            <input type="file" class="form-control" id="photo_slip_gaji" name="photo_slip_gaji">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection