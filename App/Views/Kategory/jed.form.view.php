<?php
/** @var Array $data */
/** @var IAuthenticator $auth */

use App\Core\IAuthenticator;
use App\Models\Jedinecnostpredmets;



/** @var Jedinecnostpredmets $kat */
$kat = $data['jed'];
?>
<div class="container">
    <div class="row>">
        <div class="col">
            <h3>Pridanie/Editácia príspevku</h3>
            <form action="?c=kategory&a=storeKRasa" method="post" enctype="multipart/form-data">
                <input type="hidden" value="<?= $kat->getId() ?>" name="id">

                <div class="mb-3">
                    <label for="nazov" class="form-label">Názov:</label>
                    <input type="text" class="form-control" id="nazov" name="nazov" aria-describedby="nazov" value="<?= $kat->getNazov() ?>" required>
                </div>

                <button type="submit" class="btn btn-primary">Uložiť</button>

            </form>
        </div>
    </div>
</div>
