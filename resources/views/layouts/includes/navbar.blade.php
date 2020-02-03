<nav class="navbar fixed-top">
    <div class="d-flex align-items-center navbar-left">
        <a href="#" class="menu-button d-none d-md-block">
            <svg class="main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 17">
                <rect x="0.48" y="0.5" width="7" height="1"/>
                <rect x="0.48" y="7.5" width="7" height="1"/>
                <rect x="0.48" y="15.5" width="7" height="1"/>
            </svg>
            <svg class="sub" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 17">
                <rect x="1.56" y="0.5" width="16" height="1"/>
                <rect x="1.56" y="7.5" width="16" height="1"/>
                <rect x="1.56" y="15.5" width="16" height="1"/>
            </svg>
        </a>

        <a href="#" class="menu-button-mobile d-xs-block d-sm-block d-md-none">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 17">
                <rect x="0.5" y="0.5" width="25" height="1"/>
                <rect x="0.5" y="7.5" width="25" height="1"/>
                <rect x="0.5" y="15.5" width="25" height="1"/>
            </svg>
        </a>

        {{-- <div class="d-none d-md-inline-block align-text-bottom mr-3">
            <div class="custom-switch custom-switch-primary-inverse custom-switch-small pl-1" data-toggle="tooltip" data-placement="left" title="Dark Mode">
                <input class="custom-switch-input" id="switchDark" type="checkbox" checked="checked">
                <label class="custom-switch-btn" for="switchDark"></label>
            </div>
        </div> --}}
    </div>

    <div class="navbar-right">
        <div class="user d-inline-block">
            <button class="btn btn-empty p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="name">{{ auth()->user()->full_name }}</span>
                <span>
                    <img alt="Profile Picture" src="{{ auth()->user()->picture_path }}">
                </span>
            </button>

            <div class="dropdown-menu dropdown-menu-right mt-3">
                <a class="dropdown-item" href="{{ route('admins.show', ['id' => auth()->user()->admin->id]) }}">Mon Profile</a>
                <div class="separator"></div>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
</nav>