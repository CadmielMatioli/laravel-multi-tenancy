<div class="sidebar close">
    <div class="logo-details">
        <span class="favicon">
            <img src="{{ asset('assets/imgs/big-logo.png') }}" alt="Favicon" class="w-6">
        </span>

        <span class="logo_name">
            <x-application-logo />
        </span>

    </div>
    <ul class="nav-links">

        <li>
            <a href="{{route('dashboard')}}">
                <i class='bx bx-grid-alt'></i>
                <span class="link_name">Dashboard</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Dashboard</a></li>
            </ul>
        </li>

        <li class="parentListItem">
            <div class="iocn-link clear-start">
                <a href="#">
                    <i class="fa-solid fa-person-chalkboard"></i>
                    <span class="link_name">Professores</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">rota</a></li>
            </ul>
        </li>

        <li class="parentListItem">
            <div class="iocn-link clear-start">
                <a href="#">
                    <i class="fa-solid fa-graduation-cap"></i>
                    <span class="link_name">rota</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">rota</a></li>
            </ul>
        </li>


        <li>

            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">rota</a></li>
            </ul>
        </li>

        <li class="parentListItem">
            <div class="iocn-link clear-start">
                <a href="#">
                    <i class="fa-solid fa-person-chalkboard"></i>
                    <span class="link_name">Exemplo</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Exemplo</a></li>
                <li><a href="#">JavaScript</a></li>
                <li><a href="#">PHP & MySQL</a></li>
            </ul>
        </li>

    </ul>
</div>
