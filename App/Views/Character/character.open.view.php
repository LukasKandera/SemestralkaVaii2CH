<?php
/** @var Array $data */
/** @var IAuthenticator $auth */

use App\Models\Character;
use App\Core\IAuthenticator;
use App\Models\Rasacharacter;
use App\Models\Typcharacter;

/** @var Character $character */
$character = $data['character'];
?>

<div class="row">
    <div class="column side">
        <p></p>
        <p>
            <img class="imgCenter" src="../../../public/img/logo0.png" alt="...">
        </p>
        <p></p>
        <p>
            <img class="imgCenter" src="../../../public/img/logo.png" alt="...">
        </p>
        <p></p>
        <p>
            <img class="imgCenter" src="../../../public/img/logo3.png" alt="...">
        </p>
        <p></p>
        <p>
            <img class="imgCenter" src="../../../public/img/logo2.png" alt="...">
        </p>
    </div>
    <div class="column middle">
        <div class="row">
        <div class="column middle">
            <h1 class="NadpisThema"><?= $character->getMeno() ?></h1>
            <h2 class="NadpisKTextu">
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
            </h2>
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
