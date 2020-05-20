<?php
include('header.php');
?>
<header class="header-section">
    <div class="container-fluid">
        <nav class="main-menu">
            <ul>
                <li><a href="index.php">Kezdőlap</a></li>
                <li class="activeitem"><a href="calculator.php">Kalóriaszámláló és edzéstervek</a></li>
                <li><a href="miniwebshop.php">Mini webshop</a></li>
                <li><a href="">Rólunk</a></li>
            </ul>
        </nav>

        <div class="header-right">
            <div id="user-access">
                <a href="register.php">Regisztrálj</a>
                <a href="login.php">Bejelenkezés</a>
            </div>
        </div>
    </div>
</header>
<script src="js/jsCALC.js"></script>

<body>
    <div class="content pt-3 pb-3 rounded">
        <form class="form-control col-md-4 offset-md-4">
            <h1 class="text-center">Töltse ki az alábbi mezőket!</h1>
            <h4 class="text-center">Kalória számláló</h4>
            <div class="form-group">
                <label for="female">Nő:</label>
                <input id="female" type="radio" name="gender" onchange="calsPerDay()">
                <label for="male" class="b">Férfi:</label>
                <input id="male" type="radio" name="gender" onchange="calsPerDay()" checked>
            </div>
            <div class="form-group">
                <label>Kor:</label>
                <input id="age" type="number" oninput="calsPerDay()" value="21">
                év
            </div>
            <div class="form-group">
                <label>Magasság:
                    <input id="height" type="number" oninput="calsPerDay()" value="180">
                    centiméterekben
                </label>
            </div>
            <div class="form-group">
                <label for="weight">Súly:</label>
                <input id="weight" type="number" oninput="calsPerDay()" value="80">
                kilogrammokban
                <label>
            </div>
            Az ön metabolizmus: <span id="totalCals"></span> Napi kcal bevitel
            </label>
        </form>
    </div>
</body>
<?php
include('footer.php');
?>