<?php

require_once 'inc/main.php';
require_once 'inc/vues.php';

[$titre, $css] = accueil();

afficherPage($titre, $css, function () { ?>
    <section class="intro">
        <h2>Bienvenue à la PHPothèque</h2>
        <p>Choisis un chapitre et apprends PHP à ton rythme.</p>
    </section>

    <section class="cartes">
        <article class="carte">
            <span>📖</span>
            <h3>Le cours</h3>
            <p>Des explications simples pour chaque notion.</p>
        </article>
        <article class="carte">
            <span>✏️</span>
            <h3>L'exercice</h3>
            <p>Un exercice pour pratiquer.</p>
        </article>
        <article class="carte">
            <span>✅</span>
            <h3>La correction</h3>
            <p>Pour vérifier ta solution.</p>
        </article>
    </section>

    <p style="text-align: center;"><a class="bouton" href="liste.php">Voir les chapitres</a></p>
<?php });