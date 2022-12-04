<?php

/** @var Array $data */

/** @var IAuthenticator $auth */

use App\Core\IAuthenticator;
use App\Models\Character;

/** @var Character $character */
$predmet = $data['character'];
?>
<div class="container">
    <div class="row>">
        <div class="col">
            <h3>Editácia/pridanie postavy</h3>
            <form action="?c=character&a=store" method="post">
                <input type="hidden" value="<?= $character->getId() ?>" name="id">
                <div class="mb-3">
                    <label for="meno" class="form-label">Meno postavy:</label>
                    <input type="text" class="form-control" id="meno" name="meno" aria-describedby="meno"
                           value="<?= $character->getMeno() ?>" required>
                </div>
                <div class="mb-3">
                    <label for="rasa" class="form-label">Národ:</label>
                    <input type="text" class="form-control" id="rasa" name="rasa" aria-describedby="rasa"
                           value="<?= $character->getRasa() ?>" required>
                </div>
                <div class="mb-3">
                    <label for="typ" class="form-label">Typ/Druh:</label>
                    <input type="text" class="form-control" id="typ" name="typ" aria-describedby="typ"
                           value="<?= $character->getTyp() ?>" required>
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