<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        if ($search) {
            $mahasiswa = Mahasiswa::where('nim', 'like', '%' . $search . '%')
                                  ->orWhere('nama', 'like', '%' . $search . '%')
                                  ->orWhere('program_studi', 'like', '%' . $search . '%')
                                  ->orWhere('telp', 'like', '%' . $search . '%')
                                  ->orWhere('alamat', 'like', '%' . $search . '%')
                                  ->orderBy('nama', 'asc')
                                  ->paginate(10);
        } else {
            $mahasiswa = Mahasiswa::orderBy('nama', 'asc')->paginate(10);
        }
        
        return view('admin.mahasiswa.index', compact('mahasiswa', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|string|max:20|unique:mahasiswa,nim',
            'nama' => 'required|string|max:255',
            'jkel' => 'required|in:L,P',
            'program_studi' => 'required|string|max:255',
            'telp' => 'required|string|max:15',
            'alamat' => 'required|string',
        ]);

        Mahasiswa::create($request->all());

        return redirect()->route('admin.mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('admin.mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('admin.mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $request->validate([
            'nim' => 'required|string|max:20|unique:mahasiswa,nim,' . $mahasiswa->id,
            'nama' => 'required|string|max:255',
            'jkel' => 'required|in:L,P',
            'program_studi' => 'required|string|max:255',
            'telp' => 'required|string|max:15',
            'alamat' => 'required|string',
        ]);

        $mahasiswa->update($request->all());

        return redirect()->route('admin.mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return redirect()->route('admin.mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}
