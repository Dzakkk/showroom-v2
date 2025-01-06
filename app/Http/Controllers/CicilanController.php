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
        $cicilans = Bayar_cicilan::paginate(10);
        return view('pages.cicilan.index', compact('cicilans'));
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
            'cicilan_kode' => 'required|unique:cicilan',
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
    // $request->validate([
    //     'cicilan_jumlah' => 'required|numeric', // Pastikan cicilan_jumlah selalu disediakan
    // ]);

    $cicilan = Bayar_cicilan::findOrFail($id);

    $cicilan->cicilan_ke += 1;
    $cicilan->cicilan_sisa_ke -= 1;
    $cicilan->cicilan_tanggal = \Carbon\Carbon::parse($cicilan->cicilan_tanggal)->addDays(30);
    $cicilan->cicilan_sisa_harga -= $cicilan->cicilan_jumlah;
    $cicilan->save();

    return redirect()->route('cicilan.index')->with('success', 'Cicilan updated successfully.');
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
