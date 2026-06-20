<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        return response()->json([
            'success' => true,
            'message' => 'Data barang berhasil diambil',
            'data' => $barang
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_barang' => 'required|string|max:100|unique:data_barang,kode_barang',
            'nama_barang' => 'required|string|max:255',
            'harga_beli' => 'required|integer',
            'harga_jual' => 'required|integer',
        ]);

        $barang = Barang::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data barang berhasil ditambahkan',
            'data' => $barang
        ], 201);
    }

    public function show(string $id)
    {
        $barang = Barang::findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Data barang berhasil diambil',
            'data' => $barang
        ]);
    }

    public function update(Request $request, string $id)
    {
        $barang = Barang::findOrFail($id);

        $validated = $request->validate([
            'kode_barang' => 'required|string|max:100|unique:data_barang,kode_barang,' . $id,
            'nama_barang' => 'required|string|max:255',
            'harga_beli' => 'required|integer',
            'harga_jual' => 'required|integer',
        ]);

        $barang->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data barang berhasil diperbarui',
            'data' => $barang
        ]);
    }

    public function destroy(string $id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data barang berhasil dihapus',
            'data' => null
        ]);
    }
}
