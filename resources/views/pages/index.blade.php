@extends('layouts.home')

@section('home')
<div class="container mt-5">
    <div class="row">
        <!-- Card for Pembeli Count -->
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-primary">
                <div class="card-header">Jumlah Pembeli</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $pembeli }}</h5>
                    <p class="card-text">Total pembeli terdaftar di sistem.</p>
                </div>
            </div>
        </div>
        <!-- Card for Motor Count -->
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-success">
                <div class="card-header">Jumlah Motor</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $motor }}</h5>
                    <p class="card-text">Total motor yang tersedia dalam sistem.</p>
                </div>
            </div>
        </div>
        <!-- Card for Beli Kredit Count -->
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-warning">
                <div class="card-header">Pembelian Kredit</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $kredit }}</h5>
                    <p class="card-text">Jumlah transaksi pembelian motor dengan kredit.</p>
                </div>
            </div>
        </div>
        <!-- Card for Beli Cash Count -->
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-danger">
                <div class="card-header">Pembelian Cash</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $cash }}</h5>
                    <p class="card-text">Jumlah transaksi pembelian motor dengan cash.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection