# Injection SQL

Le but de cet exercice est de demander au développeur de se mettre du côté du Hacker.
En effet, on fournit une mini-application PHP qui est vulnérable à une attaque par injection SQL.
L'apprenti doit trouver comment exploiter cette vulnérabilité.
Ensuite, l'apprenti doit modifier le code de l'application afin de supprimer la vulnérabilité.

## Travail demandé

Dans la table t_user, 2 enregistrements sont présents.
Un pour le user qui a pour login 'toto' et pour mot de passe 'toto'.
Un autre pour l'utilisateur qui a pour login 'administrator' et mot de passe 'administrator'.

L'apprenti doit réussir à se connecter à l'application sans utiliser les informations d'un des deux utilisateurs présents en base de données.
Pour cela, l'apprenti va exploiter une faille et va réaliser une attaque par injection SQL.
