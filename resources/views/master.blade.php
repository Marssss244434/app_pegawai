<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'App Pegawai')</title>

    {{-- 🔹 Bootstrap & Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    {{-- 🔹 Custom Style --}}
    <style>
        body {
            background-color:rgb(135, 160, 184);
        }
        header {
            background-color:rgb(37, 105, 182);
            color: white;
            padding: 15px 0;
            margin-bottom: 30px;
        }
        header h1 {
            margin: 0;
            text-align: center;
            font-size: 1.8rem;
            font-weight: 600;
        }
        nav ul {
            display: flex;
            justify-content: center;
            gap: 20px;
            list-style: none;
            margin: 10px 0 0;
            padding: 0;
        }
        nav a {
            color: white;
            text-decoration: none;
            font-weight: 500;
        }
        nav a:hover {
            text-decoration: underline;
        }
        footer {
            background-color:rgb(37, 105, 182);
            color: white;
            text-align: center;
            padding: 12px;
            margin-top: 50px;
        }
        main {
            min-height: 75vh;
        }
    </style>
</head>

<body>
    {{-- 🔹 Header --}}
    <header>
        <h1>@yield('page-title', 'App Pegawai')</h1>
        <nav>
            <ul>
                <li><a href="{{ url('/employees') }}"><i class="bi bi-people-fill me-1"></i>Employees</a></li>
                <li><a href="{{ url('/departments') }}"><i class="bi bi-building me-1"></i>Departments</a></li>
                <li><a href="{{ url('/attendance') }}"><i class="bi bi-calendar-check me-1"></i>Attendance</a></li>
                <li><a href="{{ url('/salaries') }}"><i class="bi bi-cash-coin me-1"></i>Salaries</a></li>
                <li><a href="{{ url('/positions') }}"><i class="bi bi-briefcase me-1"></i>Positions</a></li>
            </ul>
        </nav>
    </header>

    {{-- 🔹 Main Content --}}
    <main class="container">
        @yield('content')
    </main>

    {{-- 🔹 Footer --}}
    <footer>
        <p>&copy; {{ date('Y') }} App Pegawai — Dibuat oleh Shidqi Nafis Amar</p>
    </footer>
</body>
</html>
