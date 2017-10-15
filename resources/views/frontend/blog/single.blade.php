@extends("layouts.main")

@section("title")
    {{ $post->title }}
@endsection

@section("content")
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <span class="subtitle">{{ $post->author }} | {{ $post->created_at }}</span>
        {{-- text left algin and show new line and line break--}}
        <p style="white-space: pre-wrap; text-align: left">{{ $post->body }}</p>
    </div>
@endsection