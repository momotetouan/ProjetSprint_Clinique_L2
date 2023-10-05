# Conception d'un Site Web pour la Gestion d'une Clinique

## Description

Ce projet consiste en la conception et le développement d'un site web destiné à la gestion d'une clinique. Le site offre des fonctionnalités pour les employés de la clinique, notamment la prise de rendez-vous avec les médecins, la gestion des patients, le paiement, et bien plus encore. Il a été développé dans le cadre d'un projet académique.

## Table des matières

- [Fonctionnalités](#fonctionnalités)
- [Architecture du Projet](#architecture-du-projet)
- [Développement Préalable](#développement-préalable)
- [Utilisation](#utilisation)

## Fonctionnalités

Le site web offre les fonctionnalités suivantes pour différents types d'utilisateurs (agents d'accueil, médecins, directeur) :

- Saisie et modification des informations des patients.
- Consultation des synthèses des patients.
- Prise de rendez-vous avec les médecins.
- Gestion des paiements via un compte interne.
- Blocage de créneaux horaires par les médecins pour des tâches administratives.
- Création et modification de comptes utilisateurs (directeur).
- Création et suppression de motifs de rendez-vous (directeur).

## Architecture du Projet

Le projet suit une architecture MVC (Modèle-Vue-Contrôleur) pour garantir la séparation des responsabilités. Les langages utilisés sont HTML5, CSS3, PHP et JavaScript (JS).

## Développement Préalable

Avant de commencer le développement, nous avons créé un Modèle Conceptuel de Données (MCD) et déduit le Modèle Logique de Données Relationnelles (MLDR). Ces schémas sont inclus dans la documentation du projet.

## Installation

1. Clonez ce référentiel sur votre ordinateur.

2. Configurez votre serveur web (ex. : Apache) pour servir le dossier `public` comme racine du site.

3. Importez la structure de la base de données à partir du fichier SQL fourni dans `database/`.

4. Configurez la connexion à la base de données dans `app/config/database.php`.

5. Lancez le site web en accédant à l'URL de votre serveur.

## Utilisation

- Accédez à la page d'accueil et connectez-vous avec les identifiants appropriés en fonction de votre rôle (agent, médecin, directeur).

- Utilisez les fonctionnalités spécifiques à votre rôle pour gérer les patients, les rendez-vous, les paiements, etc.



