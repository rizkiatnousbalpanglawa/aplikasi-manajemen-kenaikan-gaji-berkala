<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/starter.css') }}" rel="stylesheet" />
    <link href="{{ asset('font-awesome-5/css/all.min.css') }}" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-light bg-putih border-bottom">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="">KSP Mallomo Jaya</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="hidden" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
            </div>
        </form>
        <!-- Navbar-->
        <div class="ms-auto ms-md-0 me-3 me-lg-4">

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-decoration-none btn text-dark" href="#">
                    Logout
                </button>
            </form>

        </div>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-putih" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">

                        @if (Auth::user()->role == 'admin')
                        @include('layouts.sidebar_admin')
                        @elseif (Auth::user()->role == 'ketua')
                        @include('layouts.sidebar_ketua')
                        @else
                        <a class="nav-link" href="{{ route('profil-pegawai') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Profil
                        </a>
                        <a class="nav-link" href="{{ route('kenaikan-gaji-pegawai') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Data KGB
                        </a>
                        @endif

                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    {{ ucfirst(Auth::user()->role) }}
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content" style="background-color: #F4F7FC">
            <main>
                @yield('content')
            </main>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
</body>

</html>