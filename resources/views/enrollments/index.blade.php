
@extends('layouts.app')

@section('title', 'Laporan Enrollment')

@section('content')

<div class="report-page">
    <div class="report-container">

        <!-- Header -->
        <div class="report-header">
            <div>
                <h2 class="report-title">
                    Laporan Enrollment
                </h2>

                <p class="report-subtitle">
                    Pantau seluruh data pendaftaran kursus di KursusKu.
                </p>
            </div>

            <a href="{{ route('enrollments.create') }}"
               class="report-add-btn">
                + Tambah Enrollment
            </a>
        </div>

        <!-- Ringkasan -->
        <div class="report-summary">

            <div class="report-stat">
                <div class="report-stat-icon">📋</div>
                <p>Total Enrollment</p>
                <h3>{{ $enrollments->count() }}</h3>
            </div>

            <div class="report-stat">
                <div class="report-stat-icon">✅</div>
                <p>Registered</p>
                <h3>
                    {{ $enrollments->where('status', 'registered')->count() }}
                </h3>
            </div>

            <div class="report-stat">
                <div class="report-stat-icon">📚</div>
                <p>Total Course Terdaftar</p>
                <h3>
                    {{ $enrollments->pluck('course_id')->unique()->count() }}
                </h3>
            </div>

        </div>

        <!-- Notifikasi -->
        @if (session('success'))
            <div class="report-success">
                ✓ {{ session('success') }}
            </div>
        @endif

        <!-- Tabel -->
        <div class="report-card">

            <h3 class="report-card-title">
                Data Pendaftaran Kursus
            </h3>

            <p class="report-card-description">
                Informasi peserta, program kursus, tanggal mulai, dan status.
            </p>

            <div class="report-table-wrapper">

                <table class="report-table">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Participant</th>
                            <th>Course</th>
                            <th>Start Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($enrollments as $enrollment)

                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    <div class="report-name">
                                        {{ $enrollment->participant->name }}
                                    </div>

                                    <div class="report-email">
                                        {{ $enrollment->participant->email }}
                                    </div>
                                </td>

                                <td>
                                    <div class="report-name">
                                        {{ $enrollment->course->name }}
                                    </div>

                                    <span class="report-course">
                                        {{ $enrollment->course->code }}
                                    </span>
                                </td>

                                <td>
                                    {{ $enrollment->course->start_date
                                        ? \Carbon\Carbon::parse($enrollment->course->start_date)->format('d-m-Y')
                                        : '-' }}
                                </td>

                                <td>
                                    <span class="report-status">
                                        {{ ucfirst($enrollment->status) }}
                                    </span>
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="report-empty">

                                    <div class="report-empty-icon">
                                        📋
                                    </div>

                                    <h4>Belum Ada Enrollment</h4>

                                    <p>
                                        Belum ada peserta yang mendaftar kursus.
                                    </p>

                                    <a href="{{ route('enrollments.create') }}"
                                       class="report-add-btn">
                                        + Tambah Pendaftaran
                                    </a>

                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>
        </div>

    </div>
</div>

@endsection
<style>
.report-page {
    background: #f8f6ff;
    min-height: 85vh;
    padding: 55px 20px;
    color: #291653;
}

.report-container {
    max-width: 1150px;
    margin: auto;
}

.report-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
    margin-bottom: 35px;
}

.report-title {
    font-size: 32px;
    font-weight: 800;
    margin-bottom: 8px;
}

.report-subtitle {
    color: #817991;
    margin: 0;
}

.report-add-btn {
    background: linear-gradient(135deg, #7c3aed, #9255f5);
    color: white;
    padding: 14px 22px;
    border-radius: 12px;
    text-decoration: none;
    font-weight: 700;
    box-shadow: 0 7px 18px rgba(124, 58, 237, .2);
    transition: .2s;
    white-space: nowrap;
}

.report-add-btn:hover {
    background: #6d28d9;
    color: white;
    transform: translateY(-2px);
}

.report-summary {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    margin-bottom: 28px;
}

.report-stat {
    background: white;
    padding: 24px;
    border-radius: 18px;
    border: 1px solid #e9ddff;
    box-shadow: 0 8px 25px rgba(91, 33, 182, .05);
}

.report-stat-icon {
    width: 45px;
    height: 45px;
    border-radius: 13px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f0e8ff;
    font-size: 22px;
    margin-bottom: 15px;
}

.report-stat p {
    color: #817991;
    margin-bottom: 7px;
}

.report-stat h3 {
    color: #6d28d9;
    font-size: 29px;
    font-weight: 800;
    margin: 0;
}

.report-card {
    background: white;
    border: 1px solid #e9ddff;
    border-radius: 20px;
    padding: 28px;
    box-shadow: 0 10px 30px rgba(91, 33, 182, .05);
}

.report-card-title {
    font-size: 20px;
    font-weight: 750;
    margin-bottom: 7px;
}

.report-card-description {
    color: #8a8398;
    font-size: 14px;
    margin-bottom: 25px;
}

.report-table-wrapper {
    overflow-x: auto;
}

.report-table {
    width: 100%;
    border-collapse: collapse;
    min-width: 650px;
}

.report-table th {
    background: #f5f0ff;
    color: #5b21b6;
    padding: 17px 15px;
    text-align: left;
    font-size: 13px;
    font-weight: 750;
}

.report-table th:first-child {
    border-radius: 10px 0 0 10px;
}

.report-table th:last-child {
    border-radius: 0 10px 10px 0;
}

.report-table td {
    padding: 18px 15px;
    border-bottom: 1px solid #f0ebf7;
    color: #4b4260;
    font-size: 14px;
}

.report-table tbody tr:hover {
    background: #fcfaff;
}

.report-name {
    color: #30204e;
    font-weight: 700;
    margin-bottom: 4px;
}

.report-email {
    color: #928ba0;
    font-size: 12px;
}

.report-course {
    background: #f0e8ff;
    color: #6d28d9;
    padding: 6px 11px;
    border-radius: 8px;
    font-size: 12px;
    font-weight: 700;
}

.report-status {
    display: inline-block;
    background: #f0e8ff;
    color: #6d28d9;
    padding: 7px 13px;
    border-radius: 30px;
    font-size: 12px;
    font-weight: 700;
}

.report-empty {
    text-align: center;
    padding: 55px 15px !important;
}

.report-empty-icon {
    font-size: 42px;
    margin-bottom: 12px;
}

.report-empty h4 {
    font-size: 18px;
    font-weight: 750;
    color: #352052;
}

.report-empty p {
    color: #91899e;
}

.report-success {
    background: #f0e8ff;
    border: 1px solid #ddd0fa;
    color: #5b21b6;
    border-radius: 12px;
    padding: 15px 18px;
    margin-bottom: 22px;
}

@media(max-width: 700px) {
    .report-header {
        align-items: flex-start;
        flex-direction: column;
    }

    .report-summary {
        grid-template-columns: 1fr;
    }

    .report-title {
        font-size: 26px;
    }

    .report-card {
        padding: 18px;
    }
}
</style>