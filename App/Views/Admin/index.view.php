<?php /** @var \App\Core\IAuthenticator $auth */ ?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <p>
                Vitaj, <strong><?= $auth->getLoggedUserName() ?></strong>!<br><br>
                Táto časť aplikácie je prístupná len po prihlásení.
                <a href="?c=kategory">Kategórie</a>
                Plus sa ti sprístupní tvorba vlastných príspevkov.
            </p>
            <p class="textOddel">Bludné kruhy</p>
            <p>Bludné kruhy, zase raz,</p>
            <p>vracajú stále späť môj čas.</p>
            <p>Opakovaná kým bude chyba,</p>
            <p>času slučka zabrať mi dá.</p>
            <p>A ja sa i zblázniť smiem,</p>
            <p>keď raz tú chybu nenájdem…</p>
            <p>(A.B.)</p>
        </div>
    </div>
</div>