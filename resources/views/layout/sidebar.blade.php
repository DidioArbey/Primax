<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar" style="background-color: #EEEEEE">
    <div class="navbar-brand">
        <a href="/home" target="_blank"><img src="{{asset('assets/images/logo-horizontal.png')}}" width="150" alt="Protela"></a>
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <div class="image"><a href="#"><img src="{{asset('assets/images/profile_avatar.png')}}" alt="User"></a></div>
                    <div class="detail">
                        <h4 class="name-user">{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}} {{{ isset(Auth::user()->lastname) ? Auth::user()->lastname : Auth::user()->email }}}</h4>
                    </div>
                </div>
            </li>

            {{-- home  --}}

            @can('home.index')
                <li class=""><a id="p-m-c" href="{{route('home.index')}}" class="item-flex"><img src="{{asset('assets/images/icons_nav/misCursos.png')}}" alt="Mis Cursos"><span>Mis Cursos</span></a></li>
            @endcan
            {{-- Evaluaciones  --}}
            @if (Auth::user()->profile_id == 1)
            <li class=""><a href="#" class="item-flex"><img src="{{asset('assets/images/icons_nav/assessment.png')}}" alt="Evaluaciones"><span>Evaluaciones</span></a></li>
            @endif
            {{-- Ranking --}}
            @if (Auth::user()->profile_id == 1)
            <li class=""><a href="#" class="item-flex"><img src="{{asset('assets/images/icons_nav/star.png')}}" alt="Ranking"><span>Ranking</span></a></li>
            @endif

            <li class=""><a href="{{route('profile.edit')}}" class="item-flex"><img src="{{asset('assets/images/icons_nav/user.png')}}" alt="Mi perfil"><span>Mi Perfil</span></a></li>

            <li class=""><a href="#" class="item-flex"><img src="{{asset('assets/images/icons_nav/book.png')}}" alt="Biblioteca"><span>Biblioteca</span></a></li>

            <li class=""><a href="#" class="item-flex"><img src="{{asset('assets/images/icons_nav/help.png')}}" alt="Mi perfil"><span>Ayuda</span></a></li>


            @if (Auth::user()->profile_id == 1)
            <li class=""><a href="{{route('users.list')}}" class="item-flex"><img src="{{asset('assets/images/icons_nav/users.png')}}" alt="Usuarios"><span>Usuarios</span></a></li>
            @endif


            <li class="logout">
                <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="mega-menu item-flex" title="Sign Out">
                    <img src="{{asset('assets/images/icons_nav/logOut.png')}}" alt="Salir"><span>Cerrar Sesión</span>
                </a>
            </li>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

        </ul>
    </div>
</aside>
<script src="{{asset('assets/js/pages/ui/sweetalert.js')}}"></script>
