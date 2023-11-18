@php
    use Illuminate\Support\Facades\DB;

    $pengguna = DB::table('pengguna')->where('id_pengguna', session()->get('id_pengguna'))->first();
@endphp
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
        <!-- <img src="{{url("")}}/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
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
                @php

                switch (session()->get('id_jenis_pengguna')) {
                    case 1:
                        include(resource_path('views/menu/menu_admin.php'));
                        break;
                }

                foreach ($arr_menu as $menu) {
                    if ($menu['has_sub']) {
                @endphp
                        <li class="nav-item has-treeview" id="{{ str_replace(' ', '', str_replace('.', '', strtolower($menu['text']))) }}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon {{ $menu['icon'] }}"></i>
                                <p>
                                    {{ $menu['text'] }}
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @foreach ($menu['sub_menu'] as $submenu)
                                    @if ($submenu['has_sub'])
                                        <li class="nav-item {{ str_replace(' ', '', str_replace('.', '', strtolower($menu['text']))) }} has-treeview" id="{{ str_replace(' ', '', str_replace('.', '', strtolower($submenu['text']))) }}">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon {{ $submenu['icon'] }}"></i>
                                                <p>
                                                    {{ $submenu['text'] }}
                                                    <i class="right fas fa-angle-left"></i>
                                                </p>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                @foreach ($submenu['sub_menu'] as $submenuagain)
                                                    <li class="nav-item {{ str_replace(' ', '', str_replace('.', '', strtolower($submenu['text']))) }}" id="{{ $submenuagain['url'] }}_">
                                                        <a href="{{ url($submenuagain['url']) }}" data-toggle="tooltip" data-placement="bottom" title="{{ $submenuagain['text'] }}" class="nav-link {{ $submenuagain['url'] == request()->segment(1) ? 'active' : '' }}">
                                                            <i class="nav-icon {{ $submenuagain['icon'] }}"></i>
                                                            <p>{{ $submenuagain['text'] }}</p>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @else
                                        <li class="nav-item {{ str_replace(' ', '', str_replace('.', '', strtolower($menu['text']))) }}" id="{{ $submenu['url'] }}_">
                                            <a href="{{ url($submenu['url']) }}" data-toggle="tooltip" data-placement="bottom" title="{{ $submenu['text'] }}" class="nav-link {{ $submenu['url'] == request()->segment(1) ? "active" : "" }}">
                                                <i class="nav-icon {{ $submenu['icon'] }}"></i>
                                                <p>{{ $submenu['text'] }}</p>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                @php
                    } else {
                @endphp
                    <li class="nav-item">
                        <a href="{{ url($menu['url']) }}" class="nav-link {{ $menu['url'] == request()->segment(1) ? "active" : "" }}">
                            <i class="nav-icon {{ $menu['icon'] }}"></i>
                            <p>{{ $menu['text'] }}</p>
                        </a>
                    </li>
                @php
                    }
                }
                @endphp
            </ul>
        </nav>
    </div>
</aside>
<script>
    const url = '{{ request()->segment(1) }}'
    const sub_menu = document.getElementById(`${url}_`).classList[1];
    let menu;
    @foreach ($arr_menu as $menu)
        menu = '{{ str_replace(' ', '', str_replace('.', '', strtolower($menu['text']))) }}'
        if (menu == sub_menu) {
            $('#{{ str_replace(' ', '', str_replace('.', '', strtolower($menu['text']))) }}').addClass('menu-open');
        }
        @foreach ($menu['sub_menu'] as $submenu)
            @if ($submenu['has_sub'])
                let submenu = document.getElementById(`{{ str_replace(' ', '', str_replace('.', '', strtolower($submenu['text']))) }}`).classList[1];

                menu = '{{ str_replace(' ', '', str_replace('.', '', strtolower($submenu['text']))) }}'
                if (menu == sub_menu) {
                    $('#{{ str_replace(' ', '', str_replace('.', '', strtolower($submenu['text']))) }}').addClass('menu-open');
                    $(`#${submenu}`).addClass('menu-open');
                }
            @endif
        @endforeach
    @endforeach
</script>
