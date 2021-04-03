<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Home</title>

</head>

<body>
    <div class="flex w-screen h-screen overflow-hidden" >
        <div class="w-1/12 bg-black text-white">
            <livewire:navbar/>
        </div>
            <!--Muestra el contenido-->
            @yield('content')
            
    </div><!--Container-->
</body>
</html>