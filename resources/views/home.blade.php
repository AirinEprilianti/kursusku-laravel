@extends('layouts.app')

@section('title', 'Beranda - KursusKu')

@section('content')

<style>
    /* ==================================
       KURSUSKU - PURPLE THEME
    ================================== */

    :root {
        --primary: #7c3aed;
        --primary-dark: #5b21b6;
        --primary-light: #ede9fe;
        --background: #f8f7fc;
        --text: #2e2147;
        --muted: #746b85;
        --border: #e8e1f3;
    }

    body {
        background: var(--background);
        color: var(--text);
        font-family: Arial, sans-serif;
    }

    /* CONTAINER */

    .hero-section .container,
    .course-section .container {
        width: min(1120px, 90%);
        max-width: 1120px;
        margin: 0 auto;
    }

    /* HERO */

    .hero-section {
        padding: 55px 0 !important;
        background: linear-gradient(
            110deg,
            #f3e8ff 0%,
            #faf7ff 60%,
            #ffffff 100%
        );
    }

    .hero-section .row {
        align-items: center;
    }

    .hero-badge {
        display: inline-block;
        padding: 8px 14px;
        color: var(--primary-dark);
        background: var(--primary-light);
        border: 1px solid #e4d7ff;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 700;
    }

    .hero-section h1 {
        margin-top: 12px;
        color: #291452;
        font-size: clamp(30px, 3.5vw, 42px);
        font-weight: 800;
        line-height: 1.25;
    }

    .hero-section p {
        color: var(--muted) !important;
        font-size: 14px;
        line-height: 1.9;
    }

    /* TOMBOL UNGU */

    .hero-section .btn-primary {
        padding: 12px 20px;
        color: #ffffff !important;
        background: linear-gradient(
            120deg,
            #7c3aed,
            #8b5cf6
        ) !important;
        border: none !important;
        border-radius: 9px;
        font-size: 13px;
        font-weight: 700;
        box-shadow: 0 7px 18px rgba(124, 58, 237, 0.2);
        transition: 0.25s;
    }

    .hero-section .btn-primary:hover {
        background: var(--primary-dark) !important;
        transform: translateY(-2px);
    }

    /* GAMBAR HERO */

    .hero-image-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .hero-image {
        display: block;
        width: 100%;
        max-width: 330px;
        height: 245px;
        padding: 12px;
        margin: auto;
        object-fit: contain;
        background: #ffffff;
        border: 1px solid var(--border);
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(124, 58, 237, 0.13);
    }

    /* DAFTAR KURSUS */

    .course-section {
        padding: 45px 0 !important;
        background: var(--background);
    }

    .course-section h2 {
        margin-bottom: 25px !important;
        color: #291452;
        font-size: 27px;
        font-weight: 800;
    }

    /* KARTU KURSUS */

    .course-card {
        height: 100%;
        background: #ffffff;
        border: 1px solid var(--border) !important;
        border-radius: 15px !important;
        box-shadow: 0 8px 25px rgba(91, 33, 182, 0.05);
        transition: 0.25s;
    }

    .course-card:hover {
        border-color: #c4b5fd !important;
        box-shadow: 0 14px 30px rgba(91, 33, 182, 0.12);
        transform: translateY(-4px);
    }

    .course-card .card-body {
        padding: 22px;
    }

    .course-code {
        display: inline-block;
        padding: 6px 10px;
        color: var(--primary-dark);
        background: var(--primary-light);
        border-radius: 6px;
        font-size: 11px;
        font-weight: 800;
    }

    .course-card h3 {
        color: #291452;
        font-weight: 800;
    }

    .course-card p {
        color: var(--muted) !important;
        font-size: 13px;
        line-height: 1.8;
    }

    /* NAVBAR JIKA MENGGUNAKAN BOOTSTRAP */

    .navbar {
        background: #ffffff !important;
        border-bottom: 1px solid var(--border);
    }

    .navbar .navbar-brand {
        color: var(--primary) !important;
        font-weight: 800;
    }

    .navbar .nav-link {
        color: var(--text) !important;
        font-weight: 600;
    }

    .navbar .nav-link:hover {
        color: var(--primary) !important;
    }

    /* RESPONSIVE */

    @media (max-width: 767px) {
        .hero-section {
            padding: 35px 0 !important;
        }

        .hero-section h1 {
            font-size: 30px;
        }

        .hero-image {
            max-width: 100%;
            height: 230px;
        }

        .course-section h2 {
            font-size: 23px;
        }
    }
</style>

{{-- BAGIAN UTAMA --}}
<section class="hero-section py-4">
    <div class="container">
        <div class="row align-items-center g-4">

            <div class="col-lg-8">
                <span class="hero-badge mb-3">
                    ✨ Kursus teknologi untuk mahasiswa
                </span>

                <h1 class="display-5 fw-bold">
                    Bangun kemampuan web dari PHP sampai Laravel.
                </h1>

                <p class="lead text-secondary mt-3">
                    KursusKu menyediakan latihan terarah untuk pemula.
                    Pilih kursus, pelajari materi, dan kembangkan
                    keterampilan pemrograman web secara bertahap.
                </p>

                <a href="{{ route('enrollments.create') }}"
                   class="btn btn-primary mt-2">
                    Daftar Kursus
                </a>
            </div>

            <div class="col-lg-4 hero-image-container">
                <img
                    src="{{ asset('images/hero-kursusku.jpg') }}"
                    alt="Ilustrasi kelas KursusKu"
                    class="hero-image"
                >
            </div>

        </div>
    </div>
</section>

{{-- DAFTAR KURSUS --}}
<section class="course-section py-4">
    <div class="container">

        <h2 class="fw-bold mb-4">
            Program Belajar Unggulan
        </h2>

        <div class="row g-4">
            @foreach ($featured as $course)
                <div class="col-md-6">
                    <article class="card course-card h-100">
                        <div class="card-body">

                            <small class="course-code">
                                {{ $course['code'] }}
                            </small>

                            <h3 class="h5 mt-3">
                                {{ $course['name'] }}
                            </h3>

                            <p class="text-secondary mb-0">
                                {{ $course['description'] }}
                            </p>

                        </div>
                    </article>
                </div>
            @endforeach
        </div>

    </div>
</section>

@endsection