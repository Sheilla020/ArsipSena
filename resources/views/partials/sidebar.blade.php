<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        @if (Auth::User()->level == '2')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.index') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        @endif
        @if (Auth::User()->level == '1')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.index') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link" href="{{ route('arsip.index') }}">
                <i class=" icon-grid menu-icon"></i>
                <span class="menu-title">All Arsip</span>
            </a>
        </li> -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('createcategory') }}">
                <i class="icon-book menu-icon"></i>
                <span class="menu-title">Add Category</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                <i class="icon-folder menu-icon"></i>
                <span class="menu-title">Unit</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('createunit') }}">Add Unit</a></li>
                    @foreach ($unit as $u)
                    <li class="nav-item"> <a class="nav-link" href="{{ $u->unit }}">{{ $u->unit}}</a></li>
                    @endforeach
                </ul>
            </div>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Kategory</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    @foreach ($category as $c)
                    <li class="nav-item"> <a class="nav-link" href="{{ $c->id}}">{{ $c->category}}</a></li>
                    @endforeach
                </ul>
            </div>
        </li> -->
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('index') }}">User</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('regis') }}">Add User</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('trash') }}">
                <i class="icon-trash menu-icon"></i>
                <span class="menu-title">Trash</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('arsip.create') }}">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Upload File</span>
            </a>
        </li>
        @endif
    </ul>
</nav>