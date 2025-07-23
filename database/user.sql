-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 23 juil. 2025 à 09:58
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `group4`
--

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `user_id` int(2) NOT NULL,
  `username` varchar(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `balance` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `username`, `first_name`, `last_name`, `email`, `password`, `balance`) VALUES
(1, 'akari.takahashi', 'Akari', 'Takahashi', 'akari.t@example.com', '$2y$10$MF.02ycFjeASi3VKA4NiEO9ndWag/jR8k7jWfXMq1MfXuybyQ6TYK', 123456801),
(2, 'aoi.ito', 'Aoi', 'Ito', 'aoi.ito@example.com', '$2y$10$3FdKdmXc7suh19LIyxWSZO8i33BYIcTdokIAPXo9A0nnbzCTK5VDO', 0),
(3, 'haruto.wanabe', 'Haruto', 'Wanabe', 'haruto.w@example.com', '$2y$10$.Pg6y6oyEOfhLF3rNOOmJONcCLi7AnPVTLKZzff1XW3zYcJ9.h/eC', 0),
(4, 'hina.takahashi', 'Hina', 'Takahashi', 'hina.takahashi@example.com', '$2y$10$YlW34btO6UJPxa7H0tzeSuWoWWNvfl2GZduv.omCrQix5brxWAHe2', 0),
(5, 'hinata.tanaka', 'Hinata', 'Tanaka', 'hinata.tanaka@example.com', '$2y$10$9cNGXS8E.Gt.AEr2QnJ6r.EILNUxLSqx7kRhPuiITBKBejzj62Gd2', 0),
(6, 'hiroshi.kobayashi', 'Hiroshi', 'Kobayashi', 'hiroshi.k@example.com', '$2y$10$4aWEY4j8JV0nMmTUWVncZeJhI5rr.cgaL4DkCBXQXuePrK4Ay4fiW', 0),
(7, 'kaito.yamada', 'Kaito', 'Yamada', 'kaito.yamada@example.com', '$2y$10$xwiVVubn9EqhA8WJdaGiouBRPATsjVvTfQ/Y5FMkug.yp32/dwUlO', 0),
(8, 'kenji.tanaka', 'Kenji', 'Tanaka', 'kenji.tanaka@example.com', '$2y$10$434G4ba99x/zsJf1xRAnsOyXheHQ9LBlzhobsNivAyQpTkZSznb6a', 0),
(9, 'mai.sato', 'Mai', 'Sato', 'mai.sato@example.com', '$2y$10$3X6yv9bd1G6RbQeUSOW0kOOvpJuXvjGQTuwICcybSUkahpSgE1qGq', 0),
(10, 'mio.shizimu', 'Mio', 'Shizimu', 'mio.shizimu@example.com', '$2y$10$OrZY50b6MBlVI2yEWgxdy.lCFjgOvhPq8jx862MeIqcySgO47f/QO', 0),
(11, 'ren.yamamoto', 'Ren', 'Yamamoto', 'ren.yamamoto@example.com', '$2y$10$D9hdTLtbIGse/Ca2fDKst.n71Zn/8hU5SN3hqCcTMp1oKNB44lYf.', 0),
(12, 'riku.hayashi', 'Riku', 'Hayashi', 'riku.hayashi@example.com', '$2y$10$5hhOkNzW9HtS9fEJW9DUm.l7SSGFknvdbODzX8DDbKw9p772pXFQS', 0),
(13, 'ryota.kato', 'Ryota', 'Kato', 'ryota.kato@example.com', '$2y$10$wwz.HhQDoiPRSQc7.j1vP.3Nn6AnC5cf1Xr62uWn9f/RouRm0qalK', 0),
(14, 'sakura.yoshida', 'Sakura', 'Yoshida', 'sakura.yoshida@example.com', '$2y$10$MEOQ2joxitYo4ohfBhM6netpkAJBz/v.QZ8Nd6PeGW2Nqc87doKhm', 0),
(15, 'sota.ito', 'Sota', 'Ito', 'sota.ito@example.com', '$2y$10$ONLCHkAR0UbLxBDLEogXEutA.Cw1Qf5v77Xd4/RhQrB/6lHGrbwXW', 0),
(16, 'takumi.inoue', 'Takumi', 'Inoue', 'takumi.inoue@example.com', '$2y$10$1/maPVan7ydSZ4g69CzZtO889tyEhAPTRPe6.PTO7SuCc.xlYMy7e', 0),
(17, 'yui.suzuki', 'Yui', 'Suzuki', 'yui.suzuki@example.com', '$2y$10$3TEWKJH9mpjeADzLd3QI3uKnLEyIhsyX64Hkq1adSmMRiOhA1NWiy', 0),
(18, 'yuki.mori', 'Yuki', 'Mori', 'yuki.suzuki@example.com', '$2y$10$cEyi85NWXRcKCvIi4c4vtOJGiOp4Bh8ohwZxg27c83TNl7YmAAKlG', 0),
(19, 'yuma.kimura', 'Yuma', 'Kimura', 'yuma.kimura@example.com', '$2y$10$wNNBVJVGOwa0eK0xVOOO.OOLyokPWycK/4.lr.KK/7osRDh99FbAe', 0),
(20, 'yuna.nakamura', 'Yuna', 'Nakamura', 'yuna.nakamura@example.com', '$2y$10$934LmIVpJuZfuUrsCUL1.OPDXDUgas7b5tGYAZn1sH7cDWrSt8nIe', 0),
(30, 'heloise.baudrier', 'Héloïse', 'Baudrier', 'heloise.baudrier@gmail.com', '$2y$10$9gQSMdmADDrJsPgHOz.mpeOG1Ptn57w6Kn3nNZwPxyX6AYIoRmtuO', 2147183647);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
