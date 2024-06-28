<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar" style="background-color: #EEEEEE">
    <div class="navbar-brand">
        <a href="/home" target="_blank"><img src="{{asset('assets/images/logo-horizontal.png')}}" width="150" alt="Primax"></a>
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <div class="image"><a href="#"><img src="{{asset('assets/images/profile_avatar.png')}}" alt="User"></a></div>
                    <div class="detail">
                        <h4 class="name-user">
                        {{{ isset(Auth::user()->nickname) ? Auth::user()->nickname : (isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email) }}}
                        {{{ isset(Auth::user()->nickname) ? '' : (isset(Auth::user()->lastname) ? Auth::user()->lastname : '') }}}
                        {{-- <h4 class="name-user">{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}} {{{ isset(Auth::user()->lastname) ? Auth::user()->lastname : Auth::user()->email }}}</h4> --}}
                        </h4>
                    </div>
                </div>
            </li>

            {{-- home  --}}

                <li class=""><a id="p-m-c" href="{{route('home.index')}}" class="item-flex"><img src="{{asset('assets/images/icons_nav/misCursos.png')}}" alt="Mis Cursos"><span>Mis Cursos</span></a></li>
            {{-- Dashboard --}}
            @if (Auth::user()->profile_id == 1)
                <li class=""><a href="#" class="item-flex"><img src="{{asset('assets/images/icons_nav_admin/dashboard-admin-orange.png')}}" alt="Dashboard"><span>Dashboard</span></a></li>
            @endif
            {{-- Ranking --}}
            @if (Auth::user()->profile_id == 1)
            <li class=""><a href="#" class="item-flex"><img src="{{asset('assets/images/icons_nav_admin/ranking-icon-orange.png')}}" alt="Ranking"><span>Ranking</span></a></li>
            @endif
            {{-- Biblioteca --}}
            @if (Auth::user()->profile_id == 1)
                <li class=""><a href="#" class="item-flex"><img src="{{asset('assets/images/icons_nav_admin/biblioteca-admin-orange.png')}}" alt="Gestionar Biblioteca"><span>Gestionar Biblioteca</span></a></li>
            @endif
            <li class=""><a href="#" class="item-flex"><img src="{{asset('assets/images/icons_nav_admin/biblioteca-icon-orange.png')}}" alt="Biblioteca"><span>Biblioteca</span></a></li>
            {{-- Noticias --}}
            @if (Auth::user()->profile_id == 1)
                <li class=""><a href="#" class="item-flex"><img src="{{asset('assets/images/icons_nav_admin/gestion-noticias-orange.png')}}" alt="Gestionar Noticias"><span>Gestionar Noticias</span></a></li>
            @endif
            <li class=""><a href="#" class="item-flex"><img src="{{asset('assets/images/icons_nav_admin/noticias-admin-orange.png')}}" alt="Noticias"><span>Noticias</span></a></li>
            {{-- Banners --}}
            @if (Auth::user()->profile_id == 1)
                <li class=""><a href="#" class="item-flex"><img src="{{asset('assets/images/icons_nav_admin/gestion-banners-orange.png')}}" alt="Gestionar Banners"><span>Gestionar Banners</span></a></li>
            @endif
            {{-- Mi Perfil --}}
            <li class=""><a href="{{route('profile.edit')}}" class="item-flex"><img src="{{asset('assets/images/icons_nav/user.png')}}" alt="Mi perfil"><span>Mi Perfil</span></a></li>
            {{-- Usuarios --}}
            @if (Auth::user()->profile_id == 1)
            <li class=""><a href="{{route('users.list')}}" class="item-flex"><img src="{{asset('assets/images/icons_nav_admin/usuarios-admin-orange.png')}}" alt="Usuarios"><span>Usuarios</span></a></li>
            @endif


            <li class="logout">
                <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="mega-menu item-flex" title="Sign Out">
                    <img src="{{asset('assets/images/icons_nav_admin/cerrar-sesion-icon-orange.png')}}" alt="Salir"><span>Cerrar Sesión</span>
                </a>
            </li>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

        </ul>
    </div>
</aside>
<script src="{{asset('assets/js/pages/ui/sweetalert.js')}}"></script>
