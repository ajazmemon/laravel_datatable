<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    
    @yield('style')
</head>
<body>
    <div id="app">
                    @include('include.header')
                    
               
            <!-- <div class="container"> -->
        
        <!--     <main class="py-4"> -->
            
            @yield('content')
        <!-- </main>         -->
            <!-- </div> -->
        

        
    </div>
    <script src="{{ asset('js/app.js') }}" defer></script>
    @include('include.footer')
    @yield('script')
</body>
</html>
