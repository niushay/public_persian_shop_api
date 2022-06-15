<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}" >
        <link rel="stylesheet" href="{{url('assets/css/style.css')}}">

        <title>@yield('title')</title>
    </head>

    <body>
        <!-- Form -->
        <div class="container d-flex flex-column align-items-center">
            {{--Show success Messages--}}
            @if(session('success') != null)
                <div class="row mb-2">
                    <div class="col-md-12">
                        <div class="alert alert-success" role="alert">
                            {{session('success')}}
                        </div>
                    </div>
                </div>
            @endif

            @yield('content')
        </div>

        <!-- Optional JavaScript -->
        <script src="{{url('assets/js/jquery-3.6.0.min.js')}}"></script>
        <script src="{{url('assets/js/bootstrap.min.js')}}"></script>
    </body>
</html>
