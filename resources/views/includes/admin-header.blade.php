<header class="top-nav">
    <nav>
        <ul>
            <li {{ Request::is('admin')? 'class=active' : '' }}><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li {{ Request::is('admin/post*')? 'class=active' : '' }}><a href="{{ route('admin.post.index') }}">Posts</a></li>
            <li {{ Request::is('admin/category')? 'class=active' : '' }}><a href="{{ route('admin.category.index') }}">Categories</a></li>
            <li {{ Request::is('admin/contact')? 'class=active' : '' }}><a href="">Contact Messages</a></li>
            {{-- always login when in this page--}}
            <li><a href="">Logout</a></li>
        </ul>
    </nav>
</header>