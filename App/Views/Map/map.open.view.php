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

                <?php if ($auth->isLogged()) { ?>
                    <div id="textMap">

                    </div>
                    <input type="hidden" id="loggedUser" value="<?= $auth->getLoggedUserId() ?>">
                    <?php if ($map->getAutor() == $auth->getLoggedUserId()) { ?>
                        <input type="hidden" id="newParent" value="<?= $map->getId() ?>">
                        <div class="mb-3">
                            <label for="newNazov" class="form-label">Nadpis:</label>
                            <input class="form-control" type="text" id="newNazov" required>
                        </div>
                        <div class="mb-3">
                            <label for="newText" class="form-label">Text:</label>
                            <input class="form-control" type="text" id="newText" required>
                        </div>
                        <div class="text-center">
                            <button id="addMapText" class="btn btn-success">Pridať nový popis k mape</button>
                        </div>
                    <?php } else {?>
                        <input type="hidden" id="newParent" value="<?= $map->getId() ?>">
                        <div class="mb-3" hidden>
                            <label for="newNazov" class="form-label">Nadpis:</label>
                            <input class="form-control" type="text" id="newNazov" required>
                        </div>
                        <div class="mb-3" hidden>
                            <label for="newText" class="form-label">Text:</label>
                            <input class="form-control" type="text" id="newText" required>
                        </div>
                        <div class="text-center">
                            <button id="addMapText" class="btn btn-success" hidden>Pridať nový popis k mape</button>
                        </div>
                    <?php } ?>
                <?php } else {?>
                    <p class="textWarning">Popisky k mapám vidia iba prihlásený používatelia</p>
                <?php } ?>
            </div>


        </div>


    </div>
</div>
