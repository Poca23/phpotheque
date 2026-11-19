# Exercice : le mini-site PHPothèque

Auteure : Claire Naudin, formation CDA 2026-2027

## Objectif

Créer un mini-site PHP de 3 pages (accueil, liste, contact) qui partagent
le même header, footer et style, avec une navigation entre les pages.
Le site reprend ma Bibliothèque PHP : la page liste affiche les chapitres
avec un `foreach`.

## Structure

```
.
├── index.php
├── liste.php
├── contact.php
├── 500.php
├── css/
│   ├── main.css
│   ├── global.css
│   ├── header.css
│   ├── footer.css
│   ├── accueil.css
│   ├── liste.css
│   └── contact.css
├── inc/
│   ├── base.php
│   ├── main.php
│   ├── vues.php
│   ├── pages.php
│   └── chapitres.php
├── partiel/
│   ├── header.php
│   └── footer.php
└── tests/
    ├── AffichageTest.php
    ├── BaseTest.php
    ├── ChapitresTest.php
    ├── MainTest.php
    ├── PagesTest.php
    ├── PartielsTest.php
    └── VuesTest.php
```

## Les trois « main »

| Main            | Fichier        | Rôle                                                            |
| --------------- | -------------- | --------------------------------------------------------------- |
| CSS             | `css/main.css` | importe tous les autres CSS                                     |
| Fonctionnalités | `inc/main.php` | charge `base.php`, `pages.php` et `chapitres.php`               |
| Vues            | `inc/vues.php` | `afficherPage('page', fn)` : header, contenu de la page, footer |

## Code clé

Chaque page :

```php
require_once 'inc/main.php';
require_once 'inc/vues.php';

afficherPage('liste', function () { ?>
    ...contenu de la page...
<?php });
```

`afficherPage()` appelle la fonction de la page (`accueil()`, `liste()`
ou `contact()`), qui renvoie `[$titre, $css]`. En cas d'exception,
elle affiche `500.php`.

## Tester

Tests automatiques (PHPUnit) :

```bash
composer test
```

Dans le navigateur :

```bash
php -S localhost:8000
```

Ouvrir `http://localhost:8000/index.php`.

## Méthode : TDD

Pour chaque fichier : écrire le test, le lancer (il échoue), écrire le code,
relancer (il réussit).

Le refactor a été fait sur une branche `refactor`, avec un commit par
étape, puis fusionné dans `master` par une Pull Request. Un workflow
GitHub Actions lance les tests à chaque push.

## Erreurs rencontrées

| Erreur                                         | Cause / correction                                                       |
| ---------------------------------------------- | ------------------------------------------------------------------------ |
| `Undefined function 'chapitres'` dans VS Code  | Fichier pas encore créé : disparaît après création                       |
| Test du header en échec                        | Header minimal : ajout du `<nav>` et du footer                           |
| Test des pages en échec                        | Pages pas encore écrites : remplacées par les 3 vraies pages             |
| `Failed opening required ... pages.php`        | `main.php` modifié avant le renommage : garder `fonctions.php` jusque-là |
| `Too few arguments to function afficherPage()` | Les pages appelaient encore l'ancienne forme à 3 arguments               |
| Croix rouge sur un commit de la PR             | État intermédiaire : seul le dernier commit compte                       |
| `.phpunit.result.cache` dans la PR             | Fichier déjà suivi par Git : retiré avec `git rm --cached`               |

## Ce que j'ai appris

- Le TDD : le test échoue d'abord, ce qui prouve qu'il teste bien quelque chose.
- Un fichier « main » regroupe des imports : les pages n'ont qu'un `require_once`.
- Une fonction anonyme transmise à `afficherPage()` fournit le contenu de la page.
- `base()` évite de répéter `__DIR__` dans tous les `require`.
- `afficherPage()` appelle elle-même la fonction de la page : moins de répétition.
- `try/catch` avec `ob_start` affiche une page 500 propre en cas d'erreur.
- Le responsive se fait avec `@media (max-width: 600px)` dans chaque CSS concerné.
- Un workflow GitHub Actions lance les tests à chaque push.
- Un fichier déjà suivi par Git n'est pas ignoré par `.gitignore` : il faut le retirer avec `git rm --cached`.
- Une Pull Request permet de relire et de tester un refactor avant de le fusionner.

## Statut

Exercice terminé, refactor fusionné dans `master`, 13 tests verts.
