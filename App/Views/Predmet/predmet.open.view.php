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
    <title>Predmety</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../public/css/style.css">
</head>
<body>
<div class="header row" >
    <h1>Predmety</h1>
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
        <h1 class="NadpisThema"><?= $predmet->getNadpis() ?></h1>
        <h2 class="NadpisKTextu">
            <?= $predmet->getDruh() ?>, <?= $predmet->getJedinecnost() ?>
            <?php if($predmet->isSladeni()) {?>
                (Vyžaduje sladení)
            <?php } ?>
        </h2>
        <h2 class="NadpisKTextu">
            Cena: <?= $predmet->getCena() ?> zlatých
        </h2>
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
