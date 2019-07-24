<aside class="menu">
    <p class="menu-label">
        General
    </p>
    <ul class="menu-list">
        <li><a href="{{ route('dashboard') }}" class="{{( request()->is('dashboard') ? 'is-active' : '' )}}">Dashboard</a></li>
        <li><a href="{{ route('routes') }}" class="{{( request()->is('routes') || request()->is('routes/*') ? 'is-active' : '' )}}">Routes</a></li>
        <li><a href="{{ route('users') }}" class="{{( request()->is('users') || request()->is('users/*') ? 'is-active' : '' )}}">Users</a></li>
        <li><a href="{{ route('audit-trail') }}" class="{{ request()->is('audit-trail') ? 'is-active' : '' }}">Audit Trail</a></li>
        <li><a href="{{ route('settings') }}">Settings</a></li>
    </ul>
</aside>