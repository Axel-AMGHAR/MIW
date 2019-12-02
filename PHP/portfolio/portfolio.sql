-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 02 Décembre 2019 à 16:08
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `portfolio`
--

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

CREATE TABLE `competence` (
  `id_competence` int(11) NOT NULL,
  `nom_competence` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `competence`
--

INSERT INTO `competence` (`id_competence`, `nom_competence`) VALUES
(1, 'HTML5'),
(2, 'CSS3'),
(3, 'Java'),
(4, 'php              '),
(5, 'JavaScript'),
(6, 'perl '),
(7, 'Linux'),
(8, 'git '),
(9, 'gitHub'),
(10, 'Bootstrap              '),
(11, 'jQuery');

-- --------------------------------------------------------

--
-- Structure de la table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `my_key` varchar(30) NOT NULL,
  `value` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `config`
--

INSERT INTO `config` (`id`, `my_key`, `value`) VALUES
(1, 'nom', 'AMGHAR'),
(2, 'prenom', 'Axel'),
(3, 'presentation', '"Je suis actuellement à l\'IUT de GAP en licence pro MIW, j\'étudie les langages du web en approfondissant mes compétences en vue de devenir développeur web"'),
(4, 'tel', '06.51.51.04.00'),
(5, 'travaux_git', 'Mes travaux sur <b>GithHub</b>'),
(6, 'adresse', '5 CLOS DES AULNES 84250 LE THOR'),
(7, 'email', 'axel.amghar@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `etudes`
--

CREATE TABLE `etudes` (
  `id_etudes` int(11) NOT NULL,
  `nom_etude` varchar(100) NOT NULL,
  `lib_etude` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etudes`
--

INSERT INTO `etudes` (`id_etudes`, `nom_etude`, `lib_etude`) VALUES
(1, 'Lycée Alphonse Benoit (Aix Marseille Université)', 'Travailler à l\'IUT informatique m\'a permis d\'apprendre de nombreux langages mais aussi de parfaire mes connaissances en informatique'),
(2, 'IUT Info Aix', 'Je suis actuellement à l\'IUT de GAP en licence pro MIW, j\'étudie les langages du web en approfondissant mes compétences en vue de devenir développeur web'),
(3, 'LP MIW GAP', 'IUT Informatique à Aix-en-Provence (Aix Marseille Université) Travailler à l\'IUT informatique m\'a permis d\'apprendre de nombreux langages mais aussi de parfaire mes connaissances en informatique');

-- --------------------------------------------------------

--
-- Structure de la table `experience`
--

CREATE TABLE `experience` (
  `id_exp` int(11) NOT NULL,
  `nom_exp` varchar(100) NOT NULL,
  `lib_exp` varchar(500) NOT NULL,
  `img_exp` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `experience`
--

INSERT INTO `experience` (`id_exp`, `nom_exp`, `lib_exp`, `img_exp`) VALUES
(1, 'Stage BibLibre', 'Stage de 10 semaines à Marseille dans l\'entreprise BibLibre. Le stage consistait à contribuer au logiciel libre Koha. J\'ai développé en Perl/HTML/JavaScript. Et utilisé des outils tels que GitHub, Linux, Bugzilla, ElasticSearch', 'koha_system');

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id_projet` int(11) NOT NULL,
  `nom_projet` varchar(255) NOT NULL,
  `lib_projet` varchar(400) NOT NULL,
  `img_projet` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `projet`
--

INSERT INTO `projet` (`id_projet`, `nom_projet`, `lib_projet`, `img_projet`) VALUES
(1, 'Cook And Burn', 'Création d\'un site de recettes qui permet à chaque utilisateur disposant d\'un compte de partager, créer ou rechercher des recettes. Le site a été écrit principalement en php et en utilisant une base de données mysql.', 'cook_and_burn  '),
(2, 'Site de création de formulaires', 'Création d\'un site type google form, il permet à un utilisateur de créer des questionnaires à choix unique, on peux ensuite consulter les résultats des questionnaires sous forme de pourcentage. Le site a été écrit principalement en JavaScript, HTML et CSS.', 'site_form');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `competence`
--
ALTER TABLE `competence`
  ADD PRIMARY KEY (`id_competence`);

--
-- Index pour la table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etudes`
--
ALTER TABLE `etudes`
  ADD PRIMARY KEY (`id_etudes`);

--
-- Index pour la table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id_exp`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`id_projet`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `competence`
--
ALTER TABLE `competence`
  MODIFY `id_competence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `etudes`
--
ALTER TABLE `etudes`
  MODIFY `id_etudes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `experience`
--
ALTER TABLE `experience`
  MODIFY `id_exp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id_projet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
