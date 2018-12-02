-- Generation time: Sun, 02 Dec 2018 18:37:23 +0000
-- Host: localhost
-- DB name: gestion_ecole
/*!40030 SET NAMES UTF8 */;
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP TABLE IF EXISTS `absences_eleves`;
CREATE TABLE `absences_eleves` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_eleves` int(11) NOT NULL,
  `id_classes` int(11) NOT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `nbr_heurs` int(11) DEFAULT NULL,
  `justifier` tinyint(1) DEFAULT NULL,
  `motif` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `absences_eleves` VALUES ('1','11','3','2018-11-24','2018-11-30','40','1','holiday'),
('2','13','1','2018-11-01','2018-11-28','80','0','test'); 


DROP TABLE IF EXISTS `absences_employes`;
CREATE TABLE `absences_employes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_employes` int(11) NOT NULL,
  `id_annees_scolaire` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `nbr_heurs` int(11) NOT NULL,
  `justifier` tinyint(1) NOT NULL,
  `motif` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `absences_employes` VALUES ('1','2','3','2018-11-18','2018-11-24','48','0','first edit ebsences'),
('2','2','3','2018-11-24','2018-11-24','8','1','maladie justifier'); 


DROP TABLE IF EXISTS `annees_scolaires`;
CREATE TABLE `annees_scolaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO `annees_scolaires` VALUES ('1','2016-2017'),
('2','2017-2018'),
('3','2018-2019'),
('8','2019-2020'); 


DROP TABLE IF EXISTS `avances`;
CREATE TABLE `avances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_employes` int(11) NOT NULL,
  `id_mode_paiements` int(11) NOT NULL,
  `id_annees_scolaire` int(11) NOT NULL,
  `date_avance` date NOT NULL,
  `montant` int(11) NOT NULL,
  `motif` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `avances` VALUES ('1','3','1','2','2018-12-30','1000','motif avance'); 


DROP TABLE IF EXISTS `charges_depenses`;
CREATE TABLE `charges_depenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_operation` date NOT NULL,
  `type` text NOT NULL,
  `motif` text NOT NULL,
  `montant` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS `classes`;
CREATE TABLE `classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_niveaux` int(11) NOT NULL,
  `id_annees_scolaire` int(11) DEFAULT NULL,
  `libelle` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `classes` VALUES ('1','4',NULL,'C1'),
('2','4',NULL,'C2'),
('3','4',NULL,'C3'); 


DROP TABLE IF EXISTS `conges`;
CREATE TABLE `conges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_employes` int(11) NOT NULL,
  `date_demande` date NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `sans_solde` tinyint(1) NOT NULL,
  `valider` tinyint(1) NOT NULL,
  `motif` text NOT NULL,
  `id_annees_scolaire` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `conges` VALUES ('1','3','2018-11-18','2018-11-20','2018-11-30','0','1','conge 1','3'),
('2','3','2018-11-01','2018-11-20','2018-11-30','1','0','conge 10','3'); 


