@extends('layouts.app')

@section('title', 'Tambah Kursus')

@section('content')
<style>
    .kf-wrap { max-width: 780px; margin: 0 auto; }
    .kf-head { margin-bottom: 1.25rem; }
    .kf-head h1 { font-size: 1.75rem; font-weight: 800; margin: 0 0 .25rem; }
    .kf-head p { color: #6b6280; margin: 0; }

    .kf-card {
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 18px;
        box-shadow: 0 10px 30px rgba(91, 33, 182, .08);
        padding: 2rem;
    }
    .kf-field { margin-bottom: 1.25rem; }
    .kf-label {
        display: block;
        font-weight: 600;
        font-size: .9rem;
        margin-bottom: .4rem;
        color: var(--text);
    }
    .kf-input {
        width: 100%;
        padding: .7rem .9rem;
        border: 1px solid #ddd0f5;
        border-radius: 10px;
        background: #fff;
        font-size: 1rem;
        color: var(--text);
        box-sizing: border-box;
        transition: border-color .15s, box-shadow .15s;
    }
    .kf-input:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(124, 58, 237, .15);
    }
    textarea.kf-input { resize: vertical; min-height: 96px; }
    .kf-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0 1.25rem;
    }
    .kf-error { color: #dc2626; font-size: .82rem; margin-top: .3rem; }
    .kf-hint { color: #8a82a0; font-size: .8rem; margin-top: .3rem; }
    .kf-actions {
        display: flex;
        gap: .75rem;
        margin-top: .5rem;
        padding-top: 1.25rem;
        border-top: 1px solid var(--border);
    }
    .kf-btn {
        display: inline-block;
        padding: .7rem 1.5rem;
        border-radius: 10px;
        font-weight: 600;
        font-size: 1rem;
        text-decoration: none;
        cursor: pointer;
        border: 1px solid transparent;
    }
    .kf-btn-primary {
        color: #fff;
        background: linear-gradient(120deg, #7c3aed, #8b5cf6);
        box-shadow: 0 6px 16px rgba(124, 58, 237, .3);
    }
    .kf-btn-primary:hover { background: #5b21b6; }
    .kf-btn-light {
        color: var(--primary-dark);
        background: #fff;
        border-color: #ddd0f5;
    }
    .kf-btn-light:hover { background: var(--primary-light); }
    @media (max-width: 640px) {
        .kf-grid { grid-template-columns: 1fr; }
        .kf-card { padding: 1.25rem; }
    }
</style>

<div class="kf-wrap">
    <div class="kf-head">
        <h1>Tambah Kursus</h1>
        <p>Isi data kursus baru, lalu klik Simpan.</p>
    </div>

    <form method="POST" action="{{ route('courses.store') }}" class="kf-card">
        @csrf

        <div class="kf-field">
            <label class="kf-label" for="code">Kode Kursus</label>
            <input class="kf-input" id="code" name="code" placeholder="Contoh: WEB-101"
                   value="{{ old('code') }}" required maxlength="20">
            @error('code') <div class="kf-error">{{ $message }}</div> @enderror
        </div>

        <div class="kf-field">
            <label class="kf-label" for="name">Nama Kursus</label>
            <input class="kf-input" id="name" name="name" placeholder="Contoh: Web Dasar"
                   value="{{ old('name') }}" required maxlength="120">
            @error('name') <div class="kf-error">{{ $message }}</div> @enderror
        </div>

        <div class="kf-field">
            <label class="kf-label" for="description">Deskripsi</label>
            <textarea class="kf-input" id="description" name="description"
                      rows="3" placeholder="Deskripsi singkat kursus">{{ old('description') }}</textarea>
            @error('description') <div class="kf-error">{{ $message }}</div> @enderror
        </div>

        <div class="kf-grid">
            <div class="kf-field">
                <label class="kf-label" for="fee">Biaya (Rp)</label>
                <input class="kf-input" id="fee" type="number" name="fee"
                       value="{{ old('fee', 0) }}" min="0" required>
                @error('fee') <div class="kf-error">{{ $message }}</div> @enderror
            </div>

            <div class="kf-field">
                <label class="kf-label" for="quota">Kuota Peserta</label>
                <input class="kf-input" id="quota" type="number" name="quota"
                       value="{{ old('quota', 20) }}" min="1" max="500" required>
                @error('quota') <div class="kf-error">{{ $message }}</div> @enderror
            </div>

            <div class="kf-field">
                <label class="kf-label" for="start_date">Tanggal Mulai</label>
                <input class="kf-input" id="start_date" type="date" name="start_date"
                       value="{{ old('start_date') }}" required>
                @error('start_date') <div class="kf-error">{{ $message }}</div> @enderror
            </div>

            <div class="kf-field">
                <label class="kf-label" for="status">Status</label>
                <select class="kf-input" id="status" name="status" required>
                    <option value="draft" @selected(old('status', 'draft') === 'draft')>Draft</option>
                    <option value="open" @selected(old('status') === 'open')>Open</option>
                    <option value="closed" @selected(old('status') === 'closed')>Closed</option>
                </select>
                @error('status') <div class="kf-error">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="kf-actions">
            <button class="kf-btn kf-btn-primary" type="submit">Simpan Kursus</button>
            <a class="kf-btn kf-btn-light" href="{{ route('courses.index') }}">Batal</a>
        </div>
    </form>
</div>
@endsection