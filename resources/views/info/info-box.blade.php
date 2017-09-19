@section("styles")
    <link type="text/css" rel="stylesheet" href="{{ URL::asset('css/client_side/common.css') }}">
@append

{{--Session info--}}
@if(Session::has('fail'))
    <section class="info-box fail">
        {{ Session::get('fail') }}
    </section>
@endif

@if(Session::has('success'))
    <section class="info-box success">
        {{ Session::get('success') }}
    </section>
@endif

{{--validation errors--}}
@if(count($errors) > 0)
    <section class="info-box fail">
        <ul>
            @foreach($errors->all as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </section>
@endif

