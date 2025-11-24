<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    /**
     * ADMIN — Lihat semua inventaris (CRUD)
     */
    public function index()
    {
        $data = Inventaris::all();
        return view('inventaris.index', compact('data'));
    }

    /**
     * WARGA — Hanya lihat inventaris (READ ONLY)
     */
    public function publicIndex()
    {
        $data = Inventaris::all();
        return view('inventaris.public', compact('data'));
    }

    /**
     * ADMIN — Form tambah data
     */
    public function create()
    {
        return view('inventaris.create');
    }

    /**
     * ADMIN — Simpan data inventaris
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'jumlah' => 'required|integer',
            'kondisi' => 'required',
            'lokasi' => 'required',
        ]);

        Inventaris::create($request->all());

        return redirect()
            ->route('inventaris.index')
            ->with('success', 'Data inventaris berhasil ditambahkan!');
    }

    /**
     * ADMIN — Edit data inventaris
     */
    public function edit($id)
    {
        $item = Inventaris::findOrFail($id);
        return view('inventaris.edit', compact('item'));
    }

    /**
     * ADMIN — Update data inventaris
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required',
            'jumlah' => 'required|integer',
            'kondisi' => 'required',
            'lokasi' => 'required',
        ]);

        Inventaris::findOrFail($id)->update($request->all());

        return redirect()
            ->route('inventaris.index')
            ->with('success', 'Data inventaris berhasil diperbarui!');
    }

    /**
     * ADMIN — Hapus data inventaris
     */
    public function destroy($id)
    {
        Inventaris::findOrFail($id)->delete();

        return redirect()
            ->route('inventaris.index')
            ->with('success', 'Data inventaris berhasil dihapus!');
    }
}