DROP TABLE IF EXISTS `detail_tasks`;
CREATE TABLE `detail_tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tasks` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` text NOT NULL,
  `priorite` text NOT NULL,
  `manager` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

INSERT INTO `detail_tasks` VALUES ('2','6','ajouter confirmation du password dans les pags : http://localhost/gestionEcole/modifier_users.php?users=1 ','3','2','Achraf'),
('3','6','dans les page ajouter utilisateur vous devez ajouter validation : les dex mot de pass sont different comme dans la page reset_password','3','2','Achraf'),
('4','5','ajouter des labels dans le fichier lang.php','1','1','Oumaima'),
('5','5','ajouter des icone facebook, twitter google plus','1','1','Oumaima'),
('6','5','ajouter logo','1','1','Oumaima'),
('7','5','modifier logo','1','1','Oumaima'),
('8','5','gerer les long adresse','1','1','Oumaima'),
('9','4','Nombre etudiant par niveau','3','2','Achraf'),
('10','4','Somme des paiement non effectue','3','3','Achraf'),
('11','7','Ajouter manager et priorite','3','2','Achraf'),
('12','4','afficher les taches','3','2','Achraf'),
('13','8','Modifier employe : ajouter Radio button style  pour vacataire et employe','3','2','Achraf'),
('14','8','ajouter label:  _SALAIRE _MENSUELLE :  et _SALAIRE par _HEURS :','3','1','Achraf'),
('15','8','remove all foreign key and indexes','3','1','Achraf'),
('16','8','afficher icon class juste pour les formateur','3','1','Achraf'),
('17','8','gere les class d\'un formateur : liste contient deux icon add (V) et remove(X)','3','3','Achraf'),
('18','10','ajouter le nombre de jour d\'un conge','3','1','Achraf'),
('19','11','Lister les avances','3','1','Noura'),
('20','11','Ajouter avance','3','1','Noura'),
('21','12','Ajouter paiement','1','1','Achraf'),
('24','4','ajouter des idee ici pour tableau de Bord','3','1','Achraf'),
('25','11','Modifier avance','3','1','Noura'),
('26','11','annuler avance','3','1','Noura'),
('27','12','Modifier  paiement','1','1','Achraf'),
('28','12','Supprimer Paiement','1','1','Achraf'),
('29','9','import database','3','3','Achraf'),
('30','9','export database','3','3','Achraf'),
('31','9','ajouter dans le menu','3','3','Achraf'),
('32','9','lister des version','3','3','Achraf'),
('33','3','lister le journal','3','2','Achraf'),
('34','3','ajouter dans le journal','3','1','Achraf'),
('35','13','comboBow Class change when we change Niveau or AnneScolaire','3','3','Noura'),
('37','14','changer lcione de fiche technik d\'un eleve','3','1','Achraf'),
('38','14','class doit lier just au  niveau','3','1','Achraf'),
('39','14','ajouter anne_scolaire dans inscription','3','1','Achraf'),
('40','14','cherccher dans tt les fonction ou anne scolaire est lier a class','3','1','Achraf'),
('41','14','detail des etudiant : Etape des études dans l\'etablissement','3','1','Achraf'),
('42','14','problem dans les details d\'un etudiant','3','1','Achraf'),
('43','14','modifier absence eleve : radio','3','1','Achraf'),
('44','13','ajouter button annuler or close qui permet de retourne au page precedent','3','3','Achraf'),
('45','14','reviser la somme a payer','3','1','Achraf'),
('46','15','message derreur','3','2','Noura'),
('47','15','Forgotten Password','3','3','Noura'),
('48','15','envoie d\'email','3','3','Achraf'),
('49','6','dans les page modifier utilisateur vous devez ajouter validation : les dex mot de pass sont different comme dans la page reset_password','3','2','Achraf'),
('50','8','check if the sum of avance > salaire','3','2','Achraf'); 


DROP TABLE IF EXISTS `eleves`;
CREATE TABLE `eleves` (
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

INSERT INTO `eleves` VALUES ('11','1','Saloumi','Malak','N','Ing informatik','2016-02-05','Marrakech','  Achraf','Ing informatik','HA132209','+212 6 53 90 36 59','+212 5 24 64 51 28','Derb derraz N1 zaouia ','Marrakech','Enfant de soleil','+212 6 53 90 36 59','EE260999'),
('12','2','Saloumi','Fatima zahra','N','Ing informatik','2018-11-01','Marrakech','Achraf','Ing informatik','HA132209','+212 6 53 90 36 59','+212 5 24 64 51 28','Derb derraz N1 zaouia ','Marrakech','Enfant de soleil','+212 6 53 90 36 59','EE260999'),
('13','3','Saloumi','Abdel Rahmane','R','Elec','2011-08-12','Marrakech','Simo','Elec','HA132209','+212 6 53 90 36 59','+212 5 24 64 51 28','Derb derraz N1 zaouia ','Marrakech','Enfant de soleil','+212 6 53 90 36 59','EE260999'),
('14','4','Saloumi','Imane','R','Elec','2014-12-12','Marrakech','Simo','Elec','HA132209','+212 6 53 90 36 59','+212 5 24 64 51 28','Derb derraz N1 zaouia ','Marrakech','Enfant de soleil','+212 6 53 90 36 59','EE260999'),
('15','100','saloumi','tarik','test','test','1985-07-09','test','test','test','test','test','test','kech','kech','test','test','test'); 


DROP TABLE IF EXISTS `employes`;
CREATE TABLE `employes` (
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
  `date_arret` text,
  `cnss` text,
  `banques` text,
  `rib` text,
  `salaire_mensuelle` float NOT NULL,
  `salaire_par_heurs` float NOT NULL,
  `sexe` text,
  `politesse` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `employes` VALUES ('1','HA132209','Brahim','Barjali','+2125634585555','adresse','a.mareshal@gmail.com','user.jpg','Directeur','0','0','2018-10-01','','142365896','Banque populaire','211111258455545445544','40000','0','2','3'),
('2','tev','Mohammed','Lechiakh','+21254879633','sfsdfsdgd','ach@fdsf.sfgdfs','user.jpg','test','1','1','2018-01-01','2019-01-01','sdfqdfdsqfsqdf','','','10000','0','2','3'),
('3','tev1','Stitini','Oumaima','+212548796331','sfsdfsdgd1','ach@fdsf.sfgdfs1','user.jpg','test1','1',NULL,'2018-01-11','2019-01-11','sdfqdfdsqfsqdf1','PB100','11111111111','5000','0','1','2'); 


DROP TABLE IF EXISTS `employes_classes`;
CREATE TABLE `employes_classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_employes` int(11) NOT NULL,
  `id_classes` int(11) NOT NULL,
  `id_annees_scolaire` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO `employes_classes` VALUES ('7','2','1','3'),
('8','2','3','3'); 


DROP TABLE IF EXISTS `etablissements`;
CREATE TABLE `etablissements` (
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

INSERT INTO `etablissements` VALUES ('1','mySchool 200','IMG_20170520_112326.jpg','+212 5 53 90 36 58','+212 6 53 90 36 57','+212 5 24 25 26 26','Bd moulay abdelah residence T Num 6\r\nfghfgh fhfg hfg hf hfg hf ghfg h fg hf ghfg h','a.mareshal@gmail.com','wwww.myshool.com','https://www.facebook.com/myschool','https://twitter.com/myschool?lang=fr','https://twitter.com/myschool?lang=fr'); 


DROP TABLE IF EXISTS `inscriptions`;
CREATE TABLE `inscriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num_inscription` int(11) DEFAULT NULL,
  `date_inscription` date DEFAULT NULL,
  `id_classes` int(11) DEFAULT NULL,
  `id_eleves` int(11) DEFAULT NULL,
  `frais_inscription` int(11) DEFAULT NULL,
  `frais_mensuelle` int(11) NOT NULL,
  `id_annees_scolaire` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO `inscriptions` VALUES ('8','10','2018-11-06','3','11','1500','900','3'),
('9','11','2018-11-06','3','11','1500','900','2'),
('10','12','2018-11-06','1','13','1500','900','3'),
('11','13','2018-08-22','3','14','1500','900','3'),
('12','1000','2018-11-11','3','15','1500','900','3'); 


DROP TABLE IF EXISTS `logs`;
CREATE TABLE `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `date_operation` datetime NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=latin1;

