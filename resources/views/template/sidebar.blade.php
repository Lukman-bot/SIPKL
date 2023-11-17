@php
    use Illuminate\Support\Facades\DB;

    $pengguna = DB::table('pengguna')->where('id_pengguna', session()->get('id_pengguna'))->first();
@endphp
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
        <img src="{{url("")}}/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if ($pengguna->foto_profile != null || $pengguna->foto_profile != '')
                    <img src="{{url("/img/profile/" . $pengguna->foto_profile)}}" class="img-circle elevation-2"/>
                @else
                    <img src="{{Avatar::create(session()->get('nama_lengkap'))}}" class="img-circle elevation-2"/>
                @endif
            </div>
            <div class="info">
                <a href="#" class="d-block">{{session()->get('nama_lengkap')}}</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @if (session()->get('id_jenis_pengguna') == 1)
                    <li class="nav-item">
                        <a href="{{url("dashboard")}}" class="nav-link {{ request()->segment(1) == "dashboard" ? "active" : "" }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->segment(1) == "pengguna" ||
                        request()->segment(1) == "dudi" ? "menu-open" : "" }}">
                        <a href="#" class="nav-link {{ request()->segment(1) == "pengguna" ||
                            request()->segment(1) == "dudi" ? "active" : "" }}">
                            <i class="nav-icon fas fa-database"></i>
                            <p>
                                Master
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url("pengguna")}}" class="nav-link {{ request()->segment(1) == "pengguna" ? "active" : "" }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Pengguna</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url("dudi")}}" class="nav-link {{ request()->segment(1) == "dudi" ? "active" : "" }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dudi</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @elseif (session()->get('id_jenis_pengguna') == 2)
                    <li class="nav-item">
                        <a href="{{url("dashboard")}}" class="nav-link {{ request()->segment(1) == "dashboard" ? "active" : "" }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url("daftar-hadir")}}" class="nav-link {{ request()->segment(1) == "daftar-hadir" ? "active" : "" }}">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Daftar Hadir
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url("monitoring")}}" class="nav-link {{ request()->segment(1) == "monitoring" ? "active" : "" }}">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Monitoring
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url("agenda")}}" class="nav-link {{ request()->segment(1) == "agenda" ? "active" : "" }}">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>
                                Agenda
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url("gambar-kerja")}}" class="nav-link {{ request()->segment(1) == "gambar-kerja" ? "active" : "" }}">
                            <i class="nav-icon fas fa-image"></i>
                            <p>
                                Gambar Kerja
                            </p>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->segment(1) == "konsultasi-pembimbing-dudi" ||
                        request()->segment(1) == "konsultasi-pembimbing-guru" ? "menu-open" : "" }}">
                        <a href="#" class="nav-link {{ request()->segment(1) == "konsultasi-pembimbing-dudi" || request()->segment(1) == "konsultasi-pembimbing-guru" ? "active" : "" }}">
                            <i class="nav-icon fas fa-envelope"></i>
                            <p>
                                Konsultasi
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url("konsultasi-pembimbing-dudi")}}" class="nav-link {{ request()->segment(1) == "konsultasi-pembimbing-dudi" ? "active" : "" }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Pembimbing DU/DI</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url("konsultasi-pembimbing-guru")}}" class="nav-link {{ request()->segment(1) == "konsultasi-pembimbing-guru" ? "active" : "" }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Pembimbing Guru</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{url("penilaian")}}" class="nav-link {{ request()->segment(1) == "penilaian" ? "active" : "" }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Penilaian
                            </p>
                        </a>
                    </li>
                @elseif (session()->get('id_jenis_pengguna') == 3)
                <li class="nav-item">
                        <a href="{{url("dashboard")}}" class="nav-link {{ request()->segment(1) == "dashboard" ? "active" : "" }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url("daftar-hadir")}}" class="nav-link {{ request()->segment(1) == "daftar-hadir" ? "active" : "" }}">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Daftar Hadir
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url("agenda")}}" class="nav-link {{ request()->segment(1) == "agenda" ? "active" : "" }}">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>
                                Agenda
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url("gambar-kerja")}}" class="nav-link {{ request()->segment(1) == "gambar-kerja" ? "active" : "" }}">
                            <i class="nav-icon fas fa-image"></i>
                            <p>
                                Gambar Kerja
                            </p>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->segment(1) == "konsultasi-pembimbing-dudi" ||
                        request()->segment(1) == "konsultasi-pembimbing-guru" ? "menu-open" : "" }}">
                        <a href="#" class="nav-link {{ request()->segment(1) == "konsultasi-pembimbing-dudi" || request()->segment(1) == "konsultasi-pembimbing-guru" ? "active" : "" }}">
                            <i class="nav-icon fas fa-envelope"></i>
                            <p>
                                Konsultasi
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url("konsultasi-pembimbing-dudi")}}" class="nav-link {{ request()->segment(1) == "konsultasi-pembimbing-dudi" ? "active" : "" }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Pembimbing DU/DI</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{url("penilaian")}}" class="nav-link {{ request()->segment(1) == "penilaian" ? "active" : "" }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Penilaian
                            </p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</aside>
