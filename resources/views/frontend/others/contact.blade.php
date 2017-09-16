@extends("layouts.main")

@section("title")
    Contact
@endsection

@section("styles")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset("css/client_side/form.css") }}">
@endsection

@section("content")
    @include("info.info-box")
    <form action="" method="post" id="contact-form">
        <div class="input-group">
            <label for="name">Your Name</label>
            <input type="text" id="name" name="name">
        </div>
        <div class="input-group">
            <label for="email">Your E-mail</label>
            <input type="email" id="email" name="email">
        </div>
        <div class="input-group">
            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject">
        </div>
        <div class="input-group">
            <label for="message">Your Message</label>
            <textarea id="message" name="message" rows="10"></textarea>
        </div>
        <input type="submit" name="Submit" class="btn">
        <input type="hidden" value="{{ Session::token() }}" name="_token">
    </form>
@endsection