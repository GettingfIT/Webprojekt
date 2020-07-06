<?php
include('header.php');
include('server.php');
?>
<header class="header-section">
    <div class="container-fluid">
        <nav class="main-menu">
            <ul>
                <li class="activeitem"><a href="index.php">Kezdőlap</a></li>
                <li><a href="calculator.php">Kalóriaszámláló és edzéstervek</a></li>
                <li><a href="miniwebshop.php">Mini webshop</a></li>
                <li><a href="about.html">Rólunk</a></li>
            </ul>
        </nav>

        <div class="header-right">
            <div id="user-access">
                <?php if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
                    echo '<div class="dropdown">';
                    echo '<a class="u-name">';
                    echo strtoupper($_SESSION["username"]);
                    echo '</a>';
                    echo '<div class="dropdown-content">
                        <a href="logout.php">Logout</a>
                    </div>';
                    echo '</div>';
                ?>
            </div>
        <?php } else { ?>
            <a href="register.php">Regisztráció</a>
            <a href="login.php">Bejelenkezés</a>
        <?php } ?>
        </div>
    </div>
</header>

<body>
    <div class="main_text">
        <p>Kezd el a fitness karriered <span class="orange">itt!</span></p>
    </div>
    <!-- Slideshow container -->
    <div class="slideshow-container">

        <!-- Full-width images with number-->
        <div class="mySlide">
            <a href="miniwebshop.php"><img src="img/slideshow/slide1.jpg"></a>
        </div>

        <div class="mySlide">
            <a href="miniwebshop.php"><img src="img/slideshow/slide2.jpg"></a>
        </div>

        <div class="mySlide">
            <a href="miniwebshop.php"><img src="img/slideshow/slide3.jpg"></a>
        </div>

        <div class="mySlide">
            <a href="miniwebshop.php"><img src="img/slideshow/slide4.png"></a>
        </div>
    </div>
    <br>
    </div>

    <div class="content">
        <p class="txt-heading">Üdvözlünk oldalunkon!</p>
        <p class="txt-content">E oldal, mint szemináriumi munkaként jött létre. Az oldalak használatához kötelező a bejelentkezés, illetve, ha nincs felhasználói fiók. Akkor könnyedén regisztálhathunk egy újat.</p>
        <p class="txt-content">Mini webshopunkban különböző termékek találhatóak, Kalóriaszámláló oldalunkon pedig edzésterveket, étrendeket és nem utolsó sorban magát a Kalóriaszámlálót is itt találjuk.</p>
        <p class="txt-content text-center txt-heading">Kellemes időtöltést kívánunk az oldalon! :)</p>
    </div>
    <br>

    <script src="js/slideshow.js"></script>
    <?php
    include 'footer.php';
    ?>