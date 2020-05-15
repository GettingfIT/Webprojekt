var slideIndex = 0;
showSlide();

function showSlide() {
    var i;
    var slide = document.getElementsByClassName("mySlide");
    for (i = 0; i < slide.length; i++) {
        slide[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slide.length) { slideIndex = 1 }
    slide[slideIndex - 1].style.display = "block";
    setTimeout(showSlide, 5000); // Change image every 5 seconds
}

function plusSlide(n) {
    showSlide(slideIndex += n);
}

function minusSlide(n) {
    showSlide(slideIndex -= n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}