<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <title>Regisztrálás</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/register.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="signup-form">
        <form action="#" method="post">
            <h2>Regisztráció</h2>
            <p class="hint-text">Készítsd el a saját fiókodat. Ingyenes és semennyi időbe nem telik!</p>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-6"><input type="text" class="form-control" name="first_name" placeholder="Név" required="required"></div>
                    <div class="col-xs-6"><input type="text" class="form-control" name="last_name" placeholder="Vezetéknév" required="required"></div>
                </div>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Felhasználó név" required="required">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" required="required">
            </div>
            <div class="form-group">
                <input type="date" class="form-control" name="email" placeholder="Születési dátum" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Jelszó" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="confirm_password" placeholder="Jelszó megerősítése" required="required">
            </div>
            <div class="form-group">
                <label class="checkbox-inline"><input type="checkbox" required="required"> Elfogadom a <a href="https://policies.google.com/terms?hl=en-US">Szerzői feltételeket</a> &amp; <a href="https://policies.google.com/terms?hl=en-US">Adatvédelmi politikát</a></label>
            </div>
            <div class="form-group">
                <button type="submit" class="button">Regisztrálás</button>
            </div>
        </form>
        <div class="text-center">Van már felhasználói fiókja?<a href="login.php">Jelentkezzen be!</a></div>
    </div>
</body>

</html>