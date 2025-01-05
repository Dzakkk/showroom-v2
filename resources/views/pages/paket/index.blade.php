@extends('layouts.home')

@section('paket')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Paket List</h1>
        <a href="{{ route('paket.create') }}" class="btn btn-success">Add New Paket</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Paket Kode</th>
                <th>Paket Nama</th>
                <th>Paket Harga Cash</th>
                <th>Paket Uang Muka</th>
                <th>Paket Jumlah Cicilan</th>
                <th>Paket Nilai Cicilan</th>
                <th>Paket Bunga</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pakets as $paket)
                <tr>
                    <td>{{ $paket->paket_kode }}</td>
                    <td>{{ $paket->paket_nama }}</td>
                    <td>{{ $paket->paket_harga_cash }}</td>
                    <td>{{ $paket->paket_uang_muka }}</td>
                    <td>{{ $paket->paket_jumlah_cicilan }}</td>
                    <td>{{ $paket->paket_nilai_cicilan }}</td>
                    <td>{{ $paket->paket_bunga }}</td>
                    <td>
                        {{-- <a href="{{ route('paket.show', $paket->paket_kode) }}" class="btn btn-info btn-sm">View</a> --}}
                        <a href="{{ route('paket.edit', $paket->paket_kode) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('paket.destroy', $paket->paket_kode) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $pakets->links() }}
</div>
@endsection