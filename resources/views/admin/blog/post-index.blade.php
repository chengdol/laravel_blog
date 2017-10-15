@extends('layouts.admin-main')

@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('css/client_side/form.css') }}">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
@endsection

@section("content")
    <div class="container">
        {{--info box--}}
        @include("info.info-box")
        {{--new post--}}
        <section id="post-admin">
            <a href="{{ route('admin.post.create') }}" class="btn">New Post</a>
        </section>
        {{-- loop posts--}}
        <section class="list">
            @if(count($posts) == 0)
                <li>No post</li>
            @else
                @foreach($posts as $post)
                    <article>
                        <div class="post-info">
                            <h3>{{ $post->title }}</h3>
                            <span class="info">{{ $post->author }} | {{ $post->created_at }}</span>
                            <div class="edit">
                                <nav>
                                    <ul>
                                        <li><a href="{{ route('admin.post.single', ['side' => 'admin', 'post_id' => $post->id]) }}">view</a></li>
                                        <li><a href="">edit</a></li>
                                        <li><a href="" class="danger">delete</a></li>
                                    </ul>
                                </nav>
                            </div>

                        </div>
                    </article>
                @endforeach
            @endif
        </section>
        {{--pagination--}}
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
