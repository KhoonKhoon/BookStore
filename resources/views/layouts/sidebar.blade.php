<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
        @if (isSuperAdmin())
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="#">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Interface</div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                Book Detail
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ route('book.index') }}">Books</a>
                    <a class="nav-link" href="{{ route('bookcopy.index') }}">Book Copy List</a>
                    <a class="nav-link" href="{{ route('category.index') }}">Categories</a>
                    <a class="nav-link" href="{{ route('author.index') }}">Authors</a>
                </nav>
            </div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                <div class="sb-nav-link-icon"><i class="fas fa-user-circle"></i></div>
                People
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePages" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ route('user.index') }}">Users</a>

                </nav>
            </div>
        @endif

        @if (!isSuperAdmin())

        <div class="sb-sidenav-menu-heading">INTERFACE</div>
        @if(hasPermission('dashboard', 'view'))
            <a class="nav-link" href="{{ route('home') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
        @endif

        @if(hasPermission('books', 'view'))
            <div class="sb-sidenav-menu-heading">Task</div>
            <a class="nav-link" href="{{ route('book.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                Books
            </a>
        @endif
        {{-- @if (hasPermission('authors', 'view'))
            <a class="nav-link" href="{{ route('authors.index') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-hands-holding-circle"></i></div>
                Authors
            </a>
        @endif

        @if(hasPermission('categories', 'view'))
            <div class="sb-sidenav-menu-heading">Category</div>
            <a class="nav-link" href="{{ route('category.index') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-folder-open"></i></div>
                Categories
            </a>
        @endif --}}
    @endif
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        User
    </div>
</nav>
