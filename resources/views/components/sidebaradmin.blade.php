<nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="{{url('admin')}}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Interface</div>
            <a class="nav-link" href="{{url('admin/category')}}">
                <div class="sb-nav-link-icon"><i class="fas fa-table me-1"></i></div>
                Category
            </a>
            <a class="nav-link" href="{{url('admin/ruangan')}}">
                <div class="sb-nav-link-icon"><i class="fas fa-table me-1"></i></div>
                Ruangan
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        {{ Auth::user()->name }}
    </div>
</nav>