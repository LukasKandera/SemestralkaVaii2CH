
<?php
/** @var Array $data */
/** @var IAuthenticator $auth */
/** @var Predmet $predmet */

use App\Core\IAuthenticator;
use App\Models\Druhpredmets;
use App\Models\Jedinecnostpredmets;
use App\Models\Predmet;

?>

<head>
    <meta charset="UTF-8">
    <title>Predmety</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../public/css/style.css">
</head>
<body>


<div class="row">
    <div class="column side">

    </div>
    <div class="column middle">
        <div class="container-fluid">
            <h1>Predmety</h1>
            <div class="row">
                <div class="column middle">
                    <a href="?c=predmet&a=create" class="btn btn-success">Pridať nový predmet</a>
                </div>
                <div class="column middle">
                    <label for="druh">Druh:</label>
                    <select name="druh" id="druh">
                        <?php foreach (Druhpredmets::getAll() as $druh) { ?>
                            <option value="<?=$druh->getId()?>"><?= $druh->getNazov() ?></option>
                        <?php } ?>
                        <option value="0" selected>Všetko</option>
                    </select>
                </div>
                <div class="column middle">
                    <label for="jedinecnost">Jedinecnost:</label>
                    <select name="jedinecnost" id="jedinecnost">
                        <?php foreach (Jedinecnostpredmets::getAll() as $jedinecnost) { ?>
                            <option value="<?=$jedinecnost->getId()?>"><?= $jedinecnost->getNazov() ?></option>
                        <?php } ?>
                        <option value="0" selected>Všetko</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <?php foreach ($data['data'] as $predmet) { ?>
                    <div class="col-xl-4 col-md-4 col-sm-6">
                        <div class="card my-3">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?= $predmet->getNadpis() ?>
                                </h5>
                                <h6 class="card-title">
                                    <?php foreach (Druhpredmets::getAll() as $druh) { ?>
                                        <?php if($predmet->getDruh() == $druh->getId()) {?>
                                            <?= $druh->getNazov() ?>,
                                            <?php } ?>
                                    <?php } ?>

                                    <?php foreach (Jedinecnostpredmets::getAll() as $jedinecnostpredmets) { ?>
                                        <?php if($predmet->getJedinecnost() == $jedinecnostpredmets->getId()) {?>
                                            <?= $jedinecnostpredmets->getNazov() ?>
                                        <?php } ?>
                                    <?php } ?>

                                    <?php if($predmet->isSladeni()) {?>
                                        (Vyžaduje sladení)
                                    <?php } ?>
                                </h6>

                                <?php if ($predmet->getImage()) { ?>
                                    <img src="<?= $predmet->getImage() ?>" class="card-img-top" alt="...">
                                <?php } else {?>
                                    <img src="<?= "public" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "itemDef.png" ?>" class="card-img-top" alt="...">
                                <?php } ?>
                                <p></p>
                                <p align="center">
                                    <a href="?c=predmet&a=open&id=<?= $predmet->getId() ?>" class="btn btn-success">Otvoriť</a>
                                    <a href="?c=predmet&a=edit&id=<?= $predmet->getId() ?>" class="btn btn-warning">Upraviť</a>
                                    <a href="?c=predmet&a=delete&id=<?= $predmet->getId() ?>" class="btn btn-danger">Zmazať</a>
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
