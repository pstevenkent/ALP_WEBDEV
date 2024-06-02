@extends('layouts.template')
@section('layout_content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Hana's Roastery</title>
    
    <!-- Include the link to your CSS file -->
    <link href="{{ asset('css/aboutus.css') }}" rel="stylesheet" />
    <style>
        .about_box {
            text-align: center;
            box-shadow: 0 0 10px ;
            padding: 20px;
            border-radius: 8px;
            margin: 10px;
        }
        .about_text {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="about_section" style="text-align: center;">
        <h1 class="about_taital">Welcome to Hana's Roastery</h1>
        <div class="about_box">
            <p class="about_text">
                Hana Roastery is a specialty coffee roastery established in Surabaya, 2020.
            </p>
            <p class="about_text">
                Our dream is to be able to “Share happiness through great coffee” and we believe that this dream can only be achieved by sourcing the finest quality coffee and roasting it well to showcase its innate characteristics and complexity.
            </p>
            <p class="about_text">
                With this dream in mind, Quality and Transparency have been our mission since day one.
            </p>
            <p class="about_text">
                We sell roasted beans through retail online marketplace as well as wholesale for coffee shops.
            </p>
        </div>
    </div>

    <div class="schedule_section" style="text-align: center;">
        <h2 style="margin-bottom: 10px;">Opening Hours:</h2>
        <table class="schedule-table" style="width: 100%; background-color: white; color: black; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
            <tr>
                <th>Day</th>
                <th>Availability</th>
            </tr>
            <tr>
                <td>Sunday</td>
                <td>09:00 - 22:00</td>
            </tr>
            <tr>
                <td>Monday</td>
                <td>Closed</td>
            </tr>
            <tr>
                <td>Tuesday</td>
                <td>09:00 - 21:00</td>
            </tr>
            <tr>
                <td>Wednesday</td>
                <td>09:00 - 21:00</td>
            </tr>
            <tr>
                <td>Thursday</td>
                <td>09:00 - 21:00</td>
            </tr>
            <tr>
                <td>Friday</td>
                <td>09:00 - 21:00</td>
            </tr>
            <tr>
                <td>Saturday</td>
                <td>09:00 - 22:00</td>
            </tr>
        </table>
    </div>
    <div class="footer_social_icon" style="text-align: center; margin-top: 40px; margin-bottom: 20px;">
        <p>  
            <a href="https://www.instagram.com/bakedbyrossa/" target="_blank"><img src="images/instagram.jpg" alt="@bakedbyrossa" class="instagram-image" width="45" height="45" style="margin-right: 10px;"></a>
            <a href="https://open.spotify.com/playlist/09Ef1pCOi3lWAvUxk9pva3?si=70Oo3JnOQcqQLvX-fSgNUA&utm_source=copy-link" target="_blank"><img src="images/spotify.jpg" alt="Spotify" class="" width="45" height="45" style="margin-right: 10px;"></a>
        </p>
    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63320.461065120406!2d112.63106644863282!3d-7.294324600000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fd95077b91d1%3A0x7549041355270ec0!2sBaked%20By%20Rossa%20%26%20Hana%20Roastery!5e0!3m2!1sen!2sid!4v1702379363124!5m2!1sen!2sid" width="750" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

<footer class="py-1 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Hana Roastery 2023</p></div>
</footer>
</body>
</html>

@endsection
