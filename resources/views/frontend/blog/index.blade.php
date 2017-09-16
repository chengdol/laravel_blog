@extends("layouts.main")

@section("title")
    Blog Index
@endsection

@section("content")
    <article>
        <h3>Post title</h3>
        <span class="subtitle">Post Author | Date</span>
        <p>Post body</p>
        <a href="#">Read more</a>
    </article>
    <section class="pagination">
        {{--TODO: pagination--}}
    </section>
@endsection