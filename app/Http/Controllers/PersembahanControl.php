<?php

namespace App\Http\Controllers;

use App\Models\JenisPersembahan;
use App\Models\Persembahan;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class PersembahanControl extends Controller
{
    //
    public function Persembahan()
    {
        $jenisPersembahan = JenisPersembahan::all(); // ambil semua data jenis persembahan
        return view('contents.persembahan', compact('jenisPersembahan'));
    }


    public function Persembahans()
    {
        $persembahan = Persembahan::with('jenis')->get();;
        return view('admin.contents.persembahan', compact('persembahan'));
    }
    public function store(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'namalengkap' => 'required|string|max:255',
                'namabaptis' => 'nullable|string|max:255',
                'jenis_persembahan_id' => 'required|exists:jenispersembahan,id',
                'nominal' => 'required|string',
                'avatar' => 'nullable|image',
            ]);

            // Bersihkan nominal (contoh: dari "Rp100.000" jadi "100000")
            $nominal = preg_replace('/[^0-9]/', '', $request->nominal);

            // Proses upload bukti bayar
            $buktiBayarPath = null;
            if ($request->hasFile('avatar')) {
                try {
                    $file = $request->file('avatar');
                    $timestamp = now()->format('Y-m-d_His'); // contoh: 2025-07-01_143015
                    $extension = $file->getClientOriginalExtension(); // ambil extension asli
                    $filename = 'bukti_bayar_' . $timestamp . '.' . $extension;

                    // Simpan ke storage/app/public/bukti_bayar/
                    $buktiBayarPath = $file->storeAs('bukti_bayar', $filename, 'public');
                } catch (\Exception $e) {
                    return redirect()->back()->with('error', 'Gagal mengupload bukti bayar: ' . $e->getMessage());
                }
            }

            // Simpan ke database
            Persembahan::create([
                'namalengkap' => $request->namalengkap,
                'namabaptis' => $request->namabaptis,
                'nominal' => $nominal,
                'jenis_persembahan_id' => $request->jenis_persembahan_id,
                'bukti_bayar' => $buktiBayarPath,
                'status' => 'pending',
            ]);

            return redirect()->back()->with('success', 'Data persembahan berhasil disimpan.');
        } catch (\Exception $e) {
            // Log error agar bisa dicek di storage/logs/laravel.log
            Log::error('Gagal menyimpan persembahan', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
    }

    public function updateStatus(Request $request, $id)
    {
        try {
            $request->validate([
                'status' => 'required|in:pending,diterima,ditolak',
            ]);
            $persembahan = Persembahan::findOrFail($id);
            $persembahan->update([
                'status' => $request->status,
            ]);

            return redirect()->back()->with('success', 'Data berhasil diSetujui!');
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Server Error',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    public function destroy($id)
    {
        try {
            $persembahan = Persembahan::findOrFail($id);
            $persembahan->update([
                'status' => 'tolak'
            ]);

            return redirect()->back()->with('success', 'Data  Berhasil diTolak!');
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Server Error',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
