<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beritas = Berita::latest()->get(); // atau paginate jika perlu
        return view('berita.index', compact('beritas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all(); // ambil semua kategori
        return view('berita.create', compact('kategori')); // fix: 'kategoris' diganti 'kategori'
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'kategori_id' => 'required|exists:kategoris,id',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $berita = new Berita();
        $berita->judul = $request->judul;
        $berita->konten = $request->konten;
        $berita->kategori_id = $request->kategori_id;
        $berita->user_id = auth()->id(); // wartawan yang login
        $berita->status = 'draft';

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('berita', 'public');
            $berita->gambar = $path;
        }

        $berita->save();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil disimpan sebagai draft');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $berita = Berita::findOrFail($id);
        $kategoris = Kategori::all();
        return view('berita.edit', compact('berita', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'kategori_id' => 'required|exists:kategoris,id',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $berita = Berita::findOrFail($id);
        $berita->judul = $request->judul;
        $berita->konten = $request->konten;
        $berita->kategori_id = $request->kategori_id;

        if ($request->hasFile('gambar')) {
            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $berita->gambar = $request->file('gambar')->store('berita', 'public');
        }

        $berita->save();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
