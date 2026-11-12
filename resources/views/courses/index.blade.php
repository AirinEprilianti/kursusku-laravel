
@extends('layouts.app')

@section('title', 'Daftar Kursus')

@section('content')
<style>
    .kl-head {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
        margin-bottom: 1.25rem;
    }
    .kl-head h1 { font-size: 1.75rem; font-weight: 800; margin: 0 0 .25rem; }
    .kl-head p { color: #6b6280; margin: 0; }
    .kl-btn {
        display: inline-block;
        padding: .7rem 1.4rem;
        border-radius: 10px;
        font-weight: 600;
        text-decoration: none;
        color: #fff;
        background: linear-gradient(120deg, #7c3aed, #8b5cf6);
        box-shadow: 0 6px 16px rgba(124, 58, 237, .3);
    }
    .kl-btn:hover { background: #5b21b6; color: #fff; }
    .kl-card {
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 18px;
        box-shadow: 0 10px 30px rgba(91, 33, 182, .08);
        overflow: hidden;
    }
    .kl-scroll { overflow-x: auto; }
    .kl-table { width: 100%; border-collapse: collapse; }
    .kl-table th {
        text-align: left;
        padding: .9rem 1.1rem;
        background: var(--primary-light);
        color: var(--primary-dark);
        font-size: .82rem;
        text-transform: uppercase;
        letter-spacing: .04em;
    }
    .kl-table td {
        padding: .9rem 1.1rem;
        border-top: 1px solid var(--border);
    }
    .kl-table tbody tr:hover { background: #faf8ff; }
    .kl-code {
        display: inline-block;
        padding: .2rem .6rem;
        border-radius: 8px;
        background: var(--primary-light);
        color: var(--primary-dark);
        font-weight: 700;
        font-size: .85rem;
    }
    .kl-badge {
        display: inline-block;
        padding: .2rem .7rem;
        border-radius: 999px;
        font-size: .8rem;
        font-weight: 600;
    }
    .kl-open   { background: #dcfce7; color: #166534; }
    .kl-draft  { background: #fef3c7; color: #92400e; }
    .kl-closed { background: #fee2e2; color: #991b1b; }
    .kl-empty { text-align: center; padding: 2.5rem 1rem !important; color: #8a82a0; }

    /* Tombol aksi */
    .kl-actions {
        display: flex;
        align-items: center;
        gap: .5rem;
        flex-wrap: wrap;
    }
    .kl-action {
        display: inline-block;
        padding: .45rem .8rem;
        border-radius: 8px;
        font-size: .85rem;
        font-weight: 600;
        text-decoration: none;
        border: none;
        cursor: pointer;
    }
    .kl-detail { background: #dbeafe; color: #1d4ed8; }
    .kl-edit { background: #fef3c7; color: #92400e; }
    .kl-delete { background: #fee2e2; color: #991b1b; }
    .alert-success {
    background: #ede9fe !important;
    color: #5b21b6 !important;
    border: 1px solid #c4b5fd !important;
    border-radius: 12px;
    padding: 16px 20px;
    font-weight: 600;
}
</style>

<div>
    <div class="kl-head">
        <div>
            <h1>Daftar Kursus</h1>
            <p>Data diambil dari MySQL melalui Eloquent.</p>
        </div>
        <a href="{{ route('courses.create') }}" class="kl-btn">+ Tambah Kursus</a>
    </div>

    <div class="kl-card">
        <div class="kl-scroll">
            <table class="kl-table">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Biaya</th>
                        <th>Kuota</th>
                        <th>Mulai</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($courses as $course)
                        <tr>
                            <td><span class="kl-code">{{ $course->code }}</span></td>
                            <td>{{ $course->name }}</td>
                            <td>Rp {{ number_format($course->fee, 0, ',', '.') }}</td>
                            <td>{{ $course->quota }}</td>
                            <td>{{ $course->start_date->format('d/m/Y') }}</td>
                            <td>
                                <span class="kl-badge kl-{{ $course->status }}">
                                    {{ ucfirst($course->status) }}
                                </span>
                            </td>
                            <td>
                                <div class="kl-actions">
                                    {{-- Tombol Detail --}}
                                    <a href="{{ route('courses.show', $course) }}"
                                       class="kl-action kl-detail">
                                        Detail
                                    </a>

                                    {{-- Tombol Edit --}}
                                    <a href="{{ route('courses.edit', $course) }}"
                                       class="kl-action kl-edit">
                                        Edit
                                    </a>

                                    {{-- Tombol Hapus --}}
                                    <form method="POST"
                                          action="{{ route('courses.destroy', $course) }}"
                                          onsubmit="return confirm('Hapus kursus ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="kl-action kl-delete">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="kl-empty">
                                Belum ada data kursus.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection