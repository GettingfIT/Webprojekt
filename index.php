<?php
include('header.php');
?>
<body>
    <div class="main_text">
        <p>Kezd el a fitness karriered <span class="orange">itt!</span></p>
    </div>

    <!-- Slideshow container -->
    <div class="slideshow-container">

        <!-- Full-width images with number-->
        <div class="mySlides">
            <div class="numbertext">1 / 4</div>
            <img src="img/slideshow/slide1.jpg">
        </div>

        <div class="mySlides">
            <div class="numbertext">2 / 4</div>
            <img src="img/slideshow/slide2.jpg">
        </div>

        <div class="mySlides">
            <div class="numbertext">3 / 4</div>
            <img src="img/slideshow/slide3.jpg">
        </div>

        <div class="mySlides">
            <div class="numbertext">4 / 4</div>
            <img src="img/slideshow/slide4.png">
        </div>

        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>

    <!-- The dots/circles -->
    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
        <span class="dot" onclick="currentSlide(4)"></span>
    </div>


    <center>

    </center>
    </div>

    <div class="content">

        
        <section class="store-info py-lg-4 py-md-4 py-sm-3 py-3" id="service">
            <p class="fs-26 flex-c">COMING SOON</p>
        </section>
    </div>
    <br><br><br><br><br><br><br>


    <script src="js/slideshow.js"></script>
<?php
include('footer.php');
?>
