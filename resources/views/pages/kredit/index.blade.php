<!-- filepath: /d:/laragon/www/showroom-v2/resources/views/pages/kredit/index.blade.php -->
@extends('layouts.home')

@section('kredit')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Kredit List</h1>
        <a href="{{ route('kredit.create') }}" class="btn btn-success">Add New Kredit</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kredit Kode</th>
                <th>Pembeli KTP</th>
                <th>Motor Kode</th>
                <th>Kredit Tanggal</th>
                <th>Photo KTP</th>
                <th>Photo KK</th>
                <th>Photo Slip Gaji</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kredit as $item)
                <tr>
                    <td>{{ $item->kredit_kode }}</td>
                    <td>{{ $item->pembeli_ktp }}</td>
                    <td>{{ $item->motor_kode }}</td>
                    <td>{{ $item->kredit_tanggal }}</td>
                    <td>
                        @if($item->photo_ktp)
                            <img src="{{ asset('storage/' . $item->photo_ktp) }}" alt="Photo KTP" width="50">
                        @endif
                    </td>
                    <td>
                        @if($item->photo_kk)
                            <img src="{{ asset('storage/' . $item->photo_kk) }}" alt="Photo KK" width="50">
                        @endif
                    </td>
                    <td>
                        @if($item->photo_slip_gaji)
                            <img src="{{ asset('storage/' . $item->photo_slip_gaji) }}" alt="Photo Slip Gaji" width="50">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('kredit.show', $item->kredit_kode) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('kredit.edit', $item->kredit_kode) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('kredit.destroy', $item->kredit_kode) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $kredit->links() }}
</div>
@endsection