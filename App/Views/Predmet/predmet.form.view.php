<?php
/** @var Array $data */
/** @var IAuthenticator $auth */

use App\Core\IAuthenticator;
use App\Models\Druhpredmets;
use App\Models\Jedinecnostpredmets;
use App\Models\Predmet;

/** @var Predmet $predmet */
$predmet = $data['predmet'];
?>
<div class="container">
    <div class="row>">
        <div class="col">
            <h3>Editácia/pridanie príspevku</h3>
            <form action="?c=predmet&a=store" method="post" enctype="multipart/form-data">
                <input type="hidden" value="<?= $predmet->getId() ?>" name="id">
                <div class="mb-3">
                    <label for="nadpis" class="form-label">Názov:</label>
                    <input type="text" class="form-control" id="nadpis" name="nadpis" aria-describedby="nadpis" value="<?= $predmet->getNadpis() ?>" required>
                </div>
                <div class="mb-3">
                    <label for="druh">Druh:</label>
                    <select name="druh" id="druh">
                        <?php foreach (Druhpredmets::getAll() as $druh) { ?>
                            <option value="<?=$druh->getId()?>" <?php if($predmet->getDruh() == $druh->getId()) { ?> selected <?php } ?> > <?= $druh->getNazov() ?></option>
                        <?php } ?>
                        <option value="0" <?php if($predmet->getDruh() == 0) { ?> selected <?php } ?> >Druh</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jedinecnost">Jedinečnosť:</label>
                    <select name="jedinecnost" id="jedinecnost">
                        <?php foreach (Jedinecnostpredmets::getAll() as $jedinecnost) { ?>
                            <option value="<?=$jedinecnost->getId()?>" <?php if($predmet->getJedinecnost() == $jedinecnost->getId()) { ?> selected <?php } ?> ><?= $jedinecnost->getNazov() ?></option>
                        <?php } ?>
                        <option value="0" <?php if($predmet->getJedinecnost() == 0) { ?> selected <?php } ?> >Jedinečnosť</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="sladeni">Sladeni:</label>
                    <select name="sladeni" id="sladeni">
                        <option value="1" <?php if($predmet->isSladeni()) { ?> selected <?php } ?> >Ano</option>
                        <option value="0"  <?php if(!($predmet->isSladeni())) { ?> selected <?php } ?> >Nie</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="text">Obsah:</label>
                    <textarea class="form-control" id="text" name="text" style="height: 100px" required><?= $predmet->getText() ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="cena" class="form-label">Cena:</label>
                    <input type="text" class="form-control" id="cena" name="cena" aria-describedby="cena" value="<?= $predmet->getCena() ?>" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Obrázok:</label>
                    <input class="form-control" type="file" id="image" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Uložiť predmet</button>

            </form>
        </div>
    </div>
</div>
