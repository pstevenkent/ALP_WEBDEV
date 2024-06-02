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

        <!-- Section-->
        
        <section class="py-5">
            @if (Auth::check() && Auth::user()->isAdmin())
            <a href="{{ route('varietal.create') }}" class="btn btn-success">Add Varietal</a>
            @endif
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach ($varietals as $varietal)
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Varietal details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Varietal name-->
                                        <h5 class="fw-bolder">{{ $varietal['name'] }}</h5>
                                    </div>
                                </div>
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                @if (Auth::check() && Auth::user()->isAdmin())
                                <!-- Edit button is available only for admin -->
                                <div class="text-center mb-1"><a href="{{ route('varietal.edit', [$varietal->id]) }}" class="btn btn-warning">Edit</a></div>

                                <!-- Delete button is available only for admin -->
                                <form action="{{ route('varietal.destroy', $varietal->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <div class="text-center"> <button type="submit" class="btn btn-danger" style="color: black;"
                                        onclick="return confirm('Are you sure you want to delete this varietal?')">Delete</button></div>
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