@extends('layouts.template')

@section('layout_content')

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Header-->
        <header class="py-5" style="background-image: url('{{ asset('images/drinkbg1.png') }}'); background-size: cover; background-position: center;">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-black">
                    <h1 class="display-4 fw-bolder">Drink Selection</h1>
                    <p class="lead fw-normal text-black mb-0">Dedicated to bring you happiness and brightness through our drinks</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            @if (Auth::check() && Auth::user()->isAdmin())
            <a href="{{ route('menu.create') }}" class="btn btn-success">Add Menu</a>
            @endif
            <h5 class="fw-semibold mb-0">All our prices are quoted in thousand Indonesian Rupiah</h5>
            <div class="container px-4 px-lg-5 mt-5">
                @foreach ($menus as $menu)
                    <div class="row mb-3 align-items-center">
                        <div class="col-md-6">
                            <h4 class="fw-semibold mb-0">{{ $menu['name'] }} - {{ $menu['price'] }}</h4>
                            <p class="mb-0">{{ $menu['description'] }}</p>
                            {{-- <p class="mb-0">Category : {{ $menu->categories->'name' }}</p> --}}
                        </div>
                            @if (Auth::check() && Auth::user()->isAdmin())
                                <!-- Edit button is available only for admin -->
                                <div class=" mb-1"><a href="{{ route('menu.edit', [$menu->id]) }}" class="btn btn-warning">Edit</a></div>

                                <!-- Delete button is available only for admin -->
                                <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <div class="mb-1"> <button type="submit" class="btn btn-danger" style="color: black;"
                                        onclick="return confirm('Are you sure you want to delete this product?')">Delete</button></div>
                                </form>
                            @endif
                    </div>
                @endforeach
            </div>
            
        </section>
        
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Hana Roastery 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
@endsection