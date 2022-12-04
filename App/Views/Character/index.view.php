<?php
/** @var Array $data */
/** @var IAuthenticator $auth */
/** @var Character $character */

use App\Core\IAuthenticator;
use App\Models\Character;

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
            <li><a href="?c=character">Nehráčské postavy</a></li>
            <li><a href="Mapy.html">Mapy</a></li>
            <li><a href="rozbockaAutori.html">Autorská rubrika</a></li>
        </ul>
    </div>

    <div class="column middle">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <a href="?c=character&a=create" class="btn btn-success">Pridať novú postavu</a>
                </div>
            </div>
            <div class="row">
                <?php foreach ($data['data'] as $character) { ?>
                    <div class="col-xl-4 col-md-4 col-sm-6">
                        <div class="card my-3">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?= $character->getMeno() ?>
                                </h5>

                                <?php if ($character->getObrazok()) { ?>
                                    <img src="<?= $character->getObrazok() ?>" class="card-img-top" alt="...">
                                <?php } else {?>
                                    <img src="<?= "public" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "itemDef.png" ?>" class="card-img-top" alt="...">
                                <?php } ?>
                                <p></p>
                                <p align="center">
                                    <a href="?c=predmet&a=open&id=<?= $character->getId() ?>" class="btn btn-success">Otvoriť</a>
                                    <a href="?c=predmet&a=edit&id=<?= $character->getId() ?>" class="btn btn-warning">Upraviť</a>
                                    <a href="?c=predmet&a=delete&id=<?= $character->getId() ?>" class="btn btn-danger">Zmazať</a>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

</body>
