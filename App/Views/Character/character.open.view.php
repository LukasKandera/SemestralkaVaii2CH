<?php
/** @var Array $data */
/** @var IAuthenticator $auth */

use App\Models\Character;
use App\Core\IAuthenticator;
/** @var Character $character */
$character = $data['character'];
?>

<head>
    <meta charset="UTF-8">
    <title>Nehráčske postavy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../public/css/style.css">
</head>
<body>
<div class="header row" >
    <h1>Nehráčske postavy</h1>
</div>

<div class="row">
    <div class="column side">
        <ul>
            <li><a href="/index.php">Hlavná stránka</a></li>
            <li><a href="?c=predmet">Predmety</a></li>
            <li><a href="?c=character">Nehráčské postavy</a></li>
            <li><a href="?c=map">Mapy</a></li>
            <li><a href="?c=scroll">Autorská rubrika</a></li>
        </ul>
    </div>

    <div class="column middle">
        <div class="row">
        <div class="column middle">
            <h1 class="NadpisThema"><?= $character->getMeno() ?></h1>
            <h2 class="NadpisKTextu"><?= $character->getRasa() ?>, <?= $character->getTyp() ?></h2>
            <div class="podnadpis1">Popis:</div>
            <p><?= $character->getPopis() ?></p>
            <div class="podnadpis1">Povaha:</div>
            <p><?= $character->getPovaha() ?></p>
            <div class="podnadpis1">História:</div>
            <p><?= $character->getHistoria() ?></p>
            <div class="podnadpis1">Motivácia:</div>
            <p><?= $character->getMotivacia() ?></p>
            <div class="podnadpis1">Ideály:</div>
            <p><?= $character->getIdealy() ?></p>
            <div class="podnadpis1">Povolanie/Cech:</div>
            <p><?= $character->getPovolanieCech() ?></p>
            <div class="podnadpis1"> Hlas:</div>
            <p><?= $character->getHlas() ?></p>
        </div>
        <div class="column middle">
            <?php if ($character->getObrazok()) { ?>
                <img src="<?= $character->getObrazok() ?>" class="imgBox" alt="...">
            <?php } else {?>
                <img src="<?= "public" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "charDefault.png" ?>" class="imgBox" alt="...">
            <?php } ?>
        </div>
        </div>
    </div>


</div>

</body>

