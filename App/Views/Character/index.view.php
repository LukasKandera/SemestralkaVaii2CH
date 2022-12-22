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
                                    <img src="<?= "public" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "charDefault.png" ?>" class="card-img-top" alt="...">
                                <?php } ?>
                                <p></p>
                                <p align="center">
                                    <a href="?c=character&a=open&id=<?= $character->getId() ?>" class="btn btn-success">Otvoriť</a>
                                    <a href="?c=character&a=edit&id=<?= $character->getId() ?>" class="btn btn-warning">Upraviť</a>
                                    <a href="?c=character&a=delete&id=<?= $character->getId() ?>" class="btn btn-danger">Zmazať</a>
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
