-- MySQL dump 10.13  Distrib 8.0.26-16, for Linux (x86_64)
--
-- Host: 192.168.0.100    Database: univmost_madjid
-- ------------------------------------------------------
-- Server version	5.5.5-8.0.25-Percona-MySQL

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*!50717 SELECT COUNT(*) INTO @rocksdb_has_p_s_session_variables FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'performance_schema' AND TABLE_NAME = 'session_variables' */;
/*!50717 SET @rocksdb_get_is_supported = IF (@rocksdb_has_p_s_session_variables, 'SELECT COUNT(*) INTO @rocksdb_is_supported FROM performance_schema.session_variables WHERE VARIABLE_NAME=\'rocksdb_bulk_load\'', 'SELECT 0') */;
/*!50717 PREPARE s FROM @rocksdb_get_is_supported */;
/*!50717 EXECUTE s */;
/*!50717 DEALLOCATE PREPARE s */;
/*!50717 SET @rocksdb_enable_bulk_load = IF (@rocksdb_is_supported, 'SET SESSION rocksdb_bulk_load = 1', 'SET @rocksdb_dummy_bulk_load = 0') */;
/*!50717 PREPARE s FROM @rocksdb_enable_bulk_load */;
/*!50717 EXECUTE s */;
/*!50717 DEALLOCATE PREPARE s */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(70) DEFAULT NULL,
  `prenom` varchar(70) DEFAULT NULL,
  `password` varchar(70) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `status` varchar(70) NOT NULL,
  `token` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (20,'meddah','mohamed ','123456','madjid27@gmail.com','ACTIVE','');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `choix`
--

