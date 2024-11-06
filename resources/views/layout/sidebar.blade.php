<div class="sidebar close">
    <div class="logo-details">
        <span class="favicon">
            <img src="{{ asset('assets/imgs/big-logo.png') }}" alt="Favicon" class="mt-5 w-16">
        </span>

        <span class="logo_name">
            <x-application-logo />
        </span>

    </div>
    <ul class="nav-links">
        @can('tenancy-view')
            <li>
                <a href="{{route('choose-tenancy.index')}}">
                    <i class='bx bx-grid-alt'></i>
                    <span class="link_name">Empresas</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="{{route('choose-tenancy.index')}}">Empresas</a></li>
                </ul>
            </li>
        @endcan

        @can('users-view')
            <li class="parentListItem">
                <a href="#">
                    <i class="fa-solid fa-person-chalkboard"></i>
                    <span class="link_name">Usuários</span>
                </a>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">Usuários</a></li>
                </ul>
            </li>
        @endcan


{{--        <li class="parentListItem">--}}
{{--            <div class="icon-link clear-start">--}}
{{--                <a href="#">--}}
{{--                    <i class="fa-solid fa-person-chalkboard"></i>--}}
{{--                    <span class="link_name">Exemplo</span>--}}
{{--                </a>--}}
{{--                <i class='bx bxs-chevron-down arrow'></i>--}}
{{--            </div>--}}
{{--            <ul class="sub-menu">--}}
{{--                <li><a class="link_name" href="#">Exemplo</a></li>--}}
{{--                <li><a href="#">JavaScript</a></li>--}}
{{--                <li><a href="#">PHP & MySQL</a></li>--}}
{{--            </ul>--}}
{{--        </li>--}}

    </ul>
</div>
