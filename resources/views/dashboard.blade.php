@extends('layouts.app')

@section('content')

    <!-- Dashboard Cards -->
    <div class="row">
        <!-- Manajemen Pengguna -->
        <div class="col-md-4 mb-4">
            <div class="card text-white bg-info shadow h-100">
                <div class="card-body d-flex align-items-center">
                    <i class="fas fa-users fa-2x me-3"></i>
                    <div>
                        <h5 class="card-title mb-1">Manajemen Pengguna</h5>
                        <p class="card-text">Kelola user dan hak akses</p>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-top-0 text-end">
                    <a href="{{ url('/user-management') }}" class="text-white">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Konten Berita -->
        <div class="col-md-4 mb-4">
            <div class="card text-white bg-success shadow h-100">
                <div class="card-body d-flex align-items-center">
                    <i class="fas fa-newspaper fa-2x me-3"></i>
                    <div>
                        <h5 class="card-title mb-1">Manajemen Berita</h5>
                        <p class="card-text">Kelola berita</p>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-top-0 text-end">
                    <a href="{{ route('berita.index') }}" class="text-white">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

        <!-- Laporan Statistik -->
        <div class="col-md-4 mb-4">
            <div class="card text-white bg-warning shadow h-100">
                <div class="card-body d-flex align-items-center">
                    <i class="fas fa-chart-bar fa-2x me-3"></i>
                    <div>
                        <h5 class="card-title mb-1">Laporan Statistik</h5>
                        <p class="card-text">Lihat analisis data</p>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-top-0 text-end">
                    <a href="#" class="text-white text-decoration-none">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>

    {{-- Berita Terbaru --}}
    <div class="mt-5">
        <h4>Berita Terbaru</h4>
        <div class="row">
            @foreach ($beritas as $berita)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        {{-- Gambar --}}
                        <img src="{{ asset('storage/' . $berita->gambar) }}" class="card-img-top" alt="{{ $berita->judul }}" style="height: 200px; object-fit: cover;">

                        {{-- Konten --}}
                        <div class="card-body">
                            <h5 class="card-title">{{ $berita->judul }}</h5>
                            <p class="card-text">{{ Str::limit($berita->isi, 100) }}</p>
                            <a href="{{ route('berita.show', $berita->id) }}" class="btn btn-primary">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
