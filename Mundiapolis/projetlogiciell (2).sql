-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 18 Janvier 2016 à 02:13
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `projetlogiciell`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id_Categorie` int(30) NOT NULL AUTO_INCREMENT,
  `id_Categorie_Mere` int(30) DEFAULT NULL,
  `libelle_Categorie` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_Categorie`),
  KEY `FK_id_Categorie_Mere` (`id_Categorie_Mere`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id_Categorie`, `id_Categorie_Mere`, `libelle_Categorie`) VALUES
(3, NULL, 'Math'),
(4, 3, 'Algebre'),
(5, 4, 'Analyse'),
(6, NULL, 'Informatique'),
(7, 6, 'Programmation'),
(8, 7, 'Programmation oriente objet'),
(9, 8, 'Java'),
(10, NULL, 'Communication '),
(11, 7, 'Programmetion web '),
(12, 11, 'PHP'),
(13, 11, 'CSS'),
(14, 11, 'HTML'),
(15, 7, 'Programmation lineaire'),
(16, 7, 'Probleme du voyageur de commerce');

-- --------------------------------------------------------

--
-- Structure de la table `competencematiere`
--

CREATE TABLE IF NOT EXISTS `competencematiere` (
  `id_Categorie` int(50) NOT NULL AUTO_INCREMENT,
  `code_Matiere` varchar(255) NOT NULL,
  PRIMARY KEY (`id_Categorie`,`code_Matiere`),
  KEY `competencematiere_ibfk_2` (`code_Matiere`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `competencematiere`
--

INSERT INTO `competencematiere` (`id_Categorie`, `code_Matiere`) VALUES
(7, 'OH');

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

CREATE TABLE IF NOT EXISTS `filiere` (
  `code_Filiere` varchar(255) NOT NULL,
  `nom_Filiere` varchar(255) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  PRIMARY KEY (`code_Filiere`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `filiere`
--

INSERT INTO `filiere` (`code_Filiere`, `nom_Filiere`, `Description`) VALUES
('GA', 'Genie Aeronautique', 'L''objectif de cette formation est de donner aux étudiants les connaissances nécessaires pour pouvoir développer des recherches de haut niveau dans le domaine du génie mécanique en s''appuyant sur l''institut Clément Ader  qui regroupe les recherches en génie mécanique de l''UPS, l'' INSAT, l''ISAE, et l''ENSTIMAC, le laboratoire LGP de Tarbes , le CIRIMAT au niveau des polymères, le CEMES au niveau matériau, l''IMFT au niveau du couplage fluide structure et du laboratoire Phase au niveau CND  '),
('GE', 'Genie Electrique', 'La formation dans la filière Génie Electrique est volontairement ouverte de manière à permettre à ses ingénieurs d’exercer leurs compétences dans des domaines d’activité très divers. Les industriels recherchent des candidats à fort potentiel, capables d’être opérationnels rapidement et de s’adapter aussi facilement à des situation nouvelles est variées. Une ouverture sur l’entreprise et une formation pluridisciplinaire de haut niveau, privilégiant l’initiative et le sens critique, sont des atouts indispensables à la réussite sur le marché du travail.'),
('GI', 'Genie Informatique', 'L’objectif de la formation au sein de la filière Génie Informatique est de former des ingénieurs généralistes en informatique capable de :\r\ns’intégrer dans n’importe quelle entreprise qui offre des services et qui développe des activités liées au domaine de l’informatique pris au sens large du terme.\r\ns’adapter aux changements technologiques que connaît ce domaine de manière continue à travers la culture projet, l’autoformation et la formation continue.'),
('GIn', 'Genie Indistruel', 'Le programme de la filière Génie Industriel et Logistique vise à offrir des connaissances et un savoir faire dans le domaine de la Conception, Installation et Exploitation des systèmes de production et de distribution des biens et des services. Profil dit "Génie Industriel et Logistique" apprécié par :\r\nUne formation polyvalente\r\nLa capacité d’appréhender les problèmes de différents points de vue.\r\nLa capacité de communiquer avec les différents intervenants du système entreprise.\r\nLa capacité de s’adapter selon le besoin de l’entreprise'),
('MIP1', 'Math Informatique Physique', 'L’objectif de la filière Enseignements Généraux et Techniques (E.G.T) est de préparer et de donner à l’élève ingénieur les bases scientifiques et techniques, ainsi que les connaissances en langues et communications indispensables à la poursuite des études dans une filière du cycle ingénieur. Les disciplines enseignées sont : les mathématiques, la physique, l’informatique, les sciences de l’ingénieur, la chimie, les langues (français et anglais), culture et communications. Ces enseignements sont complétés par des rencontres avec des ingénieurs, de visites d’entreprises, de conférences et de stages dits stages ouvriers. La présence des élèves ingénieurs à toutes les formes d’enseignements est obligatoire. L’enseignement est constitué de cours magistraux, de travaux dirigés, de travaux pratiques; il s’appuie sur des outils pédagogiques interactifs: laboratoires de langues, équipements multimédias, et'),
('Pc', 'Physique chimie', 'L’objectif de la filière Enseignements Généraux et Techniques (E.G.T) est de préparer et de donner à l’élève ingénieur les bases scientifiques et techniques, ainsi que les connaissances en langues et communications indispensables à la poursuite des études dans une filière du cycle ingénieur. Les disciplines enseignées sont : les mathématiques, la physique, l’informatique, les sciences de l’ingénieur, la chimie, les langues (français et anglais), culture et communications. Ces enseignements sont complétés par des rencontres avec des ingénieurs, de visites d’entreprises, de conférences et de stages dits stages ouvriers. La présence des élèves ingénieurs à toutes les formes d’enseignements est obligatoire. L’enseignement est constitué de cours magistraux, de travaux dirigés, de travaux pratiques; il s’appuie sur des outils pédagogiques interactifs: laboratoires de langues, équipements multimédias, et'),
('RTA', 'Resaux et Telecomm Avance', 'La formation au sein de la filière Génie Réseaux et Télécoms a pour vocation de maîtriser les réseaux de Télécommunications et résolution des problèmes liés. Le programme de formation oriente vers la maîtrise et le déploiement, l''administration et la sécurité des réseaux de Télécommunications');

-- --------------------------------------------------------

--
-- Structure de la table `filierematieresp`
--

CREATE TABLE IF NOT EXISTS `filierematieresp` (
  `code_Matiere` varchar(255) NOT NULL,
  `code_Filiere` varchar(255) NOT NULL,
  `id_Semestre` int(50) NOT NULL,
  `id_Programme` int(20) NOT NULL,
  PRIMARY KEY (`code_Matiere`,`code_Filiere`,`id_Semestre`,`id_Programme`),
  KEY `filierematieresp_ibfk_2` (`code_Filiere`),
  KEY `filierematieresp_ibfk_4` (`id_Semestre`),
  KEY `filierematieresp_ibfk_5` (`id_Programme`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `filierematieresp`
--

INSERT INTO `filierematieresp` (`code_Matiere`, `code_Filiere`, `id_Semestre`, `id_Programme`) VALUES
('RO', 'GI', 1, 4),
('RO', 'RTA', 1, 4),
('TW', 'GI', 2, 4),
('LCp', 'GI', 3, 4),
('OH', 'GI', 3, 4),
('OH', 'RTA', 4, 3);

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE IF NOT EXISTS `matiere` (
  `code_Matiere` varchar(255) NOT NULL,
  `libelle_matiere` varchar(255) NOT NULL,
  `objectif` varchar(1000) NOT NULL,
  PRIMARY KEY (`code_Matiere`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `matiere`
--

INSERT INTO `matiere` (`code_Matiere`, `libelle_matiere`, `objectif`) VALUES
('Al', 'Algèbre 1', 'À la fin de ce cours, l’étudiant sera en mesure de:  -résoudre des systèmes d’équations algébriques linéaires à l’aide de l’élimination de Gauss et de factorisations matricielles -reconnaître et expliquer ce que sont les quatre sous-espaces fondamentaux de l’algèbre linéaire, soit l’espace des colonnes, le noyau, l’espace des lignes et le noyau à gauche'),
('JD', 'Java Descktop', 'Ce cours complet et détaillé sur le langage fournit une bonne expérience théorique et pratique de la programmation orientée objets (P.O.O.) avec Java avec l''apprentissage de :  l''écriture, la compilation et le débogage de programmes les concepts objets et les mécanismes d''héritage la création d''applications et d''applets le développement d''interfaces graphiques (GUI) la lecture/écriture de données en utilisant les streams la programmation réseau etc.'),
('LCp', 'langage et compilaltion', 'L’objectif de ce ce cours est d’introduire à aux concepts fondamentaux de l’informatique que sont langages et automates. Il doit permettre d’acquérir les connaissances en terme de savoirs (fondamentaux et appliqués) Langage : lexicographie, syntaxe, sémantique Description et reconnaissance de langages Compilation : vérifications syntaxiques et sémantiques, génération de code, optimisation'),
('Mc', 'Matrice ', ''),
('OH', 'Optimisation Heuristique', 'Si les méthodes de résolution exactes permettent d’obtenir une solutions dont l’optimalité est garantie, dans certaines situations, on peut cependant chercher des solutions de bonne qualité, sans garantie d’optimalité, mais au profit d’un temps de calcul plus réduit. Pour cela, On applique des méthodes appelées métaheuristiques, adaptées à chaque problème traité, avec cependant l’inconvénient de ne disposer en retour d’aucune information sur la qualité des solutions obtenues.'),
('PL', 'Projet Logiciel', ''),
('RO', 'Recherche Operationnel', 'Les étudiants seront familiarisés avec les principaux modèles de la recherche opérationnelle. Ils sauront utiliser les algorithmes associés et en auront compris les fondements. Par des exemples et des exercices, ils seront entraînés à la modélisation de problèmes de décision rencontrés par l''ingénieur.'),
('TW', 'Technologie Web', 'Le terme « Java EE » signifie Java Enterprise Edition, et était anciennement raccourci en « J2EE ». Il fait quant à lui référence à une extension de la plate-forme standard. Autrement dit, la plate-forme Java EE est construite sur le langage Java et la plate-forme Java SE, et elle y ajoute un grand nombre de bibliothèques remplissant tout un tas de fonctionnalités que la plate-forme standard ne remplit pas d''origine. L''objectif majeur de Java EE est de faciliter le développement d''applications web robustes et distribuées, déployées et exécutées sur un serveur d''applications. Inutile de rentrer plus loin dans les détails, tout ceci étant bien entendu l''objet des chapitres à venir.');

-- --------------------------------------------------------

--
-- Structure de la table `matiere_pre_requise`
--

CREATE TABLE IF NOT EXISTS `matiere_pre_requise` (
  `code_Matiere` varchar(255) NOT NULL,
  `matiere_Prerequis` varchar(255) NOT NULL,
  PRIMARY KEY (`code_Matiere`,`matiere_Prerequis`),
  KEY `matiere_Prerequis` (`matiere_Prerequis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `matiere_pre_requise`
--

INSERT INTO `matiere_pre_requise` (`code_Matiere`, `matiere_Prerequis`) VALUES
('RO', 'Al'),
('TW', 'JD'),
('OH', 'Mc'),
('OH', 'RO');

-- --------------------------------------------------------

--
-- Structure de la table `prerequismatiere`
--

CREATE TABLE IF NOT EXISTS `prerequismatiere` (
  `id_Categorie` int(50) NOT NULL AUTO_INCREMENT,
  `code_Matiere` varchar(255) NOT NULL,
  PRIMARY KEY (`id_Categorie`,`code_Matiere`),
  KEY `prerequismatiere_ibfk_2` (`code_Matiere`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `prerequismatiere`
--

INSERT INTO `prerequismatiere` (`id_Categorie`, `code_Matiere`) VALUES
(3, 'OH');

-- --------------------------------------------------------

--
-- Structure de la table `programme`
--

CREATE TABLE IF NOT EXISTS `programme` (
  `id_Programme` int(20) NOT NULL AUTO_INCREMENT,
  `Programme` varchar(255) NOT NULL,
  PRIMARY KEY (`id_Programme`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `programme`
--

INSERT INTO `programme` (`id_Programme`, `Programme`) VALUES
(1, 'Tronc Commun'),
(2, 'Licence'),
(3, 'Master'),
(4, 'Cycle d''ingenieur');

-- --------------------------------------------------------

--
-- Structure de la table `programmefiliere`
--

CREATE TABLE IF NOT EXISTS `programmefiliere` (
  `id_Programme` int(50) NOT NULL,
  `code_Filiere` varchar(50) NOT NULL,
  PRIMARY KEY (`id_Programme`,`code_Filiere`),
  KEY `code_Filiere` (`code_Filiere`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `programmefiliere`
--

INSERT INTO `programmefiliere` (`id_Programme`, `code_Filiere`) VALUES
(4, 'GA'),
(2, 'GE'),
(4, 'GI'),
(4, 'GIn'),
(1, 'MIP1'),
(1, 'Pc');

-- --------------------------------------------------------

--
-- Structure de la table `semestre`
--

CREATE TABLE IF NOT EXISTS `semestre` (
  `id_Semestre` int(20) NOT NULL AUTO_INCREMENT,
  `libelle_Semestre` varchar(255) NOT NULL,
  PRIMARY KEY (`id_Semestre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `semestre`
--

INSERT INTO `semestre` (`id_Semestre`, `libelle_Semestre`) VALUES
(1, 'Semestre1'),
(2, 'Semestre2'),
(3, 'Semestre3'),
(4, 'Semestre4');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `mp` varchar(30) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `login`, `mp`, `type`) VALUES
(1, 'Manel', 'A@mundiapolis.ma', '12345', 'admin'),
(2, 'Wafaa', 'P@mundiapolis.ma', '12345', 'prof'),
(3, 'Oumaima', 'S@mundiapolis.ma', '12345', 'secr');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD CONSTRAINT `FK_id_Categorie_Mere` FOREIGN KEY (`id_Categorie_Mere`) REFERENCES `categorie` (`id_Categorie`);

--
-- Contraintes pour la table `competencematiere`
--
ALTER TABLE `competencematiere`
  ADD CONSTRAINT `competencematiere_ibfk_1` FOREIGN KEY (`id_Categorie`) REFERENCES `categorie` (`id_Categorie`),
  ADD CONSTRAINT `competencematiere_ibfk_2` FOREIGN KEY (`code_Matiere`) REFERENCES `matiere` (`code_Matiere`);

--
-- Contraintes pour la table `filierematieresp`
--
ALTER TABLE `filierematieresp`
  ADD CONSTRAINT `filierematieresp_ibfk_2` FOREIGN KEY (`code_Filiere`) REFERENCES `filiere` (`code_Filiere`),
  ADD CONSTRAINT `filierematieresp_ibfk_3` FOREIGN KEY (`code_Matiere`) REFERENCES `matiere` (`code_Matiere`),
  ADD CONSTRAINT `filierematieresp_ibfk_4` FOREIGN KEY (`id_Semestre`) REFERENCES `semestre` (`id_Semestre`),
  ADD CONSTRAINT `filierematieresp_ibfk_5` FOREIGN KEY (`id_Programme`) REFERENCES `programme` (`id_Programme`);

--
-- Contraintes pour la table `matiere_pre_requise`
--
ALTER TABLE `matiere_pre_requise`
  ADD CONSTRAINT `matiere_pre_requise_ibfk_3` FOREIGN KEY (`matiere_Prerequis`) REFERENCES `matiere` (`code_Matiere`),
  ADD CONSTRAINT `matiere_pre_requise_ibfk_1` FOREIGN KEY (`code_Matiere`) REFERENCES `matiere` (`code_Matiere`);

--
-- Contraintes pour la table `prerequismatiere`
--
ALTER TABLE `prerequismatiere`
  ADD CONSTRAINT `prerequismatiere_ibfk_1` FOREIGN KEY (`id_Categorie`) REFERENCES `categorie` (`id_Categorie`),
  ADD CONSTRAINT `prerequismatiere_ibfk_2` FOREIGN KEY (`code_Matiere`) REFERENCES `matiere` (`code_Matiere`);

--
-- Contraintes pour la table `programmefiliere`
--
ALTER TABLE `programmefiliere`
  ADD CONSTRAINT `programmefiliere_ibfk_2` FOREIGN KEY (`code_Filiere`) REFERENCES `filiere` (`code_Filiere`),
  ADD CONSTRAINT `programmefiliere_ibfk_1` FOREIGN KEY (`id_Programme`) REFERENCES `programme` (`id_Programme`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
