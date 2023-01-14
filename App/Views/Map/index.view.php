<?php
/** @var Array $data */
/** @var IAuthenticator $auth */
/** @var Map $map */

use App\Core\IAuthenticator;
use App\Models\Map;
use App\Models\Kategorymap;
?>
<head>
    <meta charset="UTF-8">
    <title>Mapy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../public/css/style.css">
</head>
<body>
<div class="row">
    <div class="column side">
        <?php foreach ($data['data'] as $map) { ?>
            <p></p>
            <a type="button" href="#<?=$map->getId()?>" class="btn btn-dark btn-lg row"><?=$map->getNazov()?></a>
        <?php } ?>
    </div>
    <div class="column middle">
        <div class="container-fluid">
            <h1 class="NadpisSekcia">Mapy každého druhu</h1>
            <?php if ($auth->isLogged()) { ?>
                <div class="row">
                    <div class="col">
                        <a href="?c=map&a=create" class="btn btn-success">Pridať novú mapu</a>
                    </div>
                </div>
            <?php } ?>
            <div class="row">
                <?php foreach ($data['data'] as $map) { ?>
                    <div class="col-xl-4 col-md-4 col-sm-6">
                        <div class="card my-3">
                            <div class="card-body">
                                <h5 id="<?= $map->getId() ?>" class="card-title">
                                    <?= $map->getNazov() ?>
                                </h5>

                                <?php if ($map->getImage()) { ?>
                                    <img src="<?= $map->getImage() ?>" class="card-img-top" alt="...">
                                <?php } else {?>
                                    <img src="<?= "public" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "itemDef.png" ?>" class="card-img-top" alt="...">
                                <?php } ?>
                                <p></p>
                                <p align="center">
                                    <a href="?c=map&a=open&id=<?= $map->getId() ?>" class="btn btn-success">Otvoriť</a>
                                    <?php if ($auth->isLogged()) { ?>
                                        <?php if ($map->getAutor() == $auth->getLoggedUserId()) { ?>
                                            <a href="?c=map&a=edit&id=<?= $map->getId() ?>" class="btn btn-warning">Upraviť</a>
                                            <a href="?c=map&a=delete&id=<?= $map->getId() ?>" class="btn btn-danger">Zmazať</a>
                                        <?php } ?>
                                    <?php } ?>
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