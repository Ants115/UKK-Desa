<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuratController extends Controller
{
    // Warga: lihat & ajukan surat
    public function index()
    {
        $surat = Surat::where('user_id', Auth::id())->get();
        return view('surat.warga', compact('surat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_surat' => 'required',
            'keterangan' => 'nullable'
        ]);

        Surat::create([
            'user_id' => Auth::id(),
            'jenis_surat' => $request->jenis_surat,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->back()->with('success', 'Pengajuan surat berhasil dikirim!');
    }

    // Admin: lihat semua pengajuan
    public function adminIndex()
    {
        $surat = Surat::with('user')->get();
        return view('surat.admin', compact('surat'));
    }

    public function setujui($id)
    {
        Surat::where('id', $id)->update(['status' => 'disetujui']);
        return back()->with('success', 'Surat disetujui!');
    }

    public function tolak($id)
    {
        Surat::where('id', $id)->update(['status' => 'ditolak']);
        return back()->with('success', 'Surat ditolak!');
    }
}