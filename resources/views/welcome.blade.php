<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        

        <title>Tetris</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css', array(), true) }}">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check() && Auth::user()->isAdmin())
                        <a href="{{ url('/admin') }}">Home</a>
                    @elseif(Auth::check() && Auth::user()->isProfessor())
                        <a href="{{ url('/professor') }}">Home</a>
                    @endif
                    @if (!Auth::check())
                        <a href="{{ url('/login') }}">Login</a>
                        {{-- <a href="{{ url('/register') }}">Register</a> --}}
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <img class="image-home-logo" src="images/tetris.png" alt="tetris logo home">
                </div> 
            </div>
        </div>
    </body>
</html>
