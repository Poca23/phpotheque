<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $titre ?></title>
    <?php foreach ($css as $file): ?>
        <link rel="stylesheet" href="css/<?= $file ?>">
    <?php endforeach; ?>
</head>

<body>
    <header>
        <h1>📚 PHPothèque</h1>
        <p>La bibliothèque des apprenants PHP</p>
        <nav aria-label="Navigation principale">
            <a href="index.php">Accueil</a>
            <a href="liste.php">Chapitres</a>
            <a href="contact.php">Contact</a>
        </nav>
    </header>
    <main>