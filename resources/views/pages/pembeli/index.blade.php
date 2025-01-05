@extends('layouts.home')

@section('pembeli')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Pembeli List</h1>
            <a href="{{ route('pembeli.create') }}" class="btn btn-success">Add New Pembeli</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>KTP</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pembelis as $pembeli)
                    <tr>
                        <td>{{ $pembeli->pembeli_ktp }}</td>
                        <td>{{ $pembeli->pembeli_nama }}</td>
                        <td>{{ $pembeli->pembeli_alamat }}</td>
                        <td>{{ $pembeli->pembeli_telepon }}</td>
                        <td>{{ $pembeli->pembeli_email }}</td>
                        <td>
                            <a href="{{ route('pembeli.edit', $pembeli->pembeli_ktp) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('pembeli.destroy', $pembeli->pembeli_ktp) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
