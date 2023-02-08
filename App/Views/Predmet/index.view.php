
<?php
/** @var Array $data */
/** @var IAuthenticator $auth */
/** @var Predmet $predmet */

use App\Core\IAuthenticator;
use App\Models\Druhpredmets;
use App\Models\Jedinecnostpredmets;
use App\Models\Predmet;

?>
<div class="row">
    <div class="column side">
        <?php foreach ($data['data'] as $predmet) { ?>
            <p></p>
            <a role="button" href="#<?=$predmet->getId()?>" class="btn btn-dark btn-lg row"><?=$predmet->getNadpis()?></a>
        <?php } ?>
    </div>
    <div class="column middle">
        <div class="container-fluid">
            <h1 class="NadpisSekcia">Predmety</h1>
            <?php if ($auth->isLogged()) { ?>
                <div class="row">
                    <div class="column box">
                        <a href="?c=predmet&a=create" class="btn btn-success">Pridať nový predmet</a>
                    </div>
                    <div class="column middle">
                        <div class="row">
                            <label for="druh">Druh:</label>
                            <select name="druh" id="druh">
                                <?php foreach (Druhpredmets::getAll() as $druh) { ?>
                                    <option value="<?=$druh->getId()?>"><?= $druh->getNazov() ?></option>
                                <?php } ?>
                                <option value="0" selected>Všetky</option>
                            </select>
                        </div>
                        <div class="row">
                            <label for="jedinecnost">Jedinecnost:</label>
                            <select name="jedinecnost" id="jedinecnost">
                                <?php foreach (Jedinecnostpredmets::getAll() as $jedinecnost) { ?>
                                    <option value="<?=$jedinecnost->getId()?>"><?= $jedinecnost->getNazov() ?></option>
                                <?php } ?>
                                <option value="0" selected>Všetko</option>
                            </select>
                        </div>
                    </div>
                    <div class="column box">
                        <button id="filtruj" class="btn btn-success">Filtruj</button>
                    </div>
                </div>
                <div class="row podnadpis1">
                    Filtrované postavy:
                </div>
                <div class="row" id="chars"></div>

                <div class="row podnadpis1">
                    Všetky predmety:
                </div>
            <?php } ?>
            <div class="row">
                <?php foreach ($data['data'] as $predmet) { ?>
                    <div class="col-xl-4 col-md-4 col-sm-6">
                        <div class="card my-3">
                            <div class="card-body text-center">
                                <h5 id="<?= $predmet->getId() ?>" class="card-title">
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
                                <p>
                                    <a href="?c=predmet&a=open&id=<?= $predmet->getId() ?>" class="btn btn-success">Otvoriť</a>
                                    <?php if ($auth->isLogged()) { ?>
                                        <?php if ($predmet->getAutor() == $auth->getLoggedUserId()) { ?>
                                            <a href="?c=predmet&a=edit&id=<?= $predmet->getId() ?>" class="btn btn-warning">Upraviť</a>
                                            <a href="?c=predmet&a=delete&id=<?= $predmet->getId() ?>" class="btn btn-danger">Zmazať</a>
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

