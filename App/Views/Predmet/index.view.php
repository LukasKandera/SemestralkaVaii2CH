
<?php
/** @var Array $data */
/** @var IAuthenticator $auth */
/** @var Predmet $predmet */

use App\Core\IAuthenticator;
use App\Models\Predmet;

?>

<head>
    <meta charset="UTF-8">
    <title>Predmety</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../public/css/style.css">
</head>
<body>
<div class="header row" >
    <h1>Predmety</h1>
</div>

<div class="row">
    <div class="column side">
        <ul>
            <li><a href="index.php">Hlavná stránka</a></li>
            <li><a href="?c=predmet">Predmety</a></li>
            <li><a href="?c=character">Nehráčské postavy</a></li>
            <li><a href="?c=map">Mapy</a></li>
            <li><a href="?c=scroll">Autorská rubrika</a></li>
        </ul>
    </div>

    <div class="column middle">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <a href="?c=predmet&a=create" class="btn btn-success">Pridať nový predmet</a>
                </div>
            </div>
            <div class="row">
                <?php foreach ($data['data'] as $predmet) { ?>
                    <div class="col-xl-4 col-md-4 col-sm-6">
                        <div class="card my-3">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?= $predmet->getNadpis() ?>
                                </h5>

                                <?php if ($predmet->getImage()) { ?>
                                    <img src="<?= $predmet->getImage() ?>" class="card-img-top" alt="...">
                                <?php } else {?>
                                    <img src="<?= "public" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "itemDef.png" ?>" class="card-img-top" alt="...">
                                <?php } ?>
                                <p></p>
                                <p align="center">
                                    <a href="?c=predmet&a=open&id=<?= $predmet->getId() ?>" class="btn btn-success">Otvoriť</a>
                                    <a href="?c=predmet&a=edit&id=<?= $predmet->getId() ?>" class="btn btn-warning">Upraviť</a>
                                    <a href="?c=predmet&a=delete&id=<?= $predmet->getId() ?>" class="btn btn-danger">Zmazať</a>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

</body>
