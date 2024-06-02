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
        <header class="py-5" style="background-image: url('{{ asset('images/beansbg1.png') }}'); background-size: cover; background-position: center;">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Shop Coffee Beans</h1>
                    <p class="lead fw-normal text-white mb-0">Our vision is to share happiness and great coffee in a cup. Quality, Transparency, and Sharing!</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        
        <section class="py-5">
            @if (Auth::check() && Auth::user()->isAdmin())
            <a href="{{ route('coffeebean.create') }}" class="btn btn-success">Add Bean</a>
            @endif
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach ($coffeebeans as $bean)
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Product image-->
                                <img class="card-img-top" src="{{ asset('images/' . $bean['image']) }}" alt="..." />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">{{ $bean['name'] }}</h5>
                                        <!-- Product price-->
                                        Rp{{ $bean['price'] }}.000 <br>
                                        {{ $bean->roasttype->name }}
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center mb-1"><a class="btn btn-outline-dark mt-auto" href="{{ route('coffeebean.show', [$bean->id]) }}">View Details</a></div>
                                @if (Auth::check() && Auth::user()->isAdmin())
                                <!-- Edit button is available only for admin -->
                                <div class="text-center mb-1"><a href="{{ route('coffeebean.edit', [$bean->id]) }}" class="btn btn-warning">Edit</a></div>

                                <!-- Delete button is available only for admin -->
                                <form action="{{ route('coffeebean.destroy', $bean->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <div class="text-center"> <button type="submit" class="btn btn-danger" style="color: black;"
                                        onclick="return confirm('Are you sure you want to delete this product?')">Delete</button></div>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
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