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
            <h2>Add Menu</h2>

            @if (Auth::check() && Auth::user()->isAdmin())
                <form action="{{ route('menu.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <!-- Menu Name -->
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Menu Name" required>
                    </div>

                    <!-- Description -->
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter Description"></textarea>
                    </div>

                    <!-- Price -->
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="Enter Price">
                    </div>

                    <!-- Category -->
                    <div class="form-group">
                        <label for="category_id">Category:</label>
                        <select class="form-control" id="category_id" name="category_id" required>
                            <option value="" selected>Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }} <!-- Adjust as per your Category model -->
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Add more form fields as needed -->
                    <br>
                    <button type="submit" class="btn btn-primary" style="color: black;">Add Product</button>
                </form>
            @else
                <p>You do not have permission to add product.</p>
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