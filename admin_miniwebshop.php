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
                        <a href="">Profil</a>
                        <a href="">Rendelesek</a>
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
        <div class="div1 justify-content-center">
            <?php

            if (isset($update) || isset($add_new)) { ?>
                <div class="div2-admin">
                    <h2>Vigye be a kívánt terméket</h2>
                    <form method="GET">
                        <input type="hidden" name="operation[<?php echo key($operation) ?>]" value="<?php echo $operation[key($operation)] ?>">
                        <div class="hozzaadas"><span class='span5'>Név</span><input type="text" name="nev" value="<?php if (isset($update)) {
                                                                                                                        echo $update['nev'];
                                                                                                                    } ?>">
                        </div>
                        <div class="hozzaadas"><span class='span5'>Ár</span><input type="text" name="ar" value="<?php if (isset($update)) {
                                                                                                                    echo $update['ar'];
                                                                                                                } ?>">
                        </div>
                        <div class="hozzaadas"><span class='span5'>Kép</span><input type="text" name="kep" value="<?php if (isset($update)) {
                                                                                                                        echo $update['kep'];
                                                                                                                    } ?>">
                        </div>
                        <div class="hozzaadas">
                            <span class='span5'> Leírás</span>
                            <textarea name="leiras" cols="25" rows="10"><?php
                                                                        if (isset($update)) {
                                                                            echo $update['leiras'];
                                                                        } ?></textarea>

                        </div>
                        <button class="nagy-gomb" type="submit" name="submit" value="true">Küldés</button>
                    </form>
                </div>
            <?php } else
                echo '<div class="div2-admin">
        <form class="span1" method="GET">
        <button class="nagy-gomb" type="submit" name="operation[add_new]" value="true">Hozzáadás</button>
        </form>
        </div>';
            ?>
        </div>
        <div class='product'>
            <?php
            $results = false;
            if (isset($_POST['submit']) && isset($_POST['kereses'])) {
                $kereses = trim($_POST['kereses']);

                $search = "SELECT * FROM `products` WHERE nev LIKE '%$kereses%' or leiras LIKE '%$kereses%'";

                $results = mysqli_query($db, $search) or die('a lekerdezes nem mukodott');
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
            <div class='container-btns>
            <img src='img/icons/update.png' alt='control' name='update'>
            <img src='img/icons/delete.png' alt='control' name='delete'>
            </div>
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
                    <div class='container-btns'>
                    <img class='ctrl-btns' src='img/icons/update.png' name='update' alt='control'>
                    <img class='ctrl-btns' src='img/icons/delete.png' name='delete' alt='control'>
                    </div>
                    </div>
                    ";
                }

            ?>
        </div>
        <br>
    <?php
    include('footer.php');
} else {
    echo "0 results";
}
$db->close();

    ?>

    <?php
    if (isset($_GET['operation'])) {
        if (isset($_GET['submit'])) {
            $exceptions = array('submit', 'operation');
            foreach ($_GET as $key => $value) {
                if (!in_array($key, $exceptions)) {
                    $sql_array[] = "`{$key}` = '" . $value . "'";
                }
            }
        }
        $operation = $_GET['operation'];
        switch (key($operation)) {
            case 'add_new':
                if (isset($_GET['submit'])) {
                    $sql = "INSERT INTO products SET ";
                    $sql .= implode(', ', $sql_array);
                } else {
                    $add_new = true;
                }
                break;
            case 'update':
                if (isset($_GET['submit'])) {
                    $sql = "UPDATE products SET ";
                    $sql .= implode(', ', $sql_array);
                    $sql .= " WHERE ID = '" . $operation['update'] . "'";
                } else {
                    $sql = "SELECT * FROM products WHERE ID = " . $operation['update'];
                    if ($result = mysqli_query($db, $sql)) {
                        $update = $result->fetch_assoc();
                    }
                }
                break;
            case 'delete':
                $sql = "DELETE FROM products WHERE ID = '" . $operation['delete'] . "'";
                break;
        }
        // kuldes a szervernek
        if (isset($_GET['submit']) || key($operation) == 'delete') {
            if ($db->query($sql) == true) {
                echo "<h2 class='siker'>A művelet sikeresen végrehajtódott!</h2>";
            }
        }
    }
    ?>