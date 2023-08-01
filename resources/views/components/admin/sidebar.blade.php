<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item" style="margin-top: 40px;">
                <a class="nav-link @if(request()->routeIs('admin.index')) active @endif" href="#">
                    <span data-feather="home"></span>
                    Главная
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.categories.*')) active @endif" href="#">
                    <span data-feather="file"></span>
                    Категории
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.news.*')) active @endif" href="{{ route('admin.news.index') }}">
                    <span data-feather="file"></span>
                    Новости
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.users.*')) active @endif" href="#">
                    <span data-feather="users"></span>
                    Пользователи
                </a>
            </li>
        </ul>
    </div>
</nav>
