
@extends('layouts.app')

@section('title', 'Edit Kursus')

@section('content')
<style>
    .edit-wrapper {
        max-width: 850px;
        margin: 35px auto;
    }

    .edit-header {
        margin-bottom: 25px;
    }

    .edit-header h1 {
        font-size: 2rem;
        font-weight: 800;
        color: #351568;
        margin-bottom: 8px;
    }

    .edit-header p {
        color: #786b91;
    }

    .edit-card {
        background: white;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 12px 35px rgba(91, 33, 182, .10);
        border: 1px solid #eee8f8;
    }

    .edit-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    .edit-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .edit-group.full {
        grid-column: 1 / -1;
    }

    .edit-group label {
        color: #4c3272;
        font-weight: 700;
        font-size: .92rem;
    }

    .edit-group input,
    .edit-group textarea,
    .edit-group select {
        width: 100%;
        padding: 12px 14px;
        border: 1px solid #ddd3ef;
        border-radius: 10px;
        background: #fcfbff;
        color: #351568;
        font-size: .95rem;
        outline: none;
        box-sizing: border-box;
        transition: .2s;
    }

    .edit-group input:focus,
    .edit-group textarea:focus,
    .edit-group select:focus {
        border-color: #8b5cf6;
        box-shadow: 0 0 0 3px rgba(139, 92, 246, .13);
    }

    .edit-group textarea {
        min-height: 110px;
        resize: vertical;
    }

    .edit-error {
        color: #dc2626;
        font-size: .82rem;
    }

    .edit-actions {
        display: flex;
        justify-content: flex-end;
        gap: 12px;
        margin-top: 28px;
        flex-wrap: wrap;
    }

    .edit-btn {
        display: inline-block;
        padding: 12px 22px;
        border: none;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 700;
        cursor: pointer;
        font-size: .95rem;
    }

    .edit-btn-back {
        background: #f3effb;
        color: #6d28d9;
    }

    .edit-btn-save {
        background: linear-gradient(120deg, #7c3aed, #9333ea);
        color: white;
    }

    .edit-btn:hover {
        opacity: .9;
        transform: translateY(-2px);
    }

    @media(max-width: 600px) {
        .edit-grid {
            grid-template-columns: 1fr;
        }

        .edit-group.full {
            grid-column: auto;
        }

        .edit-card {
            padding: 20px;
        }
    }
</style>

<div class="edit-wrapper">

    <div class="edit-header">
        <h1>Edit Kursus</h1>
        <p>Perbarui informasi kursus melalui formulir berikut.</p>
    </div>

    <div class="edit-card">

        @if ($errors->any())
            <div style="background:#fee2e2;color:#991b1b;padding:15px;border-radius:10px;margin-bottom:20px;">
                <strong>Periksa kembali data yang kamu masukkan:</strong>
                <ul style="margin-bottom:0;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('courses.update', $course) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="edit-grid">

                <div class="edit-group">
                    <label for="code">Kode Kursus</label>
                    <input type="text" id="code" name="code"
                        value="{{ old('code', $course->code) }}" required>
                    @error('code')
                        <span class="edit-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="edit-group">
                    <label for="name">Nama Kursus</label>
                    <input type="text" id="name" name="name"
                        value="{{ old('name', $course->name) }}" required>
                    @error('name')
                        <span class="edit-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="edit-group full">
                    <label for="description">Deskripsi</label>
                    <textarea id="description" name="description">{{ old('description', $course->description) }}</textarea>
                    @error('description')
                        <span class="edit-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="edit-group">
                    <label for="fee">Biaya (Rp)</label>
                    <input type="number" id="fee" name="fee"
                        value="{{ old('fee', $course->fee) }}" min="0" required>
                    @error('fee')
                        <span class="edit-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="edit-group">
                    <label for="quota">Kuota Peserta</label>
                    <input type="number" id="quota" name="quota"
                        value="{{ old('quota', $course->quota) }}" min="1" max="500" required>
                    @error('quota')
                        <span class="edit-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="edit-group">
                    <label for="start_date">Tanggal Mulai</label>
                    <input type="date" id="start_date" name="start_date"
                        value="{{ old('start_date', $course->start_date->format('Y-m-d')) }}" required>
                    @error('start_date')
                        <span class="edit-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="edit-group">
                    <label for="status">Status Kursus</label>
                    <select id="status" name="status" required>
                        <option value="draft" {{ old('status', $course->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="open" {{ old('status', $course->status) == 'open' ? 'selected' : '' }}>Open</option>
                        <option value="closed" {{ old('status', $course->status) == 'closed' ? 'selected' : '' }}>Closed</option>
                    </select>
                    @error('status')
                        <span class="edit-error">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <div class="edit-actions">
                <a href="{{ route('courses.index') }}" class="edit-btn edit-btn-back">
                    Batal
                </a>

                <button type="submit" class="edit-btn edit-btn-save">
                    Simpan Perubahan
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
