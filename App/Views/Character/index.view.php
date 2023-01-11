<?php
/** @var Array $data */
/** @var IAuthenticator $auth */
/** @var Character $character */

use App\Core\IAuthenticator;
use App\Models\Character;
use App\Models\Rasacharacter;
use App\Models\Typcharacter;

?>

<head>
    <meta charset="UTF-8">
    <title>Nehráčske postavy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../public/css/style.css">
</head>
<body>
<div class="row">
    <div class="column side">
        <?php foreach ($data['data'] as $character) { ?>
            <p></p>
            <a type="button" href="#<?=$character->getId()?>" class="btn btn-dark btn-lg row"><?=$character->getMeno()?></a>
        <?php } ?>
    </div>
    <div class="column middle">
        <div class="container-fluid">
            <h1 class="NadpisSekcia">Nehráčske postavy</h1>
            <div class="row">
                <div class="column box">
                    <a href="?c=character&a=create" class="btn btn-success">Pridať novú postavu</a>
                </div>
                <div class="column middle">
                    <div class="row">
                    <label for="rasa">Národ/Rasa:</label>
                    <select name="rasa" id="rasa">
                        <?php foreach (Rasacharacter::getAll() as $rasa) { ?>
                            <option value="<?=$rasa->getId()?>"><?= $rasa->getNazov() ?></option>
                        <?php } ?>
                        <option value="0" selected>Všetky rasy</option>
                    </select>
                    </div>
                    <div class="row">
                    <label for="typ">Typ:</label>
                    <select name="typ" id="typ">
                        <?php foreach (Typcharacter::getAll() as $typ) { ?>
                            <option value="<?=$typ->getId()?>"><?= $typ->getNazov() ?></option>
                        <?php } ?>
                        <option value="0" selected>Všetky typy</option>
                    </select>
                    </div>
                </div>
                <div class="column box">
                    <button id="filtruj" class="btn btn-success">Filtruj</button>
                </div>
            </div>
            <div class="row" id="chars"></div>
            <div class="row">
                <?php foreach ($data['data'] as $character) { ?>
                    <div class="col-xl-4 col-md-4 col-sm-6">
                        <div class="card my-3 text-center">
                            <div class="card-body">
                                <h5 id="<?= $character->getId() ?>" class="card-title">
                                    <?= $character->getMeno() ?>
                                </h5>
                                <h6 class="card-title">
                                    <?php foreach (Rasacharacter::getAll() as $rasa) { ?>
                                        <?php if($character->getRasa() == $rasa->getId()) {?>
                                            <?= $rasa->getNazov() ?>,
                                        <?php } ?>
                                    <?php } ?>

                                    <?php foreach (Typcharacter::getAll() as $typ) { ?>
                                        <?php if($character->getTyp() == $typ->getId()) {?>
                                            <?= $typ->getNazov() ?>
                                        <?php } ?>
                                    <?php } ?>

                                </h6>
                                <?php if ($character->getObrazok()) { ?>
                                    <img src="<?= $character->getObrazok() ?>" class="card-img" alt="...">
                                <?php } else {?>
                                    <img src="<?= "public" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "charDefault.png" ?>" class="card-img-top" alt="...">
                                <?php } ?>
                                <p></p>
                                <p>
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
