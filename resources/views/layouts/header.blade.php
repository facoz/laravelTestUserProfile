<header>
    <nav>
        <ul>
            User Profile
            <li>
                <a href="{{route('form.people')}}" class="{{request()->routeIs('form.people') ? 'active' : ''}}">Profile</a>
            </li>
        </ul>
    </nav>
</header>