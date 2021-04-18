# chateau-peyrines.com
Site internet de la société chateau-peyrines, productrice et vendeuse de vin

## What is it?
Site internet de la société chateau-peyrines, productrice et vendeuse de vin
## Why do we work on it?
Site créé en 2008 avec une techno flash, 12 ans après il est temps de lui donner un petit coup de frais
## What will we do?
### Global
3 Pages principales accessibles via Menu principal :

-Accueil(présentation de l'activité, mode d'empoi du site rapide)
-Vins-tarifs
-A propos

Hors pages principales, accessibles sans quitter la page en cours :
Contacts : tel fixe, adresse, envoi de mail, 

Liens vers pages externes :
Résidence
Témoignages

## Wath will we do for that?
### Back-end
**CONTROLEUR FRONTAL**, l'accès public aux pages passe par une page unique

**CRUD** : Le client doit pouvoir remplir lui même le contenu des pages :

***TARIFS*** des vins de l'année, plusieurs type de vins, différents prix selon qu'ils soient achetés au château ou livrés. Ces données seront dynamiques, enregistrées dans une base de données.

***TOURNEE***, chaque année, le représentant de Chateau-Peyrines organise une tournée en France, les dates de cette tournée et les éléments de chaque événement seront dynamiques, enregistrées dans une base de données.

### Front-end
STRUCTURES PAGES
Pour les 3 pages principales:
- Ventes-prix,
- vignes-vins-elaboration,
- Presentation-histoire-famille),
créer une structure qui s'adaptera aux mobiles ainsi qu'aux plus large des terminaux.

## CONTENUS PAGES
Chacune de ces pages est divisée en sous section, le contenu de ces pages peut-être copié depuis l'ancien site [chateau-peyrines.com](http://chateau-peyrines.com/), attention : Flash


-Pour Accueil

#### Les sous-sections : 

- Activité
- Descriptif des autres rubriques


-Pour vins-tarifs

#### Les sous-sections :

- Vins rouges
- Vins blancs
- Vins rosés

Chaque vin disposera de sa propre présentation dans laquelle sera mis à disposition
- ces prix selon mode d'achat
- un accès à un descriptif technique du vin, 
- une description des sensations qu'il procure et de ses qualités


-Pour Récoltants
#### Les sous-sections :

- Situation

- Famille

- Historique


-Other stuffs that we have to put in :
#### Juridique :
- Avertissement alcool

- Protection mineurs

- Prix valables jusqu'au

- Mentions legales

## MENUS
2 menus pour accéder aux 2 niveaux d'arborescence du site :

-Menu principal qui donne accès à chacune des 3 pages principales

-Menu secondaire qui donne accès à chacune des sections dans la page, sans recharger la page


## How will we do it?
### CONTROLEUR FRONTAL,
 PHP, à la racine dans index: Une variable GET qui donne la page principal et la section demandées
### CRUD,
 PHP, MySQL, accessible aux seuls initiés(login et mdp) crud permettant la création de :
 
 -pour les TARIFS : d'un élément contenant la qualité du vin(rouge, blanc sec, blanc moelleux, rosé, etc), l'année, le contenant(75cl, magnum, cubit ), le prix pour chaque bouteille selon la quantité achetée.
 
 -Upload des tarifs annuels sous forme de PDF, ou émission direct du PDF depuis la base de données.
 
 -pour la TOURNEE, d'un événement comprenant une date(date), un lieu(lien vers google map + adresse sous forme texte), un texte descriptif de l'événement.
 
 ### STRUCTURE PAGES
 
 
 HTML-CSS
 -Gabarits pages principales, responsive : DISPLAY-GRID. Qui correspondent aux trois pages principales(Accueil, vignes-vins-tarifs, A propos)
 Nous y retrouverons des éléments standarts : header, nav, main et footer.
 
 -Découpage de chaque page principale en sections, ces sections seront contenues par des balise section, ciblables via un id et pourvues d'un titre principale et d'au moins un article.


 PHP-repositories
 
 Un repertoire "pages" au premier niveau contiendra chaque page principale, ainsi qu'un fichier "menu-pageconcernée.php" qui sera également appelé par la page principale si nécessaire.
 
 - Un répertoire "files" au premier niveau, contiendra les éléments récurrents inclus dans chaque page principale(header.php, footer.php, nav.php).
 
 - Un répertoire "images", au premier niveau, contiendra les images appelées par les pages.
 
- Un répertoire "css", au premier niveau, contiendra les CSS nécessaires a la mise en style des pages.

 - Un répertoire "JS", au premier niveau contiendra les fichiers JS nécessaires au fonctionnement des pages.
 
 - Un répertoire "files-graphic", au premier niveau, contiendra les éléments graphiques récurrents nécessaires au bon fonctionnement de notre site(images-boutons, logo, sprites).
 

 Chaque page sera optimisée en incorporant les éléments récurrent sous forme d'include((header.php, footer.php, nav.php), ATTENTION, certains éléments de ces morceaux seront remplis dynamiquement, prendre en compte le contexte grace au $GET.

 ### CONTENUS
 Chaque page contient des sections qui correspondent à chaque menu secondaire, ces sections contiennent :
 
 - Un titre (h2),
 
 - au moins un article(article)
 
