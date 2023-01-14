<?php
/** @var string $contentHTML */
/** @var \App\Core\IAuthenticator $auth */
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <title><?= \App\Config\Configuration::APP_NAME ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../public/css/styl.css">
    <link rel="stylesheet" href="../../public/css/style.css">
    <script src="../../public/js/script.js"></script>

</head>
<body>
<div class="headermain row" id="HM">
    <h1 class="NadpisHeaderMain">Archív na D&D CZ/SK</h1>
</div>
<nav class="navbar navbar-expand-sm  header row">
    <div class="container-fluid">
        <a class="navbar-brand" href="?c=home">
            <img src="../../public/img/d20.png" title="<?= \App\Config\Configuration::APP_NAME ?>" alt="img">
        </a>
        <div class="column"></div>
        <div class="btn-group column head" role="group" aria-label="Basic example">
            <a class="btn btn-dark btn-lg btn-block" href="?c=home&a=contact">Kontakt</a>
            <a class="btn btn-dark btn-lg btn-block" href="?c=predmet">Predmety</a>
            <a class="btn btn-dark btn-lg btn-block" href="?c=character">Postavy</a>
            <a class="btn btn-dark btn-lg btn-block" href="?c=map">Mapy</a>
            <?php if ($auth->isLogged()) { ?>
            <a class="btn btn-dark btn-lg btn-block" href="?c=map">Príbehy</a>
            <?php } ?>
        </div>
        <?php if ($auth->isLogged()) { ?>
            <span class="normal column">Prihlásený používateľ: <b class="textGreen"><?= $auth->getLoggedUserName() ?></b></span>
            <a class="column btn btn-danger btn-sm" href="?c=auth&a=logout">Odhlásenie</a>

        <?php } else { ?>
            <a class="column btn btn-primary btn-sm" href="<?= \App\Config\Configuration::LOGIN_URL ?>">Prihlásenie</a>
        <?php } ?>
        <a class="navbar-brand" href="<?= \App\Config\Configuration::LOGIN_URL ?>">
            <img src="../../public/img/user.png" title="<?= \App\Config\Configuration::APP_NAME ?>" alt="img">
        </a>
    </div>
</nav>
<div class="container-fluid ">
    <div class="web-content">
        <?= $contentHTML ?>
    </div>
</div>
</body>
</html>
