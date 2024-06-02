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
            <h2>Add Beans</h2>

            @if (Auth::check() && Auth::user()->isAdmin())
                <form action="{{ route('coffeebean.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <!-- Product Image -->
                    <div class="form-group">
                        <label for="image">Bean Image:</label>
                        <br>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>

                    <!-- Bean Name -->
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Bean Name" required>
                    </div>

                    <!-- Origin -->
                    <div class="form-group">
                        <label for="origin">Origin:</label>
                        <input type="text" class="form-control" id="origin" name="origin" placeholder="Enter Bean Origin">
                    </div>

                    <!-- Process -->
                    <div class="form-group">
                        <label for="process">Process:</label>
                        <input type="text" class="form-control" id="process" name="process" placeholder="Enter Processing Method">
                    </div>

                    <!-- Elevation -->
                    <div class="form-group">
                        <label for="elevation">Elevation:</label>
                        <input type="text" class="form-control" id="elevation" name="elevation" placeholder="Enter Elevation">
                    </div>

                    <!-- Notes -->
                    <div class="form-group">
                        <label for="notes">Notes:</label>
                        <input type="text" class="form-control" id="notes" name="notes" placeholder="Enter Tasting Notes">
                    </div>

                    <!-- Description -->
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter Description"></textarea>
                    </div>

                    <!-- Weight -->
                    <div class="form-group">
                        <label for="weight">Weight:</label>
                        <input type="number" class="form-control" id="weight" name="weight" placeholder="Enter Weight in Grams">
                    </div>

                    <!-- Price -->
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="Enter Price">
                    </div>

                    <!-- Stock -->
                    <div class="form-group">
                        <label for="stock">Stock:</label>
                        <input type="number" class="form-control" id="stock" name="stock" placeholder="Enter Stock Quantity">
                    </div>

                    <!-- Availability -->
                    <div class="form-group">
                        <label for="availability">Availability:</label>
                        <select class="form-control" id="availability" name="availability">
                            <option value="1">Available</option>
                            <option value="0">Not Available</option>
                        </select>
                    </div>

                    <!-- Producer -->
                    <div class="form-group">
                        <label for="producer_id">Producer:</label>
                        <select class="form-control" id="producer_id" name="producer_id" required>
                            <option value="" selected>Select Producer</option>
                            @foreach ($producers as $producer)
                                <option value="{{ $producer->id }}">
                                    {{ $producer->name }} <!-- Adjust as per your Producer model -->
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Varietal -->
                    <div class="form-group">
                        <label for="varietal_id">Varietal:</label>
                        <select class="form-control" id="varietal_id" name="varietal_id" required>
                            <option value="" selected>Select Varietal</option>
                            @foreach ($varietals as $varietal)
                                <option value="{{ $varietal->id }}">
                                    {{ $varietal->name }} <!-- Adjust as per your Varietal model -->
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Roast Type -->
                    <div class="form-group">
                        <label for="roasttype_id">Roast Type:</label>
                        <select class="form-control" id="roasttype_id" name="roasttype_id" required>
                            <option value="" selected>Select Roast Type</option>
                            @foreach ($roasttypes as $roasttype)
                                <option value="{{ $roasttype->id }}">
                                    {{ $roasttype->name }} <!-- Adjust as per your Roasttype model -->
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