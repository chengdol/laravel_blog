<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog Admin</title>
    <link rel="stylesheet" href="{{ URL::asset("css/admin_side/admin.css") }}">
    @yield("styles")
</head>
<body>
    @include("includes.admin-header")
    @yield("content")
    {{-- add ajax to operate --}}
    <script type="text/javascript">
        // find base url, later to attach parameters on it
        var baseUrl = "{{ URL::asset('/') }}";

    </script>
    @yield("scripts")
</body>
</html>