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
<?php
include('footer.php');
?>