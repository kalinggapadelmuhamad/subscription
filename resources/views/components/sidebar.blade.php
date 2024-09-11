<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            {{-- <a href="{{ route('dashboard.index') }}"></a> --}}
            {{-- <img src="{{ asset('img/logo.jpeg') }}" class="img-fluid rounded p-2" alt=""> --}}
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            {{-- <img src="{{ asset('img/logo.jpeg') }}" class="img-fluid rounded p-2" alt=""> --}}
        </div>
        <ul class="sidebar-menu">
            <li class="nav-item {{ $type_menu === 'Dashboard' ? 'active' : '' }}">
                <a href="{{ route('dashboard.index') }}" class="nav-link ha">
                    <i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            @if (Auth::user()->privilege)
            @else
                <li class="nav-item {{ $type_menu === 'User' ? 'active' : '' }}">
                    <a href="{{ route('user.index') }}" class="nav-link ha">
                        <i class="fas fa-user"></i><span>User</span></a>
                </li>
                <li class="nav-item {{ $type_menu === 'Subcription' ? 'active' : '' }}">
                    <a href="{{ route('subscription.index') }}" class="nav-link ha">
                        <i class="fas fa-calendar-alt"></i><span>Subscription</span></a>
                </li>
            @endif
        </ul>
    </aside>
</div>
