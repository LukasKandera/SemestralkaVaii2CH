<?php
/** @var Array $data */
/** @var IAuthenticator $auth */
use App\Models\Predmet;
use App\Core\IAuthenticator;
/** @var Predmet $predmet */
$predmet = $data['predmet'];
?>

<head>
    <meta charset="UTF-8">
    <title>Nehráčske postavy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
<div class="header" >
    <h1>Predmety</h1>
</div>

<div class="row">
    <div class="column side">
        <ul>
            <li><a href="../HlavnaStranka.html">Hlavná stránka</a></li>
            <li><a href="?c=predmet">Predmety</a></li>
            <li><a href="rozbockaNPostavy.html">Nehráčské postavy</a></li>
            <li><a href="Mapy.html">Mapy</a></li>
            <li><a href="rozbockaAutori.html">Autorská rubrika</a></li>
        </ul>
    </div>

    <div class="column middle">
        <h1 class="NadpisThema"><?= $predmet->getNadpis() ?></h1>
        <h2 class="NadpisKTextu"><?= $predmet->getDruh() ?></h2>
        <div class="podnadpis1">Popis:</div>
        <p><?= $predmet->getText() ?></p>

        <?php if ($predmet->getImage()) { ?>
            <img src="<?= $predmet->getImage() ?>" class="imgCenter" alt="...">
        <?php } else {?>
            <img src="<?= "public" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "itemDef.png" ?>" class="imgCenter" alt="...">
        <?php } ?>
    </div>
</div>

</body>
