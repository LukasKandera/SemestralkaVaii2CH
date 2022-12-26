<?php
/** @var Array $data */
/** @var IAuthenticator $auth */

use App\Core\IAuthenticator;
use App\Models\Kategorymap;
use App\Models\Map;

/** @var Map $map */
$map = $data['map'];
?>
<div class="container">
    <div class="row>">
        <div class="col">
            <h3>Editácia/pridanie príspevku</h3>
            <form action="?c=map&a=store" method="post" enctype="multipart/form-data">
                <input type="hidden" value="<?= $map->getId() ?>" name="id">
                <div class="mb-3">
                    <label for="nazov" class="form-label">Názov:</label>
                    <input type="text" class="form-control" id="nazov" name="nazov" aria-describedby="nazov" value="<?= $map->getNazov() ?>" required>
                </div>
                <label for="kategoria">Vyber filter kategórie</label>
                <select name="kategoria" id="kategoria">
                    <?php foreach (Kategorymap::getAll() as $kat) { ?>
                        <option value="<?=$kat->getId()?>"><?= $kat->getNazovKategorie() ?></option>
                    <?php } ?>
                    <option value="0" selected>Kategoria</option>
                </select>
                <div class="mb-3">
                    <label for="opis">Popis mapy:</label>
                    <textarea class="form-control" id="opis" name="opis" style="height: 100px" required><?= $map->getOpis() ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Obrázok:</label>
                    <input class="form-control" type="file" id="image" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Uložiť mapu</button>

            </form>
        </div>
    </div>
</div>
