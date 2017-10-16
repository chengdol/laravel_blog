@extends('layouts.admin-main')

@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('css/client_side/form.css') }}">
@endsection

@section('content')
    <br>
    @include('info.info-box')
    <div class="container">
        <form action="{{ route('admin.post.update') }}" method="post">
            <div class="input-group">
                <label for="title">Title</label>
                {{-- we still need old value, here need to check--}}
                <input type="text" name="title" id="title" {{ $errors->has('title')? 'class=has-error':'' }}
                value="{{ Request::old('title')? Request::old('title') : isset($post)? $post->title:'' }}">
            </div>

            <div class="input-group">
                <label for="author">Author</label>
                <input type="text" name="author" id="author" {{ $errors->has('author')? 'class=has-error':'' }}
                value="{{ Request::old('author')? Request::old('author') : isset($post)? $post->author:'' }}">
            </div>

            <div class="input-group">
                <label for="category_select">Add categories</label>
                <select name="category_select" id="category_select">
                    {{--foreach loop--}}
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <button type="button" class="btn">Add category</button>
                <div class="added-categories">
                    {{--later use js to insert categories--}}
                    {{-- clickable to be remove the category attached with post--}}
                    <ul>
                        @foreach($post_categories as $p_category)
                            <li><a href="#" data-id="{{ $p_category->id }}">{{ $p_category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                {{-- js will convert catepories id to string separate by comma--}}
                <input type="hidden" name="categories" id="categories" value="{{ implode(',', $post_categories_ids) }}">
            </div>

            <div class="input-group">
                <label for="body">Body</label>
                <textarea name="body" id="body" rows="12" {{ $errors->has('body')? 'class=has-error':'' }} >{{ Request::old('body')? Request::old('body') : isset($post)? $post->body:'' }}</textarea>
            </div>
            <input type="submit" class="btn" value="Save post">
            <input type="hidden" value="{{ Session::token() }}" name="_token">
            {{-- here need to pass post->id to server--}}
            <input type="hidden" name="post_id" value="{{ $post->id }}">
        </form>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ URL::asset('js/posts.js') }}"></script>
@endsection






