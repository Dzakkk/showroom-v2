<?php

namespace App\Http\Controllers;

use App\Models\Bayar_cicilan;
use Illuminate\Http\Request;
use App\Models\Beli_kredit;
use App\Models\Kredit_paket;
use App\Models\Motor;
use App\Models\Pembeli;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Str;

class CreditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kredit = Beli_kredit::with('motor', 'paket', 'pembeli')->paginate(10);
        return view('pages.kredit.index', compact('kredit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $motor = Motor::all();
        $pembeli = Pembeli::all();
        $paket = Kredit_paket::all();
        return view('pages.kredit.create', compact('paket', 'motor', 'pembeli'));
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
            'paket_kode' => 'required',
            'kredit_tanggal' => 'required|date',
            'photo_ktp' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'photo_kk' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'photo_slip_gaji' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo_ktp')) {
            $imageKTP = $request->file('photo_ktp')->store('uploads/ktp', 'public');
            $image = Image::read(public_path("storage/{$imageKTP}"))->resize(800, 400);
            $image->save();
            $data['photo_ktp'] = $imageKTP;
        }

        if ($request->hasFile('photo_kk')) {
            $imageKK = $request->file('photo_kk')->store('uploads/kk', 'public');
            $image = Image::read(public_path("storage/{$imageKK}"))->resize(800, 400);
            $image->save();
            $data['photo_kk'] = $imageKK;
        }

        if ($request->hasFile('photo_slip_gaji')) {
            $imageSLIP = $request->file('photo_slip_gaji')->store('uploads/slip', 'public');
            $image = Image::read(public_path("storage/{$imageSLIP}"))->resize(800, 400);
            $image->save();
            $data['photo_slip_gaji'] = $imageSLIP;
        }


        $price = Motor::where('motor_kode', $request->motor_kode)->first()->motor_harga;

        $paket = Kredit_paket::where('paket_kode', $request->paket_kode)->first();
        // dd($paket, $price, $data);
        $uang_muka = $price * ($paket->paket_uang_muka / 100);
        $jumlah_cicilan = $paket->paket_jumlah_cicilan;
        $bunga = $price * ($paket->paket_bunga / 100);
        $nilai_cicilan = ($price - $uang_muka + $bunga) / $jumlah_cicilan;

        $cicilan = new Bayar_cicilan([
            'cicilan_kode' => 'CIC-' . strtoupper(Str::random(8)),
            'kredit_kode' => $request->kredit_kode,
            'cicilan_jumlah' => $nilai_cicilan,
            'cicilan_tanggal' => now(),
            'cicilan_ke' => 1,
            'cicilan_sisa_ke' => $jumlah_cicilan - 1,
            'cicilan_sisa_harga' => $price - $uang_muka + $bunga - $nilai_cicilan,
        ]);

        Beli_kredit::create($data);

        $cicilan->save();


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
            'pembeli_ktp' => 'required',
            'motor_kode' => 'required',
            'paket_kode' => 'required',
            'kredit_tanggal' => 'required|date',
            'photo_ktp' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'photo_kk' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'photo_slip_gaji' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $kredit = Beli_kredit::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('photo_ktp')) {
            $imageKTP = $request->file('photo_ktp')->store('uploads/ktp', 'public');
            $image = Image::make(public_path("storage/{$imageKTP}"))->resize(800, 400);
            $image->save();
            $data['photo_ktp'] = $imageKTP;
        }

        if ($request->hasFile('photo_kk')) {
            $imageKK = $request->file('photo_kk')->store('uploads/kk', 'public');
            $image = Image::make(public_path("storage/{$imageKK}"))->resize(800, 400);
            $image->save();
            $data['photo_kk'] = $imageKK;
        }

        if ($request->hasFile('photo_slip_gaji')) {
            $imageSLIP = $request->file('photo_slip_gaji')->store('uploads/slip', 'public');
            $image = Image::make(public_path("storage/{$imageSLIP}"))->resize(800, 400);
            $image->save();
            $data['photo_slip_gaji'] = $imageSLIP;
        }

        $kredit->update($data);

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
