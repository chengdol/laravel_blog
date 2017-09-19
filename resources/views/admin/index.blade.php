@extends("layouts.admin-main")

@section("styles")
    <link rel="stylesheet" href="{{ URL::asset('css/admin_side/modal.css') }}">
@endsection

@section("content")
    <div class="container">
        @include("info.info-box")
        {{--post card--}}
        <div class="card">
            <header>
                <nav>
                    <ul>
                        <li><a href="" class="btn">New post</a></li>
                        <li><a href="" class="btn">Show all posts</a></li>
                    </ul>
                </nav>
            </header>
            <section>
                <ul>
                    {{-- if no posts --}}
                    <li>No post</li>
                    {{-- else --}}
                    <li>
                        <article>
                            <div class="info">
                                <h3>Post title</h3>
                                <span class="info">Post author | date</span>
                                <div class="edit">
                                    <nav>
                                        <ul>
                                            <li><a href="">view</a></li>
                                            <li><a href="">edit</a></li>
                                            <li><a href="" class="danger">delete</a></li>
                                        </ul>
                                    </nav>
                                </div>

                            </div>
                        </article>
                    </li>
                </ul>
            </section>
        </div>
        {{-- message card--}}
        <div class="card">
            <header>
                <nav>
                    <ul>
                        <li><a href="" class="btn">Show all messages</a></li>
                    </ul>
                </nav>
            </header>
            <section>
                <ul>
                    {{-- if no message --}}
                    <li>No message</li>
                    {{-- else --}}
                    <li>
                        <article data-message="Body" data-id="ID">
                            <div class="message-info">
                                <h3>Message subject</h3>
                                <span class="info">Sender | date</span>
                                <div class="edit">
                                    <nav>
                                        <ul>
                                            <li><a href="">view</a></li>
                                            <li><a href="" class="danger">delete</a></li>
                                        </ul>
                                    </nav>
                                </div>

                            </div>
                        </article>
                    </li>
                </ul>
            </section>
        </div>
    </div>

    {{--pop window when click view--}}
    <div class="modal" id="contact-messge-info">
        <button class="btn" id="modal-close">close</button>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        var token = "{{ Session::token() }}"
    </script>
    <script type="text/javascript" src="{{ URL::asset("js/modal.js") }}"></script>
    <script type="text/javascript" src="{{ URL::asset("js/contact_messages.js") }}"></script>
@endsection