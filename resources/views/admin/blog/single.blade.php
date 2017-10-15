@extends("layouts.admin-main")


@section("title")
    {{ $post->title }}
@endsection

@section("content")
    <div class="container">
        {{-- edit and delete --}}
        <section id="post-admin">
            <a href="" class="btn">Edit Post</a>
            <a href="" class="btn danger">Delete Post</a>
        </section>
        {{-- post details --}}
        <section class="post">
            <h1>{{ $post->title }}</h1>
            <span class="info">{{ $post->author }} | {{ $post->created_at }}</span>
            {{-- text left algin and show new line and line break--}}
            <p style="white-space: pre-wrap; text-align: left">{{ $post->body }}</p>
        </section>
    </div>
@endsection







