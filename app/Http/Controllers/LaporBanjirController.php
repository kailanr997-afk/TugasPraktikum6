<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporBanjirController extends Controller
{
    public function create()
    {
        return view('laporan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelapor' => 'required|string|max:255',
            'alamat_lokasi' => 'required|string',
            'keterangan' => 'required|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('laporan', 'public');
        }

        Laporan::create([
            'nama_pelapor' => $request->nama_pelapor,
            'alamat_lokasi' => $request->alamat_lokasi,
            'keterangan' => $request->keterangan,
            'foto' => $path,
        ]);

        return redirect()->route('laporan.create')->with('success', 'Laporan berhasil dikirim!');
    }

    public function index()
    {
        $laporans = Laporan::latest()->get();
        return view('laporan.index', compact('laporans'));
    }
}