<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <metaa name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $pagetitle }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href="{{ asset('css/aboutus.css') }}" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        

</head>

<body>
    @include('layouts.navigation')

    <div class="container mt-5">
        <h1>{{ $maintitle }}</h1>

       <h2>@yield('layout_tagline')</h2> 
        @yield('layout_content')
    </div>
</body>

</html>