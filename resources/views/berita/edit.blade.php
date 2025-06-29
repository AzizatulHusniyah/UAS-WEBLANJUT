@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Berita</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> Ada kesalahan pada input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Berita</label>
            <input type="text" name="judul" class="form-control" value="{{ old('judul', $berita->judul) }}" required>
        </div>

        <div class="mb-3">
            <label for="konten" class="form-label">Isi Berita</label>
            <textarea name="konten" class="form-control" rows="5" required>{{ old('konten', $berita->konten) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="kategori_id" class="form-label">Kategori</label>
            <select name="kategori_id" class="form-select" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ $kategori->id == $berita->kategori_id ? 'selected' : '' }}>
                        {{ $kategori->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Ganti Gambar (opsional)</label>
            <input type="file" name="gambar" class="form-control">
            @if ($berita->gambar)
                <div class="mt-2">
                    <p>Gambar saat ini:</p>
                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Berita" style="max-height: 150px;">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('berita.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
