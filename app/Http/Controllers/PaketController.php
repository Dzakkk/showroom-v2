<?php

namespace App\Http\Controllers;

use App\Models\Kredit_paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Kredit_paket::all();

        // Search
        if ($request->filled('search')) {
            $query->where('paket_nama', 'like', "%{$request->search}%");
        }

        // Pagination
        $paket = $query->paginate(10);

        return view('paket.index', compact('paket'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paket.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'paket_kode' => 'required',
            'paket_nama' => 'required',
            'paket_bunga' => 'required',
            'paket_harga_cash' => 'required',
            'paket_uang_muka' => 'required',
            'paket_jumlah_cicilan' => 'required',
            'paket_nilai_cicilan' => 'required',
        ]);

        Kredit_paket::create($validate);

        return redirect()->route('paket.index')->with('success', 'Paket berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $paket = Kredit_paket::findOrFail($id);
        return view('paket.edit', compact('paket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kredit_paket $paket)
    {
        $validate = $request->validate([
            'paket_kode' => 'required',
            'paket_nama' => 'required',
            'paket_bunga' => 'required',
            'paket_harga_cash' => 'required',
            'paket_uang_muka' => 'required',
            'paket_jumlah_cicilan' => 'required',
            'paket_nilai_cicilan' => 'required',
        ]);

        $paket->update($validate);

        return redirect()->route('paket.index')->with('success', 'Paket berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $paket = Kredit_paket::findOrFail($id);
        $paket->delete();

        return redirect()->route('paket.index')->with('success', 'Paket berhasil dihapus');
    }
}
