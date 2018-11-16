-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 16 nov. 2018 à 21:50
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestion_ecole`
--

-- --------------------------------------------------------

--
-- Structure de la table `absences_eleves`
--

DROP TABLE IF EXISTS `absences_eleves`;
CREATE TABLE IF NOT EXISTS `absences_eleves` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_eleves` int(11) NOT NULL,
  `id_classes` int(11) NOT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `nbr_heurs` int(11) DEFAULT NULL,
  `justifier` tinyint(1) DEFAULT NULL,
  `motif` text,
  PRIMARY KEY (`id`),
  KEY `id_employes` (`id_eleves`),
  KEY `id_classes` (`id_classes`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `absences_eleves`
--

INSERT INTO `absences_eleves` (`id`, `id_eleves`, `id_classes`, `date_debut`, `date_fin`, `nbr_heurs`, `justifier`, `motif`) VALUES
(1, 11, 2, '2018-11-12', '2018-11-14', 24, 1, 'maladie'),
(2, 11, 3, '2018-11-09', '2018-11-11', 18, 1, 'test'),
(3, 12, 3, '2018-11-09', '2018-11-12', 24, 1, 'test'),
(7, 12, 3, '2018-10-09', '2018-10-12', 8, 0, 'test');

-- --------------------------------------------------------

--
-- Structure de la table `absences_employes`
--

DROP TABLE IF EXISTS `absences_employes`;
CREATE TABLE IF NOT EXISTS `absences_employes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_employes` int(11) NOT NULL,
  `id_annees_scolaire` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `nbr_heurs` int(11) NOT NULL,
  `justifier` tinyint(1) NOT NULL,
  `motif` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_employes` (`id_employes`),
  KEY `id_anne_scolaires` (`id_annees_scolaire`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `annees_scolaires`
--

DROP TABLE IF EXISTS `annees_scolaires`;
CREATE TABLE IF NOT EXISTS `annees_scolaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `annees_scolaires`
--

INSERT INTO `annees_scolaires` (`id`, `libelle`) VALUES
(1, '2016-2017'),
(2, '2017-2018'),
(3, '2018-2019');

-- --------------------------------------------------------

--
-- Structure de la table `avances`
--

DROP TABLE IF EXISTS `avances`;
CREATE TABLE IF NOT EXISTS `avances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_employes` int(11) NOT NULL,
  `id_mode_paiements` int(11) NOT NULL,
  `id_annees_scolaire` int(11) NOT NULL,
  `date_avance` date NOT NULL,
  `montant` int(11) NOT NULL,
  `motif` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_employes` (`id_employes`),
  KEY `id_mode_paiements` (`id_mode_paiements`),
  KEY `id_annees_scolaire` (`id_annees_scolaire`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `charges_depenses`
--

DROP TABLE IF EXISTS `charges_depenses`;
CREATE TABLE IF NOT EXISTS `charges_depenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_operation` date NOT NULL,
  `type` text NOT NULL,
  `motif` text NOT NULL,
  `montant` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_niveaux` int(11) NOT NULL,
  `id_annees_scolaire` int(11) NOT NULL,
  `libelle` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_classes_niveaux` (`id_niveaux`),
  KEY `fk_classes_annees_scolaire` (`id_annees_scolaire`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `classes`
--

INSERT INTO `classes` (`id`, `id_niveaux`, `id_annees_scolaire`, `libelle`) VALUES
(1, 4, 3, 'C1'),
(2, 4, 3, 'C2'),
(3, 4, 3, 'C3');

-- --------------------------------------------------------

--
-- Structure de la table `conges`
--

DROP TABLE IF EXISTS `conges`;
CREATE TABLE IF NOT EXISTS `conges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_employes` int(11) NOT NULL,
  `date_demande` date NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `sans_solde` tinyint(1) NOT NULL,
  `valider` tinyint(1) NOT NULL,
  `motif` text NOT NULL,
  `id_annees_scolaire` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_employes` (`id_employes`),
  KEY `id_annee_scolaires` (`id_annees_scolaire`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `eleves`
--

DROP TABLE IF EXISTS `eleves`;
CREATE TABLE IF NOT EXISTS `eleves` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num_ordre` int(11) NOT NULL DEFAULT '0',
  `nom` text,
  `prenom` text,
  `nom_mere` text,
  `profession_mere` text,
  `date_naissance` date DEFAULT NULL,
  `lieu_naissance` text,
  `nom_pere` text,
  `profession_pere` text,
  `cin_pere` text,
  `tel_mere` text,
  `tel_domicile` text,
  `adresse_parents` text,
  `adresse_personnels` text,
  `ecole_precedente` text,
  `tel_parents` text,
  `cin_mere` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `eleves`
--

INSERT INTO `eleves` (`id`, `num_ordre`, `nom`, `prenom`, `nom_mere`, `profession_mere`, `date_naissance`, `lieu_naissance`, `nom_pere`, `profession_pere`, `cin_pere`, `tel_mere`, `tel_domicile`, `adresse_parents`, `adresse_personnels`, `ecole_precedente`, `tel_parents`, `cin_mere`) VALUES
(11, 1, 'Saloumi', 'Malak', 'N', 'Ing informatik', '2016-02-05', 'Marrakech', '  Achraf', 'Ing informatik', 'HA132209', '+212 6 53 90 36 59', '+212 5 24 64 51 28', 'Derb derraz N1 zaouia ', 'Marrakech', 'Enfant de soleil', '+212 6 53 90 36 59', 'EE260999'),
(12, 2, 'Saloumi', 'Fatima zahra', 'N', 'Ing informatik', '2018-11-01', 'Marrakech', 'Achraf', 'Ing informatik', 'HA132209', '+212 6 53 90 36 59', '+212 5 24 64 51 28', 'Derb derraz N1 zaouia ', 'Marrakech', 'Enfant de soleil', '+212 6 53 90 36 59', 'EE260999'),
(13, 3, 'Saloumi', 'Abdel Rahmane', 'R', 'Elec', '2011-08-12', 'Marrakech', 'Simo', 'Elec', 'HA132209', '+212 6 53 90 36 59', '+212 5 24 64 51 28', 'Derb derraz N1 zaouia ', 'Marrakech', 'Enfant de soleil', '+212 6 53 90 36 59', 'EE260999'),
(14, 4, 'Saloumi', 'Imane', 'R', 'Elec', '2014-12-12', 'Marrakech', 'Simo', 'Elec', 'HA132209', '+212 6 53 90 36 59', '+212 5 24 64 51 28', 'Derb derraz N1 zaouia ', 'Marrakech', 'Enfant de soleil', '+212 6 53 90 36 59', 'EE260999'),
(15, 100, 'saloumi', 'tarik', 'test', 'test', '1985-07-09', 'test', 'test', 'test', 'test', 'test', 'test', 'kech', 'kech', 'test', 'test', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `eleves_classes`
--

DROP TABLE IF EXISTS `eleves_classes`;
CREATE TABLE IF NOT EXISTS `eleves_classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_eleves` int(11) NOT NULL,
  `id_classes` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_eleves` (`id_eleves`),
  KEY `id_classes` (`id_classes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `employes`
--

DROP TABLE IF EXISTS `employes`;
CREATE TABLE IF NOT EXISTS `employes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cin` text NOT NULL,
  `nom` text,
  `prenom` text,
  `tel` text,
  `adresse` text,
  `email` text,
  `photo` text,
  `fonction` text,
  `isFormateur` tinyint(1) DEFAULT NULL,
  `isVacataire` tinyint(1) DEFAULT NULL,
  `date_embauche` date DEFAULT NULL,
  `date_arret` date DEFAULT NULL,
  `cnss` text,
  `banques` text,
  `rib` text,
  `sexe` text,
  `situation_familiale` text,
  `nationalite` text,
  `cv` text,
  `contrat` text,
  `piece_identite` text,
  `politesse` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `employes`
--

INSERT INTO `employes` (`id`, `cin`, `nom`, `prenom`, `tel`, `adresse`, `email`, `photo`, `fonction`, `isFormateur`, `isVacataire`, `date_embauche`, `date_arret`, `cnss`, `banques`, `rib`, `sexe`, `situation_familiale`, `nationalite`, `cv`, `contrat`, `piece_identite`, `politesse`) VALUES
(1, 'HA132209', 'NomEmploye', 'prenomEmploye', '+2125634585555', 'adresse', 'a.maresqdfqkfq@qkjsdk.qdq', NULL, 'Directeur', 0, 0, '2018-10-01', NULL, '142365896', 'Banque populaire', '211111258455545445544', 'Masculin', 'Marie', 'Marocain', NULL, NULL, NULL, 'Mr.');

-- --------------------------------------------------------

--
-- Structure de la table `employes_classes`
--

DROP TABLE IF EXISTS `employes_classes`;
CREATE TABLE IF NOT EXISTS `employes_classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_employes` int(11) NOT NULL,
  `id_classes` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_eleves` (`id_employes`),
  KEY `id_classes` (`id_classes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `etablissements`
--

DROP TABLE IF EXISTS `etablissements`;
CREATE TABLE IF NOT EXISTS `etablissements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `logo` text NOT NULL,
  `tel` text NOT NULL,
  `mobile` text NOT NULL,
  `fax` text NOT NULL,
  `adresse` text NOT NULL,
  `email` text NOT NULL,
  `site_web` text NOT NULL,
  `page_facebook` text NOT NULL,
  `page_twitter` text NOT NULL,
  `google_plus` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etablissements`
--

INSERT INTO `etablissements` (`id`, `nom`, `logo`, `tel`, `mobile`, `fax`, `adresse`, `email`, `site_web`, `page_facebook`, `page_twitter`, `google_plus`) VALUES
(1, 'mySchool 200', 'IMG_20170520_112326.jpg', '+212 5 53 90 36 58', '+212 6 53 90 36 57', '+212 5 24 25 26 26', 'Bd moulay abdelah residence T Num 6\r\nfghfgh fhfg hfg hf hfg hf ghfg h fg hf ghfg h', 'a.mareshal@gmail.com', 'wwww.myshool.com', 'https://www.facebook.com/myschool', 'https://twitter.com/myschool?lang=fr', 'https://twitter.com/myschool?lang=fr');

-- --------------------------------------------------------

--
-- Structure de la table `inscriptions`
--

DROP TABLE IF EXISTS `inscriptions`;
CREATE TABLE IF NOT EXISTS `inscriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num_inscription` int(11) DEFAULT NULL,
  `date_inscription` date DEFAULT NULL,
  `id_classes` int(11) DEFAULT NULL,
  `id_eleves` int(11) DEFAULT NULL,
  `frais_inscription` int(11) DEFAULT NULL,
  `frais_mensuelle` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_classes` (`id_classes`),
  KEY `id_eleves` (`id_eleves`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `inscriptions`
--

INSERT INTO `inscriptions` (`id`, `num_inscription`, `date_inscription`, `id_classes`, `id_eleves`, `frais_inscription`, `frais_mensuelle`) VALUES
(8, 10, '2018-11-06', 3, 11, 1500, 900),
(9, 11, '2018-11-06', 3, 11, 1500, 900),
(10, 12, '2018-11-06', 3, 13, 1500, 900),
(11, 13, '2018-08-22', 3, 14, 1500, 900),
(12, 1000, '2018-11-11', 1, 15, 1500, 900);

-- --------------------------------------------------------

--
-- Structure de la table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `date_operation` date NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_users` (`id_users`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `mode_paiements`
--

DROP TABLE IF EXISTS `mode_paiements`;
CREATE TABLE IF NOT EXISTS `mode_paiements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `mode_paiements`
--

INSERT INTO `mode_paiements` (`id`, `libelle`) VALUES
(1, 'EspÃ©ces');

-- --------------------------------------------------------

--
-- Structure de la table `niveaux`
--

DROP TABLE IF EXISTS `niveaux`;
CREATE TABLE IF NOT EXISTS `niveaux` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `niveaux`
--

INSERT INTO `niveaux` (`id`, `libelle`) VALUES
(1, 'Toute petite section'),
(4, 'Petit section');

-- --------------------------------------------------------

--
-- Structure de la table `paiements_eleves`
--

DROP TABLE IF EXISTS `paiements_eleves`;
CREATE TABLE IF NOT EXISTS `paiements_eleves` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_eleves` int(11) NOT NULL,
  `id_mode_paiements` int(11) NOT NULL,
  `id_annees_scolaire` int(11) NOT NULL,
  `date_paiements` date NOT NULL,
  `mois` text NOT NULL,
  `motif` text NOT NULL,
  `montant` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_employes` (`id_eleves`),
  KEY `id_mode_paiements` (`id_mode_paiements`),
  KEY `id_annee_scolaires` (`id_annees_scolaire`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `paiements_eleves`
--

INSERT INTO `paiements_eleves` (`id`, `id_eleves`, `id_mode_paiements`, `id_annees_scolaire`, `date_paiements`, `mois`, `motif`, `montant`) VALUES
(15, 11, 1, 3, '2018-11-15', '11', '3000', 900),
(16, 11, 1, 3, '2018-11-15', '12', '3000', 900),
(17, 11, 1, 3, '2018-11-15', '1', '3000', 900),
(18, 11, 1, 3, '2018-11-15', '2', '3000', 300),
(19, 11, 1, 3, '2018-11-16', '2', 'fin du mois 2', 600);

-- --------------------------------------------------------

--
-- Structure de la table `paiements_personnels`
--

DROP TABLE IF EXISTS `paiements_personnels`;
CREATE TABLE IF NOT EXISTS `paiements_personnels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_employes` int(11) NOT NULL,
  `id_mode_paiements` int(11) NOT NULL,
  `id_annees_scolaire` int(11) NOT NULL,
  `date_paiements` date NOT NULL,
  `mois` text NOT NULL,
  `motif` text NOT NULL,
  `montant` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_employes` (`id_employes`),
  KEY `id_mode_paiements` (`id_mode_paiements`),
  KEY `id_annee_scolaires` (`id_annees_scolaire`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `retards_eleves`
--

DROP TABLE IF EXISTS `retards_eleves`;
CREATE TABLE IF NOT EXISTS `retards_eleves` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_eleves` int(11) NOT NULL,
  `id_classes` int(11) NOT NULL,
  `date_retards` date DEFAULT NULL,
  `nbr_heurs` int(11) DEFAULT NULL,
  `justifier` tinyint(1) DEFAULT NULL,
  `motif` text,
  PRIMARY KEY (`id`),
  KEY `id_employes` (`id_eleves`),
  KEY `id_classes` (`id_classes`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `retards_eleves`
--

INSERT INTO `retards_eleves` (`id`, `id_eleves`, `id_classes`, `date_retards`, `nbr_heurs`, `justifier`, `motif`) VALUES
(1, 11, 4, '2018-11-12', 24, 1, 'maladie'),
(2, 11, 3, '2018-11-09', 18, 1, 'test'),
(3, 12, 3, '2018-11-09', 24, 1, 'test'),
(7, 12, 3, '2018-10-09', 2, 0, 'test 2'),
(8, 12, 3, '2018-11-10', 2, 1, 'retarfd');

-- --------------------------------------------------------

--
-- Structure de la table `salles`
--

DROP TABLE IF EXISTS `salles`;
CREATE TABLE IF NOT EXISTS `salles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nbr_place` int(11) DEFAULT NULL,
  `libelle` text NOT NULL,
  `type` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `salles`
--

INSERT INTO `salles` (`id`, `nbr_place`, `libelle`, `type`) VALUES
(1, 200, 'Salle 10', '2');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_employes` int(11) NOT NULL,
  `login` text NOT NULL,
  `password` text NOT NULL,
  `role` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_employes` (`id_employes`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `id_employes`, `login`, `password`, `role`) VALUES
(1, 1, 'achraf.saloumi@bmw.de', 'test', '1');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `absences_eleves`
--
ALTER TABLE `absences_eleves`
  ADD CONSTRAINT `absences_eleves_ibfk_2` FOREIGN KEY (`id_eleves`) REFERENCES `eleves` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `absences_employes`
--
ALTER TABLE `absences_employes`
  ADD CONSTRAINT `absences_employes_ibfk_1` FOREIGN KEY (`id_annees_scolaire`) REFERENCES `annees_scolaires` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `absences_employes_ibfk_2` FOREIGN KEY (`id_employes`) REFERENCES `employes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `avances`
--
ALTER TABLE `avances`
  ADD CONSTRAINT `avances_ibfk_1` FOREIGN KEY (`id_annees_scolaire`) REFERENCES `annees_scolaires` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `avances_ibfk_2` FOREIGN KEY (`id_employes`) REFERENCES `employes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `avances_ibfk_3` FOREIGN KEY (`id_mode_paiements`) REFERENCES `mode_paiements` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`id_niveaux`) REFERENCES `niveaux` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk1` FOREIGN KEY (`id_annees_scolaire`) REFERENCES `annees_scolaires` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `conges`
--
ALTER TABLE `conges`
  ADD CONSTRAINT `conges_ibfk_1` FOREIGN KEY (`id_employes`) REFERENCES `employes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `conges_ibfk_2` FOREIGN KEY (`id_annees_scolaire`) REFERENCES `annees_scolaires` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `eleves_classes`
--
ALTER TABLE `eleves_classes`
  ADD CONSTRAINT `eleves_classes_ibfk_1` FOREIGN KEY (`id_classes`) REFERENCES `classes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `eleves_classes_ibfk_2` FOREIGN KEY (`id_eleves`) REFERENCES `eleves` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `employes_classes`
--
ALTER TABLE `employes_classes`
  ADD CONSTRAINT `employes_classes_ibfk_1` FOREIGN KEY (`id_employes`) REFERENCES `employes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `employes_classes_ibfk_2` FOREIGN KEY (`id_classes`) REFERENCES `classes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD CONSTRAINT `inscriptions_ibfk_1` FOREIGN KEY (`id_classes`) REFERENCES `classes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `inscriptions_ibfk_2` FOREIGN KEY (`id_eleves`) REFERENCES `eleves` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `paiements_eleves`
--
ALTER TABLE `paiements_eleves`
  ADD CONSTRAINT `paiements_eleves_ibfk_1` FOREIGN KEY (`id_annees_scolaire`) REFERENCES `annees_scolaires` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `paiements_eleves_ibfk_2` FOREIGN KEY (`id_eleves`) REFERENCES `eleves` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `paiements_eleves_ibfk_3` FOREIGN KEY (`id_mode_paiements`) REFERENCES `mode_paiements` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `paiements_personnels`
--
ALTER TABLE `paiements_personnels`
  ADD CONSTRAINT `paiements_personnels_ibfk_1` FOREIGN KEY (`id_annees_scolaire`) REFERENCES `annees_scolaires` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `paiements_personnels_ibfk_2` FOREIGN KEY (`id_employes`) REFERENCES `employes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `paiements_personnels_ibfk_3` FOREIGN KEY (`id_mode_paiements`) REFERENCES `mode_paiements` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_employes`) REFERENCES `employes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
