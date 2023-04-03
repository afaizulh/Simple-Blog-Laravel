<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{-- CSS Boostrap --}}
    <link href="{{ asset('bootstrap-5/css/bootstrap.min.css') }}" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    {{-- JS Bootstrap --}}
    <script src="{{ asset('bootstrap-5/js/bootstrap.bundle.min.js') }}"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    {{-- Font Style --}}
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900&amp;display=swap" rel="stylesheet">

    {{-- CDN Fontawesome --}}
    <script src="https://kit.fontawesome.com/dfdc9ae7ac.js" crossorigin="anonymous"></script>

    {{-- JS Alert Auto Close --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    {{-- Alert JS --}}
    <script type="text/javascript">
        $(document).ready(function() {

            window.setTimeout(function() {
                $(".alert").fadeTo(1000, 0).slideUp(300, function() {
                    $(this).remove();
                });
            }, 4000);

        });
    </script>
</head>

<body>

    @include('layouts.app.header')

    <div class="container my-4">

        @yield('content')

    </div>

    @include('layouts.app.footer')
</body>

</html>
