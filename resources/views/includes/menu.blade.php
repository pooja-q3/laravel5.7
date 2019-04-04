<ul class="navbar-nav ml-auto">
    <!-- Authentication Links -->
    <li class="nav-item dropdown">
        <a id="navbarDropdown1" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            Localization/Form etc <span class="caret"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown1">
            <ul>
                <li><a class="dropdown-item" href="/localization/en">{{ __('English') }}</a></li>
                <li><a class="dropdown-item" href="/localization/fr">{{ __('French') }}</a></li>
                <li><a class="dropdown-item" href="/localization/de">{{ __('German') }}</a></li>
            </ul>
            <ul>
                <a class="nav-link" href="{{ URL::route('register1') }}" >register1 1</a>
                <a class="nav-link" href="{{route('admin')}}">CATEGORIES</a>
                <a class="nav-link" href="/form">{{ __('Form') }}</a>
                <a class="nav-link" href="/submit">{{ __('Submit Form') }}</a>
            </ul>

        </div>
    </li>


    @guest
    <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
    </li>
    @if (Route::has('register'))
    <li class="nav-item">
        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
    </li>
    @endif
    @else


    <li><a class="nav-link" href="{{ route('permissions.index') }}">Manage Permissions</a></li>
    <li><a class="nav-link" href="{{ route('users.index') }}">Manage Users</a></li>
    <li><a class="nav-link" href="{{ route('roles.index') }}">Manage Role</a></li>
    <li><a class="nav-link" href="{{ route('products.index') }}">Manage Product</a></li>

    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('user.show',Auth::user()->id) }}">{{ __('Profile') }}</a>
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </li>

    @endguest  
</ul>