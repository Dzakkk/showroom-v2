<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beli_kredit;

class CreditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kredit = Beli_kredit::paginate(10);
        return view('kredit.index', compact('kredit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kredit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kredit_kode' => 'required|unique:kredit,kredit_kode',
            'pembeli_ktp' => 'required',
            'motor_kode' => 'required',
            'kredit_tanggal' => 'required|date',
            'photo_ktp' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'photo_kk' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'photo_slip_gaji' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        Beli_kredit::create($request->all());

        return redirect()->route('kredit.index')->with('success', 'Kredit entry created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kredit = Beli_kredit::findOrFail($id);
        return view('kredit.show', compact('kredit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kredit = Beli_kredit::findOrFail($id);
        return view('kredit.edit', compact('kredit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kredit_kode' => 'required|unique:kredit,kredit_kode',
            'pembeli_ktp' => 'required',
            'motor_kode' => 'required',
            'kredit_tanggal' => 'required|date',
            'photo_ktp' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'photo_kk' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'photo_slip_gaji' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $kredit = Beli_kredit::findOrFail($id);
        $kredit->update($request->all());

        return redirect()->route('kredit.index')->with('success', 'Kredit entry updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kredit = Beli_kredit::findOrFail($id);
        $kredit->delete();

        return redirect()->route('kredit.index')->with('success', 'Kredit entry deleted successfully.');
    }
}
