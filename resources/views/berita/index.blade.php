@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Berita</h2>
        <a href="{{ route('berita.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Berita
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Penulis</th>
                <th>Status</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($beritas as $index => $berita)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $berita->judul }}</td>
                <td>{{ $berita->kategori->nama ?? '-' }}</td>
                <td>{{ $berita->user->name ?? '-' }}</td>
                <td><span class="badge bg-secondary">{{ $berita->status }}</span></td>
                <td>
                    @if($berita->gambar)
                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="gambar" width="80">
                    @else
                        Tidak ada
                    @endif
                </td>
                <td>
                    <a href="{{ route('berita.edit', $berita->id) }}" class="btn btn-sm btn-warning">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('berita.destroy', $berita->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">
                            <i class="fas fa-trash-alt"></i> Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Belum ada berita.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
