@extends('layouts.home')

@section('cicilan')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Cicilan List</h1>
    </div>
    <div class="row">
        @forelse($cicilans as $cicilan)
            <div class="col-md-4 mb-4">
                <div class="card {{ $cicilan->cicilan_sisa_ke == 0 ? 'border border-success border-3' : '' }}">
                    <div class="card-body">
                        <h5 class="card-title">Cicilan Kode: {{ htmlspecialchars($cicilan->cicilan_kode) }}</h5>
                        <p class="card-text"><strong>Kredit Kode:</strong> {{ htmlspecialchars($cicilan->kredit_kode) }}</p>
                        <p class="card-text"><strong>Cicilan Jumlah:</strong> {{ number_format($cicilan->cicilan_jumlah, 2) }}</p>
                        <p class="card-text"><strong>Cicilan Tanggal:</strong> {{ date('d M Y', strtotime($cicilan->cicilan_tanggal)) }}</p>
                        <p class="card-text"><strong>Cicilan Ke:</strong> {{ $cicilan->cicilan_ke }}</p>
                        <p class="card-text"><strong>Cicilan Sisa Ke:</strong> {{ $cicilan->cicilan_sisa_ke }}</p>
                        <p class="card-text"><strong>Cicilan Sisa Harga:</strong> {{ number_format($cicilan->cicilan_sisa_harga, 2) }}</p>
                        
                        <div class="d-flex justify-content-between">
                            <!-- Tombol Update -->
                            <form action="{{ route('cicilan.update', $cicilan->cicilan_kode) }}" method="POST" onsubmit="return confirm('Are you sure you want to update this cicilan?');">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-primary btn-sm" {{ $cicilan->cicilan_sisa_ke == 0 ? 'disabled' : '' }}>
                                    {{ $cicilan->cicilan_sisa_ke == 0 ? 'Lunas' : 'Bayar' }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center">No Cicilans Found</p>
            </div>
        @endforelse
    </div>
    <div class="d-flex justify-content-center">
        {{ $cicilans->links() }}
    </div>
</div>
@endsection
