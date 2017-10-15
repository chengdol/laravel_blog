<header class="top-nav">
    <nav>
        <ul>
            <li><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li><a href="{{ route('admin.post.index') }}">Posts</a></li>
            <li><a href="{{ route('admin.category.index') }}">Categories</a></li>
            <li><a href="">Contact Messages</a></li>
            {{-- always login when in this page--}}
            <li><a href="">Logout</a></li>
        </ul>
    </nav>
</header>