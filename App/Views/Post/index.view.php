<?php /* @var \App\Models\Post[] $data */?>

<?php foreach ($data as $row) { ?>
<div class="card" style="width: 18rem;">
    <img class="card-img-top" src="..." alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title"><?=$row->getTitle()?></h5>
        <p class="card-text"><?=$row->getText()?></p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
</div>

<?php } ?>