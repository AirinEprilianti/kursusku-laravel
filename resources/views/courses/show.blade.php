
@extends('layouts.app')

@section('title', 'Detail Kursus')

@section('content')
<style>
    .detail-wrapper {
        max-width: 900px;
        margin: 35px auto;
    }

    .detail-header {
        margin-bottom: 25px;
    }

    .detail-header h1 {
        font-size: 2rem;
        font-weight: 800;
        color: #351568;
        margin-bottom: 8px;
    }

    .detail-header p {
        color: #786b91;
    }

    .detail-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 12px 35px rgba(91, 33, 182, .10);
        border: 1px solid #eee8f8;
    }

    .detail-top {
        background: linear-gradient(120deg, #6d28d9, #9333ea);
        color: white;
        padding: 28px;
    }

    .detail-top h2 {
        font-size: 1.5rem;
        font-weight: 800;
        margin: 0 0 8px;
    }

    .detail-top p {
        margin: 0;
        opacity: .9;
    }

    .detail-body {
        padding: 28px;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 22px;
    }

    .detail-item {
        padding: 16px;
        background: #faf8ff;
        border: 1px solid #eee8f8;
        border-radius: 12px;
    }

    .detail-label {
        color: #827493;
        font-size: .82rem;
        font-weight: 600;
        margin-bottom: 7px;
    }

    .detail-value {
        color: #351568;
        font-size: 1rem;
        font-weight: 700;
        overflow-wrap: anywhere;
    }

    .detail-description {
        grid-column: 1 / -1;
    }

    .status-badge {
        display: inline-block;
        padding: 6px 14px;
        border-radius: 30px;
        font-size: .85rem;
        font-weight: 700;
    }

    .status-open {
        background: #dcfce7;
        color: #166534;
    }

    .status-draft {
        background: #fef3c7;
        color: #92400e;
    }

    .status-closed {
        background: #fee2e2;
        color: #991b1b;
    }

    .detail-footer {
        padding: 20px 28px;
        border-top: 1px solid #eee8f8;
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
    }

    .detail-btn {
        display: inline-block;
        padding: 11px 20px;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 700;
        transition: .2s;
    }

    .btn-back {
        background: #f3effb;
        color: #6d28d9;
    }

    .btn-edit {
        background: linear-gradient(120deg, #7c3aed, #9333ea);
        color: white;
    }

    .detail-btn:hover {
        transform: translateY(-2px);
        opacity: .9;
    }

    @media(max-width: 600px) {
        .detail-body {
            grid-template-columns: 1fr;
            padding: 18px;
        }

        .detail-description {
            grid-column: auto;
        }
    }
</style>

<div class="detail-wrapper">

    <div class="detail-header">
        <h1>Detail Kursus</h1>
        <p>Informasi lengkap mengenai kursus yang dipilih.</p>
    </div>

    <div class="detail-card">

        <div class="detail-top">
            <h2>{{ $course->name }}</h2>
            <p>Kode Kursus: {{ $course->code }}</p>
        </div>

        <div class="detail-body">

            <div class="detail-item">
                <div class="detail-label">Kode Kursus</div>
                <div class="detail-value">{{ $course->code }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-label">Nama Kursus</div>
                <div class="detail-value">{{ $course->name }}</div>
            </div>

            <div class="detail-item detail-description">
                <div class="detail-label">Deskripsi</div>
                <div class="detail-value">
                    {{ $course->description ?: 'Tidak ada deskripsi.' }}
                </div>
            </div>

            <div class="detail-item">
                <div class="detail-label">Biaya Kursus</div>
                <div class="detail-value">
                    Rp {{ number_format($course->fee, 0, ',', '.') }}
                </div>
            </div>

            <div class="detail-item">
                <div class="detail-label">Kuota Peserta</div>
                <div class="detail-value">
                    {{ $course->quota }} Peserta
                </div>
            </div>

            <div class="detail-item">
                <div class="detail-label">Tanggal Mulai</div>
                <div class="detail-value">
                    {{ $course->start_date->format('d-m-Y') }}
                </div>
            </div>

            <div class="detail-item">
                <div class="detail-label">Status Kursus</div>
                <div class="detail-value">
                    <span class="status-badge status-{{ $course->status }}">
                        {{ ucfirst($course->status) }}
                    </span>
                </div>
            </div>

        </div>

        <div class="detail-footer">
            <a href="{{ route('courses.index') }}" class="detail-btn btn-back">
                ← Kembali
            </a>

            <a href="{{ route('courses.edit', $course) }}" class="detail-btn btn-edit">
                ✎ Edit Kursus
            </a>
        </div>

    </div>
</div>
@endsection
