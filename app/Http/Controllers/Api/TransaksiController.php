<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransaksiModel;

class TransaksiController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'barang_id' => 'required|exists:m_barang,barang_id',
                'jumlah' => 'required|integer|min:1',
            ]);

            $transaksi = TransaksiModel::create($validated);

            return response()->json([
                'status' => true,
                'message' => 'Transaksi berhasil disimpan.',
                'data' => $transaksi
            ], 201); // Status 201 Created
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan server.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function index()
    {
        // tampilkan transaksi beserta data barang dan gambar
        $transaksi = TransaksiModel::with('barang')->get();

        return response()->json($transaksi);
    }
}