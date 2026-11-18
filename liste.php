<?php

require_once 'inc/main.php';
require_once 'inc/vues.php';

[$titre, $css] = liste();

afficherPage($titre, $css, function () { ?>
    <h2>Les chapitres</h2>
    <ul class="etagere">
        <?php foreach (chapitres() as $chapitre): ?>
            <li class="livre" style="background: <?= $chapitre['couleur'] ?>">
                <?= $chapitre['titre'] ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php });