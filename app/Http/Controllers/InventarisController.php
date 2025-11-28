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
        $data = Inventaris::orderBy('nama_barang')->get();

        return view('inventaris.index', compact('data'));
    }

    /**
     * WARGA — Hanya lihat inventaris (READ ONLY)
     */
    public function publicIndex()
    {
        $data = Inventaris::orderBy('nama_barang')->get();

        return view('inventaris.public', compact('data'));
    }

    /**
     * ADMIN — Halaman detail satu inventaris
     */
    public function show($id)
    {
        $item = Inventaris::findOrFail($id);

        return view('inventaris.show', compact('item'));
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
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kode_barang' => 'nullable|string|max:100|unique:inventaris,kode_barang',
            'jumlah'      => 'required|integer|min:0',
            'kondisi'     => 'required|in:Baik,Rusak Ringan,Rusak Berat',
            'lokasi'      => 'required|string|max:255',
            'keterangan'  => 'nullable|string',
        ]);

        Inventaris::create($validated);

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
        $item = Inventaris::findOrFail($id);

        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kode_barang' => 'nullable|string|max:100|unique:inventaris,kode_barang,' . $item->id,
            'jumlah'      => 'required|integer|min:0',
            'kondisi'     => 'required|in:Baik,Rusak Ringan,Rusak Berat',
            'lokasi'      => 'required|string|max:255',
            'keterangan'  => 'nullable|string',
        ]);

        $item->update($validated);

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
