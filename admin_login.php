<?php
include('db_config.php');
include_once('server.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <title>Bejelentkezés</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="signup-form">
        <form action="admin_login.php" method="post">
        <?php include('errors.php'); ?>
            <h2>ADMIN</h2>
            <div class="form-group">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="admin_username" placeholder="Username">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="admin_password" placeholder="Jelszó">
            </div>
            <div class="form-group">
                <button type="submit" class="button" name="login_admin">Bejelentkezés</button>
            </div>
        </form>
        <div class="text-center">Vissza a <a href="login.php">Bejelentkezéshez</a></div>
    </div>
</body>

</html>