-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 03 mai 2023 à 14:33
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `broceliande`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(50) NOT NULL,
  `pseudo` varchar(50) DEFAULT NULL,
  `motdepasse` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`email`, `pseudo`, `motdepasse`) VALUES
('jack@broceliande.com', 'admin', '*9BCDC990E611B8D852EFAF1E3919AB6AC8C8A9F0');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `Id_commentaire` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `texte` text DEFAULT NULL,
  `dateCom` date DEFAULT NULL,
  `statut` varchar(50) DEFAULT NULL,
  `Id_contree` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `objet` varchar(50) DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contree`
--

CREATE TABLE `contree` (
  `Id_contree` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `contenu` text DEFAULT NULL,
  `photo` varchar(500) DEFAULT NULL,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  `commune` varchar(50) DEFAULT NULL,
  `accessibilite` varchar(250) DEFAULT NULL,
  `ouverture` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `contree`
--

INSERT INTO `contree` (`Id_contree`, `titre`, `contenu`, `photo`, `latitude`, `longitude`, `commune`, `accessibilite`, `ouverture`) VALUES
(1, 'L\'arbre d\'or', 'En septembre 1990, deux incendies successifs dévastent plusieurs centaines d’hectares de landes et de forêt du Val sans Retour. Ce terrible évènement engendre un élan de solidarité au sein de la population afin de préserver ce site naturel de la forêt de Brocéliande. \r\nDès l’année suivante, l’association de sauvegarde du Val sans Retour aidée par des milliers de bénévoles replante plus de 500 000 arbres à Paimpont.\r\n\r\nPour célébrer le renouvellement de la forêt, une œuvre d’art est créée par le sculpteur François DAVIN. L’artiste choisit au cœur d’une aire de petites pierres levées un arbre dont la silhouette rappelle les bois d’un cerf, seigneur des animaux de la forêt. L’arbre calciné est alors recouvert de 5 000 feuilles d’or. Entouré de cinq chênes noircis, l’Arbre d’Or symbolise le caractère fragile et précieux de la forêt.\r\n\r\nAujourd’hui cette végétation dense l’entoure comme pour l’intégrer définitivement dans le paysage et l’histoire du lieu. Gardons ainsi en mémoire ce passé qu’on ne voudrait plus jamais revoir. Cette création mystérieuse aux reflets dorés est devenue un site très populaire de la forêt de Brocéliande. \r\nUne légende entoure désormais l’Arbre d’Or situé tout près du Miroir aux Fées.', 'lArbreDor.jpg', 48.0013, -2.28627, 'Tréhorenteuc', 'Chemin accessible aux fauteuils roulants et poussettes. Mais un porte-bébé est conseillé pour les chemins de randonnées.', 'En période de chasse (12 septembre au 31 mars), l\'arbre d\'or situé dans la vallée du Val Sans Retour est interdit au public.'),
(2, 'Miroir aux fées', 'L’étendue d’eau logée dans le creux de la vallée servait autrefois à alimenter un moulin. Ses eaux « vives et claires comme l’argent » auraient servi, dit-on, de demeure à 7 fées, toutes sœurs. \r\nUn jour, poussée par la curiosité, la plus jeune d’entre elles s’approche d’un humain et tombe follement amoureuse. Les deux amants vivent de doux moments en secret jusqu’à ce que les fées découvrent leur histoire et décident de se venger… Vous l’aurez compris, les fées peuvent parfois s’avérer impitoyables ! \r\nMais si vous vous penchez au-dessus du Miroir aux fées, peut-être apercevrez-vous leurs visages…', 'miroirAuxFees.jpg', 48.0013, -2.28627, 'Tréhorenteuc', 'Chemin accessible aux fauteuils roulants et poussettes. Mais un porte-bébé est conseillé pour les chemins de randonnées.', 'En période de chasse (12 septembre au 31 mars), l\'arbre d\'or situé dans la vallée du Val Sans Retour est interdit au public.'),
(3, 'Château de Trécesson', 'Construit entre le 14ème et le 15ème siècle, ce château médiéval domine un plan d’eau sur la commune de Campénéac. Tout d’abord propriété de la famille de Trécesson, il passa par un jeu d’alliance à René Le Prestre de Châteaugiron à la fin du 18e siècle. Revendu à Monsieur Bourelle de Sivry, payeur général aux armées républicaines, la forteresse passe de famille en famille par un jeu d’héritage. Propriété privée classée aux monuments historiques, le château de Trécesson et ses légendes fantomatiques vous feront frissonner…', 'chateau.jpg', 47.9778, -2.27352, 'Campénéac', 'Accessible tout public.', 'Le château est ouvert aux visites pour la période estivale du 03 juillet au 02 septembre (fermé les dimanches et le 15 août).'),
(4, 'Tombeau du géant', 'C’est un coffre mégalithique dont les parois sont constituées de deux grands blocs de schiste rouge faisant chacun plus de 4 mètres de long et d’un bloc isolé situé à huit mètres. \r\nAutrefois entouré d’un tumulus, le caveau fait partie d’un type de sépulture connu pour les petits princes d’Armorique entre 2000 et 1500 avant J.-C.\r\nTombé dans l’oubli entre le 19ème et le 20ème siècle, le Tombeau des Géants est redécouvert à la fin des années 1970 et des fouilles sont entreprises en 1982. \r\n', 'tombeauGeant.jpg', 47.9912, -2.26889, 'Campénéac', 'Accessible tout public.', 'En période de chasse (12 septembre au 31 mars), l\'arbre d\'or situé dans la vallée du Val Sans Retour est interdit au public.');

-- --------------------------------------------------------

--
-- Structure de la table `legende`
--

CREATE TABLE `legende` (
  `Id_legende` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `contenu` text DEFAULT NULL,
  `photo` varchar(500) DEFAULT NULL,
  `Id_contree` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `legende`
--

INSERT INTO `legende` (`Id_legende`, `titre`, `contenu`, `photo`, `Id_contree`) VALUES
(1, 'La malédiction de l\'arbre d\'or', 'Autour de l’Arbre d’Or créé dans la mythique forêt de Brocéliande, terre de légendes, est née une histoire fidèle à la tradition arthurienne. On raconte qu’au fond du Val sans Retour se trouvait un arbre sur lequel poussait chaque nuit des feuilles d’or. Juste avant le lever du jour, des lutins de Brocéliande venaient les ramasser pour fabriquer un onguent magique destiné à soigner les arbres abîmés.\r\n\r\nUn jour, Henriette, une enfant du pays se perdit dans la forêt de Paimpont. En voyant dans l’obscurité un arbre briller, elle s’en approcha et par curiosité le toucha. Mais une malédiction la transforma aussitôt en arbre noir. Lorsque ses camarades partis à sa recherche arrivèrent au pied de l’arbre, ils l’enlacèrent et subirent à leur tour le même sort.\r\n\r\nDès l’aube, les lutins arrivèrent sur les lieux pour leur collecte quotidienne. Or ce jour-là, ils se retrouvèrent subitement transformés en pierres. Depuis l’arbre d’or semble protégé par les cinq arbres noirs et les pierres levées qui l’entourent. Si l’arbre au tronc resplendissant attire toujours les promeneurs, gare à ceux qui l’approcheraient de trop près !', 'arbreNuit.jpg', 1),
(2, 'Les sept fées', 'La Légende veut que les fées, venant les nuits de pleine lune, y cachaient leurs bijoux et que quiconque désirait leurs subtiliser se verrait enfermer à jamais dans les eaux du lac pour y ranger tout ce que les fées y camouflaient.\r\n\r\nLa légende dit également que 7 fées, toutes sœurs, y avaient élu domicile et avaient fait serment de plus jamais se montrer aux hommes.\r\nUn beau jour, la plus jeune d’entre elles brisa ce pacte et se montra à un cavalier venu s’abreuver aux bords du lac.\r\nSes sœurs, découvrant la maladresse de leur cadette, décidèrent d’assassiner le cavalier pour ne pas qu’il ébruite la présence de fées dans ce lac.\r\nLa petite, prise de rage, égorgea ses 6 sœurs pendant leurs sommeils. Elle recueilli un peu de leur sang ainsi que du sien pour former une potion magique qui redonna vie au cavalier assassiné.\r\nIl est dit que pendant 7 jours et 6 nuits, le sang des 6 sœurs égorgées s’est répandu dans les eaux de la vallée, faisant viré sa couleur au pourpre.', 'miroirAuxFees.jpg', 2),
(3, 'La dame blanche', 'La légende la plus connue est certainement l’histoire de la Dame Blanche. À l’époque où le château appartient à Monsieur de Trécesson, des braconniers surprennent une étrange scène dans les bois. Un attelage tiré par deux chevaux s’arrête, deux hommes sortent et commencent à creuser une fosse. Puis, les deux hommes reviennent à l’attelage et empoignent violemment une jeune femme coiffée d’une couronne de fleurs et vêtue d’une robe de soie blanche. La jeune fiancée est jetée dans la fosse et enterrée vivante… Depuis cette effroyable nuit, l’esprit de la jeune femme apparaîtrait sur les toits du château les soirs de pleine lune…\r\nDes joueurs de cartes fantomatiques seraient également apparus en pleine nuit dans la chambre d’un hôte du château… Château hanté ou imagination débordante ? Vous voilà en tout cas prévenus, l’atmosphère des lieux est propice aux mystères et éveille bien souvent l’imagination des conteurs de Brocéliande… ', 'alleeForet.jpg', 3),
(4, 'La partie de cartes fantôme', 'À Trécesson encore, voici bientôt trois siècles, des jurons, des cris, des coups ébranlaient pendant des nuits entières les murailles d’une des chambres. Au château, personne n’osait s’y risquer. Chacun claquait des dents dans sa chambre, et les domestiques se terraient autour des cheminées : quelle meilleure arme qu’un tisonnier rougi contre ceux qui sortent de l’enfer pour tourmenter les pauvres vivants ? Un invité téméraire s’engagea enfin à y dormir du soir au matin. Tout semblait normal. Mais au milieu de la nuit, réveillé par des cris, il vit devant lui deux joueurs de cartes qui se disputaient violemment un énorme tas de pièces d’or, enjeu de leur partie. Le visiteur, d’un coup de pistolet mit fin à la dispute des deux adversaires qui rejouaient chaque nuit la partie de cartes qui leur avait été fatale. Tout disparut, sauf les pièces d’or. Le calme revint ; enfin, presque car le courageux visiteur s’avisa de réclamer l’or qu’il estimait avoir mérité. Le seigneur de Trécesson refusa, l’or était sien, puisque trouvé entre ses murs. La querelle se termina en un procès auquel les fantômes se gardèrent bien de venir témoigner.', 'chateauNb.jpg', 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`Id_commentaire`),
  ADD KEY `commentaire_ibfk_1` (`Id_contree`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contree`
--
ALTER TABLE `contree`
  ADD PRIMARY KEY (`Id_contree`);

--
-- Index pour la table `legende`
--
ALTER TABLE `legende`
  ADD PRIMARY KEY (`Id_legende`),
  ADD KEY `legende_ibfk_1` (`Id_contree`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `Id_commentaire` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `contree`
--
ALTER TABLE `contree`
  MODIFY `Id_contree` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `legende`
--
ALTER TABLE `legende`
  MODIFY `Id_legende` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`Id_contree`) REFERENCES `contree` (`Id_contree`);

--
-- Contraintes pour la table `legende`
--
ALTER TABLE `legende`
  ADD CONSTRAINT `legende_ibfk_1` FOREIGN KEY (`Id_contree`) REFERENCES `contree` (`Id_contree`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
