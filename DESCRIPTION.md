**Description du Projet** 
Création de Comptes Automatique pour Pterodactyl
Ce projet a pour objectif de simplifier et d'automatiser la création de comptes utilisateurs sur un panel Pterodactyl. Grâce à un script PHP léger, les nouveaux utilisateurs peuvent s’inscrire via un formulaire en ligne, et leur compte est immédiatement créé sur le panel sans intervention manuelle de l’administrateur.

Ce système est idéal pour les hébergeurs de serveurs de jeux souhaitant accélérer leur processus d'inscription et offrir une meilleure expérience à leurs utilisateurs.

**Objectifs du projet**
Permettre aux utilisateurs de créer un compte Pterodactyl en toute autonomie.

Éviter la gestion manuelle des inscriptions depuis l’interface admin.

Proposer une solution simple à déployer, sans base de données.

**Fonctionnement**
L’administrateur configure le script en ajoutant :

L’URL de son panel Pterodactyl.

Une clé API administrateur avec les permissions nécessaires (Users, Read & Write).

Une fois en ligne, l’utilisateur accède à un formulaire d’inscription. Lors de la validation, le script envoie automatiquement une requête à l’API Pterodactyl pour créer un nouveau compte avec les informations fournies.

**Avantages**
Installation rapide : un seul fichier PHP à modifier et uploader.

Aucune base de données requise : tout passe par l’API de Pterodactyl.

Interface légère et simple pour les utilisateurs.

Compatible avec tous les hébergeurs web prenant en charge PHP.