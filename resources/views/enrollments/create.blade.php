
@extends('layouts.app')

@section('title', 'Tambah Enrollment')

@section('content')

<div class="enroll-page">
    <div class="enroll-container">

        <a href="{{ route('enrollments.index') }}"
           class="enroll-back">
            ← Kembali ke Laporan
        </a>

        <h2 class="enroll-heading">Tambah Enrollment</h2>

        <p class="enroll-subtitle">
            Daftarkan peserta ke program kursus pilihan di KursusKu.
        </p>

        <div class="enroll-card">

            <div class="enroll-icon">📚</div>

            <h3>Form Pendaftaran Kursus</h3>

            <p class="enroll-description">
                Lengkapi informasi peserta dan pilih kursus yang ingin diikuti.
            </p>

            @if ($errors->any())
                <div class="enroll-alert">
                    <strong>Data belum dapat disimpan.</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST"
                  action="{{ route('enrollments.store') }}">
                @csrf

                <div class="enroll-field">
                    <label for="participant_id" class="enroll-label">
                        Nama Participant
                    </label>

                    <select name="participant_id"
                            id="participant_id"
                            class="enroll-select"
                            required>

                        <option value="">
                            -- Pilih Participant --
                        </option>

                        @foreach ($participants as $participant)
                            <option value="{{ $participant->id }}"
                                @selected(old('participant_id') == $participant->id)>
                                {{ $participant->name }} -
                                {{ $participant->email }}
                            </option>
                        @endforeach

                    </select>

                    @error('participant_id')
                        <div class="enroll-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="enroll-field">
                    <label for="course_id" class="enroll-label">
                        Program Kursus
                    </label>

                    <select name="course_id"
                            id="course_id"
                            class="enroll-select"
                            required>

                        <option value="">
                            -- Pilih Course --
                        </option>

                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}"
                                @selected(old('course_id') == $course->id)>
                                {{ $course->code }} - {{ $course->name }}
                            </option>
                        @endforeach

                    </select>

                    @error('course_id')
                        <div class="enroll-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="enroll-actions">

                    <a href="{{ route('enrollments.index') }}"
                       class="enroll-btn enroll-btn-secondary">
                        Batal
                    </a>

                    <button type="submit"
                            class="enroll-btn enroll-btn-primary">
                        Simpan Enrollment
                    </button>

                </div>

            </form>
        </div>

    </div>
</div>

@endsection

<style>
.enroll-page {
    background: #f8f6ff;
    min-height: 85vh;
    padding: 55px 20px;
    color: #291653;
}

.enroll-container {
    max-width: 850px;
    margin: auto;
}

.enroll-back {
    color: #7c3aed;
    text-decoration: none;
    font-weight: 600;
}

.enroll-back:hover {
    color: #5b21b6;
}

.enroll-heading {
    font-size: 30px;
    font-weight: 800;
    margin: 22px 0 8px;
}

.enroll-subtitle {
    color: #77718a;
    margin-bottom: 30px;
}

.enroll-card {
    background: white;
    border: 1px solid #e9ddff;
    border-radius: 22px;
    padding: 38px;
    box-shadow: 0 12px 35px rgba(91, 33, 182, .07);
}

.enroll-icon {
    width: 65px;
    height: 65px;
    border-radius: 20px;
    background: #f0e8ff;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 30px;
    margin-bottom: 20px;
}

.enroll-card h3 {
    font-size: 23px;
    font-weight: 750;
    margin-bottom: 8px;
}

.enroll-description {
    color: #898399;
    margin-bottom: 30px;
}

.enroll-label {
    display: block;
    font-weight: 650;
    margin-bottom: 10px;
    color: #34205c;
}

.enroll-select {
    width: 100%;
    padding: 14px 16px;
    border: 1px solid #ded5ee;
    border-radius: 12px;
    background: #fff;
    color: #35245a;
    font-size: 15px;
    outline: none;
    transition: .2s;
}

.enroll-select:focus {
    border-color: #8b5cf6;
    box-shadow: 0 0 0 4px rgba(124, 58, 237, .12);
}

.enroll-field {
    margin-bottom: 25px;
}

.enroll-error {
    color: #dc2626;
    font-size: 13px;
    margin-top: 7px;
}

.enroll-alert {
    background: #fff0f0;
    border: 1px solid #fecaca;
    color: #b91c1c;
    border-radius: 12px;
    padding: 15px 18px;
    margin-bottom: 24px;
}

.enroll-actions {
    display: flex;
    gap: 12px;
    margin-top: 32px;
}

.enroll-btn {
    display: inline-block;
    text-align: center;
    text-decoration: none;
    border: none;
    border-radius: 12px;
    padding: 14px 23px;
    font-size: 15px;
    font-weight: 700;
    cursor: pointer;
    transition: .2s;
}

.enroll-btn-primary {
    background: linear-gradient(135deg, #7c3aed, #9255f5);
    color: white;
    flex: 1;
    box-shadow: 0 7px 18px rgba(124, 58, 237, .2);
}

.enroll-btn-primary:hover {
    background: #6d28d9;
    color: white;
    transform: translateY(-2px);
}

.enroll-btn-secondary {
    background: #f3effb;
    color: #60418e;
}

.enroll-btn-secondary:hover {
    background: #e9ddff;
    color: #4c1d95;
}

@media(max-width: 600px) {
    .enroll-card {
        padding: 24px 20px;
    }

    .enroll-heading {
        font-size: 25px;
    }

    .enroll-actions {
        flex-direction: column;
    }
}
</style>