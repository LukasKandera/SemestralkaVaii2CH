<?php
/** @var Array $data */

use App\Models\Predmet;

/** @var Predmet $predmet */
$predmet = $data['predmet'];
?>
<div class="container">
    <div class="row>">
        <div class="col">
            <h3>Editácia/pridanie príspevku</h3>
            <form action="?c=predmet&a=store" method="post">
                <input type="hidden" value="<?= $predmet->getId() ?>" name="id">
                <div class="mb-3">
                    <label for="nadpis" class="form-label">Názov:</label>
                    <input type="text" class="form-control" id="nadpis" name="nadpis" aria-describedby="nadpis" value="<?= $predmet->getNadpis() ?>">
                </div>
                <div class="mb-3">
                    <label for="druh" class="form-label">Druh:</label>
                    <input type="text" class="form-control" id="druh" name="druh" aria-describedby="druh" value="<?= $predmet->getDruh() ?>">
                </div>
                <div class="mb-3">
                    <label for="text">Obsah:</label>
                    <textarea class="form-control" id="text" name="text" style="height: 100px"><?= $predmet->getText() ?></textarea>
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
