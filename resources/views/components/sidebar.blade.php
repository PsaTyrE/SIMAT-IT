<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <img src="{{ asset('img/rsu.png') }}" style="width: 50px; height: auto;">
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link"><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Starter</li>
            @guest
                <li class="nav-item">
                    <a href="{{ route('issue.create') }}" class="nav-link"><i class="fas fa-plus-circle"></i>
                        <span>SIMAT-IT</span></a>
                </li>
            @endguest
            <li class="nav-item">
                <a href="{{ route('issueToday') }}" class="nav-link"><i class="fas fa-columns"></i> <span>SIMAT-IT
                        Today</span></a>
            </li>
            <li class="nav-item">
                <a href="{{ route('issue.index') }}" class="nav-link"><i class="fas fa-columns"></i> <span>SIMAT-IT
                        Complete</span></a>
            </li>
            @auth
            <li class="nav-item">
                <a href="{{ route('report.date.form') }}" class="nav-link"><i class="fas fa-columns"></i> <span>Report</span></a>
            </li>
            @endauth
    </aside>
</div>
