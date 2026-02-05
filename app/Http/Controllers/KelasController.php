<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    /**
     * Menampilkan data kelas
     */
    public function index()
    {
        $data = Kelas::all();
        return view('kelas.index', compact('data'));
    }

  
    public function create()
    {
        return view('kelas.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'jurusan'    => 'required',
        ]);

        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'jurusan'    => $request->jurusan,
        ]);

        return redirect()->route('kelas.index')
            ->with('success', 'Kelas berhasil ditambahkan');
    }

    /**
     * Menampilkan form edit kelas
     */
    public function edit(string $id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('kelas.edit', compact('kelas'));
    }

    /**
     * Mengupdate data kelas
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'jurusan'    => 'required',
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->update([
            'nama_kelas' => $request->nama_kelas,
            'jurusan'    => $request->jurusan,
        ]);

        return redirect()->route('kelas.index')
            ->with('success', 'Kelas berhasil diperbarui');
    }

    /**
     * Menghapus data kelas
     */
    public function destroy(string $id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return redirect()->route('kelas.index')
            ->with('success', 'Kelas berhasil dihapus');
    }
}