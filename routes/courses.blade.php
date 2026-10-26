<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Daftar Kursus - KursusKu</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <header class="navbar">
        <div class="container">
            <strong>KursusKu.</strong>

            <nav>
                <a href="{{ route('home') }}">Beranda</a>
                <a href="{{ route('courses') }}">Kursus</a>
            </nav>
        </div>
    </header>

    <main class="courses">
        <div class="container">

            <div class="section-heading">
                <p class="eyebrow">Katalog Pembelajaran</p>
                <h2>Semua Kursus</h2>
                <p>Pilih kursus yang sesuai dengan minatmu.</p>
            </div>

            <div class="course-grid">
                @forelse ($courses as $course)
                    <article class="card">

                        <span class="course-code">
                            {{ $course['code'] }}
                        </span>

                        <h3>{{ $course['name'] }}</h3>

                        <p>{{ $course['description'] }}</p>

                        <p>
                            <strong>Biaya:</strong>
                            Rp{{ number_format($course['fee'], 0, ',', '.') }}
                        </p>

                        <a href="{{ route('home') }}" class="course-link">
                            Kembali ke Beranda &larr;
                        </a>

                    </article>
                @empty
                    <p>Belum ada kursus yang tersedia.</p>
                @endforelse
            </div>

        </div>
    </main>

    <footer class="footer">
        <div class="container">
            &copy; {{ date('Y') }} KursusKu.
            Belajar dan berkembang bersama.
        </div>
    </footer>

</body>
</html>