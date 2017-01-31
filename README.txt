Connexion.inc.php:

On se connecte à la BDD, 
on verifie si on a un cookie si oui va chercher des infors sur la personne connectée en bdd et on affecte des variables

recherche.php:

Si on a une demande de recherche alors on va chercher le contenu succeptible grâce à LIKE et les % qui permettent de rechercher n'importe quel message contenant la recherche d'être interessant et on les affichent 

messages.php:

Si l'utilisateur est connecté et que l'on a un message alors on l'insere en BDD puis on redirige vers l'accueil

inscription.php:

Formulaire pour s'inscrire si l'on recoit des variables en POST et qu'elles ne sont pas vides alors on insère le nouvel user en BDD
Avec un script de vérification de champs manquants

index.php

deconnexion.php:

On détruit le cookie on lui affectant une durée de vie négative 

connexion.php:

Formulaire de connexion, si on recoit des variables POST correspondantes on vérifie en BDD l'utilisateur correspondant si il y en a un alors on hache en MD5 son pseudo en lui ajoutant un SEL (heure actuelle) que l'on insère en BDD dans le champ SID. Ainsi que 2 scripts de vérification de champs manquants.

index.php:
Si l'on a pas d'id de page passé en GET "p" (on est donc sur index.php) alors on lui affecte la page 1.
Si on a un id correspondant à un message à modifier passé en GET alors on modifie ce message en BDD.
Si on a un id correspondant à un message à supprimer passé en GET alors on supprime ce message en BDD.
On affiche les messages en BDD avec pagination programmée et infos sur le message (créateur etc) grace à un INNER JOIN entre messages et utilisateurs.
Si un utilisateur est connecté alors il peut modifier, ajouter et supprimer des messages (on affiche les boutons et zones correspondantes).
2 Scripts de vérification de champs.

