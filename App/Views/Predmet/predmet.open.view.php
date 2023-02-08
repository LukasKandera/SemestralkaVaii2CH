<?php
/** @var Array $data */
/** @var IAuthenticator $auth */

use App\Models\Druhpredmets;
use App\Models\Jedinecnostpredmets;
use App\Models\Predmet;
use App\Core\IAuthenticator;
/** @var Predmet $predmet */
$predmet = $data['predmet'];
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
        <h1 class="NadpisThema"><?= $predmet->getNadpis() ?></h1>
        <h2 class="NadpisKTextu">
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
        </h2>
        <h2 class="NadpisKTextu">
            Cena: <?= $predmet->getCena() ?> zlatých
        </h2>
        <div class="podnadpis1">Popis:</div>
        <p><?= $predmet->getText() ?></p>

        <?php if ($predmet->getImage()) { ?>
            <img src="<?= $predmet->getImage() ?>" class="imgBox" alt="...">
        <?php } else {?>
            <img src="<?= "public" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "itemDef.png" ?>" class="imgCenter" alt="...">
        <?php } ?>
    </div>
</div>


