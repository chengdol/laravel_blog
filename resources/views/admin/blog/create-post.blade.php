@extends('layouts.admin-main')

@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('css/client_side/form.css') }}">
@endsection

@section('content')
    <div class="container">
        @include('info.info-box')
        <form action="{{ route('admin.post.create') }}" method="post">
            <div class="input-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" {{ $errors->has('title')? 'class=has-error':'' }} value="{{ Request::old('title') }}">
            </div>

            <div class="input-group">
                <label for="author">Author</label>
                <input type="text" name="author" id="author" {{ $errors->has('author')? 'class=has-error':'' }} value="{{ Request::old('author') }}">
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
                    <ul>
                        {{--later use js to insert categories--}}
                        {{-- clickable to be remove the category attached with post--}}
                    </ul>
                </div>
                {{-- js will convert catepories id to string separate by comma--}}
                {{-- this input field will pass to server when submit--}}
                <input type="hidden" name="categories" id="categories">
            </div>

            <div class="input-group">
                <label for="body">Body</label>
                <textarea name="body" id="body" rows="12" {{ $errors->has('body')? 'class=has-error':'' }} >{{ Request::old('body') }}</textarea>
            </div>
            <input type="submit" class="btn" value="Create post">
            <input type="hidden" value="{{ Session::token() }}" name="_token">
        </form>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ URL::asset('js/posts.js') }}"></script>
@endsection