INSERT INTO `logs` VALUES ('1','1','2018-11-26 00:00:00','Ajouter paiements pour l eleve : saloumi tarik,montant : 900 du mois :3'),
('2','1','2018-11-26 00:00:00','Ajouter paiements pour l eleve : saloumi tarik,montant : 900 du mois :4'),
('3','1','2018-11-26 00:00:00','Ajouter paiements pour l eleve : saloumi tarik,montant : 900 du mois :5'),
('4','1','2018-11-26 00:00:00','Ajouter paiements pour l eleve : saloumi tarik,montant : 900 du mois :6'),
('5','1','2018-11-26 00:00:00','Login :NomEmploye prenomEmploye'),
('6','1','2018-11-26 21:21:26','Login :NomEmploye prenomEmploye'),
('7','1','2018-11-26 22:46:14','Ajouter l element 8 de la table annees_scolaires'),
('8','1','2018-11-26 22:48:50','Login :NomEmploye prenomEmploye'),
('9','1','2018-11-26 22:49:58','Deconnexion :NomEmploye prenomEmploye'),
('10','1','2018-11-27 14:38:37','Login :NomEmploye prenomEmploye'),
('11','1','2018-11-27 15:04:16','Ajouter l element 9 de la table retards_eleves'),
('12','1','2018-11-27 18:07:38','Login :NomEmploye prenomEmploye'),
('13','1','2018-11-27 18:08:31','Modifier l element  de la table tasks'),
('14','1','2018-11-27 18:08:47','Modifier l element  de la table detail_tasks'),
('15','1','2018-11-27 19:39:40','Modifier l element  de la table tasks'),
('16','1','2018-11-27 19:39:54','Modifier l element  de la table detail_tasks'),
('17','1','2018-11-27 19:51:49','Modifier l element  de la table detail_tasks'),
('18','1','2018-11-27 19:51:58','Modifier l element  de la table detail_tasks'),
('19','1','2018-11-27 19:52:19','Modifier l element  de la table tasks'),
('20','1','2018-11-27 19:53:09','Modifier l element  de la table detail_tasks'),
('21','1','2018-11-27 19:53:33','Modifier l element  de la table tasks'),
('22','1','2018-11-27 20:04:53','Deconnexion :NomEmploye prenomEmploye'),
('23','1','2018-11-28 01:14:18','Login :NomEmploye prenomEmploye'),
('24','1','2018-11-28 01:17:15','Modifier l element  de la table detail_tasks'),
('25','1','2018-11-28 01:17:35','Ajouter l element 48 de la table detail_tasks'),
('26','1','2018-11-28 01:17:59','Modifier l element  de la table tasks'),
('27','1','2018-11-28 19:10:28','Login :NomEmploye prenomEmploye'),
('28','1','2018-11-28 21:51:40','Modifier l element  de la table tasks'),
('29','1','2018-11-28 22:17:42','Ajouter l element 2 de la table absences_eleves'),
('30','1','2018-11-28 22:19:34','Modifier l element  de la table absences_eleves'),
('31','1','2018-11-28 22:53:12','Ajouter l element 2 de la table users'),
('32','1','2018-11-28 22:54:04','Supprimer l element 2 de la table users'),
('33','1','2018-11-28 22:59:55','Ajouter l element 3 de la table users'),
('34','1','2018-11-29 21:47:47','Login :NomEmploye prenomEmploye'),
('35','1','2018-11-30 13:49:58','Login :NomEmploye prenomEmploye'),
('36','1','2018-11-30 15:43:11','Ajouter l element 1 de la table avances'),
('37','1','2018-11-30 16:12:01','Modifier l element  de la table avances'),
('38','1','2018-11-30 19:18:14','Modifier l element  de la table detail_tasks'),
('39','1','2018-11-30 19:18:24','Modifier l element  de la table detail_tasks'),
('40','1','2018-11-30 19:18:31','Modifier l element  de la table detail_tasks'),
('41','1','2018-11-30 19:18:46','Modifier l element  de la table detail_tasks'),
('42','1','2018-11-30 19:19:27','Modifier l element  de la table tasks'),
('43','1','2018-11-30 19:45:55','Deconnexion :NomEmploye prenomEmploye'),
('44','1','2018-11-30 19:46:25','Login :NomEmploye prenomEmploye'),
('45','1','2018-11-30 19:46:44','Deconnexion :NomEmploye prenomEmploye'),
('46','1','2018-11-30 21:15:15','Login :NomEmploye prenomEmploye'),
('47','1','2018-11-30 21:18:17','Ajouter l element 4 de la table users'),
('48','1','2018-11-30 21:18:44','Modifier l element  de la table detail_tasks'),
('49','1','2018-11-30 21:20:20','Ajouter l element 49 de la table detail_tasks'),
('50','1','2018-11-30 21:21:14','Modifier l element  de la table detail_tasks'),
('51','1','2018-11-30 21:21:25','Modifier l element  de la table detail_tasks'),
('52','1','2018-11-30 23:02:53','Supprimer l element 1 de la table tasks'),
('53','1','2018-11-30 23:03:08','Supprimer l element 2 de la table tasks'),
('54','1','2018-12-01 00:20:09','Login :NomEmploye prenomEmploye'),
('55','1','2018-12-01 09:39:11','Login :NomEmploye prenomEmploye'),
('56','1','2018-12-01 10:49:52','Login :NomEmploye prenomEmploye'),
('57','1','2018-12-01 10:51:57','Modifier l element  de la table detail_tasks'),
('58','1','2018-12-01 10:52:06','Modifier l element  de la table detail_tasks'),
('59','1','2018-12-01 10:52:13','Modifier l element  de la table detail_tasks'),
('60','1','2018-12-01 10:52:22','Modifier l element  de la table detail_tasks'),
('61','1','2018-12-01 10:52:52','Modifier l element  de la table tasks'),
('62','1','2018-12-01 13:42:20','Modifier l element  de la table detail_tasks'),
('63','1','2018-12-01 14:01:19','Deconnexion :NomEmploye prenomEmploye'),
('64','1','2018-12-01 14:04:16','Login :NomEmploye prenomEmploye'),
('65','1','2018-12-01 16:20:46','Modifier l element  de la table detail_tasks'),
('66','1','2018-12-01 16:21:01','Modifier l element  de la table tasks'),
('67','1','2018-12-01 16:21:43','Ajouter l element 50 de la table detail_tasks'),
('68','1','2018-12-01 16:22:01','Modifier l element  de la table tasks'),
('69','1','2018-12-01 16:24:24','Modifier l element  de la table tasks'),
('70','1','2018-12-01 16:27:29','Ajouter l element 5 de la table users'),
('71','1','2018-12-01 16:28:51','Ajouter l element 6 de la table users'),
('72','1','2018-12-01 16:29:00','Supprimer l element 6 de la table users'),
('73','1','2018-12-01 16:29:04','Supprimer l element 5 de la table users'),
('74','1','2018-12-01 16:29:07','Supprimer l element 3 de la table users'),
('75','1','2018-12-01 16:29:09','Supprimer l element 4 de la table users'),
('76','1','2018-12-01 16:38:01','Modifier l element  de la table users'),
('77','1','2018-12-01 16:50:17','Modifier l element  de la table employes'),
('78','1','2018-12-01 16:50:38','Modifier l element  de la table employes'),
('79','1','2018-12-01 16:50:55','Modifier l element  de la table employes'),
('80','1','2018-12-01 16:52:26','Modifier l element  de la table detail_tasks'),
('81','1','2018-12-01 16:52:49','Modifier l element  de la table detail_tasks'),
('82','1','2018-12-01 16:53:13','Modifier l element  de la table detail_tasks'),
('83','1','2018-12-01 16:56:13','Modifier l element  de la table tasks'),
('84','1','2018-12-01 16:57:47','Modifier l element  de la table tasks'),
('85','1','2018-12-01 17:13:44','Modifier l element  de la table detail_tasks'),
('86','1','2018-12-01 17:18:49','Modifier l element  de la table detail_tasks'),
('87','1','2018-12-01 17:40:47','Modifier l element  de la table detail_tasks'),
('88','1','2018-12-01 22:01:12','Login :Brahim Barjali'),
('89','1','2018-12-01 22:02:33','Modifier l element  de la table detail_tasks'),
('90','1','2018-12-01 22:03:26','Modifier l element  de la table detail_tasks'),
('91','1','2018-12-01 22:03:32','Modifier l element  de la table detail_tasks'),
('92','1','2018-12-01 22:03:39','Modifier l element  de la table detail_tasks'),
('93','1','2018-12-01 22:03:45','Modifier l element  de la table detail_tasks'),
('94','1','2018-12-01 22:03:58','Modifier l element  de la table detail_tasks'),
('95','1','2018-12-01 23:43:25','Modifier l element  de la table detail_tasks'),
('96','1','2018-12-01 23:58:03','Login :Brahim Barjali'),
('97','1','2018-12-01 23:58:49','Login :Brahim Barjali'),
('98','1','2018-12-02 01:01:31','Modifier l element  de la table tasks'),
('99','1','2018-12-02 01:01:48','Modifier l element  de la table detail_tasks'),
('100','1','2018-12-02 01:02:02','Modifier l element  de la table detail_tasks'),
('101','1','2018-12-02 01:04:33','Login :Brahim Barjali'),
('102','1','2018-12-02 01:06:17','Modifier l element  de la table detail_tasks'),
('103','1','2018-12-02 01:07:18','Modifier l element  de la table detail_tasks'),
('104','1','2018-12-02 01:13:21','Login :Brahim Barjali'),
('105','1','2018-12-02 01:13:32','Login :Brahim Barjali'),
('106','1','2018-12-02 01:17:02','Login :Brahim Barjali'),
('107','1','2018-12-02 01:27:14','Modifier l element  de la table detail_tasks'),
('108','1','2018-12-02 10:20:57','Login :Brahim Barjali'),
('109','1','2018-12-02 11:55:51','Modifier l element  de la table detail_tasks'),
('110','1','2018-12-02 12:04:42','Login :Brahim Barjali'),
('111','1','2018-12-02 12:05:27','Modifier l element  de la table employes'),
('112','1','2018-12-02 13:01:44','Modifier l element  de la table detail_tasks'),
('113','1','2018-12-02 13:01:55','Modifier l element  de la table detail_tasks'),
('114','1','2018-12-02 13:53:15','Login :Brahim Barjali'),
('115','1','2018-12-02 14:04:51','Ajouter l element 4 de la table employes_classes'),
('116','1','2018-12-02 14:05:19','Ajouter l element 5 de la table employes_classes'),
('117','1','2018-12-02 14:27:06','Ajouter l element 6 de la table employes_classes'),
('118','1','2018-12-02 14:39:11','Ajouter l element 7 de la table employes_classes'),
('119','1','2018-12-02 14:39:18','Ajouter l element 8 de la table employes_classes'),
('120','1','2018-12-02 14:50:35','Modifier l element  de la table detail_tasks'); 


