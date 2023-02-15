<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">

            <li class="nav-item">
                <a class="nav-link {{ Request::is('forum') ? 'active' : ''}}" aria-current="page" href="/forum">
                    <span data-feather="globe" class="align-text-bottom"></span>
                    General Posts
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('forum/categories*') ? 'active' : ''}}" href="/forum/categories">
                    <span data-feather="grid" class="align-text-bottom"></span>
                    Post Categories
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('forum/my-post*') ? 'active' : ''}}" href="/forum/posts">
                    <span data-feather="list" class="align-text-bottom"></span>
                    My Posts
                </a>
            </li>

        </ul>


    </div>
</nav>
