<header class="navbar navbar-expand-md navbar-light d-print-none">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href=".">
                <img src="{{ asset('static/logo.svg') }}" width="110" height="32" alt="Tabler" class="navbar-brand-image">
            </a>
        </h1>
        <div class="navbar-nav flex-row order-md-last">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                    <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)"></span>
                    <div class="d-none d-xl-block ps-2">
                    <div>Paweł Kuna</div>
                    <div class="mt-1 small text-muted">UI Designer</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="./sign-in.html" class="dropdown-item">Logout</a>
                </div>
            </div>
        </div>
    </div>
</header>

<header class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar navbar-light">
            <div class="container-xl">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}" >
                            <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-home"></i></span>
                            <span class="nav-link-title">
                                Home
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('nasabah.index') }}" >
                            <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-users"></i></span>
                            <span class="nav-link-title">
                                Nasabah
                            </span>
                        </a>
                    </li>    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('transaction.index') }}" >
                            <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-report-money"></i></span>
                            <span class="nav-link-title">
                                Transaction
                            </span>
                        </a>
                    </li>   
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('points.index') }}" >
                            <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-coins"></i></span>
                            <span class="nav-link-title">
                                Points
                            </span>
                        </a>
                    </li>   
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('report.index') }}" >
                            <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-report-search"></i></span>
                            <span class="nav-link-title">
                                Report
                            </span>
                        </a>
                    </li>   

                </ul>
            </div>
        </div>
    </div>
</header>