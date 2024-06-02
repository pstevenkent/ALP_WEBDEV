@extends('layouts.template')

@section('layout_content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Item - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
    <!-- Product section -->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-2">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6">
                    <img class="card-img-top mb-5 mb-md-0" src="{{ asset('images/' . $coffeebean['image']) }}" alt="..." />
                </div>
                <div class="col-md-6">
                    <h1 class="display-5 fw-bolder">{{ $coffeebean['name'] }}</h1>
                    <div class="fs-4 mb-0">
                        <span>Rp{{ $coffeebean['price'] }}.000</span>
                    </div>
                    <div class="fs-7 mb-0">
                        <span>Origin: {{ $coffeebean['origin'] }}</span>
                    </div>
                    <div class="fs-7 mb-0">
                        <span>Producer: {{ $coffeebean->producer->name }}</span>
                    </div>
                    <div class="fs-7 mb-0">
                        <span>Process: {{ $coffeebean['process'] }}</span>
                    </div>
                    <div class="fs-7 mb-0">
                        <span>Elevation: {{ $coffeebean['elevation'] }}</span>
                    </div>
                    <div class="fs-7 mb-0">
                        <span>Varietals: {{ $coffeebean->varietal->name }}</span>
                    </div>
                    <div class="fs-7 mb-0">
                        <span>Net Weight: {{ $coffeebean['weight'] }} gram</span>
                    </div>
                    <div class="fs-7 mb-2">
                        <span>Roasted for {{ $coffeebean->roasttype->name }}</span>
                    </div>
                    <div class="fs-5 mb-0">
                        <span>What we found: {{ $coffeebean['notes'] }}</span>
                    </div>
                    <p class="lead">{{ $coffeebean['description'] }}</p>
                    <div class="d-flex">
                        <!-- Add to Cart button -->
                        <form action="{{ route('add-to-cart', ['coffeeBean' => $coffeebean->id]) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-outline-dark flex-shrink-0" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                Add to cart
                            </button>
                        </form>
                    </div>
                    <!-- Add more details as needed -->
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Hana Roastery 2023</p>
        </div>
    </footer>
    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS -->
    <script src="js/scripts.js"></script>
</body>
</html>
@endsection
