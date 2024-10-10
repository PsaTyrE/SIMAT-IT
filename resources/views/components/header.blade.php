<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                        class="fas fa-search"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        @auth
            <!-- Display when the user is logged in -->
            <!-- Notification Dropdown in Blade Template -->
            {{-- <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-bell"></i>
                    @if ($unreadNotifications->count() > 0)
                        <span class="badge badge-danger">{{ $unreadNotifications->count() }}</span>
                    @endif
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <h6 class="dropdown-header">Notifications</h6>
                    <div class="notification-content">
                        @foreach ($notifications as $notification)
                            <a class="dropdown-item" href="{{ route('your.route', $notification->id) }}">
                                <div class="d-flex align-items-center">
                                    <div class="notification-icon">
                                        <i class="{{ $notification->icon }}"></i>
                                    </div>
                                    <div class="notification-text">
                                        <p>{{ $notification->message }}</p>
                                        <small>{{ $notification->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <div class="dropdown-footer">
                        <a href="{{ route('notifications.index') }}">View All</a>
                    </div>
                </div>
            </li> --}}

            <li class="dropdown">
                <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                    <img alt="image" src="{{ asset('img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
                    <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endauth

        @guest
            <!-- Display when the user is not logged in -->
            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link nav-link-lg nav-link-user">
                    <div class="d-sm-none d-lg-inline-block">Login</div>
                </a>
            </li>
        @endguest
    </ul>
</nav>
