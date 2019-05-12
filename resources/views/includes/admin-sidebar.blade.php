<aside class="menu">
    <p class="menu-label">
        General
    </p>
    <ul class="menu-list">
        <li><a href="{{ route('dashboard') }}" class="{{( request()->is('dashboard') ? 'is-active' : '' )}}">Dashboard</a></li>
        <li><a href="{{ route('routes') }}">Routes</a></li>
        <li><a href="{{ route('users') }}">Users</a></li>
        <li><a href="{{ route('audit-trail') }}">Audit Trail</a></li>
        <li><a href="{{ route('settings') }}">Settings</a></li>
    </ul>
</aside>