<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Laravel\Facades\Image;

class MotorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Motor::query();

        // Search
        if ($request->filled('search')) {
            $query->where('motor_merk', 'like', "%{$request->search}%");
        }

        // Pagination
        $motors = $query->paginate(10);
        // dd($motors);
        return view('pages.motor.index', compact('motors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.motor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'motor_kode' => 'required',
            'motor_merk' => 'required',
            'motor_tipe' => 'required',
            'motor_warna' => 'required',
            'motor_tahun' => 'required',
            'motor_harga' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads/motors', 'public');
            $image = Image::read(public_path("storage/{$imagePath}"))->resize(800, 400);
            $image->save();
        }

        Motor::create([
            'motor_kode' => $validate['motor_kode'],
            'motor_merk' => $validate['motor_merk'],
            'motor_tipe' => $validate['motor_tipe'],
            'motor_warna' => $validate['motor_warna'],
            'motor_tahun' => $validate['motor_tahun'],
            'motor_harga' => $validate['motor_harga'],
            'motor_gambar' => $imagePath,
        ]);

        return redirect()->route('motor.index')->with('success', 'Motor berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $motor = Motor::findOrFail($id);
        return view('pages.motor.show', compact('motor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $motor = Motor::findOrFail($id);
        return view('pages.motor.edit', compact('motor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Motor $motor)
    {
        $validate = $request->validate([
            'motor_kode' => 'required',
            'motor_merk' => 'required',
            'motor_tipe' => 'required',
            'motor_warna' => 'required',
            'motor_tahun' => 'required',
            'motor_harga' => 'required',
            'motor_gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('motor_gambar')) {
            if ($motor->motor_gambar) {
                \Storage::delete("public/{$motor->motor_gambar}");
            }
            $imagePath = $request->file('motor_gambar')->store('uploads/motors', 'public');
            $image = Image::read(public_path("storage/{$imagePath}"))->resize(800, 400);
            $image->save();
            $validate['motor_gambar'] = $imagePath;
        }

        $motor->update($validate);

        return redirect()->route('motor.index')->with('success', 'Motor berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $motor = Motor::findOrFail($id);
        if ($motor->motor_gambar) {
            \Storage::delete("public/{$motor->motor_gambar}");
        }

        $motor->delete();

        return redirect()->route('motor.index')->with('success', 'Motor berhasil dihapus');
    }
}
