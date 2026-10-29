
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Halaman Form Pendaftaran
Route::get('/pendaftaran', function () {
    $courses = [
        1 => ['name' => 'Web Dasar'],
        2 => ['name' => 'PHP Dasar'],
        3 => ['name' => 'Laravel Dasar'],
    ];

    return view('enrollments.create', compact('courses'));
})->name('enrollments.create');

// Proses validasi form, belum menyimpan ke database
Route::post('/pendaftaran/preview', function (Request $request) {
    $data = $request->validate([
        'name' => ['required', 'string', 'min:3', 'max:100'],
        'email' => ['required', 'email'],
        'course_id' => ['required', 'integer', 'in:1,2,3'],
    ]);

    return back()
        ->with(
            'success',
            'Form lolos validasi. Database akan ditambahkan pada pertemuan berikutnya.'
        )
        ->withInput();
})->name('enrollments.preview');

// Route untuk mengambil ketersediaan kursus dalam format JSON
Route::get('/courses/{course}/availability', function (int $course) {
    $availability = [
        1 => [
            'course' => 'Web Dasar',
            'remaining' => 12,
        ],
        2 => [
            'course' => 'PHP Dasar',
            'remaining' => 8,
        ],
        3 => [
            'course' => 'Laravel Dasar',
            'remaining' => 4,
        ],
    ];

    abort_unless(isset($availability[$course]), 404);

    return response()->json($availability[$course]);
})->name('courses.availability');
