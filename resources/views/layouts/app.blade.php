
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'KursusKu')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* RESET */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #7c3aed;
            --primary-dark: #5b21b6;
            --primary-light: #ede9fe;
            --background: #f8f7fc;
            --text: #2e2147;
            --border: #e8e1f3;
            --white: #ffffff;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif !important;
            background: var(--background) !important;
            color: var(--text);
            line-height: 1.6;
            min-height: 100vh;
        }

        /* NAVBAR */
        .kn-nav {
            width: 100%;
            background: linear-gradient(
                100deg,
                #6020bd,
                #8038f5
            );
        }

        .kn-inner {
            max-width: 1140px;
            width: 92%;
            height: 72px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .kn-brand {
            color: white !important;
            font-size: 23px;
            font-weight: 800;
            text-decoration: none;
        }

        .kn-links {
            display: flex;
            align-items: center;
            gap: 28px;
        }

        .kn-links a {
            color: white !important;
            font-size: 16px;
            font-weight: 600;
            text-decoration: none;
        }

        .kn-links a:hover {
            text-decoration: underline;
        }

        .kn-links a.kn-active {
            text-decoration: underline;
            text-underline-offset: 6px;
        }

        /* AREA KONTEN */
        .page-main {
            width: 92%;
            max-width: 1140px;
            margin: 0 auto;
            padding: 26px 0;
            min-height: calc(100vh - 72px);
        }

        /* CARD */
        .card,
        .course-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(91, 33, 182, 0.07);
        }

        /* FORM */
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

        /* TOMBOL */
        .btn-primary,
        .btn-success {
            color: white !important;
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
        }

        /* ALERT */
        .alert-success {
            background: #ede9fe !important;
            color: #5b21b6 !important;
            border: 1px solid #c4b5fd !important;
            border-radius: 12px;
            padding: 16px 20px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        /* RESPONSIVE */
        @media (max-width: 600px) {
            .kn-inner {
                height: auto;
                min-height: 72px;
                flex-wrap: wrap;
                padding: 12px 0;
            }

            .kn-brand {
                font-size: 20px;
            }

            .kn-links {
                gap: 14px;
            }

            .kn-links a {
                font-size: 13px;
            }

            .page-main {
                width: 94%;
                padding: 20px 0;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <header class="kn-nav">
        <div class="kn-inner">

            <a class="kn-brand" href="{{ route('home') }}">
                KursusKu
            </a>

            <nav class="kn-links">

                <a href="{{ route('home') }}"
                   class="{{ request()->routeIs('home') ? 'kn-active' : '' }}">
                    Beranda
                </a>

                <a href="{{ route('courses.index') }}"
                   class="{{ request()->routeIs('courses.*') ? 'kn-active' : '' }}">
                    Courses
                </a>

                <a href="{{ route('enrollments.create') }}"
                   class="{{ request()->routeIs('enrollments.*') ? 'kn-active' : '' }}">
                    Pendaftaran
                </a>

            </nav>
        </div>
    </header>

    <!-- KONTEN HALAMAN -->
    <main class="page-main">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')

    </main>

</body>
</html>
