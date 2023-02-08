<?php
/** @var Array $data */
/** @var IAuthenticator $auth */

use App\Core\IAuthenticator;
use App\Models\Druhpredmets;
use App\Models\Jedinecnostpredmets;
use App\Models\Kategorymap;
use App\Models\Rasacharacter;
use App\Models\Typcharacter;

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
        <div class="container-fluid">
            <h1 class="NadpisSekcia">Všetky kategórie</h1>

            <p class="textOddel">Kategória Národ/Rasa pre postavy:</p>
            <?php foreach (Rasacharacter::getAll() as $rasa) { ?>
                <p>
                    <?= $rasa->getNazov() ?>
                    <?php if ($auth->isLogged()) { ?>
                        <?php if ($auth->getLoggedUserId() == 2) { ?>
                            <a href="?c=kategory&a=editKRasa&id=<?= $rasa->getId() ?>" class="btn btn-warning">Upraviť</a>
                            <a href="?c=kategory&a=deleteKRasa&id=<?= $rasa->getId() ?>" class="btn btn-danger">Zmazať</a>
                        <?php } ?>
                    <?php } ?>
                </p>
            <?php } ?>
            <?php if ($auth->isLogged()) { ?>
                <?php if ($auth->getLoggedUserId() == 2) { ?>
                    <a href="?c=kategory&a=createKRasa" class="btn btn-success">Pridať novú rasu</a>
                <?php } ?>
            <?php } ?>

            <p class="textOddel">Kategória Typ pre postavy:</p>
            <?php foreach (Typcharacter::getAll() as $typ) { ?>
                <p>
                    <?= $typ->getNazov() ?>
                    <?php if ($auth->isLogged()) { ?>
                        <?php if ($auth->getLoggedUserId() == 2) { ?>
                            <a href="?c=kategory&a=editKTyp&id=<?= $typ->getId() ?>" class="btn btn-warning">Upraviť</a>
                            <a href="?c=kategory&a=deleteKTyp&id=<?= $typ->getId() ?>" class="btn btn-danger">Zmazať</a>
                        <?php } ?>
                    <?php } ?>
                </p>
            <?php } ?>
            <?php if ($auth->isLogged()) { ?>
                <?php if ($auth->getLoggedUserId() == 2) { ?>
                    <a href="?c=kategory&a=createKTyp" class="btn btn-success">Pridať nový typ</a>
                <?php } ?>
            <?php } ?>

            <p class="textOddel">Kategória Jedinečnosť pre predmety:</p>
            <?php foreach (Jedinecnostpredmets::getAll() as $jedinecnostpredmets) { ?>
                <p>
                    <?= $jedinecnostpredmets->getNazov() ?>
                    <?php if ($auth->isLogged()) { ?>
                        <?php if ($auth->getLoggedUserId() == 2) { ?>
                            <a href="?c=kategory&a=editKJed&id=<?= $jedinecnostpredmets->getId() ?>" class="btn btn-warning">Upraviť</a>
                            <a href="?c=kategory&a=deleteKJed&id=<?= $jedinecnostpredmets->getId() ?>" class="btn btn-danger">Zmazať</a>
                        <?php } ?>
                    <?php } ?>
                </p>
            <?php } ?>
            <?php if ($auth->isLogged()) { ?>
                <?php if ($auth->getLoggedUserId() == 2) { ?>
                    <a href="?c=kategory&a=createKJed" class="btn btn-success">Pridať novú</a>
                <?php } ?>
            <?php } ?>

            <p class="textOddel">Kategória Druh pre predmety:</p>
            <?php foreach (Druhpredmets::getAll() as $druhpredmets) { ?>
                <p>
                    <?= $druhpredmets->getNazov() ?>
                    <?php if ($auth->isLogged()) { ?>
                        <?php if ($auth->getLoggedUserId() == 2) { ?>
                            <a href="?c=kategory&a=editKDruh&id=<?= $druhpredmets->getId() ?>" class="btn btn-warning">Upraviť</a>
                            <a href="?c=kategory&a=deleteKDruh&id=<?= $druhpredmets->getId() ?>" class="btn btn-danger">Zmazať</a>
                        <?php } ?>
                    <?php } ?>
                </p>
            <?php } ?>
            <?php if ($auth->isLogged()) { ?>
                <?php if ($auth->getLoggedUserId() == 2) { ?>
                    <a href="?c=kategory&a=createKDruh" class="btn btn-success">Pridať nový</a>
                <?php } ?>
            <?php } ?>

            <p class="textOddel">Kategórie pre mapy:</p>
            <?php foreach (Kategorymap::getAll() as $kategorymap) { ?>
                <p>
                    <?= $kategorymap->getNazovKategorie() ?>
                    <?php if ($auth->isLogged()) { ?>
                        <?php if ($auth->getLoggedUserId() == 2) { ?>
                            <a href="?c=kategory&a=editKMap&id=<?= $kategorymap->getId() ?>" class="btn btn-warning">Upraviť</a>
                            <a href="?c=kategory&a=deleteKMap&id=<?= $kategorymap->getId() ?>" class="btn btn-danger">Zmazať</a>
                        <?php } ?>
                    <?php } ?>
                </p>
            <?php } ?>
            <?php if ($auth->isLogged()) { ?>
                <?php if ($auth->getLoggedUserId() == 2) { ?>
                    <a href="?c=kategory&a=createKMap" class="btn btn-success">Pridať novú kategóriu</a>
                <?php } ?>
            <?php } ?>

    </div>
</div>
</div>