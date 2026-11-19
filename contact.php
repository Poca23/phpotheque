<?php

require_once 'inc/main.php';
require_once 'inc/vues.php';

afficherPage('contact', function () { ?>

    <h2>Contact</h2>
    <form class="formulaire" method="post">
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" required>

        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Message</label>
        <textarea id="message" name="message" rows="5" required></textarea>

        <button type="submit">Envoyer</button>
    </form>
<?php });