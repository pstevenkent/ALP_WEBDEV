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
            <h2>Edit Varietal</h2>

            @if (Auth::check() && Auth::user()->isAdmin())
                <form action="{{ route('varietal.update', ['varietal' => $varietal->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                
                    <!-- Menu Name -->
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $varietal->name }}" required>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-primary" style="color: black;">Update Varietal</button>
                </form>
            @else
                <p>You do not have permission to edit product.</p>
            @endif
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