@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Tambah Berita</h2>

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

    <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Berita</label>
            <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" required>
        </div>

        <div class="mb-3">
            <label for="konten" class="form-label">Isi Berita</label>
            <textarea name="konten" class="form-control" rows="5" required>{{ old('konten') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="kategori_id" class="form-label">Kategori</label>
            <select name="kategori_id" class="form-select" required>
    <option value="">-- Pilih Kategori --</option>
    <option value="1">Teknologi</option>
    <option value="2">Olahraga</option>
    <option value="3">Ekonomi</option>
    <option value="4">Pendidikan</option>
    <option value="5">Hiburan</option>
</select>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar (opsional)</label>
            <input type="file" name="gambar" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Draft</button>
        <a href="{{ route('berita.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
