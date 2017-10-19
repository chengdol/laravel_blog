@extends("layouts.admin-main")

@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('css/admin_side/modal.css') }}">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
@endsection

@section("title")
    Contact Message
@endsection

@section("content")
    <div class="container">
        <section class="list">
            {{--loop all categories--}}
            @if(count($contact_messages) == 0)
                <h3>No Message</h3>
            @else
                @foreach($contact_messages as $contact_message)
                    <article data-message="{{ $contact_message->body }}" data-id="{{ $contact_message->id }}" class="contact-message">
                        <div class="message-info">
                            <h3>{{ $contact_message->subject }}</h3>
                            <span class="info">{{ $contact_message->sender }} | {{$contact_message->created_at}}</span>
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
                @endforeach
            @endif
        </section>
        {{--pagination--}}
        @if($contact_messages->lastPage() > 1)
            <section class="pagination">
                {{-- here we use front awesome, need to be included--}}
                @if($contact_messages->currentPage() != 1)
                    <a href="{{ $contact_messages->previousPageUrl() }}"><i class="icon-hand-left"></i></a>
                @endif
                @if($contact_messages->currentPage() != $contact_messages->lastPage())
                    <a href="{{ $contact_messages->nextPageUrl() }}"><i class="icon-hand-right"></i></a>
                @endif
            </section>
        @endif
    </div>
    <div class="modal" id="contact-message-info">
        <button class="btn" id="modal-close">close</button>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        var token = "{{ Session::token() }}"
    </script>
    {{--put modal before contact-message.js since it will be used --}}
    <script type="text/javascript" src="{{ URL::asset('js/modal.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/contact-messages.js') }}"></script>

@endsection







