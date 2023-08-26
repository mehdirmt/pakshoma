<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">
    @yield('custom_styles')
</head>
<body>

@section('content')
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <a class="navbar-brand" href="/">Pakshoma</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cart.index') }}">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin</a>
                    </li>
                </ul>
            </div>
        </nav>


        @if(session()->has('flash_message'))
            <div class="row">
                <div class="col-md-12">
                    @if('success' === session('flash_message')['type'])
                        <div class="alert alert-success" role="alert">
                            {{ session('flash_message')['message'] }}
                        </div>
                    @else
                        <div class="alert alert-danger" role="alert">
                            {{ session('flash_message')['message'] }}
                        </div>
                    @endif
                </div>
            </div>
        @endif

        @yield('content')

    </div>

    <script src="{{ asset('/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>

    @yield('custom_scripts')

</body>
</html>
