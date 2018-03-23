-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 23 Mars 2018 à 10:39
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
(1, 'Arif', 'Badreddine', 'bigg-hkayen125@hotmail.com', '123456', 'bigg-hkayen125@hotmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `vol`
--

CREATE TABLE `vol` (
  `id` int(11) NOT NULL,
  `num_vol` varchar(255) NOT NULL,
  `nb_place_eco` int(11) NOT NULL,
  `nb_place_first` int(11) NOT NULL,
  `ville_dep` varchar(255) NOT NULL,
  `ville_arr` varchar(255) NOT NULL,
  `dep_time` text NOT NULL,
  `vol_duration` varchar(100) NOT NULL,
  `comp_name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `price_first` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `vol`
--

INSERT INTO `vol` (`id`, `num_vol`, `nb_place_eco`, `nb_place_first`, `ville_dep`, `ville_arr`, `dep_time`, `vol_duration`, `comp_name`, `price`, `price_first`) VALUES
(1, '1937', 200, 50, 'Casablanca', 'Montreal', '17h00', '7h30', 'ram.png', 700, 1000),
(2, '209', 210, 60, 'Montreal', 'Casablanca', '16h10', '6h50', 'aircad.png', 600, 980),
(3, '7850', 220, 55, 'Paris', 'New York', '9h20', '6h20', 'airfr.png', 578, 890),
(4, '3310', 200, 60, 'New York', 'Paris', '18h30', '7h10', 'unair.png', 760, 1200),
(5, '994', 300, 70, 'Vancouver', 'Tokyo', '19h10', '8h20', 'japanair.png', 970, 1700),
(6, '420', 400, 20, 'Marrakech', 'Johannesburg', '11h00', '7:00', 'saair.png', 658, 1000),
(7, '720', 320, 60, 'Johannesburg', 'Marrakech', '20h10', '6h50', 'ram.png', 784, 1145),
(8, '1080', 270, 50, 'Tokyo', 'Vencouver', '10h00', '8h40', 'emirates.png', 987, 1874);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `vol`
--
ALTER TABLE `vol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
