<?php

namespace App\Http\Controllers;

use App\Models\Beli_cash;
use App\Models\Kredit_paket;
use App\Models\Motor;
use App\Models\Pembeli;
use Illuminate\Http\Request;

class CashController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Beli_cash::query();

        // Search
        if ($request->filled('search')) {
            $query->where('cash_kode', 'like', "%{$request->search}%");
        }

        // Pagination
        $cashs = $query->paginate(10);

        return view('pages.cash.index', compact('cashs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pembeli = Pembeli::all();
        $motor = Motor::all();

        return view('pages.cash.create', compact('pembeli', 'motor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cash_kode' => 'required|unique:cash,cash_kode',
            'pembeli_ktp' => 'required',
            'motor_kode' => 'required',
            'cash_bayar' => 'required',
            'cash_tanggal' => 'required',
        ]);

        $cash = new Beli_cash([
            'cash_kode' => $request->cash_kode,
            'pembeli_ktp' => $request->pembeli_ktp,
            'motor_kode' => $request->motor_kode,
            'cash_bayar' => $request->cash_bayar,
            'cash_tanggal' => $request->cash_tanggal,            
        ]);

        $cash->save();

        return redirect()->route('cash.index')->with('success', 'Cash entry created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cash = Beli_cash::findOrFail($id);
        return view('cash.show', compact('cash'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cash = Beli_cash::findOrFail($id);
        return view('cash.edit', compact('cash'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'cash_kode' => 'required|unique:cash,cash_kode,' . $id,
            'pembeli_ktp' => 'required',
            'motor_kode' => 'required',
            'cash_bayar' => 'required',
            'cash_tanggal' => 'required',
        ]);

        $cash = Beli_cash::findOrFail($id);
        $cash->cash_kode = $request->cash_kode;
        $cash->pembeli_ktp = $request->pembeli_ktp;
        $cash->motor_kode = $request->motor_kode;
        $cash->cash_bayar = $request->cash_bayar;
        $cash->cash_tanggal = $request->cash_tanggal;

        $cash->save();

        return redirect()->route('cash.index')->with('success', 'Cash entry updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cash = Beli_cash::findOrFail($id);
        $cash->delete();

        return redirect()->route('cash.index')->with('success', 'Cash entry deleted successfully.');
    }
}
