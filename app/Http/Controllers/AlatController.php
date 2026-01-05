<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use Illuminate\Http\Request;

class AlatController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $alat = Alat::where('kode', 'like', '%' . $search . '%')
                ->orWhere('nama', 'like', '%' . $search . '%')
                ->orWhere('jenis', 'like', '%' . $search . '%')
                ->orWhere('merk', 'like', '%' . $search . '%')
                ->orWhere('bahan', 'like', '%' . $search . '%')
                ->latest()
                ->paginate(10);
        } else {
            $alat = Alat::latest()->paginate(10);
        }

        return view('admin.alat.index', compact('alat', 'search'));
    }

    public function create()
    {
        return view('admin.alat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|unique:alat,kode',
            'nama' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'bahan' => 'required|string|max:255',
            'merk' => 'required|string|max:255',
            'harga' => 'required|integer|min:0',
            'jumlah' => 'required|integer|min:0',
            'tanggal_beli' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        Alat::create($request->all());

        return redirect()->route('admin.alat.index')
            ->with('success', 'Data alat berhasil ditambahkan.');
    }

    public function show(Alat $alat)
    {
        return view('admin.alat.show', compact('alat'));
    }

    public function edit(Alat $alat)
    {
        return view('admin.alat.edit', compact('alat'));
    }

    public function update(Request $request, Alat $alat)
    {
        $request->validate([
            'kode' => 'required|string|unique:alat,kode,' . $alat->id,
            'nama' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'bahan' => 'required|string|max:255',
            'merk' => 'required|string|max:255',
            'harga' => 'required|integer|min:0',
            'jumlah' => 'required|integer|min:0',
            'tanggal_beli' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        $alat->update($request->all());

        return redirect()->route('admin.alat.index')
            ->with('success', 'Data alat berhasil diperbarui.');
    }

    public function destroy(Alat $alat)
    {
        $alat->delete();

        return redirect()->route('admin.alat.index')
            ->with('success', 'Data alat berhasil dihapus.');
    }
}
