<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembeli;

class PembeliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembeli = Pembeli::paginate(10);
        return view('pembeli.index', compact('pembeli'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pembeli.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pembeli_ktp' => 'required|unique:pembeli,ktp',
            'pembeli_alamat' => 'required|string',
            'pembeli_telepon' => 'required|string|max:15',
            'pembeli_email' => 'required|email',
        ]);

        Pembeli::create($request->all());

        return redirect()->route('pembeli.index')->with('success', 'Pembeli entry created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pembeli = Pembeli::findOrFail($id);
        return view('pembeli.show', compact('pembeli'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pembeli = Pembeli::findOrFail($id);
        return view('pembeli.edit', compact('pembeli'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'pembeli_ktp' => 'required|unique:pembeli,ktp,' . $id,
            'pembeli_alamat' => 'required|string',
            'pembeli_telepon' => 'required|string|max:15',
            'pembeli_email' => 'required|email',
        ]);

        $pembeli = Pembeli::findOrFail($id);
        $pembeli->update($request->all());

        return redirect()->route('pembeli.index')->with('success', 'Pembeli entry updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pembeli = Pembeli::findOrFail($id);
        $pembeli->delete();

        return redirect()->route('pembeli.index')->with('success', 'Pembeli entry deleted successfully.');
    }
}
