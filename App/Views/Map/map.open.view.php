<?php
/** @var Array $data */
/** @var IAuthenticator $auth */

use App\Models\Map;
use App\Core\IAuthenticator;
use App\Models\Textmap;
use App\Models\Kategorymap;

/** @var Map $map */
$map = $data['map'];
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

    </div>
    <div class="column middle">
        <div class="row">
            <div class="column middle">
                <h1 class="NadpisSekcia">
                    <?= $map->getNazov() ?> (Typ:
                    <?php foreach (Kategorymap::getAll() as $kateg) { ?>
                        <?php if($map->getKategoria() == $kateg->getId()) {?>
                            <?= $kateg->getNazovKategorie() ?>)
                        <?php } ?>
                    <?php } ?>
                </h1>
                <?php if ($map->getImage()) { ?>
                    <img src="<?= $map->getImage() ?>" class="centerMap" alt="...">
                <?php } ?>
                <p></p>
                <div id="textMap"></div>
                <div class="text-center">
                    <a id="addMapText" class="btn btn-success">Pridať nový popis k mape</a>
                </div>
            </div>


        </div>


    </div>

</body>
