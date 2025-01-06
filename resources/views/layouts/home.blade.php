<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        .container-fluid {
            flex: 1;
        }

        .navbar {
            background-color: #007bff !important;
        }

        .navbar-brand,
        .navbar-nav .nav-link {
            color: #fff !important;
        }

        .navbar-nav .nav-link.active {
            font-weight: bold;
        }

        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #343a40;
            color: #fff;
            padding-top: 20px;
        }

        .sidebar .nav-link {
            color: #adb5bd;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: #fff;
            background-color: #495057;
            border-radius: 5px;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">MyApp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('motor*') ? 'active' : '' }}"
                            href="{{ route('motor.index') }}">Motor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('pembeli*') ? 'active' : '' }}"
                            href="{{ route('pembeli.index') }}">Pembeli</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('kredit*') ? 'active' : '' }}"
                            href="{{ route('kredit.index') }}">Kredit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('cash*') ? 'active' : '' }}"
                            href="{{ route('cash.index') }}">Cash</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('paket*') ? 'active' : '' }}"
                            href="{{ route('paket.index') }}">Paket</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('cicilan*') ? 'active' : '' }}"
                            href="{{ route('cicilan.index') }}">Cicilan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 sidebar">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('motor*') ? 'active' : '' }}"
                            href="{{ route('motor.index') }}">Motor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('pembeli*') ? 'active' : '' }}"
                            href="{{ route('pembeli.index') }}">Pembeli</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('kredit*') ? 'active' : '' }}"
                            href="{{ route('kredit.index') }}">Kredit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('cash*') ? 'active' : '' }}"
                            href="{{ route('cash.index') }}">Cash</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('paket*') ? 'active' : '' }}"
                            href="{{ route('paket.index') }}">Paket</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('cicilan*') ? 'active' : '' }}"
                            href="{{ route('cicilan.index') }}">Cicilan</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9 content">
                <div class="container">
                    @yield('motor-create')
                    @yield('motor-edit')
                    @yield('motor-show')
                    @yield('motor')
                </div>
                <div class="container">
                    @yield('pembeli-create')
                    @yield('pembeli-edit')
                    @yield('pembeli')
                </div>
                <div class="container">
                    @yield('kredit')
                    @yield('kredit-create')
                    @yield('kredit-edit')
                </div>
                <div class="container">
                    @yield('paket')
                    @yield('paket-create')
                </div>
                <div class="container">
                    @yield('cicilan')
                </div>
                <div class="container">
                    @yield('cash')
                    @yield('cash-create')
                </div>
            </div>
        </div>
    </div>
</body>

</html>
