<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Validator;

class MemberControl extends Controller
{
    //
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'namalengkap'   => 'required|string|max:255',
                'namabaptis'    => 'nullable|string|max:255',
                'jekel'         => 'required|in:L,P',
                'tempatlahir'   => 'required|string|max:255',
                'tgllahir'      => 'required|date',
                'notelp'        => 'required|string|max:20',
                'email'         => 'required|email|unique:member,email',
                'alamat'        => 'nullable|string|max:255',
            ]);

            // Simpan ke database
            Member::create($validated);

            return response()->json(['message' => 'Member berhasil disimpan!'], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Server Error',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function ambilData($id)
    {
        $member = Member::find($id);

        if (!$member) {
            return response()->json([
                'message' => 'Member tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'message' => 'Data member ditemukan',
            'data' => $member,
        ]);
    }
    public function members()
    {
        $members = Member::all();
        return view('admin.contents.member', compact('members'));
    }
    public function update(Request $request, $id)
    {
        try {
            $member = Member::findOrFail($id);

            $validated = $request->validate([
                'namalengkap'   => 'required|string|max:255',
                'namabaptis'    => 'required|string|max:255',
                'jekel'         => 'required|in:L,P',
                'tempatlahir'   => 'required|string|max:255',
                'tgllahir'      => 'required|date',
                'notelp'        => 'required|string|max:20',
                // unique tapi kecuali email milik member yang sedang diupdate
                'email'         => 'required|email|unique:member,email,' . $id,
                'alamat'        => 'nullable|string|max:255',
            ]);

            $member->update($validated);

            return redirect()->back()->with('success', 'Data anggota berhasil diperbarui!');
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
            $member = Member::findOrFail($id);
            $member->delete();

            return redirect()->back()->with('success', 'Data Member Berhasil diHapus!');
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Server Error',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
