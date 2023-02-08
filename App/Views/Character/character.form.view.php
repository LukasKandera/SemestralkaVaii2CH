<?php

/** @var Array $data */

/** @var IAuthenticator $auth */

use App\Core\IAuthenticator;
use App\Models\Character;
use App\Models\Rasacharacter;
use App\Models\Typcharacter;

/** @var Character $character */
$character = $data['character'];
?>
<div class="container">
    <div class="row>">
        <div class="col">
            <h3>Editácia/pridanie postavy</h3>
            <form action="?c=character&a=store" method="post" enctype="multipart/form-data">

                <input type="hidden" value="<?= $character->getId() ?>" name="id">
                <label for="autor" class="form-label" hidden></label>
                <input hidden value="<?= $auth->getLoggedUserId() ?>" id="autor" name="autor">
                <div class="mb-3">
                    <label for="meno" class="form-label">Meno postavy:</label>
                    <input type="text" class="form-control" id="meno" name="meno" aria-describedby="meno"
                           value="<?= $character->getMeno() ?>" required>
                </div>
                <div class="mb-3">
                    <label for="rasa">Národ:</label>
                    <div class="text-danger mb-3">
                        <?= @$data['messageR'] ?>
                    </div>
                    <select name="rasa" id="rasa">
                        <?php foreach (Rasacharacter::getAll() as $rasa) { ?>
                            <option value="<?=$rasa->getId()?>" <?php if($character->getRasa() == $rasa->getId()) { ?> selected <?php } ?> > <?= $rasa->getNazov() ?></option>
                        <?php } ?>
                        <option value="0" <?php if($character->getRasa() == 0) { ?> selected <?php } ?> >Rasa</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="typ">Typ/Druh:</label>
                    <div class="text-danger mb-3">
                        <?= @$data['messageT'] ?>
                    </div>
                    <select name="typ" id="typ">
                        <?php foreach (Typcharacter::getAll() as $typ) { ?>
                            <option value="<?=$typ->getId()?>" <?php if($character->getTyp() == $typ->getId()) { ?> selected <?php } ?> > <?= $typ->getNazov() ?></option>
                        <?php } ?>
                        <option value="0" <?php if($character->getTyp() == 0) { ?> selected <?php } ?> >Druh</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="popis">Popis postavy:</label>
                    <textarea class="form-control" id="popis" name="popis" style="height: 100px"
                              required><?= $character->getPopis() ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="povaha">Povaha postavy:</label>
                    <textarea class="form-control" id="povaha" name="povaha" style="height: 100px"
                              required><?= $character->getPovaha() ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="historia">Historia postavy:</label>
                    <textarea class="form-control" id="historia" name="historia" style="height: 100px"
                              required><?= $character->getHistoria() ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="motivacia">Motivácia postavy:</label>
                    <textarea class="form-control" id="motivacia" name="motivacia" style="height: 100px"
                              required><?= $character->getMotivacia() ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="idealy">Ideály postavy:</label>
                    <textarea class="form-control" id="idealy" name="idealy" style="height: 100px"
                              required><?= $character->getIdealy() ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="povolanieCech" class="form-label">Povolanie/Cech:</label>
                    <input type="text" class="form-control" id="povolanieCech" name="povolanieCech" aria-describedby="povolanieCech"
                           value="<?= $character->getPovolanieCech() ?>" required>
                </div>
                <div class="mb-3">
                    <label for="hlas" class="form-label">Hlas:</label>
                    <input type="text" class="form-control" id="hlas" name="hlas" aria-describedby="hlas"
                           value="<?= $character->getHlas() ?>" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Obrázok:</label>
                    <input class="form-control" type="file" id="image" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Uložiť postavu</button>

            </form>
        </div>
    </div>
</div>