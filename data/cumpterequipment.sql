-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 02 avr. 2024 à 20:39
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cumpterequipment`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE `adresse` (
  `id_adresse` int(11) NOT NULL,
  `rue` int(11) NOT NULL,
  `code_postal` varchar(10) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `province` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` varchar(10) NOT NULL,
  `date_creation` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `id_utilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cumpter`
--

CREATE TABLE `cumpter` (
  `id_cumpter` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `courte_description` varchar(255) DEFAULT NULL,
  `quantite` int(11) NOT NULL,
  `prix` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `cumpter`
--

INSERT INTO `cumpter` (`id_cumpter`, `nom`, `description`, `courte_description`, `quantite`, `prix`) VALUES
(17, 'DELL', 'jsdjksdjksdjksdjksdsdjk', '32GO ram i7', 23, '360'),
(18, 'toshiba', 'shsdghsdhsd', 'fdfsdgdsg', 7, '567'),
(19, 'compaq', 'asdasdas', 'asadsadasdsdsad', 2, '456'),
(20, 'hhh', 'hhhhhh', 'rrrrr', 55, '5');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id_image` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `id_cumpter` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id_image`, `path`, `id_cumpter`) VALUES
(9, 'assets/images/nave.png', 17);

-- --------------------------------------------------------

--
-- Structure de la table `produitcommande`
--

CREATE TABLE `produitcommande` (
  `id_commande` int(11) DEFAULT NULL,
  `id_cumpter` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `description` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id_role`, `description`) VALUES
(1, 'admin'),
(2, 'client');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `date_naissance` date DEFAULT NULL,
  `numero_telephone` varchar(50) NOT NULL,
  `path_image` varchar(255) DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `email`, `mot_de_passe`, `date_naissance`, `numero_telephone`, `path_image`, `id_role`) VALUES
(2, 'REBBACHE', 'Makhlouf', 'etudeca202@gmail.com', '$2y$10$FOIijpHxRnpWnUY3BzucnO1B4loQjNproIrYJrHj2tG/dxDjOkz9W', NULL, '0555', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateuradresse`
--

CREATE TABLE `utilisateuradresse` (
  `id_utilisateur` int(11) DEFAULT NULL,
  `id_adresse` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`id_adresse`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `fk_commande_film` (`id_utilisateur`);

--
-- Index pour la table `cumpter`
--
ALTER TABLE `cumpter`
  ADD PRIMARY KEY (`id_cumpter`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `fk_image_produit` (`id_cumpter`);

--
-- Index pour la table `produitcommande`
--
ALTER TABLE `produitcommande`
  ADD KEY `fk_produit_commande` (`id_commande`),
  ADD KEY `fk_commande_produit` (`id_cumpter`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD KEY `fk_utilisateur_role` (`id_role`);

--
-- Index pour la table `utilisateuradresse`
--
ALTER TABLE `utilisateuradresse`
  ADD KEY `fk_utilisateur_adresse` (`id_utilisateur`),
  ADD KEY `fk_adresse_utilisateur` (`id_adresse`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `id_adresse` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `cumpter`
--
ALTER TABLE `cumpter`
  MODIFY `id_cumpter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_commande_film` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `fk_image_produit` FOREIGN KEY (`id_cumpter`) REFERENCES `cumpter` (`id_cumpter`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produitcommande`
--
ALTER TABLE `produitcommande`
  ADD CONSTRAINT `fk_commande_produit` FOREIGN KEY (`id_cumpter`) REFERENCES `cumpter` (`id_cumpter`),
  ADD CONSTRAINT `fk_produit_commande` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fk_utilisateur_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);

--
-- Contraintes pour la table `utilisateuradresse`
--
ALTER TABLE `utilisateuradresse`
  ADD CONSTRAINT `fk_adresse_utilisateur` FOREIGN KEY (`id_adresse`) REFERENCES `adresse` (`id_adresse`),
  ADD CONSTRAINT `fk_utilisateur_adresse` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
