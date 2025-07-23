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
-- Structure de la table `tour_list`
--

CREATE TABLE `tour_list` (
  `tour_id` int(11) NOT NULL,
  `tour_name` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `price_yen` int(11) DEFAULT NULL,
  `available_seats` int(11) DEFAULT NULL,
  `description` varchar(1500) NOT NULL,
  `image_url` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `tour_list`
--

INSERT INTO `tour_list` (`tour_id`, `tour_name`, `city`, `price_yen`, `available_seats`, `description`, `image_url`) VALUES
(1, 'Tokyo City Tour', 'Tokyo', 23000, 24, 'Explore Tokyo’s vibrant blend of tradition and innovation through its iconic neighborhoods, ancient temples, and modern marvels.', 'Tokyo_City_Tour.jpg'),
(2, 'Asakusa & Skytree', 'Tokyo', 23000, 25, 'Discover Tokyo\'s rich history in Asakusa and enjoy panoramic views from the towering Tokyo Skytree.', 'Asakusa_&_Skytree.jpg'),
(3, 'Ghibli Museum Visit', 'Tokyo', 27000, 81, 'Step into the enchanting world of Studio Ghibli and immerse yourself in the art, animation, and imagination of Hayao Miyazaki.', 'Ghibli_Museum_Visit.jpg'),
(4, 'Odaiba Cruise', 'Tokyo', 12000, 36, 'Enjoy a relaxing cruise around Odaiba, Tokyo’s futuristic waterfront area, with stunning views of Rainbow Bridge and the skyline', 'Odaiba_Cruise.jpg'),
(5, 'Shibuya & Harajuku Walk', 'Tokyo', 5000, 74, 'Experience the energy of Shibuya Crossing and the quirky fashion and culture of Harajuku on this walking adventure.', 'Shibuya_&_Harajuku_Walk.jpg'),
(6, 'Arashiyama Bamboo Forest', 'Kyoto', 40000, 96, 'Stroll through Kyoto’s magical bamboo groves in Arashiyama and feel the peaceful atmosphere of this natural wonde', 'Arashiyama_Bamboo_Forest.jpg'),
(7, 'Fushimi Inari Shrine Tour', 'Kyoto', 96000, 64, 'Walk through thousands of iconic red torii gates and explore the spiritual beauty of Fushimi Inari Shrine', 'Fushimi_Inari_Shrine_Tour.jpg'),
(8, 'Kyoto Tea Ceremony', 'Kyoto', 14500, 87, 'Experience the elegance and mindfulness of a traditional Japanese tea ceremony in an authentic Kyoto setting.', 'Kyoto_Tea_Ceremony.jpg'),
(9, 'Gion Geisha Experience', 'Kyoto', 26000, 71, 'Discover the charm of Kyoto’s Gion district and enjoy a rare cultural encounter with a geisha or maiko.', 'Gion_Geisha_Experience.jpg'),
(10, 'Kinkaku-ji Temple Tour', 'Kyoto', 9500, 40, 'Visit the stunning Golden Pavilion, a UNESCO World Heritage Site surrounded by serene gardens and reflective waters', 'Kinkaku-ji_Temple_Tour.jpg'),
(11, 'Osaka Castle & Park', 'Osaka', 6000, 73, 'Explore the historic Osaka Castle and its surrounding park, a symbol of Japan’s feudal past and natural beauty', 'Osaka_Castle_&_Park.jpg'),
(12, 'Universal Studios Japan', 'Osaka', 15000, 52, 'Dive into thrilling rides, Hollywood magic, and immersive worlds at one of Japan’s top theme parks', 'Universal_Studios_Japan.jpg'),
(13, 'Dotonbori Food Tour', 'Osaka', 19000, 50, 'Taste your way through Osaka’s famous street food scene in the lively Dotonbori district — a paradise for food lovers', 'Dotonbori_Food_Tour.jpg'),
(14, 'Osaka Aquarium Kaiyukan', 'Osaka', 2400, 57, 'Visit one of the world’s largest aquariums and journey through marine habitats from the Pacific Rim', 'Osaka_Aquarium_Kaiyukan.jpg'),
(15, 'Umeda Sky Building View', 'Osaka', 1500, 49, 'Take in breathtaking panoramic views of Osaka from the Floating Garden Observatory atop the Umeda Sky Building', 'Umeda_Sky_Building_View.jpg'),
(16, 'Sapporo Snow Festival Tour', 'Hokkaido', 60000, 47, 'Witness incredible snow and ice sculptures at one of Japan’s most famous winter events — the Sapporo Snow Festival', 'Sapporo_Snow_Festival_Tour.jpg'),
(17, 'Otaru Canal & Glass Workshops', 'Hokkaido', 80000, 91, 'Wander the romantic canals of Otaru and try your hand at glassblowing in this charming artisan town', 'Otaru_Canal_&_Glass_Workshops.jpg'),
(18, 'Niseko Ski Experience', 'Hokkaido', 120000, 27, 'Hit the slopes of Niseko, Japan’s premier ski resort, known for its powder snow and world-class facilitie', 'Niseko_Ski_Experience.jpg'),
(19, 'Furano Flower Fields', 'Hokkaido', 9100, 35, 'Marvel at vibrant flower landscapes in Furano, especially breathtaking during lavender season', 'Furano_Flower_Fields.jpg'),
(20, 'Shiretoko Nature Cruise', 'Hokkaido', 20000, 19, 'Explore the pristine beauty of Shiretoko Peninsula by boat, spotting wildlife and untouched coastlines along the way', 'Shiretoko_Nature_Cruise.jpg'),
(21, 'Churaumi Aquarium Visit', 'Okinawa', 7300, 62, 'Discover Okinawa’s marine life at Churaumi Aquarium, home to whale sharks and colorful tropical fish', 'Churaumi_Aquarium_Visit.jpg'),
(22, 'Naha City Sightseeing', 'Okinawa', 7800, 28, 'Explore the lively streets, markets, and cultural landmarks of Naha, the capital of Okinawa', 'Naha_City_Sightseeing.jpg'),
(23, 'Okinawa Beach Relaxation', 'Okinawa', 7500, 73, 'Unwind on Okinawa’s beautiful white-sand beaches and soak up the sun in a tropical paradise', 'Okinawa_Beach_Relaxation.jpg'),
(24, 'Snorkeling & Diving Tour', 'Okinawa', 5000, 32, 'Dive into crystal-clear waters and explore coral reefs teeming with vibrant sea life on this unforgettable ocean adventure', 'Snorkeling_&_Diving_Tour.jpg'),
(25, 'Okinawa World Culture Park', 'Okinawa', 5000, 50, 'Experience traditional Okinawan crafts, dance, and culture in a fun and educational park setting', 'Okinawa_World_Culture_Park.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tour_list`
--
ALTER TABLE `tour_list`
  ADD PRIMARY KEY (`tour_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tour_list`
--
ALTER TABLE `tour_list`
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
