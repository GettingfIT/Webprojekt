<?php
include('db_config.php');
include('header.php');
session_start();
$query = "SELECT * FROM `products`";
$result = mysqli_query($db, $query);

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
                $sql .= " WHERE product_id = '" . $operation['update'] . "'";
            } else {
                $sql = "SELECT * FROM products WHERE product_id = " . $operation['update'];
                if ($result = mysqli_query($db, $sql)) {
                    $update = $result->fetch_assoc();
                }
            }
            break;
        case 'delete':
            $sql = "DELETE FROM products WHERE product_id = '" . $operation['delete'] . "'";
            break;
    }
    // kuldes a szervernek
    if (isset($_GET['submit']) || key($operation) == 'delete') {
        if ($db->query($sql) == true) {
            echo "<h2 class='siker'>A művelet sikeresen végrehajtódott!</h2>";
        }
    }
}

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

    <div class="content rounded">
        <p class="fs-26 flex-c p-t-12">Termekek kezelese</p>
        <div class="div1 justify-content-center">

        </div>
        <div class='product rounded'>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "
                <div class='div-product-admin rounded'>
                <img class='product-pic-admin' src='" . $row["product_picture"] . "' alt='pic'>
                <p class='name-admin m-l-6 m-r-6'><b>Termék neve: </b>" . $row["product_name"] . "</p>
                <p class='price-admin m-l-6 m-r-6'><b>Termék ára: </b>"  . $row["product_price"] . "€.</p>
                <p class='weight-admin m-l-6 m-r-6'><b>Termék súlya: </b>" . $row["product_weight"] . "kg.</p>
                <span class='description-admin m-l-6 m-r-6'><b>Termék leírás: </b>" . $row["product_desc"] . "</span>
                <form class='gombok' method='GET'>
                <button type='submit' alt='control' name='operation[update]' value='" . $row["product_id"] . "'>Update</button>
                <button type='submit' alt='control' name='operation[delete]' value='" . $row["product_id"] . "'>Delete</button>
                </form>
                </div>
                ";
            }
            ?>
            <br>
            <?php

    if (isset($update) || isset($add_new)) { ?>
        <div class="div2-admin">
            <h2>Vigye be a kívánt terméket</h2>
            <form method="GET">
                <input type="hidden" name="operation[<?php echo key($operation) ?>]" value="<?php echo $operation[key($operation)] ?>">
                <div class="hozzaadas"><span class='span5'>Név</span><input type="text" name="product_name" value="<?php if (isset($update)) {
                                                                                                                echo $update['product_name'];
                                                                                                            } ?>">
                </div>
                <div class="hozzaadas"><span class='span5'>Ár</span><input type="text" name="product_price" value="<?php if (isset($update)) {
                                                                                                            echo $update['product_price'];
                                                                                                        } ?>">
                </div>
                <div class="hozzaadas"><span class='span5'>Súly</span><input type="text" name="product_weight" value="<?php if (isset($update)) {
                                                                                                                echo $update['product_weight'];
                                                                                                            } ?>">
                </div>
                <div class="hozzaadas"><span class='span5'>Kép</span><input type="text" name="product_picture" value="<?php if (isset($update)) {
                                                                                                                echo $update['product_picture'];
                                                                                                            } ?>">
                </div>
                <div class="hozzaadas">
                    <span class='span5'> Leírás</span>
                    <textarea name="product_desc" cols="25" rows="10"><?php
                                                                if (isset($update)) {
                                                                    echo $update['product_desc'];
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
    </div>
    <br>
<?php
    include('footer.php');
}
$db->close();

?>