@extends('layouts.main')

@section('title', $title)

@section('content')

    <style>
        .hero-section {
            background: linear-gradient(120deg, #ff4da6 0%, #e60073 100%);
            color: #fff;
            position: relative;
            overflow: hidden;
            padding: 80px 0 70px;
        }

        .hero-section::after {
            content: '';
            position: absolute;
            inset: 0;
            background: url('{{ asset('images/erlin.jpeg') }}') center/cover no-repeat;
            opacity: 0.12;
            pointer-events: none;
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero-illustration {
            position: relative;
            z-index: 1;
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 24px 60px rgba(0, 0, 0, 0.2);
        }

        .hero-illustration img {
            width: 100%;
            height: 340px;
            object-fit: cover;
        }

        .capsule-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.16);
            color: #fff;
            border-radius: 999px;
            padding: 8px 16px;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .feature-section {
            padding: 70px 0 50px;
            background: #fff5fa;
        }

        .fitlife-card {
            border: 1px solid #e3efe6;
            border-radius: 16px;
            background: #fff;
            padding: 22px;
            height: 100%;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.06);
            transition: all .2s ease;
        }

        .fitlife-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 36px rgba(0, 0, 0, 0.08);
        }

        .fitlife-icon {
            width: 48px;
            height: 48px;
            .fitlife-icon {
            background: #fff0f7;
            color: #e60072;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            margin-bottom: 14px;
        }

        .cta-section {
            background: linear-gradient(120deg, #ff4da6 0%, #e60073 100%);
            color: #fff;
            padding: 60px 0;
        }

        .pill-btn {
            border-radius: 999px;
            padding: 10px 20px;
            font-weight: 600;
        }

        .mini-card {
            border-radius: 14px;
            border: 1px solid #e5ece8;
            padding: 16px;
            background: #fff;
            box-shadow: 0 10px 26px rgba(0, 0, 0, 0.05);
            height: 100%;
        }
    </style>

    <section class="hero-section">
        <div class="container hero-content">
            <div class="row align-items-center g-4">
                <div class="col-lg-6">
                    <span class="capsule-badge mb-3">>Hi, I'm Erlinda 💗</span>
                    <h1 class="display-5 fw-bold mb-3">Welcome To<span style="color:#fE36A6A;">dwip.id</span></h1>
                    <p class="lead mb-4">Aku orangnya ceria dan suka banget warna pink 🌸
                        Website ini aku buat sebagai ruang kecil tentang aku dan hal-hal yang aku suka.
                        Yuk kenalan lebih dekat!.</p>
                    <div class="d-flex flex-wrap gap-3">
                        @auth
                            <a href="{{ route('kalkulator') }}" class="btn btn-light pill-btn fw-semibold">Mulai Sekarang</a>
                        @else
                            <a href="{{ route('auth.index') }}" class="btn btn-light pill-btn fw-semibold">Mulai Sekarang</a>
                        @endauth
                        <a href="#fitur" class="btn btn-outline-light pill-btn">Tantang Aku</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-illustration">
                        <img src="{{ asset('images/erlin.jpeg') }}" alt="Pilihan menu sehat">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="fitur" class="feature-section">
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="fw-bold">Fitur Unggulan FitLife.id</h2>
                <p class="text-muted">Dapatkan semua yang anda butuhkan untuk mencapai tujuan kesehatan anda</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="fitlife-card text-center h-100">
                        <div class="fitlife-icon mx-auto mb-2"><i class="bi bi-activity"></i></div>
                        <h5 class="fw-bold mb-2">Kalkulator BMI</h5>
                        <p class="text-muted small">Hitung indeks massa tubuh anda dan dapatkan rekomendasi berat badan
                            ideal.</p>
                        <a href="{{ route('kalkulator') }}" class="btn btn-fitlife mt-2 w-100">Lihat Detail</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="fitlife-card text-center h-100">
                        <div class="fitlife-icon mx-auto mb-2"><i class="bi bi-egg-fried"></i></div>
                        <h5 class="fw-bold mb-2">Menu Sehat</h5>
                        <p class="text-muted small">Temukan berbagai pilihan menu makanan sehat untuk diet anda.</p>
                        <a href="{{ route('menu') }}" class="btn btn-fitlife mt-2 w-100">Lihat Detail</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="fitlife-card text-center h-100">
                        <div class="fitlife-icon mx-auto mb-2"><i class="bi bi-journal-text"></i></div>
                        <h5 class="fw-bold mb-2">Artikel</h5>
                        <p class="text-muted small">Baca artikel dan tips seputar diet serta pola hidup sehat.</p>
                        <a href="{{ route('artikel.index') }}" class="btn btn-fitlife mt-2 w-100">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-7">
                    <div class="fitlife-card h-100">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="fw-bold mb-0">Menu Sehat Terbaru</h5>
                            <a href="{{ route('menu') }}" class="text-success">Lihat semua</a>
                        </div>
                        <div class="row g-3">
                            @forelse($featuredMenus as $menu)
                                <div class="col-md-6">
                                    <div class="mini-card h-100">
                                        <div class="d-flex align-items-center">
                                            <div class="me-3">
                                                <img src="{{ $menu->gambar ? Storage::url($menu->gambar) : 'https://via.placeholder.com/90x70' }}"
                                                    class="rounded" width="90" height="70"
                                                    alt="{{ $menu->nama_menu }}">
                                            </div>
                                            <div>
                                                <h6 class="fw-bold mb-1">{{ $menu->nama_menu }}</h6>
                                                <p class="small text-muted mb-2">{!! Str::limit($menu->deskripsi, 80) !!}</p>
                                                <div class="d-flex flex-wrap gap-3 text-muted small mb-2">
                                                    <span class="d-flex align-items-center gap-1">
                                                        <i class="bi bi-fire text-danger"></i>
                                                        {{ !is_null($menu->kalori ?? null) ? $menu->kalori . ' kkal' : 'Kalori belum ada' }}
                                                    </span>
                                                    <span class="d-flex align-items-center gap-1">
                                                        <i class="bi bi-clock-history text-success"></i>
                                                        {{ !is_null($menu->waktu_memasak ?? null) ? $menu->waktu_memasak . ' menit' : 'Waktu belum ada' }}
                                                    </span>
                                                </div>
                                                <a href="{{ route('menu.show', $menu->id) }}"
                                                    class="text-success fw-semibold small">Lihat menu</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <p class="text-muted mb-0">Belum ada menu yang tersedia.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="fitlife-card h-100">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="fw-bold mb-0">Artikel Terbaru</h5>
                            <a href="{{ route('artikel.index') }}" class="text-success">Lihat semua</a>
                        </div>
                        <div class="row g-3">
                            @forelse($latestArticles as $artikel)
                                <div class="col-sm-6">
                                    <div class="mini-card h-100">
                                        <div class="ratio ratio-4x3 mb-2">
                                            <img src="{{ $artikel->gambar ? Storage::url($artikel->gambar) : 'https://via.placeholder.com/200x150' }}"
                                                class="rounded w-100 h-100 object-fit-cover" alt="{{ $artikel->judul }}">
                                        </div>
                                        <div class="small text-success fw-semibold mb-1">
                                            {{ $artikel->kategori ?? 'Artikel' }}</div>
                                        <h6 class="fw-bold mb-1">{{ $artikel->judul }}</h6>
                                        <p class="small text-muted mb-2">{!! Str::limit(strip_tags($artikel->isi), 90) !!}</p>
                                        <a href="{{ route('artikel.show', $artikel->slug) }}"
                                            class="text-success small fw-semibold">Baca selengkapnya</a>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <p class="text-muted mb-0">Belum ada artikel.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-section text-center">
        <div class="container">
            <h2 class="fw-bold mb-2">Siap Memulai Perjalanan Sehat Anda?</h2>
            <p class="mb-4">Bergabunglah dengan ribuan pengguna yang telah merasakan manfaat hidup lebih sehat.</p>
            <a href="{{ route('kalkulator') }}" class="btn btn-light pill-btn">Hitung BMI Sekarang</a>
        </div>
    </section>

@endsection
