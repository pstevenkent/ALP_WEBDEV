<!-- resources/views/home.blade.php -->

@extends('layouts.template')

@section('layout_content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hana's Roastery - Home</title>
    <!-- Include the link to your CSS file -->
    <link href="{{ asset('css/home.css') }}" rel="stylesheet" />
</head>
<body>

<div class="container">
    <div class="slideshow-and-text">
        <div class="slideshow-container">
            <div class="mySlides">
                <img src="{{ asset('images/sketch1.jpg') }}" style="width: 100%; height: auto;">
            </div>
            <div class="mySlides">
                <img src="{{ asset('images/sketch2.jpg') }}" style="width: 100%; height: auto;">
            </div>
            <div class="mySlides">
                <img src="{{ asset('images/sketch3.jpg') }}" style="width: 100%; height: auto;">
            </div>
            <div class="mySlides">
                <img src="{{ asset('images/sketch4.jpg') }}" style="width: 100%; height: auto;">
            </div>
            <div class="mySlides">
                <img src="{{ asset('images/sketch5.jpg') }}" style="width: 100%; height: auto;">
            </div>

            <!-- Add more slides as needed -->

            <button class="prev-button" onclick="plusSlides(-1)">&#10094;</button>
            <button class="next-button" onclick="plusSlides(1)">&#10095;</button>
        </div>

        <div class="coffee-specialty-section">
            <h2>Hana Roastery</h2>
            <p>Discover our unique and flavorful coffee selections crafted with passion and expertise.</p>
        </div>
    </div>
</div>

<footer class="footer-section">
    <p class="location-text">Copyright &copy; Hana Roastery 2023</p>
</footer>

<script src="{{ asset('js/slideshow.js') }}"></script>

</body>
</html>

@endsection
{{-- 
<x-app-layout>

<div class="container">
    <div class="slideshow-and-text">
        <div class="slideshow-container">
            <div class="mySlides">
                <img src="{{ asset('images/sketch1.jpg') }}" style="width: 100%; height: auto;">
            </div>
            <div class="mySlides">
                <img src="{{ asset('images/sketch2.jpg') }}" style="width: 100%; height: auto;">
            </div>
            <div class="mySlides">
                <img src="{{ asset('images/sketch3.jpg') }}" style="width: 100%; height: auto;">
            </div>
            <div class="mySlides">
                <img src="{{ asset('images/sketch4.jpg') }}" style="width: 100%; height: auto;">
            </div>
            <div class="mySlides">
                <img src="{{ asset('images/sketch5.jpg') }}" style="width: 100%; height: auto;">
            </div>

            <!-- Add more slides as needed -->

            <button class="prev-button" onclick="plusSlides(-1)">&#10094;</button>
            <button class="next-button" onclick="plusSlides(1)">&#10095;</button>
        </div>

        <div class="coffee-specialty-section">
            <h2>Hana Roastery</h2>
            <p>Discover our unique and flavorful coffee selections crafted with passion and expertise.</p>
        </div>
    </div>
</div>

<footer class="footer-section">
    <p class="location-text">Copyright &copy; Hana Roastery 2023</p>
</footer>

<script src="{{ asset('js/slideshow.js') }}"></script>
</x-app-layout> --}}