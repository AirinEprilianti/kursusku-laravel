
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'KursusKu')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
    :root {
        --primary: #7c3aed;
        --primary-dark: #5b21b6;
        --primary-light: #ede9fe;
        --background: #f8f7fc;
        --text: #2e2147;
        --border: #e8e1f3;
    }

    /* Background seluruh halaman */
    body {
        background-color: var(--background) !important;
        color: var(--text);
    }

    /* Navbar */
    .navbar {
        background: linear-gradient(
            100deg,
            #5b21b6,
            #7c3aed
        ) !important;
    }

    .navbar .navbar-brand,
    .navbar .nav-link,
    .navbar a {
        color: #ffffff !important;
    }

    /* Judul */
    h1, h2, h3 {
        color: #291452;
    }

    /* Card dan formulir */
    .card,
    .course-card {
        background-color: #ffffff;
        border: 1px solid var(--border);
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(91, 33, 182, 0.07);
    }

    /* Input teks dan pilihan kursus */
    .form-control,
    .form-select {
        border: 1px solid #ddd0f5;
        border-radius: 9px;
        padding: 10px 12px;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 0.2rem rgba(124, 58, 237, 0.15);
    }

    /* Semua tombol utama Bootstrap */
    .btn-primary,
    .btn-success {
        color: #ffffff !important;
        background: linear-gradient(
            120deg,
            #7c3aed,
            #8b5cf6
        ) !important;
        border-color: #7c3aed !important;
        border-radius: 9px;
    }

    .btn-primary:hover,
    .btn-success:hover {
        background: #5b21b6 !important;
        border-color: #5b21b6 !important;
    }

    /* Informasi sisa kursi */
    #availability,
    .availability-box {
        border-radius: 10px;
    }
</style>
</head>
<body>
    @include('partials.navbar')

    <main class="container py-4">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
