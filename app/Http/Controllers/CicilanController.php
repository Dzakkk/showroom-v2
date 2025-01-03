<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bayar_cicilan;

class CicilanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cicilan = Bayar_cicilan::paginate(10);
        return view('cicilan.index', compact('cicilan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cicilan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cicilan_kode' => 'required|unique:cicilan,cicilan_kode',
            'kredit_kode' => 'required',
            'cicilan_jumlah' => 'required|numeric',
            'cicilan_tanggal' => 'required|date',
            'cicilan_ke' => 'required|integer',
            'cicilan_sisa_ke' => 'required|integer',
            'cicilan_sisa_harga' => 'required|numeric',
        ]);

        Bayar_cicilan::create($request->all());

        return redirect()->route('cicilan.index')->with('success', 'Cicilan entry created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cicilan = Bayar_cicilan::findOrFail($id);
        return view('cicilan.show', compact('cicilan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cicilan = Bayar_cicilan::findOrFail($id);
        return view('cicilan.edit', compact('cicilan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'cicilan_kode' => 'required|unique:cicilan,cicilan_kode,' . $id,
            'kredit_kode' => 'required',
            'cicilan_jumlah' => 'required|numeric',
            'cicilan_tanggal' => 'required|date',
            'cicilan_ke' => 'required|integer',
            'cicilan_sisa_ke' => 'required|integer',
            'cicilan_sisa_harga' => 'required|numeric',
        ]);

        $cicilan = Bayar_cicilan::findOrFail($id);
        $cicilan->update($request->all());

        return redirect()->route('cicilan.index')->with('success', 'Cicilan entry updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cicilan = Bayar_cicilan::findOrFail($id);
        $cicilan->delete();

        return redirect()->route('cicilan.index')->with('success', 'Cicilan entry deleted successfully.');
    }
}
