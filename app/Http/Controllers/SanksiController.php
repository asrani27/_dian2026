<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sanksi;

class SanksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sanksi = Sanksi::latest()->paginate(10);
        return view('admin.sanksi.index', compact('sanksi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sanksi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:50|unique:sanksi',
            'nama_sanksi' => 'required|string|max:255',
            'penanggung_jawab' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        Sanksi::create($request->all());

        return redirect()->route('admin.sanksi.index')
            ->with('success', 'Data sanksi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sanksi $sanksi)
    {
        return view('admin.sanksi.show', compact('sanksi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sanksi $sanksi)
    {
        return view('admin.sanksi.edit', compact('sanksi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sanksi $sanksi)
    {
        $request->validate([
            'kode' => 'required|string|max:50|unique:sanksi,kode,' . $sanksi->id,
            'nama_sanksi' => 'required|string|max:255',
            'penanggung_jawab' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $sanksi->update($request->all());

        return redirect()->route('admin.sanksi.index')
            ->with('success', 'Data sanksi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sanksi $sanksi)
    {
        $sanksi->delete();

        return redirect()->route('admin.sanksi.index')
            ->with('success', 'Data sanksi berhasil dihapus.');
    }
}
