<?php
include('header.php');
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}

?>
<header class="header-section">
    <div class="container-fluid">
        <nav class="main-menu">
            <ul>
                <li><a href="index.php">Kezdőlap</a></li>
                <li class="activeitem"><a href="calculator.php">Kalóriaszámláló és edzéstervek</a></li>
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
<script src="js/jsCALC.js"></script>
<script src="js/plans.js"></script>

<body>
    <div class="row clearfix">
        <div class="pt-3 pb-3 rounded col">
            <form class="form-control col-md-12 orangebg m-l-10">
                <h1 class="text-center">Töltse ki az alábbi mezőket!</h1>
                <h4 class="text-center">Kalória számláló</h4>
                <div class="form-group">
                    <label for="female">Nő:</label>
                    <input id="female" type="radio" name="gender" onchange="calsPerDay()">
                    <label for="male" class="b">Férfi:</label>
                    <input id="male" type="radio" name="gender" onchange="calsPerDay()" checked>
                </div>
                <div class="form-group">
                    <label>Kor:
                        <input id="age" type="number" oninput="calsPerDay()" value="21">
                        év</label>
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
                    <p class="white">kilogrammokban</p>
                    <label>
                </div>
                <p class="white">Az ön metabolizmusa: <span id="totalCals"></span> Napi kcal bevitel</p>
                </label>
            </form>
        </div>
        <div class="col content col-md-7 pt-3 pb-3">
            <p class="text-center fs-20">Edzéstervek és étrendek</p>
            <label for="genre">Neme:</label>

            <select name="genre" id="genre">
                <option value="man">Férfi</option>
                <option value="woman">Nő</option>
            </select>
            <label for="difficulty">Nehézségi szint:</label>

            <select name="difficulty" id="difficulty">
                <option value="beginner">Kezdő</option>
                <option value="advanced">Haladó</option>
            </select>

            <input type="button" class="btn" onclick="giveBackPlan()" name="search" value="search">
            <div id="woman-beginner">
                <p class="set">1.Set</p>
                <p>• Helyben futás térdemeléssel 30 sec</p>
                <p>• Mountain climbers 30 sec </p>
                <p class="set">2.Set</p>
                <p>• Guggolásból felugrás 30db</p>
                <p>• Plank 90 másodperc</p>
                <p class="set">3.Set</p>
                <p>• Jumping jack 60 sec</p>
                <p>• Mountain climbers 60 sec</p>
                <p class="set">4.Set</p>
                <p>• Mélyguggolásban lábujjhegyre emelkedés 30 ismétlés</p>
                <p>• Kitörés oldalanként 30</p>
                <p class="set">5.Set</p>
                <p>• Burpie 30db</p>
                <p>• Side plank 1 perc</p>
                <p>• Helyben futás térdemeléssel 60 sec (sprint)</p>
                <p>• Side plank 1 perc (másik oldal)</p>
            </div>
            <div id="woman-advanced">
                <p class="set">5.Set</p>
                <p>• Oldalemelés 1.5 literes vizes flakonnal (ami tele van) 20 ismétlés</p>
                <p>• Előreemelés (front rases) 15 ismétlés</p>
                <p class="set">6.Set</p>
                <p>• Négykézláb egyik láb kinyújtva, lábemelés 20 ismétlés</p>
                <p>• Mountain climbers 60 sec</p>
                <p>• Négykézláb másik láb kinyújtva, lábemelés 20 ismétlés</p>
                <p class="set">7.Set</p>
                <p>• Oldalemelés 1.5 literes vizes flakonnal (ami tele van) 20 ismétlés</p>
                <p>• Előreemelés (front rases) 15 ismétlés</p>
                <p class="set">8. Set</p>
                <p>• Ha lehet valamire felállva lábujjhegyre emelkedés 30 ismétlés</p>
                <p>• Guggolás 30 ismétlés</p>
                <p>• Ha lehet valamire felállva lábujjhegyre emelkedés 30 ismétlés</p>
                <p>• Guggolás 30 ismétlés</p>
                <p class="set">9.Set</p>
                <p>• Négykézláb egyik láb kinyújtva, másik kéz kinyújtva előre lábemelés/karemelés 20 ismétlés</p>
                <p>• Jumping Jack 1 perc</p>
                <p class="set">10.Set ez mehet 2x is</p>
                <p>• Homorítás nyújtott kézzel 20 ismétlés</p>
                <p>• Burpie 30db</p>
                <p>• Medence emelés két lábbal a földön fenékhez közel a sarok 30 ismétlés</p>
                <p>• Homorítás nyújtott kézzel 20 ismétlés</p>
                <p>• Medence emelés két lábbal a földön fenéktől távol a sarok 30 ismétlés</p>
            </div>
            <div id="man-beginner">
                <p class="set">1. nap</p>
                <p>• Bemelegítés + 10p bicikli és 20p kardió</p>
                <p>• Fekvenyomás 4x10 (working set)</p>
                <p>• Fekvenyomás kézisúlyzóval 30 fokos padon 4x8-10 (working set)</p>
                <p>• Tárogatás csigán 2x 12-15 felulről 2x12-15 középre 2x12-15 alulról vagy 5x15 gépen</p>
                <p>• Mellből nyomás gépen 3x15-20</p>
                <p>• Karnyútás csigán kötéllel vagy rúddal 4x8-12</p>
                <p>• Karnyujtás csigán kötéllel fej felett 4x10</p>
                <p>• Tolockodás 4x8-10</p>
                <p>• Nyujtás mellre és tricepszre 15p</p>
            </div>
            <div id="man-advanced">
                <p class="set">2. nap</p>
                <p>• Lehúzás csigán mellhez 3x10</p>
                <p>• Lehuzás csigán mellhez szűk fogássaé 3x10</p>
                <p>• Hashozhúzás 4x10</p>
                <p>• Pull over csigán kötéllel 4x12-15</p>
                <p>• Karhajlítás francia rúddal 4x10</p>
                <p>• Karhajlítás ülve kézisúlyzókkal 4x10 (5-ös váltással karonként 10 szóval 5-5-5-5=1 sorozat )</p>
                <p>• Váltottkezes karhajlítás állva kézisúlyzóval kalapácsfogással 4x10 (szóval 20 ig számolsz akkor lezs oldalanként 10)</p>
                <p>• Karhajéítás csigán alulról kötéllel kalapácsfogással 3x8-10</p>
                <p>• Rúddal 4-5x15-20 ismétlés egyenes rúddal</p>
                <p>• Felső madárfogás egyenes rúdon csukló dorsalflexió 4x15-20</p>
                <p>• Nyújtás hátra és bicepszre</p>
            </div>
        </div>
    </div>
</body>
<?php
include('footer.php');
?>