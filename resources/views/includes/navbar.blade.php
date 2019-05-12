<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="container">
        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item is-size-4 has-text-weight-bold has-text-primary" href="{{ url('/dashboard') }}">
                    {{ config('app.name', 'Daan Admin') }}
                </a>
            </div>
        
            <div class="navbar-end">                   
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        {{ Auth::user()->name }}
                    </a>
            
                    <div class="navbar-dropdown">
                        <a class="navbar-item"
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                        >
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>                   
                    </div>
                </div>
            </div>
        </div> 
    </div>        
</nav>