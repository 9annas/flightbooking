-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Dim 25 Mars 2018 à 14:34
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `flightbooking`
--

-- --------------------------------------------------------

--
-- Structure de la table `ligne_reservation`
--

CREATE TABLE `ligne_reservation` (
  `id_vol` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `id_reservation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `username`, `password`, `mail`) VALUES
(1, 'Arif', 'Badreddine', 'bigg-hkayen125@hotmail.com', '123456', 'bigg-hkayen125@hotmail.com'),
(2, 'hello', 'world', 'helloworld@hotmail.com', '123456', 'helloworld@hotmail.com'),
(3, 'Badr', 'Arif', 'bigg@hotmail.com', '123456', 'bigg@hotmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `vol`
--

CREATE TABLE `vol` (
  `id` int(11) NOT NULL,
  `num_vol` varchar(255) NOT NULL,
  `nb_place` int(11) NOT NULL,
  `type_class` int(11) NOT NULL,
  `ville_dep` varchar(255) NOT NULL,
  `ville_arr` varchar(255) NOT NULL,
  `dep_time` text NOT NULL,
  `vol_duration` varchar(100) NOT NULL,
  `comp_name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `vol`
--

INSERT INTO `vol` (`id`, `num_vol`, `nb_place`, `type_class`, `ville_dep`, `ville_arr`, `dep_time`, `vol_duration`, `comp_name`, `price`) VALUES
(1, '1937', 200, 2, 'Casablanca', 'Montreal', '17h00', '7h30', 'ram.png', 700),
(2, '209', 210, 2, 'Montreal', 'Casablanca', '16h10', '6h50', 'aircad.png', 600),
(3, '7850', 220, 2, 'Paris', 'New York', '9h20', '6h20', 'airfr.png', 578),
(4, '3310', 200, 2, 'New York', 'Paris', '18h30', '7h10', 'unair.png', 760),
(5, '994', 300, 2, 'Vancouver', 'Tokyo', '19h10', '8h20', 'japanair.png', 970),
(6, '420', 400, 2, 'Marrakech', 'Johannesburg', '11h00', '7:00', 'saair.png', 658),
(7, '720', 320, 2, 'Johannesburg', 'Marrakech', '20h10', '6h50', 'ram.png', 784),
(8, '1080', 270, 2, 'Tokyo', 'Vencouver', '10h00', '8h40', 'emirates.png', 987),
(10, '5484', 50, 1, 'Casablanca', 'Montreal', '17h00', '7h30', 'ram.png', 1000),
(11, '4548', 60, 1, 'Montreal', 'Casablanca', '16h10', '6h50', 'aricad.png', 980),
(14, '217', 55, 1, 'Paris', 'New York', '9h20', '6h20', 'airfr.png', 890),
(15, '324', 60, 1, 'New York', 'Paris', '18h30', '7h10', 'unair.png', 1200),
(17, '545', 70, 1, 'Vancoucer', 'Tokyo', '19h10', '8h20', 'japanair.png', 1700),
(19, '477', 20, 1, 'Marrakech', 'Johannesburg', '11h00', '7h00', 'saair.png', 1000),
(21, '598', 60, 1, 'Johannesburg', 'Marrakech', '20h10', '6h50', 'ram.png', 1145),
(23, '655', 50, 1, 'Tokyo', 'Vencouver', '10h00', '8h40', 'emirates.png', 1874),
(24, '4847', 20, 3, 'Casablanca', 'Montreal', '17h00', '7h30', 'ram.png', 900),
(27, '8799', 35, 3, 'Montreal', 'Casablanca', '16h10', '6h50', 'aircad.png', 870),
(28, '7484', 25, 3, 'Vancouver', 'Tokyo', '19h10', '8h20', 'japanair.png', 1050),
(31, '9999', 32, 3, 'Tokyo', 'Vancouver', '10h00', '8h40', 'emirates.png', 1200),
(32, '1545', 22, 3, 'Paris', 'New York', '9h20', '6h30', 'airfr.png', 1100),
(35, '666', 24, 3, 'New York', 'Paris', '18h30', '7h10', 'unair.png', 1150);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `ligne_reservation`
--
ALTER TABLE `ligne_reservation`
  ADD PRIMARY KEY (`id_vol`,`id_reservation`),
  ADD KEY `id_reservation` (`id_reservation`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vol`
--
ALTER TABLE `vol`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `vol`
--
ALTER TABLE `vol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `ligne_reservation`
--
ALTER TABLE `ligne_reservation`
  ADD CONSTRAINT `ligne_reservation_ibfk_1` FOREIGN KEY (`id_reservation`) REFERENCES `reservation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ligne_reservation_ibfk_2` FOREIGN KEY (`id_vol`) REFERENCES `vol` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