DROP TABLE IF EXISTS `mode_paiements`;
CREATE TABLE `mode_paiements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `mode_paiements` VALUES ('1','Espéces'); 


DROP TABLE IF EXISTS `niveaux`;
CREATE TABLE `niveaux` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO `niveaux` VALUES ('1','Toute petite section'),
('4','Petit section'),
('5','La moyenne'),
('6','La grande'); 


DROP TABLE IF EXISTS `paiements_eleves`;
CREATE TABLE `paiements_eleves` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_eleves` int(11) NOT NULL,
  `id_mode_paiements` int(11) NOT NULL,
  `id_annees_scolaire` int(11) NOT NULL,
  `date_paiements` date NOT NULL,
  `mois` text NOT NULL,
  `motif` text NOT NULL,
  `montant` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

INSERT INTO `paiements_eleves` VALUES ('15','11','1','3','2018-11-15','11','3000','900'),
('16','11','1','3','2018-11-15','12','3000','900'),
('17','11','1','3','2018-11-15','1','3000','900'),
('18','11','1','3','2018-11-15','2','3000','300'),
('19','11','1','3','2018-11-16','2','fin du mois 2','600'),
('25','11','1','3','2018-11-16','0','full task','1500'),
('26','11','1','3','2018-11-16','3','full task','500'),
('27','11','1','3','2018-11-24','3','6700','900'),
('28','11','1','3','2018-11-24','4','6700','900'),
('29','11','1','3','2018-11-24','5','6700','900'),
('30','11','1','3','2018-11-24','6','6700','900'),
('31','15','1','3','2018-11-01','0','test','1500'),
('32','15','1','3','2018-11-01','11','test','900'),
('33','15','1','3','2018-11-01','12','tets','900'),
('34','15','1','3','2018-11-01','1','tets','900'),
('35','15','1','3','2018-11-01','2','tets','900'),
('36','15','1','3','2018-11-01','3','tets','900'),
('37','15','1','3','2018-11-01','4','tets','900'),
('38','15','1','3','2018-11-01','5','tets','900'),
('39','15','1','3','2018-11-01','6','tets','900'); 


