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
├── 500.php
├── liste.php
├── contact.php
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

```

## Les trois « main »

| Main            | Fichier        | Rôle                                                            |
| --------------- | -------------- | --------------------------------------------------------------- |
| CSS             | `css/main.css` | importe tous les autres CSS                                     |
| Fonctionnalités | `inc/main.php` | charge `base.php`, `pages.php` et `chapitres.php`               |
| Vues            | `inc/vues.php` | `afficherPage('page', fn)` : header, contenu de la page, footer |

## Code clé

Chaque page :

```
php
require_once 'inc/main.php';
require_once 'inc/vues.php';

afficherPage('liste', function () { ?>
    ...contenu de la page...
<?php });
```

## Tester

Tests automatiques (PHPUnit) :

​`bash
vendor/bin/phpunit
​`

Dans le navigateur :

​`bash
php -S localhost:8000
​`

Ouvrir `http://localhost:8000/index.php`.

## Méthode : TDD

Pour chaque fichier : écrire le test, le lancer (il échoue), écrire le code,
relancer (il réussit).

## Erreurs rencontrées

| Erreur                                        | Cause / correction                                           |
| --------------------------------------------- | ------------------------------------------------------------ |
| `Undefined function 'chapitres'` dans VS Code | Fichier pas encore créé : disparaît après création           |
| Test du header en échec                       | Header minimal : ajout du `<nav>` et du footer               |
| Test des pages en échec                       | Pages pas encore écrites : remplacées par les 3 vraies pages |

## Ce que j'ai appris

- Le TDD : le test échoue d'abord, ce qui prouve qu'il teste bien quelque chose.
- Un fichier « main » regroupe des imports : les pages n'ont qu'un `require_once`.
- Une fonction anonyme transmise à `afficherPage()` fournit le contenu de la page.
- `__DIR__` rend les chemins de `require` fiables, d'où que le fichier soit appelé.
- Le responsive se fait avec `@media (max-width: 600px)` dans chaque CSS concerné.
- `base()` évite de répéter `__DIR__` dans tous les `require`.
- `afficherPage()` appelle elle-même la fonction de la page : moins de répétition.
- `try/catch` avec `ob_start` affiche une page 500 propre en cas d'erreur.
- Un workflow GitHub Actions lance les tests à chaque push.

## Statut

Exercice terminé et validé.
