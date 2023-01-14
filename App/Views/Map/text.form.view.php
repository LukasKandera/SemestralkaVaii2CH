<?php
/** @var Array $data */
/** @var IAuthenticator $auth */

use App\Core\IAuthenticator;
use App\Models\Textmap;


/** @var Textmap $map */
$map = $data['text'];
?>
<div class="container">
    <div class="row>">
        <div class="col">
            <h3>Editácia príspevku</h3>
            <form action="?c=map&a=storeTextP" method="post" enctype="multipart/form-data">
                <input type="hidden" value="<?= $map->getId() ?>" name="id">
                <input type="hidden" value="<?= $map->getParent() ?>" name="parent">
                <div class="mb-3">
                    <label for="nazov" class="form-label">Názov:</label>
                    <input type="text" class="form-control" id="nazov" name="nazov" aria-describedby="nazov" value="<?= $map->getNazov() ?>" required>
                </div>
                <div class="mb-3">
                    <label for="text" class="form-label">Text:</label>
                    <input type="text" class="form-control" id="text" name="text" aria-describedby="text" value="<?= $map->getText() ?>" required>
                </div>

                <button type="submit" class="btn btn-primary">Uložiť</button>

            </form>
        </div>
    </div>
</div>
