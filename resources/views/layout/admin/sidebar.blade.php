<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav" style="position:fixed; width:19%">
        <li class="nav-item side-item" id="home">
            <a class="nav-link" href="{{route('admin.home')}}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item side-item" id="category">
            <a class="nav-link" href="{{route('admin.category.index')}}">
                <i class="mdi mdi-view-headline menu-icon"></i>
                <span class="menu-title">Danh mục</span>
            </a>
        </li>
        <li class="nav-item side-item" id="tour">
            <a class="nav-link" href="{{route('admin.tour.index')}}">
                <i class="mdi mdi-subway menu-icon"></i>
                <span class="menu-title">Tours</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="backend/pages/tables/basic-table.html">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Tables</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="backend/pages/icons/mdi.html">
                <i class="mdi mdi-emoticon menu-icon"></i>
                <span class="menu-title">Icons</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="mdi mdi-account menu-icon"></i>
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="backend/pages/samples/login.html"> Login </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="backend/pages/samples/login-2.html"> Login 2
                        </a></li>
                    <li class="nav-item"> <a class="nav-link" href="backend/pages/samples/register.html"> Register
                        </a></li>
                    <li class="nav-item"> <a class="nav-link" href="backend/pages/samples/register-2.html"> Register
                            2 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="backend/pages/samples/lock-screen.html">
                            Lockscreen </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi-circle-outline menu-icon"></i>
                <span class="menu-title">UI Elements</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="backend/pages/ui-features/buttons.html">Buttons</a></li>
                    <li class="nav-item"> <a class="nav-link" href="backend/pages/ui-features/typography.html">Typography</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>