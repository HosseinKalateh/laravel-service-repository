<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="{{ route('admin.index') }}">@Lang('words.dashboard')</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        @Lang('words.menu')
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link @if(Route::is('admin.index')) active @endif" href="{{ route('admin.index') }}"><i class="fa fa-fw fa-tachometer-alt"></i>@Lang('words.dashboard')</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link @if(Route::is('admin.category.index')) active @endif" href="{{ route('admin.category.index') }}"><i class="fa fa-fw fa-list"></i>@Lang('words.categories')</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link @if(Route::is('admin.tag.index')) active @endif" href="{{ route('admin.tag.index') }}"><i class="fas fa-tag"></i>@Lang('words.tags')</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link @if(Route::is('admin.post.index')) active @endif" href="{{ route('admin.post.index') }}"><i class="fab fa-blogger-b"></i>@Lang('words.posts')</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
