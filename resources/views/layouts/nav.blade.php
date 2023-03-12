<style>
    nav {
        z-index: 1000;
    }
    .navbar-light .navbar-toggler-icon {
        background-image: url(
"data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255, 255, 255, 0.9)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E");
    }
</style>


<nav class="navbar navbar-expand-lg navbar-light color-official position-fixed top-0 start-0 end-0">
    <div class="container">
        <a class="navbar-brand text-white" href="/">Matrix Education</a>
        <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon text-white"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <div class="text-white">
                    <ul class="navbar-nav text-white me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle  text-white" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Program Unggulan
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach($program_unggulan as $program)
                                    <li class="ps-3 text-left">
                                        <a class="text-decoration-none text-dark"
                                            href="{{ $program->link }}">{{ $program->nama_program }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Reservasi
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach($reservasi as $r)
                                    @if($r->link != null)
                                        <li class="ps-3 text-left">
                                            <a class="text-decoration-none text-dark"
                                                href="{{ $r->link }}">{{ $r->nama_reservasi }}</a>
                                        </li>
                                    @endif
                                    @if($r->no_hp != null)
                                        <li class="ps-3 text-left">
                                            <a class="text-decoration-none text-dark"
                                                href="tel:{{ $r->no_hp }}">{{ $r->nama_reservasi }}</a>
                                        </li>
                                    @endif
                                    @if($r->no_wa != null)
                                        <li class="ps-3 text-left">
                                            <a class="text-decoration-none text-dark"
                                                href="https://wa.me/{{ $r->no_wa }}?text=Halo admin Edumatrix Indonesia saya ingin reservasi paket di Edumatrix">{{ $r->nama_reservasi }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
            </ul>
        </div>
    </div>
</nav>
