@extends('layouts.home')

@section('cash')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Cash List</h1>
        <a href="{{ route('cash.create') }}" class="btn btn-success">Add New Cash Entry</a>
    </div>
    <div class="row">
        @foreach($cashs as $cash)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Cash Kode: {{ $cash->cash_kode }}</h5>
                        <p class="card-text"><strong>Pembeli KTP:</strong> {{ $cash->pembeli_ktp }}</p>
                        <p class="card-text"><strong>Motor Kode:</strong> {{ $cash->motor_kode }}</p>
                        <p class="card-text"><strong>Cash Bayar:</strong> {{ number_format($cash->cash_bayar, 2) }}</p>
                        <p class="card-text"><strong>Cash Tanggal:</strong> {{ date('d M Y', strtotime($cash->cash_tanggal)) }}</p>
                        <a href="{{ route('cash.show', $cash->cash_kode) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('cash.edit', $cash->cash_kode) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('cash.destroy', $cash->cash_kode) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $cashs->links() }}
</div>
@endsection
