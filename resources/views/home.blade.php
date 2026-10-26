<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $siteName }} - Belajar Web</title>

    <!-- CSS utama -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- CSS tambahan untuk gambar dan HERO -->
    <style>
        /* HERO: tulisan kiri dan gambar kanan */
        .hero .hero-content {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            gap: 45px;
        }

        .hero-text {
            flex: 1;
            min-width: 0;
        }

        .hero-image {
            flex: 1;
            min-width: 0;
        }

        .hero-image img {
            display: block;
            width: 100%;
            max-width: 480px;
            height: 340px;
            margin-left: auto;
            object-fit: cover;
            border: 7px solid #ffffff;
            border-radius: 25px;
            box-shadow: 0 20px 45px rgba(124, 58, 237, 0.15);
        }

        .hero h1 span {
            display: block;
            color: #7c3aed;
        }

        /* Tampilan layar HP */
        @media (max-width: 760px) {
            .hero .hero-content {
                flex-direction: column;
                align-items: stretch;
                gap: 30px;
            }

            .hero-image img {
                max-width: 100%;
                height: auto;
                margin: 0 auto;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <header class="navbar">
        <div class="container">
            <strong>{{ $siteName }}</strong>

            <nav>
                <a href="{{ route('home') }}">Beranda</a>
                <a href="#kursus">Kursus</a>
            </nav>
        </div>
    </header>

    <main>

        <!-- HERO -->
        <section class="hero">
            <div class="container hero-content">

                <!-- TULISAN DI SEBELAH KIRI -->
                <div class="hero-text">

                    <span class="badge">
                        ✨ Platform Belajar Web
                    </span>

                    <h1>
                        Tingkatkan Skill Digitalmu,
                        <span>Mulai dari Sini.</span>
                    </h1>

                    <p>
                        Belajar HTML, CSS, PHP, dan Laravel melalui
                        kursus yang terarah. Bangun keterampilanmu
                        selangkah demi selangkah bersama KursusKu.
                    </p>

                    <a href="#kursus" class="btn">
                        Jelajahi Kursus &rarr;
                    </a>

                </div>

                <!-- GAMBAR DI SEBELAH KANAN -->
                <div class="hero-image">
                    <img
                        src="{{ asset('images/hero-kursusku.jpg') }}"
                        alt="Ilustrasi kelas KursusKu">
                </div>

            </div>
        </section>

        <!-- DAFTAR KURSUS -->
        <section class="courses" id="kursus">
            <div class="container">

                <div class="section-heading">
                    <p class="eyebrow">Pilihan Belajar</p>

                    <h2>Kursus Pilihan untuk Kamu</h2>

                    <p>
                        Pilih kursus yang sesuai dengan kebutuhan
                        dan tingkat kemampuanmu.
                    </p>
                </div>

                <div class="course-grid">

                    @foreach ($featured as $course)
                        <article class="card">

                            <span class="course-code">
                                {{ $course['code'] }}
                            </span>

                            <h3>
                                {{ $course['name'] }}
                            </h3>

                            <p>
                                {{ $course['description'] }}
                            </p>

                            <a href="#kursus" class="course-link">
                                Pelajari lebih lanjut &rarr;
                            </a>

                        </article>
                    @endforeach

                </div>
            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            &copy; {{ date('Y') }} {{ $siteName }}.
            Belajar, berkembang, dan raih masa depanmu.
        </div>
    </footer>

</body>
</html>