@extends("layouts.main")

@section("title")
    Blog Index
@endsection

@section("styles")
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
@endsection

@section("content")
    @include('info.info-box')
    <br>
    <div class="container">
        {{--loop through all posts--}}
        @foreach($posts as $post)
            <article class="blog-post">
                <h3>{{ $post->title }}</h3>
                <span class="subtitle">{{ $post->author }} | {{ $post->created_at }}</span>
                <p>{{ $post->body }}</p>
                <a href="{{ route('post.single', ['side' => 'fronted', 'post_id' => $post->id]) }}">Read more</a>
            </article>
        @endforeach
        {{-- pagination--}}
        {{-- more than one page--}}
        @if($posts->lastPage() > 1)
            <section class="pagination">
                {{-- here we use front awesome, need to be included--}}
                @if($posts->currentPage() != 1)
                    <a href="{{ $posts->previousPageUrl() }}"><i class="icon-hand-left"></i></a>
                @endif
                @if($posts->currentPage() != $posts->lastPage())
                    <a href="{{ $posts->nextPageUrl() }}"><i class="icon-hand-right"></i></a>
                @endif
            </section>
        @endif
    </div>
@endsection