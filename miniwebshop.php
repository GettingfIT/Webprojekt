<?php
include('db_config.php');
include('header.php');
session_start();
$query = "SELECT * FROM `products`";
$result = mysqli_query($db, $query);
if (mysqli_num_rows($result) > 0) {
?>
    <header class="header-section">
        <div class="container-fluid">
            <nav class="main-menu">
                <ul>
                    <li><a href="index.php">Kezdőlap</a></li>
                    <li><a href="calculator.php">Kalóriaszámláló és edzéstervek</a></li>
                    <li class="activeitem"><a href="miniwebshop.php">Mini webshop</a></li>
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
                <a href="login.php">Bejelentkezés</a>
            <?php } ?>
            </div>
        </div>
    </header>

    <div class="content">
            <p class="fs-26 flex-c p-t-12">MINI SHOP FITNESS ŐRÜLTEKNEK</p>
            <div class='product'>
            <?php
            $results = false;
            if (isset($_POST['submit']) && isset($_POST['kereses'])) {
                $kereses = trim($_POST['kereses']);

                $search = "SELECT * FROM `products` WHERE nev LIKE '%$kereses%' or leiras LIKE '%$kereses%'";

                $results = mysqli_query($conn, $search) or die('a lekerdezes nem mukodott');
            }
            if ($results)
                while ($row = $results->fetch_assoc()) {
                    echo "
                    
            <div class='div-product flex-row'>
            <img class='product-pic' src='" . $row["product_picture"] . "' alt='pic'>
            <b><p class='name'>" . $row["product_name"] . "</p></b>
            <p class='price'>" . $row["product_price"] . "€.</p>
            <p class='weight'>" . $row["product_weight"] . "kg.</p>
            <span class='description'>" . $row["product_desc"] . "</span>
            </div>";
                } else
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <div class='div-product'>
                    <img class='product-pic' src='" . $row["product_picture"] . "' alt='pic'>
                    <p class='name'>" . $row["product_name"] . "</p>
                    <p class='price'>"  . $row["product_price"] . "€.</p>
                    <p class='weight'>" . $row["product_weight"] . "kg.</p>
                    <span class='description'>" . $row["product_desc"] . "</span>
                    </div>
                    ";
                }

            ?>
            </div>
            <button class="checkout">CHECKOUT</button>
    </div>
    <br>
<?php
    include('footer.php');
} else {
    echo "0 results";
}
$db->close();

?>