DROP TABLE IF EXISTS `choix`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `choix` (
  `etudiant_id` int NOT NULL,
  `sujet_id` int NOT NULL,
  `priorité` int DEFAULT NULL,
  PRIMARY KEY (`etudiant_id`,`sujet_id`),
  KEY `fk_choix_sujet1` (`sujet_id`),
  CONSTRAINT `fk_choix_etudiant1` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiant` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_choix_sujet1` FOREIGN KEY (`sujet_id`) REFERENCES `sujet` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `choix`
--

LOCK TABLES `choix` WRITE;
/*!40000 ALTER TABLE `choix` DISABLE KEYS */;
INSERT INTO `choix` VALUES (1,57,NULL),(1,58,NULL),(1,72,2),(3,56,1),(3,57,2),(3,58,3),(5,1,1),(5,59,2),(6,56,3),(6,57,2),(6,58,1),(7,1,1),(7,59,2),(28,56,1),(28,57,2),(28,58,3),(32,56,1),(32,57,2),(32,58,3);
/*!40000 ALTER TABLE `choix` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enseignant`
--

DROP TABLE IF EXISTS `enseignant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enseignant` (
  `id` int NOT NULL AUTO_INCREMENT,
  `prenom` varchar(70) DEFAULT NULL,
  `nom` varchar(70) DEFAULT NULL,
  `password` varchar(70) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `status` varchar(70) NOT NULL,
  `token` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enseignant`
--

LOCK TABLES `enseignant` WRITE;
/*!40000 ALTER TABLE `enseignant` DISABLE KEYS */;
INSERT INTO `enseignant` VALUES (1,'barodi','rouba','admin','rouba@gmail.com','ACTIVE',''),(2,'ali amrane','kaddari','admin','amrane@gmail.com','',''),(3,'el professor ','prof1','prof','madjid2714@gmail.com','Inactive','a24cdee57977b51ba2efc56db5953139'),(4,'ensei','ensei','123456789','dodm499@gmail.com','ACTIVE','5db2ed0b85a235ec531f042e939b2f38');
/*!40000 ALTER TABLE `enseignant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `etudiant` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(70) DEFAULT NULL,
  `prenom` varchar(70) DEFAULT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(70) DEFAULT NULL,
  `spécialité` varchar(70) DEFAULT NULL,
  `classement` int DEFAULT NULL,
  `sujet_id` int DEFAULT NULL,
  `status` varchar(32) NOT NULL,
  `token` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_etudiant_sujet1` (`sujet_id`),
  CONSTRAINT `fk_etudiant_sujet1` FOREIGN KEY (`sujet_id`) REFERENCES `sujet` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etudiant`
--

LOCK TABLES `etudiant` WRITE;
/*!40000 ALTER TABLE `etudiant` DISABLE KEYS */;
INSERT INTO `etudiant` VALUES (1,'meddah','mohamed madjid','madjid2714@gmail.com','123456','isi',1,56,'ACTIVE',''),(3,'lakhdari','raouf','lakhdari_raouf@gmail.com','123456','isi',2,57,'ACTIVE',''),(5,'kroko','habidou','kroko_hamidou27@gmail.com','123456','resys',1,1,'ACTIVE',''),(6,'simo','aziz','simo_aziz@gmail.com','123456','isi',3,58,'ACTIVE',''),(7,'meddah','youcef','youcefimededdin@gmail.com','987654','resys',2,59,'ACTIVE','0580a8fa5bdd5818691109ce4f77d897'),(28,'etudiant','etudiant','bda.mosta@gmail.com','123456789','isi',4,72,'ACTIVE','fc1fa4ef820a640d5147f6257ca7e827'),(32,'meddah','mohamed madjid','mohamedmadjid.meddah@univ-mosta.dz','madjid27','isi',5,73,'ACTIVE','146777c25fa9755117e2a841be9f1c92'),(33,'bofalfal','amar','h@g.dz','1234','resys',28,NULL,'Inactive','399fe2ba76b3bae96212db3125015af9'),(34,'NEDJAR','Ahlem Ouafa','nedjarahlemouafa02@gmail.com','#Ahlem116njr','isi',NULL,NULL,'Inactive','198cc987413a15a8adb4e5823ed9067c');
/*!40000 ALTER TABLE `etudiant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sujet`
--

DROP TABLE IF EXISTS `sujet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sujet` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) DEFAULT NULL,
  `résumé` longtext,
  `spécialité` varchar(70) DEFAULT NULL,
  `mot_clé` longtext,
  `admin_id` int DEFAULT NULL,
  `enseignant_id` int NOT NULL,
  `etat` varchar(70) DEFAULT 'non validé',
  PRIMARY KEY (`id`),
  KEY `fk_sujet_admin1` (`admin_id`),
  KEY `fk_sujet_enseignant1` (`enseignant_id`),
  CONSTRAINT `fk_sujet_admin1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_sujet_enseignant1` FOREIGN KEY (`enseignant_id`) REFERENCES `enseignant` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sujet`
--

LOCK TABLES `sujet` WRITE;
/*!40000 ALTER TABLE `sujet` DISABLE KEYS */;
INSERT INTO `sujet` VALUES (1,'Modélisation et Implémentation d’entrepôt de données en systèmes NoSQL orientés colonnes ','Les systèmes NoSQL (Not only SQL) sont de plus en plus populaires en raison d\'avantages connus tels que l\'évolutivité horizontale et l\'élasticité des BDD volumineuses. \r\nDans ce projet, dans un premier temps, l’étudiant doit effectuer un état de l’art sur les différentes techniques de modélisation NoSql des entrepôts de données. Ensuite, on va proposer des processus d’implantation d’un entrepôt de données multidimensionnelles avec le modèle NoSQL orienté colonnes. Des règles de mappage qui transforment le modèle de données conceptuel multidimensionnel en modèles logiques orientés colonnes vont être définies pour instancier l’entrepôt de données qui vas être exploité dans une application d’aide à la décision devant être développée à cet effet.','resys','aide à la décision, NoSQL data base, modèle orienté-colonne',NULL,2,'validé'),(56,'Estimation de la qualité des liens dans RPL','L’IoT est caractérisé par la présence de nombreux nœuds disposant de ressources limitées reliés entre eux par des liens à perte formant ce que l’on appelle les LLN (Low Power and Lossy networks). RPL est le protocole de routage standardisé par l’IETF et dédié aux réseaux LLN.\r\nL’objectif de ce travail est d’étudier dans un premier temps le processus d’estimation de la qualité des liens servant au bon fonctionnement de RPL par les nœuds contraints. Cette opération est en effet assez délicate car elle ne doit pas être trop gourmande en énergie tout en assurant au nœud une vue assez précise des conditions qui l’entourent.\r\nL’étudiant devra ensuite proposer une technique capable de réponde à ce compromis puis de l’implémenter et de l’évaluer sur le simulateur COOJA.','isi','IoT, LLN, RPL, routage, QoS ',NULL,2,'validé'),(57,'Etude de la stabilité des clusters dans un réseau ad-hoc véhiculaire','Les réseaux ad hoc de véhicules (VANET) sont un cas particulier des réseaux mobiles Ad-hoc caractérisés par une par une topologie dynamique due à la mobilité des véhicules. Cependant, le réseau ad hoc de véhicules souffre d’une connectivité discontinue et d’une capacité limitée.\r\nLa hiérarchisation du VANET organise le réseau en groupes de nœuds (cluster) en désignant un cluster-head pour chaque cluster et apporte des solutions à ces problèmes si l’on tient compte des particularités des VANET.\r\nL’objectif de ce travail est d’étudier et évaluer la stabilité des clusters dans un réseau véhiculaire.\r\n','isi','clustering , VANET, V2V, mobilité',NULL,2,'validé'),(58,'Utilisation des algorithmes de clustering pour la détection des outliers en aide multicritère à la décision','  La détection des outliers (valeurs aberrantes) est lune des techniques les plus importantes dans le domaine de la fouille de données. Cette technique vise à détecter des objets sensiblement différents du reste des données. Plusieurs algorithmes ont été proposés pour la détection des outliers. Ces algorithmes ont été appliqués dans plusieurs domaines tels que la détection des intrusions dans les réseaux, la détection des fraudes par carte de crédit, la détection des spams dans le courrier électronique. Cependant, peu d’attention a été accordée à la détection des outliers dans le domaine de l’aide multicritère à la décision où les objets sont liés les uns aux autres par des relations de préférence.\r\nL’objectif de ce projet est de proposer une approche intégrant les algorithmes clustering et les relations de préférence pour la détection des outliers dans un contexte décisionnel multicritère.','isi','outlier, aide multicritèreà la décision, relation  de préférence, clustering ',NULL,1,'validé'),(59,'Conception et réalisation d\'une application web pour la gestion des rendez-vous médicaux ','L\'objectif du projet est de concevoir et implémenter un système de prise de rendez-vous médicaux en ligne. Le système permet aux médecins de proposer des plages de rendez-vous aux patients. Ces derniers pourront sur la base de ces plages créer et modifier des rendez-vous. Ce système vise essentiellement à réduire la charge quotidienne des patients en diminuant le temps d\'attente dans la prise d\'un rendez-vous.','resys','Application web, gestion des rendez-vous, bases de données',NULL,1,'validé'),(71,'cccc','ccccc','resys','dddd,eeee',NULL,4,'validé'),(72,'Gestion de la cohérence des données dans les systèmes distribués à grande échelle.','De nos jours, la réplication des données est largement utilisée dans les systèmes à grande échelle (grilles de données, Cloud)  pour répondre aux exigences et aux défis de la gestion d\'énormes quantités de données. En effet, la réplication est utilisée pour améliorer la disponibilité et les performances. Ces objectifs ne peuvent être atteints que par une bonne stratégie de réplication de données, qui adresse aussi le problème de la fiabilité des répliques. Cependant, la plupart des approches proposées ne traitent que les cas de lectures seules lors des accès aux données, et peu d’approches traitent la cohérence des données dans le cas où les accès en écritures sont autorisés.\r\nDans ce contexte, nous proposons à travers ce projet une approche de gestion de répliques dans les systèmes distribués, qui traite le problème de la cohérence des données.','isi','Systèmes distribués, Grille de données, Cloud, réplication de données, cohérence, fiabilité.',NULL,1,'validé'),(73,'Méthodes Ensemblistes dans l’Apprentissage Automatique (Machine Learning) Etude des méthodes de Bagging','En apprentissage automatique (Machine Learning, ML) un modèle ensembliste consiste en un ensemble de modèles « entrainés » (trained) individuellement (t.q des réseaux de neurones ou des arbres de décision). En classification, un modèle ensembliste combine les prédictions d’un ensemble de modèles pour une prédiction plus précise. Le bagging est une méthode ensembliste qui consiste à agréger les prédictions d’un nombre importants de modèles. Des recherches récentes ont montré que les modèles qui suivent un principe de bagging (tels que les forêts aléatoires) sont très performants.\r\nL’objectif du mini-projet est d’abord de faire un tour d’horizon des méthodes ensemblistes (Bagging, Boosting, Stacking) ensuite de mettre l’accent sur le bagging. Une recherche bibliographique permettra de mettre l’accent sur les principaux travaux récents qui ont utilisé un principe de bagging et les avantages et inconvénients des méthodes basées sur un bagging.\r\nDans le mini-projet il sera aussi question d’énumérer les principaux outils logiciels qui permettent d’expérimenter le bagging (Weka, Scikit Learn, Kaggle, …).\r\nDans la seconde partie (le projet), le principe de bagging sera appliqué à un dataset réel en utilisant le module Scikit Learn (Sklearn) sous Python. Des expérimentations seront menées afin d’évaluer les résultats obtenus et faire une comparaison avec des travaux similaires.','isi','Machine learning, Ensemble methods, Bootstrapping, Bagging, Boosting, Stacking, Scikit Learn',NULL,1,'validé');
/*!40000 ALTER TABLE `sujet` ENABLE KEYS */;
UNLOCK TABLES;
/*!50112 SET @disable_bulk_load = IF (@is_rocksdb_supported, 'SET SESSION rocksdb_bulk_load = @old_rocksdb_bulk_load', 'SET @dummy_rocksdb_bulk_load = 0') */;
/*!50112 PREPARE s FROM @disable_bulk_load */;
/*!50112 EXECUTE s */;
/*!50112 DEALLOCATE PREPARE s */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-22 23:55:26