DROP TABLE IF EXISTS `paiements_employes`;
CREATE TABLE `paiements_employes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_employes` int(11) NOT NULL,
  `id_mode_paiements` int(11) NOT NULL,
  `id_annees_scolaire` int(11) NOT NULL,
  `date_paiements` date NOT NULL,
  `mois` text NOT NULL,
  `motif` text NOT NULL,
  `montant` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS `retards_eleves`;
CREATE TABLE `retards_eleves` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_eleves` int(11) NOT NULL,
  `id_classes` int(11) NOT NULL,
  `date_retards` date DEFAULT NULL,
  `nbr_heurs` int(11) DEFAULT NULL,
  `justifier` tinyint(1) DEFAULT NULL,
  `motif` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO `retards_eleves` VALUES ('1','11','1','2018-11-12','24','1','maladie'),
('2','11','3','2018-11-09','18','1','test'),
('3','12','3','2018-11-09','24','1','test'),
('7','12','3','2018-10-09','2','0','test 2'),
('8','12','3','2018-11-10','2','1','retarfd'),
('9','13','1','2018-11-24','2','0','retard'); 


DROP TABLE IF EXISTS `salles`;
CREATE TABLE `salles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nbr_place` int(11) DEFAULT NULL,
  `libelle` text NOT NULL,
  `type` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `salles` VALUES ('1','200','Salle 10','2'); 


DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `taux` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

INSERT INTO `tasks` VALUES ('3','Gestion des Journaux','100'),
('4','Gestion de DASHBOARD','100'),
('5','Gestion d\'etablissement','80'),
('6','Gestion des utilisateurs','100'),
('7','Gestion des taches','100'),
('8','Gestion des employes','75'),
('9','Gestion de DATABASE','100'),
('10','Gestion des conge','100'),
('11','Gestion des avances','100'),
('12','Paiement des employes','20'),
('13','Autres','67'),
('14','Gestion des eleves','100'),
('15','Authentification','100'); 


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_employes` int(11) NOT NULL,
  `login` text NOT NULL,
  `password` text NOT NULL,
  `role` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `users` VALUES ('1','1','achraf.saloumi@bmw.de','test','1'); 




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

