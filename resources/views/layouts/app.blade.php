<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Leave Management')</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body {
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar */
        .navbar {
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .navbar-brand i {
            margin-right: 8px;
        }

        .nav-link:hover {
            color: #ffd700 !important;
        }

        .btn-logout {
            border-radius: 50px;
            padding: 5px 15px;
        }

        /* Card default */
        .card {
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        /* Footer */
        footer {
            background-color: #000000c7;
            color: #fff;
            padding: 15px 0;
            margin-top: auto; /* push footer to bottom */
        }

        footer a {
            color: #ffd700;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>

    @stack('head')
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark mb-4" style="background-color: rgb(27, 61, 149);">
        <div class="container">
            <a class="navbar-brand" 
               href="{{ auth()->check() ? (auth()->user()->role === 'admin' ? url('/admin/dashboard') : url('/staff/profile')) : '#' }}">
                <i class="fas fa-user-shield"></i> Leave Management
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">

                    @auth
                        @if(auth()->user()->role === 'admin')
                            <li class="nav-item">
                                <a class="nav-link" href="/admin/dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/admin/audit_logs"><i class="fas fa-file-alt"></i> Audit Trail</a>
                            </li>
                        @endif

                        @if(auth()->user()->role === 'staff')
                            <li class="nav-item">
                                <a class="nav-link" href="/staff/profile"><i class="fas fa-user"></i> My Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/staff/dashboard"><i class="fas fa-calendar-check"></i> Leave History</a>
                            </li>
                        @endif

                        <li class="nav-item ms-2">
                            <form method="POST" action="/logout" class="d-inline">
                                @csrf
                                <button class="btn btn-light btn-sm btn-logout">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="/login"><i class="fas fa-sign-in-alt"></i> Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register"><i class="fas fa-user-plus"></i> Register</a>
                        </li>
                    @endauth

                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mb-5">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="text-center">
        <div class="container">
            <p>&copy; {{ date('Y') }} Leave Management System. All rights reserved.</p>
            <p>
                <a href="#">Privacy Policy</a> | 
                <a href="#">Terms of Service</a>
            </p>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
