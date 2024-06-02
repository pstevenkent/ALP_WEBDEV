// public/js/slideshow.js

var slideIndex = 1; // Initialize slideIndex to 1
showSlides(slideIndex); // Pass the initial slideIndex to showSlides

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");

    if (n > slides.length) {
        slideIndex = 1;
    }

    if (n < 1) {
        slideIndex = slides.length;
    }

    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    slides[slideIndex - 1].style.display = "block";
}

function plusSlides(n) {
    showSlides((slideIndex += n));
}
