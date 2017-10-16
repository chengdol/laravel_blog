@extends('layouts.admin-main')

@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('css/admin_side/categories.css') }}" type="text/css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
@endsection

@section("content")
    <div class="container">
        <section id="category-admin">
            {{--here we will use AJAX--}}
            <form action="{{ route('admin.category.create') }}" method="post">
                <div class="input-group">
                    <label for="name">Category Name</label>
                    <input type="text" name="name" id="name">
                    <input type="submit" class="btn" value="Create Category">
                </div>
            </form>
        </section>

        <section class="list">
            {{--loop all categories--}}
            @if(count($categories) == 0)
                <h3>No Category</h3>
            @else
                @foreach($categories as $category)
                    <article>
                        <div class="category-info" data-id="{{ $category->id }}">
                            <h3>{{ $category->name }}</h3>
                        </div>
                        <div class="edit">
                            <nav>
                                <ul>
                                    <li class="category-edit"><input type="text" /></li>
                                    <li><a href="">Edit</a></li>
                                    <li><a href="" class="danger">Delete</a></li>
                                </ul>
                            </nav>
                        </div>
                    </article>
                @endforeach
            @endif
        </section>
        {{--pagination--}}
        @if($categories->lastPage() > 1)
            <section class="pagination">
                {{-- here we use front awesome, need to be included--}}
                @if($categories->currentPage() != 1)
                    <a href="{{ $categories->previousPageUrl() }}"><i class="icon-hand-left"></i></a>
                @endif
                @if($categories->currentPage() != $categories->lastPage())
                    <a href="{{ $categories->nextPageUrl() }}"><i class="icon-hand-right"></i></a>
                @endif
            </section>
        @endif
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        {{-- laravel CSRF --}}
        var token = "{{ Session::token() }}";
    </script>
    <script type="text/javascript" src="{{ URL::asset('js/categories.js') }}"></script>
@endsection