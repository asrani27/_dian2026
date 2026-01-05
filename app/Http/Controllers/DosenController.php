<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        if ($search) {
            $dosen = Dosen::where('nik', 'like', '%' . $search . '%')
                          ->orWhere('nama', 'like', '%' . $search . '%')
                          ->orWhere('jabatan', 'like', '%' . $search . '%')
                          ->orWhere('mata_kuliah', 'like', '%' . $search . '%')
                          ->orWhere('semester', 'like', '%' . $search . '%')
                          ->latest()
                          ->paginate(10);
        } else {
            $dosen = Dosen::latest()->paginate(10);
        }
        
        return view('admin.dosen.index', compact('dosen', 'search'));
    }

    public function create()
    {
        return view('admin.dosen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|unique:dosen,nik',
            'nama' => 'required|string|max:255',
            'jkel' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'mata_kuliah' => 'required|string|max:255',
            'semester' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        Dosen::create($request->all());

        return redirect()->route('admin.dosen.index')
            ->with('success', 'Data dosen berhasil ditambahkan.');
    }

    public function show(Dosen $dosen)
    {
        return view('admin.dosen.show', compact('dosen'));
    }

    public function edit(Dosen $dosen)
    {
        return view('admin.dosen.edit', compact('dosen'));
    }

    public function update(Request $request, Dosen $dosen)
    {
        $request->validate([
            'nik' => 'required|string|unique:dosen,nik,' . $dosen->id,
            'nama' => 'required|string|max:255',
            'jkel' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'mata_kuliah' => 'required|string|max:255',
            'semester' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $dosen->update($request->all());

        return redirect()->route('admin.dosen.index')
            ->with('success', 'Data dosen berhasil diperbarui.');
    }

    public function destroy(Dosen $dosen)
    {
        $dosen->delete();

        return redirect()->route('admin.dosen.index')
            ->with('success', 'Data dosen berhasil dihapus.');
    }
}
