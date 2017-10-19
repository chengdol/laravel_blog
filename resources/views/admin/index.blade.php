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
                        <li><a href="{{ route('admin.post.create') }}" class="btn">New post</a></li>
                        <li><a href="{{ route('admin.post.index') }}" class="btn">Show all posts</a></li>
                    </ul>
                </nav>
            </header>
            <section>
                <ul>
                    @if(count($posts) == 0)
                        <li><h3>No Post</h3></li>
                    @else
                        @foreach($posts as $post)
                            <li>
                                <article>
                                    <div class="post-info">
                                        <h3>{{ $post->title }}</h3>
                                        <span class="info">{{ $post->author }} | {{ $post->created_at }}</span>
                                        <div class="edit">
                                            <nav>
                                                <ul>
                                                    <li><a href="{{ route('admin.post.single', ['side' => 'admin', 'post_id' => $post->id]) }}">View</a></li>
                                                    <li><a href="{{ route('admin.post.edit', ['post_id' => $post->id]) }}">Edit</a></li>
                                                    <li><a href="{{ route('admin.post.delete', ['post_id' => $post->id]) }}" class="danger">Delete</a></li>
                                                </ul>
                                            </nav>
                                        </div>

                                    </div>
                                </article>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </section>
        </div>
        {{-- message card--}}
        <div class="card">
            <header>
                <nav>
                    <ul>
                        <li><a href="{{ route('admin.contact.index') }}" class="btn">Show all messages</a></li>
                    </ul>
                </nav>
            </header>
            <section>
                <ul>
                    {{-- if no message --}}
                    @if (count($contact_messages) === 0)
                        <li>No Message</li>
                    {{-- else --}}
                    @else
                        @foreach($contact_messages as $contact_message)
                            <li>
                                <article data-message="{{ $contact_message->body }}" data-id="{{ $contact_message->id }}" class="contact-message">
                                    <div class="message-info">
                                        <h3>{{ $contact_message->subject }}</h3>
                                        <span class="info">{{ $contact_message->sender }} | {{ $contact_message->created_at }}</span>
                                    </div>
                                    <div class="edit">
                                        <nav>
                                            <ul>
                                                {{-- here we actually use AJAX, no route--}}
                                                <li><a href="#">View</a></li>
                                                {{-- here we actually use AJAX, no route--}}
                                                <li><a href="#" class="danger">Delete</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </article>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </section>
        </div>
    </div>
    {{--pop window when click view--}}
    <div class="modal" id="contact-message-info">
        <button class="btn" id="modal-close">close</button>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        var token = "{{ Session::token() }}"
    </script>
    {{--put modal before contact-message.js since it will be used --}}
    <script type="text/javascript" src="{{ URL::asset("js/modal.js") }}"></script>
    <script type="text/javascript" src="{{ URL::asset("js/contact-messages.js") }}"></script>
@endsection