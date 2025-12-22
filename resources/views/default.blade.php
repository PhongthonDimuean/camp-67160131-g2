<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App - @yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Sarabun', sans-serif;
            background-color: #f0f2f5; /* สีพื้นหลังเทาอ่อน สบายตา */
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar แต่งสวยๆ */
        .navbar-custom {
            background: #ffffff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 1rem 0;
        }
        .navbar-brand {
            font-weight: 600;
            color: #4a5568 !important;
        }

        /* ส่วนเนื้อหาหลัก */
        .main-wrapper {
            flex: 1; /* ดัน Footer ลงล่างสุดเสมอ */
            padding-top: 2rem;
            padding-bottom: 2rem;
        }

        /* กล่องเนื้อหา (Card) */
        .content-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            padding: 2.5rem;
            border: none;
        }

        /* Header ของแต่ละหน้า */
        .page-header {
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 1rem;
            border-bottom: 2px solid #f0f2f5;
        }
        .page-header h1 {
            font-size: 1.75rem;
            font-weight: 600;
            color: #2d3748;
            margin: 0;
        }

        /* Footer */
        footer {
            background-color: #fff;
            padding: 1.5rem 0;
            text-align: center;
            color: #718096;
            font-size: 0.9rem;
            border-top: 1px solid #e2e8f0;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-box-seam-fill text-primary"></i> My Application
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">หน้าหลัก</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">เกี่ยวกับเรา</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="main-wrapper">
        <div class="container">
            <div class="content-card">
                <div class="page-header d-flex justify-content-between align-items-center">
                    <h1>@yield('header1')</h1>
                    <div>@yield('header-actions')</div>
                </div>

                <div class="mt-4">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            &copy; {{ date('Y') }} My Application System. All rights reserved.
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
