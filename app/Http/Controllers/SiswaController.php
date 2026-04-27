<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;

class SiswaController extends Controller
{
    public function index()
    {
        $data = Siswa::with('kelas')->get();
        return view('siswa.index', compact('data'));
    }

    // 🔐 CEK ADMIN
    private function checkAdmin()
    {
        if (!auth()->user()->role || auth()->user()->role->role_name !== 'Admin') {
            abort(403, 'Akses ditolak');
        }
    }

    public function create()
    {
        $this->checkAdmin(); // 🔥 proteksi

        $kelas = Kelas::all();
        return view('siswa.create', compact('kelas'));
    }
    
    public function store(Request $request)
    {
        $this->checkAdmin(); // 🔥 proteksi

        $request->validate([
            'nis'           => 'required',
            'nama'          => 'required',
            'kelas_id'      => 'required',
            'jenis_kelamin' => 'required',
            'alamat'        => 'required',
            'no_telp'       => 'required',
        ]);

        Siswa::create([
            'nis'           => $request->nis,
            'nama'          => $request->nama,
            'kelas_id'      => $request->kelas_id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat'        => $request->alamat,
            'no_telp'       => $request->no_telp,
        ]);

        return redirect()->route('siswa.index')
            ->with('success', 'Siswa berhasil ditambahkan');
    }

    public function edit($id)
    {
        $this->checkAdmin(); // 🔥 proteksi

        $siswa = Siswa::findOrFail($id);
        $kelas = Kelas::all();
        return view('siswa.edit', compact('siswa', 'kelas'));
    }

    public function update(Request $request, $id)
    {
        $this->checkAdmin(); // 🔥 proteksi

        $request->validate([
            'nis'           => 'required',
            'nama'          => 'required',
            'kelas_id'      => 'required',
            'jenis_kelamin' => 'required',
            'alamat'        => 'required',
            'no_telp'       => 'required',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->all());

        return redirect()->route('siswa.index')
            ->with('success', 'Siswa berhasil diperbarui');
    }

    public function destroy($id)
    {
        $this->checkAdmin(); // 🔥 proteksi

        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('siswa.index')
            ->with('success', 'Siswa berhasil dihapus');
    }
}